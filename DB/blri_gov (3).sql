-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2016 at 07:07 AM
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
  `applicant_course_id` int(100) NOT NULL DEFAULT '0',
  `applicant_photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blri_applicant`
--

INSERT INTO `blri_applicant` (`applicant_id`, `applicant_name`, `applicant_date_of_birth`, `applicant_father_name`, `applicant_NID`, `applicant_mobile`, `applicant_email`, `applicant_village`, `applicant_post_office`, `applicant_district_id`, `applicant_subdistrict_id`, `applicant_course_id`, `applicant_photo`) VALUES
(26, 'আরাফাত', '06/03/1988', 'test', 'test', '01687127823', '', 'test', 'test', 17, 16, 5, ''),
(27, 'arafat', '22/10/2016', 'dfdsff', 'dfsfsf', '01687127823', '', 'dffdsf', 'dfsfdsf', 1, 2, 5, ''),
(28, 'dmbfhkj', '14/10/2016', 'jk', 'klfjdslkj', '01687127823', '', 'ksjlfj', 'jdkfj', 1, 1, 5, ''),
(29, 'kalam', '12/10/2016', 'fdsf', 'fdsfdfs', '01687127823', '', 'fdfsdsf', 'fdsfdsf', 2, 1, 5, '12226990_135937383432520_4915268444929674739_n.jpg'),
(30, 'Barkat', '04/10/2016', 'fdsf', 'fdsf', '01687127823', '', 'fdfsdsf', 'fdsfdsf', 2, 2, 5, '14837_824718484299364_9094606429871241501_n.jpg'),
(31, 'Zabeer', '25/10/2016', 'fdsf', 'fdsf', '01687127823', '', 'fdfsdsf', 'ffd', 1, 2, 5, '1378452_808669252577760_6793364885212874741_n.jpg');

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
(1, 5);

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
  `instructor_organization` varchar(50) NOT NULL,
  `instructor_designation` varchar(50) DEFAULT NULL,
  `instructor_photo` varchar(100) NOT NULL,
  `course_count` int(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blri_instructor`
--

INSERT INTO `blri_instructor` (`instructor_id`, `instructor_name`, `instructor_email`, `instructor_phone_number`, `instructor_organization`, `instructor_designation`, `instructor_photo`, `course_count`) VALUES
(1, 'Harun Rashid', 'harun.bin.illius@gmail.com', '01944416535', 'Family', 'Chariman', '1620519_580165648758417_574470753498938999_n.jpg', 2),
(2, 'test', 'test@gmail.com', '01944416535', 'fsdfdsfd', 'fdsfdsfsf', '', 1),
(3, 'test', 'test@tg.com', '01988816535', 'test', 'test', '851560_10151658950229974_1362574886_n.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blri_sub_district`
--

CREATE TABLE `blri_sub_district` (
  `sub_district_id` int(20) NOT NULL,
  `sub_district_name` varchar(100) NOT NULL,
  `district_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blri_sub_district`
--

INSERT INTO `blri_sub_district` (`sub_district_id`, `sub_district_name`, `district_id`) VALUES
(1, 'আমতলী', 2),
(2, 'বামনা', 2),
(3, 'বরগুনা সদর', 1),
(4, 'বেতাগী', 2),
(5, 'পাথরঘাটা', 2),
(6, 'তালতলি', 2),
(7, 'আগৈলঝাড়াs', 3),
(8, 'বাবুগঞ্জ', 4),
(9, 'বাকেরগঞ্জ', 4),
(10, 'বানারীপাড়া', 4),
(11, 'গৌরনদী', 4),
(12, 'হিজলা', 5),
(13, 'বরিশাল সদর (কোতোয়ালী)', 5),
(14, 'মেহেন্দিগঞ্জ', 5),
(15, 'মুলাদী', 5),
(16, 'উজিরপুর', 6),
(17, 'ভোলা সদর', 6),
(18, 'বোরহানউদ্দিন', 7),
(19, 'দৌলতখান', 1),
(20, 'লালমোহন', 11),
(21, 'মনপুরা', 12),
(22, 'তজুমদ্দিন', 0),
(23, 'ঝালকাঠি সদর', 0),
(24, 'নলছিটি', 0),
(25, 'কাঠালিয়া', 0),
(27, 'দশমিনা', 0),
(28, 'দুমকি', 0),
(29, 'কলাপাড়া', 0),
(30, 'মির্জাগঞ্জ', 0),
(31, 'বাউফল', 1);

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
  ADD PRIMARY KEY (`sub_district_id`),
  ADD KEY `district_id` (`district_id`);

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
  MODIFY `applicant_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
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
  MODIFY `instructor_id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `blri_sub_district`
--
ALTER TABLE `blri_sub_district`
  MODIFY `sub_district_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
