-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 12:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayanapresensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(10) UNSIGNED NOT NULL,
  `krs_id` int(11) NOT NULL,
  `pertemuan_id` int(11) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `durasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `krs_id`, `pertemuan_id`, `jam_masuk`, `jam_keluar`, `durasi`) VALUES
(1, 1, 1, '10:01:07', '11:15:33', 74),
(2, 1, 2, '13:31:00', '15:15:33', 104),
(3, 2, 4, '13:37:04', '15:15:00', 98);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kode_kelas`, `kode_matkul`, `nama_matkul`, `tahun`, `semester`, `sks`) VALUES
(1, 'SSE110A', 'SSE110', 'Bahasa Inggris', 2021, 1, 2),
(2, 'EKM101A', 'EKM101', 'Pengetahuan Bisnis', 2021, 1, 2),
(3, 'HKU110A', 'HKU110', 'Pendidikan Agama', 2021, 1, 3),
(4, 'PAM111A', 'PAM111', 'Aljabar Linear', 2021, 1, 3),
(5, 'TSI101A', 'TSI101', 'Pengantar Sistem Informasi', 2021, 1, 3),
(6, 'TSI103A', 'TSI103', 'Dasar-Dasar Pemrograman', 2021, 1, 3),
(7, 'EKM103A', 'EKM103', 'Dasar-Dasar Manajemen', 2021, 1, 2),
(8, 'TSI105A', 'TSI105', 'Praktikum Dasar-Dasar Pemrograman', 2021, 1, 1),
(9, 'TSI104A', 'TSI104', 'Arsitektur dan Organisasi Komputer', 2021, 2, 3),
(10, 'EKM202A', 'EKM202', 'Teori dan Perilaku Organisasi', 2021, 2, 2),
(11, 'PAM214A', 'PAM214', 'Matematika Diskrit', 2021, 2, 3),
(12, 'TSI108A', 'TSI108', 'Praktikum Struktur Data dan Algoritma', 2021, 2, 1),
(13, 'TSI106A', 'TSI106', 'Sistem Informasi Manajemen', 2021, 2, 4),
(14, 'PAM212A', 'PAM212', 'Kalkulus', 2021, 2, 3),
(15, 'TSI102A', 'TSI102', 'Struktur Data dan Algoritma', 2021, 2, 2),
(16, 'EKM303A', 'EKM303', 'Analisis Proses Bisnis', 2021, 1, 4),
(17, 'TSI203A', 'TSI203', 'Bahasa Pemrograman Lanjut', 2021, 1, 3),
(18, 'TSI207A', 'TSI207', 'Dasar Infrastuktur Teknologi', 2021, 1, 4),
(19, 'TSI205A', 'TSI205', 'Manajemen Basis Data', 2021, 1, 3),
(20, 'TSI209A', 'TSI209', 'Praktikum Bahasa Pemrograman Lanjut', 2021, 1, 1),
(21, 'TSI211A', 'TSI211', 'Praktikum SIG', 2021, 1, 1),
(22, 'TSI201A', 'TSI201', 'Sistem Informasi Geografi', 2021, 1, 3),
(23, 'SSE110B', 'SSE110', 'Bahasa Inggris', 2021, 1, 2),
(24, 'EKM101B', 'EKM101', 'Pengetahuan Bisnis', 2021, 1, 2),
(25, 'HKU110B', 'HKU110', 'Pendidikan Agama', 2021, 1, 3),
(26, 'PAM111B', 'PAM111', 'Aljabar Linear', 2021, 1, 3),
(27, 'TSI101B', 'TSI101', 'Pengantar Sistem Informasi', 2021, 1, 3),
(28, 'TSI103B', 'TSI103', 'Dasar-Dasar Pemrograman', 2021, 1, 3),
(29, 'EKM103B', 'EKM103', 'Dasar-Dasar Manajemen', 2021, 1, 2),
(30, 'TSI105B', 'TSI105', 'Praktikum Dasar-Dasar Pemrograman', 2021, 1, 1),
(31, 'TSI104B', 'TSI104', 'Arsitektur dan Organisasi Komputer', 2021, 2, 3),
(32, 'EKM202B', 'EKM202', 'Teori dan Perilaku Organisasi', 2021, 2, 2),
(33, 'PAM214B', 'PAM214', 'Matematika Diskrit', 2021, 2, 3),
(34, 'TSI108B', 'TSI108', 'Praktikum Struktur Data dan Algoritma', 2021, 2, 1),
(35, 'TSI106B', 'TSI106', 'Sistem Informasi Manajemen', 2021, 2, 4),
(36, 'PAM212B', 'PAM212', 'Kalkulus', 2021, 2, 3),
(37, 'TSI102B', 'TSI102', 'Struktur Data dan Algoritma', 2021, 2, 2),
(38, 'EKM303B', 'EKM303', 'Analisis Proses Bisnis', 2021, 1, 4),
(39, 'TSI203B', 'TSI203', 'Bahasa Pemrograman Lanjut', 2021, 1, 3),
(40, 'TSI207B', 'TSI207', 'Dasar Infrastuktur Teknologi', 2021, 1, 4),
(41, 'TSI205B', 'TSI205', 'Manajemen Basis Data', 2021, 1, 3),
(42, 'TSI209B', 'TSI209', 'Praktikum Bahasa Pemrograman Lanjut', 2021, 1, 1),
(43, 'TSI211B', 'TSI211', 'Praktikum SIG', 2021, 1, 1),
(44, 'TSI201B', 'TSI201', 'Sistem Informasi Geografi', 2021, 1, 3),
(45, 'SIN338A', 'SIN338', 'Kecakapan Antar Personal', 2021, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id`, `kelas_id`, `mahasiswa_id`) VALUES
(1, 38, 1),
(2, 39, 1),
(5, 40, 1),
(6, 41, 1),
(7, 42, 1),
(8, 43, 1),
(9, 44, 1),
(10, 38, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `nama`, `nim`, `email`) VALUES
(1, 3, 'Ade Iqbal', '1911521025', 'adeiqbal@gmail.com'),
(2, 5, 'Untung Jamari', '1911522002', 'untungjamari@gmail.com'),
(3, 4, 'Radhian Wahyu Elhaq', '1911522003', 'radhianwahyu@gmail.com'),
(4, 2, 'Arif Roska Perdana', '1911522029', 'arifroska@gmail.com');

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
(41, '2014_10_12_000000_create_users_table', 1),
(42, '2014_10_12_100000_create_password_resets_table', 1),
(43, '2019_08_19_000000_create_failed_jobs_table', 1),
(44, '2021_05_20_050539_create_kelas_table', 1),
(45, '2021_05_20_050830_create_krs_table', 1),
(46, '2021_05_20_050922_create_mahasiswa_table', 1),
(47, '2021_05_20_051037_create_pertemuan_table', 1),
(48, '2021_05_20_051503_create_absensi_table', 1);

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
-- Table structure for table `pertemuan`
--

CREATE TABLE `pertemuan` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `pertemuan_ke` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `materi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertemuan`
--

INSERT INTO `pertemuan` (`id`, `kelas_id`, `pertemuan_ke`, `tanggal`, `materi`) VALUES
(1, 38, 1, '2021-05-05', 'Materi 1'),
(2, 38, 2, '2021-06-07', 'Materi 2'),
(3, 38, 3, '2021-06-12', 'Materi 3'),
(4, 39, 1, '2021-06-01', 'Materi 1'),
(5, 39, 2, '2021-06-07', 'Materi 2'),
(15, 38, 4, '2021-06-10', 'Materi 4'),
(16, 38, 8, '2021-06-01', 'UTS'),
(17, 38, 16, '2021-06-24', 'UAS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `username`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '198201182008121002', 'admin', 'Dadidu', 'dadidu@gmail.com', NULL, '$2y$10$VzUdr8rDVvZl4z4ncNnXr.N7mbbD/i1MGlq2u5FhRX/K5ju.BXIji', 'DPfbUS2TqKAYh7UXSOqEtqJDOhDnPGcyaAH6VfNG5VlG1VjJfoxhvQAXMuGK', '2021-05-31 02:34:01', '2021-05-31 02:34:01'),
(2, '1911522029', 'mahasiswa', 'Arif Roska Perdana', 'arifroska@gmail.com', NULL, '$2y$10$AKYPaHz9V2Vp5Ie8MBNsDeREoTQ/RTV9yu8yoUPOw/ZrkxBMmEzgG', '5Qr9N4nT0HFDfIFV75lQpje0BCMLFuRi5qOr1u3b9XpsoW8ZrfO7BjNpeoYS', '2021-05-31 02:36:57', '2021-05-31 02:38:10'),
(3, '1911521025', 'mahasiswa', 'Ade Iqbal', 'adeiqbal@gmail.com', NULL, '$2y$10$RuTjta6RMk8eylUm1Y8hdelnG1/6LAU52K0tmtP3cbNnIdNR.dNay', 'MKGMA1QKobuB47fOeED4XLZoS3YDJpQxZLIp8nEnRinlqoYi30tjSBENbR5M', '2021-05-31 02:41:03', '2021-05-31 02:41:03'),
(4, '1911522003', 'mahasiswa', 'Radhian Wahyu Elhaq', 'radhianwahyu@gmail.com', NULL, '$2y$10$FKvm1Xp8FAIYvqXYLs0.suBKx6TUDOOm/Dm.dvCeZlQ91YjTPFbYK', 'Rf1WA4ytPtGmD6tgWbE6W8oHGg7GFwoGKebszxTG9WLDbtdLTWFiW3Zo0qgU', '2021-05-31 02:48:29', '2021-05-31 02:48:29'),
(5, '1911522002', 'mahasiswa', 'Untung Jamari', 'untungjamari@gmail.com', NULL, '$2y$10$n9GvMchk4mXQ9qYkXUxRTOJxll9XiCm0Bp2Aths0hCXqqSxp0..Ie', 'IlySFF1SgIm8dd5gtJZ6lFc2xtOC46vuMzbYEQrAmJmymE7Ny43PkESsx2Xr', '2021-05-31 02:49:29', '2021-05-31 02:49:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswa_email_unique` (`email`);

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
-- Indexes for table `pertemuan`
--
ALTER TABLE `pertemuan`
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
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pertemuan`
--
ALTER TABLE `pertemuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
