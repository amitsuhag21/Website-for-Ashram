-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 08:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oshodharadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_album`
--

CREATE TABLE `tb_od_album` (
  `albumid` int(11) NOT NULL,
  `albumname` varchar(250) DEFAULT NULL,
  `albumtype` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_albumaudiomap`
--

CREATE TABLE `tb_od_albumaudiomap` (
  `albumid` int(11) NOT NULL,
  `audioid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_albumbookmap`
--

CREATE TABLE `tb_od_albumbookmap` (
  `albumid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_albumimagemap`
--

CREATE TABLE `tb_od_albumimagemap` (
  `albumid` int(11) NOT NULL,
  `imageid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_albumvideomap`
--

CREATE TABLE `tb_od_albumvideomap` (
  `albumid` int(11) NOT NULL,
  `videoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_audios`
--

CREATE TABLE `tb_od_audios` (
  `audioid` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `Filelocation` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_books`
--

CREATE TABLE `tb_od_books` (
  `bookid` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `filelocation` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_country`
--

CREATE TABLE `tb_od_country` (
  `country_id` int(10) NOT NULL,
  `country_name` varchar(200) NOT NULL,
  `country_code` varchar(20) NOT NULL,
  `country_type` varchar(5) NOT NULL,
  `country_language` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_dhyankendra`
--

CREATE TABLE `tb_od_dhyankendra` (
  `dhyankendraid` int(11) NOT NULL,
  `dhyankendraname` varchar(150) DEFAULT NULL,
  `Address1` varchar(150) DEFAULT NULL,
  `Address2` varchar(150) DEFAULT NULL,
  `Address3` varchar(150) DEFAULT NULL,
  `Phone1` varchar(10) DEFAULT NULL,
  `Phone2` varchar(10) DEFAULT NULL,
  `stateid` int(11) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL,
  `zipcode` varchar(7) DEFAULT NULL,
  `ownerid` int(11) DEFAULT NULL,
  `emailid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_gurus`
--

CREATE TABLE `tb_od_gurus` (
  `guruid` int(11) NOT NULL,
  `guruname` varchar(150) DEFAULT NULL,
  `shortdescription` varchar(500) DEFAULT NULL,
  `longdescription` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_images`
--

CREATE TABLE `tb_od_images` (
  `imageid` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `thumbnaillocation` varchar(250) DEFAULT NULL,
  `imagelocation` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_progcategorymap`
--

CREATE TABLE `tb_od_progcategorymap` (
  `programid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_program`
--

CREATE TABLE `tb_od_program` (
  `programid` int(11) NOT NULL,
  `programname` varchar(250) DEFAULT NULL,
  `shortdescription` varchar(500) DEFAULT NULL,
  `longdescription` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_programcategory`
--

CREATE TABLE `tb_od_programcategory` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_programschedule`
--

CREATE TABLE `tb_od_programschedule` (
  `scheduleid` int(11) NOT NULL,
  `programid` int(11) NOT NULL,
  `dhyankendraid` int(11) NOT NULL,
  `level` int(11) DEFAULT NULL,
  `startdatetime` datetime DEFAULT NULL,
  `enddatetime` datetime DEFAULT NULL,
  `duration` tinyint(4) DEFAULT NULL,
  `eligibility` text DEFAULT NULL,
  `guidelines` text DEFAULT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_progschacharya`
--

CREATE TABLE `tb_od_progschacharya` (
  `scheduleid` int(11) NOT NULL,
  `acharyaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_state`
--

CREATE TABLE `tb_od_state` (
  `state_id` int(10) DEFAULT NULL,
  `state_name` varchar(200) NOT NULL,
  `state_code` varchar(30) NOT NULL,
  `country_Id` varchar(10) NOT NULL,
  `state_active` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_teammember`
--

CREATE TABLE `tb_od_teammember` (
  `teammemberid` int(11) NOT NULL,
  `teammembername` varchar(150) DEFAULT NULL,
  `iscoordinator` tinyint(1) DEFAULT NULL,
  `stateid` int(11) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_videos`
--

CREATE TABLE `tb_od_videos` (
  `videoid` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `YTlink` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_od_album`
--
ALTER TABLE `tb_od_album`
  ADD PRIMARY KEY (`albumid`);

--
-- Indexes for table `tb_od_audios`
--
ALTER TABLE `tb_od_audios`
  ADD PRIMARY KEY (`audioid`);

--
-- Indexes for table `tb_od_books`
--
ALTER TABLE `tb_od_books`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `tb_od_country`
--
ALTER TABLE `tb_od_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `tb_od_dhyankendra`
--
ALTER TABLE `tb_od_dhyankendra`
  ADD PRIMARY KEY (`dhyankendraid`);

--
-- Indexes for table `tb_od_gurus`
--
ALTER TABLE `tb_od_gurus`
  ADD PRIMARY KEY (`guruid`);

--
-- Indexes for table `tb_od_images`
--
ALTER TABLE `tb_od_images`
  ADD PRIMARY KEY (`imageid`);

--
-- Indexes for table `tb_od_program`
--
ALTER TABLE `tb_od_program`
  ADD PRIMARY KEY (`programid`);

--
-- Indexes for table `tb_od_programcategory`
--
ALTER TABLE `tb_od_programcategory`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `tb_od_programschedule`
--
ALTER TABLE `tb_od_programschedule`
  ADD PRIMARY KEY (`scheduleid`);

--
-- Indexes for table `tb_od_progschacharya`
--
ALTER TABLE `tb_od_progschacharya`
  ADD PRIMARY KEY (`scheduleid`);

--
-- Indexes for table `tb_od_teammember`
--
ALTER TABLE `tb_od_teammember`
  ADD PRIMARY KEY (`teammemberid`);

--
-- Indexes for table `tb_od_videos`
--
ALTER TABLE `tb_od_videos`
  ADD PRIMARY KEY (`videoid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_od_album`
--
ALTER TABLE `tb_od_album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_od_audios`
--
ALTER TABLE `tb_od_audios`
  MODIFY `audioid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_od_books`
--
ALTER TABLE `tb_od_books`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_od_country`
--
ALTER TABLE `tb_od_country`
  MODIFY `country_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_od_dhyankendra`
--
ALTER TABLE `tb_od_dhyankendra`
  MODIFY `dhyankendraid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_od_gurus`
--
ALTER TABLE `tb_od_gurus`
  MODIFY `guruid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_od_images`
--
ALTER TABLE `tb_od_images`
  MODIFY `imageid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_od_program`
--
ALTER TABLE `tb_od_program`
  MODIFY `programid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_od_programcategory`
--
ALTER TABLE `tb_od_programcategory`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_od_programschedule`
--
ALTER TABLE `tb_od_programschedule`
  MODIFY `scheduleid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_od_teammember`
--
ALTER TABLE `tb_od_teammember`
  MODIFY `teammemberid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_od_videos`
--
ALTER TABLE `tb_od_videos`
  MODIFY `videoid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
