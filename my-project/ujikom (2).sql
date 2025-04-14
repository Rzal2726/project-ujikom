-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2025 at 04:13 PM
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
-- Database: `ujikom`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL DEFAULT 'Dummy',
  `stok` int(11) NOT NULL,
  `id_kategori` int(255) DEFAULT 1,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `stok`, `id_kategori`, `harga`) VALUES
(7, 'Kabel HDMI', 2, 1, 25000),
(8, 'HDD 250GB', 0, 7, 60000),
(9, 'i6 5500X', 3, 4, 320000),
(10, 'RZ 7700XT', 7, 3, 3200000),
(11, '16GB Kit DDR2', 6, 8, 350000),
(12, 'A9 9600', 9, 4, 960000),
(13, 'SSD NVME 128GB', 10, 7, 110000),
(14, 'PSU 400W 80+ Bronze', 9, 6, 390000),
(15, 'PSU 550W 80+ Bronze', 9, 6, 590000),
(16, 'Kabel VGA', 9, 1, 50000),
(17, 'LGA 1150', 10, 5, 50000);

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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Aksesoris'),
(3, 'VGA'),
(4, 'Processor'),
(5, 'Motherboard'),
(6, 'Power Supply'),
(7, 'Storage'),
(8, 'RAM');

-- --------------------------------------------------------

--
-- Table structure for table `login_counter`
--

CREATE TABLE `login_counter` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_counter`
--

INSERT INTO `login_counter` (`id`, `id_user`, `tanggal`, `ip`) VALUES
(1, 2, '2025-04-08', '127.0.0.1'),
(2, 2, '2025-04-09', '127.0.0.1'),
(3, 3, '2025-04-09', '127.0.0.1'),
(4, 3, '2025-04-13', '127.0.0.1'),
(5, 3, '2025-04-13', '127.0.0.1'),
(6, 3, '2025-04-13', '127.0.0.1'),
(7, 3, '2025-04-13', '127.0.0.1'),
(8, 3, '2025-04-13', '127.0.0.1'),
(9, 3, '2025-04-13', '127.0.0.1'),
(10, 2, '2025-04-14', '127.0.0.1'),
(11, 2, '2025-04-14', '127.0.0.1'),
(12, 2, '2025-04-14', '127.0.0.1'),
(13, 2, '2025-04-14', '127.0.0.1'),
(14, 3, '2025-04-14', '127.0.0.1'),
(15, 2, '2025-04-14', '127.0.0.1');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_03_061106_create_personal_access_tokens_table', 2);

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
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `no_telp`, `alamat`) VALUES
(18, 'Rizal Firdaus', '83116549766', 'Jl. Pesantren Bunisari, RT05/RW05, Desa Gadobangkong, Kecamatan Ngamprah'),
(19, 'Bagas Dwi P', '87784933073', 'Baros'),
(21, 'John Doe', '12345678910', '1234 Elm Street, Somewhere, CA, 90210');

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(15, 'App\\Models\\User', 2, 'API Token', '6f612ab1cd706279a6955082c22276c54e0871cd15c47d67ceda24566d528531', '[\"*\"]', '2025-04-07 07:01:08', NULL, '2025-04-07 05:13:16', '2025-04-07 07:01:08'),
(17, 'App\\Models\\User', 2, 'API Token', '2ff508904bf6b6887e44f66628268b641c8f3b86644a2e282379e57584740e15', '[\"*\"]', '2025-04-07 21:39:19', NULL, '2025-04-07 20:59:36', '2025-04-07 21:39:19'),
(19, 'App\\Models\\User', 3, 'API Token', '22271d4ec843c16a75fbcd27dfec2cdf032e3052a124920d93295e73bfaf29e3', '[\"*\"]', '2025-04-09 03:59:15', NULL, '2025-04-09 03:59:11', '2025-04-09 03:59:15'),
(20, 'App\\Models\\User', 3, 'API Token', '0bc9568c698f43ba73be558de636340c3b8ffa41acbd8f1bdc3374369232e452', '[\"*\"]', '2025-04-13 03:08:58', NULL, '2025-04-13 03:04:10', '2025-04-13 03:08:58'),
(21, 'App\\Models\\User', 3, 'API Token', '371f96de668a6784c3002f9ecb243aea41d9eaed839ffa406b0b9c4dbe56b4ef', '[\"*\"]', '2025-04-13 03:09:24', NULL, '2025-04-13 03:09:04', '2025-04-13 03:09:24'),
(31, 'App\\Models\\User', 2, 'API Token', 'd06fb922558dac97cecea4fe95bdbf03ba662dcfed9922bab8603ff753ed231e', '[\"*\"]', '2025-04-14 07:13:13', NULL, '2025-04-14 07:13:09', '2025-04-14 07:13:13');

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
('VzSV617d01F2DfAEp4ttqtdJKsjfzx18yc6TcIRG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 OPR/117.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibG5XQ1JZOUtqU1hRSlFmbU8ybkd5ZjkxamJtWFNJZ2FTN2hqeWpUcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1744639990);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `daftar_produk` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_admin` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `harga`, `daftar_produk`, `tanggal`, `id_pelanggan`, `id_admin`) VALUES
(12, '3930000', 'HDD 250GB | Qty: 1 | Harga: Rp 60.000 | Total: Rp 60.000 ,\ni6 5500X | Qty: 1 | Harga: Rp 320.000 | Total: Rp 320.000 ,\nRZ 7700XT | Qty: 1 | Harga: Rp 3.200.000 | Total: Rp 3.200.000 ,\n16GB Kit DDR2 | Qty: 1 | Harga: Rp 350.000 | Total: Rp 350.000 ,', '2025-04-14', 18, 2),
(13, '5060000', 'RZ 7700XT | Qty: 1 | Harga: Rp 3.200.000 | Total: Rp 3.200.000 ,\n16GB Kit DDR2 | Qty: 1 | Harga: Rp 350.000 | Total: Rp 350.000 ,\nA9 9600 | Qty: 1 | Harga: Rp 960.000 | Total: Rp 960.000 ,\nSSD NVME 128GB | Qty: 1 | Harga: Rp 110.000 | Total: Rp 110.000 ,\nPSU 400W 80+ Bronze | Qty: 1 | Harga: Rp 390.000 | Total: Rp 390.000 ,\nKabel VGA | Qty: 1 | Harga: Rp 50.000 | Total: Rp 50.000 ,', '2025-04-12', 19, 2),
(15, '25000', 'Kabel HDMI | Qty: 1 | Harga: Rp 25.000 | Total: Rp 25.000 ,', '2025-04-14', 18, 2),
(16, '1070000', 'A9 9600 | Qty: 1 | Harga: Rp 960.000 | Total: Rp 960.000 ,\nSSD NVME 128GB | Qty: 1 | Harga: Rp 110.000 | Total: Rp 110.000 ,', '2025-04-14', 19, 3),
(17, '590000', 'PSU 550W 80+ Bronze | Qty: 1 | Harga: Rp 590.000 | Total: Rp 590.000 ,', '2025-04-14', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level_id` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `level_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Rizal', 'rizal2726f@gmail.com', 2, NULL, '$2y$12$11wgdMyp0Q548rsSdZBmR.cPP5wz4qXXU38xVMkRiwjl1XUvO0/pS', NULL, '2025-04-06 22:07:04', '2025-04-14 05:42:43'),
(3, 'Admin', 'bagas@example.com', 1, NULL, '$2y$12$XKKh/Oaye41bbuu9rKjHDO0Weu5lH3McT6ZF5eL2wD9Cx50fIPJ92', NULL, '2025-04-09 03:57:37', '2025-04-13 21:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'SuperAdmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
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
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_counter`
--
ALTER TABLE `login_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_admin` (`level_id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_counter`
--
ALTER TABLE `login_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`level_id`) REFERENCES `user_level` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
