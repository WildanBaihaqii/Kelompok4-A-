-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2026 at 03:51 AM
-- Server version: 12.3.2-MariaDB
-- PHP Version: 8.5.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `showroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `harga_dasar` decimal(15,2) NOT NULL,
  `kategori` enum('Konvensional','Listrik','MotorBesar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `brand`, `model`, `tahun`, `harga_dasar`, `kategori`) VALUES
(1, 'Toyota', 'Avanza Veloz', '2022', 250000000.00, 'Konvensional'),
(2, 'Honda', 'Civic Turbo', '2023', 600000000.00, 'Konvensional'),
(3, 'Mitsubishi', 'Pajero Sport', '2021', 580000000.00, 'Konvensional'),
(4, 'Toyota', 'Fortuner VRZ', '2022', 610000000.00, 'Konvensional'),
(5, 'Suzuki', 'Ertiga Hybrid', '2023', 270000000.00, 'Konvensional'),
(6, 'Daihatsu', 'Rocky T', '2022', 240000000.00, 'Konvensional'),
(7, 'BMW', '330i M Sport', '2023', 1050000000.00, 'Konvensional'),
(8, 'Hyundai', 'Ioniq 5 Long Range', '2023', 850000000.00, 'Listrik'),
(9, 'Wuling', 'Air EV Long Range', '2022', 300000000.00, 'Listrik'),
(10, 'Tesla', 'Model 3 Standard', '2021', 1500000000.00, 'Listrik'),
(11, 'BYD', 'Atto 3', '2024', 520000000.00, 'Listrik'),
(12, 'Nissan', 'Leaf', '2021', 730000000.00, 'Listrik'),
(13, 'MG', '4 EV', '2023', 430000000.00, 'Listrik'),
(14, 'Porsche', 'Taycan 4S', '2022', 2900000000.00, 'Listrik'),
(15, 'Kawasaki', 'Ninja ZX-25R', '2021', 120000000.00, 'MotorBesar'),
(16, 'Honda', 'CBR600RR', '2022', 550000000.00, 'MotorBesar'),
(17, 'Harley-Davidson', 'Iron 883', '2020', 400000000.00, 'MotorBesar'),
(18, 'Yamaha', 'YZF-R1', '2023', 850000000.00, 'MotorBesar'),
(19, 'Ducati', 'Panigale V4', '2023', 900000000.00, 'MotorBesar'),
(20, 'BMW Motorrad', 'R 1250 GS', '2022', 820000000.00, 'MotorBesar');

-- --------------------------------------------------------

--
-- Table structure for table `mobil_konvensional`
--

CREATE TABLE `mobil_konvensional` (
  `id_kendaraan` int(11) NOT NULL,
  `kapasitas_mesin` int(11) NOT NULL,
  `jenis_bahan_bakar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobil_konvensional`
--

INSERT INTO `mobil_konvensional` (`id_kendaraan`, `kapasitas_mesin`, `jenis_bahan_bakar`) VALUES
(1, 1500, 'Bensin'),
(2, 1500, 'Bensin'),
(3, 2400, 'Diesel'),
(4, 2800, 'Diesel'),
(5, 1500, 'Bensin'),
(6, 1000, 'Bensin'),
(7, 2000, 'Bensin');

-- --------------------------------------------------------

--
-- Table structure for table `mobil_listrik`
--

CREATE TABLE `mobil_listrik` (
  `id_kendaraan` int(11) NOT NULL,
  `kapasitas_baterai` int(11) NOT NULL,
  `jarak_tempuh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobil_listrik`
--

INSERT INTO `mobil_listrik` (`id_kendaraan`, `kapasitas_baterai`, `jarak_tempuh`) VALUES
(8, 72, 481),
(9, 26, 300),
(10, 54, 420),
(11, 60, 480),
(12, 40, 311),
(13, 51, 425),
(14, 93, 464);

-- --------------------------------------------------------

--
-- Table structure for table `motor_besar`
--

CREATE TABLE `motor_besar` (
  `id_kendaraan` int(11) NOT NULL,
  `tipe_rantai` varchar(30) NOT NULL,
  `mode_berkendara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `motor_besar`
--

INSERT INTO `motor_besar` (`id_kendaraan`, `tipe_rantai`, `mode_berkendara`) VALUES
(15, 'O-Ring Chain', 'Sport, Eco'),
(16, 'X-Ring Chain', 'Track, Sport, Street'),
(17, 'Belt Drive', 'Cruising'),
(18, 'O-Ring Premium', 'A, B, C, D Mode'),
(19, 'Regina Chain', 'Race A, Race B, Sport'),
(20, 'Shaft Drive', 'Rain, Road, Eco, Enduro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `mobil_konvensional`
--
ALTER TABLE `mobil_konvensional`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `mobil_listrik`
--
ALTER TABLE `mobil_listrik`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `motor_besar`
--
ALTER TABLE `motor_besar`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mobil_konvensional`
--
ALTER TABLE `mobil_konvensional`
  ADD CONSTRAINT `1` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`) ON DELETE CASCADE;

--
-- Constraints for table `mobil_listrik`
--
ALTER TABLE `mobil_listrik`
  ADD CONSTRAINT `1` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`) ON DELETE CASCADE;

--
-- Constraints for table `motor_besar`
--
ALTER TABLE `motor_besar`
  ADD CONSTRAINT `1` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
