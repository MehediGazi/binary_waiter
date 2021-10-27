-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2021 at 11:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bwdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `cid` int(11) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `cmail` varchar(50) NOT NULL,
  `cpass` varchar(50) NOT NULL,
  `caddr` varchar(80) DEFAULT NULL,
  `cnum` varchar(14) DEFAULT NULL,
  `carea` varchar(15) DEFAULT NULL,
  `cimg` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`cid`, `fname`, `lname`, `cmail`, `cpass`, `caddr`, `cnum`, `carea`, `cimg`) VALUES
(1, 'Mehedi ', 'Hasan Shanto', 'mhasan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Dhaka', '01516114334', 'Mohammadpur', 'files/1Mehedi .jpg'),
(3, 'Sezan', 'Mahmud', 'sezan@yahoo.com', 'c8dfece5cc68249206e4690fc4737a8d', 'Dhaka', '0167329832', 'Norda', 'files/default.jpg'),
(4, 'Navely', 'Hossain Prima', 'navely@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Mohammadpur, Dhaka', '0167783923', 'Mohammadpur', 'files/4Navely.jpg'),
(5, 'Imam', 'Sir', 'imam@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Mirpur', '0167336377', 'Mirpur', 'files/default.jpg'),
(6, 'Saikat', 'Mahmud', 'saikat@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Nodda', '01516114334', 'Norda', 'files/6Saikat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Menu`
--

CREATE TABLE `Menu` (
  `iid` int(11) NOT NULL,
  `rid` int(11) DEFAULT NULL,
  `iname` varchar(25) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `cat` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Menu`
--

INSERT INTO `Menu` (`iid`, `rid`, `iname`, `price`, `cat`) VALUES
(2, 3, 'Fried Chicken', 90, 'Fast Food'),
(3, 4, 'French Fries', 95, 'Fast FoodD'),
(4, 4, 'French Fries', 95, 'Fast FoodD'),
(5, 4, 'French Fries', 95, 'Fast FoodD'),
(6, 4, 'French Fries', 95, 'Fast FoodD'),
(8, 3, 'French Fries', 100, 'Fast Food'),
(9, 3, 'Coleslaw', 60, 'Fast Food'),
(10, 2, 'French Fries', 95, 'Fast FoodD'),
(11, 1, 'French Fries', 95, 'Fast FoodD'),
(13, 6, 'French Fries', 100, 'Fast FoodD'),
(16, 6, 'French Fries', 95, 'Fast FoodD'),
(17, 8, 'French Fries', 95, 'Fast FoodD'),
(19, 8, 'French Fries', 95, 'Fast FoodD'),
(20, 8, 'French Fries', 95, 'Fast FoodD'),
(21, 3, 'Regular Burger', 220, 'Fast Food'),
(24, 6, 'Regular Burger', 265, 'Main');

-- --------------------------------------------------------

--
-- Table structure for table `OrderDetails`
--

CREATE TABLE `OrderDetails` (
  `oid` int(11) NOT NULL,
  `rid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `otime` datetime DEFAULT NULL,
  `stime` datetime DEFAULT NULL,
  `bill` float DEFAULT NULL,
  `vat` int(11) DEFAULT 0,
  `stat` int(11) DEFAULT 0,
  `paid` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `OrderDetails`
--

INSERT INTO `OrderDetails` (`oid`, `rid`, `cid`, `otime`, `stime`, `bill`, `vat`, `stat`, `paid`) VALUES
(15, 3, 4, '2021-01-13 06:46:47', '2021-01-18 01:39:08', 950, 0, 1, 1),
(16, 3, 4, '2021-01-13 07:05:56', '2021-01-18 02:32:07', 190, 0, 1, 1),
(17, 4, 4, '2021-01-13 07:11:56', NULL, 546.25, 0, 0, 0),
(20, 4, 4, '2021-01-13 07:24:38', NULL, 460, 0, 0, 0),
(23, 4, 4, '2021-01-13 07:28:03', NULL, 598, 0, 0, 0),
(25, 4, 4, '2021-01-13 07:30:19', NULL, 276, 0, 0, 0),
(28, 4, 4, '2021-01-13 07:33:33', NULL, 270.25, 0, 1, 0),
(29, 4, 4, '2021-01-13 07:33:57', NULL, 736, 0, 0, 0),
(30, 3, 4, '2021-01-13 12:10:38', '2021-01-18 03:04:20', 550, 0, 1, 1),
(31, 3, 1, '2021-01-18 02:38:22', NULL, 1760, 0, 0, 1),
(32, 3, 1, '2021-01-18 02:38:55', NULL, 540, 0, 0, 1),
(33, 3, 1, '2021-01-18 02:43:52', '2021-01-21 06:02:20', 970, 0, 1, 1),
(34, 3, 4, '2021-01-21 01:20:30', '2021-01-21 01:50:45', 1180, 0, 0, 1),
(36, 4, 4, '2021-01-22 17:29:52', NULL, 630, 95, 0, 0),
(37, 2, 4, '2021-01-31 01:14:18', NULL, 540, 81, 0, 0),
(38, 1, 4, '2021-01-31 01:35:27', NULL, 1280, 256, 0, 0),
(39, 1, 4, '2021-01-31 01:36:37', NULL, 640, 128, 0, 0),
(40, 1, 4, '2021-01-31 01:36:47', '2021-01-31 03:11:29', 640, 128, 0, 0),
(41, 3, 4, '2021-01-31 02:16:35', '2021-01-31 13:14:49', 280, 0, 0, 1),
(42, 1, 4, '2021-01-31 02:24:39', '2021-01-31 03:19:57', 320, 64, 1, 0),
(43, 3, 4, '2021-01-31 02:33:41', '2021-01-31 08:52:54', 90, 18, 1, 0),
(44, 1, 4, '2021-01-31 02:35:38', '2021-01-31 02:46:32', 640, 128, 1, 0),
(45, 8, 1, '2021-01-31 16:21:16', NULL, 710, 107, 0, 0),
(46, 8, 1, '2021-01-31 16:26:24', '2021-01-31 16:39:17', 710, 107, 1, 1),
(47, 2, 1, '2021-01-31 16:37:29', NULL, 540, 81, 0, 0),
(48, 8, 1, '2021-01-31 16:41:29', '2021-01-31 16:54:02', 710, 107, 1, 1),
(49, 3, 4, '2021-01-31 20:06:58', '2021-01-31 20:19:35', 735, 0, 1, 1),
(50, 3, 1, '2021-02-01 01:30:30', NULL, 905, 0, 0, 0),
(51, 3, 1, '2021-02-15 21:15:02', '2021-02-15 21:46:50', 545, 0, 1, 1),
(52, 3, 1, '2021-02-15 22:07:48', NULL, 510, 0, 0, 1),
(53, 3, 4, '2021-02-23 21:51:45', '2021-02-23 22:03:07', 870, 0, 0, 1),
(54, 3, 6, '2021-04-09 01:46:28', '2021-04-09 01:58:40', 990, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `oid` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL,
  `iid` int(11) DEFAULT NULL,
  `quan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`oid`, `rid`, `iid`, `quan`) VALUES
(13, 3, 1, 1),
(13, 3, 8, 2),
(14, 3, 1, 1),
(14, 3, 2, 2),
(14, 3, 8, 1),
(14, 3, 9, 3),
(15, 3, 1, 1),
(15, 3, 2, 2),
(15, 3, 8, 1),
(15, 3, 9, 2),
(16, 3, 1, 1),
(16, 3, 2, 1),
(17, 4, 3, 2),
(17, 4, 4, 1),
(17, 4, 5, 1),
(20, 4, 3, 1),
(20, 4, 4, 2),
(23, 4, 3, 2),
(23, 4, 4, 2),
(25, 4, 3, 2),
(28, 4, 4, 1),
(28, 4, 5, 1),
(29, 4, 3, 3),
(29, 4, 4, 2),
(30, 3, 1, 1),
(30, 3, 2, 2),
(30, 3, 8, 1),
(31, 3, 1, 5),
(31, 3, 2, 2),
(31, 3, 8, 2),
(31, 3, 9, 3),
(32, 3, 1, 1),
(32, 3, 2, 2),
(32, 3, 8, 1),
(33, 3, 1, 2),
(33, 3, 2, 2),
(33, 3, 9, 3),
(34, 3, 1, 3),
(34, 3, 2, 2),
(34, 3, 8, 2),
(34, 3, 9, 1),
(36, 4, 3, 1),
(36, 4, 4, 1),
(36, 4, 5, 2),
(36, 4, 6, 1),
(37, 2, 10, 3),
(38, 1, 11, 4),
(39, 1, 11, 2),
(40, 1, 11, 2),
(41, 3, 1, 1),
(41, 3, 2, 2),
(42, 1, 11, 1),
(43, 3, 1, 1),
(44, 1, 11, 2),
(45, 8, 17, 3),
(45, 8, 19, 1),
(45, 8, 20, 2),
(46, 8, 17, 3),
(46, 8, 19, 1),
(46, 8, 20, 2),
(47, 2, 10, 3),
(48, 8, 17, 3),
(48, 8, 19, 1),
(48, 8, 20, 2),
(49, 3, 1, 2),
(49, 3, 2, 1),
(49, 3, 8, 1),
(49, 3, 9, 1),
(50, 3, 1, 1),
(50, 3, 2, 1),
(50, 3, 8, 2),
(50, 3, 9, 1),
(51, 3, 2, 3),
(51, 3, 8, 2),
(51, 3, 9, 1),
(52, 3, 2, 5),
(52, 3, 9, 1),
(53, 3, 2, 3),
(53, 3, 8, 1),
(53, 3, 9, 1),
(53, 3, 21, 2),
(54, 3, 2, 5),
(54, 3, 8, 2),
(54, 3, 9, 2),
(54, 3, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Restaurants`
--

CREATE TABLE `Restaurants` (
  `rid` int(11) NOT NULL,
  `rname` varchar(50) DEFAULT NULL,
  `rmail` varchar(50) NOT NULL,
  `rpass` varchar(50) NOT NULL,
  `raddr` varchar(80) DEFAULT NULL,
  `rarea` varchar(25) DEFAULT NULL,
  `rnum` varchar(14) DEFAULT NULL,
  `vat` int(11) DEFAULT NULL,
  `tabs` int(11) DEFAULT NULL,
  `rimg` varchar(200) DEFAULT 'files/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Restaurants`
--

INSERT INTO `Restaurants` (`rid`, `rname`, `rmail`, `rpass`, `raddr`, `rarea`, `rnum`, `vat`, `tabs`, `rimg`) VALUES
(1, 'Dhaka Food', 'dhkfood20@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Mohammadpur, Dhaka', 'Mohammadpur', '01715305132', 20, 20, 'files/default.jpg'),
(2, 'Chillox', 'chillox@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Banani, Dhaka', 'Banani', '01712342223', 15, 35, 'files/default.jpg'),
(3, 'KFC', 'kfcbd@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Gulshan', 'Gulshan', '013452323', 0, 3, 'files/default.jpg'),
(4, 'Pinewood', 'pine@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Dhanmondi 32', 'Dhanmondi', '0167228873', 15, 27, 'files/default.jpg'),
(5, 'Kacha Morich', 'kacha@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Mohamadpur', 'Mohammadpur', '01516114334', 15, 10, 'files/kacha@gmail.com5.jpg'),
(6, 'BFC', 'bfc@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Mohammadpur', 'Mohammadpur', '01516114334', 15, 25, 'files/bfc@gmail.com.jpg'),
(8, 'Dhaba 2', 'dhaba@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Banani', 'Banani', '01516114334', 15, 30, 'files/dhaba@gmail.com.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `email` (`cmail`);

--
-- Indexes for table `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `Restaurants`
--
ALTER TABLE `Restaurants`
  ADD PRIMARY KEY (`rid`),
  ADD UNIQUE KEY `rmail` (`rmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Customers`
--
ALTER TABLE `Customers`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Menu`
--
ALTER TABLE `Menu`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `Restaurants`
--
ALTER TABLE `Restaurants`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
