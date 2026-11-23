<?php
// contact.php - yung contact form. Nasa taas yung PHP code, bago pa lumabas yung kahit anong HTML.

$title = "Contact";
$result = "";

// Tatakbo lang 'tong part na 'to kapag na-send na yung form (pinindot na ng visitor yung button).
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $type = $_POST["type"];
    $message = $_POST["message"];

    // I-check muna natin yung mga fields.
    if ($name == "" || $email == "" || $message == "") {
        $result = "Please fill in all the fields.";
    } else {
        // I-save yung message sa database (yung messages table galing sa database.sql).
        try {
            $conn = new PDO("mysql:host=localhost;dbname=portfolio", "root", "");
            $sql = "INSERT INTO messages (name, email, need_type, message) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $email, $type, $message]);
            $result = "Thank you. Your message was saved.";
        } catch (PDOException $e) {
            $result = "Sorry, the message could not be saved.";
        }
    }
}

include "header.php";
?>

<!-- Banner sa taas: yung title sa left, yung picture ko sa right (style.css, .banner) -->
<div class="banner">
  <div class="banner-text">
    <h1>Contact Me</h1>
    <div class="line"></div>
    <p>Tell me what you need and I will reply by email.</p>
  </div>
  <img class="banner-photo" src="images/momentrooftop.webp" alt="Rafael seated on a rooftop terrace at night">
</div>

<div class="content">

  <!-- Two parts na magkatabi, flexbox: yung form sa left, yung info ko sa right -->
  <div class="contact-row">

    <div class="contact-form">
      <h2>Send a Message</h2>

      <?php
      // Ipakita yung result (thank you o error) kung meron.
      if ($result != "") {
          echo "<p class=\"result\"><b>" . $result . "</b></p>";
      }
      ?>

      <!-- Yung label, naka-connect sa input niya gamit yung for at yung id. Yung required, bawal i-submit kapag walang laman. -->
      <form method="post" action="contact.php">
        <p>
          <label for="name">Name:</label><br>
          <input class="field" type="text" name="name" id="name" required>
        </p>
        <p>
          <label for="email">Email:</label><br>
          <input class="field" type="email" name="email" id="email" required>
        </p>
        <p>
          <label for="type">What do you need?</label><br>
          <select class="field" name="type" id="type">
            <option value="website">A website</option>
            <option value="design">Logo, poster or other design</option>
            <option value="content">Social media content</option>
            <option value="other">Something else</option>
          </select>
        </p>
        <p>
          <label for="message">Message:</label><br>
          <textarea class="field" name="message" id="message" rows="6" required></textarea>
        </p>
        <p>
          <input class="send" type="submit" value="Send Message">
        </p>
      </form>
    </div>

    <div class="contact-info">
      <img src="images/awardspresidentslist.webp" alt="Rafael Joseph Nieves">
      <h3>Rafael Joseph Nieves</h3>
      <p><b>Email:</b><br>nrafaeljoseph@gmail.com</p>
      <p><b>Location:</b><br>Marilao, Bulacan, Philippines</p>
      <p><b>Availability:</b><br>Freelance projects and internships</p>

      <h3>It helps if you include</h3>
      <ul>
        <li>What the project is for</li>
        <li>Who it is for</li>
        <li>Any logo, colors or content you already have</li>
        <li>Examples you like</li>
      </ul>
    </div>

  </div>

</div>

<?php include "footer.php"; ?>
