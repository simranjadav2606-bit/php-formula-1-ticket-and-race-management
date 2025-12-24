<?php
ob_start();
session_start();
require("db.php");

// ✅ Fetch race results
$Q = "SELECT * FROM race_results ORDER BY date DESC";
$result = mysqli_query($mysql, $Q) or die("Query Failed: " . mysqli_error($mysql));
$nor = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formula 1 - Race Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #000;
      font-family: "Segoe UI", sans-serif;
      color: #fff;
    }

    /* HERO HEADER */
    .hero {
      background: linear-gradient(90deg, #e10600, #111);
      padding: 30px 20px;
      text-align: center;
      margin-top: 10px;
    }
    .hero h1 {
      font-size: 36px;
      font-weight: 900;
      text-transform: uppercase;
      color: #fff;
      margin: 0;
      text-shadow: 0 0 12px rgba(0,0,0,0.6);
    }

    /* GRID WRAPPER */
    .leaderboard-grid {
      max-width: 1100px;
      margin: 40px auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(480px, 1fr));
      gap: 20px;
      padding: 0 15px;
    }

    /* LEADERBOARD CARD */
    .leaderboard-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: linear-gradient(90deg, #111, #1c1c1c);
      border-left: 8px solid #e10600;
      border-radius: 12px;
      padding: 20px;
      transition: 0.3s ease;
      position: relative;
      overflow: hidden;
    }
    .leaderboard-item::before {
      content: "";
      position: absolute;
      top: 0;
      left: -50%;
      width: 200%;
      height: 100%;
      background: repeating-linear-gradient(
        135deg,
        rgba(225,6,0,0.05) 0px,
        rgba(225,6,0,0.05) 20px,
        transparent 20px,
        transparent 40px
      );
      animation: moveStripes 12s linear infinite;
    }
    @keyframes moveStripes {
      from { background-position: 0 0; }
      to { background-position: 200px 0; }
    }
    .leaderboard-item:hover {
      transform: scale(1.02);
      box-shadow: 0 0 20px rgba(225,6,0,0.6);
    }

    /* LEFT SIDE (Winner + Team) */
    .leaderboard-left {
      flex: 1;
      z-index: 2;
    }
    .winner {
      font-size: 20px;
      font-weight: 900;
      color: #ff3333;
      margin: 0;
      text-transform: uppercase;
      text-shadow: 0 0 6px rgba(255,0,0,0.7);
    }
    .team {
      font-size: 14px;
      font-weight: 600;
      color: #ddd;
      margin-top: 3px;
    }

    /* RIGHT SIDE (Race Info) */
    .leaderboard-right {
      flex: 2;
      text-align: right;
      z-index: 2;
    }
    .date {
      display: block;
      font-size: 13px;
      font-weight: 700;
      color: #aaa;
      margin-bottom: 4px;
    }
    .gp {
      display: block;
      font-size: 16px;
      font-weight: 800;
      color: #fff;
      text-transform: uppercase;
      margin-bottom: 4px;
    }
    .stats {
      font-size: 13px;
      color: #ccc;
    }
  </style>
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">F1 Guest</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="GusteUser.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="guest_result.php">Result</a></li>
          <!-- <li class="nav-item"><a class="nav-link" href="#">Events</a></li> -->
          <li class="nav-item"><a class="nav-link" href="LoginUser.php">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="Registraion.php">Sign Up</a></li>
        </ul>
      </div>
    </div>
  </nav>
<!-- HERO HEADER -->
<div class="hero">
  <h1>🏁 Formula 1 Race Results</h1>
</div>

<!-- LEADERBOARD GRID -->
<div class="leaderboard-grid">
  <?php 
  if($nor>0){
    while($r=mysqli_fetch_assoc($result)){
      $flagPath = "Image/flag.jfif"; 
  ?>
    <div class="leaderboard-item">
      <div class="leaderboard-left">
        <h3 class="winner"><?php echo $r['winner']; ?></h3>
        <div class="team"><?php echo $r['team']; ?></div>
      </div>
      <div class="leaderboard-right">
        <span class="date"><?php echo date("d M Y", strtotime($r['date'])); ?></span>
        <span class="gp"><?php echo $r['grand_prix']; ?></span>
        <span class="stats">Laps: <?php echo $r['laps']; ?> | Time: <?php echo $r['time']; ?></span>
      </div>
    </div>
  <?php 
    }
  } else {
    echo "<div class='text-center text-danger fw-bold py-4'>No Race Results Found...</div>";
  }
  ?>
</div>

</body>
</html>