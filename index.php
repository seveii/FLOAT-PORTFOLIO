<?php
require __DIR__ . '/includes/bootstrap.php';

$page        = 'home';
$cover       = true; // the header floats over the full-screen photo
$title       = SITE_NAME . ' — ' . SITE_ROLE;
$description = 'Web and graphic designer and Computer Engineering student in Marilao, Bulacan. Websites, logos, posters and social media graphics for small businesses, organizations and personal brands.';

require INC . '/header.php';
?>

<!-- COVER: the whole first screen is the photo. Phones get the portrait photo, larger screens the wide one. -->
<section class="cover" aria-label="Introduction">
  <picture>
    <source media="(max-width: 700px)" srcset="assets/img/awards-presidents-list.webp">
    <img class="cover-photo" src="assets/img/cover-pool.webp" width="1400" height="1050"
         alt="Rafael Joseph Nieves" fetchpriority="high">
  </picture>
  <div class="cover-shade" aria-hidden="true"></div>

  <div class="container cover-content">
    <p class="badge badge-dark"><span class="badge-dot" aria-hidden="true"></span>Open to freelance projects and internships</p>
    <h1><span>Rafael Joseph</span> <span>Nieves</span></h1>
    <p class="cover-role"><?= e(SITE_ROLE) ?> &middot; <?= e(SITE_LOCATION) ?></p>

    <ul class="cover-tags" aria-label="About me in brief">
      <li>3rd-year BS Computer Engineering</li>
      <li>Dean’s Lister</li>
      <li>PRO, ICpEP</li>
    </ul>

    <div class="actions">
      <a class="btn btn-accent" href="work.php">See my work</a>
      <a class="btn btn-light" href="contact.php">Start a project</a>
    </div>
  </div>

  <a class="cover-scroll" href="#intro"><span>Scroll</span><i aria-hidden="true"></i></a>
</section>

<section class="section section-tight" id="intro">
  <div class="container">
    <div class="intro-grid">
      <div>
        <p class="eyebrow">Hello</p>
        <h2 class="intro-title">Websites and visuals that make your work easy to trust.</h2>
      </div>
      <div>
        <p class="lede">I design and build responsive websites, and create the logos, posters and social media graphics that go with them, for small businesses, student organizations and personal brands. I study Computer Engineering, so I understand how things are built as well as how they look.</p>
        <a class="text-link" href="about.php">More about me <span aria-hidden="true">&rarr;</span></a>
      </div>
    </div>

    <ul class="facts" aria-label="Quick facts">
      <?php foreach ($facts as [$value, $label]): ?>
      <li><strong><?= e($value) ?></strong><span><?= e($label) ?></span></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="worked-with" aria-label="Work made for">
  <div class="container worked-row">
    <p class="worked-label">Work made for</p>
    <ul>
      <?php foreach ($worked_with as $name): ?>
      <li><?= e($name) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="section" id="services">
  <div class="container">
    <header class="section-head">
      <p class="eyebrow">What I do</p>
      <h2>Three ways I can help</h2>
      <p class="section-lede">Whether you need a website, a consistent look, or content for your page, I handle it from first idea to final files.</p>
    </header>

    <div class="grid-3">
      <?php foreach ($services as $s): ?>
      <article class="service">
        <h3><?= e($s['title']) ?></h3>
        <p><?= e($s['blurb']) ?></p>
        <ul class="ticks">
          <?php foreach (array_slice($s['gets'], 0, 3) as $item): ?>
          <li><?= e($item) ?></li>
          <?php endforeach; ?>
        </ul>
        <a class="text-link" href="services.php#<?= e($s['slug']) ?>">Learn more <span aria-hidden="true">&rarr;</span></a>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-tint" id="work">
  <div class="container">
    <header class="section-head section-head-row">
      <div>
        <p class="eyebrow">Selected work</p>
        <h2>Recent projects</h2>
      </div>
      <a class="btn btn-ghost" href="work.php">View all work</a>
    </header>

    <div class="grid-3">
      <?php foreach (array_slice($projects, 0, 6) as $p): ?>
        <?= project_card($p) ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section" id="certificates">
  <div class="container">
    <header class="section-head section-head-row">
      <div>
        <p class="eyebrow">Credentials</p>
        <h2>Certificates and awards</h2>
      </div>
      <a class="btn btn-ghost" href="certificates.php">See all certificates</a>
    </header>

    <ul class="cert-strip">
      <?php
      // A small preview: the first two from each group.
      foreach ($certificate_groups as $group):
          foreach (array_slice($group['items'], 0, 2) as [$file, $name, $issuer, $date]): ?>
      <li>
        <a href="certificates.php">
          <?= img($file, 'Certificate: ' . $name, ['sizes' => '(min-width: 900px) 25vw, 50vw']) ?>
          <span class="cert-name"><?= e($name) ?></span>
          <span class="cert-meta"><?= e($issuer) ?> &middot; <?= e($date) ?></span>
        </a>
      </li>
      <?php endforeach; endforeach; ?>
    </ul>
  </div>
</section>

<section class="section section-tint" id="process">
  <div class="container">
    <header class="section-head">
      <p class="eyebrow">How I work</p>
      <h2>A simple process, so you always know what’s next</h2>
    </header>

    <ol class="steps">
      <?php foreach ($process as $i => [$name, $text]): ?>
      <li>
        <span class="step-num" aria-hidden="true"><?= $i + 1 ?></span>
        <h3><?= e($name) ?></h3>
        <p><?= e($text) ?></p>
      </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<section class="cta-band">
  <div class="container cta-inner">
    <div>
      <h2>Have a project in mind?</h2>
      <p>Tell me what you need and who it’s for. I’ll reply by email with next steps.</p>
    </div>
    <a class="btn btn-accent" href="contact.php">Start a project</a>
  </div>
</section>

<?php require INC . '/footer.php'; ?>
