-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2023 at 12:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ptpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `scales`
--

CREATE TABLE `scales` (
  `id` bigint(20) NOT NULL,
  `truck_number` varchar(100) DEFAULT NULL,
  `driver_name` varchar(100) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `information` text DEFAULT NULL,
  `bruto` int(11) DEFAULT NULL,
  `tara` int(11) DEFAULT NULL,
  `netto` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `create_time` time DEFAULT NULL,
  `update_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scales`
--

INSERT INTO `scales` (`id`, `truck_number`, `driver_name`, `item_name`, `destination`, `information`, `bruto`, `tara`, `netto`, `create_date`, `update_date`, `create_time`, `update_time`) VALUES
(13, 'A123B', 'A1', NULL, NULL, NULL, 9, NULL, NULL, '2023-08-06', NULL, '11:35:21', NULL),
(14, 'A12B', 'A2', NULL, NULL, NULL, 8, NULL, NULL, '2023-08-07', NULL, '18:36:47', NULL),
(15, 'A1A', 'A1', 'B1', 'R1', NULL, 12, 1, 11, '2023-08-08', '2023-08-31', '07:00:00', '16:54:18'),
(16, 'A112A', 'A12', 'B12', 'R12', NULL, 12, 1, 11, '2023-08-19', NULL, '11:41:24', '16:52:22'),
(17, 'A11A', 'A11', 'B11', 'R11', NULL, 11, 1, 10, '2023-08-09', NULL, '16:44:10', '16:51:23'),
(18, 'A10A', 'A10', 'A100000', 'R100000', NULL, 10, 1, 9, '2023-08-24', NULL, '16:46:08', NULL),
(19, 'B1B', 'S1', 'B1', 'R1', 'K1', 10, 1, 9, '2023-08-07', '2023-08-11', '17:23:08', '17:23:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scales`
--
ALTER TABLE `scales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scales`
--
ALTER TABLE `scales`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
