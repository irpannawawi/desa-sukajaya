-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2023 at 12:28 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kki1`
--

-- --------------------------------------------------------

--
-- Table structure for table `kartu_keluarga`
--

CREATE TABLE `kartu_keluarga` (
  `id_kk` int NOT NULL,
  `no_kk` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kartu_keluarga`
--

INSERT INTO `kartu_keluarga` (`id_kk`, `no_kk`) VALUES
(1, 192991923812312);

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` varchar(18) COLLATE utf8mb4_general_ci NOT NULL,
  `no_kk` bigint NOT NULL,
  `nama` varchar(155) COLLATE utf8mb4_general_ci NOT NULL,
  `dusun` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `rt` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `rw` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `desa` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `kecamatan` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `kabupaten` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(155) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `agama` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `status_perkawinan` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `gol_darah` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `no_kk`, `nama`, `dusun`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `status_perkawinan`, `pekerjaan`, `gol_darah`) VALUES
('1234567890123456', 192991923812312, 'jajang jamaludin', ' ', ' ', ' ', ' ', ' ', ' ', 'ciamis', '20 September 2000', 'Laki-laki', '', '', '', NULL),
('3201731607900002', 192991923812312, 'WAWAN, S.Pd.I', ' ', ' ', ' ', ' ', ' ', ' ', 'Ciamis', '20 juli 2000', 'Laki-laki', '', '', '', NULL),
('3207130807000001', 192991923812312, 'Irpan Nawawi', ' ', ' ', ' ', ' ', ' ', ' ', 'Ciamis', '08 Januari 1995', 'Laki-laki', '', '', '', NULL),
('3207130909000001', 0, 'Ubaidilah', '', '', '', 'Sukajaya', 'Rajadesa', 'Ciamis', 'Ciamis', '10 Januari 2000', 'Laki-laki', 'Islam', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suket_domisili`
--

CREATE TABLE `suket_domisili` (
  `id_surat` int NOT NULL,
  `nik_pemohon` varchar(18) COLLATE utf8mb4_general_ci NOT NULL,
  `tujuan` enum('sendiri','orang lain','lembaga') COLLATE utf8mb4_general_ci NOT NULL,
  `nik_termohon` varchar(18) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_lembaga` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat_lembaga` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suket_kelakuan_baik`
--

CREATE TABLE `suket_kelakuan_baik` (
  `id_surat` int NOT NULL,
  `nik_pemohon` varchar(18) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suket_kematian`
--

CREATE TABLE `suket_kematian` (
  `id_surat` int NOT NULL,
  `nik_pemohon` varchar(18) COLLATE utf8mb4_general_ci NOT NULL,
  `nik_termohon` varchar(18) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_meninggal` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_meninggal` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `penyebab_meninggal` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suket_usaha`
--

CREATE TABLE `suket_usaha` (
  `id_surat` int NOT NULL,
  `nik_pemohon` varchar(18) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_usaha` varchar(155) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int NOT NULL,
  `username` varchar(155) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(155) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(155) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','pengguna') COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(18) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `email`, `password`, `role`, `nik`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$wIF1LL/0dPOdhJVl8OYK8.bH8tNbZe1RMpfmaG6avRS1fYudVfGTa', 'admin', ''),
(2, 'irpan', 'irpannawawi.ixd@gmail.com', '$2y$10$3deq3HN5wr5Ji2wufHjo5e5zmnTTd7GcepjD4k5p5UG.Jhd2//bWC', 'pengguna', '3207130807000001'),
(3, 'jajang', 'jajang@gmail.com', '$2y$10$/KVjk4wvX/9LnpojZ5m2HOLVp5M2ChRCAAge3P2UaCWPNoUZ5cbO2', 'pengguna', '1234567890123456'),
(4, 'jajang', 'jajang@gmail.com', '$2y$10$T.c5pOZA7nh6MiM.bvgscOpNe69OJV7cqBpJZeZ66WYQ1HugtRi06', 'pengguna', '1234567890123456'),
(5, 'jajang', 'jajang@gmail.com', '$2y$10$u7eQmvkhbl1xV/WCCG.APee17PNi/NVEIiZTQyMxks8lCzRtZWTJG', 'pengguna', '1234567890123456'),
(6, 'jajang', 'jajang@gmail.com', '$2y$10$48Vzj4sflp.eKeatKdkZZeybrADOragXbGH7cIUq6/jM4ldufMCQq', 'pengguna', '1234567890123456'),
(7, 'jajang', 'jajang@gmail.com', '$2y$10$Tg99A3X.Kk1P3/xqvmmcbeoLUyQ/E/DCxuvRtVBcoJ0ZWkUSOLvcy', 'pengguna', '1234567890123456'),
(8, 'jajang', 'jajang@gmail.com', '$2y$10$zLSYt92iZh2YGRJoTKVJee6P7cIF2.x.yUvN/O6sr2MU57iTEIgRq', 'pengguna', '1234567890123456'),
(9, 'jajang', 'jajang@gmail.com', '$2y$10$vQuKm4lsbOjQTJJO3uAdx.0.Ny2as0ixoPpLRhghz4/EpJyz5xdiW', 'pengguna', '1234567890123456'),
(10, 'sandimaulidika@gmail.com', 'sandimaulidika@gmail.com', '$2y$10$2PGhPaXywPYCu2o6s955x.diUl6aceJztLWZ/.N3I6mANzdbGyYzq', 'pengguna', '3201731607900002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `suket_domisili`
--
ALTER TABLE `suket_domisili`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `suket_kelakuan_baik`
--
ALTER TABLE `suket_kelakuan_baik`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `suket_kematian`
--
ALTER TABLE `suket_kematian`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `suket_usaha`
--
ALTER TABLE `suket_usaha`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  MODIFY `id_kk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suket_domisili`
--
ALTER TABLE `suket_domisili`
  MODIFY `id_surat` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suket_kelakuan_baik`
--
ALTER TABLE `suket_kelakuan_baik`
  MODIFY `id_surat` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suket_kematian`
--
ALTER TABLE `suket_kematian`
  MODIFY `id_surat` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suket_usaha`
--
ALTER TABLE `suket_usaha`
  MODIFY `id_surat` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
