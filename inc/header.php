<?php

include 'lib/session.php';
Session::init();
ob_start();
?>
<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';

spl_autoload_register(function ($className) {
	include_once "classes/" . $className . ".php";
});
$db = new Database();
$fm = new Format();
$cat = new category();

?>
<?php
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>

<head>
    <title>web bán thiết bị điện tử</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/menu1.css" rel="stylesheet" type="text/css" media="all" />
    <!-- <link href="css/footer.css" rel="stylesheet" type="text/css" media="all" /> -->
    <link href="css/cssThem.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/index.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquerymain.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Fira+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&family=Lora:ital,wght@1,400;1,500;1,600&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script type="text/javascript">
    $(document).ready(function($) {
        $('#dc_mega-menu-orange').dcMegaMenu({
            rowItems: '4',
            speed: 'fast',
            effect: 'fade'
        });
    });
    </script>
</head>

<body>
    <div class="header_top" style="background-color: #f7f0e8;">
        <div class="header_top-wrap" style="display: flex;">
            <div class="logo" style="flex: 1; display: flex; justify-content: center;">
                <a href="index.php"><img src="images/logoMain.png" alt="" /></a>
            </div>
            <div class="menu" id="menuMain" style="flex: 3; display: flex; align-items: center;">
                <ul id="dc_mega-menu-orange" class="dc_mm-orange">
                    <li><a href="index.php">Trang chủ</a></li>

                    <?php
                        $check_cart = $cat->check_cart();
                        if ($check_cart == true) {
                            echo '<li><a href="cart.php">Giỏ hàng</a></li>';
                        } else {
                            echo '';
                        }
                        ?>

                    <?php
                        $login_check = Session::get('customer_login');
                        if ($login_check == false) {
                            echo '';
                        } else {
                            echo '<li><a  href="profile.php">Profile </a></li>';
                        }
                        ?>

                    <?php
                        $login_check = Session::get('customer_login');
                        if ($login_check == true) {
                            echo '<li><a href="compard.php">So sánh</a> </li>';
                        }
                        ?>
                    <?php
                        $login_check = Session::get('customer_login');
                        if ($login_check == true) {
                            echo '<li><a href="wishlist.php">Yêu thích</a> </li>';
                        }
                        ?>
                    <?php
                        $customer_id = Session::get('customer_id');
                        $check_order = $cat->check_order($customer_id);
                        if ($check_order == true) {
                            echo '<li><a href="orderTong.php">Đơn hàng</a></li>';
                        } else {
                            echo '';
                        }
                        ?>
                    <div class="clear"></div>
                </ul>
            </div>
        </div>
        <div class="header_top_right">
            <div class="search_box">
                <form action="search.php" method="post" class="search_form">
                    <input type="text" placeholder="Tìm kiếm sản phẩm " name="tukhoa">
                    <!-- <input type="submit" name="search_product" value="&#xf687;"> -->
                    <button type="submit" name="search_product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

            <div class="shopping_cart" style=" margin-left: 0px;">
                <div class="cart">
                    <a href="cart.php" title="View my shopping cart" rel="nofollow">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <!-- <span class="cart_title">Giỏ hàng</span> -->
                        <span class="no_product" style="color: red;">
                            <?php
								$check_cart = $cat->check_cart();
								if ($check_cart) {
									// $sum = Session::get("sum");
									$qty = Session::get("qty");
									// echo $qty . ' sản phẩm';
									echo $qty . ' sản phẩm';
								} else {
									echo "Giỏ hàng trống";
								}

								?>
                        </span>
                    </a>
                </div>
            </div>
            <?php
				if (isset($_GET['customer_id'])) {
					$customer_id = $_GET['customer_id'];
					//$delCart = $cat->del_all_data_cart();
					$delCompare = $cat->del_all_delCompare($customer_id);
					Session::destroy();
				}
				?>
            <div class="login" style=" margin-left: 0px; font-size:10px">
                <?php
					$login_check = Session::get('customer_login');
					if ($login_check == false) {
						echo '<a  href="login.php">
                            <span>
                                Đăng nhập
                            </span>
                        </a></div>';
					} else {
						echo '<a  href="?customer_id=' . Session::get("customer_id") . '">
                            <span>
                                Đăng xuất
                            </span>
                        </a></div>';
					}
					?>

                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
