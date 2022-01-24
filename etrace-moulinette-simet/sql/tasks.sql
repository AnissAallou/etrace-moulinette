-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 25, 2020 at 02:04 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ratp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `TAC_ID` int(11) NOT NULL,
  `TAC_ID_Liaison` int(11) DEFAULT NULL,
  `TYM_ID` int(11) NOT NULL,
  `CLI_ID` int(11) DEFAULT NULL,
  `ADR_ID` int(11) DEFAULT NULL,
  `AGE_ID` int(11) NOT NULL,
  `DEP_ID` int(11) DEFAULT NULL,
  `UTI_ID` int(11) NOT NULL,
  `TAC_Numero` varchar(20) DEFAULT NULL,
  `TAC_Statut` int(1) DEFAULT '1',
  `TAC_Date` date NOT NULL,
  `TAC_DateLivraison` date DEFAULT NULL,
  `TAC_DateRDV` datetime DEFAULT NULL,
  `TAC_Description` varchar(300) DEFAULT NULL,
  `TAC_Reference` varchar(30) NOT NULL,
  `USR_DateModif` datetime NOT NULL,
  `USR_UserModif` int(11) DEFAULT NULL,
  `SLI_ID` int(11) NOT NULL,
  `SLI_ID_Liaison` int(11) DEFAULT NULL,
  `ART_ID` int(11) NOT NULL,
  `SLI_Quantite` int(11) NOT NULL,
  `SLI_QuantitePrepare` int(11) NOT NULL DEFAULT '0',
  `SNS_ID` int(11) NOT NULL,
  `SNS_NumeroSerie` varchar(200) NOT NULL,
  `SNS_CodeBarre` varchar(200) DEFAULT NULL,
  `STP_ID` int(11) DEFAULT NULL,
  `SNS_Emplacement` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`TAC_ID`),
  ADD KEY `TAC_ID_Liaison` (`TAC_ID_Liaison`),
  ADD KEY `TYM_ID` (`TYM_ID`),
  ADD KEY `CLI_ID` (`CLI_ID`),
  ADD KEY `ADR_ID` (`ADR_ID`),
  ADD KEY `AGE_ID` (`AGE_ID`),
  ADD KEY `DEP_ID` (`DEP_ID`),
  ADD KEY `UTI_ID` (`UTI_ID`),
  ADD KEY `SLI_ID` (`SLI_ID`),
  ADD KEY `SLI_ID_Liaison` (`SLI_ID_Liaison`),
  ADD KEY `TAC_ID` (`TAC_ID`),
  ADD KEY `ART_ID` (`ART_ID`),
  ADD KEY `STP_ID` (`STP_ID`),
  ADD KEY `SNS_NumeroSerie` (`SNS_NumeroSerie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `TAC_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
