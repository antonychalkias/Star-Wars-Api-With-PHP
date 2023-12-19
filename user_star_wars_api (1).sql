-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2023 at 05:10 PM
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
-- Database: `user_star_wars_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `planets`
--

CREATE TABLE `planets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `rotation_period` int(11) DEFAULT NULL,
  `orbital_period` int(11) DEFAULT NULL,
  `diameter` int(11) DEFAULT NULL,
  `climate` varchar(255) DEFAULT NULL,
  `gravity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `planets`
--

INSERT INTO `planets` (`id`, `user_id`, `name`, `rotation_period`, `orbital_period`, `diameter`, `climate`, `gravity`) VALUES
(1, 3, 'Orio', 24, 12, 12500, 'frozen', '1.1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(3, 'Revinianz13', 'ant.f.chlks@gmail.com', '$2y$10$FfBeSD.1TOrYEv7v9uYxFe0KT73Jc5EyOk/quyd4Z3jWC8117rl3.'),
(4, 'Revi', 'revi@gmail.com', '$2y$10$ezICryi.tJoyLuUw3WdtwOC7LkGttNzKAtMBNz3n2IrZCWSAYD0Rq'),
(5, 'Revi2', 'rena@gmail.com', '$2y$10$X92I9mG3nFpdqpHDtMMewO1HM/vafhgUMFPSD4np/Z62as9y.6KFu'),
(6, 'Revi23', 'rena23@gmail.com', '$2y$10$5v7FXxiZG6ToKbTcyS4JduNmlI.mxQUa1mXE78s5nKr7.ATuFpxmy'),
(7, 'Revinianz1312312', 'ant1231231231.f.chlks@gmail.com', '$2y$10$fzdCpkWI8UBXRvhkfoo/JuNOvk8jUdqRTSzsc06xypmMV7zDQSoya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `planets`
--
ALTER TABLE `planets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_email` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `planets`
--
ALTER TABLE `planets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `planets`
--
ALTER TABLE `planets`
  ADD CONSTRAINT `planets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
