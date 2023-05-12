-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 11:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `prod_id` varchar(255) NOT NULL,
  `prod_quantities` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `order_id`, `user_id`, `prod_id`, `prod_quantities`, `status`, `created_at`, `updated_at`) VALUES
(43, 18, 8, '14', '1', 2, '2023-04-28 04:19:24', '2023-04-28 04:19:24'),
(44, 18, 8, '10', '1', 2, '2023-04-28 04:19:38', '2023-04-28 04:19:38'),
(45, 19, 8, '16', '3', 2, '2023-04-28 04:51:30', '2023-04-28 04:51:30'),
(46, 19, 8, '11', '1', 2, '2023-04-28 04:51:45', '2023-04-28 04:51:45'),
(47, 20, 8, '10', '1', 2, '2023-04-28 04:59:57', '2023-04-28 04:59:57'),
(48, 20, 8, '15', '2', 2, '2023-04-28 05:00:08', '2023-04-28 05:00:08'),
(49, 21, 8, '14', '2', 2, '2023-05-01 04:25:25', '2023-05-01 04:25:25'),
(50, 21, 8, '10', '1', 2, '2023-05-01 04:27:51', '2023-05-01 04:27:51'),
(51, 22, 14, '10', '1', 2, '2023-05-10 05:22:47', '2023-05-10 05:22:47'),
(52, 22, 14, '16', '3', 2, '2023-05-10 05:23:24', '2023-05-10 05:23:24'),
(53, 23, 14, '10', '1', 2, '2023-05-10 05:25:07', '2023-05-10 05:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `slug`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'GItár', 'Pengetős zenei hangszer.', 'gitar', 1, '1681796835-GItár.jpg', '2023-02-12 05:39:10', '2023-02-12 05:39:10'),
(2, 'Dob', 'Ütős hangszer.', 'dob', 1, '1676185207-Dob.jpg', '2023-02-12 05:58:05', '2023-02-12 05:58:05'),
(3, 'Zongora', 'Zongora', 'zongora', 1, '1681795967-Zongora.webp', '2023-03-31 05:43:30', '2023-03-31 05:43:30'),
(5, 'Pengető', 'Elektromos gitárokhoz pengető.', 'pengeto', 1, '1681796016-Pengető.jpg', '2023-04-17 04:24:31', '2023-04-17 04:24:31'),
(6, 'Furulya', 'furulya', 'furulya', 1, '1681796118-Furulya.jpg', '2023-04-17 05:42:18', '2023-04-17 05:42:18'),
(8, 'Basszus', 'Húros pengetős hangszer', 'basszus', 1, '1683703636-Basszus.webp', '2023-05-10 05:27:16', '2023-05-10 05:27:16');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_26_070326_create_products_table', 2),
(6, '2022_10_29_082651_create_categories_table', 3),
(7, '2022_10_29_085103_create_categories_table', 4),
(8, '2022_10_29_085244_create_products__table', 5),
(9, '2023_02_20_060714_create_cart_table', 6),
(10, '2023_02_20_104744_create_cart_table', 7),
(11, '2023_03_13_073108_create_orders_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `forename` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `price` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `surname`, `forename`, `country`, `zip`, `city`, `address`, `phone`, `status`, `price`, `created_at`, `updated_at`) VALUES
(18, 8, 'Test1', 'Test2', 'Magyarország', '9700', 'Szombathely', 'Utcaa 223', '06706208248', 2, 150018, '2023-04-28 04:20:43', '2023-04-28 04:20:43'),
(19, 8, 'Nagy', 'Piréz', 'Magyarország', '9700', 'Szombathely', 'Utca 23', '0670123456', 0, 81800, '2023-04-28 04:52:24', '2023-04-28 04:52:24'),
(20, 8, 'Kósa', 'Martin', 'Magyarország', '9700', 'Szombathely', 'Fő 123', '0670123456', 2, 59000, '2023-04-28 05:00:38', '2023-04-28 05:00:38'),
(21, 8, 'Vezetek', 'Kereszt', 'Magyarország', '9700', 'Szombathely', 'Fő utca 23', '06701234567', 0, 358000, '2023-05-03 05:05:57', '2023-05-03 05:05:57'),
(22, 14, 'Vezetéknév', 'Keresztnév', 'Magyarország', '9700', 'Szombathely', 'Fő utca 12', '06701234567', 1, 59800, '2023-05-10 05:24:36', '2023-05-10 05:24:36'),
(23, 14, 'Vezetéknév', 'Keresztnév', 'Magyarország', '9700', 'Szombathely', 'Fő utca 12', '06701234567', 0, 58000, '2023-05-10 05:25:42', '2023-05-10 05:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('patrik1@patrik.com', '$2y$10$p16gVDfndRaIjSCRp5Cdu.cMmhgnq0oJk2OhMCjJXozo59mI/qmLW', '2023-04-20 08:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `original_price` varchar(255) NOT NULL,
  `selling_price` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(7, 2, 'Kezdő dobok', 'Nagyszerü dobok kezdőknek.', 'Gitar1', '60000', '58000', '1682922169-Kezdő dobok.jpg', '21', 1, '2022-11-01 08:34:35', '2022-11-01 08:34:35'),
(8, 2, 'Haladó dobkészlet', 'Haladóknak ajánlott dobkészlet.', 'Gitar13', '90000', '87000', '1675413321-Gitar.jpg', '21', 1, '2022-11-01 08:58:22', '2022-11-01 08:58:22'),
(10, 1, 'Gitar 20', '6 húros humbucker gitár.', 'Gitar13', '70000', '58000', '1675413437-Gitar 20.jpg', '15', 1, '2022-11-07 08:25:49', '2022-11-07 08:25:49'),
(11, 3, 'Kezdő Zongora', 'Remek nagy zongora kezdőknek.', 'Gitar13', '80000', '80000', '1682921894-Gitar.webp', '20', 1, '2022-11-07 08:27:23', '2022-11-07 08:27:23'),
(12, 2, 'Furulya', 'Fúvós hangszer.', 'Gitar13', '50000', '50000', '1682921966-Gitar.jpg', '0', 0, '2022-11-07 08:30:10', '2022-11-07 08:30:10'),
(14, 2, 'Pro dobok1', 'Professzionális dob készlet.', 'Professzionális dob készlet. Megfelelő mindenre ami dob.', '150000', '150000', '1681712887-Pro dobok.jpg', '40', 1, '2023-04-17 04:28:07', '2023-04-17 04:28:07'),
(15, 5, 'Pengető', 'Pengető', 'pengető', '500', '500', '1682922067-Pengető.jpg', '200', 1, '2023-04-17 05:41:15', '2023-04-17 05:41:15'),
(16, 5, 'Pengető X', 'Nagyszerü vastag pengető', 'Nagyszerü vastag pengető', '600', '600', '1682922078-Pengető X.jpg', '40', 1, '2023-04-17 05:47:18', '2023-04-17 05:47:18'),
(17, 8, 'Kezdő basszus gitár', 'Ez egy remek kezdő basszus gitár.', 'Ez egy remek kezdő basszus gitár.', '80000', '76000', '1683703958-Kezdő basszus gitár.jpg', '15', 1, '2023-05-10 05:32:38', '2023-05-10 05:32:38');

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
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin2', 'admin2@admin.com', NULL, '$2y$10$FP4Y9.aFTRlS03q4E/pH0.2cJNbrn/3IgkGjLoR2cAemnKejKGZg.', 1, NULL, '2022-09-26 05:42:59', '2022-09-26 05:42:59'),
(3, 'User1', 'user@user.com', NULL, '$2y$10$mO/d8faHgquS9MAuX7hFOurugOLb5zq1opw1.4etBuriOo80hCnqi', 0, NULL, '2022-09-26 05:43:50', '2022-09-26 05:43:50'),
(4, 'user2', 'user2@user.com', NULL, '$2y$10$/PHzNDYc7kMEIE8RxIJbHu7P.25pTpYp7kCyyTHsmHdnoQaFaXIqm', 0, NULL, '2022-10-03 05:32:48', '2022-10-03 05:32:48'),
(5, 'Patrik', 'panbooks12@gmail.com', NULL, '$2y$10$v4axVAhr.mKh7fC5KwYybOgBXctMU/c6KKkXA6Pacc0saT643LsQW', 0, 'G8rEeg2K7XgGDiDB2Zy5B6GNcXqXDVAzKCHBwYWsGX0ZXTAghacKUJmzj7VD', '2022-10-31 07:39:26', '2023-04-12 05:21:27'),
(6, 'user3', 'user3@user.com', NULL, '$2y$10$PBfxF3CvrEq7It1qYbfQpeZ.jlumSLaOCotQGwAhE4RY6NezPAs3e', 0, NULL, '2022-10-31 07:52:44', '2022-10-31 07:52:44'),
(7, 'Patrik1', 'patrik@patrik.com', NULL, '$2y$10$qUvZhINOsW/4MRlnGsK/bOZ7/9AlLFwbuMY1AEBsgpwS4zfKcQ9jS', 0, NULL, '2022-10-31 08:07:02', '2022-10-31 08:07:02'),
(8, 'Patrik3', 'patrik2@patrik.com', NULL, '$2y$10$VyXqfKi8xd.wTXCuPjRcKepmFZVjVO845.yRPfEYOvHeFnGM7XDHa', 1, '4CjUMUSOhAsPmSbSNtSUCxM5T2rR3x1SBuSBNkiaFm1UtDd4iR2wwayTfTH4', '2023-01-17 07:38:21', '2023-01-17 07:38:21'),
(9, 'User1', 'user1@freemail.hu', NULL, '$2y$10$pMHLPaxRIjS8Dinj9jOL7e5ZDE6wzdRnXktUlPzzMcr7qJO12Rt/W', 1, NULL, '2023-04-19 04:34:03', '2023-04-19 04:34:03'),
(10, 'Teszt23', 'patrik1@patrik.com', NULL, '$2y$10$Imf.qTHUDQGlEzMoAm9wye/kU3g9WGM2LXSVQz0TP5WPRsS6gUnJe', 0, NULL, '2023-04-20 08:49:39', '2023-04-20 08:49:39'),
(11, 'admin', 'admin@admin.com', NULL, '$2y$10$IXEuJExa.5aDseDc.Ac7v.Olx8M79kKGZtEMw7lqtF31ytRg10p5a', 1, NULL, '2023-05-06 04:48:33', '2023-05-06 04:48:33'),
(12, 'superadmin', 'superadmin@admin.com', NULL, '$2y$10$KVUbNmwiTTBdkuKDBU844.h7xDgOuyGZKWTIVxi6iTkfVi2aEtcUm', 2, NULL, '2023-05-06 04:49:31', '2023-05-06 04:49:31'),
(13, 'Patrik4', 'test1@test.com', NULL, '$2y$10$qp5Z1dGT4UrxeYgFMTg6Xet.g.TjgO7KL4qNh/ojO8Acg6jJvJLOy', 1, NULL, '2023-05-09 04:07:35', '2023-05-09 04:07:35'),
(14, 'felhasznalo12', 'felhasznalo12@email.com', NULL, '$2y$10$cGPbCpT5ugw4b4NH6cERneqAQEtnsA82cm6lxoH5YvUdW7Mo8WfmS', 1, NULL, '2023-05-10 05:22:28', '2023-05-10 05:22:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
