-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2024 at 03:06 PM
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
-- Database: `sneat`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` int(11) NOT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `profile_img`, `firstname`, `lastname`, `email`, `password`, `mobile_number`, `created_at`, `updated_at`, `last_login`, `status`, `is_deleted`) VALUES
(1, NULL, 'Ayush', 'Kumar', 'ayush@gmail.com', '$2y$10$lFOdS5ZYYBAY9O1azx4RYeqQGEXbKFB9iDWwp6kW9Ix.j0ZK2nXo.', NULL, '2024-10-26 09:36:41', '2024-10-26 09:36:41', NULL, 1, 0),
(2, NULL, 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$bc7KInNYZUcsCGpT0JZ2/uE30HHIVhRtV7LsfPCtcvs5k1Gua7KBW', NULL, '2024-10-26 10:14:39', '2024-10-26 10:14:39', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `programming_languages`
--

CREATE TABLE `programming_languages` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programming_languages`
--

INSERT INTO `programming_languages` (`language_id`, `language_name`, `created_at`, `updated_at`, `status`, `is_deleted`) VALUES
(1, 'Java', '2024-10-26 11:42:01', '2024-10-26 11:42:01', 1, 0),
(2, 'C++', '2024-10-26 11:42:01', '2024-10-26 11:42:01', 1, 0),
(3, 'Python', '2024-10-26 11:42:01', '2024-10-26 11:42:01', 1, 0),
(4, 'JavaScript', '2024-10-26 11:42:01', '2024-10-26 11:42:01', 1, 0),
(5, 'Ruby', '2024-10-26 11:42:01', '2024-10-26 11:42:01', 1, 0),
(6, 'PHP', '2024-10-26 11:42:01', '2024-10-26 11:42:01', 1, 0),
(7, 'C#', '2024-10-26 11:42:01', '2024-10-26 11:42:01', 1, 0),
(8, 'Go', '2024-10-26 11:42:01', '2024-10-26 11:42:01', 1, 0),
(9, 'Swift', '2024-10-26 11:42:01', '2024-10-26 11:42:01', 1, 0),
(10, 'Rust', '2024-10-26 11:42:01', '2024-10-26 11:42:01', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `programming_languages`
--
ALTER TABLE `programming_languages`
  ADD PRIMARY KEY (`language_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `programming_languages`
--
ALTER TABLE `programming_languages`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
