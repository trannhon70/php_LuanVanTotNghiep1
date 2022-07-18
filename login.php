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
	$insertCustomers = $cat->insert_customers($_POST);
}
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
	$loginCustomers = $cat->login_customers($_POST);
}
?>

<div class="main_login">
    <div class="login_panel">
        <h3>Đăng nhập</h3>
        <?php
			if (isset($loginCustomers)) {
				echo $loginCustomers;
			}
			?>
        <form action="" method="POST">
            <div>
                <input class="input_login" type="email" name="email" placeholder="email">
            </div>
            <div>
                <input class="input_login" name="password" type="password" placeholder="password">
            </div>
            <div style="text-align: start;">
                <a style="color:red" href="#">Quên mật khẩu</a>
            </div>
            <div class="button_login">
                <button type="submit" name="login">Đăng nhập</button>
            </div>
        </form>
    </div>
    <!-- Đăng ký -->
    <div class="register_account_login">
        <h3>Đăng ký tài khoản mới</h3>
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
                        <input class="form-control col-12" type="text" name="zipcode" placeholder="mã thành phố ">
                    </div>
                    <div class="col-12 col-lg-6">
                        <input class="form-control col-12"
                            type="email" name="email" placeholder="email">
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-12 col-lg-6">
                        <input class="form-control col-12" type="text" name="address" placeholder="địa chỉ">
                    </div>
                    <div class="col-12 col-lg-6">
                        <select class="form-control col-12" id="country" name="country">
                            <option class="form-control col-12" value="null">Chọn quốc gia</option>
                            <option class="form-control col-12" value="vn">Việt Nam</option>

                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <input class="form-control col-12" type="text" name="phone" placeholder="số điện thoại">
                    </div>

                    <div class="col-12 col-lg-6">
                        <input class="form-control col-12" type="password"
                            name="password" placeholder="mật khẩu">
                    </div>
                </div>
            </table>
            <div class="button_register">
                <button type="submit" name="submit" >Tạo tài khoản</button>
            </div>
            <div class="clear"></div>
        </form>
    </div>
    <div class="clear"></div>
</div>
<?php
include('inc/footer.php');

?>