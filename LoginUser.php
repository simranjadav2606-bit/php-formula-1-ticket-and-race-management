<?php 
  ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | F1 Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #000; /* Black background */
      min-height: 100vh;
      display: flex;
      flex-direction: column; /* stack header + center card */
      align-items: center;
      justify-content: center;
      font-family: 'Poppins', sans-serif;
    }

    /* ---- HEADER BANNER ---- */
    .f1-header {
      width: 100%;
      background: linear-gradient(90deg, #ff0000, #8b0000);
      padding: 15px 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 26px;
      font-weight: bold;
      letter-spacing: 1px;
      text-shadow: 2px 2px 8px black;
      position: relative;
    }
    .f1-header img {
      height: 40px;
      margin-right: 12px;
      vertical-align: middle;
    }

    /* ---- LOGIN CARD ---- */
    .login-card {
      background: #fff; /* White card */
      border-radius: 15px;
      box-shadow: 0 8px 30px rgba(255, 0, 0, 0.3);
      padding: 40px;
      width: 100%;
      max-width: 400px;
      margin: auto; 
    }

    .login-card h1 {
      font-size: 1.8rem;
      font-weight: bold;
      margin-bottom: 25px;
      color: #e50914; /* Ferrari Red */
      text-align: center;
      letter-spacing: 2px;
    }

    .form-label {
      font-weight: 600;
      color: #333;
    }

    .form-control {
      background: #f8f8f8;
      border: 1px solid #ccc;
      border-radius: 10px;
      color: #000;
      padding: 12px;
      transition: 0.3s;
    }

    .form-control:focus {
      background: #fff;
      border-color: #e50914;
      box-shadow: 0 0 8px rgba(229, 9, 20, 0.5);
    }

    .btn-login {
      background: linear-gradient(to right, #e50914, #b00610);
      border: none;
      border-radius: 10px;
      font-weight: bold;
      text-transform: uppercase;
      padding: 12px;
      width: 100%;
      margin-top: 15px;
      letter-spacing: 1px;
      transition: 0.3s;
      color: #fff;
    }

    .btn-login:hover {
      background: linear-gradient(to right, #b00610, #800505);
      box-shadow: 0 6px 20px rgba(229, 9, 20, 0.6);
      transform: scale(1.02);
    }

    .text-muted {
      color: #666 !important;
    }

    /* Admin link styling */
    .admin-link a {
      color: #e50914;
      text-decoration: underline;
      font-weight: bold;
    }
    .admin-link a:hover {
      color: #b00610;
    }
  </style>
</head>
<body>

  <!-- Header Banner -->
  <div class="f1-header">
    <img src="https://upload.wikimedia.org/wikipedia/commons/3/33/F1.svg" alt="F1 Logo">
    Formula 1 – Ticket & Race Management
  </div>

  <!-- Login Card -->
  <div class="login-card">
    <h1>F1 User Login</h1>
    <form action="" method="post">
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="pwd" required>
      </div>
      <button type="submit" class="btn-login" name="login">Login</button>
    </form>

    <!-- Admin Login Link -->
    <div class="text-center mt-3 admin-link">
      <a href="Login.php">Login As Admin</a>
    </div>

    <p class="text-center mt-3 text-muted">© 2025 F1 Portal</p>
  </div>

</body>
</html>

<?php 
    session_start();
    
    if(isset($_REQUEST['login'])){
        $email=$_REQUEST['email'];
        $pwd=$_REQUEST['pwd'];

        require('db.php');

        $Q="SELECT * FROM tbl_user WHERE Email='$email' AND Password='$pwd'";

        $result = mysqli_query($mysql, $Q) or die("Failed: ".mysqli_error($mysql));
        
        $nor = mysqli_num_rows($result);
 
        if($nor > 0){
            $_SESSION['uemail'] = $email;
            header("location:UserHomePage.php");
        }
        else{
            echo "<script>alert('Something Went Wrong, Try Again');</script>";
        }
    }
?>
