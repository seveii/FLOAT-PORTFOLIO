<?php
// contact.php - the contact form. The PHP code is at the top, before any HTML is shown.

$title = "Contact";
$result = "";

// This part runs only when the form was sent (the visitor pressed the button).
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $type = $_POST["type"];
    $message = $_POST["message"];

    // Check the fields first.
    if ($name == "" || $email == "" || $message == "") {
        $result = "Please fill in all the fields.";
    } elseif (!in_array($type, ["website", "design", "content", "other"])) {
        $result = "Please choose what you need.";
    } else {
        // Save the message in the database (the messages table from database.sql).
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

<div class="content">

  <h2>Contact Me</h2>

  <!-- Two parts side by side with flexbox: the form on the left, my info on the right -->
  <div class="contact-row">

    <div class="contact-form">
      <p>Tell me what you need and I will reply by email.</p>

      <?php
      // Show the result (thank you or error) if there is one.
      if ($result != "") {
          echo "<p><b>" . $result . "</b></p>";
      }
      ?>

      <form method="post" action="contact.php">
        <p>
          Name:<br>
          <input type="text" name="name">
        </p>
        <p>
          Email:<br>
          <input type="email" name="email">
        </p>
        <p>
          What do you need?<br>
          <select name="type">
            <option value="website">A website</option>
            <option value="design">Logo, poster or other design</option>
            <option value="content">Social media content</option>
            <option value="other">Something else</option>
          </select>
        </p>
        <p>
          Message:<br>
          <textarea name="message" rows="6" cols="40"></textarea>
        </p>
        <p>
          <input type="submit" value="Send">
        </p>
      </form>
    </div>

    <div class="contact-info">
      <img src="images/awards-presidents-list.webp" alt="Rafael Joseph Nieves">
      <p><b>Email:</b><br>nrafaeljoseph@gmail.com</p>
      <p><b>Location:</b><br>Marilao, Bulacan, Philippines</p>
    </div>

  </div>

</div>

<?php include "footer.php"; ?>
