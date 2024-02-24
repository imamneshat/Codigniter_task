-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 21, 2024 at 02:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `records`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `productno` varchar(300) NOT NULL,
  `details` longtext NOT NULL,
  `price` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `status` int(4) NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `name`, `productno`, `details`, `price`, `image`, `status`, `CreateDate`) VALUES
(1, 'jdckjdnc', 'jkjcnkj', 'jbjede', '900', '1708503470.jpg', 1, '2024-02-21 13:47:50'),
(5, 'Cake', 'C5565', 'Cake red', '670', '1708510824.jpg', 1, '2024-02-21 15:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `sc_id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `marks` varchar(500) NOT NULL,
  `status` int(4) NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`sc_id`, `student`, `subject`, `marks`, `status`, `createDate`) VALUES
(1, 1, 2, '40', 1, '2024-01-26 02:47:57'),
(2, 4, 4, '45', 1, '2024-01-26 03:02:59'),
(4, 4, 2, '38', 1, '2024-01-26 03:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `address` longtext NOT NULL,
  `dob` datetime DEFAULT NULL,
  `status` int(4) NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `name`, `email`, `address`, `dob`, `status`, `createDate`) VALUES
(1, 'Dhiraj singh', 'dhiraj123@gmail.com', 'New Ashok nagar B4 2nd floor , Abhilash Nahar, New delhi', '1998-10-14 00:00:00', 1, '2024-01-26 02:16:42'),
(4, 'Jiya Kaur', 'jiya123@gmail.com', 'Preet Vihar 23B01 Mumbai', '2002-05-20 00:00:00', 0, '2024-01-26 03:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(11) NOT NULL,
  `sname` varchar(500) NOT NULL,
  `s_id` int(11) NOT NULL,
  `max_marks` varchar(500) NOT NULL,
  `status` int(4) NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sname`, `s_id`, `max_marks`, `status`, `createDate`) VALUES
(2, 'English', 1, '50', 1, '2024-01-26 02:38:27'),
(4, 'Hindi', 4, '50', 1, '2024-01-26 03:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` varchar(500) NOT NULL,
  `status` int(4) NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `email`, `password`, `role`, `status`, `createDate`) VALUES
(1, 'Neshat', 'neshat123@gmail.com', 'efa82aa268cca1877cf6f59cf3606032', 'SuperAdmin', 2, '2024-01-25 23:45:30'),
(2, 'Arun', 'arun123@gmail.com', 'dc483e80a7a0bd9ef71d8cf973673924', 'Admin', 1, '2024-01-25 23:56:57'),
(3, 'Arun', 'arun123@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, '2024-01-25 23:57:00'),
(4, 'wwww', 'arun@123gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, '2024-01-26 00:03:21'),
(5, 'Ajit', 'ajit123@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, '2024-01-26 00:10:43'),
(6, 'qowwo', 'Nwwi@ji.com', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, '2024-01-26 00:32:06'),
(7, 'qowwo', 'Nwwi@ji.com', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, '2024-01-26 00:33:01'),
(8, 'qowwo', 'Nwwi@ji.com', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, '2024-01-26 00:33:39'),
(9, 'qww', 'iioii@oi.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Admin', 0, '2024-01-26 00:42:16'),
(10, 'qww', 'iioii@oi.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Admin', 0, '2024-01-26 00:54:36'),
(11, 'Jigar', 'jigar123@gmail.com', 'd4743b6ab72f17efad97f445f4bbbe55', 'SuperAdmin\r\n', 2, '2024-01-26 00:55:08'),
(12, 'Jigar', 'jigar123@gmail.com', 'd4743b6ab72f17efad97f445f4bbbe55', 'Admin', 0, '2024-01-26 00:56:39'),
(13, 'Jigar', 'jigar123@gmail.com', 'd4743b6ab72f17efad97f445f4bbbe55', 'Admin', 0, '2024-01-26 00:57:08'),
(14, 'Jigar', 'jigar123@gmail.com', 'd4743b6ab72f17efad97f445f4bbbe55', 'Admin', 0, '2024-01-26 00:59:17'),
(15, 'Jigar', 'jigar123@gmail.com', 'd4743b6ab72f17efad97f445f4bbbe55', 'Admin', 0, '2024-01-26 01:01:56'),
(16, 'Jigar', 'jigar123@gmail.com', 'd4743b6ab72f17efad97f445f4bbbe55', 'Admin', 0, '2024-01-26 01:02:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
