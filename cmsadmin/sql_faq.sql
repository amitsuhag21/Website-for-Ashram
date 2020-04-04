-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 04, 2020 at 10:54 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `oshodhara`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_faq`
--

CREATE TABLE `tb_od_faq` (
  `pagename` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `faqid` int(10) NOT NULL,
  `shortdescription` varchar(200) NOT NULL,
  `longdescription` longtext NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `language` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_od_faq`
--

INSERT INTO `tb_od_faq` (`pagename`, `title`, `faqid`, `shortdescription`, `longdescription`, `remarks`, `status`, `language`) VALUES
('page name', 'title ', 2, 'short ', '<p>long</p>', 'remarks', 1, 'en');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_od_faq`
--
ALTER TABLE `tb_od_faq`
  ADD PRIMARY KEY (`faqid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_od_faq`
--
ALTER TABLE `tb_od_faq`
  MODIFY `faqid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
