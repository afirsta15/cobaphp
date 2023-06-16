-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 09:51 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cobaphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nrp` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(3, 'bee', '1234', 'a', 'a', '4k-logo-png-50.jpg'),
(4, 'a', '4567', 'a', 'a', '8u7408q.jpg'),
(5, '75465', 'Afirsta ', 'afirsta15@gmail.com', 'Teknik ', '633fcaedb0758.jpg'),
(6, '987654', 'Afirsta Al', 'vg', 'Tknik Informatika', '633fcba04ee6a.jpeg'),
(7, '75465', 'Afirsta ', 'vg', 'dxavrw', '633fcd744de54.jpg'),
(8, '987654', 'htr', 'ali_yana31@yahoo.com', 'Teknik ', '633fce3ea0bcd.jpeg'),
(9, '75465', 'Afirsta Al', 'gr4', 'Tknik Informatika', '633fe3997643f.jpg'),
(10, '12456', '1oper', 'ert@fgh.com', 'tre', '63c6b373e99ae.jpg'),
(11, 'qwerty', 'qwedf', 'vg', 'teknik ', '63ee5c97b9b54.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(5, 'yuti', '$2y$10$qS9/U.la8dLvJCWKXHghIedMtbIey/2fHnnMtDziJyyaFB0ilTZvy'),
(6, 'tuyul', '$2y$10$77oONv2mldnO77AC.o8nyuGtJU1RqRlSy4Sid5QKs5BKx5S1SXO1K'),
(7, 'afi', '$2y$10$jjwt7GtlW5sCD7qCcASLUu8X1xd5tj0kbklgtt/x7iEOZiqWF7yoi'),
(8, 'dea', '$2y$10$IGK9iEbdF7U5QXxj2FMvpuUGpQ2NOz7jNzYngvURLi9etKv1cYPTG'),
(9, 'afirsta98', '$2y$10$QakTgLodjFdQKOQOb5h8vO7VVl9OzgF6nL/UQKk8yQJYzVXG.ztuW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
