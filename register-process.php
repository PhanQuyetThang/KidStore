<?php

session_start();
ob_start();
require_once('./connection.php');
include "./header2.php";

if (isset($_POST["UserName"]) && isset($_POST["Password"])) {
    //get info
    $UserName = $_POST["UserName"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    $ConfirmPassword = $_POST["ConfirmPassword"];
    $Address = $_POST["Address"];
    $PhoneNumber = $_POST["PhoneNumber"];
    $UserType = 1;
    $sql = "SELECT * FROM users WHERE Email='$Email' ";
    $result = mysqli_query($conn, $sql);

    if ($UserName === '' || $Email === '' || $Password === '') {
        $message = "Nhập thiếu trường thông tin !";
        echo '<div style="margin-top: 100px;">' . '</div>';
    } else if ($Password !== $ConfirmPassword) {
        $message = "Nhập không khớp mật khẩu !";
        echo '<div style="margin-top: 100px;">' . '</div>';
    } else if (mysqli_num_rows($result) > 0) {
        $message = "Email đã được đăng ký !";
        echo '<div style="margin-top: 100px;">' . '</div>';
    } else {
        //insert database
        $sql = "INSERT INTO `users`(`UserName`, `Email`, `UserPassword`, `UserType`,`Address`,`PhoneNumber`) VALUES ('$UserName','$Email','$Password','$UserType','$Address','$PhoneNumber')";

        if (mysqli_query($conn, $sql)) {
            $message = "Đăng ký thành công!";
            echo '<div style="margin-top: 100px;">' . '</div>';
        } else {
            $message = "Đăng ký thất bại!";
            echo '<div style="margin-top: 100px;">' . '</div>';
        }
    }
} else {
    $message = "Bạn chưa nhập thông tin !";
    echo '<div style="margin-top: 100px;">' . '</div>';
}
echo "<style>";
echo ".btn-outline-info a:hover {";
echo "  color: #ae1427;";
echo "}";
echo "</style>";

echo "<center><h2>$message</h2><br></br><button class='btn btn-outline-info'><a href='dang-Nhap.php'>Trở lại</a></button></center><br></br>";
include "./footer.php";
