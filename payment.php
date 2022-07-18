<?php
include('inc/header.php');

?>
<?php
$login_check = Session::get('customer_login');
if ($login_check == false) {
    header('Location:login.php');
}
?>
<?php
// if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {

// 	echo "<script>window.location = '404.php'</script>";
// } else {
// 	$id = $_GET['proid'];
// }
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
// 	$quantity = $_POST['quantity'];
// 	 $AddtoCart = $cat->add_to_cart($quantity,$id);
// }
?>

<div class="main_payment">
    <div class="heading_payment">
        <h3>Phương thức thanh toán</h3>
</div>
    <div class="wrapper_method_payment">
        <h3>Chọn phương thức để thanh toán</h3><br />
        <a href="offlinepayment.php">Thanh toán khi nhận hàng</a>
        <a href="onlinepayment.php">Thanh toán online</a><br><br>
        <a href="cart.php">
             Quay lại</a>
    </div>
</div>
<?php
include('inc/footer.php');

?>