-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 11:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chill_n_grub`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_desc` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_desc`) VALUES
(1, 'Appetizer'),
(2, 'Dessert'),
(3, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `mesa`
--

CREATE TABLE `mesa` (
  `tbl_id` int(11) NOT NULL,
  `tbnum` varchar(64) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'A' COMMENT 'A is for available and O for occupied',
  `qr_link` varchar(128) NOT NULL,
  `qr_img_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mesa`
--

INSERT INTO `mesa` (`tbl_id`, `tbnum`, `status`, `qr_link`, `qr_img_file`) VALUES
(17, '1', 'A', 'http://192.168.0.106/Chill-N-Grub15/includes/processlogintable.php?tablenumber=1', 'table1-converge_1621867565.png'),
(18, '2', 'A', 'http://192.168.0.106/Chill-N-Grub15/includes/processlogintable.php?tablenumber=2', 'table2-converge_1621867585.png'),
(19, '3', 'A', 'http://192.168.0.106/Chill-N-Grub15/includes/processlogintable.php?tablenumber=3', 'table3-converge_1621867631.png'),
(20, '4', 'A', 'http://192.168.0.106/Chill-N-Grub15/includes/processlogintable.php?tablenumber=4', 'table4-converge_1621867659.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(100) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `od_id` int(11) NOT NULL,
  `order_number` varchar(100) NOT NULL,
  `tblnum` varchar(11) NOT NULL,
  `total_amount` double NOT NULL,
  `date` date NOT NULL,
  `stat` varchar(1) NOT NULL DEFAULT 'U' COMMENT 'P is for paid and U'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `price_id` int(11) NOT NULL,
  `prod_id` varchar(64) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`price_id`, `prod_id`, `price`) VALUES
(107, '221', 250),
(108, '222', 198),
(109, '223', 205),
(110, '224', 175),
(111, '225', 150),
(112, '226', 75),
(113, '227', 235),
(114, '228', 120),
(115, '229', 70),
(116, '230', 99),
(117, '231', 50),
(118, '232', 80);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(64) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prod_img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `cat_id`, `prod_img`) VALUES
(221, 'Broccoli and Garlic-Ricotta Toasts with Hot Honey', 1, 'img1_1621862435.jpg'),
(222, 'Pasta e Fagioli with Escarole', 1, 'img3_1621862533.jpeg'),
(223, 'Flatbread Caprese', 1, 'img4_1621862557.jpg'),
(224, 'Goat Milk-and-Corn Panna Cotta with Blackberries', 2, 'Vegan-Panna-Cotta-11_1621863549.jpg'),
(225, 'Sea Bream Crudo with Lemon and Olives', 2, 'img15_1621862879.jpg'),
(226, 'Strawberry Gelato', 2, 'Strawberry-gelato-5-1024x683_1621863696.jpg'),
(227, 'Pumpkin-Gingersnap Tiramisù', 2, 'tiramisu-cheesecake-rotated_1621863811.jpg'),
(228, 'Chocolate-and-Pistachio Biscotti', 2, 'IMG_6981_1621863865.jpg'),
(229, 'Aperitivo', 3, 'What-is-Aperitivo_banner_1621864668.jpg'),
(230, 'Negroni', 3, 'download_1621864694.jfif'),
(231, 'Americano', 3, 'emre-gencer-364602-unsplash-1_1621864715.jpg'),
(232, 'Bellini', 3, 'Bellini-feature_1621864772.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `usertype` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `usertype`) VALUES
(5, 'tagabantay1', 'tagabantay', 'W'),
(6, 'tagasolve1', 'tagasolve', 'C'),
(7, 'tagapamahala1', 'tagapamahala', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mesa`
--
ALTER TABLE `mesa`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
