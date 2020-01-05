-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Jan 05, 2020 at 02:44 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11
=======
-- Generation Time: Jan 05, 2020 at 08:10 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9
>>>>>>> 80a29301e8de560ac1fb9e55e9ac0f5e012048f6

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
(3, 'HRD', 2);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file_password` varchar(255) DEFAULT NULL,
  `uploader` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `file_name`, `description`, `file_password`, `uploader`) VALUES
<<<<<<< HEAD
(61, '353708671.pdf', 'tes', NULL, 'robihidayat@gmail.com'),
(62, '35370867.pdf', 'tess password', '12345678', 'robihidayat@gmail.com'),
(63, 'c3fef6f2b594a6f232aaec843f3caaac.pdf', 'trasd', NULL, 'robihidayat@gmail.com'),
(64, 'Bab-5_Konvolusi_dan_Transformasi_Fourier.pdf', 'konvolusi', NULL, 'robihidayat@gmail.com'),
(65, 'dlscrib_com_algoritma-triple-des.pdf', 'triple des', '12345678', 'robihidayat@gmail.com'),
(66, '115628-ID-steganografi-pada-citra-digital-mengguna.pdf', 'stegano citra digital', 'qwerty', 'robihidayat@gmail.com'),
(67, 'Data_Encryption_Standard_(DES).pdf', 'DES', 'rahasia', 'robihidayat@gmail.com');
=======
(2, 'Anang_Nugraha_(09021381722106)_t4citra.pdf', 'Tugas 4 Citra', '', 'rizkinuriman@gmail.com'),
(22, 'SRS_TUBES_PEMVIS_KELOMPOK_ANANG.pdf', 'SRS Pemvis', NULL, 'robihidayat@gmail.com'),
(23, 'vue-sample.pdf', 'sample belajar Vue', NULL, 'robihidayat@gmail.com'),
(24, 'laravel-sample.pdf', 'laravel tutorial sample', NULL, 'robihidayat@gmail.com'),
(25, 'Anang_Nugraha_(09021381722106)_t4citra1.pdf', 'Tugas 4 Citra', '12345678', 'robihidayat@gmail.com'),
(26, 'OACK_151225089.PDF', 'Seagate retur', '12345678', 'robihidayat@gmail.com'),
(27, 'MuhammadAbiJody(09021381722146).pdf', 'Tugas Abi Jody', '12345678', 'bumbleprimes@gmail.com'),
(28, 'contoh_kasus_EVM.pdf', 'EVM ', '12345678', 'bumbleprimes@gmail.com'),
(29, 'Pertemuan_5_MANAJEMEN_WAKTU_PROYEK.pdf', 'MWP Pertemuan 5', '12345678', 'bumbleprimes@gmail.com'),
(30, 'Pertemuan_10_MANAJEMEN_BIAYA_PROYEK.pdf', 'MPY pertemuan10', NULL, 'bumbleprimes@gmail.com'),
(31, 'LKS_Jarkom_1.pdf', 'LKS Jarkom Satu', NULL, 'ridha@gmail.com'),
(32, 'LKS_Jarkom_2.pdf', 'LKS Jarkom Dua', NULL, 'ridha@gmail.com'),
(33, 'OACK_1512250891.PDF', 'Tes', 'qwerty', 'robihidayat@gmail.com'),
(36, 'OACK_1512250894.PDF', 'OACK', NULL, 'bumbleprimes@gmail.com'),
(37, 'OACK_1512250895.PDF', 'test', NULL, 'bumbleprimes@gmail.com'),
(38, 'OACK_1512250896.PDF', 'OACK', '12345678', 'bumbleprimes@gmail.com'),
(39, 'OACK_1512250897.PDF', '123', NULL, 'bumbleprimes@gmail.com'),
(41, 'OACK_1512250892.PDF', 'Tes bae', NULL, 'robihidayat@gmail.com'),
(42, 'OACK_1512250893.PDF', 'deskripsi', NULL, 'robihidayat@gmail.com'),
(43, 'OACK_1512250898.PDF', 'tesss', NULL, 'robihidayat@gmail.com');
>>>>>>> 80a29301e8de560ac1fb9e55e9ac0f5e012048f6

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
(3, 'Robi Hidayat Haji', 'robihidayat@gmail.com', '272293.jpg', '1', '2', '$2y$10$vmei51fjrHGMIH9ZXZTRIuYu1T08g9JNHgkVukGSwP.PN6424l1Da', 2, 1, 1577333066),
(4, 'Rizki nur iman', 'rizkinuriman@gmail.com', 'download.jpg', '1', '1', '$2y$10$u..QfNIFj86Nu3u5B0wY4uajyDTcL1EZNY6H7PA0TOZcOLm638oPm', 2, 1, 1577434730),
(5, 'Stefani Naomi', 'nomnom@gmail.com', 'bahama1.jpg', '1', '1', '$2y$10$2WR7oe45r6CjqGEwQCE9UO0f1jmNGhv6nUwl8I7lG.NB.QvBM6cNa', 2, 1, 1577712053),
(6, 'Ridha Ayu', 'ridha@gmail.com', 'default.png', '2', '3', '$2y$10$HEA4KVvc0JHufiFH.4cGkeANXYqQIQUxYQaeBEnAzF/Q40KA4d4tC', 2, 1, 1577714858),
(10, 'Bumble Primes', 'bumbleprimes@gmail.com', 'default.png', '1', '1', '$2y$10$owiFqbjfkdDkEHB2bZjzfuylzO.5FW2pk2Y57WWES7B7FnlN2MsGK', 2, 1, 1577896207),
(11, 'Robi Hidayat Syaf', 'robihidayatsyaf@gmail.com', 'default.png', '1', '1', '$2y$10$v4jmYlsZUuEiVTgkusOwcejISj3U1R9f.X5nBR7IABcHB89Yf0PDq', 2, 0, 1577951416),
(12, 'McAerosh Nugraha', 'mcaerosh@gmail.com', 'default.png', '1', '2', '$2y$10$52HyLpUIKTuRsjDJPNcmKeQIGRmHrcMXRFqj6.Y1B.LuXpFnBhApK', 2, 1, 1577951587),
(13, 'aerosh tendo', 'aeroshtendo@gmail.com', 'default.png', '2', '3', '$2y$10$Ge/aQGQ5NE/8L9dX3.mIRe2TaBm4bje4WgUg5eW99dG1MwUbv3ejm', 2, 0, 1577978132);

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
(5, 1, 4),
(8, 2, 4),
(11, 2, 2),
(12, 1, 3);

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
(10, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(12, 4, 'PDF', 'document', 'fas fa-fw fa-file-pdf', 1);

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
(5, 'aeroshtendo@gmail.com', 'S0/RJIOpa6rqf7gAAzd4g91syPdzhO3KP/dezcy1Mso=', 1577978132);

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
<<<<<<< HEAD
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `file_name` (`file_name`);
=======
  ADD PRIMARY KEY (`id`);
>>>>>>> 80a29301e8de560ac1fb9e55e9ac0f5e012048f6

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
>>>>>>> 80a29301e8de560ac1fb9e55e9ac0f5e012048f6

--
-- AUTO_INCREMENT for table `fungsi`
--
ALTER TABLE `fungsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
