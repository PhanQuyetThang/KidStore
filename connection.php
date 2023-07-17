<?php
$servername = "localhost"; // Tên máy chủ
$username = "root"; // Tên đăng nhập của người dùng MySQL
$password = ""; // Mật khẩu của người dùng MySQL
$dbname = "doan1"; // Tên cơ sở dữ liệu
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}