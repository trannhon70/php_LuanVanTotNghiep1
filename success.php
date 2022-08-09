<?php
include('inc/header.php');

?>
<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $customer_id = Session::get('customer_id');
    $insertOrder = $cat->insertOrder($customer_id);

    // //khi đặt hàng thành công sẽ xóa tất cả giỏ hàng của user
    // $delCart = $cat->del_all_data_cart();
    // header('Location:success.php');
}
?>
<style type="text/css">
    .success_order{
        text-align: center;
        color: #228B22;
    }
    p.success_note {
    text-align: center;
    padding: 8px;
    font-size: 17px;
}
</style>
<form action="" method="post">
   
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 p-0 mt-5">
                        <h2 class="success_order mb-5" style="font-size: 35px;">Đặt hàng thành công !</h2>
                        <?php
                        $customer_id = Session::get('customer_id');
                            $get_amount = $cat->getAmountPrice($customer_id);
                            if($get_amount){
                                $amount=0;
                                while($result = $get_amount->fetch_assoc()){
                                    $price = $result['price'];
                                    $amount += $price;
                                }
                            }

                        ?>
                        <p class="success_note">Tổng số tiền mà bạn đã đặt mua sản phẩm của website chúng tôi trong thời gian vừa qua là : <span style="color: #03c467; font-weight: 500;"><?php $vat = $amount * 0.1; 
                            $total = $vat + $amount;
                            echo number_format($total).' VNĐ';
                        ?></span> </p>
                        <p  class="success_note">Xin chân thành cảm ơn quý khách đã tin tưởng mua hàng ở cửa hàng chúng tôi. Xin chúc quý khách có những trải nghiệm thật tốt !</p>
                        <p class="success_note">Chúng tôi sẽ liên lạc với bạn sớm nhất có thể. Bạn có thể xem lại đơn hàng của mình <a href="orderdetails.php" style="color: #883f39;">tại đây</a></p>
                    </div>
                </div>
            </div>
        </div>

   
</form>
<?php
include('inc/footer.php');

?>