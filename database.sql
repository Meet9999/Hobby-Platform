-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 29, 2021 at 02:05 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `hobby`
--

DROP TABLE IF EXISTS `hobby`;
CREATE TABLE IF NOT EXISTS `hobby` (
  `Hobby_ID` int(11) NOT NULL,
  `Hobbyist_ID` int(11) NOT NULL,
  `Hobby` varchar(50) DEFAULT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hobbyist`
--

DROP TABLE IF EXISTS `hobbyist`;
CREATE TABLE IF NOT EXISTS `hobbyist` (
  `Hobbyist_ID` int(11) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `DateofBirth` date DEFAULT NULL,
  `ContactNumber` varchar(55) NOT NULL,
  `Sex` char(1) NOT NULL,
  `Address` varchar(30) DEFAULT NULL,
  `Hobby` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `Image_ID` int(11) NOT NULL,
  `Hobby_ID` int(11) NOT NULL,
  `ImagesToUpload` int(11) NOT NULL,
  `TypeOfHobby` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `my_profile`
--

DROP TABLE IF EXISTS `my_profile`;
CREATE TABLE IF NOT EXISTS `my_profile` (
  `Profile_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Fullname` varchar(100) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `DateofBirth` date DEFAULT NULL,
  `ContactNumber` varchar(55) DEFAULT NULL,
  `Hobby` varchar(100) DEFAULT NULL,
  `Article` varchar(200) DEFAULT NULL,
  `hobbytime` date DEFAULT NULL,
  `Inspiration` varchar(100) DEFAULT NULL,
  `Showcase` varbinary(2) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `file` text,
  PRIMARY KEY (`Profile_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `my_profile`
--

INSERT INTO `my_profile` (`Profile_ID`, `Fullname`, `gender`, `DateofBirth`, `ContactNumber`, `Hobby`, `Article`, `hobbytime`, `Inspiration`, `Showcase`, `email`, `password`, `file`) VALUES
(4, 'ravi', 'Male', '2020-02-13', '0420537777', 'nothing', 'test artical', '2021-01-14', 'me ', 0x31, 'jignesh.tplabs@gmail.com', '202cb962ac59075b964b07152d234b70', 'Capture.PNG'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hirheena12@gmail.com', '202cb962ac59075b964b07152d234b70', NULL),
(6, 'rv', 'Male', '2020-06-10', '111111111111', 'tewst``', 'tewst', '2020-12-10', 'test', 0x31, 'rv@gmail.com', '202cb962ac59075b964b07152d234b70', 'Capture.PNG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
