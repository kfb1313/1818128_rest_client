-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 06:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_laptop`
--

CREATE TABLE `tb_laptop` (
  `id` int(12) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_laptop`
--

INSERT INTO `tb_laptop` (`id`, `merek`, `jenis`, `tahun`) VALUES
(1, 'asus rog', 'game', '2019'),
(2, 'asus tuf', 'game', '2019'),
(3, 'accer predator', 'kantor', '2019'),
(4, 'asus vivobook', 'kantor', '2018'),
(5, 'asus rog', 'game', '2020'),
(6, 'asus vivobook', 'game', '2020'),
(7, 'asus vivobook', 'kantor', '2019');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
