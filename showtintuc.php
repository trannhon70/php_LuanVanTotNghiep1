<?php
	include('inc/header.php');
	
 ?>
<?php 
	if(!isset($_GET['catid']) || $_GET['catid']==NULL){
		echo "<script>window.location='404.php'</script>";
	}else{
		$id = $_GET['catid'];
	}
	
	// if($_SERVER['REQUEST_METHOD'] === 'POST'){
	// 	$catName = $_POST['catName'];
		
	// 	$updateCat = $cat->update_category($catName,$id) ;
	// }
?>
<form action="" method="post">
    <div class="container_tintuc">
        <?php
			 	$namecat = $cat->show_tintuc_fontend_id($id);
				 if($namecat) {
					 while($result = $namecat->fetch_assoc()){
			  ?>
        <div class="container_tintuc_title">
            <h3>Danh mục tin tức : <?php echo $result['title'] ?></h3>
        </div>
        
        <div class="container_tintuc_desc">
			<textarea readonly="readonly" rows="20" id="catDesc" name="catDesc" ><?php echo $result['description'] ?></textarea>
		</div>
        
        <?php }
            } else {
            echo " <span style='color:red;'>Hiện tại chưa có tin tức nào !</span> ";
        } ?>
    </div>
</form>
 
 <?php
	include('inc/footer.php');
	
 ?>
