-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 21, 2022 at 03:50 AM
-- Server version: 8.0.27
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinepalengke_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

DROP TABLE IF EXISTS `tbl_address`;
CREATE TABLE IF NOT EXISTS `tbl_address` (
  `add_id` int NOT NULL AUTO_INCREMENT,
  `cust_id` int DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `barangay_id` int DEFAULT NULL,
  PRIMARY KEY (`add_id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`add_id`, `cust_id`, `street`, `barangay_id`) VALUES
(55, 81, 'ruizal', 66),
(54, 74, 'rizal', 66),
(53, 79, 'rizal', 66),
(56, 82, 'Adalia St.', 66),
(57, 83, 'Adalia St.', 67);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(35) NOT NULL,
  `admin_username` varchar(20) DEFAULT NULL,
  `admin_password` varchar(60) DEFAULT NULL,
  `admin_type` int NOT NULL COMMENT '1 = admin\r\n2 = marketer\r\n3 = courier',
  `admin_fname` varchar(30) NOT NULL,
  `admin_mname` varchar(30) NOT NULL,
  `admin_lname` varchar(30) NOT NULL,
  `admin_cnum` varchar(11) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_username`, `admin_password`, `admin_type`, `admin_fname`, `admin_mname`, `admin_lname`, `admin_cnum`) VALUES
(1, 'ramirezjander09@gmail.com', 'admin123', '$2y$10$FxY4FTYGp0ibVi8fORM0pOKAmoL33tE3vlmwWMQS/zMHD2XXHfXmO', 1, 'Jander', 'Cruzat', 'Ramirez', '09243627532'),
(31, 'junepaul@gmail.com', 'junepaul', '$2y$10$6tfXv/07R.pekE0n.Zt6Ne5/ecs4FZmp4KJG1Nl8iC8XXvrJC9j9i', 2, 'June Paul', 'Morillo', 'Annonuevo', '09876544567'),
(30, 'kathlynvillanueva13@gmail.com', 'courier1', '$2y$10$5jEZbqstL.g9cg2ynAQE0.juA7uhmDM0m7qRIOjrPf/pbrCpMMIvG', 3, 'Allen Cyrill', 'Cebus', 'Vinas', '09511177780');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barangay`
--

DROP TABLE IF EXISTS `tbl_barangay`;
CREATE TABLE IF NOT EXISTS `tbl_barangay` (
  `brgy_id` int NOT NULL AUTO_INCREMENT,
  `brgy_name` varchar(30) NOT NULL,
  `delivery_fee` double NOT NULL,
  PRIMARY KEY (`brgy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_barangay`
--

INSERT INTO `tbl_barangay` (`brgy_id`, `brgy_name`, `delivery_fee`) VALUES
(69, 'Bulusan Proper', 90),
(68, 'Baruyan', 200),
(67, 'Balite', 60),
(66, 'Balingayan', 200.5),
(71, 'Masipit', 200);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `prod_id` int DEFAULT NULL,
  `cust_id` int NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `trans_id` int NOT NULL,
  `status` varchar(2) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `prod_id`, `cust_id`, `quantity`, `price`, `trans_id`, `status`) VALUES
(1, 209, 74, '1.00', '0.00', 1, ''),
(2, 206, 82, '1.30', '0.00', 3, '1'),
(3, 209, 82, '1.00', '0.00', 3, '0'),
(4, 229, 82, '1.00', '0.00', 0, ''),
(5, 229, 82, '1.00', '0.00', 0, ''),
(6, 229, 82, '1.00', '0.00', 0, ''),
(7, 229, 82, '1.00', '0.00', 0, ''),
(8, 229, 82, '1.00', '0.00', 0, ''),
(9, 229, 82, '1.00', '0.00', 0, ''),
(10, 217, 74, '1.30', '0.00', 0, ''),
(11, 215, 74, '1.00', '0.00', 0, ''),
(12, 209, 83, '1.40', '0.00', 4, '1'),
(13, 215, 83, '1.00', '0.00', 4, '1'),
(14, 210, 83, '1.10', '0.00', 5, ''),
(15, 231, 83, '1.10', '0.00', 5, ''),
(33, 207, 83, '1.00', '0.00', 6, ''),
(34, 209, 83, '1.00', '0.00', 6, ''),
(45, 210, 83, '1.00', '0.00', 7, ''),
(44, 209, 83, '1.00', '0.00', 7, ''),
(84, 227, 83, '1.00', '0.00', 8, ''),
(83, 227, 83, '1.00', '0.00', 8, ''),
(82, 227, 83, '1.00', '0.00', 8, ''),
(81, 231, 83, '1.00', '0.00', 8, ''),
(80, 221, 83, '1.00', '0.00', 8, ''),
(79, 227, 83, '1.00', '0.00', 8, ''),
(78, 223, 83, '1.00', '0.00', 8, ''),
(77, 209, 83, '1.00', '0.00', 8, ''),
(76, 210, 83, '1.00', '0.00', 8, ''),
(75, 209, 83, '1.00', '0.00', 8, ''),
(74, 209, 83, '1.00', '0.00', 8, ''),
(73, 209, 83, '1.00', '0.00', 8, ''),
(72, 216, 83, '1.00', '0.00', 8, ''),
(71, 216, 83, '1.00', '0.00', 8, ''),
(60, 211, 83, '1.00', '0.00', 8, ''),
(61, 229, 83, '1.00', '0.00', 8, ''),
(63, 210, 83, '1.00', '0.00', 8, ''),
(64, 210, 83, '1.00', '0.00', 8, ''),
(65, 210, 83, '1.00', '0.00', 8, ''),
(66, 210, 83, '1.00', '0.00', 8, ''),
(67, 217, 83, '1.00', '0.00', 8, ''),
(68, 217, 83, '1.00', '0.00', 8, ''),
(69, 222, 83, '1.00', '0.00', 8, ''),
(70, 216, 83, '1.00', '0.00', 8, ''),
(85, 230, 83, '1.00', '0.00', 8, ''),
(86, 227, 83, '1.00', '0.00', 8, ''),
(87, 230, 83, '1.00', '0.00', 8, ''),
(88, 208, 81, '1.00', '0.00', 9, ''),
(89, 210, 81, '1.00', '0.00', 10, ''),
(90, 206, 81, '1.00', '0.00', 11, ''),
(91, 214, 81, '1.00', '0.00', 11, ''),
(92, 233, 81, '1.00', '0.00', 12, ''),
(93, 208, 81, '1.00', '0.00', 13, ''),
(94, 206, 81, '1.00', '0.00', 13, ''),
(95, 209, 81, '1.00', '240.00', 14, ''),
(96, 206, 81, '2.30', '123.00', 15, ''),
(97, 220, 81, '1.05', '360.00', 18, ''),
(98, 222, 81, '1.10', '135.00', 18, ''),
(99, 210, 81, '1.15', '240.00', 18, ''),
(100, 210, 81, '1.00', '240.00', 19, ''),
(101, 230, 81, '1.00', '95.00', 19, ''),
(102, 234, 81, '1.00', '50.00', 19, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(30) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `category`) VALUES
(14, 'vegetable'),
(13, 'fish'),
(12, 'meat'),
(15, 'fruit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `cust_id` int NOT NULL AUTO_INCREMENT,
  `cust_fname` varchar(20) NOT NULL,
  `cust_mname` varchar(20) NOT NULL,
  `cust_lname` varchar(20) NOT NULL,
  `cust_sex` varchar(1) NOT NULL,
  `cust_birthdate` varchar(10) NOT NULL,
  `cust_email` varchar(35) DEFAULT NULL,
  `cust_username` varchar(20) DEFAULT NULL,
  `cust_password` varchar(255) DEFAULT NULL,
  `cust_cnum` varchar(11) NOT NULL,
  `cust_status` varchar(1) DEFAULT NULL,
  `cust_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cust_id`, `cust_fname`, `cust_mname`, `cust_lname`, `cust_sex`, `cust_birthdate`, `cust_email`, `cust_username`, `cust_password`, `cust_cnum`, `cust_status`, `cust_code`) VALUES
(81, 'Lee-mar', 'Manay', 'Arcon', 'm', '1999-07-26', 'arconleemar0726@gmail.com', 'leemar', '$2y$10$v.F8mBFTdRMo3yAjuYXd0OftF8U4dm9oHrxDQpTbshnwUzUuyypI.', '09511177784', NULL, 'K6drmsOCBJnIiLvha5zTo8cUGpRtYE2DHXfw0eVjFA73uxgNMQ'),
(83, 'Jander', 'Cruzat', 'Ramirez', 'm', '1900-01-01', 'ramirezjander09@gmail.com', 'jander00', '$2y$10$Ckm.eQJyp2UKTuAkAthrl.Ps8wXRbka0K5Cxj/E/BhvqlPxYjet1O', '09988755467', NULL, '9uJgejB2fp6Gxy1Qi5cIhK7bC4o0YtZqXnHEwrkNAVvlPzUOaM'),
(82, 'Allen Cyrill', 'Cebu', 'Vinas', 'm', '6776-05-06', 'kathlynvillanueva13@gmail.com', 'allen1234', '$2y$10$HEz9TOItpoy1EzqY05aflOxucDylEWzzZIWPzBoP00PoeMtwuK4n2', '09345677651', NULL, 'uZ35qcbNVipwelDhoBHPfQWSYsXmaOI0n4rFAgEzxdj67tL9Ty');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messaging`
--

DROP TABLE IF EXISTS `tbl_messaging`;
CREATE TABLE IF NOT EXISTS `tbl_messaging` (
  `mess_id` int NOT NULL AUTO_INCREMENT,
  `msg_owner` varchar(11) NOT NULL,
  `deleted` tinyint NOT NULL DEFAULT '0',
  `mess_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL,
  `trans_id` tinyint NOT NULL,
  PRIMARY KEY (`mess_id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_messaging`
--

INSERT INTO `tbl_messaging` (`mess_id`, `msg_owner`, `deleted`, `mess_date`, `message`, `trans_id`) VALUES
(1, 'm31', 0, '2022-10-16 13:07:34', 'hello', 7),
(2, 'c83', 0, '2022-10-16 13:07:40', 'ds', 7),
(3, 'c83', 0, '2022-10-16 13:07:42', 'wd', 7),
(4, 'm0', 0, '2022-10-16 13:16:18', 'Good Day! Thank you for choosing Calapan Online Palengke.', 8),
(5, 'm31', 0, '2022-10-16 13:35:08', 'Good Day! Thank you for choosing Calapan Online Palengke.', 8),
(6, 'm31', 0, '2022-10-16 13:35:21', 'wadsldk', 8),
(7, 'm31', 0, '2022-10-16 13:35:23', 'dsald', 8),
(8, 'm31', 0, '2022-10-16 13:35:24', 'dkal', 8),
(9, 'm0', 0, '2022-10-17 01:27:48', 'Good Day! Thank you for choosing Calapan Online Palengke.', 11),
(17, 'c81', 0, '2022-10-17 03:04:07', '312', 9),
(18, 'c81', 0, '2022-10-17 03:04:07', '3', 9),
(11, 'm0', 0, '2022-10-17 01:35:04', 'Good Day! Thank you for choosing Calapan Online Palengke.', 12),
(15, 'c81', 0, '2022-10-17 03:04:07', '123', 9),
(16, 'c81', 0, '2022-10-17 03:04:07', '12', 9),
(13, 'm31', 0, '2022-10-17 02:14:24', 'Good Day! Thank you for choosing Calapan Online Palengke.', 9),
(14, 'c81', 0, '2022-10-17 02:14:41', 'magandang araw po', 9),
(19, 'c81', 0, '2022-10-17 03:04:08', '3', 9),
(20, 'c81', 0, '2022-10-17 03:04:08', '12', 9),
(21, 'c81', 0, '2022-10-17 03:04:08', '1', 9),
(22, 'c81', 0, '2022-10-17 03:04:08', '3', 9),
(23, 'c81', 0, '2022-10-17 03:04:08', '3', 9),
(24, 'c81', 0, '2022-10-17 03:04:08', '123', 9),
(25, 'c81', 0, '2022-10-17 03:04:09', '213', 9),
(26, 'c81', 0, '2022-10-17 03:04:09', '12', 9),
(27, 'c81', 0, '2022-10-17 03:04:09', '312', 9),
(28, 'c81', 0, '2022-10-17 03:04:09', '312', 9),
(29, 'c81', 0, '2022-10-17 03:04:09', '3', 9),
(30, 'c81', 0, '2022-10-17 03:04:09', '3', 9),
(31, 'c81', 0, '2022-10-17 03:04:10', '3', 9),
(32, 'c81', 0, '2022-10-17 03:04:10', '3', 9),
(33, 'c81', 0, '2022-10-17 03:04:10', '123', 9),
(34, 'm31', 0, '2022-10-17 14:08:31', 'hello', 12),
(35, 'm0', 0, '2022-10-17 20:06:25', 'Good Day! Thank you for choosing Calapan Online Palengke.', 13),
(36, 'm31', 0, '2022-10-17 20:13:20', 'Good Day! Thank you for choosing Calapan Online Palengke.', 13),
(37, 'm0', 0, '2022-10-17 20:17:28', 'Good Day! Thank you for choosing Calapan Online Palengke.', 14),
(38, 'm31', 0, '2022-10-17 20:18:37', 'Good Day! Thank you for choosing Calapan Online Palengke.', 14),
(39, 'm31', 0, '2022-10-17 22:11:09', 'q', 14),
(40, 'm0', 0, '2022-10-18 05:55:29', 'Good Day! Thank you for choosing Calapan Online Palengke.', 17),
(82, 'c81', 0, '2022-10-21 04:46:30', '1', 18),
(83, 'c81', 0, '2022-10-21 04:46:30', '2', 18),
(42, 'm31', 0, '2022-10-18 06:14:33', 'Good Day! Thank you for choosing Calapan Online Palengke.', 18),
(43, 'm0', 0, '2022-10-18 11:37:11', 'Good Day! Thank you for choosing Calapan Online Palengke.', 19),
(86, 'c81', 0, '2022-10-21 04:46:31', '5', 18),
(79, 'm31', 0, '2022-10-21 04:46:24', '8', 18),
(81, 'm31', 0, '2022-10-21 04:46:25', '0', 18),
(77, 'm31', 0, '2022-10-21 04:46:24', '6', 18),
(80, 'm31', 0, '2022-10-21 04:46:25', '9', 18),
(78, 'm31', 0, '2022-10-21 04:46:24', '7', 18),
(74, 'm31', 0, '2022-10-21 04:46:23', '3', 18),
(75, 'm31', 0, '2022-10-21 04:46:23', '4', 18),
(84, 'c81', 0, '2022-10-21 04:46:30', '3', 18),
(85, 'c81', 0, '2022-10-21 04:46:31', '4', 18),
(87, 'c81', 0, '2022-10-21 04:46:31', '6', 18),
(88, 'c81', 0, '2022-10-21 04:46:32', '7', 18),
(89, 'c81', 0, '2022-10-21 04:46:32', '8', 18),
(76, 'm31', 0, '2022-10-21 04:46:23', '5', 18),
(73, 'm31', 0, '2022-10-21 04:46:22', '2', 18),
(72, 'm31', 0, '2022-10-21 04:46:21', '1', 18),
(90, 'c81', 0, '2022-10-21 04:46:32', '9', 18),
(91, 'c81', 0, '2022-10-21 04:46:33', '0', 18),
(92, 'm31', 0, '2022-10-21 04:46:38', '1', 18),
(93, 'm31', 0, '2022-10-21 04:46:38', '2', 18),
(94, 'm31', 0, '2022-10-21 04:46:39', '3', 18),
(95, 'm31', 0, '2022-10-21 04:46:39', '4', 18),
(96, 'm31', 0, '2022-10-21 04:46:39', '5', 18),
(97, 'm31', 0, '2022-10-21 04:46:40', '6', 18),
(98, 'm31', 0, '2022-10-21 04:46:40', '7', 18),
(99, 'm31', 0, '2022-10-21 04:46:40', '8', 18),
(100, 'm31', 0, '2022-10-21 04:46:40', '9', 18),
(101, 'm31', 0, '2022-10-21 04:46:41', '0', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_owner`
--

DROP TABLE IF EXISTS `tbl_owner`;
CREATE TABLE IF NOT EXISTS `tbl_owner` (
  `owner_id` int NOT NULL AUTO_INCREMENT,
  `owner_fname` varchar(20) DEFAULT NULL,
  `owner_mname` varchar(20) DEFAULT NULL,
  `owner_lname` varchar(20) DEFAULT NULL,
  `owner_email` varchar(35) DEFAULT NULL,
  `owner_password` varchar(50) DEFAULT NULL,
  `owner_cnum` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_owner`
--

INSERT INTO `tbl_owner` (`owner_id`, `owner_fname`, `owner_mname`, `owner_lname`, `owner_email`, `owner_password`, `owner_cnum`) VALUES
(1, 'Jander', 'Cruzat', 'Ramirez', '123@gmail.com', NULL, '09511177784');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_price`
--

DROP TABLE IF EXISTS `tbl_price`;
CREATE TABLE IF NOT EXISTS `tbl_price` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prod_id` int NOT NULL,
  `price` float NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_price`
--

INSERT INTO `tbl_price` (`id`, `prod_id`, `price`, `date_modified`) VALUES
(88, 205, 12, '2022-07-05 14:54:15'),
(87, 204, 210, '2022-07-05 14:24:47'),
(86, 205, 12, '2022-07-05 14:54:12'),
(85, 205, 20, '2022-07-05 14:21:22'),
(84, 204, 12, '2022-07-05 14:24:43'),
(83, 204, 12, '2022-07-05 14:08:48'),
(82, 205, 15, '2022-07-05 12:51:33'),
(81, 204, 12, '2022-07-05 14:05:58'),
(80, 204, 230, '2022-07-05 12:32:48'),
(89, 206, 150, '2022-07-06 23:59:43'),
(90, 206, 150, '2022-07-07 03:00:38'),
(91, 206, 150, '2022-07-07 03:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_price_history`
--

DROP TABLE IF EXISTS `tbl_price_history`;
CREATE TABLE IF NOT EXISTS `tbl_price_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prod_id` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_price_history`
--

INSERT INTO `tbl_price_history` (`id`, `date_updated`, `prod_id`, `price`) VALUES
(2, '2022-09-01 05:32:02', 206, '50.00'),
(3, '2022-09-02 05:32:02', 206, '40.00'),
(4, '2022-09-03 05:32:02', 206, '55.00'),
(5, '2022-09-04 05:32:02', 206, '51.00'),
(6, '2022-09-05 05:32:02', 206, '52.50'),
(7, '2022-09-06 05:32:02', 206, '60.00'),
(8, '2022-09-07 05:32:02', 206, '47.00'),
(9, '2022-09-08 05:32:02', 206, '44.00'),
(10, '2022-09-09 05:32:02', 206, '41.00'),
(11, '2022-09-10 05:32:02', 206, '42.00'),
(12, '2022-09-12 05:32:02', 206, '48.00'),
(13, '2022-09-12 05:32:02', 206, '51.00'),
(14, '2022-09-13 05:32:02', 206, '53.00'),
(15, '2022-09-14 05:32:02', 206, '56.00'),
(16, '2022-09-15 05:32:02', 206, '57.00'),
(17, '2022-09-16 05:32:02', 206, '59.00'),
(18, '2022-09-17 05:32:02', 206, '56.00'),
(19, '2022-09-18 05:32:02', 206, '55.70'),
(20, '2022-09-19 05:32:02', 206, '55.32'),
(21, '2022-09-20 05:32:02', 206, '54.23'),
(22, '2022-09-21 05:32:02', 206, '56.65'),
(23, '2022-09-22 05:32:02', 206, '57.87'),
(24, '2022-09-23 05:32:02', 206, '58.00'),
(25, '2022-09-24 05:32:02', 206, '56.89'),
(26, '2022-09-25 05:32:02', 206, '55.00'),
(27, '2022-09-26 05:32:02', 206, '54.00'),
(28, '2022-09-27 05:32:02', 206, '57.04'),
(29, '2022-09-28 05:32:02', 206, '55.64'),
(30, '2022-09-29 05:32:02', 206, '54.00'),
(1, '2022-10-21 06:20:06', 206, '55.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `prod_id` int NOT NULL AUTO_INCREMENT,
  `cat_id` int NOT NULL,
  `sub_id` int DEFAULT NULL,
  `prod_name` varchar(30) NOT NULL,
  `prod_description` text NOT NULL,
  `prod_unit` varchar(15) NOT NULL,
  `date_modified` datetime NOT NULL,
  `image_link` varchar(50) NOT NULL,
  `prod_price` double NOT NULL,
  `archive` tinyint(1) DEFAULT '0',
  `shop_id` int NOT NULL COMMENT 'id of assigned shop who sells the product',
  PRIMARY KEY (`prod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=235 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`prod_id`, `cat_id`, `sub_id`, `prod_name`, `prod_description`, `prod_unit`, `date_modified`, `image_link`, `prod_price`, `archive`, `shop_id`) VALUES
(208, 12, NULL, 'Legs/Drumstick', 'Chicken Legs/Drumstick', '33', '2022-07-07 00:02:48', 'public/images/products/208.jpg', 240, 0, 0),
(207, 12, NULL, 'Atay Balunan', 'Chicken Liver and Gizzard', '33', '2022-07-07 00:01:43', 'public/images/products/207.jpg', 240, 0, 9),
(206, 12, NULL, 'Adidas', 'Chicken Adidas ng Manok ', '33', '2022-07-07 14:26:13', 'public/images/products/206.jpg', 123, 0, 9),
(209, 12, NULL, 'Pitcho', 'Chicken Pitcho', '33', '2022-07-07 00:03:47', 'public/images/products/209.jpg', 240, 0, 0),
(210, 12, NULL, 'Whole Chicken', 'Dressed Whole Chicken', '33', '2022-07-07 00:04:44', 'public/images/products/210.jpg', 240, 0, 0),
(211, 12, NULL, 'Chicken Wings', 'Chicken Wings', '33', '2022-07-07 00:05:31', 'public/images/products/211.jpg', 240, 0, 9),
(212, 12, NULL, 'Footlong', 'Sweet footlong', '33', '2022-07-07 00:08:05', 'public/images/products/212.jpg', 400, 0, 0),
(213, 12, NULL, 'Liempo', 'Liempo', '33', '2022-07-07 00:09:33', 'public/images/products/213.jpg', 380, 0, 0),
(214, 12, NULL, 'Longganisa', 'Pork longganisa', '33', '2022-07-07 00:10:51', 'public/images/products/214.jpg', 380, 0, 0),
(215, 12, NULL, 'Pata', 'Pork Pata', '33', '2022-07-07 00:11:33', 'public/images/products/215.jpg', 300, 0, 0),
(216, 12, NULL, 'Porkchop', 'porkchop', '33', '2022-07-07 00:12:22', 'public/images/products/216.jpg', 340, 0, 0),
(217, 12, NULL, 'Kasim', 'Kasim', '33', '2022-07-07 00:13:13', 'public/images/products/217.jpg', 350, 0, 0),
(218, 12, NULL, 'Gotohin', 'beef gotohin', '33', '2022-07-07 00:15:47', 'public/images/products/218.jpg', 280, 0, 0),
(219, 12, NULL, 'Beef Pata', 'beef pata', '33', '2022-07-07 00:16:46', 'public/images/products/219.jpg', 220, 0, 9),
(220, 12, NULL, 'Beef Ribs', 'beef ribs', '33', '2022-07-07 00:17:27', 'public/images/products/220.jpg', 360, 0, 9),
(221, 13, NULL, 'Don Pilas', 'Don Pilas', '33', '2022-07-07 00:59:28', 'public/images/products/221.jpg', 100, 0, 0),
(222, 13, NULL, 'Tilapia', 'Live Tilapia', '33', '2022-07-07 01:01:41', 'public/images/products/222.jpg', 135, 0, 0),
(223, 13, NULL, 'Pusit', 'Pusit', '33', '2022-07-07 01:02:44', 'public/images/products/223.jpg', 190, 0, 0),
(224, 13, NULL, 'Pulang Buntot', 'pulang buntot', '33', '2022-07-07 01:03:26', 'public/images/products/224.jpg', 190, 0, 0),
(225, 13, NULL, 'Salmon Head', 'salmon', '33', '2022-07-07 01:04:39', 'public/images/products/225.jpg', 200, 0, 0),
(226, 13, NULL, 'Tanigue', 'tanigue', '33', '2022-07-07 01:05:36', 'public/images/products/226.jpg', 375, 0, 0),
(227, 13, NULL, 'Bangus', 'Bangus', '33', '2022-07-07 01:06:48', 'public/images/products/227.jpg', 200, 0, 9),
(228, 14, NULL, 'Pipino Local', 'Pipino Mindoro', '33', '2022-07-07 01:09:02', 'public/images/products/228.jpg', 50, 0, 0),
(229, 14, NULL, 'Ampalaya', 'ampalaya ', '33', '2022-07-07 01:11:28', 'public/images/products/229.jpg', 80, 0, 9),
(230, 14, NULL, 'Bawang ', 'garlic', '33', '2022-07-07 01:12:50', 'public/images/products/230.jpg', 95, 0, 9),
(231, 14, NULL, 'Baguio Beans', 'fresh from baguio', '33', '2022-07-07 01:14:06', 'public/images/products/231.jpg', 140, 0, 9),
(232, 14, NULL, 'Carrots', 'Carrots', '33', '2022-07-07 01:14:46', 'public/images/products/232.jpg', 100, 0, 9),
(233, 14, NULL, 'Kalabasa', 'kalabasa', '33', '2022-07-07 01:16:09', 'public/images/products/233.jpg', 52.5, 0, 0),
(234, 14, NULL, 'Kalamansi', 'Calamansi', '33', '2022-07-07 01:26:17', 'public/images/products/234.jpg', 50, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

DROP TABLE IF EXISTS `tbl_shop`;
CREATE TABLE IF NOT EXISTS `tbl_shop` (
  `shop_id` int NOT NULL AUTO_INCREMENT,
  `owner_id` int NOT NULL,
  `shop_name` varchar(25) NOT NULL,
  `shop_description` varchar(500) NOT NULL,
  `image_link` varchar(50) NOT NULL,
  PRIMARY KEY (`shop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `owner_id`, `shop_name`, `shop_description`, `image_link`) VALUES
(9, 1, 'Vegetable Shop', 'Vegetable shop from calapan', '9.jpg'),
(8, 1, 'Meat Shop', 'Meat shop from calapan', '8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop_prod`
--

DROP TABLE IF EXISTS `tbl_shop_prod`;
CREATE TABLE IF NOT EXISTS `tbl_shop_prod` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shop_id` int NOT NULL,
  `prod_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=247 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_shop_prod`
--

INSERT INTO `tbl_shop_prod` (`id`, `shop_id`, `prod_id`) VALUES
(237, 9, 229),
(236, 9, 206),
(246, 8, 206),
(238, 9, 207),
(239, 9, 231),
(240, 9, 227),
(241, 9, 230),
(242, 9, 219),
(243, 9, 220),
(244, 9, 232),
(245, 9, 211);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_cat`
--

DROP TABLE IF EXISTS `tbl_sub_cat`;
CREATE TABLE IF NOT EXISTS `tbl_sub_cat` (
  `sub_id` int NOT NULL AUTO_INCREMENT,
  `cat_id` int NOT NULL,
  `sub_category` varchar(30) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_sub_cat`
--

INSERT INTO `tbl_sub_cat` (`sub_id`, `cat_id`, `sub_category`) VALUES
(8, 12, 'chicken'),
(7, 12, 'pork'),
(9, 12, 'beef'),
(10, 12, 'goat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

DROP TABLE IF EXISTS `tbl_transaction`;
CREATE TABLE IF NOT EXISTS `tbl_transaction` (
  `trans_id` int NOT NULL AUTO_INCREMENT,
  `cust_id` int NOT NULL,
  `cour_id` int NOT NULL,
  `trans_date` varchar(20) NOT NULL,
  `pending` datetime NOT NULL,
  `process` datetime NOT NULL,
  `delivery` datetime NOT NULL,
  `delivered` datetime NOT NULL,
  `cancel` datetime NOT NULL,
  `trans_status` varchar(2) NOT NULL,
  `trans_note` text NOT NULL,
  `delivery_fee` decimal(10,2) NOT NULL,
  `rating` int NOT NULL,
  `review` varchar(500) NOT NULL,
  `marketer_id` int NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`trans_id`, `cust_id`, `cour_id`, `trans_date`, `pending`, `process`, `delivery`, `delivered`, `cancel`, `trans_status`, `trans_note`, `delivery_fee`, `rating`, `review`, `marketer_id`) VALUES
(1, 83, 0, '2022-07-06', '2022-09-05 20:51:53', '2022-09-06 20:51:53', '2022-09-06 21:51:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'C', 'rwerwer', '20.00', 2, '', 31),
(3, 83, 30, '2022-07-06', '0000-00-00 00:00:00', '2022-10-16 05:31:02', '2022-09-07 07:39:15', '2022-09-07 07:39:48', '2022-09-05 20:51:53', 'OP', 'dasd', '0.00', 5, 'ssssssssssss', 31),
(18, 81, 0, '2022-10-17', '2022-10-17 22:13:51', '2022-10-17 22:14:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'OP', '', '200.50', 0, '', 31),
(15, 81, 0, '2022-10-17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'P', '', '0.00', 0, '', 0),
(14, 81, 0, '2022-10-17', '2022-10-17 12:17:28', '2022-10-17 12:18:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'OP', '', '0.00', 0, '', 31),
(8, 83, 0, '2022-10-16', '2022-10-16 05:16:18', '2022-10-16 05:35:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'OP', '', '0.00', 0, '', 31),
(9, 81, 0, '2022-10-16', '2022-10-16 11:50:34', '2022-10-16 18:14:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'OP', '', '0.00', 0, '', 31),
(13, 81, 0, '2022-10-17', '2022-10-17 12:06:25', '2022-10-17 12:13:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'OP', '', '0.00', 0, '', 31),
(11, 81, 0, '2022-10-16', '2022-10-16 17:27:48', '2022-10-16 17:28:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'OP', '', '0.00', 0, '', 31),
(12, 81, 0, '2022-10-16', '2022-10-16 17:35:04', '2022-10-16 18:13:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'OP', '', '0.00', 0, '', 31),
(19, 81, 0, '2022-10-18', '2022-10-18 03:37:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'P', '', '200.50', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

DROP TABLE IF EXISTS `tbl_unit`;
CREATE TABLE IF NOT EXISTS `tbl_unit` (
  `unit_id` int NOT NULL AUTO_INCREMENT,
  `unit` varchar(15) NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`unit_id`, `unit`) VALUES
(35, 'l'),
(34, 'tali'),
(33, 'kg'),
(36, 'ml');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
