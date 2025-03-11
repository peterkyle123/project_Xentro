-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2025 at 06:05 AM
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
('admin1', '$2y$12$OXbezsbfr/PxFE8LF1bJmesRtFjgLrv.Zi38p7kerwCfz8PZ8tr2.', 'profile_pics/PKdXOP92matJASSfAc1GNabOTaHnMkKkVWiJsQ8s.png', 'admin@example.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subdivision_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `subdivision_id`, `name`, `created_at`, `updated_at`) VALUES
(5, 116, 'Pool', '2025-03-09 23:47:20', '2025-03-09 23:47:20'),
(6, 116, 'house', '2025-03-09 23:47:20', '2025-03-09 23:47:20');

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
(44, 97, 23123, '2025-03-07 19:18:45', '2025-03-07 19:18:45'),
(46, 97, 1223, '2025-03-07 19:28:31', '2025-03-07 19:28:31'),
(48, 111, 234, '2025-03-07 22:23:42', '2025-03-07 22:23:42'),
(52, 116, 232, '2025-03-09 23:47:20', '2025-03-09 23:47:20');

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
(88, 97, 46, 22, 21312.00, '2025-03-07 19:30:39', '2025-03-07 21:19:29', 2321.00, 'Available'),
(90, 111, 48, 324, 3242.00, '2025-03-07 22:23:42', '2025-03-07 22:23:42', 34.00, 'Available'),
(94, 116, 52, 232, 232.00, '2025-03-09 23:47:20', '2025-03-09 23:47:20', 21312.00, 'Available');

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
(36, 'New Generation', 'New modern house', 'Housing', NULL, NULL, 'sale', 1200000.00, 'Tiptip', 'Tagbilaran', 'Bohol', '6300', 12, 3, 120000, 'pending', 1, 'images/hqWvax9l2780qr9h0DF88lou3amgiYtujGvXpL88.jpg', '2025-03-05 21:19:58', '2025-03-07 16:45:03', 10.36305200, 123.73263070, 'Earl Mike Sarabia', 'peterkyle.gingo@bisu.edu.ph', '09207080240', 0, '[]'),
(37, 'New Era', 'New generation housing for you and me.', 'Housing', 'Office Property', NULL, 'sale', 25000.00, 'Tiptip', 'Tagbilaran', 'Bohol', '6300', 12, 1, 14009, 'pending', 1, 'listings/op6BU5PpL42yhK54AVwjTIwsfVnM3ZYfYdCTAyTn.jpg', '2025-03-09 18:04:14', '2025-03-09 18:14:16', 10.36305200, 123.73263070, 'Earl Mike Sarabia', 'peterkyle.gingo@bisu.edu.ph', '09207080240', 0, '[]'),
(38, 'History', 'Historical housing that you will never forget.', 'Housing', 'Office Property', NULL, 'sale', 24566.00, 'Tiptip', 'Tagbilaran', 'Bohol', '6300', 6, 3, 2312312, 'pending', 1, 'listings/QisXRdpV1OKrSrybgpc3dhcywTZPZiJoCuUCZD6J.jpg', '2025-03-09 18:05:49', '2025-03-09 18:15:16', 10.36305200, 123.73263070, 'Earl Mike Sarabia', 'peterkyle.gingo@bisu.edu.ph', '09207080240', 0, '[]');

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
(32, '2025_03_07_020236_update_block_id_in_houses', 7),
(33, '2025_03_08_060447_add_plot_to_ngh_table', 8),
(34, '2025_03_08_064448_create_sub_query_table', 9),
(35, '2025_03_10_011704_create_amenities_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `ngh`
--

CREATE TABLE `ngh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `plot` varchar(255) DEFAULT NULL,
  `block_number` int(11) DEFAULT NULL,
  `block_area` decimal(8,2) NOT NULL DEFAULT 0.00,
  `house_number` int(11) DEFAULT NULL,
  `house_area` decimal(10,2) DEFAULT NULL,
  `house_status` varchar(255) NOT NULL DEFAULT 'Available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngh`
--

INSERT INTO `ngh` (`id`, `sub_name`, `price`, `image`, `plot`, `block_number`, `block_area`, `house_number`, `house_area`, `house_status`, `created_at`, `updated_at`, `location`, `description`) VALUES
(97, 'North Grand Heights', NULL, 'subdivision_images/L8ao2xCAaejMDqNJGdzNuNZx60YzmvNdkNmbHbAp.png', 'subdivision_plots/Kc7NeFL6yXq6nCg46bfMCZXDJKgzdEEr3EAnSz8j.png', 2, 0.00, 1, 0.00, 'Available', '2025-03-06 21:19:02', '2025-03-10 19:14:50', 'Banban,Bogo City', 'Best place to dwell, where the future is free'),
(116, 'Lindavillerers', NULL, 'subdivision_images/bb9y1IBlP6KHC7x4GMcTnNhOkYmQWi4E39gc1NEG.png', 'subdivision_plots/GMEzD0SgxWW20lX3MX9xSw1P4xS98H6O2EVhi4ka.png', 1, 0.00, 1, 0.00, 'Available', '2025-03-09 23:47:20', '2025-03-10 19:19:55', 'Tagbilaran', 'Best place to dwell in town.');

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
('6mcWS5hHbTdZ24kIbWOJGqV1I8d8hw34maPZwiUe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnZkZUNrNE5abEwzUmczQjFTeGRyTUFOMHlnWmVqNHptT2R2OVl6MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9xdWVyaWVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741658546),
('TW9zENFrhJxH1EGxifP1WUReNboVuW7qXjZrv2WX', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 13; SM-G981B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMnlJbEdKSlAxQzZvdnY4SnpMSkoyMVRpN0Y4ZFNpVUc0aTJWZTdNayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9uZ2gtc3ViZGl2aXNpb24vMTE2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxNToiYWRtaW5fbG9nZ2VkX2luIjtiOjE7fQ==', 1741669476);

-- --------------------------------------------------------

--
-- Table structure for table `sub_query`
--

CREATE TABLE `sub_query` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `lot` varchar(255) NOT NULL,
  `subdivision_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `block` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_query`
--

INSERT INTO `sub_query` (`id`, `name`, `phone_number`, `email`, `purpose`, `lot`, `subdivision_id`, `created_at`, `updated_at`, `address`, `block`) VALUES
(8, 'Earl', '09207080240', 'peterkyle.gingo@gmail.com', 'sad', '5', NULL, '2025-03-10 17:35:41', '2025-03-10 17:35:41', 'Tagbilaran', '4'),
(11, '213', '09207080240', 'neil@gmail.com', 'sfsfa', '3', NULL, '2025-03-10 17:38:44', '2025-03-10 17:38:44', 'Zz', '2'),
(12, 'Earl Mike Sarabia', '09207080240', 'peterk.gingo@bisu.edu.ph', 'cbcv', '1', NULL, '2025-03-10 17:47:02', '2025-03-10 17:47:02', 'Tiptip', '2'),
(13, 'Earl', '09207080240', 'peterksaayle.gingo@gmail.com', 'fssssss', '3', 116, '2025-03-10 18:21:30', '2025-03-10 18:21:30', 'Tagbilaran', '4');

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
(7, 'Earl Mike Sarabia', 'IT Personnel', '09207080240', 'peterkyle.gingo@bisu.edu.ph', 'Time is gold', '2025-03-05 16:26:48', '2025-03-05 16:26:48.000000', 'images/2YBt9fVPceW2NDloGpdDQX3CMu18VpW8WFTW86WR.png'),
(8, 'Earl Mike Sarabia', 'IT Personnel', '09207080240', 'king@gmail.com', 'kinhgg', '2025-03-09 16:39:33', '2025-03-09 16:39:33.000000', 'images/HFIq9WkVf3WlMsnkJUIhn68elwkixZXyNVLFGqYo.jpg');

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
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `amenities_subdivision_id_foreign` (`subdivision_id`);

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
-- Indexes for table `sub_query`
--
ALTER TABLE `sub_query`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_query_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ngh`
--
ALTER TABLE `ngh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `related_companies`
--
ALTER TABLE `related_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_query`
--
ALTER TABLE `sub_query`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Constraints for table `amenities`
--
ALTER TABLE `amenities`
  ADD CONSTRAINT `amenities_subdivision_id_foreign` FOREIGN KEY (`subdivision_id`) REFERENCES `ngh` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
