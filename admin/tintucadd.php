<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>
<?php
    $cat = new category();
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$catName = $_POST['catName'];
		$catDesc = $_POST['catDesc'];
		$catStatus = $_POST['catStatus'];
		
		$insertCat = $cat->insert_post($catName,$catDesc,$catStatus) ;
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm danh mục tin tức</h2>
               <div class="block copyblock"> 
               <?php
                
                if(isset($insertCat)){
                    echo $insertCat;
                }
            ?>
                 <form action="tintucadd.php " method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Thêm danh mục tin tức..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><textarea id="catDesc1" type="text" name="catDesc" placeholder="Mô tả..." class="tynymce" ></textarea></p>
                                <input type="hidden" name="hidden_snippet" id="hidden_snippet" value="" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <select name="catStatus">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>
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



