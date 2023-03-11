-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 03:05 PM
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
-- Database: `user-registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `recipient` varchar(255) DEFAULT NULL,
  `campaign` varchar(255) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'no',
  `msg` varchar(1000) NOT NULL,
  `auther` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `date_send` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `recipient`, `campaign`, `status`, `msg`, `auther`, `created_at`, `date_send`) VALUES
(336, 'testUS', NULL, 'yes', '1', 'walid888', '2023-03-04 15:48:17', '2023-03-04 15:48:17'),
(337, 'testUS', NULL, 'yes', '2', 'walid888', '2023-03-04 15:48:18', '2023-03-04 15:48:18'),
(338, 'testUS', NULL, 'yes', '3', 'walid888', '2023-03-04 15:48:22', '2023-03-04 15:48:22'),
(339, 'testUS', NULL, 'yes', '4', 'walid888', '2023-03-04 15:48:23', '2023-03-04 15:48:23'),
(340, 'testUS', NULL, 'yes', '5', 'walid888', '2023-03-04 15:48:25', '2023-03-04 15:48:25'),
(341, 'testUS', NULL, 'yes', '6', 'walid888', '2023-03-04 15:48:26', '2023-03-04 15:48:26'),
(342, 'testUS', NULL, 'yes', '7', 'walid888', '2023-03-04 15:48:26', '2023-03-04 15:48:26'),
(343, 'testUS', NULL, 'yes', '8', 'walid888', '2023-03-04 15:48:28', '2023-03-04 15:48:28'),
(344, 'testUS', NULL, 'yes', '9', 'walid888', '2023-03-04 15:48:29', '2023-03-04 15:48:29'),
(345, 'testUS', NULL, 'yes', '10', 'walid888', '2023-03-04 15:48:33', '2023-03-04 15:48:33'),
(346, NULL, 'tort', 'yes', 'w1', 'walid888', '2023-03-04 15:48:58', '2023-03-04 15:48:58'),
(347, NULL, 'tort', 'yes', 'w2', 'walid888', '2023-03-04 15:48:59', '2023-03-04 15:48:59'),
(348, NULL, 'tort', 'yes', 'w3', 'walid888', '2023-03-04 15:49:00', '2023-03-04 15:49:00'),
(349, NULL, 'tort', 'yes', 'w4', 'walid888', '2023-03-04 15:49:01', '2023-03-04 15:49:01'),
(350, NULL, 'tort', 'yes', 'w5', 'walid888', '2023-03-04 15:49:04', '2023-03-04 15:49:04'),
(351, NULL, 'tort', 'yes', 'w6', 'walid888', '2023-03-04 15:49:05', '2023-03-04 15:49:05'),
(352, NULL, 'tort', 'yes', 'w7', 'walid888', '2023-03-04 15:49:06', '2023-03-04 15:49:06'),
(353, NULL, 'tort', 'yes', 'w8', 'walid888', '2023-03-04 15:49:07', '2023-03-04 15:49:07'),
(354, NULL, 'tort', 'yes', 'w9', 'walid888', '2023-03-04 15:49:09', '2023-03-04 15:49:09'),
(355, NULL, 'tort', 'yes', 'w10', 'walid888', '2023-03-04 15:49:10', '2023-03-04 15:49:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
