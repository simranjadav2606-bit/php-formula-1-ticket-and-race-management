<?php
ob_start();
session_start();

// Include database connection
require("db.php");

// Check if 'id' is provided
if(isset($_GET['id'])){
    $id = ($_GET['id']); // sanitize input

    // SQL query to delete the merchandise
    $query = "DELETE FROM tbl_merchandise WHERE id = $id";

    if(mysqli_query($mysql, $query)){
        // Redirect after successful deletion
        header("Location: merchandise.php");
        exit();
    } else {
        echo "<script>alert('Error deleting merchandise: ".mysqli_error($mysql)."');</script>";
    }
} else {
    echo "<script>alert('Invalid Merchandise ID');</script>";
}
?>
