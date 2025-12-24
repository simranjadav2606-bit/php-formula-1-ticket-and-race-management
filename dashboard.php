<?php
ob_start();
require("db.php");

$sql = "SELECT SUM(TotalPrice) AS TotalProfit FROM tbl_ticket";
$result = mysqli_query($mysql, $sql);
$row = mysqli_fetch_assoc($result);
$totalProfit = $row['TotalProfit'] ?? 0;

$sql = "SELECT COUNT(Id) AS TotalUsers FROM tbl_user";
$result = mysqli_query($mysql, $sql);
$row = mysqli_fetch_assoc($result);
$totalUsers = $row['TotalUsers'] ?? 0;

$sql = "SELECT COUNT(RaceId) AS TotalRaces FROM tbl_race";
$result = mysqli_query($mysql, $sql);
$row = mysqli_fetch_assoc($result);
$totalRaces = $row['TotalRaces'] ?? 0;

$sql = "SELECT SUM(quantity) AS TotalMerchandise FROM tbl_merchandise";
$result = mysqli_query($mysql, $sql);
$row = mysqli_fetch_assoc($result);
$totalMerchandise = $row['TotalMerchandise'] ?? 0;

$sql = "SELECT COUNT(TicketId) AS TotalTickets FROM tbl_ticket";
$result = mysqli_query($mysql, $sql);
$row = mysqli_fetch_assoc($result);
$totalTickets = $row['TotalTickets'] ?? 0;


$sql = "SELECT COUNT(feedback_id) AS TotalFeedback FROM admin_feedback";
$result = mysqli_query($mysql, $sql);
$row = mysqli_fetch_assoc($result);
$totalFeedback = $row['TotalFeedback'] ?? 0;
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap.min.css">
  <style>
    .total-user-card {
      background: linear-gradient(135deg, #1a1a1a, #333333);
      color: #ff0000;
      width: 300px;
      border-radius: 15px;
      padding: 25px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.4);
      text-align: center;
      position: relative;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .total-user-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(255,0,0,0.5);
    }

    .card-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 15px;
      color: #ffffff;
      text-shadow: 1px 1px 2px rgba(255,0,0,0.6);
    }

    .card-value {
      font-size: 36px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #ff0000;
    }

    .card-desc {
      font-size: 14px;
      opacity: 0.8;
      color: #ffffff;
    }

    .card-icon {
      position: absolute;
      top: 15px;
      right: 20px;
      font-size: 50px;
      opacity: 0.2;
      color: #ff0000;
    }

    .card-container {
      display: flex;
      gap: 20px; 
      flex-wrap: wrap;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <?php include("Sider.php"); ?> 
  <div class="content">
    <h1>🏎️ Welcome to F1 Admin Dashboard</h1>
    <p>Manage races, tickets, teams, and more from this panel.</p>

    <div class="card-container">
      <div class="total-user-card">
        <div class="card-title">Total Sell</div>
        <div class="card-value">$<?php echo number_format($totalProfit, 2); ?></div>
        <div class="card-desc">From all ticket sales</div>
        <div class="card-icon">💰</div>
      </div>

      <div class="total-user-card">
        <div class="card-title">Total Users</div>
        <div class="card-value"><?php echo $totalUsers; ?></div>
        <div class="card-desc">Registered in the system</div>
        <div class="card-icon">👥</div>
      </div>

      <div class="total-user-card">
        <div class="card-title">Total Races</div>
        <div class="card-value"><?php echo $totalRaces; ?></div>
        <div class="card-desc">Scheduled this season</div>
        <div class="card-icon">🏁</div>
      </div>

      <div class="total-user-card">
        <div class="card-title">Total Merchandise</div>
        <div class="card-value"><?php echo $totalMerchandise; ?></div>
        <div class="card-desc">Items currently in stock</div>
        <div class="card-icon">🛒</div>
      </div>

      <div class="total-user-card">
        <div class="card-title">Total Tickets Sold</div>
        <div class="card-value"><?php echo $totalTickets; ?></div>
        <div class="card-desc">Tickets booked this season</div>
        <div class="card-icon">🎟️</div>
      </div>

      <div class="total-user-card">
    <div class="card-title">User Feedback</div>
    <div class="card-value"><?php echo $totalFeedback; ?></div>
    <div class="card-desc">Feedbacks submitted by users</div>
    <div class="card-icon">📝</div>
</div>

    </div>
  </div>

  <?php require("UserManagement.php"); ?>
</body>
</html>

<?php 
ob_start();  
require("db.php");

if(!isset($_SESSION['aemail'])){
    header("location:login.php");
    exit;
}

$Email = $_SESSION['aemail'];
?>
