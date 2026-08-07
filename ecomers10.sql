-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2026 at 08:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomers10`
--

-- --------------------------------------------------------

--
-- Table structure for table `tmbbrg`
--

CREATE TABLE `tmbbrg` (
  `id` int(11) NOT NULL,
  `no_faktue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmbhhbrg`
--

CREATE TABLE `tmbhhbrg` (
  `id_barang` int(11) NOT NULL,
  `seri` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tmbhhbrg`
--

INSERT INTO `tmbhhbrg` (`id_barang`, `seri`, `nama_barang`, `jenis`, `harga`, `deskripsi`, `foto`) VALUES
(1, '005', 'powerbbank', 'alat charger', 45, 'untuk mengisi daya', 'pb5.PNG'),
(2, '005', 'powerbbank', 'alat charger', 45, 'untuk mengisi daya', 'pb5.PNG'),
(3, '010', 'Powerbank', 'Alat Charger', 85, 'untuk mengisi daya', 'pb10.PNG'),
(4, '022', 'Powerbank', 'Alat Charger', 100, 'untuk mengisi daya', 'pb22.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `no_faktur` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `no_faktur`, `tanggal`, `nama_pembeli`, `alamat`, `ktp`, `id_barang`, `jumlah`, `total`) VALUES
(1, '', '0000-00-00', '', '', '', 0, 0, 0),
(2, '', '0000-00-00', '', '', '', 0, 0, 0),
(3, 'hhh', '2026-08-07', 'hfy', 'fdtg', '466', 2, 1, 45),
(4, 'bhfrdrc', '2026-08-07', 'hhh', 'hbxdgysg', '08967788', 4, 1, 100),
(5, 'bhfrdrc', '2026-08-07', 'hhh', 'hbxdgysg', '08967788', 4, 1, 100),
(6, 'bhfrdrc', '2026-08-07', 'MKMIUU', 'karangkulon', '08967788', 3, 1, 85),
(7, '005', '2026-08-07', 'dheanisa', 'imogiri', '2334456', 1, 1, 45),
(8, 'tfrf', '2026-08-07', 'fftft', 'ggh', '6666', 2, 1, 45),
(9, 'tfrf', '2026-08-07', 'fftft', 'ggh', '6666', 2, 1, 45),
(10, 'bhfrdrc', '2026-08-07', 'HHHHH', 'asdfats', '90909', 3, 1, 85),
(11, 'bhfrdrc', '2026-08-07', 'hhhhh', 'M,MKLKOI9', '56789', 4, 3, 300),
(12, '005', '2026-08-07', 'deaa', 'krgtlun', '09987', 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tmbhhbrg`
--
ALTER TABLE `tmbhhbrg`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tmbhhbrg`
--
ALTER TABLE `tmbhhbrg`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
