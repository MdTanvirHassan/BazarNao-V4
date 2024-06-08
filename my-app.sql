-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 09:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `unique_identifier` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `activated` int(1) NOT NULL DEFAULT 1,
  `image` varchar(1000) DEFAULT NULL,
  `purchase_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `name`, `unique_identifier`, `version`, `activated`, `image`, `purchase_code`, `created_at`, `updated_at`) VALUES
(1, 'OTP', 'otp_system', '2.3', 1, 'otp_system.png', 'a9eb3ab2-7edb-4554-ac95-41997a228631', '2024-01-10 00:56:18', '2024-01-10 11:58:58'),
(2, 'Point of Sale', 'pos_system', '2.2', 1, 'pos_banner.png', 'fdadd6c7-332d-4373-b0e4-9de5a88c56ed', '2024-01-10 00:56:44', '2024-01-10 11:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `longitude` float(17,15) DEFAULT NULL,
  `latitude` float(17,15) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `set_default` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address`, `longitude`, `latitude`, `postal_code`, `phone`, `set_default`, `created_at`, `updated_at`) VALUES
(1, 8, 'Mirpur 11', NULL, NULL, '1219', '01821554477', 0, '2024-01-13 09:36:51', '2024-01-13 09:36:51'),
(2, 8, NULL, NULL, NULL, NULL, NULL, 0, '2024-04-19 13:33:55', '2024-04-19 13:33:55'),
(3, 8, NULL, NULL, NULL, NULL, NULL, 0, '2024-04-19 13:36:46', '2024-04-19 13:36:46'),
(4, 8, NULL, NULL, NULL, NULL, '01821554477', 0, '2024-04-19 13:51:59', '2024-04-19 13:51:59'),
(5, 8, NULL, NULL, NULL, NULL, '01821554477', 0, '2024-04-19 13:54:14', '2024-04-19 13:54:14'),
(6, 8, NULL, NULL, NULL, NULL, '01821554477', 0, '2024-04-19 14:41:28', '2024-04-19 14:41:28'),
(7, 8, NULL, NULL, NULL, NULL, NULL, 0, '2024-04-19 15:21:39', '2024-04-19 15:21:39'),
(8, 8, NULL, NULL, NULL, NULL, NULL, 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Abdullahpur', 0, '2024-04-19 17:36:31', '2024-04-19 17:36:31'),
(2, 'Adabor', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(3, 'Adarsha Nagar', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(4, 'Aftabnagar', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(5, 'Agargaon', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(6, 'Ahmedbag', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(7, 'Ahmednagar', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(8, 'Airport', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(9, 'Aminbazar', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(10, 'Ansar Camp', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(11, 'Anurbag', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(12, 'Arambagh', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(13, 'Asad Avenue', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(14, 'Asad Gate', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(15, 'Ashkona', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(16, 'Atipara', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(17, 'Azampur', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(18, 'Azimpur', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(19, 'Babubazar', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(20, 'Badda', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(21, 'Baily Road', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(22, 'Bakshi Bazar', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(23, 'Balur Ghat', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(24, 'Banani', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(25, 'Banani', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(26, 'Banani DOHS', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(27, 'Banasree', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(28, 'Bangshal', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(29, 'Baridhara', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(30, 'Baridhara DOHS', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(31, 'Baridhara J Block', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(32, 'Basabo', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(33, 'Bashundhara Residential Area', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(34, 'Baunia', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(35, 'Bawnia', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(36, 'Begum Bazar', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(37, 'Begun Bari', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(38, 'Bosila', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(39, 'BUET', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(40, 'CAAB Colony', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(41, 'Cantonment', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(42, 'Chadd Uddan', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(43, 'Chalaban', 0, '2024-04-19 15:23:06', '2024-04-19 15:23:06'),
(44, 'Chanpara', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(45, 'Chawk Bazar', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(46, 'CMH', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(47, 'Concord Lake City', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(48, 'Dakshin Khan', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(49, 'Dayaganj', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(50, 'Dhaka University', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(51, 'Dhalpur', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(52, 'Dhanmondi', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(53, 'Dholaipar', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(54, 'Eskaton New', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(55, 'Eskaton Old', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(56, 'Fakirapool', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(57, 'Faridabad', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(58, 'Farmgate', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(59, 'Gulshan 1', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(60, 'Gulshan 2', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(61, 'Jatrabari', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(62, 'Jurain', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(63, 'Kafrul', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(64, 'Kakrail', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(65, 'Kalabagan', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(66, 'Kallyanpur', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(67, 'Kalshi', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(68, 'Kamrangir Char', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(69, 'Kathalbagan', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(70, 'Kawla', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(71, 'Kazipara', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(72, 'Keraniganj', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(73, 'Khilgaon', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(74, 'Khilkhet', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(75, 'Kotwali', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(76, 'Kuril', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(77, 'Lalbagh', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(78, 'Lalmatia', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(79, 'Malibagh', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(80, 'Maniknagar', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(81, 'Matikata', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(82, 'Matuail', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(83, 'Merul Badda', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(84, 'Mirpur 1', 0, '2024-04-19 15:24:00', '2024-04-19 15:23:07'),
(85, 'Mirpur 2', 0, '2024-04-19 15:24:05', '2024-04-19 15:23:07'),
(86, 'Mirpur 6', 0, '2024-04-19 15:24:08', '2024-04-19 15:23:07'),
(87, 'Mirpur 7', 0, '2024-04-19 15:24:13', '2024-04-19 15:23:07'),
(88, 'Mirpur 10', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(89, 'Mirpur 11', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(90, 'Mirpur 11.5', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(91, 'Mirpur 12', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(92, 'Mirpur 13', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(93, 'Mirpur 14', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(94, 'Mirpur BRTA', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(95, 'Mirpur Diabari', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(96, 'Mirpur DOHS', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(97, 'Mohakhali', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(98, 'Mohakhali DOHS', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(99, 'Mohammadpur', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(100, 'Motijheel', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(101, 'Mugda', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(102, 'Nabinagar housing', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(103, 'Nakhalpara', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(104, 'Nama Para', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(105, 'Namapara', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(106, 'Nandipara', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(107, 'Nandipara', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(108, 'Narinda', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(109, 'Nawaberbag', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(110, 'NawabganjNaya Paltan', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(111, 'Nayagram', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(112, 'Nayatola', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(113, 'New Market', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(114, 'Niketan', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(115, 'Nikunja 1', 0, '2024-04-19 15:27:41', '2024-04-19 15:23:07'),
(116, 'Nikunja 2', 0, '2024-04-19 15:27:44', '2024-04-19 15:23:07'),
(117, 'Notun Bazar', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(118, 'Nurer Chala', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(119, 'Nutan Para', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(120, 'Paikpara', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(121, 'Pallabi', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(122, 'Pilkhana', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(123, 'Purana Palton', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(124, 'Rajarbagh', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(125, 'Rajlokkhi', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(126, 'Ramna', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(127, 'Rampura', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(128, 'Rayer Bazar', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(129, 'Rupnagar Abashik', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(130, 'Rupsha Quarter', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(131, 'Sabujbag', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(132, 'Sadar Ghat', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(133, 'Saidabad', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(134, 'Satarkul', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(135, 'Shah Ali', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(136, 'Shahbag', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(137, 'Shahidbag', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(138, 'Shahinbagh', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(139, 'Shahjadpur', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(140, 'Shahjahanpur', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(141, 'Shamibagh', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(142, 'Shampur', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(143, 'Shangkar', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(144, 'Shantinagar', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(145, 'Sher-E-Bangla Nagar', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(146, 'Shewrapara', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(147, 'Shiya Masjid', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(148, 'Shonir akra', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(149, 'Shukrabad', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(150, 'Shyamoli', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(151, 'Sobhanbag', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(152, 'Sutrapur', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(153, 'Taltola Agargaon', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(154, 'Tejgaon', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(155, 'Tejkunipara', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(156, 'Tikatuli', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(157, 'Tolarbag', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(158, 'Tongi', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(159, 'Uttar Badda', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(160, 'Uttar Khan', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(161, 'Uttara Sector 1', 0, '2024-04-19 15:27:55', '2024-04-19 15:23:07'),
(162, 'Uttara Sector 2', 0, '2024-04-19 15:28:01', '2024-04-19 15:23:07'),
(163, 'Uttara Sector 3', 0, '2024-04-19 15:28:06', '2024-04-19 15:23:07'),
(164, 'Uttara Sector 4', 0, '2024-04-19 15:28:11', '2024-04-19 15:23:07'),
(165, 'Uttara Sector 5', 0, '2024-04-19 15:28:14', '2024-04-19 15:23:07'),
(166, 'Uttara Sector 6', 0, '2024-04-19 15:28:17', '2024-04-19 15:23:07'),
(167, 'Uttara Sector 7', 0, '2024-04-19 15:28:20', '2024-04-19 15:23:07'),
(168, 'Uttara Sector 8', 0, '2024-04-19 15:28:25', '2024-04-19 15:23:07'),
(169, 'Uttara Sector 9', 0, '2024-04-19 15:28:29', '2024-04-19 15:23:07'),
(170, 'Uttara Sector 10', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(171, 'Uttara Sector 11', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(172, 'Uttara Sector 12', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(173, 'Uttara Sector 13', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(174, 'Uttara Sector 14', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(175, 'Uttara Sector 15', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(176, 'Uttara Sector 16', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(177, 'Uttara Sector 17', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(178, 'Vatara', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(179, 'Wari', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07'),
(180, 'Washpur', 0, '2024-04-19 15:23:07', '2024-04-19 15:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `banner` int(11) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_img` int(11) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `top` int(1) NOT NULL DEFAULT 0,
  `slug` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `top`, `slug`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Demo brand', 'uploads/brands/brand.jpg', 1, 'Demo-brand-12', 'Demo brand', NULL, '2019-03-12 06:05:56', '2019-08-06 06:52:40'),
(2, 'Demo brand1', 'uploads/brands/brand.jpg', 1, 'Demo-brand1', 'Demo brand1', NULL, '2019-03-12 06:06:13', '2019-08-06 06:07:26'),
(3, 'rtrt', '1716786890.webp', 0, 'rtrt-7cgbc', 'rtrt', NULL, '2024-05-27 04:52:43', '2024-05-27 05:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `brand_translations`
--

CREATE TABLE `brand_translations` (
  `id` bigint(20) NOT NULL,
  `brand_id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand_translations`
--

INSERT INTO `brand_translations` (`id`, `brand_id`, `name`, `lang`, `created_at`, `updated_at`) VALUES
(1, 3, 'rtrt', 'en', '2024-05-27 04:52:43', '2024-05-27 04:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `business_settings`
--

CREATE TABLE `business_settings` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `value` longtext DEFAULT NULL,
  `lang` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business_settings`
--

INSERT INTO `business_settings` (`id`, `type`, `value`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'home_default_currency', '27', NULL, '2018-10-16 01:35:52', '2024-01-10 00:25:22'),
(2, 'system_default_currency', '27', NULL, '2018-10-16 01:36:58', '2024-01-10 00:25:22'),
(3, 'currency_format', '1', NULL, '2018-10-17 03:01:59', '2018-10-17 03:01:59'),
(4, 'symbol_format', '1', NULL, '2018-10-17 03:01:59', '2019-01-20 02:10:55'),
(5, 'no_of_decimals', '2', NULL, '2018-10-17 03:01:59', '2020-03-04 00:57:16'),
(6, 'product_activation', '1', NULL, '2018-10-28 01:38:37', '2019-02-04 01:11:41'),
(13, 'best_selling', '1', NULL, '2018-12-24 08:13:44', '2019-02-14 05:29:13'),
(15, 'sslcommerz_sandbox', '1', NULL, '2019-01-16 12:44:18', '2019-03-14 00:07:26'),
(16, 'sslcommerz_payment', '0', NULL, '2019-01-24 09:39:07', '2019-01-29 06:13:46'),
(18, 'verification_form', '[{\"type\":\"text\",\"label\":\"Your name\"},{\"type\":\"text\",\"label\":\"Shop name\"},{\"type\":\"text\",\"label\":\"Email\"},{\"type\":\"text\",\"label\":\"License No\"},{\"type\":\"text\",\"label\":\"Full Address\"},{\"type\":\"text\",\"label\":\"Phone Number\"},{\"type\":\"file\",\"label\":\"Tax Papers\"}]', NULL, '2019-02-03 11:36:58', '2019-02-16 06:14:42'),
(19, 'google_analytics', '0', NULL, '2019-02-06 12:22:35', '2019-02-06 12:22:35'),
(20, 'facebook_login', '1', NULL, '2019-02-07 12:51:59', '2024-01-13 09:35:23'),
(21, 'google_login', '1', NULL, '2019-02-07 12:51:59', '2024-01-13 09:35:23'),
(36, 'facebook_chat', '0', NULL, '2019-04-15 11:45:04', '2019-04-15 11:45:04'),
(37, 'email_verification', '0', NULL, '2019-04-30 07:30:07', '2024-01-13 09:35:06'),
(38, 'wallet_system', '0', NULL, '2019-05-19 08:05:44', '2019-05-19 02:11:57'),
(39, 'coupon_system', '0', NULL, '2019-06-11 09:46:18', '2019-06-11 09:46:18'),
(40, 'current_version', '7.9.2', NULL, '2019-06-11 09:46:18', '2019-06-11 09:46:18'),
(46, 'maintenance_mode', '0', NULL, '2019-10-17 11:51:04', '2019-10-17 11:51:04'),
(52, 'guest_checkout_active', '1', NULL, '2020-01-22 07:36:38', '2020-01-22 07:36:38'),
(53, 'facebook_pixel', '0', NULL, '2020-01-22 11:43:58', '2020-01-22 11:43:58'),
(56, 'pos_activation_for_seller', '1', NULL, '2020-06-11 09:45:02', '2020-06-11 09:45:02'),
(57, 'shipping_type', 'flat_rate', NULL, '2020-07-01 13:49:56', '2024-01-13 09:31:54'),
(58, 'flat_rate_shipping_cost', '0', NULL, '2020-07-01 13:49:56', '2020-07-01 13:49:56'),
(59, 'shipping_cost_admin', '0', NULL, '2020-07-01 13:49:56', '2020-07-01 13:49:56'),
(62, 'google_recaptcha', '0', NULL, '2020-08-17 07:13:37', '2020-08-17 07:13:37'),
(64, 'header_logo', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(65, 'show_language_switcher', 'on', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(66, 'show_currency_switcher', 'on', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(67, 'header_stikcy', 'on', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(68, 'footer_logo', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(69, 'about_us_description', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(70, 'contact_address', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(71, 'contact_phone', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(72, 'contact_email', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(73, 'widget_one_labels', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(74, 'widget_one_links', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(75, 'widget_one', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(76, 'frontend_copyright_text', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(77, 'show_social_links', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(78, 'facebook_link', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(80, 'instagram_link', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(81, 'youtube_link', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(82, 'linkedin_link', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(83, 'payment_method_images', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(84, 'home_slider_images', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(85, 'home_slider_links', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(86, 'home_banner1_images', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(87, 'home_banner1_links', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(88, 'home_banner2_images', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(89, 'home_banner2_links', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(90, 'home_categories', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(91, 'top10_categories', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(92, 'top10_brands', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(93, 'website_name', 'Bazar Nao', NULL, '2020-11-16 07:26:36', '2024-05-26 16:17:20'),
(94, 'site_motto', 'Best Groceries on Credit', NULL, '2020-11-16 07:26:36', '2024-05-26 16:17:20'),
(95, 'site_icon', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(96, 'base_color', '#a9427f', NULL, '2020-11-16 07:26:36', '2024-05-26 16:16:46'),
(97, 'base_hov_color', '#dba9c9', NULL, '2020-11-16 07:26:36', '2024-05-26 16:16:46'),
(98, 'meta_title', 'bazarnao', NULL, '2020-11-16 07:26:36', '2024-05-26 12:05:10'),
(99, 'meta_description', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(100, 'meta_keywords', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(101, 'meta_image', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(102, 'site_name', 'Bazar Nao', NULL, '2020-11-16 07:26:36', '2024-05-27 04:30:30'),
(103, 'system_logo_white', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(104, 'system_logo_black', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(105, 'timezone', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(106, 'admin_login_background', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(109, 'decimal_separator', '1', NULL, '2020-12-30 16:45:56', '2020-12-30 16:45:56'),
(110, 'nagad', '0', NULL, '2021-01-22 10:30:03', '2021-01-22 10:30:03'),
(111, 'bkash', '0', NULL, '2021-01-22 10:30:03', '2021-01-22 10:30:03'),
(112, 'bkash_sandbox', '1', NULL, '2021-01-22 10:30:03', '2021-01-22 10:30:03'),
(113, 'header_menu_labels', '[\"Home\",\"Flash Sale\",\"Blogs\",\"All Brands\",\"All Categories\"]', NULL, '2021-02-16 02:43:11', '2021-02-16 02:52:18'),
(114, 'header_menu_links', '[\"http:\\/\\/domain.com\",\"http:\\/\\/domain.com\\/flash-deals\",\"http:\\/\\/domain.com\\/blog\",\"http:\\/\\/domain.com\\/brands\",\"http:\\/\\/domain.com\\/categories\"]', NULL, '2021-02-16 02:43:11', '2021-02-18 01:20:04'),
(117, 'google_map', '1', NULL, '2021-07-27 15:49:39', '2021-07-27 15:49:39'),
(118, 'google_firebase', '0', NULL, '2021-07-27 15:49:39', '2021-07-27 15:49:39'),
(120, 'min_order_amount_check_activat', NULL, NULL, '2022-04-17 06:57:17', '2022-04-17 06:57:17'),
(121, 'minimum_order_amount', NULL, NULL, '2022-04-17 06:57:17', '2022-04-17 06:57:17'),
(122, 'item_name', 'eCommerce', NULL, '2022-04-17 06:57:17', '2022-04-17 06:57:17'),
(123, 'aamarpay', '0', NULL, '2022-04-17 06:57:17', '2022-04-17 06:57:17'),
(124, 'aamarpay_sandbox', '0', NULL, '2022-04-17 06:57:17', '2022-04-17 06:57:17'),
(125, 'login_page_image', NULL, NULL, '2024-01-16 12:51:46', '2024-01-16 12:51:46'),
(126, 'register_page_image', NULL, NULL, '2024-01-16 12:51:46', '2024-01-16 12:51:46'),
(127, 'flash_deal_banner', NULL, NULL, '2024-01-16 12:51:46', '2024-01-16 12:51:46'),
(128, 'flash_deal_banner_small', NULL, NULL, '2024-01-16 12:51:46', '2024-01-16 12:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) UNSIGNED NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `temp_user_id` varchar(255) DEFAULT NULL,
  `address_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) DEFAULT NULL,
  `variation` text DEFAULT NULL,
  `price` double(20,2) DEFAULT 0.00,
  `tax` double(20,2) DEFAULT 0.00,
  `shipping_cost` double(20,2) NOT NULL DEFAULT 0.00,
  `shipping_type` varchar(30) NOT NULL DEFAULT '',
  `pickup_point` int(11) DEFAULT NULL,
  `carrier_id` int(11) DEFAULT NULL,
  `discount` double(10,2) NOT NULL DEFAULT 0.00,
  `product_referral_code` varchar(255) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_applied` tinyint(4) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `owner_id`, `user_id`, `temp_user_id`, `address_id`, `product_id`, `variation`, `price`, `tax`, `shipping_cost`, `shipping_type`, `pickup_point`, `carrier_id`, `discount`, `product_referral_code`, `coupon_code`, `coupon_applied`, `quantity`, `created_at`, `updated_at`) VALUES
(29, 9, NULL, 'cbb77f9ea05479f162d4', 0, 1, '', 40.00, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0, 1, '2024-01-16 12:59:28', '2024-01-16 12:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT 0,
  `level` int(11) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL,
  `order_level` int(11) NOT NULL DEFAULT 0,
  `banner` varchar(100) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `cover_image` varchar(100) DEFAULT NULL,
  `featured` int(1) NOT NULL DEFAULT 0,
  `top` int(1) NOT NULL DEFAULT 0,
  `slug` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `level`, `name`, `order_level`, `banner`, `icon`, `cover_image`, `featured`, `top`, `slug`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 'Grocery', 10, 'uploads/categories/banner/category-banner.jpg', '1716745133.jpg', NULL, 1, 1, 'grocery', 'Grocery', NULL, '2024-05-26 18:08:29', '2024-05-26 18:08:29'),
(2, 0, 0, 'Pharmacy', 0, 'uploads/categories/banner/category-banner.jpg', 'uploads/categories/icon/h9XhWwI401u6sRoLITEk9SUMRAlWN8moGrpPfS6I.png', NULL, 1, 0, 'pharmacy', 'Pharmacy', NULL, '2024-05-24 16:29:02', '2024-05-24 16:29:02'),
(3, 0, 0, 'Electronics', 0, 'uploads/categories/banner/category-banner.jpg', 'uploads/categories/icon/rKAPw5rNlS84JtD9ZQqn366jwE11qyJqbzAe5yaA.png', NULL, 1, 1, 'electronics', 'Electronics', NULL, '2024-05-24 16:34:42', '2024-05-24 16:34:42'),
(4, 0, 0, 'Fashion', 0, NULL, NULL, NULL, 1, 0, 'Fashion-sMHhm', 'Fashion', 'Fashion', '2024-05-24 16:40:07', '2024-05-24 16:40:07'),
(5, 0, 0, 'Beauty', 0, NULL, NULL, NULL, 1, 0, 'mother--baby-2o9vf', 'Beauty', 'Beauty', '2024-05-24 16:51:10', '2024-05-24 16:51:10'),
(6, 0, 0, 'Mother & Baby', 0, NULL, NULL, NULL, 1, 0, 'fashion-rdmgt', 'Mother & Baby', 'Mother & Baby', '2024-05-24 16:51:54', '2024-05-24 16:51:54'),
(7, 0, 0, 'Meat & Fish', 0, NULL, NULL, NULL, 1, 0, 'Meat--Fish-48DEr', 'Meat & Fish', NULL, '2024-05-24 17:16:57', '2024-05-24 17:16:57'),
(8, 0, 0, 'Fruits & Vegetables', 0, NULL, NULL, NULL, 1, 0, 'Fruits--Vegetables-2PaYY', 'Fruits & Vegetables', NULL, '2024-05-24 17:16:54', '2024-05-24 17:16:54'),
(9, 1, 1, 'Beverages', 0, NULL, NULL, NULL, 1, 0, 'beverages-tmaak', 'Beverages', NULL, '2024-05-24 17:17:11', '2024-05-24 17:17:11'),
(10, 1, 1, 'Cooking', 0, NULL, NULL, NULL, 0, 0, 'Cooking-GEklB', 'Cooking', NULL, '2024-05-24 17:11:22', '2024-05-24 17:11:22'),
(11, 0, 0, 'Office & Stationery', 0, NULL, NULL, NULL, 0, 0, 'Office--Stationery-PeW27', 'Office & Stationery', NULL, '2024-05-24 17:30:01', '2024-05-24 17:30:01'),
(12, 0, 0, 'icon test', 0, NULL, '1716744918.jpg', NULL, 0, 0, 'icon-test-pp9sf', 'icon test', NULL, '2024-05-26 17:50:36', '2024-05-26 17:50:36'),
(13, 0, 0, 'Advance Payments', 0, NULL, '1716744019.jpg', NULL, 0, 0, 'advance-payments-mmpql', 'Advance Payments', NULL, '2024-05-26 17:50:37', '2024-05-26 17:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `name`, `lang`, `created_at`, `updated_at`) VALUES
(1, 1, 'Grocery', 'en', '2024-01-10 12:01:13', '2024-05-25 16:28:47'),
(2, 2, 'Pharmacy', 'en', '2024-01-10 12:02:53', '2024-05-24 16:29:02'),
(3, 3, 'Electronics', 'en', '2024-05-24 16:34:42', '2024-05-24 16:34:42'),
(4, 6, 'Mother & Baby', 'en', '2024-05-24 16:39:51', '2024-05-24 16:51:54'),
(5, 5, 'Beauty', 'en', '2024-05-24 16:41:26', '2024-05-24 16:51:10'),
(6, 7, 'Meat & Fish', 'en', '2024-05-24 17:05:20', '2024-05-24 17:05:20'),
(7, 8, 'Fruits & Vegetables', 'en', '2024-05-24 17:06:31', '2024-05-24 17:06:31'),
(8, 9, 'Beverages', 'en', '2024-05-24 17:10:19', '2024-05-24 17:10:19'),
(9, 10, 'Cooking', 'en', '2024-05-24 17:11:22', '2024-05-24 17:11:22'),
(10, 11, 'Office & Stationery', 'en', '2024-05-24 17:30:01', '2024-05-24 17:30:01'),
(11, 12, 'icon test', 'en', '2024-05-25 18:04:29', '2024-05-25 18:04:29'),
(12, 13, 'Advance Payments', 'en', '2024-05-25 18:08:27', '2024-05-25 18:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `code` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `zone_id` int(11) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `zone_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BD', 'Bangladesh', 0, 1, '2021-04-06 01:06:30', '2024-01-13 09:32:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `discount` double(20,2) NOT NULL,
  `discount_type` varchar(100) NOT NULL,
  `start_date` int(15) NOT NULL,
  `end_date` int(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_usages`
--

CREATE TABLE `coupon_usages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `exchange_rate` double(10,5) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `code` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `exchange_rate`, `status`, `code`, `created_at`, `updated_at`) VALUES
(1, 'U.S. Dollar', '$', 1.00000, 1, 'USD', '2018-10-09 11:35:08', '2018-10-17 05:50:52'),
(27, 'Taka', '৳', 84.00000, 1, 'BDT', '2018-10-09 11:35:08', '2018-12-02 05:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `country_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bagar Hat', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(2, 'Bandarban', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(3, 'Barguna', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(4, 'Barisal', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(5, 'Bhola', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(6, 'Bogora', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(7, 'Brahman Bariya', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(8, 'Chandpur', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(9, 'Chattagam', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(10, 'Chuadanga', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(11, 'Dhaka', 1, 1, '2021-04-06 01:11:20', '2024-01-13 09:33:01', NULL),
(349, 'Dinajpur', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(350, 'Faridpur', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(351, 'Feni', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(352, 'Gaybanda', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(353, 'Gazipur', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(354, 'Gopalganj', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(355, 'Habiganj', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(356, 'Jaipur Hat', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(357, 'Jamalpur', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(358, 'Jessor', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(359, 'Jhalakati', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(360, 'Jhanaydah', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(361, 'Khagrachhari', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(362, 'Khulna', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(363, 'Kishorganj', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(364, 'Koks Bazar', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(365, 'Komilla', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(366, 'Kurigram', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(367, 'Kushtiya', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(368, 'Lakshmipur', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(369, 'Lalmanir Hat', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(370, 'Madaripur', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(371, 'Magura', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(372, 'Maimansingh', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(373, 'Manikganj', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(374, 'Maulvi Bazar', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(375, 'Meherpur', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(376, 'Munshiganj', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(377, 'Naral', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(378, 'Narayanganj', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(379, 'Narsingdi', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(380, 'Nator', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(381, 'Naugaon', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(382, 'Nawabganj', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(383, 'Netrakona', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(384, 'Nilphamari', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(385, 'Noakhali', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(386, 'Pabna', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(387, 'Panchagarh', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(388, 'Patuakhali', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(389, 'Pirojpur', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(390, 'Rajbari', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(391, 'Rajshahi', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(392, 'Rangamati', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(393, 'Rangpur', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(394, 'Satkhira', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(395, 'Shariatpur', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(396, 'Sherpur', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(397, 'Silhat', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(398, 'Sirajganj', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(399, 'Sunamganj', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(400, 'Tangayal', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL),
(401, 'Thakurgaon', 1, 0, '2021-04-06 01:11:20', '2021-04-06 01:11:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `firebase_notifications`
--

CREATE TABLE `firebase_notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `item_type` varchar(255) NOT NULL,
  `item_type_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_deals`
--

CREATE TABLE `flash_deals` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `start_date` int(20) DEFAULT NULL,
  `end_date` int(20) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `featured` int(1) NOT NULL DEFAULT 0,
  `background_color` varchar(255) DEFAULT NULL,
  `text_color` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_deal_products`
--

CREATE TABLE `flash_deal_products` (
  `id` int(11) NOT NULL,
  `flash_deal_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `discount` double(20,2) DEFAULT 0.00,
  `discount_type` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_deal_translations`
--

CREATE TABLE `flash_deal_translations` (
  `id` bigint(20) NOT NULL,
  `flash_deal_id` bigint(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_categories`
--

CREATE TABLE `home_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subsubcategories` varchar(1000) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_categories`
--

INSERT INTO `home_categories` (`id`, `category_id`, `subsubcategories`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"1\"]', 1, '2019-03-12 06:38:23', '2019-03-12 06:38:23'),
(2, 2, '[\"10\"]', 1, '2019-03-12 06:44:54', '2019-03-12 06:44:54');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `app_lang_code` varchar(255) DEFAULT 'en',
  `rtl` int(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `app_lang_code`, `rtl`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 'en', 0, 1, '2019-01-20 12:13:20', '2019-01-20 12:13:20'),
(3, 'Bangla', 'bd', 'bn', 0, 1, '2019-02-17 06:35:37', '2019-02-18 06:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(191) NOT NULL,
  `notifiable_type` varchar(191) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('02396f79-7761-4c5c-94b4-f9dd0f42d9f2', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 8, '{\"order_id\":1,\"order_code\":\"20240113-15374683\",\"user_id\":8,\"seller_id\":9,\"status\":\"placed\"}', '2024-04-09 17:08:24', '2024-01-13 09:37:51', '2024-04-09 17:08:24'),
('920ba6a8-608e-4a27-bbb3-2025f62137f1', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 9, '{\"order_id\":1,\"order_code\":\"20240113-15374683\",\"user_id\":8,\"seller_id\":9,\"status\":\"placed\"}', NULL, '2024-01-13 09:37:51', '2024-01-13 09:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `combined_order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `guest_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `shipping_address` longtext DEFAULT NULL,
  `additional_info` longtext DEFAULT NULL,
  `shipping_type` varchar(50) NOT NULL,
  `order_from` varchar(20) NOT NULL DEFAULT 'web',
  `pickup_point_id` int(11) NOT NULL DEFAULT 0,
  `carrier_id` int(11) DEFAULT NULL,
  `delivery_status` varchar(20) DEFAULT 'pending',
  `payment_type` varchar(20) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT 'unpaid',
  `payment_details` longtext DEFAULT NULL,
  `grand_total` double(20,2) DEFAULT NULL,
  `coupon_discount` double(20,2) NOT NULL DEFAULT 0.00,
  `code` mediumtext DEFAULT NULL,
  `tracking_code` varchar(255) DEFAULT NULL,
  `date` int(20) NOT NULL,
  `viewed` int(1) NOT NULL DEFAULT 0,
  `delivery_viewed` int(1) NOT NULL DEFAULT 1,
  `payment_status_viewed` int(1) DEFAULT 1,
  `commission_calculated` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `combined_order_id`, `user_id`, `guest_id`, `seller_id`, `shipping_address`, `additional_info`, `shipping_type`, `order_from`, `pickup_point_id`, `carrier_id`, `delivery_status`, `payment_type`, `payment_status`, `payment_details`, `grand_total`, `coupon_discount`, `code`, `tracking_code`, `date`, `viewed`, `delivery_viewed`, `payment_status_viewed`, `commission_calculated`, `created_at`, `updated_at`) VALUES
(1, 1, 8, NULL, 9, '{\"name\":\"Mr. Customer\",\"email\":\"customer@example.com\",\"address\":\"Mirpur 11\",\"country\":\"Bangladesh\",\"state\":\"Dhaka\",\"city\":\"Dhamrai\",\"postal_code\":\"1219\",\"phone\":\"01821554477\"}', NULL, 'home_delivery', 'web', 0, NULL, 'pending', 'cash_on_delivery', 'unpaid', NULL, 40.00, 0.00, '20240113-15374683', NULL, 1705160266, 0, 1, 1, 0, '2024-01-13 09:37:46', '2024-04-09 17:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `variation` longtext DEFAULT NULL,
  `price` double(20,2) DEFAULT NULL,
  `tax` double(20,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` double(20,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) DEFAULT NULL,
  `payment_status` varchar(10) NOT NULL DEFAULT 'unpaid',
  `delivery_status` varchar(20) DEFAULT 'pending',
  `shipping_type` varchar(255) DEFAULT NULL,
  `pickup_point_id` int(11) DEFAULT NULL,
  `product_referral_code` varchar(255) DEFAULT NULL,
  `earn_point` double(25,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `seller_id`, `product_id`, `variation`, `price`, `tax`, `shipping_cost`, `quantity`, `payment_status`, `delivery_status`, `shipping_type`, `pickup_point_id`, `product_referral_code`, `earn_point`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 1, '', 40.00, 0.00, 0.00, 1, 'unpaid', 'pending', 'home_delivery', NULL, NULL, 0.00, '2024-01-13 09:37:46', '2024-01-13 09:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `otp_configurations`
--

CREATE TABLE `otp_configurations` (
  `id` int(11) NOT NULL,
  `type` varchar(200) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `otp_configurations`
--

INSERT INTO `otp_configurations` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(6, 'ssl_wireless', '1', '2020-03-22 09:54:03', '2024-01-16 12:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_description` varchar(1000) DEFAULT NULL,
  `keywords` varchar(1000) DEFAULT NULL,
  `meta_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `type`, `title`, `slug`, `content`, `meta_title`, `meta_description`, `keywords`, `meta_image`, `created_at`, `updated_at`) VALUES
(1, 'home_page', 'Home Page', 'home', NULL, NULL, NULL, NULL, NULL, '2020-11-04 10:13:20', '2020-11-04 10:13:20'),
(2, 'seller_policy_page', 'Seller Policy Pages', 'seller-policy', NULL, NULL, NULL, NULL, NULL, '2020-11-04 10:14:41', '2020-11-04 12:19:30'),
(3, 'return_policy_page', 'Return Policy Page', 'return-policy', NULL, NULL, NULL, NULL, NULL, '2020-11-04 10:14:41', '2020-11-04 10:14:41'),
(4, 'support_policy_page', 'Support Policy Page', 'support-policy', NULL, NULL, NULL, NULL, NULL, '2020-11-04 10:14:59', '2020-11-04 10:14:59'),
(5, 'terms_conditions_page', 'Term Conditions Page', 'terms', NULL, NULL, NULL, NULL, NULL, '2020-11-04 10:15:29', '2020-11-04 10:15:29'),
(6, 'privacy_policy_page', 'Privacy Policy Page', 'privacy-policy', NULL, NULL, NULL, NULL, NULL, '2020-11-04 10:15:55', '2020-11-04 10:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` bigint(20) NOT NULL,
  `page_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `lang` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `section` varchar(50) DEFAULT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `section`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'add_new_product', 'product', 'web', '2022-06-12 09:31:31', '2022-06-12 09:31:31'),
(2, 'show_all_products', 'product', 'web', '2022-06-12 09:32:34', '2022-06-12 09:32:34'),
(3, 'show_in_house_products', 'product', 'web', '2022-06-12 09:33:08', '2022-06-12 09:33:08'),
(5, 'product_edit', 'product', 'web', '2022-06-13 13:50:06', '2022-06-13 13:50:06'),
(7, 'product_delete', 'product', 'web', '2022-06-13 15:24:47', '2022-06-13 15:24:47'),
(13, 'product_bulk_import', 'product', 'web', '2022-06-13 18:18:52', '2022-06-13 18:18:52'),
(14, 'product_bulk_export', 'product', 'web', '2022-06-13 18:19:19', '2022-06-13 18:19:19'),
(15, 'view_product_categories', 'product_category', 'web', '2022-06-13 18:24:33', '2022-06-13 18:24:33'),
(16, 'add_product_category', 'product_category', 'web', '2022-06-13 18:25:56', '2022-06-13 18:25:56'),
(17, 'edit_product_category', 'product_category', 'web', '2022-06-13 18:26:17', '2022-06-13 18:26:17'),
(18, 'delete_product_category', 'product_category', 'web', '2022-06-13 18:26:42', '2022-06-13 18:26:42'),
(19, 'view_all_brands', 'brand', 'web', '2022-06-14 11:31:46', '2022-06-14 11:31:46'),
(20, 'add_brand', 'brand', 'web', '2022-06-14 11:32:08', '2022-06-14 11:32:08'),
(21, 'edit_brand', 'brand', 'web', '2022-06-14 11:32:16', '2022-06-14 11:32:16'),
(22, 'delete_brand', 'brand', 'web', '2022-06-14 11:32:25', '2022-06-14 11:32:25'),
(37, 'view_all_orders', 'sale', 'web', '2022-06-14 17:49:04', '2022-06-14 17:49:04'),
(38, 'view_inhouse_orders', 'sale', 'web', '2022-06-14 17:49:30', '2022-06-14 17:49:30'),
(41, 'view_order_details', 'sale', 'web', '2022-06-14 17:53:13', '2022-06-14 17:53:13'),
(42, 'update_order_payment_status', 'sale', 'web', '2022-06-14 17:53:55', '2022-06-14 17:53:55'),
(43, 'update_order_delivery_status', 'sale', 'web', '2022-06-14 17:54:02', '2022-06-14 17:54:02'),
(44, 'delete_order', 'sale', 'web', '2022-06-14 17:55:02', '2022-06-14 17:55:02'),
(45, 'view_all_customers', 'customer', 'web', '2022-06-14 17:59:28', '2022-06-14 17:59:28'),
(46, 'login_as_customer', 'customer', 'web', '2022-06-14 17:59:58', '2022-06-14 17:59:58'),
(47, 'ban_customer', 'customer', 'web', '2022-06-14 18:00:12', '2022-06-14 18:00:12'),
(48, 'delete_customer', 'customer', 'web', '2022-06-14 18:00:45', '2022-06-14 18:00:45'),
(68, 'in_house_product_sale_report', 'report', 'web', '2022-06-18 15:43:02', '2022-06-18 15:43:02'),
(70, 'products_stock_report', 'report', 'web', '2022-06-18 15:43:51', '2022-06-18 15:43:51'),
(71, 'product_wishlist_report', 'report', 'web', '2022-06-18 15:46:18', '2022-06-18 15:46:18'),
(72, 'user_search_report', 'report', 'web', '2022-06-18 15:46:39', '2022-06-18 15:46:39'),
(73, 'commission_history_report', 'report', 'web', '2022-06-18 15:47:17', '2022-06-18 15:47:17'),
(74, 'wallet_transaction_report', 'report', 'web', '2022-06-18 15:48:00', '2022-06-18 15:48:00'),
(75, 'view_blogs', 'blog', 'web', '2022-06-19 00:08:14', '2022-06-19 00:08:14'),
(76, 'add_blog', 'blog', 'web', '2022-06-19 00:08:43', '2022-06-19 00:08:43'),
(77, 'edit_blog', 'blog', 'web', '2022-06-19 00:08:56', '2022-06-19 00:08:56'),
(78, 'delete_blog', 'blog', 'web', '2022-06-19 00:09:08', '2022-06-19 00:09:08'),
(79, 'publish_blog', 'blog', 'web', '2022-06-19 00:11:09', '2022-06-19 00:11:09'),
(80, 'view_blog_categories', 'blog', 'web', '2022-06-19 00:12:55', '2022-06-19 00:12:55'),
(81, 'add_blog_category', 'blog', 'web', '2022-06-19 00:13:24', '2022-06-19 00:13:24'),
(82, 'edit_blog_category', 'blog', 'web', '2022-06-19 00:13:37', '2022-06-19 00:13:37'),
(83, 'delete_blog_category', 'blog', 'web', '2022-06-19 00:14:06', '2022-06-19 00:14:06'),
(84, 'view_all_flash_deals', 'marketing', 'web', '2022-06-19 01:18:52', '2022-06-19 01:18:52'),
(85, 'add_flash_deal', 'marketing', 'web', '2022-06-19 01:19:22', '2022-06-19 01:19:22'),
(86, 'edit_flash_deal', 'marketing', 'web', '2022-06-19 01:19:32', '2022-06-19 01:19:32'),
(87, 'delete_flash_deal', 'marketing', 'web', '2022-06-19 01:19:44', '2022-06-19 01:19:44'),
(88, 'publish_flash_deal', 'marketing', 'web', '2022-06-19 01:20:45', '2022-06-19 01:20:45'),
(89, 'featured_flash_deal', 'marketing', 'web', '2022-06-19 01:23:07', '2022-06-19 01:23:07'),
(90, 'view_all_coupons', 'marketing', 'web', '2022-06-19 01:23:47', '2022-06-19 01:23:47'),
(91, 'add_coupon', 'marketing', 'web', '2022-06-19 01:24:07', '2022-06-19 01:24:07'),
(92, 'edit_coupon', 'marketing', 'web', '2022-06-19 01:24:24', '2022-06-19 01:24:24'),
(93, 'delete_coupon', 'marketing', 'web', '2022-06-19 01:24:34', '2022-06-19 01:24:34'),
(94, 'send_newsletter', 'marketing', 'web', '2022-06-19 01:25:53', '2022-06-19 01:25:53'),
(95, 'view_all_subscribers', 'marketing', 'web', '2022-06-19 01:32:13', '2022-06-19 01:32:13'),
(96, 'delete_subscriber', 'marketing', 'web', '2022-06-19 01:32:35', '2022-06-19 01:32:35'),
(99, 'view_all_product_queries', 'support', 'web', '2022-06-19 17:38:45', '2022-06-19 17:38:45'),
(100, 'reply_to_product_queries', 'support', 'web', '2022-06-19 17:40:02', '2022-06-19 17:40:02'),
(102, 'header_setup', 'website_setup', 'web', '2022-06-19 17:45:24', '2022-06-19 17:45:24'),
(103, 'footer_setup', 'website_setup', 'web', '2022-06-19 17:45:37', '2022-06-19 17:45:37'),
(104, 'website_appearance', 'website_setup', 'web', '2022-06-19 17:46:49', '2022-06-19 17:46:49'),
(105, 'view_all_website_pages', 'website_setup', 'web', '2022-06-19 17:50:04', '2022-06-19 17:50:04'),
(106, 'add_website_page', 'website_setup', 'web', '2022-06-19 17:50:38', '2022-06-19 17:50:38'),
(107, 'edit_website_page', 'website_setup', 'web', '2022-06-19 17:50:47', '2022-06-19 17:50:47'),
(108, 'delete_website_page', 'website_setup', 'web', '2022-06-19 17:52:09', '2022-06-19 17:52:09'),
(109, 'general_settings', 'setup_configurations', 'web', '2022-06-19 18:38:36', '2022-06-19 18:38:36'),
(110, 'features_activation', 'setup_configurations', 'web', '2022-06-19 18:39:42', '2022-06-19 18:39:42'),
(111, 'language_setup', 'setup_configurations', 'web', '2022-06-19 22:13:30', '2022-06-19 22:13:30'),
(112, 'currency_setup', 'setup_configurations', 'web', '2022-06-19 22:14:33', '2022-06-19 22:14:33'),
(115, 'smtp_settings', 'setup_configurations', 'web', '2022-06-19 22:16:05', '2022-06-19 22:16:05'),
(116, 'payment_methods_configurations', 'setup_configurations', 'web', '2022-06-19 22:25:27', '2022-06-19 22:25:27'),
(117, 'order_configuration', 'setup_configurations', 'web', '2022-06-19 22:26:26', '2022-06-19 22:26:26'),
(118, 'file_system_&_cache_configuration', 'setup_configurations', 'web', '2022-06-19 22:26:59', '2022-06-19 22:26:59'),
(119, 'social_media_logins', 'setup_configurations', 'web', '2022-06-19 22:27:22', '2022-06-19 22:27:22'),
(120, 'facebook_chat', 'setup_configurations', 'web', '2022-06-19 22:28:31', '2022-06-19 22:28:31'),
(121, 'facebook_comment', 'setup_configurations', 'web', '2022-06-19 22:28:51', '2022-06-19 22:28:51'),
(122, 'analytics_tools_configuration', 'setup_configurations', 'web', '2022-06-19 22:29:57', '2022-06-19 22:29:57'),
(123, 'google_recaptcha_configuration', 'setup_configurations', 'web', '2022-06-19 22:30:55', '2022-06-19 22:30:55'),
(124, 'google_map_setting', 'setup_configurations', 'web', '2022-06-19 22:31:28', '2022-06-19 22:31:28'),
(125, 'google_firebase_setting', 'setup_configurations', 'web', '2022-06-19 22:32:00', '2022-06-19 22:32:00'),
(126, 'shipping_configuration', 'setup_configurations', 'web', '2022-06-19 22:41:29', '2022-06-19 22:41:29'),
(127, 'shipping_country_setting', 'setup_configurations', 'web', '2022-06-19 22:42:14', '2022-06-19 22:42:14'),
(128, 'manage_shipping_states', 'setup_configurations', 'web', '2022-06-19 22:43:43', '2022-06-19 22:43:43'),
(129, 'manage_shipping_areas', 'setup_configurations', 'web', '2022-06-19 22:44:17', '2022-06-19 22:44:17'),
(130, 'view_all_staffs', 'staff', 'web', '2022-06-19 22:45:00', '2022-06-19 22:45:00'),
(131, 'add_staff', 'staff', 'web', '2022-06-19 22:45:09', '2022-06-19 22:45:09'),
(132, 'edit_staff', 'staff', 'web', '2022-06-19 22:45:21', '2022-06-19 22:45:21'),
(133, 'delete_staff', 'staff', 'web', '2022-06-19 22:45:36', '2022-06-19 22:45:36'),
(134, 'view_staff_roles', 'staff', 'web', '2022-06-19 22:46:27', '2022-06-19 22:46:27'),
(135, 'add_staff_role', 'staff', 'web', '2022-06-19 22:53:00', '2022-06-19 22:53:00'),
(136, 'edit_staff_role', 'staff', 'web', '2022-06-19 22:53:11', '2022-06-19 22:53:11'),
(137, 'delete_staff_role', 'staff', 'web', '2022-06-19 22:53:22', '2022-06-19 22:53:22'),
(139, 'server_status', 'system', 'web', '2022-06-19 22:57:58', '2022-06-19 22:57:58'),
(140, 'manage_addons', 'system', 'web', '2022-06-19 23:15:43', '2022-06-19 23:15:43'),
(141, 'admin_dashboard', 'system', 'web', '2022-06-20 18:26:52', '2022-06-20 18:26:52'),
(142, 'pos_manager', 'pos_system', 'web', '2022-06-20 19:46:20', '2022-06-20 19:46:20'),
(143, 'pos_configuration', 'pos_system', 'web', '2022-06-20 19:56:00', '2022-06-20 19:56:00'),
(159, 'view_all_delivery_boy', 'delivery_boy', 'web', '2022-06-20 23:41:57', '2022-06-20 23:41:57'),
(160, 'add_delivery_boy', 'delivery_boy', 'web', '2022-06-20 23:43:13', '2022-06-20 23:43:13'),
(161, 'edit_delivery_boy', 'delivery_boy', 'web', '2022-06-20 23:43:32', '2022-06-20 23:43:32'),
(162, 'ban_delivery_boy', 'delivery_boy', 'web', '2022-06-21 18:55:57', '2022-06-21 18:55:57'),
(163, 'collect_from_delivery_boy', 'delivery_boy', 'web', '2022-06-21 18:58:23', '2022-06-21 18:58:23'),
(164, 'pay_to_delivery_boy', 'delivery_boy', 'web', '2022-06-21 18:58:35', '2022-06-21 18:58:35'),
(165, 'delivery_boy_payment_history', 'delivery_boy', 'web', '2022-06-21 19:38:43', '2022-06-21 19:38:43'),
(166, 'collected_histories_from_delivery_boy', 'delivery_boy', 'web', '2022-06-21 19:40:04', '2022-06-21 19:40:04'),
(167, 'order_cancle_request_by_delivery_boy', 'delivery_boy', 'web', '2022-06-21 20:06:37', '2022-06-21 20:06:37'),
(168, 'delivery_boy_configuration', 'delivery_boy', 'web', '2022-06-21 20:07:07', '2022-06-21 20:07:07'),
(169, 'view_refund_requests', 'refund_request', 'web', '2022-06-21 20:21:11', '2022-06-21 20:21:11'),
(170, 'accept_refund_request', 'refund_request', 'web', '2022-06-21 20:21:55', '2022-06-21 20:21:55'),
(171, 'reject_refund_request', 'refund_request', 'web', '2022-06-21 20:23:20', '2022-06-21 20:23:20'),
(172, 'view_approved_refund_requests', 'refund_request', 'web', '2022-06-21 20:24:09', '2022-06-21 20:24:09'),
(173, 'view_rejected_refund_requests', 'refund_request', 'web', '2022-06-21 20:33:40', '2022-06-21 20:33:40'),
(174, 'refund_request_configuration', 'refund_request', 'web', '2022-06-21 20:34:21', '2022-06-21 20:34:21'),
(175, 'affiliate_registration_form_config', 'affiliate_system', 'web', '2022-06-21 22:52:18', '2022-06-21 22:52:18'),
(176, 'affiliate_configurations', 'affiliate_system', 'web', '2022-06-21 22:52:35', '2022-06-21 22:52:35'),
(177, 'view_affiliate_users', 'affiliate_system', 'web', '2022-06-21 22:53:19', '2022-06-21 22:53:19'),
(178, 'pay_to_affiliate_user', 'affiliate_system', 'web', '2022-06-21 22:54:49', '2022-06-21 22:54:49'),
(179, 'affiliate_users_payment_history', 'affiliate_system', 'web', '2022-06-21 22:55:51', '2022-06-21 22:55:51'),
(180, 'view_all_referral_users', 'affiliate_system', 'web', '2022-06-21 22:56:46', '2022-06-21 22:56:46'),
(181, 'view_affiliate_withdraw_requests', 'affiliate_system', 'web', '2022-06-21 22:58:01', '2022-06-21 22:58:01'),
(182, 'accept_affiliate_withdraw_requests', 'affiliate_system', 'web', '2022-06-21 22:59:38', '2022-06-21 22:59:38'),
(183, 'reject_affiliate_withdraw_request', 'affiliate_system', 'web', '2022-06-21 23:00:04', '2022-06-21 23:00:04'),
(184, 'view_affiliate_logs', 'affiliate_system', 'web', '2022-06-21 23:00:51', '2022-06-21 23:00:51'),
(189, 'view_all_offline_wallet_recharges', 'offline_payment', 'web', '2022-06-21 23:09:09', '2022-06-21 23:09:09'),
(196, 'club_point_configurations', 'club_point', 'web', '2022-06-21 23:16:57', '2022-06-21 23:16:57'),
(197, 'set_club_points', 'club_point', 'web', '2022-06-21 23:17:21', '2022-06-21 23:17:21'),
(198, 'view_users_club_points', 'club_point', 'web', '2022-06-21 23:18:14', '2022-06-21 23:18:14'),
(199, 'otp_configurations', 'otp_system', 'web', '2022-06-22 00:07:28', '2022-06-22 00:07:28'),
(200, 'sms_templates', 'otp_system', 'web', '2022-06-22 00:08:13', '2022-06-22 00:08:13'),
(201, 'sms_providers_configurations', 'otp_system', 'web', '2022-06-22 00:08:44', '2022-06-22 00:08:44'),
(208, 'send_bulk_sms', 'otp_system', 'web', '2022-06-22 00:19:06', '2022-06-22 00:19:06'),
(209, 'assign_delivery_boy_for_orders', 'delivery_boy', 'web', '2022-06-22 00:20:16', '2022-06-22 00:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `thumbnail_img` varchar(100) DEFAULT NULL,
  `tags` varchar(500) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `unit_price` double(20,2) NOT NULL,
  `purchase_price` double(20,2) DEFAULT NULL,
  `todays_deal` int(11) NOT NULL DEFAULT 0,
  `published` int(11) NOT NULL DEFAULT 1,
  `stock_visibility_state` varchar(10) NOT NULL DEFAULT 'quantity',
  `cash_on_delivery` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = On, 0 = Off',
  `featured` int(11) NOT NULL DEFAULT 0,
  `current_stock` int(10) NOT NULL DEFAULT 0,
  `unit` varchar(20) DEFAULT NULL,
  `weight` double(8,2) NOT NULL DEFAULT 0.00,
  `min_qty` int(11) NOT NULL DEFAULT 1,
  `low_stock_quantity` int(11) DEFAULT NULL,
  `discount` double(20,2) DEFAULT NULL,
  `discount_type` varchar(10) DEFAULT NULL,
  `discount_start_date` int(11) DEFAULT NULL,
  `discount_end_date` int(11) DEFAULT NULL,
  `shipping_type` varchar(20) DEFAULT 'flat_rate',
  `shipping_cost` double(20,2) NOT NULL DEFAULT 0.00,
  `num_of_sale` int(11) NOT NULL DEFAULT 0,
  `meta_title` mediumtext DEFAULT NULL,
  `meta_description` longtext DEFAULT NULL,
  `meta_img` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `slug` mediumtext NOT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `user_id`, `category_id`, `brand_id`, `thumbnail_img`, `tags`, `description`, `unit_price`, `purchase_price`, `todays_deal`, `published`, `stock_visibility_state`, `cash_on_delivery`, `featured`, `current_stock`, `unit`, `weight`, `min_qty`, `low_stock_quantity`, `discount`, `discount_type`, `discount_start_date`, `discount_end_date`, `shipping_type`, `shipping_cost`, `num_of_sale`, `meta_title`, `meta_description`, `meta_img`, `pdf`, `slug`, `barcode`, `created_at`, `updated_at`) VALUES
(1, 'Broccoli', 9, 1, NULL, '1', '', NULL, 40.00, NULL, 0, 1, 'quantity', 1, 0, 50, 'Pc', 0.00, 1, 1, 0.00, 'amount', NULL, NULL, 'free', 0.00, 1, 'Broccoli', '', '1', NULL, 'broccoli', NULL, '2024-01-11 11:19:42', '2024-01-13 09:37:46'),
(2, 'Fulkopi', 9, 1, NULL, '2', '', NULL, 45.00, NULL, 0, 1, 'quantity', 1, 0, 50, 'kg', 0.00, 1, 1, 0.00, 'amount', NULL, NULL, 'flat_rate', 0.00, 0, 'Fulkopi', '', '2', NULL, 'fulkopi', NULL, '2024-01-16 16:19:59', '2024-01-16 16:19:59'),
(3, 'Patacopy', 9, 1, NULL, '3', '', NULL, 55.00, NULL, 0, 1, 'quantity', 1, 0, 100, 'kg', 0.00, 1, 1, 0.00, 'amount', NULL, NULL, 'flat_rate', 0.00, 0, 'Patacopy', '', '3', NULL, 'patacopy', NULL, '2024-01-16 17:49:37', '2024-01-16 17:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant` varchar(255) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `price` double(20,2) NOT NULL DEFAULT 0.00,
  `qty` int(11) NOT NULL DEFAULT 0,
  `image` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_stocks`
--

INSERT INTO `product_stocks` (`id`, `product_id`, `variant`, `sku`, `price`, `qty`, `image`, `created_at`, `updated_at`) VALUES
(2, 1, '', NULL, 40.00, 49, NULL, '2024-01-11 11:23:02', '2024-01-13 09:37:46'),
(3, 2, '', NULL, 45.00, 50, NULL, '2024-01-16 16:19:59', '2024-01-16 16:19:59'),
(4, 3, '', NULL, 55.00, 100, NULL, '2024-01-16 17:49:37', '2024-01-16 17:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `lang` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `name`, `unit`, `description`, `lang`, `created_at`, `updated_at`) VALUES
(1, 1, 'Broccoli', 'Pc', NULL, 'en', '2024-01-11 11:19:42', '2024-01-11 11:19:42'),
(2, 2, 'Fulkopi', 'kg', NULL, 'en', '2024-01-16 16:19:59', '2024-01-16 16:19:59'),
(3, 3, 'Patacopy', 'kg', NULL, 'en', '2024-01-16 17:49:37', '2024-01-16 17:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2022-06-13 00:29:58', '2022-06-12 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_translations`
--

CREATE TABLE `role_translations` (
  `id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

CREATE TABLE `searches` (
  `id` int(11) NOT NULL,
  `query` varchar(1000) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `searches`
--

INSERT INTO `searches` (`id`, `query`, `count`, `created_at`, `updated_at`) VALUES
(2, 'dcs', 1, '2020-03-08 00:29:09', '2020-03-08 00:29:09'),
(3, 'das', 3, '2020-03-08 00:29:15', '2020-03-08 00:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `sms_templates`
--

CREATE TABLE `sms_templates` (
  `id` int(11) NOT NULL,
  `identifier` varchar(100) NOT NULL,
  `sms_body` longtext NOT NULL,
  `template_id` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sms_templates`
--

INSERT INTO `sms_templates` (`id`, `identifier`, `sms_body`, `template_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'phone_number_verification', '[[code]] is your verification code for [[site_name]].', NULL, 0, '2021-06-07 13:29:22', '2021-06-08 02:38:18'),
(2, 'password_reset', 'Your password reset code is [[code]].', NULL, 1, '2021-06-07 13:29:34', '2021-06-07 13:29:34'),
(3, 'order_placement', 'Your order has been placed and Order Code is [[order_code]]', NULL, 1, '2021-06-07 13:32:22', '2021-06-08 02:39:25'),
(4, 'delivery_status_change', 'Your delivery status has been updated to [[delivery_status]]  for Order code : [[order_code]]', NULL, 1, '2021-06-07 13:33:14', '2021-06-08 02:39:28'),
(5, 'payment_status_change', 'Your payment status has been updated to [[payment_status]] for Order code : [[order_code]]', NULL, 1, '2021-06-07 13:35:23', '2021-06-08 02:39:31'),
(6, 'assign_delivery_boy', 'You are assigned to deliver an order. Order code : [[order_code]]', NULL, 1, '2021-06-07 13:38:10', '2021-06-08 02:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(11) NOT NULL,
  `lang` varchar(10) DEFAULT NULL,
  `lang_key` text DEFAULT NULL,
  `lang_value` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `lang`, `lang_key`, `lang_value`, `created_at`, `updated_at`) VALUES
(3, 'en', 'all_category', 'All Category', '2020-11-02 07:40:38', '2021-09-20 07:29:07'),
(4, 'en', 'all', 'All', '2020-11-02 07:40:38', '2021-09-20 07:29:07'),
(5, 'en', 'flash_sale', 'Flash Sale', '2020-11-02 07:40:40', '2021-09-20 07:29:07'),
(6, 'en', 'view_more', 'View More', '2020-11-02 07:40:40', '2021-09-20 07:29:07'),
(7, 'en', 'add_to_wishlist', 'Add to wishlist', '2020-11-02 07:40:40', '2021-09-20 07:29:07'),
(8, 'en', 'add_to_compare', 'Add to compare', '2020-11-02 07:40:40', '2021-09-20 07:29:07'),
(9, 'en', 'add_to_cart', 'Add to cart', '2020-11-02 07:40:40', '2021-09-20 07:29:07'),
(10, 'en', 'club_point', 'Club Point', '2020-11-02 07:40:40', '2021-09-20 07:29:07'),
(13, 'en', 'used', 'Used', '2020-11-02 07:40:40', '2021-09-20 07:29:07'),
(14, 'en', 'top_10_categories', 'Top 10 Categories', '2020-11-02 07:40:40', '2021-09-20 07:29:07'),
(15, 'en', 'view_all_categories', 'View All Categories', '2020-11-02 07:40:40', '2021-09-20 07:29:07'),
(16, 'en', 'top_10_brands', 'Top 10 Brands', '2020-11-02 07:40:40', '2021-09-20 07:29:07'),
(17, 'en', 'view_all_brands', 'View All Brands', '2020-11-02 07:40:40', '2021-09-20 07:29:07'),
(43, 'en', 'terms__conditions', 'Terms & conditions', '2020-11-02 07:40:41', '2021-09-20 07:29:07'),
(51, 'en', 'best_selling', 'Best Selling', '2020-11-02 07:40:42', '2021-09-20 07:29:07'),
(53, 'en', 'top_20', 'Top 20', '2020-11-02 07:40:42', '2021-09-20 07:29:07'),
(55, 'en', 'featured_products', 'Featured Products', '2020-11-02 07:40:42', '2021-09-20 07:29:07'),
(58, 'en', 'popular_suggestions', 'Popular Suggestions', '2020-11-02 07:46:59', '2021-09-20 07:29:07'),
(59, 'en', 'category_suggestions', 'Category Suggestions', '2020-11-02 07:46:59', '2021-09-20 07:29:07'),
(63, 'en', 'price_range', 'Price range', '2020-11-02 07:47:01', '2021-09-20 07:29:07'),
(64, 'en', 'filter_by_color', 'Filter by color', '2020-11-02 07:47:02', '2021-09-20 07:29:07'),
(65, 'en', 'home', 'Home', '2020-11-02 07:47:02', '2021-09-20 07:29:07'),
(67, 'en', 'newest', 'Newest', '2020-11-02 07:47:02', '2021-09-20 07:29:07'),
(68, 'en', 'oldest', 'Oldest', '2020-11-02 07:47:02', '2021-09-20 07:29:07'),
(69, 'en', 'price_low_to_high', 'Price low to high', '2020-11-02 07:47:02', '2021-09-20 07:29:07'),
(70, 'en', 'price_high_to_low', 'Price high to low', '2020-11-02 07:47:02', '2021-09-20 07:29:07'),
(71, 'en', 'brands', 'Brands', '2020-11-02 07:47:02', '2021-09-20 07:29:07'),
(72, 'en', 'all_brands', 'All Brands', '2020-11-02 07:47:02', '2021-09-20 07:29:07'),
(74, 'en', 'all_sellers', 'All Sellers', '2020-11-02 07:47:02', '2021-09-20 07:29:07'),
(80, 'en', 'price', 'Price', '2020-11-02 08:18:03', '2021-09-20 07:29:07'),
(81, 'en', 'discount_price', 'Discount Price', '2020-11-02 08:18:03', '2021-09-20 07:29:07'),
(83, 'en', 'quantity', 'Quantity', '2020-11-02 08:18:03', '2021-09-20 07:29:07'),
(84, 'en', 'available', 'available', '2020-11-02 08:18:03', '2021-02-09 06:52:36'),
(85, 'en', 'total_price', 'Total Price', '2020-11-02 08:18:03', '2021-09-20 07:29:07'),
(86, 'en', 'out_of_stock', 'Out of Stock', '2020-11-02 08:18:03', '2021-09-20 07:29:07'),
(87, 'en', 'refund', 'Refund', '2020-11-02 08:18:03', '2021-09-20 07:29:07'),
(88, 'en', 'share', 'Share', '2020-11-02 08:18:03', '2021-09-20 07:29:07'),
(89, 'en', 'sold_by', 'Sold By', '2020-11-02 08:18:03', '2021-09-20 07:36:54'),
(91, 'en', 'top_selling_products', 'Top Selling Products', '2020-11-02 08:18:03', '2021-09-20 07:29:07'),
(92, 'en', 'description', 'Description', '2020-11-02 08:18:03', '2021-09-20 07:29:07'),
(97, 'en', 'related_products', 'Related products', '2020-11-02 08:18:03', '2021-09-20 07:29:07'),
(99, 'en', 'product_name', 'Product Name', '2020-11-02 08:18:03', '2021-09-20 07:29:07'),
(100, 'en', 'your_question', 'Your Question', '2020-11-02 08:18:03', '2021-09-20 07:29:07'),
(101, 'en', 'send', 'Send', '2020-11-02 08:18:03', '2021-09-20 07:29:07'),
(105, 'en', 'remember_me', 'Remember Me', '2020-11-02 08:18:03', '2021-09-20 07:29:07'),
(107, 'en', 'dont_have_an_account', 'Dont have an account?', '2020-11-02 08:18:04', '2021-09-20 07:29:07'),
(108, 'en', 'register_now', 'Register Now', '2020-11-02 08:18:04', '2021-09-20 07:29:07'),
(109, 'en', 'or_login_with', 'Or Login With', '2020-11-02 08:18:04', '2021-09-20 07:29:07'),
(110, 'en', 'oops', 'oops..', '2020-11-02 10:29:04', '2021-09-20 07:29:07'),
(111, 'en', 'this_item_is_out_of_stock', 'This item is out of stock!', '2020-11-02 10:29:04', '2021-09-20 07:29:07'),
(112, 'en', 'back_to_shopping', 'Back to shopping', '2020-11-02 10:29:04', '2021-09-20 07:29:07'),
(113, 'en', 'login_to_your_account', 'Login to your account.', '2020-11-02 11:27:41', '2021-09-20 07:29:07'),
(115, 'en', 'purchase_history', 'Purchase History', '2020-11-02 11:27:53', '2021-09-20 07:29:07'),
(116, 'en', 'new', 'New', '2020-11-02 11:27:53', '2021-09-20 07:29:07'),
(118, 'en', 'sent_refund_request', 'Sent Refund Request', '2020-11-02 11:27:53', '2021-09-20 07:29:07'),
(119, 'en', 'product_bulk_upload', 'Product Bulk Upload', '2020-11-02 11:27:53', '2021-09-20 07:29:07'),
(123, 'en', 'orders', 'Orders', '2020-11-02 11:27:53', '2021-09-20 07:29:07'),
(124, 'en', 'recieved_refund_request', 'Recieved Refund Request', '2020-11-02 11:27:53', '2021-09-20 07:29:07'),
(127, 'en', 'payment_history', 'Payment History', '2020-11-02 11:27:53', '2021-09-20 07:29:07'),
(128, 'en', 'money_withdraw', 'Money Withdraw', '2020-11-02 11:27:53', '2021-09-20 07:29:07'),
(129, 'en', 'conversations', 'Conversations', '2020-11-02 11:27:53', '2021-09-20 07:29:07'),
(130, 'en', 'my_wallet', 'My Wallet', '2020-11-02 11:27:53', '2021-09-20 07:29:07'),
(131, 'en', 'earning_points', 'Earning Points', '2020-11-02 11:27:53', '2021-09-20 07:29:07'),
(132, 'en', 'support_ticket', 'Support Ticket', '2020-11-02 11:27:53', '2021-09-20 07:29:07'),
(133, 'en', 'manage_profile', 'Manage Profile', '2020-11-02 11:27:53', '2021-09-20 07:29:07'),
(134, 'en', 'sold_amount', 'Sold Amount', '2020-11-02 11:27:53', '2021-09-20 07:29:07'),
(135, 'en', 'your_sold_amount_current_month', 'Your sold amount (current month)', '2020-11-02 11:27:53', '2021-09-20 07:29:07'),
(136, 'en', 'total_sold', 'Total Sold', '2020-11-02 11:27:54', '2021-09-20 07:29:07'),
(137, 'en', 'last_month_sold', 'Last Month Sold', '2020-11-02 11:27:54', '2021-09-20 07:29:07'),
(138, 'en', 'total_sale', 'Total sale', '2020-11-02 11:27:54', '2021-09-20 07:29:07'),
(139, 'en', 'total_earnings', 'Total earnings', '2020-11-02 11:27:54', '2021-09-20 07:29:07'),
(140, 'en', 'successful_orders', 'Successful orders', '2020-11-02 11:27:54', '2021-09-20 07:29:07'),
(141, 'en', 'total_orders', 'Total orders', '2020-11-02 11:27:54', '2021-09-20 07:29:07'),
(142, 'en', 'pending_orders', 'Pending orders', '2020-11-02 11:27:54', '2021-09-20 07:29:07'),
(143, 'en', 'cancelled_orders', 'Cancelled orders', '2020-11-02 11:27:54', '2021-09-20 07:29:07'),
(145, 'en', 'product', 'Product', '2020-11-02 11:27:55', '2021-09-20 07:29:07'),
(147, 'en', 'purchased_package', 'Purchased Package', '2020-11-02 11:27:55', '2021-09-20 07:29:07'),
(148, 'en', 'package_not_found', 'Package Not Found', '2020-11-02 11:27:55', '2021-09-20 07:29:07'),
(149, 'en', 'upgrade_package', 'Upgrade Package', '2020-11-02 11:27:55', '2021-09-20 07:29:07'),
(152, 'en', 'go_to_setting', 'Go to setting', '2020-11-02 11:27:55', '2021-09-20 07:29:07'),
(153, 'en', 'payment', 'Payment', '2020-11-02 11:27:55', '2021-09-20 07:29:07'),
(154, 'en', 'configure_your_payment_method', 'Configure your payment method', '2020-11-02 11:27:55', '2021-09-20 07:29:07'),
(156, 'en', 'my_panel', 'My Panel', '2020-11-02 11:27:55', '2021-09-20 07:29:07'),
(158, 'en', 'item_has_been_added_to_wishlist', 'Item has been added to wishlist', '2020-11-02 11:27:55', '2021-09-20 07:29:07'),
(159, 'en', 'my_points', 'My Points', '2020-11-02 11:28:15', '2021-09-20 07:29:07'),
(160, 'en', '_points', 'Points', '2020-11-02 11:28:15', '2021-09-20 07:29:07'),
(161, 'en', 'wallet_money', 'Wallet Money', '2020-11-02 11:28:16', '2021-09-20 07:29:07'),
(162, 'en', 'exchange_rate', 'Exchange Rate', '2020-11-02 11:28:16', '2021-09-20 07:29:07'),
(163, 'en', 'point_earning_history', 'Point Earning history', '2020-11-02 11:28:16', '2021-09-20 07:29:07'),
(164, 'en', 'date', 'Date', '2020-11-02 11:28:16', '2021-09-20 07:29:07'),
(165, 'en', 'points', 'Points', '2020-11-02 11:28:16', '2021-09-20 07:29:07'),
(166, 'en', 'converted', 'Converted', '2020-11-02 11:28:16', '2021-09-20 07:29:07'),
(167, 'en', 'action', 'Action', '2020-11-02 11:28:16', '2021-09-20 07:29:07'),
(168, 'en', 'no_history_found', 'No history found.', '2020-11-02 11:28:16', '2021-09-20 07:29:07'),
(169, 'en', 'convert_has_been_done_successfully_check_your_wallets', 'Convert has been done successfully Check your Wallets', '2020-11-02 11:28:16', '2021-09-20 07:29:07'),
(170, 'en', 'something_went_wrong', 'Something went wrong', '2020-11-02 11:28:16', '2021-09-20 07:29:07'),
(171, 'en', 'remaining_uploads', 'Remaining Uploads', '2020-11-02 11:37:13', '2021-09-20 07:29:07'),
(172, 'en', 'no_package_found', 'No Package Found', '2020-11-02 11:37:13', '2021-09-20 07:29:07'),
(173, 'en', 'search_product', 'Search product', '2020-11-02 11:37:13', '2021-09-20 07:29:07'),
(174, 'en', 'name', 'Name', '2020-11-02 11:37:13', '2021-09-20 07:29:07'),
(176, 'en', 'current_qty', 'Current Qty', '2020-11-02 11:37:13', '2021-09-20 07:29:07'),
(177, 'en', 'base_price', 'Base Price', '2020-11-02 11:37:13', '2021-09-20 07:29:07'),
(178, 'en', 'published', 'Published', '2020-11-02 11:37:13', '2021-09-20 07:29:07'),
(179, 'en', 'featured', 'Featured', '2020-11-02 11:37:13', '2021-09-20 07:29:07'),
(180, 'en', 'options', 'Options', '2020-11-02 11:37:13', '2021-09-20 07:29:07'),
(181, 'en', 'edit', 'Edit', '2020-11-02 11:37:13', '2021-09-20 07:29:07'),
(187, 'en', '4_after_uploading_products_you_need_to_edit_them_and_set_products_images_and_choices', '4. After uploading products you need to edit them and set products images and choices.', '2020-11-02 11:37:20', '2021-09-20 07:29:07'),
(188, 'en', 'download_csv', 'Download CSV', '2020-11-02 11:37:20', '2021-09-20 07:29:07'),
(189, 'en', '1_categorysub_categorysub_sub_category_and_brand_should_be_in_numerical_ids', '1. Category,Sub category,Sub Sub category and Brand should be in numerical ids.', '2020-11-02 11:37:20', '2021-09-20 07:29:07'),
(190, 'en', '2_you_can_download_the_pdf_to_get_categorysub_categorysub_sub_category_and_brand_id', '2. You can download the pdf to get Category,Sub category,Sub Sub category and Brand id.', '2020-11-02 11:37:20', '2021-09-20 07:29:07'),
(191, 'en', 'download_category', 'Download Category', '2020-11-02 11:37:20', '2021-09-20 07:29:07'),
(192, 'en', 'download_sub_category', 'Download Sub category', '2020-11-02 11:37:20', '2021-09-20 07:29:07'),
(193, 'en', 'download_sub_sub_category', 'Download Sub Sub category', '2020-11-02 11:37:20', '2021-09-20 07:29:07'),
(194, 'en', 'download_brand', 'Download Brand', '2020-11-02 11:37:20', '2021-09-20 07:29:07'),
(195, 'en', 'upload_csv_file', 'Upload CSV File', '2020-11-02 11:37:20', '2021-09-20 07:29:07'),
(196, 'en', 'csv', 'CSV', '2020-11-02 11:37:20', '2021-09-20 07:29:07'),
(197, 'en', 'choose_csv_file', 'Choose CSV File', '2020-11-02 11:37:20', '2021-09-20 07:29:07'),
(198, 'en', 'upload', 'Upload', '2020-11-02 11:37:20', '2021-09-20 07:29:07'),
(200, 'en', 'available_status', 'Available Status', '2020-11-02 11:37:29', '2021-09-20 07:29:07'),
(201, 'en', 'admin_status', 'Admin Status', '2020-11-02 11:37:29', '2021-09-20 07:29:07'),
(202, 'en', 'pending_balance', 'Pending Balance', '2020-11-02 11:38:07', '2021-09-20 07:29:07'),
(205, 'en', 'amount', 'Amount', '2020-11-02 11:38:07', '2021-09-20 07:29:07'),
(206, 'en', 'status', 'Status', '2020-11-02 11:38:07', '2021-09-20 07:29:07'),
(209, 'en', 'basic_info', 'Basic Info', '2020-11-02 11:38:13', '2021-09-20 07:29:07'),
(211, 'en', 'your_phone', 'Your Phone', '2020-11-02 11:38:13', '2021-09-20 07:29:07'),
(212, 'en', 'photo', 'Photo', '2020-11-02 11:38:13', '2021-09-20 07:29:07'),
(213, 'en', 'browse', 'Browse', '2020-11-02 11:38:13', '2021-09-20 07:29:07'),
(215, 'en', 'your_password', 'Your Password', '2020-11-02 11:38:13', '2021-09-20 07:29:07'),
(216, 'en', 'new_password', 'New Password', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(217, 'en', 'confirm_password', 'Confirm Password', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(218, 'en', 'add_new_address', 'Add New Address', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(219, 'en', 'payment_setting', 'Payment Setting', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(220, 'en', 'cash_payment', 'Cash Payment', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(226, 'en', 'update_profile', 'Update Profile', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(227, 'en', 'change_your_email', 'Change your email', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(228, 'en', 'your_email', 'Your Email', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(229, 'en', 'sending_email', 'Sending Email...', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(230, 'en', 'verify', 'Verify', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(231, 'en', 'update_email', 'Update Email', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(232, 'en', 'new_address', 'New Address', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(233, 'en', 'your_address', 'Your Address', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(234, 'en', 'country', 'Country', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(235, 'en', 'select_your_country', 'Select your country', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(236, 'en', 'city', 'City', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(237, 'en', 'your_city', 'Your City', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(239, 'en', 'your_postal_code', 'Your Postal Code', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(240, 'en', '880', '+880', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(241, 'en', 'save', 'Save', '2020-11-02 11:38:14', '2021-09-20 07:29:07'),
(242, 'en', 'received_refund_request', 'Received Refund Request', '2020-11-02 11:56:20', '2021-09-20 07:29:07'),
(244, 'en', 'delete_confirmation', 'Delete Confirmation', '2020-11-02 11:56:20', '2021-09-20 07:29:07'),
(245, 'en', 'are_you_sure_to_delete_this', 'Are you sure to delete this?', '2020-11-02 11:56:21', '2021-09-20 07:29:07'),
(247, 'en', 'product_upload', 'Product Upload', '2020-11-02 11:57:36', '2021-09-20 07:29:07'),
(251, 'en', 'select_payment_type', 'Select Payment Type', '2020-11-02 11:57:36', '2021-09-20 07:29:07'),
(252, 'en', 'payment_type', 'Payment Type', '2020-11-02 11:57:36', '2021-09-20 07:29:07'),
(253, 'en', 'select_one', 'Select One', '2020-11-02 11:57:36', '2021-09-20 07:29:07'),
(254, 'en', 'online_payment', 'Online payment', '2020-11-02 11:57:37', '2021-09-20 07:29:07'),
(260, 'en', 'sslcommerz', 'sslcommerz', '2020-11-02 11:57:37', '2020-11-02 11:57:37'),
(265, 'en', 'confirm', 'Confirm', '2020-11-02 11:57:37', '2021-09-20 07:29:08'),
(268, 'en', 'choose_image', 'Choose image', '2020-11-02 12:30:12', '2021-09-20 07:29:08'),
(269, 'en', 'code', 'Code', '2020-11-02 12:42:00', '2021-09-20 07:29:08'),
(270, 'en', 'delivery_status', 'Delivery Status', '2020-11-02 12:42:00', '2021-09-20 07:29:08'),
(271, 'en', 'payment_status', 'Payment Status', '2020-11-02 12:42:00', '2021-09-20 07:29:08'),
(272, 'en', 'paid', 'Paid', '2020-11-02 12:42:00', '2021-09-20 07:29:08'),
(273, 'en', 'order_details', 'Order Details', '2020-11-02 12:42:00', '2021-09-20 07:29:08'),
(274, 'en', 'download_invoice', 'Download Invoice', '2020-11-02 12:42:00', '2021-09-20 07:29:08'),
(275, 'en', 'unpaid', 'Unpaid', '2020-11-02 12:42:00', '2021-09-20 07:29:08'),
(277, 'en', 'order_placed', 'Order placed', '2020-11-02 12:43:59', '2021-09-20 07:29:08'),
(278, 'en', 'confirmed', 'Confirmed', '2020-11-02 12:43:59', '2021-09-20 07:29:08'),
(279, 'en', 'on_delivery', 'On delivery', '2020-11-02 12:43:59', '2021-09-20 07:29:08'),
(280, 'en', 'delivered', 'Delivered', '2020-11-02 12:43:59', '2021-09-20 07:29:08'),
(281, 'en', 'order_summary', 'Order Summary', '2020-11-02 12:43:59', '2021-09-20 07:29:08'),
(282, 'en', 'order_code', 'Order Code', '2020-11-02 12:43:59', '2021-09-20 07:29:08'),
(283, 'en', 'customer', 'Customer', '2020-11-02 12:43:59', '2021-09-20 07:29:08'),
(287, 'en', 'total_order_amount', 'Total order amount', '2020-11-02 12:43:59', '2021-09-20 07:29:08'),
(288, 'en', 'shipping_metdod', 'Shipping metdod', '2020-11-02 12:43:59', '2021-09-20 07:29:08'),
(289, 'en', 'flat_shipping_rate', 'Flat shipping rate', '2020-11-02 12:44:00', '2021-09-20 07:29:08'),
(290, 'en', 'payment_metdod', 'Payment metdod', '2020-11-02 12:44:00', '2021-09-20 07:29:08'),
(292, 'en', 'delivery_type', 'Delivery Type', '2020-11-02 12:44:00', '2021-09-20 07:29:08'),
(293, 'en', 'home_delivery', 'Home Delivery', '2020-11-02 12:44:00', '2021-09-20 07:29:08'),
(294, 'en', 'order_ammount', 'Order Ammount', '2020-11-02 12:44:00', '2021-09-20 07:29:08'),
(295, 'en', 'subtotal', 'Subtotal', '2020-11-02 12:44:00', '2021-09-20 07:29:08'),
(296, 'en', 'shipping', 'Shipping', '2020-11-02 12:44:00', '2021-09-20 07:29:08'),
(298, 'en', 'coupon_discount', 'Coupon Discount', '2020-11-02 12:44:00', '2021-09-20 07:29:08'),
(300, 'en', 'na', 'N/A', '2020-11-02 12:44:20', '2021-09-20 07:29:08'),
(301, 'en', 'in_stock', 'In stock', '2020-11-02 12:54:52', '2021-09-20 07:29:08'),
(302, 'en', 'buy_now', 'Buy Now', '2020-11-02 12:54:52', '2021-09-20 07:29:08'),
(303, 'en', 'item_added_to_your_cart', 'Item added to your cart!', '2020-11-02 12:56:46', '2021-09-20 07:29:08'),
(304, 'en', 'proceed_to_checkout', 'Proceed to Checkout', '2020-11-02 12:56:46', '2021-09-20 07:29:08'),
(305, 'en', 'cart_items', 'Cart Items', '2020-11-02 12:56:46', '2021-09-20 07:29:08'),
(306, 'en', '1_my_cart', '1. My Cart', '2020-11-02 12:56:46', '2021-09-20 07:29:08'),
(307, 'en', 'view_cart', 'View cart', '2020-11-02 12:56:46', '2021-09-20 07:29:08'),
(308, 'en', '2_shipping_info', '2. Shipping info', '2020-11-02 12:56:46', '2021-09-20 07:29:08'),
(309, 'en', 'checkout', 'Checkout', '2020-11-02 12:56:46', '2021-09-20 07:29:08'),
(310, 'en', '3_delivery_info', '3. Delivery info', '2020-11-02 12:56:46', '2021-09-20 07:29:08'),
(311, 'en', '4_payment', '4. Payment', '2020-11-02 12:56:46', '2021-09-20 07:29:08'),
(312, 'en', '5_confirmation', '5. Confirmation', '2020-11-02 12:56:46', '2021-09-20 07:29:08'),
(313, 'en', 'remove', 'Remove', '2020-11-02 12:56:46', '2021-09-20 07:29:08'),
(314, 'en', 'return_to_shop', 'Return to shop', '2020-11-02 12:56:46', '2021-09-20 07:29:08'),
(315, 'en', 'continue_to_shipping', 'Continue to Shipping', '2020-11-02 12:56:46', '2021-09-20 07:29:08'),
(316, 'en', 'or', 'Or', '2020-11-02 12:56:46', '2021-09-20 07:29:08'),
(317, 'en', 'guest_checkout', 'Guest Checkout', '2020-11-02 12:56:46', '2021-09-20 07:29:08'),
(318, 'en', 'continue_to_delivery_info', 'Continue to Delivery Info', '2020-11-02 12:57:44', '2021-09-20 07:29:08'),
(319, 'en', 'postal_code', 'Postal Code', '2020-11-02 13:01:01', '2021-09-20 07:29:08'),
(320, 'en', 'choose_delivery_type', 'Choose Delivery Type', '2020-11-02 13:01:04', '2021-09-20 07:29:08'),
(323, 'en', 'continue_to_payment', 'Continue to Payment', '2020-11-02 13:01:04', '2021-09-20 07:29:08'),
(324, 'en', 'select_a_payment_option', 'Select a payment option', '2020-11-02 13:01:13', '2021-09-20 07:29:08'),
(331, 'en', 'cash_on_delivery', 'Cash on Delivery', '2020-11-02 13:01:13', '2021-09-20 07:29:08'),
(332, 'en', 'your_wallet_balance_', 'Your wallet balance :', '2020-11-02 13:01:13', '2021-09-20 07:29:08'),
(333, 'en', 'insufficient_balance', 'Insufficient balance', '2020-11-02 13:01:13', '2021-09-20 07:29:08'),
(334, 'en', 'i_agree_to_the', 'I agree to the', '2020-11-02 13:01:14', '2021-09-20 07:29:08'),
(338, 'en', 'complete_order', 'Complete Order', '2020-11-02 13:01:14', '2021-09-20 07:29:08'),
(339, 'en', 'summary', 'Summary', '2020-11-02 13:01:14', '2021-09-20 07:29:08'),
(340, 'en', 'items', 'Items', '2020-11-02 13:01:14', '2021-09-20 07:29:08'),
(341, 'en', 'total_club_point', 'Total Club point', '2020-11-02 13:01:14', '2021-09-20 07:29:08'),
(342, 'en', 'total_shipping', 'Total Shipping', '2020-11-02 13:01:14', '2021-09-20 07:29:08'),
(343, 'en', 'have_coupon_code_enter_here', 'Have coupon code? Enter here', '2020-11-02 13:01:14', '2021-09-20 07:29:08'),
(344, 'en', 'apply', 'Apply', '2020-11-02 13:01:14', '2021-09-20 07:29:08'),
(345, 'en', 'you_need_to_agree_with_our_policies', 'You need to agree with our policies', '2020-11-02 13:01:14', '2021-09-20 07:29:08'),
(346, 'en', 'forgot_password', 'Forgot password', '2020-11-02 13:01:25', '2021-09-20 07:29:08'),
(469, 'en', 'seo_setting', 'SEO Setting', '2020-11-02 13:01:33', '2021-09-20 07:29:08'),
(480, 'en', 'add_new_payment_method', 'Add New Payment Method', '2020-11-02 13:01:38', '2021-09-20 07:29:08'),
(481, 'en', 'manual_payment_method', 'Manual Payment Method', '2020-11-02 13:01:38', '2021-09-20 07:29:08'),
(482, 'en', 'heading', 'Heading', '2020-11-02 13:01:38', '2021-09-20 07:29:08'),
(483, 'en', 'logo', 'Logo', '2020-11-02 13:01:38', '2021-09-20 07:29:08'),
(484, 'en', 'manual_payment_information', 'Manual Payment Information', '2020-11-02 13:01:42', '2021-09-20 07:29:08'),
(485, 'en', 'type', 'Type', '2020-11-02 13:01:42', '2021-09-20 07:29:08'),
(486, 'en', 'custom_payment', 'Custom Payment', '2020-11-02 13:01:42', '2021-09-20 07:29:08'),
(487, 'en', 'check_payment', 'Check Payment', '2020-11-02 13:01:42', '2021-09-20 07:29:08'),
(488, 'en', 'checkout_thumbnail', 'Checkout Thumbnail', '2020-11-02 13:01:42', '2021-09-20 07:29:08'),
(489, 'en', 'payment_instruction', 'Payment Instruction', '2020-11-02 13:01:42', '2021-09-20 07:29:08'),
(490, 'en', 'bank_information', 'Bank Information', '2020-11-02 13:01:42', '2021-09-20 07:29:08'),
(491, 'en', 'select_file', 'Select File', '2020-11-02 13:01:53', '2021-09-20 07:29:08'),
(492, 'en', 'upload_new', 'Upload New', '2020-11-02 13:01:53', '2021-09-20 07:29:08'),
(493, 'en', 'sort_by_newest', 'Sort by newest', '2020-11-02 13:01:53', '2021-09-20 07:29:08'),
(494, 'en', 'sort_by_oldest', 'Sort by oldest', '2020-11-02 13:01:53', '2021-09-20 07:29:08'),
(495, 'en', 'sort_by_smallest', 'Sort by smallest', '2020-11-02 13:01:53', '2021-09-20 07:29:08'),
(496, 'en', 'sort_by_largest', 'Sort by largest', '2020-11-02 13:01:53', '2021-09-20 07:29:08'),
(497, 'en', 'selected_only', 'Selected Only', '2020-11-02 13:01:53', '2021-09-20 07:29:08'),
(498, 'en', 'no_files_found', 'No files found', '2020-11-02 13:01:53', '2021-09-20 07:29:08'),
(499, 'en', '0_file_selected', '0 File selected', '2020-11-02 13:01:53', '2021-09-20 07:29:08'),
(500, 'en', 'clear', 'Clear', '2020-11-02 13:01:53', '2021-09-20 07:29:08'),
(501, 'en', 'prev', 'Prev', '2020-11-02 13:01:53', '2021-09-20 07:29:08'),
(502, 'en', 'next', 'Next', '2020-11-02 13:01:53', '2021-09-20 07:29:08'),
(503, 'en', 'add_files', 'Add Files', '2020-11-02 13:01:53', '2021-09-20 07:29:08'),
(504, 'en', 'method_has_been_inserted_successfully', 'Method has been inserted successfully', '2020-11-02 13:02:03', '2021-09-20 07:29:08'),
(506, 'en', 'order_date', 'Order Date', '2020-11-02 13:02:42', '2021-09-20 07:29:08'),
(507, 'en', 'bill_to', 'Bill to', '2020-11-02 13:02:42', '2021-09-20 07:29:08'),
(510, 'en', 'sub_total', 'Sub Total', '2020-11-02 13:02:42', '2021-09-20 07:29:08'),
(512, 'en', 'total_tax', 'Total Tax', '2020-11-02 13:02:42', '2021-09-20 07:29:08'),
(513, 'en', 'grand_total', 'Grand Total', '2020-11-02 13:02:42', '2021-09-20 07:29:08'),
(514, 'en', 'your_order_has_been_placed_successfully_please_submit_payment_information_from_purchase_history', 'Your order has been placed successfully. Please submit payment information from purchase history', '2020-11-02 13:02:47', '2021-09-20 07:29:08'),
(515, 'en', 'thank_you_for_your_order', 'Thank You for Your Order!', '2020-11-02 13:02:48', '2021-09-20 07:29:08'),
(516, 'en', 'order_code', 'Order Code:', '2020-11-02 13:02:48', '2021-09-20 07:29:08'),
(517, 'en', 'a_copy_or_your_order_summary_has_been_sent_to', 'A copy or your order summary has been sent to', '2020-11-02 13:02:48', '2021-09-20 07:29:08'),
(518, 'en', 'make_payment', 'Make Payment', '2020-11-02 13:03:26', '2021-09-20 07:29:08'),
(519, 'en', 'payment_screenshot', 'Payment screenshot', '2020-11-02 13:03:29', '2021-09-20 07:29:08'),
(525, 'en', 'sslcommerz_credential', 'Sslcommerz Credential', '2020-11-02 13:12:21', '2021-09-20 07:29:08'),
(526, 'en', 'sslcz_store_id', 'Sslcz Store Id', '2020-11-02 13:12:21', '2021-09-20 07:29:08'),
(527, 'en', 'sslcz_store_password', 'Sslcz store password', '2020-11-02 13:12:21', '2021-09-20 07:29:08'),
(528, 'en', 'sslcommerz_sandbox_mode', 'Sslcommerz Sandbox Mode', '2020-11-02 13:12:21', '2021-09-20 07:29:08'),
(538, 'en', 'api_key', 'API KEY', '2020-11-02 13:12:21', '2021-09-20 07:29:08'),
(539, 'en', 'im_api_key', 'IM API KEY', '2020-11-02 13:12:21', '2021-09-20 07:29:08'),
(540, 'en', 'auth_token', 'AUTH TOKEN', '2020-11-02 13:12:21', '2021-09-20 07:29:08'),
(541, 'en', 'im_auth_token', 'IM AUTH TOKEN', '2020-11-02 13:12:21', '2021-09-20 07:29:08'),
(542, 'en', 'instamojo_sandbox_mode', 'Instamojo Sandbox Mode', '2020-11-02 13:12:21', '2021-09-20 07:29:08'),
(544, 'en', 'public_key', 'PUBLIC KEY', '2020-11-02 13:12:21', '2021-09-20 07:29:08'),
(545, 'en', 'secret_key', 'SECRET KEY', '2020-11-02 13:12:21', '2021-09-20 07:29:08'),
(546, 'en', 'merchant_email', 'MERCHANT EMAIL', '2020-11-02 13:12:21', '2021-09-20 07:29:08'),
(548, 'en', 'merchant_id', 'MERCHANT ID', '2020-11-02 13:12:21', '2021-09-20 07:29:08'),
(549, 'en', 'sandbox_mode', 'Sandbox Mode', '2020-11-02 13:12:21', '2021-09-20 07:29:08'),
(567, 'en', 'flutterwave_credential', 'Flutterwave Credential', '2020-11-02 13:12:22', '2021-09-20 07:29:08'),
(568, 'en', 'rave_public_key', 'RAVE_PUBLIC_KEY', '2020-11-02 13:12:22', '2021-09-20 07:29:08'),
(569, 'en', 'rave_secret_key', 'RAVE_SECRET_KEY', '2020-11-02 13:12:22', '2021-09-20 07:29:08'),
(570, 'en', 'rave_title', 'RAVE_TITLE', '2020-11-02 13:12:22', '2021-09-20 07:29:08'),
(573, 'en', 'all_product', 'All Product', '2020-11-02 13:15:01', '2021-09-20 07:29:08'),
(574, 'en', 'sort_by', 'Sort By', '2020-11-02 13:15:01', '2021-09-20 07:29:08'),
(575, 'en', 'rating_high__low', 'Rating (High > Low)', '2020-11-02 13:15:01', '2021-09-20 07:29:08'),
(576, 'en', 'rating_low__high', 'Rating (Low > High)', '2020-11-02 13:15:01', '2021-09-20 07:29:08'),
(577, 'en', 'num_of_sale_high__low', 'Num of Sale (High > Low)', '2020-11-02 13:15:01', '2021-09-20 07:29:08'),
(578, 'en', 'num_of_sale_low__high', 'Num of Sale (Low > High)', '2020-11-02 13:15:01', '2021-09-20 07:29:08'),
(579, 'en', 'base_price_high__low', 'Base Price (High > Low)', '2020-11-02 13:15:01', '2021-09-20 07:29:08'),
(580, 'en', 'base_price_low__high', 'Base Price (Low > High)', '2020-11-02 13:15:01', '2021-09-20 07:29:08'),
(581, 'en', 'type__enter', 'Type & Enter', '2020-11-02 13:15:01', '2021-09-20 07:29:08'),
(582, 'en', 'added_by', 'Added By', '2020-11-02 13:15:01', '2021-09-20 07:29:08'),
(583, 'en', 'num_of_sale', 'Num of Sale', '2020-11-02 13:15:01', '2021-09-20 07:29:08'),
(584, 'en', 'total_stock', 'Total Stock', '2020-11-02 13:15:01', '2021-09-20 07:29:08'),
(585, 'en', 'todays_deal', 'Todays Deal', '2020-11-02 13:15:01', '2021-09-20 07:29:08'),
(586, 'en', 'rating', 'Rating', '2020-11-02 13:15:01', '2021-09-20 07:29:08'),
(587, 'en', 'times', 'times', '2020-11-02 13:15:01', '2021-02-09 06:52:38'),
(588, 'en', 'add_nerw_product', 'Add Nerw Product', '2020-11-02 13:15:02', '2021-09-20 07:29:08'),
(589, 'en', 'product_information', 'Product Information', '2020-11-02 13:15:02', '2021-09-20 07:29:08'),
(590, 'en', 'unit', 'Unit', '2020-11-02 13:15:02', '2021-09-20 07:29:08'),
(591, 'en', 'unit_eg_kg_pc_etc', 'Unit (e.g. KG, Pc etc)', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(592, 'en', 'minimum_qty', 'Minimum Qty', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(593, 'en', 'tags', 'Tags', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(594, 'en', 'type_and_hit_enter_to_add_a_tag', 'Type and hit enter to add a tag', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(595, 'en', 'barcode', 'Barcode', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(596, 'en', 'refundable', 'Refundable', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(597, 'en', 'product_images', 'Product Images', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(598, 'en', 'gallery_images', 'Gallery Images', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(599, 'en', 'todays_deal_updated_successfully', 'Todays Deal updated successfully', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(600, 'en', 'published_products_updated_successfully', 'Published products updated successfully', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(601, 'en', 'thumbnail_image', 'Thumbnail Image', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(602, 'en', 'featured_products_updated_successfully', 'Featured products updated successfully', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(603, 'en', 'product_videos', 'Product Videos', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(604, 'en', 'video_provider', 'Video Provider', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(605, 'en', 'youtube', 'Youtube', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(608, 'en', 'video_link', 'Video Link', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(610, 'en', 'colors', 'Colors', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(614, 'en', 'product_price__stock', 'Product price + stock', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(616, 'en', 'unit_price', 'Unit price', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(617, 'en', 'purchase_price', 'Purchase price', '2020-11-02 13:15:03', '2021-09-20 07:29:08'),
(618, 'en', 'flat', 'Flat', '2020-11-02 13:15:04', '2021-09-20 07:29:08'),
(619, 'en', 'percent', 'Percent', '2020-11-02 13:15:04', '2021-09-20 07:29:08'),
(620, 'en', 'discount', 'Discount', '2020-11-02 13:15:04', '2021-09-20 07:29:08'),
(621, 'en', 'product_description', 'Product Description', '2020-11-02 13:15:04', '2021-09-20 07:29:08'),
(622, 'en', 'product_shipping_cost', 'Product Shipping Cost', '2020-11-02 13:15:04', '2021-09-20 07:29:08'),
(623, 'en', 'free_shipping', 'Free Shipping', '2020-11-02 13:15:04', '2021-09-20 07:29:08'),
(624, 'en', 'flat_rate', 'Flat Rate', '2020-11-02 13:15:04', '2021-09-20 07:29:08'),
(625, 'en', 'shipping_cost', 'Shipping cost', '2020-11-02 13:15:04', '2021-09-20 07:29:08'),
(626, 'en', 'pdf_specification', 'PDF Specification', '2020-11-02 13:15:04', '2021-09-20 07:29:08'),
(627, 'en', 'seo_meta_tags', 'SEO Meta Tags', '2020-11-02 13:15:04', '2021-09-20 07:29:08'),
(628, 'en', 'meta_title', 'Meta Title', '2020-11-02 13:15:04', '2021-09-20 07:29:08'),
(629, 'en', 'meta_image', 'Meta Image', '2020-11-02 13:15:04', '2021-09-20 07:29:08'),
(630, 'en', 'choice_title', 'Choice Title', '2020-11-02 13:15:04', '2021-09-20 07:29:08'),
(631, 'en', 'enter_choice_values', 'Enter choice values', '2020-11-02 13:15:04', '2021-09-20 07:29:08'),
(632, 'en', 'all_categories', 'All categories A', '2020-11-03 07:12:19', '2021-09-20 07:40:46'),
(633, 'en', 'add_new_category', 'Add New category', '2020-11-03 07:12:19', '2021-09-20 07:29:08'),
(634, 'en', 'type_name__enter', 'Type name & Enter', '2020-11-03 07:12:19', '2021-09-20 07:29:08'),
(635, 'en', 'banner', 'Banner', '2020-11-03 07:12:19', '2021-09-20 07:29:08'),
(637, 'en', 'commission', 'Commission', '2020-11-03 07:12:19', '2021-09-20 07:29:08'),
(638, 'en', 'icon', 'icon', '2020-11-03 07:12:19', '2021-02-09 06:52:38'),
(639, 'en', 'featured_categories_updated_successfully', 'Featured categories updated successfully', '2020-11-03 07:12:20', '2021-09-20 07:29:08'),
(640, 'en', 'hot', 'Hot', '2020-11-03 07:13:12', '2021-09-20 07:29:08'),
(641, 'en', 'filter_by_payment_status', 'Filter by Payment Status', '2020-11-03 07:15:15', '2021-09-20 07:29:08'),
(642, 'en', 'unpaid', 'Un-Paid', '2020-11-03 07:15:15', '2021-09-20 07:29:08'),
(643, 'en', 'filter_by_deliver_status', 'Filter by Deliver Status', '2020-11-03 07:15:15', '2021-09-20 07:29:08'),
(644, 'en', 'pending', 'Pending', '2020-11-03 07:15:15', '2021-09-20 07:29:08'),
(645, 'en', 'type_order_code__hit_enter', 'Type Order code & hit Enter', '2020-11-03 07:15:15', '2021-09-20 07:29:08'),
(646, 'en', 'num_of_products', 'Num. of Products', '2020-11-03 07:15:15', '2021-09-20 07:29:08'),
(647, 'en', 'walk_in_customer', 'Walk In Customer', '2020-11-03 10:03:20', '2021-09-20 07:29:08'),
(648, 'en', 'qty', 'QTY', '2020-11-03 10:03:20', '2021-09-20 07:29:08'),
(649, 'en', 'without_shipping_charge', 'Without Shipping Charge', '2020-11-03 10:03:20', '2021-09-20 07:29:08'),
(650, 'en', 'with_shipping_charge', 'With Shipping Charge', '2020-11-03 10:03:20', '2021-09-20 07:29:08'),
(651, 'en', 'pay_with_cash', 'Pay With Cash', '2020-11-03 10:03:20', '2021-09-20 07:29:08'),
(652, 'en', 'shipping_address', 'Shipping Address', '2020-11-03 10:03:20', '2021-09-20 07:29:08'),
(653, 'en', 'close', 'Close', '2020-11-03 10:03:20', '2021-09-20 07:29:08'),
(654, 'en', 'select_country', 'Select country', '2020-11-03 10:03:21', '2021-09-20 07:29:08'),
(655, 'en', 'order_confirmation', 'Order Confirmation', '2020-11-03 10:03:21', '2021-09-20 07:29:08'),
(656, 'en', 'are_you_sure_to_confirm_this_order', 'Are you sure to confirm this order?', '2020-11-03 10:03:21', '2021-09-20 07:29:08'),
(657, 'en', 'comfirm_order', 'Comfirm Order', '2020-11-03 10:03:21', '2021-09-20 07:29:08'),
(659, 'en', 'personal_info', 'Personal Info', '2020-11-03 11:38:15', '2021-09-20 07:29:08'),
(660, 'en', 'repeat_password', 'Repeat Password', '2020-11-03 11:38:15', '2021-09-20 07:29:08'),
(661, 'en', 'shop_name', 'Shop Name', '2020-11-03 11:38:15', '2021-09-20 07:29:08'),
(662, 'en', 'register_your_shop', 'Register Your Shop', '2020-11-03 11:38:15', '2021-09-20 07:29:08'),
(663, 'en', 'affiliate_informations', 'Affiliate Informations', '2020-11-03 11:39:06', '2021-09-20 07:29:08'),
(664, 'en', 'affiliate', 'Affiliate', '2020-11-03 11:39:06', '2021-09-20 07:29:08'),
(665, 'en', 'user_info', 'User Info', '2020-11-03 11:39:06', '2021-09-20 07:29:08'),
(667, 'en', 'installed_addon', 'Installed Addon', '2020-11-03 11:48:13', '2021-09-20 07:29:08'),
(668, 'en', 'available_addon', 'Available Addon', '2020-11-03 11:48:13', '2021-09-20 07:29:08'),
(669, 'en', 'install_new_addon', 'Install New Addon', '2020-11-03 11:48:13', '2021-09-20 07:29:08'),
(670, 'en', 'version', 'Version', '2020-11-03 11:48:13', '2021-09-20 07:29:08'),
(671, 'en', 'activated', 'Activated', '2020-11-03 11:48:13', '2021-09-20 07:29:08'),
(672, 'en', 'deactivated', 'Deactivated', '2020-11-03 11:48:13', '2021-09-20 07:29:08'),
(673, 'en', 'activate_otp', 'Activate OTP', '2020-11-03 11:48:20', '2021-09-20 07:29:08'),
(674, 'en', 'otp_will_be_used_for', 'OTP will be Used For', '2020-11-03 11:48:20', '2021-09-20 07:29:08'),
(675, 'en', 'settings_updated_successfully', 'Settings updated successfully', '2020-11-03 11:48:20', '2021-09-20 07:29:08'),
(676, 'en', 'product_owner', 'Product Owner', '2020-11-03 11:48:46', '2021-09-20 07:29:08'),
(677, 'en', 'point', 'Point', '2020-11-03 11:48:46', '2021-09-20 07:29:08'),
(678, 'en', 'set_point_for_product_within_a_range', 'Set Point for Product Within a Range', '2020-11-03 11:48:47', '2021-09-20 07:29:08'),
(679, 'en', 'set_point_for_multiple_products', 'Set Point for multiple products', '2020-11-03 11:48:47', '2021-09-20 07:29:08'),
(680, 'en', 'min_price', 'Min Price', '2020-11-03 11:48:47', '2021-09-20 07:29:08'),
(681, 'en', 'max_price', 'Max Price', '2020-11-03 11:48:47', '2021-09-20 07:29:08'),
(682, 'en', 'set_point_for_all_products', 'Set Point for all Products', '2020-11-03 11:48:47', '2021-09-20 07:29:08'),
(683, 'en', 'set_point_for_', 'Set Point For', '2020-11-03 11:48:47', '2021-09-20 07:29:08'),
(684, 'en', 'convert_status', 'Convert Status', '2020-11-03 11:48:58', '2021-09-20 07:29:08'),
(685, 'en', 'earned_at', 'Earned At', '2020-11-03 11:48:59', '2021-09-20 07:29:08'),
(687, 'en', 'sort_by_verificarion_status', 'Sort by verificarion status', '2020-11-03 11:49:35', '2021-09-20 07:29:08'),
(688, 'en', 'approved', 'Approved', '2020-11-03 11:49:35', '2021-09-20 07:29:08'),
(689, 'en', 'non_approved', 'Non Approved', '2020-11-03 11:49:35', '2021-09-20 07:29:08'),
(690, 'en', 'filter', 'Filter', '2020-11-03 11:49:35', '2021-09-20 07:29:08'),
(691, 'en', 'seller_name', 'Seller Name', '2020-11-03 11:49:35', '2021-09-20 07:29:08'),
(692, 'en', 'number_of_product_sale', 'Number of Product Sale', '2020-11-03 11:49:36', '2021-09-20 07:29:08'),
(693, 'en', 'order_amount', 'Order Amount', '2020-11-03 11:49:36', '2021-09-20 07:29:08'),
(694, 'en', 'facebook_chat_setting', 'Facebook Chat Setting', '2020-11-03 11:51:14', '2021-09-20 07:29:08'),
(695, 'en', 'facebook_page_id', 'Facebook Page ID', '2020-11-03 11:51:14', '2021-09-20 07:29:08'),
(696, 'en', 'please_be_carefull_when_you_are_configuring_facebook_chat_for_incorrect_configuration_you_will_not_get_messenger_icon_on_your_userend_site', 'Please be carefull when you are configuring Facebook chat. For incorrect configuration you will not get messenger icon on your user-end site.', '2020-11-03 11:51:14', '2021-09-20 07:29:08'),
(697, 'en', 'login_into_your_facebook_page', 'Login into your facebook page', '2020-11-03 11:51:14', '2021-09-20 07:29:08'),
(698, 'en', 'find_the_about_option_of_your_facebook_page', 'Find the About option of your facebook page', '2020-11-03 11:51:14', '2021-09-20 07:29:08'),
(699, 'en', 'at_the_very_bottom_you_can_find_the_facebook_page_id', 'At the very bottom, you can find the \\“Facebook Page ID\\”', '2020-11-03 11:51:14', '2021-09-20 07:29:08'),
(700, 'en', 'go_to_settings_of_your_page_and_find_the_option_of_advance_messaging', 'Go to Settings of your page and find the option of \\\"Advance Messaging\\\"', '2020-11-03 11:51:14', '2021-09-20 07:29:08'),
(701, 'en', 'scroll_down_that_page_and_you_will_get_white_listed_domain', 'Scroll down that page and you will get \\\"white listed domain\\\"', '2020-11-03 11:51:14', '2021-09-20 07:29:08'),
(702, 'en', 'set_your_website_domain_name', 'Set your website domain name', '2020-11-03 11:51:14', '2021-09-20 07:29:08'),
(703, 'en', 'google_recaptcha_setting', 'Google reCAPTCHA Setting', '2020-11-03 11:51:25', '2021-09-20 07:29:08'),
(704, 'en', 'site_key', 'Site KEY', '2020-11-03 11:51:25', '2021-09-20 07:29:08'),
(705, 'en', 'select_shipping_method', 'Select Shipping Method', '2020-11-03 11:51:32', '2021-09-20 07:29:08'),
(706, 'en', 'product_wise_shipping_cost', 'Product Wise Shipping Cost', '2020-11-03 11:51:32', '2021-09-20 07:29:08'),
(707, 'en', 'flat_rate_shipping_cost', 'Flat Rate Shipping Cost', '2020-11-03 11:51:32', '2021-09-20 07:29:08'),
(708, 'en', 'seller_wise_flat_shipping_cost', 'Seller Wise Flat Shipping Cost', '2020-11-03 11:51:32', '2021-09-20 07:29:08'),
(709, 'en', 'note', 'Note', '2020-11-03 11:51:32', '2021-09-20 07:29:08'),
(710, 'en', 'product_wise_shipping_cost_calulation_shipping_cost_is_calculate_by_addition_of_each_product_shipping_cost', 'Product Wise Shipping Cost calulation: Shipping cost is calculate by addition of each product shipping cost', '2020-11-03 11:51:32', '2021-09-20 07:29:08'),
(711, 'en', 'flat_rate_shipping_cost_calulation_how_many_products_a_customer_purchase_doesnt_matter_shipping_cost_is_fixed', 'Flat Rate Shipping Cost calulation: How many products a customer purchase, doesn\'t matter. Shipping cost is fixed', '2020-11-03 11:51:32', '2021-09-20 07:29:08'),
(712, 'en', 'seller_wise_flat_shipping_cost_calulation_fixed_rate_for_each_seller_if_a_customer_purchase_2_product_from_two_seller_shipping_cost_is_calculate_by_addition_of_each_seller_flat_shipping_cost', 'Seller Wise Flat Shipping Cost calulation: Fixed rate for each seller. If a customer purchase 2 product from two seller shipping cost is calculate by addition of each seller flat shipping cost', '2020-11-03 11:51:32', '2021-09-20 07:29:08'),
(713, 'en', 'flat_rate_cost', 'Flat Rate Cost', '2020-11-03 11:51:32', '2021-09-20 07:29:08'),
(714, 'en', 'shipping_cost_for_admin_products', 'Shipping Cost for Admin Products', '2020-11-03 11:51:32', '2021-09-20 07:29:08'),
(715, 'en', 'countries', 'Countries', '2020-11-03 11:52:02', '2021-09-20 07:29:08'),
(716, 'en', 'showhide', 'Show/Hide', '2020-11-03 11:52:02', '2021-09-20 07:29:08'),
(717, 'en', 'country_status_updated_successfully', 'Country status updated successfully', '2020-11-03 11:52:02', '2021-09-20 07:29:08'),
(718, 'en', 'all_subcategories', 'All Subcategories', '2020-11-03 12:27:55', '2021-09-20 07:29:08'),
(719, 'en', 'add_new_subcategory', 'Add New Subcategory', '2020-11-03 12:27:55', '2021-09-20 07:29:08'),
(720, 'en', 'subcategories', 'Sub-Categories', '2020-11-03 12:27:55', '2021-09-20 07:29:08'),
(721, 'en', 'sub_category_information', 'Sub Category Information', '2020-11-03 12:28:07', '2021-09-20 07:29:08'),
(723, 'en', 'slug', 'Slug', '2020-11-03 12:28:07', '2021-09-20 07:29:08'),
(724, 'en', 'all_sub_subcategories', 'All Sub Subcategories', '2020-11-03 12:29:12', '2021-09-20 07:29:08'),
(725, 'en', 'add_new_sub_subcategory', 'Add New Sub Subcategory', '2020-11-03 12:29:12', '2021-09-20 07:29:08'),
(726, 'en', 'subsubcategories', 'Sub-Sub-categories', '2020-11-03 12:29:12', '2021-09-20 07:29:08'),
(727, 'en', 'make_this_default', 'Make This Default', '2020-11-04 08:24:24', '2021-09-20 07:29:08'),
(728, 'en', 'shops', 'Shops', '2020-11-04 11:17:10', '2021-09-20 07:29:08'),
(729, 'en', 'women_clothing__fashion', 'Women Clothing & Fashion', '2020-11-04 11:23:12', '2021-09-20 07:29:08'),
(730, 'en', 'cellphones__tabs', 'Cellphones & Tabs', '2020-11-04 12:10:41', '2021-09-20 07:29:08'),
(731, 'en', 'welcome_to', 'Welcome to', '2020-11-07 07:14:43', '2021-09-20 07:29:08'),
(732, 'en', 'create_a_new_account', 'Create a New Account', '2020-11-07 07:32:15', '2021-09-20 07:29:08'),
(733, 'en', 'full_name', 'Full Name', '2020-11-07 07:32:15', '2021-09-20 07:29:08'),
(734, 'en', 'password', 'password', '2020-11-07 07:32:15', '2021-02-09 06:52:50'),
(735, 'en', 'confrim_password', 'Confrim Password', '2020-11-07 07:32:15', '2021-09-20 07:29:08'),
(736, 'en', 'i_agree_with_the', 'I agree with the', '2020-11-07 07:32:15', '2021-09-20 07:29:08'),
(737, 'en', 'terms_and_conditions', 'Terms and Conditions', '2020-11-07 07:32:15', '2021-09-20 07:29:08'),
(738, 'en', 'register', 'Register', '2020-11-07 07:32:15', '2021-09-20 07:29:08'),
(739, 'en', 'already_have_an_account', 'Already have an account', '2020-11-07 07:32:16', '2021-09-20 07:29:08'),
(741, 'en', 'sign_up_with', 'Sign Up with', '2020-11-07 07:32:16', '2021-09-20 07:29:08'),
(742, 'en', 'i_agree_with_the_terms_and_conditions', 'I agree with the Terms and Conditions', '2020-11-07 07:34:49', '2021-09-20 07:29:08'),
(745, 'en', 'all_role', 'All Role', '2020-11-07 07:44:28', '2021-09-20 07:29:08'),
(746, 'en', 'add_new_role', 'Add New Role', '2020-11-07 07:44:28', '2021-09-20 07:29:08'),
(747, 'en', 'roles', 'Roles', '2020-11-07 07:44:28', '2021-09-20 07:29:08'),
(749, 'en', 'add_new_staffs', 'Add New Staffs', '2020-11-07 07:44:36', '2021-09-20 07:29:08'),
(750, 'en', 'role', 'Role', '2020-11-07 07:44:36', '2021-09-20 07:29:08'),
(751, 'en', 'frontend_website_name', 'Frontend Website Name', '2020-11-07 07:44:59', '2021-09-20 07:29:08'),
(752, 'en', 'website_name', 'Website Name', '2020-11-07 07:44:59', '2021-09-20 07:29:08'),
(753, 'en', 'site_motto', 'Site Motto', '2020-11-07 07:44:59', '2021-09-20 07:29:08'),
(754, 'en', 'best_ecommerce_website', 'Best eCommerce Website', '2020-11-07 07:44:59', '2021-09-20 07:29:08'),
(755, 'en', 'site_icon', 'Site Icon', '2020-11-07 07:44:59', '2021-09-20 07:29:09'),
(756, 'en', 'website_favicon_32x32_png', 'Website favicon. 32x32 .png', '2020-11-07 07:44:59', '2021-09-20 07:29:09'),
(757, 'en', 'website_base_color', 'Website Base Color', '2020-11-07 07:44:59', '2021-09-20 07:29:09'),
(758, 'en', 'hex_color_code', 'Hex Color Code', '2020-11-07 07:44:59', '2021-09-20 07:29:09'),
(759, 'en', 'website_base_hover_color', 'Website Base Hover Color', '2020-11-07 07:44:59', '2021-09-20 07:29:09'),
(760, 'en', 'update', 'Update', '2020-11-07 07:45:00', '2021-09-20 07:29:09'),
(761, 'en', 'global_seo', 'Global Seo', '2020-11-07 07:45:00', '2021-09-20 07:29:09'),
(762, 'en', 'meta_description', 'Meta description', '2020-11-07 07:45:00', '2021-09-20 07:29:09'),
(763, 'en', 'keywords', 'Keywords', '2020-11-07 07:45:00', '2021-09-20 07:29:09'),
(764, 'en', 'separate_with_coma', 'Separate with coma', '2020-11-07 07:45:00', '2021-09-20 07:29:09'),
(765, 'en', 'website_pages', 'Website Pages', '2020-11-07 07:49:04', '2021-09-20 07:29:09'),
(766, 'en', 'all_pages', 'All Pages', '2020-11-07 07:49:04', '2021-09-20 07:29:09'),
(767, 'en', 'add_new_page', 'Add New Page', '2020-11-07 07:49:04', '2021-09-20 07:29:09'),
(768, 'en', 'url', 'URL', '2020-11-07 07:49:04', '2021-09-20 07:29:09'),
(769, 'en', 'actions', 'Actions', '2020-11-07 07:49:04', '2021-09-20 07:29:09'),
(770, 'en', 'edit_page_information', 'Edit Page Information', '2020-11-07 07:49:22', '2021-09-20 07:29:09'),
(771, 'en', 'page_content', 'Page Content', '2020-11-07 07:49:22', '2021-09-20 07:29:09'),
(772, 'en', 'title', 'Title', '2020-11-07 07:49:22', '2021-09-20 07:29:09'),
(773, 'en', 'link', 'Link', '2020-11-07 07:49:22', '2021-09-20 07:29:09'),
(774, 'en', 'use_character_number_hypen_only', 'Use character, number, hypen only', '2020-11-07 07:49:22', '2021-09-20 07:29:09'),
(775, 'en', 'add_content', 'Add Content', '2020-11-07 07:49:22', '2021-09-20 07:29:09'),
(776, 'en', 'seo_fields', 'Seo Fields', '2020-11-07 07:49:22', '2021-09-20 07:29:09'),
(777, 'en', 'update_page', 'Update Page', '2020-11-07 07:49:22', '2021-09-20 07:29:09'),
(778, 'en', 'default_language', 'Default Language', '2020-11-07 07:50:09', '2021-09-20 07:29:09'),
(779, 'en', 'add_new_language', 'Add New Language', '2020-11-07 07:50:09', '2021-09-20 07:29:09'),
(780, 'en', 'rtl', 'RTL', '2020-11-07 07:50:09', '2021-09-20 07:29:09'),
(781, 'en', 'translation', 'Translation', '2020-11-07 07:50:09', '2021-09-20 07:29:09'),
(782, 'en', 'language_information', 'Language Information', '2020-11-07 07:50:23', '2021-09-20 07:29:09'),
(783, 'en', 'save_page', 'Save Page', '2020-11-07 07:51:27', '2021-09-20 07:29:09'),
(784, 'en', 'home_page_settings', 'Home Page Settings', '2020-11-07 07:51:35', '2021-09-20 07:29:09'),
(785, 'en', 'home_slider', 'Home Slider', '2020-11-07 07:51:35', '2021-09-20 07:29:09'),
(786, 'en', 'photos__links', 'Photos & Links', '2020-11-07 07:51:35', '2021-09-20 07:29:09'),
(787, 'en', 'add_new', 'Add New', '2020-11-07 07:51:35', '2021-09-20 07:29:09'),
(788, 'en', 'home_categories', 'Home Categories', '2020-11-07 07:51:35', '2021-09-20 07:29:09'),
(789, 'en', 'home_banner_1_max_3', 'Home Banner 1 (Max 3)', '2020-11-07 07:51:35', '2021-09-20 07:29:09'),
(790, 'en', 'banner__links', 'Banner & Links', '2020-11-07 07:51:35', '2021-09-20 07:29:09'),
(791, 'en', 'home_banner_2_max_3', 'Home Banner 2 (Max 3)', '2020-11-07 07:51:36', '2021-09-20 07:29:09'),
(792, 'en', 'top_10', 'Top 10', '2020-11-07 07:51:36', '2021-09-20 07:29:09'),
(793, 'en', 'top_categories_max_10', 'Top Categories (Max 10)', '2020-11-07 07:51:36', '2021-09-20 07:29:09'),
(794, 'en', 'top_brands_max_10', 'Top Brands (Max 10)', '2020-11-07 07:51:36', '2021-09-20 07:29:09'),
(795, 'en', 'system_name', 'System Name', '2020-11-07 07:54:22', '2021-09-20 07:29:09'),
(796, 'en', 'system_logo__white', 'System Logo - White', '2020-11-07 07:54:22', '2021-09-20 07:29:09'),
(797, 'en', 'choose_files', 'Choose Files', '2020-11-07 07:54:22', '2021-09-20 07:29:09'),
(798, 'en', 'will_be_used_in_admin_panel_side_menu', 'Will be used in admin panel side menu', '2020-11-07 07:54:23', '2021-09-20 07:29:09'),
(799, 'en', 'system_logo__black', 'System Logo - Black', '2020-11-07 07:54:23', '2021-09-20 07:29:09'),
(800, 'en', 'will_be_used_in_admin_panel_topbar_in_mobile__admin_login_page', 'Will be used in admin panel topbar in mobile + Admin login page', '2020-11-07 07:54:23', '2021-09-20 07:29:09'),
(801, 'en', 'system_timezone', 'System Timezone', '2020-11-07 07:54:23', '2021-09-20 07:29:09'),
(802, 'en', 'admin_login_page_background', 'Admin login page background', '2020-11-07 07:54:23', '2021-09-20 07:29:09'),
(803, 'en', 'website_header', 'Website Header', '2020-11-07 08:21:36', '2021-09-20 07:29:09'),
(804, 'en', 'header_setting', 'Header Setting', '2020-11-07 08:21:36', '2021-09-20 07:29:09'),
(805, 'en', 'header_logo', 'Header Logo', '2020-11-07 08:21:36', '2021-09-20 07:29:09'),
(806, 'en', 'show_language_switcher', 'Show Language Switcher?', '2020-11-07 08:21:36', '2021-09-20 07:29:09'),
(807, 'en', 'show_currency_switcher', 'Show Currency Switcher?', '2020-11-07 08:21:36', '2021-09-20 07:29:09'),
(808, 'en', 'enable_stikcy_header', 'Enable stikcy header?', '2020-11-07 08:21:36', '2021-09-20 07:29:09'),
(809, 'en', 'website_footer', 'Website Footer', '2020-11-07 08:21:56', '2021-09-20 07:29:09'),
(810, 'en', 'footer_widget', 'Footer Widget', '2020-11-07 08:21:56', '2021-09-20 07:29:09'),
(811, 'en', 'about_widget', 'About Widget', '2020-11-07 08:21:56', '2021-09-20 07:29:09'),
(812, 'en', 'footer_logo', 'Footer Logo', '2020-11-07 08:21:56', '2021-09-20 07:29:09'),
(813, 'en', 'about_description', 'About description', '2020-11-07 08:21:56', '2021-09-20 07:29:09'),
(814, 'en', 'contact_info_widget', 'Contact Info Widget', '2020-11-07 08:21:56', '2021-09-20 07:29:09'),
(815, 'en', 'footer_contact_address', 'Footer contact address', '2020-11-07 08:21:56', '2021-09-20 07:29:09'),
(816, 'en', 'footer_contact_phone', 'Footer contact phone', '2020-11-07 08:21:56', '2021-09-20 07:29:09'),
(817, 'en', 'footer_contact_email', 'Footer contact email', '2020-11-07 08:21:56', '2021-09-20 07:29:09'),
(818, 'en', 'link_widget_one', 'Link Widget One', '2020-11-07 08:21:56', '2021-09-20 07:29:09'),
(819, 'en', 'links', 'Links', '2020-11-07 08:21:56', '2021-09-20 07:29:09'),
(820, 'en', 'footer_bottom', 'Footer Bottom', '2020-11-07 08:21:56', '2021-09-20 07:29:09'),
(821, 'en', 'copyright_widget_', 'Copyright Widget', '2020-11-07 08:21:57', '2021-09-20 07:29:09'),
(822, 'en', 'copyright_text', 'Copyright Text', '2020-11-07 08:21:57', '2021-09-20 07:29:09'),
(823, 'en', 'social_link_widget_', 'Social Link Widget', '2020-11-07 08:21:57', '2021-09-20 07:29:09'),
(824, 'en', 'show_social_links', 'Show Social Links?', '2020-11-07 08:21:57', '2021-09-20 07:29:09'),
(825, 'en', 'social_links', 'Social Links', '2020-11-07 08:21:57', '2021-09-20 07:29:09'),
(826, 'en', 'payment_methods_widget_', 'Payment Methods Widget', '2020-11-07 08:21:57', '2021-09-20 07:29:09'),
(827, 'en', 'rtl_status_updated_successfully', 'RTL status updated successfully', '2020-11-07 08:36:11', '2021-09-20 07:29:09');
INSERT INTO `translations` (`id`, `lang`, `lang_key`, `lang_value`, `created_at`, `updated_at`) VALUES
(828, 'en', 'language_changed_to_', 'Language changed to', '2020-11-07 08:36:27', '2021-09-20 07:29:09'),
(829, 'en', 'inhouse_product_sale_report', 'Inhouse Product sale report', '2020-11-07 09:30:25', '2021-09-20 07:29:09'),
(830, 'en', 'sort_by_category', 'Sort by Category', '2020-11-07 09:30:25', '2021-09-20 07:29:09'),
(831, 'en', 'product_wise_stock_report', 'Product wise stock report', '2020-11-07 09:31:02', '2021-09-20 07:29:09'),
(832, 'en', 'currency_changed_to_', 'Currency changed to', '2020-11-07 12:36:28', '2021-09-20 07:29:09'),
(833, 'en', 'avatar', 'Avatar', '2020-11-08 09:32:35', '2021-09-20 07:29:09'),
(834, 'en', 'copy', 'Copy', '2020-11-08 10:03:42', '2021-09-20 07:29:09'),
(835, 'en', 'variant', 'Variant', '2020-11-08 10:43:02', '2021-09-20 07:29:09'),
(836, 'en', 'variant_price', 'Variant Price', '2020-11-08 10:43:03', '2021-09-20 07:29:09'),
(837, 'en', 'sku', 'SKU', '2020-11-08 10:43:03', '2021-09-20 07:29:09'),
(838, 'en', 'key', 'Key', '2020-11-08 12:35:09', '2021-09-20 07:29:09'),
(839, 'en', 'value', 'Value', '2020-11-08 12:35:09', '2021-09-20 07:29:09'),
(840, 'en', 'copy_translations', 'Copy Translations', '2020-11-08 12:35:10', '2021-09-20 07:29:09'),
(841, 'en', 'all_pickup_points', 'All Pick-up Points', '2020-11-08 12:35:43', '2021-09-20 07:29:09'),
(842, 'en', 'add_new_pickup_point', 'Add New Pick-up Point', '2020-11-08 12:35:43', '2021-09-20 07:29:09'),
(843, 'en', 'manager', 'Manager', '2020-11-08 12:35:43', '2021-09-20 07:29:09'),
(844, 'en', 'location', 'Location', '2020-11-08 12:35:43', '2021-09-20 07:29:09'),
(845, 'en', 'pickup_station_contact', 'Pickup Station Contact', '2020-11-08 12:35:43', '2021-09-20 07:29:09'),
(846, 'en', 'open', 'Open', '2020-11-08 12:35:43', '2021-09-20 07:29:09'),
(847, 'en', 'pos_activation_for_seller', 'POS Activation for Seller', '2020-11-08 12:35:55', '2021-09-20 07:29:09'),
(848, 'en', 'order_completed_successfully', 'Order Completed Successfully.', '2020-11-08 12:36:02', '2021-09-20 07:29:09'),
(849, 'en', 'text_input', 'Text Input', '2020-11-08 12:38:40', '2021-09-20 07:29:09'),
(850, 'en', 'select', 'Select', '2020-11-08 12:38:40', '2021-09-20 07:29:09'),
(851, 'en', 'multiple_select', 'Multiple Select', '2020-11-08 12:38:40', '2021-09-20 07:29:09'),
(852, 'en', 'radio', 'Radio', '2020-11-08 12:38:40', '2021-09-20 07:29:09'),
(853, 'en', 'file', 'File', '2020-11-08 12:38:40', '2021-09-20 07:29:09'),
(854, 'en', 'email_address', 'Email Address', '2020-11-08 12:39:32', '2021-09-20 07:29:09'),
(855, 'en', 'verification_info', 'Verification Info', '2020-11-08 12:39:32', '2021-09-20 07:29:09'),
(856, 'en', 'approval', 'Approval', '2020-11-08 12:39:32', '2021-09-20 07:29:09'),
(857, 'en', 'due_amount', 'Due Amount', '2020-11-08 12:39:32', '2021-09-20 07:29:09'),
(858, 'en', 'show', 'Show', '2020-11-08 12:39:32', '2021-09-20 07:29:09'),
(859, 'en', 'pay_now', 'Pay Now', '2020-11-08 12:39:32', '2021-09-20 07:29:09'),
(860, 'en', 'affiliate_user_verification', 'Affiliate User Verification', '2020-11-08 12:40:01', '2021-09-20 07:29:09'),
(861, 'en', 'reject', 'Reject', '2020-11-08 12:40:01', '2021-09-20 07:29:09'),
(862, 'en', 'accept', 'Accept', '2020-11-08 12:40:01', '2021-09-20 07:29:09'),
(863, 'en', 'beauty_health__hair', 'Beauty, Health & Hair', '2020-11-08 12:54:17', '2021-09-20 07:29:09'),
(864, 'en', 'comparison', 'Comparison', '2020-11-08 12:54:33', '2021-09-20 07:29:09'),
(865, 'en', 'reset_compare_list', 'Reset Compare List', '2020-11-08 12:54:33', '2021-09-20 07:29:09'),
(866, 'en', 'your_comparison_list_is_empty', 'Your comparison list is empty', '2020-11-08 12:54:33', '2021-09-20 07:29:09'),
(867, 'en', 'convert_point_to_wallet', 'Convert Point To Wallet', '2020-11-08 13:04:42', '2021-09-20 07:29:09'),
(868, 'en', 'note_you_need_to_activate_wallet_option_first_before_using_club_point_addon', 'Note: You need to activate wallet option first before using club point addon.', '2020-11-08 13:04:43', '2021-09-20 07:29:09'),
(869, 'en', 'create_an_account', 'Create an account.', '2020-11-09 06:17:11', '2021-09-20 07:29:09'),
(870, 'en', 'use_email_instead', 'Use Email Instead', '2020-11-09 06:17:11', '2021-09-20 07:29:09'),
(871, 'en', 'by_signing_up_you_agree_to_our_terms_and_conditions', 'By signing up you agree to our terms and conditions.', '2020-11-09 06:17:11', '2021-09-20 07:29:09'),
(872, 'en', 'create_account', 'Create Account', '2020-11-09 06:17:11', '2021-09-20 07:29:09'),
(873, 'en', 'or_join_with', 'Or Join With', '2020-11-09 06:17:11', '2021-09-20 07:29:09'),
(874, 'en', 'already_have_an_account', 'Already have an account?', '2020-11-09 06:17:11', '2021-09-20 07:29:09'),
(875, 'en', 'log_in', 'Log In', '2020-11-09 06:17:11', '2021-09-20 07:29:09'),
(876, 'en', 'computer__accessories', 'Computer & Accessories', '2020-11-09 07:52:05', '2021-09-20 07:29:09'),
(878, 'en', 'products', 'Product(s)', '2020-11-09 07:52:23', '2021-09-20 07:29:09'),
(879, 'en', 'in_your_cart', 'in your cart', '2020-11-09 07:52:23', '2021-09-20 07:29:09'),
(880, 'en', 'in_your_wishlist', 'in your wishlist', '2020-11-09 07:52:23', '2021-09-20 07:29:09'),
(881, 'en', 'you_ordered', 'you ordered', '2020-11-09 07:52:24', '2021-09-20 07:29:09'),
(882, 'en', 'default_shipping_address', 'Default Shipping Address', '2020-11-09 07:52:24', '2021-09-20 07:29:09'),
(883, 'en', 'sports__outdoor', 'Sports & outdoor', '2020-11-09 07:53:32', '2021-09-20 07:29:09'),
(884, 'en', 'copied', 'Copied', '2020-11-09 07:54:19', '2021-09-20 07:29:09'),
(885, 'en', 'copy_the_promote_link', 'Copy the Promote Link', '2020-11-09 07:54:19', '2021-09-20 07:29:09'),
(886, 'en', 'write_a_review', 'Write a review', '2020-11-09 07:54:20', '2021-09-20 07:29:09'),
(887, 'en', 'your_name', 'Your name', '2020-11-09 07:54:20', '2021-09-20 07:29:09'),
(888, 'en', 'comment', 'Comment', '2020-11-09 07:54:20', '2021-09-20 07:29:09'),
(889, 'en', 'your_review', 'Your review', '2020-11-09 07:54:20', '2021-09-20 07:29:09'),
(890, 'en', 'submit_review', 'Submit review', '2020-11-09 07:54:20', '2021-09-20 07:29:09'),
(891, 'en', 'claire_willis', 'Claire Willis', '2020-11-09 08:05:00', '2021-09-20 07:29:09'),
(893, 'en', 'product_file', 'Product File', '2020-11-09 08:07:08', '2021-09-20 07:29:09'),
(894, 'en', 'choose_file', 'Choose file', '2020-11-09 08:07:08', '2021-09-20 07:29:09'),
(895, 'en', 'type_to_add_a_tag', 'Type to add a tag', '2020-11-09 08:07:08', '2021-09-20 07:29:09'),
(896, 'en', 'images', 'Images', '2020-11-09 08:07:08', '2021-09-20 07:29:09'),
(897, 'en', 'main_images', 'Main Images', '2020-11-09 08:07:08', '2021-09-20 07:29:09'),
(898, 'en', 'meta_tags', 'Meta Tags', '2020-11-09 08:07:08', '2021-09-20 07:29:09'),
(901, 'en', 'select_an_option', 'Select an option', '2020-11-09 08:14:34', '2021-09-20 07:29:09'),
(902, 'en', 'tax', 'Tax', '2020-11-09 08:14:35', '2021-02-11 04:15:27'),
(903, 'en', 'any_question_about_this_product', 'Any question about this product?', '2020-11-09 08:15:11', '2021-09-20 07:29:09'),
(904, 'en', 'sign_in', 'Sign in', '2020-11-09 08:15:11', '2021-09-20 07:29:09'),
(905, 'en', 'login_with_google', 'Login with Google', '2020-11-09 08:15:11', '2021-09-20 07:29:09'),
(906, 'en', 'login_with_facebook', 'Login with Facebook', '2020-11-09 08:15:11', '2021-09-20 07:29:09'),
(907, 'en', 'login_with_twitter', 'Login with Twitter', '2020-11-09 08:15:11', '2021-09-20 07:29:09'),
(908, 'en', 'click_to_show_phone_number', 'Click to show phone number', '2020-11-09 08:15:51', '2021-09-20 07:29:09'),
(909, 'en', 'other_ads_of', 'Other Ads of', '2020-11-09 08:15:52', '2021-09-20 07:29:09'),
(910, 'en', 'store_home', 'Store Home', '2020-11-09 08:54:23', '2021-09-20 07:29:09'),
(911, 'en', 'top_selling', 'Top Selling', '2020-11-09 08:54:23', '2021-09-20 07:29:09'),
(914, 'en', 'pickup_points', 'Pickup Points', '2020-11-09 08:55:38', '2021-09-20 07:29:09'),
(915, 'en', 'select_pickup_point', 'Select Pickup Point', '2020-11-09 08:55:38', '2021-09-20 07:29:09'),
(916, 'en', 'slider_settings', 'Slider Settings', '2020-11-09 08:55:39', '2021-09-20 07:29:09'),
(917, 'en', 'social_media_link', 'Social Media Link', '2020-11-09 08:55:39', '2021-09-20 07:29:09'),
(918, 'en', 'facebook', 'Facebook', '2020-11-09 08:55:39', '2021-09-20 07:29:09'),
(919, 'en', 'twitter', 'Twitter', '2020-11-09 08:55:39', '2021-09-20 07:29:09'),
(920, 'en', 'google', 'Google', '2020-11-09 08:55:39', '2021-09-20 07:29:09'),
(921, 'en', 'new_arrival_products', 'New Arrival Products', '2020-11-09 08:56:26', '2021-09-20 07:29:09'),
(922, 'en', 'check_your_order_status', 'Check Your Order Status', '2020-11-09 09:23:32', '2021-09-20 07:29:09'),
(923, 'en', 'shipping_method', 'Shipping method', '2020-11-09 09:27:40', '2021-09-20 07:29:09'),
(924, 'en', 'shipped_by', 'Shipped By', '2020-11-09 09:27:41', '2021-09-20 07:29:09'),
(925, 'en', 'image', 'Image', '2020-11-09 09:29:37', '2021-09-20 07:29:09'),
(926, 'en', 'sub_sub_category', 'Sub Sub Category', '2020-11-09 09:29:37', '2021-09-20 07:29:09'),
(927, 'en', 'inhouse_products', 'Inhouse Products', '2020-11-09 10:22:32', '2021-09-20 07:29:09'),
(928, 'en', 'forgot_password', 'Forgot Password?', '2020-11-09 10:33:21', '2021-09-20 07:29:09'),
(929, 'en', 'enter_your_email_address_to_recover_your_password', 'Enter your email address to recover your password.', '2020-11-09 10:33:21', '2021-09-20 07:29:09'),
(930, 'en', 'email_or_phone', 'Email or Phone', '2020-11-09 10:33:21', '2021-09-20 07:29:09'),
(931, 'en', 'send_password_reset_link', 'Send Password Reset Link', '2020-11-09 10:33:21', '2021-09-20 07:29:09'),
(932, 'en', 'back_to_login', 'Back to Login', '2020-11-09 10:33:21', '2021-09-20 07:29:09'),
(933, 'en', 'index', 'index', '2020-11-09 10:35:29', '2021-02-09 06:52:51'),
(935, 'en', 'option', 'Option', '2020-11-09 10:35:30', '2021-09-20 07:29:09'),
(936, 'en', 'applied_refund_request', 'Applied Refund Request', '2020-11-09 10:35:39', '2021-09-20 07:29:09'),
(937, 'en', 'item_has_been_renoved_from_wishlist', 'Item has been renoved from wishlist', '2020-11-09 10:36:04', '2021-09-20 07:29:09'),
(938, 'en', 'bulk_products_upload', 'Bulk Products Upload', '2020-11-09 10:39:24', '2021-09-20 07:29:09'),
(939, 'en', 'upload_csv', 'Upload CSV', '2020-11-09 10:39:25', '2021-09-20 07:29:09'),
(940, 'en', 'create_a_ticket', 'Create a Ticket', '2020-11-09 10:40:25', '2021-09-20 07:29:09'),
(941, 'en', 'tickets', 'Tickets', '2020-11-09 10:40:25', '2021-09-20 07:29:09'),
(942, 'en', 'ticket_id', 'Ticket ID', '2020-11-09 10:40:25', '2021-09-20 07:29:09'),
(943, 'en', 'sending_date', 'Sending Date', '2020-11-09 10:40:25', '2021-09-20 07:29:09'),
(944, 'en', 'subject', 'Subject', '2020-11-09 10:40:25', '2021-09-20 07:29:09'),
(945, 'en', 'view_details', 'View Details', '2020-11-09 10:40:25', '2021-09-20 07:29:09'),
(946, 'en', 'provide_a_detailed_description', 'Provide a detailed description', '2020-11-09 10:40:26', '2021-09-20 07:29:09'),
(947, 'en', 'type_your_reply', 'Type your reply', '2020-11-09 10:40:26', '2021-09-20 07:29:09'),
(948, 'en', 'send_ticket', 'Send Ticket', '2020-11-09 10:40:26', '2021-09-20 07:29:09'),
(949, 'en', 'load_more', 'Load More', '2020-11-09 10:40:57', '2021-09-20 07:29:09'),
(950, 'en', 'jewelry__watches', 'Jewelry & Watches', '2020-11-09 10:47:38', '2021-09-20 07:29:09'),
(951, 'en', 'filters', 'Filters', '2020-11-09 10:53:54', '2021-09-20 07:29:09'),
(952, 'en', 'contact_address', 'Contact address', '2020-11-09 10:58:46', '2021-09-20 07:29:09'),
(953, 'en', 'contact_phone', 'Contact phone', '2020-11-09 10:58:47', '2021-09-20 07:29:09'),
(954, 'en', 'contact_email', 'Contact email', '2020-11-09 10:58:47', '2021-09-20 07:29:09'),
(955, 'en', 'filter_by', 'Filter by', '2020-11-09 11:00:03', '2021-09-20 07:29:09'),
(956, 'en', 'condition', 'Condition', '2020-11-09 11:56:13', '2021-09-20 07:29:09'),
(957, 'en', 'all_type', 'All Type', '2020-11-09 11:56:13', '2021-09-20 07:29:09'),
(960, 'en', 'pay_with_wallet', 'Pay with wallet', '2020-11-09 12:56:34', '2021-09-20 07:29:09'),
(961, 'en', 'select_variation', 'Select variation', '2020-11-10 07:54:29', '2021-09-20 07:29:09'),
(962, 'en', 'no_product_added', 'No Product Added', '2020-11-10 08:07:53', '2021-09-20 07:29:09'),
(963, 'en', 'status_has_been_updated_successfully', 'Status has been updated successfully', '2020-11-10 08:41:23', '2021-09-20 07:29:09'),
(964, 'en', 'all_seller_packages', 'All Seller Packages', '2020-11-10 09:14:10', '2021-09-20 07:29:09'),
(965, 'en', 'add_new_package', 'Add New Package', '2020-11-10 09:14:10', '2021-09-20 07:29:09'),
(966, 'en', 'package_logo', 'Package Logo', '2020-11-10 09:14:10', '2021-09-20 07:29:09'),
(967, 'en', 'days', 'days', '2020-11-10 09:14:10', '2021-02-09 06:52:51'),
(968, 'en', 'create_new_seller_package', 'Create New Seller Package', '2020-11-10 09:14:31', '2021-09-20 07:29:09'),
(969, 'en', 'package_name', 'Package Name', '2020-11-10 09:14:31', '2021-09-20 07:29:09'),
(970, 'en', 'duration', 'Duration', '2020-11-10 09:14:31', '2021-09-20 07:29:09'),
(971, 'en', 'validity_in_number_of_days', 'Validity in number of days', '2020-11-10 09:14:31', '2021-09-20 07:29:09'),
(972, 'en', 'update_package_information', 'Update Package Information', '2020-11-10 09:14:59', '2021-09-20 07:29:09'),
(973, 'en', 'package_has_been_inserted_successfully', 'Package has been inserted successfully', '2020-11-10 09:15:14', '2021-09-20 07:29:09'),
(974, 'en', 'refund_request', 'Refund Request', '2020-11-10 09:17:25', '2021-09-20 07:29:09'),
(975, 'en', 'reason', 'Reason', '2020-11-10 09:17:25', '2021-09-20 07:29:09'),
(976, 'en', 'label', 'Label', '2020-11-10 09:20:13', '2021-09-20 07:29:09'),
(977, 'en', 'select_label', 'Select Label', '2020-11-10 09:20:13', '2021-09-20 07:29:09'),
(978, 'en', 'multiple_select_label', 'Multiple Select Label', '2020-11-10 09:20:13', '2021-09-20 07:29:09'),
(979, 'en', 'radio_label', 'Radio Label', '2020-11-10 09:20:13', '2021-09-20 07:29:09'),
(980, 'en', 'pickup_point_orders', 'Pickup Point Orders', '2020-11-10 09:25:40', '2021-09-20 07:29:09'),
(981, 'en', 'view', 'View', '2020-11-10 09:25:40', '2021-09-20 07:29:09'),
(982, 'en', 'order_', 'Order #', '2020-11-10 09:25:48', '2021-09-20 07:29:09'),
(983, 'en', 'order_status', 'Order Status', '2020-11-10 09:25:48', '2021-09-20 07:29:09'),
(984, 'en', 'total_amount', 'Total amount', '2020-11-10 09:25:48', '2021-09-20 07:29:09'),
(986, 'en', 'total', 'TOTAL', '2020-11-10 09:25:49', '2021-09-20 07:29:09'),
(987, 'en', 'delivery_status_has_been_updated', 'Delivery status has been updated', '2020-11-10 09:25:49', '2021-09-20 07:29:09'),
(988, 'en', 'payment_status_has_been_updated', 'Payment status has been updated', '2020-11-10 09:25:49', '2021-09-20 07:29:09'),
(989, 'en', 'invoice', 'INVOICE', '2020-11-10 09:25:58', '2021-09-20 07:29:09'),
(990, 'en', 'set_refund_time', 'Set Refund Time', '2020-11-10 09:34:04', '2021-09-20 07:29:09'),
(991, 'en', 'set_time_for_sending_refund_request', 'Set Time for sending Refund Request', '2020-11-10 09:34:04', '2021-09-20 07:29:09'),
(992, 'en', 'set_refund_sticker', 'Set Refund Sticker', '2020-11-10 09:34:05', '2021-09-20 07:29:09'),
(993, 'en', 'sticker', 'Sticker', '2020-11-10 09:34:05', '2021-09-20 07:29:09'),
(994, 'en', 'refund_request_all', 'Refund Request All', '2020-11-10 09:34:12', '2021-09-20 07:29:09'),
(995, 'en', 'order_id', 'Order Id', '2020-11-10 09:34:12', '2021-09-20 07:29:09'),
(997, 'en', 'admin_approval', 'Admin Approval', '2020-11-10 09:34:12', '2021-09-20 07:29:09'),
(998, 'en', 'refund_status', 'Refund Status', '2020-11-10 09:34:12', '2021-09-20 07:29:09'),
(1000, 'en', 'no_refund', 'No Refund', '2020-11-10 09:35:27', '2021-09-20 07:29:09'),
(1001, 'en', 'status_updated_successfully', 'Status updated successfully', '2020-11-10 09:54:20', '2021-09-20 07:29:09'),
(1002, 'en', 'user_search_report', 'User Search Report', '2020-11-11 06:43:24', '2021-09-20 07:29:09'),
(1003, 'en', 'search_by', 'Search By', '2020-11-11 06:43:24', '2021-09-20 07:29:09'),
(1004, 'en', 'number_searches', 'Number searches', '2020-11-11 06:43:24', '2021-09-20 07:29:09'),
(1005, 'en', 'sender', 'Sender', '2020-11-11 06:51:49', '2021-09-20 07:29:09'),
(1006, 'en', 'receiver', 'Receiver', '2020-11-11 06:51:49', '2021-09-20 07:29:09'),
(1007, 'en', 'verification_form_updated_successfully', 'Verification form updated successfully', '2020-11-11 06:53:29', '2021-09-20 07:29:09'),
(1008, 'en', 'invalid_email_or_password', 'Invalid email or password', '2020-11-11 07:07:49', '2021-09-20 07:29:09'),
(1009, 'en', 'all_coupons', 'All Coupons', '2020-11-11 07:14:04', '2021-09-20 07:29:09'),
(1010, 'en', 'add_new_coupon', 'Add New Coupon', '2020-11-11 07:14:04', '2021-09-20 07:29:09'),
(1011, 'en', 'coupon_information', 'Coupon Information', '2020-11-11 07:14:04', '2021-09-20 07:29:09'),
(1012, 'en', 'start_date', 'Start Date', '2020-11-11 07:14:04', '2021-09-20 07:29:09'),
(1013, 'en', 'end_date', 'End Date', '2020-11-11 07:14:05', '2021-09-20 07:29:09'),
(1014, 'en', 'product_base', 'Product Base', '2020-11-11 07:14:05', '2021-09-20 07:29:09'),
(1015, 'en', 'send_newsletter', 'Send Newsletter', '2020-11-11 07:14:10', '2021-09-20 07:29:09'),
(1016, 'en', 'mobile_users', 'Mobile Users', '2020-11-11 07:14:10', '2021-09-20 07:29:09'),
(1017, 'en', 'sms_subject', 'SMS subject', '2020-11-11 07:14:10', '2021-09-20 07:29:09'),
(1018, 'en', 'sms_content', 'SMS content', '2020-11-11 07:14:10', '2021-09-20 07:29:09'),
(1019, 'en', 'all_flash_delas', 'All Flash Delas', '2020-11-11 07:16:06', '2021-09-20 07:29:09'),
(1020, 'en', 'create_new_flash_dela', 'Create New Flash Dela', '2020-11-11 07:16:06', '2021-09-20 07:29:09'),
(1022, 'en', 'page_link', 'Page Link', '2020-11-11 07:16:06', '2021-09-20 07:29:09'),
(1023, 'en', 'flash_deal_information', 'Flash Deal Information', '2020-11-11 07:16:14', '2021-09-20 07:29:09'),
(1024, 'en', 'background_color', 'Background Color', '2020-11-11 07:16:14', '2021-09-20 07:29:09'),
(1025, 'en', '0000ff', '#0000ff', '2020-11-11 07:16:14', '2021-09-20 07:29:09'),
(1026, 'en', 'text_color', 'Text Color', '2020-11-11 07:16:14', '2021-09-20 07:29:09'),
(1027, 'en', 'white', 'White', '2020-11-11 07:16:14', '2021-09-20 07:29:09'),
(1028, 'en', 'dark', 'Dark', '2020-11-11 07:16:15', '2021-09-20 07:29:09'),
(1029, 'en', 'choose_products', 'Choose Products', '2020-11-11 07:16:15', '2021-09-20 07:29:09'),
(1030, 'en', 'discounts', 'Discounts', '2020-11-11 07:16:20', '2021-09-20 07:29:09'),
(1031, 'en', 'discount_type', 'Discount Type', '2020-11-11 07:16:20', '2021-09-20 07:29:09'),
(1040, 'en', 'ssl_wireless_credential', 'SSL Wireless Credential', '2020-11-11 07:17:35', '2021-09-20 07:29:09'),
(1041, 'en', 'ssl_sms_api_token', 'SSL SMS API TOKEN', '2020-11-11 07:17:35', '2021-09-20 07:29:09'),
(1042, 'en', 'ssl_sms_sid', 'SSL SMS SID', '2020-11-11 07:17:35', '2021-09-20 07:29:09'),
(1043, 'en', 'ssl_sms_url', 'SSL SMS URL', '2020-11-11 07:17:35', '2021-09-20 07:29:09'),
(1045, 'en', 'auth_key', 'AUTH KEY', '2020-11-11 07:17:35', '2021-09-20 07:29:09'),
(1046, 'en', 'route', 'ROUTE', '2020-11-11 07:17:35', '2021-09-20 07:29:09'),
(1047, 'en', 'promotional_use', 'Promotional Use', '2020-11-11 07:17:35', '2021-09-20 07:29:09'),
(1048, 'en', 'transactional_use', 'Transactional Use', '2020-11-11 07:17:35', '2021-09-20 07:29:09'),
(1050, 'en', 'sender_id', 'SENDER ID', '2020-11-11 07:17:35', '2021-09-20 07:29:09'),
(1053, 'en', 'ssl_wireless_otp', 'SSL Wireless OTP', '2020-11-11 07:17:43', '2021-09-20 07:29:09'),
(1055, 'en', 'order_placement', 'Order Placement', '2020-11-11 07:17:43', '2021-09-20 07:29:09'),
(1056, 'en', 'delivery_status_changing_time', 'Delivery Status Changing Time', '2020-11-11 07:17:43', '2021-09-20 07:29:09'),
(1057, 'en', 'paid_status_changing_time', 'Paid Status Changing Time', '2020-11-11 07:17:43', '2021-09-20 07:29:09'),
(1058, 'en', 'send_bulk_sms', 'Send Bulk SMS', '2020-11-11 07:19:14', '2021-09-20 07:29:09'),
(1059, 'en', 'all_subscribers', 'All Subscribers', '2020-11-11 07:21:51', '2021-09-20 07:29:09'),
(1060, 'en', 'coupon_information_adding', 'Coupon Information Adding', '2020-11-11 07:22:25', '2021-09-20 07:29:09'),
(1061, 'en', 'coupon_type', 'Coupon Type', '2020-11-11 07:22:25', '2021-09-20 07:29:09'),
(1062, 'en', 'for_products', 'For Products', '2020-11-11 07:22:25', '2021-09-20 07:29:09'),
(1063, 'en', 'for_total_orders', 'For Total Orders', '2020-11-11 07:22:25', '2021-09-20 07:29:09'),
(1064, 'en', 'add_your_product_base_coupon', 'Add Your Product Base Coupon', '2020-11-11 07:22:42', '2021-09-20 07:29:09'),
(1065, 'en', 'coupon_code', 'Coupon code', '2020-11-11 07:22:42', '2021-09-20 07:29:09'),
(1066, 'en', 'sub_category', 'Sub Category', '2020-11-11 07:22:42', '2021-09-20 07:29:09'),
(1067, 'en', 'add_more', 'Add More', '2020-11-11 07:22:43', '2021-09-20 07:29:09'),
(1068, 'en', 'add_your_cart_base_coupon', 'Add Your Cart Base Coupon', '2020-11-11 07:29:40', '2021-09-20 07:29:09'),
(1069, 'en', 'minimum_shopping', 'Minimum Shopping', '2020-11-11 07:29:40', '2021-09-20 07:29:09'),
(1070, 'en', 'maximum_discount_amount', 'Maximum Discount Amount', '2020-11-11 07:29:41', '2021-09-20 07:29:09'),
(1071, 'en', 'coupon_information_update', 'Coupon Information Update', '2020-11-11 08:18:34', '2021-09-20 07:29:09'),
(1073, 'en', 'please_configure_smtp_setting_to_work_all_email_sending_funtionality', 'Please Configure SMTP Setting to work all email sending funtionality', '2020-11-11 13:10:18', '2021-09-20 07:29:09'),
(1074, 'en', 'configure_now', 'Configure Now', '2020-11-11 13:10:18', '2021-09-20 07:29:09'),
(1076, 'en', 'total_published_products', 'Total published products', '2020-11-11 13:10:18', '2021-09-20 07:29:09'),
(1077, 'en', 'total_sellers_products', 'Total sellers products', '2020-11-11 13:10:18', '2021-09-20 07:29:09'),
(1078, 'en', 'total_admin_products', 'Total admin products', '2020-11-11 13:10:18', '2021-09-20 07:29:09'),
(1079, 'en', 'manage_products', 'Manage Products', '2020-11-11 13:10:18', '2021-09-20 07:29:09'),
(1080, 'en', 'total_product_category', 'Total product category', '2020-11-11 13:10:18', '2021-09-20 07:29:09'),
(1081, 'en', 'create_category', 'Create Category', '2020-11-11 13:10:18', '2021-09-20 07:29:09'),
(1082, 'en', 'total_product_sub_sub_category', 'Total product sub sub category', '2020-11-11 13:10:18', '2021-09-20 07:29:10'),
(1083, 'en', 'create_sub_sub_category', 'Create Sub Sub Category', '2020-11-11 13:10:18', '2021-09-20 07:29:10'),
(1084, 'en', 'total_product_sub_category', 'Total product sub category', '2020-11-11 13:10:18', '2021-09-20 07:29:10'),
(1085, 'en', 'create_sub_category', 'Create Sub Category', '2020-11-11 13:10:18', '2021-09-20 07:29:10'),
(1086, 'en', 'total_product_brand', 'Total product brand', '2020-11-11 13:10:18', '2021-09-20 07:29:10'),
(1087, 'en', 'create_brand', 'Create Brand', '2020-11-11 13:10:18', '2021-09-20 07:29:10'),
(1089, 'en', 'total_sellers', 'Total sellers', '2020-11-11 13:10:19', '2021-09-20 07:29:10'),
(1091, 'en', 'total_approved_sellers', 'Total approved sellers', '2020-11-11 13:10:19', '2021-09-20 07:29:10'),
(1093, 'en', 'total_pending_sellers', 'Total pending sellers', '2020-11-11 13:10:19', '2021-09-20 07:29:10'),
(1094, 'en', 'manage_sellers', 'Manage Sellers', '2020-11-11 13:10:19', '2021-09-20 07:29:10'),
(1095, 'en', 'category_wise_product_sale', 'Category wise product sale', '2020-11-11 13:10:19', '2021-09-20 07:29:10'),
(1097, 'en', 'sale', 'Sale', '2020-11-11 13:10:19', '2021-09-20 07:29:10'),
(1098, 'en', 'category_wise_product_stock', 'Category wise product stock', '2020-11-11 13:10:19', '2021-09-20 07:29:10'),
(1099, 'en', 'category_name', 'Category Name', '2020-11-11 13:10:19', '2021-09-20 07:29:10'),
(1100, 'en', 'stock', 'Stock', '2020-11-11 13:10:19', '2021-09-20 07:29:10'),
(1101, 'en', 'frontend', 'Frontend', '2020-11-11 13:10:19', '2021-09-20 07:29:10'),
(1103, 'en', 'home_page', 'Home page', '2020-11-11 13:10:19', '2021-09-20 07:29:10'),
(1104, 'en', 'setting', 'setting', '2020-11-11 13:10:19', '2021-02-09 06:52:51'),
(1106, 'en', 'policy_page', 'Policy page', '2020-11-11 13:10:20', '2021-09-20 07:29:10'),
(1107, 'en', 'setting', 'setting', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1109, 'en', 'general', 'General', '2020-11-11 13:10:20', '2021-09-20 07:29:10'),
(1110, 'en', 'setting', 'setting', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1111, 'en', 'click_here', 'Click Here', '2020-11-11 13:10:20', '2021-09-20 07:29:10'),
(1112, 'en', 'useful_link', 'Useful link', '2020-11-11 13:10:20', '2021-09-20 07:29:10'),
(1113, 'en', 'setting', 'setting', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1114, 'en', 'click_here', 'Click Here', '2020-11-11 13:10:20', '2021-09-20 07:29:10'),
(1115, 'en', 'activation', 'Activation', '2020-11-11 13:10:20', '2021-09-20 07:29:10'),
(1116, 'en', 'setting', 'setting', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1117, 'en', 'click_here', 'Click Here', '2020-11-11 13:10:20', '2021-09-20 07:29:10'),
(1118, 'en', 'smtp', 'SMTP', '2020-11-11 13:10:20', '2021-09-20 07:29:10'),
(1119, 'en', 'setting', 'setting', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1120, 'en', 'click_here', 'Click Here', '2020-11-11 13:10:20', '2021-09-20 07:29:10'),
(1121, 'en', 'payment_method', 'Payment method', '2020-11-11 13:10:20', '2021-09-20 07:29:10'),
(1122, 'en', 'setting', 'setting', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1123, 'en', 'click_here', 'Click Here', '2020-11-11 13:10:20', '2021-09-20 07:29:10'),
(1124, 'en', 'social_media', 'Social media', '2020-11-11 13:10:20', '2021-09-20 07:29:10'),
(1125, 'en', 'setting', 'setting', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1126, 'en', 'click_here', 'Click Here', '2020-11-11 13:10:21', '2021-09-20 07:29:10'),
(1127, 'en', 'business', 'Business', '2020-11-11 13:10:21', '2021-09-20 07:29:10'),
(1128, 'en', 'setting', 'setting', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1130, 'en', 'setting', 'setting', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1131, 'en', 'click_here', 'Click Here', '2020-11-11 13:10:21', '2021-09-20 07:29:10'),
(1133, 'en', 'form_setting', 'form setting', '2020-11-11 13:10:21', '2021-09-20 07:29:10'),
(1134, 'en', 'click_here', 'Click Here', '2020-11-11 13:10:21', '2021-09-20 07:29:10'),
(1135, 'en', 'language', 'Language', '2020-11-11 13:10:21', '2021-09-20 07:29:10'),
(1136, 'en', 'setting', 'setting', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1137, 'en', 'click_here', 'Click Here', '2020-11-11 13:10:21', '2021-09-20 07:29:10'),
(1139, 'en', 'setting', 'setting', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1140, 'en', 'click_here', 'Click Here', '2020-11-11 13:10:21', '2021-09-20 07:29:10'),
(1141, 'en', 'dashboard', 'Dashboard', '2020-11-11 13:10:21', '2021-09-20 07:29:10'),
(1142, 'en', 'pos_system', 'POS System', '2020-11-11 13:10:21', '2021-09-20 07:29:10'),
(1143, 'en', 'pos_manager', 'POS Manager', '2020-11-11 13:10:21', '2021-09-20 07:29:10'),
(1144, 'en', 'pos_configuration', 'POS Configuration', '2020-11-11 13:10:21', '2021-09-20 07:29:10'),
(1145, 'en', 'products', 'Products', '2020-11-11 13:10:21', '2021-09-20 07:29:10'),
(1146, 'en', 'add_new_product', 'Add New product', '2020-11-11 13:10:22', '2021-09-20 07:29:10'),
(1147, 'en', 'all_products', 'All Products', '2020-11-11 13:10:22', '2021-09-20 07:29:10'),
(1151, 'en', 'bulk_import', 'Bulk Import', '2020-11-11 13:10:22', '2021-09-20 07:29:10'),
(1152, 'en', 'bulk_export', 'Bulk Export', '2020-11-11 13:10:22', '2021-09-20 07:29:10'),
(1153, 'en', 'category', 'Category', '2020-11-11 13:10:22', '2021-09-20 07:29:10'),
(1154, 'en', 'subcategory', 'Subcategory', '2020-11-11 13:10:22', '2021-09-20 07:29:10'),
(1155, 'en', 'sub_subcategory', 'Sub Subcategory', '2020-11-11 13:10:22', '2021-09-20 07:29:10'),
(1156, 'en', 'brand', 'Brand', '2020-11-11 13:10:22', '2021-09-20 07:29:10'),
(1158, 'en', 'product_reviews', 'Product Reviews', '2020-11-11 13:10:22', '2021-09-20 07:29:10'),
(1159, 'en', 'sales', 'Sales', '2020-11-11 13:10:22', '2021-09-20 07:29:10'),
(1160, 'en', 'all_orders', 'All Orders', '2020-11-11 13:10:22', '2021-09-20 07:29:10'),
(1164, 'en', 'refunds', 'Refunds', '2020-11-11 13:10:22', '2021-09-20 07:29:10'),
(1165, 'en', 'refund_requests', 'Refund Requests', '2020-11-11 13:10:22', '2021-09-20 07:29:10'),
(1166, 'en', 'approved_refund', 'Approved Refund', '2020-11-11 13:10:23', '2021-09-20 07:29:10'),
(1167, 'en', 'refund_configuration', 'Refund Configuration', '2020-11-11 13:10:23', '2021-09-20 07:29:10'),
(1168, 'en', 'customers', 'Customers', '2020-11-11 13:10:23', '2021-09-20 07:29:10'),
(1169, 'en', 'customer_list', 'Customer list', '2020-11-11 13:10:23', '2021-09-20 07:29:10'),
(1170, 'en', 'classified_products', 'Classified Products', '2020-11-11 13:10:23', '2021-09-20 07:29:10'),
(1171, 'en', 'classified_packages', 'Classified Packages', '2020-11-11 13:10:23', '2021-09-20 07:29:10'),
(1179, 'en', 'reports', 'Reports', '2020-11-11 13:10:23', '2021-09-20 07:29:10'),
(1182, 'en', 'products_stock', 'Products Stock', '2020-11-11 13:10:23', '2021-09-20 07:29:10'),
(1183, 'en', 'products_wishlist', 'Products wishlist', '2020-11-11 13:10:23', '2021-09-20 07:29:10'),
(1184, 'en', 'user_searches', 'User Searches', '2020-11-11 13:10:23', '2021-09-20 07:29:10'),
(1185, 'en', 'marketing', 'Marketing', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1186, 'en', 'flash_deals', 'Flash deals', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1187, 'en', 'newsletters', 'Newsletters', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1188, 'en', 'bulk_sms', 'Bulk SMS', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1189, 'en', 'subscribers', 'Subscribers', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1190, 'en', 'coupon', 'Coupon', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1191, 'en', 'support', 'Support', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1192, 'en', 'ticket', 'Ticket', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1193, 'en', 'product_queries', 'Product Queries', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1194, 'en', 'website_setup', 'Website Setup', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1195, 'en', 'header', 'Header', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1196, 'en', 'footer', 'Footer', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1197, 'en', 'pages', 'Pages', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1198, 'en', 'appearance', 'Appearance', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1199, 'en', 'setup__configurations', 'Setup & Configurations', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1200, 'en', 'general_settings', 'General Settings', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1201, 'en', 'features_activation', 'Features activation', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1202, 'en', 'languages', 'Languages', '2020-11-11 13:10:24', '2021-09-20 07:29:10'),
(1203, 'en', 'currency', 'Currency', '2020-11-11 13:10:25', '2021-09-20 07:29:10'),
(1204, 'en', 'pickup_point', 'Pickup point', '2020-11-11 13:10:25', '2021-09-20 07:29:10'),
(1205, 'en', 'smtp_settings', 'SMTP Settings', '2020-11-11 13:10:25', '2021-09-20 07:29:10'),
(1206, 'en', 'payment_methods', 'Payment Methods', '2020-11-11 13:10:25', '2021-09-20 07:29:10'),
(1207, 'en', 'file_system_configuration', 'File System Configuration', '2020-11-11 13:10:25', '2021-09-20 07:29:10'),
(1208, 'en', 'social_media_logins', 'Social media Logins', '2020-11-11 13:10:25', '2021-09-20 07:29:10'),
(1209, 'en', 'analytics_tools', 'Analytics Tools', '2020-11-11 13:10:25', '2021-09-20 07:29:10'),
(1210, 'en', 'facebook_chat', 'Facebook Chat', '2020-11-11 13:10:25', '2021-09-20 07:29:10'),
(1211, 'en', 'google_recaptcha', 'Google reCAPTCHA', '2020-11-11 13:10:25', '2021-09-20 07:29:10'),
(1212, 'en', 'shipping_configuration', 'Shipping Configuration', '2020-11-11 13:10:25', '2021-09-20 07:29:10'),
(1213, 'en', 'shipping_countries', 'Shipping Countries', '2020-11-11 13:10:25', '2021-09-20 07:29:10'),
(1214, 'en', 'affiliate_system', 'Affiliate System', '2020-11-11 13:10:25', '2021-09-20 07:29:10'),
(1215, 'en', 'affiliate_registration_form', 'Affiliate Registration Form', '2020-11-11 13:10:25', '2021-09-20 07:29:10'),
(1216, 'en', 'affiliate_configurations', 'Affiliate Configurations', '2020-11-11 13:10:25', '2021-09-20 07:29:10'),
(1217, 'en', 'affiliate_users', 'Affiliate Users', '2020-11-11 13:10:25', '2021-09-20 07:29:10'),
(1218, 'en', 'referral_users', 'Referral Users', '2020-11-11 13:10:25', '2021-09-20 07:29:10'),
(1219, 'en', 'affiliate_withdraw_requests', 'Affiliate Withdraw Requests', '2020-11-11 13:10:26', '2021-09-20 07:29:10'),
(1226, 'en', 'set_paytm_credentials', 'Set Paytm Credentials', '2020-11-11 13:10:26', '2021-09-20 07:29:10'),
(1227, 'en', 'club_point_system', 'Club Point System', '2020-11-11 13:10:26', '2021-09-20 07:29:10'),
(1228, 'en', 'club_point_configurations', 'Club Point Configurations', '2020-11-11 13:10:26', '2021-09-20 07:29:10'),
(1229, 'en', 'set_product_point', 'Set Product Point', '2020-11-11 13:10:26', '2021-09-20 07:29:10'),
(1230, 'en', 'user_points', 'User Points', '2020-11-11 13:10:26', '2021-09-20 07:29:10'),
(1231, 'en', 'otp_system', 'OTP System', '2020-11-11 13:10:26', '2021-09-20 07:29:10'),
(1232, 'en', 'otp_configurations', 'OTP Configurations', '2020-11-11 13:10:26', '2021-09-20 07:29:10'),
(1233, 'en', 'set_otp_credentials', 'Set OTP Credentials', '2020-11-11 13:10:26', '2021-09-20 07:29:10'),
(1234, 'en', 'staffs', 'Staffs', '2020-11-11 13:10:26', '2021-09-20 07:29:10'),
(1235, 'en', 'all_staffs', 'All staffs', '2020-11-11 13:10:27', '2021-09-20 07:29:10'),
(1236, 'en', 'staff_permissions', 'Staff permissions', '2020-11-11 13:10:27', '2021-09-20 07:29:10'),
(1237, 'en', 'addon_manager', 'Addon Manager', '2020-11-11 13:10:27', '2021-09-20 07:29:10'),
(1238, 'en', 'browse_website', 'Browse Website', '2020-11-11 13:10:27', '2021-09-20 07:29:10'),
(1239, 'en', 'pos', 'POS', '2020-11-11 13:10:27', '2021-09-20 07:29:10'),
(1240, 'en', 'notifications', 'Notifications', '2020-11-11 13:10:27', '2021-09-20 07:29:10'),
(1241, 'en', 'new_orders', 'new orders', '2020-11-11 13:10:27', '2021-09-20 07:29:10'),
(1242, 'en', 'userimage', 'user-image', '2020-11-11 13:10:27', '2021-09-20 07:29:10'),
(1243, 'en', 'profile', 'Profile', '2020-11-11 13:10:27', '2021-09-20 07:29:10'),
(1244, 'en', 'logout', 'Logout', '2020-11-11 13:10:27', '2021-09-20 07:29:10'),
(1247, 'en', 'page_not_found', 'Page Not Found!', '2020-11-11 13:10:28', '2021-09-20 07:29:10'),
(1249, 'en', 'the_page_you_are_looking_for_has_not_been_found_on_our_server', 'The page you are looking for has not been found on our server.', '2020-11-11 13:10:28', '2021-09-20 07:29:10'),
(1253, 'en', 'registration', 'Registration', '2020-11-11 13:10:29', '2021-09-20 07:29:10'),
(1255, 'en', 'i_am_shopping_for', 'I am shopping for...', '2020-11-11 13:10:29', '2021-09-20 07:29:10'),
(1257, 'en', 'compare', 'Compare', '2020-11-11 13:10:29', '2021-09-20 07:29:10'),
(1259, 'en', 'wishlist', 'Wishlist', '2020-11-11 13:10:29', '2021-09-20 07:29:10'),
(1261, 'en', 'cart', 'Cart', '2020-11-11 13:10:29', '2021-09-20 07:29:10'),
(1263, 'en', 'your_cart_is_empty', 'Your Cart is empty', '2020-11-11 13:10:29', '2021-09-20 07:29:10'),
(1265, 'en', 'categories', 'Categories', '2020-11-11 13:10:29', '2021-09-20 07:29:10'),
(1267, 'en', 'see_all', 'See All', '2020-11-11 13:10:29', '2021-09-20 07:29:10'),
(1271, 'en', 'return_policy', 'Return Policy', '2020-11-11 13:10:29', '2021-09-20 07:29:10'),
(1273, 'en', 'support_policy', 'Support Policy', '2020-11-11 13:10:29', '2021-09-20 07:29:10'),
(1275, 'en', 'privacy_policy', 'Privacy Policy', '2020-11-11 13:10:29', '2021-09-20 07:29:10'),
(1277, 'en', 'your_email_address', 'Your Email Address', '2020-11-11 13:10:29', '2021-09-20 07:29:10'),
(1279, 'en', 'subscribe', 'Subscribe', '2020-11-11 13:10:29', '2021-09-20 07:29:10'),
(1281, 'en', 'contact_info', 'Contact Info', '2020-11-11 13:10:29', '2021-09-20 07:29:10'),
(1283, 'en', 'address', 'Address', '2020-11-11 13:10:29', '2021-09-20 07:29:10'),
(1285, 'en', 'phone', 'Phone', '2020-11-11 13:10:30', '2021-09-20 07:29:10'),
(1287, 'en', 'email', 'Email', '2020-11-11 13:10:30', '2021-09-20 07:29:10'),
(1288, 'en', 'login', 'Login', '2020-11-11 13:10:30', '2021-09-20 07:29:10'),
(1289, 'en', 'my_account', 'My Account', '2020-11-11 13:10:30', '2021-09-20 07:29:10'),
(1291, 'en', 'login', 'Login', '2020-11-11 13:10:30', '2021-09-20 07:29:10'),
(1293, 'en', 'order_history', 'Order History', '2020-11-11 13:10:30', '2021-09-20 07:29:10'),
(1295, 'en', 'my_wishlist', 'My Wishlist', '2020-11-11 13:10:30', '2021-09-20 07:29:10'),
(1297, 'en', 'track_order', 'Track Order', '2020-11-11 13:10:30', '2021-09-20 07:29:10'),
(1299, 'en', 'be_an_affiliate_partner', 'Be an affiliate partner', '2020-11-11 13:10:30', '2021-09-20 07:29:10'),
(1303, 'en', 'apply_now', 'Apply Now', '2020-11-11 13:10:30', '2021-09-20 07:29:10'),
(1305, 'en', 'confirmation', 'Confirmation', '2020-11-11 13:10:30', '2021-09-20 07:29:10'),
(1307, 'en', 'delete_confirmation_message', 'Delete confirmation message', '2020-11-11 13:10:30', '2021-09-20 07:29:10'),
(1309, 'en', 'cancel', 'Cancel', '2020-11-11 13:10:30', '2021-09-20 07:29:10'),
(1312, 'en', 'delete', 'Delete', '2020-11-11 13:10:30', '2021-09-20 07:29:10'),
(1313, 'en', 'item_has_been_added_to_compare_list', 'Item has been added to compare list', '2020-11-11 13:10:30', '2021-09-20 07:29:10'),
(1314, 'en', 'please_login_first', 'Please login first', '2020-11-11 13:10:30', '2021-09-20 07:29:10'),
(1315, 'en', 'total_earnings_from', 'Total Earnings From', '2020-11-12 08:01:11', '2021-09-20 07:29:10'),
(1316, 'en', 'client_subscription', 'Client Subscription', '2020-11-12 08:01:12', '2021-09-20 07:29:10'),
(1317, 'en', 'product_category', 'Product category', '2020-11-12 08:03:46', '2021-09-20 07:29:10'),
(1318, 'en', 'product_sub_sub_category', 'Product sub sub category', '2020-11-12 08:03:46', '2021-09-20 07:29:10'),
(1319, 'en', 'product_sub_category', 'Product sub category', '2020-11-12 08:03:46', '2021-09-20 07:29:10'),
(1320, 'en', 'product_brand', 'Product brand', '2020-11-12 08:03:46', '2021-09-20 07:29:10'),
(1321, 'en', 'top_client_packages', 'Top Client Packages', '2020-11-12 08:05:21', '2021-09-20 07:29:10'),
(1322, 'en', 'top_freelancer_packages', 'Top Freelancer Packages', '2020-11-12 08:05:21', '2021-09-20 07:29:10'),
(1323, 'en', 'number_of_sale', 'Number of sale', '2020-11-12 09:13:09', '2021-09-20 07:29:10'),
(1324, 'en', 'number_of_stock', 'Number of Stock', '2020-11-12 09:16:02', '2021-09-20 07:29:10'),
(1325, 'en', 'top_10_products', 'Top 10 Products', '2020-11-12 10:02:29', '2021-09-20 07:29:10'),
(1326, 'en', 'top_12_products', 'Top 12 Products', '2020-11-12 10:02:39', '2021-09-20 07:29:10'),
(1327, 'en', 'admin_can_not_be_a_seller', 'Admin cannot be a seller', '2020-11-12 11:30:19', '2021-09-20 07:29:10'),
(1328, 'en', 'filter_by_rating', 'Filter by Rating', '2020-11-15 08:01:15', '2021-09-20 07:29:10'),
(1329, 'en', 'published_reviews_updated_successfully', 'Published reviews updated successfully', '2020-11-15 08:01:15', '2021-09-20 07:29:10'),
(1330, 'en', 'refund_sticker_has_been_updated_successfully', 'Refund Sticker has been updated successfully', '2020-11-15 08:17:12', '2021-09-20 07:29:10'),
(1331, 'en', 'edit_product', 'Edit Product', '2020-11-15 10:31:54', '2021-09-20 07:29:10'),
(1332, 'en', 'meta_images', 'Meta Images', '2020-11-15 10:32:12', '2021-09-20 07:29:10'),
(1333, 'en', 'update_product', 'Update Product', '2020-11-15 10:32:12', '2021-09-20 07:29:10'),
(1334, 'en', 'product_has_been_deleted_successfully', 'Product has been deleted successfully', '2020-11-15 10:32:57', '2021-09-20 07:29:10'),
(1335, 'en', 'your_profile_has_been_updated_successfully', 'Your Profile has been updated successfully!', '2020-11-15 11:10:42', '2021-09-20 07:29:10'),
(1336, 'en', 'upload_limit_has_been_reached_please_upgrade_your_package', 'Upload limit has been reached. Please upgrade your package.', '2020-11-15 11:13:45', '2021-09-20 07:29:10'),
(1337, 'en', 'add_your_product', 'Add Your Product', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1338, 'en', 'select_a_category', 'Select a category', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1339, 'en', 'select_a_brand', 'Select a brand', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1340, 'en', 'product_unit', 'Product Unit', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1341, 'en', 'minimum_qty', 'Minimum Qty.', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1342, 'en', 'product_tag', 'Product Tag', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1343, 'en', 'type__hit_enter', 'Type & hit enter', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1344, 'en', 'videos', 'Videos', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1345, 'en', 'video_from', 'Video From', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1346, 'en', 'video_url', 'Video URL', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1347, 'en', 'customer_choice', 'Customer Choice', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1348, 'en', 'pdf', 'PDF', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1349, 'en', 'choose_pdf', 'Choose PDF', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1350, 'en', 'select_category', 'Select Category', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1351, 'en', 'target_category', 'Target Category', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1352, 'en', 'subsubcategory', 'subsubcategory', '2020-11-15 11:17:56', '2021-02-09 06:53:13'),
(1353, 'en', 'search_category', 'Search Category', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1354, 'en', 'search_subcategory', 'Search SubCategory', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1355, 'en', 'search_subsubcategory', 'Search SubSubCategory', '2020-11-15 11:17:56', '2021-09-20 07:29:10'),
(1356, 'en', 'update_your_product', 'Update your product', '2020-11-15 11:39:14', '2021-09-20 07:29:10'),
(1357, 'en', 'product_has_been_updated_successfully', 'Product has been updated successfully', '2020-11-15 11:51:36', '2021-09-20 07:29:10'),
(1358, 'en', 'add_your_digital_product', 'Add Your Digital Product', '2020-11-15 12:24:21', '2021-09-20 07:29:10'),
(1359, 'en', 'active_ecommerce_cms_update_process', 'Active eCommerce CMS Update Process', '2020-11-16 07:53:31', '2021-09-20 07:29:10'),
(1361, 'en', 'codecanyon_purchase_code', 'Codecanyon purchase code', '2020-11-16 07:53:31', '2021-09-20 07:29:10'),
(1362, 'en', 'database_name', 'Database Name', '2020-11-16 07:53:31', '2021-09-20 07:29:10'),
(1363, 'en', 'database_username', 'Database Username', '2020-11-16 07:53:31', '2021-09-20 07:29:10'),
(1364, 'en', 'database_password', 'Database Password', '2020-11-16 07:53:31', '2021-09-20 07:29:10'),
(1365, 'en', 'database_hostname', 'Database Hostname', '2020-11-16 07:53:31', '2021-09-20 07:29:10'),
(1366, 'en', 'update_now', 'Update Now', '2020-11-16 07:53:31', '2021-09-20 07:29:10'),
(1368, 'en', 'congratulations', 'Congratulations', '2020-11-16 07:55:14', '2021-09-20 07:29:10'),
(1369, 'en', 'you_have_successfully_completed_the_updating_process_please_login_to_continue', 'You have successfully completed the updating process. Please Login to continue', '2020-11-16 07:55:14', '2021-09-20 07:29:10'),
(1370, 'en', 'go_to_home', 'Go to Home', '2020-11-16 07:55:14', '2021-09-20 07:29:10'),
(1371, 'en', 'login_to_admin_panel', 'Login to Admin panel', '2020-11-16 07:55:14', '2021-09-20 07:29:10'),
(1372, 'en', 's3_file_system_credentials', 'S3 File System Credentials', '2020-11-16 12:59:57', '2021-09-20 07:29:10'),
(1373, 'en', 'aws_access_key_id', 'AWS_ACCESS_KEY_ID', '2020-11-16 12:59:57', '2021-09-20 07:29:10'),
(1374, 'en', 'aws_secret_access_key', 'AWS_SECRET_ACCESS_KEY', '2020-11-16 12:59:57', '2021-09-20 07:29:10'),
(1375, 'en', 'aws_default_region', 'AWS_DEFAULT_REGION', '2020-11-16 12:59:57', '2021-09-20 07:29:10'),
(1376, 'en', 'aws_bucket', 'AWS_BUCKET', '2020-11-16 12:59:57', '2021-09-20 07:29:10'),
(1377, 'en', 'aws_url', 'AWS_URL', '2020-11-16 12:59:57', '2021-09-20 07:29:10'),
(1378, 'en', 's3_file_system_activation', 'S3 File System Activation', '2020-11-16 12:59:57', '2021-09-20 07:29:10'),
(1379, 'en', 'your_phone_number', 'Your phone number', '2020-11-17 05:50:10', '2021-09-20 07:29:10'),
(1380, 'en', 'zip_file', 'Zip File', '2020-11-17 06:58:45', '2021-09-20 07:29:10'),
(1381, 'en', 'install', 'Install', '2020-11-17 06:58:45', '2021-09-20 07:29:10'),
(1382, 'en', 'this_version_is_not_capable_of_installing_addons_please_update', 'This version is not capable of installing Addons, Please update.', '2020-11-17 06:59:11', '2021-09-20 07:29:10'),
(1559, 'en', 'search_in_menu', 'Search in menu', '2021-02-03 03:55:48', '2021-09-20 07:29:11'),
(1560, 'en', 'uploaded_files', 'Uploaded Files', '2021-02-03 03:55:48', '2021-09-20 07:29:11'),
(1561, 'en', 'shipping_cities', 'Shipping Cities', '2021-02-03 03:55:48', '2021-09-20 07:29:11'),
(1562, 'en', 'system', 'System', '2021-02-03 03:55:49', '2021-09-20 07:29:11'),
(1563, 'en', 'server_status', 'Server status', '2021-02-03 03:55:49', '2021-09-20 07:29:11'),
(1564, 'en', 'nothing_found', 'Nothing Found', '2021-02-03 03:55:49', '2021-09-20 07:29:11'),
(1565, 'en', 'parent_category', 'Parent Category', '2021-02-03 03:58:00', '2021-09-20 07:29:11'),
(1566, 'en', 'level', 'Level', '2021-02-03 03:58:00', '2021-09-20 07:29:11'),
(1567, 'en', 'category_information', 'Category Information', '2021-02-03 03:58:12', '2021-09-20 07:29:11'),
(1568, 'en', 'translatable', 'Translatable', '2021-02-03 03:58:12', '2021-09-20 07:29:11'),
(1569, 'en', 'no_parent', 'No Parent', '2021-02-03 03:58:12', '2021-09-20 07:29:11'),
(1570, 'en', 'physical', 'Physical', '2021-02-03 03:58:13', '2021-09-20 07:29:11'),
(1572, 'en', '200x200', '200x200', '2021-02-03 03:58:13', '2021-02-03 03:58:13'),
(1573, 'en', '32x32', '32x32', '2021-02-03 03:58:13', '2021-02-03 03:58:13'),
(1574, 'en', 'search_your_files', 'Search your files', '2021-02-03 03:58:15', '2021-09-20 07:29:11'),
(1575, 'en', 'category_has_been_updated_successfully', 'Category has been updated successfully', '2021-02-03 04:47:29', '2021-09-20 07:29:11'),
(1576, 'en', 'all_uploaded_files', 'All uploaded files', '2021-02-03 06:25:30', '2021-09-20 07:29:11'),
(1577, 'en', 'upload_new_file', 'Upload New File', '2021-02-03 06:25:30', '2021-09-20 07:29:11'),
(1578, 'en', 'all_files', 'All files', '2021-02-03 06:25:30', '2021-09-20 07:29:11'),
(1579, 'en', 'search', 'Search', '2021-02-03 06:25:30', '2021-09-20 07:29:11'),
(1580, 'en', 'details_info', 'Details Info', '2021-02-03 06:25:30', '2021-09-20 07:29:11'),
(1581, 'en', 'copy_link', 'Copy Link', '2021-02-03 06:25:30', '2021-09-20 07:29:11'),
(1582, 'en', 'are_you_sure_to_delete_this_file', 'Are you sure to delete this file?', '2021-02-03 06:25:31', '2021-09-20 07:29:11'),
(1583, 'en', 'file_info', 'File Info', '2021-02-03 06:25:31', '2021-09-20 07:29:11'),
(1584, 'en', 'link_copied_to_clipboard', 'Link copied to clipboard', '2021-02-03 06:25:31', '2021-09-20 07:29:11'),
(1585, 'en', 'oops_unable_to_copy', 'Oops, unable to copy', '2021-02-03 06:25:31', '2021-09-20 07:29:11'),
(1586, 'en', 'file_deleted_successfully', 'File deleted successfully', '2021-02-03 06:26:02', '2021-09-20 07:29:11'),
(1587, 'en', 'add_new_brand', 'Add New Brand', '2021-02-03 07:04:22', '2021-09-20 07:29:11'),
(1588, 'en', '120x80', '120x80', '2021-02-03 07:04:22', '2021-02-03 07:04:22'),
(1589, 'en', 'brand_information', 'Brand Information', '2021-02-03 07:04:29', '2021-09-20 07:29:11'),
(1590, 'en', 'brand_has_been_updated_successfully', 'Brand has been updated successfully', '2021-02-03 07:06:52', '2021-09-20 07:29:11'),
(1591, 'en', 'brand_has_been_deleted_successfully', 'Brand has been deleted successfully', '2021-02-03 07:07:54', '2021-09-20 07:29:11'),
(1592, 'en', 'this_is_used_for_search_input_those_words_by_which_cutomer_can_find_this_product', 'This is used for search. Input those words by which cutomer can find this product.', '2021-02-04 03:11:06', '2021-09-20 07:29:11'),
(1593, 'en', 'these_images_are_visible_in_product_details_page_gallery_use_600x600_sizes_images', 'These images are visible in product details page gallery. Use 600x600 sizes images.', '2021-02-04 03:11:06', '2021-09-20 07:29:11'),
(1594, 'en', 'this_image_is_visible_in_all_product_box_use_300x300_sizes_image_keep_some_blank_space_around_main_object_of_your_image_as_we_had_to_crop_some_edge_in_different_devices_to_make_it_responsive', 'This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.', '2021-02-04 03:11:06', '2021-09-20 07:29:11'),
(1595, 'en', 'use_proper_link_without_extra_parameter_dont_use_short_share_linkembeded_iframe_code', 'Use proper link without extra parameter. Don\'t use short share link/embeded iframe code.', '2021-02-04 03:11:06', '2021-09-20 07:29:11'),
(1596, 'en', 'save_product', 'Save Product', '2021-02-04 03:11:07', '2021-09-20 07:29:11'),
(1597, 'en', 'product_has_been_inserted_successfully', 'Product has been inserted successfully', '2021-02-04 03:29:35', '2021-09-20 07:29:11'),
(1598, 'en', 'something_went_wrong', 'Something went wrong!', '2021-02-04 04:32:50', '2021-09-20 07:29:11'),
(1599, 'en', 'sorry_for_the_inconvenience_but_were_working_on_it', 'Sorry for the inconvenience, but we\'re working on it.', '2021-02-04 04:32:50', '2021-09-20 07:29:11'),
(1600, 'en', 'error_code', 'Error code', '2021-02-04 04:32:50', '2021-09-20 07:29:11'),
(1601, 'en', 'please_configure_smtp_setting_to_work_all_email_sending_functionality', 'Please Configure SMTP Setting to work all email sending functionality', '2021-02-04 04:33:06', '2021-09-20 07:29:11'),
(1602, 'en', 'order', 'Order', '2021-02-04 04:33:06', '2021-09-20 07:29:11'),
(1603, 'en', 'we_have_limited_banner_height_to_maintain_ui_we_had_to_crop_from_both_left__right_side_in_view_for_different_devices_to_make_it_responsive_before_designing_banner_keep_these_points_in_mind', 'We have limited banner height to maintain UI. We had to crop from both left & right side in view for different devices to make it responsive. Before designing banner keep these points in mind.', '2021-02-04 06:10:35', '2021-09-20 07:29:11'),
(1604, 'en', 'home_banner_3_max_3', 'Home Banner 3 (Max 3)', '2021-02-04 06:10:36', '2021-09-20 07:29:11'),
(1605, 'en', 'add_new_seller', 'Add New Seller', '2021-02-04 07:28:20', '2021-09-20 07:29:11'),
(1606, 'en', 'filter_by_approval', 'Filter by Approval', '2021-02-04 07:28:20', '2021-09-20 07:29:11'),
(1607, 'en', 'nonapproved', 'Non-Approved', '2021-02-04 07:28:20', '2021-09-20 07:29:11'),
(1608, 'en', 'type_name_or_email__enter', 'Type name or email & Enter', '2021-02-04 07:28:20', '2021-09-20 07:29:11'),
(1611, 'en', 'go_to_payment', 'Go to Payment', '2021-02-04 07:28:20', '2021-09-20 07:29:11');
INSERT INTO `translations` (`id`, `lang`, `lang_key`, `lang_value`, `created_at`, `updated_at`) VALUES
(1614, 'en', 'proceed', 'Proceed!', '2021-02-04 07:28:20', '2021-09-20 07:29:11'),
(1619, 'en', 'email_already_exists', 'Email already exists!', '2021-02-04 07:38:36', '2021-09-20 07:29:11'),
(1620, 'en', 'verify_your_email_address', 'Verify Your Email Address', '2021-02-04 07:40:03', '2021-09-20 07:29:11'),
(1621, 'en', 'before_proceeding_please_check_your_email_for_a_verification_link', 'Before proceeding, please check your email for a verification link.', '2021-02-04 07:40:03', '2021-09-20 07:29:11'),
(1622, 'en', 'if_you_did_not_receive_the_email', 'If you did not receive the email.', '2021-02-04 07:40:03', '2021-09-20 07:29:11'),
(1623, 'en', 'click_here_to_request_another', 'Click here to request another', '2021-02-04 07:40:03', '2021-09-20 07:29:11'),
(1624, 'en', 'email_verification', 'Email Verification', '2021-02-04 07:40:09', '2021-09-20 07:29:11'),
(1625, 'en', 'email_verification__', 'Email Verification -', '2021-02-04 07:40:09', '2021-09-20 07:29:11'),
(1626, 'en', 'https_activation', 'HTTPS Activation', '2021-02-04 07:43:50', '2021-09-20 07:29:11'),
(1627, 'en', 'maintenance_mode', 'Maintenance Mode', '2021-02-04 07:43:50', '2021-09-20 07:29:11'),
(1628, 'en', 'maintenance_mode_activation', 'Maintenance Mode Activation', '2021-02-04 07:43:50', '2021-09-20 07:29:11'),
(1631, 'en', 'business_related', 'Business Related', '2021-02-04 07:43:50', '2021-09-20 07:29:11'),
(1632, 'en', 'vendor_system_activation', 'Vendor System Activation', '2021-02-04 07:43:50', '2021-09-20 07:29:11'),
(1633, 'en', 'wallet_system_activation', 'Wallet System Activation', '2021-02-04 07:43:50', '2021-09-20 07:29:11'),
(1634, 'en', 'coupon_system_activation', 'Coupon System Activation', '2021-02-04 07:43:50', '2021-09-20 07:29:11'),
(1635, 'en', 'pickup_point_activation', 'Pickup Point Activation', '2021-02-04 07:43:50', '2021-09-20 07:29:11'),
(1636, 'en', 'conversation_activation', 'Conversation Activation', '2021-02-04 07:43:50', '2021-09-20 07:29:11'),
(1637, 'en', 'guest_checkout_activation', 'Guest Checkout Activation', '2021-02-04 07:43:50', '2021-09-20 07:29:11'),
(1638, 'en', 'categorybased_commission', 'Category-based Commission', '2021-02-04 07:43:50', '2021-09-20 07:29:11'),
(1639, 'en', 'after_activate_this_option_seller_commision_will_be_disabled_and_you_need_to_set_commission_on_each_category_otherwise_admin_will_not_get_any_commision', 'After activate this option Seller commision will be disabled and You need to set commission on each category otherwise Admin will not get any commision', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1640, 'en', 'set_commisssion_now', 'Set Commisssion Now', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1641, 'en', 'payment_related', 'Payment Related', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1642, 'en', 'paypal_payment_activation', 'Paypal Payment Activation', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1643, 'en', 'you_need_to_configure_paypal_correctly_to_enable_this_feature', 'You need to configure Paypal correctly to enable this feature', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1644, 'en', 'stripe_payment_activation', 'Stripe Payment Activation', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1645, 'en', 'sslcommerz_activation', 'SSlCommerz Activation', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1659, 'en', 'bkash_activation', 'Bkash Activation', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1660, 'en', 'you_need_to_configure_bkash_correctly_to_enable_this_feature', 'You need to configure bkash correctly to enable this feature', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1661, 'en', 'nagad_activation', 'Nagad Activation', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1662, 'en', 'you_need_to_configure_nagad_correctly_to_enable_this_feature', 'You need to configure nagad correctly to enable this feature', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1663, 'en', 'cash_payment_activation', 'Cash Payment Activation', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1664, 'en', 'social_media_login', 'Social Media Login', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1665, 'en', 'facebook_login', 'Facebook login', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1666, 'en', 'you_need_to_configure_facebook_client_correctly_to_enable_this_feature', 'You need to configure Facebook Client correctly to enable this feature', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1667, 'en', 'google_login', 'Google login', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1668, 'en', 'you_need_to_configure_google_client_correctly_to_enable_this_feature', 'You need to configure Google Client correctly to enable this feature', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1669, 'en', 'twitter_login', 'Twitter login', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1670, 'en', 'you_need_to_configure_twitter_client_correctly_to_enable_this_feature', 'You need to configure Twitter Client correctly to enable this feature', '2021-02-04 07:43:51', '2021-09-20 07:29:11'),
(1673, 'en', 'banner_settings', 'Banner Settings', '2021-02-04 07:45:53', '2021-09-20 07:29:11'),
(1674, 'en', 'banners', 'Banners', '2021-02-04 07:45:53', '2021-09-20 07:29:11'),
(1675, 'en', 'we_had_to_limit_height_to_maintian_consistancy_in_some_device_both_side_of_the_banner_might_be_cropped_for_height_limitation', 'We had to limit height to maintian consistancy. In some device both side of the banner might be cropped for height limitation.', '2021-02-04 07:45:53', '2021-09-20 07:29:11'),
(1676, 'en', 'insert_link_with_https_', 'Insert link with https', '2021-02-04 07:45:53', '2021-09-20 07:29:11'),
(1677, 'en', 'your_shop_has_been_updated_successfully', 'Your Shop has been updated successfully!', '2021-02-04 07:49:29', '2021-09-20 07:29:11'),
(1678, 'en', 'support_ticket', 'Support Ticket', '2021-02-04 14:25:45', '2021-09-20 07:29:11'),
(1679, 'en', 'delete', 'Delete', '2021-02-05 03:06:35', '2021-09-20 07:29:11'),
(1680, 'en', 'search_result_for_', 'Search result for', '2021-02-05 03:15:40', '2021-09-20 07:29:11'),
(1681, 'en', 'brand_has_been_inserted_successfully', 'Brand has been inserted successfully', '2021-02-05 07:27:04', '2021-09-20 07:29:11'),
(1682, 'en', 'about', 'About', '2021-02-07 02:26:32', '2021-09-20 07:29:11'),
(1686, 'en', 'total_products', 'Total Products', '2021-02-07 02:26:32', '2021-09-20 07:29:11'),
(1687, 'en', 'total_sold_amount', 'Total Sold Amount', '2021-02-07 02:26:32', '2021-09-20 07:29:11'),
(1688, 'en', 'wallet_balance', 'Wallet Balance', '2021-02-07 02:26:32', '2021-09-20 07:29:11'),
(1689, 'en', 'cookies_agreement', 'Cookies Agreement', '2021-02-07 03:50:48', '2021-09-20 07:29:11'),
(1690, 'en', 'cookies_agreement_text', 'Cookies Agreement Text', '2021-02-07 03:50:48', '2021-09-20 07:29:11'),
(1691, 'en', 'show_cookies_agreement', 'Show Cookies Agreement?', '2021-02-07 03:50:48', '2021-09-20 07:29:11'),
(1692, 'en', 'custom_script', 'Custom Script', '2021-02-07 03:50:48', '2021-09-20 07:29:11'),
(1693, 'en', 'header_custom_script__before_head', 'Header custom script - before </head>', '2021-02-07 03:50:48', '2021-09-20 07:29:11'),
(1694, 'en', 'write_script_with_script_tag', 'Write script with <script> tag', '2021-02-07 03:50:48', '2021-09-20 07:29:11'),
(1695, 'en', 'footer_custom_script__before_body', 'Footer custom script - before </body>', '2021-02-07 03:50:48', '2021-09-20 07:29:11'),
(1696, 'en', 'category_has_been_inserted_successfully', 'Category has been inserted successfully', '2021-02-07 04:00:49', '2021-09-20 07:29:11'),
(1697, 'en', 'all_flash_deals', 'All Flash Deals', '2021-02-07 07:05:16', '2021-09-20 07:29:11'),
(1698, 'en', 'create_new_flash_deal', 'Create New Flash Deal', '2021-02-07 07:05:16', '2021-09-20 07:29:11'),
(1699, 'en', 'ffffff', '#FFFFFF', '2021-02-07 07:05:19', '2021-09-20 07:29:11'),
(1700, 'en', 'this_image_is_shown_as_cover_banner_in_flash_deal_details_page', 'This image is shown as cover banner in flash deal details page.', '2021-02-07 07:05:19', '2021-09-20 07:29:11'),
(1701, 'en', 'flash_deal_has_been_inserted_successfully', 'Flash Deal has been inserted successfully', '2021-02-07 07:07:14', '2021-09-20 07:29:11'),
(1702, 'en', 'flash_deal_status_updated_successfully', 'Flash deal status updated successfully', '2021-02-07 07:07:32', '2021-09-20 07:29:11'),
(1703, 'en', 'flash_deal_has_been_updated_successfully', 'Flash Deal has been updated successfully', '2021-02-08 06:22:46', '2021-09-20 07:29:11'),
(1704, 'en', 'update_language_info', 'update Language Info', '2021-02-09 06:28:04', '2021-09-20 07:29:11'),
(1705, 'en', 'language_has_been_updated_successfully', 'Language has been updated successfully', '2021-02-09 06:28:10', '2021-09-20 07:29:11'),
(1706, 'en', 'type_key__enter', 'Type key & Enter', '2021-02-09 06:29:56', '2021-09-20 07:29:11'),
(1707, 'en', 'translations_updated_for_', 'Translations updated for', '2021-02-09 06:31:12', '2021-09-20 07:29:11'),
(2936, 'en', 'language_has_been_inserted_successfully', 'Language has been inserted successfully', '2021-02-09 06:54:07', '2021-09-20 07:29:15'),
(25059, 'en', 'verify_now', 'Verify Now', '2021-02-11 06:00:02', '2021-09-20 07:30:23'),
(25061, 'en', 'bkash_credential', 'Bkash Credential', '2021-02-11 06:50:42', '2021-09-20 07:30:23'),
(25062, 'en', 'bkash_checkout_app_key', 'BKASH CHECKOUT APP KEY', '2021-02-11 06:50:42', '2021-09-20 07:30:23'),
(25063, 'en', 'bkash_checkout_app_secret', 'BKASH CHECKOUT APP SECRET', '2021-02-11 06:50:42', '2021-09-20 07:30:23'),
(25064, 'en', 'bkash_checkout_user_name', 'BKASH CHECKOUT USER NAME', '2021-02-11 06:50:42', '2021-09-20 07:30:23'),
(25065, 'en', 'bkash_checkout_password', 'BKASH CHECKOUT PASSWORD', '2021-02-11 06:50:42', '2021-09-20 07:30:23'),
(25066, 'en', 'bkash_sandbox_mode', 'Bkash Sandbox Mode', '2021-02-11 06:50:42', '2021-09-20 07:30:23'),
(25067, 'en', 'nagad_credential', 'Nagad Credential', '2021-02-11 06:50:42', '2021-09-20 07:30:23'),
(25068, 'en', 'nagad_mode', 'NAGAD MODE', '2021-02-11 06:50:42', '2021-09-20 07:30:23'),
(25069, 'en', 'nagad_merchant_id', 'NAGAD MERCHANT ID', '2021-02-11 06:50:42', '2021-09-20 07:30:23'),
(25070, 'en', 'nagad_merchant_number', 'NAGAD MERCHANT NUMBER', '2021-02-11 06:50:43', '2021-09-20 07:30:23'),
(25071, 'en', 'nagad_pg_public_key', 'NAGAD PG PUBLIC KEY', '2021-02-11 06:50:43', '2021-09-20 07:30:23'),
(25072, 'en', 'nagad_merchant_private_key', 'NAGAD MERCHANT PRIVATE KEY', '2021-02-11 06:50:43', '2021-09-20 07:30:23'),
(25079, 'en', 'instamojo', 'Instamojo', '2021-02-11 06:53:34', '2021-09-20 07:30:23'),
(25080, 'en', 'nagad', 'Nagad', '2021-02-11 06:53:35', '2021-09-20 07:30:23'),
(25081, 'en', 'bkash', 'Bkash', '2021-02-11 06:53:35', '2021-09-20 07:30:23'),
(25082, 'en', 'your_order_has_been_placed', 'Your order has been placed', '2021-02-11 06:55:22', '2021-09-20 07:30:23'),
(25083, 'en', 'your_order_has_been_placed_successfully', 'Your order has been placed successfully', '2021-02-11 06:55:22', '2021-09-20 07:30:23'),
(25084, 'en', 'product_image', 'Product Image', '2021-02-11 06:56:47', '2021-09-20 07:30:23'),
(25085, 'en', 'add_to_compare', 'Add to compare', '2021-02-12 15:42:01', '2021-09-20 07:30:23'),
(25086, 'en', 'step_1', 'Step 1', '2021-02-13 03:34:49', '2021-09-20 07:30:23'),
(25087, 'en', 'download_the_skeleton_file_and_fill_it_with_proper_data', 'Download the skeleton file and fill it with proper data', '2021-02-13 03:34:49', '2021-09-20 07:30:23'),
(25088, 'en', 'you_can_download_the_example_file_to_understand_how_the_data_must_be_filled', 'You can download the example file to understand how the data must be filled', '2021-02-13 03:34:49', '2021-09-20 07:30:23'),
(25089, 'en', 'once_you_have_downloaded_and_filled_the_skeleton_file_upload_it_in_the_form_below_and_submit', 'Once you have downloaded and filled the skeleton file, upload it in the form below and submit', '2021-02-13 03:34:49', '2021-09-20 07:30:23'),
(25090, 'en', 'after_uploading_products_you_need_to_edit_them_and_set_products_images_and_choices', 'After uploading products you need to edit them and set product\'s images and choices', '2021-02-13 03:34:49', '2021-09-20 07:30:23'),
(25091, 'en', 'step_2', 'Step 2', '2021-02-13 03:34:49', '2021-09-20 07:30:23'),
(25092, 'en', 'category_and_brand_should_be_in_numerical_id', 'Category and Brand should be in numerical id', '2021-02-13 03:34:49', '2021-09-20 07:30:23'),
(25093, 'en', 'you_can_download_the_pdf_to_get_category_and_brand_id', 'You can download the pdf to get Category and Brand id', '2021-02-13 03:34:49', '2021-09-20 07:30:23'),
(25094, 'en', 'upload_product_file', 'Upload Product File', '2021-02-13 03:34:49', '2021-09-20 07:30:23'),
(25099, 'en', 'product_has_been_duplicated_successfully', 'Product has been duplicated successfully', '2021-02-14 04:24:28', '2021-09-20 07:30:23'),
(25100, 'en', 'filter_by_date', 'Filter by date', '2021-02-14 04:26:26', '2021-09-20 07:30:23'),
(25101, 'en', '1_category_and_brand_should_be_in_numerical_id', '1. Category and Brand should be in numerical id.', '2021-02-14 04:47:38', '2021-09-20 07:30:23'),
(25102, 'en', '2_you_can_download_the_pdf_to_get_category_and_brand_id', '2. You can download the pdf to get Category and Brand id.', '2021-02-14 04:47:38', '2021-09-20 07:30:23'),
(25103, 'en', 'payment_completed', 'Payment completed', '2021-02-14 05:00:40', '2021-09-20 07:30:23'),
(25104, 'en', 'contact', 'Contact', '2021-02-14 05:01:48', '2021-09-20 07:30:23'),
(25105, 'en', 'order_status_has_been_updated', 'Order status has been updated', '2021-02-14 05:01:48', '2021-09-20 07:30:23'),
(25106, 'en', 'review_has_been_submitted_successfully', 'Review has been submitted successfully', '2021-02-14 05:06:58', '2021-09-20 07:30:23'),
(25108, 'en', 'txn_code', 'Txn Code', '2021-02-14 05:53:05', '2021-09-20 07:30:23'),
(25109, 'en', 'clear_due', 'Clear due', '2021-02-14 05:53:05', '2021-09-20 07:30:23'),
(25110, 'en', 'product_wish_report', 'Product Wish Report', '2021-02-14 06:00:21', '2021-09-20 07:30:23'),
(25111, 'en', 'number_of_wish', 'Number of Wish', '2021-02-14 06:00:21', '2021-09-20 07:30:23'),
(25112, 'en', 'all_customers', 'All Customers', '2021-02-14 06:02:18', '2021-09-20 07:30:23'),
(25113, 'en', 'type_email_or_name__enter', 'Type email or name & Enter', '2021-02-14 06:02:18', '2021-09-20 07:30:23'),
(25114, 'en', 'package', 'Package', '2021-02-14 06:02:18', '2021-09-20 07:30:23'),
(25115, 'en', 'log_in_as_this_customer', 'Log in as this Customer', '2021-02-14 06:02:18', '2021-09-20 07:30:23'),
(25116, 'en', 'ban_this_customer', 'Ban this Customer', '2021-02-14 06:02:18', '2021-09-20 07:30:23'),
(25117, 'en', 'do_you_really_want_to_ban_this_customer', 'Do you really want to ban this Customer?', '2021-02-14 06:02:18', '2021-09-20 07:30:23'),
(25118, 'en', 'do_you_really_want_to_unban_this_customer', 'Do you really want to unban this Customer?', '2021-02-14 06:02:19', '2021-09-20 07:30:23'),
(25119, 'en', 'ticket_has_been_sent_successfully', 'Ticket has been sent successfully', '2021-02-14 06:24:25', '2021-09-20 07:30:23'),
(25120, 'en', 'send_reply', 'Send Reply', '2021-02-14 06:24:34', '2021-09-20 07:30:23'),
(25121, 'en', 'recharge_wallet', 'Recharge Wallet', '2021-02-14 07:01:14', '2021-09-20 07:30:23'),
(25122, 'en', 'wallet_recharge_history', 'Wallet recharge history', '2021-02-14 07:01:15', '2021-09-20 07:30:23'),
(25123, 'en', 'offline_recharge_wallet', 'Offline Recharge Wallet', '2021-02-14 07:01:15', '2021-09-20 07:30:23'),
(25129, 'en', 'create_new_package', 'Create New Package', '2021-02-15 05:15:42', '2021-09-20 07:30:23'),
(25130, 'en', 'package_purchasing_successful', 'Package purchasing successful', '2021-02-15 05:26:45', '2021-09-20 07:30:23'),
(25131, 'en', 'product_upload_remaining', 'Product Upload Remaining', '2021-02-15 05:26:46', '2021-09-20 07:30:23'),
(25132, 'en', 'current_package', 'Current Package', '2021-02-15 05:26:46', '2021-09-20 07:30:23'),
(25133, 'en', 'select_a_condition', 'Select a condition', '2021-02-15 05:26:55', '2021-09-20 07:30:23'),
(25134, 'en', 'uploaded_by', 'Uploaded By', '2021-02-15 05:40:07', '2021-09-20 07:30:23'),
(25135, 'en', 'customer_status', 'Customer Status', '2021-02-15 05:40:07', '2021-09-20 07:30:23'),
(25136, 'en', 'unpublished', 'UNPUBLISHED', '2021-02-15 05:40:07', '2021-09-20 07:30:23'),
(26443, 'en', 'sendmail', 'Sendmail', '2021-02-16 07:56:29', '2021-09-20 07:30:27'),
(26444, 'en', 'mailgun', 'Mailgun', '2021-02-16 07:56:30', '2021-09-20 07:30:27'),
(26445, 'en', 'mail_host', 'MAIL HOST', '2021-02-16 07:56:30', '2021-09-20 07:30:27'),
(26446, 'en', 'mail_port', 'MAIL PORT', '2021-02-16 07:56:30', '2021-09-20 07:30:27'),
(26447, 'en', 'mail_username', 'MAIL USERNAME', '2021-02-16 07:56:30', '2021-09-20 07:30:27'),
(26448, 'en', 'mail_password', 'MAIL PASSWORD', '2021-02-16 07:56:30', '2021-09-20 07:30:27'),
(26449, 'en', 'mail_encryption', 'MAIL ENCRYPTION', '2021-02-16 07:56:30', '2021-09-20 07:30:27'),
(26450, 'en', 'mail_from_address', 'MAIL FROM ADDRESS', '2021-02-16 07:56:30', '2021-09-20 07:30:27'),
(26451, 'en', 'mail_from_name', 'MAIL FROM NAME', '2021-02-16 07:56:31', '2021-09-20 07:30:27'),
(26452, 'en', 'mailgun_domain', 'MAILGUN DOMAIN', '2021-02-16 07:56:31', '2021-09-20 07:30:27'),
(26453, 'en', 'mailgun_secret', 'MAILGUN SECRET', '2021-02-16 07:56:31', '2021-09-20 07:30:27'),
(26454, 'en', 'save_configuration', 'Save Configuration', '2021-02-16 07:56:31', '2021-09-20 07:30:27'),
(26455, 'en', 'test_smtp_configuration', 'Test SMTP configuration', '2021-02-16 07:56:31', '2021-09-20 07:30:27'),
(26456, 'en', 'enter_your_email_address', 'Enter your email address', '2021-02-16 07:56:31', '2021-09-20 07:30:27'),
(26457, 'en', 'send_test_email', 'Send test email', '2021-02-16 07:56:31', '2021-09-20 07:30:27'),
(26458, 'en', 'instruction', 'Instruction', '2021-02-16 07:56:31', '2021-09-20 07:30:27'),
(26459, 'en', 'please_be_carefull_when_you_are_configuring_smtp_for_incorrect_configuration_you_will_get_error_at_the_time_of_order_place_new_registration_sending_newsletter', 'Please be carefull when you are configuring SMTP. For incorrect configuration you will get error at the time of order place, new registration, sending newsletter.', '2021-02-16 07:56:31', '2021-09-20 07:30:27'),
(26460, 'en', 'for_nonssl', 'For Non-SSL', '2021-02-16 07:56:31', '2021-09-20 07:30:27'),
(26461, 'en', 'select_sendmail_for_mail_driver_if_you_face_any_issue_after_configuring_smtp_as_mail_driver_', 'Select sendmail for Mail Driver if you face any issue after configuring smtp as Mail Driver ', '2021-02-16 07:56:32', '2021-09-20 07:30:27'),
(26462, 'en', 'set_mail_host_according_to_your_server_mail_client_manual_settings', 'Set Mail Host according to your server Mail Client Manual Settings', '2021-02-16 07:56:32', '2021-09-20 07:30:27'),
(26463, 'en', 'set_mail_port_as_587', 'Set Mail port as 587', '2021-02-16 07:56:32', '2021-09-20 07:30:27'),
(26464, 'en', 'set_mail_encryption_as_ssl_if_you_face_issue_with_tls', 'Set Mail Encryption as ssl if you face issue with tls', '2021-02-16 07:56:32', '2021-09-20 07:30:27'),
(26465, 'en', 'for_ssl', 'For SSL', '2021-02-16 07:56:32', '2021-09-20 07:30:27'),
(26466, 'en', 'set_mail_port_as_465', 'Set Mail port as 465', '2021-02-16 07:56:32', '2021-09-20 07:30:27'),
(26467, 'en', 'set_mail_encryption_as_ssl', 'Set Mail Encryption as ssl', '2021-02-16 07:56:32', '2021-09-20 07:30:27'),
(26468, 'en', 'installupdate_addon', 'Install/Update Addon', '2021-02-18 05:50:31', '2021-09-20 07:30:27'),
(26469, 'en', 'no_addon_installed', 'No Addon Installed', '2021-02-18 05:50:31', '2021-09-20 07:30:27'),
(26470, 'en', 'blog_system', 'Blog System', '2021-02-18 10:01:49', '2021-09-20 07:30:27'),
(26471, 'en', 'all_posts', 'All Posts', '2021-02-18 10:01:49', '2021-09-20 07:30:27'),
(26472, 'en', 'facebook_comment', 'Facebook Comment', '2021-02-18 10:01:50', '2021-09-20 07:30:27'),
(26473, 'en', 'add_new_post', 'Add New Post', '2021-02-18 10:02:55', '2021-09-20 07:30:27'),
(26474, 'en', 'all_blog_posts', 'All blog posts', '2021-02-18 10:02:55', '2021-09-20 07:30:27'),
(26475, 'en', 'short_description', 'Short Description', '2021-02-18 10:02:55', '2021-09-20 07:30:27'),
(26476, 'en', 'change_blog_status_successfully', 'Change blog status successfully', '2021-02-18 10:02:56', '2021-09-20 07:30:27'),
(26477, 'en', 'blog_information', 'Blog Information', '2021-02-18 10:02:58', '2021-09-20 07:30:27'),
(26478, 'en', 'blog_title', 'Blog Title', '2021-02-18 10:02:58', '2021-09-20 07:30:27'),
(26479, 'en', 'meta_keywords', 'Meta Keywords', '2021-02-18 10:02:59', '2021-09-20 07:30:27'),
(26480, 'en', 'header_nav_menu', 'Header Nav Menu', '2021-02-18 10:04:04', '2021-09-20 07:30:27'),
(26481, 'en', 'link_with', 'Link with', '2021-02-18 10:04:04', '2021-09-20 07:30:27'),
(26482, 'en', 'blog', 'Blog', '2021-02-18 10:11:56', '2021-09-20 07:30:27'),
(26483, 'en', 'all_blog_categories', 'All Blog Categories', '2021-02-18 10:17:26', '2021-09-20 07:30:27'),
(26484, 'en', 'blog_categories', 'Blog Categories', '2021-02-18 10:17:26', '2021-09-20 07:30:27'),
(26485, 'en', 'blog_category_information', 'Blog Category Information', '2021-02-19 04:04:31', '2021-09-20 07:30:27'),
(26486, 'en', 'blog_category_has_been_created_successfully', 'Blog category has been created successfully', '2021-02-19 04:05:13', '2021-09-20 07:30:27'),
(26487, 'en', 'blog_post_has_been_created_successfully', 'Blog post has been created successfully', '2021-02-19 04:15:31', '2021-09-20 07:30:27'),
(26488, 'en', 'blog_post_has_been_updated_successfully', 'Blog post has been updated successfully', '2021-02-19 04:32:34', '2021-09-20 07:30:27'),
(26489, 'en', 'blog_category_has_been_updated_successfully', 'Blog category has been updated successfully', '2021-02-19 04:52:22', '2021-09-20 07:30:27'),
(26490, 'en', 'installupdate', 'Install/Update', '2021-02-22 04:00:43', '2021-09-20 07:30:27'),
(26493, 'en', 'addon_nstalled_successfully', 'Addon nstalled successfully', '2021-02-23 02:22:29', '2021-09-20 07:30:27'),
(26494, 'en', 'approved_refunds', 'Approved Refunds', '2021-02-23 02:23:39', '2021-09-20 07:30:27'),
(26495, 'en', 'rejected_refunds', 'rejected Refunds', '2021-02-23 02:23:40', '2021-09-20 07:30:27'),
(26496, 'en', 'affiliate_logs', 'Affiliate Logs', '2021-02-23 02:24:06', '2021-09-20 07:30:27'),
(26497, 'en', 'african_payment_gateway_addon', 'African Payment Gateway Addon', '2021-02-23 02:24:21', '2021-09-20 07:30:27'),
(26498, 'en', 'african_pg_configurations', 'African PG Configurations', '2021-02-23 02:24:21', '2021-09-20 07:30:27'),
(26499, 'en', 'set_african_pg_credentials', 'Set African PG Credentials', '2021-02-23 02:24:21', '2021-09-20 07:30:27'),
(26500, 'en', 'at_the_very_bottom_you_can_find_the_facebook_page_id', 'At the very bottom, you can find the “Facebook Page ID”', '2021-02-23 02:25:36', '2021-09-20 07:30:27'),
(26501, 'en', 'go_to_settings_of_your_page_and_find_the_option_of_advance_messaging', 'Go to Settings of your page and find the option of \"Advance Messaging\"', '2021-02-23 02:25:36', '2021-09-20 07:30:27'),
(26502, 'en', 'scroll_down_that_page_and_you_will_get_white_listed_domain', 'Scroll down that page and you will get \"white listed domain\"', '2021-02-23 02:25:36', '2021-09-20 07:30:27'),
(26503, 'en', 'paystack_currency_code', 'PAYSTACK CURRENCY CODE', '2021-02-23 02:26:16', '2021-09-20 07:30:27'),
(26504, 'en', 'mpesa_activation', 'MPesa Activation', '2021-02-23 02:26:48', '2021-09-20 07:30:27'),
(26505, 'en', 'you_need_to_configure_mpesa_correctly_to_enable_this_feature', 'You need to configure Mpesa correctly to enable this feature', '2021-02-23 02:26:48', '2021-09-20 07:30:27'),
(26506, 'en', 'flutterwave_activation', 'flutterwave Activation', '2021-02-23 02:26:48', '2021-09-20 07:30:27'),
(26507, 'en', 'you_need_to_configure_flutterwave_correctly_to_enable_this_feature', 'You need to configure flutterwave correctly to enable this feature', '2021-02-23 02:26:49', '2021-09-20 07:30:27'),
(26508, 'en', 'payfast_activation', 'Payfast Activation', '2021-02-23 02:26:49', '2021-09-20 07:30:27'),
(26509, 'en', 'you_need_to_configure_payfast_correctly_to_enable_this_feature', 'You need to configure payfast correctly to enable this feature', '2021-02-23 02:26:49', '2021-09-20 07:30:27'),
(26510, 'en', 'mpesa_username', 'MPESA USERNAME', '2021-02-23 02:26:59', '2021-09-20 07:30:27'),
(26511, 'en', 'mpesa_username', 'MPESA_USERNAME', '2021-02-23 02:26:59', '2021-09-20 07:30:27'),
(26512, 'en', 'mpesa_password', 'MPESA PASSWORD', '2021-02-23 02:26:59', '2021-09-20 07:30:27'),
(26513, 'en', 'mpesa_password', 'MPESA_PASSWORD', '2021-02-23 02:26:59', '2021-09-20 07:30:27'),
(26514, 'en', 'mpesa_passkey', 'MPESA PASSKEY', '2021-02-23 02:26:59', '2021-09-20 07:30:27'),
(26515, 'en', 'mpesa_passkey', 'MPESA_PASSKEY', '2021-02-23 02:26:59', '2021-09-20 07:30:27'),
(26516, 'en', 'payfast_credential', 'PAYFAST Credential', '2021-02-23 02:26:59', '2021-09-20 07:30:27'),
(26517, 'en', 'payfast_merchant_id', 'PAYFAST_MERCHANT_ID', '2021-02-23 02:26:59', '2021-09-20 07:30:28'),
(26518, 'en', 'payfast_merchant_key', 'PAYFAST_MERCHANT_KEY', '2021-02-23 02:27:00', '2021-09-20 07:30:28'),
(26519, 'en', 'payfast_sandbox_mode', 'PAYFAST Sandbox Mode', '2021-02-23 02:27:00', '2021-09-20 07:30:28'),
(26520, 'en', 'google_login_credential', 'Google Login Credential', '2021-02-23 02:27:51', '2021-09-20 07:30:28'),
(26521, 'en', 'client_id', 'Client ID', '2021-02-23 02:27:51', '2021-09-20 07:30:28'),
(26522, 'en', 'google_client_id', 'Google Client ID', '2021-02-23 02:27:51', '2021-09-20 07:30:28'),
(26523, 'en', 'client_secret', 'Client Secret', '2021-02-23 02:27:51', '2021-09-20 07:30:28'),
(26524, 'en', 'google_client_secret', 'Google Client Secret', '2021-02-23 02:27:51', '2021-09-20 07:30:28'),
(26525, 'en', 'facebook_login_credential', 'Facebook Login Credential', '2021-02-23 02:27:51', '2021-09-20 07:30:28'),
(26526, 'en', 'app_id', 'App ID', '2021-02-23 02:27:51', '2021-09-20 07:30:28'),
(26527, 'en', 'facebook_client_id', 'Facebook Client ID', '2021-02-23 02:27:51', '2021-09-20 07:30:28'),
(26528, 'en', 'app_secret', 'App Secret', '2021-02-23 02:27:51', '2021-09-20 07:30:28'),
(26529, 'en', 'facebook_client_secret', 'Facebook Client Secret', '2021-02-23 02:27:51', '2021-09-20 07:30:28'),
(26530, 'en', 'twitter_login_credential', 'Twitter Login Credential', '2021-02-23 02:27:51', '2021-09-20 07:30:28'),
(26531, 'en', 'twitter_client_id', 'Twitter Client ID', '2021-02-23 02:27:52', '2021-09-20 07:30:28'),
(26532, 'en', 'twitter_client_secret', 'Twitter Client Secret', '2021-02-23 02:27:52', '2021-09-20 07:30:28'),
(26533, 'en', 'point_convert_rate_has_been_updated_successfully', 'Point convert rate has been updated successfully', '2021-02-23 02:30:21', '2021-09-20 07:30:28'),
(26534, 'en', 'owner', 'Owner', '2021-02-23 02:30:24', '2021-09-20 07:30:28'),
(26535, 'en', 'set_any_specific_point_for_those_products_what_are_between_minprice_and_maxprice_minprice_should_be_less_than_maxprice', 'Set any specific point for those products what are between Min-price and Max-price. Min-price should be less than Max-price', '2021-02-23 02:30:25', '2021-09-20 07:30:28'),
(26536, 'en', 'set_point_for_product', 'Set Point for Product', '2021-02-23 02:30:31', '2021-09-20 07:30:28'),
(26537, 'en', 'set_point', 'Set Point', '2021-02-23 02:30:31', '2021-09-20 07:30:28'),
(26538, 'en', 'point_has_been_updated_successfully', 'Point has been updated successfully', '2021-02-23 02:30:37', '2021-09-20 07:30:28'),
(26539, 'en', 'point_has_been_inserted_successfully_for_', 'Point has been inserted successfully for ', '2021-02-23 02:31:06', '2021-09-20 07:30:28'),
(26540, 'en', '_products', ' products', '2021-02-23 02:31:06', '2021-09-20 07:30:28'),
(26541, 'en', 'customer_name', 'Customer Name', '2021-02-23 02:32:42', '2021-09-20 07:30:28'),
(26547, 'en', 'reject_refund_request_', 'Reject Refund Request !', '2021-02-23 02:33:49', '2021-09-20 07:30:28'),
(26548, 'en', 'reject_reason', 'Reject Reason', '2021-02-23 02:33:49', '2021-09-20 07:30:28'),
(26549, 'en', 'submit', 'Submit', '2021-02-23 02:33:49', '2021-09-20 07:30:28'),
(26550, 'en', 'approval_has_been_done_successfully', 'Approval has been done successfully', '2021-02-23 02:33:49', '2021-09-20 07:30:28'),
(26551, 'en', 'refund_has_been_sent_successfully', 'Refund has been sent successfully', '2021-02-23 02:33:49', '2021-09-20 07:30:28'),
(26552, 'en', 'rejected_request', 'Rejected Request', '2021-02-23 02:34:05', '2021-09-20 07:30:28'),
(26553, 'en', 'refund_request_reject_reason', 'Refund Request Reject Reason', '2021-02-23 02:34:05', '2021-09-20 07:30:28'),
(26554, 'en', 'approved_request', 'Approved Request', '2021-02-23 02:34:08', '2021-09-20 07:30:28'),
(26555, 'en', 'mpesa', 'mpesa', '2021-02-23 02:35:33', '2021-02-23 02:35:33'),
(26556, 'en', 'flutterwave', 'flutterwave', '2021-02-23 02:35:33', '2021-02-23 02:35:33'),
(26557, 'en', 'payfast', 'payfast', '2021-02-23 02:35:33', '2021-02-23 02:35:33'),
(26558, 'en', 'this_addon_is_updated_successfully', 'This addon is updated successfully', '2021-02-23 02:40:18', '2021-09-20 07:30:28'),
(26559, 'en', 'nonrefundable', 'Non-refundable', '2021-02-23 15:06:44', '2021-09-20 07:30:28'),
(26560, 'en', 'offline_recharge_has_been_done_please_wait_for_response', 'Offline Recharge has been done. Please wait for response.', '2021-02-23 15:08:43', '2021-09-20 07:30:28'),
(26561, 'en', 'use_phone_instead', 'Use Phone Instead', '2021-02-23 15:13:57', '2021-09-20 07:30:28'),
(26562, 'en', 'phone_verification', 'Phone Verification', '2021-02-23 15:14:25', '2021-09-20 07:30:28'),
(26563, 'en', 'resend_code', 'Resend Code', '2021-02-23 15:14:25', '2021-09-20 07:30:28'),
(26564, 'en', 'staff_information', 'Staff Information', '2021-02-25 15:53:40', '2021-09-20 07:30:28'),
(26565, 'en', 'staff_has_been_inserted_successfully', 'Staff has been inserted successfully', '2021-02-25 15:54:00', '2021-09-20 07:30:28'),
(26566, 'en', 'role_information', 'Role Information', '2021-02-25 16:01:25', '2021-09-20 07:30:28'),
(26567, 'en', 'permissions', 'Permissions', '2021-02-25 16:01:25', '2021-09-20 07:30:28'),
(26568, 'en', 'role_has_been_updated_successfully', 'Role has been updated successfully', '2021-02-25 16:01:46', '2021-09-20 07:30:28'),
(26569, 'en', 'update_your_system', 'Update your system', '2021-02-25 16:03:26', '2021-09-20 07:30:28'),
(26570, 'en', 'current_verion', 'Current verion', '2021-02-25 16:03:26', '2021-09-20 07:30:28'),
(26571, 'en', 'make_sure_your_server_has_matched_with_all_requirements', 'Make sure your server has matched with all requirements.', '2021-02-25 16:03:26', '2021-09-20 07:30:28'),
(26572, 'en', 'check_here', 'Check Here', '2021-02-25 16:03:26', '2021-09-20 07:30:28'),
(26573, 'en', 'download_latest_version_from_codecanyon', 'Download latest version from codecanyon.', '2021-02-25 16:03:26', '2021-09-20 07:30:28'),
(26574, 'en', 'extract_downloaded_zip_you_will_find_updateszip_file_in_those_extraced_files', 'Extract downloaded zip. You will find updates.zip file in those extraced files.', '2021-02-25 16:03:27', '2021-09-20 07:30:28'),
(26575, 'en', 'upload_that_zip_file_here_and_click_update_now', 'Upload that zip file here and click update now.', '2021-02-25 16:03:27', '2021-09-20 07:30:28'),
(26576, 'en', 'if_you_are_using_any_addon_make_sure_to_update_those_addons_after_updating', 'If you are using any addon make sure to update those addons after updating.', '2021-02-25 16:03:27', '2021-09-20 07:30:28'),
(26577, 'en', 'package_duration', 'Package Duration', '2021-02-25 23:10:17', '2021-09-20 07:30:28'),
(26578, 'en', 'digital_product_upload_remaining', 'Digital Product Upload Remaining', '2021-02-25 23:12:10', '2021-09-20 07:30:28'),
(26579, 'en', 'package_expires_at', 'Package Expires at', '2021-02-25 23:12:10', '2021-09-20 07:30:28'),
(26580, 'en', 'ok_i_understood', 'Ok. I Understood', '2021-02-27 16:56:27', '2021-09-20 07:30:28'),
(26581, 'en', 'commission_history', 'Commission History', '2021-03-07 05:40:47', '2021-09-20 07:30:28'),
(26582, 'en', 'vat__tax', 'Vat & TAX', '2021-03-07 05:40:48', '2021-09-20 07:30:28'),
(26583, 'en', 'info', 'Info', '2021-03-07 05:40:54', '2021-09-20 07:30:28'),
(26584, 'en', 'product_wise_shipping', 'Product Wise Shipping', '2021-03-07 05:42:45', '2021-09-20 07:30:28'),
(26585, 'en', 'low_stock_quantity_warning', 'Low Stock Quantity Warning', '2021-03-07 05:42:45', '2021-09-20 07:30:28'),
(26586, 'en', 'stock_visibility_state', 'Stock Visibility State', '2021-03-07 05:42:45', '2021-09-20 07:30:28'),
(26587, 'en', 'show_stock_quantity', 'Show Stock Quantity', '2021-03-07 05:42:45', '2021-09-20 07:30:28'),
(26588, 'en', 'show_stock_with_text_only', 'Show Stock With Text Only', '2021-03-07 05:42:45', '2021-09-20 07:30:28'),
(26589, 'en', 'hide_stock', 'Hide Stock', '2021-03-07 05:42:46', '2021-09-20 07:30:28'),
(26590, 'en', 'flash_deal', 'Flash Deal', '2021-03-07 05:42:46', '2021-09-20 07:30:28'),
(26591, 'en', 'add_to_flash', 'Add To Flash', '2021-03-07 05:42:46', '2021-09-20 07:30:28'),
(26592, 'en', 'estimate_shipping_time', 'Estimate Shipping Time', '2021-03-07 05:42:46', '2021-09-20 07:30:28'),
(26593, 'en', 'shipping_days', 'Shipping Days', '2021-03-07 05:42:46', '2021-09-20 07:30:28'),
(26594, 'en', 'save_as_draft', 'Save As Draft', '2021-03-07 05:42:46', '2021-09-20 07:30:28'),
(26595, 'en', 'save__unpublish', 'Save & Unpublish', '2021-03-07 05:42:46', '2021-09-20 07:30:28'),
(26596, 'en', 'save__publish', 'Save & Publish', '2021-03-07 05:42:46', '2021-09-20 07:30:28'),
(26597, 'en', 'all_cities', 'All cities', '2021-03-07 05:43:04', '2021-09-20 07:30:28'),
(26598, 'en', 'cities', 'Cities', '2021-03-07 05:43:04', '2021-09-20 07:30:28'),
(26599, 'en', 'cost', 'Cost', '2021-03-07 05:43:04', '2021-09-20 07:30:28'),
(26600, 'en', 'add_new_city', 'Add New city', '2021-03-07 05:43:04', '2021-09-20 07:30:28'),
(26601, 'en', '_pts', ' pts', '2021-03-08 04:54:26', '2021-09-20 07:30:28'),
(26602, 'en', 'no', 'No', '2021-03-08 04:54:26', '2021-09-20 07:30:28'),
(26603, 'en', 'convert_now', 'Convert Now', '2021-03-08 04:54:26', '2021-09-20 07:30:28'),
(26604, 'en', 'affiliate_balance', 'Affiliate Balance', '2021-03-08 04:56:22', '2021-09-20 07:30:28'),
(26605, 'en', 'configure_payout', 'Configure Payout', '2021-03-08 04:56:22', '2021-09-20 07:30:28'),
(26606, 'en', 'affiliate_withdraw_request', 'Affiliate Withdraw Request', '2021-03-08 04:56:22', '2021-09-20 07:30:28'),
(26607, 'en', 'copy_url', 'Copy Url', '2021-03-08 04:56:22', '2021-09-20 07:30:28'),
(26608, 'en', 'affiliate_earning_history', 'Affiliate Earning History', '2021-03-08 04:56:22', '2021-09-20 07:30:28'),
(26609, 'en', 'referral_user', 'Referral User', '2021-03-08 04:56:22', '2021-09-20 07:30:28'),
(26610, 'en', 'referral_type', 'Referral Type', '2021-03-08 04:56:22', '2021-09-20 07:30:28'),
(26611, 'en', 'payment_settings', 'Payment Settings', '2021-03-08 04:56:50', '2021-09-20 07:30:28'),
(26613, 'en', 'bank_informations', 'Bank Informations', '2021-03-08 04:56:50', '2021-09-20 07:30:28'),
(26614, 'en', 'acc_no_bank_name_etc', 'Acc. No, Bank Name etc', '2021-03-08 04:56:50', '2021-09-20 07:30:28'),
(26615, 'en', 'update_payment_settings', 'Update Payment Settings', '2021-03-08 04:56:50', '2021-09-20 07:30:28'),
(26616, 'en', 'affiliate_payment_settings_has_been_updated_successfully', 'Affiliate payment settings has been updated successfully', '2021-03-08 04:56:53', '2021-09-20 07:30:28'),
(26617, 'en', 'new_withdraw_request_created_successfully', 'New withdraw request created successfully', '2021-03-08 04:57:38', '2021-09-20 07:30:28'),
(26618, 'en', 'affiliate_withdraw_request_history', 'Affiliate withdraw request history', '2021-03-08 04:57:39', '2021-09-20 07:30:28'),
(26619, 'en', 'affiliate_payment_history', 'Affiliate payment history', '2021-03-08 05:00:42', '2021-09-20 07:30:28'),
(26620, 'en', 'default', 'Default', '2021-03-08 05:06:37', '2021-09-20 07:30:28'),
(26621, 'en', 'area_wise_flat_shipping_cost', 'Area Wise Flat Shipping Cost', '2021-03-08 05:46:02', '2021-09-20 07:30:28'),
(26623, 'en', 'area_wise_flat_shipping_cost_calulation_fixed_rate_for_each_area_if_customers_purchase_multiple_products_from_one_seller_shipping_cost_is_calculated_by_the_customer_shipping_area_to_configure_area_wise_shipping_cost_go_to_', 'Area Wise Flat Shipping Cost calulation: Fixed rate for each area. If customers purchase multiple products from one seller shipping cost is calculated by the customer shipping area. To configure area wise shipping cost go to ', '2021-03-08 05:46:03', '2021-09-20 07:30:28'),
(26624, 'en', '1_flat_rate_shipping_cost_is_applicable_if_flat_rate_shipping_is_enabled', '1. Flat rate shipping cost is applicable if Flat rate shipping is enabled.', '2021-03-08 05:46:03', '2021-09-20 07:30:28'),
(26625, 'en', '1_shipping_cost_for_admin_is_applicable_if_seller_wise_shipping_cost_is_enabled', '1. Shipping cost for admin is applicable if Seller wise shipping cost is enabled.', '2021-03-08 05:46:03', '2021-09-20 07:30:28'),
(26626, 'en', 'the_requested_quantity_is_not_available_for_', 'The requested quantity is not available for ', '2021-03-08 05:56:12', '2021-09-20 07:30:28'),
(26627, 'en', 'city_has_been_inserted_successfully', 'City has been inserted successfully', '2021-03-08 05:56:45', '2021-09-20 07:30:28'),
(26628, 'en', 'namibia', 'Namibia', '2021-03-08 05:57:17', '2021-09-20 07:30:28'),
(26629, 'en', 'city_information', 'City Information', '2021-03-08 06:14:10', '2021-09-20 07:30:28'),
(26630, 'en', 'city_has_been_updated_successfully', 'City has been updated successfully', '2021-03-08 06:14:23', '2021-09-20 07:30:28'),
(26631, 'en', 'sed_ea_dolore_offici', 'Sed ea dolore offici', '2021-03-08 06:17:47', '2021-09-20 07:30:28'),
(26639, 'en', 'yes', 'Yes', '2021-03-08 06:35:13', '2021-09-20 07:30:28'),
(26640, 'en', 'done', 'Done', '2021-03-08 06:35:13', '2021-09-20 07:30:28'),
(26644, 'en', 'after_activate_this_option_cash_on_delivery_of_seller_product_will_be_managed_by_admin', 'After activate this option Cash On Delivery of Seller product will be managed by Admin', '2021-03-08 06:49:14', '2021-09-20 07:30:28'),
(26650, 'en', 'blogs', 'Blogs', '2021-03-24 08:01:32', '2021-09-20 07:30:28'),
(26651, 'en', 'blogs', 'Blogs', '2021-03-24 08:01:32', '2021-09-20 07:30:28'),
(26653, 'en', 'file_selected', 'File selected', '2021-04-11 04:54:39', '2021-09-20 07:30:28'),
(26654, 'en', 'files_selected', 'Files selected', '2021-04-11 04:54:39', '2021-09-20 07:30:28'),
(26655, 'en', 'add_more_files', 'Add more files', '2021-04-11 04:54:39', '2021-09-20 07:30:28'),
(26656, 'en', 'adding_more_files', 'Adding more files', '2021-04-11 04:54:39', '2021-09-20 07:30:28'),
(26657, 'en', 'drop_files_here_paste_or', 'Drop files here, paste or', '2021-04-11 04:54:40', '2021-09-20 07:30:28'),
(26658, 'en', 'upload_complete', 'Upload complete', '2021-04-11 04:54:40', '2021-09-20 07:30:28'),
(26659, 'en', 'upload_paused', 'Upload paused', '2021-04-11 04:54:40', '2021-09-20 07:30:28'),
(26660, 'en', 'resume_upload', 'Resume upload', '2021-04-11 04:54:40', '2021-09-20 07:30:28'),
(26661, 'en', 'pause_upload', 'Pause upload', '2021-04-11 04:54:40', '2021-09-20 07:30:28'),
(26662, 'en', 'retry_upload', 'Retry upload', '2021-04-11 04:54:40', '2021-09-20 07:30:28'),
(26663, 'en', 'cancel_upload', 'Cancel upload', '2021-04-11 04:54:40', '2021-09-20 07:30:28'),
(26664, 'en', 'uploading', 'Uploading', '2021-04-11 04:54:40', '2021-09-20 07:30:28'),
(26665, 'en', 'processing', 'Processing', '2021-04-11 04:54:40', '2021-09-20 07:30:28'),
(26666, 'en', 'complete', 'Complete', '2021-04-11 04:54:40', '2021-09-20 07:30:28'),
(26667, 'en', 'files', 'Files', '2021-04-11 04:54:40', '2021-09-20 07:30:28'),
(26668, 'en', 'this_action_is_disabled_in_demo_mode', 'This action is disabled in demo mode', '2021-05-20 03:38:21', '2021-09-20 07:30:28'),
(26669, 'en', 'nothing_selected', 'Nothing selected', '2021-05-20 03:49:25', '2021-09-20 07:30:28'),
(26670, 'en', 'nothing_selected', 'Nothing selected', '2021-05-20 03:49:25', '2021-09-20 07:30:28'),
(26671, 'en', 'delivery_boy', 'Delivery Boy', '2021-05-20 04:03:03', '2021-09-20 07:30:28'),
(26672, 'en', 'all_delivery_boy', 'All Delivery Boy', '2021-05-20 04:03:03', '2021-09-20 07:30:28'),
(26673, 'en', 'add_delivery_boy', 'Add Delivery Boy', '2021-05-20 04:03:04', '2021-09-20 07:30:28'),
(26674, 'en', 'cancel_request', 'Cancel Request', '2021-05-20 04:03:04', '2021-09-20 07:30:28'),
(26675, 'en', 'configuration', 'Configuration', '2021-05-20 04:03:04', '2021-09-20 07:30:28'),
(26676, 'en', 'all_delivery_boys', 'All Delivery Boys', '2021-05-20 04:04:59', '2021-09-20 07:30:28'),
(26677, 'en', 'add_new_delivery_boy', 'Add New Delivery Boy', '2021-05-20 04:04:59', '2021-09-20 07:30:28'),
(26678, 'en', 'delivery_boys', 'Delivery Boys', '2021-05-20 04:04:59', '2021-09-20 07:30:28'),
(26679, 'en', 'collection', 'Collection', '2021-05-20 04:05:00', '2021-09-20 07:30:28'),
(26680, 'en', 'do_you_really_want_to_ban_this_delivery_boy', 'Do you really want to ban this delivery_boy?', '2021-05-20 04:05:00', '2021-09-20 07:30:28'),
(26681, 'en', 'do_you_really_want_to_unban_this_delivery_boy', 'Do you really want to unban this delivery_boy?', '2021-05-20 04:05:00', '2021-09-20 07:30:28'),
(26682, 'en', 'delivery_boy_information', 'Delivery Boy Information', '2021-05-20 04:05:06', '2021-09-20 07:30:28'),
(26683, 'en', 'select_city', 'Select City', '2021-05-20 04:05:06', '2021-09-20 07:30:28'),
(26684, 'en', 'delivery_boy_has_been_created_successfully', 'Delivery Boy has been created successfully', '2021-05-20 04:07:01', '2021-09-20 07:30:28'),
(26685, 'en', 'ban_this_delivery_boy', 'Ban this delivery boy', '2021-05-20 04:07:02', '2021-09-20 07:30:28'),
(26686, 'en', 'payment_configuration', 'Payment Configuration', '2021-05-20 04:32:11', '2021-09-20 07:30:28'),
(26687, 'en', 'monthly_salary', 'Monthly Salary', '2021-05-20 04:32:11', '2021-09-20 07:30:28'),
(26688, 'en', 'salary_amount', 'Salary Amount', '2021-05-20 04:32:11', '2021-09-20 07:30:28'),
(26689, 'en', 'per_order_commission', 'Per Order Commission', '2021-05-20 04:32:11', '2021-09-20 07:30:28'),
(26690, 'en', 'commission_rate', 'Commission Rate', '2021-05-20 04:32:11', '2021-09-20 07:30:28'),
(26691, 'en', 'notification_configuration', 'Notification Configuration', '2021-05-20 04:32:11', '2021-09-20 07:30:28'),
(26692, 'en', 'send_mail', 'Send Mail', '2021-05-20 04:32:11', '2021-09-20 07:30:28'),
(26693, 'en', 'send_otp', 'Send OTP', '2021-05-20 04:32:11', '2021-09-20 07:30:28'),
(26694, 'en', 'all_cancel_request', 'All Cancel Request', '2021-05-20 04:32:16', '2021-09-20 07:30:28'),
(26695, 'en', 'cancel_requests', 'Cancel Requests', '2021-05-20 04:32:16', '2021-09-20 07:30:28'),
(26696, 'en', 'request_by', 'Request By', '2021-05-20 04:32:16', '2021-09-20 07:30:28'),
(26697, 'en', 'request_at', 'Request At', '2021-05-20 04:32:16', '2021-09-20 07:30:28'),
(26698, 'en', 'offline_customer_package_payment_requests', 'Offline Customer Package Payment Requests', '2021-05-20 04:37:23', '2021-09-20 07:30:28'),
(26699, 'en', 'method', 'Method', '2021-05-20 04:37:23', '2021-09-20 07:30:28'),
(26700, 'en', 'txn_id', 'TXN ID', '2021-05-20 04:37:23', '2021-09-20 07:30:28'),
(26701, 'en', 'reciept', 'Reciept', '2021-05-20 04:37:23', '2021-09-20 07:30:28'),
(26702, 'en', 'offline_customer_package_payment_approved_successfully', 'Offline Customer Package Payment approved successfully', '2021-05-20 04:37:23', '2021-09-20 07:30:28'),
(26703, 'en', 'refferal_users', 'Refferal Users', '2021-05-20 04:37:37', '2021-09-20 07:30:28'),
(26704, 'en', 'reffered_by', 'Reffered By', '2021-05-20 04:37:37', '2021-09-20 07:30:28'),
(26705, 'en', 'affiliate_withdraw_request_reject', 'Affiliate Withdraw Request Reject', '2021-05-20 04:37:59', '2021-09-20 07:30:28'),
(26706, 'en', 'are_you_sure_you_want_to_reject_this', 'Are you sure, You want to reject this?', '2021-05-20 04:37:59', '2021-09-20 07:30:28'),
(26707, 'en', 'server_information', 'Server information', '2021-05-20 04:38:23', '2021-09-20 07:30:28'),
(26708, 'en', 'current_version', 'Current Version', '2021-05-20 04:38:23', '2021-09-20 07:30:28'),
(26709, 'en', 'required_version', 'Required Version', '2021-05-20 04:38:23', '2021-09-20 07:30:28'),
(26710, 'en', 'phpini_config', 'php.ini Config', '2021-05-20 04:38:23', '2021-09-20 07:30:28'),
(26711, 'en', 'config_name', 'Config Name', '2021-05-20 04:38:23', '2021-09-20 07:30:28'),
(26712, 'en', 'current', 'Current', '2021-05-20 04:38:24', '2021-09-20 07:30:28'),
(26713, 'en', 'recommended', 'Recommended', '2021-05-20 04:38:24', '2021-09-20 07:30:28'),
(26714, 'en', 'extensions_information', 'Extensions information', '2021-05-20 04:38:24', '2021-09-20 07:30:28'),
(26715, 'en', 'extension_name', 'Extension Name', '2021-05-20 04:38:24', '2021-09-20 07:30:28'),
(26716, 'en', 'filesystem_permissions', 'Filesystem Permissions', '2021-05-20 04:38:24', '2021-09-20 07:30:28'),
(26717, 'en', 'file_or_folder', 'File or Folder', '2021-05-20 04:38:24', '2021-09-20 07:30:28'),
(26718, 'en', 'assign_deliver_boy', 'Assign Deliver Boy', '2021-05-20 04:38:42', '2021-09-20 07:30:28'),
(26719, 'en', 'select_delivery_boy', 'Select Delivery Boy', '2021-05-20 04:38:42', '2021-09-20 07:30:28'),
(26721, 'en', 'on_the_way', 'On The Way', '2021-05-20 04:38:43', '2021-09-20 07:30:28'),
(26722, 'en', 'delivery_boy_has_been_assigned', 'Delivery boy has been assigned', '2021-05-20 04:38:43', '2021-09-20 07:30:28'),
(26724, 'en', 'copy_credentials', 'Copy credentials', '2021-05-20 04:53:34', '2021-09-20 07:30:28'),
(26725, 'en', 'customer_account', 'Customer Account', '2021-05-20 04:53:34', '2021-09-20 07:30:28'),
(26726, 'en', 'delivery_boy_account', 'Delivery Boy Account', '2021-05-20 04:54:07', '2021-09-20 07:30:28'),
(26727, 'en', 'invalid_coupon', 'Invalid coupon!', '2021-05-20 04:58:01', '2021-09-20 07:30:28'),
(26728, 'en', 'assigned_delivery', 'Assigned Delivery', '2021-05-20 05:01:59', '2021-09-20 07:30:28'),
(26729, 'en', 'pickup_delivery', 'Pickup Delivery', '2021-05-20 05:01:59', '2021-09-20 07:30:28'),
(26730, 'en', 'on_the_way_delivery', 'On The Way Delivery', '2021-05-20 05:01:59', '2021-09-20 07:30:28'),
(26731, 'en', 'completed_delivery', 'Completed Delivery', '2021-05-20 05:01:59', '2021-09-20 07:30:28'),
(26732, 'en', 'pending_delivery', 'Pending Delivery', '2021-05-20 05:01:59', '2021-09-20 07:30:28'),
(26733, 'en', 'cancelled_delivery', 'Cancelled Delivery', '2021-05-20 05:01:59', '2021-09-20 07:30:28'),
(26734, 'en', 'request_cancelled_delivery', 'Request Cancelled Delivery', '2021-05-20 05:01:59', '2021-09-20 07:30:28'),
(26735, 'en', 'total_collections', 'Total Collections', '2021-05-20 05:01:59', '2021-09-20 07:30:28'),
(26736, 'en', 'assigned_delivery_history', 'Assigned Delivery History', '2021-05-20 05:12:13', '2021-09-20 07:30:28'),
(26737, 'en', 'mark_as_pickup', 'Mark As Pickup', '2021-05-20 05:12:13', '2021-09-20 07:30:28'),
(26738, 'en', 'do_you_really_want_to_send_request_to_cancel', 'Do you really want to send request to cancel?', '2021-05-20 05:12:13', '2021-09-20 07:30:28'),
(26739, 'en', 'request_cancel', 'Request Cancel', '2021-05-20 05:12:13', '2021-09-20 07:30:28'),
(26740, 'en', 'total_collection_history', 'Total Collection History', '2021-05-20 05:13:48', '2021-09-20 07:30:28'),
(26741, 'en', 'cancelled_delivery_history', 'Cancelled Delivery History', '2021-05-20 05:13:53', '2021-09-20 07:30:28'),
(26742, 'en', 'completed_delivery_history', 'Completed Delivery History', '2021-05-20 05:13:59', '2021-09-20 07:30:28'),
(26743, 'en', 'on_the_way_delivery_history', 'On The Way Delivery History', '2021-05-20 05:14:03', '2021-09-20 07:30:28'),
(26744, 'en', 'pickup_delivery_history', 'Pickup Delivery History', '2021-05-20 05:14:08', '2021-09-20 07:30:28'),
(26745, 'en', 'website_popup', 'Website Popup', '2021-06-02 02:31:46', '2021-09-20 07:30:28'),
(26746, 'en', 'show_website_popup', 'Show website popup?', '2021-06-02 02:31:46', '2021-09-20 07:30:28'),
(26747, 'en', 'popup_content', 'Popup content', '2021-06-02 02:31:46', '2021-09-20 07:30:28'),
(26748, 'en', 'show_subscriber_form', 'Show Subscriber form?', '2021-06-02 02:31:46', '2021-09-20 07:30:28'),
(26749, 'en', 'topbar_banner', 'Topbar Banner', '2021-06-02 02:31:49', '2021-09-20 07:30:28'),
(26750, 'en', 'topbar_banner_link', 'Topbar Banner Link', '2021-06-02 02:31:49', '2021-09-20 07:30:28'),
(26751, 'en', 'disable_image_optimization', 'Disable image optimization?', '2021-06-02 03:18:51', '2021-09-20 07:30:28'),
(26752, 'en', 'back_to_uploaded_files', 'Back to uploaded files', '2021-06-02 03:41:55', '2021-09-20 07:30:28'),
(26753, 'en', 'drag__drop_your_files', 'Drag & drop your files', '2021-06-02 03:41:56', '2021-09-20 07:30:28'),
(26754, 'en', 'subscribe_now', 'Subscribe Now', '2021-06-02 03:44:19', '2021-09-20 07:30:28'),
(26755, 'en', 'play_store_link', 'Play Store Link', '2021-06-02 03:49:21', '2021-09-20 07:30:28'),
(26756, 'en', 'app_store_link', 'App Store Link', '2021-06-02 03:49:21', '2021-09-20 07:30:28'),
(26757, 'en', 'hello', 'Hello', '2021-06-08 05:29:55', '2021-09-20 07:30:28'),
(26758, 'en', 'shop_by_department', 'Shop By Department', '2021-06-08 05:29:55', '2021-09-20 07:30:28'),
(26759, 'en', 'log_out', 'Log Out', '2021-06-08 05:29:55', '2021-09-20 07:30:28'),
(26760, 'en', 'sms_templates', 'SMS Templates', '2021-06-21 06:01:43', '2021-09-20 07:30:28'),
(26761, 'en', 'loading', 'Loading..', '2021-06-21 06:02:59', '2021-09-20 07:30:28'),
(26762, 'en', 'place_order', 'Place Order', '2021-06-21 06:02:59', '2021-09-20 07:30:28'),
(26763, 'en', 'load_more', 'Load More.', '2021-06-21 06:02:59', '2021-09-20 07:30:28'),
(26764, 'en', 'nothing_more_found', 'Nothing more found.', '2021-06-21 06:02:59', '2021-09-20 07:30:28'),
(26765, 'en', 'phone_number_verification', 'Phone Number Verification', '2021-06-21 06:03:28', '2021-09-20 07:30:28'),
(26766, 'en', 'password_reset', 'Password Reset', '2021-06-21 06:03:28', '2021-09-20 07:30:28'),
(26767, 'en', 'delivery_status_change', 'Delivery Status Change', '2021-06-21 06:03:28', '2021-09-20 07:30:28'),
(26768, 'en', 'payment_status_change', 'Payment Status Change', '2021-06-21 06:03:28', '2021-09-20 07:30:28'),
(26769, 'en', 'assign_delivery_boy', 'Assign Delivery Boy', '2021-06-21 06:03:28', '2021-09-20 07:30:28'),
(26770, 'en', 'sms_body', 'SMS Body', '2021-06-21 06:03:28', '2021-09-20 07:30:28'),
(26771, 'en', 'template_id', 'Template ID', '2021-06-21 06:03:28', '2021-09-20 07:30:28'),
(26772, 'en', 'update_settings', 'Update Settings', '2021-06-21 06:03:28', '2021-09-20 07:30:28'),
(26773, 'en', 'please_turn_off_maintenance_mode_before_updating', 'Please turn off maintenance mode before updating.', '2021-07-28 00:34:17', '2021-09-20 07:30:28');
INSERT INTO `translations` (`id`, `lang`, `lang_key`, `lang_value`, `created_at`, `updated_at`) VALUES
(26774, 'en', 'file_system__cache_configuration', 'File System & Cache Configuration', '2021-07-28 00:34:18', '2021-09-20 07:30:28'),
(26775, 'en', 'google_map', 'Google Map', '2021-07-28 00:34:19', '2021-09-20 07:30:28'),
(26776, 'en', 'google_firebase', 'Google Firebase', '2021-07-28 00:34:19', '2021-09-20 07:30:28'),
(26777, 'en', 'no_notification_found', 'No notification found', '2021-07-28 00:34:19', '2021-09-20 07:30:28'),
(26778, 'en', 'view_all_notifications', 'View All Notifications', '2021-07-28 00:34:19', '2021-09-20 07:30:28'),
(26779, 'en', 'account', 'Account', '2021-08-09 20:12:43', '2021-09-20 07:30:28'),
(26780, 'en', 'item_has_been_removed_from_cart', 'Item has been removed from cart', '2021-08-09 20:12:43', '2021-09-20 07:30:28'),
(26781, 'en', 'please_choose_all_the_options', 'Please choose all the options', '2021-08-09 20:12:43', '2021-09-20 07:30:28'),
(26782, 'en', 'auction_products', 'Auction Products', '2021-08-09 20:15:40', '2021-09-20 07:30:28'),
(26783, 'en', 'add_new_auction_product', 'Add New auction product', '2021-08-09 20:15:40', '2021-09-20 07:30:28'),
(26784, 'en', 'all_auction_products', 'All Auction Products', '2021-08-09 20:15:40', '2021-09-20 07:30:28'),
(26785, 'en', 'select_brand', 'Select Brand', '2021-08-09 20:18:10', '2021-09-20 07:30:28'),
(26786, 'en', 'minimum_purchase_qty', 'Minimum Purchase Qty', '2021-08-09 20:18:11', '2021-09-20 07:30:28'),
(26787, 'en', 'discount_date_range', 'Discount Date Range', '2021-08-09 20:18:11', '2021-09-20 07:30:28'),
(26788, 'en', 'select_date', 'Select Date', '2021-08-09 20:18:11', '2021-09-20 07:30:28'),
(26789, 'en', '1', '1', '2021-08-09 20:18:11', '2021-08-09 20:18:11'),
(26790, 'en', 'product_wise_shipping_cost_is_disable_shipping_cost_is_configured_from_here', 'Product wise shipping cost is disable. Shipping cost is configured from here', '2021-08-09 20:18:11', '2021-09-20 07:30:28'),
(26791, 'en', 'starting_bidding_price', 'Starting bidding price', '2021-08-09 20:26:44', '2021-09-20 07:30:28'),
(26792, 'en', 'auction_date_range', 'Auction Date Range', '2021-08-09 20:26:44', '2021-09-20 07:30:28'),
(26793, 'en', 'auction_products_orders', 'Auction Products Orders', '2021-08-19 00:50:51', '2021-09-20 07:30:28'),
(26794, 'en', 'twilio_otp', 'Twilio OTP', '2021-08-21 05:56:00', '2021-09-20 07:30:28'),
(26795, 'en', 'mimsms', 'MIMSMS', '2021-08-21 05:56:00', '2021-09-20 07:30:28'),
(26796, 'en', 'twilio_credential', 'Twilio Credential', '2021-08-21 05:56:36', '2021-09-20 07:30:28'),
(26797, 'en', 'valid_twilio_number', 'VALID TWILIO NUMBER', '2021-08-21 05:56:36', '2021-09-20 07:30:28'),
(26798, 'en', 'entity_id', 'ENTITY ID', '2021-08-21 05:56:37', '2021-09-20 07:30:28'),
(26799, 'en', 'dlt_manual', 'DLT Manual', '2021-08-21 05:56:37', '2021-09-20 07:30:28'),
(26800, 'en', 'mimsms_credential', 'MIMSMS Credential', '2021-08-21 05:56:37', '2021-09-20 07:30:28'),
(26801, 'en', 'mim_api_key', 'MIM_API_KEY', '2021-08-21 05:56:37', '2021-09-20 07:30:28'),
(26802, 'en', 'mim_sender_id', 'MIM_SENDER_ID', '2021-08-21 05:56:37', '2021-09-20 07:30:28'),
(26803, 'en', 'product_bidding_price__date_range', 'Product Bidding Price + Date Range', '2021-08-21 07:19:33', '2021-09-20 07:30:28'),
(26804, 'en', 'is_product_quantity_mulitiply', 'Is Product Quantity Mulitiply', '2021-08-21 07:19:33', '2021-09-20 07:30:28'),
(26805, 'en', 'auction_product', 'Auction Product', '2021-08-21 19:16:21', '2021-09-20 07:30:28'),
(26806, 'en', 'bidded_products', 'Bidded Products', '2021-08-21 19:16:21', '2021-09-20 07:30:28'),
(26807, 'en', 'all_auction_product', 'All Auction Product', '2021-08-21 11:42:38', '2021-09-20 07:30:28'),
(26808, 'en', 'bid_starting_amount', 'Bid Starting Amount', '2021-08-21 11:42:38', '2021-09-20 07:30:28'),
(26809, 'en', 'auction_start_date', 'Auction Start Date', '2021-08-21 11:42:38', '2021-09-20 07:30:28'),
(26810, 'en', 'auction_end_date', 'Auction End Date', '2021-08-21 11:42:38', '2021-09-20 07:30:28'),
(26811, 'en', 'total_bids', 'Total Bids', '2021-08-21 11:42:38', '2021-09-20 07:30:28'),
(26812, 'en', 'bulk_action', 'Bulk Action', '2021-08-21 11:42:49', '2021-09-20 07:30:28'),
(26813, 'en', 'delete_selection', 'Delete selection', '2021-08-21 11:42:49', '2021-09-20 07:30:28'),
(26814, 'en', 'product_approval_update_successfully', 'Product approval update successfully', '2021-08-21 11:42:51', '2021-09-20 07:30:28'),
(26815, 'en', 'view_products', 'View Products', '2021-08-21 11:47:23', '2021-09-20 07:30:28'),
(26816, 'en', 'view_all_bids', 'View All Bids', '2021-08-21 11:47:23', '2021-09-20 07:30:28'),
(26817, 'en', 'edit_auction_product', 'Edit Auction Product', '2021-08-21 11:50:05', '2021-09-20 07:30:28'),
(26818, 'en', 'auction_will_end', 'Auction Will End', '2021-08-21 12:18:43', '2021-09-20 07:30:28'),
(26831, 'en', 'buy', 'Buy', '2021-08-21 12:28:51', '2021-09-20 07:30:28'),
(26832, 'en', 'address_edit', 'Address Edit', '2021-08-21 12:30:27', '2021-09-20 07:30:28'),
(26834, 'en', 'has_been_placed', 'has been Placed', '2021-08-21 12:32:46', '2021-09-20 07:30:28'),
(26835, 'en', 'order_has_been_deleted_successfully', 'Order has been deleted successfully', '2021-08-21 12:33:00', '2021-09-20 07:30:28'),
(26836, 'en', 'purchased', 'Purchased', '2021-08-21 12:33:30', '2021-09-20 07:30:28'),
(26838, 'en', 'item_alreday_added_to_the_cart', 'Item alreday added to the cart.', '2021-08-21 12:33:57', '2021-09-20 07:30:28'),
(26839, 'en', 'total_collected', 'Total Collected', '2021-09-05 11:02:27', '2021-09-20 07:30:28'),
(26840, 'en', 'earnings', 'Earnings', '2021-09-05 11:02:27', '2021-09-20 07:30:28'),
(26841, 'en', 'values', 'Values', '2021-09-05 11:03:02', '2021-09-20 07:30:28'),
(26842, 'en', 'attribute_values', 'Attribute values', '2021-09-05 11:03:02', '2021-09-20 07:30:28'),
(26843, 'en', 'global_seo', 'Global SEO', '2021-09-14 05:23:18', '2021-09-20 07:30:28'),
(26844, 'en', 'keyword_keyword', 'Keyword, Keyword', '2021-09-14 05:23:18', '2021-09-20 07:30:28'),
(26845, 'en', 'choose_file', 'Choose File', '2021-09-14 05:23:18', '2021-09-20 07:30:29'),
(26846, 'en', 'nothing_found', 'Nothing found', '2021-09-14 05:23:18', '2021-09-20 07:30:29'),
(26847, 'en', 'wallet_recharge_history', 'Wallet Recharge History', '2021-09-14 05:23:18', '2021-09-20 07:30:29'),
(26848, 'en', 'order_code_', 'Order code: ', '2021-09-14 05:23:18', '2021-09-20 07:30:29'),
(26849, 'en', 'all_categories', 'All categories', '2021-09-14 05:23:19', '2021-09-20 07:44:39'),
(26850, 'en', 'new', 'new', '2021-09-14 07:18:02', '2021-09-14 07:18:02'),
(26851, 'en', 'password', 'Password', '2021-09-14 07:22:08', '2021-09-20 07:30:29'),
(26852, 'en', 'forgot_password', 'Forgot password?', '2021-09-14 07:22:08', '2021-09-20 07:30:29'),
(26853, 'en', 'times', 'Times', '2021-09-14 07:22:14', '2021-09-20 07:30:29'),
(26855, 'en', 'sort_by', 'Sort by', '2021-09-14 07:22:16', '2021-09-20 07:30:29'),
(26856, 'en', 'tax', 'Tax', '2021-09-14 07:22:21', '2021-09-20 07:30:29'),
(26857, 'en', 'total', 'Total', '2021-09-14 07:22:21', '2021-09-20 07:30:29'),
(26859, 'en', 'terms_and_conditions', 'terms and conditions', '2021-09-14 07:22:27', '2021-09-20 07:30:29'),
(26860, 'en', 'return_policy', 'return policy', '2021-09-14 07:22:27', '2021-09-20 07:30:29'),
(26861, 'en', 'privacy_policy', 'privacy policy', '2021-09-14 07:22:27', '2021-09-20 07:30:29'),
(26862, 'en', 'order_date', 'Order date', '2021-09-14 07:22:32', '2021-09-20 07:30:29'),
(26863, 'en', 'shipping_address', 'Shipping address', '2021-09-14 07:22:32', '2021-09-20 07:30:29'),
(26864, 'en', 'order_status', 'Order status', '2021-09-14 07:22:32', '2021-09-20 07:30:29'),
(26868, 'en', 'disable_image_encoding', 'Disable image encoding?', '2021-09-19 04:42:42', '2021-09-20 07:30:29'),
(26870, 'en', 'after_activate_this_option_admin_approval_need_to_seller_product', 'After activate this option, Admin approval need to seller product', '2021-09-19 04:42:42', '2021-09-20 07:30:29'),
(26873, 'en', 'amarpay_activation', 'Amarpay Activation', '2021-09-19 04:42:42', '2021-09-20 07:30:29'),
(26874, 'en', 'you_need_to_configure_amarpay_correctly_to_enable_this_feature', 'You need to configure amarpay correctly to enable this feature', '2021-09-19 04:42:42', '2021-09-20 07:30:29'),
(26875, 'en', 'category_based_commission', 'Category Based Commission', '2021-09-19 04:44:37', '2021-09-20 07:30:29'),
(26876, 'en', 'if_category_based_commission_is_enbaled_global_percentage_will_not_work', 'If Category Based Commission is enbaled, Global percentage will not work.', '2021-09-19 04:46:09', '2021-09-20 07:30:29'),
(26877, 'en', 'if_category_based_commission_is_enbaled_set_seller_commission_percentage_0', 'If Category Based Commission is enbaled, Set seller commission percentage 0.', '2021-09-19 04:46:38', '2021-09-20 07:30:29'),
(26880, 'en', 'order_level', 'Order Level', '2021-09-19 05:33:57', '2021-09-20 07:30:29'),
(26881, 'en', 'icon', 'Icon', '2021-09-19 05:33:57', '2021-09-20 07:30:29'),
(26882, 'en', 'all_products', 'All products', '2021-09-19 05:49:10', '2021-09-20 07:30:29'),
(26883, 'en', 'add_new_product', 'Add New Product', '2021-09-19 05:49:10', '2021-09-20 07:30:29'),
(26885, 'en', 'sold_by', 'Sold by', '2021-09-19 06:05:07', '2021-09-20 07:30:29'),
(26886, 'en', 'coupon_has_been_saved_successfully', 'Coupon has been saved successfully', '2021-09-20 01:35:28', '2021-09-20 07:30:29'),
(26887, 'en', 'cart_base', 'Cart Base', '2021-09-20 01:35:28', '2021-09-20 07:30:29'),
(26888, 'en', 'coupon_has_been_deleted_successfully', 'Coupon has been deleted successfully', '2021-09-20 01:52:19', '2021-09-20 07:30:29'),
(26889, 'en', 'coupon_has_been_updated_successfully', 'Coupon has been updated successfully', '2021-09-20 01:53:42', '2021-09-20 07:30:29'),
(26890, 'en', 'coupons', 'Coupons', '2021-09-20 02:02:10', '2021-09-20 07:30:29'),
(26891, 'en', 'add_your_coupon', 'Add Your Coupon', '2021-09-20 02:03:19', '2021-09-20 07:30:29'),
(26892, 'en', 'edit_your_coupon', 'Edit Your Coupon', '2021-09-20 02:14:13', '2021-09-20 07:30:29'),
(26896, 'en', 'aamarpay_credential', 'Aamarpay Credential', '2021-09-20 04:19:16', '2021-09-20 07:30:29'),
(26897, 'en', 'aamarpay_store_id', 'Aamarpay Store Id', '2021-09-20 04:19:17', '2021-09-20 07:30:29'),
(26898, 'en', 'aamarpay_signature_key', 'Aamarpay signature key', '2021-09-20 04:19:17', '2021-09-20 07:30:29'),
(26899, 'en', 'aamarpay_sandbox_mode', 'Aamarpay Sandbox Mode', '2021-09-20 04:19:17', '2021-09-20 07:30:29'),
(26905, 'en', 'days', 'Days', '2021-09-20 04:19:17', '2021-09-20 07:30:29'),
(26906, 'en', 'flw_public_key', 'FLW_PUBLIC_KEY', '2021-09-20 05:04:59', '2021-09-20 07:30:29'),
(26907, 'en', 'flw_secret_key', 'FLW_SECRET_KEY', '2021-09-20 05:04:59', '2021-09-20 07:30:29'),
(26908, 'en', 'flw_secret_hash', 'FLW_SECRET_HASH', '2021-09-20 05:04:59', '2021-09-20 07:30:29'),
(26909, 'en', 'categories', 'Categories', '2021-09-20 07:30:29', '2021-09-20 07:30:29'),
(26911, 'en', 'activate_addon_link', 'Activate Addon Link', '2024-01-10 00:56:19', '2024-01-10 00:56:19'),
(26912, 'en', 'purchase_code', 'Purchase code', '2024-01-10 00:56:19', '2024-01-10 00:56:19'),
(26915, 'en', 'product_conversations', 'Product Conversations', '2024-01-10 00:56:19', '2024-01-10 00:56:19'),
(26916, 'en', 'order_configuration', 'Order Configuration', '2024-01-10 00:56:20', '2024-01-10 00:56:20'),
(26920, 'en', 'clear_cache', 'Clear Cache', '2024-01-10 00:56:20', '2024-01-10 00:56:20'),
(26921, 'en', 'addon_installed_successfully', 'Addon installed successfully', '2024-01-10 00:56:44', '2024-01-10 00:56:44'),
(26922, 'en', 'featured_categories', 'Featured Categories', '2024-01-10 01:09:05', '2024-01-10 01:09:05'),
(26923, 'en', 'top_sellers', 'Top Sellers', '2024-01-10 01:09:05', '2024-01-10 01:09:05'),
(26926, 'en', 'subscribe_to_our_newsletter_for_regular_updates_about_offers_coupons__more', 'Subscribe to our newsletter for regular updates about Offers, Coupons & more', '2024-01-10 01:09:07', '2024-01-10 01:09:07'),
(26927, 'en', 'contacts', 'Contacts', '2024-01-10 01:09:07', '2024-01-10 01:09:07'),
(26930, 'en', 'delete_your_account', 'Delete Your Account', '2024-01-10 01:09:08', '2024-01-10 01:09:08'),
(26931, 'en', 'warning_you_cannot_undo_this_action', 'Warning: You cannot undo this action', '2024-01-10 01:09:08', '2024-01-10 01:09:08'),
(26932, 'en', 'note_', 'Note: ', '2024-01-10 01:09:08', '2024-01-10 01:09:08'),
(26933, 'en', 'dont_click_to_any_button_or_dont_do_any_action_during_account_deletion_it_may_takes_some_times', 'Don\'t Click to any button or don\'t do any action during account Deletion, it may takes some times.', '2024-01-10 01:09:08', '2024-01-10 01:09:08'),
(26934, 'en', 'deleting_account_means', 'Deleting Account Means:', '2024-01-10 01:09:08', '2024-01-10 01:09:08'),
(26935, 'en', 'warning', 'warning', '2024-01-10 01:09:08', '2024-01-10 01:09:08'),
(26937, 'en', 'after_deleting_your_account_wallet_balance_will_no_longer_in_our_system', 'After deleting your account, wallet balance will no longer in our system', '2024-01-10 01:09:08', '2024-01-10 01:09:08'),
(26938, 'en', 'delete_account', 'Delete Account', '2024-01-10 01:09:08', '2024-01-10 01:09:08'),
(26939, 'en', 'sorry_nothing_found_for', 'Sorry, nothing found for', '2024-01-10 01:09:08', '2024-01-10 01:09:08'),
(26940, 'en', 'please_login_as_a_customer_to_add_products_to_the_wishlist', 'Please Login as a customer to add products to the WishList.', '2024-01-10 01:09:08', '2024-01-10 01:09:08'),
(26941, 'en', 'please_login_as_a_customer_to_add_products_to_the_cart', 'Please Login as a customer to add products to the Cart.', '2024-01-10 01:09:08', '2024-01-10 01:09:08'),
(26943, 'en', 'coupon_code_copied', 'Coupon Code Copied', '2024-01-10 01:09:09', '2024-01-10 01:09:09'),
(26945, 'en', 'featured_categories', 'Featured Categories', '2024-01-10 01:24:31', '2024-01-10 01:24:31'),
(26948, 'en', 'welcome_back_', 'Welcome Back !', '2024-01-10 09:34:44', '2024-01-10 09:34:44'),
(26950, 'en', 'cache_cleared_successfully', 'Cache cleared successfully', '2024-01-10 09:40:20', '2024-01-10 09:40:20'),
(26951, 'en', 'search_by_product_namebarcode', 'Search by Product Name/Barcode', '2024-01-10 09:45:43', '2024-01-10 09:45:43'),
(26953, 'en', 'confirm_with_cod', 'Confirm with COD', '2024-01-10 09:45:44', '2024-01-10 09:45:44'),
(26954, 'en', 'confirm_with_cash', 'Confirm with Cash', '2024-01-10 09:45:44', '2024-01-10 09:45:44'),
(26956, 'en', 'payment_proof', 'Payment Proof', '2024-01-10 09:45:44', '2024-01-10 09:45:44'),
(26957, 'en', 'cover_image', 'Cover Image', '2024-01-10 11:07:14', '2024-01-10 11:07:14'),
(26958, 'en', 'filter_by_delivery_status', 'Filter by Delivery Status', '2024-01-10 11:08:29', '2024-01-10 11:08:29'),
(26960, 'en', 'are_you_sure_to_delete_those_files', 'Are you sure to delete those files?', '2024-01-10 11:08:30', '2024-01-10 11:08:30'),
(26961, 'en', 'select_all', 'Select All', '2024-01-10 11:12:22', '2024-01-10 11:12:22'),
(26962, 'en', 'customer_login_page_image', 'Customer Login page Image', '2024-01-10 11:35:43', '2024-01-10 11:35:43'),
(26963, 'en', 'customer_register_page_image', 'Customer Register page Image', '2024-01-10 11:35:43', '2024-01-10 11:35:43'),
(26965, 'en', 'flash_deal_banner_large', 'Flash Deal Banner large', '2024-01-10 11:35:43', '2024-01-10 11:35:43'),
(26966, 'en', 'flash_deal_banner_small', 'Flash Deal Banner Small', '2024-01-10 11:35:43', '2024-01-10 11:35:43'),
(26967, 'en', 'topbar_banner_large', 'Topbar Banner Large', '2024-01-10 11:36:02', '2024-01-10 11:36:02'),
(26968, 'en', 'topbar_banner_medium', 'Topbar Banner Medium', '2024-01-10 11:36:02', '2024-01-10 11:36:02'),
(26969, 'en', 'topbar_banner_small', 'Topbar Banner Small', '2024-01-10 11:36:02', '2024-01-10 11:36:02'),
(26970, 'en', 'help_line_number', 'Help line number', '2024-01-10 11:36:02', '2024-01-10 11:36:02'),
(26971, 'en', 'ordering_number', 'Ordering Number', '2024-01-10 12:00:18', '2024-01-10 12:00:18'),
(26972, 'en', 'higher_number_has_high_priority', 'Higher number has high priority', '2024-01-10 12:00:18', '2024-01-10 12:00:18'),
(26973, 'en', '250x250', '250x250', '2024-01-10 12:00:19', '2024-01-10 12:00:19'),
(26974, 'en', 'filtering_attributes', 'Filtering Attributes', '2024-01-10 12:00:19', '2024-01-10 12:00:19'),
(26975, 'en', 'total_expenditure', 'Total Expenditure', '2024-01-11 10:38:19', '2024-01-11 10:38:19'),
(26976, 'en', 'view_order_history', 'View Order History', '2024-01-11 10:38:20', '2024-01-11 10:38:20'),
(26977, 'en', 'products_in_cart', 'Products in Cart', '2024-01-11 10:38:20', '2024-01-11 10:38:20'),
(26978, 'en', 'products_in_wishlist', 'Products in Wishlist', '2024-01-11 10:38:20', '2024-01-11 10:38:20'),
(26979, 'en', 'total_products_ordered', 'Total Products Ordered', '2024-01-11 10:38:20', '2024-01-11 10:38:20'),
(26980, 'en', 'view_all', 'View All', '2024-01-11 10:38:20', '2024-01-11 10:38:20'),
(26981, 'en', 'there_isnt_anything_added_yet', 'There isn\'t anything added yet', '2024-01-11 10:38:20', '2024-01-11 10:38:20'),
(26983, 'en', 'delete_my_account', 'Delete My Account', '2024-01-11 10:38:22', '2024-01-11 10:38:22'),
(26984, 'en', 'sign_out', 'Sign Out', '2024-01-11 10:38:22', '2024-01-11 10:38:22'),
(26986, 'en', 'weight', 'Weight', '2024-01-11 10:44:49', '2024-01-11 10:44:49'),
(26987, 'en', 'in_kg', 'In Kg', '2024-01-11 10:44:49', '2024-01-11 10:44:49'),
(26988, 'en', 'external_link', 'External link', '2024-01-11 10:44:50', '2024-01-11 10:44:50'),
(26989, 'en', 'leave_it_blank_if_you_do_not_use_external_site_link', 'Leave it blank if you do not use external site link', '2024-01-11 10:44:50', '2024-01-11 10:44:50'),
(26990, 'en', 'external_link_button_text', 'External link button text', '2024-01-11 10:44:50', '2024-01-11 10:44:50'),
(26991, 'en', 'select_main', 'Select Main', '2024-01-11 10:44:50', '2024-01-11 10:44:50'),
(26993, 'en', 'choose_flash_title', 'Choose Flash Title', '2024-01-11 10:44:50', '2024-01-11 10:44:50'),
(26994, 'en', 'choose_discount_type', 'Choose Discount Type', '2024-01-11 10:44:50', '2024-01-11 10:44:50'),
(26995, 'en', 'product_name_is_required', 'Product name is required', '2024-01-11 10:59:09', '2024-01-11 10:59:09'),
(26996, 'en', 'product_category_is_required', 'Product category is required', '2024-01-11 10:59:09', '2024-01-11 10:59:09'),
(26997, 'en', 'main_category_is_required', 'Main Category is required', '2024-01-11 10:59:09', '2024-01-11 10:59:09'),
(26998, 'en', 'main_category_must_be_within_selected_categories', 'Main Category must be within selected categories', '2024-01-11 10:59:10', '2024-01-11 10:59:10'),
(26999, 'en', 'product_unit_is_required', 'Product unit is required', '2024-01-11 10:59:10', '2024-01-11 10:59:10'),
(27002, 'en', 'unit_price_is_required', 'Unit price is required', '2024-01-11 10:59:10', '2024-01-11 10:59:10'),
(27003, 'en', 'unit_price_must_be_numeric', 'Unit price must be numeric', '2024-01-11 10:59:10', '2024-01-11 10:59:10'),
(27004, 'en', 'discount_is_required', 'Discount is required', '2024-01-11 10:59:10', '2024-01-11 10:59:10'),
(27006, 'en', 'discount_cannot_be_gretaer_than_unit_price', 'Discount cannot be gretaer than unit price', '2024-01-11 10:59:10', '2024-01-11 10:59:10'),
(27013, 'en', 'low', 'Low', '2024-01-11 11:19:47', '2024-01-11 11:19:47'),
(27014, 'en', 'new_products', 'New Products', '2024-01-11 11:20:25', '2024-01-11 11:20:25'),
(27016, 'en', 'reviews__ratings', 'Reviews & Ratings', '2024-01-11 11:27:12', '2024-01-11 11:27:12'),
(27017, 'en', 'out_of_50', 'out of 5.0', '2024-01-11 11:27:12', '2024-01-11 11:27:12'),
(27018, 'en', 'rate_this_product', 'Rate this Product', '2024-01-11 11:27:12', '2024-01-11 11:27:12'),
(27019, 'en', 'add_yyto_cart', 'Add yyto cart', '2024-01-11 11:38:36', '2024-01-11 11:38:36'),
(27020, 'en', 'remove_auction_product_from_cart_to_add_this_product', 'Remove auction product from cart to add this product.', '2024-01-11 12:24:38', '2024-01-11 12:24:38'),
(27021, 'en', 'guestgg_checkout', 'Guestgg Checkout', '2024-01-13 08:24:16', '2024-01-13 08:24:16'),
(27022, 'en', 'please_add_shipping_address', 'Please add shipping address', '2024-01-13 09:30:47', '2024-01-13 09:30:47'),
(27023, 'en', 'carrier_wise_shipping_cost', 'Carrier Wise Shipping Cost', '2024-01-13 09:31:44', '2024-01-13 09:31:44'),
(27024, 'en', 'product_wise_shipping_cost_calculation_shipping_cost_is_calculate_by_addition_of_each_product_shipping_cost', 'Product Wise Shipping Cost calculation: Shipping cost is calculate by addition of each product shipping cost', '2024-01-13 09:31:44', '2024-01-13 09:31:44'),
(27025, 'en', 'flat_rate_shipping_cost_calculation_how_many_products_a_customer_purchase_doesnt_matter_shipping_cost_is_fixed', 'Flat Rate Shipping Cost calculation: How many products a customer purchase, doesn\'t matter. Shipping cost is fixed', '2024-01-13 09:31:44', '2024-01-13 09:31:44'),
(27027, 'en', 'area_wise_flat_shipping_cost_calculation_fixed_rate_for_each_area_if_customers_purchase_multiple_products_from_one_seller_shipping_cost_is_calculated_by_the_customer_shipping_area_to_configure_area_wise_shipping_cost_go_to_', 'Area Wise Flat Shipping Cost calculation: Fixed rate for each area. If customers purchase multiple products from one seller shipping cost is calculated by the customer shipping area. To configure area wise shipping cost go to ', '2024-01-13 09:31:44', '2024-01-13 09:31:44'),
(27028, 'en', 'carrier_based_shipping_cost_calculation_shipping_cost_calculate_in_addition_with_carrier_in_each_carrier_you_can_set_free_shipping_cost_or_can_set_weight_range_or_price_range_shipping_cost_to_configure_carrier_based_shipping_cost_go_to_', 'Carrier Based Shipping Cost calculation: Shipping cost calculate in addition with carrier. In each carrier you can set free shipping cost or can set weight range or price range shipping cost. To configure carrier based shipping cost go to ', '2024-01-13 09:31:44', '2024-01-13 09:31:44'),
(27029, 'en', 'shipping_carriers', 'Shipping Carriers', '2024-01-13 09:31:44', '2024-01-13 09:31:44'),
(27030, 'en', 'shipping_method_updated_successfully', 'Shipping Method updated successfully', '2024-01-13 09:31:55', '2024-01-13 09:31:55'),
(27036, 'en', 'type_city_name__enter', 'Type city name & Enter', '2024-01-13 09:33:08', '2024-01-13 09:33:08'),
(27045, 'en', 'transit_time', 'Transit Time', '2024-01-13 09:33:54', '2024-01-13 09:33:54'),
(27048, 'en', 'you_need_to_configure_smtp_correctly_to_enable_this_feature', 'You need to configure SMTP correctly to enable this feature.', '2024-01-13 09:34:38', '2024-01-13 09:34:38'),
(27051, 'en', 'you_need_to_configure_sslcommerz_correctly_to_enable_this_feature', 'You need to configure SSlCommerz correctly to enable this feature.', '2024-01-13 09:34:38', '2024-01-13 09:34:38'),
(27059, 'en', 'apple_login', 'Apple login', '2024-01-13 09:34:39', '2024-01-13 09:34:39'),
(27060, 'en', 'you_need_to_configure_apple_client_correctly_to_enable_this_feature', 'You need to configure Apple Client correctly to enable this feature', '2024-01-13 09:34:39', '2024-01-13 09:34:39'),
(27061, 'en', 'address_info_stored_successfully', 'Address info Stored successfully', '2024-01-13 09:36:51', '2024-01-13 09:36:51'),
(27062, 'en', 'change', 'Change', '2024-01-13 09:36:52', '2024-01-13 09:36:52'),
(27063, 'en', 'any_additional_info', 'Any additional info?', '2024-01-13 09:37:21', '2024-01-13 09:37:21'),
(27064, 'en', 'type_your_text', 'Type your text...', '2024-01-13 09:37:21', '2024-01-13 09:37:21'),
(27065, 'en', 'you_order_amount_is_less_then_the_minimum_order_amount', 'You order amount is less then the minimum order amount', '2024-01-13 09:37:22', '2024-01-13 09:37:22'),
(27066, 'en', 'you_need_to_put_transaction_id', 'You need to put Transaction id', '2024-01-13 09:37:22', '2024-01-13 09:37:22'),
(27067, 'en', 'a_new_order_has_been_placed', 'A new order has been placed', '2024-01-13 09:37:46', '2024-01-13 09:37:46'),
(27068, 'en', '_has_been_placed', ' has been Placed', '2024-01-14 05:33:00', '2024-01-14 05:33:00'),
(27069, 'en', 'your_cart_was_empty', 'Your Cart was empty', '2024-01-14 11:25:18', '2024-01-14 11:25:18'),
(27070, 'en', 'cart_itemsggg', 'Cart Itemsggg', '2024-01-15 10:18:23', '2024-01-15 10:18:23'),
(27076, 'en', 'file_name', 'File Name', '2024-01-16 16:16:45', '2024-01-16 16:16:45'),
(27077, 'en', 'file_type', 'File Type', '2024-01-16 16:16:46', '2024-01-16 16:16:46'),
(27078, 'en', 'file_size', 'File Size', '2024-01-16 16:16:46', '2024-01-16 16:16:46'),
(27079, 'en', 'uploaded_at', 'Uploaded At', '2024-01-16 16:16:46', '2024-01-16 16:16:46'),
(27080, 'en', 'password_must_contain_at_least_6_digits', 'Password must contain at least 6 digits', '2024-01-16 18:14:34', '2024-01-16 18:14:34'),
(27081, 'en', 'by_signing_up_you_agree_to_our_', 'By signing up you agree to our ', '2024-01-16 18:14:34', '2024-01-16 18:14:34'),
(27082, 'en', 'product_sale_report', 'Product Sale Report', '2024-04-08 13:50:06', '2024-04-08 13:50:06'),
(27083, 'en', 'invalid_login_credentials', 'Invalid login credentials', '2024-04-09 10:29:03', '2024-04-09 10:29:03'),
(27084, 'en', 'select_your_area', 'Select your area', '2024-04-09 10:29:57', '2024-04-09 10:29:57'),
(27085, 'en', 'reorder', 'Reorder', '2024-04-09 16:42:07', '2024-04-09 16:42:07'),
(27086, 'en', 'your_order_', 'Your Order: ', '2024-04-09 17:08:24', '2024-04-09 17:08:24'),
(27087, 'en', 'additional_info', 'Additional Info', '2024-04-09 17:08:28', '2024-04-09 17:08:28'),
(27088, 'en', 'blocksector', 'Block/Sector', '2024-04-10 06:39:53', '2024-04-10 06:39:53'),
(27089, 'en', 'house_noflat_no', 'House No/Flat No', '2024-04-10 06:43:38', '2024-04-10 06:43:38'),
(27090, 'en', 'houseflat_no', 'House/Flat No', '2024-04-10 06:44:06', '2024-04-10 06:44:06'),
(27091, 'en', 'enter_a_location', 'Enter a location', '2024-04-10 16:06:15', '2024-04-10 16:06:15'),
(27092, 'en', 'longitude', 'Longitude', '2024-04-10 16:06:15', '2024-04-10 16:06:15'),
(27093, 'en', 'latitude', 'Latitude', '2024-04-10 16:06:15', '2024-04-10 16:06:15'),
(27094, 'en', 'shipping_area', 'Shipping Area', '2024-04-19 15:38:42', '2024-04-19 15:38:42'),
(27095, 'en', 'all_areas', 'All Areas', '2024-04-19 16:15:18', '2024-04-19 16:15:18'),
(27096, 'en', 'ares', 'Ares', '2024-04-19 16:15:18', '2024-04-19 16:15:18'),
(27097, 'en', 'type_area_name__enter', 'Type area name & Enter', '2024-04-19 16:48:01', '2024-04-19 16:48:01'),
(27098, 'en', 'add_new_area', 'Add New area', '2024-04-19 16:48:43', '2024-04-19 16:48:43'),
(27099, 'en', 'area_information', 'area Information', '2024-04-19 16:53:28', '2024-04-19 16:53:28'),
(27100, 'en', 'aera_has_been_updated_successfully', 'Aera has been updated successfully', '2024-04-19 17:36:23', '2024-04-19 17:36:23'),
(27101, 'en', 'pos_printer', 'POS Printer', '2024-04-19 17:45:30', '2024-04-19 17:45:30'),
(27102, 'en', 'thermal_printer_size', 'Thermal Printer Size', '2024-04-19 17:45:30', '2024-04-19 17:45:30'),
(27103, 'en', 'print_width_in_mm', 'Print width in mm', '2024-04-19 17:45:30', '2024-04-19 17:45:30'),
(27104, 'en', 'mm', 'mm', '2024-04-19 17:45:30', '2024-04-19 17:45:30'),
(27105, 'en', 'choose_category', 'Choose Category', '2024-04-19 17:52:12', '2024-04-19 17:52:12'),
(27106, 'en', 'phone_rrgister', 'Phone Rrgister', '2024-04-23 17:37:25', '2024-04-23 17:37:25'),
(27107, 'en', 'email_rrgister', 'Email Rrgister', '2024-04-23 17:37:25', '2024-04-23 17:37:25'),
(27108, 'en', 'rrgister_by_phone', 'Rrgister By Phone', '2024-04-23 17:41:23', '2024-04-23 17:41:23'),
(27109, 'en', 'rrgister_by_email', 'Rrgister By Email', '2024-04-23 17:41:23', '2024-04-23 17:41:23'),
(27110, 'en', 'registration_by_email', 'Registration By Email', '2024-04-23 17:44:25', '2024-04-23 17:44:25'),
(27111, 'en', 'registration_by_phone', 'Registration By Phone', '2024-04-23 17:44:27', '2024-04-23 17:44:27'),
(27112, 'en', 'download', 'Download', '2024-04-27 12:17:23', '2024-04-27 12:17:23'),
(27113, 'en', 'state', 'State', '2024-04-27 12:34:49', '2024-04-27 12:34:49'),
(27114, 'en', 'offline_payment', 'Offline Payment', '2024-04-27 12:34:50', '2024-04-27 12:34:50'),
(27115, 'en', 'offline_payment_info', 'Offline Payment Info', '2024-04-27 12:34:50', '2024-04-27 12:34:50'),
(27116, 'en', 'transaction_id', 'Transaction ID', '2024-04-27 12:34:50', '2024-04-27 12:34:50'),
(27117, 'en', 'homepage_settings', 'Homepage Settings', '2024-05-16 16:58:50', '2024-05-16 16:58:50'),
(27118, 'en', 'new_product', 'New Product', '2024-05-16 16:58:50', '2024-05-16 16:58:50'),
(27119, 'en', 'new_category', 'New Category', '2024-05-16 16:58:50', '2024-05-16 16:58:50'),
(27120, 'en', 'new_brand', 'New Brand', '2024-05-16 16:58:50', '2024-05-16 16:58:50'),
(27121, 'en', 'notification', 'Notification', '2024-05-16 16:58:50', '2024-05-16 16:58:50'),
(27122, 'en', 'sellers', 'Sellers', '2024-05-16 16:58:50', '2024-05-16 16:58:50'),
(27123, 'en', 'payouts', 'Payouts', '2024-05-16 16:58:50', '2024-05-16 16:58:50'),
(27124, 'en', 'this_will_be_used_for_homepage_category_wise_product_show', 'This will be used for homepage category wise product Show.', '2024-05-16 17:02:29', '2024-05-16 17:02:29'),
(27125, 'en', 'cash_on_delivery_option_is_disabled_activate_this_feature_from_here', 'Cash On Delivery option is disabled. Activate this feature from here', '2024-05-16 17:02:29', '2024-05-16 17:02:29'),
(27126, 'en', 'large_banner', 'Large Banner', '2024-05-16 17:02:50', '2024-05-16 17:02:50'),
(27127, 'en', 'small_banner', 'Small Banner', '2024-05-16 17:02:50', '2024-05-16 17:02:50'),
(27128, 'en', 'products_background_color', 'Products background color', '2024-05-16 17:02:50', '2024-05-16 17:02:50'),
(27129, 'en', 'top_12', 'Top 12', '2024-05-16 17:02:50', '2024-05-16 17:02:50'),
(27130, 'en', 'top_brands_max_12', 'Top Brands (Max 12)', '2024-05-16 17:02:50', '2024-05-16 17:02:50'),
(27131, 'en', 'picked_up', 'Picked Up', '2024-05-16 17:03:02', '2024-05-16 17:03:02'),
(27132, 'en', 'total_customer', 'Total Customer', '2024-05-16 17:28:05', '2024-05-16 17:28:05'),
(27133, 'en', 'top_customers', 'Top Customers', '2024-05-16 17:28:05', '2024-05-16 17:28:05'),
(27134, 'en', 'sellers_products', 'Sellers Products', '2024-05-16 17:28:05', '2024-05-16 17:28:05'),
(27135, 'en', 'total_category', 'Total Category', '2024-05-16 17:28:05', '2024-05-16 17:28:05'),
(27136, 'en', 'total_brands', 'Total Brands', '2024-05-16 17:28:05', '2024-05-16 17:28:05'),
(27137, 'en', 'top_brands', 'Top Brands', '2024-05-16 17:28:05', '2024-05-16 17:28:05'),
(27138, 'en', 'total_sales', 'Total Sales', '2024-05-16 18:23:12', '2024-05-16 18:23:12'),
(27139, 'en', 'sales_this_month', 'Sales this month', '2024-05-16 18:23:12', '2024-05-16 18:23:12'),
(27140, 'en', 'sales_stat', 'Sales Stat', '2024-05-16 18:23:12', '2024-05-16 18:23:12'),
(27141, 'en', 'inhouse_sales', 'In-house Sales', '2024-05-16 18:23:12', '2024-05-16 18:23:12'),
(27142, 'en', 'sellers_sales', 'Sellers Sales', '2024-05-16 18:23:12', '2024-05-16 18:23:12'),
(27143, 'en', 'multivendor', 'multivendor', '2024-05-16 18:23:12', '2024-05-16 18:23:12'),
(27144, 'en', 'activate_vendor_system', 'Activate Vendor System', '2024-05-16 18:23:12', '2024-05-16 18:23:12'),
(27145, 'en', 'total_order', 'Total Order', '2024-05-16 18:23:12', '2024-05-16 18:23:12'),
(27146, 'en', 'pending_order', 'Pending order', '2024-05-16 18:23:12', '2024-05-16 18:23:12'),
(27147, 'en', 'confirmed_order', 'Confirmed Order', '2024-05-16 18:23:12', '2024-05-16 18:23:12'),
(27148, 'en', 'processed_order', 'Processed Order', '2024-05-16 18:23:13', '2024-05-16 18:23:13'),
(27149, 'en', 'order_shipped', 'Order Shipped', '2024-05-16 18:23:13', '2024-05-16 18:23:13'),
(27150, 'en', 'inhouse_top_category', 'In-house Top Category', '2024-05-16 18:23:13', '2024-05-16 18:23:13'),
(27151, 'en', 'by_sales', 'By Sales', '2024-05-16 18:23:13', '2024-05-16 18:23:13'),
(27152, 'en', 'today', 'Today', '2024-05-16 18:23:13', '2024-05-16 18:23:13'),
(27153, 'en', 'week', 'Week', '2024-05-16 18:23:13', '2024-05-16 18:23:13'),
(27154, 'en', 'month', 'Month', '2024-05-16 18:23:13', '2024-05-16 18:23:13'),
(27155, 'en', 'inhouse_top_brands', 'In-house Top Brands', '2024-05-16 18:23:13', '2024-05-16 18:23:13'),
(27156, 'en', 'inhouse_store', 'In-house Store', '2024-05-16 18:23:13', '2024-05-16 18:23:13'),
(27157, 'en', 'all_inhouse_orders', 'All In-house Orders', '2024-05-16 18:24:38', '2024-05-16 18:24:38'),
(27158, 'en', 'inhouse_product', 'In-house product', '2024-05-16 18:24:38', '2024-05-16 18:24:38'),
(27159, 'en', 'yearly_sales', 'Yearly Sales', '2024-05-16 18:28:35', '2024-05-16 18:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `file_original_name` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `external_link` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `file_original_name`, `file_name`, `user_id`, `file_size`, `extension`, `type`, `external_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'broccoli-1-pcs', 'uploads/all/Hy3ZN9hqfqwv4pmAo2N7nq5nITV7uGVpVxROwztu.webp', 9, 22462, 'webp', 'image', NULL, '2024-01-11 10:59:38', '2024-01-11 10:59:38', NULL),
(2, 'fulkopi-cauliflower-1-pcs', 'uploads/all/9d6V6LUq9urhzIzpKR90TXl8nyUYDFNhJVDGm0pJ.webp', 9, 11286, 'webp', 'image', NULL, '2024-01-16 16:16:28', '2024-01-16 16:16:28', NULL),
(3, 'patacopy', 'uploads/all/NoXfOkL3cuTxnmo7cZpbUH1tGvDafBCsbPUsCjCm.webp', 9, 15644, 'webp', 'image', NULL, '2024-01-16 17:48:21', '2024-01-16 17:48:21', NULL),
(4, 'china-orange-40-gm-800-gm', 'uploads/all/2T3NLntaWB1nxmJY7ffUsbJH3ij3Qzs8KOCRXnkD.webp', 9, 11808, 'webp', 'image', NULL, '2024-05-16 16:40:53', '2024-05-16 16:40:53', NULL),
(5, 'IMG_0774', 'uploads/all/QaGAKNqONgewKT3s7lZRK5kI7MTashdv4ssABkKs.mov', 9, 37884436, 'mov', 'video', NULL, '2024-05-25 16:48:23', '2024-05-25 16:48:23', NULL),
(6, '0170641_sensodyne-fresh-mint-toothpaste-75gm', 'uploads/all/SkpisTng9wO3WWBDDAzMD2qUeyikRxwRBkDVhVOp.jpg', 9, 38445, 'jpg', 'image', NULL, '2024-05-25 16:49:01', '2024-05-25 16:49:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(9) UNSIGNED NOT NULL,
  `referred_by` int(11) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `provider_id` varchar(50) DEFAULT NULL,
  `refresh_token` text DEFAULT NULL,
  `access_token` longtext DEFAULT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'customer',
  `name` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_code` text DEFAULT NULL,
  `new_email_verificiation_code` text DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  `avatar` varchar(256) DEFAULT NULL,
  `avatar_original` varchar(256) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `balance` double(20,2) NOT NULL DEFAULT 0.00,
  `banned` tinyint(4) NOT NULL DEFAULT 0,
  `referral_code` varchar(255) DEFAULT NULL,
  `customer_package_id` int(11) DEFAULT NULL,
  `remaining_uploads` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `referred_by`, `provider`, `provider_id`, `refresh_token`, `access_token`, `user_type`, `name`, `email`, `email_verified_at`, `verification_code`, `new_email_verificiation_code`, `password`, `remember_token`, `device_token`, `avatar`, `avatar_original`, `address`, `country`, `state`, `city`, `postal_code`, `phone`, `balance`, `banned`, `referral_code`, `customer_package_id`, `remaining_uploads`, `created_at`, `updated_at`) VALUES
(3, NULL, NULL, NULL, NULL, NULL, 'seller', 'Mr. Seller', 'seller@example.com', '2018-12-11 18:00:00', NULL, NULL, '$2y$10$eUKRlkmm2TAug75cfGQ4i.WoUbcJ2uVPqUlVkox.cv4CCyGEIMQEm', 'GINywe8dds1cOqUAWuDMrkTss2DdqeXVRif3zJnhzu4Ezlpv5S58OXGFq2Lj', NULL, 'https://lh3.googleusercontent.com/-7OnRtLyua5Q/AAAAAAAAAAI/AAAAAAAADRk/VqWKMl4f8CI/photo.jpg?sz=50', NULL, 'Demo address', 'US', NULL, 'Demo city', '1234', NULL, 0.00, 0, '3dLUoHsR1l', NULL, NULL, '2018-10-07 04:42:57', '2020-03-05 01:33:22'),
(8, NULL, NULL, NULL, NULL, NULL, 'customer', 'Mr. Customer', 'customer@example.com', '2018-12-11 18:00:00', NULL, NULL, '$2y$10$eUKRlkmm2TAug75cfGQ4i.WoUbcJ2uVPqUlVkox.cv4CCyGEIMQEm', '3XqMzQHQgsOYKAeMRwfx4QKTebayNEqV4KEnLWUH2S9sjtsiKTccwDv4lHjQ', NULL, 'https://lh3.googleusercontent.com/-7OnRtLyua5Q/AAAAAAAAAAI/AAAAAAAADRk/VqWKMl4f8CI/photo.jpg?sz=50', NULL, 'Demo address', 'US', NULL, 'Demo city', '1234', NULL, 0.00, 0, '8zJTyXTlTT', NULL, NULL, '2018-10-07 04:42:57', '2020-03-03 04:26:11'),
(9, NULL, NULL, NULL, NULL, NULL, 'admin', 'Nurul', 'nurul4axiz@gmail.com', '2024-01-10 00:01:29', NULL, NULL, '$2y$10$4C7DBlOT/zpwHG7GnzOkzeruU7N7KElmEuqHLgNbXVUxoI5nSm8kO', 'bDNjOUYX3oPDqJELSvfz73clgK8PQmnhNVaxTOjRElj9uLwkV4h1dvyVByuL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0, NULL, NULL, 0, '2024-01-10 00:25:29', '2024-01-10 00:25:29'),
(10, NULL, NULL, NULL, NULL, NULL, 'customer', 'fghfgh', NULL, NULL, NULL, NULL, '$2y$10$fKKkh6AnN9uF5oVh7cvBNO1.RaH15Za/L5ZLWd.LFfsxOpwn4J..2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01733033117', 0.00, 0, NULL, NULL, 0, '2024-04-23 18:01:43', '2024-04-23 18:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_details` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_translations`
--
ALTER TABLE `brand_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_settings`
--
ALTER TABLE `business_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firebase_notifications`
--
ALTER TABLE `firebase_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_deals`
--
ALTER TABLE `flash_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_deal_products`
--
ALTER TABLE `flash_deal_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_deal_translations`
--
ALTER TABLE `flash_deal_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_categories`
--
ALTER TABLE `home_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_configurations`
--
ALTER TABLE `otp_configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `tags` (`tags`(255)),
  ADD KEY `unit_price` (`unit_price`),
  ADD KEY `created_at` (`created_at`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `role_translations`
--
ALTER TABLE `role_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searches`
--
ALTER TABLE `searches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_templates`
--
ALTER TABLE `sms_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand_translations`
--
ALTER TABLE `brand_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_settings`
--
ALTER TABLE `business_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4122;

--
-- AUTO_INCREMENT for table `firebase_notifications`
--
ALTER TABLE `firebase_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_deals`
--
ALTER TABLE `flash_deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_deal_products`
--
ALTER TABLE `flash_deal_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_deal_translations`
--
ALTER TABLE `flash_deal_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_categories`
--
ALTER TABLE `home_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `otp_configurations`
--
ALTER TABLE `otp_configurations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_translations`
--
ALTER TABLE `role_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `searches`
--
ALTER TABLE `searches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sms_templates`
--
ALTER TABLE `sms_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27160;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
