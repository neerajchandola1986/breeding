-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 09:08 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `agency` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nwmile` int(11) DEFAULT NULL,
  `wmile` int(11) DEFAULT NULL,
  `disabled` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `agency`, `district`, `chapter`, `date`, `description`, `nwmile`, `wmile`, `disabled`, `user_id`) VALUES
(11, '1', 'Ava', 'Brownfield', '2022-01-14', '', 12, 13, 1, 1),
(12, '3', 'Cedar Creek', 'NEMO', '2022-02-23', '', 15, 15, 1, 9),
(14, '4', 'Cassville', 'Cuivre River', '2022-02-20', '', 12, 13, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `status`, `created_on`) VALUES
(1, 'BML (Bureau of Land Management)', 0, '2022-01-29 04:45:56'),
(2, 'corps  (Corps of Engineers)', 0, '0000-00-00 00:00:00'),
(3, 'fs  (US Forest Service)', 0, '0000-00-00 00:00:00'),
(4, 'katy (Katy Trail)', 0, '0000-00-00 00:00:00'),
(5, 'mocons  (Missouri Department of Conservation)', 0, '0000-00-00 00:00:00'),
(6, 'mopark (Missouri Parks Department)', 0, '0000-00-00 00:00:00'),
(7, 'nps (National Parks - ONSR)', 0, '0000-00-00 00:00:00'),
(8, 'ot  (Ozark Trail)', 0, '0000-00-00 00:00:00'),
(9, 'other (Anything that doesn\'t fit the above)', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator'),
(2, 'Customer'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `admin_email` text NOT NULL,
  `email_text` text NOT NULL,
  `sms_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `admin_email`, `email_text`, `sms_text`) VALUES
(1, 'Chandola.neeraj@gmail.com', 'Thank you {{CUSTOMER_NAME}} for your Booking at \"Mahapatra Hospital \" Your Booking ID is {{BOOKING_ID}} and You are Requested to Reach our Hospital On {{BOOKING_DATE}}(8am - 9am). \r\n\r\nClick the link Below to Locate us on Map :\r\nhttps://g.page/mahapatra-hospital\r\n', '{{CUSTOMER_NAME}} your Booking Id is {{BOOKING_ID}}  on {{BOOKING_DATE}}(8 am - 9 am). Location map: https://g.page/mahapatra-hospital');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `last_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `address` text DEFAULT NULL,
  `nora_account_id` varchar(255) DEFAULT NULL,
  `nora_userName` varchar(255) DEFAULT NULL,
  `nora_password` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `buisness_name` varchar(255) DEFAULT NULL,
  `suburb` varchar(100) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `state_name` varchar(255) DEFAULT NULL,
  `nora_activationCodeId` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `last_name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`, `address`, `nora_account_id`, `nora_userName`, `nora_password`, `dob`, `buisness_name`, `suburb`, `postcode`, `state_name`, `nora_activationCodeId`) VALUES
(1, 'admin@admin.com', 'MTIzNDU2', 'Administrator', NULL, '111111111', 1, 0, 0, '2015-07-01 18:56:49', 1, '2021-09-23 05:06:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'staff1@staff1.com', 'MTIzNDU2', 'sfdfsd', 'Ray', '4086411365', 3, 0, 1, '2022-01-29 14:36:56', 1, '2022-02-14 03:24:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'chandola.neeraj@vvvvgmail.com', 'MTMzOTkw', 'Vvvv', 'Vvvv', '9452299320', 3, 0, 1, '2022-08-07 14:23:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `v_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `tbas` int(11) DEFAULT NULL,
  `tskl` int(11) DEFAULT NULL,
  `ntwork` int(11) DEFAULT NULL,
  `trtime` int(11) DEFAULT NULL,
  `tmile` int(11) DEFAULT NULL,
  `peq` int(11) DEFAULT NULL,
  `heq` int(11) DEFAULT NULL,
  `stkdays` int(11) DEFAULT NULL,
  `donate` int(11) DEFAULT NULL,
  `idesc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eth` int(11) DEFAULT NULL,
  `disabled` int(2) NOT NULL,
  `p_id` int(11) NOT NULL,
  `v_fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`v_id`, `date`, `tbas`, `tskl`, `ntwork`, `trtime`, `tmile`, `peq`, `heq`, `stkdays`, `donate`, `idesc`, `gage`, `eth`, `disabled`, `p_id`, `v_fname`, `v_lname`, `created_by`) VALUES
(1, '2022-01-14', NULL, 5, NULL, 4, NULL, 4, NULL, 2, NULL, '', 'm55', 0, 0, 11, 'vfdg', 'dgdfgfdg', 1),
(3, '2022-02-09', 1, 1, 1, 1, 1, 1, 1, 1, 1, 'gdfgfgf', 'm15', 1, 1, 12, 'bbb', 'bbb', 9),
(4, '2022-02-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 'ytutyutyuy', 'm15', 1, 1, 12, 'bbb', 'bbb', 9),
(5, '2022-02-20', 5, 5, 5, 5, 5, 5, 5, 5, 5, '5', NULL, NULL, 0, 14, 'bbb', 'bbb', 9),
(6, '2022-02-20', 5, 5, 5, 5, 5, 5, 5, 5, 5, '5', NULL, NULL, 0, 14, 'ccc', 'cccc', 9),
(7, '2022-01-14', 7, 7, 7, 7, 7, 7, 7, 7, 7, '7', NULL, NULL, 0, 11, 'cvxcvv', 'xcvxcv', 1),
(8, '2022-01-14', 9, 9, 9, 9, 9, 9, 9, 9, 9, '9', NULL, NULL, 0, 11, 'cbcvbcvb', 'cvbcvbcvb', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
