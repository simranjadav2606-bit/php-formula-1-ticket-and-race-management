<?php
include 'db.php'; 
if (isset($_POST['replyBtn'])) {
    $fid = $_POST['feedback_id']; 
    $reply = $_POST['admin_reply'];

    $q = "UPDATE admin_feedback SET admin_reply=? WHERE feedback_id=?";
    $stmt = $mysql->prepare($q);
    $stmt->bind_param("si", $reply, $fid);
    $stmt->execute();
    $msg = " Reply saved successfully!";
}
$result = $mysql->query("SELECT * FROM admin_feedback ORDER BY feedback_id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>F1 Racing - Admin Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: #0d0d0d;
            font-family: 'Segoe UI', sans-serif;
            color: #f1f1f1;
        }
        /* Header */
        .navbar {
            background: #111;
            border-bottom: 3px solid #e10600; /* F1 red */
        }
        .navbar-brand {
            font-size: 26px;
            font-weight: bold;
            color: #e10600 !important;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        /* Card container */
        .card {
            background: #1a1a1a;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.6);
        }
        /* Table */
        .table {
            color: #f8f9fa;
        }
        .table thead {
            background: #e10600;
            color: #fff;
            text-transform: uppercase;
            font-size: 14px;
        }
        .table tbody tr:hover {
            background: rgba(225, 6, 0, 0.2);
            transition: 0.3s;
        }
        /* Reply input */
        .reply-input {
            width: 220px;
            border-radius: 6px;
            border: 1px solid #333;
            padding: 8px 12px;
            background: #111;
            color: #fff;
        }
        .reply-input:focus {
            border-color: #e10600;
            box-shadow: 0 0 6px rgba(225,6,0,0.6);
        }
        
        .btn-reply {
            background: #e10600;
            color: #fff;
            font-weight: bold;
            border-radius: 6px;
            padding: 6px 14px;
            display: flex;
            align-items: center;
            gap: 5px;
            border: none;
        }
        .btn-reply:hover {
            background: #b00000;
            color: #fff;
        }
        /* Badges */
        .badge {
            font-size: 13px;
            padding: 6px 12px;
            border-radius: 6px;
        }
        /* Title */
        .title {
            font-size: 24px;
            font-weight: bold;
            color: #e10600;
            text-transform: uppercase;
            border-left: 5px solid #e10600;
            padding-left: 12px;
        }
    </style>
</head>
<body>
<?php 
include("sider.php");?>

<div class="content">
<nav class="navbar mb-4">
  <div class="container-fluid">
    <a class="navbar-brand">🏎️ F1 Racing - Admin Panel</a>
  </div>
</nav>

<div class="container">
    <?php if (!empty($msg)) echo "<div class='alert alert-success text-center'>$msg</div>"; ?>

    <div class="card p-4">
        <h3 class="title mb-4">User Feedback</h3>
        <div class="table-responsive">
            <table class="table table-hover text-center align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Feedback</th>
                        <th>Admin Reply</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['feedback_id']) ?></td>
                        <td><?= htmlspecialchars($row['user_name']) ?></td>
                        <td><?= htmlspecialchars($row['user_email']) ?></td>
                        <td class="text-start"><?= htmlspecialchars($row['user_message']) ?></td>
                        <td>
                            <?= $row['admin_reply'] 
                                ? "<span class='badge bg-success'>" . htmlspecialchars($row['admin_reply']) . "</span>" 
                                : "<span class='badge bg-secondary'>No reply yet</span>" ?>
                        </td>
                        <td>
                            <form method="post" class="d-flex justify-content-center">
                                <input type="hidden" name="feedback_id" value="<?= $row['feedback_id'] ?>">
                                <input type="text" name="admin_reply" class="reply-input me-2" placeholder="Type reply..." required>
                                <button type="submit" name="replyBtn" class="btn btn-reply">
                                    <i class="bi bi-send"></i> Reply
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</body>
</html>
