<?php
// Project/User/feedback.php
include 'db.php';

$msg = "";

if (isset($_POST['submitFeedback'])) {
    $name    = trim($_POST['user_name']);
    $email   = trim($_POST['user_email']);
    $message = trim($_POST['user_message']);
    $rating  = isset($_POST['rating']) ? (int)$_POST['rating'] : null;

    $imageName = null;
    if (!empty($_FILES['image']['name'])) {
        $targetDir = __DIR__ . "/uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $imageName = time() . "_" . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir . $imageName);
    }

    $sql = "INSERT INTO admin_feedback (user_name, user_email, user_message, rating, image)
            VALUES (?,?,?,?,?)";
    $stmt = $mysql->prepare($sql);
    $stmt->bind_param("sssis", $name, $email, $message, $rating, $imageName);

    if ($stmt->execute()) {
        $msg = "Feedback submitted successfully!";
    } else {
        $msg = "Error: " . $mysql->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback - Formula 1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      min-height: 100vh;
      padding-top: 80px; /* for fixed header spacing */
      color: #fff;
      background-color: black; /* removed background */
    }

    /* Feedback Card */
    .feedback-card {
      background: #fff url("image/checkered.png") repeat;
      background-size: 120px auto;
      border-radius: 10px;
      border: 2px solid #d50000;
      max-width: 650px;
      width: 100%;
      margin: 50px auto;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0,0,0,0.4);
    }

    .feedback-content {
      padding: 30px;
      background: rgba(255,255,255,0.95);
      color: #222;
    }

    .feedback-title {
      font-size: 26px;
      font-weight: 700;
      color: #d50000;
      text-align: center;
      margin-bottom: 25px;
      text-transform: uppercase;
      border-bottom: 2px solid #000;
      padding-bottom: 10px;
    }

    .form-label {
      font-weight: 600;
      color: #000;
    }

    .form-control {
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    .form-control:focus {
      border-color: #d50000;
      box-shadow: 0 0 6px rgba(213,0,0,0.3);
    }

    .btn-submit {
      background: #d50000;
      color: #fff;
      font-weight: 600;
      border-radius: 6px;
      padding: 12px;
      border: none;
      transition: 0.3s;
      width: 100%;
    }
    .btn-submit:hover {
      background: #000;
      color: #fff;
    }

    /* Star Rating */
    .star-rating {
      direction: rtl;
      display: inline-flex;
      gap: 6px;
      font-size: 24px;
    }
    .star-rating input { display: none; }
    .star-rating label {
      cursor: pointer;
      color: #bbb;
    }
    .star-rating input:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
      color: #d50000;
    }

    /* Alert */
    .alert-custom {
      background: #fff;
      color: #000;
      border: 1px solid #d50000;
      font-weight: 600;
      text-align: center;
    }

    /* Header adjustment */
    header { position: fixed; top: 0; width: 100%; z-index: 1000; }
  </style>
</head>
<body>
  <!-- Include your header.php -->
  <?php include('header.php'); ?>

  <div class="feedback-card">
    <div class="feedback-content">
      <h2 class="feedback-title">Formula 1 Fan Feedback</h2>

      <?php if ($msg) echo "<div class='alert alert-custom'>$msg</div>"; ?>

      <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Your Name</label>
          <input type="text" name="user_name" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Your Email</label>
          <input type="email" name="user_email" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Your Feedback</label>
          <textarea name="user_message" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3 text-center">
          <label class="form-label d-block mb-2">Rating</label>
          <div class="star-rating">
            <input type="radio" name="rating" id="star5" value="5"><label for="star5">★</label>
            <input type="radio" name="rating" id="star4" value="4"><label for="star4">★</label>
            <input type="radio" name="rating" id="star3" value="3"><label for="star3">★</label>
            <input type="radio" name="rating" id="star2" value="2"><label for="star2">★</label>
            <input type="radio" name="rating" id="star1" value="1"><label for="star1">★</label>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Upload Image (optional)</label>
          <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" name="submitFeedback" class="btn-submit">Submit Feedback</button>
      </form>
    </div>
  </div>
  <?php
require("footer.php");
?>
</body>
</html>
