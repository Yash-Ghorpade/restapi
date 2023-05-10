-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 10, 2023 at 08:21 PM
-- Server version: 10.6.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u454525515_restapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendanceinfo`
--

CREATE TABLE `attendanceinfo` (
  `info_srno` int(11) NOT NULL,
  `attendance_name` varchar(20) NOT NULL,
  `info_date` date NOT NULL,
  `info_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventattendances`
--

CREATE TABLE `eventattendances` (
  `attendance_srno` int(11) NOT NULL,
  `user_srno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_srno` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_location` varchar(50) NOT NULL,
  `event_fee` int(8) NOT NULL,
  `event_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `login_srno` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_srno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`login_srno`, `username`, `password`, `user_srno`) VALUES
(1, 'admin@gmail.com', 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meetattendances`
--

CREATE TABLE `meetattendances` (
  `meet_srno` int(11) NOT NULL,
  `user_srno` int(11) NOT NULL,
  `meeting_srno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `meeting_srno` int(11) NOT NULL,
  `meeting_location` varchar(40) NOT NULL,
  `meeting_date` date NOT NULL,
  `meeting_time` time NOT NULL,
  `meeting_agenda` varchar(400) NOT NULL,
  `meeting_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `registration_srno` int(11) NOT NULL,
  `user_srno` int(11) NOT NULL,
  `event_srno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_srno` int(12) NOT NULL,
  `contact` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_role` char(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `face_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`face_value`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_srno`, `contact`, `email`, `user_role`, `name`, `face_value`) VALUES
(1, 97634523, 'admin@gmail.com', 'a', 'Admin', '0'),
(2, 123345, 'siddhi@gmail.com', 'p', 'Piddhi', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendanceinfo`
--
ALTER TABLE `attendanceinfo`
  ADD PRIMARY KEY (`info_srno`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_srno`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`login_srno`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_srno` (`user_srno`);

--
-- Indexes for table `meetattendances`
--
ALTER TABLE `meetattendances`
  ADD PRIMARY KEY (`meet_srno`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`meeting_srno`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`registration_srno`),
  ADD KEY `user_srno` (`user_srno`),
  ADD KEY `event_srno` (`event_srno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_srno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendanceinfo`
--
ALTER TABLE `attendanceinfo`
  MODIFY `info_srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `login_srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meetattendances`
--
ALTER TABLE `meetattendances`
  MODIFY `meet_srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `meeting_srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `registration_srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_srno` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `logins_ibfk_1` FOREIGN KEY (`user_srno`) REFERENCES `users` (`user_srno`) ON DELETE CASCADE;

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_3` FOREIGN KEY (`user_srno`) REFERENCES `users` (`user_srno`),
  ADD CONSTRAINT `registrations_ibfk_4` FOREIGN KEY (`event_srno`) REFERENCES `events` (`event_srno`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
