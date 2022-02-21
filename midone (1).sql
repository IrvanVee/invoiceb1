-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 05:22 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midone`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `instance`, `customer_name`, `contact`, `created_at`, `updated_at`) VALUES
(15, 'Starbhak', 'Vee Namikaze', 'veenamikazenabila5@gmail.com', '2021-12-06 00:18:29', '2021-12-26 18:56:44'),
(29, 'Starbhak', 'Fadli', 'fadli@gmail.com', '2022-01-16 19:40:22', '2022-01-16 19:40:22'),
(30, 'Starbhak', 'Gloria', 'gloria@gmail.com', '2022-01-17 02:49:14', '2022-01-17 02:49:14'),
(31, 'Starbhak', 'Wahyu Ramadhan', 'wahyue45@gmail.com', '2022-02-10 19:17:26', '2022-02-10 19:17:43'),
(32, 'Starbhak', 'Dzaki Ahnaf', 'dzarts@gmail.com', '2022-02-17 01:22:22', '2022-02-17 01:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `detail_quotations`
--

CREATE TABLE `detail_quotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sum_product` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_quotations`
--

INSERT INTO `detail_quotations` (`id`, `quotation_id`, `vendor_id`, `product_id`, `quantity`, `sum_product`, `created_at`, `updated_at`) VALUES
(16, 7, 1, 9, 1, 70000, '2022-02-20 20:40:31', '2022-02-20 20:40:31'),
(17, 7, 2, 11, 1, 45000, '2022-02-20 20:40:31', '2022-02-20 20:40:31'),
(18, 7, 1, 10, 3, 162000, '2022-02-20 20:40:32', '2022-02-20 20:40:32'),
(19, 8, 1, 10, 2, 108000, '2022-02-20 20:42:47', '2022-02-20 20:42:47'),
(20, 8, 2, 12, 3, 168000, '2022-02-20 20:42:47', '2022-02-20 20:42:47'),
(21, 8, 1, 9, 10, 700000, '2022-02-20 20:42:47', '2022-02-20 20:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_discount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `name`, `nilai_discount`, `created_at`, `updated_at`) VALUES
(1, 'Diskon 1', 20, '2022-01-16 22:38:29', '2022-01-16 22:38:29'),
(2, 'Diskon 2', 10, '2022-01-16 22:38:43', '2022-01-16 22:38:43'),
(3, 'Diskon 3', 5, '2022-01-16 22:39:13', '2022-01-16 22:39:13'),
(4, 'DISKON RESTORAN', 0, '2022-01-23 21:29:39', '2022-01-23 21:29:39'),
(5, 'DISKON HARI RAYA', 15, '2022-02-01 05:54:26', '2022-02-01 05:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marketing_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`id`, `marketing_name`, `created_at`, `updated_at`) VALUES
(1, 'TCC', NULL, NULL),
(2, 'SIMA.ID', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_12_06_020132_create_customers_table', 2),
(5, '2021_12_06_072715_create_products_table', 3),
(6, '2021_12_06_074508_create_penggunas_table', 4),
(7, '2021_12_06_075221_create_taxes_table', 5),
(8, '2021_12_07_042907_add_vendor_to_product_table', 6),
(9, '2022_01_17_045425_create_discount_table', 7),
(10, '2022_01_17_045446_create_marketing_table', 7),
(11, '2022_01_17_045524_create_invoice_table', 7),
(12, '2022_01_17_045532_create_quotation_table', 8),
(13, '2022_02_14_072908_create_detail_quotations_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `vendor_id`, `price`, `stock`, `deskripsi`, `created_at`, `updated_at`) VALUES
(9, 'Motor', 1, 70000, 30, '<p>Motor keren dari india</p>', '2022-01-14 01:54:50', '2022-01-14 01:54:50'),
(10, 'Jaket', 1, 54000, 20, '<p>keren dan berkualitas</p>', '2022-01-16 23:10:22', '2022-02-10 19:15:48'),
(11, 'Gelas', 2, 45000, 25, '<p>keren</p>\r\n<p>&nbsp;</p>', '2022-01-17 00:51:30', '2022-01-17 00:54:17'),
(12, 'Susu', 2, 56000, 20, '<p>testing angka</p>', '2022-01-17 23:57:31', '2022-01-17 23:57:31'),
(13, 'Radio', 1, 32000, 10, '<p>radio buatan indonesia</p>', '2022-01-17 23:59:55', '2022-01-31 00:32:05'),
(14, 'Keju', 2, 46000, 25, '<p>keju import dari amerika</p>', '2022-01-19 22:41:15', '2022-01-19 22:41:15'),
(15, 'Hp', 1, 40000, 20, '<p>hp dari luar negeri</p>', '2022-02-10 19:14:32', '2022-02-10 19:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marketing_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `refrensi` int(11) NOT NULL,
  `duedate` date NOT NULL,
  `discount_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `pengiriman` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`id`, `marketing_id`, `customer_id`, `refrensi`, `duedate`, `discount_id`, `tax_id`, `pengiriman`, `total`, `note`, `created_at`, `updated_at`) VALUES
(7, 1, 30, 721, '2022-02-24', 5, 9, 217700, 467000, '<p>Quotation Milik Marketing TCC dan Customer Gloria</p>', '2022-02-20 20:40:31', '2022-02-20 20:40:31'),
(8, 2, 15, 488, '2022-02-21', 2, 1, 1000, 879400, '<p>Quotation Milik Pak Irfan dan Marketing SIMA.ID</p>', '2022-02-20 20:42:47', '2022-02-20 20:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_value` int(11) NOT NULL,
  `percentage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `name`, `tax_value`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 'PPN', 20, '%', NULL, NULL),
(8, 'Diskon 1', 40, NULL, '2022-01-16 20:57:18', '2022-01-16 20:57:18'),
(9, 'PAJAK MAKANAN', 25, NULL, '2022-01-16 20:58:08', '2022-01-16 20:58:08'),
(10, 'Pajak Kendaraan', 15, NULL, '2022-01-16 22:39:41', '2022-01-16 22:39:41'),
(11, 'PAJAK RESTORAN', 0, NULL, '2022-01-23 21:29:24', '2022-01-23 21:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `roles`, `created_at`, `updated_at`) VALUES
(15, 'veenamikazenabila5@gmail.com', 'namikaze', 'Irvan Fadillah', 'Admin', '2021-12-27 01:02:10', '2021-12-27 01:02:10'),
(16, 'botak@mail.yeah', 'botak', 'botak', 'Marketing', NULL, '2021-12-30 21:11:54'),
(20, 'dzakiahnafz@gmail.com', 'satusatu', 'Dzaki ahnaf', 'Vendor', '2022-02-01 05:37:43', '2022-02-01 06:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `gender`, `active`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Left4code', 'midone@left4code.com', '2021-11-22 02:39:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'male', 1, NULL, 'jD7BwnZVOgXXYgEA1ydkRvC9z2lDljPqm4joBUhCpCNq98ISTAOkxD54TYZB', NULL, NULL),
(2, 'Prof. Freeman Waelchi', 'sbeer@example.com', '2021-11-22 02:39:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'male', 1, NULL, 'ffYhjOAhos', '2021-11-22 02:39:35', '2021-11-22 02:39:35'),
(3, 'Mr. Ike Runolfsdottir Jr.', 'thad.krajcik@example.com', '2021-11-22 02:39:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'female', 1, NULL, 'veX8XjVO6b', '2021-11-22 02:39:35', '2021-11-22 02:39:35'),
(4, 'Miss Mafalda Lowe DVM', 'bryana.bernier@example.org', '2021-11-22 02:39:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'female', 1, NULL, 'zFDKxI5prP', '2021-11-22 02:39:35', '2021-11-22 02:39:35'),
(5, 'Waldo Murray', 'zieme.twila@example.com', '2021-11-22 02:39:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'male', 1, NULL, 'Dct7NHLJfm', '2021-11-22 02:39:35', '2021-11-22 02:39:35'),
(6, 'Miss Ona Casper', 'orn.kieran@example.org', '2021-11-22 02:39:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'female', 1, NULL, 'A2kINZ0dlg', '2021-11-22 02:39:35', '2021-11-22 02:39:35'),
(7, 'Caleigh Stiedemann', 'qpurdy@example.com', '2021-11-22 02:39:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'male', 1, NULL, 'kmucLQhqTA', '2021-11-22 02:39:35', '2021-11-22 02:39:35'),
(8, 'Leonel Wehner', 'marshall.keeling@example.net', '2021-11-22 02:39:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'female', 1, NULL, 'DGQ7hhIoPz', '2021-11-22 02:39:35', '2021-11-22 02:39:35'),
(9, 'Lenny Tremblay', 'ugrant@example.net', '2021-11-22 02:39:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'male', 1, NULL, 'f1y1PKPYpH', '2021-11-22 02:39:35', '2021-11-22 02:39:35'),
(10, 'Joan Lowe', 'sabshire@example.com', '2021-11-22 02:39:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'female', 1, NULL, 'UpQ6sW2Dwt', '2021-11-22 02:39:35', '2021-11-22 02:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `vendor_name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `vendor_name`) VALUES
(1, 'B One'),
(2, 'SAVISINDO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_quotations`
--
ALTER TABLE `detail_quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing`
--
ALTER TABLE `marketing`
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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `detail_quotations`
--
ALTER TABLE `detail_quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
