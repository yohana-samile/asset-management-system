-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2023 at 05:27 PM
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
(2, 'furnitures', 1, '2023-03-28 17:14:33', '0000-00-00 00:00:00'),
(3, 'computer', 1, '2023-05-31 21:43:52', '0000-00-00 00:00:00');

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
(1, 18, 2, 10, 'Returned', '2023-06-03 14:01:34', '2023-06-03 14:06:52'),
(2, 18, 3, 0, 'pending', '2023-06-03 14:22:11', '0000-00-00 00:00:00'),
(3, 18, 4, 1, 'accepted', '2023-05-31 22:04:31', '0000-00-00 00:00:00');

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
  `ramSize` varchar(30) NOT NULL DEFAULT '-',
  `diskSize` varchar(30) NOT NULL DEFAULT '-',
  `proccessorSpeed` varchar(30) NOT NULL DEFAULT '-',
  `registered_by` int(11) NOT NULL,
  `whichCategory` int(11) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset_managed`
--

INSERT INTO `asset_managed` (`asset_id`, `asset_name`, `asset_discription`, `brande_name`, `quantity`, `ramSize`, `diskSize`, `proccessorSpeed`, `registered_by`, `whichCategory`, `date_registered`, `date_modified`) VALUES
(2, 'office chair', '', 'no brand', 4, '-', '-', '-', 1, 2, '2023-03-29 15:14:08', '0000-00-00 00:00:00'),
(3, 'projector', 'no description for this projector', 'hp', 3, '-', '-', '-', 1, 1, '2023-05-31 21:41:49', '0000-00-00 00:00:00'),
(4, 'dell', 'no description about dell', 'dell', 2, '4gb', '500gb', '2.8ghz', 1, 3, '2023-05-31 21:54:43', '0000-00-00 00:00:00');

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
(29, 'logout', '2023-05-12 05:18:22', 1),
(30, 'login', '2023-05-12 07:16:09', 18),
(31, 'so', '2023-05-12 07:16:21', 18),
(32, 'Borrow Asset', '2023-05-12 07:16:25', 18),
(33, 'logout', '2023-05-12 07:16:37', 18),
(34, 'login', '2023-05-22 13:23:36', 18),
(35, 'logout', '2023-05-22 13:24:52', 18),
(36, 'login', '2023-05-22 13:25:47', 1),
(37, 'Delete Asset', '2023-05-22 14:27:25', 1),
(38, 'logout', '2023-05-22 13:49:00', 1),
(39, 'login', '2023-05-23 04:55:16', 1),
(40, 'logout', '2023-05-23 04:55:35', 1),
(41, 'login', '2023-05-30 21:19:32', 18),
(42, 'logout', '2023-05-30 21:20:38', 18),
(43, 'login', '2023-05-31 06:41:41', 18),
(44, 'logout', '2023-05-31 06:45:17', 18),
(45, 'login', '2023-05-31 06:45:24', 1),
(46, 'logout', '2023-05-31 06:46:52', 1),
(47, 'login', '2023-05-31 06:46:58', 18),
(48, 'logout', '2023-05-31 07:35:08', 18),
(49, 'login', '2023-05-31 07:35:17', 1),
(50, 'logout', '2023-05-31 07:43:13', 1),
(51, 'login', '2023-05-31 07:44:21', 18),
(52, 'logout', '2023-05-31 07:55:41', 18),
(53, 'login', '2023-05-31 07:55:48', 1),
(54, 'Deny Asset Request', '2023-05-31 08:55:58', 1),
(55, 'logout', '2023-05-31 10:22:00', 1),
(56, 'login', '2023-05-31 21:14:21', 18),
(57, 'logout', '2023-05-31 21:14:43', 18),
(58, 'login', '2023-05-31 21:14:52', 1),
(59, 'Register New Asset', '2023-05-31 21:41:49', 1),
(60, 'Register Category', '2023-05-31 21:43:52', 1),
(61, 'Register New Asset', '2023-05-31 21:54:43', 1),
(62, 'logout', '2023-05-31 22:01:48', 1),
(63, 'login', '2023-05-31 22:02:04', 18),
(64, 'Borrow Asset', '2023-05-31 22:04:31', 18),
(65, 'logout', '2023-05-31 22:08:03', 18),
(66, 'login', '2023-06-02 11:35:54', 1),
(67, 'logout', '2023-06-02 11:57:04', 1),
(68, 'login', '2023-06-03 13:46:46', 18),
(69, 'Borrow Asset', '2023-06-03 14:01:34', 18),
(70, 'logout', '2023-06-03 14:04:48', 18),
(71, 'login', '2023-06-03 14:04:54', 1),
(72, 'Accept Asset Request', '2023-06-03 15:05:06', 1),
(73, 'Accept Asset Request', '2023-06-03 15:05:08', 1),
(74, 'logout', '2023-06-03 14:05:32', 1),
(75, 'login', '2023-06-03 14:05:39', 18),
(76, 'Return Asset', '2023-06-03 14:06:52', 18),
(77, 'Borrow Asset', '2023-06-03 14:22:11', 18),
(78, 'logout', '2023-06-03 14:26:14', 18),
(79, 'login', '2023-06-03 14:26:34', 1),
(80, 'logout', '2023-06-03 14:26:58', 1);

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
(5, 18, 'system testing', '2023-03-29 17:58:41'),
(6, 18, 'so', '2023-05-12 07:16:21');

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
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assetissued`
--
ALTER TABLE `assetissued`
  MODIFY `issuedId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `asset_managed`
--
ALTER TABLE `asset_managed`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `useropinion`
--
ALTER TABLE `useropinion`
  MODIFY `oId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
