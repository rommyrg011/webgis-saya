-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 08:00 AM
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
(2, 'Pickup'),
(4, 'Truck');

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
(3, 'Rommy Gunawan', 'TPS3R KAYU BULAN', 'mentes aja aku ya');

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
(486, 'dfsdf', 'gsdgdgds', 'fhfdhdf', 'manusia', 'dsfsdf', 'dsfdsfs'),
(487, 'cdtrjtfh', 'ggfhjgfjf', 'fdgfdgdf', 'gdfdfgd', 'dfsda', 'eww35232'),
(488, 'ryry', 'jgfrdr', 'dfgdfwe5', 'fgfgfdg', 'dfgdfgdfg', 'fgdfg'),
(489, 'rdfwerwer', 'rwerwerwe', 'werwerwe', 'srqwtrey', 'hfhfd', 'fgdgd'),
(490, 'fdgfdg', 'gffdgd', 'dgdfgdf', 'dgdfgdfg', 'dfgdfgdf', 'dgfgfdgdfg'),
(491, 'gfdgdf', 'sfsdf', 'ddfdfg', 'fgfdgfd', 'dfgdfas', 'dgdfgdfg'),
(492, 'fdgfdgfdg', 'dgfdg', 'fdgdf', 'gdfgfd', 'dfgdfadsg', 'fgfdgdf'),
(493, 'gdfdfgd', 'dfgdfg', 'gdfgdf', 'dfsdf', 'dfdsf', 'fgfgfd'),
(494, 'fsdsd', 'fgfdgdf', 'dgdgdsg', 'gffdgd', 'dfgdf', 'gfdgd'),
(498, 'dfgdfgdfgdf', 'dfgfdg', 'dfgfdgdfgdf', 'gdfgeer', 'ggreg', 'dfgfdgdf'),
(499, 'gdfgfd', 'f', 'dgfdgdf', 'fgfdg', 'fgfdgfd', 'dgdfgd'),
(500, 'dfgfdg', 'dfgdfg', 'dfgdfg', 'dgdfg', 'gdfgdf', 'dfgdfg'),
(501, 'dfgddfgdf', 'ertret', 'treter', 'terter', 'tertt', 'etert'),
(502, 'tretre', 'trtre', 'xzczxczx', 'xcxzc', 'xcxzc', 'dsfdsffsdfds'),
(503, 'dfdsf', 'dsfsdfsd', 'fsdfsdfsd', 'fsdfsd', 'fsdfsdf', 'sdfsssdf'),
(504, 'ffsdfsdfsdfsdf', 'dfsdf', 'sdfsd', 'sdfsdf', 'fsd', 'dfdsfsdf'),
(505, 'fsdfsd', 'dsfsdfsa', 'wrewtertewrew', 'rwerwetretgret', 'eewrwerwe', 'etrytertet'),
(506, 'dshrdfhfghfg', 'hfhfdhgfdg', 'dfgdfgdfg', 'dfgdfgds', 'sgdgsddfhgdfgdf', 'gdfgdfgdfgdfgdfg'),
(507, 'fdgdfgdfgdf', 'dfg', 'dgfdfg', 'gdfhfdh', 'fdsgsdfgdf', 'cvgdfgdg'),
(508, 'fgdfgdsg', 'hfhfdhfd', 'fdhf', 'gfdgdfg', 'dfgfd', 'jgjgh');

-- --------------------------------------------------------

--
-- Table structure for table `tps`
--

CREATE TABLE `tps` (
  `id_tps` int(11) NOT NULL,
  `tipe` varchar(200) NOT NULL,
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

INSERT INTO `tps` (`id_tps`, `tipe`, `nama_tps`, `kecamatan`, `alamat`, `kapasitas`, `ukuran_bangunan`, `jam_operasional`, `alat_angkutan`, `jam_angkutan`, `maps_direction`, `lattitude`, `longitude`, `image`) VALUES
(15, 'TPST3R', 'TPS3R KAYU BULAN', 'BANJARMASIN UTARA', 'Jl. Sungai Andai Komp. Kayu Bulan No.29, Sungai Jingah, Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70122', '2000 ton', '10 x 10 m', '24 jam', 'sepeda', '07.00', 'https://www.google.com/maps/dir/-3.353167,114.6186092/Tpst+3R+kayu+bulan/@-3.3176966,114.6030236,13z/data=!4m10!4m9!1m1!4e1!1m5!1m1!1s0x2de423d34ad39915:0x43bc5bbd2d20e827!2m2!1d114.6110909!2d-3.289661!3e0?entry=ttu&g_ep=EgoyMDI0MDkyNC4wIKXMDSoASAFQAw%3D%3D', '-3.2910245', '114.6142293', '5254987564f0e44891fec1b9c615be78.jpg');

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
(1, 'Rommy Gunawan', 'admin', 'admin', 'admin'),
(2, 'Siti Rahmah Zuraida', 'user', 'user', 'admin');

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
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;
--
-- AUTO_INCREMENT for table `tps`
--
ALTER TABLE `tps`
  MODIFY `id_tps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
