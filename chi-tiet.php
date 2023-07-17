<?php
session_start();
ob_start();
require_once('./connection.php');
include "./header.php";

if (isset($_GET["id"])) {
    $productId = $_GET["id"];
    $sql = "SELECT p.ProductID, p.CategoryID, p.ProductName, p.Price, p.Quantity, p.discription, i.ImageID, i.URL
            FROM products p 
            INNER JOIN images i ON p.ProductID = i.ProductID
            WHERE p.ProductID = $productId;";
    $result = mysqli_query($conn, $sql);
} else {
    echo "<center><h2>Không tìm thấy sản phẩm !</h2></center>";
    include "./footer.php";
    die;
}

?>
<!-- <nav class="navbar-main">
    <div id="mb_mainnav">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12 vertical_menu">
                    <div id="mb_verticle_menu" class="menu-quick-select">
                        <div class="title_block">
                            <span style="display: flex; justify-content: center; align-items: center;">SỮA'S HOUSE</span>
                        </div>

                    </div>
                </div>
                <nav class="col-md-9 col-sm-12 col-xs-12 p-l-0">
                    <ul class='menu nav navbar-nav menu_hori'>
                        <li class="level0"><a class='' href='index.php'><span>Trang chủ</span></a></li>
                        <li class="level0"><a class=''><span>Giới thiệu</span></a>
                        </li>
                        <li class="level0"><a class=''><span>Sản phẩm</span></a></li>
                        <li class="level0"><a class=''><span>Tin tức</span></a></li>
                        <li class="level0"><a class=''><span>Liên hệ</span></a></li>
                    </ul class='menu nav navbar-nav menu_hori'>
                </nav>
            </div>
        </div>
    </div>
</nav> -->
<link rel="stylesheet">
<div class="container">
    <?php
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    ?>
        <div class="product-info">
            <div class="row">
                <div class="col-md-7">
                    <div class="product-image" style="margin: 20px 300px; width: 350px;">
                        <img src="<?php echo $row['URL']; ?>" alt="product image" width="300" height="300">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="product-details" style="margin: 20px 0px;">
                        <p class="product-id">ID: <?php echo $row['ProductID']; ?></p>
                        <h1 class="product-name"><?php echo $row['ProductName']; ?></h1>
                        <p class="product-price" style="color: #ae1427; font-size: 20px; font-style: bold; margin-top: 10px;">Giá: <?php echo $row['Price']; ?>₫</p>
                        <p><del class="pro-compare-price"><?php echo $row["Price"] * 1.33 ?>₫</del></p>
                        <p class="product-quantity">Số lượng còn: <?php echo $row['Quantity']; ?></p>
                        <p class="product-quantity">Mô tả: <?php echo $row['discription']; ?></p>
                        <p><a href="gio-hang.php?id=<?php echo $row["ProductID"]; ?>" class="btn btn-info" style="background: #ae1427; border:none;" </style><i class="fa fa-shopping-bag" aria-hidden="true"></i> Thêm Vào giỏ hàng</a></p>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else {
        echo "Product not found.";
    }
    ?>
</div>


<?php
include "./footer.php";
?>