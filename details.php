<?php
include('inc/header.php');

?>
<?php
if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {

	//echo "<script>window.location = '404.php'</script>";
} else {
	$id = $_GET['proid'];
}
$customer_id = Session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['campare'])) {
	$productid = $_POST['productid'];
	$insertCompare = $cat->insertCompare($productid, $customer_id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$quantity = $_POST['quantity'];
	$insertCart = $cat->add_to_cart($quantity, $id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {
	$productid = $_POST['productid'];
	$insertWishlist = $cat->insertWishlist($productid, $customer_id);
}
if(isset($_POST['binhluan_submit'])){
	$binhluan_insert = $cat-> insert_binhluan();
}

?>


<div class="main">
    <div class="content">
        <div class="section group">
            <?php
			$get_product_details = $cat->get_details($id);
			if ($get_product_details) {
				while ($result_details = $get_product_details->fetch_assoc()) {

			?>
            <div class="cont-desc span_1_of_2">
                <div class="grid images_3_of_2">
                    <img src="admin/uploads/<?php echo $result_details['hinhanh']; ?>" alt="..." />
                </div>
                <div class="desc span_3_of_2">
                    <div class="css_danhmuc">
                        Danh mục: <span><?php echo $result_details['catName'] ?></span>
                    </div>
                    <div class="css_danhmuc">
                        Thương hiệu: <span><?php echo $result_details['brandName'] ?></span>
                    </div>
                    <div class="css_danhmuc">
                        Tên sản phẩm: <span> <?php echo $result_details['productName'] ?></span>
                    </div>
                    <div class="css_danhmuc">
                        Giá: <span><?php echo number_format($result_details['price']) . " " . "VNĐ" ?></span>
                    </div>
                    <div class="add-cart">
                        <form action="" method="post">
                            <input type="text" readonly="readonly" class="buyfield" name="quantity" value="1" min="1"
                                max="10" />
                            <input type="submit" class="buysubmit" name="submit" value="Thêm vào giỏ hàng" />
                        </form>
                        <?php
								if (isset($AddtoCart)) {
									echo '<span style="color:red; font-site:18px; margin-top:10px; display:block;">Sản phẩm này đã có trong giở hàng của bạn</span>';
								}
								?>
                    </div>
                    <div class="add-cart">
                        <form action="" method="POST">

                            <input type="hidden" class="buysubmit" name="productid"
                                value="<?php echo $result_details['productid'] ?>" />

                            <?php
									$login_check = Session::get('customer_login');
									if ($login_check == true) {
										echo '<input type="submit" class="buysubmit" name="campare" value="So sánh sản phẩm" />';
										echo '<input style="margin-left: 2px;" type="submit" class="buysubmit" name="wishlist" value="Thêm vào danh sách yêu thích" />';
									}
									?>
                            <div style="margin-top: 10px;">
                                <?php
										if (isset($insertCompare)) {
											echo $insertCompare;
										}
										?>
                                <?php
										if (isset($insertWishlist)) {
											echo $insertWishlist;
										}
										?>
                                        <?php
										if (isset($insertCart)) {
											echo $insertCart;
										}
										?>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- mô tả chi tiết sản phẩm -->
                <div class="product-desc">
                    <div class="MoTaChiTiet">Mô tả chi tiết sản phẩm </div>
                    <div class="MoTaChiTiet_content"><?php echo $result_details['product_desc'] ?></div>
                </div>
                <!-- bình luận sản phẩm -->
                <div class="binhluan_container" >
                    <div id="style-1" class="binhluan_scroll" >
                    <div class="show_binhLuan">
                         <div>
                         <?php 
                        if(isset($binhluan_insert)){
                            echo $binhluan_insert;
                        }
                    ?>
                         </div>               
                        <?php 
                        $cat = new category();
                        $get_binhluan = $cat->show_binhluan_UI($id);
                        if($get_binhluan){
                            while($result_binhluan = $get_binhluan->fetch_assoc()){                   
                    ?>
                        <div class="show_binhLuan_noidung">
                            <div class="show_binhLuan_noidung_ten "><?php echo $result_binhluan['tenbinhluan'] ?> <span>đã bình luận: </span>
                            </div>
                            <div class="show_binhLuan_noidung_chitiet"><?php echo $result_binhluan['binhluan'] ?></div>
                        </div> <br/>
                        <?php }
                    } ?>
                    
                    </div>
                    </div>                  
                    <div class="binhluan">                       
                        <form action="" method="post">
                            <input  type="hidden" value="<?php echo $id ?>" name="product_id_binhluan">
                            <input class="binhluan_ten" type="text" placeholder="Tên của bạn" name="tennguoibinhluan">
                            <input class="binhluan_noidung" name="binhluan" rows="5" style="resize: none;" placeholder="Đánh giá của bạn"></input>
                            <input class="binhluan_button" type="submit" name="binhluan_submit" value="Gửi">

                        </form>
                    </div>
                </div>
            </div>
            <?php }
			} ?>
            <div class="rightsidebar span_3_of_1">
                <div class="MoTaChiTiet">Danh mục</div>
                <ul>
                    <?php
					$getall_category = $cat->show_category_fontend();
					if ($getall_category) {
						while ($result_allcat = $getall_category->fetch_assoc()) {
					?>
                    <li>
                        <a
                            href="productbycat.php?catid=<?php echo $result_allcat['catid']; ?>"><?php echo $result_allcat['catName']; ?></a>
                    </li>
                    <?php }
					} ?>
                </ul>

            </div>
            <div class="rightsidebar span_3_of_1">
                <div class="MoTaChiTiet">Tin tức</div>
                <ul>
                    <?php
					$getall_tintuc = $cat->show_tintuc_fontend();
					if ($getall_tintuc) {
						while ($result = $getall_tintuc->fetch_assoc()) {
					?>
                    <li>
                        <a
                            href="showtintuc.php?catid=<?php echo $result['id_cate_post']; ?>"><?php echo $result['title']; ?></a>
                    </li>
                    <?php }
					} ?>
                </ul>

            </div>
        </div>

    </div>
    <?php
	include('inc/footer.php');

	?>