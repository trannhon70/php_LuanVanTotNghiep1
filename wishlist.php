<?php
include('inc/header.php');

?>
<?php
	$login_check = Session::get('customer_login');
    if ($login_check == false) {
        header('Location:login.php');
    }
    if(isset($_GET['proid'])){
        $customer_id = Session::get('customer_id');
        $proid = $_GET['proid'];
        $delwlist = $cat->del_wlist($proid,$customer_id);
    }
?>

<div class="profile">
	<div class="container">
		<div class="row profile__row">
            <div class="col-12 col-md-12 col-lg-12 profile__breadcrumb">
                <a href="index.php" class="breadcrumb__link">Trang chủ</a>
                <span>/</span>
                <a href="profile.php" class="breadcrumb__link active">Sản phẩm yêu thích</a>
            </div>
        </div>
		<div class="row">
			<div class="col-12 col-md-12 col-lg-12 p-0">
				
				<!-- <div class="headingMain">
					Sản phẩm yêu thích
				</div> -->
				
				<table class="tblone">
					<tr>
						<th width="">Mã sản phẩm</th>
						<th width="">Tên sản phẩm</th>
						<th width="">Hình ảnh</th>
						<th width="">Giá</th>
						<th>Thao tác</th>

					</tr>
					<?php
					 $customer_id = Session::get('customer_id');
					$get_wishlist = $cat->get_wishlist($customer_id);
					if($get_wishlist){
						$i = 0;
						while($result = $get_wishlist->fetch_assoc()){
							$i++;
					?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['hinhanh'] ?>" alt="" /></td>
								<td><?php echo number_format($result['price']) . " " . "VNĐ" ?></td>

								<td>
                                    <a  href="?proid=<?php echo $result['productid'] ?>">Xóa</a> |
                                    <a  href="details.php?proid=<?php echo $result['productid'] ?>">Xem chi tiết</a>
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