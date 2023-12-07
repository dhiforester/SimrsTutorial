-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2023 at 09:49 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar_simrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

DROP TABLE IF EXISTS `akses`;
CREATE TABLE IF NOT EXISTS `akses` (
  `id_akses` int(10) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `akses` varchar(20) NOT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `nama`, `kontak`, `email`, `password`, `akses`) VALUES
(1, 'Solihul hadi', '0896607577177', 'dhiforester@gmail.com', 'f4a3229c9c5f1bdd9c6a6791080791b7', 'admin'),
(2, 'Dini Agustina', '08965162526', 'diniagustina@gmail.com', '74df18b5f0f513ca46de41846f92ff74', 'Medrek');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
