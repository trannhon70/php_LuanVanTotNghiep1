<?php
	include('inc/header.php');
	
 ?>
 
 <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['check'])) {
        $checkEmail = $cat->check_Email($_POST);
    }
?>
<div class="main_forgot">
    <div class="forgit_panel">

        <h3>kiểm tra email</h3>
        
        <form action="checkemail.php" method="POST">
            <div><?php
			if (isset($checkEmail)) {
				echo $checkEmail;
			}
			?></div>
            <div>
                <input class="input_login" type="email" name="email" placeholder="Nhập email để kiểm tra">
            </div>
            
            
            <div class="button_login">
                <button type="submit" name="check">Xác nhận</button>
            </div>
        </form>
    </div>
    
</div>
 <?php
	include('inc/footer.php');
	
 ?>
