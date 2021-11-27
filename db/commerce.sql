-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 02:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(3) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerid` int(11) NOT NULL,
  `firstname` varchar(26) NOT NULL,
  `lastname` varchar(26) NOT NULL,
  `town` varchar(26) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `firstname`, `lastname`, `town`, `mobile`, `email`) VALUES
(1, 'Hashirama', 'Senju', 'Nairobi', '0712345678', 'konoha@gmail.com'),
(2, 'Madara', 'Uchiha', 'Mombasa', '0722888111', 'tsukuyomi@gmail.com'),
(3, 'Derrick', 'Kibuyu', 'Mombasa', '0712345345', 'derrick@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customerpassword`
--

CREATE TABLE `customerpassword` (
  `customerid` int(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerpassword`
--

INSERT INTO `customerpassword` (`customerid`, `password`) VALUES
(1, '08a2775f2ac96e8d35603269b694c1035950104c'),
(2, '1a851dc7b2a19bd7006c102f5b3ebbf1145d564a'),
(3, '19f8a8dac4630bbb23fe62b66ce81fc20cef109d');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `email`, `message`) VALUES
(4, 'konoha@gmail.com', 'I tried searching for a fridge on your site and did not get one. Please stock them.'),
(7, 'derrick@gmail.com', 'When will you have xylophones?');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(8) NOT NULL,
  `name` varchar(45) NOT NULL,
  `category` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `name`, `category`, `brand`, `price`, `image`) VALUES
(1, 'Hanan Tissue Paper', 'Household Supplies', 'Hanan', 30, 'tissue.jpeg'),
(2, 'Carrefour Face Towel', 'Household Supplies', 'Carrefour', 90, 'face-towel.jpg'),
(3, 'Pure Cotton Bath Towel', 'Household Supplies', 'Polo', 1500, 'bath-towel.jpg'),
(4, 'Colgate Herbal Tooth Paste', 'Household Supplies', 'Colgate', 1100, 'colgate-herbal.jpg'),
(5, 'Colgate Toothbrush Double Action', 'Household Supplies', 'Colgate', 80, 'colgate-double-action.jpg'),
(6, 'Harpic Power Plus Lavender', 'Household Supplies', 'Harpic', 324, 'harpic-lavender.jpg'),
(7, 'Dettol Glycerine Anti-bacterial Soap', 'Household Supplies', 'Dettol', 180, 'dettol-soap.jpg'),
(8, 'Kiwi Black Polish', 'Household Supplies', 'Kiwi', 95, 'kiwi-black.png'),
(9, 'Black Shoe Brush', 'Household Supplies', 'TeePee', 480, 'shoebrush.jpg'),
(10, 'iPhone 13', 'Electronics', 'Apple', 85000, 'iphone13.jpg'),
(11, 'iPhone 13 Pro Max', 'Electronics', 'Apple', 135000, 'iphone13-pro-max.jpg'),
(12, 'MacBook Pro 14', 'Electronics', 'Apple', 155000, 'macbook14.jpg'),
(13, 'MacBook Air', 'Electronics', 'Apple', 110000, 'macbook-air.jpg'),
(14, 'MacBook Pro 16', 'Electronics', 'Apple', 230000, 'macbook16.jpg'),
(15, 'Apple AirPods', 'Electronics', 'Apple', 13000, 'airpods.jpg'),
(16, 'Apple AirPods Pro', 'Electronics', 'Apple', 20000, 'airpods-pro.jpg'),
(17, 'MagSafe Charger', 'Electronics', 'Apple', 3000, 'magsafe.jpg'),
(18, '45W USB-C charger', 'Electronics', 'Samsung', 4000, '45W-charger.jpg'),
(19, 'Samsung Galaxy S21', 'Electronics', 'Samsung', 78000, 'samsung-s21.png'),
(20, 'Samsung Galaxy S21 Ultra', 'Electronics', 'Samsung', 120000, 'Samsung-Galaxy-S21-ultra.jpg'),
(21, 'Samsung Galaxy Buds', 'Electronics', 'Samsung', 10000, 'samsung-buds.jpg'),
(22, 'Sony WH-1000XM4 Headphones', 'Electronics', 'Sony', 32000, 'sonyxm4.jpg'),
(23, 'Bose QC 35 Headphones', 'Electronics', 'Bose', 32000, 'bose-qc35.jpg'),
(24, 'PlayStation 5', 'Electronics', 'Sony', 60000, 'ps5.jpg'),
(25, 'Dualsense Wireless Controller', 'Electronics', 'Sony', 8000, 'dualsense.jpg'),
(26, 'XBOX Series X', 'Electronics', 'Microsoft', 60000, 'Xbox-Series-X.jpg'),
(27, 'XBOX Wireless Controller', 'Electronics', 'Microsoft', 8000, 'xbox_controller.jpg'),
(28, 'Krackles Tangy Tomato Flavored Potato Crisps', 'Snacks', 'Krackles', 44, 'tangy-tomato.jpg'),
(29, 'Pringles Sour Cream & Onion Potato Crisps', 'Snacks', 'Pringles', 345, 'pringles.jpg'),
(30, 'Cadbury Top Deck chocolate', 'Snacks', 'Cadbury', 120, 'chocolate.png'),
(31, 'Delamere Strawberry Yoghurt', 'Drinks', 'Delamere', 100, 'strawberry-yoghurt.png'),
(32, 'Afia Mango Juice', 'Drinks', 'Afia', 60, 'mango-juice.jpg'),
(33, 'Afia Apple Juice', 'Drinks', 'Afia', 60, 'apple-juice.jpg'),
(34, 'Dasani Mineral Water', 'Drinks', 'Dasani', 30, 'dasani.jpg'),
(35, 'Fanta Orange Soda', 'Drinks', 'Coca-Cola', 60, 'fanta.png'),
(36, 'Coca-Cola diet coke', 'Drinks', 'Coca-Cola', 60, 'coke-zero.jpeg'),
(37, 'Samsung S21 phone case', 'Accessories', 'Samsung', 2500, 's21-case.jpg'),
(38, 'Samsung S21 Ultra Alcantara case', 'Accessories', 'Samsung', 2600, 's21-ultra-alcantara.png'),
(39, 'iPhone 13 leather case', 'Accessories', 'Apple', 3000, 'iphone13-case.jpg'),
(40, 'iPhone 13 Pro Max leather case', 'Accessories', 'Apple', 3000, 'iphone13promax-case.jpg'),
(41, 'Apple Watch Series 7', 'Accessories', 'Apple', 26000, 'apple-watch.jpg'),
(42, 'Samsung Galaxy Watch Active', 'Accessories', 'Samsung', 20000, 'samsung-watch.jpg'),
(43, 'Leather Jacket', 'Clothing', 'Gucci', 34000, 'gucci-leather-jacket.jpg'),
(44, '3 piece suit', 'Clothing', 'Louis Vuitton', 60000, 'LVthree-piece-suit.jpg'),
(45, 'Beanie Hat', 'Clothing', 'Nike', 5000, 'nike-beanie.jpg'),
(46, 'Nike Air Jordans', 'Clothing', 'Nike', 30000, 'nike-jordans.jpg'),
(47, 'Official Black Leather shoes', 'Clothing', 'Bata', 15000, 'leather-shoes.jpg'),
(48, 'Cotton Socks', 'Clothing', 'Peak', 600, 'peak-socks.jpg'),
(49, 'Blue Ball Point Pen', 'Stationery', 'BIC', 30, 'blue-pen.jpg'),
(50, 'HB Pencil', 'Stationery', 'Steadler', 50, 'HB-pencil.jpg'),
(51, 'Black Ball Point Pen', 'Stationery', 'BIC', 30, 'black-pen.jpg'),
(52, 'A4 Single ruled 120pg', 'Stationery', 'Kartasi', 120, 'A4-120pg.png'),
(53, 'Loose Leaf 50 sheets', 'Stationery', 'Kartasi', 80, 'loose-leaf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `productid` int(8) NOT NULL,
  `quantity` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`productid`, `quantity`) VALUES
(1, 32),
(2, 20),
(3, 20),
(4, 28),
(5, 19),
(6, 20),
(7, 40),
(8, 20),
(9, 15),
(10, 6),
(11, 6),
(12, 5),
(13, 7),
(14, 5),
(15, 15),
(16, 8),
(17, 10),
(18, 8),
(19, 7),
(20, 3),
(21, 9),
(22, 4),
(23, 4),
(24, 3),
(25, 6),
(26, 5),
(27, 9),
(28, 37),
(29, 30),
(30, 55),
(31, 29),
(32, 30),
(33, 30),
(34, 30),
(35, 40),
(36, 37),
(37, 10),
(38, 7),
(39, 10),
(40, 10),
(41, 9),
(42, 14),
(43, 10),
(44, 8),
(45, 15),
(46, 14),
(47, 25),
(48, 29),
(49, 50),
(50, 50),
(51, 50),
(52, 30),
(53, 25);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionid` int(15) NOT NULL,
  `customerid` int(11) NOT NULL,
  `amount` int(15) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionid`, `customerid`, `amount`, `date`, `status`) VALUES
(33, 2, 255200, '2021-11-27', 'Confirmed'),
(714, 1, 2370, '2021-11-27', 'Confirmed'),
(4069, 1, 100522, '2021-11-27', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `transactiondetail`
--

CREATE TABLE `transactiondetail` (
  `transactionid` int(15) NOT NULL,
  `productid` int(8) NOT NULL,
  `quantity` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactiondetail`
--

INSERT INTO `transactiondetail` (`transactionid`, `productid`, `quantity`) VALUES
(33, 18, 1),
(33, 20, 1),
(33, 21, 1),
(33, 24, 1),
(33, 25, 1),
(33, 38, 1),
(33, 42, 1),
(33, 46, 1),
(33, 48, 1),
(714, 1, 3),
(714, 4, 2),
(714, 5, 1),
(4069, 1, 5),
(4069, 23, 1),
(4069, 26, 1),
(4069, 27, 1),
(4069, 28, 3),
(4069, 36, 4);

-- --------------------------------------------------------

--
-- Table structure for table `transactionitems`
--

CREATE TABLE `transactionitems` (
  `transactionid` int(15) NOT NULL,
  `1` tinyint(1) NOT NULL DEFAULT 0,
  `2` tinyint(1) NOT NULL DEFAULT 0,
  `3` tinyint(1) NOT NULL DEFAULT 0,
  `4` tinyint(1) NOT NULL DEFAULT 0,
  `5` tinyint(1) NOT NULL DEFAULT 0,
  `6` tinyint(1) NOT NULL DEFAULT 0,
  `7` tinyint(1) NOT NULL DEFAULT 0,
  `8` tinyint(1) NOT NULL DEFAULT 0,
  `9` tinyint(1) NOT NULL DEFAULT 0,
  `10` tinyint(1) NOT NULL DEFAULT 0,
  `11` tinyint(1) NOT NULL DEFAULT 0,
  `12` tinyint(1) NOT NULL DEFAULT 0,
  `13` tinyint(1) NOT NULL DEFAULT 0,
  `14` tinyint(1) NOT NULL DEFAULT 0,
  `15` tinyint(1) NOT NULL DEFAULT 0,
  `16` tinyint(1) NOT NULL DEFAULT 0,
  `17` tinyint(1) NOT NULL DEFAULT 0,
  `18` tinyint(1) NOT NULL DEFAULT 0,
  `19` tinyint(1) NOT NULL DEFAULT 0,
  `20` tinyint(1) NOT NULL DEFAULT 0,
  `21` tinyint(1) NOT NULL DEFAULT 0,
  `22` tinyint(1) NOT NULL DEFAULT 0,
  `23` tinyint(1) NOT NULL DEFAULT 0,
  `24` tinyint(1) NOT NULL DEFAULT 0,
  `25` tinyint(1) NOT NULL DEFAULT 0,
  `26` tinyint(1) NOT NULL DEFAULT 0,
  `27` tinyint(1) NOT NULL DEFAULT 0,
  `28` tinyint(1) NOT NULL DEFAULT 0,
  `29` tinyint(1) NOT NULL DEFAULT 0,
  `30` tinyint(1) NOT NULL DEFAULT 0,
  `31` tinyint(1) NOT NULL DEFAULT 0,
  `32` tinyint(1) NOT NULL DEFAULT 0,
  `33` tinyint(1) NOT NULL DEFAULT 0,
  `34` tinyint(1) NOT NULL DEFAULT 0,
  `35` tinyint(1) NOT NULL DEFAULT 0,
  `36` tinyint(1) NOT NULL DEFAULT 0,
  `37` tinyint(1) NOT NULL DEFAULT 0,
  `38` tinyint(1) NOT NULL DEFAULT 0,
  `39` tinyint(1) NOT NULL DEFAULT 0,
  `40` tinyint(1) NOT NULL DEFAULT 0,
  `41` tinyint(1) NOT NULL DEFAULT 0,
  `42` tinyint(1) NOT NULL DEFAULT 0,
  `43` tinyint(1) NOT NULL DEFAULT 0,
  `44` tinyint(1) NOT NULL DEFAULT 0,
  `45` tinyint(1) NOT NULL DEFAULT 0,
  `46` tinyint(1) NOT NULL DEFAULT 0,
  `47` tinyint(1) NOT NULL DEFAULT 0,
  `48` tinyint(1) NOT NULL DEFAULT 0,
  `49` tinyint(1) NOT NULL DEFAULT 0,
  `50` tinyint(1) NOT NULL DEFAULT 0,
  `51` tinyint(1) NOT NULL DEFAULT 0,
  `52` tinyint(1) NOT NULL DEFAULT 0,
  `53` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactionitems`
--

INSERT INTO `transactionitems` (`transactionid`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `32`, `33`, `34`, `35`, `36`, `37`, `38`, `39`, `40`, `41`, `42`, `43`, `44`, `45`, `46`, `47`, `48`, `49`, `50`, `51`, `52`, `53`) VALUES
(33, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0),
(714, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4069, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customerpassword`
--
ALTER TABLE `customerpassword`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionid`),
  ADD KEY `customerid` (`customerid`);

--
-- Indexes for table `transactiondetail`
--
ALTER TABLE `transactiondetail`
  ADD PRIMARY KEY (`transactionid`,`productid`);

--
-- Indexes for table `transactionitems`
--
ALTER TABLE `transactionitems`
  ADD PRIMARY KEY (`transactionid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71140;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerpassword`
--
ALTER TABLE `customerpassword`
  ADD CONSTRAINT `customerpassword_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`email`) REFERENCES `customer` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
