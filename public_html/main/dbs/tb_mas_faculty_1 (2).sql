-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 10, 2023 at 12:19 AM
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
-- Database: `u823561260_lib`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_mas_faculty_1`
--

CREATE TABLE `tb_mas_faculty_1` (
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
-- Dumping data for table `tb_mas_faculty_1`
--

INSERT INTO `tb_mas_faculty_1` (`id`, `Column_12`, `fname`, `mname`, `lname`, `role`, `contact`, `address`, `Management_Information_System`, `Non_teaching`) VALUES
(150, '232', 'KENO', '', 'VILLAVICENCIO', 'Faculty', NULL, '', 'Information Technology', 'SCS'),
(151, '233', 'GREG', 'L', 'SANGALANG', 'Faculty', NULL, '', 'Secondary Education', 'SED'),
(152, '234', 'MAURICIO', 'G', 'HERNANDEZ', 'Faculty', NULL, '', 'General Education', 'SAS'),
(153, '235', 'LIBERATO', '', 'MOISES', 'Faculty', NULL, '', 'General Education', 'SAS'),
(154, '999', 'unassigned', '', '', 'Faculty', NULL, '', NULL, NULL),
(155, '1000', 'MARICAR', '', 'ANGCAYA', 'Faculty', NULL, '', 'Business Administration-MM', 'SBM'),
(156, '1001', 'JANICE', '', 'CAUSAREN', 'Faculty', NULL, '', 'Business Administration-MM', 'SBM'),
(157, '1002', 'ESPERANZA', '', 'DISEPEDA', 'Faculty', NULL, '', 'General Education', 'SAS'),
(158, '1003', 'MA. ANGELICA', '', 'DIMAPILIS', 'Faculty', NULL, '', 'Hospitality Management', 'SHTM'),
(159, '1004', 'RALPH', '', 'DOMINGO', 'Faculty', NULL, '', 'Hospitality Management', 'SHTM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_mas_faculty_1`
--
ALTER TABLE `tb_mas_faculty_1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_mas_faculty_1`
--
ALTER TABLE `tb_mas_faculty_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
