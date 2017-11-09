<?php include "functions.php"; ?>

<?php db_connect(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="css/style.css">

  <title>Medical Center HMS</title>
</head>
<body>
  <nav class="navbar">
    <h1 class="txt-ll">Covenant University Medical Center (CUMC)</h1>
    <h3 class="txt-g">Hospital Management System (HMS)</h3>

    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="about-us.php">About Us</a></li>
      <li><a href="our-services.php">Our Services</a></li>
      <li><a href="contact-us.php">Contact Us</a></li>
      <?php if(is_auth()) { ?>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="logout.php">Logout(<?php echo $_SESSION['user_email']; ?>)</a></li>
      <?php } else { ?>
        <li><a href="login.php">Login</a></li>
      <?php } ?>
    </ul>
  </nav>