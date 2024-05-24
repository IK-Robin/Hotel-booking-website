-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 07:21 AM
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
-- Table structure for table `book_now`
--

CREATE TABLE `book_now` (
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `arrival` int(11) NOT NULL DEFAULT 0,
  `refund` int(11) DEFAULT NULL,
  `booking_status` varchar(11) NOT NULL DEFAULT 'booked',
  `order_id` varchar(200) NOT NULL,
  `trans_id` varchar(200) NOT NULL,
  `trans_amt` int(11) NOT NULL,
  `trans_status` int(11) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_now`
--

INSERT INTO `book_now` (`booking_id`, `room_id`, `check_in`, `check_out`, `arrival`, `refund`, `booking_status`, `order_id`, `trans_id`, `trans_amt`, `trans_status`, `datetime`) VALUES
(7, 41, '2024-05-23', '2024-05-25', 0, NULL, 'booked', '6372448', '', 2, NULL, '2024-05-23 10:28:04'),
(8, 41, '2024-05-23', '2024-05-25', 0, NULL, 'booked', '6372448', '', 2, NULL, '2024-05-23 10:28:04'),
(9, 41, '2024-05-23', '2024-05-30', 0, NULL, 'booked', '4288601', '', 7, NULL, '2024-05-23 10:46:00'),
(10, 41, '2024-05-23', '2024-05-26', 0, NULL, 'booked', '1513178', '', 3, NULL, '2024-05-23 11:18:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_now`
--
ALTER TABLE `book_now`
  ADD PRIMARY KEY (`booking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_now`
--
ALTER TABLE `book_now`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
