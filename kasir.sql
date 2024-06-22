-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 09:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `jumlah`) VALUES
(101, 'Akrilik Segi Sudut', 44000, 10),
(102, 'Akrilik Segi Tumpul', 45000, 7),
(103, 'Akrilik Kubah', 46000, 12),
(104, 'Akrilik Bulat', 47000, 11);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama`) VALUES
(1, 'admin'),
(2, 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_waktu` datetime NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bayar` bigint(20) NOT NULL,
  `kembali` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_waktu`, `nomor`, `total`, `nama`, `bayar`, `kembali`) VALUES
(7, '2024-01-08 08:31:32', '319081', 134000, '', 150000, 16000),
(8, '2024-01-08 08:40:54', '272162', 225000, '', 230000, 5000),
(9, '2024-01-08 08:50:50', '494775', 235000, '', 250000, 15000),
(10, '2024-01-08 08:52:13', '870625', 132000, '', 150000, 18000),
(11, '2024-01-08 15:52:01', '557256', 47000, '', 50000, 3000),
(12, '2024-01-08 15:53:24', '740019', 44000, '', 45000, 1000),
(13, '2024-01-08 16:15:07', '522386', 46000, '', 50000, 4000),
(14, '2024-01-08 16:19:00', '396666', 133000, '', 150000, 17000),
(15, '2024-01-08 16:23:38', '809153', 46000, '', 50000, 4000),
(16, '2024-01-09 12:10:55', '718237', 132000, 'Asfia', 135000, 3000),
(17, '2024-01-09 13:24:11', '753288', 232000, 'Asfia', 232000, 0),
(18, '2024-01-10 00:08:44', '738856', 92000, 'Yulia', 100000, 8000),
(19, '2024-01-10 00:16:59', '405532', 140000, 'Asfia', 150000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `nama_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `id_transaksi`, `id_barang`, `harga`, `qty`, `total`, `nama_barang`) VALUES
(13, 7, 103, 46000, 1, 46000, ''),
(14, 7, 101, 44000, 2, 88000, ''),
(15, 8, 102, 45000, 5, 225000, ''),
(16, 9, 104, 47000, 5, 235000, ''),
(17, 10, 101, 44000, 3, 132000, ''),
(18, 11, 104, 47000, 1, 47000, ''),
(19, 12, 101, 44000, 1, 44000, ''),
(20, 13, 103, 46000, 1, 46000, ''),
(21, 14, 102, 45000, 1, 45000, ''),
(22, 14, 101, 44000, 2, 88000, ''),
(23, 15, 103, 46000, 1, 46000, ''),
(24, 16, 101, 44000, 3, 132000, ''),
(25, 17, 104, 47000, 2, 94000, ''),
(26, 17, 103, 46000, 3, 138000, ''),
(27, 18, 103, 46000, 2, 92000, ''),
(28, 19, 104, 47000, 2, 94000, ''),
(29, 19, 103, 46000, 1, 46000, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'Asfia', 'asfiana', 'asfi04', 1),
(2, 'Yulia', 'yuliasopiana', 'yulia02', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
