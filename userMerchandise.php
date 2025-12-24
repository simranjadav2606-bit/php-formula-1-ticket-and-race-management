<?php
ob_start();
session_start();
require("db.php");



// --- Fetch Merchandise ---
$q = "SELECT id, product, price, image, quantity FROM tbl_merchandise";
$result = mysqli_query($mysql, $q);
if(!$result){
    die("Query failed: " . mysqli_error($mysql));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  require("header.php"); 
  ?>
  <meta charset="UTF-8">
  <title>F1 Store - Merchandise</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-zinc-900 text-white">



<!-- Hero -->
 <section class="bg-zinc-900 text-white pt-24 pb-16 px-6">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-12">
            <div class="md:w-1/2">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold leading-tight">
                    Experience the <br>
                    <span class="text-red-600">Thrill of F1</span> <br>
                    Collection
                </h1>
                <p class="mt-6 text-lg text-zinc-300">
                    Discover the latest official merchandise, engineered for performance, designed for passion. New arrivals for both Men and Women.
                </p>
                <a href="#" class="mt-8 inline-block bg-red-600 text-white font-semibold py-3 px-8 rounded-full hover:bg-red-700 transition-colors">Shop Now</a>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="image/mer_ng.jpg" alt="F1 Clothing" class="rounded-3xl shadow-2xl transform hover:scale-105 transition-transform duration-500">
            </div>
        </div>
    </section>

<!-- Products -->
<section class="bg-zinc-800 py-16 px-6">
  <div class="container mx-auto">
    <h2 class="text-3xl font-bold text-center text-red-600 mb-12">Available Products</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

      <?php while ($row = mysqli_fetch_assoc($result)) { 
          $path = "./image/" . $row['image']; 
      ?>
      <div class="bg-zinc-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-transform hover:-translate-y-2">
        <img src="<?= $path ?>" class="w-full h-64 object-cover" alt="<?= $row['product'] ?>">
        <div class="p-6 flex flex-col items-center">
          <h5 class="text-lg font-semibold"><?= $row['product'] ?></h5>
          <p class="text-red-600 font-bold text-xl mt-2">₹<?= $row['price'] ?></p>

          <!-- Stock -->
          <p class="mt-2 text-sm <?= ($row['quantity'] > 0) ? 'text-green-400' : 'text-red-400' ?>">
            <?= ($row['quantity'] > 0) ? 'In Stock' : 'Out of Stock' ?>
          </p>

          <!-- Buy Now Form -->
          <form method="post" class="w-full flex flex-col items-center mt-4">
            <input type="hidden" name="productId" value="<?= $row['id'] ?>">
            <input type="hidden" name="product" value="<?= $row['product'] ?>">
            <input type="hidden" name="price" value="<?= $row['price'] ?>">

            <div class="flex items-center gap-2 mt-2">
              <label class="text-zinc-300">Qty:</label>
              <input type="number" name="qty" value="1" min="1"
                     class="w-16 bg-zinc-600 text-center rounded-md border border-zinc-500 focus:ring-1 focus:ring-red-600"
                     <?= ($row['quantity']==0) ? 'disabled' : '' ?>>
            </div>

            <button type="submit" name="buynow"
              class="mt-4 bg-red-600 text-white font-semibold py-2 px-6 rounded-full hover:bg-red-700 transition 
              <?= ($row['quantity']==0) ? 'opacity-50 cursor-not-allowed' : '' ?>"
              <?= ($row['quantity']==0) ? 'disabled' : '' ?>>
              Buy Now
            </button>
          </form>

          <!-- Admin Delete -->
          <!-- <div class="mt-3">
            <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this product?');" class="text-xs bg-red-600 px-2 py-1 rounded">Delete</a>
          </div> -->
        </div>
      </div>
      <?php } ?>

    </div>
  </div>
</section>

</body>
</html>
<?php 
    if(isset($_REQUEST['buynow'])){
         $productId = intval($_POST['productId']);
    $product   = $_POST['product'];
    $price     = $_POST['price'];
    $qty       = intval($_POST['qty']);


    $total = $price * $qty;

    // Insert order directly into tbl_order
    $q = "INSERT INTO tbl_ordermerchan (Name,Quantity,BillingAmount,Total) 
          VALUES ('$product', '$qty','$price', '$total')";
    if (mysqli_query($mysql, $q)) {
        echo "<script>alert('✅ You bought $qty x $product');</script>";
    } else {
        echo "<script>alert('❌ Error placing order');</script>";
    }
    }
?>
<?php
require("footer.php");
?>