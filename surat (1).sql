-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2016 at 08:41 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `letter_appointment`
--

CREATE TABLE `letter_appointment` (
  `lett_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `approve_stat` int(11) NOT NULL,
  `ev_name` varchar(200) NOT NULL,
  `jawatan` varchar(20) NOT NULL,
  `tarikh` varchar(20) NOT NULL,
  `masa` varchar(20) NOT NULL,
  `tempat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `letter_appointment`
--

INSERT INTO `letter_appointment` (`lett_id`, `sender`, `receiver`, `approve_stat`, `ev_name`, `jawatan`, `tarikh`, `masa`, `tempat`) VALUES
(1, 2222, 111111, 1, 'Cprom Competition', 'Pengerusi', '2016-03-18', '08:00', 'DEWAN SRI SEMARAK'),
(2, 2222, 111111, 1, 'Cosplay', 'AJK Khas', '2016-03-25', '01:00', 'DEWAN MAKAN SISWA'),
(7, 111111, 111111, 1, 'Cprom Competition 2013', 'Setiausaha', '2013-12-19', '08:00', 'DEWAN SRI SEMARAK arau '),
(8, 2222, 123456, 1, 'Cprom Competition', 'Setiausaha', '2016-03-18', '08:00', 'DEWAN SRI SEMARAK arau '),
(9, 111111, 123456, 1, 'HARI BERSAMA PENSYARAH 2016', 'Pengerusi', '2016-03-12', '09:00', 'BK11'),
(10, 123456, 999999, 0, 'Cprom Competition', 'Setiausaha', '2016-03-18', '08:00', 'dss'),
(11, 2222, 2222, 1, 'Cprom Competition', 'Pengerusi', '2016-03-17', '12:59', 'DEWAN SRI SEMARAK');

-- --------------------------------------------------------

--
-- Table structure for table `letter_appreciation`
--

CREATE TABLE `letter_appreciation` (
  `lett_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `approve_stat` int(11) NOT NULL,
  `ev_name` varchar(200) NOT NULL,
  `date` varchar(30) NOT NULL,
  `jawatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `letter_appreciation`
--

INSERT INTO `letter_appreciation` (`lett_id`, `sender`, `receiver`, `approve_stat`, `ev_name`, `date`, `jawatan`) VALUES
(1, 2222, 111111, 1, 'CPROM Competition', '2016-03-10', 'Pengerusi'),
(5, 0, 111111, 1, 'Cprom Competition', '2016-03-18', 'Pengerusi'),
(6, 2222, 111111, 1, 'Cprom Competition', '2016-03-18', 'Pengerusi'),
(7, 111111, 2222, 0, 'Hacking Najib', '2016-03-17', 'Pengerusi'),
(8, 2222, 111111, 1, 'CPROM Competition 2015', '2016-03-19', 'Pengerusi'),
(9, 111111, 111111, 1, 'PROGRAMMING LANG HAR HAR', '2016-03-10', 'Setiausaha'),
(12, 111111, 111111, 0, 'CPROM Competition 2016', '2016-03-08', 'Pemantau'),
(13, 2222, 123456, 1, 'CPROM Competition 2016', '2016-12-14', 'Pengerusi'),
(14, 2222, 999999, 1, 'CPROM Competition 2016', '2016-12-14', 'Setiausaha'),
(15, 123456, 111111, 0, 'CPROM Competition 2016', '2016-12-14', 'AJK Khas'),
(16, 2222, 111111, 1, 'CPROM Competition 2016', '2016-12-14', 'Setiausaha'),
(17, 2222, 999999, 1, 'CPROM Competition 2016', '2016-12-14', 'Setiausaha'),
(18, 2222, 5613, 1, 'CPROM Competition', '2016-03-10', 'Pengerusi'),
(19, 2222, 2222, 1, 'CPROM Competition', '2016-03-10', 'Pengerusi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Staff_ID` int(7) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Access_level` int(1) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Faculty` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Staff_ID`, `Password`, `Access_level`, `Name`, `Faculty`, `Email`) VALUES
(2222, 'test', 2, 'HANTU', 'Fakulti Sains Komputer Dan Matematik', 'LALA@LALA.COM'),
(5613, 'asdfg', 2, 'fawwaz', 'FSKM', 'fsk@Uitm.edu.com'),
(111111, 'test123', 1, 'Admin SuperUser', 'Fakulti Sains Komputer Dan Matematik', 'admin@letter.com'),
(123456, '123456', 2, 'Me Testing Lecturer', 'Fakulti Sains Gunaan', 'meTesting@gmail.com'),
(999999, '999999', 1, 'me Testing Trek', 'Fakulti Sains Sukan', 'fsr@uitm.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `letter_appointment`
--
ALTER TABLE `letter_appointment`
  ADD PRIMARY KEY (`lett_id`);

--
-- Indexes for table `letter_appreciation`
--
ALTER TABLE `letter_appreciation`
  ADD PRIMARY KEY (`lett_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `letter_appointment`
--
ALTER TABLE `letter_appointment`
  MODIFY `lett_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `letter_appreciation`
--
ALTER TABLE `letter_appreciation`
  MODIFY `lett_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
