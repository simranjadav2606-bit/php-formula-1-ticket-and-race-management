<!DOCTYPE html>
<html lang="en">
<head>
  <?php require("header.php"); ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formula 1 Hotel Experiences</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #0b0101ff;
      margin: 0;
      padding: 0;
    }

    /* Hero Section */
    .hero {
      background: url('img/im3.jpg') center/cover no-repeat;
      color: white;
      padding: 100px 20px;
      text-align: center;
    }
    .hero h1 {
      font-size: 2.5rem;
      font-weight: bold;
    }

    /* Hotel Cards */
    .hotel-card {
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      transition: transform 0.2s ease;
      height: 100%; /* make equal height */
      display: flex;
      flex-direction: column;
    }
    .hotel-card:hover { transform: translateY(-5px); }

    .hotel-card img {
      height: 220px;          /* fixed image height */
      width: 100%;
      object-fit: cover;      /* crop instead of stretch */
    }

    .card-body {
      flex: 1;                /* push button down */
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .hotel-card ul {
      padding-left: 18px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <!-- Hero Section -->
  <section class="hero">
    <h1>Stay Close to the Action – Exclusive Formula 1 Hotel Packages</h1>
  </section>

  <!-- Hotel Cards -->
  <div class="container mt-5" id="hotels">
    <h2 class="text-center mb-4 text-danger">🏎 Formula 1 Hotel Experiences </h2>
    <div class="row g-4">

      <!-- Hotel 1 -->
      <div class="col-md-4 d-flex">
        <div class="card hotel-card w-100">
          <img src="Image\monaco.jpeg" alt="Hotel Monaco">
          <div class="card-body">
            <h5 class="card-title">Grand Prix Hotel Monaco</h5>
            <p>Monte Carlo</p>
            <span class="badge bg-dark">Official Partner</span>
            <ul>
              <li>VIP Race Viewing Deck</li>
              <li>Paddock Club Access</li>
            </ul>
            <p><strong>From $1200/night</strong></p>
            <a href="https://www.google.com/aclk?sa=L&ai=DChsSEwiE6pLWjdWPAxW7wzwCHQ5XJ-kYACICCAEQABoCc2Y&co=1&ase=2&gclid=CjwKCAjwiY_GBhBEEiwAFaghvhy7z6YJxSUtEZyOVEfo8x8s187JV2k0MVBQQbYR8SC-CkhsxmZ-GxoCqvkQAvD_BwE&cce=2&category=acrcp_v1_32&sig=AOD64_2dE3OqnFSIGF3OBTla-6AJrogoKQ&q&nis=4&adurl&ved=2ahUKEwjJ7IjWjdWPAxUzxzgGHfLpL18Q0Qx6BAgPEAE" class="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>

      <!-- Hotel 2 -->
      <div class="col-md-4 d-flex">
        <div class="card hotel-card w-100">
          <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" alt="Hotel Paris">
          <div class="card-body">
            <h5 class="card-title">Formula One Paris</h5>
            <p>Paris</p>
            <span class="badge bg-danger">VIP Partner</span>
            <ul>
              <li>Paddock Access</li>
              <li>Private Race Viewing Deck</li>
            </ul>
            <p><strong>$950/night</strong></p>
            <a href="https://www.google.com/aclk?sa=l&ai=DChsSEwi_rMqZjtWPAxXzLYMDHfATJQ4YACICCAEQPBoCc2Y&co=1&ase=2&gclid=CjwKCAjwiY_GBhBEEiwAFaghvkKhiGLJAYlPUGdznQet-1uxA2zAU64nLEnUuoyAN6qHc4nmPtCaRRoCSJ8QAvD_BwE&category=acrcp_v1_48&sig=AOD64_2PVmjJlnJD_rztdBMdbt9A0dazrA&adurl=&ved=2ahUKEwj0h76ZjtWPAxVWzTgGHeVMAAgQhrUFegQIBxAI" class="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>

      <!-- Hotel 3 -->
      <div class="col-md-4 d-flex">
        <div class="card hotel-card w-100">
          <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2" alt="Hotel Austin">
          <div class="card-body">
            <h5 class="card-title">Speedway Suites Austin</h5>
            <p>Austin</p>
            <span class="badge bg-dark">Official Partner</span>
            <ul>
              <li>Pit Lane Walks</li>
              <li>Meet & Greet with Drivers</li>
            </ul>
            <p><strong>$1100/night</strong></p>
            <a href="https://www.google.com/aclk?sa=l&ai=DChsSEwj14bqxjtWPAxUpo2YCHYINAg0YACICCAEQJhoCc20&co=1&ase=2&gclid=CjwKCAjwiY_GBhBEEiwAFaghvtVBHaV44h5AgKJl0971JdFoI7aRW0Fitema_MFPNJDqOQbuRIIn8RoCffEQAvD_BwE&category=acrcp_v1_48&sig=AOD64_25Tn2VCZkDdpLbv3tukJE_SOwNxA&adurl=&ved=2ahUKEwiLjbCxjtWPAxVR-jgGHaimAPMQhrUFegQICRAO" class ="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>

      <!-- Hotel 4 -->
      <div class="col-md-4 d-flex">
        <div class="card hotel-card w-100">
          <img src="Image\dubai.jpg" alt="Hotel Dubai">
          <div class="card-body">
            <h5 class="card-title">Beach Suites Dubai</h5>
            <p>Dubai</p>
            <span class="badge bg-dark">Official Partner</span>
            <ul>
              <li>VIP Lounges</li>
              <li>Meet & Greet with Drivers</li>
            </ul>
            <p><strong>$1100/night</strong></p>
            <a href="https://www.google.com/travel/search?g2lb=4965990,4969803,72302247,72317059,72414906,72471280,72472051,72485658,72560029,72573224,72616120,72647020,72686036,72803964,72882230,72958624,72959983,72990342,73059275,73064216,73064764,73076417,73101993,73110162&hl=en-IN&gl=in&cs=1&ssta=1&q=dubai+hotels&ts=CAESCgoCCAMKAggDEAAaHBIaEhQKBwjpDxAJGBESBwjpDxAJGBIYATICEAAqBwoFOgNJTlI&qs=CAEyE0Nnb0lrTEdpc2YySDVjY2tFQUU4CkIJEd374qXtjvMQQgkREUybPTLPIg9CCREU9BEAJ0g0s1pFMkOqAUAQASoKIgZob3RlbHMoADIeEAEiGkgqiq6nRIQedwg6yFsLDc8MYu3xT7BJcjAVMhAQAiIMZHViYWkgaG90ZWxz&ap=aAG6AQhvdmVydmlldw&ictx=111&ved=1t:196188" class="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>

      <!-- Hotel 5 -->
      <div class="col-md-4 d-flex">
        <div class="card hotel-card w-100">
          <img src="Image\the-ritz-carlton-.jpg" alt="Hotel Ritz"> <!-- fixed filename -->
          <div class="card-body">
            <h5 class="card-title">The Ritz-Carlton</h5>
            <p>Australia</p>
            <span class="badge bg-danger">VIP Partner</span>
            <ul>
              <li>Paddock Access</li>
              <li>Private Race Viewing Deck</li>
            </ul>
            <p><strong>$950/night</strong></p>
            <a href="https://www.google.com/aclk?sa=L&ai=DChsSEwi5p__JjtWPAxU2qmYCHYPBIgoYACICCAEQABoCc20&co=1&ase=2&gclid=CjwKCAjwiY_GBhBEEiwAFaghvlapd8Mrdbapzi8bty93p5IlP3jsYSjE4y-X3Y6ya1WuC-n5J1EprBoCgcoQAvD_BwE&cce=2&category=acrcp_v1_32&sig=AOD64_1RUvT60cGxJGAf3ugJUxMjx_GKBg&q&nis=4&adurl&ved=2ahUKEwjNmPXJjtWPAxUQyDgGHepwFbgQ0Qx6BAguEAE" class="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>

      <!-- Hotel 6 -->
      <div class="col-md-4 d-flex">
        <div class="card hotel-card w-100">
          <img src="Image\venetian las vegas.jpg" alt="Hotel Vegas"> <!-- fixed filename -->
          <div class="card-body">
            <h5 class="card-title">Grand Prix Hotel Las Vegas</h5>
            <p>Vegas</p>
            <span class="badge bg-dark">Official Partner</span>
            <ul>
              <li>VIP Race Viewing Deck</li>
              <li>Paddock Club Access</li>
            </ul>
            <p><strong>From $1200/night</strong></p>
            <a href="https://www.google.com/aclk?sa=L&ai=DChsSEwjtz4jXjtWPAxVfo2YCHeGhDt8YACICCAEQABoCc20&co=1&ase=2&gclid=CjwKCAjwiY_GBhBEEiwAFaghvmlerNdjVaD0hS-gcmXhusUkWCGCaOAn0KIfbDt61uf2FtE1qQgH8RoCK-QQAvD_BwE&cce=2&category=acrcp_v1_32&sig=AOD64_3hob_w5QfD7nh6840l7sXiCzssag&q&nis=4&adurl&ved=2ahUKEwiv8_7WjtWPAxUd1TgGHXokN8oQ0Qx6BAhdEAE" class="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php require("footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
