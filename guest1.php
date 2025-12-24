<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formula 1 | Home</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
    }
    .navbar {
      background-color: #000;
    }
    .navbar-brand span {
      color: #e10600;
    }
    .nav-link {
      color: #fff !important;
    }
    .nav-link:hover {
      color: #e10600 !important;
    }
    .hero {
      background: url("https://images.unsplash.com/photo-1502877338535-766e1452684a") no-repeat center center/cover;
      height: 90vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: white;
      position: relative;
    }
    .hero::after {
      content: "";
      position: absolute;
      top:0; left:0; right:0; bottom:0;
      background: rgba(0,0,0,0.6);
    }
    .hero-content {
      position: relative;
      z-index: 1;
    }
    .btn-red {
      background-color: #e10600;
      color: #fff;
      border-radius: 20px;
      padding: 10px 24px;
    }
    .btn-red:hover {
      background-color: #c00400;
    }
    .section-title {
      color: #e10600;
      font-weight: bold;
      text-transform: uppercase;
      margin-bottom: 1rem;
    }
    .card {
      background-color: #111;
      border: 1px solid #222;
      border-radius: 10px;
    }
    .card img {
      border-radius: 10px 10px 0 0;
    }
    .card-title {
      color: #e10600;
    }
    footer {
      background-color: #111;
      padding: 20px 0;
      margin-top: 50px;
      text-align: center;
    }
    footer a {
      color: #e10600;
      margin: 0 10px;
      text-decoration: none;
    }
    footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="https://upload.wikimedia.org/wikipedia/en/3/33/F1.svg" alt="F1 Logo" height="30" class="me-2">
        <span class="fw-bold">Formula 1</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#f1Navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="f1Navbar">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Teams</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Drivers</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Race Calendar</a></li>
          <li class="nav-item"><a class="nav-link" href="#">News</a></li>
          <li class="nav-item"><a class="nav-link" href="#">About F1</a></li>
        </ul>
        <div class="d-flex">
          <a href="#" class="btn btn-outline-light me-2">Login</a>
          <a href="#" class="btn btn-red">Sign Up</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h1 class="display-4 fw-bold">Welcome to Formula 1</h1>
      <p class="lead">Experience the speed, passion, and thrill of the greatest motorsport on earth.</p>
      <a href="#" class="btn btn-red mt-3">Explore Races</a>
    </div>
  </section>

  <!-- About Section -->
  <section class="py-5 container text-center">
    <h2 class="section-title">About Formula 1</h2>
    <p class="mb-4">Formula 1 is the pinnacle of motorsport, showcasing the fastest cars, the best drivers, and the most iconic races around the world. From Monaco to Monza, F1 is more than a sport – it's a global spectacle.</p>
    <a href="#" class="btn btn-outline-light">Learn More</a>
  </section>

  <!-- Upcoming Race Section -->
  <section class="py-5 bg-dark">
    <div class="container">
      <h2 class="section-title text-center">Upcoming Races</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card">
            <img src="https://images.unsplash.com/photo-1606813909027-6a0c97c7c1b6" class="card-img-top" alt="Monaco GP">
            <div class="card-body">
              <h5 class="card-title">Monaco Grand Prix</h5>
              <p class="card-text">Date: 25 May 2025<br>Location: Monte Carlo</p>
              <a href="#" class="btn btn-red">View Details</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="https://images.unsplash.com/photo-1589644039270-0d77f52d2f73" class="card-img-top" alt="Monza GP">
            <div class="card-body">
              <h5 class="card-title">Italian Grand Prix</h5>
              <p class="card-text">Date: 7 Sep 2025<br>Location: Monza</p>
              <a href="#" class="btn btn-red">View Details</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="https://images.unsplash.com/photo-1599005454486-74e5dbff2389" class="card-img-top" alt="Abu Dhabi GP">
            <div class="card-body">
              <h5 class="card-title">Abu Dhabi Grand Prix</h5>
              <p class="card-text">Date: 23 Nov 2025<br>Location: Yas Marina</p>
              <a href="#" class="btn btn-red">View Details</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- News Section -->
  <section class="py-5 container">
    <h2 class="section-title text-center">Latest News</h2>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card p-3">
          <h5 class="card-title">Ferrari unveils new 2025 car</h5>
          <p class="card-text">Ferrari has revealed its new challenger for the 2025 season, promising improved aerodynamics and speed.</p>
          <a href="#" class="btn btn-outline-light">Read More</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card p-3">
          <h5 class="card-title">Hamilton chases 9th World Title</h5>
          <p class="card-text">Lewis Hamilton sets his eyes on another championship with renewed focus and determination.</p>
          <a href="#" class="btn btn-outline-light">Read More</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 Formula 1 | All Rights Reserved</p>
    <div>
      <a href="#">Facebook</a> | 
      <a href="#">Instagram</a> | 
      <a href="#">Twitter</a>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
 aa