-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2012 at 06:42 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` varchar(10) NOT NULL,
  `user_id` varchar(8) NOT NULL,
  `product_id` varchar(5) NOT NULL,
  `duration` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `real_stop_time` datetime NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`product_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_history`
--

CREATE TABLE IF NOT EXISTS `orders_history` (
  `id` int(8) NOT NULL,
  `user_id` varchar(8) NOT NULL,
  `order_id` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `time` datetime NOT NULL,
  `description` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`order_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(20000) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `type` tinyint(1) NOT NULL,
  `option` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `price`, `type`, `option`) VALUES
('RM102', 'Phòng cao cấp A', '/rent/uploads/products/thiet-ke-phong-hop-3.jpg', 'Phòng họp sức chứa 4-5 người, đạt tiêu chuẩn quốc tế và các tiện ích khác sử dụng miễn phí: Internet (wifi), máy chiếu, giấy , bút...', 20000, 0, 30),
('RM110', 'Phòng hạng sang B', '/rent/uploads/products/thiet-ke-phong-hop-3.jpg', '<p>\r\n	&nbsp;</p>\r\n<p style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 15px; padding-left: 0px; color: rgb(196, 196, 196); line-height: 20px; text-align: justify; background-color: rgb(17, 17, 19); ">\r\n	<strong>Ph&ograve;ng họp, ph&ograve;ng hội thảo của mỗi doanh nghiệp l&agrave; kh&ocirc;ng gian giao tiếp c&ocirc;ng việc quan trọng. V&igrave; thế thiết kế&nbsp;<a href="http://dominojsc.vn/thiet-ke-noi-that-phong-hop-phong-hoi-thao-517" style="color: rgb(254, 131, 1); text-decoration: none; " target="_blank" title="nội thất phòng họp">nội thất ph&ograve;ng họp</a>, ph&ograve;ng hội thảo vừa phải đảm bảo c&ocirc;ng năng sử dụng tối ưu vừa đảm bảo t&iacute;nh chất mỹ thuật v&agrave; h&agrave;i h&ograve;a &aacute;nh s&aacute;ng, bố cục để n&acirc;ng hiệu suất c&ocirc;ng việc l&ecirc;n cao nhất.</strong></p>\r\n<div style="color: rgb(196, 196, 196); line-height: 20px; text-align: justify; background-color: rgb(17, 17, 19); ">\r\n	Đội ngũ&nbsp;<a href="http://dominojsc.vn/" style="color: rgb(254, 131, 1); text-decoration: none; " target="_blank" title="Kiến trúc">Kiến tr&uacute;c</a>&nbsp;sư c&oacute; kinh nghiệm trong những thiết kế nội thất&nbsp;<a href="http://dominojsc.vn/tag/thiet-ke-noi-that-van-phong" style="color: rgb(254, 131, 1); text-decoration: none; " target="_blank" title="nội thất văn phòng">nội thất văn ph&ograve;ng</a>, ph&ograve;ng họp, hội thảo. Domino sẽ gi&uacute;p qu&yacute; kh&aacute;ch ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m khi trao gửi c&ocirc;ng việc cho ch&uacute;ng t&ocirc;i.&nbsp;</div>\r\n', 30000, 0, 40),
('RM119', 'Phòng hạng sang C', '/rent/uploads/products/thiet-ke-phong-hop-4.jpg', '<p>\r\n	<span style="color: rgb(26, 26, 26); line-height: 14px; text-align: justify; ">SOffice&nbsp;</span><strong style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; border-style: initial; border-color: initial; ">cho thu&ecirc; ph&ograve;ng họp</strong><span style="color: rgb(26, 26, 26); line-height: 14px; text-align: justify; ">&nbsp;với nhiều ph&ograve;ng c&oacute; sức chứa kh&aacute;c nhau, đ&aacute;p ứng từng y&ecirc;u cầu của qu&yacute; kh&aacute;ch h&agrave;ng. Ph&ograve;ng họp được trang bị c&aacute;c loại m&aacute;y chiếu (projector) sắc n&eacute;t v&agrave; c&oacute; độ ph&acirc;n giải cao, Internet tốc độ cao, Wifi v&agrave; hệ thống đ&agrave;m thoại hội nghị.</span><br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\r\n	<br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\r\n	<br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\r\n	<span style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; color: rgb(26, 26, 26); text-align: justify; border-style: initial; border-color: initial; font-size: 14px; "><strong style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">Đối tượng thu&ecirc; ph&ograve;ng họp SOffice</strong></span><br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\r\n	<br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\r\n	<span style="color: rgb(26, 26, 26); line-height: 14px; text-align: justify; ">Khi qu&yacute; kh&aacute;ch h&agrave;ng cần tổ chức những buổi hội nghị kh&aacute;ch h&agrave;ng, đại hội cổ đ&ocirc;ng, v&agrave; c&aacute;c h&igrave;nh thức meeting mang t&iacute;nh chuy&ecirc;n nghiệp, thu&ecirc; một ph&ograve;ng họp tại SOffice l&agrave; một giải ph&aacute;p hợp l&iacute; với chi ph&iacute; tiết kiệm.</span><br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\r\n	<br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\r\n	<br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\r\n	<span style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; color: rgb(26, 26, 26); text-align: justify; border-style: initial; border-color: initial; font-size: 14px; "><strong style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">C&aacute;c tiện &iacute;ch ph&ograve;ng họp SOffice</strong></span><br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\r\n	<br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\r\n	<span style="color: rgb(26, 26, 26); line-height: 14px; text-align: justify; ">Ph&ograve;ng họp được trang bị đầy đủ c&aacute;c phương tiện:</span></p>\r\n<br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\r\n<br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\r\n<table style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-collapse: collapse; -webkit-border-horizontal-spacing: 1px; -webkit-border-vertical-spacing: 1px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; border-style: initial; border-color: initial; ">\r\n	<tbody style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n		<tr style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n				<img alt="" src="http://www.soffice.vn/files/news/239/content/288/ico_news.gif" style="margin-top: 0px; margin-right: 10px; margin-bottom: 0px; margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-width: initial; border-color: initial; border-image: initial; border-style: initial; border-color: initial; border-width: initial; border-color: initial; " /></td>\r\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n				M&aacute;y chiếu (projector) sắc n&eacute;t v&agrave; c&oacute; độ ph&acirc;n giải cao</td>\r\n		</tr>\r\n		<tr style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n				<img alt="" src="http://www.soffice.vn/files/news/239/content/288/ico_news.gif" style="margin-top: 0px; margin-right: 10px; margin-bottom: 0px; margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-width: initial; border-color: initial; border-image: initial; border-style: initial; border-color: initial; border-width: initial; border-color: initial; " /></td>\r\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n				Internet tốc độ cao</td>\r\n		</tr>\r\n		<tr style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n				<img alt="" src="http://www.soffice.vn/files/news/239/content/288/ico_news.gif" style="margin-top: 0px; margin-right: 10px; margin-bottom: 0px; margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-width: initial; border-color: initial; border-image: initial; border-style: initial; border-color: initial; border-width: initial; border-color: initial; " /></td>\r\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n				Wifi</td>\r\n		</tr>\r\n		<tr style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n				<img alt="" src="http://www.soffice.vn/files/news/239/content/288/ico_news.gif" style="margin-top: 0px; margin-right: 10px; margin-bottom: 0px; margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-width: initial; border-color: initial; border-image: initial; border-style: initial; border-color: initial; border-width: initial; border-color: initial; " /></td>\r\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n				Hệ thống đ&agrave;m thoại hội nghị.</td>\r\n		</tr>\r\n		<tr style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n				<img alt="" src="http://www.soffice.vn/files/news/239/content/288/ico_news.gif" style="margin-top: 0px; margin-right: 10px; margin-bottom: 0px; margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-width: initial; border-color: initial; border-image: initial; border-style: initial; border-color: initial; border-width: initial; border-color: initial; " /><br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; " />\r\n				&nbsp;</td>\r\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n				SOffice c&ograve;n phục vụ c&aacute;c dịch vụ kh&aacute;c đi k&egrave;m như: caf&eacute;, hoa quả, nước uống, b&aacute;nh ngọt&hellip; khi c&oacute; y&ecirc;u cầu.</td>\r\n		</tr>\r\n		<tr style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n				<img alt="" src="http://www.soffice.vn/files/news/239/content/288/ico_news.gif" style="margin-top: 0px; margin-right: 10px; margin-bottom: 0px; margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-width: initial; border-color: initial; border-image: initial; border-style: initial; border-color: initial; border-width: initial; border-color: initial; " /></td>\r\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\r\n				Quy m&ocirc; 4-30 người</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', 100000000, 0, 40);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(8) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `birthday` date NOT NULL,
  `idcard` int(9) NOT NULL,
  `work` varchar(256) NOT NULL,
  `address1` varchar(256) DEFAULT NULL,
  `address2` varchar(256) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `yahoo` varchar(40) DEFAULT NULL,
  `skype` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `first_name`, `last_name`, `birthday`, `idcard`, `work`, `address1`, `address2`, `email`, `tel`, `yahoo`, `skype`, `last_login`) VALUES
('US101', 'luckymancvp', 'dc87d4b6fa9d3e53fa23c9db9994fc66ec5ca35b', 1, 'Dang Thanh', 'Tu', '2012-03-07', 135324359, 'Vĩnh Phúc', 'luckyman', 'luckyman', 'luckymancvp@gmail.com', 'luckyman', 'luckyman', 'luckymancvp_skype', '2012-03-17 00:43:37');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_history`
--
ALTER TABLE `orders_history`
  ADD CONSTRAINT `orders_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_history_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
