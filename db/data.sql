-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 08:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(255) NOT NULL,
  `activity_name` varchar(100) NOT NULL,
  `projected_start_date` date NOT NULL,
  `projected_end_date` date NOT NULL,
  `actual_start_date` date NOT NULL,
  `actual_end_date` date NOT NULL,
  `projected_days` int(255) NOT NULL,
  `actual_days` int(255) NOT NULL,
  `accuracy` char(50) NOT NULL,
  `score` int(255) NOT NULL,
  `stat` varchar(10) NOT NULL,
  `project_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_name`, `projected_start_date`, `projected_end_date`, `actual_start_date`, `actual_end_date`, `projected_days`, `actual_days`, `accuracy`, `score`, `stat`, `project_id`) VALUES
(1, 'SMS module', '2018-08-01', '2018-08-05', '0000-00-00', '0000-00-00', 5, 0, 'Pending', 0, 'N', 1),
(2, 'Customer Profile', '2018-08-05', '2018-08-07', '2018-08-05', '2018-08-07', 3, 3, 'Ontime', 20, 'Y', 1),
(3, 'SLA', '2018-08-06', '2018-08-08', '2018-08-06', '2018-08-09', 3, 4, 'Delayed', 10, 'Y', 1),
(4, 'Request', '2018-08-01', '2018-08-05', '2018-08-04', '2018-08-05', 5, 2, 'Ontime', 20, 'Y', 2),
(5, 'Approve', '2018-08-08', '2018-08-10', '2018-08-08', '2018-08-09', 3, 2, 'Ontime', 30, 'Y', 2),
(6, 'Process', '2018-08-11', '2018-08-15', '2018-08-10', '2018-08-12', 5, 3, 'Ontime', 50, 'Y', 2);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(255) NOT NULL,
  `project_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`) VALUES
(1, 'CMS'),
(2, 'TSMS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
