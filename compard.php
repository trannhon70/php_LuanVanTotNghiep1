<?php
include('inc/header.php');

?>
<?php 
	$login_check = Session::get('customer_login');
    if ($login_check == false) {
        header('Location:login.php');
    }
?>

<div class="profile">
	<div class="container">
		<div class="row profile__row">
			<div class="col-12 col-md-12 col-lg-12 profile__breadcrumb">
                <a href="index.php" class="breadcrumb__link">Trang chủ</a>
                <span>/</span>
                <a href="compard.php" class="breadcrumb__link active">So sánh</a>
            </div>
		</div>
		<div class="row profile__row">
			<!-- <div class="col-12 col-md-12 col-lg-12 p-0">
				<div class="headingMain">So sánh sản phẩm</div>
			</div> -->
			<div class="col-12 col-md-12 col-lg-12 p-0">
				<?php
					if (isset($update_quantity_cart)) {
						echo $update_quantity_cart;
					}
					?>
				<?php
					if (isset($delcart)) {
						echo $delcart;
					}
				?>
					<table class="tblone">
						<tr>
							<th>Mã sản phẩm</th>
							<th>Tên sản phẩm</th>
							<th>Hình ảnh</th>
							<th>Giá</th>
							<th>Thao tác</th>

						</tr>
						<?php
						// $customer_id = Session::get('customer_id');
						$get_compare = $cat->get_compare($customer_id);
						if($get_compare){
							$i = 0;
							while($result = $get_compare->fetch_assoc()){
								$i++;
						?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['hinhanh'] ?>" alt="" /></td>
								<td><?php echo number_format($result['price']) . " " . "VNĐ" ?></td>

								<td>	
									<a href="details.php?proid=<?php echo $result['productid'] ?>">Xem chi tiết</a>
								</td>
							</tr>
						<?php
							}
						} 
						else {
						?>
							<tr>
								<td colspan="5" style="background-color: #f7f0e8 !important;">
									<img src="images/not-cart.png" style="width: 300px; height: auto; margin-top: 20px;" class="noCart"/>
								</td>
							</tr>
						<?php 
						
						}
						?>

					</table>
			</div>
			<!-- <div class="shopping">
				<div class="shopleft">
					<a class="tieptucMS" href="index.php"> Tiếp tục mua sắm</a>
				</div>
			</div> -->
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php
include('inc/footer.php');

?>