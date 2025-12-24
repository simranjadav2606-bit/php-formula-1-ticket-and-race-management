<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.7.1.min.js"></script>
    <!-- <script>
         $(document).ready(function(){
            $(".showlogo").hide()
            $(".showlogo").show(2000)   
            $(".show").hide()
            $(".show").slideDown(2000)
         })
    </script> -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">  
       <script>
         function Validatemail(){
            var email=document.getElementById('em').value;
            const emailerror=document.getElementById('emailerror');
            const atindex=email.indexOf('@');
            const dotindex=email.indexOf('.',atindex);

            if(atindex===-1||dotindex===-1||atindex>dotindex){
                emailerror.textContent='invalid email format."@" must come before "."';
            }
            else{
                emailerror.textContent="";
            }
          }
        </script>     
<style>
    body {
      background: linear-gradient(135deg, #0d0d0d, #1a1a1a, #000000);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Poppins', sans-serif;
      color: white;
    }

    .showlogo img {
      animation: spin 10s linear infinite;
      filter: drop-shadow(0 0 15px red);
    }

    @keyframes spin {
      0% { transform: rotateY(0deg); }
      100% { transform: rotateY(360deg); }
    }

    .login-card {
      background: #111;
      border: 2px solid red;
      border-radius: 20px;
      box-shadow: 0 0 25px rgba(255, 0, 0, 0.6), inset 0 0 15px rgba(255, 0, 0, 0.2);
      padding: 40px;
      width: 100%;
      max-width: 420px;
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .login-card:hover {
      transform: scale(1.03) rotateX(5deg) rotateY(5deg);
      box-shadow: 0 0 40px rgba(255, 0, 0, 0.8), inset 0 0 20px rgba(255, 0, 0, 0.4);
    }

    .login-card h1 {
      font-size: 2rem;
      font-weight: bold;
      color: red;
      margin-bottom: 25px;
      text-shadow: 0 0 10px rgba(255, 0, 0, 0.8);
    }

    .form-control {
      background: #1a1a1a;
      border: 1.5px solid red;
      border-radius: 10px;
      color: white;
      padding: 12px;
      transition: 0.3s;
    }

    .form-control:focus {
      box-shadow: 0 0 15px red;
      border-color: #ff3333;
      background: #000;
    }

    .btn-danger {
      background: red;
      border: none;
      border-radius: 10px;
      font-weight: bold;
      text-transform: uppercase;
      padding: 12px;
      box-shadow: 0 0 15px rgba(255, 0, 0, 0.7);
      transition: 0.3s;
    }

    .btn-danger:hover {
      background: #ff1a1a;
      box-shadow: 0 0 25px red, inset 0 0 10px black;
      transform: scale(1.05);
    }
  </style>
    
</head>
<body>  
  <div class="text-center mb-5 showlogo">
    <img src="image/logo.png" alt="Logo" height="180" width="180" class="img-fluid">
  </div>

  <div class="login-card text-center">
    <h1>Login</h1>
    <form action="" method="post">
      <div class="mb-3 text-start">
        <label>Email</label>
        <input type="email" class="form-control" name="email" id="em" required onblur="Validatemail()">

      </div>
      <div class="mb-3 text-start">
        <label>Password</label>
        <input type="password" class="form-control" name="pwd" required>
      </div>
      <button type="submit" class="btn btn-danger w-100" name="login">Login</button>
    </form>
    <p class="mt-3" style="color:white; font-weight:bold;">
    Account Not Yet? 
    <a href="index.php" style="color:red; text-decoration:none; font-weight:bold;" 
       onmouseover="this.style.textDecoration='underline'" 
       onmouseout="this.style.textDecoration='none'">
       Join With Formula F1
    </a>
  </p>
  </div>

</body>
</html>
<?php 
    session_start();
    
    if(isset($_REQUEST['login'])){
        $email=$_REQUEST['email'];
        $pwd=$_REQUEST['pwd'];

        require('db.php');

        $Q="Select * From tbl_admin where EmailId='$email' and Password='$pwd' ";

        $result = mysqli_query($mysql,$Q) or die("Faild".mysqli_error($mysql));
        
        $nor=mysqli_num_rows($result);
 
        if($nor>0){
            $_SESSION['aemail']=$email;
            header("location:dashboard.php");
        }
        else{
            echo "<script>
                alert('Something Want To Wrong Try Again')
            </script>";
        }
    }
?>