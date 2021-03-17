-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2021 at 06:25 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `system_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id` int(11) NOT NULL,
  `user_code` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` varchar(20) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `user_code`, `username`, `password`, `name`, `level`, `status`) VALUES
(1, 'PS186722', 'admin', 'admin', 'Folk', 'admin', 'use'),
(2, '1547', 'awd', 'awd', '54', 'sale', 'use'),
(3, '187774', 'admin', 'admin', 'EIEi', 'member', 'delete'),
(4, '1002', 'folk', '1234', 'folk', 'sale', 'use'),
(5, '1003', 'folk2', '1234', 'folk2', 'member', 'use');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bill_sale`
--

CREATE TABLE IF NOT EXISTS `tb_bill_sale` (
  `bill_id` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `total_sale` double NOT NULL,
  `get_money` double NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_bill_sale`
--

INSERT INTO `tb_bill_sale` (`bill_id`, `pay_date`, `total_sale`, `get_money`, `status`) VALUES
(6, '2021-02-21', 237.5, 237.5, 'use'),
(7, '2021-02-21', 10, 10, 'use'),
(8, '2021-02-21', 0, 10, 'use'),
(9, '2021-02-21', 15, 15, 'use'),
(10, '2021-02-21', 15, 15, 'use'),
(11, '2021-02-21', 0, 15, 'use'),
(12, '2021-02-21', 10, 10, 'use'),
(13, '2021-02-21', 10, 10, 'use'),
(14, '2021-02-21', 10, 10, 'use'),
(15, '2021-02-21', 25, 25, 'use'),
(17, '2021-02-21', 0, 0, 'use'),
(18, '2021-02-21', 0, 0, 'use'),
(19, '2021-02-21', 0, 0, 'use'),
(20, '2021-02-21', 25, 25, 'use'),
(21, '2021-02-21', 10, 10, 'use');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bill_sale_detail`
--

CREATE TABLE IF NOT EXISTS `tb_bill_sale_detail` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_bill_sale_detail`
--

INSERT INTO `tb_bill_sale_detail` (`id`, `bill_id`, `product_id`, `qty`, `total`) VALUES
(1, 6, 1, 2.5, 37.5),
(2, 6, 2, 20, 200),
(3, 7, 2, 1, 10),
(4, 9, 1, 1, 15),
(5, 10, 1, 1, 15),
(6, 12, 2, 1, 10),
(7, 13, 2, 1, 10),
(8, 14, 2, 1, 10),
(9, 15, 1, 1, 15),
(10, 15, 2, 1, 10),
(11, 20, 1, 1, 15),
(12, 20, 2, 1, 10),
(13, 21, 2, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_group_product`
--

CREATE TABLE IF NOT EXISTS `tb_group_product` (
  `id` int(11) NOT NULL,
  `group_code` varchar(255) DEFAULT NULL,
  `group_product_name` varchar(255) NOT NULL,
  `group_product_name_eng` varchar(255) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_group_product`
--

INSERT INTO `tb_group_product` (`id`, `group_code`, `group_product_name`, `group_product_name_eng`, `detail`, `status`) VALUES
(1, 'Code787', 'ทั่วไป', 'ETC.', '', 'use'),
(2, '1001', 'น้ำเปล่า', 'Water', '', 'use'),
(3, '1002', 'ขนม', 'Eiei', '', 'use'),
(4, 'test', 'test', 'test', 'test', 'delete'),
(5, '1003', 'test', 'test', 'ttest', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE IF NOT EXISTS `tb_product` (
  `id` int(11) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `group_product_id` int(11) NOT NULL,
  `product_detail` varchar(255) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id`, `product_code`, `product_name`, `product_price`, `group_product_id`, `product_detail`, `status`) VALUES
(1, '1548874114', 'น้ำดื่ม', 15, 2, NULL, 'use'),
(2, '8859102130007', 'กาแฟ', 10, 1, '...', 'use');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sale_temp`
--

CREATE TABLE IF NOT EXISTS `tb_sale_temp` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock`
--

CREATE TABLE IF NOT EXISTS `tb_stock` (
  `id` int(11) NOT NULL,
  `bill_id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_stock`
--

INSERT INTO `tb_stock` (`id`, `bill_id`, `user`, `created_date`, `status`) VALUES
(1, '1515', 'folk', '2021-01-29', 'use'),
(2, '186722', 'Folk', '2021-01-29', 'use'),
(3, 'eiei', 'folk', '2021-02-21', 'use'),
(4, '18799', 'Folk', '2021-02-21', 'use');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock_detail`
--

CREATE TABLE IF NOT EXISTS `tb_stock_detail` (
  `id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_stock_detail`
--

INSERT INTO `tb_stock_detail` (`id`, `stock_id`, `product_id`, `qty`, `price`, `status`) VALUES
(1, 1, 1, 10, 15, 'use'),
(2, 1, 2, 20, 10, 'use'),
(5, 2, 1, 20, 15, 'use'),
(6, 2, 2, 30, 10, 'use'),
(7, 0, 1, 3, 15, 'use'),
(8, 0, 2, 20, 10, 'use'),
(9, 0, 1, 3, 15, 'use'),
(10, 0, 2, 20, 10, 'use'),
(11, 3, 1, 1, 15, 'use'),
(12, 3, 2, 1, 10, 'use'),
(13, 4, 1, 1, 15, 'use'),
(14, 4, 2, 1, 10, 'use');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock_temp`
--

CREATE TABLE IF NOT EXISTS `tb_stock_temp` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bill_sale`
--
ALTER TABLE `tb_bill_sale`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `tb_bill_sale_detail`
--
ALTER TABLE `tb_bill_sale_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_group_product`
--
ALTER TABLE `tb_group_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sale_temp`
--
ALTER TABLE `tb_sale_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_stock`
--
ALTER TABLE `tb_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_stock_detail`
--
ALTER TABLE `tb_stock_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_stock_temp`
--
ALTER TABLE `tb_stock_temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_bill_sale`
--
ALTER TABLE `tb_bill_sale`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tb_bill_sale_detail`
--
ALTER TABLE `tb_bill_sale_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_group_product`
--
ALTER TABLE `tb_group_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_sale_temp`
--
ALTER TABLE `tb_sale_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_stock`
--
ALTER TABLE `tb_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_stock_detail`
--
ALTER TABLE `tb_stock_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_stock_temp`
--
ALTER TABLE `tb_stock_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
