-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2016 at 10:58 AM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

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
  `admin_password_backup` varchar(300) DEFAULT NULL,
  `password_expired` tinyint(1) NOT NULL,
  `password_reset_code` varchar(255) DEFAULT NULL,
  `password_reset_link` varchar(255) DEFAULT NULL,
  `password_reset_validity` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `admin_email` varchar(255) NOT NULL,
  `admin_live_preview_url` varchar(300) NOT NULL,
  `is_super_admin` tinyint(3) NOT NULL DEFAULT '0',
  `admin_created_by` bigint(30) NOT NULL DEFAULT '0',
  `admin_modified_by` bigint(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdil_lander_admin`
--

INSERT INTO `sdil_lander_admin` (`admin_id`, `full_name`, `cell_number`, `enabled`, `admin_password`, `admin_password_backup`, `password_expired`, `password_reset_code`, `password_reset_link`, `password_reset_validity`, `admin_email`, `admin_live_preview_url`, `is_super_admin`, `admin_created_by`, `admin_modified_by`) VALUES
(14, 'Addwordlbd', '', 0, 'a520d193bbe2c8e051745ea402e58164', 'em@123', 1, NULL, NULL, '2016-12-09 04:11:47', 'marafat_121@yahoo.com', 'http://localhost/lander/addwordlbd', 0, 0, 20),
(16, 'Md. Ibrahim Arafat', '', 1, '79bbc8c4ec44de719f8d49f006fd7f03', 'am@123', 1, NULL, NULL, '2016-12-09 04:17:53', 'ibrahim.arafat@sebpo.com', 'http://localhost/lander/md-ibrahim-arafat', 0, 0, 20),
(17, 'Aftab', '', 1, '71dfb34963f9e5cb6fbf00b26e6a608f', 'aftab@123', 1, NULL, NULL, '2016-12-09 07:15:33', 'aftab@hotmail.com', 'http://localhost:8888/lander/aftab', 0, 0, 20),
(20, 'Dr. Don Lander', '', 1, '611ee131a4b56c0e8e018a3521126682', NULL, 1, NULL, NULL, '2016-11-09 20:27:22', 'test@lander.com', 'http://localhost:8888/lander/', 1, 0, 0),
(22, 'Tesst', '', 1, 'd41d8cd98f00b204e9800998ecf8427e', '', 1, NULL, NULL, '2016-12-09 12:39:48', 'test@gmail.com', 'http://localhost:8888/lander/user/tesst', 0, 20, 20),
(25, 'Zabeer Bin Ibrahim', '', 1, '611ee131a4b56c0e8e018a3521126682', '', 1, NULL, NULL, '2016-12-09 12:06:34', 'zabeer@gmail.com', 'http://localhost:8888/lander/user/zabeer-bin-ibrahim', 0, 20, 20),
(27, 'Mohsin', '', 0, '611ee131a4b56c0e8e018a3521126682', 'arafat@123', 1, NULL, NULL, '2016-12-09 14:33:08', 'mohsin@gmail.com', 'http://localhost:8888/lander/user/mohsin', 0, 20, 0),
(28, 'Kamal', '', 1, 'fea1112bd5f32feb5e864b6fb38ead01', 'araat@123', 1, NULL, NULL, '2016-12-09 17:27:39', 'kamal@gmail.com', 'http://localhost/lander/user/kamal', 0, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `sdil_lander_country`
--

CREATE TABLE `sdil_lander_country` (
  `lander_country_id` bigint(20) NOT NULL,
  `lander_country_name` varchar(100) NOT NULL,
  `lander_country_code` varchar(20) NOT NULL,
  `lander_country_site_title` varchar(200) NOT NULL,
  `is_active` tinyint(5) NOT NULL,
  `is_country_reserved` tinyint(3) NOT NULL DEFAULT '0',
  `created_by` bigint(30) NOT NULL DEFAULT '0',
  `modified_by` bigint(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdil_lander_country`
--

INSERT INTO `sdil_lander_country` (`lander_country_id`, `lander_country_name`, `lander_country_code`, `lander_country_site_title`, `is_active`, `is_country_reserved`, `created_by`, `modified_by`) VALUES
(1, 'Bangladesh', 'BD', 'Your site title', 1, 1, 20, 0),
(3, 'Canada', 'CA', '', 1, 0, 0, 0),
(7, 'Australia', 'AU', 'Australian Title', 1, 0, 20, 20),
(12, 'Bangladesh', 'BD', '', 1, 1, 25, 0),
(14, 'Bangladesh', 'BD', '', 1, 1, 27, 0),
(15, 'Bangladesh', 'BD', '', 1, 1, 28, 0);

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
  `lander_image_is_active` tinyint(3) NOT NULL DEFAULT '0',
  `lander_image_created_by` bigint(30) NOT NULL DEFAULT '0',
  `lander_image_modified_by` bigint(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sdil_lander_country_wise_slider_image`
--

INSERT INTO `sdil_lander_country_wise_slider_image` (`lander_image_id`, `lander_image_file_name`, `lander_image_file_created`, `lander_image_file_modified`, `lander_image_country_id`, `lander_image_is_active`, `lander_image_created_by`, `lander_image_modified_by`) VALUES
(1, 'Third.jpg', '2016-11-11 22:27:08', '2016-12-05 22:05:05', 1, 1, 20, 20),
(2, 'First_iteam_addtion3.jpg', '2016-11-11 19:19:12', '2016-11-11 19:19:12', 2, 1, 0, 0),
(3, 'logo_bestcpaoffer.jpg', '2016-11-11 19:28:16', '2016-11-21 21:55:48', 1, 1, 20, 0),
(4, 'logo_large.png', '2016-11-11 19:28:16', '2016-11-21 21:55:59', 1, 1, 20, 0),
(5, 'logo_1.jpg', '2016-11-12 06:14:14', '2016-11-12 06:14:43', 2, 1, 0, 0),
(7, 'logo_large1.png', '2016-11-12 06:14:14', '2016-11-12 06:14:14', 2, 0, 0, 0),
(8, 'logo_output.jpg', '2016-11-12 06:14:14', '2016-11-12 06:14:14', 2, 0, 0, 0),
(9, 'Mockup_1.jpg', '2016-11-12 06:14:14', '2016-11-12 06:14:14', 2, 0, 0, 0),
(10, 'Mockup_2.jpg', '2016-11-12 06:14:14', '2016-11-12 06:14:14', 2, 0, 0, 0),
(11, '11254153_135938136765778_2686872344519394209_n(1).jpg', '2016-12-05 22:06:24', '2016-12-05 22:06:24', 7, 0, 20, 0),
(12, '11254153_135938136765778_2686872344519394209_n.jpg', '2016-12-05 22:06:24', '2016-12-05 22:06:24', 7, 0, 20, 0),
(13, '11405237_3687038351358260_1125949205_n.png', '2016-12-05 22:06:24', '2016-12-05 22:06:24', 7, 0, 20, 0),
(17, 'Iconic-Logo-Argos-Gold-Mart.jpg', '2016-12-09 14:57:00', '2016-12-09 14:57:31', 12, 1, 25, 25),
(18, 'silicon_sprint-1.png', '2016-12-09 14:57:00', '2016-12-09 14:57:40', 12, 1, 25, 25),
(19, 'We_need_4096MB_in_public_html:_directory.png', '2016-12-09 14:57:00', '2016-12-09 14:57:00', 12, 0, 25, 0),
(20, '12227137_135938240099101_1676753877941611711_n(1).jpg', '2016-12-09 18:29:29', '2016-12-09 18:29:29', 15, 1, 28, 0),
(21, '12227137_135938240099101_1676753877941611711_n.jpg', '2016-12-09 18:29:29', '2016-12-09 18:29:29', 15, 1, 28, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sdil_lander_device`
--

CREATE TABLE `sdil_lander_device` (
  `lander_device_id` bigint(20) NOT NULL,
  `lander_device_name` varchar(100) NOT NULL,
  `lander_device_code` varchar(50) NOT NULL,
  `lander_device_is_active` tinyint(3) NOT NULL DEFAULT '0',
  `lander_device_is_reserved` tinyint(3) NOT NULL DEFAULT '0',
  `lander_device_created_by` bigint(30) NOT NULL DEFAULT '0',
  `lander_device_modified_by` bigint(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdil_lander_device`
--

INSERT INTO `sdil_lander_device` (`lander_device_id`, `lander_device_name`, `lander_device_code`, `lander_device_is_active`, `lander_device_is_reserved`, `lander_device_created_by`, `lander_device_modified_by`) VALUES
(1, 'Mobile', 'mobile', 1, 1, 20, 0),
(2, 'Tab', 'tab', 1, 1, 20, 0),
(3, 'Desktop', 'desktop', 1, 1, 20, 0),
(5, 'Galaxy', 'galaxy', 1, 0, 20, 0),
(10, 'Mobile', 'mobile', 1, 1, 25, 0),
(11, 'Tab', 'tab', 1, 1, 25, 0),
(12, 'Desktop', 'desktop', 1, 1, 25, 0),
(16, 'Mobile', 'mobile', 1, 1, 27, 0),
(17, 'Tab', 'tab', 1, 1, 27, 0),
(18, 'Desktop', 'desktop', 1, 1, 27, 0),
(19, 'Mobile', 'mobile', 1, 1, 28, 0),
(20, 'Tab', 'tab', 1, 1, 28, 0),
(21, 'Desktop', 'desktop', 1, 1, 28, 0);

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
  `lander_last_btn_is_active` tinyint(3) NOT NULL DEFAULT '0',
  `lander_last_btn_created_by` bigint(30) NOT NULL DEFAULT '0',
  `lander_last_btn_modified_by` bigint(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sdil_lander_last_button_link`
--

INSERT INTO `sdil_lander_last_button_link` (`lander_last_btn_link_id`, `lander_last_btn_name`, `lander_last_btn_link_url`, `lander_last_btn_country_id`, `lander_last_btn_device_id`, `lander_last_btn_is_active`, `lander_last_btn_created_by`, `lander_last_btn_modified_by`) VALUES
(1, 'Continue', 'http://www.facebook.com', 1, 1, 1, 20, 0),
(2, 'Continue', 'http://www.google.com/', 2, 1, 0, 0, 0),
(3, 'Google', 'http://www.google.com//', 1, 3, 1, 20, 20),
(4, 'Twitter', 'http://www.twitter.com', 1, 2, 1, 20, 0),
(5, 'test', 'http://www.google.com/test', 7, 5, 0, 0, 0),
(6, 'test', 'http://www.google.com', 7, 5, 1, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sdil_lander_theme`
--

CREATE TABLE `sdil_lander_theme` (
  `lander_theme_id` bigint(30) NOT NULL,
  `lander_theme_name` varchar(30) NOT NULL,
  `lander_theme_color_code` varchar(30) NOT NULL,
  `lander_theme_css` longtext NOT NULL,
  `lander_theme_html` longtext NOT NULL,
  `lander_theme_js` longtext NOT NULL,
  `lander_theme_image_file_name` varchar(300) NOT NULL,
  `lander_theme_is_active` tinyint(3) NOT NULL,
  `lander_theme_add_bootstrap` tinyint(3) NOT NULL DEFAULT '0',
  `is_lander_theme_reserved` tinyint(3) NOT NULL DEFAULT '0',
  `lander_theme_created_by` bigint(30) NOT NULL DEFAULT '0',
  `lander_theme_modified_by` bigint(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdil_lander_theme`
--

INSERT INTO `sdil_lander_theme` (`lander_theme_id`, `lander_theme_name`, `lander_theme_color_code`, `lander_theme_css`, `lander_theme_html`, `lander_theme_js`, `lander_theme_image_file_name`, `lander_theme_is_active`, `lander_theme_add_bootstrap`, `is_lander_theme_reserved`, `lander_theme_created_by`, `lander_theme_modified_by`) VALUES
(1, 'Brown', '#db4c2c', '#sdil-lander-popup-wrapper, body, html {\n    width: 100%;\n    height: 100%\n}\n\nbody, html {\n    margin: 0;\n    padding: 0;\n    border: 0;\n    font-size: 100%\n}\n\nimg {\n    border: none\n}\n\n.hidden {\n    display: none\n}\n\nbody {\n    background: #fff;\n    font-family: Helvetica, Arial, sans-serif;\n    color: #fff;\n    background-size: cover\n}\n\n#sdil-lander-popup-wrapper {\n    position: fixed;\n    top: 0;\n    left: 0;\n    z-index: 10;\n}\n\n.sdil-lander-popup_alert {\n    position: relative;\n    width: 380px;\n    left: 50%;\n    top: 50%;\n    margin-left: -210px;\n    margin-top: -90px;\n    z-index: 100;\n    padding: 20px;\n    overflow: hidden;\n    background-color: #db4c2c;\n    border-radius: 10px;\n    box-shadow: 0 0 18px rgba(0, 0, 0, .4);\n    border: 11px solid #fff\n}\n\n.sdil-lander-popup_alert .top {\n    position: absolute;\n    left: -1px;\n    top: -1px;\n    width: 100%;\n    height: 22px;\n    padding: 8px 20px 6px 10px;\n    background: #db4c2c;\n    border: 1px solid #db4c2c\n}\n\n.sdil-lander-popup_alert .copy_area {\n    display: block;\n    padding-top: 0;\n    position: relative;\n    left: 8%;\n    width: 80%;\n    margin-bottom: 17px\n}\n\n.sdil-lander-popup_alert .copy_area h5 {\n    font-size: 22px;\n    margin: 10px 0 0\n}\n\n.sdil-lander-popup_alert .copy_area p {\n    font-size: 17px;\n    margin-top: 5px\n}\n\n.sdil-lander-popup_alert .navbtn {\n    margin-top: 10px;\n    width: 140px;\n    height: 70px;\n    border-radius: 4px !important;\n    border: 1px solid #fff;\n    background: #fff;\n    font-size: 18px;\n    cursor: pointer;\n    font-weight: 400\n}\n\n.radar_scanner {\n    display: block;\n    margin: 0 auto;\n    text-align: center;\n    height: 100%;\n    width: 100%;\n    color: #fff;\n    position: fixed\n}\n\nh3.radar_title {\n    font-size: 110%;\n    line-height: 100px\n}\n\n.circle1 {\n    color: #000;\n    background: #e7e7e7\n}\n\n.circle2 {\n    color: rgba(255, 255, 255, .8);\n    background: #555;\n    text-shadow: 0 1px #666\n}\n\n.circle1, .circle2 {\n    font-weight: 400;\n    margin-left: 0;\n    font-size: 23px;\n    border-radius: 100px;\n    padding: 5px 15px\n}\n\n.box, .marker_show {\n    background: #fff;\n    color: #000;\n    outline: 0;\n    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);\n    box-shadow: 0 5px 15px rgba(0, 0, 0, .5);\n    width: 600px;\n    position: absolute;\n    left: 50%;\n    top: 50%;\n    margin-top: -185px;\n    margin-left: -300px;\n    line-height: 28px;\n    font-size: 22px;\n    text-align: center\n}\n\n.box {\n    display: none\n}\n\n.box .ok, .buttons {\n    background-color: #db4c2c;\n    border: 0;\n    color: #fff;\n    cursor: pointer;\n    font-size: 30px;\n    width: 40%;\n    min-width: 200px;\n    padding: 15px 0;\n    margin: 20px auto;\n    border-radius: 4px;\n    display: block;\n    text-align: center;\n    text-decoration: none\n}\n\n.boxheader {\n    background: #db4c2c;\n    width: 100%;\n    min-height: 20px;\n    color: #fff;\n    font-size: 23px;\n    padding: 22px 0;\n    margin: 0 auto;\n    text-align: center\n}\n\n.box_copy {\n    padding: 10px 30px 20px;\n    text-align: left\n}\n\n.stepinfo {\n    font-size: 18px;\n    margin: 10px 0;\n    text-align: center\n}\n\n#agree, .next {\n    text-align: center;\n    font-size: 30px;\n    padding: 10px;\n    display: inline-block;\n    width: 40%;\n    background: #db4c2c;\n    text-decoration: none;\n    color: #fff;\n    margin-right: -6px;\n    border-radius: 4px 0 0 4px;\n    margin-bottom: 20px;\n    font-weight: 700\n}\n\n.next.step_button_2 {\n    background: #56575B;\n    color: #fff;\n    border-radius: 0 4px 4px 0\n}\n\n.option, .option2, .option3, .option4 {\n    width: 60%;\n    padding: 10px;\n    text-align: left;\n    cursor: pointer;\n    margin: 0 auto 5px;\n    background: url("<?php echo base_url(); ?>images/unchecked_checkbox.png") 10px center no-repeat\n}\n\n.selected, .selected2, .selected3, .selected4 {\n    background: url("<?php echo base_url(); ?>images/checked_checkbox.png") 10px center no-repeat\n}\n\n.option-title {\n    color: #000;\n    display: block;\n    padding: 0;\n    margin-left: 50px\n}\n\n@media screen and (max-width: 640px) {\n    .box, .marker_show {\n        width: 95%;\n        left: 0;\n        margin: -200px 2.5%\n    }\n}\n\n@media screen and (max-width: 480px) {\n    .sdil-lander-popup_alert {\n        width: 80%;\n        left: 0;\n        margin: -90px 6%\n    }\n\n    .box, .marker_show {\n        font-size: 20px;\n        line-height: 25px\n    }\n\n    #radar img, .option, .option2, .option3, .option4 {\n        width: 80%\n    }\n\n    h3.radar_title {\n        margin-bottom: -20px\n    }\n\n    .box_copy {\n        padding: 10px\n    }\n\n    .boxheader {\n        font-size: 22px\n    }\n}', '<body>\r\n<div id="pageBackground">\r\n    <?php\r\n    if ($not_enabled) { ?>\r\n    <div class="alert alert-danger alert-dismissible fade in" role="alert">\r\n        <button type="button" class="close" data-dismiss="alert" aria-label="Close">\r\n            <span aria-hidden="true">×</span>\r\n        </button>\r\n        <strong><?php echo $not_enabled; ?></strong>\r\n    </div>\r\n    <?php } ?>\r\n\r\n    <div id="sdil-lander-popup-wrapper">\r\n        <div id="popup" class="sdil-lander-popup_alert">\r\n            <div class="top"></div>\r\n            <div class="alert_icon"></div>\r\n            <div class="copy_area">\r\n                <h5><?php echo $full_name; ?> 23 wants to share her Nude private pictures with you.</h5>\r\n                <p>Do you accept?</p>\r\n                <button class="navbtn popup-close"><span>YES</span>\r\n                </button>\r\n                <button class="navbtn popup-close"><span>NO</span>\r\n                </button>\r\n            </div>\r\n        </div>\r\n    </div>\r\n    <div class="radar_scanner hidden">\r\n    </div>\r\n</div>\r\n\r\n<div class="wrapper">\r\n    <div id="final" class="results marker_show hidden">\r\n        <h3 class="boxheader">Thank you.</h3>\r\n        <div class="box_copy">You may now see our list and photos of women who are in your area. Again, please keep\r\n            their identity a secret.\r\n            <p>Click on the "Continue" button and search on the basis of your answers.</p>\r\n            <!------------------------------------------------------\r\n              ------------------------------------------------------\r\n                Code block for device detection - start\r\n              ------------------------------------------------------\r\n              -------------------------------------------------------->\r\n            <?php\r\n            $final_url = $button_link_by_device_country[''lander_last_btn_link_url''];\r\n            ?>\r\n            <a class="steps-button-agree buttons" href="<?php echo $final_url; ?>"><?php echo $button_link_by_device_country[''lander_last_btn_name'']; ?></a>\r\n            <!------------------------------------------------------\r\n              ------------------------------------------------------\r\n                Code block for device detection - End\r\n              ------------------------------------------------------\r\n              -------------------------------------------------------->\r\n        </div>\r\n    </div>\r\n</div>', 'function clear_delay(timeoutID_here) {\n        window.clearTimeout(timeoutID_here);\n    }\n    /* Run 1 */\n    function run_loading_run_1(time_delay) {\n        timeoutID1 = window.setTimeout(run_loading_1, time_delay);\n    }\n\n    function run_loading_1() {\n        $(''.thank_for_close, .run_loading_2'').fadeIn();\n        $(''.main_review'').hide();\n    }\n    /* Run 2 */\n    function run_loading_run_2(time_delay) {\n        timeoutID2 = window.setTimeout(run_loading_2, time_delay);\n    }\n\n    function run_loading_2() {\n        $(''.thank_for_close, .run_loading_2'').hide();\n        $(''.run_loading_3, .li_run_loading_1, .li_run_loading_2'').fadeIn();\n    }\n    /* Run 3 */\n    function run_loading_run_3(time_delay) {\n        timeoutID3 = window.setTimeout(run_loading_3, time_delay);\n    }\n\n    function run_loading_3() {\n        $(''.run_loading_3'').hide();\n        $(''.run_loading_4, .li_run_loading_3'').fadeIn();\n    }\n    /* Run 4 */\n    function run_loading_run_4(time_delay) {\n        timeoutID3 = window.setTimeout(run_loading_4, time_delay);\n    }\n\n    function run_loading_4() {\n        $(''.run_loading_4, .loading'').hide();\n        $(''.li_run_loading_4, .li_run_loading_5, .run_loading_5, .show_end'').fadeIn();\n    }\n    $(function () {\n        $(document).on(''click'', ''.next'', function (e) {\n            e.preventDefault();\n            $(this).parent().hide().next().fadeIn();\n\n        });\n        $(document).on(''click'', ''.run_loading'', function (e) {\n            e.preventDefault();\n            $(this).parent().hide().next().fadeIn();\n            $(''.step4 .loading'').show();\n            run_loading_run_1(''1000'');\n            run_loading_run_2(''2250'');\n            run_loading_run_3(''3000'');\n            run_loading_run_4(''4000'');\n\n            window[''optimizely''] = window[''optimizely''] || [];\n            window.optimizely.push(["", ""]);\n        });\n    });\n    $(function () {\n\n        $(".popup-close").on(''click'', function () {\n            $("#sdil-lander-popup-wrapper").fadeOut();\n            $(''.radar_scanner'').fadeIn(400, function () {\n                $(this).delay(100).fadeOut(300, function () {\n                    //$("#popup2").fadeIn(300);\n                    $(".results").fadeIn(400);\n                });\n            });\n        });\n\n        $(".ok").on(''click'', function () {\n            $("#popup2").fadeOut();\n            $(".step1").fadeIn();\n        });\n\n        $(".next").on(''click'', function () {\n            $(this).parent().hide().next().fadeIn();\n        });\n\n        $(".steps-button").on(''click'', function () {\n            $(this).parent().hide().next().fadeIn();\n        });\n\n        $(".option, .option1, .option2, .option3, .option4").on(''click'', function () {\n            if ($(this).hasClass(''selected''))\n                $(this).removeClass(''selected'');\n            else\n            // if (.option.selected.length < 3) BUT .option has to be as first element in class="...\n            if ($(''.'' + $(this).attr(''class'').split('' '')[0] + ''.selected'').length < 3)\n                $(this).addClass(''selected'');\n        });\n\n        $(".steps-button-final").on(''click'', function () {\n            $(".step8").fadeOut();\n            $(".results").fadeIn();\n        });\n    });\n\n\n    $("#example, body").vegas({\n        delay: 3500,\n        timer: false,\n        shuffle: true,\n        timer: true,\n        transition: ''fade'',\n        transitionDuration: 3000,\n        slides: [\n            <?php\n            if (isset($single_country_image_slider) && $single_country_image_slider->num_rows() > 0) {\n                foreach ($single_country_image_slider->result() as $row): ?>\n            {\n                src: "<?php echo base_url(); ?>uploaded/lander_slider_images/<?php echo $row->lander_image_file_name; ?>"\n            },\n            <?php\n                endforeach;\n            }\n            ?>\n        ]\n    });', '', 1, 0, 0, 20, 20),
(2, 'Pink', '#ff0060', '#sdil-lander-popup-wrapper, body, html {\n    width: 100%;\n    height: 100%\n}\n\nbody, html {\n    margin: 0;\n    padding: 0;\n    border: 0;\n    font-size: 100%\n}\n\nimg {\n    border: none\n}\n\n.hidden {\n    display: none\n}\n\nbody {\n    background: #fff;\n    font-family: Helvetica, Arial, sans-serif;\n    color: #ff0060;\n    background-size: cover\n}\n\n#sdil-lander-popup-wrapper {\n    position: fixed;\n    top: 0;\n    left: 0;\n    z-index: 10;\n}\n\n.sdil-lander-popup_alert {\n    position: relative;\n    width: 380px;\n    left: 50%;\n    top: 50%;\n    margin-left: -210px;\n    margin-top: -90px;\n    z-index: 100;\n    padding: 20px;\n    overflow: hidden;\n    background: rgba(225,225,225,.8);\n    border-radius: 10px;\n    box-shadow: 0 0 18px rgba(156, 32, 109, 0.4);\n    border: 11px solid #ff0060;\n}\n\n.sdil-lander-popup_alert .copy_area {\n    display: block;\n    padding-top: 0;\n    position: relative;\n    left: 8%;\n    width: 80%;\n    margin-bottom: 17px\n}\n\n.sdil-lander-popup_alert .copy_area h5 {\n    font-size: 22px;\n    margin: 10px 0 0\n}\n\n.sdil-lander-popup_alert .copy_area p {\n    font-size: 17px;\n    margin-top: 5px\n}\n\n.sdil-lander-popup_alert .navbtn {\n    margin-top: 10px;\n    width: 140px;\n    height: 70px;\n    border-radius: 9px !important;\n    border: 4px solid #ff0060;\n    background: #fff;\n    font-size: 20px;\n    cursor: pointer;\n    font-weight: 600;\n    color: #ff0060;\n}\n\n.radar_scanner {\n    display: block;\n    margin: 0 auto;\n    text-align: center;\n    height: 100%;\n    width: 100%;\n    color: #fff;\n    position: fixed;\n}\n\nh3.radar_title {\n    font-size: 110%;\n    line-height: 100px\n}\n\n.circle1 {\n    color: #ff0060;\n    background: #fff;\n}\n\n.circle2 {\n    color: rgba(255, 255, 255, .8);\n    background: #555;\n    text-shadow: 0 1px #666\n}\n\n.circle1, .circle2 {\n    font-weight: 400;\n    margin-left: 0;\n    font-size: 23px;\n    border-radius: 100px;\n    padding: 5px 15px\n}\n\n.box, .marker_show {\n    background: rgba(225,225,225,1);\n    border-radius: 10px;\n    color: #ff0060;\n    border: 4px solid #ff0060;\n    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);\n    box-shadow: 0 5px 15px rgba(0, 0, 0, .5);\n    width: 600px;\n    position: absolute;\n    left: 50%;\n    top: 50%;\n    margin-top: -185px;\n    margin-left: -300px;\n    line-height: 28px;\n    font-size: 22px;\n    text-align: center;\n    font-weight: 300;\n}\n\n.box {\n    display: none\n}\n\n.box .ok, .buttons {\n    background-color: #fff;\n    color: #ff0060;\n    cursor: pointer;\n    font-size: 30px;\n    width: 40%;\n    min-width: 200px;\n    padding: 15px 0;\n    margin: 20px auto;\n    border-radius: 6px;\n    display: block;\n    text-align: center;\n    text-decoration: none;\n    border: 4px solid #ff0060;\n}\n\n.boxheader {\n    background: #ff0060;\n    width: 100%;\n    min-height: 20px;\n    color: #fff;\n    font-size: 23px;\n    padding: 22px 0;\n    margin: 0 auto;\n    text-align: center\n}\n\n.box_copy {\n    padding: 10px 30px 20px;\n    text-align: left;\n}\n\n.stepinfo {\n    font-size: 18px;\n    margin: 10px 0;\n    text-align: center\n}\n\n#agree, .next {\n    text-align: center;\n    font-size: 30px;\n    padding: 12px;\n    display: inline-block;\n    width: 40%;\n    background: #ff0060;\n    text-decoration: none;\n    color: #fff;\n    margin-right: -6px;\n    border-radius: 4px 0 0 4px;\n    margin-bottom: 20px;\n    font-weight: 700\n}\n\n.next.step_button_2 {\n    background: #56575B;\n    color: #fff;\n    border-radius: 0 4px 4px 0\n}\n\n.option, .option2, .option3, .option4 {\n    width: 60%;\n    padding: 5px;\n    text-align: left;\n    cursor: pointer;\n    margin: 0 auto 5px;\n    background: url("http://localhost/lander/images/unchecked_checkbox.png") 10px center no-repeat\n}\n\n.selected, .selected2, .selected3, .selected4 {\n    background: url("http://localhost/lander/images/checked_checkbox.png") 10px center no-repeat\n}\n\n.option-title {\n    color: #eb0060;\n    display: block;\n    padding: 0;\n    margin-left: 50px\n}\n\n@media screen and (max-width: 640px) {\n    .box, .marker_show {\n        width: 95%;\n        left: 0;\n        margin: -200px 2.5%\n    }\n}\n\n@media screen and (max-width: 480px) {\n    .sdil-lander-popup_alert {\n        width: 80%;\n        left: 0;\n        margin: -90px 6%\n    }\n\n    .box, .marker_show {\n        font-size: 20px;\n        line-height: 25px\n    }\n\n    #radar img, .option, .option2, .option3, .option4 {\n        width: 80%\n    }\n\n    h3.radar_title {\n        margin-bottom: -20px\n    }\n\n    .box_copy {\n        padding: 10px\n    }\n\n    .boxheader {\n        font-size: 22px\n    }\n}', '', '', '', 1, 0, 0, 20, 20),
(5, 'Pink', '#ff0060', '#sdil-lander-popup-wrapper, body, html {\n    width: 100%;\n    height: 100%\n}\n\nbody, html {\n    margin: 0;\n    padding: 0;\n    border: 0;\n    font-size: 100%\n}\n\nimg {\n    border: none\n}\n\n.hidden {\n    display: none\n}\n\nbody {\n    background: #fff;\n    font-family: Helvetica, Arial, sans-serif;\n    color: #ff0060;\n    background-size: cover\n}\n\n#sdil-lander-popup-wrapper {\n    position: fixed;\n    top: 0;\n    left: 0;\n    z-index: 10;\n}\n\n.sdil-lander-popup_alert {\n    position: relative;\n    width: 380px;\n    left: 50%;\n    top: 50%;\n    margin-left: -210px;\n    margin-top: -90px;\n    z-index: 100;\n    padding: 20px;\n    overflow: hidden;\n    background: rgba(225,225,225,.8);\n    border-radius: 10px;\n    box-shadow: 0 0 18px rgba(156, 32, 109, 0.4);\n    border: 11px solid #ff0060;\n}\n\n.sdil-lander-popup_alert .copy_area {\n    display: block;\n    padding-top: 0;\n    position: relative;\n    left: 8%;\n    width: 80%;\n    margin-bottom: 17px\n}\n\n.sdil-lander-popup_alert .copy_area h5 {\n    font-size: 22px;\n    margin: 10px 0 0\n}\n\n.sdil-lander-popup_alert .copy_area p {\n    font-size: 17px;\n    margin-top: 5px\n}\n\n.sdil-lander-popup_alert .navbtn {\n    margin-top: 10px;\n    width: 140px;\n    height: 70px;\n    border-radius: 9px !important;\n    border: 4px solid #ff0060;\n    background: #fff;\n    font-size: 20px;\n    cursor: pointer;\n    font-weight: 600;\n    color: #ff0060;\n}\n\n.radar_scanner {\n    display: block;\n    margin: 0 auto;\n    text-align: center;\n    height: 100%;\n    width: 100%;\n    color: #fff;\n    position: fixed;\n}\n\nh3.radar_title {\n    font-size: 110%;\n    line-height: 100px\n}\n\n.circle1 {\n    color: #ff0060;\n    background: #fff;\n}\n\n.circle2 {\n    color: rgba(255, 255, 255, .8);\n    background: #555;\n    text-shadow: 0 1px #666\n}\n\n.circle1, .circle2 {\n    font-weight: 400;\n    margin-left: 0;\n    font-size: 23px;\n    border-radius: 100px;\n    padding: 5px 15px\n}\n\n.box, .marker_show {\n    background: rgba(225,225,225,1);\n    border-radius: 10px;\n    color: #ff0060;\n    border: 4px solid #ff0060;\n    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);\n    box-shadow: 0 5px 15px rgba(0, 0, 0, .5);\n    width: 600px;\n    position: absolute;\n    left: 50%;\n    top: 50%;\n    margin-top: -185px;\n    margin-left: -300px;\n    line-height: 28px;\n    font-size: 22px;\n    text-align: center;\n    font-weight: 300;\n}\n\n.box {\n    display: none\n}\n\n.box .ok, .buttons {\n    background-color: #fff;\n    color: #ff0060;\n    cursor: pointer;\n    font-size: 30px;\n    width: 40%;\n    min-width: 200px;\n    padding: 15px 0;\n    margin: 20px auto;\n    border-radius: 6px;\n    display: block;\n    text-align: center;\n    text-decoration: none;\n    border: 4px solid #ff0060;\n}\n\n.boxheader {\n    background: #ff0060;\n    width: 100%;\n    min-height: 20px;\n    color: #fff;\n    font-size: 23px;\n    padding: 22px 0;\n    margin: 0 auto;\n    text-align: center\n}\n\n.box_copy {\n    padding: 10px 30px 20px;\n    text-align: left;\n}\n\n.stepinfo {\n    font-size: 18px;\n    margin: 10px 0;\n    text-align: center\n}\n\n#agree, .next {\n    text-align: center;\n    font-size: 30px;\n    padding: 12px;\n    display: inline-block;\n    width: 40%;\n    background: #ff0060;\n    text-decoration: none;\n    color: #fff;\n    margin-right: -6px;\n    border-radius: 4px 0 0 4px;\n    margin-bottom: 20px;\n    font-weight: 700\n}\n\n.next.step_button_2 {\n    background: #56575B;\n    color: #fff;\n    border-radius: 0 4px 4px 0\n}\n\n.option, .option2, .option3, .option4 {\n    width: 60%;\n    padding: 5px;\n    text-align: left;\n    cursor: pointer;\n    margin: 0 auto 5px;\n    background: url("http://localhost/lander/images/unchecked_checkbox.png") 10px center no-repeat\n}\n\n.selected, .selected2, .selected3, .selected4 {\n    background: url("http://localhost/lander/images/checked_checkbox.png") 10px center no-repeat\n}\n\n.option-title {\n    color: #eb0060;\n    display: block;\n    padding: 0;\n    margin-left: 50px\n}\n\n@media screen and (max-width: 640px) {\n    .box, .marker_show {\n        width: 95%;\n        left: 0;\n        margin: -200px 2.5%\n    }\n}\n\n@media screen and (max-width: 480px) {\n    .sdil-lander-popup_alert {\n        width: 80%;\n        left: 0;\n        margin: -90px 6%\n    }\n\n    .box, .marker_show {\n        font-size: 20px;\n        line-height: 25px\n    }\n\n    #radar img, .option, .option2, .option3, .option4 {\n        width: 80%\n    }\n\n    h3.radar_title {\n        margin-bottom: -20px\n    }\n\n    .box_copy {\n        padding: 10px\n    }\n\n    .boxheader {\n        font-size: 22px\n    }\n}', '', '', '', 1, 0, 1, 25, 0),
(7, 'Pink', '#ff0060', '#sdil-lander-popup-wrapper, body, html {\n    width: 100%;\n    height: 100%\n}\n\nbody, html {\n    margin: 0;\n    padding: 0;\n    border: 0;\n    font-size: 100%\n}\n\nimg {\n    border: none\n}\n\n.hidden {\n    display: none\n}\n\nbody {\n    background: #fff;\n    font-family: Helvetica, Arial, sans-serif;\n    color: #ff0060;\n    background-size: cover\n}\n\n#sdil-lander-popup-wrapper {\n    position: fixed;\n    top: 0;\n    left: 0;\n    z-index: 10;\n}\n\n.sdil-lander-popup_alert {\n    position: relative;\n    width: 380px;\n    left: 50%;\n    top: 50%;\n    margin-left: -210px;\n    margin-top: -90px;\n    z-index: 100;\n    padding: 20px;\n    overflow: hidden;\n    background: rgba(225,225,225,.8);\n    border-radius: 10px;\n    box-shadow: 0 0 18px rgba(156, 32, 109, 0.4);\n    border: 11px solid #ff0060;\n}\n\n.sdil-lander-popup_alert .copy_area {\n    display: block;\n    padding-top: 0;\n    position: relative;\n    left: 8%;\n    width: 80%;\n    margin-bottom: 17px\n}\n\n.sdil-lander-popup_alert .copy_area h5 {\n    font-size: 22px;\n    margin: 10px 0 0\n}\n\n.sdil-lander-popup_alert .copy_area p {\n    font-size: 17px;\n    margin-top: 5px\n}\n\n.sdil-lander-popup_alert .navbtn {\n    margin-top: 10px;\n    width: 140px;\n    height: 70px;\n    border-radius: 9px !important;\n    border: 4px solid #ff0060;\n    background: #fff;\n    font-size: 20px;\n    cursor: pointer;\n    font-weight: 600;\n    color: #ff0060;\n}\n\n.radar_scanner {\n    display: block;\n    margin: 0 auto;\n    text-align: center;\n    height: 100%;\n    width: 100%;\n    color: #fff;\n    position: fixed;\n}\n\nh3.radar_title {\n    font-size: 110%;\n    line-height: 100px\n}\n\n.circle1 {\n    color: #ff0060;\n    background: #fff;\n}\n\n.circle2 {\n    color: rgba(255, 255, 255, .8);\n    background: #555;\n    text-shadow: 0 1px #666\n}\n\n.circle1, .circle2 {\n    font-weight: 400;\n    margin-left: 0;\n    font-size: 23px;\n    border-radius: 100px;\n    padding: 5px 15px\n}\n\n.box, .marker_show {\n    background: rgba(225,225,225,1);\n    border-radius: 10px;\n    color: #ff0060;\n    border: 4px solid #ff0060;\n    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);\n    box-shadow: 0 5px 15px rgba(0, 0, 0, .5);\n    width: 600px;\n    position: absolute;\n    left: 50%;\n    top: 50%;\n    margin-top: -185px;\n    margin-left: -300px;\n    line-height: 28px;\n    font-size: 22px;\n    text-align: center;\n    font-weight: 300;\n}\n\n.box {\n    display: none\n}\n\n.box .ok, .buttons {\n    background-color: #fff;\n    color: #ff0060;\n    cursor: pointer;\n    font-size: 30px;\n    width: 40%;\n    min-width: 200px;\n    padding: 15px 0;\n    margin: 20px auto;\n    border-radius: 6px;\n    display: block;\n    text-align: center;\n    text-decoration: none;\n    border: 4px solid #ff0060;\n}\n\n.boxheader {\n    background: #ff0060;\n    width: 100%;\n    min-height: 20px;\n    color: #fff;\n    font-size: 23px;\n    padding: 22px 0;\n    margin: 0 auto;\n    text-align: center\n}\n\n.box_copy {\n    padding: 10px 30px 20px;\n    text-align: left;\n}\n\n.stepinfo {\n    font-size: 18px;\n    margin: 10px 0;\n    text-align: center\n}\n\n#agree, .next {\n    text-align: center;\n    font-size: 30px;\n    padding: 12px;\n    display: inline-block;\n    width: 40%;\n    background: #ff0060;\n    text-decoration: none;\n    color: #fff;\n    margin-right: -6px;\n    border-radius: 4px 0 0 4px;\n    margin-bottom: 20px;\n    font-weight: 700\n}\n\n.next.step_button_2 {\n    background: #56575B;\n    color: #fff;\n    border-radius: 0 4px 4px 0\n}\n\n.option, .option2, .option3, .option4 {\n    width: 60%;\n    padding: 5px;\n    text-align: left;\n    cursor: pointer;\n    margin: 0 auto 5px;\n    background: url("http://localhost/lander/images/unchecked_checkbox.png") 10px center no-repeat\n}\n\n.selected, .selected2, .selected3, .selected4 {\n    background: url("http://localhost/lander/images/checked_checkbox.png") 10px center no-repeat\n}\n\n.option-title {\n    color: #eb0060;\n    display: block;\n    padding: 0;\n    margin-left: 50px\n}\n\n@media screen and (max-width: 640px) {\n    .box, .marker_show {\n        width: 95%;\n        left: 0;\n        margin: -200px 2.5%\n    }\n}\n\n@media screen and (max-width: 480px) {\n    .sdil-lander-popup_alert {\n        width: 80%;\n        left: 0;\n        margin: -90px 6%\n    }\n\n    .box, .marker_show {\n        font-size: 20px;\n        line-height: 25px\n    }\n\n    #radar img, .option, .option2, .option3, .option4 {\n        width: 80%\n    }\n\n    h3.radar_title {\n        margin-bottom: -20px\n    }\n\n    .box_copy {\n        padding: 10px\n    }\n\n    .boxheader {\n        font-size: 22px\n    }\n}', '', '', '', 1, 0, 1, 27, 0),
(8, 'Pink', '#ff0060', '#sdil-lander-popup-wrapper, body, html {\n    width: 100%;\n    height: 100%\n}\n\nbody, html {\n    margin: 0;\n    padding: 0;\n    border: 0;\n    font-size: 100%\n}\n\nimg {\n    border: none\n}\n\n.hidden {\n    display: none\n}\n\nbody {\n    background: #fff;\n    font-family: Helvetica, Arial, sans-serif;\n    color: #ff0060;\n    background-size: cover\n}\n\n#sdil-lander-popup-wrapper {\n    position: fixed;\n    top: 0;\n    left: 0;\n    z-index: 10;\n}\n\n.sdil-lander-popup_alert {\n    position: relative;\n    width: 380px;\n    left: 50%;\n    top: 50%;\n    margin-left: -210px;\n    margin-top: -90px;\n    z-index: 100;\n    padding: 20px;\n    overflow: hidden;\n    background: rgba(225,225,225,.8);\n    border-radius: 10px;\n    box-shadow: 0 0 18px rgba(156, 32, 109, 0.4);\n    border: 11px solid #ff0060;\n}\n\n.sdil-lander-popup_alert .copy_area {\n    display: block;\n    padding-top: 0;\n    position: relative;\n    left: 8%;\n    width: 80%;\n    margin-bottom: 17px\n}\n\n.sdil-lander-popup_alert .copy_area h5 {\n    font-size: 22px;\n    margin: 10px 0 0\n}\n\n.sdil-lander-popup_alert .copy_area p {\n    font-size: 17px;\n    margin-top: 5px\n}\n\n.sdil-lander-popup_alert .navbtn {\n    margin-top: 10px;\n    width: 140px;\n    height: 70px;\n    border-radius: 9px !important;\n    border: 4px solid #ff0060;\n    background: #fff;\n    font-size: 20px;\n    cursor: pointer;\n    font-weight: 600;\n    color: #ff0060;\n}\n\n.radar_scanner {\n    display: block;\n    margin: 0 auto;\n    text-align: center;\n    height: 100%;\n    width: 100%;\n    color: #fff;\n    position: fixed;\n}\n\nh3.radar_title {\n    font-size: 110%;\n    line-height: 100px\n}\n\n.circle1 {\n    color: #ff0060;\n    background: #fff;\n}\n\n.circle2 {\n    color: rgba(255, 255, 255, .8);\n    background: #555;\n    text-shadow: 0 1px #666\n}\n\n.circle1, .circle2 {\n    font-weight: 400;\n    margin-left: 0;\n    font-size: 23px;\n    border-radius: 100px;\n    padding: 5px 15px\n}\n\n.box, .marker_show {\n    background: rgba(225,225,225,1);\n    border-radius: 10px;\n    color: #ff0060;\n    border: 4px solid #ff0060;\n    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);\n    box-shadow: 0 5px 15px rgba(0, 0, 0, .5);\n    width: 600px;\n    position: absolute;\n    left: 50%;\n    top: 50%;\n    margin-top: -185px;\n    margin-left: -300px;\n    line-height: 28px;\n    font-size: 22px;\n    text-align: center;\n    font-weight: 300;\n}\n\n.box {\n    display: none\n}\n\n.box .ok, .buttons {\n    background-color: #fff;\n    color: #ff0060;\n    cursor: pointer;\n    font-size: 30px;\n    width: 40%;\n    min-width: 200px;\n    padding: 15px 0;\n    margin: 20px auto;\n    border-radius: 6px;\n    display: block;\n    text-align: center;\n    text-decoration: none;\n    border: 4px solid #ff0060;\n}\n\n.boxheader {\n    background: #ff0060;\n    width: 100%;\n    min-height: 20px;\n    color: #fff;\n    font-size: 23px;\n    padding: 22px 0;\n    margin: 0 auto;\n    text-align: center\n}\n\n.box_copy {\n    padding: 10px 30px 20px;\n    text-align: left;\n}\n\n.stepinfo {\n    font-size: 18px;\n    margin: 10px 0;\n    text-align: center\n}\n\n#agree, .next {\n    text-align: center;\n    font-size: 30px;\n    padding: 12px;\n    display: inline-block;\n    width: 40%;\n    background: #ff0060;\n    text-decoration: none;\n    color: #fff;\n    margin-right: -6px;\n    border-radius: 4px 0 0 4px;\n    margin-bottom: 20px;\n    font-weight: 700\n}\n\n.next.step_button_2 {\n    background: #56575B;\n    color: #fff;\n    border-radius: 0 4px 4px 0\n}\n\n.option, .option2, .option3, .option4 {\n    width: 60%;\n    padding: 5px;\n    text-align: left;\n    cursor: pointer;\n    margin: 0 auto 5px;\n    background: url("http://localhost/lander/images/unchecked_checkbox.png") 10px center no-repeat\n}\n\n.selected, .selected2, .selected3, .selected4 {\n    background: url("http://localhost/lander/images/checked_checkbox.png") 10px center no-repeat\n}\n\n.option-title {\n    color: #eb0060;\n    display: block;\n    padding: 0;\n    margin-left: 50px\n}\n\n@media screen and (max-width: 640px) {\n    .box, .marker_show {\n        width: 95%;\n        left: 0;\n        margin: -200px 2.5%\n    }\n}\n\n@media screen and (max-width: 480px) {\n    .sdil-lander-popup_alert {\n        width: 80%;\n        left: 0;\n        margin: -90px 6%\n    }\n\n    .box, .marker_show {\n        font-size: 20px;\n        line-height: 25px\n    }\n\n    #radar img, .option, .option2, .option3, .option4 {\n        width: 80%\n    }\n\n    h3.radar_title {\n        margin-bottom: -20px\n    }\n\n    .box_copy {\n        padding: 10px\n    }\n\n    .boxheader {\n        font-size: 22px\n    }\n}', '', '', '', 1, 0, 1, 28, 0),
(10, 'Snap', '#453939', 'body {\r\n  background: #202020;\r\n background-size: auto;\r\n}\r\n\r\n.client-part {\r\n	margin: 30px auto;\r\n	width: 80%;\r\n}\r\n.snaphead h6 {\r\n  background: #333 none repeat scroll 0 0;\r\n  color: #ff0000;\r\n  margin: 0;\r\n  padding: 15px 0;\r\n}\r\n.snaphead span {\r\n  color: #fff;\r\n  font-size: 16px;\r\n  font-weight: bold;\r\n  line-height: 1.5;\r\n  position: relative;\r\n}\r\n.snaphead span::before {\r\n  content: url("<?php echo base_url(); ?>/images/icon.png");\r\n  left: -35px;\r\n  top: -7px;\r\n  position: absolute;\r\n}\r\n.snapbody {\r\n	background: #EFEC80;\r\n	padding-bottom: 220px;\r\n}\r\n.snapbody h2 {\r\n  color: #000;\r\n  font-weight: bold;\r\n  margin: 0;\r\n  padding: 15px 0;\r\n}\r\n.snapbody h4 {\r\n  margin: 15px 0;\r\n}\r\n.snapbody span {\r\n  color: #ED0A5F;\r\n  font-weight: bold;\r\n}\r\n.snapbody img {\r\n  width: 25%;\r\n  margin: 0 auto;\r\n  border: 2px solid #ddd;\r\n  border-radius: 15px;\r\n}\r\n.custom-btn {\r\n  padding: 10px 0;\r\n  width: 50%;\r\n  background: #29ACE0;\r\n  color: #fff;\r\n  font-weight: bold;\r\n  font-size: 20px;\r\n  border: 0px;\r\n}\r\n.custom-btn:hover {\r\n  background: #00BFF3;\r\n}\r\n@media only screen and (max-width: 767px) {\r\n	.snapbody {\r\n    background: #EFEC80;\r\n    padding-bottom: 18px;\r\n  }\r\n  .snapbody img {\r\n		width: 40%;\r\n	}\r\n	.custom-btn {\r\n		padding: 8px 0;\r\n		width: 80%;\r\n	}\r\n  .client-part {\r\n    margin: 5px auto;\r\n    width: 80%;\r\n  }\r\n}\r\n@media only screen and (min-width: 320px) and (max-width: 480px) {\r\n  .snapbody h2 {\r\n    font-size: 16px;\r\n  }\r\n  .snapbody h4 {\r\n    font-size: 15px;\r\n    line-height: 1.5;\r\n  }\r\n  .snapbody img {\r\n    width: 70%;\r\n  }\r\n  .client-part {\r\n    margin: 5px auto;\r\n    width: 80%;\r\n  }\r\n}', '<body>\n  <div class="container">\n    <div class="row">\n      <div class="col-sm-12">\n        <div class="client-part  text-center">\n          <div class="snaphead">\n            <h6><span>SnapSex</span></h6>\n          </div>\n          <div class="snapbody text-center">\n            <h2>This is NOT a dating site!</h2>\n            <img src="<?php echo base_url(); ?>uploaded/lander_theme_images/<?php echo $lander_theme_parameters[''lander_theme_image_file_name''] ?$lander_theme_parameters[''lander_theme_image_file_name''] : ''blank_person.png''; ?>" alt="top-img" class="img-responsive">\n            <h4><span>WARNING!</span> You will nude photos. Please be discreet.</h4>\n            <div id="test">\n              <div id="sdil-lander-popup-wrapper">\n                <button  class="popup-close btn btn-success custom-btn">OK</button>\n              </div>\n            </div>\n            <div id="results" style="display:none;">\n              <?php\n            $final_url = $button_link_by_device_country[''lander_last_btn_link_url''] ; \n            ?>\n            <a class="results btn btn-danger custom-btn" href="<?php echo $final_url; ?>"><?php\necho $button_link_by_device_country[''lander_last_btn_name'']; ?></a>\n            </div>\n          </div>\n          \n        </div>\n      </div>\n    </div>\n  </div>', '$(document).ready(function(){\n    $(".popup-close").click(function(){\n       $("#sdil-lander-popup-wrapper").fadeOut();\n             $("#results").fadeIn();\n    });\n\n   $("#example, body").vegas({\n        delay: 3500,\n        shuffle: true,\n        timer: true,\n        transition: ''fade'',\n        transitionDuration: 3000,\nalign: ''top'',\n        slides: [\n            <?php\n            if (isset($single_country_image_slider) && $single_country_image_slider->num_rows() > 0) {\n                foreach ($single_country_image_slider->result() as $row): ?>\n            {\n                src: "<?php echo base_url(); ?>uploaded/lander_slider_images/<?php echo $row->lander_image_file_name; ?>"\n            },\n            <?php\n                endforeach;\n            } else {  ?>\n              {\n                  src: "<?php echo base_url(); ?>images/SG1.jpg"\n              },\n               {\n                  src: "<?php echo base_url(); ?>images/SG2.jpg"\n              }\n              <?php\n              }\n              ?>\n        ]\n    });\n});', 'SG2.jpg', 1, 1, 0, 20, 20),
(11, 'HookUp', '#6ca4ff', 'body {\r\n  background: #222222;\r\n}\r\n.container-class {\r\n  margin: 90px auto;\r\n  background: #fff;\r\n  width: 90%;\r\n}\r\n.padding-off {\r\n  padding: 0;\r\n}\r\n.top-part {\r\n  background: #F7F7F7 none repeat scroll 0 0;\r\n  border-bottom: 2px solid #EEEEEE;\r\n}\r\n.top-left h2, .top-right h2 {\r\n  margin: 0;\r\n  padding: 15px 0;\r\n  font-size: 24px;\r\n}\r\n.top-left h2 {\r\n  color: #000;\r\n}\r\n.top-right h2 {\r\n  color: #777674;\r\n}\r\n.img-part img {\r\n  margin: 25px auto 10px;\r\n}\r\n.content-part h4 {\r\n  font-size: 24px;\r\n  line-height: 1.5;\r\n  margin: 60px 0 20px 25px;\r\n  color: #181818;\r\n}\r\n.glyphicon {\r\n  background: #6ca4ff;\r\n  border-radius: 5px;\r\n  color: #fff;\r\n  font-size: 170px;\r\n  padding: 20px 30px;\r\n}\r\n.glyphicon:hover {\r\n  background: #528ae6;\r\n}\r\n.glyphicon-ok {\r\n  margin-right: 20px;\r\n}\r\n.glyphicon-remove {\r\n  margin-left: 20px;\r\n}\r\n.img-part p {\r\n  color: #6ca4ff;\r\n  font-weight: bold;\r\n}\r\n\r\n.custom_btn{\r\n    border: 0;\r\n   cursor: pointer;\r\n    font-size: 30px;\r\n    width: 80%;\r\n    min-width: 200px;\r\n    padding: 20px 0;\r\n    margin: 50px auto;\r\n    border-radius: 4px;\r\n    display: block;\r\n    text-align: center;\r\n}\r\n/* Tablet Layout: 1024px. */\r\n@media only screen and (min-width: 1201px) and (max-width: 1920px) {\r\n  .glyphicon {\r\n    font-size: 120px;\r\n  }\r\n  .img-part img {\r\n    margin: 25px auto 10px;\r\n    width: 90%;\r\n  }\r\n  .content-part h4 {\r\n    margin: 60px 0 20px 80px;\r\n  }\r\n}\r\n/* Tablet Layout: 1024px. */\r\n@media only screen and (min-width: 1024px) and (max-width: 1200px) {\r\n  .glyphicon {\r\n    font-size: 120px;\r\n  }\r\n  .img-part img {\r\n    margin: 25px auto 10px;\r\n    width: 85%;\r\n  }\r\n}\r\n/* Tablet Layout: 1024px. */\r\n@media only screen and (min-width: 992px) and (max-width: 1024px) {\r\n  .glyphicon {\r\n    font-size: 120px;\r\n  }\r\n  .img-part img {\r\n    margin: 25px auto 10px;\r\n    width: 65%;\r\n  }\r\n  .img-part img {\r\n    margin: 25px auto 10px;\r\n    width: 80%;\r\n  }\r\n}\r\n/* Tablet Layout: 768px. */\r\n@media only screen and (min-width: 768px) and (max-width: 991px) {\r\n  .top-left h2, .top-right h2 {\r\n    font-size: 20px;\r\n  }\r\n  .content-part h4 {\r\n    font-size: 22px;\r\n  }\r\n  .glyphicon {\r\n    font-size: 60px;\r\n  }\r\n  .img-part img {\r\n    margin: 25px auto 10px;\r\n    width: 85%;\r\n  }\r\n}\r\n\r\n@media only screen and (max-width: 767px) {\r\n  .top-left h2, .top-right h2 {\r\n    font-size: 16px;\r\n    padding: 15px 20px;\r\n    line-height: 10px;\r\n  }\r\n  .top-left h2 {\r\n    padding-bottom: 5px;\r\n  }\r\n  .content-part h4 {\r\n    font-size: 18px;\r\n    margin: 15px 0 20px 25px;\r\n  }\r\n  .glyphicon {\r\n    font-size: 48px;\r\n    padding: 18px 25px;\r\n  }\r\n  .content-part {\r\n    padding-bottom: 50px;\r\n  }\r\n}', '<body>\r\n	<div class="container container-class">\r\n		<div class="row">\r\n			<div class="col-xs-12 col-sm-12 padding-off ">\r\n				<div class="top-part">\r\n					<div class="row">\r\n						<div class="col-xs-12 col-sm-6 padding-off ">\r\n							<div class="top-left  text-center">\r\n								<h2>#1 HOOKUP DATING SITE</h2>\r\n							</div>\r\n						</div>\r\n						<div class="col-xs-12 col-sm-6 padding-off ">\r\n							<div class="top-right  text-center">\r\n								<h2>PLAYFUL MEMBERS ARE ONLINE</h2>\r\n							</div>\r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n		<div class="row">\r\n			<div class="col-xs-12 col-sm-6">\r\n				<div class="img-part  text-center">\r\n					 <img src="<?php echo base_url(); ?>uploaded/lander_theme_images/<?php echo $lander_theme_parameters[''lander_theme_image_file_name''] ?$lander_theme_parameters[''lander_theme_image_file_name''] : ''blank_person.png''; ?>" alt="top-img" class="img-responsive">\r\n					<p class="figure-caption">Buddy Name</p>\r\n				</div>\r\n			</div>\r\n			<div class="col-xs-12 col-sm-6">\r\n				<div class="content-part">\r\n					<h4>Hello<br>I''m looking for a fuck buddy,<br>are you interested?</h4>\r\n					<ul class="list-inline text-center">\r\n						<li><a href="#"><span class="popup-close glyphicon glyphicon-ok"></span></a></li>\r\n						<li><a href="#"><span class="popup-close glyphicon glyphicon-remove"></span></a></li>\r\n					</ul>\r\n				</div>\r\n				<div id="results" style="display:none;">\r\n										 <?php\r\n				            $final_url = $button_link_by_device_country[''lander_last_btn_link_url''];\r\n				            ?>\r\n				            <a class="results btn btn-primary custom_btn" href="<?php echo $final_url; ?>"><?php echo $button_link_by_device_country[''lander_last_btn_name'']; ?></a>\r\n				           \r\n							<!-- <a href="#" class="results btn btn-primary okay_btn">ko</a> -->\r\n						</div>\r\n			</div>\r\n		</div>\r\n	</div>', '$(document).ready(function(){\r\n    $(".popup-close").click(function(){\r\n       $(".list-inline").fadeOut();\r\n             $("#results").fadeIn();\r\n    });\r\n     $("#example, body").vegas({\r\n          delay: 3500,\r\n          timer: false,\r\n          shuffle: true,\r\n          timer: true,\r\n          transition: ''fade'',\r\n          transitionDuration: 3000,\r\n          slides: [\r\n              <?php\r\n              if (isset($single_country_image_slider) && $single_country_image_slider->num_rows() > 0) {\r\n                  foreach ($single_country_image_slider->result() as $row): ?>\r\n              {\r\n                  src: "<?php echo base_url(); ?>uploaded/lander_slider_images/<?php echo $row->lander_image_file_name; ?>"\r\n              },\r\n              <?php\r\n                  endforeach;\r\n              }\r\n              ?>\r\n          ]\r\n      });\r\n});', 'client.jpg', 1, 1, 0, 20, 20),
(12, 'Light Peru', '#e9895f', 'body {\r\n  background: #222;\r\n}\r\n.container-width {\r\n  width: 90%;\r\n  margin: 50px auto;\r\n  background: #000;\r\n  padding-bottom: 100px;\r\n}\r\n.image-part img {\r\n  border: 10px solid #fff;\r\n  border-radius: 5px;\r\n  margin: 20px auto 0;\r\n}\r\n.ques-part {\r\n  background: #fff;\r\n  padding: 15px;\r\n  border-radius: 3px;\r\n  line-height: 1.5;\r\n  margin-top: 30px;\r\n}\r\n.content-part h2 {\r\n  color: #E9895F;\r\n  line-height: 1.5;\r\n  font-size: 28px;\r\n}\r\n.content-part h6 {\r\n  color: #fff;\r\n  line-height: 1.5;\r\n  text-align: left;\r\n}\r\n.content-part p {\r\n  color: #82724A;\r\n  text-align: left;\r\n  font-size: 13px;\r\n  line-height: 1.5;\r\n}\r\n.content-part span {\r\n  color: #E9895F;\r\n}\r\n.ques-part h3 {\r\n  font-weight: bold;\r\n  font-size: 22px;\r\n}\r\n.ques-part span {\r\n  color: #E9895F;\r\n  font-size: 28px;\r\n}\r\n.yes-btn, .no-btn, .custom_btn {\r\n  padding: 10px 0;\r\n  width: 100%;\r\n  margin: 5px 0;\r\n  background: #E9895F;\r\n  border: 0px;\r\n  color: #fff;\r\n  font-weight: bold;\r\n  font-size: 20px;\r\n}\r\n.yes-btn:hover, .no-btn:hover, .custom_btn:hover {\r\n  background: #E09156;\r\n}\r\n/* Tablet Layout: 1024px. */\r\n@media only screen and (min-width: 992px) and (max-width: 1024px) {\r\n  .container-width {\r\n    width: 90%;\r\n  }\r\n  .content-part h2 {\r\n    font-size: 26px;\r\n  }\r\n  .ques-part h3 {\r\n    font-size: 18px;\r\n  }\r\n  .ques-part span {\r\n    font-size: 22px;\r\n  }\r\n}\r\n/* Tablet Layout: 768px. */\r\n@media only screen and (min-width: 768px) and (max-width: 991px) {\r\n  .container-width {\r\n    width: 90%;\r\n  }\r\n  .content-part h2 {\r\n    font-size: 22px;\r\n  }\r\n  .ques-part h3 {\r\n    font-size: 16px;\r\n  }\r\n  .ques-part span {\r\n    font-size: 18px;\r\n  }\r\n}\r\n@media only screen and (max-width: 767px) {\r\n  .container-width {\r\n    width: 90%;\r\n  }\r\n  .content-part h2 {\r\n    font-size: 23px;\r\n  }\r\n  .ques-part h3 {\r\n    font-size: 18px;\r\n    line-height: 1.5;\r\n  }\r\n  .ques-part span {\r\n    font-size: 22px;\r\n  }\r\n	.yes-btn {\r\n		padding: 8px 0;\r\n		width: 100%;\r\n	}\r\n}', '<body>\r\n	<div class="container container-width">\r\n		<div class="row">\r\n			<div class="col-sm-6 col-md-5 col-md-offset-1 col-xs-12">\r\n				<div class="image-part  text-center">\r\n					 <img src="<?php echo base_url(); ?>uploaded/lander_theme_images/<?php echo $lander_theme_parameters[''lander_theme_image_file_name''] ?$lander_theme_parameters[''lander_theme_image_file_name''] : ''blank_person.png''; ?>" alt="top-img" class="img-responsive" />\r\n				</div>\r\n			</div>\r\n			<div class="col-sm-6 col-md-5 col-xs-12">\r\n				<div class="content-part  text-center">\r\n					<h2>THIS SITE IS LIKELY TO CONTAIN PRIVATE PHOTOS OF SOMEONE YOU NOW</h2>\r\n					<h6>We have 36 female members within <span>10 miles of your location.</span> These women are ONLY looking for long-term relationships.</h6>\r\n					<p>You''re luckyly; at the moment registration for men is open for another <span>few seconds.</span> All we ask from you is to answer 3 simple questions in order to see if you quality for our exclusive website.<br> Good luck!</p>\r\n				</div>\r\n				<div class="ques-part">\r\n					<h3><span>Question 1:</span> Are you older than 24?</h3>\r\n					<div class="ques">\r\n						<a href="#" class="popup-close btn btn-success yes-btn">YES</a>\r\n						<a href="#" class="popup-close btn btn-success no-btn">NO</a>\r\n					</div>\r\n					\r\n\r\n					<div id="results" style="display:none;">\r\n										 <?php\r\n				            $final_url = $button_link_by_device_country[''lander_last_btn_link_url''];\r\n				            ?>\r\n				            <a class="results btn btn-success custom_btn" href="<?php echo $final_url; ?>"><?php echo $button_link_by_device_country[''lander_last_btn_name'']; ?></a>\r\n				           \r\n							<!-- <a href="#" class="results btn btn-success custom_btn">ko</a> -->\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</div>', '$(document).ready(function(){\r\n    $(".popup-close").click(function(){\r\n       $(".ques").fadeOut();\r\n             $("#results").fadeIn();\r\n    });\r\n     $("#example, body").vegas({\r\n          delay: 3500,\r\n          timer: false,\r\n          shuffle: true,\r\n          timer: true,\r\n          transition: ''fade'',\r\n          transitionDuration: 3000,\r\n          slides: [\r\n              <?php\r\n              if (isset($single_country_image_slider) && $single_country_image_slider->num_rows() > 0) {\r\n                  foreach ($single_country_image_slider->result() as $row): ?>\r\n              {\r\n                  src: "<?php echo base_url(); ?>uploaded/lander_slider_images/<?php echo $row->lander_image_file_name; ?>"\r\n              },\r\n              <?php\r\n                  endforeach;\r\n              }\r\n              ?>\r\n          ]\r\n      });\r\n});', 'top-img.jpg', 1, 1, 0, 20, 20),
(13, 'Pink Careful', '#ed095f', 'body {\r\n  background: #202020;\r\n}\r\n.container-img  {\r\n  background: url(<?php echo base_url(); ?>uploaded/lander_theme_images/<?php echo $lander_theme_parameters[''lander_theme_image_file_name''] ?$lander_theme_parameters[''lander_theme_image_file_name''] : ''blank_person.png''; ?>) no-repeat;\r\n  background-size:cover;\r\n  margin: 48px auto;\r\n}\r\n.sitebody {\r\n  background: #000;\r\n  margin: 90px auto;\r\n  opacity: 0.8;\r\n  width: 43%;\r\n}\r\n.top-part {\r\n\r\n}\r\n.top-part h2 {\r\n  margin: 0;\r\n  padding-top: 30px;\r\n  color: #ED01A7;\r\n}\r\n.top-part h4{\r\n  font-size:24px;\r\n  margin: 0;\r\n  padding: 15px 30px;\r\n  color: #fff;\r\n}\r\n.top-part p {\r\n  color: #fff;\r\n  padding: 0 30px;\r\n}\r\n.question-part {\r\n  padding-bottom: 20px;\r\n}\r\n.question-part h3 {\r\n  color: #fff;\r\n}\r\n.question-part p {\r\n  color: #fff;\r\n}\r\n/* Tablet Layout: 1024px. */\r\n@media only screen and (min-width: 992px) and (max-width: 1024px) {\r\n  .sitebody {\r\n    width: 53%;\r\n  }\r\n}\r\n/* Tablet Layout: 768px. */\r\n@media only screen and (min-width: 768px) and (max-width: 991px) {\r\n  .sitebody {\r\n    width: 60%;\r\n  }\r\n}\r\n@media only screen and (max-width: 767px) {\r\n  .sitebody {\r\n    width: 80%;\r\n  }\r\n}\r\n@media only screen and (min-width: 320px) and (max-width: 480px) {\r\n  .sitebody {\r\n    width: 100%;\r\n  }\r\n}', '<body>\r\n<div class="container-fluid container-img">\r\n    <div class="row">\r\n        <div class="col-sm-12">\r\n            <div class="sitebody">\r\n                <div class="top-part text-center">\r\n                    <h2>BE CAREFUL</h2>\r\n                    <h4>There are a lot of lonely women on this site that want to meet.</h4>\r\n\r\n                    <p>This is a dating site that allows to make accuaintance with women quickly.Everyday we have\r\n                        thousands of new users, who want only one thing serious acquaintances.</p>\r\n\r\n                    <p>Registration for men is open now!</p>\r\n                </div>\r\n                <div class="question-part  text-center">\r\n                    <h3>Question 1</h3>\r\n\r\n                    <p>Confirm your age</p>\r\n                    <ul class="list-inline text-center">\r\n                        <li><a href="#" class="popup-close btn btn-default confirm-age-btn">30+</a></li>\r\n                        <li><a href="#" class="popup-close btn btn-default confirm-age-btn">18-29</a></li>\r\n                    </ul>\r\n                </div>\r\n                <div id="results" style="display:none;">\r\n                    <?php\r\n				            $final_url = $button_link_by_device_country[''lander_last_btn_link_url''];\r\n				            ?>\r\n                     <ul class="text-center">\r\n                    <li><a class="results btn btn-default confirm-age-btn"\r\n                           href="<?php echo $final_url; ?>"><?php echo $button_link_by_device_country[''lander_last_btn_name'']; ?></a></li>\r\n                        </ul>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>', '$(document).ready(function(){\r\n        $(".popup-close").click(function(){\r\n            $(".list-inline").fadeOut();\r\n            $("#results").fadeIn();\r\n        });\r\n    });', 'threebg.jpg', 1, 1, 0, 20, 20);
INSERT INTO `sdil_lander_theme` (`lander_theme_id`, `lander_theme_name`, `lander_theme_color_code`, `lander_theme_css`, `lander_theme_html`, `lander_theme_js`, `lander_theme_image_file_name`, `lander_theme_is_active`, `lander_theme_add_bootstrap`, `is_lander_theme_reserved`, `lander_theme_created_by`, `lander_theme_modified_by`) VALUES
(14, 'Hot Offwhite', '#f2dfdf', 'body {\r\n  background: #202020;\r\n}\r\n.container-img  {\r\n  background: url(<?php echo base_url(); ?>images/fourbg.jpg) no-repeat;\r\n  background-size:cover;\r\n  margin: 0px auto;\r\n}\r\n.client-part {\r\n  margin: 50px auto;\r\n  width: 57%;\r\n  background-color:rgba(255,255,255,0.9);\r\n  padding: 20px;\r\n}\r\n.client-part img {\r\n  width: 50%;\r\n  margin: 0 auto;\r\n}\r\n.client-part h4 {\r\n  color: #000;\r\n  font-size: 24px;\r\n  font-weight: bold;\r\n  line-height: 1.3;\r\n  margin: 0;\r\n  padding: 10px 0;\r\n}\r\n.custom-btn {\r\n    padding: 10px 0;\r\n    width: 100%;\r\n    background: #15ACA3;\r\n    color: #fff;\r\n    font-weight: bold;\r\n    font-size: 20px;\r\n    border: 0px;\r\n  }\r\n  .custom-btn:hover {\r\n    background: #189F97;\r\n  }\r\n  /* Tablet Layout: 1024px. */\r\n@media only screen and (min-width: 992px) and (max-width: 1024px) {\r\n  .client-part {\r\n    width: 75%;\r\n  }\r\n}\r\n  /* Tablet Layout: 768px. */\r\n@media only screen and (min-width: 768px) and (max-width: 991px) {\r\n  .client-part {\r\n    width: 75%;\r\n  }\r\n}\r\n@media only screen and (max-width: 767px) {\r\n	.client-part {\r\n    width: 90%;\r\n  }\r\n}\r\n@media only screen and (min-width: 320px) and (max-width: 480px) {\r\n  .client-part {\r\n    width: 100%;\r\n  }\r\n  .client-part h4 {\r\n    font-size: 22px;\r\n  }\r\n}', '<body>\r\n<div class="container-fluid  container-img">\r\n    <div class="row">\r\n        <div class="col-sm-12">\r\n            <div class="client-part  text-center">\r\n                <h4>You are vabout nto join the flirtiest online community.</h4>\r\n                <img src="<?php echo base_url(); ?>uploaded/lander_theme_images/<?php echo $lander_theme_parameters[''lander_theme_image_file_name''] ?$lander_theme_parameters[''lander_theme_image_file_name''] : ''blank_person.png''; ?>" alt="top-img" class="img-responsive" />\r\n                <h4>Please answer a few simple questions to meet the most desirable members nearby.<br> Only 3 FREE\r\n                    registration spots are left.</h4>\r\n\r\n                <div id="sdil-lander-popup-wrapper">\r\n                    <a href="#" class="popup-close btn btn-success custom-btn">OK</a>\r\n                </div>\r\n                <div id="results" style="display:none;">\r\n                     <?php\r\n            $final_url = $button_link_by_device_country[''lander_last_btn_link_url''] ; \r\n            ?>\r\n            <a class="btn btn-danger custom-btn" href="<?php echo $final_url; ?>"><?php\r\necho $button_link_by_device_country[''lander_last_btn_name'']; ?></a>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </di', '$(document).ready(function(){\r\n        $(".popup-close").click(function(){\r\n            $("#sdil-lander-popup-wrapper").fadeOut();\r\n            $("#results").fadeIn();\r\n        });\r\n    });', 'top-img1.jpg', 1, 1, 0, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `sdil_lander_theme_country`
--

CREATE TABLE `sdil_lander_theme_country` (
  `sdil_lander_theme_country_ID` bigint(40) NOT NULL,
  `lander_theme_country_id` bigint(40) NOT NULL,
  `lander_theme_country_them_id` bigint(40) NOT NULL,
  `sdil_lander_theme_country_is_live` tinyint(3) NOT NULL DEFAULT '0',
  `lander_theme_country_created_by` bigint(30) NOT NULL DEFAULT '0',
  `lander_theme_country_modified_by` bigint(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sdil_lander_theme_country`
--

INSERT INTO `sdil_lander_theme_country` (`sdil_lander_theme_country_ID`, `lander_theme_country_id`, `lander_theme_country_them_id`, `sdil_lander_theme_country_is_live`, `lander_theme_country_created_by`, `lander_theme_country_modified_by`) VALUES
(1, 1, 10, 1, 20, 20),
(3, 2, 2, 0, 0, 0),
(4, 7, 2, 1, 20, 20),
(5, 12, 5, 1, 25, 0),
(6, 14, 7, 1, 27, 27),
(7, 15, 8, 1, 28, 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sdil_lander_admin`
--
ALTER TABLE `sdil_lander_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `sdil_lander_admin_login_id_key` (`admin_email`) USING BTREE,
  ADD KEY `cell_number` (`cell_number`) USING BTREE,
  ADD KEY `admin_created_by` (`admin_created_by`),
  ADD KEY `admin_modified_by` (`admin_modified_by`),
  ADD KEY `admin_live_preview_url` (`admin_live_preview_url`);

--
-- Indexes for table `sdil_lander_country`
--
ALTER TABLE `sdil_lander_country`
  ADD PRIMARY KEY (`lander_country_id`),
  ADD KEY `created_by_admin_id` (`created_by`),
  ADD KEY `modified_by_admin_id` (`modified_by`);

--
-- Indexes for table `sdil_lander_country_wise_slider_image`
--
ALTER TABLE `sdil_lander_country_wise_slider_image`
  ADD PRIMARY KEY (`lander_image_id`),
  ADD KEY `lander_country_id` (`lander_image_country_id`),
  ADD KEY `created_by` (`lander_image_created_by`),
  ADD KEY `modified_by` (`lander_image_modified_by`);

--
-- Indexes for table `sdil_lander_device`
--
ALTER TABLE `sdil_lander_device`
  ADD PRIMARY KEY (`lander_device_id`),
  ADD KEY `lander_device_created_by` (`lander_device_created_by`),
  ADD KEY `lander_device_modified_by` (`lander_device_modified_by`);

--
-- Indexes for table `sdil_lander_last_button_link`
--
ALTER TABLE `sdil_lander_last_button_link`
  ADD PRIMARY KEY (`lander_last_btn_link_id`),
  ADD UNIQUE KEY `lander_last_btn_link_url` (`lander_last_btn_link_url`),
  ADD KEY `lander_last_btn_country_id` (`lander_last_btn_country_id`),
  ADD KEY `lander_last_btn_device_id` (`lander_last_btn_device_id`),
  ADD KEY `lander_last_btn_created_by` (`lander_last_btn_created_by`),
  ADD KEY `lander_last_btn_modified_by` (`lander_last_btn_modified_by`);

--
-- Indexes for table `sdil_lander_theme`
--
ALTER TABLE `sdil_lander_theme`
  ADD PRIMARY KEY (`lander_theme_id`),
  ADD KEY `lander_theme_created_by` (`lander_theme_created_by`),
  ADD KEY `lander_theme_modified_by` (`lander_theme_modified_by`);

--
-- Indexes for table `sdil_lander_theme_country`
--
ALTER TABLE `sdil_lander_theme_country`
  ADD PRIMARY KEY (`sdil_lander_theme_country_ID`),
  ADD KEY `lander_theme_country_id` (`lander_theme_country_id`),
  ADD KEY `lander_theme_country_them_id` (`lander_theme_country_them_id`),
  ADD KEY `lander_theme_country_created_by` (`lander_theme_country_created_by`),
  ADD KEY `lander_theme_country_modified_by` (`lander_theme_country_modified_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sdil_lander_admin`
--
ALTER TABLE `sdil_lander_admin`
  MODIFY `admin_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `sdil_lander_country`
--
ALTER TABLE `sdil_lander_country`
  MODIFY `lander_country_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sdil_lander_country_wise_slider_image`
--
ALTER TABLE `sdil_lander_country_wise_slider_image`
  MODIFY `lander_image_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `sdil_lander_device`
--
ALTER TABLE `sdil_lander_device`
  MODIFY `lander_device_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `sdil_lander_last_button_link`
--
ALTER TABLE `sdil_lander_last_button_link`
  MODIFY `lander_last_btn_link_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sdil_lander_theme`
--
ALTER TABLE `sdil_lander_theme`
  MODIFY `lander_theme_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sdil_lander_theme_country`
--
ALTER TABLE `sdil_lander_theme_country`
  MODIFY `sdil_lander_theme_country_ID` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
