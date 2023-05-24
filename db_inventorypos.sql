-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 04:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventorypos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catid` int(11) NOT NULL,
  `category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catid`, `category`) VALUES
(1, 'Gadget'),
(2, 'Mobile'),
(3, 'Laptop'),
(4, 'ATK'),
(5, 'Ipads'),
(8, 'Tables'),
(9, 'Speakers'),
(10, 'Tripod'),
(11, 'Jam'),
(12, 'Baterai'),
(13, 'Hanphone'),
(14, 'Smartphone'),
(15, 'SSD'),
(16, 'Toolkit'),
(17, 'Converter'),
(18, 'Cable'),
(19, 'Sparepart'),
(20, 'Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `invoice_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `subtotal` double NOT NULL,
  `tax` double NOT NULL,
  `discount` double NOT NULL,
  `total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`invoice_id`, `customer_name`, `order_date`, `subtotal`, `tax`, `discount`, `total`, `paid`, `due`, `payment_type`) VALUES
(11, 'Masruri', '2023-04-14', 400000, 20000, 0, 420000, 1000000, -580000, 'Cash'),
(12, 'Faiz', '2023-04-14', 1020000, 51000, 0, 1071000, 100000, 1071000, 'Card'),
(13, 'Azhar', '2023-04-14', 300000, 15000, 0, 315000, 100000, 315000, 'Check'),
(14, 'Abil', '2023-05-02', 1700000, 85000, 0, 1785000, 100000, 1785000, 'Cash'),
(15, 'Nanda', '2023-05-02', 19740000, 987000, 0, 20727000, 10000000, 10727000, 'Cash'),
(17, 'Dandi', '2023-05-09', 170000, 8500, 0, 178500, 100000, 78500, 'Check'),
(18, 'Zafran', '2023-05-09', 15600000, 780000, 0, 16380000, 10000000, 6380000, 'Check');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_details`
--

CREATE TABLE `tbl_invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_invoice_details`
--

INSERT INTO `tbl_invoice_details` (`id`, `invoice_id`, `product_id`, `product_name`, `qty`, `price`, `order_date`) VALUES
(26, 12, 18, '', 6, 170000, '2023-04-14'),
(27, 13, 16, '', 4, 75000, '2023-04-14'),
(46, 14, 18, '', 10, 170000, '2023-05-02'),
(66, 15, 17, 'Converter USB to HDMI Female', 6, 40000, '2023-05-02'),
(67, 15, 15, 'Vgen SSD M.2 NVMe', 5, 3900000, '2023-05-02'),
(68, 17, 18, 'Kabel FO 1 core', 1, 170000, '2023-05-09'),
(73, 18, 21, 'Monitor Samsung 19Inch', 2, 1100000, '2023-05-09'),
(74, 18, 20, 'Processor Intel Core I5 ', 2, 2300000, '2023-05-09'),
(75, 18, 24, 'RAM Vgen 8GB', 2, 500000, '2023-05-09'),
(76, 18, 15, 'Vgen SSD M.2 NVMe', 2, 3900000, '2023-05-09'),
(77, 11, 17, 'Converter USB to HDMI Female', 10, 40000, '2023-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `pcategory` varchar(200) NOT NULL,
  `purchaseprice` float NOT NULL,
  `saleprice` float NOT NULL,
  `pstock` int(11) NOT NULL,
  `pdescription` varchar(250) NOT NULL,
  `pimage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pid`, `pname`, `pcategory`, `purchaseprice`, `saleprice`, `pstock`, `pdescription`, `pimage`) VALUES
(15, 'Vgen SSD M.2 NVMe', 'SSD', 3730000, 3900000, 13, 'ssd vgen official store', '64126e820e553.jpg'),
(16, 'Oben set 115 in 1', 'Toolkit', 68000, 75000, 6, 'obeng set hp, laptop dan pc', '64126f384a88a.jpg'),
(17, 'Converter USB to HDMI Female', 'Converter', 35000, 40000, 16, 'Converter USB to HDMI Female', '64126fe6bfc5a.jpg'),
(18, 'Kabel FO 1 core', 'Cable', 150000, 170000, 6, 'test', '6412937eb1c6c.jpg'),
(20, 'Processor Intel Core I5 ', 'Komputer', 2100000, 2300000, 198, 'Intel I5 gen11', '64599debd0cd1.jpg'),
(21, 'Monitor Samsung 19Inch', 'Komputer', 900000, 1100000, 198, 'original samsung ', '64599e2b61630.jpg'),
(22, 'Splitter 4 port', 'Komputer', 150000, 200000, 200, 'hdmi to hdmi', '64599e8725171.jpg'),
(23, 'Thermal Paste ', 'Komputer', 5000, 6500, 200, 'asli ademnya kaya adem sari', '64599eafd63f7.jpg'),
(24, 'RAM Vgen 8GB', 'Komputer', 450000, 500000, 198, 'asli original vgen', '64599ef105c93.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `useremail` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `username`, `useremail`, `password`, `role`) VALUES
(1, 'Muhammad Masruri', 'masruri@gmail.com', '123', 'Admin'),
(2, 'Siska Sulistiawati', 'siskasulistia@gmail.com', '123', 'User'),
(3, 'Mila Ulfaturoiqoh', 'milaulfa@gmail.com', '123', 'User'),
(4, 'Azhar Saputra', 'azhar@gmail.com', '123', 'User'),
(5, 'Faiz Awalul Fakikhin', 'faiz@gmail.com', '123', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `tbl_invoice_details`
--
ALTER TABLE `tbl_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_invoice_details`
--
ALTER TABLE `tbl_invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
