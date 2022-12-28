-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2022 pada 14.57
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject_tsa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_14_043321_tambah_kolom_di_tabel_user', 1),
(6, '2022_07_30_123629_create_survei_table', 1),
(7, '2022_07_30_132939_create_petugas_table', 1),
(8, '2022_07_30_134130_create_pengawas_table', 1),
(9, '2022_08_02_012942_tambah_kolom_role_di_tabel_user', 1),
(10, '2022_08_03_043854_create_dashboard_table', 1),
(11, '2022_08_08_021136_create_targets_table', 1),
(12, '2022_08_08_021220_relasi_petugas_target_table', 1),
(13, '2022_08_08_025020_relasi_pengawas_petugas_table', 1),
(14, '2022_08_18_012132_relasi_survei_pengawas_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `survei`
--

CREATE TABLE `survei` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_survei` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_target` int(11) NOT NULL,
  `total_petugas` int(11) NOT NULL,
  `total_pengawas` int(11) NOT NULL,
  `jh_penyelesaian` int(11) NOT NULL,
  `target_petugas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `survei`
--

INSERT INTO `survei` (`id`, `nama_survei`, `total_target`, `total_petugas`, `total_pengawas`, `jh_penyelesaian`, `target_petugas`, `created_at`, `updated_at`) VALUES
(1, 'Kemiskinan', 1200, 20, 4, 20, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `targets`
--

CREATE TABLE `targets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `petugas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pengawas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `tgl_validasi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `targets`
--

INSERT INTO `targets` (`id`, `tanggal`, `target`, `created_at`, `updated_at`, `petugas_id`, `pengawas_id`, `status`, `tgl_validasi`) VALUES
(1, '2022-11-20', '3', '2022-11-20 13:53:17', '2022-11-20 13:53:17', 3, 5, NULL, NULL),
(2, '2022-11-20', '2', '2022-11-20 13:55:20', '2022-11-20 13:55:20', 9, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_tanggal_lahir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `survei_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pengawas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `role`, `no_ktp`, `jenis_kelamin`, `tempat_tanggal_lahir`, `no_tlp`, `alamat`, `nip`, `survei_id`, `pengawas_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'Administrator Baru', 'admin.baru@gmail.com', NULL, '$2y$10$jXcZugOqnBmL88BUp33O3uVjCDC5Y4Nxzik4vPAdy9jqzG0aKfn/e', 'admin', '123454', 'Perempuan', '10/10/2000', '08990307782', 'Madiun', '-', NULL, NULL, NULL, NULL, '2022-11-20 13:42:53'),
(3, 'fitriMD', 'Fitri Mutiara Devi', 'mutiara.devi027@gmail.com', NULL, '$2y$10$SrkERKsRKNuuD8DLzm.6Pu1E3LgSlE9bXF1KURVqx4jCiqtl104CO', 'petugas', '', '', '', '', '', '', NULL, NULL, NULL, '2022-11-20 13:18:16', '2022-11-20 13:18:16'),
(4, 'Lurah', 'Lurah Opera Candi', 'lurah@gmail.com', NULL, '$2y$10$clrruILn5rMAjBoyWVZj..PfqykDJpnAcZg.XTFIrx893rnlAPRBe', 'lurah', '', '', '', '', '', '', NULL, NULL, NULL, '2022-11-20 13:39:58', '2022-11-20 13:39:58'),
(5, 'Devipus', 'Devi Puspitasari', 'devi@gmail.com', NULL, '$2y$10$lH1kWdsiYeWqaDksruJrB.3GyQcyUkGdfwcO8Pql76a796fNxP0Qy', 'pengawas', '', '', '', '', '', '', NULL, NULL, NULL, '2022-11-20 13:41:16', '2022-11-20 13:41:16'),
(6, 'Kynanti', 'Sri Kynanti', 'kynanti@gmail.com', NULL, '$2y$10$xeHTTZf4FrCyrmqM2wX7sumy7CnpujspjNFi2JIoxgyjMV5RWykR2', 'pengawas', '', '', '', '', '', '', NULL, NULL, NULL, '2022-11-20 13:48:58', '2022-11-20 13:48:58'),
(7, 'Ardila', 'Ardila Lukita Sari', 'ardila@gmail.com', NULL, '$2y$10$xft8eyuoJ/koYEGecbsVXu0FP3CYH12Mo06LYI.Xjw9E2czp.yDpu', 'pengawas', '', '', '', '', '', '', NULL, NULL, NULL, '2022-11-20 13:49:49', '2022-11-20 13:49:49'),
(8, 'Izza', 'Corneza Nabetha Nuril', 'izza@gmail.com', NULL, '$2y$10$ZoVEjzYTGLfCSMRIh6B.PuoZ70k/wCpEvy1BFGE16IGyA51RQndSq', 'pengawas', '', '', '', '', '', '', NULL, NULL, NULL, '2022-11-20 13:52:25', '2022-11-20 13:52:25'),
(9, 'JanuarAji', 'Januar Aji Nugroho', 'januar@gmail.com', NULL, '$2y$10$cfiR8lb5MtxqMR/sgku5.eTDXUbeOl5nZzJrO..w2gXatxHVW4ty6', 'petugas', '', '', '', '', '', '', NULL, NULL, NULL, '2022-11-20 13:54:53', '2022-11-20 13:54:53');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `survei`
--
ALTER TABLE `survei`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `targets`
--
ALTER TABLE `targets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `targets_petugas_id_foreign` (`petugas_id`),
  ADD KEY `targets_pengawas_id_foreign` (`pengawas_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `id_pengawas_foreign` (`pengawas_id`),
  ADD KEY `survei_id_pengawas_foreign` (`survei_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `survei`
--
ALTER TABLE `survei`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `targets`
--
ALTER TABLE `targets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `targets`
--
ALTER TABLE `targets`
  ADD CONSTRAINT `targets_pengawas_id_foreign` FOREIGN KEY (`pengawas_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `targets_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `id_pengawas_foreign` FOREIGN KEY (`pengawas_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `survei_id_pengawas_foreign` FOREIGN KEY (`survei_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
