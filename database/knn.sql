-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2025 pada 11.31
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_sample` bigint(20) UNSIGNED NOT NULL,
  `id_variabel` bigint(20) UNSIGNED NOT NULL,
  `nilai` int(11) NOT NULL,
  `hasil_dist` double NOT NULL DEFAULT 0,
  `hasil_k` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2025_06_21_043557_create_variabels_table', 1),
(2, '2025_06_23_220102_create_samples_table', 1),
(3, '2025_06_23_221936_create_data_table', 1),
(7, '2025_06_23_222751_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `samples`
--

CREATE TABLE `samples` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('Apb0oPVyvbLDSGjAGdNOiw6gRcNepYZRs8ctM9k6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaHdoaXF6MEZjQlVuc3RScWpYSHUySXJkekttWUh2V1A4MGUzaVZXWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6MTAwMC9oYXNpbFBlcmhpdHVuZ2FuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1750756939);

-- --------------------------------------------------------

--
-- Struktur dari tabel `variabels`
--

CREATE TABLE `variabels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `variabel` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `variabels`
--

INSERT INTO `variabels` (`id`, `variabel`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'R-Distance', 'Variabel', 'Obat', '2025-06-23 17:48:42', '2025-06-23 17:48:42'),
(2, 'L-Distance', 'Variabel', 'Obat Warung', '2025-06-23 17:48:51', '2025-06-23 19:05:02'),
(3, 'R-Weight', 'Variabel', 'Obat Warung', '2025-06-23 20:30:35', '2025-06-23 20:30:35'),
(4, 'L-Weight', 'Variabel', 'Obat Antibiotik', '2025-06-23 20:30:56', '2025-06-23 20:30:56'),
(5, 'L-Weight', 'Variabel Uji', 'Obat Warung', '2025-06-23 21:06:56', '2025-06-23 21:06:56'),
(6, 'R-Weight', 'Variabel Uji', 'Obat Warung', '2025-06-23 21:07:23', '2025-06-23 21:07:23'),
(7, 'L-Distance', 'Variabel Uji', 'Obat Warung', '2025-06-23 21:07:54', '2025-06-23 21:07:54'),
(8, 'R-Distance', 'Variabel Uji', 'Obat Warung', '2025-06-23 21:08:11', '2025-06-23 21:08:11');

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
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `samples`
--
ALTER TABLE `samples`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `variabels`
--
ALTER TABLE `variabels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_id_sample_foreign` FOREIGN KEY (`id_sample`) REFERENCES `samples` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_id_variabel_foreign` FOREIGN KEY (`id_variabel`) REFERENCES `variabels` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
