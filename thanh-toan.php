<?php
session_start();
ob_start();
require_once('./connection.php');
include "./header2.php";

// Hiển thị thông tin giỏ hàng
if (!empty($_SESSION['cart']) && !empty($_SESSION['UserID'])) {
    $total = 0;
    // Tạo mã đơn hàng duy nhất
    $orderID = uniqid();

    // Lấy thông tin người dùng từ session (giả sử đã lưu trong session)
    $userID = $_SESSION['UserID']; // Thay thế bằng key session tương ứng

    // Thêm thông tin từng sản phẩm trong giỏ hàng vào bảng `orderdetails`
    foreach ($_SESSION['cart'] as $product) {
        $total += ($product['product_price'] * $product['quantity']);
    }

?>
    <!-- HTML code cho trang thanh toán -->
    <div class="container" style="margin-top: 80px;">
        <h1>Thông tin đặt hàng</h1>

        <div class="row">
            <div class="col-md-6">
                <p>Email: <?php echo $_SESSION["Email"]; ?></p>
                <p>Địa chỉ: <?php echo $_SESSION["Address"]; ?></p>
                <p>Số điện thoại: <?php echo $_SESSION["PhoneNumber"]; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $product) : ?>
                            <tr>
                                <td><?php echo $product['product_name']; ?></td>
                                <td><?php echo $product['product_price']; ?></td>
                                <td><?php echo $product['quantity']; ?></td>
                                <td><?php echo $product['product_price'] * $product['quantity']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <!-- Hiển thị tổng giá trị đơn hàng -->
                        <hr>
                        <p>Tổng giá trị đơn hàng: <?php echo $total; ?>đ </p>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="order-process.php" class="btn btn-success" style="margin-bottom: 50px;">Xác nhận Đặt hàng</a>
            </div>
        </div>
    </div>



<?php
} else {
    echo "<center><h3>Không có sản phẩm nào để thanh toán, hoặc chưa đăng nhập.</h3></center>";
}
include "./footer.php";
?>