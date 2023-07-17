<?php

session_start();
ob_start();


include "./header2.php";

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
</div>







<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9" style="margin: 100px 65px;">
                <script src="app/services/accountServices.js"></script>
                <script src="app/controllers/accountController.js"></script>
                <div class="login-content clearfix" ng-controller="accountController" ng-init="initController()">

                    <div class="col-md-6 col-md-offset-3 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
                        <form class="form-horizontal" method="POST" action="login-process.php">
                            <div class="form-group">
                                <label for="UserName" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" name="Email" class="form-control" required='true' />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Password" class="col-sm-4 control-label">Mật khẩu</label>
                                <div class="col-sm-8">
                                    <input type="password" name="Password" class="form-control" ng-model="Password" ng-required='true' />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                    <a href="quen-mat-khau.php">Quên mật khẩu?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<?php
include "./footer.php";
?>