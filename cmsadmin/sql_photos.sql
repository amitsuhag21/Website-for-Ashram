-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 10, 2020 at 08:02 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `oshodhara`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_folder`
--

CREATE TABLE `tb_od_folder` (
  `id` int(10) NOT NULL,
  `foldername` varchar(20) NOT NULL,
  `parent` int(10) NOT NULL,
  `path` varchar(150) NOT NULL,
  `parent_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_od_folder`
--
ALTER TABLE `tb_od_folder`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_od_folder`
--
ALTER TABLE `tb_od_folder`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;





-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 10, 2020 at 08:03 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `oshodhara`
--

-- --------------------------------------------------------

--
-- Table structure for table `td_od_photos`
--

CREATE TABLE `td_od_photos` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `imagename` varchar(50) NOT NULL,
  `path` varchar(100) NOT NULL,
  `parentid` int(11) NOT NULL,
  `pagename` varchar(50) NOT NULL,
  `comments` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `td_od_photos`
--
ALTER TABLE `td_od_photos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `td_od_photos`
--
ALTER TABLE `td_od_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
