-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 02:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_voiture`
--

-- --------------------------------------------------------

--
-- Table structure for table `assurance`
--

CREATE TABLE `assurance` (
  `id_assurance` int(11) NOT NULL,
  `matricule` varchar(20) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `validite` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assurance`
--

INSERT INTO `assurance` (`id_assurance`, `matricule`, `date_debut`, `date_fin`, `validite`) VALUES
(1, '18-154209', '2025-01-01', '2025-01-31', '1 mois'),
(2, '18-153881', '2025-01-01', '2025-01-31', '1 mois'),
(3, '18-149925', '2025-01-01', '2025-01-31', '1 mois'),
(4, '18-149839', '2025-01-01', '2025-01-31', '1 mois'),
(5, '18-149840', '2025-01-01', '2025-01-31', '1 mois'),
(6, '18-147814', '2025-01-01', '2025-01-31', '1 mois'),
(7, '18-146081', '2025-01-01', '2025-01-31', '1 mois'),
(8, '18-144516', '2025-01-01', '2025-01-31', '1 mois'),
(9, '18-142986', '2025-01-01', '2025-01-31', '1 mois'),
(10, '18-139585', '2025-01-01', '2025-01-31', '1 mois'),
(11, '18-139605', '2025-01-01', '2025-01-31', '1 mois'),
(12, '18-140261', '2025-01-01', '2025-01-31', '1 mois'),
(13, '01-138876', '2025-01-01', '2025-01-31', '1 mois'),
(14, '18-139113', '2025-01-01', '2025-01-31', '1 mois'),
(15, '01-136106', '2025-01-01', '2025-01-31', '1 mois'),
(16, '01-135183', '2025-01-01', '2025-01-31', '1 mois'),
(17, '18-160041', '2025-01-01', '2025-01-31', '1 mois'),
(18, '14TUN248', '2025-01-01', '2025-01-31', '1 mois'),
(19, '18-369856', '2025-01-01', '2025-01-31', '1 mois');

-- --------------------------------------------------------

--
-- Table structure for table `pneu`
--

CREATE TABLE `pneu` (
  `id_pneu` int(11) NOT NULL,
  `matricule` varchar(20) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `date_installation` date DEFAULT NULL,
  `nb_kilometre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pneu`
--

INSERT INTO `pneu` (`id_pneu`, `matricule`, `type`, `date_installation`, `nb_kilometre`) VALUES
(1, '18-154209', 'aaaaa', '2025-01-01', 0),
(2, '18-153881', 'aaaaa', '2025-01-01', 0),
(3, '18-149925', 'aaaaa', '2025-01-01', 0),
(4, '18-149839', 'aaaaa', '2025-01-01', 0),
(5, '18-149840', 'aaaaa', '2025-01-01', 0),
(6, '18-147814', 'aaaaa', '2025-01-01', 0),
(7, '18-146081', 'aaaaa', '2025-01-01', 0),
(8, '18-144516', 'aaaaa', '2025-01-01', 0),
(9, '18-142986', 'aaaaa', '2025-01-01', 0),
(10, '18-139585', 'aaaaa', '2025-01-01', 0),
(11, '18-139605', 'aaaaa', '2025-01-01', 0),
(12, '18-140261', 'aaaaa', '2025-01-01', 0),
(13, '01-138876', 'aaaaa', '2025-01-01', 0),
(14, '18-139113', 'aaaaa', '2025-01-01', 0),
(15, '01-136106', 'aaaaa', '2025-01-01', 0),
(16, '01-135183', 'aaaaa', '2025-01-01', 0),
(17, '18-160041', 'aaaaa', '2025-01-01', 0),
(18, '14TUN248', 'aaaaa', '2025-01-01', 0),
(19, '18-369856', 'aaaaa', '2025-01-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reparation`
--

CREATE TABLE `reparation` (
  `id_reparation` int(11) NOT NULL,
  `matricule` varchar(20) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `fournisseur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vignette`
--

CREATE TABLE `vignette` (
  `id_vignette` int(11) NOT NULL,
  `matricule` varchar(20) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `validite` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vignette`
--

INSERT INTO `vignette` (`id_vignette`, `matricule`, `date_debut`, `date_fin`, `validite`) VALUES
(1, '18-154209', '2025-01-01', '2025-01-31', '1 mois'),
(2, '18-153881', '2025-01-01', '2025-01-31', '1 mois'),
(3, '18-149925', '2025-01-01', '2025-01-31', '1 mois'),
(4, '18-149839', '2025-01-01', '2025-01-31', '1 mois'),
(5, '18-149840', '2025-01-01', '2025-01-31', '1 mois'),
(6, '18-147814', '2025-01-01', '2025-01-31', '1 mois'),
(7, '18-146081', '2025-01-01', '2025-01-31', '1 mois'),
(8, '18-144516', '2025-01-01', '2025-01-31', '1 mois'),
(9, '18-142986', '2025-01-01', '2025-01-31', '1 mois'),
(10, '18-139585', '2025-01-01', '2025-01-31', '1 mois'),
(11, '18-139605', '2025-01-01', '2025-01-31', '1 mois'),
(12, '18-140261', '2025-01-01', '2025-01-31', '1 mois'),
(13, '01-138876', '2025-01-01', '2025-01-31', '1 mois'),
(14, '18-139113', '2025-01-01', '2025-01-31', '1 mois'),
(15, '01-136106', '2025-01-01', '2025-01-31', '1 mois'),
(16, '01-135183', '2025-01-01', '2025-01-31', '1 mois'),
(17, '18-160041', '2025-01-01', '2025-01-31', '1 mois'),
(18, '14TUN248', '2025-01-01', '2025-01-31', '1 mois'),
(19, '18-369856', '2025-01-01', '2025-01-31', '1 mois');

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

CREATE TABLE `voiture` (
  `id_voiture` int(11) DEFAULT NULL,
  `matricule` varchar(20) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `carte_grise` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voiture`
--

INSERT INTO `voiture` (`id_voiture`, `matricule`, `type`, `carte_grise`) VALUES
(16, '01-135183', 'bus', 'HZB5OLBGMSS'),
(15, '01-136106', 'voiture 4x4', 'JTFDE626400128711'),
(13, '01-138876', 'voiture privé', 'KC1KCF'),
(18, '14TUN248', 'voiture privé', NULL),
(14, '18-139113', 'voiture 4x4', 'WV1ZZZ7JZX011003'),
(10, '18-139585', 'bus', '65C15'),
(11, '18-139605', 'bus', '65C15'),
(12, '18-140261', 'voiture privé', 'KC1KCF'),
(9, '18-142986', 'voiture 4x4', '2AFE4'),
(8, '18-144516', 'voiture privé', 'GJKCFWC1'),
(7, '18-146081', 'voiture privé', 'AJKFTO'),
(6, '18-147814', 'voiture privé', 'NC8FPO1'),
(4, '18-149839', 'bus', '65C115H47BM31'),
(5, '18-149840', 'bus', '65C115H47BM31'),
(3, '18-149925', 'bus', '18350HOCLR'),
(2, '18-153881', 'voiture privé', 'AO3AXNHHL'),
(1, '18-154209', 'voiture 4x4', 'UP4DB2M'),
(17, '18-160041', 'camion', 'ZCFCA35A705182479'),
(19, '18-369856', 'voiture 4x4', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assurance`
--
ALTER TABLE `assurance`
  ADD PRIMARY KEY (`id_assurance`),
  ADD KEY `matricule` (`matricule`);

--
-- Indexes for table `pneu`
--
ALTER TABLE `pneu`
  ADD PRIMARY KEY (`id_pneu`),
  ADD KEY `matricule` (`matricule`);

--
-- Indexes for table `reparation`
--
ALTER TABLE `reparation`
  ADD PRIMARY KEY (`id_reparation`),
  ADD KEY `matricule` (`matricule`);

--
-- Indexes for table `vignette`
--
ALTER TABLE `vignette`
  ADD PRIMARY KEY (`id_vignette`),
  ADD KEY `matricule` (`matricule`);

--
-- Indexes for table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`matricule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assurance`
--
ALTER TABLE `assurance`
  MODIFY `id_assurance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pneu`
--
ALTER TABLE `pneu`
  MODIFY `id_pneu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reparation`
--
ALTER TABLE `reparation`
  MODIFY `id_reparation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vignette`
--
ALTER TABLE `vignette`
  MODIFY `id_vignette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assurance`
--
ALTER TABLE `assurance`
  ADD CONSTRAINT `assurance_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `voiture` (`matricule`);

--
-- Constraints for table `pneu`
--
ALTER TABLE `pneu`
  ADD CONSTRAINT `pneu_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `voiture` (`matricule`);

--
-- Constraints for table `reparation`
--
ALTER TABLE `reparation`
  ADD CONSTRAINT `reparation_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `voiture` (`matricule`);

--
-- Constraints for table `vignette`
--
ALTER TABLE `vignette`
  ADD CONSTRAINT `vignette_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `voiture` (`matricule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
