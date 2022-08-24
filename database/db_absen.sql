-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 07:58 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `tanggal`) VALUES
(1, '2022-08-03'),
(2, '2022-08-19'),
(3, '2022-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `list_absen`
--

CREATE TABLE `list_absen` (
  `id_list` int(11) NOT NULL,
  `id_absen` int(11) NOT NULL,
  `no_pegawai` varchar(20) NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_absen`
--

INSERT INTO `list_absen` (`id_list`, `id_absen`, `no_pegawai`, `jam_masuk`, `jam_keluar`, `status`) VALUES
(1, 3, '1201', '07:45:08', '07:46:00', 'Hadir'),
(2, 3, '0009', '15:10:12', '15:11:40', 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `no_pegawai` varchar(20) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `posisi_jabatan` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `profil` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `qr_code` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`no_pegawai`, `nama_pegawai`, `tempat_lahir`, `tanggal_lahir`, `posisi_jabatan`, `jenis_kelamin`, `profil`, `password`, `qr_code`, `created_at`, `update_at`) VALUES
('0004', 'Pegawai 2', 'Ambon', '2001-02-18', 'Staf Keuangan', 'Perempuan', '571374859.png', '12345', '20220818633927755.png', '2022-08-18 12:18:13', '2022-08-18 12:18:34'),
('0008897', 'Pegawai 4', 'Ambon', '2022-08-18', 'Staf Kepegawaian', 'Perempuan', '320698799.jpg', '12345', '20220819179228659.png', '2022-08-19 07:48:07', NULL),
('0009', 'Lol', 'Tl', '2022-08-26', 'Pal', 'Laki-Laki', '1293713333.jpg', '12344', '202208182124327234.png', '2022-08-18 20:02:43', NULL),
('1201', 'Pegawai 1', 'Ambon', '1992-10-18', 'Staf Kepegawaian', 'Laki-Laki', '485324943.jpg', '12345', '20220818922048035.png', '2022-08-18 12:16:46', '2022-08-18 12:21:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `list_absen`
--
ALTER TABLE `list_absen`
  ADD PRIMARY KEY (`id_list`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`no_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `list_absen`
--
ALTER TABLE `list_absen`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
