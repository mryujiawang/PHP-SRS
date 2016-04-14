-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2016 at 10:42 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iehealth_reporting_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ie_objectives`
--

CREATE TABLE IF NOT EXISTS `ie_objectives` (
`o_id` int(5) NOT NULL,
  `p_id` int(5) NOT NULL,
  `o_description` text NOT NULL,
  `o_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ie_priority`
--

CREATE TABLE IF NOT EXISTS `ie_priority` (
  `p_id` int(5) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ie_strategies`
--

CREATE TABLE IF NOT EXISTS `ie_strategies` (
`s_id` int(5) NOT NULL,
  `o_id` int(5) NOT NULL,
  `s_description` text NOT NULL,
  `s_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ie_tasks`
--

CREATE TABLE IF NOT EXISTS `ie_tasks` (
`t_id` int(20) NOT NULL,
  `p_id` int(5) NOT NULL,
  `o_id` int(5) NOT NULL,
  `s_id` int(5) NOT NULL,
  `t_short_desc` varchar(200) NOT NULL,
  `t_desc` text NOT NULL,
  `t_status` tinyint(1) NOT NULL DEFAULT '0',
  `t_owner` varchar(50) NOT NULL,
  `t_member` varchar(200) NOT NULL,
  `t_link_id` int(5) NOT NULL,
  `t_start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `t_end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `t_last_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `t_worthy` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ie_user`
--

CREATE TABLE IF NOT EXISTS `ie_user` (
`u_id` int(11) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `u_last_name` varchar(50) NOT NULL,
  `u_email` varchar(150) NOT NULL,
  `u_password` varchar(150) NOT NULL,
  `u_login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `u_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ie_user`
--

INSERT INTO `ie_user` (`u_id`, `u_name`, `u_last_name`, `u_email`, `u_password`, `u_login_time`, `u_status`) VALUES
(2, 'vinh', 'kim', 'kvlong88@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2016-03-26 08:16:32', 0),
(5, 'dany', 'Xander', 'dxander@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2016-03-27 04:43:20', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ie_objectives`
--
ALTER TABLE `ie_objectives`
 ADD PRIMARY KEY (`o_id`), ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `ie_priority`
--
ALTER TABLE `ie_priority`
 ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `ie_strategies`
--
ALTER TABLE `ie_strategies`
 ADD PRIMARY KEY (`s_id`), ADD KEY `o_id` (`o_id`);

--
-- Indexes for table `ie_tasks`
--
ALTER TABLE `ie_tasks`
 ADD PRIMARY KEY (`t_id`), ADD KEY `p_id` (`p_id`,`o_id`,`s_id`), ADD KEY `s_id` (`s_id`), ADD KEY `o_id` (`o_id`);

--
-- Indexes for table `ie_user`
--
ALTER TABLE `ie_user`
 ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ie_objectives`
--
ALTER TABLE `ie_objectives`
MODIFY `o_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ie_strategies`
--
ALTER TABLE `ie_strategies`
MODIFY `s_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ie_tasks`
--
ALTER TABLE `ie_tasks`
MODIFY `t_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ie_user`
--
ALTER TABLE `ie_user`
MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ie_objectives`
--
ALTER TABLE `ie_objectives`
ADD CONSTRAINT `fk_objectives` FOREIGN KEY (`p_id`) REFERENCES `ie_priority` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ie_strategies`
--
ALTER TABLE `ie_strategies`
ADD CONSTRAINT `fk_strategy` FOREIGN KEY (`o_id`) REFERENCES `ie_objectives` (`o_id`);

--
-- Constraints for table `ie_tasks`
--
ALTER TABLE `ie_tasks`
ADD CONSTRAINT `fk_task_objective` FOREIGN KEY (`o_id`) REFERENCES `ie_objectives` (`o_id`) ON DELETE CASCADE,
ADD CONSTRAINT `fk_task_priority` FOREIGN KEY (`p_id`) REFERENCES `ie_priority` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_task_strategy` FOREIGN KEY (`s_id`) REFERENCES `ie_strategies` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
