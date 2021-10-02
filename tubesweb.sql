-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 05:19 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubesweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatdiskusi`
--

CREATE TABLE `chatdiskusi` (
  `id` int(11) NOT NULL,
  `username` char(30) DEFAULT NULL,
  `chat` char(255) DEFAULT NULL,
  `idDiskusi` int(11) DEFAULT NULL,
  `jam` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatdiskusi`
--

INSERT INTO `chatdiskusi` (`id`, `username`, `chat`, `idDiskusi`, `jam`) VALUES
(41, 'kai_val_', 'Halo', 1, '03:43'),
(42, 'seanp', 'Punten', 1, '03:46'),
(43, 'kai_val_', 'halo', 1, '04:19'),
(44, 'kai_val_', 'Halo', 2, '07:36'),
(45, 'seanp', 'halo', 2, '08:00');

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE `diskusi` (
  `id` int(11) NOT NULL,
  `author` char(30) DEFAULT NULL,
  `title` char(30) DEFAULT NULL,
  `date` char(30) DEFAULT NULL,
  `approve` int(11) DEFAULT NULL,
  `chatToAdmin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diskusi`
--

INSERT INTO `diskusi` (`id`, `author`, `title`, `date`, `approve`, `chatToAdmin`) VALUES
(2, 'seanp', 'Olahraga', '2018-03-01 20:37:23', 1, NULL),
(5, 'jason', 'Fotografi', '2018-03-01 20:37:23', 1, NULL),
(6, 'ricardo', 'Otomotif', '2018-03-01 20:37:23', 1, NULL),
(13, 'seanp', 'Teknologi', '2021-04-19 03:04:26pm', 1, 'Ingin belajar teknologi\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `get_id_gambar` int(11) NOT NULL,
  `username_komen` varchar(50) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`get_id_gambar`, `username_komen`, `komentar`, `Id`) VALUES
(14, 'kai_val_', 'Halo', 9);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `username` char(30) DEFAULT NULL,
  `caption` char(30) DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `username`, `caption`, `image`) VALUES
(1, 'kai_val_', 'See this !', 'images1.jpg'),
(2, 'sean_p', 'Wow great !', 'images2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_acc`
--

CREATE TABLE `user_acc` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` int(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `dir_prof_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `user_acc`
--

INSERT INTO `user_acc` (`id`, `username`, `password`, `no_telp`, `email`, `bio`, `dir_prof_pic`) VALUES
(12, 'admin132', '21232f297a57a5a743894a0e4a801fc3', 0, 'admin@gmail.com', 'Saya admin', '2.jpg'),
(18, 'kai_val_', '28b662d883b6d76fd96e4ddc5e9ba780', 2147483647, 'kaisar@gmail.com', 'Halo!', '0.16365700 1618821357.jpg'),
(19, 'seanp', '28b662d883b6d76fd96e4ddc5e9ba780', 812, 'sean@gmail.com', 'Halo !', '1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatdiskusi`
--
ALTER TABLE `chatdiskusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_acc`
--
ALTER TABLE `user_acc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatdiskusi`
--
ALTER TABLE `chatdiskusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `diskusi`
--
ALTER TABLE `diskusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_acc`
--
ALTER TABLE `user_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
