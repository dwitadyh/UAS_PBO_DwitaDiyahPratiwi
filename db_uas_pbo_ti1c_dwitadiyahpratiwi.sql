-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2026 at 07:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_ti1c_dwitadiyahpratiwi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `hari_kerja_masuk` int NOT NULL,
  `gaji_dasar_per_hari` int NOT NULL,
  `jenis_karyawan` enum('tetap','kontrak','magang') NOT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyalur` varchar(100) DEFAULT NULL,
  `tunjangan_kesehatan` int DEFAULT NULL,
  `opsi_saham_id` varchar(20) DEFAULT NULL,
  `uang_saku_bulanan` int DEFAULT NULL,
  `sertifikat_kampus_merdeka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `departemen`, `hari_kerja_masuk`, `gaji_dasar_per_hari`, `jenis_karyawan`, `durasi_kontrak_bulan`, `agensi_penyalur`, `tunjangan_kesehatan`, `opsi_saham_id`, `uang_saku_bulanan`, `sertifikat_kampus_merdeka`) VALUES
('EMP-001', 'Ahmad Fauzi', 'IT Engineering', 22, 250000, 'tetap', NULL, NULL, 500000, 'ESOP-A1', NULL, NULL),
('EMP-002', 'Siti Rahmawati', 'Human Resources', 21, 200000, 'tetap', NULL, NULL, 450000, 'ESOP-B2', NULL, NULL),
('EMP-003', 'Budi Santoso', 'Finance', 20, 220000, 'tetap', NULL, NULL, 500000, 'ESOP-A2', NULL, NULL),
('EMP-004', 'Dewi Lestari', 'Marketing', 22, 190000, 'tetap', NULL, NULL, 400000, 'ESOP-C1', NULL, NULL),
('EMP-005', 'Eko Prasetyo', 'IT Engineering', 23, 270000, 'tetap', NULL, NULL, 600000, 'ESOP-A0', NULL, NULL),
('EMP-006', 'Fitriani', 'Legal', 21, 230000, 'tetap', NULL, NULL, 500000, 'ESOP-B1', NULL, NULL),
('EMP-007', 'Hendra Wijaya', 'Operations', 22, 180000, 'tetap', NULL, NULL, 400000, 'ESOP-C3', NULL, NULL),
('EMP-008', 'Indah Permata', 'Marketing', 20, 150000, 'kontrak', 12, 'PT Mitra Solusi', NULL, NULL, NULL, NULL),
('EMP-009', 'Joko Susilo', 'Operations', 22, 140000, 'kontrak', 6, 'PT Sumber Daya', NULL, NULL, NULL, NULL),
('EMP-010', 'Kevin Sanjaya', 'IT Engineering', 19, 180000, 'kontrak', 24, 'PT Tech Talent', NULL, NULL, NULL, NULL),
('EMP-011', 'Larasati', 'Finance', 21, 160000, 'kontrak', 12, 'PT Mitra Solusi', NULL, NULL, NULL, NULL),
('EMP-012', 'Muhammad Rizky', 'Operations', 18, 130000, 'kontrak', 6, 'PT Sumber Daya', NULL, NULL, NULL, NULL),
('EMP-013', 'Nadia Utami', 'Human Resources', 22, 150000, 'kontrak', 12, 'PT Global Karya', NULL, NULL, NULL, NULL),
('EMP-014', 'Oki Oktavian', 'IT Engineering', 21, 175000, 'kontrak', 12, 'PT Tech Talent', NULL, NULL, NULL, NULL),
('EMP-015', 'Putri Amelia', 'IT Engineering', 20, 80000, 'magang', NULL, NULL, NULL, NULL, 1500000, 'Sertifikat MSIB - Frontend'),
('EMP-016', 'Rian Hidayat', 'Marketing', 19, 75000, 'magang', NULL, NULL, NULL, NULL, 1200000, 'Sertifikat MSIB - Digital Marketing'),
('EMP-017', 'Salsa Bila', 'Human Resources', 22, 75000, 'magang', NULL, NULL, NULL, NULL, 1200000, 'Sertifikat Kampus Merdeka - HR'),
('EMP-018', 'Taufik Hidayat', 'IT Engineering', 21, 85000, 'magang', NULL, NULL, NULL, NULL, 1500000, 'Sertifikat MSIB - Backend'),
('EMP-019', 'Utari Putri', 'Finance', 20, 80000, 'magang', NULL, NULL, NULL, NULL, 1300000, 'Sertifikat Kampus Merdeka - Finance'),
('EMP-020', 'Yusuf Mansur', 'Operations', 15, 70000, 'magang', NULL, NULL, NULL, NULL, 1000000, 'Sertifikat Internal - Ops');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
