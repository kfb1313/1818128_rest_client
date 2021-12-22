-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2021 pada 16.27
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rest_airsoft`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_airsoft`
--

CREATE TABLE `tb_airsoft` (
  `id_model` varchar(20) NOT NULL,
  `nama_unit` varchar(20) NOT NULL,
  `jenis_unit` varchar(20) NOT NULL,
  `tahun_model` varchar(20) NOT NULL,
  `harga_sewa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_airsoft`
--

INSERT INTO `tb_airsoft` (`id_model`, `nama_unit`, `jenis_unit`, `tahun_model`, `harga_sewa`) VALUES
('0001', 'HK416', 'Gas', '2019', 25000),
('0002', 'UMP45', 'Gas', '2019', 20000),
('0003', 'UMP9', 'Elektrik', '2020', 25000),
('0004', 'P90', 'Elektrik', '2018', 20000),
('0005', 'Sig MCX', 'Elektrik', '2019', 30000),
('0006', 'AR15', 'Spring', '2018', 10000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_airsoft`
--
ALTER TABLE `tb_airsoft`
  ADD UNIQUE KEY `id_model` (`id_model`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
