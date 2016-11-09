-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2016 at 06:34 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blri_gov`
--

-- --------------------------------------------------------

--
-- Table structure for table `blri_admin`
--

CREATE TABLE `blri_admin` (
  `blri_admin_id` int(50) NOT NULL,
  `blri_admin_name` varchar(50) NOT NULL,
  `blri_admin_username` varchar(100) NOT NULL,
  `blri_admin_password` varchar(150) NOT NULL,
  `blri_admin_phone_number` varchar(20) NOT NULL,
  `blri_admin_NID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blri_admin`
--

INSERT INTO `blri_admin` (`blri_admin_id`, `blri_admin_name`, `blri_admin_username`, `blri_admin_password`, `blri_admin_phone_number`, `blri_admin_NID`) VALUES
(1, 'Md Ibrahim Arafat', 'arafat@gmail.com', '611ee131a4b56c0e8e018a3521126682', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `blri_applicant`
--

CREATE TABLE `blri_applicant` (
  `applicant_id` int(200) NOT NULL,
  `applicant_name` varchar(100) NOT NULL,
  `applicant_date_of_birth` varchar(30) NOT NULL,
  `applicant_father_name` varchar(100) NOT NULL,
  `applicant_NID` varchar(50) NOT NULL,
  `applicant_mobile` varchar(20) NOT NULL,
  `applicant_email` varchar(100) NOT NULL,
  `applicant_village` varchar(50) NOT NULL,
  `applicant_post_office` varchar(50) NOT NULL,
  `applicant_district_id` int(20) NOT NULL,
  `applicant_subdistrict_id` int(20) NOT NULL,
  `applicant_photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blri_applicant`
--

INSERT INTO `blri_applicant` (`applicant_id`, `applicant_name`, `applicant_date_of_birth`, `applicant_father_name`, `applicant_NID`, `applicant_mobile`, `applicant_email`, `applicant_village`, `applicant_post_office`, `applicant_district_id`, `applicant_subdistrict_id`, `applicant_photo`) VALUES
(1, 'আরাফাত', '', '', '', '', '', '', '', 0, 0, ''),
(2, 'arafat', '', '', '', '', '', '', '', 0, 0, ''),
(17, '', '', '', '', '', '', '', '', 0, 0, ''),
(18, '', '', '', '', '', '', '', '', 0, 0, ''),
(19, '', '', '', '', '', '', '', '', 0, 0, ''),
(20, '', '', '', '', '', '', '', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `blri_course`
--

CREATE TABLE `blri_course` (
  `course_id` int(100) NOT NULL,
  `course_name` varchar(120) NOT NULL,
  `course_description` text,
  `course_start_date` varchar(50) NOT NULL,
  `course_end_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blri_course`
--

INSERT INTO `blri_course` (`course_id`, `course_name`, `course_description`, `course_start_date`, `course_end_date`) VALUES
(4, 'dfds', '', '27-09-2016', '06-10-2016'),
(5, 'গরু মোটা তাজা করন', 'গরু মোটা তাজা করন', '29-09-2016', '29-12-2016');

-- --------------------------------------------------------

--
-- Table structure for table `blri_course_instructor`
--

CREATE TABLE `blri_course_instructor` (
  `instructor_id` int(50) NOT NULL,
  `course_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blri_course_instructor`
--

INSERT INTO `blri_course_instructor` (`instructor_id`, `course_id`) VALUES
(1, 4),
(2, 4),
(1, 5),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `blri_district`
--

CREATE TABLE `blri_district` (
  `district_id` int(100) NOT NULL,
  `district_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blri_district`
--

INSERT INTO `blri_district` (`district_id`, `district_name`) VALUES
(1, 'বরগুনা'),
(2, 'বরিশাল'),
(3, 'ভোলা'),
(4, 'ঝালকাঠি'),
(5, 'পটুয়াখালী'),
(6, 'পিরোজপুর'),
(7, 'বান্দরবান'),
(8, 'ব্রাহ্মণবাড়িয়া'),
(9, 'চাঁদপুর'),
(10, 'চট্টগ্রাম'),
(11, 'কুমিল্লা'),
(12, 'কক্সবাজার'),
(13, 'ফেনী'),
(14, 'খাগড়াছড়ি'),
(15, 'লক্ষ্মীপুর'),
(16, 'নোয়াখালী'),
(17, 'রাঙ্গামাটি'),
(18, 'ঢাকা'),
(19, 'ফরিদপুর'),
(20, 'গাজীপুর'),
(21, 'গোপালগঞ্জ'),
(22, 'জামালপুর');

-- --------------------------------------------------------

--
-- Table structure for table `blri_instructor`
--

CREATE TABLE `blri_instructor` (
  `instructor_id` int(80) NOT NULL,
  `instructor_name` varchar(100) NOT NULL,
  `instructor_email` varchar(100) NOT NULL,
  `instructor_phone_number` varchar(15) NOT NULL,
  `instructor_NID` varchar(50) NOT NULL,
  `instructor_present_address` text,
  `course_count` int(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blri_instructor`
--

INSERT INTO `blri_instructor` (`instructor_id`, `instructor_name`, `instructor_email`, `instructor_phone_number`, `instructor_NID`, `instructor_present_address`, `course_count`) VALUES
(1, 'Harun Rashid', 'harun.bin.illius@gmail.com', '01944-416535', '123456789fsddfsdf', 'Akbarshah', 0),
(2, 'test', 'test@gmail.com', '01944-416535', 'fsdfdsfd', 'fdsfdsfsf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blri_sub_district`
--

CREATE TABLE `blri_sub_district` (
  `sub_district_id` int(20) NOT NULL,
  `sub_district_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blri_sub_district`
--

INSERT INTO `blri_sub_district` (`sub_district_id`, `sub_district_name`) VALUES
(1, 'আমতলী'),
(2, 'বামনা'),
(3, 'বরগুনা সদর'),
(4, 'বেতাগী'),
(5, 'পাথরঘাটা'),
(6, 'তালতলি'),
(7, 'আগৈলঝাড়া'),
(8, 'বাবুগঞ্জ'),
(9, 'বাকেরগঞ্জ'),
(10, 'বানারীপাড়া'),
(11, 'গৌরনদী'),
(12, 'হিজলা'),
(13, 'বরিশাল সদর (কোতোয়ালী)'),
(14, 'মেহেন্দিগঞ্জ'),
(15, 'মুলাদী'),
(16, 'উজিরপুর'),
(17, 'ভোলা সদর'),
(18, 'বোরহানউদ্দিন'),
(19, 'দৌলতখান'),
(20, 'লালমোহন'),
(21, 'মনপুরা'),
(22, 'তজুমদ্দিন'),
(23, 'ঝালকাঠি সদর'),
(24, 'নলছিটি'),
(25, 'কাঠালিয়া'),
(26, 'বাউফল'),
(27, 'দশমিনা'),
(28, 'দুমকি'),
(29, 'কলাপাড়া'),
(30, 'মির্জাগঞ্জ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blri_admin`
--
ALTER TABLE `blri_admin`
  ADD PRIMARY KEY (`blri_admin_id`);

--
-- Indexes for table `blri_applicant`
--
ALTER TABLE `blri_applicant`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `blri_course`
--
ALTER TABLE `blri_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `blri_course_instructor`
--
ALTER TABLE `blri_course_instructor`
  ADD KEY `course_id` (`course_id`,`instructor_id`);

--
-- Indexes for table `blri_district`
--
ALTER TABLE `blri_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `blri_instructor`
--
ALTER TABLE `blri_instructor`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `blri_sub_district`
--
ALTER TABLE `blri_sub_district`
  ADD PRIMARY KEY (`sub_district_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blri_admin`
--
ALTER TABLE `blri_admin`
  MODIFY `blri_admin_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blri_applicant`
--
ALTER TABLE `blri_applicant`
  MODIFY `applicant_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `blri_course`
--
ALTER TABLE `blri_course`
  MODIFY `course_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `blri_district`
--
ALTER TABLE `blri_district`
  MODIFY `district_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `blri_instructor`
--
ALTER TABLE `blri_instructor`
  MODIFY `instructor_id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blri_sub_district`
--
ALTER TABLE `blri_sub_district`
  MODIFY `sub_district_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
