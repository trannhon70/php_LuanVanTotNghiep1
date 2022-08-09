<?php
	include('inc/header.php');
	
 ?>
 
 <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['check'])) {
        $checkEmail = $cat->check_Email($_POST);
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
                <a href="checkemail.php" class="breadcrumb__link active">Kiểm tra email</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 p-0 confirmEmail">
                <form action="checkemail.php" method="POST" class="formConfirmEmail">
                    <div><?php
                    if (isset($checkEmail)) {
                        echo $checkEmail;
                    }
                    ?></div>
                    <div>
                        <input class="input_login" type="email" name="email" placeholder="Nhập email để kiểm tra">
                    </div>
                    
                    
                    <div class="button_login d-flex justify-content-center">
                        <button type="submit" name="check" class="button__primary">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>
 <?php
	include('inc/footer.php');
	
 ?>
