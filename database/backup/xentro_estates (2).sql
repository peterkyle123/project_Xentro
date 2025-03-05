-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2025 at 06:19 AM
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
  `assigned_house_number` int(11) NOT NULL,
  `house_area` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `subdivision_id`, `assigned_house_number`, `house_area`, `created_at`, `updated_at`) VALUES
(19, 51, 6, 13123.00, '2025-03-04 18:52:58', '2025-03-04 18:52:58'),
(20, 52, 7, 212.00, '2025-03-04 18:53:44', '2025-03-04 18:53:44'),
(21, 53, 1, 12.00, '2025-03-04 18:54:28', '2025-03-04 18:54:28'),
(22, 53, 2, 1212.00, '2025-03-04 18:54:28', '2025-03-04 18:54:28'),
(23, 54, 7, 2.00, '2025-03-04 18:55:01', '2025-03-04 18:55:01'),
(24, 56, 2, 21321.00, '2025-03-04 18:56:00', '2025-03-04 18:56:00'),
(25, 57, 2, 23.00, '2025-03-04 18:56:42', '2025-03-04 18:56:42'),
(26, 57, 213, 21321.00, '2025-03-04 18:56:42', '2025-03-04 18:56:42'),
(27, 57, 2, 12312.00, '2025-03-04 18:56:42', '2025-03-04 18:56:42');

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
(23, 'King', 'admin@example.com', '09805678900', 'Tinago', 'hsdsd', 32, '2025-03-04 17:47:24', '2025-03-04 17:47:24');

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
(31, 'Modernity', 'Modern House version 3.0', 'Housing', 'Residential', NULL, 'sale', 25000.00, 'Tinago', 'Tagbilaran', 'Bohol', '6300', 12, 3, 12456, 'pending', 0, 'images/maDMY1CFGPQAkq3iKgLPiBLQCdSG2Y3J4ZAvfygW.jpg', '2025-02-28 17:52:56', '2025-03-04 17:46:36', 10.29640040, 123.87009920, 'Direk Newmans', 'earl@gmail.com', '09207080240', 4, '[\"7eEPQkWKEYrJZd1aHWW3qjLchkQO81ZShOsx1W1x\",\"n7qok6J9FFl5sfr1JfFfEXgD8u8apzRQV1CSKB2x\",\"yleyS7VFl8J0k96it9tLVnbxuLbG0jS4OTXvS2iX\",\"dAVDglEs6E5FtVkOYIpxZiUDNQ2IsSGZvea2r4wW\"]'),
(32, 'Generations', 'Generational housing that fits to your home', 'Housing', 'Residential', NULL, 'lease', 2.00, 'Tinago', 'Dauis', 'Bohol', '6300', 12, 3, 12456, 'pending', 0, 'images/IsiUvZAAIHfVK1gLmrMcVtd7d2xdiaeT7NuiZQbC.jpg', '2025-03-02 16:11:18', '2025-03-04 16:09:33', 10.34560000, 123.56700000, 'Eduardo', 'pkyle@gmail.com', '09807904567', 1, '[\"dAVDglEs6E5FtVkOYIpxZiUDNQ2IsSGZvea2r4wW\"]'),
(33, 'Land', 'land property', 'Land', NULL, NULL, 'rent', 1200000.00, 'Tinago', 'Dauis', 'Bohol', '6300', NULL, NULL, 5678, 'pending', 0, 'images/SxNXFBLvJTGea4KuXna3PFlhNwb1o1Vl65uoAjYP.jpg', '2025-03-02 16:42:24', '2025-03-02 16:42:24', 10.34560000, 123.56700000, 'Eduardo', 'pkyle@gmail.com', '09807904567', 0, '[]');

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
(25, '2025_03_05_003802_add_assigned_house_number_to_houses_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ngh`
--

CREATE TABLE `ngh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `block_number` varchar(255) NOT NULL,
  `block_area` decimal(8,2) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `house_area` decimal(8,2) NOT NULL,
  `house_status` varchar(255) NOT NULL DEFAULT 'Available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngh`
--

INSERT INTO `ngh` (`id`, `sub_name`, `price`, `image`, `block_number`, `block_area`, `house_number`, `house_area`, `house_status`, `created_at`, `updated_at`) VALUES
(51, 'North Grand Heights', NULL, 'subdivision_images/WQ0Ky7OdCI4vLVtHjrt4UWDvZ35JWjmNRuKKLDSw.png', '1', 0.00, '1', 0.00, 'Available', '2025-03-04 18:52:58', '2025-03-04 18:52:58'),
(52, 'North Grand Heights', NULL, 'subdivision_images/OgF8nP6i1yR6sPZgC36QRfisWhQIRtZ8jbGg7hK0.png', '1', 0.00, '0', 0.00, 'Available', '2025-03-04 18:53:44', '2025-03-04 18:53:44'),
(53, 'Earlanz', NULL, 'subdivision_images/7wFEDZHSMlw59edY9XFGIzVfjhIlbGREuAwjdjAB.png', '1', 0.00, '2', 0.00, 'Available', '2025-03-04 18:54:27', '2025-03-04 18:54:28'),
(54, 'Nissen', NULL, 'subdivision_images/SHlcHxsigX0GF4OLeaVeOwXZwJiEdpQVanQJ0aMm.jpg', '1', 0.00, '1', 0.00, 'Available', '2025-03-04 18:55:01', '2025-03-04 18:55:01'),
(55, 'Earlanz', NULL, 'subdivision_images/GlLSSP2dlXnSKaQ135l64msL7hxDto6PH9vEapv2.png', '2', 0.00, '0', 0.00, 'Available', '2025-03-04 18:55:15', '2025-03-04 18:55:15'),
(56, '1', NULL, 'subdivision_images/SlqX6mWdnOQ3FIrV3cqzF8gsuPhb0KyogUt689eW.png', '2', 0.00, '1', 0.00, 'Available', '2025-03-04 18:56:00', '2025-03-04 18:56:00'),
(57, '1', NULL, 'subdivision_images/tuztbW6ImkGbq7TRQeEQVhcWyCHKQT15azEIwkml.png', '2', 0.00, '3', 0.00, 'Available', '2025-03-04 18:56:42', '2025-03-04 18:56:42');

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
('dAVDglEs6E5FtVkOYIpxZiUDNQ2IsSGZvea2r4wW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiamFlVlNlMnlIcnJmZ2h3SG5wemM5aXIyc09LNGE3MHFxVkVtWHBHMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyLWxpc3RpbmdzMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTU6ImFkbWluX2xvZ2dlZF9pbiI7YjoxO30=', 1741146892);

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
(4, 'Maria Teresa Casol', 'MARKETING COORDINATOR', '0968 346 1315', 'xentrostateproperties@gmail.com', 'Honesty is the best policy', '2025-03-02 21:55:33', '2025-03-02 21:55:33.000000', 'images/PSHQSBX0MMaxxSVzQwCF4PRZ9XaYyzRwxsdJiC6L.png'),
(5, 'Arphy Angel Febreo', 'ACCOUNTING STAFF', '0928 551 2464', 'xentroestates.payment.collection@gmail.com', 'Nobody is perfect', '2025-03-02 21:57:13', '2025-03-02 21:57:13.000000', 'images/YL2JH8juO7ThPjw1uT4xCxXGanSoSPtdDECHt4uS.png'),
(6, 'Sherlyn Garcia', 'MARKETING COORDINATOR', '0928 551 2464', 'xentroestates.salesmktg@gmail.com', 'Time is Platinum', '2025-03-02 22:29:49', '2025-03-02 22:29:49.000000', 'images/UdNggkSLmmWJMhSdpCcpoyFKv8bRbG7NIeLFQj8B.png');

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ngh`
--
ALTER TABLE `ngh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `related_companies`
--
ALTER TABLE `related_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
