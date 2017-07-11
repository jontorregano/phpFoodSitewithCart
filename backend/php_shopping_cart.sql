-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2017 at 03:44 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `price`, `description`) VALUES
(1, '2 Piece Dark', 2.69, 'Chicken'),
(2, '3 Piece Dark', 3.59, 'Chicken'),
(3, '4 Piece Dark', 4.29, 'Chicken'),
(4, '8 Piece Dark', 8.49, 'Chicken'),
(5, '16 Piece Dark', 13.99, 'Chicken'),
(6, '2 Piece White', 3.59, 'Chicken'),
(7, '3 Piece White', 4.59, 'Chicken'),
(8, '4 Piece White', 6.59, 'Chicken'),
(9, '8 Piece White', 10.99, 'Chicken'),
(10, '16 Piece White', 17.99, 'Chicken'),
(11, '2 Piece Mixed', 2.99, 'Chicken'),
(12, '3 Piece Mixed', 3.79, 'Chicken'),
(13, '4 Piece Mixed', 4.69, 'Chicken'),
(14, '8 Piece Mixed', 9.99, 'Chicken'),
(15, '16 Piece Mixed', 14.99, 'Chicken'),
(16, '3 Piece Tenders', 3.99, 'Chicken'),
(17, '4 Piece Tenders', 4.99, 'Chicken'),
(18, '6 Piece Tenders', 5.99, 'Chicken'),
(19, '9 Piece Tenders', 8.99, 'Chicken'),
(20, '12 Piece Tenders', 10.99, 'Chicken'),
(21, '25 Piece Dark', 22.99, 'Chicken'),
(22, '25 Piece Mixed', 23.99, 'Chicken'),
(23, '2 Piece Dark Combo', 4.19, 'Combos'),
(24, '3 Piece Dark Combo', 4.99, 'Combos'),
(25, '4 Piece Dark Combo', 5.99, 'Combos'),
(26, '2 Piece White Combo', 5.39, 'Combos'),
(27, '3 Piece White Combo', 6.29, 'Combos'),
(28, '4 Piece White Combo', 7.29, 'Combos'),
(29, '2 Piece Mixed Combo', 4.99, 'Combos'),
(30, '3 Piece Mixed Combo', 5.99, 'Combos'),
(31, '4 Piece Mixed Combo', 6.99, 'Combos'),
(32, '3 Piece Tenders Combo', 4.99, 'Combos'),
(33, '4 Piece Tenders Combo', 5.99, 'Combos'),
(34, '6 Piece Tenders Combo', 6.99, 'Combos'),
(35, 'Fries (Small)', 1.99, 'Sides'),
(36, 'Fries (Large)', 2.99, 'Sides'),
(37, 'Red Beans and Rice (Small)', 1.99, 'Sides'),
(38, 'Red Beans and Rice (Large)', 2.99, 'Sides'),
(39, 'Jambalaya (Small)', 1.99, 'Sides'),
(40, 'Jambalaya (Large)', 2.99, 'Sides'),
(41, 'Potato Salad (Small)', 1.99, 'Sides'),
(42, 'Potato Salad (Large)', 2.99, 'Sides'),
(43, 'Jalapeno Poppers (Small)', 2.99, 'Sides'),
(44, 'Jalapeno Poppers (Large)', 5.99, 'Sides'),
(45, 'Meat Pie', 1.99, 'Sides'),
(46, 'Breakfast Plate (Small)', 1.99, 'Breakfast'),
(47, 'Breakfast Plate (Large)', 3.99, 'Breakfast'),
(48, 'Pork Link Breakfast Sandwich', 2.99, 'Breakfast'),
(49, 'Smoked Sausage Breakfast Sandwich', 2.99, 'Breakfast'),
(50, 'Hot Sausage Breakfast Sandwich', 2.99, 'Breakfast'),
(51, 'Bacon Breakfast Sandwich', 2.99, 'Breakfast'),
(52, 'Sausage Patty Breakfast Sandwich', 2.99, 'Breakfast'),
(53, '6-Inch Roast Beef Po-boy', 2.99, 'Po-Boys'),
(54, '6-Inch Hot Sausage Po-boy', 2.99, 'Po-Boys'),
(55, '6-Inch Hamburger Po-boy', 2.99, 'Po-Boys'),
(56, '6-Inch Shrimp Po-boy', 4.99, 'Po-Boys'),
(57, '6-Inch Fish Po-boy', 4.99, 'Po-Boys'),
(58, '6-Inch Turkey Po-boy', 2.99, 'Po-Boys'),
(59, '6-Inch Ham Po-boy', 2.99, 'Po-Boys'),
(60, '6-Inch Chicken Tender Po-boy', 2.99, 'Po-Boys'),
(61, '12-Inch Roast Beef Po-boy', 4.99, 'Po-Boys'),
(62, '12-Inch Hot Sausage Po-boy', 4.99, 'Po-Boys'),
(63, '12-Inch Hamburger Po-boy', 4.99, 'Po-Boys'),
(64, '12-Inch Shrimp Po-boy', 6.99, 'Po-Boys'),
(65, '12-Inch Fish Po-boy', 6.99, 'Po-Boys'),
(66, '12-Inch Turkey Po-boy', 4.99, 'Po-Boys'),
(67, '12-Inch Ham Po-boy', 4.99, 'Po-Boys'),
(68, '12-Inch Chicken Tender Po-boy', 4.99, 'Po-Boys');

-- --------------------------------------------------------

--
-- Table structure for table `food_images`
--

CREATE TABLE `food_images` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_images`
--

INSERT INTO `food_images` (`id`, `food_id`, `name`) VALUES
(1, 1, 'noImage'),
(2, 2, 'noImage'),
(3, 3, 'noImage'),
(4, 4, 'noImage'),
(5, 5, 'noImage'),
(6, 6, 'noImage'),
(7, 7, 'noImage'),
(8, 8, 'noImage'),
(9, 9, 'noImage'),
(10, 10, 'noImage'),
(11, 11, 'noImage'),
(12, 12, 'noImage'),
(13, 13, 'noImage'),
(14, 14, 'noImage'),
(15, 15, 'noImage'),
(16, 16, 'noImage'),
(17, 17, 'noImage'),
(18, 18, 'noImage'),
(19, 19, 'noImage'),
(20, 20, 'noImage'),
(21, 21, 'noImage'),
(22, 22, 'noImage'),
(23, 23, 'noImage'),
(24, 24, 'noImage'),
(25, 25, 'noImage'),
(26, 26, 'noImage'),
(27, 27, 'noImage'),
(28, 28, 'noImage'),
(29, 29, 'noImage'),
(30, 30, 'noImage'),
(31, 31, 'noImage'),
(32, 32, 'noImage'),
(33, 33, 'noImage'),
(34, 34, 'noImage'),
(35, 35, 'noImage'),
(36, 36, 'noImage'),
(37, 37, 'noImage'),
(38, 38, 'noImage'),
(39, 39, 'noImage'),
(40, 40, 'noImage'),
(41, 41, 'noImage'),
(42, 42, 'noImage'),
(43, 43, 'noImage'),
(44, 44, 'noImage'),
(45, 45, 'noImage'),
(46, 46, 'noImage'),
(47, 47, 'noImage'),
(48, 48, 'noImage'),
(49, 49, 'noImage'),
(50, 50, 'noImage'),
(51, 51, 'noImage'),
(52, 52, 'noImage'),
(53, 53, 'noImage'),
(54, 54, 'noImage'),
(55, 55, 'noImage'),
(56, 56, 'noImage'),
(57, 57, 'noImage'),
(58, 58, 'noImage'),
(59, 59, 'noImage'),
(60, 60, 'noImage'),
(61, 61, 'noImage'),
(62, 62, 'noImage'),
(63, 63, 'noImage'),
(64, 64, 'noImage'),
(65, 65, 'noImage'),
(66, 66, 'noImage'),
(67, 67, 'noImage'),
(68, 68, 'noImage');

-- --------------------------------------------------------

--
-- Table structure for table `food_orders`
--

CREATE TABLE `food_orders` (
  `id` int(11) NOT NULL,
  `food_total` float NOT NULL,
  `created_on` datetime NOT NULL,
  `food_list` text NOT NULL,
  `customer_names` text NOT NULL,
  `customer_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_images`
--
ALTER TABLE `food_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_orders`
--
ALTER TABLE `food_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_orders`
--
ALTER TABLE `food_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
