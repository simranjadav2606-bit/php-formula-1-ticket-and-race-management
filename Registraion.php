<?php 
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formula 1 Registration</title>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 
  <style>
    body {
      background: url('https://www.transparenttextures.com/patterns/carbon-fibre.png') repeat #000;
      font-family: "Segoe UI", Arial, sans-serif;
      margin: 0;
      padding: 0;
      color: #222;
    }

    /* Header Banner */
    .f1-header {
      background: linear-gradient(90deg, #d00000, #000);
      padding: 20px;
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
      margin-right: 12px;
    }

    /* Container */
    .form-container {
      max-width: 800px;
      margin: 50px auto;
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.6);
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 30px;
      font-size: 28px;
      font-weight: bold;
      color: #c00000;
      position: relative;
    }
    .form-container h2::after {
      content: "";
      display: block;
      width: 80px;
      height: 3px;
      background: #c00000;
      margin: 8px auto 0;
      border-radius: 2px;
    }

    /* Horizontal Form */
    .form-group {
      display: flex;
      align-items: center;
      margin-bottom: 18px;
    }

    .form-group label {
      width: 180px;
      font-weight: 600;
      color: #333;
    }

    .form-control {
      flex: 1;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      background: #fafafa;
      font-size: 14px;
    }

    .form-control:focus {
      border-color: #c00000;
      outline: none;
      box-shadow: 0px 0px 6px rgba(192, 0, 0, 0.5);
    }

    /* Button */
    .btn-f1 {
      background: #c00000;
      border: none;
      padding: 14px;
      width: 100%;
      font-size: 16px;
      font-weight: bold;
      border-radius: 8px;
      color: #fff;
      cursor: pointer;
      transition: 0.3s;
      margin-top: 15px;
    }
    .btn-f1:hover {
      background: #a00000;
    }

    /* Small footer */
    .form-footer {
      text-align: center;
      margin-top: 20px;
      font-size: 13px;
      color: #555;
    }
  </style>
  
</head>
<body>
  <!-- Header -->
  <div class="f1-header">
    <img src="https://upload.wikimedia.org/wikipedia/commons/3/33/F1.svg" alt="F1 Logo">
    Formula 1 – Ticket & Race Management
  </div>

  <!-- Form -->
  <div class="form-container">
    <h2>User Registration</h2>
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="fname" required>
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="contact">Contact No:</label>
        <input type="tel" class="form-control" id="txtcno" name="cno"  required><br/>
         <div id="pnoerror" class="text-danger" style="color:red;"></div>
      </div>

      <div class="form-group">
        <label for="dob">Date of Birth:</label>
        <input type="date" class="form-control" id="dob" name="dob" required>
      </div>

      <div class="form-group">
        <label for="city">City:</label>
        <input type="text" class="form-control" id="city" name="city" required>
      </div>

      <div class="form-group">
        <label for="state">State:</label>
        <input type="text" class="form-control" id="state" name="state" required>
      </div>

      <div class="form-group">
        <label for="country">Country:</label>
        <input type="text" class="form-control" id="country" name="country" required>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="pwd" name="pwd" required>
        <div ="pwderror"></div>
      </div>

      <div class="form-group">
        <label for="image">Upload Image:</label>
        <input type="file" class="form-control" id="image" name="img" accept="image/*">
      </div>

      <button type="submit" class="btn-f1" name="btnreg" onblur="validatephone()">Register</button>
    </form>
    <div class="form-footer">© 2025 Formula 1 Registration Portal</div>
  </div>
</body>
</html>
<?php 
  if(isset($_REQUEST['btnreg'])){
      // print_r($_REQUEST);

        $name=$_REQUEST['fname'];
        $email=$_REQUEST['email'];
        $cno=$_REQUEST['cno'];
        $bdate=$_REQUEST['dob'];
        $city=$_REQUEST['city'];
        $state=$_REQUEST['state'];
        $country=$_REQUEST['country'];
        $pwd=$_REQUEST['pwd'];
        $fname=$_FILES['img']['name'];
        $fpath=$_FILES['img']['tmp_name'];
        $fsize=$_FILES['img']['size'];
        $ftype=$_FILES['img']['type'];

        require("db.php");
       $Q="INSERT INTO tbl_user (FullName,Email,ContectNo,DateOfBirth,City,State,Country,Password,Image) 
    VALUES ('$name','$email','$cno','$bdate','$city','$state','$country','$pwd','$fname')";


          if(mysqli_query($mysql,$Q)){
                move_uploaded_file($fpath,"./image/".$fname);
                header("location:LoginUser.php");
        }
        else{
          echo "<script>
            alert('Something Wrong Try Again');
          </script>";
        }
  }
?>

