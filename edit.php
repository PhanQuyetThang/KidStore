<?php
include "./header2.php";
require_once './connection.php';
session_start();
if (isset($_SESSION["UserID"]) && isset($_SESSION["UserType"])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy thông tin từ form
        $productId = $_GET['productID'];
        $categoryID = $_POST['categoryId'];
        $productName = $_POST['productName'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $discription = $_POST['discription'];
        $target_dir = "Uploads/";
        $target_file = $target_dir . uniqid() . "_" . basename($_FILES["proPic"]['name']);
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["proPic"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = true;
            } else {
                echo "File is not an image.";
                $uploadOk = false;
            }
        }
        if (move_uploaded_file($_FILES["proPic"]["tmp_name"], $target_file)) {
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        $sql = "UPDATE products
                SET CategoryID=$categoryID, ProductName='$productName', Price=$price,
                Quantity=$quantity, discription='$discription'
                WHERE ProductID=$productId";
        $result = mysqli_query($conn, $sql);
        if ($_FILES["proPic"]) {
        }
        if (isset($_FILES["proPic"]) && $_FILES["proPic"]["error"] == UPLOAD_ERR_OK) {
            $sql = "UPDATE images SET URL = '$target_file' WHERE ProductID = $productId";
            mysqli_query($conn, $sql);
        }
        if ($result) {
            // Cập nhật thành công
            echo "Cập nhật thông tin sản phẩm thành công.";
            header("Location: admin.php");
        } else {
            // Có lỗi xảy ra
            echo "Có lỗi xảy ra. Vui lòng thử lại.";
            include "./footer.php";
        }
    }

    if (isset($_GET['productID'])) {
        $productID = $_GET['productID'];
        $sql = "SELECT p.*, c.CategoryName, i.URL
        FROM products p
        INNER JOIN category c ON p.CategoryID = c.CategoryID
        INNER JOIN Images i ON p.ProductID = i.ProductID 
        WHERE p.ProductID = $productID";
        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);
?>
        <div class="container">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="productId">Product ID:</label>
                    <p><?php echo $product["ProductID"]; ?></p>
                </div>
                <?php
                // Tạo dropdown list với danh sách Category
                echo '<div class="form-group">
                                      <label for="categoryId">Category:</label>
                                      <select class="form-control" id="categoryId" name="categoryId">';
                $sql = "SELECT CategoryId, CategoryName FROM Category";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {

                    echo '<option value="' . $row['CategoryId'] . '">' . $row['CategoryName'] . '</option>';
                }
                echo '</select></div>';
                ?>
                <div class="form-group">
                    <label for="productName">Tên sản phẩm:</label>
                    <input type="text" value="<?php echo $product["ProductName"]; ?>" class="form-control" id="productName" name="productName">
                </div>
                <div class="form-group">
                    <label for="price">Giá:</label>
                    <input type="text" value="<?php echo $product["Price"]; ?>" class="form-control" id="price" name="price">
                </div>
                <div class="form-group">
                    <label for="quantity">Số lượng:</label>
                    <input type="text" value="<?php echo $product["Quantity"]; ?>" class="form-control" id="quantity" name="quantity">
                </div>
                <div class="form-group">
                    <label for="discription">Mô tả:</label>
                    <textarea class="form-control" id="discription" name="discription"><?php echo $product["discription"]; ?></textarea>
                </div>
                <div class="form-group">
                    <img style="width: 150; height: 150;" class="first-img" src="<?php echo $product["URL"] ?>">
                    <label for="file">Chọn hình khác:</label>
                    <input type="file" class="form-control" accept=".png, .jpg, .jpeg" id="file" name="proPic">
                </div>
        </div>
        <div class="modal-footer">
            <a href="./admin.php" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
        </form>
        </div>
<?php
    } else {
        $message = "Không tìm thấy Id !";
        echo "<style>";
        echo ".btn-outline-info a:hover {";
        echo "  color: #ae1427;";
        echo "}";
        echo "</style>";

        echo "<center><h2>$message</h2><br></br><button class='btn btn-outline-info'><a href='dang-Nhap.php'>Trở lại</a></button></center><br></br>";
        include "./footer.php";
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
?>