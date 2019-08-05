-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2019 at 11:44 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--
CREATE DATABASE IF NOT EXISTS `cars` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cars`;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `ID` bigint(20) NOT NULL,
  `Make` varchar(50) DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Trim` varchar(200) DEFAULT NULL,
  `Year` year(4) DEFAULT NULL,
  `Body` varchar(200) DEFAULT NULL,
  `EnginePosition` varchar(50) NOT NULL,
  `EngineType` varchar(50) DEFAULT NULL,
  `EngineCompression` decimal(2,1) DEFAULT NULL,
  `EngineFuel` varchar(150) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `WeightKG` int(11) DEFAULT NULL,
  `TransmissionType` varchar(150) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Tags` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`ID`, `Make`, `Name`, `Trim`, `Year`, `Body`, `EnginePosition`, `EngineType`, `EngineCompression`, `EngineFuel`, `Image`, `Country`, `WeightKG`, `TransmissionType`, `Price`, `Tags`) VALUES
(1, 'alfa-romeo', 'GTV', 'Trim', 1969, 'Body', 'Engine Position', 'Engine Type', '1.2', 'Engine Fuel', NULL, 'Country', 12345, 'Transmission Type', 112312, 'new cars, latest cards'),
(2, 'abarth', '1000', '', 1958, '', 'Rear', 'in-line', NULL, 'Gasoline', NULL, 'Italy', 680, 'Manual', 5330, NULL),
(3, 'alfa-romeo', '166', '3.0 V6 Distinctive Automatic', 2007, 'Sedan', 'Front', 'V', NULL, 'Gasoline', NULL, 'Italy', 1554, 'Automatic', 9241, NULL),
(4, 'alpine', 'A 310', '', 1984, 'Coupe', 'Rear', 'V', NULL, 'Gasoline', NULL, 'Germany', 980, 'Manual', 8283, NULL),
(5, 'amc', 'Javelin', 'AMX 6.5', 1972, '', 'Front', 'V', NULL, '', NULL, 'USA', 1500, 'Manual', 13669, NULL),
(6, 'audi', 'A4', 'Avant 3.2 FSI', 2004, 'Station Wagon', 'Front', 'V', NULL, '', NULL, 'Germany', 1550, '', 12545, NULL),
(7, 'ac', 'Aceca', 'Cabriolet', 2001, 'Convertible', 'Front', 'V', NULL, 'Gasoline', NULL, 'UK', 1510, 'Manual', 5498, NULL),
(8, 'ac', 'Aceca', '2', 1958, '', 'Front', 'in-line', NULL, 'Gasoline', NULL, 'UK', 890, '', 14053, NULL),
(9, 'ac', 'Ace', '3.5', 1999, 'Roadster', 'Front', 'V', NULL, '', NULL, 'UK', 1025, 'Manual', 8168, NULL),
(10, 'ac', 'Cobra', 'MK IV 5.0 V8', 1999, 'Roadster', 'Front', 'V', NULL, 'Gasoline', NULL, 'UK', 1025, 'Manual', 13744, NULL),
(11, 'ac', 'Ace', '', 1995, 'Roadster', 'Front', 'V', NULL, '', NULL, 'UK', NULL, 'Manual', 10115, NULL),
(12, 'audi', 'TT', '1.8 Coupe Quattro Sport', 2006, 'Coupe', 'Front', 'in-line', NULL, 'Gasoline - Premium', NULL, 'Germany', 1395, 'Manual', 7555, NULL),
(13, 'audi', 'A4', 'Avant 2.0 TDi Multitronic', 2008, 'Station Wagon', 'Front', 'in-line', NULL, 'Diesel', NULL, 'Germany', 1530, 'Automatic', 14777, NULL),
(14, 'alfa-romeo', 'Giulietta', '', 1960, '', 'Front', 'in-line', NULL, 'Gasoline', NULL, 'Italy', 875, 'Manual', 6426, NULL),
(15, 'alfa-romeo', '75', '1.8 Turbo Quadrifoglio', 1986, 'Sedan', 'Front', 'in-line', NULL, '', NULL, 'Italy', 1242, 'Manual', 10591, NULL),
(16, 'alfa-romeo', '147', '1.9 JTD Distinctive DSL', 2008, '', 'Front', 'in-line', NULL, 'Diesel', NULL, 'Italy', 1290, 'Manual', 6293, NULL),
(17, 'alfa-romeo', '155', '', 1995, 'Sedan', 'Front', 'in-line', NULL, 'Gasoline', NULL, 'Italy', 1206, '', 10995, NULL),
(18, 'alfa-romeo', '156', '2.5 V6', 2006, 'Sedan', 'Front', 'in-line', NULL, 'Gasoline', NULL, 'Italy', 1585, 'Manual', 8094, NULL),
(19, 'alfa-romeo', 'Junior', 'Z 1.6', 1975, '', 'Front', 'in-line', NULL, 'Gasoline', NULL, 'Italy', 1030, 'Manual', 9981, NULL),
(29, 'alfa-romeo', '33', '', 1993, '', '', '', NULL, 'engine fuel', NULL, '', 0, '', 0, NULL),
(30, 'alfa-romeo', '159', '1.9 JTS', 2006, 'Sedan', 'Front', 'in-line', NULL, 'Gasoline', NULL, 'Italy', 1555, 'Manual', 8214, NULL),
(55, 'abarth', 'Spider Riviera', '800', 1960, 'Convertible', 'Rear', 'in-line', NULL, 'Gasoline', NULL, 'Italy', 610, 'Manual', 12878, NULL),
(109, 'Toyota', 'Name of Car', '', 2019, 'body', 'engine position', 'engine type', NULL, 'fuel', '', 'US', 500, 'type', 1200, NULL),
(110, 'Toyota', 'Name of Car', '', 2019, 'body', 'engine position', 'engine type', NULL, 'fuel', '', 'US', 500, 'type', 1200, NULL),
(112, 'Make', 'Name', '', 1989, 'Body', 'position', 'type', NULL, 'fuel', '', 'US', 1234, 'type', 12300, NULL),
(113, 'Make', 'Name', '', 1989, 'Body', 'position', 'type', NULL, 'fuel', '', 'US', 1234, 'type', 12300, NULL),
(114, 'Make', 'Name', 'Trim', 1989, 'Body', 'position', 'type', NULL, 'fuel', '', 'US', 1234, 'type', 12300, NULL),
(115, 'Make', 'Name', 'Trim', 1989, 'Body', 'position', 'type', NULL, 'fuel', '', 'US', 1234, 'type', 12300, NULL),
(116, 'Make', 'Name', 'Trim', 1989, 'Body', 'position', 'type', NULL, 'fuel', '', 'US', 1234, 'type', 12300, NULL),
(117, 'Make', 'Name', 'Trim', 1989, 'Body', 'position', 'type', NULL, 'fuel', '', 'US', 1234, 'type', 12300, NULL),
(118, 'Make', 'Name', 'Trim', 1989, 'Body', 'position', 'type', NULL, 'fuel', '', 'US', 1234, 'type', 12300, NULL),
(119, 'Make', 'Name', 'Trim', 1990, 'Body', 'position', 'type', NULL, 'fuel', '', 'US', 1234, 'type', 12300, NULL),
(120, 'Make', 'Name', 'Trim', 1990, 'Body', 'position', 'type', NULL, 'fuel', '', 'US', 1234, 'type', 12300, NULL),
(121, 'Make', 'Name', 'Trim', 1990, 'Body', 'position', 'type', NULL, 'fuel', '', 'US', 1234, 'type', 12300, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`) VALUES
(1, 'admin', '89e495e7941cf9e40e6980d14a16bf023ccd4c91');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
