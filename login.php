<?php
    include('inc/header.php');
?>
<?php

$login_check = Session::get('customer_login');
if ($login_check) {
	header('Location:order.php');
}
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // $addNewAccount = $cat->addNewAccount();
	$insertCustomers = $cat->insert_customers($_POST);
}
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
	$loginCustomers = $cat->login_customers($_POST);
}
?>

<div class="loginMain">
    <div class="container">
        <div class="row loginMain__row">
            <div class="col-12 col-md-12 col-lg-12 loginMain__breadcrumb">
                <a href="index.php" class="breadcrumb__link">Trang chủ</a>
                <span>/</span>
                <a href="login.php" class="breadcrumb__link active">Login</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 col-lg-5 login1">
                <div class="login__wrap">
                    <div class="headingMain">Đăng nhập</div>
                    <?php
                        if (isset($loginCustomers)) {
                            echo $loginCustomers;
                        }
                        ?>
                    <form action="" method="POST">
                        <div>
                            <input class="input_login" type="email" name="email" placeholder="Email">
                        </div>
                        <div>
                            <input class="input_login" name="password" type="password" placeholder="Password">
                        </div>
                        <div style="text-align: start;" class="forgotPassword">
                            <a href="checkemail.php">Quên mật khẩu?</a>
                        </div>
                        <div class="button_login">
                            <button type="submit" name="login" class="button__primary">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-7 register">
                 <!-- Đăng ký -->
                <div class="register__wrap">
                    <div class="headingMain">Đăng ký tài khoản mới</div>
                    <?php
                        if (isset($insertCustomers)) {
                            echo $insertCustomers;
                        }
                        ?>
                    <form action="" method="POST">
                        <table class="table">
                            <div class="row mb-2">
                                <div class="col-12 col-lg-6">
                                    <input class="form-control col-12 " type="text" name="name" placeholder="Họ và tên">
                                </div>

                                <div class="col-12 col-lg-6">
                                    <input class="form-control col-12 " type="text" name="city" placeholder="Thành phố hoặc tỉnh">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-12 col-lg-6">
                                    <input class="form-control col-12" type="text" name="zipcode" placeholder="Mã thành phố hoặc tỉnh ">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input class="form-control col-12"
                                        type="email" name="Email" placeholder="Email">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-12 col-lg-6">
                                    <input class="form-control col-12" type="text" name="address" placeholder="Địa chỉ">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input class="form-control col-12" type="text" name="phone" placeholder="Số điện thoại">
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-12 col-lg-6">
                                    <input class="form-control col-12" type="password"
                                        name="password" placeholder="Mật khẩu">
                                </div>
                            </div>
                        </table>
                        <div class="button_register">
                            <button type="submit" name="submit" class="button__primary">Tạo tài khoản</button>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('inc/footer.php');

?>