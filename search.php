<?php
session_start();
include "./header.php";
require_once('./connection.php');

$searchKeyword = $_GET['search'];

?>
<div class="product_home container">
    <div class="clearfix">
        <div class="section-heading">
            <h2 title="Sản phẩm">
                <span>Tìm kiếm</span>
            </h2>
        </div>
    </div>
    <div class="clearfix">
        <div class="product-list">        <?php
        $sql = "SELECT p.ProductID, p.CategoryID, p.ProductName, p.Price, p.Quantity, p.is_delete, i.ImageID, i.URL
            FROM products p
            INNER JOIN images i ON p.ProductID = i.ProductID
            WHERE p.ProductName LIKE '%$searchKeyword%'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['is_delete'] == 1) {
                continue;
            }
        ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 product-wrapper zoomIn wow">
                <div class="product-block product-resize">
                    <div class="product-image image-resize">
                        <a href="#">
                            <img class="first-img" src="<?php echo $row["URL"] ?>">
                        </a>
                        <div class="product-actions hidden-xs">
                            <div class="btn-add-to-cart">
                                <a href="gio-hang.php?id=<?php echo $row['ProductID']; ?>">
                                    <i class="fa fa-shopping-bag" style="margin-top: 10px;" aria-hidden="true"></i>
                                </a>
                            </div>

                            <div class="btn_quickview">
                                <a class="quickview" href="chi-tiet.php?id=<?php echo $row["ProductID"] ?>"><i class="fa fa-eye" style="margin-top: 10px;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-info text-center m-t-xxs-20">
                        <h3 class="pro-name">
                            <a href="" title="<?php echo $row["ProductName"] ?>"><?php echo $row["ProductName"] ?></a>
                        </h3>
                        <h4 class="pro-id">
                            <a href="" title="<?php echo $row["ProductID"] ?>">ID: <?php echo $row["ProductID"] ?></a>
                        </h4>
                        <div class="pro-prices">
                            <span class="pro-price"><?php echo $row["Price"] ?>₫</span>
                            <del class="pro-compare-price"><?php echo $row["Price"] * 1.33 ?>₫</del>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            if (mysqli_num_rows($result) >= 12) {
                break;
            }
        }
        ?>
    </div>
</div>



    </div>
</div>
</div>
<?php
include "./footer.php";
?>