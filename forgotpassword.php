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

<div class="main_forgot">
    <div class="forgit_panel">

        <h3>Thay đổi mật khẩu</h3>
        
        <form action="forgotpassword.php" method="POST">
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
            
            <div class="button_login">
                <button type="submit" name="login">Xác nhận</button>
            </div>
        </form>
    </div>
    
</div>
<?php
include('inc/footer.php');

?>