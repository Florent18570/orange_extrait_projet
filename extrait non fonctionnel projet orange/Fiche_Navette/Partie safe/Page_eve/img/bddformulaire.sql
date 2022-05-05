-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 05 juin 2019 à 09:55
-- Version du serveur :  10.3.14-MariaDB
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bddformulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `detail_eve`
--

DROP TABLE IF EXISTS `detail_eve`;
CREATE TABLE IF NOT EXISTS `detail_eve` (
  `date` date NOT NULL,
  `heure` datetime NOT NULL,
  `nom` char(25) NOT NULL,
  `prénom` char(25) NOT NULL,
  `adresse` char(40) NOT NULL,
  `fiabilité` int(6) NOT NULL,
  `evenement` char(255) NOT NULL,
  `pole_res` char(25) NOT NULL,
  `mes_prises` char(255) NOT NULL,
  `mes_aprendre` char(255) NOT NULL,
  `etat` char(25) NOT NULL,
  `resultat` char(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` text NOT NULL,
  `Description_text` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`ID`, `Libelle`, `Description_text`) VALUES
(10, 'teste', ''),
(9, 'Texte 1', ''),
(19, '    teste 6', 'blabla'),
(18, '    teste4', 'teste4'),
(17, '    Blablabla3', 'description3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
