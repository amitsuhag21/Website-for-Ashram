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



CREATE TABLE `ProgScheduleacharya` (
  `scheduleid` int(11) NOT NULL,
  `acharyaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
