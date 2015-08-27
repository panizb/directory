-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2015 at 03:39 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `directory`
--

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE IF NOT EXISTS `Employee` (
  `Name` varchar(45) NOT NULL,
  `Family_Name` varchar(60) NOT NULL,
  `Private Email` varchar(70) NOT NULL,
  `Phone Number` varchar(20) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Website` varchar(200) NOT NULL,
  `Token` varchar(1000) NOT NULL,
  `Photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`Name`, `Family_Name`, `Private Email`, `Phone Number`, `User_Name`, `Password`, `Website`, `Token`, `Photo`) VALUES
('Ali', 'Gho', '', '', 'ali', '', '', '', ''),
('Nazanin', 'YZ', '', '', 'naz', '123', '', '', ''),
('Paniz', 'Behboudian', 'p', '1', 'pbehboudian@gmail.com', '123', '', 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjM4OTI4NmI0M2Q4YjA2NmFlNDI3ZWE3ZGE1YzJhNzU3ZDA0ODcyMDkifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiYXRfaGFzaCI6Inl0YnhXX09XYkl1RWJmUGxlZlFEQnciLCJhdWQiOiI1NDgxNzUxNTg1MzgtY3RoNmJxOTd1cnEycjU0YWxwMnJuNGRyMnFrMWZiZWUuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMDU4NDkxNDAwODg4MzczMzU3OTQiLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiYXpwIjoiNTQ4MTc1MTU4NTM4LWN0aDZicTk3dXJxMnI1NGFscDJybjRkcjJxazFmYmVlLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiZW1haWwiOiJwYmVoYm91ZGlhbkBnbWFpbC5jb20iLCJpYXQiOjE0NDA2ODI2NTgsImV4cCI6MTQ0MDY4NjI1OCwibmFtZSI6IlBhbml6IEJlaGJvdWRpYW4iLCJwaWN0dXJlIjoiaHR0cHM6Ly9saDUuZ29vZ2xldXNlcmNvbnRlbnQuY29tLy02d1BmblBhcVlGQS9BQUFBQUFBQUFBSS9BQUFBQUFBQUFCZy81RjJvbTFaM2RiRS9zOTYtYy9waG90by5qcGciLCJnaXZlbl9uYW1lIjoiUGFuaXoiLCJmYW1pbHlfbmFtZSI6IkJlaGJvdWRpYW4iLCJsb2NhbGUiOiJlbiJ9.Lumb93V89hjoDrx8naxr5AGm12ZI__6Duh_p05TRZwes-cQNQmakz2-ZF0KBM_h6F4jND-tZw_WUkXOYVqNLGaKdAWQnRGloI7RFXMlGwkbj4t6QttQ_ql_bIZLf0QABON0nn6XE3ckn7XE_fSGH_LVkwOX95xn1MUjZpgvtryGY6Wh1myKFyngMmuvO', 'meditating-smiley.png'),
('Tin', 'Ton', '', '', 'tin', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `Membership`
--

CREATE TABLE IF NOT EXISTS `Membership` (
  `Username` varchar(15) NOT NULL,
  `Team Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Social Link`
--

CREATE TABLE IF NOT EXISTS `Social Link` (
  `Username` varchar(15) NOT NULL,
  `Link Address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Social Network`
--

CREATE TABLE IF NOT EXISTS `Social Network` (
  `Name` varchar(45) NOT NULL,
  `Link Address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Team`
--

CREATE TABLE IF NOT EXISTS `Team` (
  `Name` varchar(45) NOT NULL,
  `Description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`User_Name`);

--
-- Indexes for table `Membership`
--
ALTER TABLE `Membership`
  ADD PRIMARY KEY (`Username`,`Team Name`);

--
-- Indexes for table `Social Network`
--
ALTER TABLE `Social Network`
  ADD PRIMARY KEY (`Link Address`);

--
-- Indexes for table `Team`
--
ALTER TABLE `Team`
  ADD PRIMARY KEY (`Name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
