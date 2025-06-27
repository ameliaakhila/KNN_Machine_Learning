-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2025 pada 14.48
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `id_sample` tinyint(3) UNSIGNED NOT NULL,
  `id_variabel` tinyint(3) UNSIGNED NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT 0,
  `class` varchar(100) NOT NULL,
  `hasil_dist` int(11) NOT NULL DEFAULT 0,
  `hasil_k` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `id_sample`, `id_variabel`, `nilai`, `class`, `hasil_dist`, `hasil_k`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Right', 0, 0, '2025-06-27 05:35:48', '2025-06-27 05:35:48'),
(2, 1, 2, 1, 'Right', 0, 0, '2025-06-27 05:35:48', '2025-06-27 05:35:48'),
(3, 1, 3, 1, 'Right', 0, 0, '2025-06-27 05:35:48', '2025-06-27 05:35:48'),
(4, 1, 4, 2, 'Right', 0, 0, '2025-06-27 05:35:48', '2025-06-27 05:35:48'),
(5, 2, 1, 1, 'Right', 0, 0, '2025-06-27 05:36:06', '2025-06-27 05:36:06'),
(6, 2, 2, 1, 'Right', 0, 0, '2025-06-27 05:36:06', '2025-06-27 05:36:06'),
(7, 2, 3, 1, 'Right', 0, 0, '2025-06-27 05:36:06', '2025-06-27 05:36:06'),
(8, 2, 4, 3, 'Right', 0, 0, '2025-06-27 05:36:06', '2025-06-27 05:36:06'),
(9, 3, 1, 1, 'Right', 0, 0, '2025-06-27 05:36:36', '2025-06-27 05:36:36'),
(10, 3, 2, 1, 'Right', 0, 0, '2025-06-27 05:36:36', '2025-06-27 05:36:36'),
(11, 3, 3, 1, 'Right', 0, 0, '2025-06-27 05:36:36', '2025-06-27 05:36:36'),
(12, 3, 4, 4, 'Right', 0, 0, '2025-06-27 05:36:36', '2025-06-27 05:36:36'),
(13, 4, 1, 1, 'Right', 0, 0, '2025-06-27 05:36:56', '2025-06-27 05:36:56'),
(14, 4, 2, 1, 'Right', 0, 0, '2025-06-27 05:36:56', '2025-06-27 05:36:56'),
(15, 4, 3, 1, 'Right', 0, 0, '2025-06-27 05:36:56', '2025-06-27 05:36:56'),
(16, 4, 4, 5, 'Right', 0, 0, '2025-06-27 05:36:56', '2025-06-27 05:36:56'),
(17, 5, 1, 1, 'Right', 0, 0, '2025-06-27 05:37:18', '2025-06-27 05:37:18'),
(18, 5, 2, 1, 'Right', 0, 0, '2025-06-27 05:37:18', '2025-06-27 05:37:18'),
(19, 5, 3, 2, 'Right', 0, 0, '2025-06-27 05:37:18', '2025-06-27 05:37:18'),
(20, 5, 4, 1, 'Right', 0, 0, '2025-06-27 05:37:18', '2025-06-27 05:37:18'),
(21, 6, 1, 1, 'Right', 0, 0, '2025-06-27 05:37:37', '2025-06-27 05:37:37'),
(22, 6, 2, 1, 'Right', 0, 0, '2025-06-27 05:37:37', '2025-06-27 05:37:37'),
(23, 6, 3, 2, 'Right', 0, 0, '2025-06-27 05:37:37', '2025-06-27 05:37:37'),
(24, 6, 4, 2, 'Right', 0, 0, '2025-06-27 05:37:37', '2025-06-27 05:37:37'),
(25, 7, 1, 1, 'Left', 0, 0, '2025-06-27 05:38:02', '2025-06-27 05:38:02'),
(26, 7, 2, 5, 'Left', 0, 0, '2025-06-27 05:38:02', '2025-06-27 05:38:02'),
(27, 7, 3, 1, 'Left', 0, 0, '2025-06-27 05:38:02', '2025-06-27 05:38:02'),
(28, 7, 4, 1, 'Left', 0, 0, '2025-06-27 05:38:02', '2025-06-27 05:38:02'),
(29, 8, 1, 1, 'Left', 0, 0, '2025-06-27 05:38:36', '2025-06-27 05:38:36'),
(30, 8, 2, 5, 'Left', 0, 0, '2025-06-27 05:38:36', '2025-06-27 05:38:36'),
(31, 8, 3, 1, 'Left', 0, 0, '2025-06-27 05:38:36', '2025-06-27 05:38:36'),
(32, 8, 4, 2, 'Left', 0, 0, '2025-06-27 05:38:36', '2025-06-27 05:38:36'),
(33, 9, 1, 1, 'Left', 0, 0, '2025-06-27 05:39:14', '2025-06-27 05:39:14'),
(34, 9, 2, 5, 'Left', 0, 0, '2025-06-27 05:39:14', '2025-06-27 05:39:14'),
(35, 9, 3, 1, 'Left', 0, 0, '2025-06-27 05:39:14', '2025-06-27 05:39:14'),
(36, 9, 4, 3, 'Left', 0, 0, '2025-06-27 05:39:14', '2025-06-27 05:39:14'),
(37, 10, 1, 1, 'Left', 0, 0, '2025-06-27 05:39:57', '2025-06-27 05:39:57'),
(38, 10, 2, 5, 'Left', 0, 0, '2025-06-27 05:39:57', '2025-06-27 05:39:57'),
(39, 10, 3, 1, 'Left', 0, 0, '2025-06-27 05:39:57', '2025-06-27 05:39:57'),
(40, 10, 4, 4, 'Left', 0, 0, '2025-06-27 05:39:57', '2025-06-27 05:39:57'),
(41, 11, 1, 1, 'Left', 0, 0, '2025-06-27 05:40:27', '2025-06-27 05:40:27'),
(42, 11, 2, 5, 'Left', 0, 0, '2025-06-27 05:40:27', '2025-06-27 05:40:27'),
(43, 11, 3, 2, 'Left', 0, 0, '2025-06-27 05:40:27', '2025-06-27 05:40:27'),
(44, 11, 4, 1, 'Left', 0, 0, '2025-06-27 05:40:27', '2025-06-27 05:40:27'),
(45, 12, 1, 1, 'Left', 0, 0, '2025-06-27 05:40:42', '2025-06-27 05:40:42'),
(46, 12, 2, 5, 'Left', 0, 0, '2025-06-27 05:40:42', '2025-06-27 05:40:42'),
(47, 12, 3, 2, 'Left', 0, 0, '2025-06-27 05:40:42', '2025-06-27 05:40:42'),
(48, 12, 4, 2, 'Left', 0, 0, '2025-06-27 05:40:42', '2025-06-27 05:40:42'),
(49, 13, 1, 1, 'Balance', 0, 0, '2025-06-27 05:41:03', '2025-06-27 05:41:03'),
(50, 13, 2, 1, 'Balance', 0, 0, '2025-06-27 05:41:03', '2025-06-27 05:41:03'),
(51, 13, 3, 1, 'Balance', 0, 0, '2025-06-27 05:41:03', '2025-06-27 05:41:03'),
(52, 13, 4, 1, 'Balance', 0, 0, '2025-06-27 05:41:03', '2025-06-27 05:41:03'),
(53, 14, 1, 1, 'Balance', 0, 0, '2025-06-27 05:41:21', '2025-06-27 05:41:21'),
(54, 14, 2, 2, 'Balance', 0, 0, '2025-06-27 05:41:21', '2025-06-27 05:41:21'),
(55, 14, 3, 1, 'Balance', 0, 0, '2025-06-27 05:41:21', '2025-06-27 05:41:21'),
(56, 14, 4, 2, 'Balance', 0, 0, '2025-06-27 05:41:21', '2025-06-27 05:41:21'),
(57, 15, 1, 1, 'Balance', 0, 0, '2025-06-27 05:41:34', '2025-06-27 05:41:34'),
(58, 15, 2, 2, 'Balance', 0, 0, '2025-06-27 05:41:34', '2025-06-27 05:41:34'),
(59, 15, 3, 2, 'Balance', 0, 0, '2025-06-27 05:41:34', '2025-06-27 05:41:34'),
(60, 15, 4, 1, 'Balance', 0, 0, '2025-06-27 05:41:34', '2025-06-27 05:41:34'),
(61, 16, 1, 1, 'Balance', 0, 0, '2025-06-27 05:42:28', '2025-06-27 05:42:28'),
(62, 16, 2, 3, 'Balance', 0, 0, '2025-06-27 05:42:28', '2025-06-27 05:42:28'),
(63, 16, 3, 1, 'Balance', 0, 0, '2025-06-27 05:42:28', '2025-06-27 05:42:28'),
(64, 16, 4, 3, 'Balance', 0, 0, '2025-06-27 05:42:28', '2025-06-27 05:42:28'),
(65, 17, 1, 1, 'Balance', 0, 0, '2025-06-27 05:42:39', '2025-06-27 05:42:39'),
(66, 17, 2, 3, 'Balance', 0, 0, '2025-06-27 05:42:39', '2025-06-27 05:42:39'),
(67, 17, 3, 3, 'Balance', 0, 0, '2025-06-27 05:42:39', '2025-06-27 05:42:39'),
(68, 17, 4, 1, 'Balance', 0, 0, '2025-06-27 05:42:39', '2025-06-27 05:42:39'),
(69, 18, 1, 1, 'Balance', 0, 0, '2025-06-27 05:42:54', '2025-06-27 05:42:54'),
(70, 18, 2, 4, 'Balance', 0, 0, '2025-06-27 05:42:54', '2025-06-27 05:42:54'),
(71, 18, 3, 1, 'Balance', 0, 0, '2025-06-27 05:42:54', '2025-06-27 05:42:54'),
(72, 18, 4, 4, 'Balance', 0, 0, '2025-06-27 05:42:54', '2025-06-27 05:42:54'),
(73, 19, 5, 1, 'Balance', 0, 0, '2025-06-27 05:43:24', '2025-06-27 05:43:24'),
(74, 19, 6, 3, 'Balance', 0, 0, '2025-06-27 05:43:24', '2025-06-27 05:43:24'),
(75, 19, 7, 1, 'Balance', 0, 0, '2025-06-27 05:43:24', '2025-06-27 05:43:24'),
(76, 19, 8, 2, 'Balance', 0, 0, '2025-06-27 05:43:24', '2025-06-27 05:43:24'),
(77, 20, 5, 1, 'Left', 0, 0, '2025-06-27 05:43:45', '2025-06-27 05:43:45'),
(78, 20, 6, 5, 'Left', 0, 0, '2025-06-27 05:43:45', '2025-06-27 05:43:45'),
(79, 20, 7, 3, 'Left', 0, 0, '2025-06-27 05:43:45', '2025-06-27 05:43:54'),
(80, 20, 8, 1, 'Left', 0, 0, '2025-06-27 05:43:45', '2025-06-27 05:43:45'),
(81, 21, 1, 1, 'Right', 0, 0, '2025-06-27 05:44:11', '2025-06-27 05:44:11'),
(82, 21, 2, 1, 'Right', 0, 0, '2025-06-27 05:44:11', '2025-06-27 05:44:11'),
(83, 21, 3, 2, 'Right', 0, 0, '2025-06-27 05:44:11', '2025-06-27 05:44:11'),
(84, 21, 4, 3, 'Right', 0, 0, '2025-06-27 05:44:11', '2025-06-27 05:44:11'),
(85, 22, 5, 1, 'Right', 0, 0, '2025-06-27 05:46:09', '2025-06-27 05:46:09'),
(86, 22, 6, 1, 'Right', 0, 0, '2025-06-27 05:46:09', '2025-06-27 05:46:09'),
(87, 22, 7, 2, 'Right', 0, 0, '2025-06-27 05:46:09', '2025-06-27 05:46:09'),
(88, 22, 8, 3, 'Right', 0, 0, '2025-06-27 05:46:09', '2025-06-27 05:46:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_06_26_220807_create_variabels_table', 1),
(2, '2025_06_26_221332_create_samples_table', 1),
(3, '2025_06_26_221922_create_data_table', 1),
(4, '2025_06_26_232506_create_sessions_table', 2),
(5, '2025_06_27_000450_remove_id_variabel_and_id_data_from_samples_table', 3),
(6, '2025_06_27_073327_create_uers_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `samples`
--

CREATE TABLE `samples` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `id_variabel` tinyint(3) UNSIGNED NOT NULL,
  `id_data` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `samples`
--

INSERT INTO `samples` (`id`, `id_variabel`, `id_data`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-06-27 05:35:48', '2025-06-27 05:35:48'),
(2, 1, 1, '2025-06-27 05:36:06', '2025-06-27 05:36:06'),
(3, 1, 1, '2025-06-27 05:36:36', '2025-06-27 05:36:36'),
(4, 1, 1, '2025-06-27 05:36:56', '2025-06-27 05:36:56'),
(5, 1, 1, '2025-06-27 05:37:18', '2025-06-27 05:37:18'),
(6, 1, 1, '2025-06-27 05:37:37', '2025-06-27 05:37:37'),
(7, 1, 1, '2025-06-27 05:38:02', '2025-06-27 05:38:02'),
(8, 1, 1, '2025-06-27 05:38:36', '2025-06-27 05:38:36'),
(9, 1, 1, '2025-06-27 05:39:14', '2025-06-27 05:39:14'),
(10, 1, 1, '2025-06-27 05:39:57', '2025-06-27 05:39:57'),
(11, 1, 1, '2025-06-27 05:40:27', '2025-06-27 05:40:27'),
(12, 1, 1, '2025-06-27 05:40:42', '2025-06-27 05:40:42'),
(13, 1, 1, '2025-06-27 05:41:03', '2025-06-27 05:41:03'),
(14, 1, 1, '2025-06-27 05:41:21', '2025-06-27 05:41:21'),
(15, 1, 1, '2025-06-27 05:41:34', '2025-06-27 05:41:34'),
(16, 1, 1, '2025-06-27 05:42:28', '2025-06-27 05:42:28'),
(17, 1, 1, '2025-06-27 05:42:39', '2025-06-27 05:42:39'),
(18, 1, 1, '2025-06-27 05:42:54', '2025-06-27 05:42:54'),
(19, 5, 5, '2025-06-27 05:43:24', '2025-06-27 05:43:24'),
(20, 5, 5, '2025-06-27 05:43:45', '2025-06-27 05:43:45'),
(21, 1, 1, '2025-06-27 05:44:11', '2025-06-27 05:44:11'),
(22, 5, 5, '2025-06-27 05:46:09', '2025-06-27 05:46:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5GVzJ6K9jVFcfpZvRoc7HnaglhnrlJSxoQZJxmqJ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib2NjbHpGZmNnejEyUzRhVTdxR0dOd2pjakNzaU5UdHpockNIMXduMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXRhVmFyaWFiZWwiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1751013039),
('A34iU50WkXGfPU2qxsVXY8cYR8vwucVjeug7TCqf', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibnl5SHdDczRlRm9KYmxMNllhUXo2enZFTjdzekhyWmVTMUI0RVU3TCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM4OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvaGFzaWxQZXJoaXR1bmdhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1751028378);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', '2025-06-27 08:03:54', '$2y$12$H2cijQpR/7hvsbc1OcOkyOkLG6TZIc3ReaJlW3QPkiKUkwip6qmp.', NULL, '2025-06-27 08:03:54', '2025-06-27 01:13:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `variabels`
--

CREATE TABLE `variabels` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `variabel` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `variabels`
--

INSERT INTO `variabels` (`id`, `variabel`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'R-Distance', 'Variabel', 'Obat', '2025-06-26 16:31:44', '2025-06-26 16:31:44'),
(2, 'L-Distance', 'Variabel', 'Obat', '2025-06-26 16:31:56', '2025-06-26 16:33:20'),
(3, 'R-Weight', 'Variabel', 'Obat', '2025-06-26 16:32:09', '2025-06-26 16:35:43'),
(4, 'L-Weight', 'Variabel', 'Obat', '2025-06-26 16:33:03', '2025-06-26 16:33:03'),
(5, 'R-Distance', 'Variabel Uji', 'Obat', '2025-06-26 16:33:45', '2025-06-26 16:34:11'),
(6, 'L-Distance', 'Variabel Uji', 'Obat', '2025-06-26 16:34:30', '2025-06-26 16:34:30'),
(7, 'R-Weight', 'Variabel Uji', 'Obat', '2025-06-26 16:34:49', '2025-06-26 16:36:20'),
(8, 'L-Weight', 'Variabel Uji', 'Obat', '2025-06-26 16:35:07', '2025-06-26 16:36:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_id_sample_foreign` (`id_sample`),
  ADD KEY `data_id_variabel_foreign` (`id_variabel`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `samples`
--
ALTER TABLE `samples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `samples_id_variabel_foreign` (`id_variabel`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `variabels`
--
ALTER TABLE `variabels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `samples`
--
ALTER TABLE `samples`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `variabels`
--
ALTER TABLE `variabels`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_id_sample_foreign` FOREIGN KEY (`id_sample`) REFERENCES `samples` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_id_variabel_foreign` FOREIGN KEY (`id_variabel`) REFERENCES `variabels` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `samples`
--
ALTER TABLE `samples`
  ADD CONSTRAINT `samples_id_variabel_foreign` FOREIGN KEY (`id_variabel`) REFERENCES `variabels` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
