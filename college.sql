-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 12:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` int(11) NOT NULL,
  `ANAME` varchar(150) NOT NULL,
  `APASS` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `ANAME`, `APASS`) VALUES
(1, 'Admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'CEO', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `att_id` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `CLASS` int(11) NOT NULL,
  `STUDENT_ID` int(11) NOT NULL,
  `PAR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`att_id`, `DATE`, `CLASS`, `STUDENT_ID`, `PAR`) VALUES
(51, '2023-08-24', 14, 71, 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `cafe`
--

CREATE TABLE `cafe` (
  `caid` int(150) NOT NULL,
  `ca_date` date NOT NULL,
  `ca_inc` varchar(150) NOT NULL,
  `ca_exp` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cafe`
--

INSERT INTO `cafe` (`caid`, `ca_date`, `ca_inc`, `ca_exp`) VALUES
(11, '2023-08-15', '3000', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `CID` int(11) NOT NULL,
  `CNAME` varchar(150) NOT NULL,
  `COMM_DATE` date NOT NULL,
  `CLASS_DAY` varchar(30) NOT NULL,
  `CLASS_TIME` time NOT NULL,
  `SID` int(11) NOT NULL,
  `TID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`CID`, `CNAME`, `COMM_DATE`, `CLASS_DAY`, `CLASS_TIME`, `SID`, `TID`) VALUES
(14, 'Technology', '2023-08-26', 'Monday', '10:36:00', 13, 12);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `EID` int(11) NOT NULL,
  `ENAME` varchar(150) NOT NULL,
  `ETYPE` varchar(150) NOT NULL,
  `EDATE` varchar(150) NOT NULL,
  `SESSION` varchar(150) NOT NULL,
  `CLASS` varchar(150) NOT NULL,
  `SUB` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`EID`, `ENAME`, `ETYPE`, `EDATE`, `SESSION`, `CLASS`, `SUB`) VALUES
(11, 'Computer Science ', '1st Semester', '10-05-2022', 'Morning', 'Technology', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `TID` int(11) NOT NULL,
  `TNAME` varchar(150) NOT NULL,
  `TPASS` varchar(150) NOT NULL,
  `QUAL` varchar(150) NOT NULL,
  `SAL` varchar(150) NOT NULL,
  `PNO` varchar(150) NOT NULL,
  `MAIL` varchar(150) NOT NULL,
  `PADDR` text NOT NULL,
  `IMG` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`TID`, `TNAME`, `TPASS`, `QUAL`, `SAL`, `PNO`, `MAIL`, `PADDR`, `IMG`) VALUES
(12, 'Amjath', '202cb962ac59075b964b07152d234b70', 'BSC in IT', '500000', '0756061266', 'ajiamjath@gmail.com', 'Trincomalee, Sri lanka', 'lecturer/WhatsApp Image 2023-08-26 at 10.24.54 PM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `MID` int(11) NOT NULL,
  `REGNO` varchar(150) NOT NULL,
  `SUB` varchar(150) NOT NULL,
  `MARK` varchar(150) NOT NULL,
  `TERM` varchar(150) NOT NULL,
  `CLASS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`MID`, `REGNO`, `SUB`, `MARK`, `TERM`, `CLASS`) VALUES
(4, 's101', 'Computer Science', '100', '1st Semester', 14);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_time` time NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(255) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `pay_method` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `NAID` int(150) NOT NULL,
  `NANAME` varchar(150) NOT NULL,
  `NAPASS` varchar(150) NOT NULL,
  `ROLE` varchar(100) NOT NULL,
  `NAQUAL` varchar(150) NOT NULL,
  `NASAL` varchar(150) NOT NULL,
  `NAPNO` varchar(150) NOT NULL,
  `NAMAIL` varchar(150) NOT NULL,
  `NAADDR` text NOT NULL,
  `NAIMG` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`NAID`, `NANAME`, `NAPASS`, `ROLE`, `NAQUAL`, `NASAL`, `NAPNO`, `NAMAIL`, `NAADDR`, `NAIMG`) VALUES
(9, 'Favas', '202cb962ac59075b964b07152d234b70', 'hr', 'BSC in Industrial Engineering', '500000', '0767626995', 'favaskcc1996@gmail.com', 'Kantale', 'staff/WhatsApp Image 2023-08-26 at 10.48.53 PM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `RNO` varchar(150) NOT NULL,
  `PASS` varchar(150) NOT NULL,
  `NAME` varchar(150) NOT NULL,
  `FNAME` varchar(150) NOT NULL,
  `DOB` varchar(150) NOT NULL,
  `GEN` varchar(150) NOT NULL,
  `PHO` varchar(150) NOT NULL,
  `MAIL` varchar(150) NOT NULL,
  `ADDR` text NOT NULL,
  `SIMG` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `RNO`, `PASS`, `NAME`, `FNAME`, `DOB`, `GEN`, `PHO`, `MAIL`, `ADDR`, `SIMG`) VALUES
(71, 'S101', '0', 'Nusky', 'Baseer', '11-10-2001', 'Male', '0752358059', 'Baseer@gmail.com', 'Batticaloa', 'student/WhatsApp Image 2023-08-22 at 10.18.13 PM.jpeg'),
(73, 'S102', '81dc9bdb52d04dc20036dbd8313ed055', 'Safras', 'Jawahir', '18-09-2021', 'Male', '0758968754', 'Jawahir@gmail.com', 'Trincomalee, Molavu thanni kuda', 'student/WhatsApp Image 2023-06-29 at 1.37.20 PM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `student_class`
--

CREATE TABLE `student_class` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `CID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_class`
--

INSERT INTO `student_class` (`id`, `stu_id`, `CID`) VALUES
(134, 71, 14),
(135, 73, 14);

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE `sub` (
  `SID` int(11) NOT NULL,
  `SNAME` varchar(150) NOT NULL,
  `SFEE` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`SID`, `SNAME`, `SFEE`) VALUES
(13, 'Computer Science', 0),
(14, 'Artificial Intelligent ', 0),
(15, 'Mathematics for Computer', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`att_id`),
  ADD KEY `class_id_fk` (`CLASS`),
  ADD KEY `stu_id_att_fk` (`STUDENT_ID`);

--
-- Indexes for table `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`caid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`CID`),
  ADD KEY `sid_fk` (`SID`),
  ADD KEY `tid_fk` (`TID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`EID`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`TID`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`MID`),
  ADD KEY `class_id_fk_mark` (`CLASS`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `class_id_pay_fk` (`class_id`),
  ADD KEY `stu_id_pay_fk` (`stu_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`NAID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `RNO` (`RNO`);

--
-- Indexes for table `student_class`
--
ALTER TABLE `student_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stuid_fk` (`stu_id`),
  ADD KEY `cid_fk` (`CID`);

--
-- Indexes for table `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`SID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `cafe`
--
ALTER TABLE `cafe`
  MODIFY `caid` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `EID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `NAID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `student_class`
--
ALTER TABLE `student_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `sub`
--
ALTER TABLE `sub`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `class_id_fk` FOREIGN KEY (`CLASS`) REFERENCES `class` (`CID`),
  ADD CONSTRAINT `stu_id_att_fk` FOREIGN KEY (`STUDENT_ID`) REFERENCES `student` (`ID`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `sid_fk` FOREIGN KEY (`SID`) REFERENCES `sub` (`SID`),
  ADD CONSTRAINT `tid_fk` FOREIGN KEY (`TID`) REFERENCES `lecturer` (`TID`);

--
-- Constraints for table `mark`
--
ALTER TABLE `mark`
  ADD CONSTRAINT `class_id_fk_mark` FOREIGN KEY (`CLASS`) REFERENCES `class` (`CID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `class_id_pay_fk` FOREIGN KEY (`class_id`) REFERENCES `class` (`CID`),
  ADD CONSTRAINT `stu_id_pay_fk` FOREIGN KEY (`stu_id`) REFERENCES `student` (`ID`);

--
-- Constraints for table `student_class`
--
ALTER TABLE `student_class`
  ADD CONSTRAINT `cid_fk` FOREIGN KEY (`CID`) REFERENCES `class` (`CID`),
  ADD CONSTRAINT `stuid_fk` FOREIGN KEY (`stu_id`) REFERENCES `student` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
