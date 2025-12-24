<?php 
  ob_start();
  session_start();
  include("sider.php");

  if(!isset($_SESSION['aemail'])){
    header("location:login.php");
    exit;
  }

  require("db.php");

  // Count total users
  $Q = "SELECT * FROM tbl_user";
  $result = mysqli_query($mysql,$Q) or die("Query Failed".mysqli_error($mysql));
  $nor = mysqli_num_rows($result);

  // Rows per page
  $page_rows = 4;  
  $last = ceil($nor/$page_rows);

  // Current page
  if(!isset($_REQUEST['pagenum']))
      $pagenum = 1;
  else
      $pagenum = intval($_REQUEST['pagenum']);

  if ($pagenum < 1) $pagenum = 1;
  if ($pagenum > $last) $pagenum = $last;

  // SQL with LIMIT
  $offset = ($pagenum-1) * $page_rows;
  $q1 = "SELECT * FROM tbl_user LIMIT $offset, $page_rows";
  $res1 = mysqli_query($mysql,$q1) or die("Error...".mysqli_error($mysql));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formula 1 - User Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background: #0d0d0d; font-family: "Segoe UI", sans-serif; color: #fff; }
    .page-title { text-align: center; font-weight: 800; text-transform: uppercase; color: #e10600; letter-spacing: 2px; margin: 30px 0 20px; position: relative; }
    .page-title::after { content: ""; display: block; width: 80px; height: 4px; background: linear-gradient(90deg, #e10600, #fff); margin: 10px auto 0; border-radius: 4px; }
    .card { border-radius: 16px; background: #1a1a1a; border: 1px solid #333; color: #fff; overflow: hidden; }
    .table { margin: 0; border-collapse: separate; border-spacing: 0 10px; }
    .table thead { background: #e10600; color: #fff; text-transform: uppercase; font-size: 14px; }
    .table tbody tr { background: #2a2a2a; transition: 0.3s; }
    .table tbody tr:hover { background: #333; transform: scale(1.01); }
    .table td, .table th { vertical-align: middle; padding: 14px; }
    .table img { width: 65px; height: 65px; border-radius: 50%; margin-right: 10px; border: 2px solid #e10600; }
    .status-active { background: #16a34a; color: #fff; padding: 6px 14px; border-radius: 30px; font-size: 12px; font-weight: bold; text-transform: uppercase; }
    .status-inactive { background: #dc2626; color: #fff; padding: 6px 14px; border-radius: 30px; font-size: 12px; font-weight: bold; text-transform: uppercase; }
    .action-btn { border: none; background: transparent; margin: 0 4px; cursor: pointer; transition: 0.3s; }
    .action-btn i { font-size: 18px; }
    .action-btn.view { color: #3b82f6; }
    .action-btn.edit { color: #facc15; }
    .action-btn.delete { color: #ef4444; }
    .action-btn:hover { transform: scale(1.2); }
 /* Fix background color for active page */
.pagination .active .page-link {
  background: #e10600 !important;  /* F1 red */
  color: #fff !important;
  border: none !important;
  border-radius: 8px;
}
.pagination .page-link {
  background: #222 !important;  /* Same background for all pages */
  color: #fff !important;
  border: none !important;
}

  </style>
</head>
<body>

<div class="content">
  <h2 class="page-title"><i class="bi bi-people-fill me-2"></i> Formula 1 User Information</h2>

  <div class="container my-4">
    <div class="card shadow-lg p-3">
      <div class="card-body p-0">
        <table class="table align-middle">
          <thead>
            <tr>
              <th>User</th>
              <th>Email</th>
              <th>Contact No</th>
              <th>Date Of Birth</th>
              <th>City</th>
              <th>State</th>
              <th>Country</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            if(mysqli_num_rows($res1)>0){
              while($r=mysqli_fetch_array($res1)){
                  $path ="./image/$r[9]";
          ?>
            <tr>
              <td><img src="<?php echo $path ?>" alt="user"> <?php echo $r[1]; ?></td>
              <td><?php echo $r[2]; ?></td>
              <td><?php echo $r[3]; ?></td>
              <td><?php echo $r[4]; ?></td>
              <td><?php echo $r[5]; ?></td>
              <td><?php echo $r[6]; ?></td>
              <td><?php echo $r[7]; ?></td>
              <td><span class="status-active">Active</span></td>
              <td><button class="action-btn view"><i class="bi bi-eye"></i></button></td>
            </tr>
          <?php 
              }
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Pagination -->
    <nav>
      <ul class="pagination justify-content-center mt-3">
        <!-- Prev Button -->
        <?php if($pagenum > 1){ ?>
          <li class="page-item">
            <a class="page-link" href="Pagination_user.php?pagenum=<?php echo $pagenum-1; ?>">« Prev</a>
          </li>
        <?php } ?>

        <!-- Page Numbers -->
        <?php 
          for($i=1;$i<=$last;$i++){
            $active = ($i == $pagenum) ? "active" : "";
            echo "<li class='page-item $active'>
                    <a class='page-link' href='Pagination_user.php?pagenum=$i'>$i</a>
                  </li>";
          }
        ?>

        <!-- Next Button -->
        <?php if($pagenum < $last){ ?>
          <li class="page-item">
            <a class="page-link" href="Pagination_user.php?pagenum=<?php echo $pagenum+1; ?>">Next »</a>
          </li>
        <?php } ?>
      </ul>
    </nav>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
