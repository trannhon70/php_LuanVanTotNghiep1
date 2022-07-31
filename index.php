<?php
include('inc/header.php');
include('inc/slider.php');
?>

<div class="main" style="margin-bottom: 30px;">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Sản phẩm bán chạy</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$product_feathered = $cat->getproduct_feathered();
			if ($product_feathered) {
				while ($result = $product_feathered->fetch_assoc()) {
			?>
					<div class="grid_1_of_4 images_1_of_4" style="width:23.8%;">
						<a href="#"><img src="admin/uploads/<?php echo $result['hinhanh'] ?>" alt="..." height="120px" style="object-fit: scale-down;" /></a>
						<h2><?php echo $result['productName'] ?> </h2>
						<!-- <p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p> -->
						<p><span class="price"><?php echo number_format($result['price']) . " " . "VNĐ" ?></span> </p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productid'] ?>" class="details">Chi tiết</a></span></div>
					</div>
			<?php }
			} ?>
			
		</div>
		
		<div class="content_bottom">
			<div class="heading">
				<h3>Sản phẩm mới nhất</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$product_new = $cat->getproduct_new();
			if ($product_feathered) {
				while ($result_new = $product_new->fetch_assoc()) {
			?>
					<div class="grid_1_of_4 images_1_of_4" style="width:23.8%; ">
						<a href="#"><img style="object-fit: scale-down;" src="admin/uploads/<?php echo $result_new['hinhanh'] ?>" alt="..." height="100%" /></a>
						<h2><?php echo $result_new['productName'] ?> </h2>
						<!-- <p><?php echo $fm->textShorten($result_new['product_desc'], 50) ?></p> -->
						<p><span class="price"><?php echo number_format($result_new['price']) . " " . "VNĐ" ?></span> </p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result_new['productid'] ?>" class="details"> Chit tiết</a></span></div>
					</div>
			<?php }
			} ?>
		</div>
		<div class="phanTrang" >
			<?php
			$get_all_product = $cat->get_all_product();
			$product_count = mysqli_num_rows($get_all_product);
			$product_button = ceil($product_count / 8);
			$i = 1;
			echo '<p style="color:red;" class="p">Trang : </p>';
			for ($i = 1; $i <= $product_button; $i++) {
				echo '<a class="btn-success" href="index.php?trang=' . $i . '">' . $i . ' </a>';
			}
			?>
		</div>
	</div>
</div>
<style type="text/css">
	

	

	
</style>
<?php
include('inc/footer.php');

?>