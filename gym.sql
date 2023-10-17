-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 06:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `member_firstname` varchar(20) NOT NULL,
  `member_lastname` varchar(20) NOT NULL,
  `telephone` varchar(14) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `joining_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_of_membership` date NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_firstname`, `member_lastname`, `telephone`, `email`, `password`, `age`, `gender`, `joining_date`, `end_of_membership`, `type_id`) VALUES
(16, 'Drin', 'Jetullahu', '044121211', 'drin@gmail.com', '123456', 21, 'male', '2023-09-01 00:00:00', '2023-10-01', 5),
(25, 'First', 'First', '049111111', 'first@gmail.com', '123456', 18, 'female', '2023-10-08 00:00:00', '2023-11-08', 1),
(26, 'Second', 'Second', '044222222', 'second@gmail.com', '123456', 20, 'female', '2023-10-08 00:00:00', '2024-01-08', 2),
(27, 'Third', 'Third', '049116444', 'third@gmail.com', '123456', 23, 'male', '2023-10-19 00:00:00', '2024-04-19', 3),
(28, 'Fourth', 'Fourth', '049112233', 'fourth@gmail.com', '123456', 29, 'female', '2023-10-26 00:00:00', '2024-10-26', 4),
(29, 'Fifth', 'Fifth', '049111222', 'fifth@gmail.com', '123456', 38, 'female', '2023-11-10 00:00:00', '2023-12-10', 5),
(30, 'Aksa', 'Jetullahu', '049113344', 'aksa@gmail.com', '123456', 30, 'female', '2023-10-06 00:00:00', '2023-11-06', 5);

-- --------------------------------------------------------

--
-- Table structure for table `membershiptype`
--

CREATE TABLE `membershiptype` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(15) NOT NULL,
  `membership_period` varchar(15) NOT NULL,
  `membership_fee` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_description` varchar(100) NOT NULL,
  `membership_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `membershiptype`
--

INSERT INTO `membershiptype` (`type_id`, `type_name`, `membership_period`, `membership_fee`, `user_id`, `type_description`, `membership_type`) VALUES
(1, '1 month', '1', 30, 3, 'Unlimited access to all equipments!', 'monthly'),
(2, '3 months', '3', 50, 1, 'Unlimited access to all equipments!', 'monthly'),
(3, '6 months', '6', 150, 1, 'Unlimited access to all equipments!', 'monthly'),
(4, '1 year', '12', 200, 3, 'Unlimited access to all equipments!', 'monthly'),
(5, 'Personal plan', '1', 100, 4, 'Get a personal plan and trainer!', 'plan');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `member_id`, `amount`, `payment_date`) VALUES
(2, 16, 100, '2023-08-18 00:00:00'),
(7, 25, 30, '2023-09-02 00:00:00'),
(8, 26, 50, '2023-09-02 00:00:00'),
(9, 27, 150, '2023-09-02 00:00:00'),
(10, 28, 200, '2023-09-02 00:00:00'),
(11, 29, 100, '2023-09-02 00:00:00'),
(12, 30, 100, '2023-09-02 00:00:00'),
(13, 25, 50, '0000-00-00 00:00:00'),
(14, 25, 50, '2023-09-03 00:00:00'),
(15, 25, 30, '2023-09-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `trainer_id` int(11) NOT NULL,
  `trainer_firstname` varchar(30) NOT NULL,
  `trainer_lastname` varchar(30) NOT NULL,
  `telephone` varchar(14) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`trainer_id`, `trainer_firstname`, `trainer_lastname`, `telephone`, `email`, `password`, `user_id`) VALUES
(1, 'Geta', 'Beqa', '044444444', 'getabeqa@gmail.com', '123456', 3),
(2, 'Donjeta', 'Smajli', '044123456', 'donjetasmajli@gmail.com', '123456', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(30) NOT NULL,
  `user_lastname` varchar(30) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `telephone`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'Admin', '044111222', 'adminadmin@gmail.com', '123456', 1),
(3, 'Besnik', 'Shatri', '048989889', 'besniksh@hotmail.com', '123456', 0),
(4, 'Mirhan', 'Thaqi', '04598988', 'mirhan@gmail.com', '123456', 0),
(5, 'Besnik', 'Jashari', '043489888', 'besnikj@hotmail.com', '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `workoutplan`
--

CREATE TABLE `workoutplan` (
  `plan_id` int(11) NOT NULL,
  `workout_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `member_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `workoutplan`
--

INSERT INTO `workoutplan` (`plan_id`, `workout_date`, `start_time`, `end_time`, `member_id`, `trainer_id`, `workout_id`) VALUES
(9, '2023-09-02', '11:00:00', '12:35:00', 16, 1, 3),
(10, '2023-09-04', '11:10:00', '12:30:00', 16, 1, 4),
(14, '2023-09-23', '18:40:00', '20:00:00', 29, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE `workouts` (
  `workout_id` int(11) NOT NULL,
  `workout_name` varchar(25) NOT NULL,
  `workout_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `workouts`
--

INSERT INTO `workouts` (`workout_id`, `workout_name`, `workout_description`) VALUES
(1, 'Legs and Shoulders', 'With bodyweights.'),
(2, 'Chest and Core', '4x4 series for each'),
(3, 'Cardio', 'Mixed with fullbody'),
(4, 'Back and Chest', '3x4 series for each');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `membershiptype`
--
ALTER TABLE `membershiptype`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`trainer_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `workoutplan`
--
ALTER TABLE `workoutplan`
  ADD PRIMARY KEY (`plan_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `trainer_id` (`trainer_id`),
  ADD KEY `workout_id` (`workout_id`);

--
-- Indexes for table `workouts`
--
ALTER TABLE `workouts`
  ADD PRIMARY KEY (`workout_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `membershiptype`
--
ALTER TABLE `membershiptype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `workoutplan`
--
ALTER TABLE `workoutplan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `workouts`
--
ALTER TABLE `workouts`
  MODIFY `workout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `membershiptype` (`type_id`) ON UPDATE CASCADE;

--
-- Constraints for table `membershiptype`
--
ALTER TABLE `membershiptype`
  ADD CONSTRAINT `membershiptype_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON UPDATE CASCADE;

--
-- Constraints for table `trainers`
--
ALTER TABLE `trainers`
  ADD CONSTRAINT `trainers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `workoutplan`
--
ALTER TABLE `workoutplan`
  ADD CONSTRAINT `workoutplan_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `workoutplan_ibfk_2` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`trainer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `workoutplan_ibfk_3` FOREIGN KEY (`workout_id`) REFERENCES `workouts` (`workout_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
