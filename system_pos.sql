-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2021 at 02:09 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `user_code` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `user_code`, `username`, `password`, `name`, `status`) VALUES
(1, 'PS186722', 'admin', 'admin', 'Folk', 'use'),
(2, '1547', 'awd', 'awd', '54', 'use'),
(3, '187774', 'admin', 'admin', 'EIEi', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `tb_group_product`
--

CREATE TABLE `tb_group_product` (
  `id` int(11) NOT NULL,
  `group_code` varchar(255) DEFAULT NULL,
  `group_product_name` varchar(255) NOT NULL,
  `group_product_name_eng` varchar(255) NOT NULL,
  `detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_group_product`
--

INSERT INTO `tb_group_product` (`id`, `group_code`, `group_product_name`, `group_product_name_eng`, `detail`, `status`) VALUES
(1, 'Code787', 'ทั่วไป', 'ETC.', '', 'use'),
(2, '1001', 'น้ำเปล่า', 'Water', '', 'use'),
(3, '1002', 'ขนม', 'Eiei', '', 'use'),
(4, 'test', 'test', 'test', 'test', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id` int(11) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `group_product_id` int(11) NOT NULL,
  `product_detail` varchar(255) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id`, `product_code`, `product_name`, `product_price`, `group_product_id`, `product_detail`, `status`) VALUES
(1, '1548874114', 'น้ำดื่ม', 15, 2, NULL, 'use'),
(2, '8859102130007', 'กาแฟ', 10, 1, '...', 'use');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock`
--

CREATE TABLE `tb_stock` (
  `id` int(11) NOT NULL,
  `bill_id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_stock`
--

INSERT INTO `tb_stock` (`id`, `bill_id`, `user`, `created_date`, `status`) VALUES
(1, '1515', 'folk', '2021-01-29', 'use'),
(2, '186722', 'Folk', '2021-01-29', 'use');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock_detail`
--

CREATE TABLE `tb_stock_detail` (
  `id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_stock_detail`
--

INSERT INTO `tb_stock_detail` (`id`, `stock_id`, `product_id`, `qty`, `price`, `status`) VALUES
(1, 1, 1, 10, 15, 'use'),
(2, 1, 2, 20, 10, 'use'),
(5, 2, 1, 20, 15, 'use'),
(6, 2, 2, 30, 10, 'use');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock_temp`
--

CREATE TABLE `tb_stock_temp` (
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_group_product`
--
ALTER TABLE `tb_group_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_stock`
--
ALTER TABLE `tb_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_stock_detail`
--
ALTER TABLE `tb_stock_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_stock_temp`
--
ALTER TABLE `tb_stock_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
