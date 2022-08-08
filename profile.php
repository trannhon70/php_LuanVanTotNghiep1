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
        <div class="row">
            <div class="col-12 col-md-12 p-0">
                <div class="headingMain">Thông tin cá nhân</div>
            </div>

            <table class="tblone col-12 col-md-12">
                <?php 
                $id = Session::get('customer_id');
                    $get_customers = $cat->show_customer($id);
                    if($get_customers){
                        while($result = $get_customers->fetch_assoc()){

                        
                ?>
                <tr>
                    <td>Họ và tên</td>
                    <td>:</td>
                    <td><?php echo $result['name'] ?></td>
                </tr>
                <tr>
                    <td>Thành phố hoặc tỉnh</td>
                    <td>:</td>
                    <td><?php echo $result['city'] ?></td>
                </tr>
                <tr>
                    <td>Mã thành phố hoặc tỉnh</td>
                    <td>:</td>
                    <td><?php echo $result['zipcode'] ?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>:</td>
                    <td><?php echo $result['address'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $result['email'] ?></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>:</td>
                    <td><?php echo $result['phone'] ?></td>
                </tr>
                <!-- <tr>
                    <td colspan="3">
                        <a href="editprofile.php" class="button__primary">Chỉnh sửa thông tin cá nhân</a>
                    </td>
                </tr> -->

                <?php }
                    } ?>
            </table>
            <div class="col-12 col-md-12 profile__submit">
                <a href="editprofile.php" class="button__primary button__submit">Chỉnh sửa thông tin cá nhân</a>
            </div>
        </div>
    </div>
</div>
<?php
include('inc/footer.php');

?>