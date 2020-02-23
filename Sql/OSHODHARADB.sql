-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 23, 2020 at 10:25 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `OSHODHARADB`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_od_acharya`
--

CREATE TABLE `tb_od_acharya` (
  `scheduleid` int(11) NOT NULL,
  `acharyaid` int(11) NOT NULL,
  `ac_name` varchar(100) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `od_name` varchar(100) NOT NULL,
  `pg_list` varchar(200) NOT NULL,
  `address` varchar(10) NOT NULL,
  `role` varchar(200) NOT NULL,
  `pg_specialfor` varchar(100) NOT NULL,
  `special_role` varchar(200) NOT NULL,
  `image_path` varchar(300) NOT NULL,
  `ac_region` varchar(100) NOT NULL,
  `ac_gender` varchar(20) NOT NULL,
  `ac_age` varchar(20) NOT NULL,
  `ac_email` varchar(100) NOT NULL,
  `ac_status` varchar(20) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_od_acharya`
--

INSERT INTO `tb_od_acharya` (`scheduleid`, `acharyaid`, `ac_name`, `mobile_no`, `phone_no`, `od_name`, `pg_list`, `address`, `role`, `pg_specialfor`, `special_role`, `image_path`, `ac_region`, `ac_gender`, `ac_age`, `ac_email`, `ac_status`) VALUES
(1, 1, 'Osho Siddharth Aulia', '9738642264', '9738642264', 'Osho Siddharth Aulia', 'ALL', 'patna', 'Sadguru', 'All', 'LiveMaster', 'img/OshoSiddharthAulia.jpg', 'Murthal', 'Male', '76', 'oshodhara@gmail.com', 'ACTIVE');

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
  `country_type` varchar(20) NOT NULL DEFAULT 'foreign',
  `country_language` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_od_country`
--

INSERT INTO `tb_od_country` (`country_id`, `country_name`, `country_code`, `country_type`, `country_language`) VALUES
(1, 'Andorra', 'AD', 'foreign', NULL),
(2, 'United Arab Emirates', 'AE', 'foreign', NULL),
(3, 'Afghanistan', 'AF', 'foreign', NULL),
(4, 'Antigua and Barbuda', 'AG', 'foreign', NULL),
(5, 'Anguilla', 'AI', 'foreign', NULL),
(6, 'Albania', 'AL', 'foreign', NULL),
(7, 'Armenia', 'AM', 'foreign', NULL),
(8, 'Angola', 'AO', 'foreign', NULL),
(9, 'Antarctica', 'AQ', 'foreign', NULL),
(10, 'Argentina', 'AR', 'foreign', NULL),
(11, 'American Samoa', 'AS', 'foreign', NULL),
(12, 'Austria', 'AT', 'foreign', NULL),
(13, 'Australia', 'AU', 'foreign', NULL),
(14, 'Aruba', 'AW', 'foreign', NULL),
(15, 'Åland', 'AX', 'foreign', NULL),
(16, 'Azerbaijan', 'AZ', 'foreign', NULL),
(17, 'Bosnia and Herzegovina', 'BA', 'foreign', NULL),
(18, 'Barbados', 'BB', 'foreign', NULL),
(19, 'Bangladesh', 'BD', 'foreign', NULL),
(20, 'Belgium', 'BE', 'foreign', NULL),
(21, 'Burkina Faso', 'BF', 'foreign', NULL),
(22, 'Bulgaria', 'BG', 'foreign', NULL),
(23, 'Bahrain', 'BH', 'foreign', NULL),
(24, 'Burundi', 'BI', 'foreign', NULL),
(25, 'Benin', 'BJ', 'foreign', NULL),
(26, 'Saint Barthélemy', 'BL', 'foreign', NULL),
(27, 'Bermuda', 'BM', 'foreign', NULL),
(28, 'Brunei', 'BN', 'foreign', NULL),
(29, 'Bolivia', 'BO', 'foreign', NULL),
(30, 'Bonaire', 'BQ', 'foreign', NULL),
(31, 'Brazil', 'BR', 'foreign', NULL),
(32, 'Bahamas', 'BS', 'foreign', NULL),
(33, 'Bhutan', 'BT', 'foreign', NULL),
(34, 'Bouvet Island', 'BV', 'foreign', NULL),
(35, 'Botswana', 'BW', 'foreign', NULL),
(36, 'Belarus', 'BY', 'foreign', NULL),
(37, 'Belize', 'BZ', 'foreign', NULL),
(38, 'Canada', 'CA', 'foreign', NULL),
(39, 'Cocos [Keeling] Islands', 'CC', 'foreign', NULL),
(40, 'Democratic Republic of the Congo', 'CD', 'foreign', NULL),
(41, 'Central African Republic', 'CF', 'foreign', NULL),
(42, 'Republic of the Congo', 'CG', 'foreign', NULL),
(43, 'Switzerland', 'CH', 'foreign', NULL),
(44, 'Ivory Coast', 'CI', 'foreign', NULL),
(45, 'Cook Islands', 'CK', 'foreign', NULL),
(46, 'Chile', 'CL', 'foreign', NULL),
(47, 'Cameroon', 'CM', 'foreign', NULL),
(48, 'China', 'CN', 'foreign', NULL),
(49, 'Colombia', 'CO', 'foreign', NULL),
(50, 'Costa Rica', 'CR', 'foreign', NULL),
(51, 'Cuba', 'CU', 'foreign', NULL),
(52, 'Cape Verde', 'CV', 'foreign', NULL),
(53, 'Curacao', 'CW', 'foreign', NULL),
(54, 'Christmas Island', 'CX', 'foreign', NULL),
(55, 'Cyprus', 'CY', 'foreign', NULL),
(56, 'Czech Republic', 'CZ', 'foreign', NULL),
(57, 'Germany', 'DE', 'foreign', NULL),
(58, 'Djibouti', 'DJ', 'foreign', NULL),
(59, 'Denmark', 'DK', 'foreign', NULL),
(60, 'Dominica', 'DM', 'foreign', NULL),
(61, 'Dominican Republic', 'DO', 'foreign', NULL),
(62, 'Algeria', 'DZ', 'foreign', NULL),
(63, 'Ecuador', 'EC', 'foreign', NULL),
(64, 'Estonia', 'EE', 'foreign', NULL),
(65, 'Egypt', 'EG', 'foreign', NULL),
(66, 'Western Sahara', 'EH', 'foreign', NULL),
(67, 'Eritrea', 'ER', 'foreign', NULL),
(68, 'Spain', 'ES', 'foreign', NULL),
(69, 'Ethiopia', 'ET', 'foreign', NULL),
(70, 'Finland', 'FI', 'foreign', NULL),
(71, 'Fiji', 'FJ', 'foreign', NULL),
(72, 'Falkland Islands', 'FK', 'foreign', NULL),
(73, 'Micronesia', 'FM', 'foreign', NULL),
(74, 'Faroe Islands', 'FO', 'foreign', NULL),
(75, 'France', 'FR', 'foreign', NULL),
(76, 'Gabon', 'GA', 'foreign', NULL),
(77, 'United Kingdom', 'GB', 'foreign', NULL),
(78, 'Grenada', 'GD', 'foreign', NULL),
(79, 'Georgia', 'GE', 'foreign', NULL),
(80, 'French Guiana', 'GF', 'foreign', NULL),
(81, 'Guernsey', 'GG', 'foreign', NULL),
(82, 'Ghana', 'GH', 'foreign', NULL),
(83, 'Gibraltar', 'GI', 'foreign', NULL),
(84, 'Greenland', 'GL', 'foreign', NULL),
(85, 'Gambia', 'GM', 'foreign', NULL),
(86, 'Guinea', 'GN', 'foreign', NULL),
(87, 'Guadeloupe', 'GP', 'foreign', NULL),
(88, 'Equatorial Guinea', 'GQ', 'foreign', NULL),
(89, 'Greece', 'GR', 'foreign', NULL),
(90, 'South Georgia and the South Sandwich Islands', 'GS', 'foreign', NULL),
(91, 'Guatemala', 'GT', 'foreign', NULL),
(92, 'Guam', 'GU', 'foreign', NULL),
(93, 'Guinea-Bissau', 'GW', 'foreign', NULL),
(94, 'Guyana', 'GY', 'foreign', NULL),
(95, 'Hong Kong', 'HK', 'foreign', NULL),
(96, 'Heard Island and McDonald Islands', 'HM', 'foreign', NULL),
(97, 'Honduras', 'HN', 'foreign', NULL),
(98, 'Croatia', 'HR', 'foreign', NULL),
(99, 'Haiti', 'HT', 'foreign', NULL),
(100, 'Hungary', 'HU', 'foreign', NULL),
(101, 'Indonesia', 'ID', 'foreign', NULL),
(102, 'Ireland', 'IE', 'foreign', NULL),
(103, 'Israel', 'IL', 'foreign', NULL),
(104, 'Isle of Man', 'IM', 'foreign', NULL),
(105, 'India', 'IN', 'foreign', NULL),
(106, 'British Indian Ocean Territory', 'IO', 'foreign', NULL),
(107, 'Iraq', 'IQ', 'foreign', NULL),
(108, 'Iran', 'IR', 'foreign', NULL),
(109, 'Iceland', 'IS', 'foreign', NULL),
(110, 'Italy', 'IT', 'foreign', NULL),
(111, 'Jersey', 'JE', 'foreign', NULL),
(112, 'Jamaica', 'JM', 'foreign', NULL),
(113, 'Jordan', 'JO', 'foreign', NULL),
(114, 'Japan', 'JP', 'foreign', NULL),
(115, 'Kenya', 'KE', 'foreign', NULL),
(116, 'Kyrgyzstan', 'KG', 'foreign', NULL),
(117, 'Cambodia', 'KH', 'foreign', NULL),
(118, 'Kiribati', 'KI', 'foreign', NULL),
(119, 'Comoros', 'KM', 'foreign', NULL),
(120, 'Saint Kitts and Nevis', 'KN', 'foreign', NULL),
(121, 'North Korea', 'KP', 'foreign', NULL),
(122, 'South Korea', 'KR', 'foreign', NULL),
(123, 'Kuwait', 'KW', 'foreign', NULL),
(124, 'Cayman Islands', 'KY', 'foreign', NULL),
(125, 'Kazakhstan', 'KZ', 'foreign', NULL),
(126, 'Laos', 'LA', 'foreign', NULL),
(127, 'Lebanon', 'LB', 'foreign', NULL),
(128, 'Saint Lucia', 'LC', 'foreign', NULL),
(129, 'Liechtenstein', 'LI', 'foreign', NULL),
(130, 'Sri Lanka', 'LK', 'foreign', NULL),
(131, 'Liberia', 'LR', 'foreign', NULL),
(132, 'Lesotho', 'LS', 'foreign', NULL),
(133, 'Lithuania', 'LT', 'foreign', NULL),
(134, 'Luxembourg', 'LU', 'foreign', NULL),
(135, 'Latvia', 'LV', 'foreign', NULL),
(136, 'Libya', 'LY', 'foreign', NULL),
(137, 'Morocco', 'MA', 'foreign', NULL),
(138, 'Monaco', 'MC', 'foreign', NULL),
(139, 'Moldova', 'MD', 'foreign', NULL),
(140, 'Montenegro', 'ME', 'foreign', NULL),
(141, 'Saint Martin', 'MF', 'foreign', NULL),
(142, 'Madagascar', 'MG', 'foreign', NULL),
(143, 'Marshall Islands', 'MH', 'foreign', NULL),
(144, 'Macedonia', 'MK', 'foreign', NULL),
(145, 'Mali', 'ML', 'foreign', NULL),
(146, 'Myanmar [Burma]', 'MM', 'foreign', NULL),
(147, 'Mongolia', 'MN', 'foreign', NULL),
(148, 'Macao', 'MO', 'foreign', NULL),
(149, 'Northern Mariana Islands', 'MP', 'foreign', NULL),
(150, 'Martinique', 'MQ', 'foreign', NULL),
(151, 'Mauritania', 'MR', 'foreign', NULL),
(152, 'Montserrat', 'MS', 'foreign', NULL),
(153, 'Malta', 'MT', 'foreign', NULL),
(154, 'Mauritius', 'MU', 'foreign', NULL),
(155, 'Maldives', 'MV', 'foreign', NULL),
(156, 'Malawi', 'MW', 'foreign', NULL),
(157, 'Mexico', 'MX', 'foreign', NULL),
(158, 'Malaysia', 'MY', 'foreign', NULL),
(159, 'Mozambique', 'MZ', 'foreign', NULL),
(160, 'Namibia', 'NA', 'foreign', NULL),
(161, 'New Caledonia', 'NC', 'foreign', NULL),
(162, 'Niger', 'NE', 'foreign', NULL),
(163, 'Norfolk Island', 'NF', 'foreign', NULL),
(164, 'Nigeria', 'NG', 'foreign', NULL),
(165, 'Nicaragua', 'NI', 'foreign', NULL),
(166, 'Netherlands', 'NL', 'foreign', NULL),
(167, 'Norway', 'NO', 'foreign', NULL),
(168, 'Nepal', 'NP', 'foreign', NULL),
(169, 'Nauru', 'NR', 'foreign', NULL),
(170, 'Niue', 'NU', 'foreign', NULL),
(171, 'New Zealand', 'NZ', 'foreign', NULL),
(172, 'Oman', 'OM', 'foreign', NULL),
(173, 'Panama', 'PA', 'foreign', NULL),
(174, 'Peru', 'PE', 'foreign', NULL),
(175, 'French Polynesia', 'PF', 'foreign', NULL),
(176, 'Papua New Guinea', 'PG', 'foreign', NULL),
(177, 'Philippines', 'PH', 'foreign', NULL),
(178, 'Pakistan', 'PK', 'foreign', NULL),
(179, 'Poland', 'PL', 'foreign', NULL),
(180, 'Saint Pierre and Miquelon', 'PM', 'foreign', NULL),
(181, 'Pitcairn Islands', 'PN', 'foreign', NULL),
(182, 'Puerto Rico', 'PR', 'foreign', NULL),
(183, 'Palestine', 'PS', 'foreign', NULL),
(184, 'Portugal', 'PT', 'foreign', NULL),
(185, 'Palau', 'PW', 'foreign', NULL),
(186, 'Paraguay', 'PY', 'foreign', NULL),
(187, 'Qatar', 'QA', 'foreign', NULL),
(188, 'Réunion', 'RE', 'foreign', NULL),
(189, 'Romania', 'RO', 'foreign', NULL),
(190, 'Serbia', 'RS', 'foreign', NULL),
(191, 'Russia', 'RU', 'foreign', NULL),
(192, 'Rwanda', 'RW', 'foreign', NULL),
(193, 'Saudi Arabia', 'SA', 'foreign', NULL),
(194, 'Solomon Islands', 'SB', 'foreign', NULL),
(195, 'Seychelles', 'SC', 'foreign', NULL),
(196, 'Sudan', 'SD', 'foreign', NULL),
(197, 'Sweden', 'SE', 'foreign', NULL),
(198, 'Singapore', 'SG', 'foreign', NULL),
(199, 'Saint Helena', 'SH', 'foreign', NULL),
(200, 'Slovenia', 'SI', 'foreign', NULL),
(201, 'Svalbard and Jan Mayen', 'SJ', 'foreign', NULL),
(202, 'Slovakia', 'SK', 'foreign', NULL),
(203, 'Sierra Leone', 'SL', 'foreign', NULL),
(204, 'San Marino', 'SM', 'foreign', NULL),
(205, 'Senegal', 'SN', 'foreign', NULL),
(206, 'Somalia', 'SO', 'foreign', NULL),
(207, 'Suriname', 'SR', 'foreign', NULL),
(208, 'South Sudan', 'SS', 'foreign', NULL),
(209, 'São Tomé and Príncipe', 'ST', 'foreign', NULL),
(210, 'El Salvador', 'SV', 'foreign', NULL),
(211, 'Sint Maarten', 'SX', 'foreign', NULL),
(212, 'Syria', 'SY', 'foreign', NULL),
(213, 'Swaziland', 'SZ', 'foreign', NULL),
(214, 'Turks and Caicos Islands', 'TC', 'foreign', NULL),
(215, 'Chad', 'TD', 'foreign', NULL),
(216, 'French Southern Territories', 'TF', 'foreign', NULL),
(217, 'Togo', 'TG', 'foreign', NULL),
(218, 'Thailand', 'TH', 'foreign', NULL),
(219, 'Tajikistan', 'TJ', 'foreign', NULL),
(220, 'Tokelau', 'TK', 'foreign', NULL),
(221, 'East Timor', 'TL', 'foreign', NULL),
(222, 'Turkmenistan', 'TM', 'foreign', NULL),
(223, 'Tunisia', 'TN', 'foreign', NULL),
(224, 'Tonga', 'TO', 'foreign', NULL),
(225, 'Turkey', 'TR', 'foreign', NULL),
(226, 'Trinidad and Tobago', 'TT', 'foreign', NULL),
(227, 'Tuvalu', 'TV', 'foreign', NULL),
(228, 'Taiwan', 'TW', 'foreign', NULL),
(229, 'Tanzania', 'TZ', 'foreign', NULL),
(230, 'Ukraine', 'UA', 'foreign', NULL),
(231, 'Uganda', 'UG', 'foreign', NULL),
(232, 'U.S. Minor Outlying Islands', 'UM', 'foreign', NULL),
(233, 'United States', 'US', 'foreign', NULL),
(234, 'Uruguay', 'UY', 'foreign', NULL),
(235, 'Uzbekistan', 'UZ', 'foreign', NULL),
(236, 'Vatican City', 'VA', 'foreign', NULL),
(237, 'Saint Vincent and the Grenadines', 'VC', 'foreign', NULL),
(238, 'Venezuela', 'VE', 'foreign', NULL),
(239, 'British Virgin Islands', 'VG', 'foreign', NULL),
(240, 'U.S. Virgin Islands', 'VI', 'foreign', NULL),
(241, 'Vietnam', 'VN', 'foreign', NULL),
(242, 'Vanuatu', 'VU', 'foreign', NULL),
(243, 'Wallis and Futuna', 'WF', 'foreign', NULL),
(244, 'Samoa', 'WS', 'foreign', NULL),
(245, 'Kosovo', 'XK', 'foreign', NULL),
(246, 'Yemen', 'YE', 'foreign', NULL),
(247, 'Mayotte', 'YT', 'foreign', NULL),
(248, 'South Africa', 'ZA', 'foreign', NULL),
(249, 'Zambia', 'ZM', 'foreign', NULL),
(250, 'Zimbabwe', 'ZW', 'foreign', NULL);

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
  `pg_id` int(10) NOT NULL,
  `pg_name` varchar(200) NOT NULL,
  `pg_description` varchar(2000) DEFAULT NULL,
  `longdescription` longtext DEFAULT NULL,
  `level` int(20) NOT NULL,
  `pg_category` varchar(200) NOT NULL,
  `pg_code` varchar(200) NOT NULL,
  `pg_duration` varchar(20) NOT NULL,
  `pg_eligibility` varchar(20) NOT NULL,
  `pg_active` varchar(20) NOT NULL
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
-- Indexes for table `tb_od_acharya`
--
ALTER TABLE `tb_od_acharya`
  ADD PRIMARY KEY (`acharyaid`),
  ADD KEY `ac_name` (`ac_name`),
  ADD KEY `mobile_no` (`mobile_no`),
  ADD KEY `od_name` (`od_name`);

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
  ADD PRIMARY KEY (`pg_id`);

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
  MODIFY `country_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

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
  MODIFY `pg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
