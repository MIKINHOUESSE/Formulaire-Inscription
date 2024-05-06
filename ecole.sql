-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 04 mai 2024 à 12:17
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numEtudiant` varchar(2200) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `age` int NOT NULL,
  `sexe` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `codFil` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `codFil` (`codFil`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `numEtudiant`, `nom`, `age`, `sexe`, `codFil`) VALUES
(1, '123ABC', 'Mikinhouesse Fifamè ', 21, 'feminin', 4),
(2, '123ABD', 'Chancelle MIKINHOUESSE', 22, 'feminin', 5),
(3, '123BCD', 'Mikinhouesse Chancelle', 23, 'feminin', 6),
(14, 'AEC456', 'Fifamè Chancelle MIKINHOUESSE', 21, 'feminin', 10),
(13, 'ABC123', 'MIKIHOUESSE Fifamè Chancelle', 24, 'feminin', 4);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `codFil` int NOT NULL AUTO_INCREMENT,
  `libFil` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`codFil`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`codFil`, `libFil`) VALUES
(1, 'Mathématique Fondamentale (L3)'),
(2, 'Mathématique Fondamentale (M1)'),
(3, 'Mathématique Fondamentale (M2)'),
(4, 'Informatique (L3)'),
(5, 'Informatique (M1)'),
(6, 'Informatique (M2)'),
(7, 'Physique (L3)'),
(8, 'Physique (M1)'),
(9, 'Physique (M2)'),
(10, 'Recherche Opérationnelle (M1)'),
(11, 'Recherche Opérationnelle (M2)');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
