-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 13, 2020 at 08:33 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `osho`
--

-- --------------------------------------------------------

--
-- Table structure for table `ProgScheduleacharya`
--

CREATE TABLE `ProgScheduleacharya` (
  `scheduleid` int(11) NOT NULL,
  `acharyaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `description` mediumtext,
  `Filelocation` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_books`
--

CREATE TABLE `tb_od_books` (
  `bookid` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` mediumtext,
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
  `stateid` varchar(11) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL,
  `zipcode` varchar(7) DEFAULT NULL,
  `ownerid` int(11) DEFAULT NULL,
  `emailid` varchar(100) DEFAULT NULL,
  `language` varchar(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_gurus`
--

CREATE TABLE `tb_od_gurus` (
  `guruid` int(11) NOT NULL,
  `guruname` varchar(150) DEFAULT NULL,
  `shortdescription` varchar(500) DEFAULT NULL,
  `longdescription` longtext,
  `status` int(11) NOT NULL,
  `language` varchar(10) NOT NULL
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
  `categoryid` varchar(50) NOT NULL,
  `programname` varchar(250) DEFAULT NULL,
  `shortdescription` varchar(500) DEFAULT NULL,
  `longdescription` longtext,
  `language` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `sort` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_programcategory`
--

CREATE TABLE `tb_od_programcategory` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(150) DEFAULT NULL,
  `language` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `sort` int(10) NOT NULL
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
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `eligibility` longtext,
  `guidelines` longtext,
  `comments` longtext,
  `language` varchar(10) NOT NULL,
  `status` int(10) NOT NULL
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
  `state_id` int(10) NOT NULL,
  `state_name` varchar(200) NOT NULL,
  `state_code` varchar(30) NOT NULL,
  `country_Id` int(10) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_od_state`
--

INSERT INTO `tb_od_state` (`state_id`, `state_name`, `state_code`, `country_Id`, `status`) VALUES
(1, 'Andhra Pradesh', 'AP', 1, 1),
(2, 'Arunachal Pradesh', 'AR', 1, 1),
(3, 'Assam', 'AS', 1, 1),
(4, 'Bihar', 'BR', 1, 1),
(5, 'Chhattisgarh', 'CT', 1, 1),
(6, 'Goa', 'GA', 1, 1),
(7, 'Gujarat', 'GJ', 1, 1),
(8, 'Haryana', 'HR', 1, 1),
(9, 'Himachal Pradesh', 'HP', 1, 1),
(10, 'Jammu & Kashmir', 'JK', 1, 1),
(11, 'Jharkhand', 'JH', 1, 1),
(12, 'Karnataka', 'KA', 1, 1),
(13, 'Kerala', 'KL', 1, 1),
(14, 'Madhya Pradesh', 'MP', 1, 1),
(15, 'Maharashtra', 'MH', 1, 1),
(16, 'Manipur', 'MN', 1, 1),
(17, 'Meghalaya', 'ML', 1, 1),
(18, 'Mizoram', 'MZ', 1, 1),
(19, 'Nagaland', 'NL', 1, 1),
(20, 'Odisha', 'OR', 1, 1),
(21, 'Punjab', 'PB', 1, 1),
(22, 'Rajasthan', 'RJ', 1, 1),
(23, 'Sikkim', 'SK', 1, 1),
(24, 'Tamil Nadu', 'TN', 1, 1),
(25, 'Tripura', 'TR', 1, 1),
(26, 'Uttarakhand', 'UK', 1, 1),
(27, 'Uttar Pradesh', 'UP', 1, 1),
(28, 'West Bengal', 'WB', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_teammember`
--

CREATE TABLE `tb_od_teammember` (
  `teammemberid` int(11) NOT NULL,
  `teammembername` varchar(150) DEFAULT NULL,
  `zone` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `iscoordinator` tinyint(1) DEFAULT NULL,
  `iscentralcordinator` int(10) NOT NULL,
  `isacharya` int(10) NOT NULL,
  `stateid` varchar(11) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL,
  `language` varchar(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_users`
--

CREATE TABLE `tb_od_users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_od_users`
--

INSERT INTO `tb_od_users` (`id`, `username`, `password`, `status`) VALUES
(2, 'admin', '$2y$10$n/eHQBpKO1JvlTCdaFp.ZOaLU9jfZXjO75We3KOxR0pUkyzB.fKTe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_videos`
--

CREATE TABLE `tb_od_videos` (
  `videoid` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` mediumtext,
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
-- Indexes for table `tb_od_state`
--
ALTER TABLE `tb_od_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `tb_od_teammember`
--
ALTER TABLE `tb_od_teammember`
  ADD PRIMARY KEY (`teammemberid`);

--
-- Indexes for table `tb_od_users`
--
ALTER TABLE `tb_od_users`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tb_od_state`
--
ALTER TABLE `tb_od_state`
  MODIFY `state_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_od_teammember`
--
ALTER TABLE `tb_od_teammember`
  MODIFY `teammemberid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_od_users`
--
ALTER TABLE `tb_od_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_od_videos`
--
ALTER TABLE `tb_od_videos`
  MODIFY `videoid` int(11) NOT NULL AUTO_INCREMENT;
