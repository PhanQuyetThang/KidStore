<?php
session_start();
ob_start();
require_once './connection.php';
include "./header2.php";
if (isset($_SESSION["UserID"]) && isset($_SESSION["UserType"])) {
    if ($_SESSION["UserType"] === '0') {
        $sql = "SELECT CategoryId, CategoryName FROM Category";
        $result = mysqli_query($conn, $sql);

?>
        <div class="container">
            <button type="button" class="btn btn-warning" style="margin-top: 30px;" data-toggle="modal" data-target="#AddproductModalLabel">
                Thêm Sản Phẩm
            </button> <br> </br>
            <div class="modal fade" id="AddproductModalLabel" tabindex="-1" role="dialog" aria-labelledby="AddproductModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="AddproductModalLabel">Thêm Sản phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="productId">Product ID:</label>
                                    <input type="text" class="form-control" id="productId" name="productId" readonly>
                                    <button type="button" class="btn btn-primary" onclick="generateProductId()" style="margin-top: 5px;">Tạo Product
                                        ID</button>
                                </div>
                                <?php
                                // Tạo dropdown list với danh sách Category
                                echo '<div class="form-group">
                                      <label for="categoryId">Category:</label>
                                      <select class="form-control" id="categoryId" name="categoryId">';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['CategoryId'] . '">' . $row['CategoryName'] . '</option>';
                                }
                                echo '</select></div>';
                                ?>
                                <div class="form-group">
                                    <label for="productName">Tên sản phẩm:</label>
                                    <input type="text" class="form-control" id="productName" name="productName">
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá:</label>
                                    <input type="text" class="form-control" id="price" name="price">
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Số lượng:</label>
                                    <input type="text" class="form-control" id="quantity" name="quantity">
                                </div>
                                <div class="form-group">
                                    <label for="discription">Mô tả:</label>
                                    <textarea class="form-control" id="discription" name="discription"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="file">Chọn hình:</label>
                                    <input type="file" class="form-control" accept=".png, .jpg, .jpeg" id="file" name="proPic">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Category -->
            <button type="button" class="btn btn-Info" data-toggle="modal" data-target="#AddCate">
                Thêm danh mục sản phẩm
            </button> <br> </br>
            <div class="modal fade" id="AddCate" tabindex="-1" role="dialog" aria-labelledby="AddCate" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="AddCate">Thêm Danh mục Sản phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="categoryId">Category ID:</label>
                                    <input type="number" class="form-control" id="CategoryId" name="CategoryId">
                                </div>
                                <div class="form-group">
                                    <label for="productName">Category Name:</label>
                                    <input type="text" class="form-control" id="CategoryName" name="CategoryName">
                                </div>
                                <div class="form-group">
                                    <label for="price">Category Type:</label>
                                    <input type="text" class="form-control" id="CategoryType" name="CategoryType">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Thêm Loại</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#productManager">
                Quản lý Đơn hàng
            </button> <br> </br>
            <div class="modal fade" id="productManager" tabindex="-1" role="dialog" aria-labelledby="AddCate" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="AddCate">Quản lý Đơn hàng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php
                            // Thực hiện câu truy vấn để lấy dữ liệu từ bảng và sắp xếp theo OrderID
                            $sql = "SELECT so.OrderID, so.UserID, so.OrderDate, od.ProductID, od.Quantity, od.Total
                    FROM shoppingorder so
                    INNER JOIN orderdetails od ON so.OrderID = od.OrderID
                    ORDER BY so.OrderID";
                            $result = mysqli_query($conn, $sql);

                            // Biến để lưu trữ OrderID trước đó
                            $previousOrderID = null;

                            // Hiển thị dữ liệu trong bảng Bootstrap
                            echo '<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>OrderID</th>
                                <th>UserID</th>
                                <th>OrderDate</th>
                                <th>ProductID</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Xem chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>';

                            // Duyệt qua từng dòng dữ liệu và hiển thị trong bảng
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Kiểm tra nếu OrderID thay đổi, chỉ hiển thị dữ liệu khi có sự thay đổi
                                if ($row['OrderID'] !== $previousOrderID) {
                                    echo '<tr>
                                <td>' . $row['OrderID'] . '</td>
                                <td>' . $row['UserID'] . '</td>
                                <td>' . $row['OrderDate'] . '</td>
                                <td>' . $row['ProductID'] . '</td>
                                <td>' . $row['Quantity'] . '</td>
                                <td>' . $row['Total'] . '</td>
                                <td>
                                    <button class="btn btn-success btn-view-details" data-toggle="modal" data-target="#orderDetailsModal" data-orderid="'.$row['OrderID'].'"?>
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </button>
                                </td>
                            </tr>';

                                    // Cập nhật OrderID trước đó
                                    $previousOrderID = $row['OrderID'];
                                }
                            }

                            echo '</tbody></table>';

                            // Giải phóng bộ nhớ sau khi sử dụng kết quả truy vấn
                            mysqli_free_result($result);
                            ?>

                            </tbody>
                            </table>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderDetailsModalLabel">Chi tiết Đơn hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="orderDetailsContent"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>


            <?php
            $sql = "SELECT p.*, c.CategoryName, i.URL
                        FROM products p
                        INNER JOIN category c ON p.CategoryID = c.CategoryID
                        INNER JOIN Images i ON p.ProductID = i.ProductID";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {

                echo '<table class="table table-bordered" >';
                echo '<thead class="thead-light">';
                echo '<tr style="text-align: center;">';
                echo '<th>Product ID</th>';
                echo '<th>Image</th>';
                echo '<th>Product Name</th>';
                echo '<th>Category</th>';
                echo '<th>Price</th>';
                echo '<th style="text-align: center;">Quantity</th>';
                echo '<th style="text-align: center;">Description</th>';
                echo '<th style="text-align: center;">Actions</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                while ($row = mysqli_fetch_assoc($result)) {
                    // Lấy thông tin từ cột dữ liệu
                    if ($row['is_delete'] == 1) {
                        continue; // Bỏ qua sản phẩm khi is_delete = 1
                    }
                    $productID = $row['ProductID'];
                    $productName = $row['ProductName'];
                    $categoryName = $row['CategoryName'];
                    $price = $row['Price'];
                    $Quantity = $row['Quantity'];
                    $disciption = $row['discription'];

                    echo '<tr>';
                    echo '<td>' . $productID . '</td>';
                    echo '<td>  <img class="first-img" style="width: 100; height: 100;" src="' . $row["URL"] . '" ></td>';
                    echo '<td>' . $productName . '</td>';
                    echo '<td>' . $categoryName . '</td>';
                    echo '<td>' . $price . '</td>';
                    echo '<td>' . $Quantity . '</td>';
                    echo '<td >' . $disciption . '</td>';
                    echo '<td>';
                    echo '<a href="edit.php?productID=' . $productID . '" class="btn btn-warning" style=" width: 100px; margin-top: 5px; margin-left: 45px;">Edit</a>';
                    echo '<a href="delete.php?productID=' . $productID . '" class="btn btn-primary" style=" width: 100px; margin-top: 5px; margin-left: 45px;">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo "<center><h3 style='margin: 50px;'>No products found!</h3></center>";
            }
            ?>
        </div>
        <script>
            function generateProductId() {
                var characters = '0123456789';
                var charactersLength = characters.length;
                var productId = '';
                for (var i = 0; i < 8; i++) {
                    productId += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                document.getElementById('productId').value = productId;
            }

            $(document).ready(function() {
                $(".btn-view-details").click(function() {
                    var orderID = $(this).data("orderid");

                    // Gửi yêu cầu Ajax để lấy thông tin chi tiết đơn hàng từ server
                    $.ajax({
                        url: "get_order_details.php?orderID=" + orderID, // Đường dẫn tới file PHP xử lý yêu cầu
                        type: "GET",
                        success: function(response) {
                            // Chuyển đổi phản hồi JSON thành đối tượng JavaScript
                            var order = JSON.parse(response);
                            console.log(response);
                            // Hiển thị thông tin chi tiết đơn hàng trong modal
                            var html = "<p>Order ID: " + order.OrderID + "</p>";
                            html += "<p>User ID: " + order.UserID + "</p>";
                            html += "<p>Order Date: " + order.OrderDate + "</p>";
                            html += "<p>Product ID: " + order.ProductID + "</p>";
                            html += "<p>Quantity: " + order.Quantity + "</p>";
                            html += "<p>Total: " + order.Total + "</p>";
                            html += "<p>Product Name: " + order.ProductName + "</p>";
                            html += "<p>Description: " + order.Description + "</p>";

                            $("#orderDetailsContent").html(html);
                        }
                    });
                });
            });


        </script>


<?php
        if (isset($_POST['CategoryId']) && isset($_POST['CategoryName']) && isset($_POST['CategoryType'])) {
            // Lấy giá trị từ các trường dữ liệu
            $categoryId = $_POST['CategoryId'];
            $categoryName = $_POST['CategoryName'];
            $categoryType = $_POST['CategoryType'];
            $sql = "SELECT * FROM Category WHERE CategoryId='$categoryId' ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $message = "Category Id đã tồn tại !";
                echo "<center><h2>$message</h2><br></br></center><br></br>";
                include "./footer.php";
            } else {
                $sql = "INSERT INTO Category (CategoryId, CategoryName, CategoryType) VALUES ('$categoryId', '$categoryName', '$categoryType')";
                if (mysqli_query($conn, $sql)) {
                    $message = "Thêm Loại sản phẩm thành công !";
                } else {
                    $message = "Thêm Loại sản phẩm thất bại !";
                }
                echo "<center><h2>$message</h2><br></br></center><br></br>";
                include "./footer.php";
            }
        }

        if (isset($_POST['productId']) && isset($_POST['categoryId']) && isset($_POST['productName']) && isset($_POST['price']) && isset($_POST['quantity'])) {
            // các trường đã được gửi đi
            // xử lý dữ liệu tại đây
            $productId = $_POST['productId'];
            $categoryId = $_POST['categoryId'];
            $productName = $_POST['productName'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $discription = $_POST['discription'];
            $target_dir = "Uploads/";
            $target_file = $target_dir . uniqid() . "_" . basename($_FILES["proPic"]['name']);
            $uploadOk = true;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
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

            $sql = "INSERT INTO `products`(`ProductID`, `CategoryID`, `ProductName`, `Price`, `Quantity`, `discription`) VALUES ('$productId', '$categoryId', '$productName', '$price', '$quantity', '$discription')";
            if (mysqli_query($conn, $sql)) {
                $message = "Thêm sản phẩm thành công !";
            } else {
                $message = "Thêm sản phẩm thất bại !";
            }
            $sql = "INSERT INTO `images`(`ProductID`, `URL`) VALUES ('$productId',' $target_file')";
            mysqli_query($conn, $sql);
            echo "<center><h2>$message</h2><br></br></center><br></br>";
            include "./footer.php";
        } else {
            // $message = "Không có dữ liệu sản phẩm được thêm!";
            // echo "<center><h2>$message</h2><br></br></center><br></br>";
            include "./footer.php";
            // các trường chưa được gửi đi
            // hiển thị thông báo lỗi hoặc chuyển hướng đến trang khác tại đây
        }
    } else {
        $message = "Không đủ quyền !";
        echo '<div style="margin-top: 100px;">' . '</div>';
        echo "<style>";
        echo ".btn-outline-info a:hover {";
        echo "  color: #ae1427;";
        echo "}";
        echo "</style>";

        echo "<center><h2>$message</h2><br></br><button class='btn btn-outline-info'><a href='dang-Nhap.php'>Trở lại</a></button></center><br></br>";

        include "./footer.php";
    }
} else {
    $message = "Bạn chưa đăng nhập !";
    echo '<div style="margin-top: 100px;">' . '</div>';
    echo "<style>";
    echo ".btn-outline-info a:hover {";
    echo "  color: #ae1427;";
    echo "}";
    echo "</style>";

    echo "<center><h2>$message</h2><br></br><button class='btn btn-outline-info'><a href='dang-Nhap.php'>Trở lại</a></button></center><br></br>";

    include "./footer.php";
}

