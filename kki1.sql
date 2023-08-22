-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2023 at 11:04 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` varchar(18) NOT NULL,
  `nama` varchar(155) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(155) NOT NULL,
  `tanggal_lahir` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `gol_darah` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `suket_domisili`
--

CREATE TABLE `suket_domisili` (
  `id_surat` int NOT NULL,
  `nik_pemohon` varchar(18) NOT NULL,
  `tujuan` enum('sendiri','orang lain','lembaga') NOT NULL,
  `nik_termohon` varchar(18) DEFAULT NULL,
  `nama_lembaga` varchar(155) NOT NULL,
  `alamat_lembaga` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suket_kelakuan_baik`
--

CREATE TABLE `suket_kelakuan_baik` (
  `id_surat` int NOT NULL,
  `nik_pemohon` varchar(18) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suket_kematian`
--

CREATE TABLE `suket_kematian` (
  `id_surat` int NOT NULL,
  `nik_pemohon` varchar(18) NOT NULL,
  `nik_termohon` varchar(18) NOT NULL,
  `tanggal_meninggal` varchar(30) NOT NULL,
  `tempat_meninggal` varchar(100) NOT NULL,
  `penyebab_meninggal` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suket_usaha`
--

CREATE TABLE `suket_usaha` (
  `id_surat` int NOT NULL,
  `nik_pemohon` varchar(18) NOT NULL,
  `nama_usaha` varchar(155) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int NOT NULL,
  `username` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `role` enum('admin','pengguna') NOT NULL,
  `nik` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `email`, `password`, `role`, `nik`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$x73WRSVb7FI01cVbOLMShugQwvIJqPf4QC3y0/EPp7yc9JTeu.qaO', 'admin', '');

--
-- Indexes for dumped tables
--

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
  MODIFY `uid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
