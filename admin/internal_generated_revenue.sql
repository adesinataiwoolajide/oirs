-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2018 at 11:21 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internal_generated_revenue`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `act_id` int(255) NOT NULL,
  `action` text NOT NULL,
  `user_details` varchar(255) NOT NULL,
  `time_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `action`, `user_details`, `time_added`) VALUES
(1, 'Logged In', 'tolajide74@gmail.com', '2018-07-20 09:31:44'),
(2, 'Logged In', 'tolajide74@gmail.com', '2018-07-20 10:05:53'),
(3, 'Logged Out', 'tolajide74@gmail.com', '2018-07-20 10:07:13'),
(4, 'Logged In', 'tolajide74@gmail.com', '2018-07-20 10:07:36'),
(5, 'Logged Out', 'tolajide74@gmail.com', '2018-07-20 11:03:38'),
(6, 'Logged In', 'tolajide74@gmail.com', '2018-07-21 19:28:16'),
(7, 'Logged Out', 'tolajide74@gmail.com', '2018-07-21 19:28:54'),
(8, 'Logged In', 'tolajide74@gmail.com', '2018-07-22 08:26:09'),
(9, 'Logged Out', 'tolajide74@gmail.com', '2018-07-22 08:30:57'),
(10, 'Logged In', 'tolajide74@gmail.com', '2018-07-22 08:32:14'),
(11, 'Logged Out', 'tolajide74@gmail.com', '2018-07-22 08:34:47'),
(12, 'Logged In', 'tolajide74@gmail.com', '2018-07-22 08:34:50'),
(13, 'Logged Out', 'tolajide74@gmail.com', '2018-07-22 08:36:45'),
(14, 'Logged In', 'tolajide74@gmail.com', '2018-07-22 08:36:47'),
(15, 'Logged Out', 'tolajide74@gmail.com', '2018-07-22 08:37:47'),
(16, 'Logged In', 'tolajide74@gmail.com', '2018-07-22 08:37:51'),
(17, 'Logged Out', 'tolajide74@gmail.com', '2018-07-22 08:56:08'),
(18, 'Logged In', 'tolajide75@gmail.com', '2018-07-22 08:56:14'),
(19, 'Logged Out', 'tolajide75@gmail.com', '2018-07-22 16:40:35'),
(20, 'Logged In', 'tolajide74@gmail.com', '2018-07-22 16:40:37'),
(21, 'Logged Out', 'tolajide74@gmail.com', '2018-07-22 17:21:40'),
(22, 'Logged In', 'tolajide74@gmail.com', '2018-07-23 07:58:50'),
(23, 'Added MINISTRY OF COMMUNICATION with Ministry Code OSUN/MIN/010220 To The Ministry List', 'tolajide74@gmail.com', '2018-07-23 08:40:54'),
(24, 'Added MINISTRY OF COMMUNICATION with Ministry Code OSUN/MIN/280010 To The Ministry List', 'tolajide74@gmail.com', '2018-07-23 08:41:12'),
(25, 'Added MINISTRY OF COMMUNICATION with Ministry Code OSUN/MIN/018028 To The Ministry List', 'tolajide74@gmail.com', '2018-07-23 08:41:34'),
(26, 'Added MINISTRY OF COMMUNICATION with Ministry Code OSUN/MIN/021122 To The Ministry List', 'tolajide74@gmail.com', '2018-07-23 08:41:40'),
(27, 'Added MINISTRY OF COMMUNICATION with Ministry Code OSUN/MIN/822220 To The Ministry List', 'tolajide74@gmail.com', '2018-07-23 08:48:46'),
(28, 'Added MINISTRY OF ARTS AND CULTURE with Ministry Code OSUN/MIN/810288 To The Ministry List', 'tolajide74@gmail.com', '2018-07-23 08:48:59'),
(29, 'Added MINISTRY OF EDUCATION with Ministry Code OSUN/MIN/182102 To The Ministry List', 'tolajide74@gmail.com', '2018-07-23 08:49:24'),
(30, 'Added MINISTRY OF LOCAL GOVERNMENT AND CHIEFTAINCY TITLES with Ministry Code OSUN/MIN/120102 To The Ministry List', 'tolajide74@gmail.com', '2018-07-23 09:07:37'),
(31, 'Added MINISTRY OF COMMUNICATION with Ministry Code OSUN/MIN/181801 To The Ministry List', 'tolajide74@gmail.com', '2018-07-23 09:07:54'),
(32, 'Update  Details And Changed The Student Passport', 'tolajide74@gmail.com', '2018-07-23 10:23:09'),
(33, 'Update  Details And Changed The Student Passport', 'tolajide74@gmail.com', '2018-07-23 10:23:52'),
(34, 'Updated The Ministry Name From MINISTRY OF ARTS AND CULTURE To MINISTRY OF ARTS AND CULTURE Details And Changed The Ministry Logo', 'tolajide74@gmail.com', '2018-07-23 10:25:38'),
(35, 'Updated The Ministry Name From MINISTRY OF ARTS AND CULTURE To MINISTRY OF ARTS AND CULTURE Details And Changed The Ministry Logo', 'tolajide74@gmail.com', '2018-07-23 10:27:16'),
(36, 'Updated The Ministry Name From MINISTRY OF ARTS AND CULTURE To MINISTRY OF ARTINGS AND CULTURE Details And Changed The Ministry Logo', 'tolajide74@gmail.com', '2018-07-23 10:27:57'),
(37, 'Update  Details And Changed The Student Passport', 'tolajide74@gmail.com', '2018-07-23 10:28:21'),
(38, 'Logged Out', 'tolajide74@gmail.com', '2018-07-23 10:53:48'),
(39, 'Logged In', 'tolajide74@gmail.com', '2018-07-23 11:55:54'),
(40, 'Logged Out', 'tolajide74@gmail.com', '2018-07-23 12:11:28'),
(41, 'Logged In', 'tolajide74@gmail.com', '2018-07-23 13:02:44'),
(42, 'Added BORIPE LOCAL GOVERNMENT with Local Goverment Code OSUN/LGA/BO/8000 To The Local Goverment List', 'tolajide74@gmail.com', '2018-07-23 13:03:37'),
(43, 'Added BORIPE LOCAL GOVERNMENT with Local Goverment Code OSUN/LGA/BOR/8008 To The Local Goverment List', 'tolajide74@gmail.com', '2018-07-23 13:04:44'),
(44, 'Updated The Local Goverment Name From BORIPE LOCAL GOVERNMENT To BORIPE LOCAL GOVERNMENTING', 'tolajide74@gmail.com', '2018-07-23 13:39:01'),
(45, 'Updated The Local Goverment Name From BORIPE LOCAL GOVERNMENTING To BORIPE LOCAL GOVERNMENT', 'tolajide74@gmail.com', '2018-07-23 13:39:13'),
(46, 'Added OBOKUN LOCAL GOVERNMENT with Local Goverment Code OSUN/LGA/OBO/0080 To The Local Goverment List', 'tolajide74@gmail.com', '2018-07-23 13:41:41'),
(47, 'Added IFELODUN LOCAL GOVERNMENT with Local Goverment Code OSUN/LGA/IFE/1128 To The Local Goverment List', 'tolajide74@gmail.com', '2018-07-23 13:42:04'),
(48, 'Added AYEDAADE LOCAL GOVERNMENT with Local Goverment Code OSUN/LGA/AYE/1202 To The Local Goverment List', 'tolajide74@gmail.com', '2018-07-23 13:42:33'),
(49, 'Added ADESINA LOCAL GOVERNMENT with Local Goverment Code OSUN/LGA/ADE/1018 To The Local Goverment List', 'tolajide74@gmail.com', '2018-07-23 13:47:44'),
(50, 'Deleted ADESINA LOCAL GOVERNMENT with The Code Number OSUN/LGA/ADE/1018 From To The Local Goverment List', 'tolajide74@gmail.com', '2018-07-23 13:48:14'),
(51, 'Added BIL LOCAL GOVT with Local Goverment Code OSUN/LGA/BIL/1021 To The Local Goverment List', 'tolajide74@gmail.com', '2018-07-23 13:48:36'),
(52, 'Deleted BIL LOCAL GOVT with The Code Number OSUN/LGA/BIL/1021 From To The Local Goverment List', 'tolajide74@gmail.com', '2018-07-23 13:48:41'),
(53, 'Added MINISTRY OF FOOD with Ministry Code OSUN/MIN/181100 To The Ministry List', 'tolajide74@gmail.com', '2018-07-23 13:53:00'),
(54, 'Deleted MINISTRY OF FOOD with The Code Number OSUN/MIN/181100 From To The Ministry List', 'tolajide74@gmail.com', '2018-07-23 13:53:07'),
(55, 'Logged Out', 'tolajide74@gmail.com', '2018-07-23 13:53:16'),
(56, 'Logged In', 'tolajide74@gmail.com', '2018-07-23 15:05:49'),
(57, 'Logged Out', 'tolajide74@gmail.com', '2018-07-24 08:59:20'),
(58, 'Logged In', 'tolajide74@gmail.com', '2018-07-24 12:28:03'),
(59, 'Added Favour James with The staff number OS/18/002 to the staff List', 'tolajide74@gmail.com', '2018-07-24 12:37:17'),
(60, 'Added Favour James with The staff number OS/17/001 to the staff List', 'tolajide74@gmail.com', '2018-07-24 12:38:16'),
(61, 'Added Ishioku Godwin with The staff number OS/18/001 to the staff List', 'tolajide74@gmail.com', '2018-07-24 12:47:38'),
(62, 'Added James Favour with The staff number OS/18/002 to the staff List', 'tolajide74@gmail.com', '2018-07-24 12:52:24'),
(63, 'Logged Out', 'tolajide74@gmail.com', '2018-07-24 13:18:45'),
(64, 'Logged In', 'tolajide74@gmail.com', '2018-07-27 18:04:42'),
(65, 'Added MINISTRY OF COMMERCE with Ministry Code OSUN/MIN/028802 To The Ministry List', 'tolajide74@gmail.com', '2018-07-27 18:51:42'),
(66, 'Updated OS/18/001 Details', 'tolajide74@gmail.com', '2018-07-29 09:04:50'),
(67, 'Updated OS/18/001 Details', 'tolajide74@gmail.com', '2018-07-29 09:06:06'),
(68, 'Updated OS/18/001 Details', 'tolajide74@gmail.com', '2018-07-29 09:06:47'),
(69, 'Updated OS/18/001 Details', 'tolajide74@gmail.com', '2018-07-29 09:11:58'),
(70, 'Updated OS/18/001 Details', 'tolajide74@gmail.com', '2018-07-29 09:14:53'),
(71, 'Updated OS/18/001 Details', 'tolajide74@gmail.com', '2018-07-29 09:20:25'),
(72, 'Updated OS/18/001 Details', 'tolajide74@gmail.com', '2018-07-29 09:20:51'),
(73, 'Updated OS/18/001 Details', 'tolajide74@gmail.com', '2018-07-29 09:21:49'),
(74, 'Updated OS/18/001 Details', 'tolajide74@gmail.com', '2018-07-29 09:22:55'),
(75, 'Updated OS/18/001 Details', 'tolajide74@gmail.com', '2018-07-29 09:23:10'),
(76, 'Updated OS/18/001 Details', 'tolajide74@gmail.com', '2018-07-29 09:24:32'),
(77, 'Updated OS/18/002 Details', 'tolajide74@gmail.com', '2018-07-29 09:25:36'),
(78, 'Added PRIMARY SIX CERTIFICATE To MINISTRY OF EDUCATION Revenue List', 'tolajide74@gmail.com', '2018-07-29 16:33:02'),
(79, 'Added SSCE CERTIFICATE To MINISTRY OF EDUCATION Revenue List', 'tolajide74@gmail.com', '2018-07-29 16:33:45'),
(80, 'Logged Out', 'tolajide74@gmail.com', '2018-07-29 17:40:01'),
(81, 'Logged In', 'tolajide74@gmail.com', '2018-07-30 07:33:54'),
(82, 'Added MINISTRY OF HEALTH with Ministry Code OSUN/MIN/111180 To The Ministry List', 'tolajide74@gmail.com', '2018-07-30 07:38:24'),
(83, 'Added BIRTH CERTIFICATE To MINISTRY OF HEALTH Revenue List', 'tolajide74@gmail.com', '2018-07-30 07:38:50'),
(84, 'Added DEATH CERTIFICATE To MINISTRY OF HEALTH Revenue List', 'tolajide74@gmail.com', '2018-07-30 07:39:12'),
(85, 'Added MINISTRY OF LAND AND PROPERTIES with Ministry Code OSUN/MIN/281880 To The Ministry List', 'tolajide74@gmail.com', '2018-07-30 07:39:37'),
(86, 'Added LAND SURVEYING (1 PLOT) To MINISTRY OF LAND AND PROPERTIES Revenue List', 'tolajide74@gmail.com', '2018-07-30 07:40:08'),
(87, 'Update SSCE CERTIFICATE WAEC In MINISTRY OF EDUCATION Revenue Source List', 'tolajide74@gmail.com', '2018-07-30 07:42:25'),
(88, 'Update SSCE CERTIFICATE WAEC In MINISTRY OF COMMERCE Revenue Source List', 'tolajide74@gmail.com', '2018-07-30 07:43:12'),
(89, 'Update SSCE CERTIFICATE In MINISTRY OF EDUCATION Revenue Source List', 'tolajide74@gmail.com', '2018-07-30 07:43:39'),
(90, 'Deleted  From  Revenue Source List', 'tolajide74@gmail.com', '2018-07-30 07:54:03'),
(91, 'Added BIRTH CERTIFICATE To MINISTRY OF HEALTH Revenue List', 'tolajide74@gmail.com', '2018-07-30 07:54:48'),
(92, 'Deleted  From  Revenue Source List', 'tolajide74@gmail.com', '2018-07-30 07:54:58'),
(93, 'Deleted  From MINISTRY OF HEALTH Revenue Source List', 'tolajide74@gmail.com', '2018-07-30 07:57:05'),
(94, 'Added BIRTH CERTIFICATE To MINISTRY OF HEALTH Revenue List', 'tolajide74@gmail.com', '2018-07-30 07:57:22'),
(95, 'Added DEATH CERTIFICATE To MINISTRY OF HEALTH Revenue List', 'tolajide74@gmail.com', '2018-07-30 07:57:35'),
(96, 'Added CERTIFICATE OF OCCUPANCY (C OF O) To MINISTRY OF LAND AND PROPERTIES Revenue List', 'tolajide74@gmail.com', '2018-07-30 07:59:07'),
(97, 'Deleted  From MINISTRY OF EDUCATION Revenue Source List', 'tolajide74@gmail.com', '2018-07-30 07:59:19'),
(98, 'Added SSCE CERTIFICATE To MINISTRY OF EDUCATION Revenue List', 'tolajide74@gmail.com', '2018-07-30 08:00:16'),
(99, 'Deleted SSCE CERTIFICATE From MINISTRY OF EDUCATION Revenue Source List', 'tolajide74@gmail.com', '2018-07-30 08:00:24'),
(100, 'Added SSCE CERTIFICATE To MINISTRY OF EDUCATION Revenue List', 'tolajide74@gmail.com', '2018-07-30 08:00:37'),
(101, 'Added PRIMARY SCHOOL TESTIMONIAL To MINISTRY OF EDUCATION Revenue List', 'tolajide74@gmail.com', '2018-07-30 08:01:01'),
(102, 'Update PRIMARY SIX LEAVING CERTIFICATE In MINISTRY OF EDUCATION Revenue Source List', 'tolajide74@gmail.com', '2018-07-30 08:01:34'),
(103, 'Added MINISTRY OF AGRICULTURE with Ministry Code OSUN/MIN/212828 To The Ministry List', 'tolajide74@gmail.com', '2018-07-30 08:02:24'),
(104, 'Updated The Ministry Name From MINISTRY OF AGRICULTURE To MINISTRY OF AGRICULTURE Details And Changed The Ministry Logo', 'tolajide74@gmail.com', '2018-07-30 08:03:45'),
(105, 'Added MINISTRY OF FINACE with Ministry Code OSUN/MIN/001110 To The Ministry List', 'tolajide74@gmail.com', '2018-07-30 08:54:16'),
(106, 'Logged Out', 'tolajide74@gmail.com', '2018-07-30 08:54:34'),
(107, 'Logged In', 'favour@gmail.com', '2018-07-30 19:01:30'),
(108, 'Added Mr Lolade Raheem ''s Payment For PRIMARY SCHOOL TESTIMONIAL To  Revenue Account', 'favour@gmail.com', '2018-07-30 21:02:46'),
(109, 'Added Miss Damilola K ''s Payment For PRIMARY SIX LEAVING CERTIFICATE To  Revenue Account', 'favour@gmail.com', '2018-07-30 21:04:02'),
(110, 'Added Mrs Adesina Kemi ''s Payment For PRIMARY SIX LEAVING CERTIFICATE To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-07-30 21:06:35'),
(111, 'Added Miss Omobosola N ''s Payment For PRIMARY SCHOOL TESTIMONIAL To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-07-30 21:59:52'),
(112, 'Added Akingbala Jemimah ''s Payment For SSCE CERTIFICATE To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-07-30 22:12:09'),
(113, 'Added Adeoba Hammed ''s Payment For SSCE CERTIFICATE To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-07-30 22:14:12'),
(114, 'Added Tobiloba Joseph ''s Payment For PRIMARY SIX LEAVING CERTIFICATE To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-07-30 22:17:54'),
(115, 'Added Olamide Peter ''s Payment For SSCE CERTIFICATE To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-08-01 13:53:00'),
(116, 'Logged Out', 'favour@gmail.com', '2018-08-01 14:15:30'),
(117, 'Logged In', 'favour@gmail.com', '2018-08-03 07:56:23'),
(118, 'Added Kazeem Abolade ''s Payment For PRIMARY SCHOOL TESTIMONIAL To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-08-03 08:00:47'),
(119, 'Added Taiwo Ololade ''s Payment For SSCE CERTIFICATE To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-08-03 08:03:33'),
(120, 'Added Ronnie Hammed ''s Payment For PRIMARY SCHOOL TESTIMONIAL To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-08-03 08:07:00'),
(121, 'Updated Taiwo Ololade Olajide ''s Payment For SSCE CERTIFICATE with the Reciept Number OS/ORI/08/18/001 To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-08-03 08:22:57'),
(122, 'Updated Taiwo Ololade Olajide ''s Payment For SSCE CERTIFICATE with the Reciept Number OS/ORI/08/18/001 To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-08-03 08:24:17'),
(123, 'Updated Taiwo Ololade ''s Payment For SSCE CERTIFICATE with the Reciept Number OS/ORI/08/18/001 To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-08-03 08:24:38'),
(124, 'Updated Taiwo Ololade ''s Payment For SSCE CERTIFICATE with the Reciept Number  To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-08-03 08:24:57'),
(125, 'Updated Taiwo Ololade ''s Payment For SSCE CERTIFICATE with the Reciept Number OS/ORI/08/18/001 To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-08-03 08:25:24'),
(126, 'Updated Taiwo Ololade ''s Payment For SSCE CERTIFICATE with the Reciept Number OS/ORI/08/18/001 To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-08-03 08:25:45'),
(127, 'Updated Taiwo Ololade Olajide ''s Payment For SSCE CERTIFICATE with the Reciept Number OS/ORI/08/18/001 To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-08-03 08:25:55'),
(128, 'Updated Taiwo Ololade Olajide ''s Payment For SSCE CERTIFICATE with the Reciept Number OS/ORI/08/18/001 To MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-08-03 08:26:10'),
(129, 'Deleted Payment Made by Adeoba Hammed with the Reciept Number OS/ORI/07/18/006 for SSCE CERTIFICATE From MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-08-03 08:40:13'),
(130, 'Deleted Payment Made by Adeoba Hammed with the Reciept Number OS/ORI/07/18/006 for SSCE CERTIFICATE From MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-08-03 08:41:21'),
(131, 'Logged Out', 'favour@gmail.com', '2018-08-03 15:54:40'),
(132, 'Logged In', 'godwin@gmail.com', '2018-08-03 15:57:43'),
(133, 'Logged In', 'godwin@gmail.com', '2018-08-03 15:59:00'),
(134, 'Logged Out', 'godwin@gmail.com', '2018-08-03 16:07:01'),
(135, 'Logged In', 'godwin@gmail.com', '2018-08-03 16:07:14'),
(136, 'Logged In', 'godwin@gmail.com', '2018-08-03 16:18:33'),
(137, 'Logged In', 'godwin@gmail.com', '2018-08-03 16:20:41'),
(138, 'Logged Out', 'godwin@gmail.com', '2018-08-03 17:48:45'),
(139, 'Logged In', 'tolajide74@gmail.com', '2018-08-03 17:48:49'),
(140, 'Logged Out', 'tolajide74@gmail.com', '2018-08-03 17:51:19'),
(141, 'Logged In', 'tolajide74@gmail.com', '2018-08-03 17:54:06'),
(142, 'Logged Out', 'tolajide74@gmail.com', '2018-08-04 12:05:54'),
(143, 'Logged In', 'tolajide74@gmail.com', '2018-08-08 13:03:35'),
(144, 'Logged Out', 'tolajide74@gmail.com', '2018-08-08 13:16:17'),
(145, 'Logged In', 'tolajide74@gmail.com', '2018-08-08 13:18:07'),
(146, 'Logged In', 'tolajide74@gmail.com', '2018-08-08 13:18:07'),
(147, 'Updated OS/18/003 Details', 'tolajide74@gmail.com', '2018-08-08 13:19:52'),
(148, 'Logged Out', 'tolajide74@gmail.com', '2018-08-09 07:19:59'),
(149, 'Logged In', 'tolajide74@gmail.com', '2018-08-10 09:23:42'),
(150, 'Logged Out', 'tolajide74@gmail.com', '2018-08-10 09:27:55'),
(151, 'Logged In', 'favour@gmail.com', '2018-08-10 09:28:05'),
(152, 'Added Afolabi Kabel ''s Payment For SSCE CERTIFICATE with the Reciept Number OS/ORI/08/18/003 To MINISTRY OF EDUCATION Revenue Account ', 'favour@gmail.com', '2018-08-10 09:29:52'),
(153, 'Logged Out', 'favour@gmail.com', '2018-08-10 09:30:15'),
(154, 'Logged In', 'tolajide74@gmail.com', '2018-08-10 09:30:22'),
(155, 'Logged Out', 'tolajide74@gmail.com', '2018-08-10 10:00:58'),
(156, 'Logged In', 'favour@gmail.com', '2018-08-10 10:01:07'),
(157, 'Added New Testing ''s Payment For PRIMARY SCHOOL TESTIMONIAL with the Reciept Number OS/ORI/08/18/004 To MINISTRY OF EDUCATION Revenue Account ', 'favour@gmail.com', '2018-08-10 10:13:10'),
(158, 'Deleted Payment Made by New Testing with the Reciept Number OS/ORI/08/18/004 for PRIMARY SCHOOL TESTIMONIAL From MINISTRY OF EDUCATION Revenue Account', 'favour@gmail.com', '2018-08-10 10:13:19'),
(159, 'Added New Testing ''s Payment For PRIMARY SIX LEAVING CERTIFICATE with the Reciept Number OS/ORI/08/18/004 To MINISTRY OF EDUCATION Revenue Account ', 'favour@gmail.com', '2018-08-10 10:14:06'),
(160, 'Added Lasisi Wasiu ''s Payment For SSCE CERTIFICATE with the Reciept Number OS/ORI/08/18/005 To MINISTRY OF EDUCATION Revenue Account ', 'favour@gmail.com', '2018-08-10 10:17:12'),
(161, 'Logged Out', 'favour@gmail.com', '2018-08-10 10:23:56'),
(162, 'Logged In', 'tolajide74@gmail.com', '2018-08-10 10:23:58'),
(163, 'Logged Out', 'tolajide74@gmail.com', '2018-08-10 10:50:14'),
(164, 'Logged In', 'tolajide74@gmail.com', '2018-08-10 10:50:16'),
(165, 'Logged Out', 'tolajide74@gmail.com', '2018-08-10 11:35:46'),
(166, 'Logged In', 'taiwo@gmail.com', '2018-08-10 11:36:09'),
(167, 'Logged Out', 'taiwo@gmail.com', '2018-08-10 12:00:18'),
(168, 'Logged In', 'tolajide74@gmail.com', '2018-08-10 12:00:22'),
(169, 'Added Peter Emenike with The staff number OS/16/001 to the staff List', 'tolajide74@gmail.com', '2018-08-10 12:02:13'),
(170, 'Logged Out', 'tolajide74@gmail.com', '2018-08-10 12:02:27'),
(171, 'Logged In', 'peter@gmail.com', '2018-08-10 12:03:13'),
(172, 'Logged Out', 'peter@gmail.com', '2018-08-10 12:07:06'),
(173, 'Logged In', 'peter@gmail.com', '2018-08-10 12:07:24'),
(174, 'Logged Out', 'peter@gmail.com', '2018-08-10 12:38:01'),
(175, 'Logged In', 'tolajide74@gmail.com', '2018-09-20 17:37:16'),
(176, 'Logged Out', 'tolajide74@gmail.com', '2018-09-21 11:27:32'),
(177, 'Logged In', 'tolajide74@gmail.com', '2018-10-08 16:15:40'),
(178, 'Logged Out', 'tolajide74@gmail.com', '2018-10-08 16:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `user_id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_level` int(1) NOT NULL,
  `time_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`user_id`, `full_name`, `user_name`, `password`, `access_level`, `time_registered`) VALUES
(1, 'Adesina Taiwo Olajumoke', 'tolajide74@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 1, '2017-09-12 18:18:35'),
(2, 'Adesina Taiwo Olajide Eniolorunopa', 'tolajide75@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 2, '2018-07-22 08:56:06'),
(3, 'Adesola', 'tolajide7@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 1, '2017-09-12 18:53:42'),
(8, 'Linda Atambi', 'linda@gmail.com', '03cb346ca97a01487d9ae674295eeb7bb678c210', 2, '2017-09-20 10:16:49'),
(9, 'Desmond Elliot Olusola Kolade', 'desmond@gmail.com', '33030877822cdbbc27f088877240fd6eb8c501c8', 2, '2018-05-27 14:14:26'),
(10, 'Adesina Tayo Victory', 'taiwo@gmail.com', '591db58f3957cbf2aaccc1d7bf7ddc4dd2983d1a', 4, '2018-06-08 16:19:54'),
(11, 'Hope Henry Juliet Lola', 'juliet@gmail.com', '128a94f3a1e21a8f2dcae794bb932306c0e51072', 3, '2018-06-07 08:42:56'),
(12, 'Gabriel Desola Jumoke', 'julietnew@gmail.com', '98a9757202d8b0bbed0ba8a21b1960e526ab3074', 0, '2018-05-27 15:07:31'),
(13, 'Adenike Kemisola', 'julietold@gmail.com', 'ce5e6c8ca2de58531fce0350640157494eaca91f', 1, '2018-05-27 15:49:10'),
(14, 'Ajibola Mariam', 'mariam@gmail.com', 'b39c6248128ce2fc035af762c619c9f26965999a', 1, '2018-06-13 18:26:56'),
(15, 'Favour James', 'jamesfasdsv@gmail.com', 'jamesfasdsv@gmail.com', 2, '2018-07-24 12:37:17'),
(16, 'Favour James', 'jamesfasdsggv@gmail.com', 'jamesfasdsggv@gmail.com', 2, '2018-07-24 12:38:15'),
(17, 'Ishioku Godwin Abraham', 'godwin@gmail.com', '2f93428ea34b7c115193eeb2b2cff94fdcaa76f2', 2, '2018-08-03 15:58:52'),
(18, 'James Favour', 'favour@gmail.com', '4a5b58df06c3d24123e82104c19e903b778e4292', 3, '2018-07-30 19:01:19'),
(19, 'Adesina Victoria', 'victoria@gmail.com', '29a4ca243976402cc5ec4900aea3e511ee464bf8', 2, '2018-08-08 13:19:52'),
(20, 'Peter Emenike', 'peter@gmail.com', '7ae0d78c254a0d4f9841062831485891c406c3ce', 4, '2018-08-10 12:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `generated_numbers`
--

CREATE TABLE `generated_numbers` (
  `last_id` int(255) NOT NULL,
  `number_type` varchar(255) NOT NULL,
  `year_number` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `last_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generated_numbers`
--

INSERT INTO `generated_numbers` (`last_id`, `number_type`, `year_number`, `month`, `last_number`) VALUES
(1, 'Staff', '2018', '', '000'),
(4, 'Staff Number', '2018', '', '001'),
(5, 'Staff Number', '2018', '', '002'),
(6, 'Reciept Number', '2018', '', '001'),
(7, 'Reciept Number', '2018', '', '002'),
(8, 'Reciept Number', '2018', '', '003'),
(9, 'Reciept Number', '2018', '', '004'),
(10, 'Reciept Number', '2018', '', '005'),
(11, 'Reciept Number', '2018', '', '006'),
(12, 'Reciept Number', '2018', '', '007'),
(13, 'Reciept Number', '2018', '', '008'),
(14, 'Reciept Number', '2018', '07', '009'),
(15, 'Reciept Number', '2018', '08', '001'),
(16, 'Reciept Number', '2018', '08', '002'),
(17, 'Staff Number', '2018', '08', '003'),
(18, 'Reciept Number', '2018', '08', '003'),
(19, 'Reciept Number', '2018', '08', '004'),
(20, 'Reciept Number', '2018', '08', '005'),
(21, 'Staff Number', '2016', '08', '001');

-- --------------------------------------------------------

--
-- Table structure for table `local_govt`
--

CREATE TABLE `local_govt` (
  `local_govt_id` int(255) NOT NULL,
  `local_govt_name` text NOT NULL,
  `local_govt_code` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `local_govt`
--

INSERT INTO `local_govt` (`local_govt_id`, `local_govt_name`, `local_govt_code`, `time_added`) VALUES
(1, 'BORIPE LOCAL GOVERNMENT', 'OSUN/LGA/BOR/8000', '2018-07-23 13:39:13'),
(2, 'ORIADE LOCAL GOVERNMENT', 'OSUN/LGA/ORI/8008', '2018-07-23 13:06:57'),
(3, 'OBOKUN LOCAL GOVERNMENT', 'OSUN/LGA/OBO/0080', '2018-07-23 13:41:41'),
(4, 'IFELODUN LOCAL GOVERNMENT', 'OSUN/LGA/IFE/1128', '2018-07-23 13:42:04'),
(5, 'AYEDAADE LOCAL GOVERNMENT', 'OSUN/LGA/AYE/1202', '2018-07-23 13:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `ministry`
--

CREATE TABLE `ministry` (
  `ministry_id` int(255) NOT NULL,
  `ministry_name` text NOT NULL,
  `ministry_code` varchar(255) NOT NULL,
  `ministry_logo` text NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ministry`
--

INSERT INTO `ministry` (`ministry_id`, `ministry_name`, `ministry_code`, `ministry_logo`, `time_added`) VALUES
(1, 'MINISTRY OF COMMUNICATION', 'OSUN/MIN/822220', 'course=reg (1).jpg', '2018-07-23 08:48:46'),
(2, 'MINISTRY OF ARTS AND CULTURE', 'OSUN/MIN/810288', 'course=reg (3).jpg', '2018-07-23 10:28:21'),
(3, 'MINISTRY OF EDUCATION', 'OSUN/MIN/182102', 'course=reg (8).jpg', '2018-07-23 08:49:24'),
(4, 'MINISTRY OF LOCAL GOVERNMENT AND CHIEFTAINCY TITLES', 'OSUN/MIN/120102', 'course=reg (4).png', '2018-07-23 09:07:37'),
(5, 'MINISTRY OF COMMERCE', 'OSUN/MIN/028802', 'books-background-with-diploma-and-biretta_23-2147628018.jpg', '2018-07-27 18:51:42'),
(6, 'MINISTRY OF HEALTH', 'OSUN/MIN/111180', 'unit.jpeg', '2018-07-30 07:38:24'),
(7, 'MINISTRY OF LAND AND PROPERTIES', 'OSUN/MIN/281880', 'att.jpg', '2018-07-30 07:39:37'),
(8, 'MINISTRY OF AGRICULTURE', 'OSUN/MIN/212828', 'unnamed.png', '2018-07-30 08:03:45'),
(9, 'MINISTRY OF FINACE', 'OSUN/MIN/001110', 'teacher.jpg', '2018-07-30 08:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `source_revenue`
--

CREATE TABLE `source_revenue` (
  `source_id` int(255) NOT NULL,
  `source_name` varchar(255) NOT NULL,
  `ministry_id` int(255) NOT NULL,
  `revenue_amount` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `source_revenue`
--

INSERT INTO `source_revenue` (`source_id`, `source_name`, `ministry_id`, `revenue_amount`, `time_added`) VALUES
(1, 'PRIMARY SIX LEAVING CERTIFICATE', 3, '2000', '2018-07-30 08:01:34'),
(5, 'LAND SURVEYING (1 PLOT)', 7, '10000', '2018-07-30 07:40:08'),
(7, 'BIRTH CERTIFICATE', 6, '2500', '2018-07-30 07:57:22'),
(8, 'DEATH CERTIFICATE', 6, '5000', '2018-07-30 07:57:35'),
(9, 'CERTIFICATE OF OCCUPANCY (C OF O)', 7, '60000', '2018-07-30 07:59:07'),
(11, 'SSCE CERTIFICATE', 3, '2500', '2018-07-30 08:00:37'),
(12, 'PRIMARY SCHOOL TESTIMONIAL', 3, '1200', '2018-07-30 08:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `staff_biodata`
--

CREATE TABLE `staff_biodata` (
  `staff_id` int(255) NOT NULL,
  `staff_passport` text NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `staff_number` varchar(255) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `local_govt_id` int(255) NOT NULL,
  `ministry_id` int(255) NOT NULL,
  `year_of_employment` varchar(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `staff_email` varchar(255) NOT NULL,
  `staff_phone` varchar(255) NOT NULL,
  `state_origin` varchar(255) NOT NULL,
  `staff_level` varchar(255) NOT NULL,
  `type_id` int(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_biodata`
--

INSERT INTO `staff_biodata` (`staff_id`, `staff_passport`, `staff_name`, `staff_number`, `sex`, `birth_date`, `local_govt_id`, `ministry_id`, `year_of_employment`, `category_id`, `staff_email`, `staff_phone`, `state_origin`, `staff_level`, `type_id`, `time_added`) VALUES
(1, 'course=reg (3).jpg', 'Ishioku Godwin Abraham', 'OS/18/001', 'Female', '2003-03-11', 2, 1, '2018', 1, 'godwin@gmail.com', '07062022113', 'Abia', '7 Level', 2, '2018-08-10 12:30:57'),
(2, 'download (1).jpg', 'James Favour', 'OS/18/002', 'Female', '2004-01-29', 2, 3, '2018', 1, 'favour@gmail.com', '07066344295', 'Anambra', '12 Level', 3, '2018-07-30 19:01:05'),
(5, 'stu.jpg', 'Adesina Victoria', 'OS/18/003', 'Male', '1980-08-13', 5, 9, '2018', 2, 'victoria@gmail.com', '090767483361', 'Ogun', '12 Level', 2, '2018-08-08 13:19:52'),
(6, '1530823255002.jpg', 'Peter Emenike', 'OS/16/001', 'Male', '2018-08-08', 2, 3, '2016', 2, 'peter@gmail.com', '090998776779', 'Gombe', '8 Level', 4, '2018-08-10 12:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `staff_category`
--

CREATE TABLE `staff_category` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `time_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_category`
--

INSERT INTO `staff_category` (`category_id`, `category_name`, `time_added`) VALUES
(1, 'Local Government', '2018-07-20 10:27:51'),
(2, 'State Capital', '2018-07-20 10:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `staff_type`
--

CREATE TABLE `staff_type` (
  `type_id` int(255) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_type`
--

INSERT INTO `staff_type` (`type_id`, `type_name`, `time_added`) VALUES
(1, 'ICT Department', '2018-08-10 12:05:11'),
(2, 'Head of Department', '2018-08-10 12:03:58'),
(3, 'Revenue Officer', '2018-08-10 12:05:47'),
(4, 'Director', '2018-08-10 12:04:03'),
(5, 'Ministry Staff', '2018-08-10 12:06:15'),
(6, 'Account Officer', '2018-08-10 12:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `state_revenue`
--

CREATE TABLE `state_revenue` (
  `revenue_id` int(255) NOT NULL,
  `local_govt_id` int(255) NOT NULL,
  `staff_number` varchar(255) NOT NULL,
  `source_id` int(255) NOT NULL,
  `payer_name` varchar(255) NOT NULL,
  `payer_phone` varchar(255) NOT NULL,
  `payer_address` text NOT NULL,
  `reciept_number` varchar(255) NOT NULL,
  `today` varchar(255) NOT NULL,
  `rev_month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_revenue`
--

INSERT INTO `state_revenue` (`revenue_id`, `local_govt_id`, `staff_number`, `source_id`, `payer_name`, `payer_phone`, `payer_address`, `reciept_number`, `today`, `rev_month`, `year`, `time_added`) VALUES
(1, 2, 'OS/18/001', 12, 'Mr Lolade Raheem', '00997879809', 'Osogbo', 'OS/ORI/07/18/001', '07', '05', '2016', '2018-08-10 10:20:36'),
(3, 2, 'OS/18/002', 1, 'Miss Damilola K', '0907654778', 'Ikirun Osun State', 'OS/ORI/07/18/002', '07', '05', '2016', '2018-08-10 10:20:32'),
(4, 2, 'OS/18/001', 1, 'Mrs Adesina Kemi', '08169712771', 'Orurowo Osun State', 'OS/ORI/07/18/003', '08', '06', '2016', '2018-08-10 10:20:27'),
(5, 3, 'OS/18/002', 12, 'Miss Omobosola N', '09098778988', 'Ikire', 'OS/ORI/07/18/004', '08', '06', '2017', '2018-08-10 10:20:21'),
(6, 3, 'OS/18/002', 11, 'Akingbala Jemimah', '09088647355', 'Coker Area Ikire', 'OS/ORI/07/18/005', '08', '06', '2017', '2018-08-10 10:20:15'),
(8, 3, 'OS/18/002', 1, 'Tobiloba Joseph', '08064633522', 'Kolabalogun Ikire', 'OS/ORI/07/18/007', '09', '07', '2017', '2018-08-10 10:20:10'),
(9, 2, 'OS/18/002', 11, 'Olamide Peter', '090878786786', 'Lagos Ireland', 'OS/ORI/07/18/008', '09', '07', '2017', '2018-08-10 10:20:04'),
(10, 2, 'OS/18/002', 12, 'Kazeem Abolade', '09098787688', 'Ikire Osun satet', 'OS/ORI/07/18/009', '09', '07', '2018', '2018-08-10 10:19:59'),
(11, 2, 'OS/18/002', 11, 'Taiwo Ololade Olajide', '08138139333', 'Mowe Ogun State', 'OS/ORI/08/18/001', '09', '08', '2018', '2018-08-10 10:36:46'),
(12, 2, 'OS/18/002', 12, 'Ronnie Hammed', '0908776867', 'Ronnie Estate', 'OS/ORI/08/18/002', '10', '08', '2018', '2018-08-10 10:19:49'),
(13, 2, 'OS/18/002', 11, 'Afolabi Kabel', '09087866689', 'The Adress given', 'OS/ORI/08/18/003', '10', '08', '2018', '2018-08-10 10:17:39'),
(15, 2, 'OS/18/002', 1, 'New Testing', '090787857483', 'Ikole Ekiti', 'OS/ORI/08/18/004', '10', '08', '2018', '2018-08-10 10:17:31'),
(16, 2, 'OS/18/002', 11, 'Lasisi Wasiu', '09076547847', 'Ikire Osun State', 'OS/ORI/08/18/005', '10', '08', '2018', '2018-08-10 10:17:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `generated_numbers`
--
ALTER TABLE `generated_numbers`
  ADD PRIMARY KEY (`last_id`);

--
-- Indexes for table `local_govt`
--
ALTER TABLE `local_govt`
  ADD PRIMARY KEY (`local_govt_id`);

--
-- Indexes for table `ministry`
--
ALTER TABLE `ministry`
  ADD PRIMARY KEY (`ministry_id`);

--
-- Indexes for table `source_revenue`
--
ALTER TABLE `source_revenue`
  ADD PRIMARY KEY (`source_id`);

--
-- Indexes for table `staff_biodata`
--
ALTER TABLE `staff_biodata`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `staff_category`
--
ALTER TABLE `staff_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `staff_type`
--
ALTER TABLE `staff_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `state_revenue`
--
ALTER TABLE `state_revenue`
  ADD PRIMARY KEY (`revenue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `act_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;
--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `generated_numbers`
--
ALTER TABLE `generated_numbers`
  MODIFY `last_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `local_govt`
--
ALTER TABLE `local_govt`
  MODIFY `local_govt_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ministry`
--
ALTER TABLE `ministry`
  MODIFY `ministry_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `source_revenue`
--
ALTER TABLE `source_revenue`
  MODIFY `source_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `staff_biodata`
--
ALTER TABLE `staff_biodata`
  MODIFY `staff_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `staff_category`
--
ALTER TABLE `staff_category`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staff_type`
--
ALTER TABLE `staff_type`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `state_revenue`
--
ALTER TABLE `state_revenue`
  MODIFY `revenue_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
