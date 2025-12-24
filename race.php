<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Race Management | F1 Portal</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* Body & global */
    body {
        background: #121212;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #fff;
        min-height: 100vh;
    }

    /* Header */
    .f1-header {
        background: linear-gradient(90deg, #ff0000, #8b0000);
        color: #fff;
        padding: 25px 15px;
        text-align: center;
        font-size: 28px;
        font-weight: bold;
        letter-spacing: 1px;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }
    .f1-header img {
        height: 50px;
    }

    /* Cards */
    .card {
        background: #1e1e1e;
        border-radius: 15px;
        padding: 40px 35px;
        margin-bottom: 50px;
        border-left: 6px solid #e10600;
        box-shadow: 0 8px 25px rgba(0,0,0,0.4);
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 35px rgba(225,6,0,0.5);
    }
    .card h4 {
        color: #ff4d4d;
        margin-bottom: 30px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 22px;
    }

    /* Form Inputs */
    .form-control {
        background: #2a2a2a;
        border: 1.5px solid #ff4d4d;
        border-radius: 10px;
        padding: 12px;
        color: #fff;
        font-size: 14px;
        transition: 0.3s;
    }
    .form-control::placeholder {
        color: #aaa;
    }
    .form-control:focus {
        border-color: #ff0000;
        box-shadow: 0 0 12px rgba(225,6,0,0.4);
        outline: none;
        background: #2a2a2a;
    }
    .form-label {
        font-weight: bold;
        color:black;
        font-size: 14px;
        margin-bottom: 6px;
    }

    /* Buttons */
    .btn-danger {
        background: linear-gradient(90deg, #e10600, #ff4d4d);
        border: none;
        border-radius: 10px;
        font-weight: bold;
        text-transform: uppercase;
        padding: 14px 0;
        font-size: 15px;
        transition: 0.3s ease;
    }
    .btn-danger:hover {
        background: linear-gradient(90deg, #ff4d4d, #e60000);
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(225,6,0,0.6);
    }

    /* Content Wrapper */
    .content {
        max-width: 1100px;
        margin: 60px auto;
        padding: 0 15px;
    }

    /* Responsive */
    @media (max-width: 768px){
        .btn-danger {
            width: 100%;
        }
    }

    /* Add subtle animations */
    .fade-in {
        animation: fadeIn 1s ease forwards;
        opacity: 0;
    }
    @keyframes fadeIn {
        to { opacity: 1; }
    }

</style>
</head>
<body>

<?php include("sider.php"); ?>

<div class="content fade-in">
    <div class="f1-header">
        <img src="https://upload.wikimedia.org/wikipedia/commons/3/33/F1.svg" alt="F1 Logo">
        Formula 1 – Ticket & Race Management
    </div>

    <!-- Race Management Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <h4>🏎 Race Management</h4>
                    <form class="row g-4" method="post">
                        <div class="col-md-4">
                            <label class="form-label">Race Date</label>
                            <input type="date" class="form-control" name="raceDate" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Circuit / GP Name</label>
                            <input type="text" class="form-control" placeholder="e.g. Monaco GP" name="Circuit" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" placeholder="e.g. Monte Carlo" name="location" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Total Tickets</label>
                            <input type="number" class="form-control" placeholder="e.g. 5000" name="totalTickets" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Ticket Price ($)</label>
                            <input type="number" class="form-control" placeholder="e.g. 200" name="price" required>
                        </div>
                        <div class="col-12 text-center mt-3">
                            <button type="submit" class="btn btn-danger w-50" name="addRace">Add Race</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php
if(isset($_POST['addRace'])){
    $raceDate = $_POST['raceDate'];
    $Circuit = $_POST['Circuit'];
    $location = $_POST['location'];
    $totalTickets = $_POST['totalTickets'];
    $price = $_POST['price'];

    require("db.php");
    $Q = "INSERT INTO tbl_race VALUES(NULL,'$raceDate','$Circuit','$location','$totalTickets','$price')";

    if(mysqli_query($mysql,$Q)){
        echo "<script>alert('New Race Added 👍');</script>";
    } else {
        echo "<script>alert('Something went wrong! 👎');</script>";
    }
}
?>
