<?php
require __DIR__ . '/includes/bootstrap.php';

$page        = 'about';
$title       = 'About — ' . SITE_NAME;
$description = 'Third-year Computer Engineering student, Dean’s Lister and student leader who builds websites and designs brand visuals. Experience, education, awards and skills.';

require INC . '/header.php';
?>

<section class="page-hero">
  <div class="container">
    <p class="eyebrow">About</p>
    <h1>A designer who also understands how things are built</h1>
  </div>
</section>

<section class="section section-tight">
  <div class="container">
    <div class="about-intro">
      <!-- The photo floats left and the text wraps around it -->
      <figure class="about-portrait">
        <?= img('awards-presidents-list', 'Rafael Joseph Nieves holding two President’s List certificates', ['loading' => 'eager', 'sizes' => '(min-width: 700px) 320px, 80vw']) ?>
      </figure>

      <p class="about-lead">Hi, I’m Rafael. I’m a third-year Computer Engineering student at Dr. Yanga’s Colleges and a consistent Dean’s Lister.</p>
      <p>I combine technical skills with a designer’s eye. I build websites, and I design the logos, posters and content that make an organization look professional and consistent.</p>
      <p>For the past few years I have led multimedia and communications for student organizations. I was Multimedia Director of the Association of Computer Enthusiast Students, and I am now the Public Relations Officer of ICpEP. That means real deadlines, real audiences and teams relying on the work.</p>
      <p>I also use AI tools such as Claude, ChatGPT and Lovable for research, coding and image and video ideas. They speed up the early steps, but the final design decisions are mine.</p>
      <p>Away from the screen you’ll find me café hopping, travelling to places I love, and playing the occasional online game.</p>

      <dl class="glance">
        <div><dt>Based in</dt><dd><?= e(SITE_LOCATION) ?></dd></div>
        <div><dt>Studying</dt><dd>BS Computer Engineering, 3rd year</dd></div>
        <div><dt>Focus</dt><dd>Web design, graphic design, social media content</dd></div>
        <div><dt>Availability</dt><dd>Freelance projects and internships</dd></div>
      </dl>
    </div>
  </div>
</section>

<section class="section section-tint">
  <div class="container">
    <header class="section-head">
      <p class="eyebrow">Experience</p>
      <h2>Leadership and organizations</h2>
    </header>

    <ol class="timeline">
      <?php foreach ($experience as $job): ?>
      <li>
        <p class="timeline-dates"><?= e($job['dates']) ?></p>
        <h3><?= e($job['role']) ?></h3>
        <p class="timeline-org"><?= e($job['org']) ?></p>
        <ul class="ticks">
          <?php foreach ($job['items'] as $item): ?>
          <li><?= e($item) ?></li>
          <?php endforeach; ?>
        </ul>
      </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="grid-3 records">
      <div>
        <h2>Education</h2>
        <ul class="record-list">
          <?php foreach ($education as [$dates, $name, $school, $note]): ?>
          <li>
            <p class="record-date"><?= e($dates) ?></p>
            <h3><?= e($name) ?></h3>
            <p><?= e($school) ?></p>
            <p class="record-note"><?= e($note) ?></p>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div>
        <h2>Awards</h2>
        <ul class="record-list">
          <?php foreach ($awards as [$date, $name, $org]): ?>
          <li>
            <p class="record-date"><?= e($date) ?></p>
            <h3><?= e($name) ?></h3>
            <p><?= e($org) ?></p>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div>
        <h2>Certifications</h2>
        <ul class="record-list">
          <?php foreach ($certifications as [$date, $name, $org]): ?>
          <li>
            <p class="record-date"><?= e($date) ?></p>
            <h3><?= e($name) ?></h3>
            <p><?= e($org) ?></p>
          </li>
          <?php endforeach; ?>
        </ul>
        <p class="records-link"><a class="text-link" href="certificates.php">View all certificate scans <span aria-hidden="true">&rarr;</span></a></p>
      </div>
    </div>
  </div>
</section>

<section class="section section-tint">
  <div class="container">
    <header class="section-head">
      <p class="eyebrow">Skills</p>
      <h2>What I work with</h2>
    </header>

    <div class="skills-grid">
      <?php foreach ($skills as $group => $items): ?>
      <div class="skill-group">
        <h3><?= e($group) ?></h3>
        <ul class="chips">
          <?php foreach ($items as $item): ?>
          <li><?= e($item) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <header class="section-head">
      <p class="eyebrow">Beyond the screen</p>
      <h2>A few moments</h2>
      <p class="section-lede">Travel, café nights and work at events: the things that keep me curious.</p>
    </header>

    <ul class="moments">
      <li class="moment-wide"><figure><?= img('moment-rooftop', 'Rafael seated on a rooftop terrace at night with city lights behind', ['sizes' => '(min-width: 900px) 50vw, 100vw']) ?><figcaption>Rooftop evenings</figcaption></figure></li>
      <li><figure><?= img('cover-river', 'Rafael relaxing in a camp chair beside a river', ['sizes' => '(min-width: 900px) 25vw, 50vw']) ?><figcaption>Travelling to places I love</figcaption></figure></li>
      <li><figure><?= img('moment-city-night', 'Rafael leaning on a glass railing facing a lit-up city at night', ['sizes' => '(min-width: 900px) 25vw, 50vw']) ?><figcaption>City lights</figcaption></figure></li>
      <li><figure><?= img('moment-workshop', 'Rafael working on a laptop at a seminar table', ['sizes' => '(min-width: 900px) 25vw, 50vw']) ?><figcaption>At work during an event</figcaption></figure></li>
    </ul>
  </div>
</section>

<section class="cta-band">
  <div class="container cta-inner">
    <div>
      <h2>Let’s work together</h2>
      <p>Tell me about your project and I’ll get back to you by email.</p>
    </div>
    <a class="btn btn-accent" href="contact.php">Start a project</a>
  </div>
</section>

<?php require INC . '/footer.php'; ?>
