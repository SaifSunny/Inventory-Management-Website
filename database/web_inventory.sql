-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2021 at 01:21 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(4, 'Xiomi'),
(5, 'Oppo'),
(6, 'Walton'),
(7, 'Hitachi'),
(8, 'Singer');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(21, 'mobile'),
(22, 'television'),
(23, 'blender'),
(24, 'microwave');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `email`, `phone`, `address`, `city`, `zip`) VALUES
(4, 'saif sunny', 'saifsunny56@gmail.com', '01624034918', '3/11 A', 'Dhaka', '1207'),
(5, 'sajid', 'sajid123@hotmail.com', '01919234234', '4-11 mohammadpur', 'Dhaka', '1207'),
(6, 'pinky', 'sadia.afrin.cse@ulab.edu.bd', '12345678911', 'road no 8', 'Dhaka', '1207');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `due` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `product_id`, `customer_name`, `address`, `city`, `zip`, `product_name`, `order_quantity`, `sell_price`, `total`, `paid`, `due`) VALUES
(14, 4, 8, 'saif sunny', '3/11 A', 'Dhaka', '1207', 'LED tv', 1, 32000, 32000, 20000, 12000),
(15, 6, 11, 'pinky', 'road no 8', 'Dhaka', '1207', 'c7', 5, 22000, 110000, 30000, 80000),
(17, 4, 11, 'saif sunny', '3/11 A', 'Dhaka', '1207', 'c7', 5, 20000, 100000, 50000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `brand_id`, `product_name`, `brand_name`, `category_name`, `product_price`, `stock`, `added_date`) VALUES
(6, 21, 4, 'mi 8', 'Xiomi', 'mobile', 10000, 10, '2021-06-09'),
(7, 21, 5, 'mi21', 'Oppo', 'mobile', 12000, 10, '2021-06-09'),
(8, 22, 6, 'LED tv', 'Walton', 'television', 30000, 24, '2021-06-09'),
(9, 24, 8, '1121', 'Singer', 'microwave', 8000, 30, '2021-06-09'),
(10, 23, 6, 'mixi', 'Walton', 'blender', 4000, 20, '2021-06-09'),
(11, 21, 5, 'c7', 'Oppo', 'mobile', 20000, 20, '2021-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` enum('Admin','Others') NOT NULL,
  `register_date` date NOT NULL,
  `last_login` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `usertype`, `register_date`, `last_login`) VALUES
(12, 'saieef_sunny', 'saifsunny56@gmail.com', 'b4d37012cba1adc6ddde8b01a4b0a998', 'Admin', '2021-06-07', '2021-06-10'),
(15, 'Linia', 'linia.jannat.cse@ulab.edu.bd', 'bbbab93fb49c574b12060025f0a035a9', 'Admin', '2021-06-09', '2021-06-09'),
(16, 'maisha', 'maisha.mostofa.cse@ulab.edu.bd', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', '2021-06-09', '2021-06-09'),
(17, 'pinky', 'sadia.ben.6789@gmil.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', '2021-06-09', '2021-06-09'),
(18, 'sinit', 'sanjida.jalal.cse@ulab.edu.bd', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', '2021-06-09', '2021-06-09'),
(19, 'lina', 'mahfuza.akther.cse@ulab.edu.bd', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', '2021-06-09', '2021-06-09'),
(20, 'june', 'linia34@gmail.com', '7af4896825dfc7e94f8a1d6846a5a2d4', 'Admin', '2021-06-10', '2021-06-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
