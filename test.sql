-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2023 at 08:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `parola` varchar(250) NOT NULL,
  `kayit_tarihi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `kullanici_adi`, `email`, `parola`, `kayit_tarihi`) VALUES
(18, 'firat@gmail.com', 'firat@gmail.com', 'bc7316929fe1545bf0b98d114ee3ecb8', '2023-06-10 19:02:33'),
(19, 'fırattttt', 'firatttt@gmail.com', 'b59c67bf196a4758191e42f76670ceba', '2023-06-11 15:30:31'),
(21, 'ugurbaba', 'ugur@gmail.com', '087c8abfaee44ebbf0c2871976a2ab18', '2023-06-11 19:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `olaylar`
--

CREATE TABLE `olaylar` (
  `id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `olay_zamani` datetime NOT NULL,
  `olay_baslangic_zamani` datetime NOT NULL,
  `olayin_tanimlanmasi` varchar(255) NOT NULL,
  `olayin_tipi` varchar(255) DEFAULT NULL,
  `olayin_aciklamasi` text DEFAULT NULL,
  `olay_durum` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `olaylar`
--

INSERT INTO `olaylar` (`id`, `kullanici_id`, `olay_zamani`, `olay_baslangic_zamani`, `olayin_tanimlanmasi`, `olayin_tipi`, `olayin_aciklamasi`, `olay_durum`) VALUES
(18, 1, '2023-06-09 12:12:00', '2023-06-01 12:12:00', 'asdasdafrfr', 'sadsadsads', ' sdadsads', 'todo'),
(19, 1, '2023-06-14 12:12:00', '2023-06-14 12:12:00', 'asdasda2 f4f4f4', 'bababa', ' ', 'todo'),
(20, 1, '2023-06-02 14:14:00', '2023-06-01 14:14:00', 'sadasdadsad', 'sadsad', 'adasdas', 'todo'),
(25, 19, '2023-11-29 03:23:00', '2023-05-31 23:03:00', 'asd', 'asdsa', 'dsadas', 'todo'),
(26, 19, '2023-06-14 12:03:00', '2023-05-30 02:32:00', 'adasd', 'asdasda', 'asdadas', 'in-progress');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kullanici_adi` (`kullanici_adi`);

--
-- Indexes for table `olaylar`
--
ALTER TABLE `olaylar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `olaylar`
--
ALTER TABLE `olaylar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
