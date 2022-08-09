<?php
include('inc/header.php');

?>
<?php
    $cat = new category();
    $login_check = Session::get('customer_login');
    if ($login_check == false) {
        header('Location:login.php');
    }
    if(!isset($_GET['donhangid']) || $_GET['donhangid']==NULL){
        echo "<script>window.location = 'orderTong.php'</script>";
    }
    else{
        $id = $_GET['donhangid'];
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
                    <a href="orderTong.php" class="breadcrumb__link">Đơn hàng</a>
                    <span>/</span>
                    <a href="orderdetails.php?donhangid=<?php echo $id ?>" class="breadcrumb__link active">Chi tiết đơn hàng</a>
                </div>
            </div>
            <div class="row">
                <!-- <div class="box_left"> -->
                    <!-- <div class="col-12 col-md-12 col-lg-12">
                        <div class="headingMain" style="width:100%;">Đơn hàng chi tiết của bạn</div>
                    </div> -->
                    <div class="col-12 col-md-12 col-lg-12">
                        <table class="tblone">
                            <tr>
                                <th width="5%">STT</th>
                                <th width="15%">Tên sản phẩm</th>
                                <th width="10%">Hình ảnh</th>
                                <th width="20%">Giá</th>
                                <th width="10%">Số lượng</th>
                                <th width="10%">Thành tiền</th>
                            </tr>
                            <?php
                            $customer_id = Session::get('customer_id');
                            $get_cart_ordered = $cat->get_cart_ordered($id, $customer_id);
                            if ($get_cart_ordered) {
                                $subtotal = 0;
                                $qty = 0;
                                $i = 0;
                                while ($result = $get_cart_ordered->fetch_assoc()) {
                                    $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['productName'] ?></td>
                                    <td><img src="admin/uploads/<?php echo $result['hinhanh'] ?>" alt="" /></td>

                                    <td><?php echo number_format($result['price']) . " " . "VNĐ" ?></td>
                                    <td>
                                        <?php echo $result['quantity'] ?>
                                    </td>
                                    <td><?php $total = $result['price'] * $result['quantity'];
                                        echo number_format($total) . " " . "VNĐ" ?></td>
                                </tr>
                            <?php
                            $subtotal += $total;
							$qty = $qty + $result['quantity'];
                                }
                            } ?>
                        </table>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 moneyCount"> 
                        <div>
                            Tổng tiền: 
                            <i style="color: red;font-weight: 600;">
                            <span>
                                <?php echo number_format($subtotal,0,'.',' ') ?> VNĐ</i>
                            </span>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</form>
<?php
include('inc/footer.php');

?>