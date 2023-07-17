<?php
session_start();
ob_start();
include "./header2.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('./connection.php');
require 'PHPMailer_v6.8.0/src/PHPMailer.php';
require 'PHPMailer_v6.8.0/src/SMTP.php';
require 'PHPMailer_v6.8.0/src/Exception.php';

if (!empty($_SESSION['cart'])) {

    $userID = $_SESSION['UserID']; // Thay thế bằng key session tương ứng
    $orderDate = date('Y-m-d'); // Lấy ngày hiện tại
    $query = "INSERT INTO shoppingorder (UserID, OrderDate) VALUES ('$userID', '$orderDate')";
    mysqli_query($conn, $query);

    $orderID = mysqli_insert_id($conn); // Lấy OrderID của hàng cuối cùng được chèn vào cơ sở dữ liệu

    $total = 0; // Initialize the total variable

    // Thêm thông tin từng sản phẩm trong giỏ hàng vào bảng `orderdetails`
    foreach ($_SESSION['cart'] as $product) {
        $productID = $product['product_id'];
        $quantity = $product['quantity'];
        $total += ($product['product_price'] * $product['quantity']);

        $query = "INSERT INTO orderdetails (OrderID, ProductID, OrderDate, Quantity, Total) VALUES ('$orderID', '$productID', '$orderDate', '$quantity', '$total')";
        mysqli_query($conn, $query);
    }

    // Khởi tạo đối tượng PHPMailer
    $mail = new PHPMailer();
    // Cấu hình thông tin SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'nndoa19052@cusc.ctu.edu.vn'; // Thay thế bằng địa chỉ email của bạn
    $mail->Password = 'do1597533'; // Thay thế bằng mật khẩu email của bạn
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    // Cấu hình thông tin email
    $mail->setFrom('nndoa19052@cusc.ctu.edu.vn', 'SuaHouse'); // Thay thế bằng địa chỉ email và tên của bạn
    $mail->addAddress($_SESSION["Email"], $_SESSION["UserName"]); // Thay thế bằng địa chỉ email và tên người nhận
    $mail->Subject = 'Order Info';
    // Thiết lập định dạng HTML
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    // Tạo nội dung email với định dạng HTML
    $mail->Body = '<html>
    <body>
        <h2>Thank you for your order! Here is the order details:</h2>
        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>';

    foreach ($_SESSION['cart'] as $product) {
        $productName = $product['product_name'];
        $productPrice = $product['product_price'];
        $quantity = $product['quantity'];
        $subtotal = $product['product_price'] * $product['quantity'];

        $mail->Body .= '<tr>
                        <td>' . $productName . '</td>
                        <td>' . $productPrice . '</td>
                        <td>' . $quantity . '</td>
                        <td>' . $subtotal . '</td>
                    </tr>';
    }

    $mail->Body .= '</tbody>
        </table>
        
        <p>Tổng giá trị đơn hàng: ' . $total . 'đ</p>
        
        <p>Thank you again for your order!</p>
    </body>
</html>';
    // Gửi email
    if ($mail->send()) {
        echo '<center><h1 style="margin: 60px;">Order Complete! Thank you!</h1></center>';
        echo '<img style="margin: 30px auto; display: flex; justify-content: center; align-items: center;" src="assets/100004/images/thank-you-icon.png" alt="Order Complete"></center>';
    } else {
        echo '<center><h1 style="margin: 60px;">Order Error :(((</h1></center>';
    }
    unset($_SESSION['cart']);
} else {
    header("Location: index.php");
}
include "./footer.php";
