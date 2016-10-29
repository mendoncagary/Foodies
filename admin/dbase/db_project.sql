
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2016 at 01:55 PM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u424939072_dbpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `mod_modulegroupcode` varchar(25) NOT NULL,
  `mod_modulegroupname` varchar(50) NOT NULL,
  `mod_modulecode` varchar(25) NOT NULL,
  `mod_modulename` varchar(50) NOT NULL,
  `mod_modulegrouporder` int(3) NOT NULL,
  `mod_moduleorder` int(3) NOT NULL,
  `mod_modulepagename` varchar(255) NOT NULL,
  PRIMARY KEY (`mod_modulegroupcode`,`mod_modulecode`),
  UNIQUE KEY `mod_modulecode` (`mod_modulecode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`mod_modulegroupcode`, `mod_modulegroupname`, `mod_modulecode`, `mod_modulename`, `mod_modulegrouporder`, `mod_moduleorder`, `mod_modulepagename`) VALUES
('CHECKOUT', 'Checkout', 'ORDER', 'Order', 3, 4, 'order.php'),
('CHECKOUT', 'Checkout', 'PAYMENT', 'Payment', 3, 2, 'payment.php'),
('CHECKOUT', 'Checkout', 'SHIPPING', 'Shipping', 3, 1, 'shipping.php'),
('CHECKOUT', 'Checkout', 'TAX', 'Tax', 3, 3, 'tax.php'),
('INVT', 'Inventory', 'PRODUCTS', 'Products', 2, 4, 'products.php'),
('INVT', 'Inventory', 'PURCHASES', 'Purchases', 2, 1, 'purchases.php'),
('INVT', 'Inventory', 'RESTAURANTS', 'Restaurants', 2, 5, 'restaurants.php'),
('INVT', 'Inventory', 'SALES', 'Sales', 2, 3, 'sales.php'),
('INVT', 'Inventory', 'STOCKS', 'Stocks', 2, 2, 'stocks.php'),
('USER', 'User', 'MEMBERS', 'Members', 1, 2, 'members.php'),
('USER', 'User', 'MESSAGES', 'Messages', 1, 3, 'messages.php'),
('USER', 'User', 'USER', 'User', 1, 1, 'user.php');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `memberID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `price` double(11,2) NOT NULL,
  `total` double(11,2) NOT NULL,
  `status` varchar(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `transaction_code` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `memberID` int(11) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` double(11,2) NOT NULL,
  `productID` int(11) NOT NULL,
  `total` double(11,2) NOT NULL,
  `status` varchar(100) NOT NULL,
  `modeofpayment` varchar(100) NOT NULL,
  `transaction_code` varchar(200) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`orderid`, `memberID`, `qty`, `price`, `productID`, `total`, `status`, `modeofpayment`, `transaction_code`) VALUES
(4, 17, 100, 1000.00, 11, 100000.00, 'Delivered', 'Paypal', ''),
(5, 17, 100, 3000.00, 12, 300000.00, 'Delivered', 'Paypal', ''),
(6, 18, 2, 12000.00, 10, 24000.00, 'Delivered', 'Paypal', ''),
(7, 19, 1, 9089.00, 13, 9089.00, 'Pending', '', ''),
(8, 20, 2, 700.00, 15, 1400.00, 'Pending', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE IF NOT EXISTS `restaurants` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `location` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `type` varchar(30) NOT NULL,
  `cuisines` varchar(60) NOT NULL,
  `cost` varchar(10) NOT NULL,
  `hours` varchar(60) NOT NULL,
  `rating` float NOT NULL,
  `discount` varchar(150) NOT NULL,
  `owner` varchar(60) NOT NULL,
  `image` varchar(50) NOT NULL,
  `pincode` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `location`, `address`, `type`, `cuisines`, `cost`, `hours`, `rating`, `discount`, `owner`, `image`, `pincode`) VALUES
(1, 'Gurukripa', '										Powai', '55, Thunga Village, Opposite Local Office Bus Stop, Saki Vihar Road, Powai, Mumbai', 'Casual Dining', 'North Indian, Chinese, Seafood', '800', ' 11:30 AM to 12:30 AM (Mon-Sun) ', 4, 'Get 10% off your first home-delivery order from us. Only applicable on orders above Rs. 200. Valid only when you order online on Foodies.', 'aadesh', 'upload/', 400072),
(2, 'Mirchi And Mime', 'Powai', 'Transocean House, Lake Boulevard, Hiranandani Business Park, Powai, Mumbai', 'Casual Dining', 'North Indian, South Indian, Mughlai', '1,500', ' 12:30 PM to 3 PM, 6:30 PM to 11 PM (Mon-Sun) ', 4.9, '', '', '', 400076),
(4, 'Rainforest Resto-Bar', 'Phoenix Market City, Kurla', '', '', 'Chnese, North Indian, Italian, Seafood', '1,800', '12 Noon to 1 AM (Mon - Sun)', 3.6, '', '', 'upload/', 400070),
(5, 'Khiva', 'Kurla', '', '', 'North Indian, Mughlai', '1,100', '12 Noon to 3:30 PM (Mon - Sun)', 4.5, '15% off on Axis Bank Credit and Debit', 'amey', 'upload/', 400070);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_rolecode` varchar(50) NOT NULL,
  `role_rolename` varchar(50) NOT NULL,
  PRIMARY KEY (`role_rolecode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_rolecode`, `role_rolename`) VALUES
('ADMIN', 'Administrator'),
('RESOWNER', 'Restaurant owner'),
('SUPERADMIN', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `role_rights`
--

CREATE TABLE IF NOT EXISTS `role_rights` (
  `rr_rolecode` varchar(50) NOT NULL,
  `rr_modulecode` varchar(50) NOT NULL,
  `rr_create` varchar(50) NOT NULL,
  `rr_edit` varchar(50) NOT NULL,
  `rr_delete` varchar(50) NOT NULL,
  `rr_view` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_rights`
--

INSERT INTO `role_rights` (`rr_rolecode`, `rr_modulecode`, `rr_create`, `rr_edit`, `rr_delete`, `rr_view`) VALUES
('SUPERADMIN', 'PURCHASES', 'yes', 'yes', 'yes', 'yes'),
('SUPERADMIN', 'STOCKS', 'yes', 'yes', 'yes', 'yes'),
('SUPERADMIN', 'SALES', 'yes', 'yes', 'yes', 'yes'),
('SUPERADMIN', 'SHIPPING', 'yes', 'yes', 'yes', 'yes'),
('SUPERADMIN', 'PAYMENT', 'yes', 'yes', 'yes', 'yes'),
('SUPERADMIN', 'TAX', 'yes', 'yes', 'yes', 'yes'),
('ADMIN', 'PURCHASES', 'yes', 'yes', 'yes', 'yes'),
('ADMIN', 'STOCKS', 'no', 'no', 'no', 'yes'),
('ADMIN', 'SALES', 'no', 'no', 'no', 'no'),
('ADMIN', 'SHIPPING', 'yes', 'yes', 'yes', 'yes'),
('ADMIN', 'PAYMENT', 'no', 'no', 'no', 'yes'),
('ADMIN', 'TAX', 'no', 'no', 'no', 'no'),
('RESOWNER', 'PRODUCTS', 'yes', 'yes', 'yes', 'yes'),
('SUPERADMIN', 'RESTAURANTS', 'yes', 'yes', 'yes', 'yes'),
('SUPERADMIN', 'MESSAGES', 'yes', 'yes', 'yes', 'yes'),
('SUPERADMIN', 'MEMBERS', 'yes', 'yes', 'yes', 'yes'),
('SUPERADMIN', 'ORDER', 'yes', 'yes', 'yes', 'yes'),
('SUPERADMIN', 'USER', 'yes', 'yes', 'yes', 'yes'),
('ADMIN', 'RESTAURANTS', 'yes', 'yes', 'yes', 'yes'),
('ADMIN', 'MEMBERS', 'yes', 'yes', 'yes', 'yes'),
('MESSAGES', 'yes', 'yes', 'yes', 'yes', 'yes'),
('ADMIN', 'ORDER', 'yes', 'yes', 'yes', 'yes'),
('ADMIN', 'USER', 'no', 'no', 'no', 'yes'),
('ADMIN', 'MESSAGES', 'yes', 'yes', 'yes', 'yes'),
('RESOWNER', 'RESTAURANTS', 'no', 'no', 'no', 'no'),
('RESOWNER', 'MESSAGES', 'no', 'no', 'no', 'no'),
('RESOWNER', 'USER', 'no', 'no', 'no', 'no'),
('RESOWNER', 'MESSAGES', 'no', 'no', 'no', 'no'),
('RESOWNER', 'ORDER', 'yes', 'yes', 'yes', 'yes'),
('RESOWNER', 'USER', 'no', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL,
  `firstName` varchar(60) DEFAULT NULL,
  `lastName` varchar(60) DEFAULT NULL,
  `contactNumber` varchar(25) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userName`, `userEmail`, `userPass`, `userStatus`, `tokenCode`, `firstName`, `lastName`, `contactNumber`, `address`) VALUES
(5, 'Gary Mendonca', 'mgary.anthrax@gmail.com', 'a152e841783914146e4bcd4f39100686', 'Y', '42e81013e80ad2233ede50f631725b15', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE IF NOT EXISTS `tb_member` (
  `memberID` int(25) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(25) NOT NULL,
  `Lastname` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Contact_Number` varchar(25) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`memberID`, `Firstname`, `Lastname`, `Email`, `Password`, `Contact_Number`, `address`) VALUES
(20, 'Gary', 'Mendonca', 'mendonca_gary@ymail.com', 'asdfg', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_products`
--

CREATE TABLE IF NOT EXISTS `tb_products` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(200) NOT NULL,
  `filter` varchar(500) NOT NULL,
  `price` double(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `location` varchar(500) NOT NULL,
  `rating` float(2,1) NOT NULL,
  `chef` varchar(60) NOT NULL,
  `resid` int(60) NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tb_products`
--

INSERT INTO `tb_products` (`productID`, `name`, `description`, `category`, `filter`, `price`, `quantity`, `location`, `rating`, `chef`, `resid`) VALUES
(11, 'Choco Lava Cake', 'Chocolaty', 'Deserts', 'Classic', 1000.00, 100, 'upload/', 4.7, 'Gary Mendonca', 1),
(10, 'Butter Chicken', 'klkkk', 'Lunch', 'Classic', 12000.00, 100, 'upload/', 4.8, 'Preetham Monis', 1),
(12, 'Risotto', 'Rice and sea food', 'Lunch', 'Specials', 3000.00, 100, 'upload/', 4.6, 'Jenate Monteiro', 1),
(13, 'Biryani', 'Tasty Chicken biryani', 'Dinner', 'Supreme', 9089.00, 5, 'upload/img1.jpg', 4.6, 'Jovita Mathias', 2),
(14, 'Trial2', 'This is tria;', 'Starters', 'Signature', 5690.00, 5, 'upload/', 0.0, 'Gary Mendonca', 2),
(16, 'Salad', '', '', 'Sweet', 500.00, 100, 'Kurla', 4.5, 'Gary Mendonca', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `rolecode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `firstname`, `lastname`, `rolecode`) VALUES
(1, 'admin', 'asdfgh', 'Gary', 'Mendonca', 'SUPERADMIN'),
(17, 'garylm', 'asdfgh', 'Gary', 'Medonca', 'ADMIN'),
(21, 'aadesh', 'asdfgh', 'Aadesh', 'Shah', 'RESOWNER'),
(22, 'amey', 'asdfgh', 'Amey', 'More', 'RESOWNER');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
