-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2018 at 07:27 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_report`
--

CREATE TABLE `detail_report` (
  `detail_report_id` int(255) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `projected_start_date` date NOT NULL,
  `projected_end_date` date NOT NULL,
  `actual_start_date` date NOT NULL,
  `actual_end_date` date NOT NULL,
  `projected_days` int(255) NOT NULL,
  `actual_days` int(255) NOT NULL,
  `accuracy` char(50) NOT NULL,
  `score` int(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_report`
--

INSERT INTO `detail_report` (`detail_report_id`, `activity`, `project_name`, `projected_start_date`, `projected_end_date`, `actual_start_date`, `actual_end_date`, `projected_days`, `actual_days`, `accuracy`, `score`, `status`) VALUES
(1, 'no activity', 'test project', '2018-09-24', '2018-09-29', '2018-09-26', '2018-09-28', 6, 3, 'Ontime', 100, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `list_id` int(255) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `score` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`list_id`, `activity`, `project_name`, `score`) VALUES
(1, 'SMS module', 'CMS', 70),
(2, 'Customer Profile', 'CMS', 20),
(3, 'SLA', 'CMS', 10),
(4, 'Request', 'TSMS', 20),
(5, 'Approve', 'TSMS', 30),
(6, 'Process', 'TSMS', 50);

-- --------------------------------------------------------

--
-- Table structure for table `project_report`
--

CREATE TABLE `project_report` (
  `project_report_id` int(255) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `score` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_report`
--

INSERT INTO `project_report` (`project_report_id`, `project_name`, `score`) VALUES
(1, 'no project', 100),
(2, 'CMS', 30),
(3, 'TSMS', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_report`
--
ALTER TABLE `detail_report`
  ADD PRIMARY KEY (`detail_report_id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `project_report`
--
ALTER TABLE `project_report`
  ADD PRIMARY KEY (`project_report_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_report`
--
ALTER TABLE `detail_report`
  MODIFY `detail_report_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `list_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_report`
--
ALTER TABLE `project_report`
  MODIFY `project_report_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
