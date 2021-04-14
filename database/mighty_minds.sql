-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 08:10 PM
-- Server version: 10.4.14-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mighty_minds`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`) VALUES
(2, 'Dilakshan', 'welcome@123');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` int(11) NOT NULL,
  `Name` varchar(128) DEFAULT NULL,
  `Password` varchar(128) NOT NULL,
  `Email` varchar(64) DEFAULT NULL,
  `Department` varchar(64) DEFAULT NULL,
  `Supervisor` varchar(128) DEFAULT NULL,
  `Location` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `Name`, `Password`, `Email`, `Department`, `Supervisor`, `Location`) VALUES
(2, 'Dilakshan', 'welcome@123', 'Dilakshan@mm.com', 'marketing', 'test supervisor', 'test location');

-- --------------------------------------------------------

--
-- Table structure for table `mood`
--

CREATE TABLE `mood` (
  `ID` int(11) NOT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `Mood` varchar(16) DEFAULT NULL,
  `DatePosted` date DEFAULT NULL,
  `TimePosted` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mood`
--

INSERT INTO `mood` (`ID`, `EmployeeID`, `Mood`, `DatePosted`, `TimePosted`) VALUES
(2, 2, 'Bad', '2021-04-13', '22:56:28'),
(10, 2, 'Okay', '2021-04-14', '23:03:30'),
(12, 2, 'Good', '2021-04-07', NULL),
(14, 2, 'Bad', '2021-04-08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `Created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ID` int(11) NOT NULL,
  `Name` varchar(128) DEFAULT NULL,
  `Email` varchar(64) DEFAULT NULL,
  `Service` varchar(128) DEFAULT NULL,
  `WebsiteOrSocialMedia` varchar(128) DEFAULT NULL,
  `ContactNumber` varchar(32) DEFAULT NULL,
  `Location` varchar(128) DEFAULT NULL,
  `Attachments` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mood`
--
ALTER TABLE `mood`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mood`
--
ALTER TABLE `mood`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
