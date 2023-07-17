<?php

?>
<div class="footer">
    <script src="app/services/moduleServices.js"></script>
    <script src="app/controllers/moduleController.js"></script>
    <footer class="footer-content">
        <div class="footer_top">
            <div class="container">
                <div class="footer_top_wrap">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <!-- footer col 1 -->
                            <div class="footer_block">
                                <h4 class="footer_block_title">
                                    Về ch&#250;ng t&#244;i
                                </h4>
                                <div class="block_content">
                                    <ul class="list_group">
                                        <li class="item">
                                            <a>
                                                Giới thiệu
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a>
                                                Giao h&#224;ng - Đổi trả
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a>
                                                Ch&#237;nh s&#225;ch bảo mật
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a>
                                                Li&#234;n hệ
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End footer col 1 -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <!-- footer col 1 -->
                            <div class="footer_block">
                                <h4 class="footer_block_title">
                                    Trợ gi&#250;p
                                </h4>
                                <div class="block_content">
                                    <ul class="list_group">
                                        <li class="item">
                                            <a>
                                                Hướng dẫn mua h&#224;ng
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a>
                                                Hướng dẫn thanh to&#225;n
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a>
                                                T&#224;i khoản giao dịch
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End footer col 1 -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <!-- footer col 3 -->
                            <div class="footer_block">
                                <h4 class="footer_block_title">
                                    Đăng ký nhận bản tin
                                </h4>
                                <div class="block_content" ng-controller="moduleController" ng-init="initController()">
                                    <div class="des_newsletter_form">
                                        Đăng Ký Thành Viên Để Nhận Bản Tin Mỗi Ngày:
                                    </div>
                                    <form id="newsletter_form" ng-submit="registerNewsletter()" class="m-b-20 contact-form">
                                        <div class="newsletter_wrap">
                                            <input ng-model="newsletter.Email" required="" id="contact_email" autocomplete="off" type="email">
                                            <label>Email của bạn </label>
                                            <button class="btn-newsletter" type="submit">
                                                <span><i class="fa fa-paper-plane-o"></i></span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End footer col 3 -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <!-- footer col 4 -->
                            <div class="footer_block">
                                <h4 class="footer_block_title">
                                    Theo dõi trên Fanpage
                                </h4>
                                <div class="block_content">
                                    <div class="fb-page" data-small-header="true" data-tabs="message" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
                                </div>
                            </div>
                            <!-- End footer col 4 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="footer_bottom_wrap">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="footer_address">
                                <p><span>CÔNG TY CỔ PHẦN SỮA'S HOUSE</span></p>
                                <p><span>Địa chỉ: Số 1 Võ Văn Ngân, P. Linh Chiểu, TP. Thủ Đức, TP.HCM</span></p>
                                <p><span>Số điện thoại: 038 941 5925</span></p>
                                <p><span>Số di động: 038 941 5925</span></p>
                                <p><span>Email: 20139050@student.hcmute.edu.vn</span></p>
                            </div>
                        </div>
                        <div class="col-lg-5 text-right text-center-xs">
                            <div class="social_footer">
                                <ul>
                                    <li><a href="https://www.facebook.com/thangquyet0501"><span><i class="fa fa-facebook"></i></span></a></li>
                                    <li><a><span><i class="fa fa-twitter"></i></span></a></li>
                                    <li><a><span><i class="fa fa-youtube"></i></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

</div>


<div style="display: none;" id="loading-mask">
    <div id="loading_mask_loader" class="loader">
        <img alt="Loading..." src="Images/ajax-loader-main.gif" />
        <div>
            Please wait...
        </div>
    </div>
</div>
<a href="javascript:void(0);" class="back-to-top"><span>Top</span></a>

</body>

</html>
<script type="text/javascript">
    $(".header-content").css({
        "background": ''
    });
    $("html").addClass('');
</script>