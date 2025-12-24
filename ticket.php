<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formula 1 – Ticket & Race Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #000 70%, #111 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: white;
      min-height: 100vh;
    }

    /* Header with F1 logo */
    .f1-header {
      background: linear-gradient(90deg, #ff0000, #8b0000);
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 26px;
      font-weight: bold;
      letter-spacing: 1px;
      text-shadow: 2px 2px 8px black;
      position: relative;
    }

    .f1-header img {
      height: 40px;
      margin-right: 12px;
      vertical-align: middle;
    }

    /* 3D Card style */
    .card {
      background: white;
      border: 2px solid red;
      border-radius: 14px;
      padding: 22px;
      margin-bottom: 20px;
      transition: all 0.3s ease;
      box-shadow: 0 6px 15px rgba(255, 0, 0, 0.3),
                  inset 0 0 15px rgba(255, 0, 0, 0.2);
    }

    .card:hover {
      transform: translateY(-10px) scale(1.03);
      box-shadow: 0 12px 25px rgba(255, 0, 0, 0.6),
                  inset 0 0 20px rgba(255, 0, 0, 0.4);
      border: 2px solid #ff1a1a;
    }

    .card h4 {
      color: #ff1a1a;
      margin-bottom: 18px;
      text-shadow: 0 0 8px rgba(255, 0, 0, 0.7);
    }

    /* Inputs */
    .card input,
    .card select {
      background-color: white;
      color: black;
      border: 1px solid red;
      box-shadow: inset 0 0 8px rgba(255, 0, 0, 0.5);
    }

    .card input:focus,
    .card select:focus {
      background-color: white;
      border: 1px solid #ff1a1a;
      outline: none;
      box-shadow: 0 0 10px #ff1a1a, inset 0 0 10px rgba(255, 0, 0, 0.5);
    }

    /* Buttons */
    .btn-custom {
      background: linear-gradient(90deg, #ff0000, #b30000);
      color: white;
      border: none;
      font-weight: bold;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      border-radius: 8px;
      padding: 10px;
      box-shadow: 0 4px 15px rgba(255, 0, 0, 0.4);
      transition: 0.3s ease;
      width: 50%;
      align:center;
      
    }

    .btn-custom:hover {
      background: linear-gradient(90deg, #ff4d4d, #e60000);
      transform: scale(1.05);
      box-shadow: 0 6px 20px rgba(255, 0, 0, 0.8);
      width: 50%;
    }



    /* Labels */
    .form-label {
      color: black;
      font-weight: bold;
    }

    /* Available / Sold Out */
    .sold-out {
      color: #ff3333;
      font-weight: bold;
      text-shadow: 0 0 6px red;
    }

    .available {
      color: #00ff00;
      font-weight: bold;
      text-shadow: 0 0 6px lime;
    }
    .d1{
       background: linear-gradient(135deg, #000 70%, #111 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      /* color: white; */
      min-height: 100vh;
    }
    label{
      color:black;
    }
  </style>
</head>
<body>
   <?php include("sider.php"); ?>
 <div class="content d1">
    <div class="f1-header">
    <img src="https://upload.wikimedia.org/wikipedia/commons/3/33/F1.svg" alt="F1 Logo">
    Formula 1 – Ticket & Race Management
  </div>
 <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card">
          <h4>🎟 Ticket Management</h4>
          <form class="row g-4 align-items-center" method="POST">
            
            <div class="col-md-3">
              <label class="form-label">Ticket Type</label>
              <select class="form-select" name="ticketType">
                <option value="GrandStand">GrandStand</option>
                <option value="VIP">VIP</option>
                <option value="Lounge">Lounge</option>
                <option value="General Admission">General Admission</option>
              </select>
            </div>
            
            <div class="col-md-3">
              <label class="form-label">Total Tickets</label>
              <input type="number" class="form-control" placeholder="Enter number" name="qty">
            </div>
            
            <div class="col-md-3">
              <label class="form-label">Price</label>
              <input type="text" class="form-control" placeholder="e.g. 250" name="price"> 
            </div>
            
            <div class="col-md-3">
              <label class="form-label">Currency</label>
              <select class="form-select" name="currency">
                <option>USD ($)</option>
                <option>EUR (€)</option>
                <option>INR (₹)</option>
              </select>
            </div>
          <button type="submit" class="btn btn-danger w-100" name="addTicket">Add Ticket</button>
           
            
           
          </form>
        </div>
      </div>
    </div>
  </div>


    </div>
  </div>

 </div>  
</body>
</html>
<?php 
  if(isset($_POST['addTicket'])){

   // print_r($_POST);
    $tType=$_POST['ticketType'];
    $qty=$_POST['qty'];
    $price=$_POST['price'];
    $currency=$_POST['currency'];

       require("db.php");
        $Q="insert into tbl_ticket values(null,'$tType','$qty','$price','$currency')";
        
        if(mysqli_query($mysql,$Q)){
               echo "
               <script>
                    alert('New Ticket Add 👍');
               </script>";
        }
        else{
          echo "<script>
            alert('Something Wrong Try Again');
          </script>";
        }

  }
?>