<?php
/*
 * HOME PAGE (the landing page) — index.php
 * ----------------------------------------------------------------------------
 * HOW THIS PAGE IS BUILT (read top to bottom, it follows the page on screen):
 *
 *   1. PHP part (this block): load the shared code, then set the page's details.
 *   2. header.php   → the <head>, the logo and the menu (shared by every page).
 *   3. The sections → cover, intro, services, projects, certificates, process,
 *                     call to action. Each one is a <section> element.
 *   4. footer.php   → the footer and the closing tags (shared by every page).
 *
 * WHY PHP? The header and footer are written ONCE and reused on all 7 pages, and
 * the content (services, projects, certificates) lives in includes/data.php.
 * The page loops over that data with foreach, so we do not retype the same HTML
 * for every card. To change a project we edit data.php, not this file.
 *
 * Only HTML, CSS and PHP are used: there is no JavaScript anywhere on the site.
 */

// bootstrap.php loads three things for us: the settings (config.php), the helper
// functions (functions.php, for example e() and img()) and the content (data.php).
require __DIR__ . '/../includes/bootstrap.php';

// These variables are read by header.php to fill in the page's <title>, the
// search-engine description and the highlighted menu link.
$page        = 'home';
$cover       = true; // the header floats over the full-screen photo
$title       = SITE_NAME . ' — ' . SITE_ROLE;
$description = 'Web and graphic designer and Computer Engineering student in Marilao, Bulacan. Websites, logos, posters and social media graphics for small businesses, organizations and personal brands.';

// Print everything from <!DOCTYPE html> down to the opening <main> tag.
require INC . '/header.php';
?>

<?php /*
 * SECTION 1: COVER (the first screen a visitor sees)
 * - The whole screen is one photo with the name, role and two buttons on top.
 * - <picture> is "responsive images": phones (up to 700px wide) download a
 *   portrait photo, bigger screens download the wide photo. The browser picks one.
 * - width/height on the <img> reserve the space, so the page does not jump while
 *   the image loads. alt="..." describes the image for screen readers.
 * - fetchpriority="high" tells the browser to load this image first because it is
 *   the biggest thing on the screen.
 * - The photo and the dark shade are positioned with CSS (see style.css, part 5).
 */ ?>
<!-- COVER: the whole first screen is the photo. Phones get the portrait photo, larger screens the wide one. -->
<section class="cover" aria-label="Introduction">
  <picture>
    <source media="(max-width: 700px)" srcset="assets/img/awards-presidents-list.webp">
    <img class="cover-photo" src="assets/img/cover-pool.webp" width="1400" height="1050"
         alt="Rafael Joseph Nieves" fetchpriority="high">
  </picture>
  <?php /* aria-hidden="true": this empty div is only decoration (a dark gradient so the text is readable), so screen readers skip it */ ?>
  <div class="cover-shade" aria-hidden="true"></div>

  <?php /* .container keeps the text in a centered column (max 1160px); the name, role, tags and buttons are normal HTML placed over the photo by CSS */ ?>
  <div class="container cover-content">
    <p class="badge badge-dark"><span class="badge-dot" aria-hidden="true"></span>Open to freelance projects and internships</p>
    <?php /* One <h1> per page (good for accessibility and search engines). Each <span> sits on its own line. */ ?>
    <h1><span>Rafael Joseph</span> <span>Nieves</span></h1>
    <?php /* e() is our safety helper: it escapes special characters so text can never break the HTML. SITE_ROLE and SITE_LOCATION come from config.php. */ ?>
    <p class="cover-role"><?= e(SITE_ROLE) ?> &middot; <?= e(SITE_LOCATION) ?></p>

    <?php /* A <ul> list styled as small rounded "pills" in CSS (flexbox) */ ?>
    <ul class="cover-tags" aria-label="About me in brief">
      <li>3rd-year BS Computer Engineering</li>
      <li>Dean’s Lister</li>
      <li>PRO, ICpEP</li>
    </ul>

    <?php /* Two call-to-action buttons. They are normal links (<a>) that CSS makes look like buttons. */ ?>
    <div class="actions">
      <a class="btn btn-accent" href="work.php">See my work</a>
      <a class="btn btn-light" href="contact.php">Start a project</a>
    </div>
  </div>

  <?php /* href="#intro" is a "fragment link": it scrolls down to the element whose id is "intro" (the next section) */ ?>
  <a class="cover-scroll" href="#intro"><span>Scroll</span><i aria-hidden="true"></i></a>
</section>

<?php /*
 * SECTION 2: INTRO
 * - Two columns made with CSS Grid (.intro-grid): headline on the left, text on the right.
 *   On screens narrower than 900px the grid becomes one column (a media query).
 * - The highlights list is a PHP foreach loop over $facts (defined in data.php),
 *   so adding a highlight means adding one line of data, not new HTML.
 */ ?>
<section class="section section-tight" id="intro">
  <div class="container">
    <div class="intro-grid">
      <div>
        <p class="eyebrow">Hello</p>
        <h2 class="intro-title">Websites and visuals that make your work easy to trust.</h2>
      </div>
      <div>
        <p class="lede">I design and build responsive websites, and create the logos, posters and social media graphics that go with them, for small businesses, student organizations and personal brands. I study Computer Engineering, so I understand how things are built as well as how they look.</p>
        <ul class="ticks highlights" aria-label="Highlights">
          <?php /* foreach repeats the <li> once for every item in the $facts array */ ?>
          <?php foreach ($facts as $fact): ?>
          <li><?= e($fact) ?></li>
          <?php endforeach; ?>
        </ul>
        <a class="text-link" href="about.php">More about me <span aria-hidden="true">&rarr;</span></a>
      </div>
    </div>
  </div>
</section>

<?php /* "WORK MADE FOR": a thin strip that lists the organizations (names come from $worked_with in data.php). It is a flexbox row in CSS. */ ?>
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

<?php /*
 * SECTION 3: SERVICES (three cards)
 * - .grid-3 is a CSS Grid that fits as many columns as the screen allows
 *   (3 on desktop, 2 on tablets, 1 on phones) without any extra media query.
 * - One <article> template is repeated for each service in the $services array.
 * - array_slice($s['gets'], 0, 3) takes only the first 3 bullet points so the cards stay short.
 * - The "Learn more" link goes to services.php#web (or #graphic, #content):
 *   the part after # jumps to that section on the Services page.
 */ ?>
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

<?php /*
 * SECTION 4: RECENT PROJECTS (six cards)
 * - project_card() is a function in functions.php that builds one card
 *   (image, category, title, summary, link). The home page and the Work page both
 *   use it, so a card looks the same everywhere and is written only once.
 * - array_slice($projects, 0, 6) shows only the first six projects here;
 *   the Work page shows all of them.
 */ ?>
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

<?php /*
 * SECTION 5: CERTIFICATES PREVIEW
 * - Four thumbnails (the first two of each group) that link to the full Certificates page.
 * - img() (functions.php) writes the <img> tag for us: it finds the image file,
 *   reads its real width and height, and adds srcset so phones load the small copy.
 */ ?>
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
      // The two nested loops go through each group, then through its first two items.
      // [$file, $name, $issuer, $date] unpacks one certificate's details into variables.
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

<?php /*
 * SECTION 6: PROCESS (4 steps)
 * - An ORDERED list (<ol>) because the steps happen in order.
 * - $i starts at 0, so the visible number is $i + 1 (1, 2, 3, 4).
 */ ?>
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

<?php /* SECTION 7: CALL TO ACTION — one clear last message and one big button. The same band is reused at the bottom of the other pages. */ ?>
<section class="cta-band">
  <div class="container cta-inner">
    <div>
      <h2>Have a project in mind?</h2>
      <p>Tell me what you need and who it’s for. I’ll reply by email with next steps.</p>
    </div>
    <a class="btn btn-accent" href="contact.php">Start a project</a>
  </div>
</section>

<?php /* Print the footer and the closing </main>, </body> and </html> tags. */ ?>
<?php require INC . '/footer.php'; ?>
