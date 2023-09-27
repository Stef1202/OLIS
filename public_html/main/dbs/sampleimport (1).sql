-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 04, 2023 at 02:38 AM
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
-- Table structure for table `sampleimport`
--

CREATE TABLE `sampleimport` (
  `id` int(11) DEFAULT NULL,
  `userNo` int(11) DEFAULT NULL,
  `fname` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `lname` varchar(7) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `mname` varchar(9) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `role` varchar(7) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` varchar(39) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `email` varchar(51) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `gender` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `course` varchar(7) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `yr_lvl` int(11) DEFAULT NULL,
  `bdate` datetime DEFAULT NULL,
  `username` int(11) DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `pic` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sampleimport`
--

INSERT INTO `sampleimport` (`id`, `userNo`, `fname`, `lname`, `mname`, `role`, `address`, `contact`, `email`, `gender`, `course`, `yr_lvl`, `bdate`, `username`, `password`, `status`, `pic`, `created_at`) VALUES
(NULL, 1901114, 'MARIA CAMILLE', 'AMULONG', 'JOSE', 'Student', 'Sta. Monica, Sungay West, Tagaytay City', NULL, 'mariacamille.amulong@citycollegeoftagaytay.edu.ph', 'female', 'BSHM', 4, '2001-03-12 00:00:00', NULL, NULL, NULL, NULL, NULL),
(NULL, 2022010082, 'JANE ROSE', 'AMULONG', 'SORILLANO', 'Student', 'Kaybagal South, Tagaytay City, Cavite', NULL, 'janerose.amulong@citycollegeoftagaytay.edu.ph', 'female', 'BSBA-MM', 1, '2003-08-11 00:00:00', NULL, NULL, NULL, NULL, NULL),
(NULL, 2022010081, 'KATRINA', 'AMULONG', 'JAVIER', 'Student', 'Kaybagal Central, Tagaytay City, Cavite', NULL, 'katrina.amulong@citycollegeoftagaytay.edu.ph', 'female', 'BSOA', 1, '2003-10-24 00:00:00', NULL, NULL, NULL, NULL, NULL),
(NULL, 2022010080, 'YASMIEN MIKAELA', 'AMULONG', 'MARASIGAN', 'Student', 'Sungay West, Tagaytay City, Cavite', NULL, 'yasmienmikaela.amulong@citycollegeoftagaytay.edu.ph', 'female', 'BSE-SS', 1, '2004-01-20 00:00:00', NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
