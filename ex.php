<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  require("header.php");
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formula 1 | User Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="./jquery-3.7.1.min.js"></script>
  <style>
    body {
      background: linear-gradient(135deg, #0d0d0d, #1a1a1a);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #fff;
    }

    .login-card {
      background: #111;
      border-radius: 18px;
      padding: 40px;
      max-width: 420px;
      margin: auto;
      margin-top: 7%;
      box-shadow: 0 8px 30px rgba(255, 0, 0, 0.4);
      border-top: 4px solid #ff0000;
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .login-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 40px rgba(255, 0, 0, 0.6);
    }

    .login-title {
      font-weight: bold;
      text-align: center;
      margin-bottom:25px;
      color: #ff0000;
      letter-spacing: 2px;
      text-transform: uppercase;
    }

    .form-control {
      border-radius: 10px;
      padding: 12px;
      background: #1c1c1c;
      border: 1px solid #333;
      color: #fff;
    }

    .form-control:focus {
      border-color: #ff0000;
      box-shadow: 0 0 8px rgba(255, 0, 0, 0.5);
      background: #222;
      color: #fff;
    }

    .btn-login {
      background: linear-gradient(90deg, #ff0000, #b30000);
      border: none;
      color: white;
      font-weight: bold;
      padding: 12px;
      border-radius: 10px;
      width: 100%;
      margin-top: 15px;
      transition: 0.3s;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .btn-login:hover {
      background: linear-gradient(90deg, #ff4d4d, #e60000);
      transform: scale(1.05);
    }

    .extra-links {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
      color: #aaa;
    }

    .extra-links a {
      text-decoration: none;
      color: #ff4d4d;
      font-weight: 500;
    }

    .extra-links a:hover {
      text-decoration: underline;
      color: #fff;
    }

    .f1-logo {
      display: block;
      margin: 0 auto 10px;  /* reduced bottom margin */
      max-width: 150px;     /* adjusted size */
    }
  </style>
  <script>
      $(document).ready(function(){
        $("#btnlogin").click(function(){
          var email = $("#email").val()
          var pwd = $("#password").val()

          $.ajax({
            url:"login.php",
            method : "POST",
            data :{
              email:email,
              pwd:pwd
            },
            success : function(data){
              alert(data);
            }
          })

        })
      })
  </script>
</head>
<body>

  <div class="container">
    <div class="login-card">
      <!-- Formula 1 logo -->
      <div class="text-center mb-4">
        <img src="image/logo.png" alt="Logo" class="f1-logo">
      </div>
      <h3 class="login-title">User Login</h3>
      <form action="" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="btn-login" name="btnlogin" id="btnlogin">Login</button>
      </form>

      <div class="extra-links">
        <p>Don’t have an account? <a href="register.html">Join With Formula</a></p>
        <p><a href="../login.php">Login as Admin</a></p>
      </div>
    </div>
  </div>

</body>
</html>
<?php 
  session_start();
   require('db.php');

   $email=$_POST['email'];
   $pwd=$_POST['pwd'];
        $Q="Select * From tbl_user where Email='$email' and Password='$pwd' ";

        $result = mysqli_query($mysql,$Q) or die("Faild".mysqli_error($mysql));
        
        $nor=mysqli_num_rows($result);
 
        if($nor>0){
            $_SESSION['aemail']=$email;
            header("location:UserHomePage.php");
        }
        else{
            echo "<script>
                alert('Something Want To Wrong Try Again')
            </script>";
        }

?>
<?php
require("footer.php");
?>