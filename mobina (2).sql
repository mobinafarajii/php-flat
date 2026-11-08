-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2026 at 09:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobina`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog-techzone`
--

CREATE TABLE `blog-techzone` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `blog-id` int(11) NOT NULL,
  `des` text NOT NULL,
  `banner` text NOT NULL,
  `date` int(11) NOT NULL,
  `update` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog-techzone`
--

INSERT INTO `blog-techzone` (`id`, `title`, `blog-id`, `des`, `banner`, `date`, `update`, `status`) VALUES
(4, 'hhhhhh', 54, 'ئبببببببببببببببببببببببببرررببببببببببببببببببببببببببببببببببببببببببببببببببببببببببببب', 'banner2026-09-21-11-26-37.png', 1789982797, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart-techzone`
--

CREATE TABLE `cart-techzone` (
  `id` int(11) NOT NULL,
  `id-user` int(11) NOT NULL,
  `id-product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `id-factor` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart-techzone`
--

INSERT INTO `cart-techzone` (`id`, `id-user`, `id-product`, `price`, `count`, `id-factor`, `status`, `date`, `update`) VALUES
(10, 5, 6, 12000, 2, 0, 0, 1790682463, 1790682472),
(11, 5, 2, 45000, 4, 0, 0, 1790682481, 0),
(12, 5, 1, 22000, 4, 0, 0, 1790682491, 1790682528),
(13, 4, 3, 12000, 8, 0, 0, 1790682576, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `blong` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `updatee` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `banner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `blong`, `date`, `updatee`, `status`, `banner`) VALUES
(10, 'پردازنده(cpu)', 'product', 1790153248, 0, 1, 'banner2026-09-23-10-47-28.png'),
(11, 'سرور', 'product', 1790153263, 0, 1, 'banner2026-09-23-10-47-43.png'),
(12, 'رم', 'product', 1790153279, 0, 1, 'banner2026-09-23-10-47-59.png'),
(13, 'مادربرد', 'product', 1790153298, 0, 1, 'banner2026-09-23-10-48-18.png'),
(14, 'تجهیزات شبکه', 'product', 1790153627, 0, 1, 'banner2026-09-23-10-53-47.png'),
(15, 'لپ تاپ', 'product', 1790153640, 0, 1, 'banner2026-09-23-10-54-00.png'),
(16, 'مانیتور', 'product', 1790153652, 0, 1, 'banner2026-09-23-10-54-12.png');

-- --------------------------------------------------------

--
-- Table structure for table `factor-techzone`
--

CREATE TABLE `factor-techzone` (
  `id` int(11) NOT NULL,
  `id-user` int(11) NOT NULL,
  `total-price` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `date-expire` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `log` text NOT NULL,
  `method-payment` varchar(255) NOT NULL,
  `tracking-code` int(11) NOT NULL,
  `update` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products-techzone`
--

CREATE TABLE `products-techzone` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `update` int(11) NOT NULL,
  `banner` text NOT NULL,
  `cat-id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products-techzone`
--

INSERT INTO `products-techzone` (`id`, `name`, `price`, `date`, `update`, `banner`, `cat-id`, `status`) VALUES
(1, 'ASUS TUF RTX', 22000, 1790162516, 0, 'banner2026-09-23-13-21-56.jpg', 10, 1),
(2, 'samsung 980', 45000, 1790162578, 0, 'banner2026-09-23-13-22-58.jpg', 14, 1),
(3, 'ASUS ROG', 12000, 1790162702, 0, 'banner2026-09-23-13-25-02.png', 12, 1),
(4, 'fan', 4566000, 1790162747, 1790163164, 'banner2026-09-23-13-32-44.png', 13, 1),
(5, 'switch', 5200, 1790162830, 0, 'banner2026-09-23-13-27-10.png', 15, 1),
(6, 'motherboard', 12000, 1790163105, 0, 'banner2026-09-23-13-31-45.png', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `techzone-user`
--

CREATE TABLE `techzone-user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailorphone` text NOT NULL,
  `password` int(11) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `techzone-user`
--

INSERT INTO `techzone-user` (`id`, `name`, `emailorphone`, `password`, `role`) VALUES
(1, 'مبینا فرجی', 'mobinaffaraji1584@gmail.com', 123456, 'admin'),
(3, ' ساحل پارسا', '09124075045', 123456, 'user'),
(4, 'سارا یزدانی', '09102119208', 123456, 'user'),
(5, 'مهوا', '09124075084', 123456, 'user'),
(6, 'شیوا', '09102119207', 123456, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog-techzone`
--
ALTER TABLE `blog-techzone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart-techzone`
--
ALTER TABLE `cart-techzone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factor-techzone`
--
ALTER TABLE `factor-techzone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products-techzone`
--
ALTER TABLE `products-techzone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `techzone-user`
--
ALTER TABLE `techzone-user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog-techzone`
--
ALTER TABLE `blog-techzone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart-techzone`
--
ALTER TABLE `cart-techzone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `factor-techzone`
--
ALTER TABLE `factor-techzone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products-techzone`
--
ALTER TABLE `products-techzone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `techzone-user`
--
ALTER TABLE `techzone-user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
