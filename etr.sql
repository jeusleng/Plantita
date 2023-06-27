-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 07:36 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etr`
--

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_05_29_064652_create_users_table', 1),
(3, '2023_05_29_065024_create_order_table', 1),
(4, '2023_05_29_070415_create_plantita_table', 1),
(5, '2023_05_29_071621_create_order_plantita_table', 1),
(6, '2023_05_29_072429_create_payment_table', 1),
(7, '2023_05_29_072710_create_temp_pay_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderno` bigint(20) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `regno` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_plantita`
--

CREATE TABLE `order_plantita` (
  `transno` bigint(20) UNSIGNED NOT NULL,
  `itemno` bigint(20) UNSIGNED NOT NULL,
  `orderno` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payno` bigint(20) UNSIGNED NOT NULL,
  `transno` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `gcashrefno` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plantita`
--

CREATE TABLE `plantita` (
  `itemno` bigint(20) UNSIGNED NOT NULL,
  `itemdesc` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `itemprice` double(8,2) NOT NULL,
  `regno` bigint(20) UNSIGNED NOT NULL,
  `img` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plantita`
--

INSERT INTO `plantita` (`itemno`, `itemdesc`, `itemprice`, `regno`, `img`) VALUES
(1, 'Echeveria', 200.00, 2, '97sWNQgWTwiVkWY4SQB5PfMHKFcrQmYvT3KRji6j.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `temp_pay`
--

CREATE TABLE `temp_pay` (
  `itemno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `regno` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gcash_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`regno`, `username`, `birthday`, `user_type`, `password`, `first_name`, `last_name`, `address`, `gcash_no`) VALUES
(1, 'jus', '2023-06-13', 'customer', '$2y$10$agNL54MRdoI9Yu/jHAuFsOf3s8PxlSYvxQM.I0SneVWsYVPn2g3e.', 'Juslyn', 'Ladera', 'Tarlac', '0912994656'),
(2, 'ann', '2023-06-21', 'seller', '$2y$10$ETz5Pi2ZabhxRqSRfYyRbu.MlkarO4l7wYQ8/skgJOx.D7GshXdTy', 'Ann', 'Ladera', 'Tarlac', '0954264456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderno`),
  ADD KEY `order_regno_foreign` (`regno`);

--
-- Indexes for table `order_plantita`
--
ALTER TABLE `order_plantita`
  ADD PRIMARY KEY (`transno`),
  ADD KEY `order_plantita_itemno_foreign` (`itemno`),
  ADD KEY `order_plantita_orderno_foreign` (`orderno`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payno`),
  ADD KEY `payment_transno_foreign` (`transno`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plantita`
--
ALTER TABLE `plantita`
  ADD PRIMARY KEY (`itemno`),
  ADD KEY `plantita_regno_foreign` (`regno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`regno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_plantita`
--
ALTER TABLE `order_plantita`
  MODIFY `transno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plantita`
--
ALTER TABLE `plantita`
  MODIFY `itemno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `regno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_regno_foreign` FOREIGN KEY (`regno`) REFERENCES `users` (`regno`);

--
-- Constraints for table `order_plantita`
--
ALTER TABLE `order_plantita`
  ADD CONSTRAINT `order_plantita_itemno_foreign` FOREIGN KEY (`itemno`) REFERENCES `plantita` (`itemno`),
  ADD CONSTRAINT `order_plantita_orderno_foreign` FOREIGN KEY (`orderno`) REFERENCES `order` (`orderno`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_transno_foreign` FOREIGN KEY (`transno`) REFERENCES `order_plantita` (`transno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plantita`
--
ALTER TABLE `plantita`
  ADD CONSTRAINT `plantita_regno_foreign` FOREIGN KEY (`regno`) REFERENCES `users` (`regno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
