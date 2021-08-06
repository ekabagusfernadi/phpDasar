-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 09:31 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nrp` char(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Eka Bagus Fernadia', 'H76215032', 'bagusfernadieka@gmail.com', 'Sistem Informasi', '60a2f08ec4bf8.png'),
(2, 'Abdul Hilmi', 'H76215014', 'abdulhilmi01@gmail.com', 'Sistem Informasi', '60a2f036e7e76.jpg'),
(3, 'Intan Novi Astitik', 'H76215012', 'intannoviastutik55@gmail.com', 'Biologi', 'intanNoviAstutik.jpg'),
(4, 'Dibio Agus', 'H76215033', 'dibioAgus12@gmail.com', 'Matematika', '60a2efe85aae2.jpg'),
(5, 'Aditya Alvin', 'H76215002', 'adityaalvin@gmail.com', 'Biologi', 'adityaAlvin.jpg'),
(6, 'Rizka Putriss', 'H76215019', 'rizkaputri62@gmail.com', 'Arsitek', '60a2efdc9499f.jpg'),
(7, 'Muhammad Nur Alim', 'H76215001', 'muhammadnuralim01@gmail.com', 'Arsitek', 'muhammadNurAlim.jpg'),
(8, 'Shafira Rahmi', 'H76215018', 'shafirarahmi11@gmail.com', 'Teknik Lingkungan', 'shafiraRahmi.jpg'),
(9, 'Amir Nawan', 'H76215008', 'amirnawan989@gmail.com', 'Sistem Informasi', 'amirNawan.jpg'),
(10, 'Muhammad Fauzi', 'H76215039', 'muhammadfauzi23@gmail.com', 'Matematika', 'muhammadFauzi.jpg'),
(23, 'efgd gfge3', '12345', 'erert3', 'erterdddd3', '60b19ea2515fc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'eka', '$2y$10$f6Qpb93/p4zxWCJTOYHGYOIKsxLSN6tuI1hluRKfkQdCuO8tQavGa'),
(2, 'bagus', '$2y$10$6XbmEAeUcmmZfWpuD2G6LObR6FKVJxTAJPHeS/JAHA8z31Pjl691K');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
