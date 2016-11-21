-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 21, 2016 at 04:39 PM
-- Server version: 5.6.28
-- PHP Version: 5.6.25

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
(20, 'Mr. XYZ', '', 1, '611ee131a4b56c0e8e018a3521126682', 1, NULL, NULL, '2016-11-09 20:27:22', 'test@lander.com');

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
(1, 'Bangladesh', 'BD', 1),
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
  `lander_image_country_id` bigint(20) NOT NULL,
  `lander_image_is_active` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sdil_lander_country_wise_slider_image`
--

INSERT INTO `sdil_lander_country_wise_slider_image` (`lander_image_id`, `lander_image_file_name`, `lander_image_file_created`, `lander_image_file_modified`, `lander_image_country_id`, `lander_image_is_active`) VALUES
(1, 'Me_a_Pagla.jpg', '2016-11-15 10:30:03', '2016-11-15 10:30:15', 1, 1),
(2, 'BDNationalFlag.jpg', '2016-11-15 10:30:03', '2016-11-17 13:23:40', 1, 1),
(3, 'omar_vae.jpg', '2016-11-15 10:30:03', '2016-11-15 10:30:03', 1, 1),
(4, 'Photo_on_12-31-15_at_4_48_PM_3.jpg', '2016-11-15 10:30:03', '2016-11-15 10:30:03', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sdil_lander_device`
--

CREATE TABLE `sdil_lander_device` (
  `lander_device_id` bigint(30) NOT NULL,
  `lander_device_name` varchar(200) NOT NULL,
  `lander_device_code` varchar(100) NOT NULL,
  `lander_device_is_active` tinyint(3) NOT NULL DEFAULT '0',
  `lander_device_is_reserved` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sdil_lander_device`
--

INSERT INTO `sdil_lander_device` (`lander_device_id`, `lander_device_name`, `lander_device_code`, `lander_device_is_active`, `lander_device_is_reserved`) VALUES
(2, 'Mobile', 'mobile', 1, 0),
(3, 'Tablet', 'tablet', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sdil_lander_last_button_link`
--

CREATE TABLE `sdil_lander_last_button_link` (
  `lander_last_btn_link_id` bigint(30) NOT NULL,
  `lander_last_btn_name` varchar(50) NOT NULL,
  `lander_last_btn_link_url` varchar(100) NOT NULL,
  `lander_last_btn_country_id` bigint(30) NOT NULL,
  `lander_last_btn_device_id` bigint(30) NOT NULL,
  `lander_last_btn_is_active` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sdil_lander_last_button_link`
--

INSERT INTO `sdil_lander_last_button_link` (`lander_last_btn_link_id`, `lander_last_btn_name`, `lander_last_btn_link_url`, `lander_last_btn_country_id`, `lander_last_btn_device_id`, `lander_last_btn_is_active`) VALUES
(1, 'Continue', 'https://www.google.com', 1, 2, 1),
(4, 'Continue', 'https://www.google.com/', 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sdil_lander_theme`
--

CREATE TABLE `sdil_lander_theme` (
  `lander_theme_id` bigint(30) NOT NULL,
  `lander_theme_name` varchar(30) NOT NULL,
  `lander_theme_color_code` varchar(30) NOT NULL,
  `lander_theme_css` longtext NOT NULL,
  `lander_theme_is_active` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdil_lander_theme`
--

INSERT INTO `sdil_lander_theme` (`lander_theme_id`, `lander_theme_name`, `lander_theme_color_code`, `lander_theme_css`, `lander_theme_is_active`) VALUES
(1, 'Brown', '#db4c2c', '#sdil-lander-popup-wrapper, body, html {\n    width: 100%;\n    height: 100%\n}\n\nbody, html {\n    margin: 0;\n    padding: 0;\n    border: 0;\n    font-size: 100%\n}\n\nimg {\n    border: none\n}\n\n.hidden {\n    display: none\n}\n\nbody {\n    background: #fff;\n    font-family: Helvetica, Arial, sans-serif;\n    color: #fff;\n    background-size: cover\n}\n\n#sdil-lander-popup-wrapper {\n    position: fixed;\n    top: 0;\n    left: 0;\n    z-index: 10;\n}\n\n.sdil-lander-popup_alert {\n    position: relative;\n    width: 380px;\n    left: 50%;\n    top: 50%;\n    margin-left: -210px;\n    margin-top: -90px;\n    z-index: 100;\n    padding: 20px;\n    overflow: hidden;\n    background-color: #db4c2c;\n    border-radius: 10px;\n    box-shadow: 0 0 18px rgba(0, 0, 0, .4);\n    border: 11px solid #fff\n}\n\n.sdil-lander-popup_alert .top {\n    position: absolute;\n    left: -1px;\n    top: -1px;\n    width: 100%;\n    height: 22px;\n    padding: 8px 20px 6px 10px;\n    background: #db4c2c;\n    border: 1px solid #db4c2c\n}\n\n.sdil-lander-popup_alert .copy_area {\n    display: block;\n    padding-top: 0;\n    position: relative;\n    left: 8%;\n    width: 80%;\n    margin-bottom: 17px\n}\n\n.sdil-lander-popup_alert .copy_area h5 {\n    font-size: 22px;\n    margin: 10px 0 0\n}\n\n.sdil-lander-popup_alert .copy_area p {\n    font-size: 17px;\n    margin-top: 5px\n}\n\n.sdil-lander-popup_alert .navbtn {\n    margin-top: 10px;\n    width: 140px;\n    height: 70px;\n    border-radius: 4px !important;\n    border: 1px solid #fff;\n    background: #fff;\n    font-size: 18px;\n    cursor: pointer;\n    font-weight: 400\n}\n\n.radar_scanner {\n    display: block;\n    margin: 0 auto;\n    text-align: center;\n    height: 100%;\n    width: 100%;\n    color: #fff;\n    position: fixed\n}\n\nh3.radar_title {\n    font-size: 110%;\n    line-height: 100px\n}\n\n.circle1 {\n    color: #000;\n    background: #e7e7e7\n}\n\n.circle2 {\n    color: rgba(255, 255, 255, .8);\n    background: #555;\n    text-shadow: 0 1px #666\n}\n\n.circle1, .circle2 {\n    font-weight: 400;\n    margin-left: 0;\n    font-size: 23px;\n    border-radius: 100px;\n    padding: 5px 15px\n}\n\n.box, .marker_show {\n    background: #fff;\n    color: #000;\n    outline: 0;\n    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);\n    box-shadow: 0 5px 15px rgba(0, 0, 0, .5);\n    width: 600px;\n    position: absolute;\n    left: 50%;\n    top: 50%;\n    margin-top: -185px;\n    margin-left: -300px;\n    line-height: 28px;\n    font-size: 22px;\n    text-align: center\n}\n\n.box {\n    display: none\n}\n\n.box .ok, .buttons {\n    background-color: #db4c2c;\n    border: 0;\n    color: #fff;\n    cursor: pointer;\n    font-size: 30px;\n    width: 40%;\n    min-width: 200px;\n    padding: 15px 0;\n    margin: 20px auto;\n    border-radius: 4px;\n    display: block;\n    text-align: center;\n    text-decoration: none\n}\n\n.boxheader {\n    background: #db4c2c;\n    width: 100%;\n    min-height: 20px;\n    color: #fff;\n    font-size: 23px;\n    padding: 22px 0;\n    margin: 0 auto;\n    text-align: center\n}\n\n.box_copy {\n    padding: 10px 30px 20px;\n    text-align: left\n}\n\n.stepinfo {\n    font-size: 18px;\n    margin: 10px 0;\n    text-align: center\n}\n\n#agree, .next {\n    text-align: center;\n    font-size: 30px;\n    padding: 10px;\n    display: inline-block;\n    width: 40%;\n    background: #db4c2c;\n    text-decoration: none;\n    color: #fff;\n    margin-right: -6px;\n    border-radius: 4px 0 0 4px;\n    margin-bottom: 20px;\n    font-weight: 700\n}\n\n.next.step_button_2 {\n    background: #56575B;\n    color: #fff;\n    border-radius: 0 4px 4px 0\n}\n\n.option, .option2, .option3, .option4 {\n    width: 60%;\n    padding: 10px;\n    text-align: left;\n    cursor: pointer;\n    margin: 0 auto 5px;\n    background: url("<?php echo base_url(); ?>images/unchecked_checkbox.png") 10px center no-repeat\n}\n\n.selected, .selected2, .selected3, .selected4 {\n    background: url("<?php echo base_url(); ?>images/checked_checkbox.png") 10px center no-repeat\n}\n\n.option-title {\n    color: #000;\n    display: block;\n    padding: 0;\n    margin-left: 50px\n}\n\n@media screen and (max-width: 640px) {\n    .box, .marker_show {\n        width: 95%;\n        left: 0;\n        margin: -200px 2.5%\n    }\n}\n\n@media screen and (max-width: 480px) {\n    .sdil-lander-popup_alert {\n        width: 80%;\n        left: 0;\n        margin: -90px 6%\n    }\n\n    .box, .marker_show {\n        font-size: 20px;\n        line-height: 25px\n    }\n\n    #radar img, .option, .option2, .option3, .option4 {\n        width: 80%\n    }\n\n    h3.radar_title {\n        margin-bottom: -20px\n    }\n\n    .box_copy {\n        padding: 10px\n    }\n\n    .boxheader {\n        font-size: 22px\n    }\n}', 1),
(2, 'Pink', '#ff0060', '#sdil-lander-popup-wrapper, body, html {\r\n    width: 100%;\r\n    height: 100%\r\n}\r\n\r\nbody, html {\r\n    margin: 0;\r\n    padding: 0;\r\n    border: 0;\r\n    font-size: 100%\r\n}\r\n\r\nimg {\r\n    border: none\r\n}\r\n\r\n.hidden {\r\n    display: none\r\n}\r\n\r\nbody {\r\n    background: #fff;\r\n    font-family: Helvetica, Arial, sans-serif;\r\n    color: #ff0060;\r\n    background-size: cover\r\n}\r\n\r\n#sdil-lander-popup-wrapper {\r\n    position: fixed;\r\n    top: 0;\r\n    left: 0;\r\n    z-index: 10;\r\n}\r\n\r\n.sdil-lander-popup_alert {\r\n    position: relative;\r\n    width: 380px;\r\n    left: 50%;\r\n    top: 50%;\r\n    margin-left: -210px;\r\n    margin-top: -90px;\r\n    z-index: 100;\r\n    padding: 20px;\r\n    overflow: hidden;\r\n    background: rgba(225,225,225,.8);\r\n    border-radius: 10px;\r\n    box-shadow: 0 0 18px rgba(156, 32, 109, 0.4);\r\n    border: 11px solid #ff0060;\r\n}\r\n\r\n.sdil-lander-popup_alert .top {\r\n    position: absolute;\r\n    left: -1px;\r\n    top: -1px;\r\n    width: 100%;\r\n    height: 22px;\r\n    padding: 8px 20px 6px 10px;\r\n    background: rgba(225,225,225,.8);\r\n}\r\n\r\n.sdil-lander-popup_alert .copy_area {\r\n    display: block;\r\n    padding-top: 0;\r\n    position: relative;\r\n    left: 8%;\r\n    width: 80%;\r\n    margin-bottom: 17px\r\n}\r\n\r\n.sdil-lander-popup_alert .copy_area h5 {\r\n    font-size: 22px;\r\n    margin: 10px 0 0\r\n}\r\n\r\n.sdil-lander-popup_alert .copy_area p {\r\n    font-size: 17px;\r\n    margin-top: 5px\r\n}\r\n\r\n.sdil-lander-popup_alert .navbtn {\r\n    margin-top: 10px;\r\n    width: 140px;\r\n    height: 70px;\r\n    border-radius: 9px !important;\r\n    border: 4px solid #ff0060;\r\n    background: #fff;\r\n    font-size: 20px;\r\n    cursor: pointer;\r\n    font-weight: 600;\r\n    color: #ff0060;\r\n}\r\n\r\n.radar_scanner {\r\n    display: block;\r\n    margin: 0 auto;\r\n    text-align: center;\r\n    height: 100%;\r\n    width: 100%;\r\n    color: #fff;\r\n    position: fixed;\r\n}\r\n\r\nh3.radar_title {\r\n    font-size: 110%;\r\n    line-height: 100px\r\n}\r\n\r\n.circle1 {\r\n    color: #ff0060;\r\n    background: #fff;\r\n}\r\n\r\n.circle2 {\r\n    color: rgba(255, 255, 255, .8);\r\n    background: #555;\r\n    text-shadow: 0 1px #666\r\n}\r\n\r\n.circle1, .circle2 {\r\n    font-weight: 400;\r\n    margin-left: 0;\r\n    font-size: 23px;\r\n    border-radius: 100px;\r\n    padding: 5px 15px\r\n}\r\n\r\n.box, .marker_show {\r\n    background: rgba(225,225,225,1);\r\n    border-radius: 10px;\r\n    color: #ff0060;\r\n    border: 4px solid #ff0060;\r\n    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);\r\n    box-shadow: 0 5px 15px rgba(0, 0, 0, .5);\r\n    width: 600px;\r\n    position: absolute;\r\n    left: 50%;\r\n    top: 50%;\r\n    margin-top: -185px;\r\n    margin-left: -300px;\r\n    line-height: 28px;\r\n    font-size: 22px;\r\n    text-align: center;\r\n    font-weight: 300;\r\n}\r\n\r\n.box {\r\n    display: none\r\n}\r\n\r\n.box .ok, .buttons {\r\n    background-color: #fff;\r\n    color: #ff0060;\r\n    cursor: pointer;\r\n    font-size: 30px;\r\n    width: 40%;\r\n    min-width: 200px;\r\n    padding: 15px 0;\r\n    margin: 20px auto;\r\n    border-radius: 6px;\r\n    display: block;\r\n    text-align: center;\r\n    text-decoration: none;\r\n    border: 4px solid #ff0060;\r\n}\r\n\r\n.boxheader {\r\n    background: #ff0060;\r\n    width: 100%;\r\n    min-height: 20px;\r\n    color: #fff;\r\n    font-size: 23px;\r\n    padding: 22px 0;\r\n    margin: 0 auto;\r\n    text-align: center\r\n}\r\n\r\n.box_copy {\r\n    padding: 10px 30px 20px;\r\n    text-align: left;\r\n}\r\n\r\n.stepinfo {\r\n    font-size: 18px;\r\n    margin: 10px 0;\r\n    text-align: center\r\n}\r\n\r\n#agree, .next {\r\n    text-align: center;\r\n    font-size: 30px;\r\n    padding: 12px;\r\n    display: inline-block;\r\n    width: 40%;\r\n    background: #ff0060;\r\n    text-decoration: none;\r\n    color: #fff;\r\n    margin-right: -6px;\r\n    border-radius: 4px 0 0 4px;\r\n    margin-bottom: 20px;\r\n    font-weight: 700\r\n}\r\n\r\n.next.step_button_2 {\r\n    background: #56575B;\r\n    color: #fff;\r\n    border-radius: 0 4px 4px 0\r\n}\r\n\r\n.option, .option2, .option3, .option4 {\r\n    width: 60%;\r\n    padding: 5px;\r\n    text-align: left;\r\n    cursor: pointer;\r\n    margin: 0 auto 5px;\r\n    background: url("<?php echo base_url(); ?>images/unchecked_checkbox.png") 10px center no-repeat\r\n}\r\n\r\n.selected, .selected2, .selected3, .selected4 {\r\n    background: url("<?php echo base_url(); ?>images/checked_checkbox.png") 10px center no-repeat\r\n}\r\n\r\n.option-title {\r\n    color: #eb0060;\r\n    display: block;\r\n    padding: 0;\r\n    margin-left: 50px\r\n}\r\n\r\n@media screen and (max-width: 640px) {\r\n    .box, .marker_show {\r\n        width: 95%;\r\n        left: 0;\r\n        margin: -200px 2.5%\r\n    }\r\n}\r\n\r\n@media screen and (max-width: 480px) {\r\n    .sdil-lander-popup_alert {\r\n        width: 80%;\r\n        left: 0;\r\n        margin: -90px 6%\r\n    }\r\n\r\n    .box, .marker_show {\r\n        font-size: 20px;\r\n        line-height: 25px\r\n    }\r\n\r\n    #radar img, .option, .option2, .option3, .option4 {\r\n        width: 80%\r\n    }\r\n\r\n    h3.radar_title {\r\n        margin-bottom: -20px\r\n    }\r\n\r\n    .box_copy {\r\n        padding: 10px\r\n    }\r\n\r\n    .boxheader {\r\n        font-size: 22px\r\n    }\r\n}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sdil_lander_theme_country`
--

CREATE TABLE `sdil_lander_theme_country` (
  `sdil_lander_theme_country_ID` bigint(40) NOT NULL,
  `lander_theme_country_id` bigint(40) NOT NULL,
  `lander_theme_country_them_id` bigint(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sdil_lander_theme_country`
--

INSERT INTO `sdil_lander_theme_country` (`sdil_lander_theme_country_ID`, `lander_theme_country_id`, `lander_theme_country_them_id`) VALUES
(1, 1, 1),
(5, 2, 2);

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
  ADD KEY `lander_country_id` (`lander_image_country_id`);

--
-- Indexes for table `sdil_lander_device`
--
ALTER TABLE `sdil_lander_device`
  ADD PRIMARY KEY (`lander_device_id`),
  ADD UNIQUE KEY `lander_device_code` (`lander_device_code`);

--
-- Indexes for table `sdil_lander_last_button_link`
--
ALTER TABLE `sdil_lander_last_button_link`
  ADD PRIMARY KEY (`lander_last_btn_link_id`),
  ADD UNIQUE KEY `lander_last_btn_link_url` (`lander_last_btn_link_url`),
  ADD KEY `lander_last_btn_country_id` (`lander_last_btn_country_id`),
  ADD KEY `lander_last_btn_device_id` (`lander_last_btn_device_id`);

--
-- Indexes for table `sdil_lander_theme`
--
ALTER TABLE `sdil_lander_theme`
  ADD PRIMARY KEY (`lander_theme_id`),
  ADD UNIQUE KEY `lander_theme_color_code` (`lander_theme_color_code`);

--
-- Indexes for table `sdil_lander_theme_country`
--
ALTER TABLE `sdil_lander_theme_country`
  ADD PRIMARY KEY (`sdil_lander_theme_country_ID`),
  ADD KEY `lander_theme_country_id` (`lander_theme_country_id`),
  ADD KEY `lander_theme_country_them_id` (`lander_theme_country_them_id`);

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
  MODIFY `lander_image_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sdil_lander_device`
--
ALTER TABLE `sdil_lander_device`
  MODIFY `lander_device_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sdil_lander_last_button_link`
--
ALTER TABLE `sdil_lander_last_button_link`
  MODIFY `lander_last_btn_link_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sdil_lander_theme`
--
ALTER TABLE `sdil_lander_theme`
  MODIFY `lander_theme_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sdil_lander_theme_country`
--
ALTER TABLE `sdil_lander_theme_country`
  MODIFY `sdil_lander_theme_country_ID` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;