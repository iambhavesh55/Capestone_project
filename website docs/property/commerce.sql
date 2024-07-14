-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 02:11 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `user_id`, `amount`, `created_at`, `updated_at`) VALUES
(2, 2, 100, '2023-04-04 17:10:26', '2023-04-04 17:10:26'),
(3, 2, 340, '2023-04-09 10:55:02', '2023-04-09 10:55:02'),
(4, 2, 569, '2023-04-09 10:56:44', '2023-04-09 10:56:44'),
(5, 2, 1000, '2023-04-10 14:55:27', '2023-04-10 14:55:27'),
(6, 2, 1479, '2023-04-10 14:58:36', '2023-04-10 14:58:36'),
(7, 2, 1782, '2023-04-10 15:52:33', '2023-04-10 15:52:33'),
(8, 2, 2346, '2023-04-10 16:49:36', '2023-04-10 16:49:36'),
(9, 2, 100000, '2023-04-10 16:55:35', '2023-04-10 16:55:35'),
(10, 2, 125, '2023-04-10 18:00:31', '2023-04-10 18:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `amount`, `created_at`, `updated_at`) VALUES
(4, 7000, '2023-04-04 10:12:43', '2023-04-04 10:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_status` varchar(50) NOT NULL DEFAULT 'Paid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(13, 2, 13, 1, 810, 'Paid', '2023-04-13 08:15:07', '2023-04-13 08:15:07'),
(14, 2, 4, 1, 10000, 'Paid', '2023-04-13 10:06:20', '2023-04-13 10:06:20'),
(15, 2, 3, 1, 140, 'Paid', '2023-04-13 10:15:48', '2023-04-13 10:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `card_number` int(20) NOT NULL,
  `holder_name` varchar(255) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `cvv` int(11) NOT NULL,
  `delivery_note` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_condition` varchar(255) NOT NULL,
  `product_status` varchar(255) NOT NULL DEFAULT 'Not Sold',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `user_id`, `productname`, `price`, `description`, `image`, `product_condition`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'used testing update', '720', 'we are updating this product now', 'http://localhost/property/dashboard/uploads/dev.png', 'Repaired Product', 'Sold', '2023-03-30 09:59:21', '2023-03-30 09:59:21'),
(3, 2, 'second hand', '140', '                                second hand laptop', 'http://localhost/property/dashboard/uploads/Brooklin.PNG', '', 'Sold', '2023-03-31 06:54:20', '2023-03-31 06:54:20'),
(4, 2, 'phone', '10000', 'an android ', 'http://localhost/property/dashboard/uploads/1.jpg', 'Damaged Product', 'Not Sold', '2023-04-04 09:58:32', '2023-04-04 09:58:32'),
(6, 2, 'test product', '900', 'damaged', 'http://localhost/property/dashboard/uploads/instruction 3.PNG', 'Damaged Product', 'Not Sold', '2023-04-04 17:10:26', '2023-04-04 17:10:26'),
(13, 2, 'qwerty update', '810', 'product                  ', 'http://localhost/property/dashboard/uploads/819.png', 'Damaged Product', 'Sold', '2023-04-10 16:55:35', '2023-04-10 16:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `subs`
--

CREATE TABLE `subs` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subs`
--

INSERT INTO `subs` (`id`, `email`, `created_at`, `updated_at`) VALUES
(2, 'fg@gmail.com', '2023-04-09 11:28:22', '2023-04-09 11:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `phone_number`, `address`, `usertype`, `password`) VALUES
(2, 'testuser', 'testuser@gmail.com', 123456786, 'ksi road lane 6th', 'Other User', '$2y$10$xq39voi4uoZMrQnTpX5xuuT/taGCIfZgN.zNm/p1Vb/0vQ1MRjA76'),
(4, 'admin', 'admin@gmail.com', 1234, 'Lane th', 'Admin', '$2y$10$lIakhTnPr60uQ1WJQCN27OR07do8A5xbX4KS.X/q75iCeRFeyix1u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subs`
--
ALTER TABLE `subs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
