<?php 
  ob_start();
  session_start();

  if(!isset($_SESSION['aemail'])){
    header("location:login.php");
  }
  require("db.php");

  // ✅ Simple search logic
  if(isset($_POST['searchText']) && $_POST['searchText'] != ""){
    $searchText = $_POST['searchText'];
    $Q = "SELECT * FROM tbl_user WHERE FullName LIKE '%$searchText%'";
  } else {
    $Q = "SELECT * FROM tbl_user";
  }

  $result = mysqli_query($mysql,$Q) or die("Query Failed: ".mysqli_error($mysql));
  $nor = mysqli_num_rows($result);
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
    body { background-color: #0d0d0d; font-family: "Segoe UI", sans-serif; color: #fff; }
    .page-title { text-align: center; font-weight: 800; text-transform: uppercase; color: #e10600; letter-spacing: 2px; margin: 30px 0 20px; }
    .page-title::after { content: ""; display: block; width: 80px; height: 4px; background: linear-gradient(90deg, #e10600, #fff); margin: 10px auto 0; border-radius: 4px; }
    .card { border-radius: 16px; background: #1a1a1a; border: 1px solid #333; color: #fff; overflow: hidden; }
    .table { margin: 0; border-collapse: separate; border-spacing: 0 10px; }
    .table thead { background: #e10600; color: #fff; text-transform: uppercase; font-size: 14px; }
    .table tbody tr { background: #2a2a2a; transition: 0.3s; }
    .table tbody tr:hover { background: #333; transform: scale(1.01); }
    .table td, .table th { vertical-align: middle; padding: 14px; text-align: center; }
    .table img { width: 65px; height: 65px; border-radius: 50%; margin-bottom: 8px; border: 2px solid #e10600; }
    .status-active { background: #16a34a; color: #fff; padding: 6px 14px; border-radius: 30px; font-size: 12px; font-weight: bold; text-transform: uppercase; }
    .search-box { margin-bottom: 20px; }
    .search-box input { border-radius: 30px; padding: 10px 20px; border: 1px solid #e10600; }
    .search-box button { border-radius: 30px; padding: 10px 20px; background: #e10600; color: #fff; border: none; font-weight: bold; }
    .search-box button:hover { background: #b00000; }
  </style>
</head>
<body>

<?php include("sider.php"); ?>

<div class="content">
  <h2 class="page-title"><i class="bi bi-people-fill me-2"></i> Formula 1 User Information</h2>

  <div class="container my-4">

    <!-- 🔎 Search Form -->
    <form method="post" class="d-flex search-box">
      <input type="text" name="searchText" class="form-control me-2" placeholder="Search by Name"
             value="<?php if(isset($_POST['searchText'])) echo $_POST['searchText']; ?>">
      <button type="submit">Search</button>
    </form>

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
            if($nor>0){
              while($r=mysqli_fetch_array($result)){
                  $path ="./image/$r[9]";
          ?>
            <tr>
              <td>
                <div class="d-flex flex-column align-items-center">
                  <img src="<?php echo $path ?>" alt="user">
                  <span class="fw-semibold"><?php echo $r[1]; ?></span>
                </div>
              </td>
              <td><?php echo $r[2]; ?></td>
              <td><?php echo $r[3]; ?></td>
              <td><?php echo $r[4]; ?></td>
              <td><?php echo $r[5]; ?></td>
              <td><?php echo $r[6]; ?></td>
              <td><?php echo $r[7]; ?></td>
              <td><span class="status-active">Active</span></td>
              <td>
                <!-- 👇 Second form for action button -->
                <form method="post">
                  <input type="hidden" name="Uid" value="<?php echo $r[0]; ?>">
                  <button type="submit" name="viewUser" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-eye"></i>
                  </button>
                </form>
              </td>
            </tr>
          <?php 
              }
            } else {
              echo "<tr><td colspan='9' class='text-center text-danger fw-bold'>No Users Found...</td></tr>";
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<?php 
// ✅ Handle second form submit
if(isset($_POST['viewUser'])){
  $Uid = $_POST['Uid'];
  header("location:ViewUserAdminSide.php?Uid=$Uid");
  exit;
}
?>
