<?php
$title = "Home";
include "header.php";
?>

<!-- The big cover picture. The picture itself is set in style.css (the .hero class). -->
<div class="hero">
  <div class="hero-text">
    <h1>Rafael Joseph Nieves</h1>
    <p>Web and Graphic Designer</p>
    <a class="button" href="projects.php">See my projects</a>
    <a class="button" href="contact.php">Contact me</a>
  </div>
</div>

<div class="content">

  <h2>Welcome</h2>
  <p>
  Hi, I am Rafael. I am a third-year Computer Engineering student. I design and build
  websites, and I make logos, posters and social media graphics for small businesses,
  student organizations and personal brands. I am open to freelance projects and internships.
  </p>

  <!-- Four boxes in a row. The row is made with flexbox. -->
  <div class="boxes">
    <div class="box">
      <b>4</b><br>semesters as Dean's Lister
    </div>
    <div class="box">
      <b>4</b><br>student organization teams led
    </div>
    <div class="box">
      <b>1st</b><br>place, ASEAN Exhibit Poster Making
    </div>
    <div class="box">
      <b>3rd</b><br>year BS Computer Engineering
    </div>
  </div>

  <h2>Photos</h2>

  <!-- Three photos in a row. The row is made with flexbox. -->
  <div class="photos">
    <img src="images/moment-rooftop.webp" alt="Rafael on a rooftop terrace at night">
    <img src="images/cover-river.webp" alt="Rafael relaxing beside a river">
    <img src="images/moment-workshop.webp" alt="Rafael working on a laptop at a seminar">
  </div>

</div>

<?php include "footer.php"; ?>
