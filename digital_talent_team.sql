-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 04:27 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_talent_team`
--
CREATE DATABASE IF NOT EXISTS `digital_talent_team` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `digital_talent_team`;

-- --------------------------------------------------------

--
-- Table structure for table `lingkaran`
--

CREATE TABLE `lingkaran` (
  `id_lingkaran` int(11) NOT NULL,
  `jari_jari` varchar(50) NOT NULL,
  `hasil` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lingkaran`
--

INSERT INTO `lingkaran` (`id_lingkaran`, `jari_jari`, `hasil`, `created_at`, `updated_at`) VALUES
(1, '23', '12432', '2020-10-13 13:42:50', '2020-10-13 13:42:50'),
(2, '12', '452.15999999999997', '2020-10-13 06:43:52', '2020-10-13 13:43:52'),
(3, '123', '47505.060000000005', '2020-10-13 07:04:07', '2020-10-13 14:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `persegi`
--

CREATE TABLE `persegi` (
  `id_persegi` int(11) NOT NULL,
  `sisi` varchar(50) NOT NULL,
  `hasil` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persegi`
--

INSERT INTO `persegi` (`id_persegi`, `sisi`, `hasil`, `created_at`, `updated_at`) VALUES
(2, '11', '121', '2020-10-13 07:26:07', '2020-10-13 14:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `segitiga`
--

CREATE TABLE `segitiga` (
  `id_segitiga` int(11) NOT NULL,
  `alas` varchar(50) NOT NULL,
  `tinggi` varchar(50) NOT NULL,
  `hasil` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `segitiga`
--

INSERT INTO `segitiga` (`id_segitiga`, `alas`, `tinggi`, `hasil`, `created_at`, `updated_at`) VALUES
(1, '12', '5', '30', '2020-10-13 06:43:18', '2020-10-13 13:43:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lingkaran`
--
ALTER TABLE `lingkaran`
  ADD PRIMARY KEY (`id_lingkaran`);

--
-- Indexes for table `persegi`
--
ALTER TABLE `persegi`
  ADD PRIMARY KEY (`id_persegi`);

--
-- Indexes for table `segitiga`
--
ALTER TABLE `segitiga`
  ADD PRIMARY KEY (`id_segitiga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lingkaran`
--
ALTER TABLE `lingkaran`
  MODIFY `id_lingkaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `persegi`
--
ALTER TABLE `persegi`
  MODIFY `id_persegi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `segitiga`
--
ALTER TABLE `segitiga`
  MODIFY `id_segitiga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
