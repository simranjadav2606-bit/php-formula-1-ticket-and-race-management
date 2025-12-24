<?php
// Database connection
require("db.php");

// Insert logic
if (isset($_POST['addResult'])) {
    $gp = $_POST['grandPrix'];
    $raceDate = $_POST['raceDate'];
    $winner = $_POST['winner'];
    $team = $_POST['team'];
    $laps = $_POST['laps'];
    $time = $_POST['time'];

    // Insert into race_result table
    $Q = "INSERT INTO race_results (id, grand_prix, date, winner, team, laps, time) 
          VALUES (NULL, '$gp', '$raceDate', '$winner', '$team', '$laps', '$time')";

    if (mysqli_query($mysql, $Q)) {
        echo "<script>alert('✅ Race Result Added Successfully');</script>";
    } else {
        echo "<script>alert('❌ Something went wrong!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>F1 Admin - Add Race Result</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    body {
        background: #111;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #fff;
        min-height: 100vh;
    }
    .f1-header {
        background: linear-gradient(90deg, #ff0000, #8b0000);
        color: #fff;
        padding: 25px 15px;
        text-align: center;
        font-size: 28px;
        font-weight: bold;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        margin-top: 5px;
        
    }
    .f1-header img { height: 50px; }
    .card {
        background: linear-gradient(145deg, #1e1e1e, #141414);
        border-radius: 20px;
        padding: 40px 35px;
        margin-bottom: 50px;
        border-left: 6px solid #ff0000;
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 14px 40px rgba(255,0,0,0.5);
    }
    .card h4 {
        color: #ff4d4d;
        margin-bottom: 30px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 22px;
        text-align: center;
    }
    .form-control, .form-select {
        background: #2a2a2a;
        border: 1.5px solid #ff4d4d;
        border-radius: 12px;
        padding: 12px;
        color: #fff;
        font-size: 14px;
        transition: all 0.3s ease;
    }
    .form-control::placeholder { color: #bbb; }
    .form-control:focus, .form-select:focus {
        border-color: #ff0000;
        box-shadow: 0 0 12px rgba(255,0,0,0.5);
        outline: none;
    }
    .form-label {
        font-weight: bold;
        color: #ff4d4d;
        font-size: 14px;
    }
    .btn-danger {
        background: linear-gradient(90deg, #e10600, #ff4d4d);
        border: none;
        border-radius: 12px;
        font-weight: bold;
        text-transform: uppercase;
        padding: 14px 0;
        font-size: 15px;
        transition: all 0.3s ease;
        box-shadow: 0 6px 15px rgba(255,0,0,0.5);
    }
    .btn-danger:hover {
        background: linear-gradient(90deg, #ff4d4d, #e10600);
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(255,0,0,0.7);
    }
    .content {
        max-width: 1100px;
        margin: 60px auto;
        padding: 0 15px;
    }
    .fade-in { animation: fadeIn 1s ease forwards; opacity: 0; }
    @keyframes fadeIn { to { opacity: 1; } }
</style>
</head>
<body>
    <?php include("sider.php"); ?>
<div class="content fade-in">
    <div class="f1-header">
        <img src="https://upload.wikimedia.org/wikipedia/commons/3/33/F1.svg" alt="F1 Logo">
        Formula 1 – Race Results Management
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <h4>🏁 Add Race Result</h4>
                    <form class="row g-4" method="post">
                        <div class="col-md-4">
                            <label class="form-label">Grand Prix</label>
                            <select class="form-select" name="grandPrix" required>
                                <option value="">Select Grand Prix</option>
                                <option>Australia</option>
                                <option>China</option>
                                <option>Japan</option>
                                <option>Bahrain</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="raceDate" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Winner</label>
                            <input type="text" class="form-control" name="winner" placeholder="Driver Name" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Team</label>
                            <input type="text" class="form-control" name="team" placeholder="Team Name" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Laps</label>
                            <input type="number" class="form-control" name="laps" placeholder="Total Laps" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Time</label>
                            <input type="text" class="form-control" name="time" placeholder="1:28:34" required>
                        </div>
                        <div class="col-12 text-center mt-3">
                            <button type="submit" class="btn btn-danger w-50" name="addResult">Add Result</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
