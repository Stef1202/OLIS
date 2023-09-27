-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2023 at 10:47 AM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u823561260_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `new_users`
--

CREATE TABLE `new_users` (
  `id` int(11) NOT NULL,
  `Column_12` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `fname` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lname` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Faculty',
  `contact` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `address` varchar(99) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Management_Information_System` varchar(29) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Non_teaching` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_users`
--

INSERT INTO `new_users` (`id`, `Column_12`, `fname`, `mname`, `lname`, `role`, `contact`, `address`, `Management_Information_System`, `Non_teaching`) VALUES
(5, '79', 'CARLO', 'C', 'MARAAN', 'Faculty', NULL, '', 'Information Technology', 'SCS'),
(6, '80', 'RONNIE', 'INTANO', 'MARANAN', 'Faculty', NULL, '', 'Computer Science', 'SCS'),
(7, '81', 'MARK LESTER', 'BAYAS', 'ORSAL', 'Faculty', NULL, '', 'Computer Science', 'SCS'),
(8, '82', 'ALDWIN KARLO', '', 'ANGCAYA', 'Faculty', NULL, '', 'Information Technology', 'SCS'),
(9, '85', 'JENNY ROSE', '', 'BAYLON', 'Faculty', NULL, '', 'Hospitality Management', 'SHTM'),
(10, '86', 'ROLAND', '', 'CATAPAT', 'Faculty', NULL, '', 'Secondary Education', 'SED'),
(11, '87', 'EVANGELINE', '', 'PAMINTUAN', 'Faculty', NULL, '', 'Computer Science', 'SCS'),
(12, '88', 'MARIBEL', '', 'RAMOS', 'Faculty', NULL, '', 'Secondary Education', 'SED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `new_users`
--
ALTER TABLE `new_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `new_users`
--
ALTER TABLE `new_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
