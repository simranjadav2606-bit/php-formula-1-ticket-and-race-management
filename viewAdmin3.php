<?php 
ob_start();  

    session_start();
    include("sider.php"); 
    require("db.php");

    if(!isset($_SESSION['aemail'])){
        header("location:login.php");
        exit;
    }

    $Email = $_SESSION['aemail'];
    $Sql = "SELECT * FROM tbl_admin WHERE EmailId='$Email'";
    $result = mysqli_query($mysql,$Sql) or die("Query Failed");

    if(mysqli_num_rows($result) > 0){
        $AdminData = mysqli_fetch_array($result);
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
  <title>Admin Information</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: black;
      font-family: 'Segoe UI', sans-serif;
      color: #fff;
    }
    .admin-card {
      background: #1a1a1a;
      border-left: 5px solid #ff1e1e;
      border-radius: 12px;
      padding: 25px;
      max-width: 600px;
      margin: 50px auto;
      /* box-shadow: 0 6px 15px rgba(0,0,0,0.5); */
       box-shadow: 0 0 10px rgba(255, 0, 0, 0.8);
    }
    .profile-img {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      border: 3px solid #ff1e1e;
      object-fit: cover;
      margin-bottom: 15px;
    }
    h3 {
      color: #ff1e1e;
      font-weight: bold;
      margin-bottom: 20px;
      text-align: center;
    }
    .info-row {
      display: flex;
      justify-content: space-between;
      padding: 10px 0;
      border-bottom: 1px solid #333;
    }
    .info-label {
      font-weight: bold;
      color: #ccc;
    }
    .btn-update {
      display: block;
      margin: 20px auto 0;
      background: #ff1e1e;
      color: #fff;
      border: none;
      padding: 10px 25px;
      border-radius: 8px;
      font-weight: bold;
      transition: 0.3s;
    }
    .btn-update:hover {
      background: #e60000;
    }
  </style>
</head>
<body>
  <form action="" method="post">
     <div class="content">
          <?php 
    $path = "./image/" . $AdminData[4];  
  ?>
  <div class="admin-card text-center">
    <img src="<?= $path ?>" alt="Admin" class="profile-img">
    <h3>🏁 Admin Information</h3>

    <div class="info-row">
      <span class="info-label">Name:</span>
      <span><?= $AdminData[1] ?></span>
    </div>
    <div class="info-row">
      <span class="info-label">Email:</span>
      <span><?= $AdminData[2] ?></span>
    </div>
    <div class="info-row">
      <span class="info-label">Birthdate:</span>
      <span><?= $AdminData[6] ?></span>
    </div>
    <div class="info-row">
      <span class="info-label">Password:</span>
      <span><?= $AdminData[3]?></span> <!-- Hide password -->
    </div>
    <div class="info-row">
      <span class="info-label">Contact No:</span>
      <span><?= $AdminData[5] ?></span>
    </div>

<input type="submit" class="btn-update" name="btnupdate" value="Update Profile">
  </div>
    </div>
  </form>
   

</body>
</html>
<?php 
  if(isset($_POST['btnupdate'])){
    header("location:updateinfo.php?Aid=$AdminData[0]");
  }
  else{
    echo "<script>
      alter('Something Want To Wrong')
    </script>";
  }

?>
