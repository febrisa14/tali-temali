-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2022 pada 03.19
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_talitemali`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `anggota_id` int(10) UNSIGNED NOT NULL,
  `anggota_user_id` int(10) UNSIGNED NOT NULL,
  `tgl_lahir` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`anggota_id`, `anggota_user_id`, `tgl_lahir`, `jenis_kelamin`, `umur`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 1, '18-02-1999', 'Laki - Laki', '23', 'Jalan Tukad Balian', '2021-11-23 07:13:30', '2022-01-01 02:17:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `materi_id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`materi_id`, `judul`, `deskripsi`, `kategori`, `cover_photo`, `url_video`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Jerat Jangkar', '<p>Untuk mengikat tali pada penambat yang fungsinya sebagai pengaman utama (<i>fixed rope</i>) pada <i>anchor natural&nbsp;</i>dsb. Toleransi terhadap kekuatan tali akan berkurang sebesar 45%.</p>', 'Jerat', '1640840442.JPG', 'https://www.youtube.com/watch?v=sVb98D2izpA', 'jerat-jangkar', '2021-12-30 05:00:46', '2021-12-30 05:00:46'),
(3, 'Jerat Prusik', '<p>Jerat yang digunakan dalam teknik <i>Prusiking</i></p>', 'Jerat', '1640841211.JPG', 'https://www.youtube.com/watch?v=yNvBjevi02I', 'jerat-prusik', '2021-12-30 05:13:34', '2021-12-30 05:13:34'),
(4, 'Italian Hitch', '<p>Italian Hitch. jerat ini biasa dipakai untuk Abseilling</p>', 'Jerat', '1640841326.JPG', 'https://www.youtube.com/watch?v=i5NVDPgC5Zg', 'italian-hitch', '2021-12-30 05:15:29', '2021-12-30 05:15:29'),
(5, 'Clove Hitch', '<p><i>Clove hitch</i> (Simpul Pangkal) Untuk mengikat tali pada penambat yang fungsinya sebagai pengaman utama (<i>fixed rope</i>) pada anchor natural dsb. Toleransi terhadap kekuatan tali akan berkurang sebesar 45%.</p>', 'Jerat', '1640842534.JPG', 'https://www.youtube.com/watch?v=rtHGzeIK3Sc', 'clove-hitch', '2021-12-30 05:35:37', '2021-12-30 05:35:37'),
(6, 'Simpul Square Knot', '<p>Gunanya untuk menyambung 2 utas tali yang sama besar dan tidak licin.</p>', 'Simpul', '1640842863.JPG', 'https://www.youtube.com/watch?v=cQomj5TG6Bg', 'simpul-square-knot', '2021-12-30 05:41:07', '2021-12-30 05:41:07'),
(7, 'Simpul Delapan Ganda', '<p>Simpul Delapan Ganda (<i>Double figure of eight knot</i>) Untuk pengaman utama dalam penambatan dan pengaman utama yang dihubungkan dengan tubuh atau harness</p>', 'Simpul', '1640843134.JPG', 'https://www.youtube.com/watch?v=qqe_MjoHNKY', 'simpul-delapan-ganda', '2021-12-30 05:45:38', '2021-12-30 05:45:38'),
(8, 'Overhand Knot', '<p>Untuk mengakhiri pembuatan simpul sebelumnya. Toleransi terhadap kekuatan tali akan berkurang sebesar 40%.</p>', 'Simpul', '1640843202.JPG', 'https://www.youtube.com/watch?v=A8ZtHjPwtVc', 'overhand-knot', '2021-12-30 05:46:45', '2021-12-30 05:46:45'),
(9, 'Fisherman Knot', '<p>Untuk menyambung 2 tali yang sama besarnya dan bersifat licin. Toleransi terhadap kekuatan tali 41% – 50%.</p>', 'Simpul', '1640843319.JPG', 'https://www.youtube.com/watch?v=Hhgvd80HMGc', 'fisherman-knot', '2021-12-30 05:48:42', '2021-12-31 02:02:21');

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2021_11_21_131616_create_anggota_table', 1),
(4, '2021_11_26_090736_create_pengurus_table', 2),
(9, '2021_11_27_145318_create_materi_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `pengurus_id` int(10) UNSIGNED NOT NULL,
  `pengurus_user_id` int(10) UNSIGNED NOT NULL,
  `tgl_lahir` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`pengurus_id`, `pengurus_user_id`, `tgl_lahir`, `jenis_kelamin`, `umur`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 2, '15-01-1999', 'Laki - Laki', '22', 'Jalan Raya', '2021-11-26 01:12:26', '2021-11-26 01:12:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'A.A Ngurah Gede Wiyanjana Putra', 'gungde@gmail.com', '$2y$10$9ckeP0CM2Hf6x7hbuALaVe6gAgvhKo5dik6XkHtmZVwQ.XO008gZy', 'Anggota', '083111234768', '2021-11-23 07:10:33', '2022-01-01 02:17:46'),
(2, 'I Wayan Saputra', 'saputra@gmail.com', '$2y$10$9ckeP0CM2Hf6x7hbuALaVe6gAgvhKo5dik6XkHtmZVwQ.XO008gZy', 'Pengurus', '087892848723', '2021-11-26 01:11:12', '2021-11-26 01:11:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`anggota_id`),
  ADD KEY `anggota_anggota_user_id_foreign` (`anggota_user_id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`materi_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`pengurus_id`),
  ADD KEY `pengurus_pengurus_user_id_foreign` (`pengurus_user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `anggota_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `materi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `pengurus_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_anggota_user_id_foreign` FOREIGN KEY (`anggota_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `pengurus_pengurus_user_id_foreign` FOREIGN KEY (`pengurus_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
