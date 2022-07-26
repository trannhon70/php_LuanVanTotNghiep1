-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 23, 2022 lúc 01:46 PM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminid`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'nhon', 'nhon@gmail.com', 'nhonadmin', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_binhluan`
--

DROP TABLE IF EXISTS `tbl_binhluan`;
CREATE TABLE IF NOT EXISTS `tbl_binhluan` (
  `binhluan_id` int(11) NOT NULL AUTO_INCREMENT,
  `tenbinhluan` varchar(255) NOT NULL,
  `binhluan` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `tinhTrang` int(11) NOT NULL,
  PRIMARY KEY (`binhluan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_binhluan`
--

INSERT INTO `tbl_binhluan` (`binhluan_id`, `tenbinhluan`, `binhluan`, `product_id`, `tinhTrang`) VALUES
(62, 'aloo', 'Ä‘áº¹p quÃ¡ shop Æ¡i', 35, 1),
(60, 'aloo', 'cÃ³ giáº£m giÃ¡ khÃ´ng shop', 32, 1),
(63, 'aloo', 'Ä‘áº¹p quÃ¡ shop Æ¡i', 35, 0),
(58, 'aloo', 'sáº£n pháº©m quÃ¡ tá»‘t ', 32, 1),
(64, 'hi', 'quÃ¡ tuyá»‡t vá»i báº¡n Æ¡i', 36, 1),
(70, 'aloo', 'alooo', 36, 0),
(66, 'chao', 'cÃ³ sáº£n pháº©m nÃ o má»›i ná»¯a khÃ´ng shop', 36, 1),
(68, 'chao ', 'sadasd', 36, 0),
(69, 'aloo', 'alooo', 36, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brand_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `catid`, `brandName`) VALUES
(18, 19, 'Apple / iphone'),
(19, 19, 'Samsung'),
(20, 19, 'Xiaomi'),
(21, 19, 'Oppo'),
(22, 19, 'Realme'),
(23, 19, 'Nokia');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cartid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `hinhanh` varchar(200) NOT NULL,
  PRIMARY KEY (`cartid`)
) ENGINE=MyISAM AUTO_INCREMENT=217 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `catid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catid`, `catName`) VALUES
(19, 'Äiá»‡n thoáº¡i'),
(20, 'Laptop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_post`
--

DROP TABLE IF EXISTS `tbl_category_post`;
CREATE TABLE IF NOT EXISTS `tbl_category_post` (
  `id_cate_post` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_cate_post`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_compare`
--

DROP TABLE IF EXISTS `tbl_compare`;
CREATE TABLE IF NOT EXISTS `tbl_compare` (
  `compare_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `hinhanh` varchar(1000) NOT NULL,
  PRIMARY KEY (`compare_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(9, 'Tráº§n XuÃ¢n NhÆ¡n', 'áº¥p 5, xÃ£ Äá»©c HÃ²a ÄÃ´ng, Äá»©c HÃ²a', 'Long An', 'Viá»‡t Nam', '50000', '098080808', 'kevintran351996@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

DROP TABLE IF EXISTS `tbl_donhang`;
CREATE TABLE IF NOT EXISTS `tbl_donhang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `status` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id`, `customer_id`, `time`, `status`, `date`) VALUES
(19, 9, 1658583286, 0, '2022-07-23 13:36:41'),
(20, 9, 1658583415, 0, '2022-07-23 13:36:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `hinhanh` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productid`, `productName`, `customer_id`, `quantity`, `price`, `hinhanh`, `status`, `date_order`) VALUES
(117, 36, 'Iphone 10', 9, 1, '569000', '22a585c12d.jpg', 0, 1658583286),
(116, 31, 'Samsung Note 9', 9, 2, '9180000', '6a95b39aeb.jpg', 0, 1658583286),
(115, 31, 'Samsung Note 9', 15, 1, '4590000', '6a95b39aeb.jpg', 0, 1658582611),
(118, 31, 'Samsung Note 9', 9, 1, '4590000', '6a95b39aeb.jpg', 0, 1658583415);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `productName` tinytext NOT NULL,
  `catid` int(11) UNSIGNED NOT NULL,
  `brand_id` int(11) UNSIGNED NOT NULL,
  `product_desc` text NOT NULL,
  `type1` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `hinhanh` varchar(1000) NOT NULL,
  PRIMARY KEY (`productid`),
  KEY `catid` (`catid`,`brand_id`),
  KEY `product_brand_FK` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productid`, `productName`, `catid`, `brand_id`, `product_desc`, `type1`, `price`, `hinhanh`) VALUES
(27, 'Iphone 12', 19, 18, '<p><span style=\"font-size: x-small;\">Tháº¿ há»‡&nbsp;iPhone 12&nbsp;má»›i trong nÄƒm 2020 sáº½ c&oacute; c&aacute;c báº£n cáº­p nháº­t lá»›n.&nbsp;Äiá»‡n thoáº¡i&nbsp;sáº½ c&oacute; bá»‘n phi&ecirc;n báº£n iPhone 12 mini , 12 , 12 Pro v&agrave; 12 Pro Max. C&aacute;c thiáº¿t bá»‹ sáº½ c&oacute; m&agrave;n h&igrave;nh OLED vá»›i t&iacute;nh nÄƒng 5G má»›i.</span></p>\r\n<p>Ä&aacute;ng ch&uacute; &yacute; hÆ¡n, iPhone 12 (2020) Ä‘Æ°á»£c cho l&agrave; sáº½ c&oacute; m&agrave;n h&igrave;nh c&oacute; tá»‘c Ä‘á»™ l&agrave;m má»›i 60Hz v&agrave; 120Hz c&oacute; thá»ƒ chuyá»ƒn Ä‘á»•i. Ä&acirc;y l&agrave; sá»± cáº£i tiáº¿n vÆ°á»£t báº­c cá»§a Apple trong nÄƒm tá»›i. á»ž tháº¿ há»‡ iPhone vá»«a qua, trong khi c&aacute;c Ä‘á»‘i thá»§ Ä‘&atilde; c&oacute; trang bá»‹ m&agrave;n h&igrave;nh 120Hz cho c&aacute;c thiáº¿t bá»‹ cá»§a há» th&igrave; T&aacute;o Khuyáº¿t váº«n chÆ°a c&oacute; Ä‘á»™ng th&aacute;i g&igrave;. Trong nÄƒm tá»›i, hi vá»ng Apple sáº½ trang bá»‹ m&agrave;n h&igrave;nh n&agrave;y cho iPhone 12mini .</p>\r\n<p><img src=\"https://file.hstatic.net/1000370129/file/120005844_3357511471002581_905127087074637669_n_f1a6445fb62442be81aba4e1f3f51a20.jpg\" alt=\"\" width=\"507\" height=\"300\" /></p>\r\n<p><span>Apple sáº½ sá»­ dá»¥ng chipset Apple A14 Bionic vá»›i tiáº¿n tr&igrave;nh 5nm má»›i nháº¥t tr&ecirc;n d&ograve;ng iPhone 12 (2020) cá»§a m&igrave;nh. Qu&aacute; tr&igrave;nh 5nm sáº½ táº¡o ra c&aacute;c con chip nhá» hÆ¡n, nhanh hÆ¡n v&agrave; tiáº¿t kiá»‡m pin hÆ¡n. Hai phi&ecirc;n báº£n cao cáº¥p nháº¥t,&nbsp;iPhone 12 Pro v&agrave; iPhone 12 Pro Max Ä‘á»u Ä‘Æ°á»£c trang bá»‹ m&aacute;y qu&eacute;t LiDAR má»›i vá»›i nhiá»u Æ°u Ä‘iá»ƒm vÆ°á»£t trá»™i</span></p>\r\n<h3><span>Camera iPhone 12 Pro sáº½ Ä‘Æ°á»£c n&acirc;ng cáº¥p chá»¥p áº£nh Ä‘&ecirc;m Ä‘áº¹p áº¥n tÆ°á»£ng</span></h3>\r\n<p><span>Theo nhÆ° dá»± kiáº¿n, iPhone 12 Series sáº½ ra máº¯t v&agrave;o khoáº£ng th&aacute;ng 10, há»©a háº¹n mang Ä‘áº¿n há»‡ thá»‘ng camera chá»¥p áº£nh Ä‘&ecirc;m cá»±c Ä‘áº¹p, áº¥n tÆ°á»£ng. Ä&acirc;y cÅ©ng l&agrave; Ä‘iá»u m&agrave; c&aacute;c iFan mong chá» tá»« l&acirc;u. H&atilde;y c&ugrave;ng&nbsp;<strong><span><a href=\"https://digiphone.vn/\">digiphone</a></span></strong>&nbsp;t&igrave;m hiá»ƒu nh&eacute; !</span><br /><span>Li&ecirc;n tiáº¿p ráº¥t nhiá»u tin Ä‘á»“n vá» iPhone 12 xuáº¥t hiá»‡n d&agrave;y Ä‘áº·t tr&ecirc;n c&aacute;c máº·t b&aacute;o trÆ°á»›c thá»m ra máº¯t, d&ugrave; l&agrave; tin Ä‘á»“n chÆ°a Ä‘Æ°á»£c x&aacute;c thá»±c nhÆ°ng váº«n khiáº¿n c&aacute;c iFan h&aacute;o há»©c. ÄÆ°á»£c gá»£i &yacute; bá»Ÿi Jon Prosser, giá» Ä‘&acirc;y ch&uacute;ng ta cÅ©ng c&oacute; má»™t c&aacute;i nh&igrave;n vá» má»™t loáº¡t c&aacute;c t&iacute;nh nÄƒng m&aacute;y áº£nh má»›i m&agrave; Apple Ä‘&atilde; ph&aacute;t triá»ƒn cho d&ograve;ng iPhone 12 Pro.</span></p>', 0, '1799000', 'ef69ed923c.jpg'),
(28, 'Iphone 13', 19, 18, '<p dir=\"ltr\"><span><span><span>Giá»‘ng nhÆ° lá»i Ä‘á»“n, si&ecirc;u pháº©m sá»Ÿ há»¯u ng&ocirc;n ngá»¯ thiáº¿t káº¿ tÆ°Æ¡ng tá»± nhÆ° iPhone 12 - thiáº¿t káº¿&nbsp;bo viá»n vu&ocirc;ng sang trá»ng. Äáº·c biá»‡t, d&ograve;ng Ä‘iá»‡n thoáº¡i n&agrave;y sáº½ c&oacute; th&ecirc;m m&agrave;u sáº¯c má»›i&nbsp;-&nbsp;ch&iacute;nh l&agrave; m&agrave;u há»“ng nháº¹ nh&agrave;ng ná»¯ t&iacute;nh. Ngo&agrave;i ra c&aacute;c m&agrave;u cÆ¡ báº£n nhÆ°: Ä‘en, tráº¯ng, xanh, Ä‘á» váº«n Ä‘Æ°á»£c duy tr&igrave;.</span></span></span></p>\r\n<p dir=\"ltr\"><span><span><span>iP13 512GB c&oacute; pháº§n th&acirc;n m&aacute;y l&agrave;m báº±ng kim loáº¡i, káº¿t há»£p c&ugrave;ng k&iacute;nh cÆ°á»ng lá»±c máº¡nh máº½. C&aacute;c g&oacute;c cáº¡nh cá»§a m&aacute;y Ä‘Æ°á»£c bo láº¡i vu&ocirc;ng váº¯n. Nhá» váº­y, thiáº¿t bá»‹ sá»Ÿ há»¯u n&eacute;t hiá»‡n Ä‘áº¡i nÄƒng Ä‘á»™ng&nbsp;nhÆ°ng váº«n cá»±c ká»³ tinh táº¿, dá»… cáº§m náº¯m. iPhone 13 cÅ©ng tÆ°Æ¡ng tá»± nhÆ° nhá»¯ng&nbsp;anh em c&ugrave;ng d&ograve;ng, Ä‘áº¡t Ä‘Æ°á»£c chá»‰ sá»‘&nbsp;báº£o vá»‡ IP68 c&oacute; chá»©c nÄƒng kh&aacute;ng nÆ°á»›c, kh&aacute;ng bá»¥i v&agrave; chá»‘ng xÆ°á»›c.</span></span></span></p>\r\n<p dir=\"ltr\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/223602/Slider/RV-iphone-13-1020x570.jpg\" alt=\"\" width=\"700\" height=\"391\" /></p>\r\n<h2 dir=\"ltr\"><span><span><span><span>M&agrave;n h&igrave;nh cáº£i tiáº¿n</span></span></span></span></h2>\r\n<p dir=\"ltr\"><span><span><span>Apple váº«n tiáº¿p tá»¥c sá»­ dá»¥ng táº¥m ná»n Super Retina XDR, c&oacute; k&iacute;ch thÆ°á»›c 6.1 inch v&agrave; tá»‘c Ä‘á»™ l&agrave;m má»›i l&agrave; 60Hz.&nbsp;M&agrave;n h&igrave;nh m&aacute;y c&oacute; Ä‘á»™ s&aacute;ng Ä‘áº¡t&nbsp;800 nits khi hoáº¡t Ä‘á»™ng ngo&agrave;i trá»i, Ä‘á»™ s&aacute;ng HDR tá»‘i Ä‘a 1.200 nits. Ngo&agrave;i ra c&aacute;c chá»©c nÄƒng nhÆ° Dolby Vision, HDR10 v&agrave; HLG cÅ©ng Ä‘Æ°á»£c há»— trá»£ tr&ecirc;n chiáº¿c iPhone n&agrave;y.</span></span></span></p>\r\n<p dir=\"ltr\"><span><span><span>B&ecirc;n cáº¡nh Ä‘&oacute;,&nbsp;Ä‘á»ƒ tÄƒng th&ecirc;m diá»‡n t&iacute;ch hiá»ƒn thá»‹ cho thiáº¿t bá»‹, pháº§n &ldquo;tai thá»\" tr&ecirc;n iPhone 13 cÅ©ng Ä‘Æ°á»£c giáº£m Ä‘i 20%. Äá»™ s&aacute;ng m&agrave;n h&igrave;nh th&igrave; tÄƒng&nbsp;hÆ¡n tá»›i 28% so vá»›i iPhone 12.</span></span></span></p>', 1, '2499000', 'e34e0bd25d.png'),
(30, 'Samsung Note 10 ', 19, 19, '<p>Æ¯á»›c t&iacute;nh dá»±a tr&ecirc;n há»“ sÆ¡ sá»­ dá»¥ng cá»§a ngÆ°á»i d&ugrave;ng trung b&igrave;nh/Ä‘iá»ƒn h&igrave;nh. ÄÆ°á»£c Ä‘&aacute;nh gi&aacute; Ä‘á»™c láº­p bá»Ÿi Strategy Analytics tá»« ng&agrave;y 8 th&aacute;ng 12 Ä‘áº¿n 20 th&aacute;ng 12 nÄƒm 2021 táº¡i Hoa Ká»³ v&agrave; VÆ°Æ¡ng quá»‘c Anh vá»›i c&aacute;c phi&ecirc;n báº£n tiá»n ph&aacute;t h&agrave;nh SM-S901, SM-S906, SM-S908 theo c&agrave;i Ä‘áº·t máº·c Ä‘á»‹nh sá»­ dá»¥ng c&aacute;c máº¡ng 5G Sub6 (KH&Ocirc;NG Ä‘Æ°á»£c thá»­ nghiá»‡m vá»›i máº¡ng 5G mmWave). Thá»i lÆ°á»£ng pin thá»±c táº¿ thay Ä‘á»•i t&ugrave;y theo m&ocirc;i trÆ°á»ng máº¡ng, c&aacute;c t&iacute;nh nÄƒng v&agrave; á»©ng dá»¥ng Ä‘Æ°á»£c sá»­ dá»¥ng, táº§n suáº¥t c&aacute;c cuá»™c gá»i v&agrave; tin nháº¯n, sá»‘ láº§n sáº¡c v&agrave; nhiá»u yáº¿u tá»‘ kh&aacute;c.</p>\r\n<p>* T&iacute;nh nÄƒng ch&iacute;nh c&oacute; thá»ƒ kh&aacute;c vá»›i Th&ocirc;ng sá»‘ ká»¹ thuáº­t ch&iacute;nh.</p>\r\n<p>* Pin : Thá»i lÆ°á»£ng pin thá»±c táº¿ thay Ä‘á»•i t&ugrave;y thuá»™c v&agrave;o m&ocirc;i trÆ°á»ng máº¡ng, c&aacute;c t&iacute;nh nÄƒng v&agrave; á»©ng dá»¥ng Ä‘Æ°á»£c d&ugrave;ng, táº§n suáº¥t cuá»™c gá»i v&agrave; tin nháº¯n, sá»‘ láº§n sáº¡c v&agrave; nhiá»u yáº¿u tá»‘ kh&aacute;c.</p>\r\n<p>* Bá»™ nhá»› ngÆ°á»i d&ugrave;ng kháº£ dá»¥ng : Bá»™ nhá»› ngÆ°á»i d&ugrave;ng nhá» hÆ¡n tá»•ng bá»™ nhá»› do bá»™ nhá»› cá»§a há»‡ Ä‘iá»u h&agrave;nh v&agrave; pháº§n má»m Ä‘Æ°á»£c sá»­ dá»¥ng Ä‘á»ƒ cháº¡y c&aacute;c t&iacute;nh nÄƒng cá»§a thiáº¿t bá»‹. Bá»™ nhá»› ngÆ°á»i d&ugrave;ng thá»±c táº¿ thay Ä‘á»•i t&ugrave;y thuá»™c v&agrave;o nh&agrave; máº¡ng v&agrave; c&oacute; thá»ƒ thay Ä‘á»•i sau khi thá»±c hiá»‡n n&acirc;ng cáº¥p pháº§n má»m.</p>\r\n<p>* Máº¡ng : C&aacute;c bÄƒng th&ocirc;ng m&agrave; thiáº¿t bá»‹ há»— trá»£ c&oacute; thá»ƒ thay Ä‘á»•i t&ugrave;y thuá»™c v&agrave;o khu vá»±c hoáº·c nh&agrave; cung cáº¥p dá»‹ch vá»¥.</p>\r\n<p>* K&iacute;ch thÆ°á»›c m&agrave;n h&igrave;nh: ÄÆ°á»£c Ä‘o theo Ä‘Æ°á»ng ch&eacute;o, k&iacute;ch thÆ°á»›c m&agrave;n h&igrave;nh cá»§a Galaxy S22 l&agrave; 6,1 \"trong h&igrave;nh chá»¯ nháº­t Ä‘áº§y Ä‘á»§ v&agrave; 5,9\" cho c&aacute;c g&oacute;c tr&ograve;n, k&iacute;ch thÆ°á»›c m&agrave;n h&igrave;nh cá»§a Galaxy S22 + l&agrave; 6,6 \"trong h&igrave;nh chá»¯ nháº­t Ä‘áº§y Ä‘á»§ v&agrave; 6,4\" cho c&aacute;c g&oacute;c tr&ograve;n v&agrave; Galaxy S22 K&iacute;ch thÆ°á»›c m&agrave;n h&igrave;nh cá»§a Ultra l&agrave; 6,8 \"trong h&igrave;nh chá»¯ nháº­t Ä‘áº§y Ä‘á»§ v&agrave; 6,8\" cho c&aacute;c g&oacute;c bo tr&ograve;n; Diá»‡n t&iacute;ch xem thá»±c táº¿ c&oacute; thá»ƒ &iacute;t hÆ¡n do c&aacute;c g&oacute;c bo tr&ograve;n v&agrave; lá»— camera.</p>\r\n<p>* Dung lÆ°á»£ng pin (Ti&ecirc;u chuáº©n): Gi&aacute; trá»‹ ti&ecirc;u chuáº©n Ä‘Æ°á»£c thá»­ nghiá»‡m trong Ä‘iá»u kiá»‡n ph&ograve;ng th&iacute; nghiá»‡m cá»§a b&ecirc;n thá»© ba. Gi&aacute; trá»‹ ti&ecirc;u chuáº©n l&agrave; gi&aacute; trá»‹ trung b&igrave;nh Æ°á»›c t&iacute;nh c&oacute; x&eacute;t Ä‘áº¿n Ä‘á»™ lá»‡ch vá» dung lÆ°á»£ng pin giá»¯a c&aacute;c máº«u pin Ä‘Æ°á»£c thá»­ nghiá»‡m theo ti&ecirc;u chuáº©n IEC 61960. Dung lÆ°á»£ng Ä‘Æ°á»£c Ä‘&aacute;nh gi&aacute; (tá»‘i thiá»ƒu) l&agrave; 3590mAh cho Galaxy S22, 4370mAh cho Galaxy S22 + v&agrave; 4855mAh cho Galaxy S22 Ultra. Thá»i lÆ°á»£ng pin thá»±c táº¿ c&oacute; thá»ƒ thay Ä‘á»•i t&ugrave;y thuá»™c v&agrave;o m&ocirc;i trÆ°á»ng máº¡ng, c&aacute;ch sá»­ dá»¥ng v&agrave; c&aacute;c yáº¿u tá»‘ kh&aacute;c.</p>\r\n<p>Æ¯á»›c t&iacute;nh dá»±a tr&ecirc;n há»“ sÆ¡ sá»­ dá»¥ng cá»§a ngÆ°á»i d&ugrave;ng trung b&igrave;nh/Ä‘iá»ƒn h&igrave;nh. ÄÆ°á»£c Ä‘&aacute;nh gi&aacute; Ä‘á»™c láº­p bá»Ÿi Strategy Analytics tá»« ng&agrave;y 8 th&aacute;ng 12 Ä‘áº¿n 20 th&aacute;ng 12 nÄƒm 2021 táº¡i Hoa Ká»³ v&agrave; VÆ°Æ¡ng quá»‘c Anh vá»›i c&aacute;c phi&ecirc;n báº£n tiá»n ph&aacute;t h&agrave;nh SM-S901, SM-S906, SM-S908 theo c&agrave;i Ä‘áº·t máº·c Ä‘á»‹nh sá»­ dá»¥ng c&aacute;c máº¡ng 5G Sub6 (KH&Ocirc;NG Ä‘Æ°á»£c thá»­ nghiá»‡m vá»›i máº¡ng 5G mmWave). Thá»i lÆ°á»£ng pin thá»±c táº¿ thay Ä‘á»•i t&ugrave;y theo m&ocirc;i trÆ°á»ng máº¡ng, c&aacute;c t&iacute;nh nÄƒng v&agrave; á»©ng dá»¥ng Ä‘Æ°á»£c sá»­ dá»¥ng, táº§n suáº¥t c&aacute;c cuá»™c gá»i v&agrave; tin nháº¯n, sá»‘ láº§n sáº¡c v&agrave; nhiá»u yáº¿u tá»‘ kh&aacute;c.</p>', 1, '1699000', '6ff8b3f7fe.png'),
(31, 'Samsung Note 9', 19, 19, '<p dir=\"ltr\"><span><span><span>Th&ocirc;ng tin sáº£n pháº©m má»›i nháº¥t</span></span></span></p>\r\n<p dir=\"ltr\"><span id=\"docs-internal-guid-d962bfbb-7fff-82ef-3f86-17c9aa006bde\"><span><span>D&ugrave; vá»«a Ä‘Æ°á»£c ra máº¯t trong khoáº£ng thá»i gian kh&ocirc;ng qu&aacute; d&agrave;i nhÆ°ng </span><span><a href=\"https://didongmoi.com.vn/samsung-galaxy-note-9-128gb-xach-tay-cu\"><span>Galaxy Note 9 128GB cÅ© H&agrave;n</span></a></span><span> x&aacute;ch tay Ä‘&atilde; nháº­n Ä‘Æ°á»£c sá»± quan t&acirc;m kh&aacute; lá»›n tá»« ph&iacute;a ngÆ°á»i d&ugrave;ng nhá» m&agrave;n h&igrave;nh si&ecirc;u khá»§ng, b&uacute;t cáº£m á»©ng S Pen ho&agrave;n háº£o nháº¥t v&agrave; camera cho cháº¥t lÆ°á»£ng tháº­t sá»± áº¥n tÆ°á»£ng. </span></span></span></p>\r\n<p dir=\"ltr\"><span id=\"docs-internal-guid-d962bfbb-7fff-82ef-3f86-17c9aa006bde\"><span><span>Vá»›i nhá»¯ng Æ°u Ä‘iá»ƒm tr&ecirc;n c&ugrave;ng sá»©c mua Ä‘ang kh&ocirc;ng ngá»«ng tÄƒng máº¡nh tr&ecirc;n thá»‹ trÆ°á»ng trong thá»i gian gáº§n Ä‘&acirc;y, </span><span><a href=\"https://didongmoi.com.vn/samsung-galaxy-note-9\"><span>Galaxy Note 9</span></a></span><span> xá»©ng Ä‘&aacute;ng l&agrave; má»™t si&ecirc;u pháº©m Ä‘&aacute;ng sá»Ÿ há»¯u nháº¥t á»Ÿ thá»i Ä‘iá»ƒm hiá»‡n táº¡i. Kh&aacute;c vá»›i nhá»¯ng thiáº¿t bá»‹ tiá»n nhiá»‡m trÆ°á»›c thuá»™c series Galaxy Note, Note9 sá»Ÿ há»¯u nhá»¯ng t&iacute;nh nÄƒng thá»±c sá»± há»¯u &iacute;ch vá»›i ngÆ°á»i d&ugrave;ng. Äáº·c biá»‡t, cáº£i tiáº¿n máº¡nh máº½ á»Ÿ b&uacute;t S Pen l&agrave; má»™t trong nhá»¯ng Ä‘iá»ƒm nháº¥n s&aacute;ng gi&aacute; nháº¥t gi&uacute;p chiáº¿c Ä‘iá»‡n thoáº¡i cao cáº¥p n&agrave;y trá»Ÿ n&ecirc;n &ldquo;tháº§n th&aacute;nh&rdquo; hÆ¡n. </span></span></span><img src=\"https://cf.shopee.vn/file/db486681ba03d1722d047a1aa0a7e593\" alt=\"\" width=\"350\" height=\"350\" /></p>\r\n<p dir=\"ltr\"><span><span id=\"docs-internal-guid-d962bfbb-7fff-82ef-3f86-17c9aa006bde\"><span>So vá»›i ngÆ°á»i anh em Galaxy Note ra máº¯t v&agrave;o nÄƒm 2017, Note 9 cÅ© gáº§n nhÆ° kh&ocirc;ng c&oacute; qu&aacute; nhiá»u kh&aacute;c biá»‡t vá» thiáº¿t káº¿. Tuy nhi&ecirc;n, chi tiáº¿t thay Ä‘á»•i Ä‘&aacute;ng gi&aacute; nháº¥t náº±m á»Ÿ máº·t sau cá»§a th&acirc;n m&aacute;y. Cá»¥m camera k&eacute;p Ä‘Æ°á»£c bá»‘ tr&iacute; náº±m ngang, bá»™ pháº­n cáº£m biáº¿n v&acirc;n tay Ä‘Æ°á»£c di chuyá»ƒn náº±m b&ecirc;n dÆ°á»›i Ä‘á»ƒ táº¡o sá»± thuáº­n tiá»‡n hÆ¡n cho kh&aacute;ch h&agrave;ng khi sá»­ dá»¥ng. </span></span></span></p>\r\n<p dir=\"ltr\"><span><span id=\"docs-internal-guid-d962bfbb-7fff-82ef-3f86-17c9aa006bde\"><span>Vá»›i ti&ecirc;u chuáº©n chá»‘ng nÆ°á»›c v&agrave; bá»¥i báº©n IP68, thiáº¿t bá»‹ cho kháº£ nÄƒng sá»‘ng s&oacute;t an to&agrave;n á»Ÿ Ä‘á»™ s&acirc;u 1.5m k&eacute;o d&agrave;i trong khoáº£ng 30 ph&uacute;t. Th&ocirc;ng sá»‘ ho&agrave;n háº£o tr&ecirc;n gi&uacute;p thiáº¿t bá»‹ Ä‘áº¡t Ä‘Æ°á»£c Ä‘á»™ bá»n kh&aacute; cao, háº¡n cháº¿ Ä‘Æ°á»£c nhá»¯ng hÆ° há»ng nháº¥t Ä‘á»‹nh trong c&aacute;c sá»± cá»‘ v&ocirc; t&igrave;nh hoáº·c cá»‘ &yacute;. Sá»‘ Ä‘o 3 v&ograve;ng 161.9 x 76.4 x 8.8 mm, <em>Samsung Galaxy Note 9 128GB CÅ© H&agrave;n Like New</em> gáº§n nhÆ° ho&agrave;n háº£o vá»›i khá»‘i lÆ°á»£ng 201g.</span></span></span></p>\r\n<h2 dir=\"ltr\"><span>M&agrave;n h&igrave;nh Samsung Galaxy Note 9 128GB H&agrave;n Quá»‘c cÅ©</span></h2>\r\n<p dir=\"ltr\"><span><span id=\"docs-internal-guid-d962bfbb-7fff-82ef-3f86-17c9aa006bde\"><span>Note 9 128GB báº£n H&agrave;n cÅ© Ä‘Æ°á»£c n&acirc;ng cáº¥p Ä‘&aacute;ng ká»ƒ vá» k&iacute;ch thÆ°á»›c cÅ©ng nhÆ° cháº¥t lÆ°á»£ng m&agrave;n h&igrave;nh hiá»ƒn thá»‹. Vá»›i diá»‡n t&iacute;ch hiá»ƒn thá»‹ l&ecirc;n Ä‘áº¿n 6.4 inchs, lá»›n hÆ¡n ngÆ°á»i tiá»n nhiá»‡m nhÆ°ng nhá» thu nhá» Ä‘Æ°á»ng viá»n, k&iacute;ch thÆ°á»›c th&acirc;n m&aacute;y gáº§n nhÆ° kh&ocirc;ng c&oacute; sá»± thay Ä‘á»•i. </span></span></span></p>\r\n<p dir=\"ltr\"><span><span id=\"docs-internal-guid-d962bfbb-7fff-82ef-3f86-17c9aa006bde\"><span>Äiá»‡n thoáº¡i Ä‘Æ°á»£c trang bá»‹ táº¥m ná»n c&ocirc;ng nghá»‡ Super AMOLED quen thuá»™c vá»›i Ä‘á»™ ph&acirc;n giáº£i 1440 x 2960 pixels v&agrave; tá»· lá»‡ hiá»ƒn thá»‹ 18.5:9. Nhá»¯ng th&ocirc;ng sá»‘ gáº§n nhÆ° ho&agrave;n háº£o n&agrave;y cho ph&eacute;p thiáº¿t bá»‹ c&oacute; thá»ƒ mang Ä‘áº¿n nhá»¯ng h&igrave;nh áº£nh chi tiáº¿t vá»›i Ä‘á»™ sáº¯c n&eacute;t cao ngay cáº£ trong Ä‘iá»u kiá»‡n thiáº¿u s&aacute;ng. </span></span></span></p>', 0, '4590000', '6a95b39aeb.jpg'),
(32, 'Galaxy S22', 19, 19, '<p>Th&ocirc;ng tin má»›i nháº¥t cá»§a sáº£n pháº©m</p>\r\n<p>* Æ¯á»›c t&iacute;nh dá»±a tr&ecirc;n há»“ sÆ¡ sá»­ dá»¥ng cá»§a ngÆ°á»i d&ugrave;ng trung b&igrave;nh/Ä‘iá»ƒn h&igrave;nh. ÄÆ°á»£c Ä‘&aacute;nh gi&aacute; Ä‘á»™c láº­p bá»Ÿi Strategy Analytics tá»« ng&agrave;y 8 th&aacute;ng 12 Ä‘áº¿n 20 th&aacute;ng 12 nÄƒm 2021 táº¡i Hoa Ká»³ v&agrave; VÆ°Æ¡ng quá»‘c Anh vá»›i c&aacute;c phi&ecirc;n báº£n tiá»n ph&aacute;t h&agrave;nh SM-S901, SM-S906, SM-S908 theo c&agrave;i Ä‘áº·t máº·c Ä‘á»‹nh sá»­ dá»¥ng c&aacute;c máº¡ng 5G Sub6 (KH&Ocirc;NG Ä‘Æ°á»£c thá»­ nghiá»‡m vá»›i máº¡ng 5G mmWave). Thá»i lÆ°á»£ng pin thá»±c táº¿ thay Ä‘á»•i t&ugrave;y theo m&ocirc;i trÆ°á»ng máº¡ng, c&aacute;c t&iacute;nh nÄƒng v&agrave; á»©ng dá»¥ng Ä‘Æ°á»£c sá»­ dá»¥ng, táº§n suáº¥t c&aacute;c cuá»™c gá»i v&agrave; tin nháº¯n, sá»‘ láº§n sáº¡c v&agrave; nhiá»u yáº¿u tá»‘ kh&aacute;c.</p>\r\n<p>* T&iacute;nh nÄƒng ch&iacute;nh c&oacute; thá»ƒ kh&aacute;c vá»›i Th&ocirc;ng sá»‘ ká»¹ thuáº­t ch&iacute;nh.</p>\r\n<p>* Pin : Thá»i lÆ°á»£ng pin thá»±c táº¿ thay Ä‘á»•i t&ugrave;y thuá»™c v&agrave;o m&ocirc;i trÆ°á»ng máº¡ng, c&aacute;c t&iacute;nh nÄƒng v&agrave; á»©ng dá»¥ng Ä‘Æ°á»£c d&ugrave;ng, táº§n suáº¥t cuá»™c gá»i v&agrave; tin nháº¯n, sá»‘ láº§n sáº¡c v&agrave; nhiá»u yáº¿u tá»‘ kh&aacute;c.</p>\r\n<p>* Bá»™ nhá»› ngÆ°á»i d&ugrave;ng kháº£ dá»¥ng : Bá»™ nhá»› ngÆ°á»i d&ugrave;ng nhá» hÆ¡n tá»•ng bá»™ nhá»› do bá»™ nhá»› cá»§a há»‡ Ä‘iá»u h&agrave;nh v&agrave; pháº§n má»m Ä‘Æ°á»£c sá»­ dá»¥ng Ä‘á»ƒ cháº¡y c&aacute;c t&iacute;nh nÄƒng cá»§a thiáº¿t bá»‹. Bá»™ nhá»› ngÆ°á»i d&ugrave;ng thá»±c táº¿ thay Ä‘á»•i t&ugrave;y thuá»™c v&agrave;o nh&agrave; máº¡ng v&agrave; c&oacute; thá»ƒ thay Ä‘á»•i sau khi thá»±c hiá»‡n n&acirc;ng cáº¥p pháº§n má»m.</p>\r\n<p>* Máº¡ng : C&aacute;c bÄƒng th&ocirc;ng m&agrave; thiáº¿t bá»‹ há»— trá»£ c&oacute; thá»ƒ thay Ä‘á»•i t&ugrave;y thuá»™c v&agrave;o khu vá»±c hoáº·c nh&agrave; cung cáº¥p dá»‹ch vá»¥.</p>\r\n<p>* K&iacute;ch thÆ°á»›c m&agrave;n h&igrave;nh: ÄÆ°á»£c Ä‘o theo Ä‘Æ°á»ng ch&eacute;o, k&iacute;ch thÆ°á»›c m&agrave;n h&igrave;nh cá»§a Galaxy S22 l&agrave; 6,1 \"trong h&igrave;nh chá»¯ nháº­t Ä‘áº§y Ä‘á»§ v&agrave; 5,9\" cho c&aacute;c g&oacute;c tr&ograve;n, k&iacute;ch thÆ°á»›c m&agrave;n h&igrave;nh cá»§a Galaxy S22 + l&agrave; 6,6 \"trong h&igrave;nh chá»¯ nháº­t Ä‘áº§y Ä‘á»§ v&agrave; 6,4\" cho c&aacute;c g&oacute;c tr&ograve;n v&agrave; Galaxy S22 K&iacute;ch thÆ°á»›c m&agrave;n h&igrave;nh cá»§a Ultra l&agrave; 6,8 \"trong h&igrave;nh chá»¯ nháº­t Ä‘áº§y Ä‘á»§ v&agrave; 6,8\" cho c&aacute;c g&oacute;c bo tr&ograve;n; Diá»‡n t&iacute;ch xem thá»±c táº¿ c&oacute; thá»ƒ &iacute;t hÆ¡n do c&aacute;c g&oacute;c bo tr&ograve;n v&agrave; lá»— camera.</p>\r\n<p>* Dung lÆ°á»£ng pin (Ti&ecirc;u chuáº©n): Gi&aacute; trá»‹ ti&ecirc;u chuáº©n Ä‘Æ°á»£c thá»­ nghiá»‡m trong Ä‘iá»u kiá»‡n ph&ograve;ng th&iacute; nghiá»‡m cá»§a b&ecirc;n thá»© ba. Gi&aacute; trá»‹ ti&ecirc;u chuáº©n l&agrave; gi&aacute; trá»‹ trung b&igrave;nh Æ°á»›c t&iacute;nh c&oacute; x&eacute;t Ä‘áº¿n Ä‘á»™ lá»‡ch vá» dung lÆ°á»£ng pin giá»¯a c&aacute;c máº«u pin Ä‘Æ°á»£c thá»­ nghiá»‡m theo ti&ecirc;u chuáº©n IEC 61960. Dung lÆ°á»£ng Ä‘Æ°á»£c Ä‘&aacute;nh gi&aacute; (tá»‘i thiá»ƒu) l&agrave; 3590mAh cho Galaxy S22, 4370mAh cho Galaxy S22 + v&agrave; 4855mAh cho Galaxy S22 Ultra. Thá»i lÆ°á»£ng pin thá»±c táº¿ c&oacute; thá»ƒ thay Ä‘á»•i t&ugrave;y thuá»™c v&agrave;o m&ocirc;i trÆ°á»ng máº¡ng, c&aacute;ch sá»­ dá»¥ng v&agrave; c&aacute;c yáº¿u tá»‘ kh&aacute;c.</p>\r\n<p>Æ¯á»›c t&iacute;nh dá»±a tr&ecirc;n há»“ sÆ¡ sá»­ dá»¥ng cá»§a ngÆ°á»i d&ugrave;ng trung b&igrave;nh/Ä‘iá»ƒn h&igrave;nh. ÄÆ°á»£c Ä‘&aacute;nh gi&aacute; Ä‘á»™c láº­p bá»Ÿi Strategy Analytics tá»« ng&agrave;y 8 th&aacute;ng 12 Ä‘áº¿n 20 th&aacute;ng 12 nÄƒm 2021 táº¡i Hoa Ká»³ v&agrave; VÆ°Æ¡ng quá»‘c Anh vá»›i c&aacute;c phi&ecirc;n báº£n tiá»n ph&aacute;t h&agrave;nh SM-S901, SM-S906, SM-S908 theo c&agrave;i Ä‘áº·t máº·c Ä‘á»‹nh sá»­ dá»¥ng c&aacute;c máº¡ng 5G Sub6 (KH&Ocirc;NG Ä‘Æ°á»£c thá»­ nghiá»‡m vá»›i máº¡ng 5G mmWave). Thá»i lÆ°á»£ng pin thá»±c táº¿ thay Ä‘á»•i t&ugrave;y theo m&ocirc;i trÆ°á»ng máº¡ng, c&aacute;c t&iacute;nh nÄƒng v&agrave; á»©ng dá»¥ng Ä‘Æ°á»£c sá»­ dá»¥ng, táº§n suáº¥t c&aacute;c cuá»™c gá»i v&agrave; tin nháº¯n, sá»‘ láº§n sáº¡c v&agrave; nhiá»u yáº¿u tá»‘ kh&aacute;c.</p>', 0, '1849000', '16872dc517.jpg'),
(33, 'Samsung A13', 19, 19, '<p>Ä&aacute;nh gi&aacute; chi tiáº¿t má»›i nháº¥t cá»§a sáº£n pháº©m</p>\r\n<p><strong><a href=\"https://fptshop.com.vn/dien-thoai/samsung-galaxy-a13\">Samsung Galaxy A13</a>&nbsp;Ä‘em Ä‘áº¿n cho báº¡n sá»± lá»±a chá»n xuáº¥t sáº¯c trong ph&acirc;n kh&uacute;c b&igrave;nh d&acirc;n vá»›i thiáº¿t káº¿ thanh lá»‹ch v&agrave; Ä‘Æ¡n giáº£n, m&agrave;n h&igrave;nh 6.6 inch rá»™ng r&atilde;i c&ugrave;ng vi&ecirc;n pin lá»›n 5.000 mAh áº¥n tÆ°á»£ng. Há»‡ thá»‘ng camera tr&ecirc;n máº·t lÆ°ng vá»›i Ä‘á»™ ph&acirc;n giáº£i cao gi&uacute;p báº¡n dá»… d&agrave;ng lÆ°u trá»¯ nhá»¯ng khoáº£nh kháº¯c áº¥n tÆ°á»£ng trong cuá»™c sá»‘ng.</strong></p>\r\n<h3><strong>M&agrave;n h&igrave;nh 6.6 inch rá»™ng r&atilde;i v&agrave; sáº¯c sáº£o</strong></h3>\r\n<p>Samsung Galaxy A13 Ä‘Æ°á»£c trang bá»‹ kh&ocirc;ng gian hiá»ƒn thá»‹ rá»™ng 6.6 inch v&agrave; ghi nháº­n Ä‘á»™ ph&acirc;n giáº£i Full HD+ (1.200 x 2.408 pixels).&nbsp;Má»—i khu&ocirc;n h&igrave;nh Ä‘Æ°á»£c t&aacute;i hiá»‡n tr&ecirc;n Galaxy A13 Ä‘á»u cá»±c ká»³ sáº¯c sáº£o, c&oacute; m&agrave;u sáº¯c trung thá»±c v&agrave; sá»‘ng Ä‘á»™ng. H&atilde;y thoáº£i m&aacute;i thá»±c hiá»‡n c&aacute;c t&aacute;c vá»¥ tá»« l&agrave;m viá»‡c, há»c táº­p v&agrave; giáº£i tr&iacute; Ä‘a phÆ°Æ¡ng tiá»‡n tr&ecirc;n kh&ocirc;ng gian tráº£i nghiá»‡m h&igrave;nh áº£nh thá»±c sá»± xuáº¥t sáº¯c.<img src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/BaoPK/TestLumia950/samsung-galaxy-a13-1.JPG\" alt=\"\" width=\"700\" height=\"467\" /></p>\r\n<h3><strong>Thiáº¿t káº¿ Ä‘Æ¡n giáº£n vá»›i phong c&aacute;ch hiá»‡n Ä‘áº¡i</strong></h3>\r\n<p>Tr&ecirc;n Galaxy A13, báº¡n sáº½ t&igrave;m tháº¥y phong c&aacute;ch thiáº¿t káº¿ háº¿t sá»©c Ä‘Æ¡n giáº£n vá»›i kiá»ƒu d&aacute;ng hiá»‡n Ä‘áº¡i, loáº¡i bá» nhá»¯ng chi tiáº¿t rÆ°á»m r&agrave; tr&ecirc;n th&acirc;n m&aacute;y. M&agrave;n h&igrave;nh 6.6 inch Ä‘Æ°á»£c tá»‘i Æ°u theo phong c&aacute;ch Infinity-V nháº±m tá»‘i Æ°u kh&ocirc;ng gian máº·t trÆ°á»›c v&agrave; táº¡o cáº£m gi&aacute;c thanh lá»‹ch trong cáº¥u tr&uacute;c tháº©m má»¹. á»ž ph&iacute;a sau, to&agrave;n bá»™ há»‡ thá»‘ng camera Ä‘Æ°á»£c sáº¯p xáº¿p há»£p l&yacute; nhÆ° Ä‘ang Ä‘Æ°á»£c Ä‘áº·t trá»±c tiáº¿p tr&ecirc;n máº·t lÆ°ng, tr&aacute;nh sá»± hiá»‡n diá»‡n cá»§a module g&acirc;y rÆ°á»m r&agrave; nhÆ° c&aacute;c d&ograve;ng sáº£n pháº©m kh&aacute;c tr&ecirc;n thá»‹ trÆ°á»ng.</p>', 0, '4090000', 'b87fc6041d.jpg'),
(34, 'Nokia 6300', 19, 23, '<p>Nokia 6300 classic Ä‘iá»‡n thoáº¡i cá»§a thá»i Ä‘áº¡i</p>\r\n<p><span>C&ocirc;ng nghá»‡ th&ocirc;ng tin ng&agrave;y c&agrave;ng ph&aacute;t triá»ƒn máº¡nh, ch&iacute;nh v&igrave; tháº¿ nháº±m Ä‘&aacute;p á»©ng Ä‘Æ°á»£c nhu cáº§u ti&ecirc;u d&ugrave;ng cá»§a ngÆ°á»i sá»­ dá»¥ng ng&agrave;y c&agrave;ng tÄƒng cao, do Ä‘&oacute; m&agrave; nhiá»u h&atilde;ng Ä‘iá»‡n thoáº¡i Ä‘&atilde; cho ra Ä‘á»i nhá»¯ng sáº£n pháº©m c&ocirc;ng nghá»‡ hiá»‡n Ä‘áº¡i ti&ecirc;n tiáº¿n, Ä‘á»ƒ Ä‘&aacute;p á»©ng Ä‘Æ°á»£c háº¿t nhu cáº§u cá»§a con ngÆ°á»i. NhÆ°ng báº¡n muá»‘n sá»Ÿ há»¯u 1 chiáº¿c Ä‘iá»‡n thoáº¡i tiá»‡n lá»£i nháº¥t chá»‰ Ä‘á»ƒ nghe gá»i Ä‘á»ƒ phá»¥c vá»¥ cho c&ocirc;ng viá»‡c th&igrave; viá»‡c lá»±a chá»n chiáº¿c Nokia 6300 l&agrave; ho&agrave;n to&agrave;n ch&iacute;nh x&aacute;c .</span></p>\r\n<p><img src=\"https://didongchinhhang.com/wp-content/uploads/2017/08/nokia-6300-17.jpg\" alt=\"\" width=\"600\" height=\"600\" /></p>\r\n<p>Viá»‡t Nam xin giá»›i thiá»‡u chiáº¿c Ä‘iá»‡n thoáº¡i Nokia 6300 gi&aacute; chá»‰ 690.000 vnÄ‘ báº£o h&agrave;nh l&ecirc;n tá»›i 12 th&aacute;ng .</p>\r\n<p>Nokia 6300 Ä‘Æ°á»£c thiáº¿t káº¿ kh&aacute; gá»n nháº¹. ÄÆ°á»£c bao bá»c b&ecirc;n ngo&agrave;i báº±ng xÆ°Æ¡ng nhá»±a v&agrave; vá» inbox n&ecirc;n kh&aacute; cháº¯c cháº¯n. Hiá»‡n nay chiáº¿c Nokia 6300 n&agrave;y Ä‘ang Ä‘Æ°á»£c Æ°a chuá»™ng nháº¥t tr&ecirc;n thá»‹ trÆ°á»ng v&igrave; nhá»¯ng c&ocirc;ng nÄƒng c&uacute;a n&oacute; kh&aacute; tá»‘t. Thá»i gian sá»­ dá»¥ng c&oacute; thá»ƒ l&ecirc;n tá»›i 2 hoáº·c 3 ng&agrave;y .</p>', 0, '690000', '787ed547df.jpg'),
(35, 'Iphone 11', 19, 18, '<p><span><span><span>iPhone 11 gi&aacute; ráº»&nbsp;Ä‘ang Ä‘Æ°á»£c ph&acirc;n phá»‘i táº¡i&nbsp;há»‡ thá»‘ng cá»­a h&agrave;ng 24hStore</span>.&nbsp;iPhone 11 váº«n l&agrave; sáº£n pháº©m tiáº¿p tá»¥c káº¿ cáº­n nhá»¯ng tinh hoa m&agrave; Apple Ä‘&atilde; mang Ä‘áº¿n tr&ecirc;n c&aacute;c máº«u iPhone XR trÆ°á»›c Ä‘&oacute;. ÄÆ°á»£c biáº¿t, máº«u iPhone 11 sáº½ l&agrave; sáº£n pháº©m gi&agrave;u truyá»n thá»‘ng báº£n sáº¯c&nbsp;m&agrave; h&atilde;ng sáº½ cung cáº¥p. Si&ecirc;u thiáº¿t bá»‹ iPhone 11 lu&ocirc;n sáº½ l&agrave; sáº£n pháº©m Ä‘&aacute;ng sá»Ÿ há»¯u trong táº§m tay m&agrave; ngÆ°á»i d&ugrave;ng sáº½ cáº£m tháº¥y h&agrave;i l&ograve;ng tá»« c&aacute;i cháº¡m tay Ä‘áº§u ti&ecirc;n.</span></span></p>\r\n<h3><span><span><span>L&yacute; do n&ecirc;n mua iphone 11 ngay táº¡i 24hStore&nbsp;</span></span></span></h3>\r\n<p dir=\"ltr\"><span><span>iPhone 11 Ä‘Æ°á»£c xem l&agrave; má»™t trong nhá»¯ng d&ograve;ng Ä‘iá»‡n thoáº¡i b&aacute;n cháº¡y cá»§a Apple trong nÄƒm 2020. Máº«u Ä‘iá»‡n thoáº¡i n&agrave;y Ä‘Æ°á»£c c&aacute;c chuy&ecirc;n gia c&ocirc;ng nghá»‡ Ä‘&aacute;nh gi&aacute; cao vá» máº·t hiá»‡u nÄƒng so vá»›i gi&aacute; tiá»n v&agrave; táº¡i&nbsp;</span></span><span><span><a href=\"https://24hstore.vn/\" target=\"_blank\"><span>Di Ä‘á»™ng 24hStore</span></a></span><span>&nbsp;c&aacute;c báº¡n sáº½ kh&ocirc;ng chá»‰ c&oacute; thá»ƒ sá»Ÿ há»¯u&nbsp;báº£ng&nbsp;</span>gi&aacute; b&aacute;n iPhone 11<span>&nbsp;tá»‘t nháº¥t thá»‹ trÆ°á»ng m&agrave; c&ograve;n Ä‘Æ°á»£c hÆ°á»Ÿng th&ecirc;m c&aacute;c ch&iacute;nh s&aacute;ch Æ°u Ä‘&atilde;i, khuyáº¿n m&atilde;i tuyá»‡t vá»i kh&aacute;c.</span></span></p>', 1, '1090000', '30dc085a3f.png'),
(36, 'Iphone 10', 19, 18, '<p>Th&ocirc;ng tin sáº£n pháº©m má»›i nháº¥t cá»§a cá»­a h&agrave;ng&nbsp;</p>\r\n<h2>iPhone X 64GB Quá»‘c Táº¿ CÅ©: Sá»± lá»±a chá»n h&agrave;ng Ä‘áº§u trong táº§m gi&aacute; 7 triá»‡u Ä‘á»“ng</h2>\r\n<p><strong><a href=\"https://www.viettablet.com/iphone-x-cu-like-new-99\" target=\"_blank\">iPhone X cÅ©</a>&nbsp;</strong>l&agrave; chiáº¿c smartphone m&agrave;n h&igrave;nh tr&agrave;n viá»n tai thá» Ä‘áº§u ti&ecirc;n cá»§a Apple ra máº¯t nÄƒm 2017 vá»›i ráº¥t&nbsp;<strong>nhiá»u t&iacute;nh nÄƒng</strong>&nbsp;má»›i. C&ugrave;ng Viettablet Ä‘iá»ƒm qua c&aacute;c Æ°u Ä‘iá»ƒm cá»§a chiáº¿c smartphone n&agrave;y ngay!</p>', 0, '569000', '22a585c12d.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

DROP TABLE IF EXISTS `tbl_slider`;
CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_Name` varchar(255) NOT NULL,
  `slider_hinhanh` varchar(1000) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_Name`, `slider_hinhanh`, `type`) VALUES
(11, 'samsung', 'c42cf52a15.jpg', 1),
(12, 'xiaomi', 'a181ef73e9.jpg', 1),
(10, 'iphone', 'e0f478b3e1.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_wishlist`
--

DROP TABLE IF EXISTS `tbl_wishlist`;
CREATE TABLE IF NOT EXISTS `tbl_wishlist` (
  `wishlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `hinhanh` varchar(1000) NOT NULL,
  PRIMARY KEY (`wishlist_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`wishlist_id`, `customer_id`, `productid`, `productName`, `price`, `hinhanh`) VALUES
(14, 3, 15, 'sam sung S11', '5000000', '9b5a69403f.png'),
(13, 3, 21, 'dell PAS', '10000000', 'debd3de40b.jpg'),
(7, 5, 14, 'sam sung S11', '12000000', '81a0c46b43.png'),
(15, 3, 32, 'Galaxy S22', '1849000', '16872dc517.jpg'),
(9, 4, 15, 'sam sung S11', '12000000', '9b5a69403f.png'),
(10, 6, 15, 'sam sung S11', '5000000', '9b5a69403f.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
