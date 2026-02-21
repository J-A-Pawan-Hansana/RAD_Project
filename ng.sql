-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2026 at 12:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ng`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin2', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(20, 10, 7, 'smart phone', 20000, 1, 'home-img-1.png'),
(25, 14, 7, 'smart phone', 20000, 1, 'home-img-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`) VALUES
(8, 'pawan', 'pawan@gmail.com', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
(9, 'nethmini', 'nethmini@gmail.com', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
(10, 'mala', 'mala@gmail.com', '2c12471b9239ff8697b41621cc0be83e4d55c0f8'),
(12, 'nilu', 'nilu@gmail.com', '03530cf09b0bca1662c96d84c415c65040740a78'),
(13, 'niluuu', 'niluuu@gmail.com', 'aa1a3483f57da6a680e53e3b8e37576b036970e9'),
(14, 'niluni', 'niluni@gmail.com', '2c12471b9239ff8697b41621cc0be83e4d55c0f8');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` int(10) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(0, 12, 'nilu', 'nilu@gmail.com', 332267528, 'can i get used i phone 7'),
(0, 13, 'niluu', 'niluuu@gmail.com', 332267528, 'can i get used i phone 14'),
(0, 14, 'niluni', 'niluni@gmail.com', 332267524, 'can i buy a used i phone 7+');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(100) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 100, 'pawan', '0783875459', 'pawan@gmail.com', 'cash on delivery', '388/A,Galahitiyawa south ,Ganemulla', 'phone 2', 130000, '2025-01-02 00:00:00', 'completed'),
(19, 12, 'nilu', '0332267528', 'nilu@gmail.com', 'cash on delivery', 'flat no. no.10, gampaha, gampaha, kirindiwela, Sri Lanka - 11730', 'smart phone (20000 x 1) - ', 20000, '2025-03-06 01:13:49', 'pending'),
(20, 13, 'niluuu', '0332267528', 'niluuu@gmail.com', 'cash on delivery', 'flat no. no.70, gampaha, Kirindiwela, gampaha, Sri Lanka - 11730', 'smart phone (20000 x 3) - ', 60000, '2025-03-06 01:25:53', ''),
(21, 14, 'niluni', '0332267528', 'niluni@gmail.com', 'cash on delivery', 'flat no. no.10, kirindiwela, gampaha, kirindiwela, sri lanka - 1400', 'smart watch (5000 x 3) - ', 15000, '2025-03-06 08:58:50', ''),
(22, 8, 'Ruvini Wijerathna', '0332267528', 'ruvininwijerathna@gmail.com', 'cash on delivery', 'flat no. kirindiwela, gampaha, Kirindiwela, gampaha, Sri Lanka - 11730', 'smart phone (20000 x 1) - ', 20000, '2025-03-06 11:26:03', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `price` int(10) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL,
  `image_03` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `image_01`, `image_02`, `image_03`) VALUES
(7, 'smart phone', 'phone', 20000, 'home-img-1.png', 'home-img-1.png', 'home-img-1.png'),
(8, 'smart watch', 'watch', 5000, '2.png', '2.png', '2.png'),
(10, 'head set ', 'Material ABS + PC + Metal\r\nWireless version V5.2\r\nOperating distance 10 m\r\nBattery capacity 30 mAh / 1.11 Wh\r\nCharging interface Type C\r\nCharging time approx. 1 hour\r\nMusic playback time up to 33 hours\r\nFrequency 20 Hz - 20 kHz', 3500, 'download (1).jpeg', 'images (1).jpeg', 'download.jpeg'),
(11, 'back cover ', 'Dynamic Silicone\r\nPerfect Fit\r\nSuper Comfort Grip\r\nComplete Protection with Hardy Edges\r\nEasy to Apply / Easy to Remove\r\nSold and Fulfilled by Mongo', 1000, 'back1.jpeg', 'back2).jpeg', 'back3).jpeg'),
(13, 'iPhone 16 Pro', 'Titanium design with larger 6.3-inch Super Retina XDR display, footnote 1 durable latest-generation Ceramic Shield, Action button, and USB-C with USB 3 speeds footnote 2\r\nThe first iPhone designed for Apple Intelligence. footnote 3 Personal, private, powerful.\r\n', 999, 'WhatsApp Image 2025-03-05 at 22.48.32_69e750e6.jpg', 'WhatsApp Image 2025-03-05 at 22.50.21_ade7497b.jpg', 'WhatsApp Image 2025-03-05 at 22.50.47_761f2e7e.jpg'),
(14, 'i phone 16', 'Titanium design with larger 6.3-inch Super Retina XDR display, footnote 1 durable latest-generation Ceramic Shield, Action button, and USB-C with USB 3 speeds footnote 2', 105000, 'i phone 16 pro.jpg', 'i phone 16 pro 2.jpg', 'i phone 16 pro 3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(5, 9, 7, 'smart phone', 20000, 'home-img-1.png'),
(10, 12, 13, 'iPhone 16 Pro', 999, 'WhatsApp Image 2025-03-05 at 22.48.32_69e750e6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
