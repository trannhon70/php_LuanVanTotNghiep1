<?php
include('inc/header.php');

?>

<div class="main pt-0">
	<div class="content">
		<!-- <div class="content_top">
			<?php

			if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_product'])) {
				$tukhoa = $_POST['tukhoa'];
				$search_product = $cat->search_product($tukhoa);
			}
			?>
			<div class="heading">
			</div>
			<div class="clear"></div>
		</div> -->
		<div class="section group p-0">
			<div class="container">
				<div class="row breadcrumbMain">
					<div class="col-12 col-md-12 col-lg-12 breadcrumbRow">
						<a href="index.php" class="breadcrumb__link">Trang chủ</a>
						<span>/</span>
						<a href="search.php" class="breadcrumb__link active">Sản phẩm</a>
					</div>
				</div>
				<div class="row">
					<?php

						if ($search_product) {
							while ($result = $search_product->fetch_assoc()) {
						?>
								<div class="col-6 col-md-4 col-lg-3 product__item">
									<div class="product__content">
										<!-- <a href="preview-3.html"><img src="admin/uploads/<?php echo $result['hinhanh']  ?>" height="120px" alt="" /></a>
										<h2><?php echo $result['productName'] ?> </h2>
										<p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p>
										<p><span class="price"><?php echo number_format($result['price']) . " " . "VNĐ" ?></span></p>
										<div class="button"><span><a href="details.php?proid=<?php echo $result['productid'] ?>" class="details">Xem chi tiết</a></span></div> -->
										<a href="#">
											<img src="admin/uploads/<?php echo $result['hinhanh'] ?>" alt="..." height="120px" style="object-fit: scale-down;" />
										</a>
										<h2>
											<?php echo $result['productName'] ?> 
										</h2>
										<!-- <p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p> -->
										<p><span class="price"><?php echo number_format($result['price']) . " " . "VNĐ" ?></span> </p>
										<!-- <div class="button">
											<a href="details.php?proid=<?php echo $result['productid'] ?>" class="details">Chi tiết</a>
										</div> -->
										<div class="content__after">
											<i class="fa-solid fa-bolt-lightning"></i>
										</div>
										<div class="content__before">
											<div class="content__before-wrap">
												<div class="content__text">
													<img src="admin/uploads/<?php echo $result['hinhanh'] ?>" alt="..." height="120px" style="object-fit: scale-down;" />
													<p><?php echo $result['productName']?></p>
												</div>
												<div class="button">
													<a href="details.php?proid=<?php echo $result['productid'] ?>" class="details">Chi tiết</a>
												</div>
											</div>
										</div>
									</div>
								</div>
						<?php }
						} else {
							echo " <span style='color:red;'>Hiện tại sản phẩm này chưa có trong cửa hàng !</span> ";
						} 
					?>
				</div>
			</div>
		</div>



	</div>
</div>
<?php
include('inc/footer.php');

?>