-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 05:59 AM
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
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `instance`, `customer_name`, `contact`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Starbhak', 'Achmad Fadli I', '081905157614', 'jalan kopo no 27 beji depok', '2022-04-19 22:34:05', '2022-04-19 22:34:05'),
(2, 'Starbhak', 'Irvan Vee', 'irvanvee@gmail.com', 'jalan suka permai no 27 cimanggis dpk', '2022-04-19 22:34:32', '2022-04-19 22:34:32'),
(3, 'Starbhak', 'Gloria naftali', 'gloria-dut.com@gmail.com', 'jalan manggis permai no 28 sukamaju depok', '2022-04-19 22:35:08', '2022-04-19 22:35:08'),
(4, 'SMK N 1 Cileungsi', 'Bpk. Sugiyanto', '081284701234', 'Cileungsi Jawa Barat', '2022-04-25 00:29:53', '2022-04-25 00:29:53'),
(5, 'SMK BAKTI 17', 'Pak Raul', '09012421321', 'jalan jagakarsa', '2022-04-25 21:01:16', '2022-04-25 21:01:16'),
(6, 'Starbhak', 'dzanka', '0921423', 'jakarta', '2022-04-25 21:02:09', '2022-04-25 21:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `detail_invoices`
--

CREATE TABLE `detail_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sum_product` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_invoices`
--

INSERT INTO `detail_invoices` (`id`, `invoice_id`, `product_id`, `quantity`, `sum_product`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 7, 35000000, '2022-05-08 21:39:32', '2022-05-10 00:01:43'),
(2, 2, 4, 4, 20000000, '2022-05-08 21:43:29', '2022-05-09 21:50:19'),
(4, 4, 4, 3, 15000000, '2022-05-09 23:45:00', '2022-05-09 23:45:00'),
(9, 7, 4, 2, 200000, '2022-06-13 22:39:29', '2022-06-13 22:39:29'),
(11, 9, 4, 5, 25000000, '2022-06-14 01:27:13', '2022-06-14 01:27:13');

--
-- Triggers `detail_invoices`
--
DELIMITER $$
CREATE TRIGGER `hitungstock` AFTER INSERT ON `detail_invoices` FOR EACH ROW BEGIN UPDATE product SET stock=stock-NEW.quantity WHERE id = NEW.product_id; 
        END
$$
DELIMITER ;

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
(1, 1, 1, 4, 3, 15000000, '2022-04-25 22:36:49', '2022-04-25 22:36:49'),
(2, 2, 1, 4, 2, 6000000, '2022-04-25 22:42:10', '2022-04-25 22:42:10'),
(3, 2, 2, 3, 2, 1000000, '2022-04-25 22:42:10', '2022-04-25 22:42:10'),
(4, 3, 1, 4, 2, 200000, '2022-04-25 23:25:21', '2022-04-25 23:25:21');

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
(1, 'DISKON HARI RAYA', 20, '2022-04-19 22:37:17', '2022-04-19 22:37:17'),
(2, 'Diskon Lebaran', 50, '2022-04-19 22:37:27', '2022-04-19 22:37:27'),
(3, 'Diskon pakaian', 75, '2022-04-19 22:37:40', '2022-04-19 22:37:40'),
(4, 'diskon bazar', 100, '2022-04-19 22:37:59', '2022-04-19 22:37:59');

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
  `vendor_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `marketing_id` int(11) DEFAULT NULL,
  `refrensi` int(11) NOT NULL,
  `duedate` date NOT NULL,
  `discount_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `pengiriman` int(11) NOT NULL,
  `dibayar` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `ttd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tunggakan` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `vendor_id`, `customer_id`, `marketing_id`, `refrensi`, `duedate`, `discount_id`, `tax_id`, `pengiriman`, `dibayar`, `total`, `ttd`, `tunggakan`, `status`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 2, 610, '2022-05-10', 3, 1, 100000, 82000000, 54350000, 'coba.png.1652071172.png', -27650000, 'Pending', '<p>bismillah coba lagi</p>', '2022-05-08 21:39:32', '2022-05-20 02:12:15'),
(2, 1, 4, 3, 782, '2022-04-26', 3, 1, 450000, 10000000, 23700000, 'coba.png.1652071409.png', 13700000, 'Terlambat', '<p>bismillah</p>', '2022-05-08 21:43:29', '2022-05-20 02:12:22'),
(4, 2, 3, 1, 606, '2022-05-27', 2, 1, 540000, 47000000, 54350000, 'routee.PNG.1652165100.png', 7350000, 'Dibayar', '<p>BISMILLAH</p>', '2022-05-09 23:45:00', '2022-05-20 02:12:33'),
(7, 1, 5, 1, 203, '2022-04-26', 4, 3, 0, 350000, 250000, 'olahraga.png.1655185169.png', -100000, 'Dibatalkan', '<p>coba lagi</p>', '2022-06-13 22:39:29', '2022-06-13 22:46:37'),
(9, 1, 3, 2, 729, '2022-06-14', 2, 2, 0, 25000000, 25000000, 'KARTUPESERTA_UTBKSBMPTN_122321260722 (4).jpg.1655195233.jpg', 0, 'Dibayar', '<p>tes</p>', '2022-06-14 01:27:13', '2022-06-14 01:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marketing_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`id`, `marketing_name`, `instance`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Achmad Fadli', 'Starbhak', 'jalan kopo no 27 beji depok', '2022-04-25 01:46:58', '2022-04-25 01:47:42'),
(2, 'Irvan', 'Starbhak', 'jalan sukamaju permai no 12', '2022-04-25 22:24:30', '2022-04-25 22:24:48'),
(3, 'Hesti Hera', 'Starbhak', 'jalan penganggsaan timur no 123', '2022-04-25 22:35:12', '2022-04-25 22:35:12');

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
(19, '2014_10_12_100000_create_password_resets_table', 1),
(20, '2019_08_19_000000_create_failed_jobs_table', 1),
(21, '2021_12_06_020132_create_customers_table', 1),
(23, '2021_12_06_074508_create_penggunas_table', 1),
(24, '2021_12_06_075221_create_taxes_table', 1),
(25, '2021_12_07_042907_add_vendor_to_product_table', 1),
(26, '2022_01_17_045425_create_discount_table', 1),
(29, '2022_01_17_045532_create_quotation_table', 1),
(30, '2022_02_14_072908_create_detail_quotations_table', 1),
(31, '2022_02_22_054529_create_detail_invoices_table', 1),
(32, '2022_03_07_035618_drop_tabel_user', 1),
(33, '2022_03_08_042012_create_permission_tables', 1),
(34, '2022_03_08_090157_create_vendor_table', 1),
(35, '2014_10_12_000000_create_users_table', 2),
(36, '2021_12_06_072715_create_products_table', 3),
(37, '2022_01_17_045524_create_invoice_table', 4),
(38, '2022_01_17_045446_create_marketing_table', 5),
(39, '2022_05_09_043253_create_hitungstock_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 2),
(6, 'App\\Models\\User', 2),
(7, 'App\\Models\\User', 3),
(8, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 2);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Add Invoice', 'web', '2022-04-20 20:30:48', '2022-04-20 20:30:48'),
(2, 'Invoice List', 'web', '2022-04-20 20:31:00', '2022-04-20 20:31:00'),
(3, 'Add Quotation', 'web', '2022-04-20 20:31:10', '2022-04-20 20:31:10'),
(4, 'Quote List', 'web', '2022-04-20 20:31:18', '2022-04-20 20:31:18'),
(5, 'Add Product', 'web', '2022-06-14 20:47:25', '2022-06-14 20:47:25'),
(6, 'Product List', 'web', '2022-06-14 20:47:51', '2022-06-14 20:47:51'),
(7, 'Add Customer', 'web', '2022-06-14 20:48:57', '2022-06-14 20:48:57'),
(8, 'Customers List', 'web', '2022-06-14 20:49:14', '2022-06-14 20:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
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
(3, 'MOS Voucher Test', 2, 750000, 89, '<p>Ujian Sertifikasi Internasional Microsoft</p>', '2022-04-25 00:25:36', '2022-04-25 00:25:36'),
(4, 'Simak Pay', 1, 5000000, 79, '<p>Aplikasi untuk pembayaran</p>', '2022-04-25 00:26:49', '2022-04-25 00:26:49');

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
(1, 3, 4, 782, '2022-04-26', 3, 3, 0, 15000000, '<p>bismillah</p>', '2022-04-25 22:36:49', '2022-04-25 22:36:49'),
(2, 2, 6, 144, '2022-04-20', 2, 3, 340000, 5215000, '<p>bismillah</p>', '2022-04-25 22:42:10', '2022-04-25 22:42:10'),
(3, 1, 5, 203, '2022-04-26', 2, 2, 0, 200000, '<p>coba lagi</p>', '2022-04-25 23:25:21', '2022-04-25 23:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-04-19 22:21:37', '2022-04-19 22:21:37'),
(2, 'marketing', 'web', '2022-04-19 22:21:37', '2022-04-19 22:21:37'),
(3, 'vendor', 'web', '2022-04-19 22:21:37', '2022-04-19 22:21:37');

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
(1, 'pajak makanan', 20, NULL, '2022-04-19 22:36:27', '2022-04-19 22:36:27'),
(2, 'Pajak Harian', 50, NULL, '2022-04-19 22:36:35', '2022-04-19 22:36:35'),
(3, 'pajak restoran', 75, NULL, '2022-04-19 22:36:50', '2022-04-19 22:36:50'),
(4, 'Pajak Kendaraan', 100, NULL, '2022-04-19 22:36:59', '2022-04-19 22:36:59');

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
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `gender`, `active`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Left4code', 'midone@left4code.com', '2022-04-19 22:22:09', '$2y$10$E1AdeiWb1ylAktsja0xEUu6prqeEzMzll3eJUI6L6a01.aBVcXdYW', NULL, 'male', 1, NULL, NULL, '2022-04-19 22:22:09', '2022-04-19 22:22:09'),
(2, 'Savisindo', 'savisi@gmail.com', '2022-04-20 19:17:24', '$2y$10$vSVSc2t0ebSSQA6D6Wd.2uFXqQHyeiswkNpFKziophVkFmZW8jimu', NULL, NULL, NULL, NULL, NULL, '2022-04-20 19:17:24', '2022-04-20 19:17:24'),
(3, 'Sima.ID', 'sima.id@gmail.com', '2022-04-20 19:26:39', '$2y$10$5X72FTikmzQ4e8F8dKnoAuSifeSZTBWVyJSMazjiL/Ne0RVbIlu4.', NULL, NULL, NULL, NULL, NULL, '2022-04-20 19:26:39', '2022-04-20 19:26:39'),
(4, 'orang', 'orang@gmail.com', '2022-05-08 21:09:12', '$2y$10$I7yHcyD53NjMe5nbJeQO.urfr3zgi9/Dd.wUg4LxUK.bwUjzDtxRe', NULL, NULL, NULL, '2022-05-08 21:23:44', NULL, '2022-05-08 21:09:12', '2022-05-08 21:23:44'),
(5, 'fadli', 'af137357@gmail.com', '2022-06-14 00:45:54', '$2y$10$r3MXfyI2dCbj7vmsOJMuke/CxphTD/mqlCizTvlDhUE7VXkOTevFi', NULL, NULL, NULL, '2022-06-14 00:47:03', NULL, '2022-06-14 00:45:54', '2022-06-14 00:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `vendor_name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Savisindo', 'jalan masjid bendungan no 27 jaktim', '2022-04-19 22:24:19', '2022-04-19 22:24:19'),
(2, 'TCC', 'jalan sumur 7 2 kalibata raya', '2022-04-19 22:24:50', '2022-04-19 22:24:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_invoices`
--
ALTER TABLE `detail_invoices`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
-- Indexes for table `tax`
--
ALTER TABLE `tax`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_invoices`
--
ALTER TABLE `detail_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_quotations`
--
ALTER TABLE `detail_quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
