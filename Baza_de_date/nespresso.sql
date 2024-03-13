-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 05:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nespresso`
--

-- --------------------------------------------------------

--
-- Table structure for table `biscuiti`
--

CREATE TABLE `biscuiti` (
  `id_biscuiti` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `pret` int(50) NOT NULL,
  `stoc` int(50) NOT NULL,
  `descriere` varchar(50) NOT NULL,
  `imagine` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `capsule`
--

CREATE TABLE `capsule` (
  `id_capsula` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `original` tinyint(1) NOT NULL,
  `nume_capsula` varchar(50) NOT NULL,
  `descriere` varchar(50) NOT NULL,
  `mililitri` int(50) NOT NULL,
  `intensitate` int(50) NOT NULL,
  `pret` float NOT NULL,
  `stoc` int(50) NOT NULL,
  `termen_valabilitate` int(50) NOT NULL,
  `data_fabricatiei` date NOT NULL,
  `imagine` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catogorie_capsula`
--

CREATE TABLE `catogorie_capsula` (
  `id_categorie` int(11) NOT NULL,
  `decofeinizata` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `espressoare`
--

CREATE TABLE `espressoare` (
  `id_espressor` int(11) NOT NULL,
  `original` tinyint(1) NOT NULL,
  `nume_espressor` varchar(50) NOT NULL,
  `nume_culoare` varchar(50) NOT NULL,
  `descriere` varchar(50) NOT NULL,
  `dimensiune` varchar(50) NOT NULL,
  `greutate` int(50) NOT NULL,
  `rezervor_apa` int(50) NOT NULL,
  `oprire_automata` tinyint(1) NOT NULL,
  `conectivitate` varchar(50) NOT NULL,
  `pret` int(50) NOT NULL,
  `stoc` int(11) NOT NULL,
  `imagine_espressor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kit_de_decalcifiere`
--

CREATE TABLE `kit_de_decalcifiere` (
  `id_kit_de_decalcifiere` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `pret` int(50) NOT NULL,
  `stoc` int(50) NOT NULL,
  `descriere` varchar(50) NOT NULL,
  `imagine` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suport_de_capsule`
--

CREATE TABLE `suport_de_capsule` (
  `id_suport` int(11) NOT NULL,
  `nume_suport` varchar(50) NOT NULL,
  `pret` int(50) NOT NULL,
  `stoc` int(50) NOT NULL,
  `descriere` varchar(50) NOT NULL,
  `imagine` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilizator`
--

CREATE TABLE `utilizator` (
  `id_utilizator` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `numar_de_telefon` int(11) NOT NULL,
  `data_nasterii` date NOT NULL,
  `data_inregistrarii` date NOT NULL,
  `strada` varchar(50) NOT NULL,
  `numarul` varchar(50) NOT NULL,
  `judetul` varchar(50) NOT NULL,
  `tara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biscuiti`
--
ALTER TABLE `biscuiti`
  ADD PRIMARY KEY (`id_biscuiti`);

--
-- Indexes for table `capsule`
--
ALTER TABLE `capsule`
  ADD PRIMARY KEY (`id_capsula`);

--
-- Indexes for table `catogorie_capsula`
--
ALTER TABLE `catogorie_capsula`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `espressoare`
--
ALTER TABLE `espressoare`
  ADD PRIMARY KEY (`id_espressor`);

--
-- Indexes for table `kit_de_decalcifiere`
--
ALTER TABLE `kit_de_decalcifiere`
  ADD PRIMARY KEY (`id_kit_de_decalcifiere`);

--
-- Indexes for table `suport_de_capsule`
--
ALTER TABLE `suport_de_capsule`
  ADD PRIMARY KEY (`id_suport`);

--
-- Indexes for table `utilizator`
--
ALTER TABLE `utilizator`
  ADD PRIMARY KEY (`id_utilizator`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biscuiti`
--
ALTER TABLE `biscuiti`
  MODIFY `id_biscuiti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `capsule`
--
ALTER TABLE `capsule`
  MODIFY `id_capsula` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catogorie_capsula`
--
ALTER TABLE `catogorie_capsula`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `espressoare`
--
ALTER TABLE `espressoare`
  MODIFY `id_espressor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kit_de_decalcifiere`
--
ALTER TABLE `kit_de_decalcifiere`
  MODIFY `id_kit_de_decalcifiere` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suport_de_capsule`
--
ALTER TABLE `suport_de_capsule`
  MODIFY `id_suport` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilizator`
--
ALTER TABLE `utilizator`
  MODIFY `id_utilizator` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
