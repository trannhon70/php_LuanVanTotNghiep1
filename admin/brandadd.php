<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>
<?php
$brand = new category();
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
		
		$insertbrand = $brand->insert_brand($_POST, $_FILES) ;
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Thương hiệu</h2>
               <div class="block copyblock"> 
               <?php
                
                if(isset($insertbrand)){
                    echo $insertbrand;
                }
            ?>
                 <form action="brandadd.php " method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Thêm thương hiệu sản phẩm..." class="medium" />
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
                                <input type="submit" name="submit" Value="Thêm" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>