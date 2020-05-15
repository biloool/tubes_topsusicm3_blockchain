-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2020 pada 05.38
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blockchain`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_blockchain`
--

CREATE TABLE `data_blockchain` (
  `id` int(5) NOT NULL,
  `data` varchar(20) DEFAULT NULL,
  `hash` varchar(20) DEFAULT NULL,
  `prev_hash` varchar(20) DEFAULT NULL,
  `nonce` varchar(20) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_blockchain`
--

INSERT INTO `data_blockchain` (`id`, `data`, `hash`, `prev_hash`, `nonce`, `timestamp`) VALUES
(0, 'genesis', 'b551092c', '0', '2d4a05c9', '2020-05-14 22:18:15'),
(1, '3737060d', '8ac307dd', NULL, '2d4a05c9', '2020-05-14 22:18:15'),
(2, '77df0877', '93530814', NULL, '2d4a05c9', '2020-05-14 22:21:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pool`
--

CREATE TABLE `data_pool` (
  `id` int(5) NOT NULL,
  `nama_depan` varchar(16) DEFAULT NULL,
  `nama_belakang` varchar(16) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `alamat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pool`
--

INSERT INTO `data_pool` (`id`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `no_hp`, `alamat`) VALUES
(1, 'coba', 'coba', 'L', '0812', 'yuhu'),
(2, 'coba', 'data2', 'P', '0812545445', 'Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` char(10) DEFAULT NULL,
  `password` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_blockchain`
--
ALTER TABLE `data_blockchain`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pool`
--
ALTER TABLE `data_pool`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
