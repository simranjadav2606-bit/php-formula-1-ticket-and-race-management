<?php 
ob_start();
    session_start();

    if(!isset($_SESSION['aemail'])){
        header("location:login.php");
    }
    require("db.php");
    if(isset($_REQUEST['Aid'])){
        $AID=$_REQUEST['Aid'];

        $Q="select*from tbl_admin where AdminId=$AID";
        $result=mysqli_query($mysql,$Q) or die("Query Failed".mysqli_error($mysql));

        $r=mysqli_fetch_array($result);
        // print_r($r);
         $path = "./image/" . $r[4];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Formula 1 – Update Admin Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #0d0d0d, #1a1a1a);
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
    }
    .card {
      background: #111;
      border: none;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(255,0,0,0.5);
      padding: 25px;
      transition: transform 0.3s ease;
    }
    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 40px rgba(255,0,0,0.7);
    }
    .form-control {
      background: #222;
      border: 2px solid #333;
      color: #fff;
      border-radius: 12px;
    }
    .form-control:focus {
      border-color: #ff1e1e;
      box-shadow: 0 0 10px #ff1e1e;
      background: #1a1a1a;
      color: #fff;
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
      color: black;
    }
    img.preview {
      /* border-radius: 50%; */
      border: 2px solid #ff1e1e;
      margin-bottom: 10px;
    }
     .d1{
       background: linear-gradient(135deg, #000 70%, #111 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      /* color: white; */
      min-height: 100vh;
      color:black;
    }
  </style>
</head>
<body>
<?php include("sider.php"); ?>
<div class="content d1">
      <div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card">
        <img src="image/logo.png" alt="Formula 1 Logo" class="logo">
        <h3 class="text-center mb-4 text-white">Update Admin Info</h3>

        <form method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label>Admin Name</label>
            <input type="text" name="aname" class="form-control" value="<?php echo $r[1]; ?>" required>
          </div>

          <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo  $r[2]; ?>" required>
          </div>

          <div class="mb-3">
            <label>Password</label>
            <input type="password" name="pwd" class="form-control" value="<?php echo  $r[3]; ?>" required>
          </div>

          <div class="mb-3">
            <label>Birth Date</label>
            <input type="date" name="bdate" class="form-control" value="<?php echo  $r[6]; ?>" required>
          </div>

          <div class="mb-3">
            <label>Contact No</label>
            <input type="text" name="cno" class="form-control" value="<?php echo  $r[5];  ?>" required>
          </div>

          <div class="mb-3">
             <?php 
     $path = "./image/" . $r[4];
  ?>
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

</body>
</html>
<?php 
    if(isset($_REQUEST['update'])){
        // print_r($_REQUEST);
    $name = $_REQUEST['aname'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['pwd'];
    $birthdate = $_REQUEST['bdate'];
    $contact = $_REQUEST['cno'];
    $fname=$_FILES['img']['name'];
    $fpath=$_FILES['img']['tmp_name'];
    $fsize=$_FILES['img']['size'];
    $ftype=$_FILES['img']['type'];

      $path = "./image/" . $r[4];
        require('db.php');
if(isset($_FILES['img'])){
    $fname=$_FILES['img']['name'];
    $fpath=$_FILES['img']['tmp_name'];
    $fsize=$_FILES['img']['size'];
    $ftype=$_FILES['img']['type'];

    $Q="update tbl_admin set Name='$name',EmailId='$email',Password='$password',Profile_Pic='$fname',ContectNo='$contact',Birthdate='$birthdate' where AdminId='$AID'";

     if(mysqli_query($mysql,$Q)){
                session_start();
                 $_SESSION['aemail']=$email;
                 move_uploaded_file($fpath,"./image/".$fname);
                header("location:viewAdmin3.php");
        }
        else{
          echo "<script>
            alert('Something Wrong Try Again');
          </script>";
        }

}
      
    }
?>
