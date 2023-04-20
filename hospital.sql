-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307:8080
-- Generation Time: Apr 18, 2023 at 03:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appt_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doc_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(250) NOT NULL,
  `age` int(3) NOT NULL,
  `phone` int(11) NOT NULL,
  `insurance` varchar(3) NOT NULL,
  `p_email` varchar(50) NOT NULL,
  `patient_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_name`, `age`, `phone`, `insurance`, `p_email`, `patient_pass`) VALUES(7, '2', 2, 2, '', '2', '2');
INSERT INTO `patients` (`patient_id`, `patient_name`, `age`, `phone`, `insurance`, `p_email`, `patient_pass`) VALUES(9, '4', 4, 4, '', '4', '4');
INSERT INTO `patients` (`patient_id`, `patient_name`, `age`, `phone`, `insurance`, `p_email`, `patient_pass`) VALUES(10, 'ffsds', 22, 1234, 'y', '1234', '1234');
INSERT INTO `patients` (`patient_id`, `patient_name`, `age`, `phone`, `insurance`, `p_email`, `patient_pass`) VALUES(11, 'Fatima ', 24, 567923024, 'yes', '1234', '1234');
INSERT INTO `patients` (`patient_id`, `patient_name`, `age`, `phone`, `insurance`, `p_email`, `patient_pass`) VALUES(12, '123', 23, 123, 'yes', '2345', '2345');
INSERT INTO `patients` (`patient_id`, `patient_name`, `age`, `phone`, `insurance`, `p_email`, `patient_pass`) VALUES(13, 'fatima ', 21, 123456, 'no', 'ff2838', '12345');
INSERT INTO `patients` (`patient_id`, `patient_name`, `age`, `phone`, `insurance`, `p_email`, `patient_pass`) VALUES(14, 'ff', 12345, 2345, 'yes', '2345', '23456');
INSERT INTO `patients` (`patient_id`, `patient_name`, `age`, `phone`, `insurance`, `p_email`, `patient_pass`) VALUES(15, 'fatimaokrrrrr', 100, 55555555, 'yes', 'ffat2023@gmail.com', '');
INSERT INTO `patients` (`patient_id`, `patient_name`, `age`, `phone`, `insurance`, `p_email`, `patient_pass`) VALUES(16, 'wewwewee', 12, 98765, 'yes', 'sss@gmail.com', '123');
INSERT INTO `patients` (`patient_id`, `patient_name`, `age`, `phone`, `insurance`, `p_email`, `patient_pass`) VALUES(17, 'saraokrrrrr', 23, 765456789, 'yes', 'hhhhh@gmail.com', '123');
INSERT INTO `patients` (`patient_id`, `patient_name`, `age`, `phone`, `insurance`, `p_email`, `patient_pass`) VALUES(18, 'sosoooookrrrrr', 23, 2147483647, 'yes', 'sosoamazing@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedual_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appt_id`),
  ADD KEY `doc_id` (`doc_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doc_id`),
  ADD UNIQUE KEY `doc_id` (`doc_id`,`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `patient_id` (`patient_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedual_id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedual_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
