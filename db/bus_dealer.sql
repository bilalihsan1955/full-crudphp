-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 07:56 AM
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
-- Database: `bus_dealer`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(10, 'BILAL AL IHSAN', 'admin', 'bilalihsan1955@gmail.com', '$2y$10$4.ikRYWONLOB/glOEwlcPum8010Hc99a.6rpZphpF6LjZc86w.7VC', '1'),
(11, 'OPERATOR BUS', 'operator bus', 'bilalihsan1955@gmail.com', '$2y$10$l9gM8vJDjiX785w9oKYxF.jg0ftyh2VdkvdPxs9sWEIP36cN73kLG', '2'),
(12, 'OPERATOR PEGAWAI', 'operator pegawai', 'bilalihsan1955@gmail.com', '$2y$10$CE1PujxhDMj6RyJAs9TxmOer4fwrpz2HPauAs5n50Fepx6ChvbjdG', '3');

-- --------------------------------------------------------

--
-- Table structure for table `data_bus`
--

CREATE TABLE `data_bus` (
  `id_bus` int(11) NOT NULL,
  `plat_no` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `karoseri` varchar(255) NOT NULL,
  `chasis` varchar(255) NOT NULL,
  `tanggal_pembuatan` date NOT NULL,
  `harga` varchar(255) NOT NULL,
  `kondisi` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_bus`
--

INSERT INTO `data_bus` (`id_bus`, `plat_no`, `model`, `karoseri`, `chasis`, `tanggal_pembuatan`, `harga`, `kondisi`, `foto`) VALUES
(9, 'AD 1955 BAI', 'JETBUS 5 SHD DOUBLE GLASS', 'ADIPUTRO KAROSERI', 'HINO RM280 ABS', '2024-04-01', '3000000000', 'NEW', '660f9060ad2b5.jpg'),
(10, 'AD 1918 BAI', 'JETBUS 3+ SHD DOUBLE GLASS', 'ADIPUTRO KAROSERI', 'HINO RK R260', '2023-01-02', '2000000000', 'NEW', '660f90a3d84e8.jpg'),
(11, 'AD 1953 BAI', 'JETBUS 3+ SHD DOUBLE GLASS', 'ADIPUTRO KAROSERI', 'HINO RK R260', '2022-12-19', '1500000000', 'EKS LAKA', '660f91220c715.jpg'),
(12, 'AD 1954 BAI', 'SR2 XHD PRIME', 'LAKSANA KAROSERI', 'HINO RK R260', '2022-06-13', '2000000000', 'NEW', ''),
(13, 'AD 1958 BAI', 'SR3 XHD PRIME ULTIMATE EDITION', 'LAKSANA KAROSERI', 'HINO RM280 ABS', '2023-12-05', '3000000000', 'NEW', '660f91f836fce.png');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `divisi_bidang` varchar(90) DEFAULT NULL,
  `jk` varchar(10) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `divisi_bidang`, `jk`, `telepon`, `alamat`, `email`, `foto`) VALUES
(2, 'jeo', 'mechanical technician', 'Laki-Laki', '213', '<p>adafadfdf</p>\r\n', 'zheomovinperdana31@sma.belajar', '660f787f0a017.png'),
(5, 'BILAL AL IHSAN', 'Driver', 'Perempuan', '3312', '<p>qewfdsc</p>\r\n', 'zheomovinperdana31@sma.belajar', '660f1209e3b69.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `data_bus`
--
ALTER TABLE `data_bus`
  ADD PRIMARY KEY (`id_bus`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `data_bus`
--
ALTER TABLE `data_bus`
  MODIFY `id_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
