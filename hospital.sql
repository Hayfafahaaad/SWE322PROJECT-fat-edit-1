-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307:8080
-- Generation Time: Apr 24, 2023 at 09:49 PM
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
  `patient_id` int(11) DEFAULT NULL,
  `doc_id` int(11) NOT NULL,
  `apptdate` date NOT NULL,
  `appttime` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appt_id`, `patient_id`, `doc_id`, `apptdate`, `appttime`) VALUES
(1, 22, 1, '2023-05-01', '08:00'),
(3, 18, 1, '2023-05-01', '08:30'),
(5, NULL, 2, '2023-05-01', '09:00'),
(6, NULL, 2, '2023-05-01', '09:30'),
(7, NULL, 1, '2023-05-01', '09:00'),
(8, NULL, 1, '2023-05-01', '09:00'),
(9, NULL, 1, '2023-05-01', '09:30'),
(10, NULL, 1, '2023-05-01', '10:00'),
(11, NULL, 1, '2023-05-01', '10:30'),
(12, NULL, 1, '2023-05-01', '11:00'),
(13, NULL, 1, '2023-05-01', '01:00'),
(14, NULL, 1, '2023-05-01', '02:00'),
(15, NULL, 1, '2023-05-01', '03:00'),
(16, NULL, 1, '2023-05-01', '04:00'),
(18, NULL, 2, '2023-05-01', '04:00'),
(19, NULL, 2, '2023-05-01', '04:30'),
(20, NULL, 2, '2023-05-01', '04:00'),
(21, NULL, 2, '2023-05-01', '05:00'),
(22, 18, 2, '2023-05-01', '05:30'),
(23, NULL, 2, '2023-05-01', '06:00'),
(24, NULL, 2, '2023-05-01', '06:30'),
(25, NULL, 2, '2023-05-01', '07:00'),
(26, NULL, 2, '2023-05-01', '07:30'),
(27, NULL, 2, '2023-05-01', '08:00'),
(28, NULL, 2, '2023-05-01', '08:30'),
(30, NULL, 6, '2023-05-01', '08:00'),
(31, NULL, 6, '2023-05-01', '08:30'),
(32, NULL, 6, '2023-05-01', '09:00'),
(33, NULL, 6, '2023-05-01', '09:30'),
(34, NULL, 6, '2023-05-01', '10:00'),
(35, NULL, 6, '2023-05-01', '09:30');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doc_id` int(11) NOT NULL,
  `docname` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doc_id`, `docname`, `email`, `type`) VALUES
(1, 'Dr. Hanna Yousef', 'DR.HANNA.Y@UHOSPITAL.COM', 'Dentist'),
(2, 'Dr. Yehya Salem', 'DR.YEHYA.S@UHOSPITAL.COM', 'Pediatrician'),
(3, 'Dr. Sara Alqahtani', 'DR.SARA.Q@UHOSPITAL.COM', 'Eye doctor'),
(4, 'Dr. Amal Roweily ', 'DR.AMAL.R@UHOSPITAL.COM', 'Dermatoligist'),
(5, 'Dr. Sheikha Fahad', 'DR.SHEIKHA.F@UHOSPITAL.COM', 'Cardiologist'),
(6, 'Dr. Mohannad Abdulrahman', 'DR.MOHANNAD.A@UHOSPITAL.COM', 'Dentist'),
(7, 'Hala Abdulrahman', 'DR.HALA.A@UHOSPITAL.COM', 'Eye doctor');

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

INSERT INTO `patients` (`patient_id`, `patient_name`, `age`, `phone`, `insurance`, `p_email`, `patient_pass`) VALUES
(7, 'Mohammad Abdulrahman', 25, 5783492, 'yes', 'mo.aao@gmail.com', 'mo123'),
(10, 'Talal A.', 22, 1234, 'y', '1234', '1234'),
(18, 'Sara H. ', 23, 573450, 'yes', 'sosoamazing@gmail.com', '123'),
(19, 'Fatima Abdulrahman', 24, 5612345, 'yes', 'f.a.a@outlook.com', 'ok123'),
(21, 'Khuloud Naser', 19, 5234567, 'yes', 'khuloud@gmail.com', '123'),
(22, 'Amal abdullah', 15, 55119944, 'no', 'ammal@gmail.com', '123'),
(23, 'yasmin A. ', 5, 5348765, 'no', 'yasmin.aao@outlook.com', '2838y');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
