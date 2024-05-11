-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 11:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamjaiu_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'robin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `carosal`
--

CREATE TABLE `carosal` (
  `sr_no` int(11) NOT NULL,
  `carosal_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carosal`
--

INSERT INTO `carosal` (`sr_no`, `carosal_img`) VALUES
(8, '1715231738_IMG_15372.png'),
(9, '1715231743_IMG_15372.png'),
(10, '1715231749_IMG_40905.png'),
(11, '1715231754_IMG_40905.png'),
(12, '1715231760_IMG_40905.png'),
(13, '1715231766_IMG_55677.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone_no` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `instragram` varchar(200) NOT NULL,
  `linkdin` varchar(200) NOT NULL,
  `ifram` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`sr_no`, `address`, `phone_no`, `email`, `facebook`, `twitter`, `instragram`, `linkdin`, `ifram`) VALUES
(1, 'Momon Joardar More, Panti Bajar, Panti - Kushtia Rd, কুমারখালী', '01626699527', 'hamjaiu@gmail.com', 'https://www.facebook.com/', 'https://twiter.com n', 'https://www.facebook.com', 'https://www.facebook.com/', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.3305135140567!2d89.20562237533656!3d23.77124207865617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe93815479b2f1%3A0xc77c023655d40590!2sHamja%20Innovative%20Unix!5e0!3m2!1sen!2sbd!4v1714639378794!5m2!1sen!2sbd');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` varchar(150) NOT NULL,
  `icon` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `desc`, `icon`) VALUES
(1, 'sdf', 'sdf', '1715419068_softwar.png'),
(2, 'sdf', 'sdfs', '1715419208_softwar.png');

-- --------------------------------------------------------

--
-- Table structure for table `feature_facility`
--

CREATE TABLE `feature_facility` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feature_facility`
--

INSERT INTO `feature_facility` (`id`, `name`) VALUES
(10, 'fsdf'),
(11, 'sdfsad'),
(12, 'sdfasd');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `m_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`sr_no`, `name`, `m_img`) VALUES
(6, 'Robin', '1715159968_Additionally,.png'),
(7, 'Hamja vi', '1715159983_Existing SOAPam.png'),
(8, 'Ashik vi', '1715159996_lightwave.png'),
(9, 'talha', '1715160008_nonstop client application.png'),
(11, 'ali', '1715160077_tech.jpg'),
(12, 'jayed', '1715160620_the s3com.png');

-- --------------------------------------------------------

--
-- Table structure for table `site_title`
--

CREATE TABLE `site_title` (
  `sr_no` int(11) NOT NULL,
  `site_name` varchar(150) NOT NULL,
  `site_address` varchar(150) NOT NULL,
  `site_shoutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_title`
--

INSERT INTO `site_title` (`sr_no`, `site_name`, `site_address`, `site_shoutdown`) VALUES
(1, 'HAMJAIU', 'HamjaIU Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem ipsa placeat qui hic? Esse, ducimus. 56 5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_query`
--

CREATE TABLE `user_query` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(300) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_query`
--

INSERT INTO `user_query` (`sr_no`, `name`, `email`, `subject`, `message`, `date`, `seen`) VALUES
(28, 'dsf@dsf', 'dsf@dsf', 'dsf@dsf', 'dsf@dsf', '2024-05-11', 1),
(31, 'dsf@dsf', 'dsf@dsf', 'dsf@dsf', 'dsf@dsf', '2024-05-11', 1),
(32, 'dsf@dsf', 'dsf@dsf', 'dsf@dsf', 'dsf@dsf', '2024-05-11', 1),
(33, 'dsf@dsf', 'dsf@dsf', 'dsf@dsf', 'dsf@dsf', '2024-05-11', 1),
(34, 'dsf@dsf', 'dsf@dsf', 'dsf@dsf', 'dsf@dsf', '2024-05-11', 0),
(35, 'dsf@dsf', 'dsf@dsf', 'dsf@dsf', 'dsf@dsf', '2024-05-11', 0),
(36, 'dsf@dsf', 'dsf@dsf', 'dsf@dsf', 'dsf@dsf', '2024-05-11', 0),
(37, 'dsf', 'sdf@sdf', 'dsf', 'dsf', '2024-05-11', 0),
(38, 'dsf', 'sdf@sdf', 'dsf', 'dsf', '2024-05-11', 0),
(39, 'dsf', 'sdf@sdf', 'dsf', 'sdf', '2024-05-11', 0),
(40, 'dsf', 'sdf@sdf', 'dsf', 'sdf', '2024-05-11', 0),
(41, 'dsf', 'sdf@sdf', 'dsf', 'sdf', '2024-05-11', 1),
(42, 'dsf', 'sdf@sdf', 'dsf', 'sdf', '2024-05-11', 0),
(43, 'dsf', 'sdf@sdf', 'dsf', 'sdf', '2024-05-11', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `carosal`
--
ALTER TABLE `carosal`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_facility`
--
ALTER TABLE `feature_facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `site_title`
--
ALTER TABLE `site_title`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_query`
--
ALTER TABLE `user_query`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carosal`
--
ALTER TABLE `carosal`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feature_facility`
--
ALTER TABLE `feature_facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `site_title`
--
ALTER TABLE `site_title`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_query`
--
ALTER TABLE `user_query`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
