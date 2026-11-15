<?php
defined('SITE_NAME') or exit; // never run this file directly

/** Escape text for safe output inside HTML. Use on EVERYTHING that is printed. */
function e(?string $text): string
{
    return htmlspecialchars((string) $text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Print a responsive <img>. Looks for assets/img/NAME.svg, or NAME.webp (+ NAME-sm.webp).
 * Options: class, sizes, loading (lazy|eager), priority (true for the main hero image).
 */
function img(string $name, string $alt, array $o = []): string
{
    static $cache = [];
    $dir = __DIR__ . '/../public/assets/img/';
    $class = isset($o['class']) ? ' class="' . e($o['class']) . '"' : '';
    $loading = ($o['loading'] ?? 'lazy') === 'eager' ? '' : ' loading="lazy" decoding="async"';
    $priority = !empty($o['priority']) ? ' fetchpriority="high"' : '';
    // Optional focal point for cropped photos, e.g. '50% 40%' (only letters, digits, %, space, dot).
    $pos = isset($o['pos']) && preg_match('/^[0-9.% ]{1,20}$/', $o['pos'])
        ? ' style="object-position: ' . $o['pos'] . '"' : '';

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
function project_url(array $project): string
{
    return 'project.php?slug=' . rawurlencode($project['slug']);
}

/** Add class="active" + aria-current to the nav link for the current page. */
function nav_attr(string $current, string $page): string
{
    return $current === $page ? ' class="active" aria-current="page"' : '';
}

/** One project card (used on the home page and the work page). */
function project_card(array $p): string
{
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
