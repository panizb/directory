-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2015 at 01:23 PM
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

--
-- Dumping data for table `Develop`
--

INSERT INTO `Develop` (`Project_Name`, `Username`) VALUES
('intern', 'nazanin.yz94@gmail.com'),
('Ontern', 'nazanin.yz94@gmail.com'),
('intern', 'pbehboudian@gmail.com'),
('Ontern', 'pbehboudian@gmail.com');

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
('Ali', 'Gho', '', '', 'ali', '', '', '', './img/profiles/meditating-smiley.png'),
('Nazanin', 'YZ', 'k@gmi.com', '12349', 'nazanin.yz94@gmail.com', '123', 'https://hgh.com', 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjgyYzRjYzhlYzQ5OTc3OWY0Mzc3MjM3MGZjZWI2MTBjYzYyNjU1Y2EifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiYXRfaGFzaCI6InNNNEEyQk1mRXhkTl9NVTNxa1NyM3ciLCJhdWQiOiI1NDgxNzUxNTg1MzgtY3RoNmJxOTd1cnEycjU0YWxwMnJuNGRyMnFrMWZiZWUuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMTA3MDIwMzYzNTc4ODM1Mzk0MjkiLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiYXpwIjoiNTQ4MTc1MTU4NTM4LWN0aDZicTk3dXJxMnI1NGFscDJybjRkcjJxazFmYmVlLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiZW1haWwiOiJuYXphbmluLnl6OTRAZ21haWwuY29tIiwiaWF0IjoxNDQyMjQ0Njg0LCJleHAiOjE0NDIyNDgyODQsIm5hbWUiOiJOYXphbmluIFlvdXNlZnphZGVoIiwiZ2l2ZW5fbmFtZSI6Ik5hemFuaW4iLCJmYW1pbHlfbmFtZSI6IllvdXNlZnphZGVoIiwibG9jYWxlIjoiZW4ifQ.BbN2BAXvZMs2NlISdbaP1NofA6QvlQOG_zEZN_N1yu3b-DAjQzFtUVr6HtZik2HdUEy3DQylUOoZgjASQGrX61rjGrrabUR8epwPiLSMPy8foBaInj70SjSy2IWuSm994Ui-OY9Alz7-DVqekqJCt_SYjlbGT7jJLfiuhv_CO69GVwmp17KW2OEbcXMEIbzn-aYgU5zkLzY-2GDOHGGvGUcPr16cZnsrBmezYNc1KRv-U3VzpljqVjOIg7P6u3HdH6wVrU99-Yju6BqcPObU-1Uz5rIxjKfHHgdz2ucA9J3sbuUyRiryzHSYuwRynvhhez00O0', './img/profiles/amazed-smiley.png'),
('Paniz', 'Behboudian', 'p@yahoo.com', '1', 'pbehboudian@gmail.com', '1234', 'https://www.3fs.si', 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjgyYzRjYzhlYzQ5OTc3OWY0Mzc3MjM3MGZjZWI2MTBjYzYyNjU1Y2EifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiYXRfaGFzaCI6IndNdE1fRUs5ZHFfeWFQZGgwbGYxRFEiLCJhdWQiOiI1NDgxNzUxNTg1MzgtY3RoNmJxOTd1cnEycjU0YWxwMnJuNGRyMnFrMWZiZWUuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMDU4NDkxNDAwODg4MzczMzU3OTQiLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiYXpwIjoiNTQ4MTc1MTU4NTM4LWN0aDZicTk3dXJxMnI1NGFscDJybjRkcjJxazFmYmVlLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiZW1haWwiOiJwYmVoYm91ZGlhbkBnbWFpbC5jb20iLCJpYXQiOjE0NDIzMDI5ODMsImV4cCI6MTQ0MjMwNjU4MywibmFtZSI6IlBhbml6IEJlaGJvdWRpYW4iLCJwaWN0dXJlIjoiaHR0cHM6Ly9saDUuZ29vZ2xldXNlcmNvbnRlbnQuY29tLy02d1BmblBhcVlGQS9BQUFBQUFBQUFBSS9BQUFBQUFBQUFCZy81RjJvbTFaM2RiRS9zOTYtYy9waG90by5qcGciLCJnaXZlbl9uYW1lIjoiUGFuaXoiLCJmYW1pbHlfbmFtZSI6IkJlaGJvdWRpYW4iLCJsb2NhbGUiOiJlbiJ9.aRkBjzePDfgdWcSpF8Hw_zahEHMUQTF2UUG51o0OwW4tt_-cfbLMUF4ML5jQaOk3yui1MgTtG42hvYIJmNXee1p85OArOi3MqZ7n2fdi9pmmnfpMJcabMCg_58sgVCNavkAbfobMR9RY1zKugrtGU6zBcLtVz1A9uJz-qqfmAFzoo9MXuaTGBpc1ettj', './img/profiles/coffee-smiley.png'),
('Tin', 'Ton', '', '', 'tin', '', '', '', './img/profiles/mos.jpg');

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
('nazanin.yz94@gmail.com', 'Iran'),
('nazanin.yz94@gmail.com', 'Irna'),
('nazanin.yz94@gmail.com', 'Kiwi'),
('nazanin.yz94@gmail.com', 'Nazo'),
('pbehboudian@gmail.com', 'Goozo'),
('pbehboudian@gmail.com', 'Iran'),
('pbehboudian@gmail.com', 'Irna'),
('pbehboudian@gmail.com', 'Kiwi'),
('pbehboudian@gmail.com', 'Nazo');

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
('dd', 'dd', 'nazanin.yz94@gmail.com'),
('kkk', 'twitter', 'pbehboudian@gmail.com'),
('www', 'facebook', 'pbehboudian@gmail.com'),
('wwww', 'facebook', 'nazanin.yz94@gmail.com');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
