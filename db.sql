-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 11:34 AM
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
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `siginup`
--

CREATE TABLE `siginup` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siginup`
--

INSERT INTO `siginup` (`id`, `firstname`, `lastname`, `email`, `password`, `birthdate`, `gender`, `phone`, `otp`) VALUES
(51, 'chetan', 'thakur', 'chetanpawar934193@gmail.com', '$2y$10$wW3ECvnMRcu60Q73IaWcyeHxxYcbuR8TP.pHO828si4nPYVtLWh/u', '2002-09-17', 'Male', '9351937062', ''),
(53, 'mukesh', 'joshi', 'mukesh.tech@gmail.com', '$2y$10$TsXY8O.c6XU9yDggBJnoYuVilZM/6AKtT9Cqarp1CV9s9MXphNgMm', '2002-02-17', 'Male', '9660129948', ''),
(54, 'sourabh', 'sharma', 'sourabh@gmail.com', '$2y$10$M6Y/9sDLS2RgctgO/p6ztOcL4fgIuN04kFC09252A0H5g92p7/lt2', '2024-07-26', 'Male', '8413061610', ''),
(56, 'anash', 'sharma', 'anshsha831@gmail.com', '$2y$10$6D6kfYdZrcaWJlYCRb2Y2e23o5/KiXpaJfljh3n.oqXmK/AS9xJPq', '2002-11-28', 'Male', '9045544138', ''),
(57, 'Aman', 'Singh', 'jaatbreak@gmail.com', '$2y$10$q26vgwaZm9nnfHYTcByEoOcMcufsDfYhmhoYySdTI3NrxzJrFXQeu', '2001-08-18', 'Male', '8955503853', ''),
(58, 'jatin', 'singh', 'me321605@gmail.com', '$2y$10$wE7YuMdsr468n1QtTbx4AOUdfLf0/Hxb56een3j3VtC/UsMPleMV.', '2008-08-26', 'Male', '7229821469', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siginup`
--
ALTER TABLE `siginup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siginup`
--
ALTER TABLE `siginup`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
