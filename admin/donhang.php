<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>
<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/category.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
$cat = new category();
if(isset($_GET['statusid']) ){
    $id = $_GET['statusid'];
	$time = $_GET['time'];
	$customer_id = $_GET['customerId'];
    $updateStatusDH = $cat->updateStatusDH($id,$time,$customer_id);
    $updateStatusOrder = $cat->updateStatusOrder($time,$customer_id);

}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Đơn hàng của khách</h2>
        <div class="block">
            <table style="text-align: center;" class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Số seri</th>
                        <th>Ngày/tháng/năm</th>
                        <th>Thông tin KH</th>
                        <th>Thông tin chi tiết đơn hàng</th>
                        <th>Thao tác</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php 
                $cat= new category();
                    $show_customer = $cat->show_khachhang();
                    $i =0;
                    if($show_customer){
                        while($result = $show_customer->fetch_assoc()){    
                            $i ++;                 
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['time'] ?></td>
                        <td><?php echo $result['date'] ?></td>
                        <td><a href="customer.php?customerid=<?php echo $result['customer_id'] ?>">Xem địa chỉ</a></td>
                        <td><a href="giohangAD.php?donhangid=<?php echo $result['time'] ?>">Xem đơn hàng</a></td>
                        <td>
                            <?php
                                if($result['status']==0){
                            ?>
                            <a href="?statusid=<?php echo $result['id'] ?>&time=<?php echo $result['time'] ?>&customerId=<?php echo $result['customer_id'] ?>">Đơn hàng mới</a>
                            <?php }elseif($result['status']==1){ ?>
                                <?php echo 'Đã xem đơn hàng'; ?>
                            <?php 
                            } elseif($result['status']==2){
                                
                            ?>
                            <a href="">Xóa đơn hàng</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php }
						} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
       
<?php include 'inc/footer.php';?>