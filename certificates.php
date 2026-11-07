<?php
require __DIR__ . '/includes/bootstrap.php';

$page        = 'certificates';
$title       = 'Certificates — ' . SITE_NAME;
$description = 'Certificates and awards: AI tool courses from tixu.ai (Claude for Engineers, ChatGPT, Lovable, Kling, Nano Banana) and academic awards from Colegio de Sto. Niño.';

require INC . '/header.php';
?>

<section class="page-hero">
  <div class="container">
    <p class="eyebrow">Credentials</p>
    <h1>Certificates and awards</h1>
    <p class="lede">The courses I have completed and the awards I have received. Select any certificate to open it at full size.</p>
  </div>
</section>

<?php foreach ($certificate_groups as $heading => $group): ?>
<section class="section section-tight">
  <div class="container">
    <header class="group-head">
      <h2><?= e($heading) ?></h2>
      <p><?= e($group['lede']) ?></p>
    </header>

    <ul class="cert-grid">
      <?php foreach ($group['items'] as [$file, $name, $issuer, $date, $detail]): ?>
      <li class="cert-card">
        <a class="cert-image" href="assets/img/<?= e($file) ?>.webp" target="_blank" rel="noopener" aria-label="Open the <?= e($name) ?> certificate at full size">
          <?= img($file, 'Certificate: ' . $name . ', ' . $issuer, ['sizes' => '(min-width: 900px) 33vw, (min-width: 600px) 50vw, 100vw']) ?>
        </a>
        <div class="cert-body">
          <h3><?= e($name) ?></h3>
          <p class="cert-meta"><?= e($issuer) ?> &middot; <?= e($date) ?></p>
          <p class="cert-detail"><?= e($detail) ?></p>
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
<?php endforeach; ?>

<section class="cta-band">
  <div class="container cta-inner">
    <div>
      <h2>Want to see how I put this to use?</h2>
      <p>Browse the projects, or tell me about yours.</p>
    </div>
    <a class="btn btn-accent" href="contact.php">Start a project</a>
  </div>
</section>

<?php require INC . '/footer.php'; ?>
