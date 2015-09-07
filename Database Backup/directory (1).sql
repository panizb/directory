-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 07, 2015 at 03:56 PM
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
-- Table structure for table `Develop`
--

CREATE TABLE IF NOT EXISTS `Develop` (
  `Project_Name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Username` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE IF NOT EXISTS `Employee` (
  `Name` varchar(45) NOT NULL,
  `Family_Name` varchar(60) NOT NULL,
  `Private_Email` varchar(70) NOT NULL,
  `Phone_Number` varchar(20) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Website` varchar(200) NOT NULL,
  `Token` varchar(1000) NOT NULL,
  `Photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`Name`, `Family_Name`, `Private_Email`, `Phone_Number`, `User_Name`, `Password`, `Website`, `Token`, `Photo`) VALUES
('Ali', 'Gho', '', '', 'ali', '', '', '', ''),
('Nazanin', 'YZ', '', '', 'nazanin.yz94@gmail.com', '123', '', 'eyJhbGciOiJSUzI1NiIsImtpZCI6ImM2NzBjZTJhMTRkNzg5MjA1ZDU3NzQ3NDU5Nzg0YjRjMGEwZjg0YWEifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiYXRfaGFzaCI6IlNucHg4SEw0VzUxU0RDaUo0M3JWb1EiLCJhdWQiOiI1NDgxNzUxNTg1MzgtY3RoNmJxOTd1cnEycjU0YWxwMnJuNGRyMnFrMWZiZWUuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMTA3MDIwMzYzNTc4ODM1Mzk0MjkiLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiYXpwIjoiNTQ4MTc1MTU4NTM4LWN0aDZicTk3dXJxMnI1NGFscDJybjRkcjJxazFmYmVlLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiZW1haWwiOiJuYXphbmluLnl6OTRAZ21haWwuY29tIiwiaWF0IjoxNDQxMTAwOTY2LCJleHAiOjE0NDExMDQ1NjYsIm5hbWUiOiJOYXphbmluIFlvdXNlZnphZGVoIiwiZ2l2ZW5fbmFtZSI6Ik5hemFuaW4iLCJmYW1pbHlfbmFtZSI6IllvdXNlZnphZGVoIiwibG9jYWxlIjoiZW4ifQ.htIuILLi3au4FemiQwMQVFnNWVvTGAmxiuY56ncEZhRC3PIY7e5EGF3K7kY8Cm_1PyVz5-GGsGjCYmkSVfPVxUD0t9S0jKK68eEZLeH5NFFOJkG2dbsVNSXYAtI-hRl5J1nj7lDYIF3-Dt5VNrjcMw4j4rFUYJhtyHAwXMx1-1RHSkZe01c0NsXOQq-QshZ70N_DEIYtXTRuffDKTvI-8T04jdUlKq1SSm9nkbB0--Hwn6uQ51GrVlqFi03AEXwqZ5_dygKm08aal1umbOXsKdiK5aPpwof4rle3iWY0SsWwrQY51G7rTT02L7VV_rKIKuFqjQ', './img/profiles/amazed-smiley.png'),
('Paniz', 'Behboudian', 'p@yahoo.com', '1', 'pbehboudian@gmail.com', '1234', 'https://www.3fs.si', 'eyJhbGciOiJSUzI1NiIsImtpZCI6ImZlNTdiMDAzMzI1MWVjOWJhMmMxYWQ5OGQ0Y2VlYTIyM2Y5MGYxNjcifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiYXRfaGFzaCI6ImNWN0J6M2lnQUl1SHQ0TXRQZkladUEiLCJhdWQiOiI1NDgxNzUxNTg1MzgtY3RoNmJxOTd1cnEycjU0YWxwMnJuNGRyMnFrMWZiZWUuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMDU4NDkxNDAwODg4MzczMzU3OTQiLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiYXpwIjoiNTQ4MTc1MTU4NTM4LWN0aDZicTk3dXJxMnI1NGFscDJybjRkcjJxazFmYmVlLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiZW1haWwiOiJwYmVoYm91ZGlhbkBnbWFpbC5jb20iLCJpYXQiOjE0NDE2MzMzNjQsImV4cCI6MTQ0MTYzNjk2NCwibmFtZSI6IlBhbml6IEJlaGJvdWRpYW4iLCJwaWN0dXJlIjoiaHR0cHM6Ly9saDUuZ29vZ2xldXNlcmNvbnRlbnQuY29tLy02d1BmblBhcVlGQS9BQUFBQUFBQUFBSS9BQUFBQUFBQUFCZy81RjJvbTFaM2RiRS9zOTYtYy9waG90by5qcGciLCJnaXZlbl9uYW1lIjoiUGFuaXoiLCJmYW1pbHlfbmFtZSI6IkJlaGJvdWRpYW4iLCJsb2NhbGUiOiJlbiJ9.PVtD9TsuqeF_8sa5Xt8MJGDSS4oJXQ-ZjojW-GOpbZcalluxn2m3TxoZsIBrIG7dAIKxzI_5LHgsM2orSgo2V4ZW1ueW4m4Mp0LdFwWMBPEqjPtn4aFTBiraXj7dwUdKW6S2J6A7PSnl3w7i5Fd6XEhK0JXWYj4CA6_wP_H-BbWUEhSHq_0x-w7IDv64', './img/profiles/coffee-smiley.png'),
('Tin', 'Ton', '', '', 'tin', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ewe`
--

CREATE TABLE IF NOT EXISTS `ewe` (
  `ee` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1235 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ewe`
--

INSERT INTO `ewe` (`ee`) VALUES
(1),
(1234);

-- --------------------------------------------------------

--
-- Table structure for table `Membership`
--

CREATE TABLE IF NOT EXISTS `Membership` (
  `Username` varchar(200) NOT NULL,
  `Team_Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Membership`
--

INSERT INTO `Membership` (`Username`, `Team_Name`) VALUES
('pbehboudian@gmail.com', 'Iran'),
('pbehboudian@gmail.com', 'Irna');

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
-- Table structure for table `Social_Network`
--

CREATE TABLE IF NOT EXISTS `Social_Network` (
  `Link` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `UserID` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Social_Network`
--

INSERT INTO `Social_Network` (`Link`, `Name`, `UserID`) VALUES
('asasa', 'salam', 'pbehboudian@gmail.com'),
('shkahdkhsak', 'facebook', 'pbehboudian@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Team`
--

CREATE TABLE IF NOT EXISTS `Team` (
  `Name` varchar(45) NOT NULL,
  `Description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Team`
--

INSERT INTO `Team` (`Name`, `Description`) VALUES
('Iran', ':D');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Develop`
--
ALTER TABLE `Develop`
  ADD UNIQUE KEY `unique_index` (`Username`,`Project_Name`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`User_Name`);

--
-- Indexes for table `ewe`
--
ALTER TABLE `ewe`
  ADD PRIMARY KEY (`ee`);

--
-- Indexes for table `Membership`
--
ALTER TABLE `Membership`
  ADD PRIMARY KEY (`Username`,`Team_Name`);

--
-- Indexes for table `Social_Network`
--
ALTER TABLE `Social_Network`
  ADD PRIMARY KEY (`Link`);

--
-- Indexes for table `Team`
--
ALTER TABLE `Team`
  ADD PRIMARY KEY (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ewe`
--
ALTER TABLE `ewe`
  MODIFY `ee` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1235;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
