<?php
include 'inc/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Power Gym</title>
  <link rel="icon" type="image/x-icon" href="images/logo.png">
</head>
<body>
  <!-- header section starts -->
  <header class="header_section">
    <div class="contact-nav-container">
      <nav class="contact_navbar">
        <a class="nav-link" href="index.php">
          <img src="images/logo.PNG" alt="Power Gym Logo"  title="Gym Power  Logo">
          <h3>Power Gym</h3>
        </a>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#location">
              <img src="images/location.png" alt="" />
              <p>Location</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <img src="images/call.png" alt="" />
              <p>Call : +383 44 123456</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <img src="images/envelope.png" alt="" />
              <p>powergym@gmail.com</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="main-nav-container">
      <nav class="main-nav">
        <ul class="navbar-nav  ">
          <li class="nav-item">
            <a class="nav-link" href="u-profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="u-membershiptypes.php">Membership Types</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="u-payments.php">Payments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="u-trainers.php">Trainers</a>
          </li>
          <?php
          if($_SESSION['user']['role']==1){
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='u-users.php'>". "Users" . "</a>";
            echo "</li>";
          }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Logout</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>