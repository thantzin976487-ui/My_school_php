-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2026 at 03:30 PM
-- Server version: 8.4.7
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_school_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `pay_fee`
--

DROP TABLE IF EXISTS `pay_fee`;
CREATE TABLE IF NOT EXISTS `pay_fee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `s_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pay_fee`
--

INSERT INTO `pay_fee` (`id`, `s_name`, `s_course`, `payment_date`, `amount`, `payment_method`, `created_at`, `image`, `s_id`) VALUES
(13, 'BoBo', 'Web Development', '1111-11-11', '500000', 'Cash', '2026-11-17 07:00:42', '1794022666_1fd0a7e4df9625e5ad8a7138680c077a.jpg', 11),
(12, 'Su Su', 'Computer Basic', '2026-11-07', '1000000', 'WavePay', '2026-11-07 03:38:21', '1793343434_57f8468b1641fe878f7c9e12470f9435.jpg', 10),
(8, 'Kyaw Kyaw', 'Web Development', '2026-11-11', '500000', 'Cash', '2026-10-30 06:49:39', '1792828894_videoframe_3557.png', 8),
(10, 'Kyaw Kyaw', 'Web Development', '2026-11-11', '500000', 'Cash', '2026-10-30 06:51:55', '1792828894_videoframe_3557.png', 8),
(11, 'Mg Mg', 'Graphic Design', '2026-10-30', '500000', 'Cash', '2026-10-30 06:56:24', '1793343357_d02b02208b2e7b7255f46d763a248c93.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `school_fee`
--

DROP TABLE IF EXISTS `school_fee`;
CREATE TABLE IF NOT EXISTS `school_fee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `s_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remain_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

DROP TABLE IF EXISTS `student_list`;
CREATE TABLE IF NOT EXISTS `student_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `s_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_d_o_b` date NOT NULL,
  `s_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_ph_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`id`, `s_name`, `image`, `s_d_o_b`, `s_gender`, `s_ph_number`, `s_address`, `s_course`, `created_at`) VALUES
(11, 'BoBo', '1794022666_1fd0a7e4df9625e5ad8a7138680c077a.jpg', '2008-12-12', 'Male', '0978451263', 'PyinOoLwin', 'Web Development', '2026-11-07 03:37:46'),
(8, 'Kyaw Kyaw', '1792828894_videoframe_3557.png', '2010-10-10', 'Male', '09888777666', 'Yangon', 'Web Development', '2026-10-24 08:01:34'),
(9, 'Mg Mg', '1793343357_d02b02208b2e7b7255f46d763a248c93.jpg', '2010-02-22', 'Male', '09778866441', 'Mandalay', 'Graphic Design', '2026-10-30 06:55:57'),
(10, 'Su Su', '1793343434_57f8468b1641fe878f7c9e12470f9435.jpg', '2009-10-10', 'Female', '09888555444', 'Taunggyi', 'Computer Basic', '2026-10-30 06:57:14'),
(12, 'Ulla Rollins', '1795150926_Screenshot (10).png', '2013-04-18', 'Male', '401', 'Et similique vero et', 'Graphic Design', '2026-11-20 05:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(25, 'asdf', 'asdf@gmail.com', '$2y$10$p9UfXkyoLeRN9EU9QeLopOERYYBHf5mDb8JrAGVHjm1ETkEEdtlxO', '2026-11-20 05:09:51'),
(24, 'byquf', 'luxynuhy@mailinator.com', '$2y$10$WkQHao67v3AcOJvZDhyZhO0AF9tuyrw6SL4GADyRDH8/Bm3a5M5aa', '2026-11-20 05:04:04'),
(23, 'MG MG', 'mgmg@gmail.com', '$2y$10$6sSGnMneYmMIFZaTIlHh3eqWrVgC0vyBQ6Dx8XIpXWhT0/.VT8HO.', '2026-11-18 05:23:42'),
(22, 'heehaha', 'hehe@gmail.com', '$2y$10$9pjRFgeW3rBtHJCCgAUTde56fm0BNpHuNC7VPKlMySinjwRLg85tW', '2026-11-18 05:15:08'),
(21, 'MG MG', 'mgmg@gmail.com', '$2y$10$IKgKTCKq3oZZrEQH.jgXv.QSgG1eo08WGKC1auFV.9rD.tk/q83pq', '2026-11-14 06:17:54'),
(20, 'MG MG', 'mgmg@gmail.com', '$2y$10$ANXRylT/0AdP2Iv2LsvUceFd2UHZ9Q9RBMldB6VN.RXmZXk93vTTy', '2026-11-07 03:36:23'),
(18, 'bbb', 'bbb@gmail.com', '$2y$10$0L/GNaUVQkld9Seg.V0VJOvdLAC6dCoHzXOj8ckfBqKU2/jTdA.yC', '2026-10-31 06:10:29'),
(19, 'Admin', 'admin@gmail.com', '$2y$10$qlR0MIMWQry9YGKtV5IRC.fi3VpgHeS9vJXP6f51QyPc4IWGwGdTm', '2026-10-31 06:16:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
