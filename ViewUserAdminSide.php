<?php 
ob_start();  
require("db.php");
session_start();

if(!isset($_SESSION['aemail'])){
    header("location:login.php");
    exit;
}

if(!isset($_GET['Uid'])){
    echo "<div class='alert alert-danger text-center'>No User Selected!</div>";
    exit;
}

$Uid = $_GET['Uid'];
$Sql = "SELECT * FROM tbl_user WHERE Id='$Uid'";
$result = mysqli_query($mysql,$Sql) or die("Query Failed: " . mysqli_error($mysql));

if(mysqli_num_rows($result) > 0){
    $UserData = mysqli_fetch_array($result);
} else {
    echo "<div class='alert alert-danger text-center'>User Not Found!</div>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - View User</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
body {
    background: #f4f4f4;
    font-family: 'Segoe UI', sans-serif;
    margin: 0;
    padding: 0;
}

/* Container */
.content {
    max-width: 1000px;
    margin: 50px auto;
    padding: 20px;
}

/* Profile Card */
.profile-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    border-left: 6px solid #e10600;
}

/* Header */
.profile-header {
    display: flex;
    align-items: center;
    padding: 30px;
    background: linear-gradient(90deg,#ffe5e5,#fff5f5);
    gap: 25px;
    border-bottom: 1px solid #ddd;
}

.profile-header img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 4px solid #e10600;
    object-fit: cover;
}

.profile-header h2 {
    margin: 0;
    color: #e10600;
    font-size: 26px;
}

.profile-header h2 span {
    display: block;
    font-size: 14px;
    color: #555;
    margin-top: 5px;
    font-weight: 500;
}

/* Profile Body */
.profile-body {
    padding: 25px 30px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.info-box {
    background: #fff0f0;
    border-left: 4px solid #e10600;
    padding: 15px 20px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 15px;
    transition: 0.3s;
}

.info-box:hover {
    background: #ffe5e5;
}

.info-box i {
    font-size: 20px;
    color: #e10600;
    width: 30px;
}

.info-label {
    font-size: 13px;
    font-weight: 600;
    color: #777;
    text-transform: uppercase;
}

.info-value {
    font-size: 15px;
    font-weight: 500;
    color: #333;
}

/* Full width for password box */
.info-box.password-box {
    grid-column: span 2;
    border-left: 4px solid #cc0000;
}

/* Buttons */
.button-group {
    margin-top: 30px;
    display: flex;
    gap: 15px;
}

.btn-custom {
    background: #e10600;
    color: #fff;
    border: none;
    padding: 10px 25px;
    border-radius: 25px;
    font-weight: bold;
    text-decoration: none;
    transition: 0.3s;
}

.btn-custom:hover {
    background: #cc0000;
    transform: translateY(-2px);
}

@media(max-width:768px){
    .profile-body {
        grid-template-columns: 1fr;
    }
    .info-box.password-box {
        grid-column: span 1;
    }
}
</style>
</head>
<body>

<?php include("sider.php");?>

<div class="content">
    <div class="profile-card">
        <div class="profile-header">
            <?php $path = "./image/" . $UserData[9]; ?>
            <img src="<?= $path ?>" alt="User">
            <div>
                <h2><?= $UserData[1] ?> <span>Formula 1 Member</span></h2>
            </div>
        </div>

        <div class="profile-body">
            <div class="info-box">
                <i class="fa fa-envelope"></i>
                <div>
                    <div class="info-label">Email</div>
                    <div class="info-value"><?= $UserData[2] ?></div>
                </div>
            </div>
            <div class="info-box">
                <i class="fa fa-calendar"></i>
                <div>
                    <div class="info-label">Birthdate</div>
                    <div class="info-value"><?= $UserData[4] ?></div>
                </div>
            </div>
            <div class="info-box">
                <i class="fa fa-phone"></i>
                <div>
                    <div class="info-label">Contact No</div>
                    <div class="info-value"><?= $UserData[3] ?></div>
                </div>
            </div>
            <div class="info-box">
                <i class="fa fa-city"></i>
                <div>
                    <div class="info-label">City</div>
                    <div class="info-value"><?= $UserData[5] ?></div>
                </div>
            </div>
            <div class="info-box">
                <i class="fa fa-map"></i>
                <div>
                    <div class="info-label">State</div>
                    <div class="info-value"><?= $UserData[6] ?></div>
                </div>
            </div>
            <div class="info-box">
                <i class="fa fa-flag"></i>
                <div>
                    <div class="info-label">Country</div>
                    <div class="info-value"><?= $UserData[7] ?></div>
                </div>
            </div>
            <div class="info-box password-box">
                <i class="fa fa-lock"></i>
                <div>
                    <div class="info-label">Password</div>
                    <div class="info-value text-danger">🔒 Hidden for Security</div>
                </div>
            </div>
        </div>

        <div class="button-group" style="padding: 0 30px 30px;">
            <a href="UserManagement.php" class="btn-custom">⬅ Back to Users</a>
            <!-- <a href"EditUser.php?Uid=<?= $UserData[0] ?>" class="btn-custom">✏ Edit User</a>= -->
        </div>
    </div>
</div>

</body>
</html>
