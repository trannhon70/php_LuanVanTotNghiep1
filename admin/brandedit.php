<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>
<?php
if(isset($_GET['brandid']) || $_GET['brandid']==NULL){
    $id = $_GET['brandid'];
}
$brand = new category();
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
//     $insertProduct = $pd->insert_product($_POST, $_FILES);
// }
if($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['submit'])){
    // $brandName = $_POST['brandName'];
    
    $updatebrand = $brand->update_brand($_POST, $_FILES,$id) ;
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Thương hiệu</h2>
               <div class="block copyblock"> 
               <?php
                
                if(isset($updatebrand)){
                    echo $updatebrand;
                }
            ?>
                <?php 
                    $get_brand_name = $brand->getbrandbyId($id);
                    if($get_brand_name){
                        while($result = $get_brand_name->fetch_assoc()){

                      
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['brandName'] ;?>" name="brandName" placeholder="Thêm danh mục sản phẩm..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                        <td>
                            <select id="select" style="text-align: center;" name="category">
                                <option>----------danh mục----------</option>
                                <?php
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if ($catlist) {
                                    while ($result = $catlist->fetch_assoc()) {

                                ?>
                                        <option value="<?php echo $result['catid'] ?>"><?php echo $result['catName'] ?></option>
                                <?php     }
                                } ?>
                            </select>
                        </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Lưu" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php
                      }
                    }
                ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>