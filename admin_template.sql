-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2023 at 07:34 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_template`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-05-13-175638', 'App\\Database\\Migrations\\Config', 'default', 'App', 1684000848, 1),
(2, '2023-05-21-011528', 'App\\Database\\Migrations\\Navigasi', 'default', 'App', 1684653812, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_config`
--

CREATE TABLE `tabel_config` (
  `id_config` int UNSIGNED NOT NULL,
  `appname` varchar(100) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `author` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `config_created_at` datetime NOT NULL,
  `config_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tabel_config`
--

INSERT INTO `tabel_config` (`id_config`, `appname`, `copyright`, `logo`, `keywords`, `author`, `description`, `config_created_at`, `config_updated_at`) VALUES
(1, 'Admin Template', 'Tamus Tahir || 2023', '1684653147_b57e104c3cd8aac1accd.png', 'Ci4, BS5', 'Tamus Tahir', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\',', '2023-05-14 02:01:18', '2023-05-21 07:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_navigasi`
--

CREATE TABLE `tabel_navigasi` (
  `id_navigasi` int UNSIGNED NOT NULL,
  `menu` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `dropdown` int NOT NULL,
  `urutan` int NOT NULL,
  `aktif` int NOT NULL,
  `navigasi_created_at` datetime NOT NULL,
  `navigasi_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tabel_navigasi`
--

INSERT INTO `tabel_navigasi` (`id_navigasi`, `menu`, `url`, `icon`, `dropdown`, `urutan`, `aktif`, `navigasi_created_at`, `navigasi_updated_at`) VALUES
(1, 'Dashboard', 'dashboard', 'bi bi-grid', 0, 1, 1, '2023-05-21 07:33:11', '2023-05-21 07:33:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_config`
--
ALTER TABLE `tabel_config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `tabel_navigasi`
--
ALTER TABLE `tabel_navigasi`
  ADD PRIMARY KEY (`id_navigasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_config`
--
ALTER TABLE `tabel_config`
  MODIFY `id_config` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_navigasi`
--
ALTER TABLE `tabel_navigasi`
  MODIFY `id_navigasi` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
