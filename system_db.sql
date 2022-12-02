-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 10:55 AM
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
-- Database: `system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_client`
--

CREATE TABLE `data_client` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_client`
--

INSERT INTO `data_client` (`id`, `kode_client`, `client`, `created_at`, `updated_at`) VALUES
(1, 'BSI', 'Bank Syariah Indonesia', '2022-11-17 08:50:44', '2022-11-17 08:50:44'),
(2, 'MPR', 'Majelis Permusyawaratan Rakyat', '2022-11-17 08:50:58', '2022-11-17 08:50:58'),
(3, 'ACM', 'ACC Manggarai', '2022-11-17 08:51:22', '2022-11-17 08:51:22'),
(4, 'ACN', 'ACC Cibinong', '2022-11-17 08:52:09', '2022-11-17 08:52:09'),
(5, 'ACR', 'ACC Cibubur', '2022-11-17 08:55:11', '2022-11-17 08:55:11'),
(6, 'ACB', 'ACC Kebon Jeruk', '2022-11-17 08:55:19', '2022-11-17 08:55:19'),
(7, 'ACC', 'ACC Kelapa Gading', '2022-11-17 08:55:27', '2022-11-17 08:55:27'),
(8, 'ACK', 'ACC Kwitang', '2022-11-17 08:55:38', '2022-11-17 08:55:38'),
(10, 'ACP', 'ACC Pluit', '2022-11-17 08:56:00', '2022-11-17 08:56:00'),
(11, 'ACS', 'ACC TB Simatupang', '2022-11-17 08:56:08', '2022-11-17 08:56:08'),
(15, 'TST', 'Test Client', '2022-11-29 07:07:30', '2022-11-29 07:07:30'),
(16, 'ENG', 'ENAGIC', '2022-11-29 08:50:23', '2022-11-29 08:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `data_driver`
--

CREATE TABLE `data_driver` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_driver`
--

INSERT INTO `data_driver` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Apang', NULL, NULL),
(2, 'Reza', NULL, NULL),
(3, 'Vian', NULL, NULL),
(4, 'Kusnadi', NULL, NULL),
(5, 'Wawan', NULL, NULL),
(6, 'Rasdi', NULL, NULL),
(7, 'Surip', NULL, NULL),
(8, 'Nani', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_pickup`
--

CREATE TABLE `data_pickup` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipe` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luar_kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dalam_kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp1` int(11) DEFAULT NULL,
  `sp2` int(11) DEFAULT NULL,
  `sp3` int(11) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `driver` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2022_11_23_100307_create_report', 1),
(2, '2022_11_30_101550_add_sp1_sp2_sp3_to_data_pickup_table', 2),
(3, '2022_11_30_105538_add_description_and_remove_lk_dk_on_data_pickup', 3),
(4, '2022_11_17_092732_add_lk_to_data_pickup_table', 4);

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
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_barang`
--

CREATE TABLE `tipe_barang` (
  `id` int(10) UNSIGNED NOT NULL,
  `barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipe_barang`
--

INSERT INTO `tipe_barang` (`id`, `barang`, `created_at`, `updated_at`) VALUES
(2, 'Dokumen', '2022-11-17 08:47:41', '2022-11-17 08:47:41'),
(3, 'Kargo', '2022-11-17 08:47:54', '2022-11-17 08:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mahardika Putra', 'admin@email.com', NULL, '$2y$10$R8OIU4gJBuOXarNp7QejCOB.jRe2OPvWMukJfZmPlRZrqMebk7t2m', NULL, '2022-10-26 00:15:43', '2022-11-13 17:00:00'),
(10, 'Operator', 'operator@email.com', NULL, '$2y$10$VhDT84MWmFsYbvRXerfgxOBM0eveUlggHY0GCaBu1b9tJVuG8ycMK', NULL, '2022-11-24 04:37:47', '2022-11-24 04:37:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_client`
--
ALTER TABLE `data_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_driver`
--
ALTER TABLE `data_driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pickup`
--
ALTER TABLE `data_pickup`
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
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_barang`
--
ALTER TABLE `tipe_barang`
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
-- AUTO_INCREMENT for table `data_client`
--
ALTER TABLE `data_client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `data_driver`
--
ALTER TABLE `data_driver`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `data_pickup`
--
ALTER TABLE `data_pickup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipe_barang`
--
ALTER TABLE `tipe_barang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
