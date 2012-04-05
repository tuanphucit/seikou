-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2012 at 08:27 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seikou`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', 'US101', NULL, 'N;'),
('admin', 'US203', NULL, 'N;'),
('Auth Assignments Manager', 'US203', NULL, 'N;'),
('Auth Items Manager', 'US203', NULL, 'N;'),
('RBAC Manager', 'US101', NULL, 'N;'),
('RBAC Manager', 'US203', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, 'Who have admin role can use admin module', NULL, 'N;'),
('Auth Assignments Manager', 2, 'Manages Role Assignments. RBAM required role.', NULL, 'N;'),
('Auth Items Manager', 2, 'Manages Auth Items. RBAM required role.', NULL, 'N;'),
('customer', 2, 'Default role for users that are logged in. RBAC default role.', 'return !Yii::app()->getUser()->getIsGuest();', 'N;'),
('Guest', 2, 'Default role for users that are not logged in. RBAC default role.', 'return Yii::app()->getUser()->getIsGuest();', 'N;'),
('RBAC Manager', 2, 'Manages Auth Items and Role Assignments. RBAM required role.', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('RBAC Manager', 'Auth Assignments Manager'),
('RBAC Manager', 'Auth Items Manager');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE IF NOT EXISTS `fee` (
  `id` int(11) NOT NULL,
  `register` int(11) DEFAULT NULL,
  `penalty` int(11) DEFAULT NULL,
  `cancel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id`, `register`, `penalty`, `cancel`) VALUES
(1, 10000, 100000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(8) NOT NULL,
  `product_id` varchar(5) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time DEFAULT NULL,
  `real_stop_time` time DEFAULT NULL,
  `total` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`product_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=142 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `start_date`, `end_date`, `start_time`, `end_time`, `real_stop_time`, `total`, `visible`) VALUES
(119, 'US101', 'RM102', '2012-04-02', '2012-04-02', '06:00:00', '09:30:00', '01:51:00', 150000, 1),
(120, 'US101', 'RM102', '2012-04-01', '2012-04-01', '00:30:00', '03:00:00', '01:51:34', 110000, 1),
(121, 'US101', 'RM102', '2012-04-08', '2012-04-17', '21:20:00', '21:30:00', '01:51:00', 210000, 1),
(122, 'US101', 'RM110', '2012-04-04', '2012-04-04', '08:30:00', '13:00:00', '01:51:00', 280000, 1),
(123, 'US005', 'RM110', '2012-04-04', '2012-04-04', '06:30:00', '07:30:00', NULL, 70000, 1),
(124, 'US005', 'RM102', '2012-04-04', '2012-04-04', '06:30:00', '07:30:00', NULL, 50000, 1),
(125, 'US101', 'RM102', '2012-04-05', '2012-04-05', '07:30:00', '08:00:00', NULL, 30000, 1),
(126, 'US101', 'RM102', '2012-04-06', '2012-04-06', '02:30:00', '09:00:00', NULL, 270000, 1),
(127, 'US005', 'RM102', '2012-04-10', '2012-04-12', '06:30:00', '07:30:00', NULL, 130000, 1),
(128, 'US005', 'RM102', '2015-04-03', '2015-04-03', '06:30:00', '07:30:00', NULL, 50000, 1),
(129, 'US101', 'RM102', '2012-05-01', '2012-05-31', '02:30:00', '17:30:00', NULL, 18610000, 1),
(130, 'US222', 'RM102', '2012-04-04', '2012-04-04', '06:30:00', '07:30:00', NULL, 50000, 1),
(131, 'US101', 'RM102', '2013-10-02', '2013-10-02', '17:40:00', '17:50:00', NULL, 30000, 1),
(132, 'US005', 'RM102', '2012-04-06', '2012-04-06', '14:00:00', '16:30:00', NULL, 110000, 1),
(133, 'US222', 'RM119', '2012-04-06', '2012-04-06', '08:30:00', '10:00:00', NULL, 300010000, 1),
(134, 'US101', 'RM102', '2012-04-06', '2012-04-06', '06:00:00', '06:30:00', NULL, 30000, 1),
(135, 'US222', 'RM119', '2012-04-05', '2012-04-05', '08:30:00', '10:30:00', NULL, 400010000, 1),
(136, 'US101', 'RM102', '2012-04-07', '2012-04-07', '06:00:00', '06:30:00', NULL, 30000, 1),
(137, 'US203', 'RM102', '2012-05-01', '2012-05-02', '05:40:00', '17:40:00', NULL, 970000, 1),
(138, 'US501', 'RM102', '2012-04-06', '2012-04-06', '07:00:00', '07:30:00', NULL, 30000, 1),
(139, 'US501', 'RM102', '2012-04-07', '2012-04-07', '06:30:00', '09:30:00', NULL, 130000, 1),
(140, 'US501', 'RM102', '2012-04-08', '2012-04-12', '06:30:00', '09:30:00', NULL, 610000, 1),
(141, 'US501', 'RM102', '2012-04-08', '2012-04-12', '17:10:00', '17:50:00', NULL, 210000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_history`
--

CREATE TABLE IF NOT EXISTS `orders_history` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(8) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `time` datetime NOT NULL,
  `description` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`order_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=187 ;

--
-- Dumping data for table `orders_history`
--

INSERT INTO `orders_history` (`id`, `user_id`, `order_id`, `status`, `time`, `description`) VALUES
(144, 'US101', 119, 0, '2012-03-31 21:10:33', NULL),
(145, 'US101', 120, 0, '2012-03-31 21:18:16', NULL),
(146, 'US101', 121, 0, '2012-03-31 21:22:04', NULL),
(147, 'US101', 122, 0, '2012-03-31 22:11:38', NULL),
(148, 'US101', 121, 1, '2012-04-02 01:51:25', NULL),
(149, 'US101', 122, 1, '2012-04-02 01:51:28', NULL),
(150, 'US101', 120, 5, '2012-04-02 01:51:34', NULL),
(151, 'US101', 119, 1, '2012-04-02 01:51:35', NULL),
(152, 'US005', 123, 0, '2012-04-04 17:26:04', NULL),
(153, 'US005', 124, 0, '2012-04-04 17:26:43', NULL),
(154, 'US101', 125, 0, '2012-04-04 17:27:06', NULL),
(155, 'US101', 126, 0, '2012-04-04 17:27:33', NULL),
(156, 'US005', 127, 0, '2012-04-04 17:27:35', NULL),
(157, 'US005', 128, 0, '2012-04-04 17:30:22', NULL),
(158, 'US101', 129, 0, '2012-04-04 17:30:32', NULL),
(159, 'US101', 127, 2, '2012-04-04 17:30:33', NULL),
(160, 'US101', 129, 2, '2012-04-04 17:30:38', NULL),
(161, 'US101', 126, 2, '2012-04-04 17:30:48', NULL),
(162, 'US101', 124, 2, '2012-04-04 17:30:52', NULL),
(163, 'US222', 130, 0, '2012-04-04 17:31:12', NULL),
(164, 'US101', 131, 0, '2012-04-04 17:32:07', NULL),
(165, 'US005', 123, 2, '2012-04-04 17:32:47', NULL),
(166, 'US005', 128, 2, '2012-04-04 17:33:11', NULL),
(167, 'US101', 131, 2, '2012-04-04 17:35:15', NULL),
(168, 'US005', 132, 0, '2012-04-04 17:35:26', NULL),
(169, 'US222', 133, 0, '2012-04-04 17:35:57', NULL),
(170, 'US101', 134, 0, '2012-04-04 17:36:14', NULL),
(171, 'US222', 135, 0, '2012-04-04 17:36:19', NULL),
(172, 'US101', 136, 0, '2012-04-04 17:36:21', NULL),
(173, 'US101', 134, 2, '2012-04-04 17:37:26', NULL),
(174, 'US101', 136, 2, '2012-04-04 17:37:32', NULL),
(175, 'US101', 125, 2, '2012-04-04 17:38:20', NULL),
(176, 'US222', 133, 2, '2012-04-04 17:39:44', NULL),
(177, 'US203', 137, 0, '2012-04-04 17:40:26', NULL),
(178, 'US005', 132, 2, '2012-04-04 17:43:38', NULL),
(179, 'US501', 138, 0, '2012-04-04 17:47:00', NULL),
(180, 'US501', 139, 0, '2012-04-04 17:47:04', NULL),
(181, 'US501', 140, 0, '2012-04-04 17:47:17', NULL),
(182, 'US501', 138, 2, '2012-04-04 17:48:26', NULL),
(183, 'US501', 139, 2, '2012-04-04 17:49:11', NULL),
(184, 'US501', 141, 0, '2012-04-04 17:50:24', NULL),
(185, 'US501', 140, 2, '2012-04-04 17:50:57', NULL),
(186, 'US501', 141, 2, '2012-04-04 17:51:00', NULL);

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
('RM102', '会議室A', '/seikou/uploads/products/thiet-ke-phong-hop-3.jpg', '<p>\n	 </p>\n<div>\n	 </div>\n<div>\n	Phòng họp, phòng hội thảo của mỗi doanh nghiệp là không gian giao tiếp công việc quan trọng. Vì thế thiết kế nội thất phòng họp, phòng hội thảo vừa phải đảm bảo công năng sử dụng tối ưu vừa đảm bảo tính chất mỹ thuật và hài hòa ánh sáng, bố cục để nâng hiệu suất công việc lên cao nhất.</div>\n<div>\n	Đội ngũ Kiến trúc sư có kinh nghiệm trong những thiết kế nội thất nội thất văn phòng, phòng họp, hội thảo. Domino sẽ giúp quý khách hoàn toàn yên tâm khi trao gửi công việc cho chúng tôi. </div>\n', 20000, 0, 30),
('RM110', '会議室B', '/seikou/uploads/products/thiet-ke-phong-hop-3.jpg', '<p>\n	 </p>\n<div>\n	 </div>\n<div>\n	Phòng họp, phòng hội thảo của mỗi doanh nghiệp là không gian giao tiếp công việc quan trọng. Vì thế thiết kế nội thất phòng họp, phòng hội thảo vừa phải đảm bảo công năng sử dụng tối ưu vừa đảm bảo tính chất mỹ thuật và hài hòa ánh sáng, bố cục để nâng hiệu suất công việc lên cao nhất.</div>\n<div>\n	Đội ngũ Kiến trúc sư có kinh nghiệm trong những thiết kế nội thất nội thất văn phòng, phòng họp, hội thảo. Domino sẽ giúp quý khách hoàn toàn yên tâm khi trao gửi công việc cho chúng tôi. </div>\n', 30000, 0, 40),
('RM119', '会議室C', '/seikou/uploads/products/thiet-ke-phong-hop-3.jpg', '<p>\n	<span style="color: rgb(26, 26, 26); line-height: 14px; text-align: justify; ">SOffice </span><strong style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; border-style: initial; border-color: initial; ">cho thuê phòng họp</strong><span style="color: rgb(26, 26, 26); line-height: 14px; text-align: justify; "> với nhiều phòng có sức chứa khác nhau, đáp ứng từng yêu cầu của quý khách hàng. Phòng họp được trang bị các loại máy chiếu (projector) sắc nét và có độ phân giải cao, Internet tốc độ cao, Wifi và hệ thống đàm thoại hội nghị.</span><br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\n	<br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\n	<br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\n	<span style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; color: rgb(26, 26, 26); text-align: justify; border-style: initial; border-color: initial; font-size: 14px; "><strong style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">Đối tượng thuê phòng họp SOffice</strong></span><br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\n	<br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\n	<span style="color: rgb(26, 26, 26); line-height: 14px; text-align: justify; ">Khi quý khách hàng cần tổ chức những buổi hội nghị khách hàng, đại hội cổ đông, và các hình thức meeting mang tính chuyên nghiệp, thuê một phòng họp tại SOffice là một giải pháp hợp lí với chi phí tiết kiệm.</span><br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\n	<br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\n	<br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\n	<span style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; color: rgb(26, 26, 26); text-align: justify; border-style: initial; border-color: initial; font-size: 14px; "><strong style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">Các tiện ích phòng họp SOffice</strong></span><br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\n	<br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\n	<span style="color: rgb(26, 26, 26); line-height: 14px; text-align: justify; ">Phòng họp được trang bị đầy đủ các phương tiện:</span></p>\n<br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\n<br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; " />\n<table style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-collapse: collapse; -webkit-border-horizontal-spacing: 1px; -webkit-border-vertical-spacing: 1px; color: rgb(26, 26, 26); line-height: 14px; text-align: justify; border-style: initial; border-color: initial; ">\n	<tbody style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n		<tr style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n				<img alt="" src="http://www.soffice.vn/files/news/239/content/288/ico_news.gif" style="margin-top: 0px; margin-right: 10px; margin-bottom: 0px; margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-width: initial; border-color: initial; border-image: initial; border-style: initial; border-color: initial; border-width: initial; border-color: initial; " /></td>\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n				Máy chiếu (projector) sắc nét và có độ phân giải cao</td>\n		</tr>\n		<tr style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n				<img alt="" src="http://www.soffice.vn/files/news/239/content/288/ico_news.gif" style="margin-top: 0px; margin-right: 10px; margin-bottom: 0px; margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-width: initial; border-color: initial; border-image: initial; border-style: initial; border-color: initial; border-width: initial; border-color: initial; " /></td>\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n				Internet tốc độ cao</td>\n		</tr>\n		<tr style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n				<img alt="" src="http://www.soffice.vn/files/news/239/content/288/ico_news.gif" style="margin-top: 0px; margin-right: 10px; margin-bottom: 0px; margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-width: initial; border-color: initial; border-image: initial; border-style: initial; border-color: initial; border-width: initial; border-color: initial; " /></td>\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n				Wifi</td>\n		</tr>\n		<tr style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n				<img alt="" src="http://www.soffice.vn/files/news/239/content/288/ico_news.gif" style="margin-top: 0px; margin-right: 10px; margin-bottom: 0px; margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-width: initial; border-color: initial; border-image: initial; border-style: initial; border-color: initial; border-width: initial; border-color: initial; " /></td>\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n				Hệ thống đàm thoại hội nghị.</td>\n		</tr>\n		<tr style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n				<img alt="" src="http://www.soffice.vn/files/news/239/content/288/ico_news.gif" style="margin-top: 0px; margin-right: 10px; margin-bottom: 0px; margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-width: initial; border-color: initial; border-image: initial; border-style: initial; border-color: initial; border-width: initial; border-color: initial; " /><br style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; " />\n				 </td>\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n				SOffice còn phục vụ các dịch vụ khác đi kèm như: café, hoa quả, nước uống, bánh ngọt… khi có yêu cầu.</td>\n		</tr>\n		<tr style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n				<img alt="" src="http://www.soffice.vn/files/news/239/content/288/ico_news.gif" style="margin-top: 0px; margin-right: 10px; margin-bottom: 0px; margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-width: initial; border-color: initial; border-image: initial; border-style: initial; border-color: initial; border-width: initial; border-color: initial; " /></td>\n			<td style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; outline-width: 0px; outline-style: initial; outline-color: initial; border-style: initial; border-color: initial; ">\n				Quy mô 4-30 người</td>\n		</tr>\n	</tbody>\n</table>\n<p>\n	 </p>\n', 100000000, 0, 40);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(8) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `full_name` varchar(40) NOT NULL,
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

INSERT INTO `users` (`id`, `username`, `password`, `role`, `full_name`, `birthday`, `idcard`, `work`, `address1`, `address2`, `email`, `tel`, `yahoo`, `skype`, `last_login`) VALUES
('US005', 'phuongnv', '10470c3b4b1fed12c3baac014be15fac67c6e815', 0, 'Nguyen Van Phuong', '2012-04-04', 2147483647, 'student', 'Hai Duong', 'Ha noi', 'phuongnv111@gmail.com', '0934252656', '', '', NULL),
('US101', 'luckymancvp', 'dc87d4b6fa9d3e53fa23c9db9994fc66ec5ca35b', 0, 'Đặng Thanh Tú', '2012-03-07', 135324359, 'Vĩnh Phúc', 'luckyman', 'Dai La', 'luckymancvp@gmail.com', 'luckyman', 'luckyman13484', 'luckymancvp', '2012-03-17 00:43:37'),
('US203', 'matrixtheone', '531c154c293dfa54ca8eb77046c68c1aad5eb1f8', 1, 'Do Viet Cuong', '1989-04-03', 13039093, 'BK', 'HN', 'HN', 'cuongseo3489@gmail.com', '0902424124', '', '', NULL),
('US222', 'khoiminh', '6412398d1c0218906d6f46913606e0b4ec08552e', 0, 'Le Minh Duc', '2012-04-05', 123456789, 'Student', 'Hai Duong', 'Thanh Ha', 'khoiminhstar@gmail.com', '0979636059', 'tieugiachandoi', 'khoiminhstar', NULL),
('US501', 'lisa', '0937afa17f4dc08f3c0e5dc908158370ce64df86', 0, 'Nguyen Thi Phuong', '2012-01-02', 125356838, 'nha nghi, pho Den D', 'nha nghi, pho Den D', 'nha nghi, pho Den D', 'phuongnt@gmail.com', '01684299299', '', '', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

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
