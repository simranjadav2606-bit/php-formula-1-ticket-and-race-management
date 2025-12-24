<?php 
require("db.php");

// ✅ Insert Product
if(isset($_REQUEST['btnsubmit'])){
    $category=$_REQUEST['category'];
    $brand=$_REQUEST['brand'];
    $product=$_REQUEST['product'];
    $price=$_REQUEST['price'];
    $quantity=$_REQUEST['quantity'];
    $status=$_REQUEST['status'];
    $fname=$_FILES['img']['name'];
    $fpath=$_FILES['img']['tmp_name'];

    $Q="INSERT INTO tbl_merchandise (category, brand, product, price, quantity, status , Image) 
        VALUES ('$category','$brand','$product','$price','$quantity','$status' , '$fname')";
    
    if(mysqli_query($mysql, $Q)){
       move_uploaded_file($fpath,"./image/".$fname);
        echo "<script>alert('Product Added Successfully');</script>";
    } else {
        echo "<script>alert('Error: ".mysqli_error($mysql)."');</script>";
    }
}

// ✅ Fetch Products
$result = mysqli_query($mysql,"SELECT * FROM tbl_merchandise");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Manage F1 Merchandise</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { 
      background-color: black; 
      color: #fff; 
      font-family: 'Segoe UI', sans-serif; 
    }
    .page-title { 
      font-weight: 700; 
      color: #ff1e1e; 
    }
    .btn-add { 
      background: linear-gradient(90deg, red, #ff4e4e); 
      border: none; 
      color: #fff; 
      font-weight: 600; 
      border-radius: 30px; 
      padding: 10px 22px; 
      transition: 0.3s; 
    }
    .btn-add:hover { 
      transform: scale(1.05); 
      box-shadow: 0 0 10px rgba(255, 30, 30, 0.6); 
    }
    .section-title { 
      color: red; 
      font-weight: bold; 
      margin-top: 30px; 
      margin-bottom: 10px; 
      border-bottom: 2px solid #ff1e1e; 
      padding-bottom: 5px; 
    }
    .table thead { 
      background-color: #ff1e1e; 
      color: #fff; 
    }
    /* ✅ Fixed Status Column */
    .table td.status-col, 
    .table th.status-col {
      width: 150px; 
      text-align: center;
    }
    .badge-status {
      display: inline-block;
      width: 120px;  /* fixed width */
      text-align: center;
      font-size: 0.9rem;
      font-weight: 600;
      padding: 8px;
      border-radius: 20px;
    }
    /* ✅ Action Buttons */
    .btn-action {
      border: none;
      padding: 6px 14px;
      margin: 2px;
      border-radius: 8px;
      font-size: 0.85rem;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
      text-decoration: none;
      display: inline-block;
    }
    .btn-update {
      background-color: #0d6efd; /* Blue */
      color: #fff;
    }
    .btn-update:hover {
      background-color: #0b5ed7;
    }
    .btn-delete {
      background-color: #dc3545; /* Red */
      color: #fff;
    }
    .btn-delete:hover {
      background-color: #bb2d3b;
    }
  </style>
</head>
<body>
  <?php include("sider.php") ?>
  <div class="content">

<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title">Admin Dashboard - Manage F1 Merchandise</h2>
    <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addProductModal">+ Add Product</button>
  </div>
  

  <!-- ✅ Display Records -->
  <h3 class="section-title">All Merchandise</h3>
  <table class="table table-dark table-hover align-middle mb-4">
    <thead>
      <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Brand</th>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th class="status-col">Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['category']; ?></td>
          <td><?php echo $row['brand']; ?></td>
          <td><?php echo $row['product']; ?></td>
          <td>$<?php echo $row['price']; ?></td>
          <td><?php echo $row['quantity']; ?></td>
          <td class="status-col">
            <?php if($row['status']=="In Stock") { ?>
              <span class="badge-status bg-success">In Stock</span>
            <?php } else { ?>
              <span class="badge-status bg-danger">Out of Stock</span>
            <?php } ?>
          </td>
          <td>
            <a href="updateMerchandise.php?id=<?php echo $row['id']; ?>" class="btn-action btn-update">Update</a>
            <a href="delete_merchandise.php?id=<?php echo $row['id']; ?>" class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<!-- Modal: Add Product -->
<div class="modal fade" id="addProductModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content text-dark">
      <div class="modal-header">
        <h5 class="modal-title">Add New Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="text" name="category" class="form-control mb-2" placeholder="Category (Men/Women)" required>
          <input type="text" name="brand" class="form-control mb-2" placeholder="Brand" required>
          <input type="text" name="product" class="form-control mb-2" placeholder="Product Name" required>
          <input type="number" step="0.01" name="price" class="form-control mb-2" placeholder="Price" required>
          <input type="number" name="quantity" class="form-control mb-2" placeholder="Quantity" required>
          <input type="text" name="status" class="form-control mb-2" placeholder="Status (In Stock / Out of Stock)" required>
          <input type="file" name="img" class="form-control mb-2" accept="image/*" required>
        </div>
        <div class="modal-footer">
          <button type="submit" name="btnsubmit" class="btn btn-primary">Add Product</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
