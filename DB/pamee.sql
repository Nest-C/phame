-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 06:38 AM
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
-- Database: `pamee`
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
(2, 2, 'Pd_2__0.jpg'),
(3, 3, 'Pd_3__0.jpg'),
(4, 4, 'Pd_4__0.jpg'),
(5, 5, 'Pd_5__0.jpg'),
(6, 6, 'Pd_6__0.jpg'),
(7, 7, 'Pd_7__0.jpg'),
(8, 8, 'Pd_8__0.jpg'),
(9, 9, 'Pd_9__0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `log_id` int(10) NOT NULL,
  `Emp_id` int(10) NOT NULL,
  `Log_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Or_id` int(10) NOT NULL,
  `Or_name` varchar(100) NOT NULL,
  `Or_add` text NOT NULL,
  `Or_tel` varchar(10) NOT NULL,
  `pd_id` int(10) NOT NULL,
  `Or_total` int(10) NOT NULL,
  `Order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Or_id`, `Or_name`, `Or_add`, `Or_tel`, `pd_id`, `Or_total`, `Order_date`) VALUES
(1, 'a', '123 a b c', '011345', 1, 600, '2022-04-05 03:02:36'),
(2, 'BeDeeN', 'pacha utid 125', '05948150', 8, 400, '2022-04-09 11:07:44');

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
(1, 6, 100, 5);

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
  `pd_status` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pd_id`, `pd_name`, `ct_id`, `pd_detail`, `pd_price`, `pd_onhand`, `pd_status`) VALUES
(1, 'ผ้าสเตย์(ผ้าลาย)', 2, 'ผ้าที่มีน้ำหนักเบา มีความยืดหยุ่นได้ดี เมื่อสวมใส่แล้วสามารถยืดขยายออกได้ดี และสามารถคืนตัวกลับมาในสภาพเดิม เหมาะสำหรับชุดว่ายน้ำ', 180, 50, ''),
(2, 'ผ้าสเตย์(ผ้าลาย)', 2, 'ผ้าที่มีน้ำหนักเบา มีความยืดหยุ่นได้ดี เมื่อสวมใส่แล้วสามารถยืดขยายออกได้ดี และสามารถคืนตัวกลับมาในสภาพเดิม เหมาะสำหรับชุดว่ายน้ำ', 180, 100, ''),
(3, 'ผ้าไมโครหรือผ้ากีฬา (ผ้าลาย)', 3, 'ผ้าที่ผลิตจากเส้นด้ายโพลีเอสเตอร์(Polyester) ที่มีขนาดเล็กกว่า และ เพิ่มช่องว่างในเส้นใย ทำให้เนื้อสัมผัสเนียนนุ่มกว่า และด้วยเนื้อละเอียดนี่เองทำให้มันทนต่อการเปื้อน แห้งไวมาก', 150, 65, ''),
(4, 'ผ้าไมโครหรือผ้ากีฬา (ผ้าสี)', 3, 'ผ้าที่ผลิตจากเส้นด้ายโพลีเอสเตอร์(Polyester) ที่มีขนาดเล็กกว่า และ เพิ่มช่องว่างในเส้นใย ทำให้เนื้อสัมผัสเนียนนุ่มกว่า และด้วยเนื้อละเอียดนี่เองทำให้มันทนต่อการเปื้อน แห้งไวมาก', 150, 30, ''),
(5, 'ผ้าคอตตอนสแปนเด็กซ์(ผ้าลาย)', 1, 'ผ้าทำจากใยยางสังเคราะห์ที่ มีคุณสมบัติคือ น้ำหนักเบา มีความยืดหยุ่นได้ดี เมื่อสวมใส่แล้วสามารถยืดขยายออกได้ดี และสามารถคืนตัวกลับมาในสภาพเดิม และสามารถระบายเหงื่อได้ดีอีกด้วย', 150, 42, ''),
(6, 'ผ้าคอตตอนสแปนเด็กซ์(ผ้าสี)', 1, 'ผ้าทำจากใยยางสังเคราะห์ที่ มีคุณสมบัติคือ น้ำหนักเบา มีความยืดหยุ่นได้ดี เมื่อสวมใส่แล้วสามารถยืดขยายออกได้ดี และสามารถคืนตัวกลับมาในสภาพเดิม และสามารถระบายเหงื่อได้ดีอีกด้วย', 150, 64, ''),
(7, 'ผ้าสำลี', 5, 'ผ้าที่ทอจากเส้นใยฝ้ายหรือ Cotton มีคุณสมบัติ เป็นฉนวนให้ความอบอุ่น ซับน้ำได้ดี ผ้าหนา ซักแห้งยาก  ใช้ไปนานๆ เนื้อผ้าจะแข็งขึ้นและเป็นขน', 120, 189, ''),
(8, 'ผ้ายีนส์(ยีนส์ยืด)', 4, 'ผ้าทอจากฝ้ายชนิดหนึ่ง แต่ไม่ได้อ่อนนุ่มเหมือนผ้าฝ้ายทั่วไป มีความแข็ง ความกระด้างมากกว่าผ้าฝ้ายที่ทอแบบอื่นๆ ผ้าเดนิมทั่วไป เราจะเห็นการทอจากด้ายอย่างน้อย 2 เส้น ทอขนานกันเป็นลายทาง', 150, 462, ''),
(9, 'ผ้ายีนส์ (ยีนส์ไม่ยืด)', 1, 'ผ้าทอจากฝ้ายชนิดหนึ่ง แต่ไม่ได้อ่อนนุ่มเหมือนผ้าฝ้ายทั่วไป มีความแข็ง ความกระด้างมากกว่าผ้าฝ้ายที่ทอแบบอื่นๆ ผ้าเดนิมทั่วไป เราจะเห็นการทอจากด้ายอย่างน้อย 2 เส้น ทอขนานกันเป็นลายทาง', 150, 354, '');

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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pd_id`);

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
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Or_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
