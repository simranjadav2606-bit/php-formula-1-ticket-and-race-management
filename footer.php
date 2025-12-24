<!-- footer.php -->
<footer style="background-color:#1c1c21; color:white; padding:40px 20px; font-family:Arial, sans-serif;">
  
  <!-- Partners Heading -->
  <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:30px;">
    <h2 style="margin:0; font-size:28px; font-weight:bold; color:white;">OUR PARTNERS</h2>
    <a href="partners.php" style="color:white; text-decoration:none; font-weight:bold;">View all</a>
  </div>

  <!-- Partner Logos in Perfect Grid -->
  <div class="partner-logos">
    <img src="image/lvmh f.png" alt="LVMH">
    <img src="image/pirelli f.png" alt="Pirelli">
    <img src="image/aramco-removebg-preview.png" alt="Aramco">
    <img src="image/hei-removebg-preview (1).png" alt="Heineken">
    <img src="image/aws-removebg-preview.png" alt="AWS">
    <img src="image/lenovo-removebg-preview.png" alt="Lenovo">
    <img src="image/dhl2-removebg-preview.png" alt="DHL">
    <img src="image/qatar-airways-white-logo-hd-png-7017516947104972on0a8jycr-removebg-preview.png" alt="Qatar Airways">
    <img src="image/MSC-emblem-removebg-preview.png" alt="MSC Cruises">
    <img src="image/crypto-removebg-preview.png" alt="Crypto.com">
    <img src="image/Salesforce.com_logo.svg-removebg-preview.png" alt="Salesforce">
    <img src="image/louis-removebg-preview.png" alt="Louis Vuitton">
    <img src="image/tag-removebg-preview.png" alt="TAG Heuer">
    <img src="image/moet-removebg-preview.png" alt="Moet Hennessy">
    <img src="image/american-removebg-preview.png" alt="American Express">
    <img src="image/santander-removebg-preview.png" alt="Santander">
    <img src="image/allwyn-removebg-preview.png" alt="Allwyn">
    <img src="image/mcd-removebg-preview (1).png" alt="McDonald's">
  </div>

  <!-- Footer Styles -->
  <style>
    .partner-logos {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); /* auto-fit in rows */
      gap: 40px;
      justify-items: center;
      align-items: center;
    }
    .partner-logos img {
      height: 50px;
      object-fit: contain;
      filter: brightness(0) invert(1);
      transition: transform 0.3s ease;
    }
    .partner-logos img:hover {
      transform: scale(1.1);
    }
  </style>

</footer>
