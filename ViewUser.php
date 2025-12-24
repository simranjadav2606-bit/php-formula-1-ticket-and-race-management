<?php 
ob_start();  
session_start();
include("header.php"); 
require("db.php");

if(!isset($_SESSION['uemail'])){
    header("location:loginUser.php");
    exit;
}

$Email = $_SESSION['uemail'];
$Sql = "SELECT * FROM tbl_user WHERE Email='$Email'";
$result = mysqli_query($mysql,$Sql) or die("Query Failed");

if(mysqli_num_rows($result) > 0){
    $UserData = mysqli_fetch_array($result);
} else {
    echo "<div class='alert alert-danger'>Error: Could Not Retrieve Data. Please Try Again</div>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #000; /* Black background */
      font-family: 'Segoe UI', sans-serif;
      color: #222;
    }
    .profile-container {
      max-width: 900px;
      margin: 60px auto;
      padding: 40px;
      border-radius: 20px;
      background: #fff; /* White card */
      border: 2px solid #e10600;
      box-shadow: 0 0 20px rgba(225, 6, 0, 0.3);
    }
    .profile-img {
      width: 160px;
      height: 160px;
      border-radius: 50%;
      border: 4px solid #e10600;
      object-fit: cover;
      margin: 0 auto 20px;
      display: block;
    }
    h2 {
      text-align: center;
      font-weight: bold;
      color: #e10600;
      margin-bottom: 30px;
    }
    .info-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px 40px;
    }
    .info-box {
      background: #fafafa;
      padding: 15px;
      border-radius: 12px;
      border: 1px solid #ddd;
      transition: 0.3s;
    }
    .info-box:hover {
      background: #fff5f5;
      border-color: #e10600;
    }
    .info-label {
      font-size: 13px;
      color: #777;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    .info-value {
      font-size: 16px;
      font-weight: bold;
      color: #222;
    }
    .btn-update {
      display: block;
      margin: 40px auto 0;
      background: #e10600;
      color: #fff;
      border: none;
      padding: 12px 30px;
      border-radius: 30px;
      font-weight: bold;
      letter-spacing: 1px;
      transition: 0.3s;
    }
    .btn-update:hover {
      background: #b00000;
      box-shadow: 0 0 15px rgba(225, 6, 0, 0.5);
    }
  </style>
</head>
<body>
  <form action="" method="post">
    <div class="profile-container">
      <?php $path = "./image/" . $UserData[9]; ?>
      <img src="<?= $path ?>" alt="User" class="profile-img">
      <h2>🏎 User Profile</h2>

      <div class="info-grid">
        <div class="info-box">
          <div class="info-label">Name</div>
          <div class="info-value"><?= $UserData[1] ?></div>
        </div>
        <div class="info-box">
          <div class="info-label">Email</div>
          <div class="info-value"><?= $UserData[2] ?></div>
        </div>
        <div class="info-box">
          <div class="info-label">Birthdate</div>
          <div class="info-value"><?= $UserData[4] ?></div>
        </div>
        <div class="info-box">
          <div class="info-label">Contact No</div>
          <div class="info-value"><?= $UserData[3] ?></div>
        </div>
        <div class="info-box">
          <div class="info-label">City</div>
          <div class="info-value"><?= $UserData[5] ?></div>
        </div>
        <div class="info-box">
          <div class="info-label">State</div>
          <div class="info-value"><?= $UserData[6] ?></div>
        </div>
        <div class="info-box">
          <div class="info-label">Country</div>
          <div class="info-value"><?= $UserData[7] ?></div>
        </div>
        <div class="info-box">
          <div class="info-label">Password</div>
          <div class="info-value"><?= $UserData[8] ?></div>
        </div>
      </div>

      <input type="submit" class="btn-update" name="btnupdate" value="Update Profile">
    </div>

  </form>
  <?php
  require("footer.php");
  ?>
</body>
</html>

<?php 
if(isset($_POST['btnupdate'])){
  header("location:updateUser.php?Uid=$UserData[0]");
  exit;
}
?>
