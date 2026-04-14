-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2026 at 06:49 AM
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
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
(1, 'admin', 'admin', 'Administrator Perpustakaan');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kelas` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nis`, `nama_anggota`, `username`, `password`, `kelas`) VALUES
(19, '7173', 'junifer', 'Junz', '1234', '12'),
(20, '7171', 'andreu', 'dru', '1234', '12'),
(21, '7272', 'sean', 'ok3', '1234', '12'),
(22, '7171', 'junifer', 'jun', '1234', '12'),
(23, '7171', 'junifer', 'jun', '1234', '12'),
(24, '7171', 'junifer', 'jun', '12345', '12');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `status` enum('tersedia','tidak') NOT NULL,
  `stok` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `status`, `stok`) VALUES
(6, 'Harry Potter', 'J.K. Rowling', 'Disney', '1994', 'tidak', 20),
(8, 'The Chronicles of Narnia', 'C.S. Lewis.', 'PT gramedia Pustaka', '1970', 'tidak', 20),
(9, 'The Lord of the Rings: The Fellowship of the Ring', 'J. R. R. Tolkien', 'George Allen & Unwin', '1954', 'tidak', 29),
(10, 'Optimus Prime', 'Shōji Kawamori', 'Hasbro', '1984', 'tersedia', 15);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` datetime NOT NULL DEFAULT current_timestamp(),
  `tgl_kembali` datetime NOT NULL DEFAULT current_timestamp(),
  `status_transaksi` enum('peminjaman','pengembalian') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `status_transaksi`) VALUES
(7, 1, 6, '2026-02-13 07:12:00', '2026-02-13 07:12:55', 'pengembalian'),
(9, 4, 6, '2026-04-14 06:45:00', '2026-04-14 06:46:03', 'pengembalian'),
(11, 16, 6, '2026-04-14 06:58:27', '2026-04-14 06:58:36', 'pengembalian'),
(12, 3, 6, '2026-04-14 07:10:00', '2026-04-14 07:10:08', 'pengembalian'),
(13, 18, 6, '2026-04-14 07:28:32', '2026-04-14 07:29:22', 'pengembalian'),
(14, 18, 6, '2026-04-14 07:33:37', '2026-04-14 07:33:47', ''),
(15, 18, 6, '2026-04-14 07:35:05', '2026-04-14 07:35:08', ''),
(16, 18, 6, '2026-04-14 07:39:40', '2026-04-14 07:39:43', ''),
(17, 18, 6, '2026-04-14 07:40:04', '2026-04-14 07:40:07', ''),
(18, 18, 6, '2026-04-14 07:41:47', '2026-04-14 07:41:51', ''),
(19, 18, 6, '2026-04-14 07:44:09', '2026-04-14 07:44:13', ''),
(20, 18, 6, '2026-04-14 07:46:32', '2026-04-14 07:46:37', ''),
(21, 18, 6, '2026-04-14 07:48:32', '2026-04-14 07:48:36', 'pengembalian'),
(22, 19, 8, '2026-04-14 08:46:00', '2026-04-14 08:46:45', 'peminjaman'),
(23, 20, 9, '2026-04-14 08:47:00', '2026-04-14 08:47:10', 'peminjaman'),
(24, 23, 9, '2026-04-14 08:48:56', '2026-04-14 08:48:56', 'peminjaman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
