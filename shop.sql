-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2017 at 12:54 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `itemNo` int(11) NOT NULL,
  `itemCartQuantity` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(33) NOT NULL,
  `name` varchar(152) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Desktop'),
(2, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `uid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `pass` char(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`uid`, `fname`, `lname`, `pass`, `address`, `phone`) VALUES
(1, 'mamuka', 'arabuli', 'secret', '1750 ne 191 st miami', '355-393-4705'),
(2, 'mamuka', 'arabuli', 'secret', '1750 ne 191 st miami', '355-393-4705');

-- --------------------------------------------------------

--
-- Table structure for table `feature_items`
--

CREATE TABLE `feature_items` (
  `id` int(11) NOT NULL,
  `item_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feature_items`
--

INSERT INTO `feature_items` (`id`, `item_no`) VALUES
(1, 33),
(3, 36),
(2, 37);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemNo` int(4) NOT NULL,
  `category_id` int(12) NOT NULL,
  `itemName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `itemDescription` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `itemQuantity` int(4) NOT NULL,
  `itemPrice` int(10) NOT NULL,
  `itemImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemNo`, `category_id`, `itemName`, `itemDescription`, `itemQuantity`, `itemPrice`, `itemImage`) VALUES
(31, 1, 'Intel core i 77', 'Fast and reliable', 100, 3999, 'images/computer1.jpg'),
(33, 1, 'Amd 5', 'Very fast', 50, 7999, 'images/computer2.jpg'),
(35, 2, 'HP PC', 'affordable price', 99, 4999, 'images/computer3.jpg'),
(36, 2, 'Dell PC', 'good looking', 123, 1000, 'images/computer4.jpg'),
(37, 1, 'Asus PC', 'Very solid', 5, 245, 'images/computer5.jpg'),
(38, 2, 'Lenovo', 'Very colorful', 5, 7834, 'images/computer6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `latest_items`
--

CREATE TABLE `latest_items` (
  `id` int(11) NOT NULL,
  `item_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latest_items`
--

INSERT INTO `latest_items` (`id`, `item_no`) VALUES
(2, 31),
(1, 36),
(3, 38);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `role`) VALUES
('admin1', 'admin1', 'admin'),
('admin2', 'admin2', 'CSR'),
('admin3', 'admin3', 'Team Leader'),
('admin4', 'admin4', 'Manager'),
('admin5', 'admin5', 'Senior Manager'),
('asdfasasdfasf', '111111', 'user'),
('asdfasdf', '111111', 'user'),
('dfagsdagasdg', '111111', 'user'),
('jahidul', 'jahid99', 'user'),
('patrick', 'patrick', 'user'),
('user123', 'user123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `orderprod`
--

CREATE TABLE `orderprod` (
  `oid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderprod`
--

INSERT INTO `orderprod` (`oid`, `cid`, `pid`, `quantity`) VALUES
(1, 1, 1, 2),
(1, 1, 2, 1),
(1, 1, 3, 4),
(1, 1, 4, 3),
(1, 1, 5, 1),
(1, 1, 2, 1),
(2, 1, 2, 3),
(3, 2, 3, 2),
(4, 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cid`, `order_date`) VALUES
(1, 1, '2012-12-21 18:00:00'),
(2, 1, '2012-01-03 18:00:00'),
(3, 2, '2012-12-21 18:00:00'),
(4, 2, '2012-01-03 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `productorder`
--

CREATE TABLE `productorder` (
  `orderID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `itemNo` int(11) NOT NULL,
  `orderQuantity` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `paymentMethod` varchar(6) NOT NULL,
  `isDelivered` varchar(9) NOT NULL DEFAULT 'NOT YET'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productorder`
--

INSERT INTO `productorder` (`orderID`, `username`, `itemNo`, `orderQuantity`, `totalPrice`, `paymentMethod`, `isDelivered`) VALUES
(1, 'patrick', 31, 1, 3999, 'COD', 'DELIVERED'),
(2, 'patrick', 35, 1, 4999, 'COD', 'DELIVERED'),
(6, 'patrick', 31, 1, 3999, 'COD', 'DELIVERED'),
(7, 'patrick', 33, 1, 7999, 'COD', 'DELIVERED'),
(8, 'patrick', 35, 1, 4999, 'COD', 'NOT YET'),
(9, 'user123', 31, 1, 3999, 'COD', 'DELIVERED'),
(10, 'user123', 33, 1, 7999, 'COD', 'NOT YET'),
(11, 'patrick', 33, 1, 7999, 'COD', 'NOT YET'),
(12, 'patrick', 31, 1, 3999, 'COD', 'NOT YET'),
(16, 'jahidul', 36, 1, 1000, 'COD', 'NOT YET');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `descr` varchar(55) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `picture` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `descr`, `price`, `picture`) VALUES
(1, 'tosh', 'old but working toshiba laptop', 400, 'images/img1.jpg'),
(2, 'toshi', 'old but working toshiba laptop', 402, 'images/img2.jpg'),
(3, 'toshba', 'once again old but working toshiba laptop', 404, 'images/img3.jpg'),
(4, 'toshiva', 'one more time working toshiba laptop', 405, 'images/img4.jpg'),
(5, 'toshbaba', 'old but working toshiba laptop', 417, 'images/img5.jpg'),
(6, 'samsung', 'old and somehow working mobile cell phone', 400, 'images/img6.jpg'),
(7, 'samsunmb', 'somehow working mobile cell phone', 400, 'images/img7.jpg'),
(8, 'proscantv', 'tili vision', 254, 'images/img8.jpg'),
(9, 'nice house', 'house in highland', 2400, 'images/homes/1.jpg'),
(10, 'chicago illinois', 'one of buildings you see', 3400, 'images/homes/2.jpg'),
(11, 'nice Image', 'home design plan', 4400, 'images/homes/3.jpg'),
(12, 'high building', 'appartment for sale ,manhattan', 5400, 'images/homes/4.jpg'),
(13, 'charles bridge', 'nice sight from that house', 6400, 'images/homes/5.jpg'),
(14, 'cheeply as never', 'house in highland', 7400, 'images/homes/6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `link`, `image`) VALUES
(1, '#', 'pic1.png'),
(2, '#', 'pic2.png'),
(3, '#', 'pic3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `useraddress` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usercontactno` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `useremail` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `userpaypal` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `userImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'res/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`username`, `firstname`, `lastname`, `useraddress`, `usercontactno`, `useremail`, `userpaypal`, `userImage`) VALUES
('admin2', 'Rey', 'Alegre', '', '', '', '', 'res/admin.png'),
('admin3', 'Patrick', 'Gomez', '', '', '', '', 'res/admin.png'),
('admin4', 'Mary Ann', 'Belasa', '', '', '', '', 'res/admin.png'),
('admin5', 'Nancy', 'Malgapo', '', '', '', '', 'res/admin.png'),
('asdfasasdfasf', 'dsafsdfas', 'asdfasf', 'asdfasdf', '13412412412', 'dfasdf@sdgadfgadg', 'jahidsauf@ldkgjalksjf', 'res/default.png'),
('asdfasdf', 'asdfasfd', 'dasgas', 'safasf', '42222223333', 'fgdggdfg@efasg', 'dsgdsg@fdgasdg', 'res/default.png'),
('dfagsdagasdg', 'adfasf', 'sadfsd', 'xczvzxv', '22222222222', 'dsafdsf@ffsdgfsd', 'dsgdsg@fsdgas', 'res/default.png'),
('jahidul', 'jahidull', 'haque', 'sdgdsfg', '34535234546', 'jahidulpathan@gmail.com', 'jahidul@ldskjf.com', 'res/'),
('patrick', 'Patrick', 'Gomez', 'TEST1', '09111111112', 'test1@gmail.com', 'test1@gmail.com', 'res/default.png'),
('user123', 'Juan', 'Dela Cruz', '274 P. Cruz Manila', '09123131312', 'juan@gmail.com', 'juan@gmail.com', 'res/bear-02.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `username` (`username`),
  ADD KEY `username_2` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `feature_items`
--
ALTER TABLE `feature_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_no` (`item_no`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemNo`);

--
-- Indexes for table `latest_items`
--
ALTER TABLE `latest_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_no` (`item_no`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `orderprod`
--
ALTER TABLE `orderprod`
  ADD KEY `cid` (`cid`),
  ADD KEY `oid` (`oid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `productorder`
--
ALTER TABLE `productorder`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `itemNo` (`itemNo`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`),
  ADD KEY `userImage` (`userImage`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feature_items`
--
ALTER TABLE `feature_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemNo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `latest_items`
--
ALTER TABLE `latest_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `productorder`
--
ALTER TABLE `productorder`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `feature_items`
--
ALTER TABLE `feature_items`
  ADD CONSTRAINT `feature_items_ibfk_1` FOREIGN KEY (`item_no`) REFERENCES `items` (`itemNo`);

--
-- Constraints for table `latest_items`
--
ALTER TABLE `latest_items`
  ADD CONSTRAINT `latest_items_ibfk_1` FOREIGN KEY (`item_no`) REFERENCES `items` (`itemNo`);

--
-- Constraints for table `orderprod`
--
ALTER TABLE `orderprod`
  ADD CONSTRAINT `orderprod_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customers` (`uid`),
  ADD CONSTRAINT `orderprod_ibfk_2` FOREIGN KEY (`oid`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderprod_ibfk_3` FOREIGN KEY (`pid`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customers` (`uid`);

--
-- Constraints for table `productorder`
--
ALTER TABLE `productorder`
  ADD CONSTRAINT `productorder_ibfk_1` FOREIGN KEY (`itemNo`) REFERENCES `items` (`itemNo`);

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `userinfo_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
