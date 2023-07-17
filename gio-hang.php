<?php
session_start();
ob_start();
require_once('./connection.php');
$skipCode = false;
include "./header2.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $sql = "SELECT p.ProductID, p.CategoryID, p.ProductName, p.Price, p.Quantity, p.discription, i.ImageID, i.URL
            FROM products p 
            INNER JOIN images i ON p.ProductID = i.ProductID
            WHERE p.ProductID = $product_id;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $product_name = $row['ProductName'];
        $product_price = $row['Price'];
        $product_qty = $row['Quantity'];
        $product_description = $row['discription'];
        $product_image_url = $row['URL'];

        // Thêm sản phẩm vào giỏ hàng
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity']++;
        } else {
            $_SESSION['cart'][$product_id] = array(
                'product_id' => $product_id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'quantity' => 1
            );
        }
    } else {
        echo "Không tìm thấy sản phẩm.";
    }
}

// Xóa sản phẩm khỏi giỏ hàng
if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    $product_id = $_GET['id'];
    unset($_SESSION['cart'][$product_id]);
    header('location: gio-hang.php');
}

// Cập nhật số lượng sản phẩm trong giỏ hàng
if (isset($_POST['update_cart'])) {
    $qty_array = $_POST['qty'];
    foreach ($qty_array as $product_id => $qty) {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] = $qty;
        }
    }
}

// Hiển thị thông tin giỏ hàng
if (!empty($_SESSION['cart'])) {
    $total = 0;
?>
    <div class="col-md-4" style="margin: 30px 150px; font-size: 22px">
        <h3>Giỏ hàng</h3>
    </div>
    <div class="container mt-5" style="margin-top: 100px;">
        <form action="gio-hang.php" method="post">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá tiền</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>Xóa khỏi giỏ hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $item) {
                            $subtotal = $item['product_price'] * $item['quantity'];
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td><?php echo $item['product_name']; ?></td>
                                <td><?php echo number_format($item['product_price']); ?> đồng</td>
                                <td><input type="number" style="border-radius: 6px;" min="1" name="qty[<?php echo $item['product_id']; ?>]" value="<?php echo $item['quantity']; ?>" class="form-control"></td>
                                <td><?php echo number_format($subtotal); ?> đồng</td>
                                <td><a href="gio-hang.php?action=remove&id=<?php echo $item['product_id']; ?>"><button style="margin-left: 35px;" type="button" class="btn btn-danger">Xóa</button></a></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3" align="right"><strong>Tổng cộng:</strong></td>
                            <td><?php echo number_format($total); ?> đồng</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <input type="submit" style="margin: 20px 10px;" name="update_cart" value="Cập nhật giỏ hàng" class="btn btn-primary">
            <a href="./thanh-toan.php" style="margin: 20px 10px;" class="btn btn-success">Thanh Toán</a>
        </form>
    </div>

<?php
} else {
    echo "<center><h3 style='margin: 200px;'>Không có sản phẩm nào trong giỏ hàng!</h3></center>";
}
include "./footer.php";

?>