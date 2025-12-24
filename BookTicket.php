<?php 
ob_start();
require("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formula 1 – Book Tickets</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
   body {
  background: #fff;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: black;
  min-height: 100vh;
  margin: 0;
  padding: 0;
}


.ticket-container {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  padding: 40px 20px;
  margin-top: 90px; 
}

.ticket {
  display: flex;
  flex-direction: row;
  background: #000;
  color: white;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 10px 25px rgba(0,0,0,0.6);
  border: 2px dashed #ff1a1a;
  width: 100%;
  max-width: 1000px;
  position: relative;
}
.ticket::before,
.ticket::after {
  content: "";
  position: absolute;
  top: 50%;
  width: 40px;
  height: 40px;
  background: #fff;
  border-radius: 50%;
  transform: translateY(-50%);
  z-index: 2;
}
.ticket::before { left: -20px; }
.ticket::after { right: -20px; }
.ticket-body { flex: 3; padding: 30px; }
.ticket-body h3 {
  color: #ff4d4d;
  font-weight: 600;
  margin-bottom: 20px;
}
.ticket-side {
  flex: 1;
  background: linear-gradient(180deg, #ff1a1a, #b30000);
  color: white;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 20px;
}
.ticket-side img {
  height: 100px;
  margin-bottom: 15px;
  background: white;
  padding: 8px;
  border-radius: 10px;
}
.form-control, .form-select {
  border: 1px solid #ff1a1a;
  border-radius: 8px;
  box-shadow: inset 0 0 8px rgba(255, 0, 0, 0.15);
}
.form-control:focus, .form-select:focus {
  border: 1px solid #ff1a1a;
  box-shadow: 0 0 12px #ff1a1a, inset 0 0 10px rgba(255, 0, 0, 0.3);
}
.btn-book {
  background: linear-gradient(90deg, #ff0000, #b30000);
  color: white;
  border: none;
  font-weight: bold;
  text-transform: uppercase;
  padding: 12px;
  border-radius: 10px;
  margin-top: 15px;
  box-shadow: 0 6px 18px rgba(255, 0, 0, 0.5);
  transition: 0.3s ease-in-out;
}
.btn-book:hover {
  background: linear-gradient(90deg, #ff4d4d, #e60000);
  transform: scale(1.05);
  box-shadow: 0 8px 25px rgba(255, 0, 0, 0.8);
}

  </style>
</head>
<body>
<?php include("header.php"); ?>
<?php 

session_start();

if(!isset($_SESSION['uemail'])){
  header("location:LoginUser.php");
}

if(isset($_REQUEST['RId']) && !empty($_REQUEST['RId'])){
  $RaceId = intval($_REQUEST['RId']); 

  $Sql = "SELECT * FROM tbl_race WHERE RaceId='$RaceId'";
  $result = mysqli_query($mysql,$Sql) or die("Query Failed");

  if(mysqli_num_rows($result) > 0){
    while($r = mysqli_fetch_array($result)){
      echo "
      <div class='ticket-container'>
      <div class='ticket'>
        <div class='ticket-body'>
          <h3>🎟 Formula 1 – Book Your Ticket</h3>
          <form class='row g-3' method='post'>
            <div class='col-md-6'>
              <label class='form-label'>Name</label>
              <input type='text' class='form-control' placeholder='Enter your name' name='fname'>
            </div>
            <div class='col-md-6'>
              <label class='form-label'>Email</label>
              <input type='email' class='form-control' name='email' placeholder='Enter your email'>
            </div>
            <div class='col-md-6'>
              <label class='form-label'>Ticket Type</label>
              <select class='form-select' name='type'>
                <option value='GrandStand'>GrandStand</option>
                <option value='VIP'>VIP</option>
                <option value='Lounge'>Lounge</option>
                <option value='General Admission'>General Admission</option>
              </select>
            </div>
            <div class='col-md-3'>
              <label class='form-label'>Quantity</label>
              <input type='number' class='form-control'  min='1' max='6' name='qty' required>
            </div>
            <div class='col-md-3'>
              <label class='form-label'>Currency</label>
              <select class='form-select' name='currency' readonly>
                <option value='INR (₹)'>INR (₹)</option>
              </select>
            </div>
            <div class='col-md-6'>
              <label class='form-label'>Race</label>
              <input type='text' class='form-control' value='$r[3]' name='race' readonly>
            </div>
            <div class='col-md-6'>
              <label class='form-label'>Date</label>
              <input type='date' class='form-control' value='$r[1]' name='date' readonly>
            </div>

            <div class='col-12'>
              <label class='form-label'>Price</label>
              <input type='text' class='form-control' value='$r[5]' name='price' readonly>
            </div>

            <div class='col-12 text-center'>
              <button type='submit' class='btn-book w-50' name='book'>Book Now</button>
            </div>
          </form>
        </div>
        <div class='ticket-side'>
          <img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Formula1Ticket' alt='QR Code'>
          <p class='small'>Scan for Entry</p>
          <img src='https://upload.wikimedia.org/wikipedia/commons/3/33/F1.svg' alt='F1 Logo' style='height:40px;' >
        </div>
      </div>
      </div>";
    }
  } else {
    echo "<h3 style='color:red;'>No race found for this ID.</h3>";
  }

} else {
  echo "<h3 style='color:red;'>No Race selected. Please pass ?RId= in the URL.</h3>";
}
?>
<?php
require("footer.php");
?>
</body>
</html>

<?php 
if(isset($_REQUEST['book'])){
  
    $name=$_REQUEST['fname'];
    $email=$_REQUEST['email'];
    $type=$_REQUEST['type'];
    $qty=$_REQUEST['qty'];
    $Race=$_REQUEST['race'];
    $date=$_REQUEST['date'];
    $price=$_REQUEST['price'];
    $currency=$_REQUEST['currency'];
    $totalBill = $price * $qty;
        
    // ✅ check available tickets first
    $Query="SELECT TotalTicket FROM tbl_race WHERE RaceId='$RaceId'";
    $res=mysqli_query($mysql,$Query);
    $row=mysqli_fetch_assoc($res);

    if($row['TotalTicket'] < $qty){
       echo "<script>
        Swal.fire({
            icon: 'error',
            title: '😢 Tickets Not Available!',
            text: 'Only {$row['TotalTicket']} tickets left for this race.',
            footer: '<b>Please reduce quantity or try another race 🏁</b>',
            confirmButtonText: 'OK',
            confirmButtonColor: '#d33'
        });
    </script>";
   
    } else {     
      $Q = "INSERT INTO tbl_ticket (Name,EmailId,TicketType,Race,RaceDate,TicketQty,Price,Currency,TotalPrice)
            VALUES ('$name','$email','$type','$Race','$date','$qty','$price','$currency','$totalBill')";

      $InsertResult = mysqli_query($mysql, $Q);

      
      $Update = "UPDATE tbl_race SET TotalTicket = TotalTicket - $qty WHERE RaceId='$RaceId'";
      $UpdateResult = mysqli_query($mysql, $Update);

      if($InsertResult && $UpdateResult){
          echo "<script>
              Swal.fire({
                  icon: 'success',
                  title: '🎉 Booking Successful!',
                  html: 'Your Formula 1 ticket has been booked successfully! <br>',
                  confirmButtonText: 'OK',
                  confirmButtonColor: '#3085d6'
              });
          </script>";
      } else {
          $errorMsg = mysqli_error($mysql);
          echo "<script>
              Swal.fire({
                  icon: 'error',
                  title: '⚠️ Booking Failed!',
                  text: 'Something went wrong. Please try again.\\nError: {$errorMsg}',
                  confirmButtonText: 'OK',
                  confirmButtonColor: '#d33'
              });
          </script>";
      }
}
}
?>