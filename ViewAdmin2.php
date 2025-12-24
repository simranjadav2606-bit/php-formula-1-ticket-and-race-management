<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view admin</title>
     <link rel="stylesheet" href="bootstrap.min.css">
     <style>
        td{
     font-family: 'Times New Roman', Times, serif;
    font-weight: bold;
}
     </style>
</head>
<body>
    
</body>
</html>
<?php 
    session_start();
  require("db.php");
    if(!isset($_SESSION['aemail'])){
        header("location:login.php");
    }
  
    $email = $_SESSION['aemail'];
    $Q= "select * from tbl_admin where EmailId=$email";
    $result = mysqli_query($mysql,$Q) or die("Query Failed".mysqli_error($mysql));

    $nor = mysqli_num_rows($result);

    if($nor>0){
        echo "<table class='table table-light'>
                <thead class='thead thead-dark'>
                    <th>Admin Name</th>
                    <th>EmailId</th>
                    <th>Password</th>
                    <th>Conect No</th>
                    <th>Birthdate</th>
                    <th>Profile Image</th>
                    <th colspan=5 align='center'>Action</th>
                </thead>";
    
                while($r = mysqli_fetch_array($result)){
                    $path ="./image/$r[4]";
                    echo "<tbody>
                    <tr>
                    <td>$r[1]</td>
                    <td>$r[2]</td>
                      <td>$r[3]</td>
                        <td>$r[5]</td>
                         <td>$r[6]</td>
                          <td><img src='$path' width='150px;' height='150px;'/></td>
                            <td><a href = 'updateadmin.php?AdminId=$r[0]'>Update Admin </a></td>
                             <td><a href = 'updateadmin.php?AdminId=$r[0]'>Delete Admin </a></td>
                    </tr>
                    </tbody>
                    ";
                }
    echo "<table>";
    }
?>