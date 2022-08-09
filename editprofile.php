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
$id = Session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
	
	 $updateCustomer = $cat->update_customer($_POST,$id);
}
?>

<div class="profile">
    <div class="container">
        <div class="row profile__row">
            <div class="col-12 col-md-12 col-lg-12 profile__breadcrumb">
                <a href="index.php" class="breadcrumb__link">Trang chủ</a>
                <span>/</span>
                <a href="profile.php" class="breadcrumb__link active">Chỉnh sửa thông tin cá nhân</a>
            </div>
        </div>
        <div class="row">
            <!-- <div class="col-12 col-md-12 col-lg-12 p-0">
                <div class="headingMain">Chỉnh sửa thông tin cá nhân</div>
            </div> -->
            <form action="" method="post" class="col-12 col-md-12 col-lg-12 p-0">
                <table class="tblone tbProfile">
                    <?php 
                $id = Session::get('customer_id');
                    $get_customers = $cat->show_customer($id);
                    if($get_customers){
                        while($result = $get_customers->fetch_assoc()){

                        
                ?>
                    <tr>
                        <td>Họ và tên</td>
                        <td>:</td>
                        <td><input type="text" name="name" value="<?php echo $result['name'] ?>"> </td>
                    </tr>
                    <tr>
                        <td>Thành phố hoặc tỉnh</td>
                        <td>:</td>
                        <td><input type="text" name="city" value="<?php echo $result['city'] ?>"> </td>
                    </tr>
                    <tr>
                        <td>Mã thành phố hoặc tỉnh</td>
                        <td>:</td>
                        <td><input type="number" name="zipcode" value="<?php echo $result['zipcode'] ?>"> </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td>:</td>
                        <td><input type="text" name="address" value="<?php echo $result['address'] ?>"> </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input readonly type="email" name="email" value="<?php echo $result['email'] ?>"> </td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>:</td>
                        <td><input type="number" name="phone" value="<?php echo $result['phone'] ?>"> </td>
                    </tr>
                    
                    <?php }
                    } ?>
                </table>
            </form>
            <div class="col-12 col-md-12 profile__submit">
                <button class="button__primary" type="submit" name="save">Lưu Thông tin cá nhân</button>
            </div>
        </div>
        <!-- <div class="section group"> -->
            <!-- <div class="content_top">
                <div class="heading">
                    <h3>Chỉnh sửa thông tin cá nhân </h3>
                </div>
                <div class="clear"></div>
            </div> -->
        <!-- </div> -->
    </div>
</div>
<?php
include('inc/footer.php');

?>