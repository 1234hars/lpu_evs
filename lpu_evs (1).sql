-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 01:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lpu_evs`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) DEFAULT NULL,
  `passenger_username` varchar(100) DEFAULT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `trip_id`, `passenger_username`, `seats`) VALUES
(6, 6, 'Aman jain', 2),
(7, 6, 'Aman jain', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `start_location` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `available_seats` int(11) NOT NULL,
  `price_per_seat` decimal(10,2) NOT NULL,
  `driver_username` varchar(100) DEFAULT NULL,
  `vehicle_number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `start_location`, `destination`, `date`, `time`, `available_seats`, `price_per_seat`, `driver_username`, `vehicle_number`) VALUES
(6, 'block 5', 'block 55', '2024-10-21', '08:30:00', 2, 20.00, 'Amanjain', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` enum('user','driver') DEFAULT NULL,
  `vehicle_number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `usertype`, `vehicle_number`) VALUES
(1, 'Aman jain', 'jaman0961@gmail.com', '$2y$10$12YQU7BWZH3jKQHnZncHye.0p.HowhXk6miDh5KT72d6ARmhD8nDC', 'user', NULL),
(6, 'Harsh kumar', 'jaman091@gmail.com', '$2y$10$ZhC174adB7USo8OaU2C/5uUomAWTae2nRVc6eXQHNvF65PbodyBMu', 'user', NULL),
(9, 'Yash', 'harsh123@gmail.com', '$2y$10$4yq7avEAQWLQ8NP1xZAs7eIBOu2yyb6setU9JlcxzDZvnT9H0JZYu', 'driver', NULL),
(10, 'Yash dalla', 'yash123@gmail.com', '$2y$10$WRNjBdfZuzGJ6F.Tn3oOAO6tOuV9gQAzJj8/5/CNQ5thqTYmRMMvS', 'driver', NULL),
(11, 'Amanjain', 'jaman5656@gmail.com', '$2y$10$yvLyjxzmxWTpORfxmIUlOuuAb5hosybKHupd.D4giu8wAYm6hIYiK', 'driver', '20'),
(12, 'harsh20', 'jaman61@gmail.com', '$2y$10$V8sa4z7vGCjxOAjm8KHXgehz3zMUs8KfvhSU.ZZSH9JGn33mUgOeG', 'driver', '15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trip_id` (`trip_id`),
  ADD KEY `passenger_username` (`passenger_username`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_username` (`driver_username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`passenger_username`) REFERENCES `users` (`username`);

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`driver_username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
