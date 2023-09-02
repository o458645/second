-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 mai 2023 à 20:59
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbscolarite`
--
CREATE DATABASE IF NOT EXISTS `dbscolarite` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbscolarite`;
-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `Massar` varchar(10) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `classe` varchar(20) DEFAULT NULL,
  `mta` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`Massar`, `nom`, `prenom`, `classe`, `mta`) VALUES
('N139041783', 'Boudaoud', 'Aissa', '8', 9999.99),
('N139041786', 'BOUHANI', 'Mouhssin', '4', -9999.99),
('N139041787', 'BOUHANI', 'Mouhssin', '4', 457.00),
('N139041788', 'BOUHANI', 'mohamed', '3', 9999.99);

-- --------------------------------------------------------

--
-- Structure de la table `paie`
--

CREATE TABLE `paie` (
  `ideleve` varchar(20) DEFAULT NULL,
  `mois` varchar(20) DEFAULT NULL,
  `mtp` decimal(6,2) DEFAULT NULL,
  `datep` date DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `paie`
--

INSERT INTO `paie` (`ideleve`, `mois`, `mtp`, `datep`, `id`) VALUES
('N139041786', '05', 484.00, '2023-05-17', 1),
('N139041786', '02', 4782.00, '2023-05-24', 2),
('N139041788', '02', 4875.00, '2023-02-16', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`Massar`);

--
-- Index pour la table `paie`
--
ALTER TABLE `paie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `paie`
--
ALTER TABLE `paie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
