-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 08:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `assetcategory`
--

CREATE TABLE `assetcategory` (
  `categoryId` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assetcategory`
--

INSERT INTO `assetcategory` (`categoryId`, `category_name`, `addedBy`, `time_added`, `time_modified`) VALUES
(1, 'projector', 1, '2023-03-23 04:44:40', '0000-00-00 00:00:00'),
(2, 'furnitures', 1, '2023-03-28 17:14:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `assetissued`
--

CREATE TABLE `assetissued` (
  `issuedId` int(11) NOT NULL,
  `whoBorrow` int(11) NOT NULL DEFAULT 0,
  `assetBorrowed` int(11) NOT NULL,
  `assetQuantity` int(11) NOT NULL,
  `requestStatusResult` varchar(100) NOT NULL,
  `timeBorrowed` timestamp NOT NULL DEFAULT current_timestamp(),
  `timeReturned` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assetissued`
--

INSERT INTO `assetissued` (`issuedId`, `whoBorrow`, `assetBorrowed`, `assetQuantity`, `requestStatusResult`, `timeBorrowed`, `timeReturned`) VALUES
(1, 18, 2, 11, 'Returned', '2023-03-29 17:20:12', '2023-03-29 17:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `asset_managed`
--

CREATE TABLE `asset_managed` (
  `asset_id` int(11) NOT NULL,
  `asset_name` text NOT NULL,
  `asset_discription` text NOT NULL,
  `brande_name` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `registered_by` int(11) NOT NULL,
  `whichCategory` int(11) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset_managed`
--

INSERT INTO `asset_managed` (`asset_id`, `asset_name`, `asset_discription`, `brande_name`, `quantity`, `registered_by`, `whichCategory`, `date_registered`, `date_modified`) VALUES
(1, 'projector', '', 'hp', 20, 1, 1, '2023-03-29 15:10:59', '0000-00-00 00:00:00'),
(2, 'office chair', '', 'no brand', 5, 1, 2, '2023-03-29 15:14:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentId` int(11) NOT NULL,
  `departmentName` text NOT NULL,
  `addedBy` int(11) NOT NULL,
  `timeAdded` timestamp NOT NULL DEFAULT current_timestamp(),
  `timeModified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentId`, `departmentName`, `addedBy`, `timeAdded`, `timeModified`) VALUES
(1, 'IT', 1, '2023-03-29 08:12:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `role` int(11) NOT NULL,
  `registered_by` int(11) NOT NULL,
  `whichDepartment` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `email`, `gender`, `role`, `registered_by`, `whichDepartment`, `password`, `date_registered`, `date_modified`) VALUES
(18, 'alice', 'samile', 'alicesamile@gmail.com', 'male', 2, 1, 1, '1234', '2023-03-23 04:27:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `time_registered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`admin_id`, `first_name`, `last_name`, `email`, `role`, `password`, `time_registered`) VALUES
(1, 'king', 'samile', 'samileking9@gmail.com', 1, '1234', '2023-03-20 11:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `system_logs`
--

CREATE TABLE `system_logs` (
  `log_id` int(11) NOT NULL,
  `action_performed` text NOT NULL,
  `time_performed` timestamp NOT NULL DEFAULT current_timestamp(),
  `performed_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_logs`
--

INSERT INTO `system_logs` (`log_id`, `action_performed`, `time_performed`, `performed_by`) VALUES
(1, 'Borrow Asset', '2023-03-29 17:20:12', 18),
(8, 'Return Asset', '2023-03-29 17:27:28', 18),
(9, 'Sending Coment', '2023-03-29 17:29:24', 18),
(10, 'login', '2023-03-29 17:34:10', 18),
(11, 'login', '2023-03-29 17:39:39', 18),
(12, 'login', '2023-03-29 17:40:20', 18),
(13, 'logout', '0000-00-00 00:00:00', 18),
(14, 'login', '2023-03-29 17:40:54', 18),
(15, 'logout', '2023-03-29 17:49:11', 18),
(16, 'login', '2023-03-29 17:49:24', 18),
(17, 'logout', '2023-03-29 17:49:45', 18),
(18, 'login', '2023-03-29 17:56:42', 18),
(19, '', '2023-03-29 17:56:50', 18),
(20, 'trying', '2023-03-29 17:58:22', 18),
(21, 'system testing', '2023-03-29 17:58:41', 18),
(22, 'logout', '2023-03-29 17:59:18', 18),
(23, 'login', '2023-05-06 18:51:23', 18),
(24, 'logout', '2023-05-06 18:51:46', 18),
(25, 'login', '2023-05-12 04:44:26', 18),
(26, 'logout', '2023-05-12 05:12:42', 18),
(28, 'login', '2023-05-12 05:17:40', 1),
(29, 'logout', '2023-05-12 05:18:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `useropinion`
--

CREATE TABLE `useropinion` (
  `oId` int(11) NOT NULL,
  `whoSend` int(11) NOT NULL,
  `userComent` text NOT NULL,
  `timeSent` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useropinion`
--

INSERT INTO `useropinion` (`oId`, `whoSend`, `userComent`, `timeSent`) VALUES
(4, 18, 'trying', '2023-03-29 17:58:22'),
(5, 18, 'system testing', '2023-03-29 17:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`, `date_registered`) VALUES
(1, 'admin', '2023-03-20 11:42:37'),
(2, 'employee', '2023-03-23 06:26:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assetcategory`
--
ALTER TABLE `assetcategory`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `addedBy` (`addedBy`);

--
-- Indexes for table `assetissued`
--
ALTER TABLE `assetissued`
  ADD PRIMARY KEY (`issuedId`),
  ADD KEY `assetBorrowed` (`assetBorrowed`);

--
-- Indexes for table `asset_managed`
--
ALTER TABLE `asset_managed`
  ADD PRIMARY KEY (`asset_id`),
  ADD KEY `registered_by` (`registered_by`),
  ADD KEY `whichCategory` (`whichCategory`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentId`),
  ADD KEY `addedBy` (`addedBy`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `role` (`role`),
  ADD KEY `registered_by` (`registered_by`),
  ADD KEY `whichDepartment` (`whichDepartment`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `system_logs`
--
ALTER TABLE `system_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `performed_by` (`performed_by`);

--
-- Indexes for table `useropinion`
--
ALTER TABLE `useropinion`
  ADD PRIMARY KEY (`oId`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assetcategory`
--
ALTER TABLE `assetcategory`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assetissued`
--
ALTER TABLE `assetissued`
  MODIFY `issuedId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `asset_managed`
--
ALTER TABLE `asset_managed`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_logs`
--
ALTER TABLE `system_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `useropinion`
--
ALTER TABLE `useropinion`
  MODIFY `oId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
