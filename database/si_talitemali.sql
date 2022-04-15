-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 12:08 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

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
-- Table structure for table `detail_akun`
--

CREATE TABLE `detail_akun` (
  `detail_user_id` int(10) UNSIGNED NOT NULL,
  `tgl_lahir` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umur` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_akun`
--

INSERT INTO `detail_akun` (`detail_user_id`, `tgl_lahir`, `jenis_kelamin`, `umur`, `alamat`, `created_at`, `updated_at`) VALUES
(1, '12-07-1999', 'Laki - Laki', '23', 'Jalan Tukad Balian wirasatya VII 9', '2021-11-23 07:13:30', '2022-04-12 09:30:27'),
(2, '15-01-1999', 'Laki - Laki', '22', 'Jalan Raya Sesetan', '2022-01-22 01:12:26', '2022-01-24 04:06:39'),
(4, '19-11-1997', 'Laki - Laki', '25', 'Jalan Sading', '2022-01-24 04:03:27', '2022-01-24 04:03:39'),
(6, '11-08-1999', 'Laki - Laki', '23', 'Jalan Raya Sesetan', '2022-01-24 04:20:49', '2022-01-24 04:22:57'),
(8, '11-04-2022', 'Laki - Laki', '0', 'jln', '2022-02-15 03:15:54', '2022-04-14 02:16:40'),
(9, NULL, NULL, NULL, NULL, '2022-03-07 03:53:37', '2022-03-07 03:53:37'),
(10, NULL, NULL, NULL, NULL, '2022-03-07 03:58:53', '2022-03-07 03:58:53'),
(11, '01-03-2022', 'Laki - Laki', '0', 'jl. jgjhgjhgjgjhgj', '2022-03-07 11:34:34', '2022-03-07 11:40:27'),
(12, NULL, NULL, NULL, NULL, '2022-03-07 14:06:03', '2022-03-07 14:06:03'),
(13, NULL, NULL, NULL, NULL, '2022-03-07 14:06:53', '2022-03-07 14:06:53'),
(14, '13-04-2022', 'Laki - Laki', '0', 'jln', '2022-04-12 11:27:43', '2022-04-12 11:30:09'),
(15, '04-04-2022', 'Laki - Laki', '0', 'jln', '2022-04-13 00:12:17', '2022-04-13 00:16:15'),
(16, '11-04-2022', 'Laki - Laki', '0', 'jln', '2022-04-14 00:08:35', '2022-04-14 00:14:11'),
(17, '10-04-2022', 'Laki - Laki', '0', 'jln', '2022-04-14 01:47:53', '2022-04-14 02:06:57'),
(19, '04-04-2022', 'Laki - Laki', '0', 'jln', '2022-04-14 02:06:23', '2022-04-14 02:06:23'),
(20, NULL, NULL, NULL, NULL, '2022-04-15 21:26:03', '2022-04-15 21:26:03'),
(21, '20-04-1999', 'Laki - Laki', '23', 'Jalan Antasura', '2022-04-15 21:57:56', '2022-04-15 21:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `user_id`, `quiz_id`, `question_id`, `ans`, `is_ans`, `created_at`, `updated_at`) VALUES
(80, 1, 3, 16, '0', 'no', '2022-02-15 03:12:40', '2022-02-15 03:12:40'),
(81, 1, 3, 20, '0', 'no', '2022-02-15 03:12:40', '2022-02-15 03:12:40'),
(82, 1, 3, 17, '0', 'no', '2022-02-15 03:12:40', '2022-02-15 03:12:40'),
(83, 1, 3, 24, '0', 'no', '2022-02-15 03:12:40', '2022-02-15 03:12:40'),
(84, 1, 3, 22, '0', 'no', '2022-02-15 03:12:40', '2022-02-15 03:12:40'),
(85, 1, 3, 23, '0', 'no', '2022-02-15 03:12:40', '2022-02-15 03:12:40'),
(86, 1, 3, 19, '0', 'no', '2022-02-15 03:12:40', '2022-02-15 03:12:40'),
(87, 1, 3, 21, '0', 'no', '2022-02-15 03:12:40', '2022-02-15 03:12:40'),
(88, 1, 3, 18, '0', 'no', '2022-02-15 03:12:40', '2022-02-15 03:12:40'),
(89, 1, 3, 25, '0', 'no', '2022-02-15 03:12:40', '2022-02-15 03:12:40'),
(100, 11, 3, 19, 'Gunung Abang', 'no', '2022-03-07 11:43:51', '2022-03-07 11:43:51'),
(101, 11, 3, 17, '20 November 2009', 'no', '2022-03-07 11:43:51', '2022-03-07 11:43:51'),
(102, 11, 3, 22, '5', 'no', '2022-03-07 11:43:51', '2022-03-07 11:43:51'),
(103, 11, 3, 18, 'Januari 2010', 'no', '2022-03-07 11:43:51', '2022-03-07 11:43:51'),
(104, 11, 3, 20, 'Penuntun ke arah yang benar', 'yes', '2022-03-07 11:43:51', '2022-03-07 11:43:51'),
(105, 11, 3, 24, '13', 'no', '2022-03-07 11:43:51', '2022-03-07 11:43:51'),
(106, 11, 3, 21, 'pemarah', 'no', '2022-03-07 11:43:51', '2022-03-07 11:43:51'),
(107, 11, 3, 23, '3', 'no', '2022-03-07 11:43:51', '2022-03-07 11:43:51'),
(108, 11, 3, 16, 'Dance', 'no', '2022-03-07 11:43:51', '2022-03-07 11:43:51'),
(109, 11, 3, 25, '4', 'yes', '2022-03-07 11:43:51', '2022-03-07 11:43:51'),
(110, 13, 3, 17, '20 November 2009', 'no', '2022-03-07 14:15:55', '2022-03-07 14:15:55'),
(111, 13, 3, 23, '3', 'no', '2022-03-07 14:15:55', '2022-03-07 14:15:55'),
(112, 13, 3, 21, 'suci', 'no', '2022-03-07 14:15:55', '2022-03-07 14:15:55'),
(113, 13, 3, 25, '4', 'yes', '2022-03-07 14:15:55', '2022-03-07 14:15:55'),
(114, 13, 3, 20, 'Semua Benar', 'no', '2022-03-07 14:15:55', '2022-03-07 14:15:55'),
(115, 13, 3, 18, 'September 2010', 'no', '2022-03-07 14:15:55', '2022-03-07 14:15:55'),
(116, 13, 3, 16, 'Dance', 'no', '2022-03-07 14:15:55', '2022-03-07 14:15:55'),
(117, 13, 3, 19, 'Gunung Agung', 'no', '2022-03-07 14:15:55', '2022-03-07 14:15:55'),
(118, 13, 3, 24, '9', 'no', '2022-03-07 14:15:55', '2022-03-07 14:15:55'),
(119, 13, 3, 22, '1', 'no', '2022-03-07 14:15:55', '2022-03-07 14:15:55'),
(120, 14, 3, 17, '20 Oktober 2009', 'no', '2022-04-12 11:31:29', '2022-04-12 11:31:29'),
(121, 14, 3, 25, '4', 'yes', '2022-04-12 11:31:29', '2022-04-12 11:31:29'),
(122, 14, 3, 18, 'Juni 2010', 'yes', '2022-04-12 11:31:29', '2022-04-12 11:31:29'),
(123, 14, 3, 19, 'Gunung Batur', 'yes', '2022-04-12 11:31:29', '2022-04-12 11:31:29'),
(124, 14, 3, 20, 'Keberanian', 'no', '2022-04-12 11:31:29', '2022-04-12 11:31:29'),
(125, 14, 3, 23, '5', 'no', '2022-04-12 11:31:29', '2022-04-12 11:31:29'),
(126, 14, 3, 22, '1', 'no', '2022-04-12 11:31:29', '2022-04-12 11:31:29'),
(127, 14, 3, 21, 'semua salah', 'no', '2022-04-12 11:31:29', '2022-04-12 11:31:29'),
(128, 14, 3, 16, 'Kepecintaalaman', 'yes', '2022-04-12 11:31:29', '2022-04-12 11:31:29'),
(129, 14, 3, 24, '13', 'no', '2022-04-12 11:31:29', '2022-04-12 11:31:29'),
(130, 15, 3, 18, 'Desember 2010', 'no', '2022-04-13 00:17:02', '2022-04-13 00:17:02'),
(131, 15, 3, 19, 'Gunung Catur', 'no', '2022-04-13 00:17:02', '2022-04-13 00:17:02'),
(132, 15, 3, 16, 'Kepecintaalaman', 'yes', '2022-04-13 00:17:02', '2022-04-13 00:17:02'),
(133, 15, 3, 22, '2', 'no', '2022-04-13 00:17:02', '2022-04-13 00:17:02'),
(134, 15, 3, 20, 'Penuntun ke arah yang benar', 'yes', '2022-04-13 00:17:02', '2022-04-13 00:17:02'),
(135, 15, 3, 24, '13', 'no', '2022-04-13 00:17:02', '2022-04-13 00:17:02'),
(136, 15, 3, 23, '4', 'yes', '2022-04-13 00:17:02', '2022-04-13 00:17:02'),
(137, 15, 3, 17, '20 September 2009', 'yes', '2022-04-13 00:17:02', '2022-04-13 00:17:02'),
(138, 15, 3, 21, 'keberanian dan semangat', 'yes', '2022-04-13 00:17:02', '2022-04-13 00:17:02'),
(139, 15, 3, 25, '4', 'yes', '2022-04-13 00:17:02', '2022-04-13 00:17:02'),
(140, 17, 3, 25, '5', 'no', '2022-04-14 02:04:10', '2022-04-14 02:04:10'),
(141, 17, 3, 20, 'Ketajaman Berfikir', 'no', '2022-04-14 02:04:10', '2022-04-14 02:04:10'),
(142, 17, 3, 23, '4', 'yes', '2022-04-14 02:04:10', '2022-04-14 02:04:10'),
(143, 17, 3, 19, 'Gunung Catur', 'no', '2022-04-14 02:04:10', '2022-04-14 02:04:10'),
(144, 17, 3, 17, '20 Oktober 2009', 'no', '2022-04-14 02:04:10', '2022-04-14 02:04:10'),
(145, 17, 3, 24, '12', 'no', '2022-04-14 02:04:10', '2022-04-14 02:04:10'),
(146, 17, 3, 18, 'Desember 2010', 'no', '2022-04-14 02:04:10', '2022-04-14 02:04:10'),
(147, 17, 3, 21, 'pemarah', 'no', '2022-04-14 02:04:10', '2022-04-14 02:04:10'),
(148, 17, 3, 16, 'Musik', 'no', '2022-04-14 02:04:10', '2022-04-14 02:04:10'),
(149, 17, 3, 22, '2', 'no', '2022-04-14 02:04:10', '2022-04-14 02:04:10'),
(150, 21, 3, 22, '1', 'no', '2022-04-15 21:59:35', '2022-04-15 21:59:35'),
(151, 21, 3, 18, 'September 2010', 'no', '2022-04-15 21:59:35', '2022-04-15 21:59:35'),
(152, 21, 3, 23, '5', 'no', '2022-04-15 21:59:35', '2022-04-15 21:59:35'),
(153, 21, 3, 19, 'Gunung Abang', 'no', '2022-04-15 21:59:35', '2022-04-15 21:59:35'),
(154, 21, 3, 25, '3', 'no', '2022-04-15 21:59:35', '2022-04-15 21:59:35'),
(155, 21, 3, 16, 'Kepecintaalaman', 'yes', '2022-04-15 21:59:35', '2022-04-15 21:59:35'),
(156, 21, 3, 20, 'Penuntun ke arah yang benar', 'yes', '2022-04-15 21:59:35', '2022-04-15 21:59:35'),
(157, 21, 3, 17, '20 November 2009', 'no', '2022-04-15 21:59:35', '2022-04-15 21:59:35'),
(158, 21, 3, 24, '13', 'no', '2022-04-15 21:59:35', '2022-04-15 21:59:35'),
(159, 21, 3, 21, 'suci', 'no', '2022-04-15 21:59:35', '2022-04-15 21:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
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
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`materi_id`, `judul`, `deskripsi`, `kategori`, `cover_photo`, `url_video`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Jerat Jangkar', '<p>Untuk mengikat tali pada penambat yang fungsinya sebagai pengaman utama (<i>fixed rope</i>) pada <i>anchor natural&nbsp;</i>dsb. Toleransi terhadap kekuatan tali akan berkurang sebesar 45%.</p>', 'Jerat', '1640840442.JPG', 'https://www.youtube.com/watch?v=9_1tq726KXs', 'jerat-jangkar', '2021-12-30 05:00:46', '2022-03-07 03:44:27'),
(3, 'Jerat Prusik', '<p>Jerat yang digunakan dalam teknik <i>Prusiking</i></p>', 'Jerat', '1640841211.JPG', 'https://www.youtube.com/watch?v=-EgAoRkkCew', 'jerat-prusik', '2021-12-30 05:13:34', '2022-03-07 03:45:03'),
(4, 'Italian Hitch', '<p>Italian Hitch. jerat ini biasa dipakai untuk Abseilling</p>', 'Jerat', '1640841326.JPG', 'https://www.youtube.com/watch?v=rA05LU6ogqk', 'italian-hitch', '2021-12-30 05:15:29', '2022-03-07 03:45:34'),
(5, 'Clove Hitch', '<p><i>Clove hitch</i> (Simpul Pangkal) Untuk mengikat tali pada penambat yang fungsinya sebagai pengaman utama (<i>fixed rope</i>) pada anchor natural dsb. Toleransi terhadap kekuatan tali akan berkurang sebesar 45%.</p>', 'Jerat', '1640842534.JPG', 'https://www.youtube.com/watch?v=ZNH-TBwJ058', 'clove-hitch', '2021-12-30 05:35:37', '2022-03-07 03:46:08'),
(6, 'Square Knot', '<p>Gunanya untuk menyambung 2 utas tali yang sama besar dan tidak licin.</p>', 'Simpul', '1640842863.JPG', 'https://www.youtube.com/watch?v=NDDcpoBq8QA', 'square-knot', '2021-12-30 05:41:07', '2022-04-14 00:11:32'),
(7, 'Simpul Delapan Ganda', '<p>Simpul Delapan Ganda (<i>Double figure of eight knot</i>) Untuk pengaman utama dalam penambatan dan pengaman utama yang dihubungkan dengan tubuh atau harness</p>', 'Simpul', '1640843134.JPG', 'https://www.youtube.com/watch?v=i1cq3k7fVMc', 'simpul-delapan-ganda', '2021-12-30 05:45:38', '2022-03-07 03:47:15'),
(8, 'Overhand Knot', '<p>Untuk mengakhiri pembuatan simpul sebelumnya. Toleransi terhadap kekuatan tali akan berkurang sebesar 40%.</p>', 'Simpul', '1640843202.JPG', 'https://www.youtube.com/watch?v=XqGNKshoCdc', 'overhand-knot', '2021-12-30 05:46:45', '2022-03-07 03:49:23'),
(9, 'Fisherman Knot', '<p>Untuk menyambung 2 tali yang sama besarnya dan bersifat licin. Toleransi terhadap kekuatan tali 41% – 50%.</p>', 'Simpul', '1640843319.JPG', 'https://www.youtube.com/watch?v=j-aQECOCfEk', 'fisherman-knot', '2021-12-30 05:48:42', '2022-03-07 03:50:01'),
(10, 'Simpul Delapan Tunggal', '<p>Simpul Delapan Tunggal ( figure of eight knot ) Untuk pengaman utama dalam penambatan dan pengaman utama yang dihubungkan dengan tubuh atau harness apabila carabiner tidak ada.</p>', 'Simpul', '1649757668.JPG', 'https://www.youtube.com/watch?v=QL7Vz5SYx1s', 'simpul-delapan-tunggal', '2022-02-15 02:05:29', '2022-04-12 10:01:09'),
(11, 'Bowline Knot', '<p>simpul bowline knot biasa digunakan untuk pengaman utama dalam penambatan atau pengaman utama yang dihubungkan dengan penambat dan harness.</p>', 'Simpul', '1649757648.JPG', 'https://www.youtube.com/watch?v=AMHEJBeW19Q', 'bowline-knot', '2022-02-15 02:08:06', '2022-04-12 10:00:50'),
(12, 'Butterfly Knot', '<p>Butterfly knot biasa digunakan untuk membuat simpul ditengah atau diantara lintasan horizontal. Bisa juga digunakan untuk menghindari tali yang sudah friksi.&nbsp;</p>', 'Simpul', '1649757628.JPG', 'https://www.youtube.com/watch?v=C6Koz5wgYAA', 'butterfly-knot', '2022-02-15 02:10:17', '2022-04-12 10:00:29'),
(13, 'Double Overhand Knot', '<p>Double Overhand Knot biasanya digunakan di ujung tali untuk mengaitkan carrabiner pada tali.</p>', 'Simpul', '1649757607.JPG', 'https://www.youtube.com/watch?v=beZrIAePwD0', 'double-overhand-knot', '2022-02-15 02:13:47', '2022-04-12 10:00:09'),
(14, 'Tape Knot', '<p>Untuk Menyambung Tali yang sejenis, yang sifatnya licin atau berbentuk pipih (umumnya digunakan untuk menyambung Webbing)</p>', 'Simpul', '1649757514.jpg', 'https://www.youtube.com/watch?v=njajRUqRZlw', 'tape-knot', '2022-02-15 03:31:46', '2022-04-14 02:07:58');

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2021_11_21_131616_create_anggota_table', 1),
(4, '2021_11_27_145318_create_materi_table', 1),
(5, '2022_01_28_111112_create_quizzes_table', 2),
(6, '2022_01_29_114012_create_questions_table', 3),
(7, '2022_01_29_152533_create_options_table', 4),
(10, '2022_01_30_115852_create_exams_table', 5),
(11, '2022_01_30_120000_create_results_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `option_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `question_id`, `option`, `created_at`, `updated_at`) VALUES
(55, 16, 'Kepecintaalaman', NULL, NULL),
(56, 16, 'Musik', NULL, NULL),
(57, 16, 'Keagamaan', NULL, NULL),
(58, 16, 'Dance', NULL, NULL),
(59, 17, '17 Agustus 2009', NULL, NULL),
(60, 17, '20 Oktober 2009', NULL, NULL),
(61, 17, '20 September 2009', NULL, NULL),
(62, 17, '20 November 2009', NULL, NULL),
(63, 18, 'Januari 2010', NULL, NULL),
(64, 18, 'September 2010', NULL, NULL),
(65, 18, 'Juni 2010', NULL, NULL),
(66, 18, 'Desember 2010', NULL, NULL),
(67, 19, 'Gunung Batur', NULL, NULL),
(68, 19, 'Gunung Catur', NULL, NULL),
(69, 19, 'Gunung Agung', NULL, NULL),
(70, 19, 'Gunung Abang', NULL, NULL),
(71, 20, 'Ketajaman Berfikir', NULL, NULL),
(72, 20, 'Penuntun ke arah yang benar', NULL, NULL),
(73, 20, 'Keberanian', NULL, NULL),
(74, 20, 'Semua Benar', NULL, NULL),
(75, 21, 'pemarah', NULL, NULL),
(76, 21, 'semua salah', NULL, NULL),
(77, 21, 'suci', NULL, NULL),
(78, 21, 'keberanian dan semangat', NULL, NULL),
(79, 22, '3', NULL, NULL),
(80, 22, '1', NULL, NULL),
(81, 22, '5', NULL, NULL),
(82, 22, '2', NULL, NULL),
(83, 23, '2', NULL, NULL),
(84, 23, '5', NULL, NULL),
(85, 23, '4', NULL, NULL),
(86, 23, '3', NULL, NULL),
(87, 24, '7', NULL, NULL),
(88, 24, '9', NULL, NULL),
(89, 24, '13', NULL, NULL),
(90, 24, '12', NULL, NULL),
(91, 25, '4', NULL, NULL),
(92, 25, '5', NULL, NULL),
(93, 25, '3', NULL, NULL),
(94, 25, '6', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `quiz_id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(16, 3, 'Organisasi Mapala Kompas Stikom Bali bergerak pada bidang ?', 'Kepecintaalaman', '2022-02-15 02:28:28', '2022-02-15 02:28:46'),
(17, 3, 'Kapan Hari bangkit Organisasi Mapala Kompas Stikom Bali ?', '20 September 2009', '2022-02-15 02:33:11', '2022-02-15 02:33:11'),
(18, 3, 'Kapan Disahkannya Organisasi Mapala Kompas Stikom Bali ?', 'Juni 2010', '2022-02-15 02:35:17', '2022-02-15 02:35:17'),
(19, 3, 'Dimana momen penting kebangkitan Organisasi Mapala Kompas Stikom Bali ?', 'Gunung Batur', '2022-02-15 02:37:08', '2022-02-15 02:37:08'),
(20, 3, 'Apakah arti jarum pada logo Organisasi Mapala Kompas Stikom Bali ?', 'Penuntun ke arah yang benar', '2022-02-15 02:42:16', '2022-02-15 02:42:16'),
(21, 3, 'Apakah arti warna merah pada logo Organisasi Mapala Kompas Stikom Bali ?', 'keberanian dan semangat', '2022-02-15 02:44:54', '2022-02-15 02:44:54'),
(22, 3, 'Ada berapa bidang dalam struktur Organisasi Mapala Kompas Stikom Bali ?', '3', '2022-02-15 02:46:05', '2022-02-15 02:46:05'),
(23, 3, 'Ada berapa pokok pembahasan di dalam kurikulum Organisasi Mapala Kompas ?', '4', '2022-02-15 02:47:07', '2022-02-15 02:47:07'),
(24, 3, 'Ada berapa banyak simpul dalam materi rock climbing  ?', '7', '2022-02-15 02:50:17', '2022-02-15 02:50:17'),
(25, 3, 'Ada berapa banyak jerat dalam materi rock climbing ?', '4', '2022-02-15 02:51:01', '2022-02-15 02:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `quiz_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`quiz_id`, `quiz_name`, `description`, `quiz_time`, `number_of_question`, `created_at`, `updated_at`) VALUES
(3, 'Quiz', 'Mohon Dijawab Dengan Benar', '15', '10', '2022-02-15 02:26:18', '2022-02-15 02:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `total_mark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yes_ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result_json` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_exp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_selesai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `user_id`, `quiz_id`, `total_mark`, `yes_ans`, `no_ans`, `result_json`, `status`, `tgl_exp`, `tgl_selesai`, `created_at`, `updated_at`) VALUES
(19, 1, 3, '0', '0', '10', '{\"16\":\"no\",\"20\":\"no\",\"17\":\"no\",\"24\":\"no\",\"22\":\"no\",\"23\":\"no\",\"19\":\"no\",\"21\":\"no\",\"18\":\"no\",\"25\":\"no\"}', 'Selesai', '2022-02-15 11:12:40', '2022-02-15 11:12:40', '2022-02-15 02:57:40', '2022-02-15 03:12:40'),
(23, 11, 3, '20', '2', '8', '{\"19\":\"no\",\"17\":\"no\",\"22\":\"no\",\"18\":\"no\",\"20\":\"yes\",\"24\":\"no\",\"21\":\"no\",\"23\":\"no\",\"16\":\"no\",\"25\":\"yes\"}', 'Selesai', '2022-03-07 19:58:20', '2022-03-07 19:43:51', '2022-03-07 11:43:20', '2022-03-07 11:43:51'),
(24, 13, 3, '10', '1', '9', '{\"17\":\"no\",\"23\":\"no\",\"21\":\"no\",\"25\":\"yes\",\"20\":\"no\",\"18\":\"no\",\"16\":\"no\",\"19\":\"no\",\"24\":\"no\",\"22\":\"no\"}', 'Selesai', '2022-03-07 22:30:15', '2022-03-07 22:15:55', '2022-03-07 14:15:15', '2022-03-07 14:15:55'),
(25, 14, 3, '40', '4', '6', '{\"17\":\"no\",\"25\":\"yes\",\"18\":\"yes\",\"19\":\"yes\",\"20\":\"no\",\"23\":\"no\",\"22\":\"no\",\"21\":\"no\",\"16\":\"yes\",\"24\":\"no\"}', 'Selesai', '2022-04-12 19:45:30', '2022-04-12 19:31:29', '2022-04-12 11:30:30', '2022-04-12 11:31:29'),
(26, 15, 3, '60', '6', '4', '{\"18\":\"no\",\"19\":\"no\",\"16\":\"yes\",\"22\":\"no\",\"20\":\"yes\",\"24\":\"no\",\"23\":\"yes\",\"17\":\"yes\",\"21\":\"yes\",\"25\":\"yes\"}', 'Selesai', '2022-04-13 08:31:35', '2022-04-13 08:17:02', '2022-04-13 00:16:35', '2022-04-13 00:17:02'),
(27, 17, 3, '10', '1', '9', '{\"25\":\"no\",\"20\":\"no\",\"23\":\"yes\",\"19\":\"no\",\"17\":\"no\",\"24\":\"no\",\"18\":\"no\",\"21\":\"no\",\"16\":\"no\",\"22\":\"no\"}', 'Selesai', '2022-04-14 10:18:39', '2022-04-14 10:04:10', '2022-04-14 02:03:39', '2022-04-14 02:04:10'),
(28, 21, 3, '20', '2', '8', '{\"22\":\"no\",\"18\":\"no\",\"23\":\"no\",\"19\":\"no\",\"25\":\"no\",\"16\":\"yes\",\"20\":\"yes\",\"17\":\"no\",\"24\":\"no\",\"21\":\"no\"}', 'Selesai', '2022-04-16 06:14:07', '2022-04-16 05:59:35', '2022-04-15 21:59:07', '2022-04-15 21:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `no_ca`, `password`, `role`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'A.A Gede Wiyanjana Putra', 'gungde@gmail.com', 'MK - 1811103', '$2y$10$fX3TgYL8.9m8xvc21Opj5.xccOzROG07wcq9ZAILvOfeVTmuxWfhm', 'Pengurus', '085743606164', '2022-01-23 04:20:01', '2022-04-13 00:21:33'),
(2, 'I Wayan Saputra', 'saputra@gmail.com', NULL, '$2y$10$9ckeP0CM2Hf6x7hbuALaVe6gAgvhKo5dik6XkHtmZVwQ.XO008gZy', 'Pengurus', '087892848723', '2022-01-21 01:11:12', '2022-01-24 04:06:39'),
(4, 'Ngurah Bagus Satria', 'ngurah@gmail.com', '2021083728', '$2y$10$QbHimm4HQjAgdSjWmJD3TO9kDEmeKxk97JeGNp8/La8FaRjwfUTmu', 'Anggota', '082938912298', '2022-01-24 04:03:27', '2022-01-24 04:03:39'),
(6, 'I Gede Surya', 'test@gmail.com', '2022123423', '$2y$10$eG8fVsaKWpSvBL183K.au.CgCHSzlzKH6Mcoxwzop9wlUrIZj/gmu', 'Anggota', '08789283782', '2022-01-24 04:20:49', '2022-01-24 04:22:57'),
(8, 'Verdy Fernanda', 'verdy@gmail.com', '666468', '$2y$10$l0hirW0r27hFUiuy85dEV.JCvOl.KU4lZXOVZqvgDPxAXHLUWIIcG', 'Anggota', '5415', '2022-02-15 03:15:54', '2022-04-14 02:16:40'),
(9, 'yuda arditya', 'yuda@gmail.com', '1502562532', '$2y$10$B2X/e25meI5cuQ1GBVEw/etu.pItKlEqrghljSFCFd1PhpmzSI8oi', 'Anggota', NULL, '2022-03-07 03:53:37', '2022-03-07 03:53:37'),
(10, 'oka', 'oka@gmail.com', 'CA - 2022013001', '$2y$10$qdGwmJggjES2x2dG3AbwMOdTLU8VLHtucLLhYSEtGlOE0xGaWapTS', 'Anggota', NULL, '2022-03-07 03:58:53', '2022-03-07 03:58:53'),
(11, 'komang', 'komang@gmail.com', 'CA-222132', '$2y$10$GUglbOZoPd.30nC9T52/9upMeK5ztfoLtHAqczsdEEiHQXJXmZFO2', 'Anggota', '0898989898', '2022-03-07 11:34:34', '2022-03-07 11:41:06'),
(12, 'Ade Santoso', 'testing@gmail.com', 'CA-00000', '$2y$10$lRYR9vKOYQNdU1dSUBvFy.0aeaiTMtqUlue32q3L5POn451F2ZoF2', 'Anggota', NULL, '2022-03-07 14:06:03', '2022-03-07 14:06:03'),
(13, 'Ade Santoso', 'alansantoso@gmail.com', 'CA-00000', '$2y$10$FkdvlDcmyj2ZOXIQrcdXy.7ogYNO2jLLrNKrq6a3amwQRYAkgYj.i', 'Anggota', NULL, '2022-03-07 14:06:53', '2022-03-07 14:06:53'),
(14, 'Putra Andika', 'dika@gmail.com', 'CA-123', '$2y$10$T6wd7nD92fiQXF13ZAxK9.TwBXKXyxRKOKju8asAe86.4SP3IapbK', 'Anggota', '0898989898', '2022-04-12 11:27:43', '2022-04-12 11:30:09'),
(15, 'Lanteg', 'lanang@gmail.com', 'CA - 202201', '$2y$10$nDhK7MGDnTtWvh5xdJm8WueILzzKTLvoHgI1Tpf3UrddC875LwXdy', 'Anggota', '085124623', '2022-04-13 00:12:17', '2022-04-13 00:16:15'),
(16, 'quarta', 'quarta@gmail.com', 'CA - 2312154', '$2y$10$qd7i57otlcXMeqeKw.4yOewh38Lc29OwFcJN0dR04ut79tfNndsTq', 'Anggota', '84132', '2022-04-14 00:08:35', '2022-04-14 00:14:11'),
(17, 'edo', 'edo@gmail.com', 'CA - 5120', '$2y$10$JzERRM5QTODTcjMVrcy7VOdxXovXuNZjhVgBk/pZ0gvcpsSaLFymG', 'Pengurus', '1651321', '2022-04-14 01:47:53', '2022-04-14 02:06:57'),
(19, 'kadek', 'kadek@gmail.com', '-', '$2y$10$mmkW3G7Ww8H6G40ENBPWauOA9bl.FmP7TucELeu/GNI.u7BHYtpdm', 'Anggota', '251515', '2022-04-14 02:06:23', '2022-04-14 02:06:23'),
(20, 'Wahyudi Nugroho', 'masyarakat@example.com', NULL, '$2y$10$j3oScZXx3Fx7MKzqgCzaD.5vt2yxfu1Bw/DqLeQUPJiSHFkSgM9qi', 'Masyarakat', NULL, '2022-04-15 21:26:03', '2022-04-15 21:26:03'),
(21, 'Yudha Ardana', 'anggota@example.com', 'CA7238932', '$2y$10$GZv4UMLvo/03AeiW/Q8IMewKtt.kH.PC1Ysa5uSabUOObnj5qHdD2', 'Anggota', '08727312323', '2022-04-15 21:57:56', '2022-04-15 21:58:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_akun`
--
ALTER TABLE `detail_akun`
  ADD KEY `detail_akun_detail_user_id_foreign` (`detail_user_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `exams_quiz_id_foreign` (`quiz_id`),
  ADD KEY `exams_question_id_foreign` (`question_id`),
  ADD KEY `exams_user_id_foreign` (`user_id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`materi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `options_question_id_foreign` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `questions_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `results_quiz_id_foreign` (`quiz_id`),
  ADD KEY `results_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `materi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quiz_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_akun`
--
ALTER TABLE `detail_akun`
  ADD CONSTRAINT `detail_akun_detail_user_id_foreign` FOREIGN KEY (`detail_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exams_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
