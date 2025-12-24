<!-- header.php -->
<?php
// Uncomment if you need sessions
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>F1 Website</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }
    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 30px;
    }
    .navbar img {
      height: 40px;
    }
    .nav-links {
      display: flex;
      gap: 25px;
      flex: 1;                  
      justify-content: center;  
    }
    .nav-links a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      font-size: 15px;
    }
    .nav-links a:hover {
      text-decoration: underline;
    }
    .auth-buttons {
      display: flex;
      gap: 12px;
    }
    .btn-signin,
    .btn-subscribe,
    .btn-profile {
      min-width: 110px;              /* 🔑 keeps buttons uniform */
      text-align: center;
      padding: 8px 18px;
      border-radius: 20px;
      cursor: pointer;
      font-weight: bold;
      font-size: 14px;
      transition: all 0.3s ease;
    }
    .btn-signin {
      background-color: black;
      color: white;
      border: 2px solid white;
    }
    .btn-signin:hover {
      background-color: #333;
    }
    .btn-subscribe {
      background-color: white;
      color: red;
      border: 2px solid red;
    }
    .btn-profile {
      background-color: #e10600;
      color: white;
      border: none;
    }
    .btn-profile:hover {
      background-color: #b00000;
    }
    /* Header Banner */
    .f1-header {
      background: linear-gradient(90deg,black,red);
      padding: 10px 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 26px;
      font-weight: bold;
      color: #fff;
      letter-spacing: 1px;
    }
    .f1-header img {
      height: 40px;
      margin-right: 30px;
    }
  </style>
</head>
<header>
  <div class="f1-header">
    
    <!-- Logo (Left) -->
    <div class="logo">
      <img src="https://upload.wikimedia.org/wikipedia/commons/3/33/F1.svg" alt="F1 Logo">
    </div>

    <!-- Navigation Links (Center) -->
    <div class="nav-links">
      <a href="UserHomePage.php">Homepage</a> 
      <a href="raceSchedual.php">Schedule</a>
      <a href="userResult.php">Results</a>
      <a href="userMerchandise.php">Merchandise</a>
      <a href="drivers.php">Drivers</a>
      <a href="feedback.php">Feedback</a>
      <!-- <a href="hospitality.php">Hospitality</a> -->
    </div>

    <!-- Auth Buttons (Right) -->
    <div class="auth-buttons">
      <button class="btn-signin" onclick="window.location.href='GusteUser.php'">logout</button>
      <!-- <button class="btn-subscribe">Subscribe</button> -->
      <button class="btn-profile" onclick="window.location.href='ViewUser.php'">View Profile</button>
    </div>
  </div>
</header>
