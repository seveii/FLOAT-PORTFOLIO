<?php
$title = "About";
include "header.php";
?>

<!-- Banner sa taas, may picture at yung title ko sa loob (style.css, .banner) -->
<div class="banner about-banner">
  <div class="banner-text">
    <h1>About Me</h1>
    <div class="line"></div>
    <p>Computer Engineering student, designer and student leader</p>
  </div>
</div>

<div class="content">

  <!-- Naka-float to the left yung picture (style.css, .portrait), kaya yung text, umiikot sa gilid niya. -->
  <img class="portrait" src="images/awardspresidentslist.webp" alt="Rafael holding two President's List certificates">

  <p>
  Hi, I'm Rafael. I'm a third-year Computer Engineering student at Dr. Yanga's Colleges, Inc.
  in Marilao, Bulacan, and a consistent Dean's Lister.
  </p>

  <p>
  I combine technical skills with a designer's eye. I build websites, and I design the logos,
  posters and content that make an organization look professional and consistent.
  </p>

  <p>
  For the past few years I have led multimedia and communications for student organizations.
  I was Multimedia Director of the Association of Computer Enthusiast Students, and I am now
  the Public Relations Officer of ICpEP. That means real deadlines, real audiences and teams
  relying on the work.
  </p>

  <p>
  I also use AI tools such as Claude, ChatGPT and Lovable for research, coding and image and
  video ideas. They speed up the early steps, but the final design decisions are mine.
  </p>

  <p>
  Away from the screen you will find me hopping from cafe to cafe, travelling to places I
  love, and relaxing with friends.
  </p>

  <div class="clear"></div>

  <!-- Quick facts na magkakatabi (flexbox) -->
  <div class="boxes">
    <div class="box center"><b>Based in</b><br>Marilao, Bulacan, Philippines</div>
    <div class="box center"><b>Studying</b><br>BS Computer Engineering, 3rd year</div>
    <div class="box center"><b>Focus</b><br>Web design, graphic design, social media content</div>
    <div class="box center"><b>Availability</b><br>Freelance projects and internships</div>
  </div>

  <h2>Leadership and Organizations</h2>

  <!-- Two columns, CSS grid yung gamit. Bawat role, may sarili niyang card. -->
  <div class="two-columns">

    <div class="card">
      <h3>Public Relations Officer, ICpEP</h3>
      <p><i>Aug 2026 - Present. Institute of Computer Engineers of the Philippines</i></p>
      <ul>
        <li>Manage the chapter's official announcements and social media communications.</li>
        <li>Promote seminars, events and activities to Computer Engineering students.</li>
        <li>Coordinate with fellow officers to keep members informed and engaged.</li>
      </ul>
    </div>

    <div class="card">
      <h3>Multimedia Director, ACES</h3>
      <p><i>Sep 2024 - Jul 2025. Association of Computer Enthusiast Students</i></p>
      <ul>
        <li>Led the multimedia team in producing publication materials, photos and videos for events.</li>
        <li>Oversaw the organization's visual branding and social media content.</li>
        <li>Documented and covered school and organization activities.</li>
      </ul>
    </div>

    <div class="card">
      <h3>Multimedia Editor, ACES</h3>
      <p><i>Aug 2023 - Jun 2024. Association of Computer Enthusiast Students</i></p>
      <ul>
        <li>Edited photos and videos for event coverage and social media posts.</li>
        <li>Designed publication materials for announcements and events.</li>
      </ul>
    </div>

    <div class="card">
      <h3>Committee Chair, SSLG</h3>
      <p><i>Jun 2022 - Aug 2023. Supreme Student Legislative Government</i></p>
      <ul>
        <li>Led a committee in planning and carrying out student government projects.</li>
        <li>Coordinated with officers and advisers to address student concerns.</li>
      </ul>
    </div>

  </div>

  <h2>Education, Awards and Certifications</h2>

  <!-- Three columns, CSS grid yung gamit -->
  <div class="three-columns">

    <div class="card">
      <h3>Education</h3>
      <ul>
        <li><b>BS Computer Engineering</b> (Aug 2024 - Present), Dr. Yanga's Colleges, Inc. Dean's Lister: 1st Semester A.Y. 2024-2025 and 2nd Semester A.Y. 2025-2026.</li>
        <li><b>BS Computer Science</b> (Aug 2023 - May 2024), STI College Caloocan. President Dean's Lister: 1st and 2nd Semester A.Y. 2023-2024.</li>
        <li><b>Senior High School, STEM</b> (Jun 2021 - May 2023), Colegio de Sto. Niño. Graduated with High Honors.</li>
      </ul>
    </div>

    <div class="card">
      <h3>Awards</h3>
      <ul>
        <li><b>1st Place, ASEAN Exhibit Poster Making</b> (Sep 2025), Dr. Yanga's Colleges, Inc.</li>
        <li><b>Leadership Award</b> (May 2023), Colegio de Sto. Niño.</li>
        <li><b>Outstanding Awardee, Research Paper</b> (May 2023), Colegio de Sto. Niño.</li>
        <li><b>Academic Achiever Award, With Honors</b> (May 2023), general average of 93.00%.</li>
        <li><b>Certificate of Academic Excellence</b> (May 2023), average of 92.</li>
      </ul>
    </div>

    <div class="card">
      <h3>Certifications</h3>
      <ul>
        <li><b>AI Image Content Creation, Participant</b> (Mar 19, 2026), IRCITE 2026 / Philippine Society of Information Technology Educators.</li>
        <li><b>AI Tools Certification Series</b> (Oct 2026), tixu.ai: Claude for Engineers, Claude, ChatGPT, Lovable, Kling, Nano Banana.</li>
      </ul>
    </div>

  </div>

  <h2>What I Work With</h2>

  <!-- Four skill boxes na magkakatabi (flexbox) -->
  <div class="boxes">
    <div class="box">
      <h3>Design and Content</h3>
      <ul>
        <li>Graphic design</li>
        <li>Logo and identity</li>
        <li>Photo editing</li>
        <li>Video editing</li>
        <li>Social media content</li>
        <li>Canva</li>
      </ul>
    </div>
    <div class="box">
      <h3>Web</h3>
      <ul>
        <li>HTML and CSS</li>
        <li>Responsive layout</li>
        <li>JavaScript</li>
        <li>Node.js</li>
        <li>PHP</li>
        <li>Git and GitHub</li>
      </ul>
    </div>
    <div class="box">
      <h3>AI Tools</h3>
      <ul>
        <li>Claude</li>
        <li>ChatGPT</li>
        <li>Lovable</li>
        <li>Kling</li>
        <li>Nano Banana</li>
      </ul>
    </div>
    <div class="box">
      <h3>Working With People</h3>
      <ul>
        <li>Event coordination</li>
        <li>Public relations</li>
        <li>Teamwork</li>
        <li>Microsoft Office</li>
      </ul>
    </div>
  </div>

</div>

<?php include "footer.php"; ?>
