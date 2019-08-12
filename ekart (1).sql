-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2017 at 08:20 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekart`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `Id` int(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Pincode` int(10) NOT NULL,
  `Street` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`Id`, `Email`, `State`, `City`, `Pincode`, `Street`) VALUES
(1001, 'dheerendra172@gmail.com', 'uttar_pradesh', 'Lucknow', 226021, 'jankipuram'),
(1061, 'amitkumar1@gmail.com', 'uttar pradesh', 'lucknow', 226021, 'iet campus '),
(1038, 'dheerendra172@gmail.com', 'Uttar pradesh', 'Lucknow', 225015, 'gomti nagar'),
(1066, 'dheerendra172@gmail.com', 'up', 'luckknw', 226021, 'lucknow'),
(1067, '123@a.com', 'uttar pradesh', 'lucknow', 226021, 'iet campus ');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Mobile` varchar(13) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `Role` enum('Admin','Owner') NOT NULL DEFAULT 'Admin',
  `Gender` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `Address` text NOT NULL,
  `Date_joined` date NOT NULL,
  `Image` varchar(30) DEFAULT 'User.png'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Name`, `Email`, `Mobile`, `Password`, `Role`, `Gender`, `DOB`, `Address`, `Date_joined`, `Image`) VALUES
(10001, 'Dheerendra kumar', 'dheerenra173@outlook.com', '8756624232', 'd5e9cd48228be23ddb30312331db3a95ab94f1b351623c27513c4f3cb78432e8', 'Owner', 'Male', '1997-03-21', 'Uttar Pradesh Lucknow 226021', '2017-07-11', 'User.png'),
(10003, 'Dheerendra kumar', 'dheerenra173@outlook.com', '8756624232', 'd5e9cd48228be23ddb30312331db3a95ab94f1b351623c27513c4f3cb78432e8', 'Admin', 'Male', '1997-03-21', 'Uttar Pradesh Lucknow 226021', '2017-07-16', 'User.png');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `Sub_cat_id` int(11) NOT NULL,
  `Brand` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `Sub_cat_id`, `Brand`) VALUES
(8, 11, 'Nokia'),
(4, 11, 'samsung'),
(10, 11, 'MI'),
(11, 11, 'Oppo'),
(12, 11, 'Lenovo'),
(13, 11, 'Vivo'),
(14, 14, 'Dell'),
(15, 14, 'Lenovo'),
(16, 14, 'Hp'),
(17, 14, 'Accer'),
(18, 14, 'Asus'),
(19, 15, 'Asus'),
(20, 15, 'Zebronics'),
(21, 15, 'Dell'),
(24, 15, 'Lenovo'),
(23, 15, 'Hp'),
(25, 16, 'LG'),
(26, 16, 'Samsung'),
(27, 16, 'Micromax'),
(28, 16, 'Panasonic'),
(29, 16, 'Sony'),
(48, 46, 'Philips'),
(32, 18, 'Canon'),
(33, 18, 'Sony'),
(34, 19, 'Dell'),
(35, 19, 'I-Ball'),
(36, 19, 'Hp'),
(37, 19, 'Lenovo'),
(38, 20, 'Samsung'),
(39, 20, 'Panasonic'),
(40, 20, 'LG'),
(41, 20, 'Videocon'),
(42, 21, 'Voltas'),
(47, 21, 'LLoyad'),
(44, 21, 'Carrier'),
(45, 22, 'LG'),
(46, 22, 'Whirlpool');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `Product_id` int(10) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Quantity` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `Product_id`, `Email`, `Quantity`) VALUES
(35, 141, 'dheerendra172@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_id` int(5) NOT NULL,
  `Category` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_id`, `Category`) VALUES
(12, 'Electronics'),
(13, 'Appliances'),
(14, 'Men'),
(15, 'Women'),
(17, 'Books & More'),
(22, 'Home & Furnishing');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `Email` varchar(35) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Mobile` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`Email`, `Name`, `Mobile`) VALUES
('dheerendra172@gmail.com', 'Dheerendra kumar', '8756624232'),
('123@a.com', 'amit kumar', '12321312'),
('amitkumar1@gmail.com', 'amit kumar', '8795615352');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(15) NOT NULL,
  `Product_id` int(10) NOT NULL,
  `Main_image` text,
  `Image2` text,
  `Image3` text,
  `Image4` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `Product_id`, `Main_image`, `Image2`, `Image3`, `Image4`) VALUES
(4, 140, 'nokia 3310 i.png', 'nokia 3310 ivjpg.jpg', 'nokia-3310 ii.jpg', 'nokia-3310 iii.jpg'),
(5, 141, 'nokia-6 i.jpg', 'nokia 6 ii.jpg', 'nokia-6 iv.jpg', 'nokia-6 iii.jpg'),
(6, 142, 'Nokia-5 i.png', 'nokia-5 ii.jpg', 'Nokia_5 iii.png', 'Nokia 5 iv.jpg'),
(7, 143, 'dell xps13 i.jpg', 'dell xps 13 ii.jpg', 'dell xpa 13 iv.jpg', 'dell xps 13 iii.jpg'),
(8, 144, 'mi note 4 i.jpeg', 'mi note 4 ii.jpg', 'mi note 4 iv.jpeg', 'mi note 4 iii.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(15) NOT NULL,
  `Product_id` int(10) NOT NULL,
  `Order_date` date NOT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Shipment_day` date DEFAULT NULL,
  `Status` enum('Pending','Shipped') NOT NULL DEFAULT 'Pending',
  `Payment_id` int(10) DEFAULT NULL,
  `Add_id` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `Product_id`, `Order_date`, `Email`, `Shipment_day`, `Status`, `Payment_id`, `Add_id`, `Quantity`) VALUES
(1000000001, 143, '2017-08-04', 'dheerendra172@gmail.com', '2017-08-12', 'Pending', 1001, 1001, 2),
(1000000076, 143, '2017-09-02', '123@a.com', '2017-09-07', 'Pending', 1001, 1067, 1),
(1000000071, 141, '2017-09-01', 'dheerendra172@gmail.com', '2017-09-06', 'Pending', 1001, 1038, 1),
(1000000051, 144, '2017-09-01', 'dheerendra172@gmail.com', '2017-09-06', 'Pending', 1001, 1001, 1),
(1000000050, 143, '2017-09-01', 'amitkumar1@gmail.com', '2017-09-06', 'Pending', 1001, 1061, 1),
(1000000077, 142, '2017-09-02', 'dheerendra172@gmail.com', '2017-09-07', 'Pending', 1001, 1038, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_details`
-- (See below for the actual view)
--
CREATE TABLE `order_details` (
`Order_id` int(15)
,`Order_date` date
,`Shipment_day` date
,`Status` enum('Pending','Shipped')
,`Quantity` int(11)
,`Type` varchar(20)
,`Email` varchar(30)
,`Mobile` varchar(13)
,`Street` varchar(40)
,`Pincode` int(10)
,`city` varchar(30)
,`state` varchar(30)
,`Main_image` text
,`Name` text
,`Price` decimal(10,0)
,`Offer` decimal(5,0)
,`Brand` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `Type`) VALUES
(1001, 'Cash on Delivery'),
(1002, 'Net Banking'),
(1003, 'Debit Card'),
(1004, 'Wallet');

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `id` int(5) NOT NULL,
  `Mode` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_mode`
--

INSERT INTO `payment_mode` (`id`, `Mode`) VALUES
(1001, 'Cash on delivery'),
(1002, 'Net Banking'),
(1003, 'Wallets'),
(1004, 'Debit card');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_id` int(10) NOT NULL,
  `Name` text NOT NULL,
  `Color` varchar(35) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Offer` decimal(5,0) NOT NULL,
  `Quantity` int(5) NOT NULL,
  `Sold_quantity` int(5) NOT NULL DEFAULT '0',
  `Rating` decimal(1,0) DEFAULT '5',
  `Brand_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Name`, `Color`, `Price`, `Offer`, `Quantity`, `Sold_quantity`, `Rating`, `Brand_id`) VALUES
(146, 'abc', 'blue', '120000', '20', 25555, 0, '5', 4),
(144, 'Note 4', 'Grey,White,Golden', '12999', '15', 100, 0, '5', 10),
(143, 'Dell Xps 13', 'Grey,White', '57999', '10', 50, 0, '5', 14),
(142, 'Nokia 5', 'Blue,Black,Grey,Golden', '11999', '0', 100, 0, '5', 8),
(141, 'Nokia 6', 'Silver,Grey,Black,Yellow', '14999', '0', 100, 0, '5', 8),
(140, 'Nokia 3310', 'Orange,Blue,Yello,Grey', '3300', '0', 1000, 0, '5', 8);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `Id` int(20) NOT NULL,
  `Product_id` int(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Feed` text NOT NULL,
  `Rating` decimal(3,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`Id`, `Product_id`, `Email`, `Feed`, `Rating`) VALUES
(26, 140, 'dheerendra172@gmail.com', 'a solid phone', '4'),
(28, 143, 'dheerendra172@gmail.com', 'sdygflksadgklfshj', '5');

-- --------------------------------------------------------

--
-- Table structure for table `sold_quantity`
--

CREATE TABLE `sold_quantity` (
  `id` int(11) NOT NULL,
  `Product_id` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Sold_quantity` int(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `State` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `State`, `City`) VALUES
(1001, 'Uttar_pradesh', 'lucknow'),
(1002, 'Uttar_pradesh', 'kanpur'),
(1003, 'Uttar_pradesh', 'ghaziabad'),
(1004, 'Uttar_pradesh', 'balrampur'),
(1005, 'delhi', 'delhi'),
(1006, 'Uttar_pradesh', 'ghazipur');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `Sub_cat_id` int(11) NOT NULL,
  `Cat_id` int(11) NOT NULL,
  `Sub_cat` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`Sub_cat_id`, `Cat_id`, `Sub_cat`) VALUES
(14, 12, 'Laptops'),
(11, 12, 'Mobiles'),
(12, 12, 'Mobile Accessories'),
(13, 12, 'Smart Watches'),
(15, 12, 'Desktop PC'),
(16, 12, 'Television'),
(45, 22, 'Furnishing'),
(19, 12, 'Tablets'),
(20, 13, 'Washing Machine'),
(21, 13, 'Air Conditioners'),
(22, 13, 'Refrigerators'),
(23, 13, 'Kitchen Appliances'),
(24, 13, 'Home Appliances'),
(25, 14, 'Footwear'),
(26, 14, 'Top Wear'),
(27, 14, 'Bottom Wears'),
(28, 14, 'Sports Wears'),
(29, 14, 'Watches'),
(30, 14, 'Grooming'),
(31, 15, 'Clothings'),
(32, 15, 'Ethnic Wear'),
(33, 15, 'Footwear'),
(34, 15, 'Watches'),
(36, 15, 'Beauty Products'),
(37, 16, 'Kitchen and Dining'),
(38, 16, 'Furniture'),
(39, 16, 'Furnishing'),
(40, 16, 'Home Decore'),
(41, 16, 'Lightning'),
(42, 17, 'Books'),
(43, 17, 'Stationary'),
(44, 17, 'Gaming '),
(46, 22, 'Home Lighting');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Email` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Mobile` varchar(13) NOT NULL,
  `Password` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Name`, `Mobile`, `Password`) VALUES
('dheerendra172@gmail.com', 'Dheerendra kumar', '8756624232', 'd5e9cd48228be23ddb30312331db3a95ab94f1b351623c27513c4f3cb78432e8'),
('kumardheerenda86@gmail.com', 'prince', '8874216527', 'd5e9cd48228be23ddb30312331db3a95ab94f1b351623c27513c4f3cb78432e8'),
('suvit.ddebbarma@gmail.com', 'suvit debbarma', '9807662573', '5db54976dfd3421c5cc7899888ad19f9fb86622790f99225404a24172bcde8b3'),
('sudhirkumarmaurya6@gmail.com', 'Sudhir Maurya', '8923496427', 'a4a9eb80d4b82fbda66830a0e7bc91650714beb4c9cce8b386ab3609fe232ef9');

-- --------------------------------------------------------

--
-- Structure for view `order_details`
--
DROP TABLE IF EXISTS `order_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_details`  AS  select `orders`.`Order_id` AS `Order_id`,`orders`.`Order_date` AS `Order_date`,`orders`.`Shipment_day` AS `Shipment_day`,`orders`.`Status` AS `Status`,`orders`.`Quantity` AS `Quantity`,`payment`.`Type` AS `Type`,`user`.`Email` AS `Email`,`user`.`Mobile` AS `Mobile`,`address`.`Street` AS `Street`,`address`.`Pincode` AS `Pincode`,`address`.`City` AS `city`,`address`.`State` AS `state`,`images`.`Main_image` AS `Main_image`,`product`.`Name` AS `Name`,`product`.`Price` AS `Price`,`product`.`Offer` AS `Offer`,`brand`.`Brand` AS `Brand` from ((((((`orders` join `product`) join `payment`) join `user`) join `address`) join `images`) join `brand`) where ((`orders`.`Product_id` = `product`.`Product_id`) and (`orders`.`Product_id` = `images`.`Product_id`) and (`orders`.`Email` = `user`.`Email`) and (`orders`.`Add_id` = `address`.`Id`) and (`orders`.`Payment_id` = `payment`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `Sub_cat_id` (`Sub_cat_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Product_id` (`Product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `Add_id` (`Add_id`),
  ADD KEY `Product_id` (`Product_id`),
  ADD KEY `Payment_id` (`Payment_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_id`),
  ADD KEY `Brand_id` (`Brand_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Product_id` (`Product_id`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `sold_quantity`
--
ALTER TABLE `sold_quantity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Product_id` (`Product_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`Sub_cat_id`),
  ADD KEY `Cat_id` (`Cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1068;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000078;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;
--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `sold_quantity`
--
ALTER TABLE `sold_quantity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;
--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `Sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
