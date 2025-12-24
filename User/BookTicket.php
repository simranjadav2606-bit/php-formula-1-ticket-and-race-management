<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formula 1 – Book Tickets</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #000 70%, #111 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: white;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px;
    }

    /* Horizontal Ticket Style */
    .ticket {
      display: flex;
      flex-direction: row;
      background: #fff;
      color: black;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 15px 35px rgba(0,0,0,0.7);
      border: 2px dashed #ff1a1a;
      width: 100%;
      max-width: 1000px;
      position: relative;
    }

    /* Cutout edges like real tickets */
    .ticket::before,
    .ticket::after {
      content: "";
      position: absolute;
      top: 50%;
      width: 40px;
      height: 40px;
      background: #000;
      border-radius: 50%;
      transform: translateY(-50%);
      z-index: 2;
    }
    .ticket::before { left: -20px; }
    .ticket::after { right: -20px; }

    /* Left side (info + form) */
    .ticket-body {
      flex: 3;
      padding: 30px;
    }
    .ticket-body h3 {
      color: #ff1a1a;
      text-shadow: 0 0 8px rgba(255, 0, 0, 0.7);
      font-weight: bold;
      margin-bottom: 20px;
    }

    /* Right side (QR + branding) */
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

    /* Form elements */
    .form-control, .form-select {
      border: 1px solid #ff1a1a;
      border-radius: 8px;
      box-shadow: inset 0 0 8px rgba(255, 0, 0, 0.15);
    }
    .form-control:focus, .form-select:focus {
      border: 1px solid #ff1a1a;
      box-shadow: 0 0 12px #ff1a1a, inset 0 0 10px rgba(255, 0, 0, 0.3);
    }

    /* Button */
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

  <!-- Ticket -->
  <div class="ticket">
    <!-- Left Side -->
    <div class="ticket-body">
      <h3>🎟 Formula 1 – Book Your Ticket</h3>
      <form class="row g-3">

        <div class="col-md-6">
          <label class="form-label">Full Name</label>
          <input type="text" class="form-control" placeholder="Enter your name">
        </div>

        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" placeholder="Enter your email">
        </div>

        <div class="col-md-6">
          <label class="form-label">Ticket Type</label>
          <select class="form-select">
            <option>GrandStand</option>
            <option>VIP</option>
            <option>Lounge</option>
            <option>General Admission</option>
          </select>
        </div>

        <div class="col-md-3">
          <label class="form-label">Quantity</label>
          <input type="number" class="form-control" placeholder="1">
        </div>

        <div class="col-md-3">
          <label class="form-label">Currency</label>
          <select class="form-select">
            <option>USD ($)</option>
            <option>EUR (€)</option>
            <option>INR (₹)</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label">Race Selection</label>
          <select class="form-select">
            <option>Monaco GP – Monte Carlo</option>
            <option>Italian GP – Monza</option>
            <option>British GP – Silverstone</option>
            <option>Singapore GP – Marina Bay</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label">Date</label>
          <input type="date" class="form-control">
        </div>

        <div class="col-12 text-center">
          <button type="submit" class="btn-book w-50">Book Now</button>
        </div>
      </form>
    </div>

    <!-- Right Side -->
    <div class="ticket-side">
      <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Formula1Ticket" alt="QR Code">
      <p class="small">Scan for Entry</p>
      <img src="https://upload.wikimedia.org/wikipedia/commons/3/33/F1.svg" alt="F1 Logo" style="height:40px;">
    </div>
  </div>

</body>
</html>

