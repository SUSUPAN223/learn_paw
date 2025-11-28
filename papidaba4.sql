-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2025 at 09:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `papidaba4`
--
CREATE DATABASE IF NOT EXISTS `ppdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ppdb`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--


CREATE TABLE `admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `PASS_ADMIN` varchar(255) DEFAULT NULL,
  `EMAIL_ADMIN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `PASS_ADMIN`, `EMAIL_ADMIN`) VALUES
(1, '$2y$10$BqOoevT/NpHfGycLJWcJme16b6rSPtNiJNbzrWwuH0yXcEJEKtlIq', 'a@a.a');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--


CREATE TABLE `jurusan` (
  `ID_JURUSAN` int(11) NOT NULL,
  `NAMA_JURUSAN` varchar(100) DEFAULT NULL,
  `DESKRIPSI_JURUSAN` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`ID_JURUSAN`, `NAMA_JURUSAN`, `DESKRIPSI_JURUSAN`) VALUES
(1, 'Ipa', 'Matematika dan Ilmu Pengetahuan Alam'),
(2, 'Ips', 'Ilmu Pengetahuan Sosial'),
(4, 'Bahasa', 'Bahasa dan Budaya Indonesia'),
(7, 'Sastra', 'Bahasa dan Budaya Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `kebutuhan`
--


CREATE TABLE `kebutuhan` (
  `ID_SISWA_KEBUTUHAN` int(11) NOT NULL,
  `ID_SISWA` int(11) NOT NULL,
  `DESKRIPSI_SISWA_KHUSUS` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kebutuhan`
--

INSERT INTO `kebutuhan` (`ID_SISWA_KEBUTUHAN`, `ID_SISWA`, `DESKRIPSI_SISWA_KHUSUS`) VALUES
(5, 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `manage_jurusan`
--


CREATE TABLE `manage_jurusan` (
  `ID_JURUSAN` int(11) NOT NULL,
  `ID_PENDAFTARAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_jurusan`
--

INSERT INTO `manage_jurusan` (`ID_JURUSAN`, `ID_PENDAFTARAN`) VALUES
(1, 12),
(2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--


CREATE TABLE `pendaftaran` (
  `ID_PENDAFTARAN` int(11) NOT NULL,
  `TANGGAL_DAFTAR` datetime DEFAULT NULL,
  `STATUS_PENDAFTARAN` varchar(150) DEFAULT NULL,
  `JENIS_BERKAS` varchar(100) DEFAULT NULL,
  `LOKASI_BERKAS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`ID_PENDAFTARAN`, `TANGGAL_DAFTAR`, `STATUS_PENDAFTARAN`, `JENIS_BERKAS`, `LOKASI_BERKAS`) VALUES
(12, '2025-11-24 11:44:43', 'Menunggu Verifikasi', 'Ijazah', 'ijazah_1_1763959483.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profil_siswa`
--


CREATE TABLE `profil_siswa` (
  `ID_SISWA` int(11) NOT NULL,
  `ID_WALI` int(11) DEFAULT NULL,
  `ID_PENDAFTARAN` int(11) DEFAULT NULL,
  `USER_SISWA` varchar(255) DEFAULT NULL,
  `PASS_SISWA` varchar(255) DEFAULT NULL,
  `EMAIL_SISWA` varchar(100) DEFAULT NULL,
  `NAMA_LENGKAP` varchar(255) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(100) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `JENIS_KELAMIN` varchar(100) DEFAULT NULL,
  `ALAMAT` text DEFAULT NULL,
  `ASAL_SEKOLAH` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_siswa`
--

INSERT INTO `profil_siswa` (`ID_SISWA`, `ID_WALI`, `ID_PENDAFTARAN`, `USER_SISWA`, `PASS_SISWA`, `EMAIL_SISWA`, `NAMA_LENGKAP`, `TEMPAT_LAHIR`, `TANGGAL_LAHIR`, `JENIS_KELAMIN`, `ALAMAT`, `ASAL_SEKOLAH`) VALUES
(1, 1, 12, 'asdasd', '$2y$10$G7jwH/M73hPyOsw8YesRAec6x9Dnjs8JpaYDKmcM7RMvQGojtRmkW', 'asd@asd.asd', 'Roy Kiyoshi', 'jakarta', '2000-02-01', 'Laki-laki', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'SMP MUHA\'JIR');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_kebutuhan_khusus`
--


CREATE TABLE `siswa_kebutuhan_khusus` (
  `ID_SISWA_KEBUTUHAN` int(11) NOT NULL,
  `NAMA_KEBUTUHAN` varchar(100) DEFAULT NULL,
  `DESKRIPSI_KEBUTUHAN` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa_kebutuhan_khusus`
--

INSERT INTO `siswa_kebutuhan_khusus` (`ID_SISWA_KEBUTUHAN`, `NAMA_KEBUTUHAN`, `DESKRIPSI_KEBUTUHAN`) VALUES
(1, 'Tunanetra', 'Siswa yang memiliki hambatan penglihatan (visual impairment) total atau sebagian.'),
(2, 'Tunarungu', 'Siswa dengan hambatan pendengaran yang membutuhkan alat bantu atau bahasa isyarat.'),
(3, 'Tunadaksa', 'Siswa dengan gangguan gerak tubuh, termasuk penggunaan kursi roda atau kesulitan motorik halus.'),
(4, 'Autis', 'Siswa dengan Gangguan Spektrum Autis (ASD) yang memengaruhi interaksi sosial dan komunikasi.'),
(5, 'Gangguankronis', 'Siswa dengan penyakit kronis yang memerlukan penanganan khusus dan pemantauan kesehatan di sekolah.'),
(6, 'Tunaganda', 'Siswa yang memiliki dua atau lebih jenis hambatan yang membutuhkan penanganan gabungan.'),
(7, 'Tidak Ada', 'Siswa reguler yang tidak memerlukan layanan pendidikan khusus.');

-- --------------------------------------------------------

--
-- Table structure for table `wali_siswa`
--


CREATE TABLE `wali_siswa` (
  `ID_WALI` int(11) NOT NULL,
  `NAMA_WALI` varchar(100) DEFAULT NULL,
  `STATUS_WALI` varchar(100) DEFAULT NULL,
  `NO_TELP` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wali_siswa`
--

INSERT INTO `wali_siswa` (`ID_WALI`, `NAMA_WALI`, `STATUS_WALI`, `NO_TELP`) VALUES
(1, 'kloooo', 'Ayah', '0812345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`ID_JURUSAN`);

--
-- Indexes for table `kebutuhan`
--
ALTER TABLE `kebutuhan`
  ADD PRIMARY KEY (`ID_SISWA_KEBUTUHAN`,`ID_SISWA`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_SISWA`);

--
-- Indexes for table `manage_jurusan`
--
ALTER TABLE `manage_jurusan`
  ADD PRIMARY KEY (`ID_JURUSAN`,`ID_PENDAFTARAN`),
  ADD KEY `FK_RELATIONSHIP_6` (`ID_PENDAFTARAN`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`ID_PENDAFTARAN`);

--
-- Indexes for table `profil_siswa`
--
ALTER TABLE `profil_siswa`
  ADD PRIMARY KEY (`ID_SISWA`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_WALI`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_PENDAFTARAN`);

--
-- Indexes for table `siswa_kebutuhan_khusus`
--
ALTER TABLE `siswa_kebutuhan_khusus`
  ADD PRIMARY KEY (`ID_SISWA_KEBUTUHAN`);

--
-- Indexes for table `wali_siswa`
--
ALTER TABLE `wali_siswa`
  ADD PRIMARY KEY (`ID_WALI`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `ID_JURUSAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `ID_PENDAFTARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profil_siswa`
--
ALTER TABLE `profil_siswa`
  MODIFY `ID_SISWA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa_kebutuhan_khusus`
--
ALTER TABLE `siswa_kebutuhan_khusus`
  MODIFY `ID_SISWA_KEBUTUHAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wali_siswa`
--
ALTER TABLE `wali_siswa`
  MODIFY `ID_WALI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kebutuhan`
--
ALTER TABLE `kebutuhan`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_SISWA_KEBUTUHAN`) REFERENCES `siswa_kebutuhan_khusus` (`ID_SISWA_KEBUTUHAN`),
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_SISWA`) REFERENCES `profil_siswa` (`ID_SISWA`);

--
-- Constraints for table `manage_jurusan`
--
ALTER TABLE `manage_jurusan`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_JURUSAN`) REFERENCES `jurusan` (`ID_JURUSAN`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_PENDAFTARAN`) REFERENCES `pendaftaran` (`ID_PENDAFTARAN`);

--
-- Constraints for table `profil_siswa`
--
ALTER TABLE `profil_siswa`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_WALI`) REFERENCES `wali_siswa` (`ID_WALI`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_PENDAFTARAN`) REFERENCES `pendaftaran` (`ID_PENDAFTARAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
