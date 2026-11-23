<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title; ?> - Rafael Joseph Nieves</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <div class="logo"><span class="mark">RN</span>Rafael Joseph Nieves</div>
  <nav>
    <a href="index.php"<?php if ($title == "Home") { echo ' class="active"'; } ?>>Home</a>
    <a href="about.php"<?php if ($title == "About") { echo ' class="active"'; } ?>>About</a>
    <a href="projects.php"<?php if ($title == "Projects") { echo ' class="active"'; } ?>>Projects</a>
    <a href="certificates.php"<?php if ($title == "Certificates") { echo ' class="active"'; } ?>>Certificates</a>
    <a class="nav-button" href="contact.php">Contact</a>
  </nav>
</header>
