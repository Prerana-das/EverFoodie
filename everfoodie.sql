-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2020 at 01:25 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `everfoodie`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instragram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'tilaghor', 2, '2020-02-13 02:21:01', '2020-02-13 02:21:01'),
(4, 'mirabazar', 1, '2020-02-13 02:21:01', '2020-02-13 02:21:01'),
(8, 'modina market', 1, '2020-02-13 02:21:01', '2020-02-13 02:21:01'),
(9, 'hghj', 6, '2020-04-12 11:12:19', '2020-04-12 11:12:19'),
(10, 'dgf', 2, '2020-04-12 11:14:58', '2020-04-12 11:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'thai', '2020-02-13 02:13:20', '2020-02-13 02:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'syl', '/uploads/9cwWmZ2s9mGJXmHpec144y4LseLeXfVpByz1gJNs.jpeg', '2020-02-13 02:13:32', '2020-02-13 02:13:32'),
(2, 'dhaka', '/uploads/uIZQa6M1BReUZ4QgiyaGlj6Ccdrj8O0CsJXvCHeY.jpeg', '2020-02-13 02:13:51', '2020-02-13 02:13:51'),
(3, 'demo1', '/uploads/qH99coguuXtsvc23nMJBmoTuevn522ElxassEgAn.jpeg', '2020-03-01 04:28:45', '2020-03-01 04:28:45'),
(4, 'de', '/uploads/Gm3ay2fWDyxXuNJ7HM12SfQcTPagf5V9ku8IO4Yo.png', '2020-03-01 04:29:06', '2020-03-01 04:29:06'),
(5, 'sds', '/uploads/JbQWYSTHSSH6rPUYEzkcxZZbZiXySbvpSiET6Z82.png', '2020-03-01 04:29:33', '2020-03-01 04:29:33'),
(6, 'ss', '/uploads/kZTwzngZVIJVUTFahj0rQgHB32j4oGQ5ROYSq5si.jpeg', '2020-03-01 04:30:44', '2020-03-01 04:30:44');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `description`, `image`, `price`, `discount_price`, `quantity`, `category_id`, `res_id`, `created_at`, `updated_at`) VALUES
(1, 'doi fuska', 'shjds', '/uploads/pT7EOVMUVvReqPjua1n9lcTev32Nm32X20VuYyb4.jpeg', 100, NULL, NULL, 1, 2, '2020-02-13 02:24:47', '2020-02-13 02:24:47'),
(2, 'Rajkachuri', 'hdhdssd', '/uploads/HZ5pmVQk5Cy5skNZ4xdF7lA5YlUX0yqmrpLz93Ug.jpeg', 223, NULL, NULL, 1, 2, '2020-02-13 02:25:28', '2020-02-13 02:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `food_tags`
--

CREATE TABLE `food_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `food_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2020_01_21_112927_create_areas_table', 1),
(5, '2020_01_21_113000_create_categories_table', 1),
(6, '2020_01_21_113100_create_cities_table', 1),
(7, '2020_01_21_113128_create_restaurants_table', 1),
(8, '2020_01_21_113158_create_foods_table', 1),
(9, '2020_01_21_113224_create_reviews_table', 1),
(10, '2020_01_21_113247_create_tags_table', 1),
(11, '2020_01_22_055331_create_food_tags_table', 1),
(12, '2020_02_13_070103_create_orders_table', 1),
(13, '2020_02_13_070234_create_order_details_table', 1),
(14, '2019_05_03_000001_create_customer_columns', 2),
(15, '2019_05_03_000002_create_subscriptions_table', 2),
(16, '2020_03_18_025347_create_abouts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `selling_price`, `discount_price`, `total_price`, `created_at`, `updated_at`) VALUES
(8, 5, NULL, NULL, 1215, '2020-02-17 22:40:16', '2020-02-17 22:40:16'),
(19, 5, NULL, NULL, 1215, '2020-02-17 22:52:23', '2020-02-17 22:52:23'),
(23, 5, NULL, NULL, 1215, '2020-02-17 23:12:38', '2020-02-17 23:12:38'),
(24, 5, NULL, NULL, 148594812, '2020-02-18 05:32:37', '2020-02-18 05:32:37'),
(47, 5, NULL, NULL, 0, '2020-02-21 12:40:21', '2020-02-21 12:40:21'),
(48, 5, NULL, NULL, 0, '2020-02-21 12:41:14', '2020-02-21 12:41:14'),
(49, 5, NULL, NULL, 0, '2020-02-21 12:43:00', '2020-02-21 12:43:00'),
(50, 5, NULL, NULL, 0, '2020-02-21 12:44:08', '2020-02-21 12:44:08'),
(51, 5, NULL, NULL, 100, '2020-02-21 12:45:58', '2020-02-21 12:45:58'),
(52, 5, NULL, NULL, 100, '2020-02-21 12:53:17', '2020-02-21 12:53:17'),
(53, 5, NULL, NULL, 0, '2020-02-21 12:53:39', '2020-02-21 12:53:39'),
(54, 5, NULL, NULL, 323, '2020-02-21 12:54:11', '2020-02-21 12:54:11'),
(55, 5, NULL, NULL, 0, '2020-02-21 12:55:29', '2020-02-21 12:55:29'),
(56, 5, NULL, NULL, 323, '2020-02-21 12:55:58', '2020-02-21 12:55:58'),
(57, 5, NULL, NULL, 323, '2020-02-21 12:57:24', '2020-02-21 12:57:24'),
(58, 5, NULL, NULL, 323, '2020-02-21 12:59:10', '2020-02-21 12:59:10'),
(59, 5, NULL, NULL, 323, '2020-02-21 22:24:47', '2020-02-21 22:24:47'),
(60, 5, NULL, NULL, 323, '2020-02-21 22:25:34', '2020-02-21 22:25:34'),
(61, 5, NULL, NULL, 969, '2020-02-22 03:18:16', '2020-02-22 03:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `item_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2020-02-21 12:06:40', '2020-02-21 12:06:40'),
(2, 5, 1, 1, '2020-02-21 12:17:15', '2020-02-21 12:17:15'),
(3, 57, 1, 1, NULL, NULL),
(4, 57, 2, 1, NULL, NULL),
(5, 58, 1, 1, NULL, NULL),
(6, 58, 2, 1, NULL, NULL),
(7, 59, 2, 1, NULL, NULL),
(8, 59, 1, 1, NULL, NULL),
(9, 60, 2, 1, NULL, NULL),
(10, 60, 1, 1, NULL, NULL),
(11, 61, 1, 3, NULL, NULL),
(12, 61, 2, 3, NULL, NULL);

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
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `request_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` double NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `description`, `user_id`, `res_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'ff', 2, 0, '2020-02-17 23:38:42', '2020-02-17 23:38:42'),
(2, 5, '77777', 5, 0, '2020-02-18 00:19:07', '2020-02-18 00:19:07'),
(4, 5, 'ngf', 5, 7, '2020-02-18 00:37:13', '2020-02-18 00:37:13'),
(16, 1, 'hghgh', 5, 2, '2020-02-18 03:42:54', '2020-02-18 03:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `request_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `address`, `phone`, `user_type`, `password`, `description`, `image`, `cost`, `city_id`, `category_id`, `request_status`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES
(1, 'peru', 'peru@gmail.com', NULL, 'dnd', '434343', 'Admin', '$2y$10$TPgpcvtYoQu26v9i8Sm/aOf7IMPxgYR7bSknVrpmkk4/3iQhp8cSi', NULL, NULL, NULL, NULL, NULL, 'Pending', NULL, '2020-02-13 02:12:38', '2020-02-13 02:12:38', NULL, NULL, NULL, NULL),
(2, 'Chatbuzzz', 'chatbuzz@gmail.com', NULL, 'tilaghor', '2232', 'Restaurant', '$2y$10$sf0cDUkfAgpa1TeqLF6wsu3hko.FxoCj.1c3o8Hoavqup97otU73C', 'sddsds', '/uploads/EueoER6UOkrQDODalWk5YYiwT67uvsNQTUNSdU7n.jpeg', 300, 1, NULL, 'Approved', NULL, '2020-02-13 02:22:07', '2020-05-01 08:44:14', NULL, NULL, NULL, NULL),
(3, 'peruu', 'peruu@gmail.com', NULL, 'Demo', '45747676', 'User', '$2y$10$2C.D.aO3vTnMXphFn0pZqecRZJOoFjq54FjByJKJLoFpUfssMtoU2', NULL, NULL, NULL, NULL, NULL, 'Pending', NULL, '2020-02-16 18:53:31', '2020-02-16 18:53:31', NULL, NULL, NULL, NULL),
(4, 'peru', 'res@gmail.com', NULL, 'Demo', '345543', 'User', '$2y$10$.Hc.I3ZAxwcaIlJhgLxRY.htmCMDCtOEsD9X..xA1jKBUhEXDEOUu', NULL, NULL, NULL, NULL, NULL, 'Pending', NULL, '2020-02-16 19:03:11', '2020-02-16 19:03:11', NULL, NULL, NULL, NULL),
(5, 'aa', 'aa@gmail.com', NULL, 'hkd', '43636465', 'User', '$2y$10$t1UOnGi/RJgDMhj6y7vB.u6KowAfjdwY6fcaij.LeF9xphsrTq4TS', NULL, NULL, NULL, NULL, NULL, 'Pending', NULL, '2020-02-16 19:18:01', '2020-02-16 19:18:01', NULL, NULL, NULL, NULL),
(6, 'userrr', 'user@gmail.com', NULL, 'Demo', '2323332', 'User', '$2y$10$y.nKnAf8539r4SADGvz1Se8y14LH7PFpeZwrOtL/PMHSWwuRdTk4u', NULL, NULL, NULL, NULL, NULL, 'Pending', NULL, '2020-02-16 22:40:37', '2020-02-16 22:40:37', NULL, NULL, NULL, NULL),
(7, 'The Tinanic', 'tinanic@gmail.com', NULL, 'tilaghor', '34343', 'Restaurant', '$2y$10$zUcdycua5DBTHZ1t3MvqF.D8d51RLZ/adNoWW2K36hy/895cvEuMi', 'dsdsds', '/uploads/giLcctX0whaeTsssD1mpFW3SpvuNgvFky07oQYwb.jpeg', 300, 1, NULL, 'Approved', NULL, '2020-02-17 05:42:12', '2020-02-17 05:42:12', NULL, NULL, NULL, NULL),
(8, 'newww', 'new@gmail.com', NULL, 'mirabazer', '2232sdd', 'Restaurant', '$2y$10$sf0cDUkfAgpa1TeqLF6wsu3hko.FxoCj.1c3o8Hoavqup97otU73C', 'sddsdsd', '/uploads/EueoER6UOkrQDODalWk5YYiwT67uvsNQTUNSdU7n.jpeg', 300, 2, NULL, 'Approved', NULL, '2020-02-13 02:22:07', '2020-02-18 05:26:18', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_tags`
--
ALTER TABLE `food_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food_tags`
--
ALTER TABLE `food_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
