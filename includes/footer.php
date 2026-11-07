<?php defined('SITE_NAME') or exit; // never run this file directly ?>
</main>

<footer class="site-footer">
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
        <li><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></li>
        <?php foreach (SOCIAL as $label => $url): ?>
        <li><a href="<?= e($url) ?>" target="_blank" rel="noopener noreferrer"><?= e($label) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <div class="container footer-base">
    <p>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?></p>
  </div>
</footer>
</body>
</html>
