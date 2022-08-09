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

<div class="profile">
    <div class="container">
        <div class="row profile__row">
            <div class="col-12 col-md-12 col-lg-12 profile__breadcrumb">
                <a href="index.php" class="breadcrumb__link">Trang chủ</a>
                <span>/</span>
                <a href="cart.php?id=live" class="breadcrumb__link">Giỏ hàng</a>
                <span>/</span>
                <a href="payment.php" class="breadcrumb__link active">Chọn phương thức thanh toán</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 payment d-flex justify-content-center mt-5">
                <div class="wrapper_method_payment">
                    <a href="offlinepayment.php" class="button__primary success">
                        <i class="fa-solid fa-truck-fast"></i>
                        Thanh toán khi nhận hàng
                    </a>
                    <a href="onlinepayment.php" class="button__primary warning">
                        <i class="fa-solid fa-credit-card"></i>
                        Thanh toán online
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('inc/footer.php');

?>