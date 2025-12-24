<?php 
  ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registraion Page</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.7.1.min.js"></script>
  <style>
 body {
      background: linear-gradient(135deg, #0d0d0d, #1a1a1a, #000000);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      font-family: 'Poppins', sans-serif;
      color: white;
    }

    /* Spinning Logo */
    .spin-3d {
      animation: spin 10s linear infinite;
      filter: drop-shadow(0 0 25px red);
    }
    @keyframes spin {
      0% { transform: rotateY(0deg); }
      100% { transform: rotateY(360deg); }
    }

    /* Card (3D Effect) */
    .card {
      background: #111;
      border: 2px solid red;
      border-radius: 20px;
      box-shadow: 0 0 25px rgba(255, 0, 0, 0.6), inset 0 0 15px rgba(255, 0, 0, 0.2);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .card:hover {
      transform: scale(1.02) rotateX(5deg) rotateY(5deg);
      box-shadow: 0 0 40px rgba(255, 0, 0, 0.8), inset 0 0 20px rgba(255, 0, 0, 0.4);
    }

    /* Heading */
    .card h1 {
      font-size: 2rem;
      font-weight: bold;
      color: red;
      margin-bottom: 25px;
      text-shadow: 0 0 10px rgba(255, 0, 0, 0.8);
    }

    /* Labels */
    .col-form-label {
      color: #ff4d4d;
      font-weight: bold;
    }

    /* Input Fields */
    .form-control {
      background: #1a1a1a;
      border: 1.5px solid red;
      border-radius: 10px;
      color: white;
      padding: 10px;
      transition: 0.3s;
    }
    .form-control:focus {
      box-shadow: 0 0 15px red;
      border-color: #ff3333;
      background: #000;
    }

    /* Button */
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

    /* Links */
    a.nav-item {
      color: red;
      font-weight: bold;
      text-decoration: none;
      transition: 0.3s;
    }
    a.nav-item:hover {
      color: #ff4d4d;
      text-shadow: 0 0 10px red;
    }
    label{
        color:white
    }

  </style>
</head>
<body>
   <!-- Logo -->
  <div class="text-center mb-4">
    <img src="image/logo.png" alt="Logo" height="150" width="150" class="spin-3d img-fluid">
  </div>

  <!-- Horizontal Registration Form -->
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card">
          <div class="card-body p-4 p-md-5">
            <h1 class="text-center">Registration</h1>

            <form method="post" enctype="multipart/form-data" class="row g-3 align-items-center">

              <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>

              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>

              <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="pwd" required>
              </div>

              <div class="col-md-6">
                <label for="birthdate" class="form-label">Birthdate</label>
                <input type="date" class="form-control" id="birthdate" name="bdate" required>
              </div>

              <div class="col-md-6">
                <label for="cno" class="form-label">Contact No</label>
                <input type="tel" class="form-control" id="cno" name="cno" required>
              </div>

              <div class="col-md-6">
                <label for="image" class="form-label">Profile Image</label>
                <input class="form-control" type="file" id="image" name="img" accept="image/*" required>
              </div>

              <div class="col-12 mt-5">
                <input type="submit" class="btn btn-danger w-100" name="btnsubmit" value="Register"/>
                <!-- <p class="mt-3 text-center text-light">Already have an account? 
                  <a href="login.php" class="nav-item">Login</a>
                </p> -->
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
  if(isset($_REQUEST['btnsubmit'])){
        // print_r($_REQUEST);

        $name=$_REQUEST['name'];
        $email=$_REQUEST['email'];
        $pwd=$_REQUEST['pwd'];
        $bdate=$_REQUEST['bdate'];
        $cno=$_REQUEST['cno'];
        $fname=$_FILES['img']['name'];
        $fpath=$_FILES['img']['tmp_name'];
        $fsize=$_FILES['img']['size'];
        $ftype=$_FILES['img']['type'];

        require("db.php");
        $Q="insert into tbl_admin values(null,'$name','$email','$pwd','$fname','$cno','$bdate')";

        if(mysqli_query($mysql,$Q)){
                move_uploaded_file($fpath,"./image/".$fname);
                header("location:login.php");
        }
        else{
          echo "<script>
            alert('Something Wrong Try Again');
          </script>";
        }
  }
?>