-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 12:11 PM
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
-- Table structure for table `trray`
--

CREATE TABLE `trray` (
  `id` int(11) DEFAULT NULL,
  `userNo` int(11) DEFAULT NULL,
  `fname` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `lname` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `mname` varchar(9) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `role` varchar(7) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` varchar(37) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `email` varchar(51) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `gender` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `course` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `yr_lvl` int(11) DEFAULT NULL,
  `bdate` datetime DEFAULT NULL,
  `username` int(11) DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `pic` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trray`
--

INSERT INTO `trray` (`id`, `userNo`, `fname`, `lname`, `mname`, `role`, `address`, `contact`, `email`, `gender`, `course`, `yr_lvl`, `bdate`, `username`, `password`, `status`, `pic`, `created_at`) VALUES
(NULL, 2022011794, 'HALLEY', 'JAVIL', NULL, 'Student', 'Anabu 2F, Imus, Cavite', NULL, 'halley.javil@citycollegeoftagaytay.edu.ph', 'female', 'BSIT', 1, '2003-07-01 00:00:00', NULL, NULL, NULL, NULL, NULL),
(NULL, 1901283, 'MARK JOSEPH', 'JAVONITALLA', 'YBAÑEZ', 'Student', 'Maitim II West, Tagaytay City', NULL, 'markjoseph.javonitalla@citycollegeoftagaytay.edu.ph', 'male', 'BSIT', 4, '1999-11-13 00:00:00', NULL, NULL, NULL, NULL, NULL),
(NULL, 2022020014, 'JANELLA MARI', 'JAYOBO', 'ANACAY', 'Student', 'Kaybagal North, Tagaytay City, Cavite', NULL, 'janellamari.jayobo@citycollegeoftagaytay.edu.ph', 'female', 'BSIT', 1, '2003-07-08 00:00:00', NULL, NULL, NULL, NULL, NULL),
(NULL, 1801494, 'JERIC', 'JECIEL', 'DIGMA', 'Student', 'Luksuhin Ilaya, Alfonso Cavite', NULL, 'jeric.jeciel@citycollegeoftagaytay.edu.ph', 'male', 'BSIT', 4, '2000-01-18 00:00:00', NULL, NULL, NULL, NULL, NULL),
(NULL, 19011192, 'JERLYN', 'JECIEL', 'CABALLERO', 'Student', 'Palumlum, Alfonso, Cavite', NULL, 'jerlyn.jeciel@citycollegeoftagaytay.edu.ph', 'female', 'BSE-M', 4, '1987-07-20 00:00:00', NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
