<?php

$root = dirname(__DIR__);
$web  = $root . '/public';   // the pages and assets

$pages = [
    '/'                 => 'index.php',
    '/index.php'        => 'index.php',
    '/services.php'     => 'services.php',
    '/work.php'         => 'work.php',
    '/project.php'      => 'project.php',
    '/about.php'        => 'about.php',
    '/certificates.php' => 'certificates.php',
    '/contact.php'      => 'contact.php',
];

$path = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$path = rawurldecode($path);
if ($path === '' || str_starts_with($path, '/api/')) {
    $path = '/';
}

// Local testing with `php -S localhost:8081 api/index.php`: let PHP serve the images itself.
if (PHP_SAPI === 'cli-server' && str_starts_with($path, '/assets/')) {
    return false;
}

chdir($web);

if (isset($pages[$path])) {
    require $web . '/' . $pages[$path];
    return;
}

// Anything else: a friendly 404 page in the site's own design.
require $root . '/includes/init.php';
http_response_code(404);
$page        = '';
$title       = 'Page not found — ' . SITE_NAME;
$description = '';
require INC . '/header.php';
?>
<section class="page-hero">
  <div class="container">
    <p class="eyebrow">404</p>
    <h1>That page doesn’t exist</h1>
    <p class="lede">The link may be old or mistyped. Head back to the home page or browse my work.</p>
    <div class="actions">
      <a class="btn btn-primary" href="index.php">Go home</a>
      <a class="btn btn-ghost" href="work.php">View my work</a>
    </div>
  </div>
</section>
<?php require INC . '/footer.php';
