-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 05:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practical1`
--

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `friend_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(201) NOT NULL,
  `profile_name` varchar(200) NOT NULL,
  `date_start` date NOT NULL DEFAULT current_timestamp(),
  `no_friends` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`friend_id`, `email`, `password`, `profile_name`, `date_start`, `no_friends`) VALUES
(1, 'sathdi@gmail.com', '123123', 'jxkjwjc', '2023-10-14', 0),
(3, 'rsksk339@gmail.com', '1234', 'jxkjwjc', '2023-10-14', 0),
(4, 'sathdid@gmail.com', '1234qwe', 'sjsjdjs', '2023-10-14', 0),
(5, 'sathdssi@gmail.com', '1234wer', 'lakshan', '2023-10-14', 0),
(6, 'jsjs2122@gmail.com', 'iopuiop', 'kumards', '2023-10-14', 0),
(7, 'sathssd2132qi@gmail.com', 'rusiru', 'skajjd', '2023-10-14', 0),
(8, 'thenuzssd2132qi@gmail.com', 'sathis', 'skajjd', '2023-10-14', 0),
(9, 'thenwehwessd2132qi@gmail.com', '12345qwe', 'kuamr', '2023-10-14', 0),
(10, 'kuamrahwessd2132qi@gmail.com', 'kumar12', 'kumarsj', '2023-10-14', 0),
(11, 'lakshmisd2132qi@gmail.com', 'ethinesh', 'ramesh', '2023-10-14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `my_friend`
--

CREATE TABLE `my_friend` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `my_friend`
--

INSERT INTO `my_friend` (`user_id`, `friend_id`) VALUES
(3, 0),
(3, 0),
(3, 1),
(3, 4),
(3, 5),
(11, 1),
(11, 3),
(11, 4),
(11, 5),
(11, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`friend_id`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `friend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
