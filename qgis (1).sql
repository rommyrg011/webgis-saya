-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 02:19 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qgis`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id_alat`, `nama_alat`) VALUES
(1, 'Truck'),
(2, 'Pickup');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tps` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `nama_lengkap`, `tps`, `keterangan`) VALUES
(10, 'fsdfdsf', 'TPS3R KAYU BULAN', 'dfsdfsdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` int(11) NOT NULL,
  `nama_kec` varchar(200) NOT NULL,
  `luas_w` varchar(200) NOT NULL,
  `penduduk` varchar(200) NOT NULL,
  `kepadatan` varchar(200) NOT NULL,
  `lattitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `nama_kec`, `luas_w`, `penduduk`, `kepadatan`, `lattitude`, `longitude`) VALUES
(3, 'banjarmasin utara', 'fsfsdf', '100.000', 'fsafsa', '-3.2960704', '114.5995716');

-- --------------------------------------------------------

--
-- Table structure for table `tps`
--

CREATE TABLE `tps` (
  `id_tps` int(11) NOT NULL,
  `nama_tps` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kapasitas` varchar(100) NOT NULL,
  `ukuran_bangunan` varchar(100) NOT NULL,
  `jam_operasional` varchar(100) NOT NULL,
  `alat_angkutan` varchar(100) NOT NULL,
  `jam_angkutan` varchar(100) NOT NULL,
  `maps_direction` varchar(900) NOT NULL,
  `lattitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tps`
--

INSERT INTO `tps` (`id_tps`, `nama_tps`, `kecamatan`, `alamat`, `kapasitas`, `ukuran_bangunan`, `jam_operasional`, `alat_angkutan`, `jam_angkutan`, `maps_direction`, `lattitude`, `longitude`, `image`) VALUES
(15, 'TPS KAYU BULAN', 'BANJARMASIN UTARA', 'Jl. Sungai Andai Komp. Kayu Bulan No.29, Sungai Jingah, Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70122', '2000 ton', '10 x 10 m', '24 jam', 'sepeda', '07.00', 'https://feji.us/ccoet3', '-3.2910245', '114.6142293', '801c733f5ea50f63db14dd77b9fa28a2.jpg'),
(17, 'tps sujing', 'BANJARMASIN UTARA', 'Sultan Adam', '2000 ton', '10 x 10 m', '07.00', 'Truck', '07.00', 'https://feji.us/gklcxh', '-3.2918884', '114.5914696', 'adcd4a3e82b4b90c33cf447292a5ccb4.jpg'),
(18, 'TPS GARUDA', 'BANJARMASIN BARAT', 'MHJ7+6PV, Jl. Ir. P. Moch. Noor, Pelambuan, Kec. Banjarmasin Bar., Kota Banjarmasin, Kalimantan Selatan 70118', '2000 ton', '10 x 10 m', '07.00', 'truck', '07.00', 'localhost/webgis/login/admin/92430', '-3.3204118', '114.5954241', 'ff03f800a04fe50dc041ac64d1e73870.jpg'),
(19, 'tps bjm selatan', 'banjarmasin selatan', 'MJ63+928, Depan, Gg. Mangga, Murung Raya, Kec. Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan 70236', '2000 ton', '10 x 10 m', '24 jam', 'Truck', '07.00', 'localhost/webgis/login/admin/4259e', '-3.3390993', '114.6020592', '9b5c2f193a46eaa45ed791227daba1c1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `id` int(11) NOT NULL,
  `shorten_url` varchar(200) NOT NULL,
  `full_url` varchar(1000) NOT NULL,
  `clicks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `shorten_url`, `full_url`, `clicks`) VALUES
(33, '4259e', 'https://www.google.com/maps/place/Toko+pakaian+CJa/@-3.3390993,114.6020592,19z/data=!4m15!1m8!3m7!1s0x2de4216ce3bd6ee5:0x19217341e4cf7a7!2sKec.+Banjarmasin+Sel.,+Kota+Banjarmasin,+Kalimantan+Selatan!3b1!8m2!3d-3.333164!4d114.5861171!16s%2Fg%2F121jcd_x!3m5!1s0x2de4216cb412dfdb:0xfe936425cc354a84!8m2!3d-3.3390994!4d114.6025794!16s%2Fg%2F11ng0j1zkw?entry=ttu&g_ep=EgoyMDI0MDkwNC4wIKXMDSoASAFQAw%3D%3D', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(1, 'Rommy Gunawan', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indexes for table `tps`
--
ALTER TABLE `tps`
  ADD PRIMARY KEY (`id_tps`);

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tps`
--
ALTER TABLE `tps`
  MODIFY `id_tps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
