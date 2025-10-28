-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 07:39 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `file_name_source` varchar(255) DEFAULT NULL,
  `file_name_finish` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `file_size` float DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `tgl_upload` timestamp NULL DEFAULT NULL,
  `status` enum('1','2') DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id_file`, `username`, `file_name_source`, `file_name_finish`, `file_url`, `file_size`, `password`, `tgl_upload`, `status`, `keterangan`) VALUES
(71, 'admin', '85709-alur-kas-rt-sebelum-perubahan.xlsx', '93598-alur-kas-rt-sebelum-perubahan.rda', 'file_enkripsi/93598-alur-kas-rt-sebelum-perubahan.rda', 48.457, '036d5a456c9ef2c3', '2022-06-04 02:55:17', '2', 'File Alur Kas RT'),
(72, 'admin', '45753-gng-lingai-filter-per-rt.xlsx', '44891-gng-lingai-filter-per-rt.rda', 'file_enkripsi/44891-gng-lingai-filter-per-rt.rda', 30.2803, '51947e3cf64ee746', '2022-06-04 03:30:37', '1', 'Gunung Lingai Per RT'),
(73, 'admin', '99931-dimas-ridho-amali.docx', '86025-dimas-ridho-amali.rda', 'file_enkripsi/86025-dimas-ridho-amali.rda', 12.9941, '1a2266ad4792624f', '2022-06-07 15:52:13', '1', 'okedah ni'),
(74, 'admin', '5376-new-microsoft-office-word-document.docx', '37314-new-microsoft-office-word-document.rda', 'file_enkripsi/37314-new-microsoft-office-word-document.rda', 13.7441, 'aca0cc73403a51a5', '2022-06-07 15:52:49', '1', 'okedah ni');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(15) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `join_date` timestamp NULL DEFAULT NULL,
  `last_activity` timestamp NULL DEFAULT NULL,
  `status` enum('1','2') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `fullname`, `job_title`, `join_date`, `last_activity`, `status`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Project Manager', '2017-04-28 08:48:55', '2022-06-08 05:36:27', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
