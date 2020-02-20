-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 20, 2020 at 10:44 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `osho`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_od_users`
--
ALTER TABLE `tb_od_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_od_users`
--
ALTER TABLE `tb_od_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
