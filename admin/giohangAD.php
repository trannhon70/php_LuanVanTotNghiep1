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
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID_KH</th>
                        <th>Số seri</th>
                        <th>Thông tin KH</th>
                        <th>Đơn hàng</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                <?php 
                $cat= new category();
                    $show_customer = $cat->show_donhang_AD($id);
                    if($show_customer){
                        while($result = $show_customer->fetch_assoc()){

                      
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $result['productName'] ?></td>
                       
                    </tr>
                    <?php }
						} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
       
<?php include 'inc/footer.php';?>