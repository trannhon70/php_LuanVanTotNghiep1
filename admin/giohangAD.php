<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>
<?php
if(!isset($_GET['donhangid']) || $_GET['donhangid']==NULL){
    echo "<script>window.location = 'donhang.php'</script>";
}
else{
    $id = $_GET['donhangid'];
}
$cat = new category();

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sản phẩm của khách hàng</h2>
        <div class="block">
            <table style="text-align: center;" class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th style="width:5%">STT</th>
                        <th style="width:15%">Tên SP</th>
                        <th style="width:15%">Hình ảnh</th>
                        <th style="width:10%">Số lượng</th>
                        <th style="width:25%">Giá</th>
                        <th style="width:30%">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $cat= new category();
                    $show_customer = $cat->show_donhang_AD($id);
                    $i =0;
                    $subtotal = 0;
					$qty = 0;
                    if($show_customer){
                        while($result = $show_customer->fetch_assoc()){
                            $i++;     
                ?>
                    <tr class="odd gradeX">
                        <td style="width:5%"><?php echo $i?></td>
                        <td style="width:15%"><?php echo $result['productName'] ?></td>
                        <td style="width:15%"><img style="width: 60px;height: 60px;object-fit: scale-down;" src="../admin/uploads/<?php echo $result['hinhanh'] ?>" alt=""></td>
                        <td style="width:10%"><?php echo $result['quantity'] ?></td>
                        <td style="width:25%"><?php echo  number_format($result['price'],0,'.',' ') ?> VNĐ</td>
                        <td style="width:30%"><?php 
                            $total = $result['price'] * $result['quantity'];
                            echo number_format($total,0,'.',' ') 
                        ?> VNĐ</td> 
                        
                    </tr>
                    <?php $subtotal += $total;
							$qty = $qty + $result['quantity'];
                    }
						} ?>
                </tbody>
            </table>
            <div style="padding: 21px 10px;text-align: center;font-size: 20px;">Tổng số tiền khách hàng phải trả cho <span style="color: red;font-weight: 600;"><?php echo $qty ?></span> sản phẩm là : <i style="color: red;font-weight: 600;"><?php echo number_format($subtotal,0,'.',' ') ?> VNĐ</i></div>
        </div>
    </div>
</div>
       
<?php include 'inc/footer.php';?>