-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Mar 2023 pada 05.24
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `produk` int(11) NOT NULL,
  `variasi` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `totalharga` int(11) NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_03_09_122826_create_produks_table', 1),
(7, '2023_03_09_122834_create_pesanans_table', 1),
(8, '2023_03_09_122843_create_keranjangs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nomorhp` bigint(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `produk` int(11) NOT NULL,
  `variasi` varchar(255) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `totalharga` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id`, `user`, `nama`, `nomorhp`, `alamat`, `produk`, `variasi`, `jumlah`, `totalharga`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Aditya Putra Ramadhan', 6281317401978, 'Jalan luar batang 9\r\nRt 05 rw 03 no 09', 1, 'Variasi', 5, NULL, 'CO', '2023-03-09 10:05:37', '2023-03-12 05:49:23'),
(3, 3, 'Aditya Putra Ramadhan', 6281317401978, 'Jalan luar batang 9\r\nRt 05 rw 03 no 09', 3, 'Variasi', 8, NULL, 'CO', '2023-03-09 19:59:38', '2023-03-12 05:49:23'),
(4, 3, 'Aditya Putra Ramadhan', 6281317401978, 'Jalan luar batang 9\r\nRt 05 rw 03 no 09', 5, 'hot', 3, NULL, 'CO', '2023-03-09 20:09:07', '2023-03-12 06:03:57'),
(5, 3, 'Aditya Putra Ramadhan', 6281317401978, 'Jalan luar batang 9\r\nRt 05 rw 03 no 09', 5, 'hot', 3, NULL, 'CO', '2023-03-11 00:09:27', '2023-03-12 06:03:57'),
(6, 3, 'Aditya Putra Ramadhan', 6281317401978, 'Jalan luar batang 9\r\nRt 05 rw 03 no 09', 3, 'Variasi', 8, NULL, 'CO', '2023-03-11 00:28:30', '2023-03-12 05:49:23'),
(7, 3, 'Aditya Putra Ramadhan', 6281317401978, 'Jalan luar batang 9\r\nRt 05 rw 03 no 09', 5, 'hot', 3, NULL, 'CO', '2023-03-12 03:24:58', '2023-03-12 06:03:57'),
(8, 3, 'Aditya Putra Ramadhan', 6281317401978, 'Jalan luar batang 9\r\nRt 05 rw 03 no 09', 3, 'Variasi', 8, NULL, 'CO', '2023-03-12 03:25:40', '2023-03-12 05:49:23'),
(9, 3, 'Aditya Putra Ramadhan', 6281317401978, 'Jalan luar batang 9\r\nRt 05 rw 03 no 09', 1, 'Variasi', 5, NULL, 'CO', '2023-03-12 03:25:52', '2023-03-12 05:49:23'),
(15, 3, 'Aditya Putra Ramadhan', 6281317401978, 'Jalan luar batang 9\r\nRt 05 rw 03 no 09', 5, 'hot', 3, NULL, 'CO', '2023-03-12 06:03:52', '2023-03-12 06:04:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `namaproduk` varchar(255) NOT NULL,
  `hargaproduk` int(11) NOT NULL,
  `stokproduk` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `gambar`, `namaproduk`, `hargaproduk`, `stokproduk`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '/storage/images/7PoQn6kSyDmrnQfAPGUVZ68Xja4xqUTVyLM1NQ8z.jpg', 'drink beng beng', 5000, 4, 'minuman coklat yang segar dapat membuat kamu kembali bersemangat', '2023-03-09 07:15:08', '2023-03-12 06:02:05'),
(3, '/storage/images/Lc6xeEBT2pF9dxIGcIBhyTxxiHmcrz4Onu5KbneN.jpg', 'GoodDay Cappucino', 5000, 8, 'Minuman kopi khas italia', '2023-03-09 19:18:27', '2023-03-12 06:02:21'),
(5, '/storage/images/sNNBxnjH80IVEqW1dK8BApx5cCSV4EPTLABVlL8Z.png', 'tes produk', 3000, 0, 'tes tges', '2023-03-09 20:08:38', '2023-03-12 06:04:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomorhp` bigint(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `nomorhp`, `alamat`, `password`, `role`, `created_at`, `updated_at`) VALUES
(3, 'Aditya Putra Ramadhan', 'putraadit0161@gmail.com', 81317401978, 'Jalan luar batang 9\r\nRt 05 rw 03 no 09', '$2y$10$dl7aRIl8rZznitXVlFzBt.bZmX3T4rsGz3OcZ7NxiWyqKHDKIfn6e', 'customer', '2023-03-09 06:27:44', '2023-03-09 06:27:44'),
(4, 'yasmin', 'yasmin@gmail.com', 88112182912, 'Jl regalia\r\nRt 018 rw 004', '$2y$10$sU0g4bO1YhSI9RQGPewOHOfpkTKftnjcP9Kur//q.DEAeFTiMmHGK', 'customer', '2023-03-09 06:33:47', '2023-03-09 06:33:47'),
(5, 'lara', 'tokolara@gmail.com', 838329389, 'Jalan luar batang 9\r\nRt 05 rw 03 no 09', '$2y$10$ynh6RJ9.tHzWQmGZXWArCOe06lWJF8Ey.WdUPSoJXGnxS4nBym5/G', 'admin', '2023-03-09 06:46:52', '2023-03-09 06:46:52'),
(6, 'admin', 'admin@gmail.com', 84373949, 'jakarta', '$2y$10$FkkhKJpIuvML8c77NI9fzOC37tHHJ29FX0n40WdVx.8PGhnQ5iTXW', 'admin', '2023-03-09 18:00:51', '2023-03-09 18:00:51');

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
-- Indeks untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
