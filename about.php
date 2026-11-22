<?php
$title = "About";
include "header.php";
?>

<div class="content">

  <h2>About Me</h2>

  <!-- The picture floats to the left (style.css, .portrait) so the text wraps around it. -->
  <img class="portrait" src="images/awards-presidents-list.webp" alt="Rafael holding two President's List certificates">

  <p>
  I am a third-year Computer Engineering student at Dr. Yanga's Colleges, Inc. in Marilao,
  Bulacan. I combine technical skills with a designer's eye. I build websites, and I design
  the logos, posters and content that make an organization look professional.
  </p>

  <p>
  For the past few years I have led multimedia and communications for student organizations.
  I was Multimedia Director of the Association of Computer Enthusiast Students, and I am now
  the Public Relations Officer of ICpEP.
  </p>

  <p>
  Away from the screen you will find me hopping from cafe to cafe, travelling to places I
  love, and relaxing with friends.
  </p>

  <div class="clear"></div>

  <!-- Two columns made with CSS grid -->
  <div class="two-columns">

    <div>
      <h2>Education</h2>
      <ul>
        <li>Aug 2024 - Present: BS Computer Engineering, Dr. Yanga's Colleges, Inc.</li>
        <li>Aug 2023 - May 2024: BS Computer Science, STI College Caloocan</li>
        <li>Jun 2021 - May 2023: Senior High School (STEM), Colegio de Sto. Nino</li>
      </ul>

      <h2>Skills</h2>
      <ul>
        <li>Design: graphic design, logos, photo editing, video editing, Canva</li>
        <li>Web: HTML, CSS, PHP, Git and GitHub</li>
        <li>People: event coordination, public relations, teamwork</li>
      </ul>
    </div>

    <div>
      <h2>Experience</h2>
      <ul>
        <li>Aug 2026 - Present: Public Relations Officer, ICpEP</li>
        <li>Sep 2024 - Jul 2025: Multimedia Director, ACES</li>
        <li>Aug 2023 - Jun 2024: Multimedia Editor, ACES</li>
        <li>Jun 2022 - Aug 2023: Committee Chair, SSLG</li>
      </ul>
    </div>

  </div>

  <h2>More Photos</h2>

  <!-- A photo gallery made with CSS grid (2 columns) -->
  <div class="gallery">
    <img src="images/moment-city-night.webp" alt="Rafael leaning on a glass railing facing a lit-up city at night">
    <img src="images/moment-workshop.webp" alt="Rafael working on a laptop at a seminar table">
    <img src="images/cover-river.webp" alt="Rafael relaxing in a camp chair beside a river">
    <img src="images/moment-rooftop.webp" alt="Rafael seated on a rooftop terrace at night">
  </div>

</div>

<?php include "footer.php"; ?>
