-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 11, 2016 at 04:58 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
(20, 'Mr. XYZ', '', 1, '1b278b5f6912c2b251dea6a005cde3a0', 1, NULL, NULL, '2016-11-09 20:27:22', 'test@lander.com');

-- --------------------------------------------------------

--
-- Table structure for table `sdil_lander_country`
--

CREATE TABLE `sdil_lander_country` (
  `lander_country_id` bigint(20) NOT NULL,
  `lander_country_name` varchar(100) NOT NULL,
  `lander_country_code` varchar(30) NOT NULL,
  `is_active` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sdil_lander_country`
--

INSERT INTO `sdil_lander_country` (`lander_country_id`, `lander_country_name`, `lander_country_code`, `is_active`) VALUES
(1, 'Bangladesh', 'BD', 0),
(2, 'Australia', 'AU', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sdil_lander_country_wise_slider_image`
--

CREATE TABLE `sdil_lander_country_wise_slider_image` (
  `lander_image_id` bigint(30) NOT NULL,
  `lander_image_file_name` varchar(200) NOT NULL,
  `lander_image_file_created` datetime NOT NULL,
  `lander_image_file_modified` datetime NOT NULL,
  `lander_country_id` bigint(20) NOT NULL,
  `is_active` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `sdil_lander_country`
--
ALTER TABLE `sdil_lander_country`
  ADD PRIMARY KEY (`lander_country_id`),
  ADD UNIQUE KEY `lander_country_code` (`lander_country_code`);

--
-- Indexes for table `sdil_lander_country_wise_slider_image`
--
ALTER TABLE `sdil_lander_country_wise_slider_image`
  ADD PRIMARY KEY (`lander_image_id`),
  ADD KEY `lander_country_id` (`lander_country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sdil_lander_admin`
--
ALTER TABLE `sdil_lander_admin`
  MODIFY `admin_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `sdil_lander_country`
--
ALTER TABLE `sdil_lander_country`
  MODIFY `lander_country_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sdil_lander_country_wise_slider_image`
--
ALTER TABLE `sdil_lander_country_wise_slider_image`
  MODIFY `lander_image_id` bigint(30) NOT NULL AUTO_INCREMENT;