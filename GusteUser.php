<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guest User Homepage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #000000, #1a1a1a);
      color: #fff;
    }
    .navbar {
      background-color: #111;
    }
    .navbar-brand {
      font-weight: bold;
      color: #ff0000 !important;
      letter-spacing: 2px;
    }
    .hero-section {
      text-align: center;
      padding: 100px 20px;
      background: url('https://images.unsplash.com/photo-1600275830870-c75d1f79b2c2?auto=format&fit=crop&w=1350&q=80') no-repeat center center;
      background-size: cover;
      border-radius: 15px;
      margin: 30px 0;
    }
    .hero-section h1 {
      font-size: 3rem;
      font-weight: bold;
      color: #ff0000;
      text-shadow: 2px 2px 10px #000;
    }
    .hero-section p {
      font-size: 1.2rem;
      color: #fff;
      text-shadow: 1px 1px 5px #000;
    }
    .btn-f1 {
      background: linear-gradient(90deg, #ff0000, #ff4d4d);
      border: none;
      color: #fff;
      font-weight: bold;
      transition: 0.3s;
      padding: 10px 30px;
      font-size: 1.1rem;
      border-radius: 50px;
    }
    .btn-f1:hover {
      background: linear-gradient(90deg, #ff4d4d, #ff0000);
      color: #fff;
    }
    .feature-card {
      background: #1c1c1c;
      border: 2px solid #ff0000;
      border-radius: 15px;
      text-align: center;
      padding: 30px 20px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(255,0,0,0.5);
    }
    .feature-card i {
      font-size: 3rem;
      color: #ff0000;
      margin-bottom: 15px;
    }
    footer {
      background-color: #111;
      padding: 20px 0;
      text-align: center;
      color: #aaa;
      margin-top: 50px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">F1 Guest</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="GusteUser.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="guest_result.php">Result</a></li>
          <!-- <li class="nav-item"><a class="nav-link" href="#">Events</a></li> -->
          <li class="nav-item"><a class="nav-link" href="LoginUser.php">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="Registraion.php">Sign Up</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="container hero-section">
    <h1>Welcome, Guest!</h1>
    <p>Experience the thrill of Formula 1 from the comfort of your screen. Explore races, events, and more!</p>
    <!-- <a href="#" class="btn btn-f1 mt-3">Explore Now</a> -->
  </div>

  <!-- Features Section -->
  <div class="container my-5">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="feature-card">
          <i class="fas fa-flag-checkered"></i>
          <h5>Upcoming Races</h5>
          <p>Check the schedule of upcoming Formula 1 races worldwide.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-card">
          <i class="fas fa-video"></i>
          <h5>Live Highlights</h5>
          <p>Watch race highlights and exciting moments from past races.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-card">
          <i class="fas fa-info-circle"></i>
          <h5>Learn F1</h5>
          <p>Discover the rules, teams, drivers, and technology behind Formula 1.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    &copy; 2025 Formula 1 Guest Homepage. All Rights Reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
