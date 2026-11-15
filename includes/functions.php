<?php
defined('SITE_NAME') or exit; // never run this file directly

/*
 * HELPER FUNCTIONS — includes/functions.php
 * ----------------------------------------------------------------------------
 * A function is a block of code with a name that we write once and call many times.
 * These small helpers keep the page files short and tidy:
 *
 *   e()             make text safe to print inside HTML
 *   img()           write a responsive <img> tag
 *   find_project()  look up one project by its slug
 *   project_url()   build the link to a project page
 *   nav_attr()      mark the current page in the menu
 *   project_card()  build one project card (used by the home and Work pages)
 */

/** Escape text for safe output inside HTML. Use on EVERYTHING that is printed. */
// WHY: if text contained < or " it could break the page layout (or be used for an
// attack called XSS). htmlspecialchars() turns those characters into harmless codes
// such as &lt; and &quot;, so the browser shows them as plain text.
function e(?string $text): string
{
    return htmlspecialchars((string) $text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Print a responsive <img>. Looks for assets/img/NAME.svg, or NAME.webp (+ NAME-sm.webp).
 * Options: class, sizes, loading (lazy|eager), priority (true for the main hero image).
 */
// WHAT IT DOES: we only pass the image name (for example 'oasis'). The function finds
// the file, reads its real width and height, and builds the <img> tag. This gives us:
//   - width/height  → the browser reserves space, so the page does not jump while loading
//   - srcset/sizes  → responsive images: phones download the small copy (-sm.webp),
//                     larger screens download the full copy
//   - loading="lazy" → images below the first screen load only when you scroll to them
function img(string $name, string $alt, array $o = []): string
{
    static $cache = []; // remembers image sizes so each file is measured only once
    $dir = __DIR__ . '/../public/assets/img/';
    $class = isset($o['class']) ? ' class="' . e($o['class']) . '"' : '';
    $loading = ($o['loading'] ?? 'lazy') === 'eager' ? '' : ' loading="lazy" decoding="async"';
    $priority = !empty($o['priority']) ? ' fetchpriority="high"' : '';
    // Optional focal point for cropped photos, e.g. '50% 40%' (only letters, digits, %, space, dot).
    $pos = isset($o['pos']) && preg_match('/^[0-9.% ]{1,20}$/', $o['pos'])
        ? ' style="object-position: ' . $o['pos'] . '"' : '';

    // SVG images (logos) scale to any size, so they need no srcset.
    if (is_file($dir . $name . '.svg')) {
        return '<img src="assets/img/' . e($name) . '.svg" alt="' . e($alt) . '" width="640" height="400"'
            . $class . $loading . $priority . '>';
    }

    $full = $dir . $name . '.webp';
    if (!is_file($full)) {
        return '<!-- missing image: ' . e($name) . ' -->';
    }
    $cache[$full] ??= getimagesize($full) ?: [0, 0];
    [$w, $h] = $cache[$full];

    // If a smaller copy exists, list both files so the browser can choose (srcset).
    $srcset = '';
    $small = $dir . $name . '-sm.webp';
    if (is_file($small)) {
        $cache[$small] ??= getimagesize($small) ?: [0, 0];
        if ($cache[$small][0] > 0 && $cache[$small][0] < $w) {
            $srcset = ' srcset="assets/img/' . e($name) . '-sm.webp ' . $cache[$small][0] . 'w, '
                . 'assets/img/' . e($name) . '.webp ' . $w . 'w"'
                . ' sizes="' . e($o['sizes'] ?? '(min-width: 900px) 33vw, 100vw') . '"';
        }
    }

    return '<img src="assets/img/' . e($name) . '.webp"' . $srcset
        . ' alt="' . e($alt) . '" width="' . $w . '" height="' . $h . '"'
        . $class . $pos . $loading . $priority . '>';
}

/** Find a project by its slug (only slugs that exist in data.php are ever accepted). */
// Used by project.php: the address project.php?slug=oasis asks for the project whose
// slug is "oasis". If no project matches, it returns null and the page shows "not found".
function find_project(array $projects, string $slug): ?array
{
    foreach ($projects as $p) {
        if ($p['slug'] === $slug) {
            return $p;
        }
    }
    return null;
}

/** Link to a project page. */
// rawurlencode() makes the slug safe to place inside a web address.
function project_url(array $project): string
{
    return 'project.php?slug=' . rawurlencode($project['slug']);
}

/** Add class="active" + aria-current to the nav link for the current page. */
// The ternary "condition ? a : b" returns a when true, b when false. CSS then
// highlights the link that has class="active".
function nav_attr(string $current, string $page): string
{
    return $current === $page ? ' class="active" aria-current="page"' : '';
}

/** One project card (used on the home page and the work page). */
// WHY a function: the card HTML is written once here. Changing the card design
// changes it on every page that shows projects.
function project_card(array $p): string
{
    // 'cover' fills the card with the image (photos); 'contain' shows the whole image (logos, posters).
    $fit = $p['fit'] === 'cover' ? 'fit-cover' : 'fit-contain';
    return '<article class="project-card">'
        . '<a class="project-link" href="' . e(project_url($p)) . '">'
        . '<div class="project-media ' . $fit . '">'
        . img($p['cover'], $p['title'] . ' preview', ['sizes' => '(min-width: 900px) 33vw, (min-width: 600px) 50vw, 100vw', 'pos' => $p['pos'] ?? ''])
        . '</div>'
        . '<div class="project-body">'
        . '<p class="project-cat">' . e($p['category']) . '</p>'
        . '<h3>' . e($p['title']) . '</h3>'
        . '<p class="project-sum">' . e($p['summary']) . '</p>'
        . '<span class="project-more">View project <span aria-hidden="true">&rarr;</span></span>'
        . '</div></a></article>';
}
