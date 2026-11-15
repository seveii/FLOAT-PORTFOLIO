<?php
require __DIR__ . '/../includes/bootstrap.php';

$page        = 'services';
$title       = 'Services — ' . SITE_NAME;
$description = 'Web design and development, graphic design and branding, and social media content for small businesses, organizations and personal brands.';

require INC . '/header.php';
?>

<section class="page-hero">
  <div class="container">
    <p class="eyebrow">Services</p>
    <h1>Design that does a job for you</h1>
    <p class="lede">Every project starts with a goal: more inquiries, a clearer message, or a page that looks as professional as the work behind it. Here is what I can take on.</p>
  </div>
</section>

<section class="section section-tight">
  <div class="container">
    <?php foreach ($services as $s): ?>
    <article class="service-row" id="<?= e($s['slug']) ?>">
      <div class="service-main">
        <h2><?= e($s['title']) ?></h2>
        <p class="service-blurb"><?= e($s['blurb']) ?></p>
        <p class="service-fit"><strong>Good for:</strong> <?= e($s['fits']) ?></p>
        <?php if (!empty($s['work'])): ?>
        <p class="service-examples"><strong>Examples:</strong>
          <?php
          $links = [];
          foreach ($s['work'] as $slug) {
              if ($proj = find_project($projects, $slug)) {
                  $links[] = '<a href="' . e(project_url($proj)) . '">' . e($proj['title']) . '</a>';
              }
          }
          echo implode(', ', $links);
          ?>
        </p>
        <?php endif; ?>
      </div>
      <div class="service-list">
        <h3>What you get</h3>
        <ul class="ticks">
          <?php foreach ($s['gets'] as $item): ?>
          <li><?= e($item) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="section section-tint">
  <div class="container">
    <header class="section-head">
      <p class="eyebrow">How I work</p>
      <h2>From first message to final files</h2>
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
      <h2>Ready to talk about your project?</h2>
      <p>Send a short message. I’ll reply by email.</p>
    </div>
    <a class="btn btn-accent" href="contact.php">Start a project</a>
  </div>
</section>

<?php require INC . '/footer.php'; ?>
