-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 05:03 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(255) NOT NULL,
  `PRODUCT_ID` varchar(300) NOT NULL,
  `PRODUCT_NAME` varchar(300) NOT NULL,
  `PRODUCT_PRICE` int(200) NOT NULL,
  `PRODUCT_QUANTITY` int(255) NOT NULL,
  `PRODUCT_IMAGE` varchar(300) NOT NULL,
  `USER_EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `PRODUCT_ID`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `PRODUCT_QUANTITY`, `PRODUCT_IMAGE`, `USER_EMAIL`) VALUES
(27, '3', 'Veena', 65000, 5, 'music/pictures/veena.jpg', 'nadongocynthia@gmail.com'),
(28, '4', 'Trumpet', 17000, 1, 'music/pictures/trumpet.jpg', 'nadongocynthia@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ID` int(11) NOT NULL,
  `ItemName` text NOT NULL,
  `ItemQuantity` int(50) NOT NULL,
  `ItemPhoto` varchar(200) NOT NULL,
  `ItemPrice` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID`, `ItemName`, `ItemQuantity`, `ItemPhoto`, `ItemPrice`) VALUES
(1, 'Harp', 13, 'music/pictures/harp.jpg', 20000),
(2, 'Frenchhorn', 10, 'music/pictures/frenchhorn.png', 15000),
(3, 'Veena', 7, 'music/pictures/veena.jpg', 13000),
(4, 'Trumpet', 24, 'music/pictures/trumpet.jpg', 17000),
(5, 'Violin', 38, 'music/pictures/violin.jpg', 18000);

-- --------------------------------------------------------

--
-- Table structure for table `new_user`
--

CREATE TABLE `new_user` (
  `Name` varchar(255) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `Telephone_no` int(10) NOT NULL,
  `Password` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_user`
--

INSERT INTO `new_user` (`Name`, `Email`, `Telephone_no`, `Password`) VALUES
('Cynthia Nadongo', 'nadongocynthia@gmail.com', 795843900, 12345678),
('chk', 'cv@gmail.com', 795843888, 123456789),
('luiz', 'luiz@gmail.com', 795843900, 12345678),
('luiz', 'luiz@gmail.com', 795843900, 12345678);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(255) NOT NULL,
  `ORDER_ID` varchar(300) NOT NULL,
  `ORDER_PRICE` varchar(300) NOT NULL,
  `ORDER_STATUS` varchar(300) NOT NULL,
  `USER_EMAIL` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `ORDER_ID`, `ORDER_PRICE`, `ORDER_STATUS`, `USER_EMAIL`) VALUES
(1, '470237', '', 'Pending', ''),
(2, '278975', '', 'Pending', ''),
(3, '949058', '17000', 'Pending', 'nadongocynthia@gmail.com'),
(4, '475393', '', 'Pending', ''),
(5, '338373', '13000', 'Pending', 'nadongocynthia@gmail.com'),
(6, '265012', '13000', 'Pending', 'nadongocynthia@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
