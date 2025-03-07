-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2025 at 04:19 AM
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
-- Database: `xentro_estates`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us_contents`
--

CREATE TABLE `about_us_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `id` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`username`, `password`, `profile_pic`, `email`, `id`) VALUES
('admin1', '$2y$12$OXbezsbfr/PxFE8LF1bJmesRtFjgLrv.Zi38p7kerwCfz8PZ8tr2.', 'profile_pics/HglU6yTBzW70dCET5rhZSliJaK88ttDMm4MjuX05.jpg', 'admin@example.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subdivision_id` bigint(20) UNSIGNED NOT NULL,
  `block_area` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `subdivision_id`, `block_area`, `created_at`, `updated_at`) VALUES
(1, 74, 5688, '2025-03-06 17:07:56', '2025-03-06 17:07:56'),
(2, 75, 5688, '2025-03-06 17:09:56', '2025-03-06 17:09:56'),
(3, 76, 5688, '2025-03-06 17:14:18', '2025-03-06 17:14:18'),
(4, 77, 1223, '2025-03-06 17:14:41', '2025-03-06 17:14:41'),
(5, 78, 23, '2025-03-06 17:23:21', '2025-03-06 17:23:21'),
(6, 79, 123, '2025-03-06 17:25:04', '2025-03-06 17:25:04'),
(7, 80, 123, '2025-03-06 17:38:10', '2025-03-06 17:38:10'),
(8, 81, 76, '2025-03-06 17:38:55', '2025-03-06 17:38:55'),
(9, 82, 213, '2025-03-06 17:39:52', '2025-03-06 17:39:52'),
(10, 82, 213, '2025-03-06 17:39:52', '2025-03-06 17:39:52'),
(11, 83, 24234, '2025-03-06 17:40:30', '2025-03-06 17:40:30'),
(12, 84, 12321, '2025-03-06 18:26:37', '2025-03-06 18:26:37'),
(13, 85, 21312, '2025-03-06 18:26:59', '2025-03-06 18:26:59'),
(14, 86, 213, '2025-03-06 18:33:41', '2025-03-06 18:33:41'),
(15, 87, 213, '2025-03-06 18:34:05', '2025-03-06 18:34:05'),
(16, 88, 213, '2025-03-06 18:34:09', '2025-03-06 18:34:09'),
(17, 89, 213, '2025-03-06 18:34:15', '2025-03-06 18:34:15'),
(18, 90, 213, '2025-03-06 18:34:34', '2025-03-06 18:34:34'),
(19, 91, 213, '2025-03-06 18:37:13', '2025-03-06 18:37:13'),
(20, 92, 213, '2025-03-06 18:37:22', '2025-03-06 18:37:22'),
(21, 93, 213, '2025-03-06 18:37:31', '2025-03-06 18:37:31'),
(22, 94, 23, '2025-03-06 18:37:47', '2025-03-06 18:37:47'),
(23, 95, 12, '2025-03-06 18:40:51', '2025-03-06 18:40:51'),
(24, 95, 12, '2025-03-06 18:40:51', '2025-03-06 18:40:51'),
(25, 96, 12, '2025-03-06 18:50:13', '2025-03-06 18:50:13'),
(26, 96, 12, '2025-03-06 18:50:13', '2025-03-06 18:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subdivision_id` bigint(20) UNSIGNED NOT NULL,
  `block_id` bigint(20) UNSIGNED NOT NULL,
  `assigned_house_number` int(11) NOT NULL,
  `house_area` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `house_price` decimal(10,2) DEFAULT NULL,
  `house_status` varchar(255) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `subdivision_id`, `block_id`, `assigned_house_number`, `house_area`, `created_at`, `updated_at`, `house_price`, `house_status`) VALUES
(56, 84, 12, 12, 232.00, '2025-03-06 18:26:37', '2025-03-06 18:26:37', 2312.00, 'Available'),
(57, 85, 13, 23, 2312.00, '2025-03-06 18:26:59', '2025-03-06 18:26:59', 21312.00, 'Available'),
(58, 94, 22, 23, 232.00, '2025-03-06 18:37:47', '2025-03-06 18:37:47', 32.00, 'Available'),
(59, 95, 23, 12, 121.00, '2025-03-06 18:40:51', '2025-03-06 18:40:51', 123213.00, 'Available'),
(60, 95, 23, 12, 1221.00, '2025-03-06 18:40:51', '2025-03-06 18:40:51', 21321.00, 'Available'),
(61, 95, 24, 213, 21321.00, '2025-03-06 18:40:51', '2025-03-06 18:40:51', 12321.00, 'Available'),
(62, 96, 25, 12, 121.00, '2025-03-06 18:50:13', '2025-03-06 18:50:13', 21.00, 'Available'),
(63, 96, 25, 13, 12321.00, '2025-03-06 18:50:13', '2025-03-06 18:50:13', 12321.00, 'Available'),
(64, 96, 26, 14, 12312.00, '2025-03-06 18:50:13', '2025-03-06 18:50:13', 12312.00, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `listing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `phone_number`, `address`, `message`, `listing_id`, `created_at`, `updated_at`) VALUES
(23, 'King', 'admin@example.com', '09805678900', 'Tinago', 'hsdsd', NULL, '2025-03-04 17:47:24', '2025-03-04 17:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `housing_type` varchar(255) DEFAULT NULL,
  `custom_housing_type` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL,
  `bathrooms` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `liked_sessions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `title`, `description`, `category`, `housing_type`, `custom_housing_type`, `type`, `price`, `address`, `city`, `state`, `zip`, `bedrooms`, `bathrooms`, `area`, `status`, `is_featured`, `image`, `created_at`, `updated_at`, `latitude`, `longitude`, `contact_name`, `contact_email`, `contact_phone`, `likes`, `liked_sessions`) VALUES
(35, '\"New Era\"', 'dfgdfg', 'Housing', 'Office Property', NULL, 'sale', 3232424.00, 'Tiptip', 'Tagbilaran', 'Bohol', '6300', 6, 2, 120000, 'pending', 0, 'images/pPBaedhiMLLxi3o5iaCYMFot8cuLPFXWMkb5aPSB.jpg', '2025-03-05 17:44:38', '2025-03-05 18:18:33', 10.36305200, 123.73263070, 'Earl Mike Sarabia', 'peterkyle.gingo@bisu.edu.ph', '09207080240', 1, '[\"nuCciwDUKjDeppMyuyl1kVJnRvGc9PxGAWrry0d4\"]'),
(36, 'New Generation', 'New modern house', 'Housing', NULL, NULL, 'sale', 1200000.00, 'Tiptip', 'Tagbilaran', 'Bohol', '6300', 12, 3, 120000, 'pending', 0, 'images/hqWvax9l2780qr9h0DF88lou3amgiYtujGvXpL88.jpg', '2025-03-05 21:19:58', '2025-03-05 21:19:58', 10.36305200, 123.73263070, 'Earl Mike Sarabia', 'peterkyle.gingo@bisu.edu.ph', '09207080240', 0, '[]');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(24, '2025_03_03_033313_create_ngh_table', 1),
(25, '2025_03_05_003802_add_assigned_house_number_to_houses_table', 2),
(26, '2025_03_06_031220_add_house_price_to_houses_table', 3),
(27, '2025_03_06_083031_add_block_id_to_houses_table', 4),
(29, '2025_03_07_011059_add_house_status_to_houses_table', 5),
(31, '2025_03_07_012043_update_block_house_number_in_ngh', 6),
(32, '2025_03_07_020236_update_block_id_in_houses', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ngh`
--

CREATE TABLE `ngh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `block_number` int(11) DEFAULT NULL,
  `block_area` decimal(8,2) NOT NULL DEFAULT 0.00,
  `house_number` int(11) DEFAULT NULL,
  `house_area` decimal(10,2) DEFAULT NULL,
  `house_status` varchar(255) NOT NULL DEFAULT 'Available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngh`
--

INSERT INTO `ngh` (`id`, `sub_name`, `price`, `image`, `block_number`, `block_area`, `house_number`, `house_area`, `house_status`, `created_at`, `updated_at`) VALUES
(66, 'Camilla', NULL, 'subdivision_images/eK5QbORigPJLYLVUEFoKrK04f6SgrO1jez5ewLdk.jpg', NULL, 0.00, 0, NULL, 'Available', '2025-03-06 16:36:34', '2025-03-06 16:36:34'),
(67, 'Camilla', NULL, 'subdivision_images/fxhINF5Og0CLOo3CCk4KvrPrR5Nc2dzkgOFeTq94.jpg', NULL, 0.00, 0, NULL, 'Available', '2025-03-06 16:37:28', '2025-03-06 16:37:28'),
(68, 'Camilla', NULL, 'subdivision_images/NhEMY9QAOOOceKBZ3FhUN28igm8kFOrQHP1OWslr.jpg', NULL, 0.00, 0, NULL, 'Available', '2025-03-06 16:37:44', '2025-03-06 16:37:44'),
(69, 'Camilla', NULL, 'subdivision_images/4NYDWMTz2GJid9uIndLdrk3Yrgb634Oy6dKAKH2E.jpg', NULL, 0.00, 0, NULL, 'Available', '2025-03-06 16:40:52', '2025-03-06 16:40:52'),
(70, 'Camilla', NULL, 'subdivision_images/fhGvctLUWVxbFVGk3OBzwars9Tkfu3PIVPaumGOt.jpg', NULL, 0.00, 0, NULL, 'Available', '2025-03-06 16:44:57', '2025-03-06 16:44:57'),
(71, 'North Grand Heights', NULL, 'subdivision_images/3RwolWam8IMrxAODqUYs23U9bAplkMoLZtQagjrm.png', NULL, 0.00, 0, NULL, 'Available', '2025-03-06 16:45:15', '2025-03-06 16:45:15'),
(72, 'Lindaviller', NULL, 'subdivision_images/h6QHtLFGWQ5LRFfXviDxM360Bdc3cxH7Tv3BhgdL.jpg', NULL, 0.00, 0, NULL, 'Available', '2025-03-06 17:04:24', '2025-03-06 17:04:24'),
(73, 'Lindaviller', NULL, 'subdivision_images/ziSaRimyXn6JpwZG6Qai7urV07D4sZ7Z27HvyYwq.jpg', NULL, 0.00, 0, NULL, 'Available', '2025-03-06 17:06:49', '2025-03-06 17:06:49'),
(74, 'Lindaviller', NULL, 'subdivision_images/9zlWW0JHVfLMFjGhTMMcZGzhPnjkS4sB4Y6kOm7X.jpg', NULL, 0.00, 0, NULL, 'Available', '2025-03-06 17:07:56', '2025-03-06 17:07:56'),
(75, 'Lindaviller', NULL, 'subdivision_images/skSNe4ekbjgX2fOxywYVCwOPu11WQbjsvSRbFyyw.jpg', NULL, 0.00, 0, NULL, 'Available', '2025-03-06 17:09:55', '2025-03-06 17:09:55'),
(76, 'Lindaviller', NULL, 'subdivision_images/WzaUPz36PaKjVIEEW2ZfsgY0dtXxxT4gqP67ax3E.jpg', NULL, 0.00, 0, NULL, 'Available', '2025-03-06 17:14:18', '2025-03-06 17:14:18'),
(77, 'North Grand Heights', NULL, 'subdivision_images/6NUjm7cHTD4MaX7mqGogQ13Auq7cJipO5dlAVjjc.jpg', NULL, 0.00, 0, NULL, 'Available', '2025-03-06 17:14:41', '2025-03-06 17:14:41'),
(78, 'North Grand Heights', NULL, 'subdivision_images/YpDYr8SXLMnQzpq0mnyM2f8aT2DkRG5J3QJEdbKZ.jpg', NULL, 0.00, NULL, NULL, 'Available', '2025-03-06 17:23:21', '2025-03-06 17:23:21'),
(79, 'Camilla', NULL, 'subdivision_images/UUHwPZzx1nsPHSJCWJ5p8n0lkRv7w40wrpgYRNiJ.jpg', NULL, 0.00, NULL, NULL, 'Available', '2025-03-06 17:25:04', '2025-03-06 17:25:04'),
(80, 'Lindaviller2', NULL, 'subdivision_images/VZriNI5TFL9jd8y9WPnCl8dOSQEOdnMMYYIEhsLv.jpg', 1, 0.00, 1, 0.00, 'Available', '2025-03-06 17:38:10', '2025-03-06 17:38:10'),
(81, 'Lindaviller2', NULL, 'subdivision_images/fodHHS08wHgVIMI12g2hr3mBPzGyqETGQUvFziay.jpg', 1, 0.00, 1, 0.00, 'Available', '2025-03-06 17:38:55', '2025-03-06 17:38:55'),
(82, 'Lindaviller22', NULL, 'subdivision_images/3BhL3DSJnf9SwCOEJrJ9Jdem84ywNYd1LcNOJOrL.jpg', 2, 0.00, 2, 0.00, 'Available', '2025-03-06 17:39:52', '2025-03-06 17:39:52'),
(83, 'Camilla1', NULL, 'subdivision_images/YppmFnQpfpqvLCuyiei5tLiWQvuZsjWGXjmyHnB8.jpg', 1, 0.00, 2, 0.00, 'Available', '2025-03-06 17:40:30', '2025-03-06 17:40:30'),
(84, 'Lindaviller23', NULL, 'subdivision_images/lkHm5inr77kTMr26Dk3Ep0G6gzfWYWx3o6Nqiue8.jpg', 1, 0.00, 0, 0.00, 'Available', '2025-03-06 18:26:37', '2025-03-06 18:26:37'),
(85, 'Camilla', NULL, 'subdivision_images/UpDcULwIOLaqa50m46hFQSblP43qObAf5YxnKjAt.jpg', 1, 0.00, 0, 0.00, 'Available', '2025-03-06 18:26:59', '2025-03-06 18:26:59'),
(86, 'North Grand Heights', NULL, 'subdivision_images/IYcZGxu9qYEWxy3FckPJRBBjIg8I9n7cs4ESXJgN.jpg', 2, 0.00, 0, 0.00, 'Available', '2025-03-06 18:33:41', '2025-03-06 18:33:41'),
(87, 'North Grand Heights', NULL, 'subdivision_images/zZD3rscOzH2nGdrAt750uVqLmVyjc1zH07dBNUGl.jpg', 2, 0.00, 0, 0.00, 'Available', '2025-03-06 18:34:05', '2025-03-06 18:34:05'),
(88, 'North Grand Heights', NULL, 'subdivision_images/9b7j5gwcfCq8S36FrYGMyLO7bADTlultD6QYnwoc.jpg', 2, 0.00, 0, 0.00, 'Available', '2025-03-06 18:34:09', '2025-03-06 18:34:09'),
(89, 'North Grand Heights', NULL, 'subdivision_images/4g7OAISx5iHSlgInENTNIEAht54NRNqtSXDalLxs.jpg', 2, 0.00, 0, 0.00, 'Available', '2025-03-06 18:34:15', '2025-03-06 18:34:15'),
(90, 'North Grand Heights', NULL, 'subdivision_images/AMsCaRydC18sEKpj90Y9GrmYQ7EehEy804WnAaWj.jpg', 2, 0.00, 0, 0.00, 'Available', '2025-03-06 18:34:34', '2025-03-06 18:34:34'),
(91, 'North Grand Heights', NULL, 'subdivision_images/41HULxq1RWnkbOpGM3BYzngEWLtEpSMWnKzclGvQ.jpg', 2, 0.00, 0, 0.00, 'Available', '2025-03-06 18:37:13', '2025-03-06 18:37:13'),
(92, 'North Grand Heights', NULL, 'subdivision_images/CoXFO5bQwBSO2JEzxW48ut2XBFDPQOHhtgqcJ45a.jpg', 2, 0.00, 0, 0.00, 'Available', '2025-03-06 18:37:22', '2025-03-06 18:37:22'),
(93, 'North Grand Heights', NULL, 'subdivision_images/yVN1vQN14CCVcKj5N01Oj55q5catrhDwnd7i5pJp.jpg', 2, 0.00, 0, 0.00, 'Available', '2025-03-06 18:37:31', '2025-03-06 18:37:31'),
(94, 'Camilla', NULL, 'subdivision_images/6vk9EzFEre5vYEufeoxTk9c39WIMMLtWAKUF9BsS.jpg', 1, 0.00, 1, 0.00, 'Available', '2025-03-06 18:37:47', '2025-03-06 18:37:47'),
(95, 'tester', NULL, 'subdivision_images/bVbNkTQHNdECkNfDfC448gh3OyRCYkpxL3NeA5h9.jpg', 2, 0.00, 3, 0.00, 'Available', '2025-03-06 18:40:51', '2025-03-06 18:40:51'),
(96, 'Camillasss', NULL, 'subdivision_images/LJLxWb0jZtGBXVrzUcOEY9H2F8jQbg44jSs6HbeQ.jpg', 2, 0.00, 3, 0.00, 'Available', '2025-03-06 18:50:13', '2025-03-06 18:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `related_companies`
--

CREATE TABLE `related_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9L4jnXc2yyVGcaYGAuN4NCW9a4AnKrYporgmxCJk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTdjNVBWQ2JNOHp6RmJRZFhhWXYwVFF6VzRZSnkzdEh2RUJNTzZlTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly94ZW50cm8udGVzdC9jcmVhdGVfc3ViZGl2aXNpb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741316345),
('m761DTnCryUQtVaMQxNzpOxlBPAjqugAk4Y0kqYo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDZWYVhobGJVVDlWNTFxbUxjUHRhM3N4VXp5d3A1YlRQQk9DRnhldCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jcmVhdGVfc3ViZGl2aXNpb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741317530);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` bigint(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `motto` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `position`, `contact_number`, `email`, `motto`, `updated_at`, `created_at`, `image`) VALUES
(7, 'Earl Mike Sarabia', 'IT Personnel', '09207080240', 'peterkyle.gingo@bisu.edu.ph', 'Time is gold', '2025-03-05 16:26:48', '2025-03-05 16:26:48.000000', 'images/2YBt9fVPceW2NDloGpdDQX3CMu18VpW8WFTW86WR.png');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_contents`
--
ALTER TABLE `about_us_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiries_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngh`
--
ALTER TABLE `ngh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `related_companies`
--
ALTER TABLE `related_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us_contents`
--
ALTER TABLE `about_us_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ngh`
--
ALTER TABLE `ngh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `related_companies`
--
ALTER TABLE `related_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
