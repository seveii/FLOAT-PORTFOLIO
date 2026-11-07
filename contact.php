<?php
require __DIR__ . '/includes/bootstrap.php';

if (!ON_VERCEL) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'httponly' => true,
        'samesite' => 'Lax',
        'secure'   => !empty($_SERVER['HTTPS']),
    ]);
    session_start();
}

$types = [
    'website' => 'A website',
    'design'  => 'Logo, poster or other graphic design',
    'content' => 'Social media content',
    'other'   => 'Something else / not sure yet',
];

$errors = [];
$old    = ['name' => '', 'email' => '', 'type' => '', 'message' => ''];
$sent   = isset($_GET['sent']);

// One-time token that proves the form was loaded from this site (CSRF protection).
if (!ON_VERCEL && empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

/** Read a text field safely: must be a string, trimmed, and cut to a maximum length. */
function field(string $key, int $max): string
{
    $value = $_POST[$key] ?? '';
    if (!is_string($value)) {
        return '';
    }
    return substr(trim($value), 0, $max);
}

if (!ON_VERCEL && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Spam trap: real people never see or fill this hidden field.
    if (field('website', 200) !== '') {
        header('Location: contact.php?sent=1');
        exit;
    }

    // 2. CSRF token.
    $token = $_POST['csrf'] ?? '';
    if (!is_string($token) || !hash_equals($_SESSION['csrf'], $token)) {
        $errors[] = 'Your session expired. Please try sending the message again.';
    }

    // 3. Cooldown between messages.
    if (time() - (int) ($_SESSION['last_sent'] ?? 0) < FORM_COOLDOWN) {
        $errors[] = 'Please wait a few seconds before sending another message.';
    }

    // 4. Read and clean the fields. Line breaks are removed from name/email so they can
    //    never be used to inject extra email headers.
    $old['name']    = preg_replace('/[\r\n\t]+/', ' ', field('name', 100));
    $old['email']   = preg_replace('/[\r\n\t ]+/', '', field('email', 254));
    $old['type']    = field('type', 20);
    $old['message'] = field('message', 3000);

    // 5. Validate.
    if (strlen($old['name']) < 2) {
        $errors[] = 'Please enter your name.';
    }
    if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address so I can reply.';
    }
    if (!array_key_exists($old['type'], $types)) {
        $errors[] = 'Please choose what you need help with.';
    }
    if (strlen($old['message']) < 10) {
        $errors[] = 'Please add a few details about your project (at least 10 characters).';
    }

    // 6. Send and store.
    if (!$errors) {
        $line = json_encode([
            'time'    => date('c'),
            'name'    => $old['name'],
            'email'   => $old['email'],
            'type'    => $types[$old['type']],
            'message' => $old['message'],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG);

        // A private copy on the server. It is a .php file whose first line stops execution,
        // so even if someone requested it in a browser, nothing would be shown.
        $log = __DIR__ . '/data/messages.php';
        if (!is_file($log)) {
            @file_put_contents($log, "<?php http_response_code(403); exit; ?>\n", LOCK_EX);
        }
        $saved = @file_put_contents($log, $line . PHP_EOL, FILE_APPEND | LOCK_EX) !== false;

        $subject = 'New project inquiry from ' . $old['name'];
        $body    = "Name: {$old['name']}\nEmail: {$old['email']}\nNeeds: {$types[$old['type']]}\n\n{$old['message']}\n";
        $mailed  = @mail(
            SITE_EMAIL,
            '=?UTF-8?B?' . base64_encode($subject) . '?=',
            $body,
            [
                'From'         => MAIL_FROM,
                'Reply-To'     => $old['email'],
                'Content-Type' => 'text/plain; charset=UTF-8',
            ]
        );

        if ($saved || $mailed) {
            $_SESSION['last_sent'] = time();
            $_SESSION['csrf']      = bin2hex(random_bytes(32)); // new token for next time
            header('Location: contact.php?sent=1'); // Post/Redirect/Get: refreshing won't re-send
            exit;
        }
        $errors[] = 'Sorry, the message could not be sent. Please email me directly at ' . SITE_EMAIL . '.';
    }
}

$mailto = 'mailto:' . SITE_EMAIL . '?subject=' . rawurlencode('Project inquiry')
    . '&body=' . rawurlencode("Hi Rafael,

I need help with: (a website / a logo or poster / social media content)
Who it's for:
Any examples I like:

Thanks!");

$page        = 'contact';
$title       = 'Contact — ' . SITE_NAME;
$description = 'Start a project: tell me what you need and I will reply by email.';

require INC . '/header.php';
?>

<section class="page-hero">
  <div class="container">
    <p class="eyebrow">Contact</p>
    <h1>Let’s talk about your project</h1>
    <p class="lede">Send a short message about what you need and who it’s for. I’ll reply by email.</p>
  </div>
</section>

<section class="section section-tight">
  <div class="container contact-layout">

    <div class="contact-form-wrap">
      <?php if (ON_VERCEL): ?>
      <div class="mail-card">
        <h2>Email me about your project</h2>
        <p>Tell me what you need, who it’s for and any examples you like. Your email app opens with a ready-to-fill message, and I’ll reply by email.</p>
        <a class="btn btn-accent" href="<?= e($mailto) ?>">Email <?= e(SITE_EMAIL) ?></a>
        <p class="hint">Prefer social media? You can also message me on Instagram, linked on this page.</p>
      </div>
      <?php elseif ($sent): ?>
      <div class="notice notice-ok" role="status">
        <h2>Thank you, your message was sent</h2>
        <p>I’ll read it and reply to the email address you gave.</p>
        <a class="btn btn-ghost" href="work.php">Browse my work while you wait</a>
      </div>
      <?php else: ?>

      <?php if ($errors): ?>
      <div class="notice notice-error" role="alert">
        <h2>Please check the form</h2>
        <ul>
          <?php foreach ($errors as $error): ?>
          <li><?= e($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>

      <form class="form" method="post" action="contact.php" novalidate>
        <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">

        <div class="form-row">
          <div class="field">
            <label for="name">Your name</label>
            <input id="name" name="name" type="text" maxlength="100" autocomplete="name" required value="<?= e($old['name']) ?>">
          </div>
          <div class="field">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" maxlength="254" autocomplete="email" required value="<?= e($old['email']) ?>">
          </div>
        </div>

        <div class="field">
          <label for="type">What do you need?</label>
          <select id="type" name="type" required>
            <option value="">Choose one…</option>
            <?php foreach ($types as $value => $label): ?>
            <option value="<?= e($value) ?>"<?= $old['type'] === $value ? ' selected' : '' ?>><?= e($label) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="field">
          <label for="message">Tell me about your project</label>
          <textarea id="message" name="message" rows="7" maxlength="3000" required><?= e($old['message']) ?></textarea>
          <p class="hint">What is it for, who is it for, and any examples you like?</p>
        </div>

        <!-- Spam trap: hidden from people, but bots tend to fill it in -->
        <div class="hp" aria-hidden="true">
          <label>Leave this field empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
        </div>

        <button class="btn btn-primary" type="submit">Send message</button>
      </form>
      <?php endif; ?>
    </div>

    <aside class="contact-side" aria-label="Other ways to reach me">
      <h2>Other ways to reach me</h2>
      <ul class="contact-list">
        <li><span>Email</span><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></li>
        <?php foreach (SOCIAL as $label => $url): ?>
        <li><span><?= e($label) ?></span><a href="<?= e($url) ?>" target="_blank" rel="noopener noreferrer">Open <?= e($label) ?></a></li>
        <?php endforeach; ?>
        <li><span>Location</span><?= e(SITE_LOCATION) ?></li>
      </ul>

      <h3>It helps if you include</h3>
      <ul class="ticks">
        <li>What the project is for</li>
        <li>Who it is for</li>
        <li>Any logo, colors or content you already have</li>
        <li>Examples you like</li>
      </ul>
    </aside>

  </div>
</section>

<?php require INC . '/footer.php'; ?>
