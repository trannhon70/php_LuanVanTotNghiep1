<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>
<?php
if(isset($_GET['catid']) || $_GET['catid']==NULL){
    $id = $_GET['catid'];
}
    $cat = new category();
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$catName = $_POST['catName'];
		$catDesc = $_POST['catDesc'];
		$catStatus = $_POST['catStatus'];
		
		$insertCat = $cat->update_post($catName,$catDesc,$catStatus,$id) ;
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục tin tức</h2>
               <div class="block copyblock"> 
               <?php
                
                if(isset($insertCat)){
                    echo $insertCat;
                }
            ?>
                <?php 
                    $get_cat_name = $cat->getcatbyId_post($id);
                    if($get_cat_name){
                        while($result = $get_cat_name->fetch_assoc()){

                      
                ?>
                 <form  action="" method="post" >
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['title'] ;?>" name="catName" placeholder="Thêm danh mục tin tức..."  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <p><textarea id="catDesc1" type="text" name="catDesc" ><?php echo $result['description'];?></textarea></p>
                            <input type="hidden" name="hidden_snippet" id="hidden_snippet" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name="catStatus">
                                <?php
                                        if ($result['status'] == 1) {


                                        ?>
                                            <option selected value="1">ẩn</option>
                                            <option value="0">hiển thị</option>
                                        <?php } else { ?>
                                            <option selected value="1">ẩn</option>
                                            <option selected value="0">hiển thị</option>
                                        <?php } ?>
                                
                                </select>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Sửa" />
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