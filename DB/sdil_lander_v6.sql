-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2016 at 09:30 PM
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
(20, 'Mr. XYZ', '', 1, '611ee131a4b56c0e8e018a3521126682', 1, NULL, NULL, '2016-11-09 20:27:22', 'test@lander.com'),
(21, 'test', '', 1, '611ee131a4b56c0e8e018a3521126682', 1, NULL, NULL, '2016-11-09 21:13:35', 'teste@lander.com');

-- --------------------------------------------------------

--
-- Table structure for table `sdil_lander_country`
--

CREATE TABLE `sdil_lander_country` (
  `lander_country_id` bigint(20) NOT NULL,
  `lander_country_name` varchar(100) NOT NULL,
  `lander_country_code` varchar(20) NOT NULL,
  `is_active` tinyint(5) NOT NULL,
  `is_country_reserved` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdil_lander_country`
--

INSERT INTO `sdil_lander_country` (`lander_country_id`, `lander_country_name`, `lander_country_code`, `is_active`, `is_country_reserved`) VALUES
(1, 'Bangladesh', 'BD', 1, 1),
(2, 'Australia', 'AU', 1, 0),
(3, 'Canada', 'CA', 1, 0);

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
(1, 'Third.jpg', '2016-11-11 22:27:08', '2016-11-11 22:46:28', 1, 1),
(2, 'First_iteam_addtion3.jpg', '2016-11-11 19:19:12', '2016-11-11 19:19:12', 2, 1),
(3, 'logo_bestcpaoffer.jpg', '2016-11-11 19:28:16', '2016-11-21 21:55:48', 1, 1),
(4, 'logo_large.png', '2016-11-11 19:28:16', '2016-11-21 21:55:59', 1, 1),
(5, 'logo_1.jpg', '2016-11-12 06:14:14', '2016-11-12 06:14:43', 2, 1),
(7, 'logo_large1.png', '2016-11-12 06:14:14', '2016-11-12 06:14:14', 2, 0),
(8, 'logo_output.jpg', '2016-11-12 06:14:14', '2016-11-12 06:14:14', 2, 0),
(9, 'Mockup_1.jpg', '2016-11-12 06:14:14', '2016-11-12 06:14:14', 2, 0),
(10, 'Mockup_2.jpg', '2016-11-12 06:14:14', '2016-11-12 06:14:14', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sdil_lander_device`
--

CREATE TABLE `sdil_lander_device` (
  `lander_device_id` bigint(20) NOT NULL,
  `lander_device_name` varchar(100) NOT NULL,
  `lander_device_code` varchar(50) NOT NULL,
  `lander_device_is_active` tinyint(3) NOT NULL DEFAULT '0',
  `lander_device_is_reserved` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdil_lander_device`
--

INSERT INTO `sdil_lander_device` (`lander_device_id`, `lander_device_name`, `lander_device_code`, `lander_device_is_active`, `lander_device_is_reserved`) VALUES
(1, 'Mobile', 'mobile', 1, 1),
(2, 'Tab', 'tab', 1, 1),
(3, 'Desktop', 'desktop', 1, 1);

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
(1, 'Continue', 'http://www.facebook.com', 1, 1, 1),
(2, 'Continue', 'http://www.google.com/', 2, 1, 0),
(3, 'Google', 'http://www.google.com//', 1, 3, 1),
(4, 'Twitter', 'http://www.twitter.com', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sdil_lander_theme`
--

CREATE TABLE `sdil_lander_theme` (
  `lander_theme_id` bigint(30) NOT NULL,
  `lander_theme_name` varchar(30) NOT NULL,
  `lander_theme_color_code` varchar(30) NOT NULL,
  `lander_theme_css` longtext NOT NULL,
  `lander_theme_is_active` tinyint(3) NOT NULL,
  `is_lander_theme_reserved` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdil_lander_theme`
--

INSERT INTO `sdil_lander_theme` (`lander_theme_id`, `lander_theme_name`, `lander_theme_color_code`, `lander_theme_css`, `lander_theme_is_active`, `is_lander_theme_reserved`) VALUES
(1, 'Brown', '#db4c2c', '#sdil-lander-popup-wrapper, body, html {\r\n    width: 100%;\r\n    height: 100%\r\n}\r\n\r\nbody, html {\r\n    margin: 0;\r\n    padding: 0;\r\n    border: 0;\r\n    font-size: 100%\r\n}\r\n\r\nimg {\r\n    border: none\r\n}\r\n\r\n.hidden {\r\n    display: none\r\n}\r\n\r\nbody {\r\n    background: #fff;\r\n    font-family: Helvetica, Arial, sans-serif;\r\n    color: #fff;\r\n    background-size: cover\r\n}\r\n\r\n#sdil-lander-popup-wrapper {\r\n    position: fixed;\r\n    top: 0;\r\n    left: 0;\r\n    z-index: 10;\r\n}\r\n\r\n.sdil-lander-popup_alert {\r\n    position: relative;\r\n    width: 380px;\r\n    left: 50%;\r\n    top: 50%;\r\n    margin-left: -210px;\r\n    margin-top: -90px;\r\n    z-index: 100;\r\n    padding: 20px;\r\n    overflow: hidden;\r\n    background-color: #db4c2c;\r\n    border-radius: 10px;\r\n    box-shadow: 0 0 18px rgba(0, 0, 0, .4);\r\n    border: 11px solid #fff\r\n}\r\n\r\n.sdil-lander-popup_alert .top {\r\n    position: absolute;\r\n    left: -1px;\r\n    top: -1px;\r\n    width: 100%;\r\n    height: 22px;\r\n    padding: 8px 20px 6px 10px;\r\n    background: #db4c2c;\r\n    border: 1px solid #db4c2c\r\n}\r\n\r\n.sdil-lander-popup_alert .copy_area {\r\n    display: block;\r\n    padding-top: 0;\r\n    position: relative;\r\n    left: 8%;\r\n    width: 80%;\r\n    margin-bottom: 17px\r\n}\r\n\r\n.sdil-lander-popup_alert .copy_area h5 {\r\n    font-size: 22px;\r\n    margin: 10px 0 0\r\n}\r\n\r\n.sdil-lander-popup_alert .copy_area p {\r\n    font-size: 17px;\r\n    margin-top: 5px\r\n}\r\n\r\n.sdil-lander-popup_alert .navbtn {\r\n    margin-top: 10px;\r\n    width: 140px;\r\n    height: 70px;\r\n    border-radius: 4px !important;\r\n    border: 1px solid #fff;\r\n    background: #fff;\r\n    font-size: 18px;\r\n    cursor: pointer;\r\n    font-weight: 400\r\n}\r\n\r\n.radar_scanner {\r\n    display: block;\r\n    margin: 0 auto;\r\n    text-align: center;\r\n    height: 100%;\r\n    width: 100%;\r\n    color: #fff;\r\n    position: fixed\r\n}\r\n\r\nh3.radar_title {\r\n    font-size: 110%;\r\n    line-height: 100px\r\n}\r\n\r\n.circle1 {\r\n    color: #000;\r\n    background: #e7e7e7\r\n}\r\n\r\n.circle2 {\r\n    color: rgba(255, 255, 255, .8);\r\n    background: #555;\r\n    text-shadow: 0 1px #666\r\n}\r\n\r\n.circle1, .circle2 {\r\n    font-weight: 400;\r\n    margin-left: 0;\r\n    font-size: 23px;\r\n    border-radius: 100px;\r\n    padding: 5px 15px\r\n}\r\n\r\n.box, .marker_show {\r\n    background: #fff;\r\n    color: #000;\r\n    outline: 0;\r\n    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);\r\n    box-shadow: 0 5px 15px rgba(0, 0, 0, .5);\r\n    width: 600px;\r\n    position: absolute;\r\n    left: 50%;\r\n    top: 50%;\r\n    margin-top: -185px;\r\n    margin-left: -300px;\r\n    line-height: 28px;\r\n    font-size: 22px;\r\n    text-align: center\r\n}\r\n\r\n.box {\r\n    display: none\r\n}\r\n\r\n.box .ok, .buttons {\r\n    background-color: #db4c2c;\r\n    border: 0;\r\n    color: #fff;\r\n    cursor: pointer;\r\n    font-size: 30px;\r\n    width: 40%;\r\n    min-width: 200px;\r\n    padding: 15px 0;\r\n    margin: 20px auto;\r\n    border-radius: 4px;\r\n    display: block;\r\n    text-align: center;\r\n    text-decoration: none\r\n}\r\n\r\n.boxheader {\r\n    background: #db4c2c;\r\n    width: 100%;\r\n    min-height: 20px;\r\n    color: #fff;\r\n    font-size: 23px;\r\n    padding: 22px 0;\r\n    margin: 0 auto;\r\n    text-align: center\r\n}\r\n\r\n.box_copy {\r\n    padding: 10px 30px 20px;\r\n    text-align: left\r\n}\r\n\r\n.stepinfo {\r\n    font-size: 18px;\r\n    margin: 10px 0;\r\n    text-align: center\r\n}\r\n\r\n#agree, .next {\r\n    text-align: center;\r\n    font-size: 30px;\r\n    padding: 10px;\r\n    display: inline-block;\r\n    width: 40%;\r\n    background: #db4c2c;\r\n    text-decoration: none;\r\n    color: #fff;\r\n    margin-right: -6px;\r\n    border-radius: 4px 0 0 4px;\r\n    margin-bottom: 20px;\r\n    font-weight: 700\r\n}\r\n\r\n.next.step_button_2 {\r\n    background: #56575B;\r\n    color: #fff;\r\n    border-radius: 0 4px 4px 0\r\n}\r\n\r\n.option, .option2, .option3, .option4 {\r\n    width: 60%;\r\n    padding: 10px;\r\n    text-align: left;\r\n    cursor: pointer;\r\n    margin: 0 auto 5px;\r\n    background: url("<?php echo base_url(); ?>images/unchecked_checkbox.png") 10px center no-repeat\r\n}\r\n\r\n.selected, .selected2, .selected3, .selected4 {\r\n    background: url("<?php echo base_url(); ?>images/checked_checkbox.png") 10px center no-repeat\r\n}\r\n\r\n.option-title {\r\n    color: #000;\r\n    display: block;\r\n    padding: 0;\r\n    margin-left: 50px\r\n}\r\n\r\n@media screen and (max-width: 640px) {\r\n    .box, .marker_show {\r\n        width: 95%;\r\n        left: 0;\r\n        margin: -200px 2.5%\r\n    }\r\n}\r\n\r\n@media screen and (max-width: 480px) {\r\n    .sdil-lander-popup_alert {\r\n        width: 80%;\r\n        left: 0;\r\n        margin: -90px 6%\r\n    }\r\n\r\n    .box, .marker_show {\r\n        font-size: 20px;\r\n        line-height: 25px\r\n    }\r\n\r\n    #radar img, .option, .option2, .option3, .option4 {\r\n        width: 80%\r\n    }\r\n\r\n    h3.radar_title {\r\n        margin-bottom: -20px\r\n    }\r\n\r\n    .box_copy {\r\n        padding: 10px\r\n    }\r\n\r\n    .boxheader {\r\n        font-size: 22px\r\n    }\r\n}', 1, 1),
(2, 'Pink', '#ff0060', '#sdil-lander-popup-wrapper, body, html {\r\n    width: 100%;\r\n    height: 100%\r\n}\r\n\r\nbody, html {\r\n    margin: 0;\r\n    padding: 0;\r\n    border: 0;\r\n    font-size: 100%\r\n}\r\n\r\nimg {\r\n    border: none\r\n}\r\n\r\n.hidden {\r\n    display: none\r\n}\r\n\r\nbody {\r\n    background: #fff;\r\n    font-family: Helvetica, Arial, sans-serif;\r\n    color: #ff0060;\r\n    background-size: cover\r\n}\r\n\r\n#sdil-lander-popup-wrapper {\r\n    position: fixed;\r\n    top: 0;\r\n    left: 0;\r\n    z-index: 10;\r\n}\r\n\r\n.sdil-lander-popup_alert {\r\n    position: relative;\r\n    width: 380px;\r\n    left: 50%;\r\n    top: 50%;\r\n    margin-left: -210px;\r\n    margin-top: -90px;\r\n    z-index: 100;\r\n    padding: 20px;\r\n    overflow: hidden;\r\n    background: rgba(225,225,225,.8);\r\n    border-radius: 10px;\r\n    box-shadow: 0 0 18px rgba(156, 32, 109, 0.4);\r\n    border: 11px solid #ff0060;\r\n}\r\n\r\n.sdil-lander-popup_alert .copy_area {\r\n    display: block;\r\n    padding-top: 0;\r\n    position: relative;\r\n    left: 8%;\r\n    width: 80%;\r\n    margin-bottom: 17px\r\n}\r\n\r\n.sdil-lander-popup_alert .copy_area h5 {\r\n    font-size: 22px;\r\n    margin: 10px 0 0\r\n}\r\n\r\n.sdil-lander-popup_alert .copy_area p {\r\n    font-size: 17px;\r\n    margin-top: 5px\r\n}\r\n\r\n.sdil-lander-popup_alert .navbtn {\r\n    margin-top: 10px;\r\n    width: 140px;\r\n    height: 70px;\r\n    border-radius: 9px !important;\r\n    border: 4px solid #ff0060;\r\n    background: #fff;\r\n    font-size: 20px;\r\n    cursor: pointer;\r\n    font-weight: 600;\r\n    color: #ff0060;\r\n}\r\n\r\n.radar_scanner {\r\n    display: block;\r\n    margin: 0 auto;\r\n    text-align: center;\r\n    height: 100%;\r\n    width: 100%;\r\n    color: #fff;\r\n    position: fixed;\r\n}\r\n\r\nh3.radar_title {\r\n    font-size: 110%;\r\n    line-height: 100px\r\n}\r\n\r\n.circle1 {\r\n    color: #ff0060;\r\n    background: #fff;\r\n}\r\n\r\n.circle2 {\r\n    color: rgba(255, 255, 255, .8);\r\n    background: #555;\r\n    text-shadow: 0 1px #666\r\n}\r\n\r\n.circle1, .circle2 {\r\n    font-weight: 400;\r\n    margin-left: 0;\r\n    font-size: 23px;\r\n    border-radius: 100px;\r\n    padding: 5px 15px\r\n}\r\n\r\n.box, .marker_show {\r\n    background: rgba(225,225,225,1);\r\n    border-radius: 10px;\r\n    color: #ff0060;\r\n    border: 4px solid #ff0060;\r\n    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);\r\n    box-shadow: 0 5px 15px rgba(0, 0, 0, .5);\r\n    width: 600px;\r\n    position: absolute;\r\n    left: 50%;\r\n    top: 50%;\r\n    margin-top: -185px;\r\n    margin-left: -300px;\r\n    line-height: 28px;\r\n    font-size: 22px;\r\n    text-align: center;\r\n    font-weight: 300;\r\n}\r\n\r\n.box {\r\n    display: none\r\n}\r\n\r\n.box .ok, .buttons {\r\n    background-color: #fff;\r\n    color: #ff0060;\r\n    cursor: pointer;\r\n    font-size: 30px;\r\n    width: 40%;\r\n    min-width: 200px;\r\n    padding: 15px 0;\r\n    margin: 20px auto;\r\n    border-radius: 6px;\r\n    display: block;\r\n    text-align: center;\r\n    text-decoration: none;\r\n    border: 4px solid #ff0060;\r\n}\r\n\r\n.boxheader {\r\n    background: #ff0060;\r\n    width: 100%;\r\n    min-height: 20px;\r\n    color: #fff;\r\n    font-size: 23px;\r\n    padding: 22px 0;\r\n    margin: 0 auto;\r\n    text-align: center\r\n}\r\n\r\n.box_copy {\r\n    padding: 10px 30px 20px;\r\n    text-align: left;\r\n}\r\n\r\n.stepinfo {\r\n    font-size: 18px;\r\n    margin: 10px 0;\r\n    text-align: center\r\n}\r\n\r\n#agree, .next {\r\n    text-align: center;\r\n    font-size: 30px;\r\n    padding: 12px;\r\n    display: inline-block;\r\n    width: 40%;\r\n    background: #ff0060;\r\n    text-decoration: none;\r\n    color: #fff;\r\n    margin-right: -6px;\r\n    border-radius: 4px 0 0 4px;\r\n    margin-bottom: 20px;\r\n    font-weight: 700\r\n}\r\n\r\n.next.step_button_2 {\r\n    background: #56575B;\r\n    color: #fff;\r\n    border-radius: 0 4px 4px 0\r\n}\r\n\r\n.option, .option2, .option3, .option4 {\r\n    width: 60%;\r\n    padding: 5px;\r\n    text-align: left;\r\n    cursor: pointer;\r\n    margin: 0 auto 5px;\r\n    background: url("http://localhost/lander/images/unchecked_checkbox.png") 10px center no-repeat\r\n}\r\n\r\n.selected, .selected2, .selected3, .selected4 {\r\n    background: url("http://localhost/lander/images/checked_checkbox.png") 10px center no-repeat\r\n}\r\n\r\n.option-title {\r\n    color: #eb0060;\r\n    display: block;\r\n    padding: 0;\r\n    margin-left: 50px\r\n}\r\n\r\n@media screen and (max-width: 640px) {\r\n    .box, .marker_show {\r\n        width: 95%;\r\n        left: 0;\r\n        margin: -200px 2.5%\r\n    }\r\n}\r\n\r\n@media screen and (max-width: 480px) {\r\n    .sdil-lander-popup_alert {\r\n        width: 80%;\r\n        left: 0;\r\n        margin: -90px 6%\r\n    }\r\n\r\n    .box, .marker_show {\r\n        font-size: 20px;\r\n        line-height: 25px\r\n    }\r\n\r\n    #radar img, .option, .option2, .option3, .option4 {\r\n        width: 80%\r\n    }\r\n\r\n    h3.radar_title {\r\n        margin-bottom: -20px\r\n    }\r\n\r\n    .box_copy {\r\n        padding: 10px\r\n    }\r\n\r\n    .boxheader {\r\n        font-size: 22px\r\n    }\r\n}', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sdil_lander_theme_country`
--

CREATE TABLE `sdil_lander_theme_country` (
  `sdil_lander_theme_country_ID` bigint(40) NOT NULL,
  `lander_theme_country_id` bigint(40) NOT NULL,
  `lander_theme_country_them_id` bigint(40) NOT NULL,
  `sdil_lander_theme_country_is_live` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sdil_lander_theme_country`
--

INSERT INTO `sdil_lander_theme_country` (`sdil_lander_theme_country_ID`, `lander_theme_country_id`, `lander_theme_country_them_id`, `sdil_lander_theme_country_is_live`) VALUES
(1, 1, 1, 1),
(3, 2, 2, 0);

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
  MODIFY `admin_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `sdil_lander_country`
--
ALTER TABLE `sdil_lander_country`
  MODIFY `lander_country_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sdil_lander_country_wise_slider_image`
--
ALTER TABLE `sdil_lander_country_wise_slider_image`
  MODIFY `lander_image_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sdil_lander_device`
--
ALTER TABLE `sdil_lander_device`
  MODIFY `lander_device_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `sdil_lander_theme_country_ID` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
