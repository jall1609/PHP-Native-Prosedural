-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2022 at 04:54 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `porto_native_prosedural`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `nama_gambar` varchar(100) NOT NULL,
  `id_katalog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `nama_gambar`, `id_katalog`) VALUES
(3, 'Keyboard Gaming RGB Logitech G213 Prodigy', 600000, '632afe6c30d20.png', 4),
(8, 'Mouse Wireless RGB Dual Mode 2.4GHz+Bluetooth 5.2 Mouse Rgb 1600DPI', 100000, '632b02bc5c470.jpg', 2),
(9, 'VGA MSI GTX 1650', 4000000, '632b02f043fef.jpg', 5),
(10, 'Headphone Cewe Warna Pink Lucu', 200000, '632b031f1a9b9.jpg', 12),
(11, 'Speaker Simbadda CST 7000N+', 200000, '632b0369ea52e.png', 6),
(12, 'Monitor Lenovo Ultrawide Curve', 2000000, '632b03dec99c3.jpg', 4),
(13, 'Keyboard Mechanical Redragon Keren', 400000, '632b0469ee8b6.jpg', 14),
(15, 'Mouse Wireless and Bluetooth Razer', 600000, '632b051f21a84.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` int(11) NOT NULL,
  `nama_katalog` varchar(100) NOT NULL,
  `nama_gambar_katalog` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `nama_katalog`, `nama_gambar_katalog`) VALUES
(2, 'Mouse', '632a8d53ea365.jpg'),
(4, 'Monitor', '8.jpg'),
(5, 'VGA', '9.jpg'),
(6, 'Speaker', '10.jpg'),
(7, 'Prosesor', '11.jpg'),
(12, 'Headphone', '632b0230760b3.jpg'),
(13, 'RAM', '632b0249bfec3.jpg'),
(14, 'Keyboard', '632b044929086.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_katalog` (`id_katalog`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id_katalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_katalog`) REFERENCES `katalog` (`id_katalog`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
