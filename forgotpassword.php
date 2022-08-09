<?php
include('inc/header.php');

?>
<?php
    $login_check = Session::get('customer_email');
    if ($login_check==false) {
        header('Location:checkemail.php');
    }
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $checkEmail = $cat->doi_matKhau($_POST);
    }
?>

<div class="profile">
    <div class="container">
        <div class="row profile__row">
            <div class="col-12 col-md-12 col-lg-12 profile__breadcrumb">
                <a href="index.php" class="breadcrumb__link">Trang chủ</a>
                <span>/</span>
                <a href="login.php" class="breadcrumb__link">Login</a>
                <span>/</span>
                <a href="checkemail.php" class="breadcrumb__link">Kiểm tra email</a>
                <span>/</span>
                <a href="forgotpassword.php" class="breadcrumb__link active">Thay đổi mật khẩu</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 confirmEmail">
                <form action="forgotpassword.php" method="POST" class="formConfirmEmail">
                    <div><?php
                    if (isset($checkEmail)) {
                        echo $checkEmail;
                    }
                    ?></div>
                    <div>
                        <input class="input_login" type="email" name="email" placeholder="Nhập lại email">
                    </div>
                    <div>
                        <input class="input_login" type="password" name="password" placeholder="Nhập mật khẩu mới">
                    </div>
                    <div>
                        <input class="input_login" type="password" name="password1" placeholder="Nhập mật lại khẩu mới">
                    </div>
                    
                    <div class="button_login d-flex justify-content-center">
                        <button type="submit" name="login" class="button__primary">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>
<?php
include('inc/footer.php');

?>