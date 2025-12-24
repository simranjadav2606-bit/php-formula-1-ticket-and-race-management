<style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #0a0a0a;
      color;
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      width: 260px;
      background: linear-gradient(180deg, #111, #1a1a1a);
      box-shadow: 4px 0px 15px rgba(255, 0, 0, 0.4);
      padding-top: 20px;
      transition: 0.3s ease;
    }

    .sidebar:hover {
      box-shadow: 6px 0px 25px rgba(255, 0, 0, 0.7);
    }

    /* Logo */
    .sidebar .logo {
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar .logo img {
      width: 150px;
      filter: drop-shadow(0px 0px 8px red);
    }

    /* Nav Items */
    .sidebar .nav-link {
      display: flex;
      align-items: center;
      padding: 12px 20px;
      margin: 8px 15px;
      border-radius: 12px;
      font-size: 15px;
      font-weight: 600;
      color: #bbb;
      transition: all 0.3s ease;
    }

    .sidebar .nav-link:hover {
      background: linear-gradient(90deg, red, #ff0048);
      color: #fff;
      transform: translateX(8px) scale(1.05);
      box-shadow: 0px 4px 12px rgba(255, 0, 0, 0.6);
    }

    .sidebar .nav-link i {
      margin-right: 12px;
      font-size: 18px;
    }

    /* Main Content */
    .content  {
      margin-left: 260px;
      padding: 30px;
    }

    .content h1 {
      font-weight: 700;
      color: red;
      text-shadow: 2px 2px 12px rgba(255,0,0,0.6);
    }
    </style>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<div class="sidebar d1">
    <div class="logo">
      <img src="https://upload.wikimedia.org/wikipedia/commons/3/33/F1.svg" alt="F1 Logo">
    </div>
    <nav class="nav flex-column">
      <a class="nav-link" href="dashboard.php"><i class="fa fa-gauge"></i> Dashboard</a>
      <a class="nav-link" href="viewAdmin3.php"><i class="fa fa-user"></i> Profile</a>
      <a class="nav-link" href="UserManagement.php"><i class="fa fa-users"></i> Users</a>
      <!-- <a class="nav-link" href="ticket.php"><i class="fa fa-ticket"></i> Tickets</a> -->
      <a class="nav-link" href="race.php"><i class="fa fa-flag-checkered"></i> Races</a>
      <a class="nav-link" href="admin_result.php"><i class="fa fa-trophy"></i> Result</a>
      <a class="nav-link" href="admin_feedback.php"><i class="fa fa-car"></i> Feedback</a>
      <a class="nav-link" href="merchandise.php"><i class="fa fa-shopping-bag"></i> Merchandise</a>
      <!-- <a class="nav-link" href="#"><i class="fa fa-gear"></i> Settings</a> -->
      <a class="nav-link" href="GusteUser.php"><i class="fa fa-right-from-bracket"></i> Logout</a>
    </nav>
  </div>
