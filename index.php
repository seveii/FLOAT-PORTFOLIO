<?php
$title = "Home";
include "header.php";
?>

<!-- The big cover picture. The picture itself is set in style.css (the .hero class).
     My title is inside the picture. -->
<div class="hero">
  <div class="hero-text">
    <h1>Rafael Joseph Nieves</h1>
    <div class="line"></div>
    <p class="role">Web and Graphic Designer</p>
    <a href="projects.php">See my projects</a>
    <a href="contact.php">Contact me</a>
  </div>
</div>

<div class="content">

  <!-- ---------- Welcome ---------- -->
  <h2>Welcome</h2>
  <p>
  Hi, I am Rafael. I design and build responsive websites, and I make the logos, posters and
  social media graphics that go with them, for small businesses, student organizations and
  personal brands. I study Computer Engineering, so I understand how things are built as well
  as how they look. I am open to freelance projects and internships.
  </p>
  <p>
  <b>Work made for:</b> Association of Computer Enthusiast Students, ICpEP,
  Dr. Yanga's Colleges, Inc. and Batch6 Coffee.
  </p>

  <!-- Four boxes in a row. The row is made with flexbox. -->
  <div class="boxes">
    <div class="box center">
      <b>4</b><br>semesters as Dean's Lister
    </div>
    <div class="box center">
      <b>4</b><br>student organization teams led
    </div>
    <div class="box center">
      <b>1st</b><br>place, ASEAN Exhibit Poster Making
    </div>
    <div class="box center">
      <b>3rd</b><br>year BS Computer Engineering
    </div>
  </div>

  <!-- ---------- What I do ---------- -->
  <h2>What I Do</h2>
  <p>Whether you need a website, a consistent look, or content for your page, I handle it from first idea to final files.</p>

  <!-- Three boxes in a row (flexbox) -->
  <div class="boxes">
    <div class="box">
      <h3>Web Design and Development</h3>
      <p>Clear, responsive websites that explain who you are and make it easy for people to get in touch.</p>
      <ul>
        <li>Landing pages and small business or organization sites</li>
        <li>Layouts that work on phones, tablets and desktops</li>
        <li>Contact forms and clear calls to action</li>
      </ul>
    </div>
    <div class="box">
      <h3>Graphic Design and Branding</h3>
      <p>Logos and print-ready layouts that look consistent, so your brand is recognised wherever it appears.</p>
      <ul>
        <li>Logos and alternate marks</li>
        <li>Posters, tarpaulins and event materials</li>
        <li>Newsletter and publication layouts</li>
      </ul>
    </div>
    <div class="box">
      <h3>Social Media and Multimedia Content</h3>
      <p>Announcements, campaign graphics and edited photo and video that keep your page active and on-brand.</p>
      <ul>
        <li>Announcement and event graphics for social media</li>
        <li>Campaign sets: posters, banners and vouchers</li>
        <li>Photo and video editing for event coverage</li>
      </ul>
    </div>
  </div>

  <!-- ---------- Recent projects ---------- -->
  <h2>Recent Projects</h2>

  <!-- The cards are laid out in 3 columns with CSS grid -->
  <div class="projects">
    <div class="card">
      <img src="images/whispr.svg" alt="Whispr preview">
      <h3>Whispr</h3>
      <p>An anonymous confession platform where every account still verifies back to one real person.</p>
    </div>
    <div class="card">
      <img src="images/oasis.webp" alt="OASIS preview">
      <h3>OASIS</h3>
      <p>Attendance and clearance for a college of computer studies. Students scan their ID at events and earn points.</p>
    </div>
    <div class="card">
      <img src="images/cpe-home.webp" alt="DYCI Computer Engineering website preview">
      <h3>DYCI Computer Engineering Website</h3>
      <p>A dark, circuit-board themed website for a college Computer Engineering program.</p>
    </div>
    <div class="card">
      <img src="images/game-title.webp" alt="Bayani Quest game title screen">
      <h3>Bayani Quest</h3>
      <p>A Filipino folklore game in the browser. Explore a barangay, catch mythical creatures and battle them.</p>
    </div>
    <div class="card">
      <img src="images/logo-collage.webp" alt="ACES and publication logos">
      <h3>ACES and Publication Logos</h3>
      <p>The ACES emblem, an alternate cherry-blossom mark, and logos for student publications.</p>
    </div>
    <div class="card">
      <img src="images/pubmat-grid.webp" alt="Event and social media graphics">
      <h3>Event and Social Media Graphics</h3>
      <p>Announcements, awareness days, exam reminders and tarpaulins for a college organization.</p>
    </div>
  </div>
  <p><a href="projects.php">View all projects</a></p>

  <!-- ---------- Certificates preview ---------- -->
  <h2>Certificates and Awards</h2>

  <!-- Four certificates in a row with CSS grid -->
  <div class="cert-grid">
    <div>
      <img src="images/cert-claude-engineers.webp" alt="Certificate: Claude for Engineers">
      <p>Claude for Engineers<br>tixu.ai, 17 October 2026</p>
    </div>
    <div>
      <img src="images/cert-chatgpt.webp" alt="Certificate: ChatGPT">
      <p>ChatGPT<br>tixu.ai, 3 October 2026</p>
    </div>
    <div>
      <img src="images/cert-achiever-honors-2023.webp" alt="Certificate: Academic Achiever Award, With Honors">
      <p>Academic Achiever Award, With Honors<br>Colegio de Sto. Niño, 25 May 2023</p>
    </div>
    <div>
      <img src="images/cert-academic-excellence-2023.webp" alt="Certificate: Certificate of Academic Excellence">
      <p>Certificate of Academic Excellence<br>Colegio de Sto. Niño, 25 May 2023</p>
    </div>
  </div>
  <p><a href="certificates.php">See all certificates</a></p>

  <!-- ---------- How I work ---------- -->
  <h2>How I Work</h2>

  <!-- Four steps in a row (flexbox) -->
  <div class="boxes">
    <div class="box">
      <h3>1. Discover</h3>
      <p>We talk about your goals, your audience and what you already have: a logo, content, examples you like.</p>
    </div>
    <div class="box">
      <h3>2. Plan</h3>
      <p>I send a short outline or concept direction. We agree on what will be made before any design starts.</p>
    </div>
    <div class="box">
      <h3>3. Design and Build</h3>
      <p>I share drafts as I go, you give feedback, and I refine until it is right.</p>
    </div>
    <div class="box">
      <h3>4. Deliver</h3>
      <p>You get the final files or the finished site, plus a handover so you can use it with confidence.</p>
    </div>
  </div>

  <!-- ---------- Call to action ---------- -->
  <div class="cta">
    <h2>Have a project in mind?</h2>
    <p>Tell me what you need and who it is for. I will reply by email with next steps.</p>
    <a class="button" href="contact.php">Start a project</a>
  </div>

</div>

<?php include "footer.php"; ?>
