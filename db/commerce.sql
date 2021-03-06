-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 06:45 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
  `address` varchar(26) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(35) NOT NULL,
  `customerstatus` varchar(15) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `firstname`, `lastname`, `address`, `mobile`, `email`, `customerstatus`) VALUES
(1, 'Hashirama', 'Senju', 'Parklands', '0712345678', 'konoha@gmail.com', 'Active'),
(2, 'Madara', 'Uchiha', 'Karen', '0722888111', 'tsukuyomi@gmail.com', 'Active'),
(3, 'Derrick', 'Kibuyu', 'Westlands', '0712345345', 'derrick@gmail.com', 'Active'),
(4, 'Joshua', 'Maina', 'Ngara', '0722111222', 'maina@gmail.com', 'Active'),
(5, 'Eric', 'Nyanjom', 'Madaraka', '0788286444', 'nyanjom@yahoo.com', 'Active'),
(6, 'Andrew', 'Adallah', 'Dagoretti', '0766952032', 'adallah@gmail.com', 'Active'),
(7, 'Minato', 'Namikaze', 'Mombasa Road', '0715875003', 'minato@gmail.com', 'Active'),
(8, 'Barrack', 'Obama', 'Parklands', '0715404404', 'obama@yahoo.com', 'Active'),
(9, 'Joan', 'Linda', 'Thika Road', '0776942007', 'joan@yahoo.com', 'Active'),
(10, 'Sharon', 'Neema', 'Karen', '0799673873', 'shalkido@gmail.com', 'Active'),
(11, 'Hinata', 'Hyuga', 'Ngara', '0741544764', 'hinata@gmail.com', 'Active'),
(12, 'Yvonne', 'Smith', 'Kasarani', '0755775563', 'yvonne@gmail.com', 'Active');

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
(3, '19f8a8dac4630bbb23fe62b66ce81fc20cef109d'),
(4, 'd6955d9721560531274cb8f50ff595a9bd39d66f'),
(5, '63e1687bf4865de6d8f8bdba5fc35d1e8a58c5dd'),
(6, '03a6a9ceaca678fd81b70ab8f65dfc819e2bd654'),
(7, 'cf1c436c1b309c86c32cf16a186c52ddb33b49bd'),
(8, 'b21e8f02ba90b5876780bcf1bf968440902c31b1'),
(9, 'e0397393f2258e8c6ee68e35ceb46d86a4ac5382'),
(10, 'f6cefd7312dc6d417ee300bfd3894d247710a67a'),
(11, 'f178a3bcfe745f528d2fdf1df35baa86f9e8dd3a'),
(12, '5473f88a9985ce6824a12a6be5211f5455b484aa');

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
(1, 'konoha@gmail.com', 'I tried searching for a fridge on your site and did not get one. Please stock them.'),
(2, 'derrick@gmail.com', 'When will you have xylophones?'),
(3, 'konoha@gmail.com', 'Good Job guys'),
(4, 'yvonne@gmail.com', 'I ordered shoes but the size delivered does not fit. Is it possible to get a refund?');

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
  `image` text DEFAULT NULL,
  `productstatus` varchar(20) NOT NULL DEFAULT 'On sale'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `name`, `category`, `brand`, `price`, `image`, `productstatus`) VALUES
(1, 'Hanan Tissue Paper', 'Household Supplies', 'Hanan', 30, 'tissue.jpeg', 'On sale'),
(2, 'Carrefour Face Towel', 'Household Supplies', 'Carrefour', 90, 'face-towel.jpg', 'On sale'),
(3, 'Pure Cotton Bath Towel', 'Household Supplies', 'Polo', 1500, 'bath-towel.jpg', 'On sale'),
(4, 'Colgate Herbal Tooth Paste', 'Household Supplies', 'Colgate', 1100, 'colgate-herbal.jpg', 'On sale'),
(5, 'Colgate Toothbrush Double Action', 'Household Supplies', 'Colgate', 80, 'colgate-double-action.jpg', 'On sale'),
(6, 'Harpic Power Plus Lavender', 'Household Supplies', 'Harpic', 324, 'harpic-lavender.jpg', 'On sale'),
(7, 'Dettol Glycerine Anti-bacterial Soap', 'Household Supplies', 'Dettol', 180, 'dettol-soap.jpg', 'On sale'),
(8, 'Kiwi Black Polish', 'Household Supplies', 'Kiwi', 95, 'kiwi-black.png', 'On sale'),
(9, 'Black Shoe Brush', 'Household Supplies', 'TeePee', 480, 'shoebrush.jpg', 'On sale'),
(10, 'iPhone 13', 'Electronics', 'Apple', 85000, 'iphone13.jpg', 'On sale'),
(11, 'iPhone 13 Pro Max', 'Electronics', 'Apple', 135000, 'iphone13-pro-max.jpg', 'On sale'),
(12, 'MacBook Pro 14', 'Electronics', 'Apple', 155000, 'macbook14.jpg', 'On sale'),
(13, 'MacBook Air', 'Electronics', 'Apple', 110000, 'macbook-air.jpg', 'On sale'),
(14, 'MacBook Pro 16', 'Electronics', 'Apple', 230000, 'macbook16.jpg', 'On sale'),
(15, 'Apple AirPods', 'Electronics', 'Apple', 13000, 'airpods.jpg', 'On sale'),
(16, 'Apple AirPods Pro', 'Electronics', 'Apple', 20000, 'airpods-pro.jpg', 'On sale'),
(17, 'MagSafe Charger', 'Electronics', 'Apple', 3000, 'magsafe.jpg', 'On sale'),
(18, '45W USB-C charger', 'Electronics', 'Samsung', 4000, '45W-charger.jpg', 'On sale'),
(19, 'Samsung Galaxy S21', 'Electronics', 'Samsung', 78000, 'samsung-s21.png', 'On sale'),
(20, 'Samsung Galaxy S21 Ultra', 'Electronics', 'Samsung', 120000, 'Samsung-Galaxy-S21-ultra.jpg', 'On sale'),
(21, 'Samsung Galaxy Buds', 'Electronics', 'Samsung', 10000, 'samsung-buds.jpg', 'On sale'),
(22, 'Sony WH-1000XM4 Headphones', 'Electronics', 'Sony', 32000, 'sonyxm4.jpg', 'On sale'),
(23, 'Bose QC 35 Headphones', 'Electronics', 'Bose', 32000, 'bose-qc35.jpg', 'On sale'),
(24, 'PlayStation 5', 'Electronics', 'Sony', 60000, 'ps5.jpg', 'On sale'),
(25, 'Dualsense Wireless Controller', 'Electronics', 'Sony', 8000, 'dualsense.jpg', 'On sale'),
(26, 'XBOX Series X', 'Electronics', 'Microsoft', 60000, 'Xbox-Series-X.jpg', 'On sale'),
(27, 'XBOX Wireless Controller', 'Electronics', 'Microsoft', 8000, 'xbox_controller.jpg', 'On sale'),
(28, 'Krackles Tangy Tomato Flavored Potato Crisps', 'Snacks', 'Krackles', 44, 'tangy-tomato.jpg', 'On sale'),
(29, 'Pringles Sour Cream & Onion Potato Crisps', 'Snacks', 'Pringles', 345, 'pringles.jpg', 'On sale'),
(30, 'Cadbury Top Deck chocolate', 'Snacks', 'Cadbury', 120, 'chocolate.png', 'On sale'),
(31, 'Delamere Strawberry Yoghurt', 'Drinks', 'Delamere', 100, 'strawberry-yoghurt.png', 'On sale'),
(32, 'Afia Mango Juice', 'Drinks', 'Afia', 60, 'mango-juice.jpg', 'On sale'),
(33, 'Afia Apple Juice', 'Drinks', 'Afia', 60, 'apple-juice.jpg', 'On sale'),
(34, 'Dasani Mineral Water', 'Drinks', 'Dasani', 30, 'dasani.jpg', 'On sale'),
(35, 'Fanta Orange Soda', 'Drinks', 'Coca-Cola', 60, 'fanta.png', 'On sale'),
(36, 'Coca-Cola diet coke', 'Drinks', 'Coca-Cola', 60, 'coke-zero.jpeg', 'On sale'),
(37, 'Samsung S21 phone case', 'Accessories', 'Samsung', 2500, 's21-case.jpg', 'On sale'),
(38, 'Samsung S21 Ultra Alcantara case', 'Accessories', 'Samsung', 2600, 's21-ultra-alcantara.png', 'On sale'),
(39, 'iPhone 13 leather case', 'Accessories', 'Apple', 3000, 'iphone13-case.jpg', 'On sale'),
(40, 'iPhone 13 Pro Max leather case', 'Accessories', 'Apple', 3000, 'iphone13promax-case.jpg', 'On sale'),
(41, 'Apple Watch Series 7', 'Accessories', 'Apple', 26000, 'apple-watch.jpg', 'On sale'),
(42, 'Samsung Galaxy Watch Active', 'Accessories', 'Samsung', 20000, 'samsung-watch.jpg', 'On sale'),
(43, 'Leather Jacket', 'Clothing', 'Gucci', 34000, 'gucci-leather-jacket.jpg', 'On sale'),
(44, '3 piece suit', 'Clothing', 'Louis Vuitton', 60000, 'LVthree-piece-suit.jpg', 'On sale'),
(45, 'Beanie Hat', 'Clothing', 'Nike', 5000, 'nike-beanie.jpg', 'On sale'),
(46, 'Nike Air Jordans', 'Clothing', 'Nike', 30000, 'nike-jordans.jpg', 'On sale'),
(47, 'Official Black Leather shoes', 'Clothing', 'Bata', 15000, 'leather-shoes.jpg', 'On sale'),
(48, 'Cotton Socks', 'Clothing', 'Peak', 600, 'peak-socks.jpg', 'On sale'),
(49, 'Blue Ball Point Pen', 'Stationery', 'BIC', 30, 'blue-pen.jpg', 'On sale'),
(50, 'HB Pencil', 'Stationery', 'Steadler', 50, 'HB-pencil.jpg', 'On sale'),
(51, 'Black Ball Point Pen', 'Stationery', 'BIC', 30, 'black-pen.jpg', 'On sale'),
(52, 'A4 Single ruled 120pg', 'Stationery', 'Kartasi', 120, 'A4-120pg.png', 'On sale'),
(53, 'Loose Leaf 50 sheets', 'Stationery', 'Kartasi', 80, 'loose-leaf.jpg', 'On sale'),
(54, 'Oreo dipped cookies', 'Snacks', 'Cadbury', 150, '46559809438418204cadbury-oreo-cadbury-dipped-cookies-150-g-0-20210813.jpg', 'On sale');

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
(1, 12),
(2, 18),
(3, 17),
(4, 18),
(5, 10),
(6, 19),
(7, 30),
(8, 16),
(9, 12),
(10, 2),
(11, 3),
(12, 4),
(13, 3),
(14, 4),
(15, 10),
(16, 5),
(17, 5),
(18, 9),
(19, 4),
(20, 6),
(21, 6),
(22, 5),
(23, 4),
(24, 3),
(25, 4),
(26, 3),
(27, 4),
(28, 7),
(29, 28),
(30, 48),
(31, 21),
(32, 21),
(33, 19),
(34, 28),
(35, 37),
(36, 22),
(37, 7),
(38, 7),
(39, 4),
(40, 6),
(41, 4),
(42, 9),
(43, 9),
(44, 4),
(45, 10),
(46, 11),
(47, 10),
(48, 23),
(49, 38),
(50, 25),
(51, 38),
(52, 22),
(53, 13),
(54, 33);

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
(0, 5, 230, '2021-12-13', 'Confirmed'),
(2, 1, 114500, '2021-12-17', 'Confirmed'),
(4, 12, 90, '2021-12-26', 'Cancelled'),
(7, 3, 100000, '2021-12-10', 'Confirmed'),
(11, 2, 130000, '2021-12-10', 'Confirmed'),
(12, 1, 130, '2021-12-17', 'Confirmed'),
(16, 2, 71400, '2021-12-10', 'Confirmed'),
(17, 1, 79600, '2021-12-11', 'Confirmed'),
(23, 5, 540, '2021-12-12', 'Confirmed'),
(30, 4, 75575, '2021-12-10', 'Confirmed'),
(31, 4, 130, '2021-12-13', 'Confirmed'),
(33, 2, 255200, '2021-11-27', 'Confirmed'),
(45, 1, 114500, '2021-12-10', 'Confirmed'),
(48, 3, 600, '2021-12-10', 'Confirmed'),
(49, 1, 237000, '2021-12-13', 'Confirmed'),
(50, 1, 240000, '2021-12-10', 'Confirmed'),
(57, 2, 3864, '2021-12-10', 'Confirmed'),
(60, 1, 100000, '2021-12-10', 'Confirmed'),
(74, 5, 100460, '2021-12-10', 'Confirmed'),
(81, 10, 1072, '2021-12-18', 'Confirmed'),
(89, 12, 100356, '2021-12-26', 'Confirmed'),
(91, 5, 100000, '2021-12-10', 'Confirmed'),
(106, 5, 420, '2021-12-13', 'Confirmed'),
(119, 7, 360, '2021-12-12', 'Confirmed'),
(187, 1, 330, '2021-12-10', 'Confirmed'),
(238, 3, 240, '2021-12-15', 'Confirmed'),
(283, 8, 4575, '2021-12-15', 'Confirmed'),
(289, 4, 100000, '2021-12-10', 'Confirmed'),
(348, 1, 5660, '2021-12-12', 'Confirmed'),
(417, 4, 130, '2021-12-17', 'Confirmed'),
(422, 1, 216000, '2021-12-13', 'Confirmed'),
(427, 1, 3460, '2021-12-12', 'Cancelled'),
(492, 12, 2380, '2021-12-19', 'Confirmed'),
(581, 6, 391000, '2021-12-10', 'Confirmed'),
(587, 2, 210, '2021-12-17', 'Confirmed'),
(680, 12, 325000, '2021-12-19', 'Confirmed'),
(714, 1, 2370, '2021-11-27', 'Confirmed'),
(749, 7, 187000, '2021-12-11', 'Confirmed'),
(933, 8, 237000, '2021-12-15', 'Confirmed'),
(4069, 1, 100522, '2021-11-27', 'Confirmed'),
(6956, 6, 69600, '2021-12-13', 'Confirmed'),
(7683, 4, 1522, '2021-12-10', 'Confirmed'),
(8498, 4, 3950, '2021-12-10', 'Confirmed'),
(8821, 4, 220, '2021-12-16', 'Confirmed'),
(9704, 6, 700, '2021-12-10', 'Confirmed'),
(39936, 5, 130, '2021-12-13', 'Confirmed'),
(53181, 7, 345000, '2021-12-10', 'Confirmed'),
(354070, 4, 114500, '2021-12-10', 'Confirmed'),
(354071, 3, 1777, '2021-12-10', 'Confirmed'),
(354072, 2, 70800, '2021-12-10', 'Confirmed'),
(354073, 1, 69600, '2021-12-11', 'Confirmed'),
(354074, 1, 74600, '2021-12-11', 'Confirmed');

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
(0, 50, 3),
(0, 53, 1),
(2, 18, 1),
(2, 19, 1),
(2, 21, 1),
(2, 37, 1),
(2, 42, 1),
(4, 33, 1),
(4, 34, 1),
(7, 23, 1),
(7, 24, 1),
(7, 25, 1),
(11, 10, 1),
(11, 15, 1),
(11, 17, 1),
(11, 39, 1),
(11, 41, 1),
(12, 50, 1),
(12, 53, 1),
(16, 43, 1),
(16, 45, 1),
(16, 46, 1),
(16, 48, 4),
(17, 43, 1),
(17, 45, 3),
(17, 46, 1),
(17, 48, 1),
(23, 30, 2),
(23, 31, 3),
(30, 8, 1),
(30, 9, 1),
(30, 44, 1),
(30, 47, 1),
(31, 50, 1),
(31, 53, 1),
(33, 18, 1),
(33, 20, 1),
(33, 21, 1),
(33, 24, 1),
(33, 25, 1),
(33, 38, 1),
(33, 42, 1),
(33, 46, 1),
(33, 48, 1),
(45, 18, 1),
(45, 19, 1),
(45, 21, 1),
(45, 37, 1),
(45, 42, 1),
(48, 49, 5),
(48, 51, 3),
(48, 52, 3),
(49, 10, 1),
(49, 13, 1),
(49, 15, 1),
(49, 39, 1),
(49, 41, 1),
(50, 10, 1),
(50, 13, 1),
(50, 15, 1),
(50, 17, 1),
(50, 39, 1),
(50, 41, 1),
(57, 1, 10),
(57, 4, 2),
(57, 5, 1),
(57, 6, 1),
(57, 7, 5),
(57, 36, 1),
(60, 22, 1),
(60, 24, 1),
(60, 25, 1),
(74, 23, 1),
(74, 26, 1),
(74, 27, 1),
(74, 28, 5),
(74, 36, 4),
(81, 28, 8),
(81, 32, 6),
(81, 33, 6),
(89, 23, 1),
(89, 26, 1),
(89, 27, 1),
(89, 28, 4),
(89, 36, 3),
(91, 23, 1),
(91, 26, 1),
(91, 27, 1),
(106, 30, 2),
(106, 35, 3),
(119, 49, 3),
(119, 51, 1),
(119, 52, 2),
(187, 50, 5),
(187, 53, 1),
(238, 49, 2),
(238, 51, 2),
(238, 52, 1),
(283, 1, 10),
(283, 2, 1),
(283, 3, 2),
(283, 7, 5),
(283, 8, 3),
(289, 22, 1),
(289, 24, 1),
(289, 25, 1),
(348, 4, 5),
(348, 5, 2),
(417, 50, 1),
(417, 53, 1),
(422, 22, 2),
(422, 24, 2),
(422, 25, 4),
(427, 4, 3),
(427, 5, 2),
(492, 4, 1),
(492, 5, 4),
(492, 9, 2),
(581, 11, 1),
(581, 14, 1),
(581, 16, 1),
(581, 17, 1),
(581, 40, 1),
(587, 49, 1),
(587, 51, 2),
(587, 52, 1),
(680, 10, 2),
(680, 13, 1),
(680, 15, 1),
(680, 39, 2),
(680, 41, 1),
(714, 1, 3),
(714, 4, 2),
(714, 5, 1),
(749, 11, 1),
(749, 16, 1),
(749, 17, 1),
(749, 40, 1),
(749, 41, 1),
(933, 10, 1),
(933, 13, 1),
(933, 15, 1),
(933, 39, 1),
(933, 41, 1),
(4069, 1, 5),
(4069, 23, 1),
(4069, 26, 1),
(4069, 27, 1),
(4069, 28, 3),
(4069, 36, 4),
(6956, 43, 1),
(6956, 45, 1),
(6956, 46, 1),
(6956, 48, 1),
(7683, 28, 8),
(7683, 29, 2),
(7683, 32, 3),
(7683, 33, 5),
(8498, 2, 1),
(8498, 3, 1),
(8498, 4, 2),
(8498, 5, 2),
(8821, 30, 1),
(8821, 31, 1),
(9704, 30, 2),
(9704, 31, 4),
(9704, 34, 2),
(39936, 50, 1),
(39936, 53, 1),
(53181, 11, 1),
(53181, 12, 1),
(53181, 16, 1),
(53181, 17, 1),
(53181, 40, 2),
(53181, 41, 1),
(354070, 18, 1),
(354070, 19, 1),
(354070, 21, 1),
(354070, 37, 1),
(354070, 42, 1);

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
  `53` tinyint(1) NOT NULL DEFAULT 0,
  `54` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactionitems`
--

INSERT INTO `transactionitems` (`transactionid`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `32`, `33`, `34`, `35`, `36`, `37`, `38`, `39`, `40`, `41`, `42`, `43`, `44`, `45`, `46`, `47`, `48`, `49`, `50`, `51`, `52`, `53`, `54`) VALUES
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0),
(23, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(31, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(33, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0),
(45, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0),
(49, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(106, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(119, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0),
(187, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(238, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0),
(283, 1, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(289, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(348, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(417, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(422, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(427, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(492, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(581, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(587, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0),
(680, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(714, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(749, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(933, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4069, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6956, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0),
(7683, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8498, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8821, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9704, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39936, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(53181, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(354070, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
  ADD PRIMARY KEY (`transactionid`,`productid`),
  ADD KEY `transactiondetail_ibfk_1` (`productid`);

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
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`email`) REFERENCES `customer` (`email`) ON DELETE NO ACTION ON UPDATE CASCADE;

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

--
-- Constraints for table `transactiondetail`
--
ALTER TABLE `transactiondetail`
  ADD CONSTRAINT `transactiondetail_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactiondetail_ibfk_2` FOREIGN KEY (`transactionid`) REFERENCES `transaction` (`transactionid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactionitems`
--
ALTER TABLE `transactionitems`
  ADD CONSTRAINT `transactionitems_ibfk_1` FOREIGN KEY (`transactionid`) REFERENCES `transaction` (`transactionid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
