-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2024 at 05:49 PM
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
-- Database: `TedxRMC`
--

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `ID` int(255) NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `LAST_NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PHONE` varchar(255) NOT NULL,
  `CHOICE` varchar(255) NOT NULL,
  `COLLEGE` varchar(255) NOT NULL,
  `OCCUPATION` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `IMAGE` varchar(255) NOT NULL,
  `ADMIN` varchar(255) NOT NULL,
  `TOKEN` varchar(255) NOT NULL,
  `RESET_TOKEN_HASH` varchar(64) DEFAULT NULL,
  `RESET_TOKEN_EXPIRES_AT` datetime DEFAULT NULL,
  `STATUS` varchar(255) NOT NULL,
  `PAYMENT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PHONE`, `CHOICE`, `COLLEGE`, `OCCUPATION`, `PASSWORD`, `IMAGE`, `ADMIN`, `TOKEN`, `RESET_TOKEN_HASH`, `RESET_TOKEN_EXPIRES_AT`, `STATUS`, `PAYMENT`) VALUES
(59, 'Devansh', 'Tyagi', 'glitchtv69@gmail.com', '8923955041', 'student', 'RMC', 'NULL', '$2y$10$povBWhpTUEB1hM3wQhwKOuKLGSA6ZHNX3btZ0oKd42XXZ0ireyY.K', '66b3254e21e1d.jpg', 'True', 'cb89d2b6c3ad1b0ba132a2e8962b3f', NULL, NULL, 'active', 'done');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `RESET_TOKEN_HASH` (`RESET_TOKEN_HASH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
