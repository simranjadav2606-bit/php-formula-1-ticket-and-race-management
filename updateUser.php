<?php 
ob_start();
session_start();

if(!isset($_SESSION['uemail'])){
    header("location:LoginUser.php");
}
require("db.php");

if(isset($_REQUEST['Uid'])){
    $UID = $_REQUEST['Uid'];
    $Q = "SELECT * FROM tbl_user WHERE Id=$UID";
    $result = mysqli_query($mysql, $Q) or die("Query Failed: ".mysqli_error($mysql));
    $r = mysqli_fetch_array($result);
    $path = "./image/" . $r[9];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  require("header.php");
  ?>
  <meta charset="UTF-8">
  <title>Formula 1 – Update User Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #000; /* black background */
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
    }
    .card {
      background: #fff; /* white card */
      color: #000; /* black text inside card */
      border: none;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.5);
      padding: 25px;
      transition: transform 0.3s ease;
    }
    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 40px rgba(0,0,0,0.7);
    }
    .form-control {
      background: #f9f9f9; /* light input background */
      border: 2px solid #ccc;
      color: #000;
      border-radius: 12px;
    }
    .form-control:focus {
      border-color: #ff1e1e;
      box-shadow: 0 0 10px #ff1e1e;
      background: #fff;
      color: #000;
    }
    .btn-f1 {
      background: linear-gradient(90deg, #ff1e1e, #990000);
      border: none;
      border-radius: 30px;
      padding: 12px;
      color: #fff;
      font-weight: bold;
      box-shadow: 0 5px 20px rgba(255,0,0,0.6);
      transition: all 0.3s ease;
    }
    .btn-f1:hover {
      background: linear-gradient(90deg, #990000, #ff1e1e);
      box-shadow: 0 8px 30px rgba(255,0,0,0.8);
      transform: scale(1.05);
    }
    .logo {
      display: block;
      margin: 0 auto 20px;
      width: 150px;
    }
    label {
      font-weight: 600;
      color: #000; /* black labels on white card */
    }
    img.preview {
      border: 2px solid #ff1e1e;
      margin-bottom: 10px;
    }
    .d1 {
      background: #000; /* full black background */
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
      color: #fff; /* default text outside card */
      padding-top: 50px;
      padding-bottom: 50px;
    }
  </style>
</head>
<body>

<div class="content d1">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <img src="image/logo.png" alt="Formula 1 Logo" class="logo">
          <h3 class="text-center mb-4">Update User Profile</h3>

          <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label>User Name</label>
              <input type="text" name="aname" class="form-control" value="<?php echo $r[1]; ?>" required>
            </div>

            <div class="mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control" value="<?php echo $r[2]; ?>" required>
            </div>

            <div class="mb-3">
              <label>Password</label>
              <input type="password" name="pwd" class="form-control" value="<?php echo $r[8]; ?>" required>
            </div>

            <div class="mb-3">
              <label>Birth Date</label>
              <input type="date" name="bdate" class="form-control" value="<?php echo $r[4]; ?>" required>
            </div>

            <div class="mb-3">
              <label>Contact No</label>
              <input type="text" name="cno" class="form-control" value="<?php echo $r[3]; ?>" required>
            </div>

            <div class="mb-3">
              <label>City</label>
              <input type="text" name="city" class="form-control" value="<?php echo $r[5]; ?>" required>
            </div>

            <div class="mb-3">
              <label>State</label>
              <input type="text" name="state" class="form-control" value="<?php echo $r[6]; ?>" required>
            </div>

            <div class="mb-3">
              <label>Country</label>
              <input type="text" name="country" class="form-control" value="<?php echo $r[7]; ?>" required>
            </div>

            <div class="mb-3">
              <label>Profile Image</label><br>
              <img src="<?= $path ?>" width="200px" height="200px" class="preview">
              <input type="file" name="img" class="form-control mt-2" required>
            </div>

            <button type="submit" name="update" class="btn-f1 w-100">Update Info</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
require("footer.php");
?>
</body>
</html>

<?php 
if (isset($_REQUEST['update'])) {
    $name = $_REQUEST['aname'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['pwd'];
    $birthdate = $_REQUEST['bdate'];
    $contact = $_REQUEST['cno'];
    $city = $_REQUEST['city'];
    $state = $_REQUEST['state'];
    $country = $_REQUEST['country'];
    $fname = $_FILES['img']['name'];
    $fpath = $_FILES['img']['tmp_name'];

    $Q = "UPDATE tbl_user 
          SET FullName='$name',
              Email='$email',
              ContectNo='$contact',
              DateOfBirth='$birthdate',
              City='$city',
              State='$state',
              Country='$country',
              Password='$password',
              Image='$fname'
          WHERE Id='$UID'";

    if (mysqli_query($mysql, $Q)) {
        $_SESSION['uemail'] = $email;
        move_uploaded_file($fpath, "./image/" . $fname);
        header("location:ViewUser.php");
        exit;
    } else {
        echo "<script>alert('Something went wrong, try again');</script>";
    }
}
?>
