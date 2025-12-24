<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Details</title>
     <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.7.1.min.js"></script>
    <style>
/* .nav-tabs {
    border: none;
}

.nav-tabs .nav-item {
    margin-bottom: -1px; 
    border: none;
}

.nav-tabs .nav-link {
    background-color: #f8f9fa; 
    border-radius: 4px 4px 0 0; 
    color:red; 
    font-weight: bold;
    padding: 10px 20px; 
    transition: background-color 0.3s ease, color 0.3s ease; 
}

.nav-tabs .nav-link.active {
    background-color: red; 
    color: #fff; 
    border: none;
}

.nav-tabs .nav-link:hover {
    background-color: #e2e6ea; 
    color: red; 
}
.tab-content {
    border: none; 
    padding: 20px;
    background-color: #fff;
    border-radius: 0 0 4px 4px; 
}
p{
    font-family: 'Times New Roman', Times, serif;

} */
img.rounded-circle {
    border: 4px solid red; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
}
/* #i1{
    width:50%;
    border : 2px solid black;
    border: 3px solid red;
    box-shadow:0  0 7px 6px white;
    margin-top:5%;
    margin-bottom: 5%;
    background-image: url(image/image3.jpeg);
  background-size: cover;
  background-repeat: no-repeat;
}
body{
  background-image: url(image/image3.jpeg);
  background-size: cover;
  background-repeat: no-repeat;
} */
    </style>
</head>
</html>
<?php 
    session_start();
     include("sider.php"); 

    //print_r($_SESSION);
    require("db.php");

    if(!isset($_SESSION['aemail'])){
        header("location:login.php");
    }
      $Email=$_SESSION['aemail'];
      $Sql = "Select * From tbl_admin Where EmailId='$Email'";
      $result = mysqli_query($mysql,$Sql) or ("Query Failed");

      if(mysqli_num_rows($result)>0){
            $AdminData = mysqli_fetch_array($result);
      }
      else{
        echo "<div class='alert alert-danger'>Error : Could Not Retrive Data Please Try Again</div>";
      }
     echo "<div class='container' id='i1' style='background:#1a1a1a; color:#fff; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.7); padding:30px; margin-top:30px;'>";

echo "<div class='container'>";
echo "<div class='content'>";

$path="./image/$AdminData[4]";

// Profile Image with Glow
echo "<div class='d-flex justify-content-center mb-5 mt-4'>
        <img src='$path' alt='admin photo' 
        class='img-fluid rounded-circle' 
        style='width:250px; height:250px; border:5px solid #ff4444; 
        box-shadow:0 0 25px rgba(255,68,68,0.8), 0 0 50px rgba(255,0,0,0.5); 
        transition:transform 0.4s ease;'
        onmouseover=\"this.style.transform='scale(1.08)'\" 
        onmouseout=\"this.style.transform='scale(1)'\">
      </div>";

// Tab Buttons (3D + Dark)
echo "<ul class='nav nav-tabs' id='myTab' role='tablist' style='border-bottom:2px solid #ff4444;'>
        <li class='nav-item' role='presentation'>
            <button class='nav-link active' id='user-info-tab' data-bs-toggle='tab' data-bs-target='#user-info' type='button' role='tab' aria-controls='user-info' aria-selected='true'
            style='background:#2a2a2a; color:#fff; border:none; margin-right:5px; border-radius:10px 10px 0 0; box-shadow:0 4px 10px rgba(0,0,0,0.6);'>
            User Information</button>
        </li>
        <li class='nav-item' role='presentation'>
            <button class='nav-link' id='update-info-tab' data-bs-toggle='tab' data-bs-target='#update-info' type='button' role='tab' aria-controls='update-info' aria-selected='false'
            style='background:#2a2a2a; color:#fff; border:none; margin-right:5px; border-radius:10px 10px 0 0; box-shadow:0 4px 10px rgba(0,0,0,0.6);'>
            Update Information</button>
        </li>
      </ul>";

echo "</div>";

// Tab Content
echo "<div class='tab-content mt-3 mb-3' id='myTabContent' style='padding:20px; background:#2a2a2a; border-radius:10px; box-shadow:inset 0 0 20px rgba(255,68,68,0.4);'>

        <div class='tab-pane fade show active' id='user-info' role='tabpanel' aria-labelledby='user-info-tab'>
          <p><strong><label>Name :</label></strong> $AdminData[1]</p>
          <p><strong><label>Password :</label></strong> $AdminData[3]</p>
          <p><strong><label>Email :</label></strong> $AdminData[2]</p>
          <p><strong><label>Contact Number :</label></strong> $AdminData[5]</p>
          <p><strong><label>BirthDate :</label></strong> $AdminData[6]</p>
        </div>";

echo "<div class='tab-pane fade' id='update-info' role='tabpanel' aria-labelledby='update-info-tab'>
        <form action='' method='post' enctype='multipart/form-data' id='adminForm' style='color:#fff;'>
          <div class='mb-3'>
              <label for='name' class='form-label'>Name</label>
              <input type='text' class='form-control' id='name' name='name' value='$AdminData[1]' required 
              style='background:#111; color:#fff; border:1px solid #ff4444; border-radius:8px;'>
          </div>
          <div class='mb-3'>
              <label for='password' class='form-label'>Password</label>
              <input type='text' class='form-control' id='password' name='password' value='$AdminData[3]' readonly
              style='background:#111; color:#aaa; border:1px solid #555; border-radius:8px;'>
          </div>
          <div class='mb-3'>
              <label for='email' class='form-label'>Email</label>
              <input type='email' class='form-control' id='email' name='email' value='$AdminData[2]' required
              style='background:#111; color:#fff; border:1px solid #ff4444; border-radius:8px;'>
          </div>
          <div class='mb-3'>
              <label for='contactNo' class='form-label'>Contact Number</label>
              <input type='text' class='form-control' id='contactNo' name='contactNo' value='$AdminData[5]' required
              style='background:#111; color:#fff; border:1px solid #ff4444; border-radius:8px;'>
          </div>
          <div class='mb-3'>
              <label for='profilePic' class='form-label'>Profile Picture</label>
              <input type='file' class='form-control' id='profilePic' name='profilePic'
              style='background:#111; color:#fff; border:1px solid #ff4444; border-radius:8px;'>
              <a href='$AdminData[4]' target='_blank'>
                <img src='$path' alt='image' width='150' height='200' class='m-3' 
                style='border:2px solid #ff4444; border-radius:10px; box-shadow:0 0 15px rgba(255,68,68,0.8);'>
              </a>
          </div>

          <button type='submit' class='btn btn-danger' name='btnUpdate' 
          style='width:150px; border-radius:25px; box-shadow:0 5px 15px rgba(255,68,68,0.6); transition:0.3s;'
          onmouseover=\"this.style.transform='scale(1.05)'\" 
          onmouseout=\"this.style.transform='scale(1)'\">
          Update</button>

          <a class='btn btn-warning' href='changePassword.php?Aid=' 
          style='margin-left:10px; width:180px; border-radius:25px; box-shadow:0 5px 15px rgba(255,193,7,0.6); transition:0.3s;'
          onmouseover=\"this.style.transform='scale(1.05)'\" 
          onmouseout=\"this.style.transform='scale(1)'\">
          Change Password</a>    
        </form>
      </div>
    </div>";

echo "</div>";
echo "</div>";
echo "</div>";
?>

