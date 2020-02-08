-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 08:17 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8_bin NOT NULL,
  `password` varchar(60) COLLATE utf8_bin NOT NULL,
  `idCity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `username`, `password`, `idCity`) VALUES
(1, 'kacanata', '$2y$10$kL/gB.7pK/DfYdY6A4xtveAZVH7.sjw.FYmI80mofrw7Y7daSJPD.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `idCity` int(11) NOT NULL,
  `nameCity` varchar(200) COLLATE utf8_bin NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `naziv`) VALUES
(1, 'Bosnia'),
(2, 'Serbia');

-- --------------------------------------------------------

--
-- Table structure for table `grejanje`
--

CREATE TABLE `grejanje` (
  `idGrejanje` int(11) NOT NULL,
  `temperatura` varchar(60) COLLATE utf8_bin NOT NULL,
  `ukljuceno` varchar(60) COLLATE utf8_bin NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `grejanje`
--

INSERT INTO `grejanje` (`idGrejanje`, `temperatura`, `ukljuceno`, `idUser`) VALUES
(1, '25 stepeni', 'Ukljuceno', 2),
(2, '28 stepeni', 'Ukljuceno', 5);

-- --------------------------------------------------------

--
-- Table structure for table `hladjenje`
--

CREATE TABLE `hladjenje` (
  `idHladjenje` int(11) NOT NULL,
  `temperatura` varchar(60) COLLATE utf8_bin NOT NULL,
  `ukljuceno` varchar(60) COLLATE utf8_bin NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `hladjenje`
--

INSERT INTO `hladjenje` (`idHladjenje`, `temperatura`, `ukljuceno`, `idUser`) VALUES
(1, '10 stepeni', 'Iskljuceno', 2),
(2, '18 stepeni', 'Ukljuceno', 5);

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `svetla`
--

CREATE TABLE `svetla` (
  `idSvetla` int(11) NOT NULL,
  `ukljuceno` varchar(60) COLLATE utf8_bin NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `svetla`
--

INSERT INTO `svetla` (`idSvetla`, `ukljuceno`, `idUser`) VALUES
(1, 'Iskljucena', 2),
(2, 'Ukljucena', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8_bin NOT NULL,
  `password` varchar(60) COLLATE utf8_bin NOT NULL,
  `idAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `idAdmin`) VALUES
(2, 'olivera', '$2y$10$kL/gB.7pK/DfYdY6A4xtveAZVH7.sjw.FYmI80mofrw7Y7daSJPD.', 1),
(5, 'karolina', '$2y$10$kL/gB.7pK/DfYdY6A4xtveAZVH7.sjw.FYmI80mofrw7Y7daSJPD.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD KEY `idCity` (`idCity`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`idCity`),
  ADD KEY `idState` (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grejanje`
--
ALTER TABLE `grejanje`
  ADD PRIMARY KEY (`idGrejanje`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `hladjenje`
--
ALTER TABLE `hladjenje`
  ADD PRIMARY KEY (`idHladjenje`),
  ADD KEY `idUser` (`idUser`);


--
-- Indexes for table `svetla`
--
ALTER TABLE `svetla`
  ADD PRIMARY KEY (`idSvetla`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `idCity` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grejanje`
--
ALTER TABLE `grejanje`
  MODIFY `idGrejanje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hladjenje`
--
ALTER TABLE `hladjenje`
  MODIFY `idHladjenje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


--
-- AUTO_INCREMENT for table `svetla`
--
ALTER TABLE `svetla`
  MODIFY `idSvetla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
