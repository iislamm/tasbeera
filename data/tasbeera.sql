-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2020 at 10:51 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasbeera`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `totalCost` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `totalCost`) VALUES
(1, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cartitems`
--

DROP TABLE IF EXISTS `cartitems`;
CREATE TABLE IF NOT EXISTS `cartitems` (
  `itemId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`itemId`,`cartId`),
  KEY `cartItems_cart` (`cartId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `type` varchar(255) NOT NULL,
  `restaurantId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_restaurant` (`restaurantId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `title`, `description`, `price`, `type`, `restaurantId`) VALUES
(1, 'Double McChicken', 'Two peices of the McChicken', 55, 'Sandwichs', 16),
(2, 'Beef With Black Pepper', '', 65, 'Asian Hut Meals', 1),
(3, 'Chicken With Sweet And Sour Meal', '', 65, 'Asian Hut Meals', 1),
(4, 'Chicken And Oyster Meal', '', 65, 'Asian Hut Meals', 1),
(5, 'Bolognese Rigatoni Pasta', 'Rigatoni pasta and bolognese sauce.', 95, 'Pastas', 12),
(6, 'Pesto Rigatoni Pasta', 'Rigatoni pasta, sun dried tomatoes, mozzarella cheese, cream and pesto sauce', 95, 'Pastas', 12),
(7, 'Stuffed Chicken Cheddar Original', '2 Pieces stuffed chicken pane with melted cheddar cheese, lettuce, pickled cucumber and Dynamite sauce', 52, 'Chicken', 13),
(8, 'Chicken with Cheese Wrap', 'Large chicken strips with melted cheddar cheese sauce, spicy chicken strips, pickled cucumber, lettuce and mayonnaise', 47, 'Chicken', 13),
(9, 'Famous Star Sandwich', 'Charbroiled burger, topped with American cheese, tomatoes, lettuce, onion, pickles, mayonnaise and served in bun bread', 39, 'Beef Sandwiches', 15),
(10, 'Mushroom N\' Swiss Sandwich', 'Charbroiled burger, topped with double melted Swiss cheese and mushroom sauce, served in bun bread', 42.5, 'Beef Sandwiches', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

DROP TABLE IF EXISTS `orderitems`;
CREATE TABLE IF NOT EXISTS `orderitems` (
  `itemId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  PRIMARY KEY (`itemId`,`orderId`),
  KEY `orderitems_order` (`orderId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`itemId`, `orderId`) VALUES
(9, 3),
(10, 3),
(9, 4),
(10, 4),
(7, 5),
(7, 6),
(8, 6),
(9, 7),
(5, 8),
(7, 9),
(2, 10),
(3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `orderr`
--

DROP TABLE IF EXISTS `orderr`;
CREATE TABLE IF NOT EXISTS `orderr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `totalCost` float NOT NULL,
  `address` varchar(255) NOT NULL,
  `restaurantId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_restaurant` (`restaurantId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderr`
--

INSERT INTO `orderr` (`id`, `userId`, `totalCost`, `address`, `restaurantId`) VALUES
(3, 17, 0, 'Madinaty', 15),
(4, 17, 0, 'Madinaty', 15),
(5, 17, 0, 'Madinaty', 13),
(6, 17, 0, 'Madinaty', 13),
(7, 17, 0, 'Madinaty', 15),
(8, 17, 0, 'Madinaty', 12),
(9, 17, 0, 'Madinaty', 13),
(10, 17, 0, 'Madinaty', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `rate` float DEFAULT NULL,
  `delivery_wait` int(11) NOT NULL,
  `delivery_fee` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `main_category` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `email`, `phone`, `rate`, `delivery_wait`, `delivery_fee`, `categories`, `main_category`, `password`) VALUES
(1, 'Asian Hut', 'asianhut@tasbeera.com', '01000000000', 4.5, 50, 15, 'Asian', 'Food', '4297f44b13955235245b2497399d7a93'),
(12, 'Cafe Supreme', 'cafesupreme@tasbeera.com', '01000000000', 4.5, 50, 25, 'International, Desserts, Sandwiches', 'Desserts', '4297f44b13955235245b2497399d7a93'),
(13, 'Cook Door', 'cookdoor@tasbeera.com', '01000000000', 4.5, 50, 16, 'Fast Food, Seyami, Sandwiches', 'Food', '4297f44b13955235245b2497399d7a93'),
(14, 'The Crepe Box', 'crepebox@tasbeera.com', '01000000000', 4.5, 30, 15, 'Crepes amd Waffles', 'Desserts', '4297f44b13955235245b2497399d7a93'),
(15, 'Hardee\'s', 'hardees@tasbeera.com', '01000000000', 4.5, 35, 15, 'Fast Food, Sandwiches, Salads', 'Food', '4297f44b13955235245b2497399d7a93'),
(16, 'McDonald\'s', 'mcdonalds@tasbeera.com', '01000000000', 4.5, 20, 14, 'Burgers, Fast Food, Breakfast', 'Food', '4297f44b13955235245b2497399d7a93'),
(17, 'Pizza Hut', 'pizzahut@tasbeera.com', '01000000000', 4.5, 35, 16, 'Pizza, Salads, Pasta', 'Food', '4297f44b13955235245b2497399d7a93'),
(18, 'Koshary Sayed Hanafy', 'sayedhanafy@tasbeera.com', '01000000000', 4.5, 30, 14, 'Oriental, Seyami', 'Food', '4297f44b13955235245b2497399d7a93'),
(19, 'Sushi Pay', 'sushipay@tasbeera.com', '01000000000', 4.5, 50, 14, 'Jabanese, Chinese, Seafood', 'Food', '4297f44b13955235245b2497399d7a93'),
(20, 'Waffle Maker', 'wafflemaker@tasbeera.com', '01000000000', 4.5, 50, 13, 'Crepes and Waffles, Desserts', 'Desserts', '4297f44b13955235245b2497399d7a93'),
(21, 'Waffle Stop', 'wafflestop@tasbeera.com', '010000000000', 4.5, 35, 15, 'Crepes and Waffles', 'Desserts', '4297f44b13955235245b2497399d7a93'),
(27, 'test', 'test@test.test', '01000000000', 4.5, 50, 10, 'test', 'food', '4297f44b13955235245b2497399d7a93');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `cartId` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `user_cart` (`cartId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `city`, `cartId`, `address`) VALUES
(6, 'eslam175610@bue.edu.eg', '4297f44b13955235245b2497399d7a93', 'Eslam Mamdouh', 'cairo', 9, 'Madinaty'),
(7, 'mostafa170397@bue.edu.eg', '4297f44b13955235245b2497399d7a93', 'Mostafa Yasser', 'cairo', 10, 'Madinaty'),
(8, 'mostafayasserabdelsalam@gmail.com', '4297f44b13955235245b2497399d7a93', 'Mostafa Yasser', 'cairo', 11, 'Madinaty'),
(16, 'islammohamedd1@gmail.com11', '4297f44b13955235245b2497399d7a93', 'Islam Mohamed11', 'Giza', 19, 'Madinaty'),
(17, 'islammohamedd1@gmail.com', '4297f44b13955235245b2497399d7a93', 'Islam Mohamed', 'Giza', 20, 'Madinaty');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD CONSTRAINT `cartItems_cart` FOREIGN KEY (`cartId`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cartItems_item` FOREIGN KEY (`itemId`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_restaurant` FOREIGN KEY (`restaurantId`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderItems_item` FOREIGN KEY (`itemId`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderitems_order` FOREIGN KEY (`orderId`) REFERENCES `orderr` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderr`
--
ALTER TABLE `orderr`
  ADD CONSTRAINT `order_restaurant` FOREIGN KEY (`restaurantId`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_cart` FOREIGN KEY (`cartId`) REFERENCES `cart` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
