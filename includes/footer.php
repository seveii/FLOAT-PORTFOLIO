<?php defined('SITE_NAME') or exit; // never run this file directly ?>
<?php /*
 * SHARED FOOTER — includes/footer.php
 * Every page ends with this file. It closes the <main> that header.php opened, then prints
 * the footer: the logo, a page list, contact links, and the copyright line. The text comes
 * from the settings in config.php, so we change it in one place.
 */ ?>
</main>

<footer class="site-footer">
  <?php /* .footer-grid is a CSS Grid: three columns on desktop, stacked on phones */ ?>
  <div class="container footer-grid">
    <div class="footer-about">
      <a class="brand brand-light" href="index.php">
        <img class="brand-mark" src="assets/logo/rn-emblem.svg" width="44" height="44" alt="">
        <span class="brand-name"><?= e(SITE_NAME) ?></span>
      </a>
      <p><?= e(SITE_ROLE) ?> based in <?= e(SITE_LOCATION) ?>. Available for freelance projects and internships.</p>
    </div>

    <nav class="footer-col" aria-label="Footer">
      <h2>Pages</h2>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="work.php">Work</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="certificates.php">Certificates</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>

    <div class="footer-col">
      <h2>Get in touch</h2>
      <ul>
        <?php /* mailto: opens the visitor's email app. The social links come from the SOCIAL list in config.php and open in a new tab. */ ?>
        <li><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></li>
        <?php foreach (SOCIAL as $label => $url): ?>
        <li><a href="<?= e($url) ?>" target="_blank" rel="noopener noreferrer"><?= e($label) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <div class="container footer-base">
    <?php /* date('Y') prints the current year, so the copyright year updates by itself */ ?>
    <p>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?></p>
  </div>
</footer>
</body>
</html>
