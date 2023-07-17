<?php
include "./header.php";
require_once './connection.php';
session_start();
if (isset($_SESSION["UserID"]) && isset($_SESSION["UserType"])) {
    if (isset($_GET['productID'])) {
        $productID = $_GET['productID'];
        $sql = "UPDATE `products` SET`is_delete`= 1 WHERE ProductID = $productID ";
        if (mysqli_query($conn, $sql)) {
            echo "Product deleted successfully.";
            header("Location: admin.php");
        } else {
            echo "Error deleting product.";
        }
    } else {
        echo "Invalid product ID.";
    }
} else {
    $message = "Không đủ quyền !";
    echo "<style>";
    echo ".btn-outline-info a:hover {";
    echo "  color: #ae1427;";
    echo "}";
    echo "</style>";

    echo "<center><h2>$message</h2><br></br><button class='btn btn-outline-info'><a href='dang-Nhap.php'>Trở lại</a></button></center><br></br>";
    include "./footer.php";
}
