-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2022 at 01:43 AM
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
(1, '15-06-1999', 'Laki - Laki', '23', 'Jalan Tukad Balian No. 2', '2021-11-23 07:13:30', '2022-01-24 04:10:00'),
(2, '15-01-1999', 'Laki - Laki', '22', 'Jalan Raya Sesetan', '2022-01-22 01:12:26', '2022-01-24 04:06:39'),
(4, '19-11-1997', 'Laki - Laki', '25', 'Jalan Sading', '2022-01-24 04:03:27', '2022-01-24 04:03:39'),
(6, '11-08-1999', 'Laki - Laki', '23', 'Jalan Raya Sesetan', '2022-01-24 04:20:49', '2022-01-24 04:22:57');

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
(11, 5, 'gajah', NULL, NULL),
(12, 5, 'anjing', NULL, NULL),
(13, 5, 'kerbau', NULL, NULL),
(14, 5, 'kucing', NULL, '2022-02-05 12:41:09'),
(15, 6, 'benar', NULL, NULL),
(16, 6, 'salah', NULL, NULL),
(17, 6, 'anjing', NULL, NULL),
(18, 6, 'kucing', NULL, NULL),
(35, 11, 'kuluk', NULL, NULL),
(36, 11, 'sampi', NULL, NULL),
(37, 11, 'kebo', NULL, NULL),
(38, 11, 'anjing', NULL, NULL),
(47, 14, 'pertama', NULL, NULL),
(48, 14, 'kedelapan', NULL, NULL),
(49, 14, 'ketujuh', NULL, NULL),
(50, 14, 'kelima', NULL, NULL),
(51, 15, 'balian', NULL, NULL),
(52, 15, 'dokter', NULL, NULL),
(53, 15, 'rumah sakit', NULL, NULL),
(54, 15, 'klinik', NULL, NULL);

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
(5, 2, 'Salah satu jenis binatang rumahan, kecuali', 'gajah', '2022-01-29 12:29:30', '2022-02-05 12:41:09'),
(6, 2, 'pertanyaan 2', 'benar', '2022-01-29 13:25:21', '2022-01-29 13:25:21'),
(11, 2, 'pertanyaan 3', 'kuluk', '2022-02-05 13:03:59', '2022-02-05 13:03:59'),
(14, 2, 'naruto termasuk hokage ke berapa?', 'kedelapan', '2022-02-05 13:08:05', '2022-02-05 13:08:05'),
(15, 2, 'orang berobat harusnya ke?', 'balian', '2022-02-05 13:08:30', '2022-02-05 13:08:30');

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
(2, 'Survival', 'Quiz tentang Survival', '5', '5', '2022-01-29 03:44:33', '2022-02-05 11:22:44');

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
(1, 'A.A Ngurah Gede Wiyanjana Putra', 'gungde@gmail.com', '2021008230', '$2y$10$9ckeP0CM2Hf6x7hbuALaVe6gAgvhKo5dik6XkHtmZVwQ.XO008gZy', 'Anggota', '083111234768', '2022-01-23 04:20:01', '2022-01-24 04:10:00'),
(2, 'I Wayan Saputra', 'saputra@gmail.com', NULL, '$2y$10$9ckeP0CM2Hf6x7hbuALaVe6gAgvhKo5dik6XkHtmZVwQ.XO008gZy', 'Pengurus', '087892848723', '2022-01-21 01:11:12', '2022-01-24 04:06:39'),
(4, 'Ngurah Bagus Satria', 'ngurah@gmail.com', '2021083728', '$2y$10$QbHimm4HQjAgdSjWmJD3TO9kDEmeKxk97JeGNp8/La8FaRjwfUTmu', 'Anggota', '082938912298', '2022-01-24 04:03:27', '2022-01-24 04:03:39'),
(6, 'I Gede Surya', 'test@gmail.com', '2022123423', '$2y$10$eG8fVsaKWpSvBL183K.au.CgCHSzlzKH6Mcoxwzop9wlUrIZj/gmu', 'Anggota', '08789283782', '2022-01-24 04:20:49', '2022-01-24 04:22:57');

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
  MODIFY `exam_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `materi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quiz_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
