-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 27, 2023 at 03:20 AM
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
-- Table structure for table `tbl_userss`
--

CREATE TABLE `tbl_userss` (
  `id` int(11) NOT NULL,
  `userNo` varchar(50) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `mname` varchar(50) NOT NULL,
  `role` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `yr_lvl` int(11) NOT NULL,
  `bdate` varchar(50) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL COMMENT 'asd',
  `status` varchar(50) NOT NULL DEFAULT 'Active',
  `pic` varchar(255) NOT NULL DEFAULT 'default.png',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_userss`
--

INSERT INTO `tbl_userss` (`id`, `userNo`, `fname`, `lname`, `mname`, `role`, `address`, `contact`, `email`, `gender`, `course`, `yr_lvl`, `bdate`, `username`, `password`, `status`, `pic`, `created_at`) VALUES
(400, '2022011871', 'JANEA EDRINE', 'ANONUEVO', 'DIGMA', 'Student', 'Taywanak Ilaya, Alfonso, Cavite', '', 'janeaedrine.anonuevo@citycollegeoftagaytay.edu.ph', 'female', 'BSOA', 1, '09-04-2004', '2022011871', '2022011871', 'Active', 'default.png', '2023-05-14 09:59:42'),
(401, '2022010104', 'MARCO', 'ANOSA', 'DELOS SANTOS', 'Student', 'Guinhawa South, Tagaytay City, Cavite', '', 'marco.anosa@citycollegeoftagaytay.edu.ph', 'male', 'BSHM', 1, '02-22-2003', '2022010104', '2022010104', 'Active', 'default.png', '2023-05-14 09:59:42'),
(402, '20010871', 'BOBBY ADRIAN', 'AÃ‘OSA', 'ROSELL', 'Student', 'Maharlika East, Tagaytay City, Cavite', '', 'bobbyadrian.anosa@citycollegeoftagaytay.edu.ph', 'male', 'BSE-E', 3, '08-26-2001', '20010871', '20010871', 'Active', 'default.png', '2023-05-14 09:59:42'),
(403, '2022010105', 'EZEKIEL JAMES', 'ANTALLAN', 'ORONOS', 'Student', 'Patutong Malaki North, Tagaytay City, Cavite', '', 'ezekieljames.antallan@citycollegeoftagaytay.edu.ph', 'male', 'BSHM', 1, '03-10-2004', '2022010105', '2022010105', 'Active', 'default.png', '2023-05-14 09:59:42'),
(404, '2022010106', 'RHEA LIZA', 'ANTHONY', 'ROTA', 'Student', 'Patutong Malaki North, Tagaytay City, Cavite', '', 'rhealiza.anthony@citycollegeoftagaytay.edu.ph', 'female', 'BSHM', 1, '03-30-2004', '2022010106', '2022010106', 'Active', 'default.png', '2023-05-14 09:59:42'),
(405, '2022010107', 'RHEA MAE', 'ANTHONY', '', 'Student', 'Patutong Malaki North, Tagaytay City, Cavite', '', 'rheamae.anthony@citycollegeoftagaytay.edu.ph', 'female', 'BSTM', 1, '03-30-2004', '2022010107', '2022010107', 'Active', 'default.png', '2023-05-14 09:59:42'),
(406, '1901986', 'NICO', 'ANTONIO', 'FAJARDO', 'Student', 'Calabuso, Tagaytay City', '', 'nico.antonio@citycollegeoftagaytay.edu.ph', 'male', 'BSHM', 4, '10-07-2000', '1901986', '1901986', 'Active', 'default.png', '2023-05-14 09:59:42'),
(407, '2022010108', 'MICADY', 'ANTONIO', '', 'Student', 'Buna Cerca, Indang, Cavite', '', 'micady.antonio@citycollegeoftagaytay.edu.ph', 'female', 'BSBA-MM', 1, '06-10-2001', '2022010108', '2022010108', 'Active', 'default.png', '2023-05-14 09:59:42'),
(408, '2022010109', 'GWENYTH', 'ANTONIO', '', 'Student', 'Silang Junction North, Tagaytay City, Cavite', '', 'gwenyth.antonio@citycollegeoftagaytay.edu.ph', 'female', 'BSBA-MM', 1, '11-15-2004', '2022010109', '2022010109', 'Active', 'default.png', '2023-05-14 09:59:42'),
(409, '2021010101', 'JENNY', 'ANTONIO', 'CALUCAG', 'Student', 'Galicia 3, Mendez, Cavite', '', 'jenny.antonio@citycollegeoftagaytay.edu.ph', 'female', 'BSIT', 2, '01-15-2003', '2021010101', '2021010101', 'Active', 'default.png', '2023-05-14 09:59:42'),
(410, '20010054', 'LEILA KAYE', 'ANTONIO', 'OGAYON', 'Student', 'Kaybagal North, Tagaytay City, Cavite', '', 'leilakaye.antonio@citycollegeoftagaytay.edu.ph', 'male', 'BSBA-HRDM', 3, '08-30-2001', '20010054', '20010054', 'Active', 'default.png', '2023-05-14 09:59:42'),
(411, '2022010111', 'JUNIQUECA', 'APALIS', '', 'Student', 'San Jose, Tagaytay City, Cavite', '', 'juniqueca.apalis@citycollegeoftagaytay.edu.ph', 'female', 'BSOA', 1, '06-27-2004', '2022010111', '2022010111', 'Active', 'default.png', '2023-05-14 09:59:42'),
(412, '20010335', 'JASMINE XYRILL', 'APALIS', 'LASQUETE', 'Student', 'San Jose, Tagaytay City, Cavite', '', 'jasminexyrill.apalis@citycollegeoftagaytay.edu.ph', 'female', 'BSBA-MM', 3, '07-21-2001', '20010335', '20010335', 'Active', 'default.png', '2023-05-14 09:59:42'),
(413, '2022012082', 'NUEL', 'APIADO', 'CERVERA', 'Student', 'Francisco, Tagaytay City, Cavite', '', 'nuel.apiado@citycollegeoftagaytay.edu.ph', 'male', 'BSBA-HRDM', 1, '11-19-1988', '2022012082', '2022012082', 'Active', 'default.png', '2023-05-14 09:59:42'),
(414, '20010108', 'KARYLLE', 'APILADA', '', 'Student', 'Francisco (San Francisco), Tagaytay City, Cavite', '', 'karylle.apilada@citycollegeoftagaytay.edu.ph', 'female', 'BSE-E', 3, '07-28-2000', '20010108', '20010108', 'Active', 'default.png', '2023-05-14 09:59:42'),
(415, '1901407', 'IAN STEVEN', 'APILADO', 'ADVINCULA', 'Student', '016 Halang, Amadeo, Cavite', '', 'iansteven.apilado@citycollegeoftagaytay.edu.ph', 'male', 'BSHM', 4, '09-03-2001', '1901407', '1901407', 'Active', 'default.png', '2023-05-14 09:59:42'),
(416, '2022010112', 'EDELIZA', 'APILADO', 'SAMBILLO', 'Student', 'Tamayo, Calaca, Batangas', '', 'edeliza.apilado@citycollegeoftagaytay.edu.ph', 'female', 'BSBA-MM', 1, '03-15-2003', '2022010112', '2022010112', 'Active', 'default.png', '2023-05-14 09:59:42'),
(417, '2022010113', 'RIZA MAE', 'APITAN', 'ABORDO', 'Student', 'Dagatan, Amadeo, Cavite', '', 'rizamae.apitan@citycollegeoftagaytay.edu.ph', 'female', 'BSHM', 1, '08-28-2003', '2022010113', '2022010113', 'Active', 'default.png', '2023-05-14 09:59:42'),
(418, '2021010102', 'CHERRY MAE', 'APOLONA', 'DEL ROSARIO', 'Student', 'Kaybagal South, Tagaytay City, Cavite', '', 'cherrymae.apolona@citycollegeoftagaytay.edu.ph', 'female', 'BSE-F', 2, '12-09-2002', '2021010102', '2021010102', 'Active', 'default.png', '2023-05-14 09:59:42'),
(419, '2020020020', 'JUSTINE', 'APOLONIA', 'GATDULA', 'Student', 'Aga, Nasugbu, Batangas', '', 'justine.apolonia@citycollegeoftagaytay.edu.ph', 'female', 'BSTM', 2, '11-11-2000', '2020020020', '2020020020', 'Active', 'default.png', '2023-05-14 09:59:42'),
(420, '1901137', 'ALYSSA MAE', 'APOLONIA', 'DE DIOS', 'Student', 'Nasugbu, Batangas', '', 'alyssamae.apolonia@citycollegeoftagaytay.edu.ph', 'female', 'BSE-F', 4, '06-26-2000', '1901137', '1901137', 'Active', 'default.png', '2023-05-14 09:59:42'),
(421, '1901021', 'BRYLLE', 'APOR', 'RECTO', 'Student', 'Purok 6, Ambid St. Brgy. Biluso, Silang Cavite', '', 'brylle.apor@citycollegeoftagaytay.edu.ph', 'male', 'BSBA-MM', 3, '08-16-1994', '1901021', '1901021', 'Active', 'default.png', '2023-05-14 09:59:42'),
(422, '2022010114', 'JOHNVEN', 'APUYAN', 'PALOMA', 'Student', 'Kaybagal North, Tagaytay City, Cavite', '', 'johnven.apuyan@citycollegeoftagaytay.edu.ph', 'male', 'BSHM', 1, '12-02-2001', '2022010114', '2022010114', 'Active', 'default.png', '2023-05-14 09:59:42'),
(423, '2021010104', 'DANNAH YSABELLE', 'AQUILIZAN', 'MARIN', 'Student', 'Tubuan 1, Silang, Cavite', '', 'dannahysabelle.aquilizan@citycollegeoftagaytay.edu.ph', 'female', 'BSHM', 2, '04-29-2003', '2021010104', '2021010104', 'Active', 'default.png', '2023-05-14 09:59:42'),
(424, '1901173', 'JAIME JR', 'AQUINDE', 'TRIPOLI', 'Student', 'Brgy. Mendez Crossing East Tagaytay City', '', 'jaimejr.aquinde@citycollegeoftagaytay.edu.ph', 'male', 'BSHM', 4, '02-22-1999', '1901173', '1901173', 'Active', 'default.png', '2023-05-14 09:59:42'),
(425, '19011110', 'EDUARDO JR.', 'AQUINO', 'TAGANILE', 'Student', 'Purok 174, Sungay East, Tagaytay City', '', 'eduardojr.aquino@citycollegeoftagaytay.edu.ph', 'male', 'BSHM', 4, '03-08-1998', '19011110', '19011110', 'Active', 'default.png', '2023-05-14 09:59:42'),
(426, '2022010115', 'ASHLEY KATE', 'AQUINO', 'MONTANEZ', 'Student', 'Lumil, Silang, Cavite', '', 'ashleykate.aquino@citycollegeoftagaytay.edu.ph', 'female', 'BSTM', 1, '08-25-2003', '2022010115', '2022010115', 'Active', 'default.png', '2023-05-14 09:59:42'),
(427, '2021010105', 'HAZEL ANN', 'AQUINO', 'DINGLASAN', 'Student', 'Galicia 3, Mendez, Cavite', '', 'hazelann.aquino@citycollegeoftagaytay.edu.ph', 'female', 'BSIT', 2, '04-25-2003', '2021010105', '2021010105', 'Active', 'default.png', '2023-05-14 09:59:42'),
(428, '2021010107', 'HANNAH', 'AQUINO', 'BITUIN', 'Student', 'Kaylaway, Nasugbu, Batangas', '', 'hannah.aquino@citycollegeoftagaytay.edu.ph', 'female', 'BSOA', 2, '09-10-2002', '2021010107', '2021010107', 'Active', 'default.png', '2023-05-14 09:59:42'),
(429, '2021010106', 'JASMIN KAYE', 'AQUINO', 'BORJA', 'Student', 'Mendez Crossing West, Tagaytay City, Cavite', '', 'jasminkaye.aquino@citycollegeoftagaytay.edu.ph', 'female', 'BSHM', 2, '10-20-2001', '2021010106', '2021010106', 'Active', 'default.png', '2023-05-14 09:59:42'),
(430, '1901064', 'ALMA', 'AQUINO', 'MOJICA', 'Student', 'Bukal, Mendez, Cavite', '', 'alma.aquino@citycollegeoftagaytay.edu.ph', 'female', 'BSBA-HRDM', 4, '09-11-2000', '1901064', '1901064', 'Active', 'default.png', '2023-05-14 09:59:42'),
(431, '20011034', 'JERICHO ANGELO', 'AQUINO', 'IKAN', 'Student', 'Casta?os Cerca, Gen. Emilio Aguinaldo, Cavite', '', 'jerichoangelo.aquino@citycollegeoftagaytay.edu.ph', 'male', 'BSOA', 3, '05-17-2001', '20011034', '20011034', 'Active', 'default.png', '2023-05-14 09:59:42'),
(432, '1901926', 'NEIL BRYAN', 'AQUINO', 'LANCETA', 'Student', 'Pooc 1, Silang, Cavite', '', 'neilbryan.aquino@citycollegeoftagaytay.edu.ph', 'male', 'BSBA-HRDM', 4, '01-14-2000', '1901926', '1901926', 'Active', 'default.png', '2023-05-14 09:59:42'),
(433, '2020020021', 'AIRA', 'AQUINO', 'GARCERA', 'Student', 'Kaybagal South, Tagaytay City, Cavite', '', 'aira.aquino@citycollegeoftagaytay.edu.ph', 'female', 'BSTM', 2, '06-06-2000', '2020020021', '2020020021', 'Active', 'default.png', '2023-05-14 09:59:42'),
(434, '2021010108', 'WEIN WRIGHT', 'ARABEJO', 'ASUNCION', 'Student', 'Kaong, Silang, Cavite', '', 'weinwright.arabejo@citycollegeoftagaytay.edu.ph', 'male', 'BSOA', 2, '06-04-2001', '2021010108', '2021010108', 'Active', 'default.png', '2023-05-14 09:59:42'),
(435, '2022011965', 'KIMBERLY BERLY', 'ARAGON', 'NA', 'Student', 'Biga I, Silang, Cavite', '', 'kimberlyberly.aragon@citycollegeoftagaytay.edu.ph', 'female', 'BSBA-MM', 1, '02-20-1999', '2022011965', '2022011965', 'Active', 'default.png', '2023-05-14 09:59:42'),
(436, '2022011964', 'MA.GINELLIE', 'ARAGON', '', 'Student', 'Sabutan, Silang, Cavite', '', 'ma.ginellie.aragon@citycollegeoftagaytay.edu.ph', 'female', 'BSBA-MM', 1, '06-17-1995', '2022011964', '2022011964', 'Active', 'default.png', '2023-05-14 09:59:42'),
(437, '2022011872', 'REBEKAH LESLIE', 'ARAGON', 'TUBORO', 'Student', 'Palocpoc, Mendez, Cavite', '', 'rebekahleslie.aragon@citycollegeoftagaytay.edu.ph', 'female', 'BSE-E', 1, '02-14-2004', '2022011872', '2022011872', 'Active', 'default.png', '2023-05-14 09:59:42'),
(438, '2022010118', 'HARVEY DAVE', 'ARANAS', 'CAGOYONG', 'Student', 'Hoyo, Silang, Cavite', '', 'harveydave.aranas@citycollegeoftagaytay.edu.ph', 'male', 'BSHM', 1, '06-14-2002', '2022010118', '2022010118', 'Active', 'default.png', '2023-05-14 09:59:42'),
(439, '1901506', 'AHYEZA MAE AIZEL', 'ARANGILAN', 'BLANZA', 'Student', 'Zambal, Tagaytay City', '', 'ahyezamaeaizel.arangilan@citycollegeoftagaytay.edu.ph', 'female', 'BSIT', 4, '07-31-2001', '1901506', '1901506', 'Active', 'default.png', '2023-05-14 09:59:42'),
(440, '1901238', 'LYZA', 'ARANGOTE', 'CORDOVA', 'Student', 'Purok 127 Mendez Crossing West Tagaytay City', '', 'lyza.arangote@citycollegeoftagaytay.edu.ph', 'female', 'BSE-E', 4, '02-16-2000', '1901238', '1901238', 'Active', 'default.png', '2023-05-14 09:59:42'),
(441, '20010013', 'JOANNE MAE', 'ARCADIO', 'MILAN', 'Student', 'Sampaloc Iii, Dasmari?as City, Cavite', '', 'joannemae.arcadio@citycollegeoftagaytay.edu.ph', 'female', 'BSHM', 3, '07-25-2000', '20010013', '20010013', 'Active', 'default.png', '2023-05-14 09:59:42'),
(442, '2022010119', 'JAY WILSON', 'ARCAN', 'PEJI', 'Student', 'Esperanza Ilaya, Alfonso, Cavite', '', 'jaywilson.arcan@citycollegeoftagaytay.edu.ph', 'male', 'BSHM', 1, '09-16-2000', '2022010119', '2022010119', 'Active', 'default.png', '2023-05-14 09:59:42'),
(443, '1901978', 'DIMPLE', 'ARCEBUCHE', 'OBENARIO', 'Student', 'Calabuso, Tagaytay City', '', 'dimple.arcebuche@citycollegeoftagaytay.edu.ph', 'female', 'BSHM', 4, '11-06-2000', '1901978', '1901978', 'Active', 'default.png', '2023-05-14 09:59:42'),
(444, '20010148', 'MARK', 'ARCEBUCHE', 'ORINE', 'Student', 'Calabuso, Tagaytay City, Cavite', '', 'mark.arcebuche@citycollegeoftagaytay.edu.ph', 'male', 'BSE-F', 3, '02-08-2002', '20010148', '20010148', 'Active', 'default.png', '2023-05-14 09:59:42'),
(445, '2021010110', 'JOSHUA', 'ARCIAGA', 'ROM', 'Student', 'Aga, Nasugbu, Batangas', '', 'joshua.arciaga@citycollegeoftagaytay.edu.ph', 'male', 'BSHM', 2, '04-08-2002', '2021010110', '2021010110', 'Active', 'default.png', '2023-05-14 09:59:42'),
(446, '1901467', 'MARY LAINE', 'ARCIAGA', 'ROM', 'Student', 'Nasugbu, Batangas', '', 'marylaine.arciaga@citycollegeoftagaytay.edu.ph', 'female', 'BSE-SS', 4, '12-08-2000', '1901467', '1901467', 'Active', 'default.png', '2023-05-14 09:59:42'),
(447, '2021020012', 'MONICA', 'ARCILLA', 'MILLAMINA', 'Student', 'Brgy. San Jose, Tagaytay City, Cavite', '', 'monica.arcilla@citycollegeoftagaytay.edu.ph', 'female', 'BSBA-HRDM', 1, '09-26-2001', '2021020012', '2021020012', 'Active', 'default.png', '2023-05-14 09:59:42'),
(448, '1901782', 'DANIELA GEM', 'ARCULLO', 'JAVIER', 'Student', 'Kaybagal North, Tagaytay City', '', 'danielagem.arcullo@citycollegeoftagaytay.edu.ph', 'female', 'BSOA', 4, '07-13-2000', '1901782', '1901782', 'Active', 'default.png', '2023-05-14 09:59:42'),
(449, '2022012155', 'ABEGAIL', 'ARCULLO', 'MACALINDONG', 'Student', 'Kaybagal Central, Tagaytay City, Cavite', '', 'abegail.arcullo@citycollegeoftagaytay.edu.ph', 'male', 'BSBA-HRDM', 1, '04-30-1980', '2022012155', '2022012155', 'Active', 'default.png', '2023-05-14 09:59:42'),
(450, '1902045', 'DEFFRELLYN', 'ARELLANO', 'ILAN', 'Student', 'B16 LT.4 Blessed Ville Sampaloc II, DasmariÃ±as, Cavite', '', 'deffrellyn.arellano@citycollegeoftagaytay.edu.ph', 'female', 'BSBA-MM', 3, '01-25-1998', '1902045', '1902045', 'Active', 'default.png', '2023-05-14 09:59:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_userss`
--
ALTER TABLE `tbl_userss`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_userss`
--
ALTER TABLE `tbl_userss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=590;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
