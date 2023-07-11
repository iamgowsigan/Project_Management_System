-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 12, 2023 at 01:28 PM
-- Server version: 10.10.3-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

DROP TABLE IF EXISTS `college`;
CREATE TABLE IF NOT EXISTS `college` (
  `c_id` int(50) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(200) NOT NULL,
  `c_code` varchar(50) NOT NULL,
  `c_address` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`c_id`, `c_name`, `c_code`, `c_address`) VALUES
(1, 'Thiagarajar College of Engineering', '5008', 'Madurai'),
(2, 'PSG College of Engineering', '7108', 'Coimbatore'),
(3, 'SSN College of Engineering', '1315', 'Chennai'),
(4, 'VIT College of Engineering', '6273', 'Vellore');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(200) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'Civil Engineering'),
(2, 'Electrical Communication Engineering'),
(3, 'Electrical and Electronics Engineering'),
(4, 'Computer Science Engineering'),
(5, 'Information Technology'),
(6, 'Mechanical Engineering'),
(7, 'Architecture '),
(9, 'Mechatronics Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `f_id` int(50) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(200) NOT NULL,
  `f_role` varchar(100) NOT NULL DEFAULT 'Assistant Professor',
  `f_experience` int(50) NOT NULL,
  `project_mentored` int(50) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `f_name`, `f_role`, `f_experience`, `project_mentored`) VALUES
(1, 'Dr.Deisy', 'Professor', 21, 6),
(2, 'Dr.Padmavathi', 'Professor', 15, 4),
(3, 'Dr.Tamilselvi', 'Professor', 13, 4),
(4, 'Dr.Muthuramalingam', 'Professor', 12, 3),
(5, 'Dr.Jeyamala', 'Assistant Professor', 15, 4),
(6, 'Dr.Sridevi', 'Assistant Professor', 15, 4),
(7, 'Dr.Karthikeyan', 'Assistant Professor', 13, 4),
(8, 'Dr.Abirami', 'Assistant Professor', 12, 3),
(9, 'Dr.Uma', 'Assistant Professor', 15, 4),
(11, 'Dr.Karthiga', 'Assistant Professor', 8, 2),
(12, 'Dr.Indira', 'Assistant Professor', 8, 2),
(13, 'Dr.Manojkumar', 'Assistant Professor', 8, 2),
(14, 'Dr.Ilankumaran', 'Assistant Professor', 12, 4),
(15, 'Parkavi', 'Assistant Professor', 12, 3),
(16, 'Nisa Angeline', 'Assistant Professor', 12, 3),
(17, 'Thiruchadai Pandeeswari', 'Assistant Professor', 12, 4),
(18, 'Pudumalar', 'Assistant Professor', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `sig_id` int(11) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_status` varchar(100) NOT NULL,
  `p_date` varchar(50) NOT NULL,
  `p_recognization` varchar(100) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `sig` (`sig_id`),
  KEY `student` (`s_id`),
  KEY `c_id` (`c_id`),
  KEY `f_id` (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`p_id`, `sig_id`, `s_id`, `c_id`, `f_id`, `p_name`, `p_status`, `p_date`, `p_recognization`) VALUES
(1, 3, 2, 1, 13, 'Decentralized online ride-hailing Mobile application', 'SUCCESS', '2023-03-22', 'Winner of IITM Hackathon'),
(2, 8, 4, 1, 2, 'Energy conservation system for home', 'PENDING', '2023-03-22', ''),
(3, 1, 1, 1, 12, 'Abnormal activities detection in crowds', 'PROCESS', '2023-03-22', ''),
(4, 4, 5, 1, 15, 'Blockchain Implementation on Online Transaction ', 'SUCCESS', '2023-03-22', 'Runner up in PSG Hackathon'),
(5, 10, 7, 2, 13, 'Improving Spatial Resolution of Raman DTS Using Total Variation Deconvolution', 'PROCESS', '2023-03-22', ''),
(6, 3, 6, 4, 13, 'Online Training and Course Booking Mobile Application', 'SUCCESS', '2023-03-22', 'Winner on Smart India Hackathon 2023');

-- --------------------------------------------------------

--
-- Table structure for table `r_seq`
--

DROP TABLE IF EXISTS `r_seq`;
CREATE TABLE IF NOT EXISTS `r_seq` (
  `next_not_cached_value` bigint(21) NOT NULL,
  `minimum_value` bigint(21) NOT NULL,
  `maximum_value` bigint(21) NOT NULL,
  `start_value` bigint(21) NOT NULL COMMENT 'start value when sequences is created or value if RESTART is used',
  `increment` bigint(21) NOT NULL COMMENT 'increment value',
  `cache_size` bigint(21) UNSIGNED NOT NULL,
  `cycle_option` tinyint(1) UNSIGNED NOT NULL COMMENT '0 if no cycles are allowed, 1 if the sequence should begin a new cycle when maximum_value is passed',
  `cycle_count` bigint(21) NOT NULL COMMENT 'How many cycles have been done'
) ENGINE=InnoDB;

--
-- Dumping data for table `r_seq`
--

INSERT INTO `r_seq` (`next_not_cached_value`, `minimum_value`, `maximum_value`, `start_value`, `increment`, `cache_size`, `cycle_option`, `cycle_count`) VALUES
(1001, 1, 9223372036854775806, 1, 1, 1000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sig`
--

DROP TABLE IF EXISTS `sig`;
CREATE TABLE IF NOT EXISTS `sig` (
  `sig_id` int(50) NOT NULL AUTO_INCREMENT,
  `sig_name` varchar(100) NOT NULL,
  PRIMARY KEY (`sig_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sig`
--

INSERT INTO `sig` (`sig_id`, `sig_name`) VALUES
(1, 'Data Engineering'),
(2, 'Distributed Systems'),
(3, 'Mobile Technology'),
(4, 'Information Security'),
(5, 'Cognitive Science'),
(6, 'System Engineering'),
(7, 'Software and Data Engineering'),
(8, 'AI and Data Science'),
(9, 'RF Systems'),
(10, 'Signal Processing'),
(11, 'Remote Sensing and GIS'),
(12, 'Image Processing'),
(13, 'Analog Digital && Electronic Systems'),
(14, 'Power Electronics and Drives'),
(15, 'Thermal'),
(16, 'Manufacturing'),
(17, 'Industrial Engineering'),
(18, 'Robotics'),
(19, 'Database Management systems, Data Mining,\r\nMachine Learning'),
(20, 'Business Analytics, ERP, Big Data');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `s_id` int(50) NOT NULL AUTO_INCREMENT,
  `dept_id` int(50) DEFAULT NULL,
  `f_id` int(50) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `s_name` varchar(200) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `s_year` int(50) NOT NULL,
  `projects_involved` int(50) NOT NULL,
  PRIMARY KEY (`s_id`),
  KEY `Dept` (`dept_id`),
  KEY `Faculty` (`f_id`),
  KEY `Project` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `dept_id`, `f_id`, `p_id`, `s_name`, `reg_no`, `s_year`, `projects_involved`) VALUES
(1, 5, 6, 3, 'Dhiyaneshwar', '21IT031', 2, 2),
(2, 5, 7, 1, 'Karthikeyan', '21IT051', 2, 3),
(3, 4, 13, 1, 'Venkadesh', '21C0114', 2, 5),
(4, 5, 2, 2, 'Kaushik', '21IT052', 2, 2),
(5, 5, 5, 4, 'Annamalai', '21IT011', 2, 2),
(6, 5, 13, 1, 'Gowsigan', '21IT035', 2, 3),
(7, 2, 13, 5, 'Poo Annamalai', '21D014', 2, 1),
(9, 5, 11, 6, 'Hari Shankar', '21IT039', 2, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `college` (`c_id`),
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `sig` FOREIGN KEY (`sig_id`) REFERENCES `sig` (`sig_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `Dept` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Faculty` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Project` FOREIGN KEY (`p_id`) REFERENCES `projects` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
