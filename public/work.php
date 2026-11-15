<?php
require __DIR__ . '/../includes/bootstrap.php';

$page        = 'work';
$title       = 'Work — ' . SITE_NAME;
$description = 'Selected projects: web apps, logos, social media graphics, campaigns, apparel and Computer Engineering builds such as a traffic light model and a labeled motherboard.';

$groups = [
    'design'      => ['Web & design projects', 'Websites, brand identities, publications and campaign graphics.'],
    'engineering' => ['Computer Engineering projects', 'Hardware and electronics builds from my coursework.'],
    'game'        => ['Games', 'Playable projects built with HTML5 Canvas.'],
];

require INC . '/header.php';
?>

<section class="page-hero">
  <div class="container">
    <p class="eyebrow">Work</p>
    <h1>Selected projects</h1>
    <p class="lede">Web and design projects for student organizations and community events, plus hands-on Computer Engineering builds. Open any project to see what it is, what I did, and how it was made.</p>
  </div>
</section>

<?php foreach ($groups as $key => [$heading, $blurb]): ?>
<section class="section section-tight">
  <div class="container">
    <header class="group-head">
      <h2><?= e($heading) ?></h2>
      <p><?= e($blurb) ?></p>
    </header>
    <div class="grid-3">
      <?php foreach ($projects as $p): ?>
        <?php if (($p['group'] ?? 'design') === $key): ?>
        <?= project_card($p) ?>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endforeach; ?>

<section class="cta-band">
  <div class="container cta-inner">
    <div>
      <h2>Want something like this for your brand?</h2>
      <p>Tell me about your project and I’ll reply with ideas and next steps.</p>
    </div>
    <a class="btn btn-accent" href="contact.php">Start a project</a>
  </div>
</section>

<?php require INC . '/footer.php'; ?>
