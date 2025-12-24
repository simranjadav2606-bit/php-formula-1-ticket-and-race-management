<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>F1 Drivers</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: black;
      color: white;
      font-family: Arial, sans-serif;
    }
    .navbar {
      background-color: #000000;
    }
    .navbar a {
      color: #fff !important;
      margin: 0 10px;
      font-size: 14px;
    }
    .drivers-container {
      margin: 40px auto;
      max-width: 1200px;
    }
    /* Header with F1 logo */
    .f1-header {
      background: linear-gradient(90deg, #000, #e10600);
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 28px;
      font-weight: bold;
      letter-spacing: 1px;
      text-shadow: 2px 2px 8px black;
      margin-bottom: 30px;
    }
    .f1-header img {
      height: 50px;
      margin-right: 10px;
    }
    .driver {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px;
      font-size: 16px;
      background: #111;
      border-radius: 8px;
      margin-bottom: 15px;
      transition: background 0.3s;
    }
    .driver:hover {
      background: #222;
    }
    .driver img {
      width: 65px;
      height: 65px;
      border-radius: 50%;
      border: 2px solid #e10600;
      object-fit: cover;
    }
    .driver span a {
      color: white;
      font-weight: bold;
      text-decoration: none;
    }
    .driver span a:hover {
      text-decoration: underline;
      color: #e10600;
    }
  </style>
</head>
<body>
  <?php include('header.php'); ?>

  <div class="f1-header">
    <img src="Image/logo.png" alt="F1 Logo">
    Formula 1 Drivers
  </div>

  <!-- Drivers List -->
  <div class="container drivers-container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

      <div class="col driver"><img src="Image/alexander-removebg-preview.png" alt="Alexander Albon">  
        <span><a href="https://en.wikipedia.org/wiki/Alex_Albon">Alexander Albon</a></span></div>

      <div class="col driver"><img src="Image/fernando-removebg-preview.png" alt="Fernando Alonso">  
        <span><a href="https://en.wikipedia.org/wiki/Fernando_Alonso">Fernando Alonso</a></span></div>

      <div class="col driver"><img src="Image/kimi-removebg-preview.png" alt="Kimi Antonelli">  
        <span><a href="https://en.wikipedia.org/wiki/Kimi_Antonelli">Kimi Antonelli</a></span></div>

      <div class="col driver"><img src="Image/oliver-bearman-haas-removebg-preview.png" alt="Oliver Bearman">  
        <span><a href="https://en.wikipedia.org/wiki/Oliver_Bearman">Oliver Bearman</a></span></div>

      <div class="col driver"><img src="Image/gabriel-removebg-preview.png" alt="Gabriel Bortoleto">  
        <span><a href="https://en.wikipedia.org/wiki/Gabriel_Bortoleto">Gabriel Bortoleto</a></span></div>

      <div class="col driver"><img src="Image/franco-removebg-preview.png" alt="Franco Colapinto">  
        <span><a href="https://en.wikipedia.org/wiki/Franco_Colapinto">Franco Colapinto</a></span></div>

      <div class="col driver"><img src="Image/Pierre-Gasly-head-shot-copy-removebg-preview.png" alt="Pierre Gasly">  
        <span><a href="https://en.wikipedia.org/wiki/Pierre_Gasly">Pierre Gasly</a></span></div>

      <div class="col driver"><img src="Image/isjack-removebg-preview.png" alt="Isack Hadjar">  
        <span><a href="https://en.wikipedia.org/wiki/Isack_Hadjar">Isack Hadjar</a></span></div>

      <div class="col driver"><img src="Image/Hamilton-Montreal-removebg-preview.png" alt="Lewis Hamilton">  
        <span><a href="https://en.wikipedia.org/wiki/Lewis_Hamilton">Lewis Hamilton</a></span></div>

      <div class="col driver"><img src="Image\h_full_1475-removebg-preview.png" alt="Nico Hülkenberg">  
        <span><a href="https://en.wikipedia.org/wiki/Nico_H%C3%BClkenberg">Nico Hülkenberg</a></span></div>

      <div class="col driver"><img src="Image\lawson-cutout-2025-vcarb-removebg-preview.png" alt="Liam Lawson">  
        <span><a href="https://en.wikipedia.org/wiki/Liam_Lawson">Liam Lawson</a></span></div>

      <div class="col driver"><img src="Image\Leclerc-About-02-Official-Pic-1-removebg-preview.png" alt="Charles Leclerc">  
        <span><a href="https://en.wikipedia.org/wiki/Charles_Leclerc">Charles Leclerc</a></span></div>

      <div class="col driver"><img src="Image/lando-norris-mclaren-removebg-preview.png" alt="Lando Norris">  
        <span><a href="https://en.wikipedia.org/wiki/Lando_Norris">Lando Norris</a></span></div>

      <div class="col driver"><img src="Image/estaban-removebg-preview.png" alt="Esteban Ocon">  
        <span><a href="https://en.wikipedia.org/wiki/Esteban_Ocon">Esteban Ocon</a></span></div>

      <div class="col driver"><img src="Image/oscar-piastri-mclaren-removebg-preview.png" alt="Oscar Piastri">  
        <span><a href="https://en.wikipedia.org/wiki/Oscar_Piastri">Oscar Piastri</a></span></div>

      <div class="col driver"><img src="Image\George_Russell-removebg-preview.png" alt="George Russell">  
        <span><a href="https://en.wikipedia.org/wiki/George_Russell_(racing_driver)">George Russell</a></span></div>

      <div class="col driver"><img src="Image\cs-removebg-preview.png" alt="Carlos Sainz">  
        <span><a href="https://en.wikipedia.org/wiki/Carlos_Sainz_Jr.">Carlos Sainz</a></span></div>

      <div class="col driver"><img src="Image/lance-stroll-aston-martin-removebg-preview.png" alt="Lance Stroll">  
        <span><a href="https://en.wikipedia.org/wiki/Lance_Stroll">Lance Stroll</a></span></div>

      <div class="col driver"><img src="Image/yuki-removebg-preview.png" alt="Yuki Tsunoda">  
        <span><a href="https://en.wikipedia.org/wiki/Yuki_Tsunoda">Yuki Tsunoda</a></span></div>

      <div class="col driver"><img src="Image\max-removebg-preview.png" alt="Max Verstappen">  
        <span><a href="https://en.wikipedia.org/wiki/Max_Verstappen">Max Verstappen</a></span></div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <?php
  require("footer.php");
  ?>
</body>
</html>
