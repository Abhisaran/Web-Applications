-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2016 at 09:55 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `cri_users`
--

CREATE TABLE IF NOT EXISTS `cri_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `type` varchar(15) NOT NULL,
  `lachge` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cri_users`
--

INSERT INTO `cri_users` (`id`, `username`, `password`, `type`, `lachge`) VALUES
(1, 'admin', 'admin', 'admin', '2016-09-05 14:21:09');

-- --------------------------------------------------------


--
-- Table structure for table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `reg_no` varchar(18) NOT NULL,
  `full_name` varchar(90) NOT NULL,
  `gender` text NOT NULL,
  `dob` date NOT NULL,
  `dept` varchar(10) NOT NULL,
  `year` int(11) NOT NULL,
  `gpa1` float NOT NULL DEFAULT '0',
  `gpa2` float NOT NULL DEFAULT '0',
  `gpa3` float NOT NULL DEFAULT '0',
  `gpa4` float NOT NULL DEFAULT '0',
  `gpa5` float NOT NULL DEFAULT '0',
  `gpa6` float NOT NULL DEFAULT '0',
  `gpa7` float NOT NULL DEFAULT '0',
  `gpa8` float NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL,
  `uphne` text NOT NULL,
  `pphne` text NOT NULL,
  `profession` text NOT NULL,
  `no_of_attend` int(11) NOT NULL,
  `no_of_leave` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `password`, `rollno`, `reg_no`, `full_name`, `gender`, `dob`, `dept`, `year`, `gpa1`, `gpa2`, `gpa3`, `gpa4`, `gpa5`, `gpa6`, `gpa7`, `gpa8`, `email`, `uphne`, `pphne`, `profession`, `no_of_attend`, `no_of_leave`) VALUES
(1, 'pass', 'CSA1430', '811514104030', 'Ganapathy Hariharan', 'male', '1997-03-19', 'CSE-05', 3, 8.73, 8.16, 8.43, 7.64, 0, 0, 0, 0, 'ganapathyhrhrn@gmail.com', '9750921633', '9003607553', 'Student', 100, 10);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `maker` varchar(70) NOT NULL,
  `title` varchar(120) NOT NULL,
  `description` varchar(500) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `addeddate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `maker`, `title`, `description`, `startdate`, `enddate`, `addeddate`) VALUES
(2, 'admin', 'app success', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.', '2016-09-08', '2016-09-10', '0000-00-00 00:00:00'),
(3, 'ganapthy', 'Welcome', 'oh no! My app is going to burst', '2016-09-05', '2016-09-16', '2016-09-05 00:00:00'),
(9, 'admin', 'Making app', 'Iam making app to get govt project', '2016-08-29', '2016-09-06', '2016-09-05 15:30:31'),
(10, 'SGHH', 'Finishing work', 'Checking for fault in the projects', '2016-09-05', '2016-09-05', '2016-09-05 00:00:00');



--
-- Indexes for dumped tables
--

--
-- Indexes for table `cri_users`
--
ALTER TABLE `cri_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rollno` (`rollno`),
  ADD UNIQUE KEY `reg_no` (`reg_no`),
  ADD UNIQUE KEY `rollno_2` (`rollno`,`reg_no`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);



--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cri_users`
--
ALTER TABLE `cri_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
