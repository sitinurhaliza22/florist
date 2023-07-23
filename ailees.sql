-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 04:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ailees`
--

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id` int(11) NOT NULL,
  `kode` varchar(200) NOT NULL,
  `stok` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id`, `kode`, `stok`) VALUES
(24, 'BPV1', 12);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `id_produk`, `username`, `nama`, `harga`) VALUES
(13, 21, 'riko', 'DATABASE DESIGN', 1200000),
(14, 19, 'riko', 'MANAGEMENT INFORMATION SYSTEM', 120000),
(17, 24, 'laura', 'Bouquet Premium V1', 125000),
(18, 24, 'laura', 'Bouquet Premium V1', 125000);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `produk` varchar(200) NOT NULL,
  `nama_penerima` varchar(200) NOT NULL,
  `alamat_penerima` varchar(1000) NOT NULL,
  `nohp_penerima` bigint(20) NOT NULL,
  `tanggal` varchar(200) NOT NULL,
  `total_bayar` varchar(200) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `status_pesanan` varchar(200) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `username`, `produk`, `nama_penerima`, `alamat_penerima`, `nohp_penerima`, `tanggal`, `total_bayar`, `bukti_transfer`, `status_pesanan`, `date_time`) VALUES
(23, 'laura', 'Bouquet Premium V1', 'Laura', 'Bekasi Timur', 895762762, '18 June 2022', '168750', '62a8a80fbfef5.jpg', 'Dalam Perjalanan\r\n                         ', '2022-06-22 13:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(200) NOT NULL,
  `username_seller` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `nama` varchar(200) NOT NULL,
  `deskripsi` varchar(10000) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode`, `username_seller`, `gambar`, `tgl_produksi`, `nama`, `deskripsi`, `harga`, `status`) VALUES
(24, 'BPV1', 'desi', '62a8a6975202b.jpg', '2022-06-14', 'Bouquet Premium V1', 'Bouquet Premium dengan bunga asli Italia', 125000, 'Pre-Order');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `username`, `password`, `nama`) VALUES
(1, 'desi', '$2y$10$y9V7QRPXaNbhMaZs.8cA..bKC6gQN3GGC6zuxwAreA.evUHMWbIsq', 'Desi'),
(3, 'admin', '$2y$10$NgjGmOMadq8kDySQxlJoEO60CkYr.sFofmWdHmg65gCVypMeyrLAO', 'Ailee');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES
(12, 'laura', '$2y$10$DDkCtlYZCD9CZHh9/EjqXO/KoHC7fy2UV8UMCSKLJ17Z4KFwdc28W', 'Laura'),
(13, 'ichaa', '$2y$10$AAaqNMSoa1XCMGih83w7EOcUA1iZsEe6idTtDk3BdF48qjjKPaFGW', 'Icha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`kode`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gudang`
--
ALTER TABLE `gudang`
  ADD CONSTRAINT `gudang_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `produk` (`kode`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
