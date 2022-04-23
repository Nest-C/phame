-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 05:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phamee`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ct_id` int(11) NOT NULL,
  `ct_name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ct_id`, `ct_name`) VALUES
(1, 'ผ้าคอตตอนสแปนเด็กซ์'),
(2, 'ผ้าสเตย์'),
(3, 'ผ้าไมโคร'),
(4, 'ผ้ายีนส์'),
(5, 'ผ้าสำลี');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `img_name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `pd_id`, `img_name`) VALUES
(27, 12, 'Pd_12_2022_04_23_22_46_01_0.jpg'),
(28, 13, 'Pd_13_2022_04_23_22_46_27_0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `log_id` int(10) NOT NULL,
  `Emp_id` int(10) NOT NULL,
  `Log_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`log_id`, `Emp_id`, `Log_date`) VALUES
(1, 0, '2022-04-19 17:56:42'),
(2, 0, '2022-04-20 00:00:50'),
(3, 0, '2022-04-20 02:23:36'),
(4, 0, '2022-04-20 09:39:21'),
(5, 0, '2022-04-20 09:42:19'),
(6, 0, '2022-04-23 22:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Or_id` int(10) NOT NULL,
  `Or_name` varchar(100) NOT NULL,
  `Or_add` text NOT NULL,
  `Or_tel` varchar(10) NOT NULL,
  `Or_total` int(10) NOT NULL,
  `Order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Or_id`, `Or_name`, `Or_add`, `Or_tel`, `Or_total`, `Order_date`) VALUES
(1, 'a', '123 a b c', '011345', 600, '2022-04-05 03:02:36'),
(2, 'BeDeeN', 'pacha utid 125', '05948150', 400, '2022-04-09 11:07:44'),
(13, 'nest', '12345 azxcvb1dsa', '012345678', 1500, '2022-04-19 17:44:02'),
(14, 'เนส', 'Mars', '084569987', 300, '2022-04-19 18:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `Or_id` int(10) NOT NULL,
  `pd_id` int(10) NOT NULL,
  `pd_price` int(20) NOT NULL,
  `Order_amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`Or_id`, `pd_id`, `pd_price`, `Order_amount`) VALUES
(1, 2, 100, 3),
(1, 5, 100, 5),
(1, 6, 100, 5),
(13, 4, 150, 10),
(14, 4, 150, 1),
(14, 5, 150, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pd_id` int(11) NOT NULL,
  `pd_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `ct_id` int(11) NOT NULL,
  `pd_detail` text COLLATE utf8_bin NOT NULL,
  `pd_price` int(11) NOT NULL,
  `pd_onhand` int(11) NOT NULL,
  `pd_date` datetime(1) NOT NULL,
  `datecome` date NOT NULL DEFAULT current_timestamp(),
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pd_id`, `pd_name`, `ct_id`, `pd_detail`, `pd_price`, `pd_onhand`, `pd_date`, `datecome`, `quantity`) VALUES
(12, 'ผ้า1', 1, 'ผ้า', 50, 250, '2022-04-23 22:46:01.0', '2022-04-23', 0),
(13, 'ผ้า2', 1, 'ผ้า2', 10, 500, '2022-04-23 22:46:27.0', '2022-04-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `receive`
--

CREATE TABLE `receive` (
  `recive_id` int(11) NOT NULL,
  `Emp_id` int(11) NOT NULL,
  `recive_date` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `re_id` int(11) NOT NULL,
  `re_date` date NOT NULL DEFAULT current_timestamp(),
  `Or_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(1) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'มีในสต็อก'),
(2, 'ใกล้หมด'),
(3, 'หมด');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Emp_id` int(11) NOT NULL,
  `Emp_Name` varchar(100) NOT NULL,
  `Emp_Phone` varchar(11) NOT NULL,
  `Emp_Add` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Emp_id`, `Emp_Name`, `Emp_Phone`, `Emp_Add`, `password`) VALUES
(1, 'admin', '876543212', '123 abc 456 qwe', '123456'),
(5, 'Coron', '0123465', '0871123', '0123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Or_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`Or_id`,`pd_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `receive`
--
ALTER TABLE `receive`
  ADD PRIMARY KEY (`recive_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Or_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `receive`
--
ALTER TABLE `receive`
  MODIFY `recive_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
