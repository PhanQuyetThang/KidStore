<?php
session_start();
include "./header.php";
require_once('./connection.php');


?>
<script type="text/javascript">
    $("#btnsearch").click(function() {
        SearchProduct();
    });
    $("#btnsearch2").click(function() {
        SearchProduct2();
    });
    $("#txtsearch").keydown(function(event) {
        if (event.keyCode == 13) {
            SearchProduct();
        }
    });
    $("#txtsearch2").keydown(function(event) {
        if (event.keyCode == 13) {
            SearchProduct2();
        }
    });

    function SearchProduct() {
        var key = $('#txtsearch').val();
        if (key == '' || key == 'Tìm kiếm...') {
            $('#txtsearch').focus();
            return;
        }
        window.location = 'tim-kiem08e2.php?key=' + key;
    }

    function SearchProduct2() {
        var key = $('#txtsearch2').val();
        if (key == '' || key == 'Tìm kiếm...') {
            $('#txtsearch2').focus();
            return;
        }
        window.location = 'tim-kiem08e2.php?key=' + key;
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var str = location.href.toLowerCase();
        $("ul.menu li a").each(function() {
            if (str.indexOf(this.href.toLowerCase()) >= 0) {
                $("ul.menu li").removeClass("active");
                $(this).parent().addClass("active");
            }
        });
    });
</script>
</div>

<div class="slideshow">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-9 ">
                <div class="homeslider">
                    <div class="slider" style="">
                        <div class="item">
                            <a href="#"><img src="Uploads/shop2005/images/slide/slider_1.jpg" alt="1"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="adv">
    <section id="service">
        <div class="container m-b-30">
            <div class="row">
                <div id="service_home" class="clearfix">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 col-xxs-12 text-center m-b-xs-10">
                        <div class="service_item">
                            <div class="icon icon_product">
                                <img src="assets/100004/images/icon_142e7.png?v=582" alt="">
                            </div>
                            <div class="description_icon">
                                <span class="large-text">
                                    Miễn phí giao hàng
                                </span>
                                <span class="small-text">
                                    Cho hóa đơn từ 450,000đ
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 col-xxs-12 text-center m-b-xs-10">
                        <div class="service_item">
                            <div class="icon icon_product">
                                <img src="assets/100004/images/icon_242e7.png?v=582" alt="">
                            </div>
                            <div class="description_icon">
                                <span class="large-text">
                                    Giao hàng trong ngày
                                </span>
                                <span class="small-text">
                                    Với tất cả đơn hàng
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center m-b-xs-10">
                        <div class="service_item">
                            <div class="icon icon_product">
                                <img src="assets/100004/images/icon_342e7.png?v=582" alt="">
                            </div>
                            <div class="description_icon">
                                <span class="large-text">
                                    Sản phẩm an toàn
                                </span>
                                <span class="small-text">
                                    Cam kết chất lượng
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <script src="app/services/moduleServices.js"></script>
                <script src="app/controllers/moduleController.js"></script>
                <!--Begin-->
                <div class="box-adv" ng-controller="moduleController" ng-init="initAdvMenuController('AdvMenus')">
                </div>
                <!--End-->
                <div class="sidebar_blogs">
                    <h3 title="bài viết mới" class="sidebar_title">
                        Bài viết nổi bật
                    </h3>
                    <div class="blog_content">
                        <div class="article_item">
                            <div class="article_img">
                                <a>
                                    <img src="Uploads/shop2005/images/news/vay_ba_bau.jpg" alt="Trang phục cho bà bầu" title="Trang phục cho bà bầu">
                                </a>
                            </div>
                            <div class="article_content clearfix">
                                <div class="title">
                                    <h4><a title="Trang phục cho bà bầu">Trang phục cho bà bầu</a>
                                    </h4>
                                </div>
                                <div class="article_meta">
                                    <div class="article_comment">
                                        <i class="fa fa-comments-o" aria-hidden="true"></i> 0 bình luận
                                    </div>
                                    <div class="article_created">
                                        <i class="fa fa-calendar" aria-hidden="true"></i> <time datetime="30/03/2023">30/03/2023</time>
                                    </div>
                                </div>
                                <div class="des">
                                    <p> Một điều chắc chắn rằng bạn sẽ không thể tránh được những thay
                                        đổi....</p>

                                </div>
                                <a class="readmore" href="https://www.huggies.com.vn/mang-thai/cham-soc-trong-thai-ky/trang-phuc-cho-ba-bau">Đọc
                                    tiếp <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="article_item">
                            <div class="article_img">
                                <a href="https://www.festival.com.vn/nhung-kieu-phoi-do-dong-dieu-cho-me-va-be-gai-xinh-den-phat-them/">
                                    <img src="Uploads/shop2005/images/news/thoi_trang_me_va_be.jpg" alt="Những kiểu phối đồ đồng điệu cho mẹ và bé gái xinh" title="Những kiểu phối đồ đồng điệu cho mẹ và bé gái xinh">
                                </a>
                            </div>
                            <div class="article_content clearfix">
                                <div class="title">
                                    <h4><a href="https://www.festival.com.vn/nhung-kieu-phoi-do-dong-dieu-cho-me-va-be-gai-xinh-den-phat-them/" title="Những kiểu phối đồ đồng điệu cho mẹ và bé gái xinh">Những
                                            kiểu phối đồ đồng điệu cho mẹ và bé gái xinh</a>
                                    </h4>
                                </div>
                                <div class="article_meta">
                                    <div class="article_comment">
                                        <i class="fa fa-comments-o" aria-hidden="true"></i> 0 bình luận
                                    </div>
                                    <div class="article_created">
                                        <i class="fa fa-calendar" aria-hidden="true"></i> <time datetime="27/01/2023">27/01/2023</time>
                                    </div>
                                </div>
                                <div class="des">
                                    <p>Giờ đây, diện đồ đôi cho mẹ và bé gái đã không còn là xu hướng thời trang
                                        mới...</p>

                                </div>
                                <a class="readmore" href="https://www.festival.com.vn/nhung-kieu-phoi-do-dong-dieu-cho-me-va-be-gai-xinh-den-phat-them/">Đọc
                                    tiếp <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="article_item">
                            <div class="article_img">
                                <a href="https://www.vinmec.com/vi/tin-tuc/thong-tin-suc-khoe/nhi/cham-soc-tre-so-sinh-den-khi-day-thang/">
                                    <img src="Uploads/shop2005/images/news/cham_soc_tre_so_sinh.jpg" alt="Phương pháp chăm sóc trẻ sơ sinh khi đầy tháng" title="Phương pháp chăm sóc trẻ sơ sinh khi đầy tháng">
                                </a>
                            </div>
                            <div class="article_content clearfix">
                                <div class="title">
                                    <h4><a href="https://www.vinmec.com/vi/tin-tuc/thong-tin-suc-khoe/nhi/cham-soc-tre-so-sinh-den-khi-day-thang/" title="Phương pháp chăm sóc trẻ sơ sinh khi đầy tháng">Phương pháp
                                            chăm sóc trẻ sơ sinh khi đầy tháng</a></h4>
                                </div>
                                <div class="article_meta">
                                    <div class="article_comment">
                                        <i class="fa fa-comments-o" aria-hidden="true"></i> 0 bình luận
                                    </div>
                                    <div class="article_created">
                                    </div>
                                </div>
                                <div class="des">
                                    <p>Sau khi cất tiếng khóc chào đời, trẻ sơ sinh sẽ thoát khỏi sự bao bọc...
                                    </p>

                                </div>
                                <a class="readmore" href="https://www.vinmec.com/vi/tin-tuc/thong-tin-suc-khoe/nhi/cham-soc-tre-so-sinh-den-khi-day-thang/">Đọc
                                    tiếp <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-9">
                <div class="product_home">
                    <div class="clearfix">
                        <div class="section-heading">
                            <h2 title="Sản phẩm">
                                <span>Sản phẩm</span>
                            </h2>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="product-list">

                            <?php
                            $sql = "SELECT p.ProductID, p.CategoryID, p.ProductName, p.Price, p.Quantity, p.is_delete, i.ImageID, i.URL
                                FROM products p
                                INNER JOIN images i ON p.ProductID = i.ProductID;
                                ";
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
    </div>
</div>

<div class="partner">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <script src="app/services/moduleServices.js"></script>
                <script src="app/controllers/moduleController.js"></script>
                <script type="text/javascript">
                    window.AdvMenus = [{
                        "Id": 5695,
                        "ShopId": 2005,
                        "AdvType": 1,
                        "AdvTypeName": "Menu 2 bên",
                        "Name": "1",
                        "Image": "/Uploads/shop2005/images/adv/banner_sidebar_img_1.jpg",
                        "ImageThumbnai": "/Uploads/shop2005/_thumbs/images/adv/banner_sidebar_img_1.jpg",
                        "Link": "#",
                        "IsVideo": false,
                        "Index": 1,
                        "Inactive": false,
                        "Timestamp": "AAAAAAAoh7c="
                    }, {
                        "Id": 5696,
                        "ShopId": 2005,
                        "AdvType": 1,
                        "AdvTypeName": "Menu 2 bên",
                        "Name": "2",
                        "Image": "/Uploads/shop2005/images/adv/banner_sidebar_img_2.jpg",
                        "ImageThumbnai": "/Uploads/shop2005/_thumbs/images/adv/banner_sidebar_img_2.jpg",
                        "Link": "#",
                        "IsVideo": false,
                        "Index": 2,
                        "Inactive": false,
                        "Timestamp": "AAAAAAAoh7Y="
                    }];
                </script>
            </div>
            <div class="col-md-9">

                <!--Blog-->
                <section id="blog_index" class="container m-b-20">
                    <div class="row">
                    </div>
                    <div class="row">
                    </div>
                </section>
                <!--EndBlog-->
            </div>
        </div>
    </div>
</div>
<?php
include "./footer.php";
?>