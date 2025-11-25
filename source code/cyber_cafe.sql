-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2025 at 02:03 PM
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
-- Database: `cyber_cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'lila', '6e2d835cfa02ef862fd32639c8fa395671de1f0752d5f703a922acaa5caa172d', 'Lila'),
(6, 'tes', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `detail_keranjang`
--

CREATE TABLE `detail_keranjang` (
  `id_detail_keranjang` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_menu` int(11) NOT NULL,
  `sub_harga` decimal(10,2) NOT NULL,
  `total_pembayaran` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_keranjang`
--

INSERT INTO `detail_keranjang` (`id_detail_keranjang`, `id_menu`, `jumlah_menu`, `sub_harga`, `total_pembayaran`) VALUES
(17, 14, 2, 160000.00, 160000.00),
(18, 15, 1, 110000.00, 110000.00),
(19, 21, 3, 45000.00, 45000.00),
(20, 22, 1, 20000.00, 20000.00),
(21, 13, 1, 120000.00, 120000.00),
(22, 18, 1, 30000.00, 30000.00),
(23, 19, 1, 35000.00, 35000.00),
(24, 13, 1, 120000.00, 120000.00),
(25, 13, 2, 240000.00, 240000.00),
(26, 13, 2, 240000.00, 240000.00),
(27, 14, 1, 80000.00, 80000.00),
(28, 13, 2, 240000.00, 240000.00),
(29, 14, 2, 160000.00, 160000.00),
(30, 19, 1, 35000.00, 35000.00),
(31, 14, 1, 80000.00, 80000.00),
(32, 13, 1, 120000.00, 120000.00),
(33, 13, 1, 120000.00, 120000.00),
(34, 13, 1, 120000.00, 120000.00),
(35, 22, 1, 20000.00, 20000.00),
(36, 30, 2, 40000.00, 40000.00),
(37, 18, 1, 30000.00, 30000.00),
(38, 26, 2, 160000.00, 160000.00),
(39, 13, 1, 120000.00, 120000.00),
(40, 13, 1, 120000.00, 120000.00),
(41, 15, 1, 110000.00, 110000.00),
(42, 25, 5, 600000.00, 600000.00);

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `id_mentor` int(11) NOT NULL,
  `nama_mentor` varchar(100) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `materi` text DEFAULT NULL,
  `jadwal_dan_waktu` varchar(100) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`id_mentor`, `nama_mentor`, `gambar`, `materi`, `jadwal_dan_waktu`, `kontak`) VALUES
(1, 'Nur', 'Nur.png', 'Analisis dan Perancangan Sistem Informasi', 'Senin, 09.00-11.00', '081234567890'),
(2, 'Cahya', '1762270781.png', 'Manajemen Basis Data dan Sistem Informasi', 'Selasa, 13.00-15.00', '082134567891'),
(3, 'Syahril', '1762562426.png', 'Audit dan Keamanan Sistem Informasi', 'Rabu, 10.00-12.00', '083134567892'),
(4, 'Desak', '1762404651.png', 'Pemrograman Sistem Informasi Berbasis Web', 'Kamis, 14.00-16.00', '084134567893'),
(5, 'Lila', '1762270805.png', 'Perencanaan Strategis Sistem Informasi', 'Jumat, 08.00-10.00', '085134567894');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `gambar_menu` varchar(255) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `deskripsi_menu` text DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `rate_menu` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `gambar_menu`, `kategori`, `deskripsi_menu`, `harga`, `rate_menu`) VALUES
(13, 'Spaghetti Chicken', 'spaghetti_chicken.jpeg', 'Makanan', 'Pasta lembut dengan ayam panggang dan saus spesial.', 120000.00, 4.80),
(14, 'Roasted Chicken', 'roasted_chicken.jpeg', 'Makanan', 'Ayam panggang dengan bumbu khas dan sayuran segar.', 80000.00, 4.60),
(15, 'Grilled Shrimp', 'grilled_shrimp.jpeg', 'Makanan', 'Udang bakar saus madu yang lezat dan gurih.', 110000.00, 4.60),
(16, 'Honey Grilled Chicken', 'honey_grilled_chicken.jpeg', 'Makanan', 'Ayam panggang madu dengan aroma menggoda.', 85000.00, 4.50),
(17, 'Sate Lontong', 'sate_lontong.jpeg', 'Makanan', 'Sate ayam dengan lontong dan bumbu kacang khas.', 20000.00, 4.90),
(18, 'Nasi Goreng', 'nasi_goreng.jpeg', 'Makanan', 'Nasi goreng spesial dengan telur mata sapi.', 30000.00, 4.80),
(19, 'Rendang Padang', 'rendang_padang.jpeg', 'Makanan', 'Daging sapi empuk dengan bumbu khas Padang.', 35000.00, 4.90),
(20, 'Ayam Geprek', 'ayam_geprek.jpeg', 'Makanan', 'Ayam goreng tepung dengan sambal pedas.', 20000.00, 4.70),
(21, 'Bakso Malang', 'bakso_malang.jpeg', 'Makanan', 'Bakso daging sapi dengan mie dan tahu isi.', 15000.00, 4.60),
(22, 'Capcay Tumis', 'capcay_tumis.jpeg', 'Makanan', 'Sayuran tumis segar dengan saus gurih.', 20000.00, 4.70),
(23, 'Mie Ayam', 'mie_ayam.jpeg', 'Makanan', 'Mie kenyal dengan ayam manis gurih.', 25000.00, 4.80),
(24, 'Soto Ayam', 'soto_ayam.jpeg', 'Makanan', 'Soto ayam dengan kuah kuning gurih dan nasi.', 20000.00, 4.70),
(25, 'Strawberry Vanila', 'strawberry_vanila.jpeg', 'Minuman', 'Minuman segar perpaduan stroberi dan vanila.', 120000.00, 4.90),
(26, 'Matcha Vanilaa', 'matcha_vanila.jpeg', 'Minuman', 'Matcha lembut dengan campuran vanila yang nikmat.', 80000.00, 4.80),
(27, 'Expresso Coffee', 'expresso_coffee.jpeg', 'Minuman', 'Kopi espresso dengan aroma kuat dan rasa khas.', 30000.00, 4.60),
(28, 'Lemon Ice', 'lemon_ice.jpeg', 'Minuman', 'Minuman es lemon segar pelepas dahaga.', 20000.00, 4.70),
(29, 'Coffee Ice', 'coffee_ice.jpeg', 'Minuman', 'Kopi dingin dengan susu dan es batu.', 30000.00, 4.80),
(30, 'Vanilla Coffee', 'vanilla_coffee.jpeg', 'Minuman', 'Kopi lembut berpadu dengan aroma vanila.', 20000.00, 4.70),
(31, 'Chocolate Coffee', 'chocolate_coffee.jpeg', 'Minuman', 'Kopi coklat creamy untuk pencinta rasa manis.', 25000.00, 4.80),
(32, 'Bobba Coffee', 'bobba_coffee.jpeg', 'Minuman', 'Kopi susu dengan topping boba kenyal.', 20000.00, 4.90);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `order_group_id` varchar(255) DEFAULT NULL,
  `id_keranjang` int(11) NOT NULL,
  `total_transaksi` decimal(10,2) NOT NULL,
  `opsi_pembayaran` varchar(50) DEFAULT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `nomor_meja` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `order_group_id`, `id_keranjang`, `total_transaksi`, `opsi_pembayaran`, `nama_pelanggan`, `nomor_meja`, `email`, `created_at`, `updated_at`) VALUES
(5, '3390 1830 3833', 21, 120000.00, 'ovo', 'Te', 2, '', NULL, NULL),
(6, '1474 7395 3022', 22, 30000.00, 'cash', 'Tes', 5, '', '2025-10-24 09:19:36', '2025-10-24 09:19:36'),
(7, '1474 7395 3022', 23, 35000.00, 'cash', 'Tes', 5, '', '2025-10-24 09:19:36', '2025-10-24 09:19:36'),
(8, '5623 7735 7261', 24, 120000.00, 'cash', 'Tes', 1, '', '2025-10-24 09:45:14', '2025-10-24 09:45:14'),
(9, '4976 8382 6832', 25, 240000.00, 'gopay', 'Kak nur', 4, '', '2025-10-28 01:04:49', '2025-10-28 01:04:49'),
(10, '7816 3894 5894', 26, 240000.00, 'cash', 'Kak nur', 5, '', '2025-10-28 01:14:03', '2025-10-28 01:14:03'),
(11, '9610 8755 7209', 27, 80000.00, 'cash', 'Tes3', 3, '', '2025-10-28 01:16:24', '2025-10-28 01:16:24'),
(12, '8074 2805 5021', 28, 240000.00, 'cash', 'aril', 2, 'mynameissyahril4@gmail.com', '2025-10-28 06:24:08', '2025-10-28 06:24:08'),
(13, '7170 3140 4197', 29, 160000.00, 'dana', 'Kak nur', 9, 'mynameismadan4@gmail.com', '2025-10-28 07:03:12', '2025-10-28 07:03:12'),
(14, '5525 4756 6289', 30, 35000.00, 'cash', 'Kak nur', 6, 'mynameismadan4@gmail.com', '2025-10-28 07:13:59', '2025-10-28 07:13:59'),
(15, '5578 7249 8118', 31, 80000.00, 'cash', 'Kak nur', 6, 'mynameismadan4@gmail.com', '2025-10-28 07:16:14', '2025-10-28 07:16:14'),
(16, '2928 7562 4127', 32, 120000.00, 'gopay', 'Kak nur', 9, 'mynameismadan4@gmail.com', '2025-10-28 07:24:23', '2025-10-28 07:24:23'),
(17, '9018 7408 7601', 33, 120000.00, 'cash', 'Kak nur', 9, 'mynameismadan4@gmail.com', '2025-10-28 07:28:17', '2025-10-28 07:28:17'),
(18, '5513 5261 5302', 34, 120000.00, 'cash', 'ahmad', 22, 'main@gmail.com', '2025-10-30 17:06:27', '2025-10-30 17:06:27'),
(19, '8487 9911 3619', 35, 20000.00, 'cash', 'Lila', 1, 'mynameissyahril4@gmail.com', '2025-10-31 18:35:42', '2025-10-31 18:35:42'),
(20, '8487 9911 3619', 36, 40000.00, 'cash', 'Lila', 1, 'mynameissyahril4@gmail.com', '2025-10-31 18:35:42', '2025-10-31 18:35:42'),
(21, '4034 3288 8617', 37, 30000.00, 'cash', 'Saril', 2, 'mynameissyahril4@gmail.com', '2025-10-31 19:02:47', '2025-10-31 19:02:47'),
(23, '9159 7184 5525', 39, 120000.00, 'cash', '3', 1, 'halo@gmail.com', '2025-11-05 20:57:50', '2025-11-05 20:57:50'),
(24, '7186 6285 5922', 40, 120000.00, 'cash', 'Kak nur', 9, 'mynameismadan4@gmail.com', '2025-11-08 22:17:40', '2025-11-08 22:17:40'),
(25, '3467 8275 7430', 41, 110000.00, 'cash', '1', 1, 'mynameismadan4@gmail.com', '2025-11-20 03:45:30', '2025-11-20 03:45:30'),
(26, '8104 4569 8772', 42, 600000.00, 'cash', 'eca', 2, 'eca@gmail.com', '2025-11-21 04:40:36', '2025-11-21 04:40:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `detail_keranjang`
--
ALTER TABLE `detail_keranjang`
  ADD PRIMARY KEY (`id_detail_keranjang`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`id_mentor`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_keranjang` (`id_keranjang`),
  ADD KEY `transaksi_order_group_id_index` (`order_group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_keranjang`
--
ALTER TABLE `detail_keranjang`
  MODIFY `id_detail_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `mentor`
--
ALTER TABLE `mentor`
  MODIFY `id_mentor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_keranjang`
--
ALTER TABLE `detail_keranjang`
  ADD CONSTRAINT `detail_keranjang_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_keranjang`) REFERENCES `detail_keranjang` (`id_detail_keranjang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
