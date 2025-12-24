<?php 
ob_start();
require("db.php");

session_start();

if(!isset($_SESSION['uemail'])){
  header("location:LoginUser.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require("header.php"); ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>F1 Race Schedule</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #121212, #1c1c1c, #000000);
      font-family: 'Poppins', sans-serif;
      color: #fff;
    }
    .schedule-card {
      background: #1e1e1e;
      border-radius: 20px;
      box-shadow: 0px 5px 15px rgba(0,0,0,0.5);
      overflow: hidden;
      margin-bottom: 30px;
      margin-top: 20px;
    }
    .schedule-header {
      background: linear-gradient(to right, #ff1a1a, #990000);
      color: #fff;
      padding: 15px;
      text-transform: uppercase;
      font-weight: bold;
      letter-spacing: 1px;
      position: relative;
    }
    .schedule-header::after {
      content: "";
      position: absolute;
      bottom: -8px;
      left: 0;
      width: 100%;
      height: 8px;
      background: repeating-linear-gradient(
        45deg,
        black 0px,
        black 15px,
        white 15px,
        white 30px
      );
      animation: stripeMove 3s linear infinite;
    }
    @keyframes stripeMove {
      from { background-position: 0 0; }
      to { background-position: 60px 0; }
    }
    .schedule-body { padding: 20px; }
    .race-item {
      display: flex;
      align-items: center;
      border-bottom: 1px solid #333;
      padding: 15px 0;
      transition: 0.3s;
    }
    .race-item:last-child { border-bottom: none; }

    /* Dim effect if sold out */
    .soldout {
      opacity: 0.5;
      pointer-events: none;
      filter: grayscale(80%);
    }

    .circuit-img {
      width: 150px;
      height: auto;
      margin-right: 15px;
      padding: 4px;
    } 
    .race-details h5 {
      margin: 0;
      font-weight: bold;
      color: #fff;
    }
    .race-details p {
      margin: 0;
      font-size: 0.9rem;
      color: #bbb;
    }
    .btn-danger {
      background: linear-gradient(to right, #ff0000, #cc0000);
      border: none;
      border-radius: 8px;
      font-weight: bold;
      padding: 6px 15px;
      transition: 0.3s;
    }
    .btn-danger:hover {
      background: linear-gradient(to right, #cc0000, #990000);
      box-shadow: 0px 5px 15px rgba(255,0,0,0.5);
    }
    .btn-danger:disabled {
      background: #555;
      cursor: not-allowed;
      box-shadow: none;
    }
  </style>
</head>
<body>

<?php 
$Sql = "SELECT * FROM tbl_race";
$result = mysqli_query($mysql,$Sql) or die("Query Failed");

if(mysqli_num_rows($result) > 0){
  echo "<div class='container'>
          <div class='schedule-card'>
            <div class='schedule-header'>🏎️ F1 2025 Race Schedule</div>
            <div class='schedule-body'>";
  
  while($r = mysqli_fetch_array($result)){
    // Check if ticket quantity is 0
    $soldOut = $r['TotalTicket'] <= 0; // replace 'ticket_quantity' with your column name
    $soldOutClass = $soldOut ? "soldout" : "";
    $disabledAttr = $soldOut ? "disabled" : "";
    
    echo "
      <form method='post' action=''>
        <div class='race-item $soldOutClass'>
          <img src='Image/circuit2.PNG' alt='Circuit Map' class='circuit-img'>
          <div class='race-details'>
            <h5>$r[2]</h5>
            <p>Price Per Ticket : $r[5]</p>
            <p>$r[3] · $r[1]</p>";
    if($soldOut){
        echo "<p class='text-danger fw-bold'>SOLD OUT</p>";
    }
    echo "  </div>
          <input type='hidden' name='RaceId' value='$r[0]'>
          <button class='btn btn-danger btn-sm ms-auto' type='submit' name='bookticket' $disabledAttr>Get Ticket</button>
        </div>
      </form>
    ";
  }

  echo "    </div>
          </div>
        </div>";
}
else {
  echo "<div class='alert alert-danger text-center'>⚠️ Error: Could Not Retrieve Data. Please Try Again.</div>";
}
?>
<?php
require("footer.php");
?>
</body>
</html>

<?php 
if(isset($_POST['bookticket'])){
  $raceId = $_POST['RaceId']; // get hidden input value
  header("Location: BookTicket.php?RId=$raceId");
  exit();
}
?>
