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
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['binhluan_submit'])){
    $productid = $_POST['product_id_binhluan'];
    $tennguoibinhluan = $_POST['tennguoibinhluan'];
    $binhluan = $_POST['binhluan'];
	$binhluan_insert = $cat-> insert_binhluan($productid, $tennguoibinhluan,$binhluan);
}

?>


<div class="detail">
    <div class="container detail__wrap">
        <div class="row detail__row">
            <?php
                $get_product_details = $cat->get_details($id);
                if ($get_product_details) {
                    while ($result_details = $get_product_details->fetch_assoc()) {
			?>
            <div class="col-12 col-md-12 col-lg-12 detail__breadcrumb">
                <a href="index.php" class="breadcrumb__link">Trang chủ</a>
                <span>/</span>
                <a href="details.php?proid=37" class="breadcrumb__link">Sản phẩm</a>
                <span>/</span>
                <a href="details.php?proid=37" class="breadcrumb__link active"><?php echo $result_details['productName'] ?></a>
            </div>
            <?php }
			} ?>
        </div>
        <div class="row detail__row">
            <?php
			$get_product_details = $cat->get_details($id);
			if ($get_product_details) {
				while ($result_details = $get_product_details->fetch_assoc()) {

			?>
            <div class="col-12 col-md-7 col-lg-8 detail__content">
                <div class="detail__content-wrap">
                    <div class="grid images_3_of_2 content--item">
                        <img src="admin/uploads/<?php echo $result_details['hinhanh']; ?>" alt="..." />
                    </div>
                    <div class="desc span_3_of_2">
                        <div class="css_danhmuc">
                            <h5 class="detail__name"> <?php echo $result_details['productName'] ?></h5>
                        </div>
                        <div class="css_danhmuc">
                            <p>Thương hiệu: </p> <span><?php echo $result_details['brandName'] ?></span>
                        </div>
                        <div class="css_danhmuc price">
                            <span class="detail__price"><?php echo number_format($result_details['price']) . " " . "VNĐ" ?></span>
                        </div>
                        <div class="css_danhmuc">
                            <p>Số lượng: </p> <span ><?php echo number_format($result_details['soluong']) ?></span>
                        </div>
                        <div class="add-cart">
                            <form action="" method="POST">

                                <input type="hidden" class="buysubmit" name="productid"
                                    value="<?php echo $result_details['productid'] ?>" />

                                <?php
                                        $login_check = Session::get('customer_login');
                                        if ($login_check == true) {
                                            echo '<button type="submit" class="buysubmit sosanh" name="campare">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                                <span>So sánh</span>
                                            </button>';
                                            echo '<button type="submit" class="buysubmit yeuthich" name="wishlist">
                                                <i class="fa-solid fa-heart"></i>
                                                <span>Thêm vào danh sách yêu thích</span>
                                            </button>';
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
                        <div class="add-cart" style="margin-top: 20px;">
                            <form action="" method="post">
                                <input type="text" readonly="readonly" class="buyfield" name="quantity" value="1" min="1"
                                    max="10" />
                                    <?php 
                                        if($result_details['soluong'] == 0){
                                            echo '<span style="color:red;">Hiện tại sản phẩm này đã hết hàng</span>';
                                        }else{
                                            echo '<button type="submit" class="buysubmit" name="submit">
                                                <i class="fa-solid fa-plus"></i>
                                                <span>Thêm vào giỏ hàng</span>
                                            </button>';
                                        }
                                    ?>
                                
                            </form>
                            <?php
                                    if (isset($AddtoCart)) {
                                        echo '<span style="color:red; font-site:18px; margin-top:10px; display:block;">Sản phẩm này đã có trong giỏ hàng của bạn</span>';
                                    }
                                    ?>
                        </div>
                    </div>
                    <!-- mô tả chi tiết sản phẩm -->
                    <div class="product-desc">
                        <div class="MoTaChiTiet headingMain">Mô tả chi tiết sản phẩm </div>
                        <div class="MoTaChiTiet_content"><?php echo $result_details['product_desc'] ?></div>
                    </div>
                    <!-- bình luận sản phẩm -->
                    <div class="binhluan_container" >
                        <div class="binhluan_heading headingMain">Bình luận</div>
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
                                    <div class="show_binhLuan_noidung_ten">
                                        <div class="ten__icon">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                        <span><?php echo $result_binhluan['tenbinhluan'] ?></span>
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
            </div>
            <?php }
			} ?>
            <div class="col-12 col-md-5 col-lg-4 detail__content">
                <div class="detail__content-wrap">
                    <div class="danhMuc MoTaChiTiet headingMain">Danh mục</div>
                    <ul class="danhMuc--list">
                        <?php
                        $getall_category = $cat->show_category_fontend();
                        if ($getall_category) {
                            while ($result_allcat = $getall_category->fetch_assoc()) {
                        ?>
                        <li class="danhMuc--item">
                            <a
                                href="productbycat.php?catid=<?php echo $result_allcat['catid']; ?>">
                                <i class="fa-solid <?php echo $result_allcat['icon']?>"></i>
                                <span><?php echo $result_allcat['catName']; ?></span>
                            </a>
                        </li>
                        <?php }
                        } ?>
                    </ul>
                </div>
            </div>
            <!-- <div class="col-12 col-md-12 col-lg-12 detail__content">
                <div class="detail__content-wrap">
                    <div class="MoTaChiTiet headingMain">Tin tức</div>
                    <div>
                        Chưa có tin tức 
                    </div>
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
            </div> -->
        </div>

    </div>
    <?php
	include('inc/footer.php');

	?>