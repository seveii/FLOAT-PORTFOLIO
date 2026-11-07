<?php
require __DIR__ . '/includes/bootstrap.php';

// Only a slug that exists in data.php is ever accepted; anything else is a 404.
$slug    = isset($_GET['slug']) && is_string($_GET['slug']) ? $_GET['slug'] : '';
$project = find_project($projects, $slug);

if ($project === null) {
    http_response_code(404);
    $page        = 'work';
    $title       = 'Project not found — ' . SITE_NAME;
    $description = '';
    require INC . '/header.php';
    ?>
    <section class="page-hero">
      <div class="container">
        <p class="eyebrow">404</p>
        <h1>That project doesn’t exist</h1>
        <p class="lede">The link may be old or mistyped. You can browse all projects instead.</p>
        <div class="actions"><a class="btn btn-primary" href="work.php">View all work</a></div>
      </div>
    </section>
    <?php
    require INC . '/footer.php';
    exit;
}

// Work out the previous / next project for the links at the bottom.
$index = 0;
foreach ($projects as $i => $p) {
    if ($p['slug'] === $project['slug']) {
        $index = $i;
        break;
    }
}
$count = count($projects);
$prev  = $projects[($index - 1 + $count) % $count];
$next  = $projects[($index + 1) % $count];

$page        = 'work';
$title       = $project['title'] . ' — ' . SITE_NAME;
$description = $project['summary'];

require INC . '/header.php';
?>

<section class="page-hero project-hero">
  <div class="container">
    <p class="crumbs"><a href="work.php">Work</a> <span aria-hidden="true">/</span> <?= e($project['title']) ?></p>
    <p class="eyebrow"><?= e($project['category']) ?></p>
    <h1><?= e($project['title']) ?></h1>
    <p class="lede"><?= e($project['summary']) ?></p>
  </div>
</section>

<section class="section section-tight">
  <div class="container">
    <figure class="project-cover <?= $project['fit'] === 'cover' ? 'fit-cover' : 'fit-contain' ?><?= !empty($project['pos']) ? ' is-photo' : '' ?>">
      <?= img($project['cover'], $project['title'] . ' preview', ['loading' => 'eager', 'sizes' => '(min-width: 1100px) 1100px, 100vw', 'pos' => $project['pos'] ?? '']) ?>
    </figure>

    <div class="project-layout">
      <div class="project-text">
        <h2>Overview</h2>
        <?php foreach ($project['overview'] as $para): ?>
        <p><?= e($para) ?></p>
        <?php endforeach; ?>

        <h2>Highlights</h2>
        <ul class="ticks">
          <?php foreach ($project['points'] as $point): ?>
          <li><?= e($point) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <aside class="project-meta" aria-label="Project details">
        <dl>
          <div><dt>Role</dt><dd><?= e($project['role']) ?></dd></div>
          <div><dt>Type</dt><dd><?= e($project['category']) ?></dd></div>
          <div><dt>Status</dt><dd><?= e($project['status']) ?></dd></div>
          <div>
            <dt>Tools</dt>
            <dd>
              <ul class="chips">
                <?php foreach ($project['tools'] as $tool): ?>
                <li><?= e($tool) ?></li>
                <?php endforeach; ?>
              </ul>
            </dd>
          </div>
        </dl>
        <?php foreach ($project['links'] ?? [] as [$label, $url]): ?>
        <a class="btn btn-ghost btn-block meta-link" href="<?= e($url) ?>" target="_blank" rel="noopener noreferrer"><?= e($label) ?> <span aria-hidden="true">&nearr;</span></a>
        <?php endforeach; ?>
        <a class="btn btn-primary btn-block" href="contact.php">Start a similar project</a>
      </aside>
    </div>

    <?php if (!empty($project['videos'])): ?>
    <h2 class="gallery-title">Watch it in action</h2>
    <div class="videos">
      <?php foreach ($project['videos'] as [$clip, $caption]): ?>
      <?php if (is_file(__DIR__ . '/assets/video/' . $clip . '.mp4')): ?>
      <figure class="video-item">
        <!-- Plain HTML5 video with the browser's own controls: no JavaScript -->
        <video controls preload="metadata" playsinline>
          <source src="assets/video/<?= e($clip) ?>.mp4" type="video/mp4">
          Your browser can’t play this video.
        </video>
        <figcaption><?= e($caption) ?></figcaption>
      </figure>
      <?php endif; ?>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if (!empty($project['gallery'])): ?>
    <h2 class="gallery-title">More from this project</h2>
    <div class="gallery">
      <?php foreach ($project['gallery'] as [$name, $alt, $fit]): ?>
      <figure class="gallery-item <?= $fit === 'cover' ? 'fit-cover' : 'fit-contain' ?>">
        <?= img($name, $alt, ['sizes' => '(min-width: 900px) 33vw, 100vw']) ?>
        <figcaption><?= e($alt) ?></figcaption>
      </figure>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<section class="section section-tint section-tight">
  <div class="container pager">
    <a class="pager-link" href="<?= e(project_url($prev)) ?>">
      <span class="pager-label"><span aria-hidden="true">&larr;</span> Previous</span>
      <strong><?= e($prev['title']) ?></strong>
    </a>
    <a class="pager-link pager-next" href="<?= e(project_url($next)) ?>">
      <span class="pager-label">Next <span aria-hidden="true">&rarr;</span></span>
      <strong><?= e($next['title']) ?></strong>
    </a>
  </div>
</section>

<?php require INC . '/footer.php'; ?>
