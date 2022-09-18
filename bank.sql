-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2022 at 09:53 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `amount`) VALUES
(12698, 'muzamil', '2000+2000'),
(36499, 'Rehman', 'Array-5000-5000-12000'),
(53038, 'moheez', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `transiction2`
--

CREATE TABLE `transiction2` (
  `id` int(11) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `deposit` varchar(50) NOT NULL,
  `withdraw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transiction2`
--

INSERT INTO `transiction2` (`id`, `account_no`, `deposit`, `withdraw`) VALUES
(2, '12698', '2000', '0'),
(3, '12698', '0', '10000'),
(4, '12698', '0', '500'),
(5, '12698', '2000', '0'),
(6, '36499', '0', '5000'),
(7, '36499', '0', '5000'),
(8, '36499', '0', '12000'),
(9, '51026', '500', '0'),
(10, '53038', '0', '500'),
(11, '53038', '0', '500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transiction2`
--
ALTER TABLE `transiction2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53039;

--
-- AUTO_INCREMENT for table `transiction2`
--
ALTER TABLE `transiction2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
