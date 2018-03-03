-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2018 at 12:22 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clean`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `propertyId` int(11) NOT NULL DEFAULT '0' COMMENT '0: Not Updated,Other : 1,2,3 and so on',
  `bedroomsCount` int(11) NOT NULL DEFAULT '0' COMMENT '0: Not Updated,Other : 1,2,3 and so on',
  `currentAddress` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`id`, `userId`, `propertyId`, `bedroomsCount`, `currentAddress`, `status`) VALUES
(16, 0, 0, 0, 'Noida', 1),
(17, 0, 0, 0, 'Delhi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admins`
--

CREATE TABLE `tbl_admins` (
  `id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `mailId` varchar(500) NOT NULL,
  `password` varchar(300) NOT NULL,
  `image` varchar(255) NOT NULL,
  `roleId` int(11) NOT NULL DEFAULT '3' COMMENT '1:admin,2:User,3:Cleaner',
  `indexValue` int(1) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `createdOn` datetime NOT NULL,
  `modifiedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admins`
--

INSERT INTO `tbl_admins` (`id`, `username`, `mailId`, `password`, `image`, `roleId`, `indexValue`, `status`, `createdOn`, `modifiedOn`) VALUES
(1, 'admin', 'siya0663@gmail.com', 'bXVrZXNo', '', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'priyanka', 'priyanka@limitlessmobil.com', 'priyanka45', '', 3, 2, 1, '2015-11-03 03:11:59', '0000-00-00 00:00:00'),
(6, 'mukesh', 'mrpant90@gmail.com', 'bXVrZXNo', '', 3, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Dinesh', 'dinesh@gmail.com', 'ZGluZXNoQDEyMw==', '', 3, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Dehardun', 'dehradun@gmail.com', 'ZG9vbkAxMjM=', '', 3, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'New User', 'new_user@gmail.com', 'QWRtaW5AMTIz', '', 3, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'test user', 'siya0664@gmail.com', '12345', '', 3, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'test user', 'siya0667@gmail.com', 'MTIzNDU2', 'assets/uploads/28_download (1).png', 3, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'test user', 'siya066@gmail.com', 'bXVrZXNo', '', 3, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'aaaaa', 'rahulnakoti@gmail.com', 'rahul12345', '', 3, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'asdfdfdf', 'rahulnakotii@gmail.com', 'rahul123456', '', 2, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '', 'ra@gmail.com', 'cmFoaGhoaGhoaA==', '', 3, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '', 'rah@gmail.com', 'cmExMjM0NTY=', '', 3, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_configuration`
--

CREATE TABLE `tbl_configuration` (
  `id` int(11) NOT NULL,
  `websiteName` varchar(200) NOT NULL,
  `websiteTitle` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `fevicon` varchar(200) NOT NULL,
  `supportMailId` varchar(200) NOT NULL,
  `websiteLink` varchar(300) NOT NULL,
  `contactNumber` varchar(300) NOT NULL,
  `address` varchar(500) NOT NULL,
  `copyrightMessage` varchar(2000) NOT NULL,
  `addedOn` datetime NOT NULL,
  `editedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_configuration`
--

INSERT INTO `tbl_configuration` (`id`, `websiteName`, `websiteTitle`, `logo`, `fevicon`, `supportMailId`, `websiteLink`, `contactNumber`, `address`, `copyrightMessage`, `addedOn`, `editedOn`) VALUES
(1, 'Cleaning', 'Cleaning', 'assets/uploads/images/logo/29_dashboard.jpg', 'assets/uploads/images/logo/48_dashboard.jpg', 'Cleaning@gmail.com', 'Cleaning@gmail.com', '123456788', 'Delhi', 'Copyright  @2018  Design &amp; Developed By Cleaner.com', '0000-00-00 00:00:00', '2015-10-30 07:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discount`
--

CREATE TABLE `tbl_discount` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `amountPayable` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `minJobs` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discount`
--

INSERT INTO `tbl_discount` (`id`, `title`, `amount`, `discount`, `amountPayable`, `status`, `minJobs`) VALUES
(1, 'Test', '1000', '15', '850', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `id` int(11) NOT NULL,
  `addressId` text NOT NULL COMMENT 'comma seperated',
  `discountId` int(11) NOT NULL,
  `roomId` int(11) NOT NULL,
  `cleanAreaComment` text NOT NULL,
  `isPets` int(11) NOT NULL COMMENT '0:No.1:Yes',
  `bedroomsCount` int(11) NOT NULL,
  `roomsCount` int(11) NOT NULL,
  `kitchenCount` int(11) NOT NULL,
  `bathroomsCount` int(11) NOT NULL,
  `isLaundryForClean` int(1) NOT NULL DEFAULT '0' COMMENT '0:No, 1:Yes',
  `selectedDate` varchar(255) NOT NULL,
  `timeSlotId` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `manHour` int(11) NOT NULL,
  `cleanerId` int(11) NOT NULL,
  `payingAmount` varchar(255) NOT NULL,
  `isCompleted` int(11) NOT NULL DEFAULT '0' COMMENT '0:No,1:Yes',
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `paymentId` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `modified_on` datetime NOT NULL,
  `addressId` int(11) NOT NULL,
  `discountId` int(11) NOT NULL,
  `cleanAreaId` int(11) NOT NULL,
  `jobDateId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property`
--

CREATE TABLE `tbl_property` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_property`
--

INSERT INTO `tbl_property` (`id`, `name`, `status`) VALUES
(1, 'fghjkl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`id`, `name`, `status`) VALUES
(1, 'test room again', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time_slot`
--

CREATE TABLE `tbl_time_slot` (
  `id` int(11) NOT NULL,
  `timeFlag` varchar(10) NOT NULL DEFAULT '0' COMMENT '0:AM,1:PM',
  `time` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_time_slot`
--

INSERT INTO `tbl_time_slot` (`id`, `timeFlag`, `time`, `status`) VALUES
(1, 'AM', '10.70', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mailId` (`mailId`);

--
-- Indexes for table `tbl_configuration`
--
ALTER TABLE `tbl_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_property`
--
ALTER TABLE `tbl_property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_time_slot`
--
ALTER TABLE `tbl_time_slot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_configuration`
--
ALTER TABLE `tbl_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_property`
--
ALTER TABLE `tbl_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_time_slot`
--
ALTER TABLE `tbl_time_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
