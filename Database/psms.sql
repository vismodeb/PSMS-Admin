-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 09:24 AM
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
-- Database: `psms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'admin', 'admin', '8cb2237d0679ca88db6464eac60da96345513964');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `subjects` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`, `start_date`, `end_date`, `subjects`, `created_at`) VALUES
(1, 'Class 1st', '2023-01-01', '2024-01-01', '[\"6\",\"8\",\"10\"]', '2023-08-11 18:50:31'),
(2, 'Class - 8', '2023-01-01', '2024-01-01', '[\"7\",\"8\",\"10\"]', '2023-08-11 18:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `dt_password` varchar(200) NOT NULL,
  `roll` int(100) DEFAULT NULL,
  `currend_class` int(11) DEFAULT NULL,
  `registration_date` datetime DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `mobile`, `father_name`, `mother_name`, `address`, `birthday`, `gender`, `dt_password`, `roll`, `currend_class`, `registration_date`, `photo`) VALUES
(19, 'Dipu roy', 'dipu@gmail.com', '01737350000', 'Joges', 'mina', 'Dinajpur', '2023-08-25', 'Male', '8cb2237d0679ca88db6464eac60da96345513964', 0, 0, '2023-08-01 09:10:56', 'assets/images/students/user_id_19.jpg'),
(20, 'Jotis roy', 'jotis@gmail.com', '01737300000', 'Debaru roy', 'Mitoni rany', 'panchagarh', '2023-08-17', 'Male', '8cb2237d0679ca88db6464eac60da96345513964', NULL, NULL, '2023-08-08 02:19:13', NULL),
(21, 'vismo dev', 'vismodev@gmail.com', '01700000000', 'Dipal', 'mina', 'Boda, Panchagarh', '2023-08-14', 'Male', '8cb2237d0679ca88db6464eac60da96345513964', 0, 0, '2023-08-11 05:13:26', NULL),
(22, 'Rahul', 'rahulroy@gmail.com', '01737000000', 'Modhu', 'Diya rani', 'Thakurgaon', '2023-08-14', 'Male', '8cb2237d0679ca88db6464eac60da96345513964', NULL, NULL, '2023-08-11 05:15:07', NULL),
(23, 'Kamini Roy', 'kamini@gamil.com', '01700350000', 'Vupen Roy', 'Sinoti rani', 'Pirgong', '2023-08-22', 'Male', '8cb2237d0679ca88db6464eac60da96345513964', NULL, NULL, '2023-08-11 05:16:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `type` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `code`, `type`, `created_at`) VALUES
(6, 'Bangla 1st part', '101', 'Theory', '2023-08-11 10:28:21'),
(7, 'Bangla 2nd Part', '102', 'Theory', '2023-08-11 10:39:58'),
(8, 'English First Part', '201', 'Theory', '2023-08-11 11:05:15'),
(9, 'English Secente Part', '202', 'Theory', '2023-08-11 11:05:40'),
(10, 'Math', '150', 'Theory', '2023-08-11 11:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `mobile`, `address`, `gender`, `password`, `created_at`) VALUES
(1, 'Vismo Dev', 'vismo@gmail.com', '01737351549', 'Panchagarh', 'Male', '8cb2237d0679ca88db6464eac60da96345513964', '2007-08-23 23:35:41'),
(2, 'Uttom', 'uttom@gamil.com', '01737351549', 'Thakurgaon', 'Male', '356a192b7913b04c54574d18c28d46e6395428ab', '2007-08-23 23:37:47'),
(3, 'Utpol Adhikari', 'utpol@gmail.com', '01737351540', 'Thankurgaon', 'Male', '8cb2237d0679ca88db6464eac60da96345513964', '2008-08-23 00:48:11'),
(4, 'Emon khan', 'emon@gmail.com', '01737351500', 'Thankurgaon', 'Male', '8cb2237d0679ca88db6464eac60da96345513964', '2008-08-23 01:18:10'),
(5, 'Sumon Ismlam', 'sumon@gmail.com', '01737350049', 'Panchagarh', 'Male', '8cb2237d0679ca88db6464eac60da96345513964', '2008-08-23 14:24:57'),
(8, 'Riya Rani', 'riya@gmail.com', '01730351549', 'Debigong', 'Female', '8cb2237d0679ca88db6464eac60da96345513964', '2009-08-23 10:52:46'),
(9, 'Diya Rani', 'diyarany@gmail.com', '01700000000', 'Pirgong, Thakurgaon', 'Female', '8cb2237d0679ca88db6464eac60da96345513964', '2011-08-23 17:09:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
