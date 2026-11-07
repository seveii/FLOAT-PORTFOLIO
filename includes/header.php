<?php
defined('SITE_NAME') or exit; // never run this file directly

/**
 * Expects these variables from the page that includes it:
 *   $page         which nav link is active: home | services | work | about | contact
 *   $title        text for the browser tab
 *   $description  short summary for search engines
 *   $cover        true on the home page: the header floats on top of the full-screen photo
 */
$cover       = $cover ?? false;
$page        = $page ?? '';
$title       = $title ?? SITE_NAME . ' — ' . SITE_ROLE;
$description = $description ?? '';

header('Content-Type: text/html; charset=UTF-8');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('Referrer-Policy: strict-origin-when-cross-origin');
// The site uses no JavaScript, so scripts are blocked entirely.
header("Content-Security-Policy: default-src 'self'; script-src 'none'; object-src 'none'; "
    . "style-src 'self' https://fonts.googleapis.com; font-src https://fonts.gstatic.com; "
    . "img-src 'self' data:; form-action 'self'; base-uri 'self'; frame-ancestors 'self'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($title) ?></title>
<?php if ($description !== ''): ?>
<meta name="description" content="<?= e($description) ?>">
<?php endif; ?>
<meta name="theme-color" content="#0d6a6e">
<link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,600;12..96,700&amp;family=Figtree:wght@400;500;600&amp;display=swap">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body<?= $cover ? ' class="has-cover"' : '' ?>>
<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header">
  <div class="container bar">
    <a class="brand" href="index.php">
      <img class="brand-mark" src="assets/logo/rn-emblem.svg" width="44" height="44" alt="">
      <span class="brand-name"><?= e(SITE_SHORT) ?></span>
    </a>

    <!-- Mobile menu: a hidden checkbox + label, so no JavaScript is needed -->
    <input type="checkbox" id="menu-toggle" class="menu-toggle" aria-label="Open or close the menu">
    <label for="menu-toggle" class="menu-btn"><span class="menu-icon" aria-hidden="true"></span><span class="sr-only">Menu</span></label>

    <nav class="site-nav" aria-label="Main">
      <ul>
        <li><a href="index.php"<?= nav_attr($page, 'home') ?>>Home</a></li>
        <li><a href="services.php"<?= nav_attr($page, 'services') ?>>Services</a></li>
        <li><a href="work.php"<?= nav_attr($page, 'work') ?>>Work</a></li>
        <li><a href="about.php"<?= nav_attr($page, 'about') ?>>About</a></li>
        <li><a href="certificates.php"<?= nav_attr($page, 'certificates') ?>>Certificates</a></li>
        <li><a href="contact.php"<?= nav_attr($page, 'contact') ?>>Contact</a></li>
      </ul>
      <a class="btn btn-primary nav-cta" href="contact.php">Start a project</a>
    </nav>
  </div>
</header>

<main id="main">
