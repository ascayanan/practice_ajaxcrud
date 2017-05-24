-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2017 at 09:22 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ca`
--

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `firstName`, `lastName`, `gender`, `address`, `dob`) VALUES
(17, 'Alhajji', 'Cayanan', 'male', 'Fairview', '2017-05-24'),
(18, 'Rommel', 'Dayag', 'male', 'FEU', '2017-05-01'),
(19, 'Jeffrey', 'Flavio', 'male', 'Valenzuela', '2017-05-15'),
(21, 'Mavis', 'Vermillion', 'female', 'FT', '2017-05-31'),
(22, 'Laxus', 'Dreyar', 'male', 'FT', '2017-05-30'),
(23, 'Grey', 'Fullbuster', 'male', 'Un', '2017-05-21'),
(24, 'Natsu', 'Dragneel', 'male', 'END', '2017-05-22'),
(25, 'Lucy', 'Heartfilia', 'female', 'Hehe', '2017-05-05'),
(26, 'Ryoma', 'Echizen', 'male', 'Seigaku', '2017-05-20'),
(27, 'Fuji', 'Syusuke', 'male', 'Seigaku', '2017-05-26'),
(28, 'Luna', 'Moonfang', 'female', 'forest', '2017-05-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
