<?php
include('inc/header.php');

?>
<?php
    $login_check = Session::get('customer_login');
    if ($login_check == false) {
        header('Location:login.php');
    }
    $cat = new category();
    if(isset($_GET['statusid']) ){
        $id = $_GET['statusid'];
        $time = $_GET['time'];
        $customer_id = $_GET['customerId'];
        $shifted_confirm = $cat->shifted_confirm_donhang($id,$customer_id,$time);
        $update_shifted_confirm=$cat->update_shifted_confirm($time,$customer_id);
    }
?>

<style type="text/css">
.box_left {
    width: 100%;
    border: 1px solid #666;
    padding: 4px;
}
</style>
<form action="" method="post">
    <div class="profile">
        <div class="container">
            <div class="row profile__row">
                <div class="col-12 col-md-12 col-lg-12 profile__breadcrumb">
                    <a href="index.php" class="breadcrumb__link">Trang chủ</a>
                    <span>/</span>
                    <a href="orderTong.php" class="breadcrumb__link active">Đơn hàng</a>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-12 col-md-12 col-lg-12">
                    <div class="headingMain" style="width:100%;">Đơn hàng của bạn</div>
                </div> -->
                <div class="col-12 col-md-12 col-lg-12 p-0">
                    <table class="tblone">
                        <tr>
                            <th >STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Thời gian</th>
                            <th>Thông tin chi tiết đơn hàng</th>                    
                            <th>Xử lý</th>

                        </tr>
                        <?php
                        $customer_id = Session::get('customer_id');
                        $get_cart_ordered = $cat->show_khachhang_id($customer_id);
                        if ($get_cart_ordered) {
                            $subtotal = 0;
                            $qty = 0;
                            $i = 0;
                            while ($result = $get_cart_ordered->fetch_assoc()) {
                                $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['time'] ?></td>
                            <td><?php echo $result['date'] ?></td>
                            <td><a href="orderdetails.php?donhangid=<?php echo $result['time'] ?>">Xem chi tiết đơn hàng</a></td>                                
                            <td>
                                <?php
                                    if($result['status']=='0'){
                                        echo 'Chờ xử lý';
                                    }elseif($result['status']=='1'){ 
                                    ?>
                                <!-- <span>Đang vận chuyển</span> -->
                            <a href="?statusid=<?php echo $result['id'] ?>&time=<?php echo $result['time'] ?>&customerId=<?php echo $result['customer_id'] ?>">Đã nhận đơn hàng</a>
                                <?php
                                    }elseif($result['status']==2){
                                        echo 'Đã thanh toán';
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php
                            }
                        } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
include('inc/footer.php');

?>