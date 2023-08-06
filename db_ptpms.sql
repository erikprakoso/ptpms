-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2023 at 09:06 AM
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
  `create_date` date DEFAULT NULL,
  `truck_number` varchar(100) DEFAULT NULL,
  `driver_name` varchar(100) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `bruto` int(11) DEFAULT NULL,
  `tara` int(11) DEFAULT NULL,
  `netto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scales`
--

INSERT INTO `scales` (`id`, `create_date`, `truck_number`, `driver_name`, `item_name`, `destination`, `bruto`, `tara`, `netto`) VALUES
(10, '2023-08-03', 'A 1 B', 'Sopir 1', 'Barang 1', 'Relasi 1', 1000, 1, 999),
(12, '2023-08-05', 'A 12 B', 'A1', NULL, NULL, 1000000, NULL, NULL);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
