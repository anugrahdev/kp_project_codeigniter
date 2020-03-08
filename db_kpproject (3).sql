-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2020 at 05:28 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kpproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id` int(11) NOT NULL,
  `bagian_name` varchar(128) NOT NULL,
  `id_fungsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `bagian_name`, `id_fungsi`) VALUES
(1, 'Programmer', 1),
(2, 'Teknisi', 1),
(3, 'HRD', 2),
(4, 'Area Manager', 1),
(5, 'Business Operation & Technology', 1),
(6, 'Junior Staff', 1),
(7, 'Junior Assistant', 1),
(8, 'Data Center Operation', 1),
(9, 'Computer Dev Technology', 1),
(10, 'Mobile Communication Ops', 1);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `description` text,
  `file_password` varchar(255) DEFAULT NULL,
  `uploader` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `file_name`, `description`, `file_password`, `uploader`) VALUES
(107, 'Data Encryption Standard (DES).pdf', 'Coba', '12345677', 'anangnugraha1011@gmail.com'),
(108, 'TUGAS_SOBET.pdf', 'tgs', '12345677', 'anangnugraha1011@gmail.com'),
(109, '1272340.pdf', 'cicil', 'cicil', 'anangnugraha1011@gmail.com'),
(113, 'TUGAS_SOBET4.pdf', 'filename', 'filename', 'anangnugraha1011@gmail.com'),
(116, '184648-ID-sistem-pakar-diagnosa-penyakit-kulit-men.pdf', 'Sistem pakar', '', 'anangnugraha1011@gmail.com'),
(117, 'Anangs_cv.pdf', 'CV Ku', 'rahasia', 'anangnugraha1011@gmail.com'),
(118, 'enkripsi_dan_dekripsi_data_dengan_algoritma_3_des.pdf', 'DES', '', 'anangnugraha1011@gmail.com'),
(121, 'Implementasi Hybrid Cryptosystem.pdf', 'Hybrid RC4 LUC', '12345678', 'mcaerosh@gmail.com'),
(123, 'Comparative_Analysis_of_AES_and_RC4.pdf', 'AES RC4', '', 'mcaerosh@gmail.com'),
(125, 'Analisis_Hasil_Implementasi_Algoritma_RC4_suar_apada_android.pdf', 'RC4 Android', '', 'mcaerosh@gmail.com'),
(126, 'PENGAMANAN_INFORMASI_TEKS_DI_CITRA_DIGITAL_lsb_rc4.pdf', 'Citra LSBRC4', '', 'mcaerosh@gmail.com'),
(127, 'perbandingan_stego_lsb_dan_dct_menggunakan_rc4.pdf', 'Perbandingan LSB DCT', '', 'mcaerosh@gmail.com'),
(128, 'Isi_Artikel_293536514599.pdf', '', '', 'mcaerosh@gmail.com'),
(129, 'STEGANOGRAFI_VIDEO_DIGITAL_DENGAN_ALGORITMA_MODIFIKASI_END_OF_FILE_DAN_RC4.pdf', '', '', 'mcaerosh@gmail.com'),
(131, 'Avalanche_Effect_of_the_AES.pdf', '', '', 'mcaerosh@gmail.com'),
(135, 'RSA-CRT.pdf', '', '', 'mcaerosh@gmail.com'),
(139, 'RSA-CRT_-_messaging.pdf', '', '', 'mcaerosh@gmail.com'),
(140, 'ANALISA_METODE_STENOGRAFI_LSB_DAN_METODE_SPREAD_SPECTRUM.pdf', '', '', 'mcaerosh@gmail.com'),
(141, 'Analisa_PSNR_Pada_Teknik_Steganografi_Menggunakan_Spread_Spectrum.pdf', '', '', 'mcaerosh@gmail.com'),
(142, 'ANALISA_METODE_STENOGRAFI_LSB_DAN_METODE_SPREAD_SPECTRUM1.pdf', '', '', 'mcaerosh@gmail.com'),
(143, 'Aplikasi_Steganografi_pada_Media_Citra_Digital.pdf', '', '', 'mcaerosh@gmail.com'),
(144, 'Perancangan_Aplikasi_Penyembunyian_Pesan_Teks.pdf', '', '', 'mcaerosh@gmail.com'),
(145, 'Implementasi_Watermark_Pada_Citra_Menggunakan.pdf', '', '', 'mcaerosh@gmail.com'),
(147, 'garuda807854.pdf', '', '', 'mcaerosh@gmail.com'),
(148, 'Pengantar-Kriptografi-(2018).pdf', '', '', 'mcaerosh@gmail.com'),
(149, 'panduan_skripsi_2017.pdf', '', '', 'mcaerosh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `fungsi`
--

CREATE TABLE `fungsi` (
  `id` int(11) NOT NULL,
  `fungsi_name` varchar(128) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fungsi`
--

INSERT INTO `fungsi` (`id`, `fungsi_name`, `keterangan`) VALUES
(1, 'IT', NULL),
(2, 'Humas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `fungsi` varchar(128) NOT NULL,
  `bagian` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `fungsi`, `bagian`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(2, 'Anang Nugraha', 'anangnugraha8@gmail.com', 'pasfoto.jpg', '2', '1', '$2y$10$qoXFlUbCCngSiOFJDTrJe.j2t73updBgrC6X/7GsArdoS6747MPLK', 1, 1, 1577332396),
(4, 'Rizki nur imani', 'rizkinuriman@gmail.com', 'download.jpg', '1', '4', '$2y$10$u..QfNIFj86Nu3u5B0wY4uajyDTcL1EZNY6H7PA0TOZcOLm638oPm', 2, 1, 1577434730),
(6, 'Ridha Ayu', 'ridha@gmail.com', 'default.png', '2', '3', '$2y$10$HEA4KVvc0JHufiFH.4cGkeANXYqQIQUxYQaeBEnAzF/Q40KA4d4tC', 2, 1, 1577714858),
(11, 'Robi Hidayat Syaf', 'robihidayatsyaf@gmail.com', 'default.png', '1', '1', '$2y$10$v4jmYlsZUuEiVTgkusOwcejISj3U1R9f.X5nBR7IABcHB89Yf0PDq', 2, 0, 1577951416),
(12, 'Mr. Nugraha', 'mcaerosh@gmail.com', 'pl1.png', '1', '2', '$2y$10$52HyLpUIKTuRsjDJPNcmKeQIGRmHrcMXRFqj6.Y1B.LuXpFnBhApK', 2, 1, 1577951587),
(14, 'Anang Nugraha User', 'anangnugraha1011@gmail.com', 'BEM1_-_Copy.JPG', '1', '1', '$2y$10$VVI/k76XJBw3Lj7WJ858PeML6zYZUrYRys0rDwcQbfqSq74PDzU8O', 2, 1, 1578320284),
(21, 'Opang', 'jaxobox992@finxmail.com', 'wibukntl.jpg', '1', '2', '$2y$10$L1RgYakj6.SEMu2pad60pO0b25MJONpE6ehoSqX26AxGGZ6MMyR7e', 2, 1, 1583421029),
(24, 'Bumble Bee', 'bumbleprimes@gmail.com', 'default.png', '2', '3', '$2y$10$ybjMnA/u2Q5ScEWdIBLCquSxezwx3RDGcC0mHUMtfSJdE9qX1sfNS', 2, 0, 1583504159);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(8, 2, 4),
(11, 2, 2),
(12, 1, 3),
(13, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Document');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu/index', 'fas fa-fw fa-folder', 1),
(5, 3, 'SubMenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(9, 1, 'User Management', 'admin/user_management', 'fas fa-fw fa-users-cog', 1),
(12, 4, 'PDF', 'document', 'fas fa-fw fa-file-pdf', 1),
(14, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(2, 'bumbleprimes@gmail.com', 'bdamyMd6zRWE85d4ubHUS21RgzQ3W0omDQaXlQz6gIw=', 1577896207),
(3, 'robihidayatsyaf@gmail.com', 'vnk19SwcxstsinUd15sF2LZmQtYiDSDi2yp6PoblO5A=', 1577951416),
(4, 'mcaerosh@gmail.com', 'ujRgH8iz/UTNkTxHZsZWl//8pj8KvPKlCaLQrJp93Rs=', 1577951587),
(5, 'aeroshtendo@gmail.com', 'S0/RJIOpa6rqf7gAAzd4g91syPdzhO3KP/dezcy1Mso=', 1577978132),
(6, 'anangnugraha1011@gmail.com', 'smXJAM6NpXKkBTMl4cndkcSkvJbCDbjrN9fTMWuSOUk=', 1578320284),
(7, 'bumbleprimes@gmail.com', '1w4lTBjNZzpnZuS3xo1pC8oXnzsJtFEPzUU1T8L+5Lo=', 1578412957),
(8, 'bumbleprimes@gmail.com', 'f1WhH4tdVnrrl93sMKefT0a2uEykk6tOpm6DOHt+juM=', 1578413735),
(9, 'woxol35361@nuevomail.com', 'Qf28X1qhH3k3oiSCZtHOpg/bkbZr77HOKDrWaq7QcjU=', 1583332927),
(10, 'loki.deric@aallaa.org', 'LAPgWYODVaVs6OP8oQD74IfhyQwnBHD9IJ/cCDktha4=', 1583333226),
(11, 'lion.shalom@aallaa.org', '5ftLf8O9TpCqcV3eWfYHyBawq71X/1nOY/AWG3IMWPI=', 1583333829),
(12, 'woxol35361@nuevomail.com', '88Y29mXLel2T1AQI1yWuYzS1TaCr3wmzTTLvBmF/6EI=', 1583334089);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `file_name` (`file_name`),
  ADD UNIQUE KEY `file_name_2` (`file_name`);

--
-- Indexes for table `fungsi`
--
ALTER TABLE `fungsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `fungsi`
--
ALTER TABLE `fungsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
