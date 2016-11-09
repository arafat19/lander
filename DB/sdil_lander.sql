-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2016 at 11:41 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdil_lander`
--

-- --------------------------------------------------------

--
-- Table structure for table `sdil_lander_admin`
--

CREATE TABLE `sdil_lander_admin` (
  `admin_id` bigint(20) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `cell_number` varchar(255) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `password_expired` tinyint(1) NOT NULL,
  `password_reset_code` varchar(255) DEFAULT NULL,
  `password_reset_link` varchar(255) DEFAULT NULL,
  `password_reset_validity` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `admin_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdil_lander_admin`
--

INSERT INTO `sdil_lander_admin` (`admin_id`, `full_name`, `cell_number`, `enabled`, `admin_password`, `password_expired`, `password_reset_code`, `password_reset_link`, `password_reset_validity`, `admin_email`) VALUES
(14, 'Addwordlbd', '', 1, '611ee131a4b56c0e8e018a3521126682', 1, NULL, NULL, '2015-11-13 12:39:38', 'marafat_121@yahoo.com'),
(16, 'Md. Ibrahim Arafat', '', 1, '611ee131a4b56c0e8e018a3521126682', 1, NULL, NULL, '2015-11-13 14:49:38', 'ibrahim.arafat@sebpo.com'),
(17, 'MD IBRAHIM ARAFAT', '', 1, '611ee131a4b56c0e8e018a3521126682', 1, NULL, NULL, '2015-11-13 14:58:33', 'himalking@hotmail.com'),
(19, 'Md Ibrahim Arafat', '', 1, '611ee131a4b56c0e8e018a3521126682', 1, NULL, NULL, '2015-11-16 12:23:34', 'sdil@gmail.com'),
(20, 'test', '01687127823', 1, '611ee131a4b56c0e8e018a3521126682', 1, NULL, NULL, '2016-11-09 20:27:22', 'test@lander.com'),
(21, 'test', '', 1, '611ee131a4b56c0e8e018a3521126682', 1, NULL, NULL, '2016-11-09 21:13:35', 'teste@lander.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sdil_lander_admin`
--
ALTER TABLE `sdil_lander_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `sdil_lander_admin_login_id_key` (`admin_email`) USING BTREE,
  ADD KEY `cell_number` (`cell_number`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sdil_lander_admin`
--
ALTER TABLE `sdil_lander_admin`
  MODIFY `admin_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
