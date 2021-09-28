-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2021 at 10:51 AM
-- Server version: 5.7.35
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keshavvp_Defy_Insurance`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_interests`
--

CREATE TABLE `additional_interests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `additional_interests`
--

INSERT INTO `additional_interests` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Type', NULL, NULL),
(2, 'Full Name', NULL, NULL),
(3, 'Address 1', NULL, NULL),
(4, 'Address 2', NULL, NULL),
(5, 'City', NULL, NULL),
(6, 'State', NULL, NULL),
(7, 'Zip', NULL, NULL),
(8, 'Location #', NULL, NULL),
(9, 'Building #', NULL, NULL),
(10, 'Reason for Interest', NULL, NULL),
(11, 'Item Class', NULL, NULL),
(12, 'Item #', NULL, NULL),
(13, 'Item Description', NULL, NULL),
(14, 'Interest Requires', NULL, NULL),
(15, 'Reference / Loan Number', NULL, NULL),
(16, 'Phone Number', NULL, NULL),
(17, 'Fax Number', NULL, NULL),
(18, 'Email Address', NULL, NULL),
(19, 'Preferred Distribution Method for Certificates / Evidence of Insurance', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$EuIcmAZF2Zec6BgySfPmyOpSo6BEDperYIdmDBQ6sMd9.o2uYMwwK', 'admin@admin.com', 'lu7gn3vj1Ahp9cdPViN5wClVkMO6FFUeYu2AUAgMycWE1Y8uZeOvHzsm21Kz', '2020-06-06 02:49:05', '2020-07-25 02:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `logo`, `name`, `email`, `password`, `phone`, `address`, `city`, `state`, `zip`, `country`, `contact_name`, `contact_email`, `contact_phone`, `theme_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '9499Metlife1.png', 'Met Life', 'keshavprogrammer2@gmail.com', '$2y$10$X/JkDPqoitWL/qUJ9/kAKuTgvO60.59raqFs.7FWmKBe0Ytr0KxuS', '+1 0214755666821122', '415 Stockton St21122', 'San Fransisco21122', 'CA21122', '750021122', 'United States21122', 'Amit21122', '21122keshav@gmail.com', '0112233445521122', 3, 1, 'CHlwOnaKGJbSLh6wBzVL2RWunrDp0lsB1AKlWIyxBqee1pRWS0wHHC5vrVch', '2020-06-12 00:52:14', '2021-05-03 07:01:24'),
(2, '6019unnamed.jpg', 'Euro Life', 'agency2@gmail.co', '$2y$10$Fog61bQ.XDqauiB/cxhSueEl93sEY5jn0fIg9ZawOisfm7tD4MCJ.', '01122334455', 'test address', 'Rajkot', 'Gujrat', '360001', 'India', 'Keshav', 'keshav@gmail.com', '1599511590', 2, 1, 'RwRPGq2VNc7kOezA7HNQniuedf9RvNVox3dRS4RqneGGiGVZcO1tvnrFcHmD', '2020-06-20 03:11:51', '2021-05-03 07:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agenc_id` int(11) NOT NULL,
  `join_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `w9_file` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_file` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eno_file` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `photo`, `name`, `phone`, `email`, `password`, `birth_date`, `address`, `city`, `state`, `zip`, `country`, `agenc_id`, `join_date`, `status`, `w9_file`, `license_file`, `eno_file`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, '3156download.jpg', 'Paula Williams', '+1 0214755666811', 'keshavprogrammer2@gmail.com', '$2y$10$JIMKihIbZkSftQ73Q29TUOVmwCK652mTpsKy/uOJ32CpmRUq/5Oza', '1987-02-04', '415 Stockton St11111', 'San Fransisco11', 'CA11', '750011', 'United States11', 2, '2020-06-18', 1, NULL, NULL, NULL, NULL, '2020-06-16 06:30:58', '2020-08-18 05:27:32'),
(6, '57972.png', 'Test Agent 2', '1234567890', 'ta2@gmail.com', '$2y$10$NLQm4K13trSZLJvH8471JOBNXSltwGv8Q9mVBlumG6TQwCCrdw6K2', '2020-06-28', 'test', 'Dallas', 'Texas', '360001', 'United States', 1, '2020-07-09', 1, NULL, NULL, NULL, NULL, '2020-07-09 06:10:46', '2021-08-13 22:34:13'),
(7, '8620ff_x20_008.jpg', 'AP Agent 11', '+919988776655', 'apa11@gmail.com', '$2y$10$duXBwjCZbaw3sVEyNH7oROh85Id8PntQAv7iBdCrSi04pD8j.B4De', '2020-06-28', 'Rajkot, Gujarat, India', 'Rajkot', 'Gujrat', '360001', 'India', 2, '2020-07-09', 1, NULL, NULL, NULL, NULL, '2020-07-09 06:21:21', '2020-07-09 06:21:46'),
(8, '', 'pdf', '1234567852', 'testpdf@gmail.com', '$2y$10$2XIzFyWGz3086g1cb8IzU.TBzKhEAbSPk6kAH26ALhxQpYS7EyUXi', '2021-08-01', 'test pdf', 'pdf', 'state pdf', '1236654', 'india', 1, '2021-08-25', 0, 'w9_file_44864341XXXXXXXXXX43_18-07-2021.PDF', 'license_file_81524341XXXXXXXXXX43_18-07-2021.PDF', 'eno_file_61454341XXXXXXXXXX43_18-07-2021.PDF', NULL, '2021-08-26 01:04:20', '2021-08-26 01:17:49'),
(9, '', 'admin', '123345548', 'keshavprogrammera2@gmail.com', '$2y$10$v8yV/A8vNT75XBlUUOjlQ.9E7Mx9B3GGrIqomO5OyhaqDEeBYtWOu', '2021-08-24', 'efeerw', 'fdd', 'sdfd', '848548', 'india', 1, '2021-08-10', 0, 'w9_file_36864341XXXXXXXXXX43_18-07-2021.PDF', 'license_file_43244341XXXXXXXXXX43_18-07-2021.PDF', 'eno_file_33554341XXXXXXXXXX43_18-07-2021.PDF', NULL, '2021-08-26 03:24:13', '2021-08-26 03:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `blogcategories`
--

CREATE TABLE `blogcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogcategories`
--

INSERT INTO `blogcategories` (`id`, `category_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Blog Category 1', 1, '2020-06-23 02:38:20', '2020-06-23 02:38:20'),
(2, 'Blog Cate 2', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` int(11) NOT NULL,
  `blog_title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `tags` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_publish` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `cate_id`, `blog_title`, `blog_image`, `description`, `tags`, `is_publish`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Blog 1', '', 'Test desc', 'tab1,tag2,tag3', 1, 1, NULL, NULL),
(2, 2, 'Blog 2', '44962.jpg', '<p>Test Desc</p>', 'tag1,tag2,tag3', 1, 1, '2020-06-24 08:28:43', '2020-06-24 08:28:43'),
(3, 1, 'Blog 3', '40022 (2).jpg', '<p>test</p>', 'tag1,tag2,tag3', 1, 1, '2020-06-24 08:30:12', '2020-06-24 08:30:12'),
(5, 1, 'Blog 11111133333', '8422ff_x20_008.jpg', '<p>afdsfdsfdsf</p>', 'tag1,tag2', 1, 1, '2020-06-25 01:09:00', '2020-06-25 01:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `channel_partners`
--

CREATE TABLE `channel_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agenc_id` int(11) NOT NULL,
  `contact_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `w9_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eno_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channel_partners`
--

INSERT INTO `channel_partners` (`id`, `photo`, `name`, `phone`, `email`, `password`, `address`, `city`, `state`, `zip`, `country`, `agenc_id`, `contact_name`, `contact_email`, `contact_phone`, `status`, `w9_file`, `license_file`, `eno_file`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, '36332.png', 'Channel Partner 11', '12345679011', 'cp11@gmail.com', '$2y$10$4HibVFyveJvChakAByFTyu2DVjXTYpmq3tFeda6nGecvZjTt10rMy', 'test address11', 'Dallas1', 'Texas1', '752051', 'United States1', 1, 'Cp Contact name 11', 'cpc11@gmail.com', '112233445511', 1, 'w9_file_73114341XXXXXXXXXX43_18-07-2021.PDF', 'license_file_18694341XXXXXXXXXX43_18-07-2021.PDF', 'eno_file_62394341XXXXXXXXXX43_18-07-2021.PDF', NULL, '2020-06-30 01:11:08', '2021-08-27 01:48:34'),
(3, '4151Nikon-1-V3-sample-photo.jpg', 'Channel Partner User 2222', '096385274152222', 'keshav@gmail.com', '$2y$10$nHZV6iyM./L3s4uwPR1zpu.kmql2a3I5KRDtMELcb5QEc3ifCA12S', 'test22', 'San Fransisco22', 'CA22', 'L6A 0J822', 'United States222', 2, 'Keshav222', 'info@22.com', '0963852741522', 1, NULL, NULL, NULL, NULL, '2020-07-03 05:47:41', '2020-09-18 08:38:50'),
(4, '55642.png', 'Customer Three 3', '09988776655', 'Customer3@gmail.com', '$2y$10$djyMh4JBdyNky7yd/m/Il.A/CIZkZECkSibMIYekyO5klJC/tOhCC', 'Rajkot, Gujarat, India', 'Rajkot', 'Gujrat', '360001', 'India', 2, 'Paula', 'Customer2@gmail.com', '09988776655', 1, NULL, NULL, NULL, NULL, '2020-07-23 05:12:46', '2020-07-23 05:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `channel_partner_users`
--

CREATE TABLE `channel_partner_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agenc_id` int(11) DEFAULT NULL,
  `channel_partner_id` int(11) NOT NULL,
  `join_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `w9_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eno_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channel_partner_users`
--

INSERT INTO `channel_partner_users` (`id`, `photo`, `name`, `phone`, `email`, `password`, `birth_date`, `address`, `city`, `state`, `zip`, `country`, `agenc_id`, `channel_partner_id`, `join_date`, `status`, `w9_file`, `license_file`, `eno_file`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, '54662.jpg', 'Channel Partner User 22', '+1 0214755666822', 'cpu22@gmail.com', '$2y$10$4DNPDtePuENRL8itwtHTqu2n3ZNvnmUgxUp4j.FUP6xfhOw.2eplK', '1978-02-06', '415 Stockton St22', 'San Fransisco22', 'CA22', '750022', 'United States22', 1, 2, '2020-07-03', 1, NULL, NULL, NULL, NULL, '2020-07-03 05:49:17', '2020-07-03 05:51:10'),
(4, '60492.jpg', 'Customer Two', '09988776655', 'Customer2@gmail.com', '$2y$10$SDMmKiiMiyfMkjT/gdJs1uTRRKNsX1jL7OqCQaR/iM9tCuW9p7Xh2', '2020-06-28', 'Rajkot, Gujarat, India', 'Rajkot', 'Gujrat', '360001', 'India', 2, 3, '2020-07-24', 1, NULL, NULL, NULL, NULL, '2020-07-24 05:46:11', '2020-07-24 05:46:11'),
(5, '25612 (2).jpg', 'Paula Williams', '+1 02147556668', 'keshavprogrammer2@gmail.com', '$2y$10$61GuI3hlSelHlVBDhyOw/OdZq.TV333qgzxQAfmt2XIZqNn7.wHci', '2020-06-28', '415 Stockton St', 'San Fransisco', 'CA', '7500', 'United States', 2, 3, '2020-07-24', 1, NULL, NULL, NULL, NULL, '2020-07-24 05:47:49', '2020-07-24 05:47:49'),
(6, '38342.png', 'CPU1234', '12345678904', 'CPU1234@gmail.com', '$2y$10$dZD.H1v.fJijBA8KC9Vl1e1vfkBWXX2hBqAXKouLS9nGK.DBrlrke', '2020-09-01', '415 Stockton St4', 'San Fransisco4', 'CA4', '75004', 'United States', 2, 3, '2020-09-16', 1, NULL, NULL, NULL, 'eRJhMkzYc2wyTiuLVjpyclssUcs9WcpoZjPl3vL3f1VO2WGokKTShsDe2waF', '2020-09-16 02:25:37', '2020-09-21 02:28:00'),
(7, '', 'chanel', '1234567890', 'partneruser@gmail.com', '$2y$10$TevhbP8mPv3d1k3Nfu7RE.urzg45Ey9AWYvX8P1lhp3gVeuFlItJK', '2021-08-18', 'ere', 'rere', 're', '555555', 'wew', NULL, 3, '2021-08-19', 1, NULL, NULL, NULL, NULL, '2021-08-21 01:38:03', '2021-08-21 01:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agenc_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL DEFAULT '0',
  `subagent_id` int(11) DEFAULT NULL,
  `channel_partner_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fname`, `lname`, `phone`, `email`, `birth_date`, `address`, `city`, `state`, `zip`, `country`, `agenc_id`, `agent_id`, `subagent_id`, `channel_partner_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mark', 'William', '1234567890', 'mark@gmail.com', '2000-06-01', 'Test Address', 'Dallas', 'Texass', '75001', 'USA', 2, 5, 3, 4, NULL, '2020-07-14 03:55:59', '2020-07-14 03:55:59'),
(3, 'Paula', 'Williams', '+1 02147556668', 'keshavprogrammer2@gmail.com', '2020-07-14', '415 Stockton St', 'San Fransisco', 'CA', '7500', 'United States', 2, 7, NULL, 3, NULL, '2020-07-14 03:55:59', '2020-07-14 03:55:59'),
(4, 'Mark', 'Roger', '1234567890', 'mark@gmail.com', '0000-00-00', '415 Stockton St', 'San Fransisco', 'CA', '7500', 'United States', 2, 7, NULL, 3, NULL, '2020-07-14 04:12:52', '2020-07-14 04:12:52'),
(5, 'Paula', 'Williams', '+1 02147556668', 'keshavprogrammer2@gmail.com', '2000-02-06', '415 Stockton St', 'San Fransisco', 'CA', '7500', 'United States', 2, 5, 3, NULL, NULL, '2020-08-20 01:11:18', '2020-08-20 01:34:01'),
(6, 'Customer Lead New 1', 'Two', '09638527415', 'keshavprogrammer1111@gmail.com', '0000-00-00', NULL, NULL, NULL, NULL, NULL, 2, 5, 3, NULL, NULL, '2020-09-10 06:07:21', '2020-09-10 06:07:21'),
(7, 'Mark', 'Roger', '1234567890', 'mark@gmail.com', '0000-00-00', NULL, NULL, NULL, NULL, NULL, 2, 5, 3, NULL, NULL, '2020-09-11 06:13:03', '2020-09-11 06:13:03'),
(8, 'AP !!!!!!!!!', 'AP !!!!!!!!!', '09988776655', 'Customer2@gmail.com', '1899-11-01', 'test, test', 'Dallas', 'Texas', '360001', 'USA', 2, 5, 3, NULL, NULL, '2020-09-11 06:27:25', '2020-09-11 07:00:35'),
(9, 'Paula 123', 'Paula 123', '02142360558', 'keshavprogrammer22222@gmail.com', '2020-09-02', '4514 Cole Ave., Suite 600', 'Dallas', 'Texas', '75205', 'India', 2, 5, 3, NULL, NULL, '2020-09-11 07:00:54', '2020-09-11 07:00:54'),
(10, 'Smith', 'John', '9876543213', 'smith@gmail.com', '2007-06-05', 'Address 1', 'Franch', 'Franch', '897658', 'frnch', 2, 5, 4, NULL, NULL, '2021-05-11 02:37:43', '2021-05-11 02:37:43'),
(11, 'Paula', 'Williams', '+1 02147556668', 'keshavprogrammer2@gmail.com', '2021-08-01', '415 Stockton St', 'San Fransisco', 'CA', '7500', 'United States', 1, 0, NULL, NULL, NULL, '2021-08-06 00:33:33', '2021-09-26 12:12:18'),
(12, 'test', 'client', '1234567890', 'testclient@gmail.com', '2021-08-14', 'test address', 'test', 'strate', '123456', 'india', 1, 6, NULL, NULL, NULL, '2021-08-13 23:22:59', '2021-08-13 23:22:59'),
(13, 'test', 'client', '1223232322', 'testclient@gmail.com', '2021-08-03', 'tres', 'derere', 'resr', '5235152', 'inida', 1, 6, 5, NULL, NULL, '2021-08-14 01:01:12', '2021-08-14 01:01:12'),
(14, 'test', 'client', '1234567890', 'subagentclient@gmail.com', '2021-08-03', 'sub agest', 'sy', 'dn', '452182', 'india', 2, 5, 1, NULL, NULL, '2021-08-19 08:04:30', '2021-08-19 08:04:30'),
(15, 'Zaydan', 'Boukili', '2019373385', 'aboukili@gmail.com', '0000-00-00', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2021-08-21 00:14:13', '2021-08-21 00:14:13'),
(16, 'Zaydan', 'Boukili', '2019373385', 'aboukili@gmail.com', '0000-00-00', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2021-08-21 00:15:21', '2021-08-21 00:15:21'),
(17, 'L1', 'L1', '123456132132', 'l1@gmail.com', '0000-00-00', NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, NULL, NULL, '2021-08-21 00:22:34', '2021-08-21 00:22:34'),
(18, 'testee', 'teess', '23232323', 'teesstees@gmail.com', '0000-00-00', NULL, NULL, NULL, NULL, NULL, 2, 5, 1, NULL, NULL, '2021-08-21 00:40:40', '2021-08-21 00:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `client_policies`
--

CREATE TABLE `client_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `agency_id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `line_of_business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `policy_status` varchar(50) DEFAULT NULL,
  `policy` varchar(250) DEFAULT NULL,
  `effective_date` varchar(50) DEFAULT NULL,
  `expiration_date` varchar(50) DEFAULT NULL,
  `master_company` bigint(20) UNSIGNED DEFAULT NULL,
  `writing_company` bigint(20) UNSIGNED DEFAULT NULL,
  `billing_type` varchar(50) DEFAULT NULL,
  `rating_state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `original_agent_code` varchar(20) DEFAULT NULL,
  `override_agent_code` varchar(20) DEFAULT NULL,
  `agency_code` varchar(100) DEFAULT NULL,
  `referral_partner_code` varchar(20) DEFAULT NULL,
  `lead_source_id` bigint(20) UNSIGNED DEFAULT NULL,
  `written_premium` varchar(100) DEFAULT NULL,
  `estimated_fees` varchar(100) DEFAULT NULL,
  `estimated_taxes` varchar(100) DEFAULT NULL,
  `full_term_premium` varchar(100) DEFAULT NULL,
  `annual_premium` varchar(100) DEFAULT NULL,
  `total_commission` varchar(100) DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_team` varchar(50) DEFAULT NULL,
  `insured_information_pl_id` bigint(20) UNSIGNED DEFAULT NULL,
  `insured_information_cl_id` bigint(20) UNSIGNED DEFAULT NULL,
  `additional_interests_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_policies`
--

INSERT INTO `client_policies` (`id`, `client_id`, `agency_id`, `agent_id`, `line_of_business_id`, `policy_status`, `policy`, `effective_date`, `expiration_date`, `master_company`, `writing_company`, `billing_type`, `rating_state_id`, `original_agent_code`, `override_agent_code`, `agency_code`, `referral_partner_code`, `lead_source_id`, `written_premium`, `estimated_fees`, `estimated_taxes`, `full_term_premium`, `annual_premium`, `total_commission`, `department_id`, `service_team`, `insured_information_pl_id`, `insured_information_cl_id`, `additional_interests_id`, `description`, `created_at`, `updated_at`) VALUES
(3, 12, 1, 6, 12, 'New Business', 'dsds', '2021-08-09', '2021-08-21', 13, 15, 'Direct', 5, 'OPCC', 'OCCC', 'ewesd', 'RFPA', 4, 'xcdxzccxdsdssdsa', 'dfds', 'dsf', 'er', 'rer343', '343', 2, 'No rule matches', 18, 3, 13, 'description', '2021-08-13 23:50:29', '2021-08-14 00:21:31'),
(4, 13, 1, 5, 12, 'Reinstate', 'edfd', '2021-08-23', '2021-08-28', 2, 12, 'Agency', 17, 'OPCB', 'OCCB', 'wer', 'RFPB', 8, 'rew', '343', '3', '343', '3433434', '343', 6, 'No rule matches', 3, 9, 12, NULL, '2021-08-14 01:09:52', '2021-08-14 01:23:50'),
(5, 11, 1, NULL, 8, 'New Business', '452', '2021-08-02', '2021-08-25', 2, 7, 'Agency', 16, NULL, NULL, 'DW', 'RFPB', 2, 'SDSFD', '23', NULL, '2344', '444', '44', 2, 'Override', 2, 14, 13, NULL, '2021-08-26 06:33:05', '2021-09-26 12:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `client_policyplans`
--

CREATE TABLE `client_policyplans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `policy_type_id` int(11) NOT NULL,
  `policy_id` int(11) NOT NULL,
  `premium_price` double(8,2) NOT NULL,
  `start_date` date NOT NULL,
  `next_premium_date` date NOT NULL,
  `holder_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder_id_proof_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder_birth_date` date NOT NULL,
  `vehicle_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_engine_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_document_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agenc_id` int(11) NOT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_policyplans`
--

INSERT INTO `client_policyplans` (`id`, `client_id`, `policy_type_id`, `policy_id`, `premium_price`, `start_date`, `next_premium_date`, `holder_name`, `holder_id_proof_photo`, `holder_birth_date`, `vehicle_photo`, `vehicle_no`, `vehicle_engine_no`, `property_address`, `property_photo`, `property_document_photo`, `agenc_id`, `agent_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 3, 500.00, '2020-07-16', '2021-07-15', 'Mark Roger', '98462.png', '1987-02-06', '48892.jpg', NULL, NULL, NULL, '', '', 5, NULL, NULL, NULL, '2020-08-22 01:28:30'),
(2, 4, 1, 2, 500.00, '2020-07-17', '2021-07-16', 'test', '34762.png', '1990-02-06', '90112.png', '123123123123', '123123123123', 'test address', '86522.png', '52002.png', 2, NULL, NULL, '2020-07-17 07:56:02', '2020-07-18 04:24:31'),
(3, 3, 3, 4, 500.00, '2020-07-18', '2020-07-24', 'test', '83812.jpg', '2020-07-01', NULL, NULL, NULL, 'test address', '60222.jpg', '91612.jpg', 2, NULL, NULL, '2020-07-18 04:27:55', '2020-07-18 04:28:18'),
(4, 1, 3, 4, 5001.00, '2020-08-24', '2020-08-31', 'test', '5101bod_mainImg_01.jpg', '2020-08-01', NULL, NULL, NULL, 'test address', '90782.jpg', '78772 (2).jpg', 2, 3, NULL, '2020-08-24 06:49:28', '2020-09-12 02:02:37'),
(5, 1, 1, 6, 121.00, '2020-09-01', '2020-09-30', 'test', '2733ff_x20_008.jpg', '2020-09-01', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2020-09-12 02:03:55', '2020-09-12 02:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1st Auto & Casualty Insurance Company', NULL, NULL),
(2, 'AAA - Auto Club Group', NULL, NULL),
(3, 'AAA - Insurance Link', NULL, NULL),
(4, 'AAA Carolina', NULL, NULL),
(5, 'AAA Insurance', NULL, NULL),
(6, 'Acceptance Insurance', NULL, NULL),
(7, 'Access Home Insurance Company', NULL, NULL),
(8, 'ACUITY Insurance', NULL, NULL),
(9, 'Adirondack Insurance Exchange', NULL, NULL),
(10, 'Ag Workers Mutual Auto', NULL, NULL),
(11, 'Agency Insurance Company', NULL, NULL),
(12, 'Alert Auto Insurance Company', NULL, NULL),
(13, 'Alinsco Annual Savings', NULL, NULL),
(14, 'Alinsco Bravo', NULL, NULL),
(15, 'Alinsco Enhanced', NULL, NULL),
(16, 'Alinsco Select', NULL, NULL),
(17, 'Alinsco Zoom', NULL, NULL),
(18, 'Allegany Co-op Insurance Company', NULL, NULL),
(19, 'Allied Trust Insurance Company', NULL, NULL),
(20, 'Allstate', NULL, NULL),
(21, 'Allstate Insurance Company', NULL, NULL),
(22, 'Allstate Insurance Property', NULL, NULL),
(23, 'American Commerce Insurance Company', NULL, NULL),
(24, 'American Integrity', NULL, NULL),
(25, 'American Traditions/Modern USA Insurance Company AmShield', NULL, NULL),
(26, 'AmWins', NULL, NULL),
(27, 'AmWINS Freedom', NULL, NULL),
(28, 'AmWINS Star', NULL, NULL),
(29, 'Anchor General Gemini', NULL, NULL),
(30, 'Anchor General Motorclub', NULL, NULL),
(31, 'Anchor General Platinum', NULL, NULL),
(32, 'Anchor Property and Casualty', NULL, NULL),
(33, 'Andover Companies', NULL, NULL),
(34, 'ARI(American Risk Insurance)', NULL, NULL),
(35, 'Arrowhead Everest', NULL, NULL),
(36, 'Arrowhead Falls Lake', NULL, NULL),
(37, 'ASI Select Auto Insurance Corp', NULL, NULL),
(38, 'AspenMGA Limited', NULL, NULL),
(39, 'AspenMGA Standard', NULL, NULL),
(40, 'Aspire Advantage', NULL, NULL),
(41, 'Aspire Savings', NULL, NULL),
(42, 'Aspire Savings Annual', NULL, NULL),
(43, 'AssuranceAmerica', NULL, NULL),
(44, 'Atlas General Agency/Colonial Lloyds', NULL, NULL),
(45, 'Atlas/Spinnaker Ins Co.', NULL, NULL),
(46, 'Atlas/Spinnaker Ins Co. - OBSOLETE', NULL, NULL),
(47, 'Austin Mutual', NULL, NULL),
(48, 'Auto-Owners', NULL, NULL),
(49, 'Auto-Owners Insurance Company', NULL, NULL),
(50, 'Avatar Property & Casualty Insurance', NULL, NULL),
(51, 'Badger Mutual Insurance Company', NULL, NULL),
(52, 'Balboa Insurance Company', NULL, NULL),
(53, 'Bamboo Insurance', NULL, NULL),
(54, 'Bankers Insurance Company', NULL, NULL),
(55, 'Bankers Insurance Group', NULL, NULL),
(56, 'Bear River Mutual', NULL, NULL),
(57, 'Bear River Mutual Ins Co', NULL, NULL),
(58, 'Berkshire Hathaway GUARD', NULL, NULL),
(59, 'Brethren Mutual Insurance Company', NULL, NULL),
(60, 'Bristol West', NULL, NULL),
(61, 'Buckeye Insurance Group', NULL, NULL),
(62, 'Bunker Hill Insurance', NULL, NULL),
(63, 'Cabrillo - US Coastal P&C', NULL, NULL),
(64, 'Cabrillo Coastal', NULL, NULL),
(65, 'Cabrillo Coastal - Surplus', NULL, NULL),
(66, 'Cabrillo Coastal - US Coastal', NULL, NULL),
(67, 'California Automobile Insurance Company (CAIC)', NULL, NULL),
(68, 'Capital Insurance Group', NULL, NULL),
(69, 'Capitol Insurance Company', NULL, NULL),
(70, 'Capitol Preferred Insurance Company', NULL, NULL),
(71, 'Casualty Underwriters Insurance Company', NULL, NULL),
(72, 'Celina Home Security', NULL, NULL),
(73, 'Central Mutual Of Ohio', NULL, NULL),
(74, 'Chautauqua Patrons Insurance Company', NULL, NULL),
(75, 'Cincinnati Insurance', NULL, NULL),
(76, 'Clea mover', NULL, NULL),
(77, 'Columbia Insurance Group New', NULL, NULL),
(78, 'Commonwealth', NULL, NULL),
(79, 'Community Mutual', NULL, NULL),
(80, 'Concord Group Insurance', NULL, NULL),
(81, 'Connect Banner TX', NULL, NULL),
(82, 'Connect Banner UT', NULL, NULL),
(83, 'Consumers Insurance', NULL, NULL),
(84, 'Cornerstone National Insurance', NULL, NULL),
(85, 'Countryway Insurance', NULL, NULL),
(86, 'Countryway Insurance Co', NULL, NULL),
(87, 'Cover Insurance', NULL, NULL),
(88, 'CAE Insurance Group', NULL, NULL),
(89, 'Cumberland Insurance Group', NULL, NULL),
(90, 'Cypress Property & Casualty Insurance Company', NULL, NULL),
(91, 'Cypress Property & Casualty Insurance Company-TX', NULL, NULL),
(92, 'Dairyland Insurance', NULL, NULL),
(93, 'Dairyland Insurance (Viking)', NULL, NULL),
(94, 'Donegal', NULL, NULL),
(95, 'Donegal Insurance', NULL, NULL),
(96, 'DonegalInsurance', NULL, NULL),
(97, 'Drive Insurance', NULL, NULL),
(98, 'DwellingFireCarriersTab', NULL, NULL),
(99, 'Edison Insurance Company', NULL, NULL),
(100, 'Electric', NULL, NULL),
(101, 'Electric Insurance Auto-AQUIRE', NULL, NULL),
(102, 'Electric Insurance Home-AQUIRE', NULL, NULL),
(103, 'Electric Insurance-PolicyCenter', NULL, NULL),
(104, 'Elements Property Insurance Company(EPIC)', NULL, NULL),
(105, 'Embark General', NULL, NULL),
(106, 'EMC Insurance Company', NULL, NULL),
(107, 'Encompass', NULL, NULL),
(108, 'Encompass Insurance', NULL, NULL),
(109, 'Encompass Insurance - Production', NULL, NULL),
(110, 'Encova Exceed', NULL, NULL),
(111, 'Enumclaw Insurance', NULL, NULL),
(112, 'Erie and Niagara Insurance Association', NULL, NULL),
(113, 'Excelsior Insurance Company', NULL, NULL),
(114, 'Explorer Insurance', NULL, NULL),
(115, 'Farmers Alliance', NULL, NULL),
(116, 'Farmers Fire Insurance Company', NULL, NULL),
(117, 'Farmers of Salem', NULL, NULL),
(118, 'FedNat Insurance Company', NULL, NULL),
(119, 'First American', NULL, NULL),
(120, 'First American P&C Ins Co', NULL, NULL),
(121, 'First American Specialty Insurance Company', NULL, NULL),
(122, 'First Chicago Insurance Company', NULL, NULL),
(123, 'First Chicago Insurance Company - First Program', NULL, NULL),
(124, 'First Chicago Insurance Company - Maverick Program', NULL, NULL),
(125, 'First Connect Insurance', NULL, NULL),
(126, 'Fitchburg Mutual', NULL, NULL),
(127, 'Florida Family Insurance', NULL, NULL),
(128, 'Florida Peninsula Insurance Company', NULL, NULL),
(129, 'Florida Specialty', NULL, NULL),
(130, 'Foremost Insurance Company, Grand Rapids Michigan', NULL, NULL),
(131, 'Founders Insurance', NULL, NULL),
(132, 'Frankenmuth Mutual Insurance Company', NULL, NULL),
(133, 'Franklin Insurance Company', NULL, NULL),
(134, 'Fremont Insurance', NULL, NULL),
(135, 'Frontline Insurance', NULL, NULL),
(136, 'GAINSCO Auto Insurance', NULL, NULL),
(137, 'General Casualty Insurance Companies', NULL, NULL),
(138, 'Germania Insurance', NULL, NULL),
(139, 'Germantown Mutual Insurance Company', NULL, NULL),
(140, 'GMAC', NULL, NULL),
(141, 'GMAC Insurance', NULL, NULL),
(142, 'GMAC New', NULL, NULL),
(143, 'Goodville Mutual', NULL, NULL),
(144, 'Grange Insurance', NULL, NULL),
(145, 'Grange Insurance Association', NULL, NULL),
(146, 'Grange Insurance-OH(Pilots)', NULL, NULL),
(147, 'Grange Package', NULL, NULL),
(148, 'Grinnell Compass', NULL, NULL),
(149, 'Grinnell Mutual', NULL, NULL),
(150, 'GuideOne Insurance', NULL, NULL),
(151, 'GuideOne Insurance New', NULL, NULL),
(152, 'Gulfstream Property & Casualty Insurance Company', NULL, NULL),
(153, 'Hallmark Insurance Company', NULL, NULL),
(154, 'Hanover', NULL, NULL),
(155, 'Hanover Connections', NULL, NULL),
(156, 'Hanover Tap Sales', NULL, NULL),
(157, 'Harbor Insurance Agency', NULL, NULL),
(158, 'Harleysville Insurance', NULL, NULL),
(159, 'Harleysville Mutual Insurance - OBSOLETE', NULL, NULL),
(160, 'Hartford', NULL, NULL),
(161, 'Hastings Mutual', NULL, NULL),
(162, 'Haulers Insurance Company', NULL, NULL),
(163, 'Hawkeye Security', NULL, NULL),
(164, 'Heritage Insurance', NULL, NULL),
(165, 'Hippo Insurance', NULL, NULL),
(166, 'Hippo Insurance Ak', NULL, NULL),
(167, 'Hochheim Prairie Insurance', NULL, NULL),
(168, 'HomeCarriersTab', NULL, NULL),
(169, 'Homeowners of America', NULL, NULL),
(170, 'Homeowners of America Ins Co.', NULL, NULL),
(171, 'Houston General Insurance Exchange', NULL, NULL),
(172, 'HRTGPortal', NULL, NULL),
(173, 'IFA Insurance Company', NULL, NULL),
(174, 'IFA New', NULL, NULL),
(175, 'Imperial Casualty', NULL, NULL),
(176, 'Imperial Fire Lk Casualty Insurance', NULL, NULL),
(177, 'Indiana Farmers Mutual', NULL, NULL),
(178, 'Indiana Farmers Mutual Insurance Company', NULL, NULL),
(179, 'Indiana Insurance', NULL, NULL),
(180, 'Infinity Insurance', NULL, NULL),
(181, 'Infinity Insurance Company', NULL, NULL),
(182, 'Infinity RSVP', NULL, NULL),
(183, 'Infinity Special', NULL, NULL),
(184, 'Insurors Indemnity', NULL, NULL),
(185, 'Integrity Insurance', NULL, NULL),
(186, 'Interbora Insurance Company', NULL, NULL),
(187, 'Iowa Mutual Insurance Company', NULL, NULL),
(188, 'Kemper Auto Alliance United', NULL, NULL),
(189, 'Kemper Auto gold RT', NULL, NULL),
(190, 'Kemper Auto Premier', NULL, NULL),
(191, 'Kemper Auto Premium', NULL, NULL),
(192, 'Kemper New', NULL, NULL),
(193, 'Kemper Personal Insurance', NULL, NULL),
(194, 'Kingstone Insurance', NULL, NULL),
(195, 'Kingstone Insurance Company', NULL, NULL),
(196, 'Legacy - Arizona Auto Ins. Co', NULL, NULL),
(197, 'Lemonade', NULL, NULL),
(198, 'Lexington Insurance Company', NULL, NULL),
(199, 'Liberty Mutual', NULL, NULL),
(200, 'Liberty Mutual Insurance', NULL, NULL),
(201, 'Liberty Northwest', NULL, NULL),
(202, 'Lighthouse', NULL, NULL),
(203, 'Lighthouse Insurance', NULL, NULL),
(204, 'Lititz Mutual', NULL, NULL),
(205, 'Livingston Mutual Insurance Company', NULL, NULL),
(206, 'Loudoun Mutual Insurance', NULL, NULL),
(207, 'Madison Mutual Insurance Company', NULL, NULL),
(208, 'Maidstone Insurance', NULL, NULL),
(209, 'Maidstone Insurance Company', NULL, NULL),
(210, 'Main Street America Group', NULL, NULL),
(211, 'Maison Insurance', NULL, NULL),
(212, 'MAPFRE', NULL, NULL),
(213, 'MAPFRE Group (CWIC)', NULL, NULL),
(214, 'MAPFRE Insurance', NULL, NULL),
(215, 'MAPFRE Insurance Company', NULL, NULL),
(216, 'MAPFRE Insurance Company of NY', NULL, NULL),
(217, 'MAPFRE Insurance XML', NULL, NULL),
(218, 'MAPFRE New Hampshire', NULL, NULL),
(219, 'MAPFRE Protection (CWIC)', NULL, NULL),
(220, 'MAPFRE Protection Validated Mileage', NULL, NULL),
(221, 'MAPFRE Road America Validated Mileage', NULL, NULL),
(222, 'MAPFRE Select (CWIC)', NULL, NULL),
(223, 'MAPFRF LISA', NULL, NULL),
(224, 'MAPFRE USA', NULL, NULL),
(225, 'MAPFRE/ACIC', NULL, NULL),
(226, 'Maryland Automobile Insurance Fund', NULL, NULL),
(227, 'MAX - MutualAid eXchange', NULL, NULL),
(228, 'Mendota', NULL, NULL),
(229, 'Mercer Insurance Group', NULL, NULL),
(230, 'Merchants Insurance Group', NULL, NULL),
(231, 'Mercury Auto Insurance', NULL, NULL),
(232, 'Mercury Dwelling Fire', NULL, NULL),
(233, 'Mercury Home Insurance', NULL, NULL),
(234, 'Mercury Insurance', NULL, NULL),
(235, 'Metlife - Demo CQ', NULL, NULL),
(236, 'MetLife Auto & Home - ARS', NULL, NULL),
(237, 'MetLife Auto & Home - Met360', NULL, NULL),
(238, 'Michigan Insurance Company', NULL, NULL),
(239, 'Michigan Millers Mutual Insurance Company', NULL, NULL),
(240, 'Mid-Continent Group', NULL, NULL),
(241, 'Middle Oak', NULL, NULL),
(242, 'Midwestern Indemnity', NULL, NULL),
(243, 'Mile Auto', NULL, NULL),
(244, 'MissionSelect Insurance Services', NULL, NULL),
(245, 'MMG Insurance Company', NULL, NULL),
(246, 'Monarch National Ins Co', NULL, NULL),
(247, 'Montgomery Insurance', NULL, NULL),
(248, 'Motor Club Insurance Company', NULL, NULL),
(249, 'Motorists Mutual Insurance Company', NULL, NULL),
(250, 'Mt. Washington Assurance', NULL, NULL),
(251, 'Mutual Benefit Group New', NULL, NULL),
(252, 'Nat Gen One Choic', NULL, NULL),
(253, 'NatGen Premier', NULL, NULL),
(254, 'National General', NULL, NULL),
(255, 'National General Insurance', NULL, NULL),
(256, 'National General One Choice', NULL, NULL),
(257, 'National General Summit Program', NULL, NULL),
(258, 'National General Value Program', NULL, NULL),
(259, 'Nationwide Insurance', NULL, NULL),
(260, 'Nationwide Private Client', NULL, NULL),
(261, 'NBIC', NULL, NULL),
(262, 'New Jersey Skylands Insurance Association', NULL, NULL),
(263, 'New York Central Mutual', NULL, NULL),
(264, 'NJ Skylands Insurance Association OneChoice', NULL, NULL),
(265, 'NLC Insurance Companies', NULL, NULL),
(266, 'Norfolk & DedhamiS Group', NULL, NULL),
(267, 'North Star Mutual', NULL, NULL),
(268, 'Northern Neck Insurance Company', NULL, NULL),
(269, 'NY Central Mutual', NULL, NULL),
(270, 'NYCM Standard', NULL, NULL),
(271, 'OBI Insurance', NULL, NULL),
(272, 'Occidental Fire and Casualty Company of NC', NULL, NULL),
(273, 'Occidental Insurance', NULL, NULL),
(274, 'Ohio Casualty', NULL, NULL),
(275, 'Ohio Casualty Paris - OBSOLETE', NULL, NULL),
(276, 'Ohio Mutual', NULL, NULL),
(277, 'Olympus Insurance Company', NULL, NULL),
(278, 'OMI Homeowners', NULL, NULL),
(279, 'Omni Insurance', NULL, NULL),
(280, 'Openly Inc', NULL, NULL),
(281, 'Oregon Mutual', NULL, NULL),
(282, 'Oregon Mutual Insurance', NULL, NULL),
(283, 'Pacific Specialty', NULL, NULL),
(284, 'Pacific Specialty Insurance Compa', NULL, NULL),
(285, 'Partners Mutual Insuranc', NULL, NULL),
(286, 'Patriot Insurance', NULL, NULL),
(287, 'Patriot Insurance Company', NULL, NULL),
(288, 'Patrons Oxford', NULL, NULL),
(289, 'Peerless', NULL, NULL),
(290, 'Pekin', NULL, NULL),
(291, 'Pekin Insurance', NULL, NULL),
(292, 'PEMCO Insurance', NULL, NULL),
(293, 'PEMCO Mutual Insurance Company', NULL, NULL),
(294, 'Peninsula Insurance Companies', NULL, NULL),
(295, 'Penn National Insurance', NULL, NULL),
(296, 'People\'s Trust Insurance Company', NULL, NULL),
(297, 'Personal Service Insurance', NULL, NULL),
(298, 'Pioneer State Mutual', NULL, NULL),
(299, 'Plymouth Rock Assurance', NULL, NULL),
(300, 'Plymouth Rock Assurance Corp', NULL, NULL),
(301, 'Preferred Mutual', NULL, NULL),
(302, 'Preferred Mutual Insurance Company', NULL, NULL),
(303, 'Prepared Insurance Company', NULL, NULL),
(304, 'Proformance Insurance Company', NULL, NULL),
(305, 'Progressive Insurance', NULL, NULL),
(306, 'Progressive Insurance Home', NULL, NULL),
(307, 'Providence Mutual Fire Insurance Company', NULL, NULL),
(308, 'QBE First', NULL, NULL),
(309, 'QBE First Insurance', NULL, NULL),
(310, 'QBE Regional', NULL, NULL),
(311, 'QBE Regional General Casualty XML', NULL, NULL),
(312, 'QBE Regional Unigard XML', NULL, NULL),
(313, 'Quincy Mutual', NULL, NULL),
(314, 'RAM Mutual Insurance Company', NULL, NULL),
(315, 'Republic', NULL, NULL),
(316, 'Republic Home', NULL, NULL),
(317, 'Rockford Mutual', NULL, NULL),
(318, 'Rockford Mutual Insurance Company', NULL, NULL),
(319, 'Rockingham Casualty Company', NULL, NULL),
(320, 'Safeco', NULL, NULL),
(321, 'Safeco - Demo CQ', NULL, NULL),
(322, 'Safeco Insurance', NULL, NULL),
(323, 'Safepoint Insurance', NULL, NULL),
(324, 'Safety Insurance Company', NULL, NULL),
(325, 'Safeway Insurance Company', NULL, NULL),
(326, 'SageSure Insurance Managers', NULL, NULL),
(327, 'Sawgrass Mutual', NULL, NULL),
(328, 'Secura Insurance', NULL, NULL),
(329, 'Security First Insurance', NULL, NULL),
(330, 'Selective Insurance', NULL, NULL),
(331, 'Selective Insurance New', NULL, NULL),
(332, 'Service Insurance Company', NULL, NULL),
(333, 'Southern County', NULL, NULL),
(334, 'Southern Fidelity Insurance Company', NULL, NULL),
(335, 'Southern Fidelity Property & Casualty', NULL, NULL),
(336, 'Southern Mutual Insurance Company', NULL, NULL),
(337, 'Southern Oak Insurance Company', NULL, NULL),
(338, 'Southern Trust', NULL, NULL),
(339, 'Southern Trust Insurance Company', NULL, NULL),
(340, 'St. Johns Insurance Company 4', NULL, NULL),
(341, 'Standard Mutual Insurance Company', NULL, NULL),
(342, 'Standard Mutual Insurance Company - XML', NULL, NULL),
(343, 'Star Casualty Insurance Company', NULL, NULL),
(344, 'State Auto Connect', NULL, NULL),
(345, 'State Auto Insurance Companies', NULL, NULL),
(346, 'Sterling Insurance Company', NULL, NULL),
(347, 'Stillwater', NULL, NULL),
(348, 'Stillwater Insurance Group', NULL, NULL),
(349, 'Stillwater Property & Casualty', NULL, NULL),
(350, 'Stonegate Insurance', NULL, NULL),
(351, 'Stonegate Insurance Company', NULL, NULL),
(352, 'Sublimity Insurance', NULL, NULL),
(353, 'Sublimity Insurance Company', NULL, NULL),
(354, 'Sun Coast Platinum', NULL, NULL),
(355, 'Test Vendor', NULL, NULL),
(356, 'Texas Ranger MCA', NULL, NULL),
(357, 'The Cumberland Insurance Group', NULL, NULL),
(358, 'The General', NULL, NULL),
(359, 'The Hearth', NULL, NULL),
(360, 'The Philadelphia Contributionship XML', NULL, NULL),
(361, 'The Woodlands Insurance Company (Twico)', NULL, NULL),
(362, 'Tower Group', NULL, NULL),
(363, 'Tower Group OneChoice', NULL, NULL),
(364, 'Tower Hill Insurance', NULL, NULL),
(365, 'Travelers', NULL, NULL),
(366, 'Travelers - Demo C', NULL, NULL),
(367, 'Travelers CCQ', NULL, NULL),
(368, 'Tri State Consumer Insurance Company', NULL, NULL),
(369, 'Tri-State Consumer Insurance Company', NULL, NULL),
(370, 'TWFG GA-Lloyds', NULL, NULL),
(371, 'TWFG Preferred Homeowners', NULL, NULL),
(372, 'TWFG Select Homeowners', NULL, NULL),
(373, 'TWICO', NULL, NULL),
(374, 'Unigard', NULL, NULL),
(375, 'Uniiard Home', NULL, NULL),
(376, 'Union Mutual', NULL, NULL),
(377, 'United Fire Group', NULL, NULL),
(378, 'United Heritage Property & Casualty Company', NULL, NULL),
(379, 'United Home', NULL, NULL),
(380, 'United Insurance Group', NULL, NULL),
(381, 'United Security Road Warrior', NULL, NULL),
(382, 'Universal North America', NULL, NULL),
(383, 'Universal Property & Casualty Insurance Company', NULL, NULL),
(384, 'Universal/Arrowhead Insurance company', NULL, NULL),
(385, 'UPC Insurance', NULL, NULL),
(386, 'Upload', NULL, NULL),
(387, 'USHC- Texas Ranger MGA', NULL, NULL),
(388, 'Utica First Insurance Company', NULL, NULL),
(389, 'Utica National Insurance', NULL, NULL),
(390, 'Utica National Insurance Group', NULL, NULL),
(391, 'Velocity FLEX', NULL, NULL),
(392, 'Velocity Risk Underwriters LLC', NULL, NULL),
(393, 'Velocity Risk Underwriters Personal Lines API', NULL, NULL),
(394, 'Vermont Mutual Insurance Company', NULL, NULL),
(395, 'Wadena Insurance Company', NULL, NULL),
(396, 'Wayne Mutual Insurance Company', NULL, NULL),
(397, 'Wellington Select', NULL, NULL),
(398, 'Wellington Standard', NULL, NULL),
(399, 'West Bend Mutual Insurance Company', NULL, NULL),
(400, 'Western National', NULL, NULL),
(401, 'Western Reserve Group', NULL, NULL),
(402, 'Westfield Insurance', NULL, NULL),
(403, 'Westfield Insurance XML', NULL, NULL),
(404, 'Weston Specialty', NULL, NULL),
(405, 'Wilson Mutual Insurance Company', NULL, NULL),
(406, 'Windhaven', NULL, NULL),
(407, 'Windhaven Check', NULL, NULL),
(408, 'Windhaven Windward / ICON', NULL, NULL),
(409, 'Wisconsin Mutual Insurance Company', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Agriculture(AGR)', NULL, NULL),
(2, 'Benefits(BEN)', NULL, NULL),
(3, 'Commerical Lines(C/L)', NULL, NULL),
(4, 'Finsncial Services', NULL, NULL),
(5, 'Group Benefits', NULL, NULL),
(6, 'Life Health and Annuities(LHA)', NULL, NULL),
(7, 'Personal Lines(P/L)', NULL, NULL),
(8, 'Surety(SUR)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Template 1', 1, '2020-08-01 10:39:56', '2020-08-01 10:39:56'),
(2, 'Template 2', 1, '2020-08-01 10:39:56', '2020-08-01 10:39:56'),
(3, 'Template 3', 1, '2020-08-01 10:39:56', '2020-08-01 10:39:56'),
(4, 'Template 4', 1, '2020-08-01 10:39:56', '2020-08-01 10:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Question 2', 'Description 2', 1, '2020-06-23 01:35:05', '2020-06-23 01:35:05'),
(3, 'Question 111', 'Description 111', 1, '2020-06-23 01:37:23', '2020-06-23 01:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `how_hear_abouts`
--

CREATE TABLE `how_hear_abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `how_hear_abouts`
--

INSERT INTO `how_hear_abouts` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'From Social Media', 1, '2020-06-06 02:49:05', '2020-06-06 02:49:05'),
(2, 'From Friend', 1, '2020-06-06 02:49:05', '2020-06-06 02:49:05'),
(3, 'From Google search', 1, '2020-06-06 02:49:05', '2020-06-06 02:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `insured_information_cl`
--

CREATE TABLE `insured_information_cl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insured_information_cl`
--

INSERT INTO `insured_information_cl` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'First Named Insured', NULL, NULL),
(2, 'Insured Name', NULL, NULL),
(3, 'Leagal Business Name', NULL, NULL),
(4, 'Mailing address 1', NULL, NULL),
(5, 'Mailing Adress 2', NULL, NULL),
(6, 'City', NULL, NULL),
(7, 'State', NULL, NULL),
(8, 'Zip', NULL, NULL),
(9, 'Website Address', NULL, NULL),
(10, 'Business Phone Number', NULL, NULL),
(11, 'Entity Type', NULL, NULL),
(12, 'Other Description', NULL, NULL),
(13, 'What is the nature of business?', NULL, NULL),
(14, 'What date did the business start?', NULL, NULL),
(15, 'FEIN or Social Security #', NULL, NULL),
(16, 'Describe The Primary Operations', NULL, NULL),
(17, 'Annual Revenues', NULL, NULL),
(18, 'Additional Insured', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `insured_information_pl`
--

CREATE TABLE `insured_information_pl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insured_information_pl`
--

INSERT INTO `insured_information_pl` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Prefix', NULL, NULL),
(2, 'Insured first name', NULL, NULL),
(3, 'Insured Middle name', NULL, NULL),
(4, 'Insured Last name', NULL, NULL),
(5, 'insured DOB', NULL, NULL),
(6, 'Mailing address 1', NULL, NULL),
(7, 'Mailing Adress 2', NULL, NULL),
(8, 'City', NULL, NULL),
(9, 'State', NULL, NULL),
(10, 'Zip', NULL, NULL),
(11, 'Gender', NULL, NULL),
(12, 'DOB', NULL, NULL),
(13, 'SSN', NULL, NULL),
(14, 'Driving License', NULL, NULL),
(15, 'Email', NULL, NULL),
(16, 'Phone#', NULL, NULL),
(17, 'Spouse First name', NULL, NULL),
(18, 'Spouse Last name', NULL, NULL),
(19, 'Spouse DOB', NULL, NULL),
(20, 'Marital Status', NULL, NULL),
(21, 'Industry', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agenc_id` int(11) NOT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `subagent_id` int(11) DEFAULT NULL,
  `channel_partner_id` int(11) DEFAULT NULL,
  `channel_partner_user_id` int(11) NOT NULL DEFAULT '0',
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insured_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lead_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xdate` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referal_partner` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lead_owner` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policyplan_id` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mark_opportunity` int(11) NOT NULL DEFAULT '0',
  `mark_client` int(11) NOT NULL DEFAULT '0',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `agenc_id`, `agent_id`, `subagent_id`, `channel_partner_id`, `channel_partner_user_id`, `fname`, `lname`, `phone`, `email`, `insured_name`, `lead_status`, `policy_type`, `xdate`, `referal_partner`, `lead_owner`, `policyplan_id`, `mark_opportunity`, `mark_client`, `notes`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 3, 3, 0, 'Mark', 'Roger', '1234567890', 'mark@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2', 1, 0, 'Test Note', NULL, NULL),
(3, 2, 7, NULL, NULL, 0, 'Mark', 'Roger', '1234567890', 'mark@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2', 1, 1, 'Test Note', '2020-07-10 07:50:39', '2020-07-14 04:12:52'),
(4, 2, 5, 3, 3, 0, 'Mark', 'Roger', '1234567890', 'mark@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2', 1, 1, 'Test Note', '2020-07-11 01:54:10', '2020-08-20 01:11:18'),
(5, 2, 5, 3, 4, 0, 'L1', 'L1', '123456132132', 'l1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 1, 'sadsfdsfdsfds', '2020-07-13 06:14:52', '2021-08-21 00:22:34'),
(6, 2, 5, 3, 3, 0, 'L1', 'L1', '123456132132', 'l1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '3', 1, 0, 'sadsfdsfdsfds', '2020-08-18 07:03:01', '2021-08-21 00:18:05'),
(12, 2, 5, 3, 3, 0, 'Customer Lead New 1', 'Two', '09638527415', 'keshavprogrammer1111@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '6', 0, 0, 'sdfdsfds', '2020-09-10 05:41:39', '2020-09-10 05:41:39'),
(13, 2, 5, 3, 3, 0, 'New Lead from Sub Agnet', 'New Lead from Sub Agnet', '123456789', 'nlsa@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '3,6', 1, 1, 'test note', '2020-09-11 06:19:18', '2020-09-11 06:27:25'),
(14, 2, NULL, NULL, 3, 0, 'CP Lead 123', 'CP Lead 123', '09988776655', 'CP123@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '3,6', 0, 0, 'dfdsfdsf', '2020-09-15 06:18:51', '2020-09-15 06:18:51'),
(15, 2, NULL, NULL, 3, 0, 'CP Lead 1234', 'CP Lead 1234', '1123121321', 'cp4444@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '3', 0, 0, 'dsfdsfdsf', '2020-09-15 06:23:41', '2020-09-15 06:23:41'),
(16, 2, NULL, NULL, 3, 6, 'My', 'Test', '1234567890', 'my.test@test.com', NULL, NULL, NULL, NULL, NULL, NULL, '3', 0, 0, 'test', '2020-09-25 17:33:35', '2020-09-25 17:33:35'),
(17, 2, 5, 4, NULL, 0, 'Smith', 'John', '9876543213', 'smith@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '3', 1, 0, 'Testing', '2021-05-11 00:56:54', '2021-05-11 00:56:54'),
(18, 1, NULL, NULL, NULL, 0, 'Zaydan', 'Boukili', '2019373385', 'aboukili@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 1, 'call client', '2021-08-20 05:48:37', '2021-08-21 00:15:21'),
(19, 2, 5, 1, NULL, 0, 'test', 'lead', '1234567890', 'testlead@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 'reste', '2021-08-21 00:38:01', '2021-08-21 00:38:01'),
(20, 2, 5, 1, NULL, 0, 'testee', 'teess', '23232323', 'teesstees@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 1, 'dfde', '2021-08-21 00:38:31', '2021-08-21 00:40:40'),
(21, 2, NULL, NULL, 4, 0, 'fkjsdkl', 'lkjelkj', '1234567892', 'kjdfslk@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 0, 'dsfsdf', '2021-08-21 00:44:33', '2021-08-21 00:44:33'),
(22, 2, NULL, NULL, 4, 0, 'terdfdf', 'dfdsere', '545548545', 'khkj@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, '\';kdf;l', '2021-08-21 00:44:53', '2021-08-21 00:44:53'),
(23, 1, 6, 5, NULL, 0, 'jhkj', 'hkj', 'kjhkjh', 'kjh@gmail.com', 'dffsddfd', '2', '2', '2021-08-25', 'kjh', 'kjh', '', 0, 0, 'kj', '2021-08-25 00:16:08', '2021-08-26 00:10:25'),
(24, 1, 6, 5, NULL, 0, 'user', 'rers', '235649956523', 'ddfd@gmail.com', 'test', 'New Business', '151', '2021-08-27', 'edfsds', NULL, '', 0, 0, 'fdsfds', '2021-08-26 00:21:53', '2021-08-26 00:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `lead_source`
--

CREATE TABLE `lead_source` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_source`
--

INSERT INTO `lead_source` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Qualified', NULL, NULL),
(2, 'Contact in Future', NULL, NULL),
(3, 'Contacted', NULL, NULL),
(4, 'Junk Lead', NULL, NULL),
(5, 'Lost Lead', NULL, NULL),
(6, 'Not contacted', NULL, NULL),
(7, 'Pre- Qualified', NULL, NULL),
(8, 'Not Qualified', NULL, NULL),
(9, 'X-dated', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `line_of_business`
--

CREATE TABLE `line_of_business` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line_of_business`
--

INSERT INTO `line_of_business` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Accidental D&D', NULL, NULL),
(2, 'Auto (Commercial)', NULL, NULL),
(3, 'Auto (Personal)', NULL, NULL),
(4, 'Boiler/Mach Sm Bus Pol', NULL, NULL),
(5, 'Bonds Miscellaneous', NULL, NULL),
(6, 'BOP Liability', NULL, NULL),
(7, 'BOP Property', NULL, NULL),
(8, 'Bumbershoot Marine Liability', NULL, NULL),
(9, 'Business Owners Policy', NULL, NULL),
(10, 'Cancer Insurance', NULL, NULL),
(11, 'Canine Liability', NULL, NULL),
(12, 'COBRA', NULL, NULL),
(13, 'Commercial Articles', NULL, NULL),
(14, 'Commercial Bond', NULL, NULL),
(15, 'Commercial Fire', NULL, NULL),
(16, 'Commercial Pkg', NULL, NULL),
(17, 'Commercial Prpty', NULL, NULL),
(18, 'Comprehensive Personal Liab', NULL, NULL),
(19, 'Computers', NULL, NULL),
(20, 'Condominium', NULL, NULL),
(21, 'Contr Equip Floater', NULL, NULL),
(22, 'Contractors Bond', NULL, NULL),
(23, 'Court Bonds', NULL, NULL),
(24, 'Crime', NULL, NULL),
(25, 'Critical Illness', NULL, NULL),
(26, 'Cyber Liability', NULL, NULL),
(27, 'Dental Insurance', NULL, NULL),
(28, 'Dental/Vision/Hearing Package', NULL, NULL),
(29, 'Difference in Conditions', NULL, NULL),
(30, 'Directors and Officers', NULL, NULL),
(31, 'Disability', NULL, NULL),
(32, 'Disability - Long Term', NULL, NULL),
(33, 'Disability - Short Term', NULL, NULL),
(34, 'Dishonest Bond', NULL, NULL),
(35, 'Drug Screening', NULL, NULL),
(36, 'Dwelling fire', NULL, NULL),
(37, 'Earthquake', NULL, NULL),
(38, 'Empl Practices Liab', NULL, NULL),
(39, 'Employers Liability', NULL, NULL),
(40, 'Equine', NULL, NULL),
(41, 'Equine Liability', NULL, NULL),
(42, 'Equipment Breakdown', NULL, NULL),
(43, 'ERISA Fidelity Bond', NULL, NULL),
(44, 'Errors and Omissions', NULL, NULL),
(45, 'Event Liability', NULL, NULL),
(46, 'Excess Flood', NULL, NULL),
(47, 'Excess Liability', NULL, NULL),
(48, 'Farm Fire', NULL, NULL),
(49, 'Farm Liability', NULL, NULL),
(50, 'Farm Umbrella', NULL, NULL),
(51, 'Farm Wind', NULL, NULL),
(52, 'FarmOwner', NULL, NULL),
(53, 'Fidelity', NULL, NULL),
(54, 'Fiduciary', NULL, NULL),
(55, 'Financial Service', NULL, NULL),
(56, 'Fine arts', NULL, NULL),
(57, 'Fire Arms Liability', NULL, NULL),
(58, 'Flexible Spending Account', NULL, NULL),
(59, 'Flood', NULL, NULL),
(60, 'Furriers Block', NULL, NULL),
(61, 'Garage and Dealers', NULL, NULL),
(62, 'Garage Bond', NULL, NULL),
(63, 'Genl Liability', NULL, NULL),
(64, 'Glass', NULL, NULL),
(65, 'Group', NULL, NULL),
(66, 'Group Dental', NULL, NULL),
(67, 'Group Disability', NULL, NULL),
(68, 'Group Health', NULL, NULL),
(69, 'Group Insurance', NULL, NULL),
(70, 'Group Life', NULL, NULL),
(71, 'Group Vision', NULL, NULL),
(72, 'Habitational Insurance', NULL, NULL),
(73, 'Hail', NULL, NULL),
(74, 'Health', NULL, NULL),
(75, 'Homeowners', NULL, NULL),
(76, 'Hospital Plan', NULL, NULL),
(77, 'Individual Retirement Account', NULL, NULL),
(78, 'Inland marine (comm)', NULL, NULL),
(79, 'Inland Marine (pers)', NULL, NULL),
(80, 'Instl/builders risk', NULL, NULL),
(81, 'International Liability', NULL, NULL),
(82, 'Internet Liability', NULL, NULL),
(83, 'Janitorial Bond', NULL, NULL),
(84, 'Jewelry', NULL, NULL),
(85, 'Judicial', NULL, NULL),
(86, 'Kidnap and Ransom', NULL, NULL),
(87, 'Legal Shield, Identity Theft', NULL, NULL),
(88, 'Lessor\'s Risk', NULL, NULL),
(89, 'Liability Gap', NULL, NULL),
(90, 'License & Permit', NULL, NULL),
(91, 'Licensing Bond', NULL, NULL),
(92, 'Life - Permanent', NULL, NULL),
(93, 'Life - Term', NULL, NULL),
(94, 'Liquor Liability', NULL, NULL),
(95, 'Livestock/Animal Mortality', NULL, NULL),
(96, 'Long Term Care', NULL, NULL),
(97, 'Malpractice', NULL, NULL),
(98, 'Manufacturers Output Policy', NULL, NULL),
(99, 'Marina Operator Legal Liab', NULL, NULL),
(100, 'Medicare Adv. Prescr Drug Plan', NULL, NULL),
(101, 'Medicare Advantage', NULL, NULL),
(102, 'Medicare Pres Drug Plan', NULL, NULL),
(103, 'Medicare Script', NULL, NULL),
(104, 'Medicare Supplement', NULL, NULL),
(105, 'Membership', NULL, NULL),
(106, 'Mexican Auto', NULL, NULL),
(107, 'Mine Subsidence', NULL, NULL),
(108, 'Misc Pro Liab', NULL, NULL),
(109, 'Miscellaneous', NULL, NULL),
(110, 'Mobile Homes', NULL, NULL),
(111, 'Modular Home', NULL, NULL),
(112, 'Mortgage Insurance', NULL, NULL),
(113, 'Motor Truck Cargo', NULL, NULL),
(114, 'Motorcycle', NULL, NULL),
(115, 'Mutual Fund', NULL, NULL),
(116, 'Non-Owned', NULL, NULL),
(117, 'Notary Bond', NULL, NULL),
(118, 'Occupational Accident Ins', NULL, NULL),
(119, 'Ocean Marine - Comm', NULL, NULL),
(120, 'Official Bond and Oath', NULL, NULL),
(121, 'Paid Family Leave', NULL, NULL),
(122, 'Performance Bond', NULL, NULL),
(123, 'Personal Liability', NULL, NULL),
(124, 'Personal pkg', NULL, NULL),
(125, 'Pet Insurance', NULL, NULL),
(126, 'Phys and Surg', NULL, NULL),
(127, 'Pollution Liability', NULL, NULL),
(128, 'Premium Financing', NULL, NULL),
(129, 'Prescription Drug Plan', NULL, NULL),
(130, 'Product Liability', NULL, NULL),
(131, 'Production plan hail ins', NULL, NULL),
(132, 'Professional Liab', NULL, NULL),
(133, 'Public Livery Insurance', NULL, NULL),
(134, 'Recreational Veh', NULL, NULL),
(135, 'Reinsurance', NULL, NULL),
(136, 'Renters', NULL, NULL),
(137, 'Retirementb', NULL, NULL),
(138, 'Roadside Assistance', NULL, NULL),
(139, 'Sched Prpty', NULL, NULL),
(140, 'Senior Health', NULL, NULL),
(141, 'Sheriff Bonds', NULL, NULL),
(142, 'Short Term Medical', NULL, NULL),
(143, 'Signs', NULL, NULL),
(144, 'Sm Farm/Ranch', NULL, NULL),
(145, 'Snowmobile', NULL, NULL),
(146, 'Special Events', NULL, NULL),
(147, 'Special multi-peril', NULL, NULL),
(148, 'Specified Health Plan', NULL, NULL),
(149, 'Surety Bond', NULL, NULL),
(150, 'Tailored Protection Policy', NULL, NULL),
(151, 'Terrorism', NULL, NULL),
(152, 'Title Bonds', NULL, NULL),
(153, 'Tow Truck', NULL, NULL),
(154, 'Transportation', NULL, NULL),
(155, 'Travel', NULL, NULL),
(156, 'Travel Trailer', NULL, NULL),
(157, 'Truckers', NULL, NULL),
(158, 'Umbrella - Comm', NULL, NULL),
(159, 'Umbrella - Personal', NULL, NULL),
(160, 'Underground Storage', NULL, NULL),
(161, 'Vacant Property', NULL, NULL),
(162, 'Vacation Property', NULL, NULL),
(163, 'Valuable papers', NULL, NULL),
(164, 'Warehouse Legal Liability', NULL, NULL),
(165, 'Warranty', NULL, NULL),
(166, 'Watercraft (small boat)', NULL, NULL),
(167, 'Wind policies', NULL, NULL),
(168, 'Workers comp', NULL, NULL),
(169, 'Workplace Violence', NULL, NULL),
(170, 'Yacht', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `marketing_emails`
--

CREATE TABLE `marketing_emails` (
  `id` bigint(20) NOT NULL,
  `agency_id` bigint(20) NOT NULL DEFAULT '0',
  `creater_id` bigint(20) NOT NULL DEFAULT '0',
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `string` varchar(4) DEFAULT NULL COMMENT 'l=lead, o=opportunity, c=client',
  `template_id` bigint(20) NOT NULL DEFAULT '0',
  `subject` varchar(50) DEFAULT NULL,
  `description` text,
  `is_sent` tinyint(4) NOT NULL DEFAULT '0',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_05_21_071442_create_admins_table', 1),
(2, '2020_05_26_064728_create_users_table', 1),
(3, '2020_05_26_070937_create_table_how_hear_abouts', 1),
(7, '2020_06_10_121155_create_themes_table', 3),
(8, '2020_06_10_101552_create_agencies_table', 4),
(11, '2020_06_15_071738_create_agents_table', 5),
(12, '2020_06_19_054751_create_subagents_table', 6),
(13, '2020_06_22_070007_create_policyplans_table', 7),
(14, '2020_06_23_063305_create_faqs_table', 8),
(18, '2020_06_23_071351_create_staticpages_table', 9),
(19, '2020_06_23_074744_create_blogcategories_table', 10),
(22, '2020_06_23_074744_create_blog_categories_table', 11),
(23, '2020_06_24_124804_create_blogs_table', 11),
(24, '2020_06_27_050432_create_channel_partners_table', 12),
(25, '2020_07_02_133732_create_channel_partner_users_table', 13),
(27, '2020_07_09_132225_create_leads_table', 14),
(28, '2020_07_14_085803_create_clients_table', 15),
(29, '2020_07_16_112022_create_policytypes_table', 16),
(31, '2020_07_16_115145_create_client_policyplans_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `policyplans`
--

CREATE TABLE `policyplans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agenc_id` int(11) NOT NULL DEFAULT '0',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy_type_id` int(10) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policyplans`
--

INSERT INTO `policyplans` (`id`, `agenc_id`, `logo`, `policy_type_id`, `title`, `description`, `published_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, '6181download.jpg', 1, 'Plan 2', 'sadfsafdsfdsfds', '2020-06-22', 1, '2020-06-22 02:15:22', '2020-06-22 02:15:22'),
(3, 2, '8489download.jpg', 2, 'Policy Plan 2', '<p>test</p>', '2020-07-01', 1, '2020-07-11 01:19:42', '2020-07-11 01:19:42'),
(4, 2, '89012.png', 3, 'Policy M 1', '<p>sdfsdfdsf</p>', '2020-07-15', 1, '2020-07-16 06:04:36', '2020-07-16 06:20:01'),
(6, 2, '4493IPXR0034_1.jpg', 1, 'Test Policy 123', '<p>Test Policy 123</p>', '2020-08-28', 1, '2020-08-28 07:24:47', '2020-08-28 07:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `policytypes`
--

CREATE TABLE `policytypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `policy_type_title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policytypes`
--

INSERT INTO `policytypes` (`id`, `policy_type_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mediclaim Policy', 1, NULL, NULL),
(2, 'Vehicle Policy', 1, NULL, NULL),
(3, 'Property Policy', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating_state`
--

CREATE TABLE `rating_state` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_state`
--

INSERT INTO `rating_state` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AL', NULL, NULL),
(2, 'AK', NULL, NULL),
(3, 'AZ', NULL, NULL),
(4, 'AR', NULL, NULL),
(5, 'CA', NULL, NULL),
(6, 'CO', NULL, NULL),
(7, 'CT', NULL, NULL),
(8, 'DE', NULL, NULL),
(9, 'FL', NULL, NULL),
(10, 'GA', NULL, NULL),
(11, 'HI', NULL, NULL),
(12, 'ID', NULL, NULL),
(13, 'IL', NULL, NULL),
(14, 'IN', NULL, NULL),
(15, 'IA', NULL, NULL),
(16, 'KS', NULL, NULL),
(17, 'KY', NULL, NULL),
(18, 'LA', NULL, NULL),
(19, 'ME', NULL, NULL),
(20, 'MD', NULL, NULL),
(21, 'MA', NULL, NULL),
(22, 'MI', NULL, NULL),
(23, 'MN', NULL, NULL),
(24, 'MS', NULL, NULL),
(25, 'MO', NULL, NULL),
(26, 'MT', NULL, NULL),
(27, 'NE', NULL, NULL),
(28, 'NV', NULL, NULL),
(29, 'NH', NULL, NULL),
(30, 'NJ', NULL, NULL),
(31, 'NM', NULL, NULL),
(32, 'NY', NULL, NULL),
(33, 'NC', NULL, NULL),
(34, 'ND', NULL, NULL),
(35, 'OH', NULL, NULL),
(36, 'OK', NULL, NULL),
(37, 'OR', NULL, NULL),
(38, 'PA', NULL, NULL),
(39, 'RI', NULL, NULL),
(40, 'SC', NULL, NULL),
(41, 'SD', NULL, NULL),
(42, 'TN', NULL, NULL),
(43, 'TX', NULL, NULL),
(44, 'UT', NULL, NULL),
(45, 'VT', NULL, NULL),
(46, 'VA', NULL, NULL),
(47, 'WA', NULL, NULL),
(48, 'WV', NULL, NULL),
(49, 'WI', NULL, NULL),
(50, 'WY', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sms_histories`
--

CREATE TABLE `sms_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) NOT NULL DEFAULT '0',
  `receiver_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sender_type` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_type` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_type` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_histories`
--

INSERT INTO `sms_histories` (`id`, `sender_id`, `receiver_id`, `sender_type`, `receiver_type`, `sms_type`, `sms_content`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'Admin', 'Agency', 'Single', 'hello, hi', '2021-05-04 04:53:56', '2021-05-04 04:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `staticpages`
--

CREATE TABLE `staticpages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staticpages`
--

INSERT INTO `staticpages` (`id`, `page_title`, `short_description`, `description`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'Home', '<p>Home</p>', '35732 (2).jpg', '2020-06-23 02:03:08', '2020-07-25 01:47:32'),
(2, 'About us', 'About us', '<p>About us</p>', '53432.jpg', '2020-06-23 02:03:08', '2020-06-23 02:03:42'),
(3, 'Contact us', 'Contact us', '<p>Contact us</p>', '75401.jpg', '2020-06-23 02:03:08', '2020-06-23 02:04:57'),
(4, 'Terms and Condition', 'Terms and Condition', '<p>Terms and Condition</p>', '7741Nikon-1-V3-sample-photo.jpg', '2020-06-23 02:03:08', '2020-06-23 02:05:13'),
(5, 'Privacy Policy', 'Privacy Policy', '<p>Privacy Policy</p>', '43212.jpg', '2020-06-23 02:03:08', '2020-06-23 02:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `subagents`
--

CREATE TABLE `subagents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agenc_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `join_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `w9_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eno_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subagents`
--

INSERT INTO `subagents` (`id`, `photo`, `name`, `phone`, `email`, `password`, `birth_date`, `address`, `city`, `state`, `zip`, `country`, `agenc_id`, `agent_id`, `join_date`, `status`, `w9_file`, `license_file`, `eno_file`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '2507download.jpg', 'Sub Agent 1', '1234567890', 'subagent1@gmail.com', '$2y$10$WD4F9u0ifsb9PiCRt8OTiObNfd5zwKkhDU3oXuc86AkbermnLJBs6', '2020-06-19', 'test', 'Dallas', 'gujrat', '75001', 'India', 2, 5, '2020-06-19', 1, 'w9_file_4654341XXXXXXXXXX43_18-07-2021.PDF', 'license_file_92594341XXXXXXXXXX43_18-07-2021.PDF', 'eno_file_81324341XXXXXXXXXX43_18-07-2021.PDF', NULL, NULL, '2021-08-27 05:54:29'),
(3, '7462bod_mainImg_01.jpg', 'AP SA 11123', '1234567890', 'apsa11@gmail.com', '$2y$10$qG.rAGd8f6Af9gwN94Oam.x4CO6Gq2FCmo1.3fnSdNV44gu3xJ3Gu', '2020-06-28', 'Rajkot, Gujarat, India', 'Rajkot', 'Gujrat', '360001', 'India', 2, 5, '2020-07-09', 1, NULL, NULL, NULL, NULL, '2020-07-09 06:42:00', '2020-09-10 06:02:29'),
(4, '22452.png', 'Customer Two', '+919638527415', 'sb222@gmail.com', '$2y$10$F8KO9iLQYk//h/n/Bg2foOYIry1UrDyoyXMa3lCv.l3DonEuG9zDW', '2018-07-26', 'test', 'ttest', 'Gujrat', 'L6A 0J8', 'India', 2, 5, '2008-07-26', 1, NULL, NULL, NULL, NULL, '2020-08-18 05:41:19', '2020-08-18 05:41:19'),
(5, '', 'test agency', '01234567890', 'testagency@gmail.com', '$2y$10$JVUPrK8yVhWtHUSqIClx..mK6JOjB.Io/KWU8qTiUNjE.ITVoXfyy', '2021-08-09', 'test Address', 'rajkot', 'Gujarat', '360005', 'India', 1, 6, '2021-08-12', 1, 'w9_file_64684341XXXXXXXXXX43_18-07-2021.PDF', 'license_file_33724341XXXXXXXXXX43_18-07-2021.PDF', 'eno_file_50164341XXXXXXXXXX43_18-07-2021.PDF', NULL, '2021-08-14 00:57:56', '2021-08-27 01:44:23'),
(6, '', 'kdkl', '4545', 'keshavprogrammer22@gmail.com', '$2y$10$ryIcQU66Le6scO8/zVf1d.aUTeceLZIjFPQxC7X7k9B6uiSy1FT7G', '2021-08-04', 'ddsd', 'eer', 'nkjnkj', '542154', 'india', 1, 6, '2021-08-10', 0, 'w9_file_99914341XXXXXXXXXX43_18-07-2021.PDF', 'license_file_85904341XXXXXXXXXX43_18-07-2021.PDF', 'eno_file_31494341XXXXXXXXXX43_18-07-2021.PDF', NULL, '2021-08-27 01:23:22', '2021-08-27 01:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Theme 1', 1, NULL, NULL),
(2, 'Theme 2', 1, NULL, NULL),
(3, 'Theme 3', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_street` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_apt` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hear_about` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_interests`
--
ALTER TABLE `additional_interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`),
  ADD KEY `contact_name` (`contact_name`),
  ADD KEY `contact_email` (`contact_email`),
  ADD KEY `theme_id` (`theme_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`),
  ADD KEY `agenc_id` (`agenc_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `blogcategories`
--
ALTER TABLE `blogcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`category_title`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `blog_title` (`blog_title`),
  ADD KEY `tags` (`tags`),
  ADD KEY `is_publish` (`is_publish`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`category_title`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `channel_partners`
--
ALTER TABLE `channel_partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`),
  ADD KEY `agenc_id` (`agenc_id`),
  ADD KEY `contact_name` (`contact_name`),
  ADD KEY `contact_email` (`contact_email`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `channel_partner_users`
--
ALTER TABLE `channel_partner_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`),
  ADD KEY `agenc_id` (`channel_partner_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fname` (`fname`),
  ADD KEY `lname` (`lname`),
  ADD KEY `email` (`email`),
  ADD KEY `agenc_id` (`agenc_id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `channel_partner_id` (`channel_partner_id`);

--
-- Indexes for table `client_policies`
--
ALTER TABLE `client_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_policyplans`
--
ALTER TABLE `client_policyplans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `policy_type_id` (`policy_type_id`),
  ADD KEY `policy_id` (`policy_id`),
  ADD KEY `holder_name` (`holder_name`),
  ADD KEY `agenc_id` (`agenc_id`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `is_active` (`is_active`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`question`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `how_hear_abouts`
--
ALTER TABLE `how_hear_abouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `is_active` (`is_active`);

--
-- Indexes for table `insured_information_cl`
--
ALTER TABLE `insured_information_cl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insured_information_pl`
--
ALTER TABLE `insured_information_pl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agenc_id` (`agenc_id`),
  ADD KEY `fname` (`fname`),
  ADD KEY `lname` (`lname`),
  ADD KEY `email` (`email`),
  ADD KEY `mark_opportunity` (`mark_opportunity`),
  ADD KEY `mark_client` (`mark_client`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `channel_partner_id` (`channel_partner_id`);

--
-- Indexes for table `lead_source`
--
ALTER TABLE `lead_source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line_of_business`
--
ALTER TABLE `line_of_business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing_emails`
--
ALTER TABLE `marketing_emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agency_id` (`agency_id`),
  ADD KEY `creater_id` (`creater_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `usertype` (`string`),
  ADD KEY `template_id` (`template_id`),
  ADD KEY `is_sent` (`is_sent`),
  ADD KEY `is_active` (`is_active`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policyplans`
--
ALTER TABLE `policyplans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`title`),
  ADD KEY `status` (`status`),
  ADD KEY `agenc_id` (`agenc_id`);

--
-- Indexes for table `policytypes`
--
ALTER TABLE `policytypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`policy_type_title`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `rating_state`
--
ALTER TABLE `rating_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_histories`
--
ALTER TABLE `sms_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staticpages`
--
ALTER TABLE `staticpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subagents`
--
ALTER TABLE `subagents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`),
  ADD KEY `agenc_id` (`agenc_id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `is_active` (`is_active`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fname` (`fname`),
  ADD KEY `lname` (`lname`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_interests`
--
ALTER TABLE `additional_interests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blogcategories`
--
ALTER TABLE `blogcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `channel_partners`
--
ALTER TABLE `channel_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `channel_partner_users`
--
ALTER TABLE `channel_partner_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `client_policies`
--
ALTER TABLE `client_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client_policyplans`
--
ALTER TABLE `client_policyplans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `how_hear_abouts`
--
ALTER TABLE `how_hear_abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `insured_information_cl`
--
ALTER TABLE `insured_information_cl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `insured_information_pl`
--
ALTER TABLE `insured_information_pl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `lead_source`
--
ALTER TABLE `lead_source`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `line_of_business`
--
ALTER TABLE `line_of_business`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `marketing_emails`
--
ALTER TABLE `marketing_emails`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `policyplans`
--
ALTER TABLE `policyplans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `policytypes`
--
ALTER TABLE `policytypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rating_state`
--
ALTER TABLE `rating_state`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sms_histories`
--
ALTER TABLE `sms_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staticpages`
--
ALTER TABLE `staticpages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subagents`
--
ALTER TABLE `subagents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
