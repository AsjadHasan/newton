-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2020 at 12:56 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newton`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_qsn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_ans` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_qsn`, `faq_ans`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'what is your name?', 'Asjad', '2020-02-17 15:12:37', '2020-02-17 19:39:39', NULL),
(2, 'what is your country name?', 'BD', '2020-02-17 15:13:11', '2020-02-17 19:39:46', NULL),
(7, 'what is your name?', 'Mawa', '2020-02-23 23:41:20', '2020-02-27 22:56:33', NULL),
(9, 'what is your name?', 'jim', '2020-02-27 22:04:33', '2020-02-27 22:04:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_02_13_030318_create_faqs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Asjad hasan jim', 'asjadhasan.ah@gmail.com', '2020-02-17 18:46:05', '$2y$10$fgS5SgF39WKTTUj5TpZ7DuWJkxIJ0PGJjbkTBnZp7yQvW/C6JldTG', 'W3Los5y1CyvSsjZSi66rAHFDnthChuqiKYBMiSnI83jeR3Is5ucxmgsZj6UU', '2020-02-01 07:32:22', '2020-02-23 23:41:00'),
(3, 'Yamin mokbul', 'yamin@gmail.com', NULL, '$2y$10$P4.smDrs5pbRU57TXGqL3.WHejBD5Xay63gGXo35iT9zs7fXsiP3u', NULL, '2020-02-01 07:39:52', '2020-02-01 07:39:52'),
(4, 'Josna', 'josna@gmail.com', '2020-02-17 19:38:58', '$2y$10$KONVcZ/WpjYNRrFGFdhJsesIUR13vZXx9/9zg/uxXqv5uF7.ow4JS', NULL, '2020-02-07 21:57:24', '2020-02-17 19:38:58'),
(5, 'abir', 'abir@r.com', NULL, '$2y$10$2Xqp0qABqltjbsdUTxU/i.98YJbf.EjwhmOSuMDJD5a41FKod1QKS', NULL, '2020-02-07 22:41:35', '2020-02-07 22:41:35'),
(6, 'Babul', 'babul@g.com', NULL, '$2y$10$hDd1TYQ4ntDl7tEK6p.dP.T8f0uprh1ZFM429ZXaAxh7zeYKmae5a', NULL, '2020-02-07 22:42:36', '2020-02-07 22:42:36'),
(7, 'mawa', 'mawa@gmail.com', NULL, '$2y$10$EbkutxEgDe52i5xRBi4V.exxqzhg3Ab5rTSYRRxbBMOXqg0CWMRg2', NULL, '2020-02-12 18:45:01', '2020-02-12 18:45:01'),
(8, 'Siam', 'siam@gmail.com', '2020-02-17 18:47:31', '$2y$10$oLF6bkgXmaOvdFHOymPSFOYnhe9JaBD9.Kem.YwYp6CH7grBmeY3a', '4owqq8eZWJecWSZ7K3fsB7JmowJKwFLkX00mGcG889lrVpRTiTfQf8gxCdQm', '2020-02-17 18:47:06', '2020-02-17 18:52:43'),
(9, 'Josna', 'asjadhasanjim@gmail.com', '2020-02-23 23:49:22', '$2y$10$hg7Qd6NJQBZiVmbezpM6buJHhYmqkvNOjOTf0a7LnNvGtTJbKE06y', '8YQDjEp8xaIm2QKI3yy2JgOw1aWPF3fgQM7BKYed0TFR2LjIS1eyZfJ6efT4', '2020-02-23 23:48:52', '2020-02-23 23:51:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
