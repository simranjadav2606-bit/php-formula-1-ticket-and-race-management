<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>F1 Style Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

 <style>
  body {
    background: linear-gradient(135deg, #ffffff, #f9f9f9, #ececec);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Poppins', sans-serif;
    overflow-x: hidden;
  }

  /* Checkered flag stripe */
  .flag-strip {
    height: 20px;
    background-image: linear-gradient(45deg, black 25%, transparent 25%),
                      linear-gradient(-45deg, black 25%, transparent 25%),
                      linear-gradient(45deg, transparent 75%, black 75%),
                      linear-gradient(-45deg, transparent 75%, black 75%);
    background-size: 40px 40px;
    background-position: 0 0, 0 20px, 20px -20px, -20px 0px;
  }

  .showlogo img {
    filter: drop-shadow(0 0 12px rgba(255, 0, 0, 0.6));
    animation: zoom 2s ease-in-out infinite alternate;
  }

  @keyframes zoom {
    from { transform: scale(1); }
    to { transform: scale(1.08); }
  }

  .login-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border: 3px solid red;
    border-radius: 25px;
    box-shadow: 0 10px 30px rgba(255, 0, 0, 0.2);
    padding: 40px;
    width: 100%;
    max-width: 420px;
    transition: all 0.4s ease;
  }

  .login-card:hover {
    transform: rotateX(5deg) rotateY(-5deg) scale(1.02);
    box-shadow: 0 15px 40px rgba(255, 0, 0, 0.4);
  }

  .login-card h1 {
    font-size: 2.3rem;
    font-weight: bold;
    color: red;
    margin-bottom: 25px;
    text-shadow: 0 0 12px rgba(255, 0, 0, 0.6);
    letter-spacing: 3px;
    text-transform: uppercase;
  }

  .form-control {
    background: #fff;
    border: 2px solid #ccc;
    border-radius: 12px;
    color: #333;
    padding: 12px;
    transition: 0.3s;
  }

  .form-control:focus {
    box-shadow: 0 0 12px rgba(255,0,0,0.5);
    border-color: red;
  }

  .btn-danger {
    background: linear-gradient(to right, #ff0000, #cc0000);
    border: none;
    border-radius: 12px;
    font-weight: bold;
    text-transform: uppercase;
    padding: 12px;
    letter-spacing: 2px;
    box-shadow: 0 5px 15px rgba(255,0,0,0.4);
    transition: 0.3s;
  }

  .btn-danger:hover {
    background: linear-gradient(to right, #cc0000, #990000);
    box-shadow: 0 8px 25px rgba(255,0,0,0.6);
    transform: scale(1.08);
  }

  /* Button glowing pulse */
  .pulse {
    animation: pulse 1.5s infinite;
  }

  @keyframes pulse {
    0% { box-shadow: 0 0 10px rgba(255,0,0,0.6); }
    50% { box-shadow: 0 0 25px rgba(255,0,0,0.9); }
    100% { box-shadow: 0 0 10px rgba(255,0,0,0.6); }
  }
</style>
</head>
<body>
  
<div class="content d1">

  <!-- Checkered Flag Stripe -->
  <div class="flag-strip"></div>

  <div class="text-center mb-4 showlogo">
    <img src="../image/logo.png" alt="Logo" height="150" width="150" class="img-fluid">
  </div>

  <div class="login-card text-center">
    <h1>🏎️ F1 Login</h1>
    <form action="" method="post">
      <div class="mb-3 text-start">
        <label class="fw-bold">Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="mb-3 text-start">
        <label class="fw-bold">Password</label>
        <input type="password" class="form-control" name="pwd" required>
      </div>
      <button type="submit" class="btn btn-danger w-100 pulse" name="login">Login</button>
    </form>
  </div>

  <!-- Bottom Checkered Flag Stripe -->
  <div class="flag-strip"></div>
</div>


</body>
</html>
<?php 
    session_start();
    
    if(isset($_REQUEST['login'])){
        $email=$_REQUEST['email'];
        $pwd=$_REQUEST['pwd'];

        require('../db.php');

        $Q="Select * From tbl_user where EmailId='$email' and Password='$pwd' ";

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
    }
?>