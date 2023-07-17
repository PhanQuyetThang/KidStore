<?php
session_start();
ob_start();
require_once './connection.php';

if (isset($_SESSION["UserID"]) && isset($_SESSION["UserType"])) {
    if ($_SESSION["UserType"] === '0') {
        // Kiểm tra xem OrderID có được truyền từ GET không
        if (isset($_GET["orderID"])) {
            $orderID = $_GET["orderID"];
    
            // Thực hiện truy vấn SQL với mệnh đề WHERE theo OrderID
            $sql = "SELECT so.OrderID, so.UserID, so.OrderDate, od.ProductID, od.Quantity, od.Total, p.ProductName, p.discription
                    FROM shoppingorder so
                    INNER JOIN orderdetails od ON so.OrderID = od.OrderID
                    INNER JOIN products p ON od.ProductID = p.ProductID
                    WHERE so.OrderID = '$orderID'
                    ORDER BY so.OrderID";
            $result = mysqli_query($conn, $sql);
    
            // Tạo một mảng để lưu trữ thông tin đơn hàng
            $order = array();
    
            // Kiểm tra xem truy vấn có kết quả hay không
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
    
                $order = array(
                    'OrderID' => $row['OrderID'],
                    'UserID' => $row['UserID'],
                    'OrderDate' => $row['OrderDate'],
                    'ProductID' => $row['ProductID'],
                    'Quantity' => $row['Quantity'],
                    'Total' => $row['Total'],
                    'ProductName' => $row['ProductName'],
                    'Description' => $row['discription']
                );
            }
    
            // Chuyển đổi mảng thành chuỗi JSON
            $json = json_encode($order);
    
            // Trả về chuỗi JSON
            echo $json;
        }
    } else {
        $message = "Không đủ quyền!";
        echo '<div style="margin-top: 100px;"></div>';
        echo "<style>";
        echo ".btn-outline-info a:hover {";
        echo "  color: #ae1427;";
        echo "}";
        echo "</style>";
        echo "<center><h2>$message</h2><br></br><button class='btn btn-outline-info'><a href='dang-Nhap.php'>Trở lại</a></button></center><br></br>";
    }
} else {
    $message = "Bạn chưa đăng nhập!";
    echo '<div style="margin-top: 100px;"></div>';
    echo "<style>";
    echo ".btn-outline-info a:hover {";
    echo "  color: #ae1427;";
    echo "}";
    echo "</style>";
    echo "<center><h2>$message</h2><br></br><button class='btn btn-outline-info'><a href='dang-Nhap.php'>Trở lại</a></button></center><br></br>";
}
