-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2023 at 09:35 AM
-- Server version: 8.0.32
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `businessdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_price` varchar(15) NOT NULL,
  `product_discription` varchar(150) NOT NULL,
  `image` blob NOT NULL,
  `product_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_name`, `product_price`, `product_discription`, `image`, `product_id`) VALUES
('Samsung Galaxy S23+ {8GB RAM|256GB}', '262,990', 'Direct Import / Brand New / Sealed Pack / Original / Non TRCSL Approved / 01 Week Checking Warranty', 0x53616d73756e672047616c617879205332332b2d323238783232382e6a7067, 16),
('Samsung Galaxy S23 Ultra {12GB RAM|512GB}', '347,490', 'Direct Import / Brand New / Sealed Pack / Original / Non TRCSL Approved / 01 Week Checking Warranty', 0x47616c6178792053323320556c7472612d323238783232382e6a7067, 17),
('Samsung Galaxy S23 {8GB RAM|256G}', '214,990', 'Direct Import / Brand New / Sealed Pack / Original / Non TRCSL Approved / 01 Week Checking Warranty', 0x53616d73756e672047616c617879205332332d323238783232382e6a7067, 18),
('Samsung Galaxy S23 Ultra (12GB RAM|256GB)', '289,490', 'Direct Import / Brand New / Sealed Pack / Original / Non TRCSL Approved / 01 Week Checking Warranty', 0x47616c6178792053323320556c7472612d323238783232382e6a7067, 19),
('Samsung Galaxy S22 Ultra 5G (12GB RAM|256GB)', '259,990', 'Direct Import / Brand New / Sealed Pack / Original / Non TRCSL Approved / 01 Week Checking Warranty', 0x53616d73756e672047616c6178792053323220556c7472612035472d323238783232382e6a7067, 20),
('Samsung Galaxy S22 5G {8GB RAM|256GB}', '175,490', 'Direct Import / Brand New / Sealed Pack / Original / Non TRCSL Approved / 01 Week Checking Warranty', 0x53616d73756e672047616c617879205332322035472d323238783232382e6a7067, 21),
('Samsung Galaxy S21 FE 5G {8GB RAM|256GB}', '128,990', 'Direct Import / Brand New / Sealed Pack / Original / Non TRCSL Approved / 01 Week Checking Warranty', 0x53616d73756e672047616c617879205332312046452035472d323238783232382e6a7067, 22),
('Samsung Galaxy M34 5G {8GB RAM|128GB}', '79,490', 'Direct Import / Brand New / Sealed Pack / Original / Non TRCSL Approved / 01 Week Checking Warranty', 0x53616d73756e672047616c617879204d33342035472d323238783232382e6a7067, 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tel_num` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `user_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`, `tel_num`, `id`, `user_type`) VALUES
('kavin', 'abc@gmail.com', 'me1234', 772345897, 1, 'superadmin'),
('pooja', 'root@gmail.com', '1808', 772634565, 2, 'user'),
('kamala', 'kamala@gmail.com', 'abc', 772634565, 3, 'user'),
('uvini', 'uvi@gmail.com', 'uvi123', 772634565, 4, 'user'),
('keerthana', 'keer@gmail.com', 'keer12', 775678432, 7, 'user'),
('lisa', 'lisa@gmail.com', 'lisa123', 776543212, 8, 'admin'),
('pooja', 'keer@gmail.com', 'pk89', 775678432, 9, 'user'),
('kanala', 'kanala@gmail.com', 'polk', 775678432, 10, 'user'),
('abc', 'abc@gmail.com', 'abc', 786543212, 11, 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
