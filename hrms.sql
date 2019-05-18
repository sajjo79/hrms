-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2019 at 05:30 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

DROP TABLE IF EXISTS `tbldepartment`;
CREATE TABLE IF NOT EXISTS `tbldepartment` (
  `department_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`department_id`, `title`, `address`, `description`) VALUES
(2, 'IT', 'Old Block', 'Islamabad');

-- --------------------------------------------------------

--
-- Table structure for table `tbldesignation`
--

DROP TABLE IF EXISTS `tbldesignation`;
CREATE TABLE IF NOT EXISTS `tbldesignation` (
  `designationid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldesignation`
--

INSERT INTO `tbldesignation` (`designationid`, `title`, `description`) VALUES
(1, 'Lecturer', 'It is test designation');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
