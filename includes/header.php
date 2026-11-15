<?php
defined('SITE_NAME') or exit; // never run this file directly

/*
 * SHARED HEADER — includes/header.php
 * ----------------------------------------------------------------------------
 * Every page starts with this file (require INC . '/header.php'). It prints:
 *   1. the HTTP security headers,
 *   2. the <head> of the document (title, mobile setup, fonts, stylesheet),
 *   3. the site header with the logo and the menu,
 *   4. the opening <main> tag (footer.php closes it).
 * Because it is written once, changing the menu here changes all 7 pages.
 */

/**
 * Expects these variables from the page that includes it:
 *   $page         which nav link is active: home | services | work | about | contact
 *   $title        text for the browser tab
 *   $description  short summary for search engines
 *   $cover        true on the home page: the header floats on top of the full-screen photo
 */
// "??" means: use the value the page set, otherwise use the default after it.
$cover       = $cover ?? false;
$page        = $page ?? '';
$title       = $title ?? SITE_NAME . ' — ' . SITE_ROLE;
$description = $description ?? '';

// HTTP headers are sent to the browser before the page. They are security settings:
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
<?php /* lang="en" tells browsers and screen readers the page language */ ?>
<html lang="en">
<head>
<meta charset="UTF-8">
<?php /* The viewport tag is what makes the site RESPONSIVE on phones: without it, a phone would show a zoomed-out desktop page. */ ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php /* The <title> is different on each page; the page sets $title and e() escapes it. */ ?>
<title><?= e($title) ?></title>
<?php if ($description !== ''): ?>
<meta name="description" content="<?= e($description) ?>">
<?php endif; ?>
<meta name="theme-color" content="#0d6a6e">
<?php /* The favicon is the small icon in the browser tab */ ?>
<link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
<?php /* Fonts: preconnect warms up the connection to Google Fonts, then the stylesheet loads the two fonts we use */ ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,600;12..96,700&amp;family=Figtree:wght@400;500;600&amp;display=swap">
<?php /* ONE external stylesheet styles all the pages. It is linked here, so every page gets it. */ ?>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<?php /* On the home page <body> gets class="has-cover" so CSS can make the header transparent over the photo */ ?>
<body<?= $cover ? ' class="has-cover"' : '' ?>>
<?php /* A "skip link" for keyboard users: the first Tab press jumps past the menu straight to the content (#main) */ ?>
<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header">
  <div class="container bar">
    <a class="brand" href="index.php">
      <?php /* alt="" because the logo is decoration: the name next to it already says it */ ?>
      <img class="brand-mark" src="assets/logo/rn-emblem.svg" width="44" height="44" alt="">
      <span class="brand-name"><?= e(SITE_SHORT) ?></span>
    </a>

    <!-- Mobile menu: a hidden checkbox + label, so no JavaScript is needed -->
    <?php /* HOW THE PHONE MENU WORKS: tapping the label ticks the hidden checkbox, and CSS (the :checked selector) shows the menu. No JavaScript. */ ?>
    <input type="checkbox" id="menu-toggle" class="menu-toggle" aria-label="Open or close the menu">
    <label for="menu-toggle" class="menu-btn"><span class="menu-icon" aria-hidden="true"></span><span class="sr-only">Menu</span></label>

    <?php /* The menu is a <nav> holding a <ul> list of links. nav_attr() adds class="active" to the link of the page we are on. */ ?>
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

<?php /* The page content goes inside <main>. footer.php closes it. */ ?>
<main id="main">
