-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 27 Mai 2019 à 14:38
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `formulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `emetteurs`
--

CREATE TABLE IF NOT EXISTS `emetteurs` (
  `id` int(11) NOT NULL,
  `prenom` char(30) NOT NULL,
  `nom` char(30) NOT NULL,
  `login` char(40) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `emetteurs`
--

INSERT INTO `emetteurs` (`id`, `prenom`, `nom`, `login`, `password`) VALUES
(1, 'Anne-Marie', 'VIOLON', '', ''),
(2, 'ELISABETH', 'GENTIL', '', ''),
(3, 'Gilles', 'MARTIN', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

CREATE TABLE IF NOT EXISTS `etats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_etat` char(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `etats`
--

INSERT INTO `etats` (`id`, `type_etat`) VALUES
(1, 'Clos'),
(2, 'En cours'),
(3, 'Non réalisé'),
(4, 'Transféré'),
(5, 'Non transféré');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE IF NOT EXISTS `evenements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `information` char(255) NOT NULL,
  `resultat` char(255) NOT NULL,
  `fiabilite` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `emetteur_id` int(11) NOT NULL,
  `etat_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `mesure_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `evenements`
--

INSERT INTO `evenements` (`id`, `information`, `resultat`, `fiabilite`, `date`, `heure`, `emetteur_id`, `etat_id`, `source_id`, `mesure_id`) VALUES
(1, 'blabla', 'sdfji', 1, '2019-05-09', '00:00:00', 0, 0, 6, 0),
(2, 'blabla', 'fedsdf', 1, '2019-05-25', '00:00:00', 0, 2, 10, 0),
(11, 'Evenement 1', '', 1, '2019-05-20', '00:00:00', 1, 0, 0, 0),
(12, 'Evenement 2', '', 2, '2019-05-20', '00:00:00', 1, 0, 0, 0),
(13, 'Evenement 3', '', 3, '2019-05-22', '00:00:00', 2, 0, 0, 0),
(14, 'Evenement 4', '', 4, '2019-05-15', '00:00:00', 3, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `mesures`
--

CREATE TABLE IF NOT EXISTS `mesures` (
  `id` int(11) NOT NULL,
  `commentaire` char(255) NOT NULL,
  `type_mesure_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mesures`
--

INSERT INTO `mesures` (`id`, `commentaire`, `type_mesure_id`) VALUES
(1, 'Mesure1', 1),
(2, 'Mesure2', 1),
(3, 'Mesure3', 2),
(4, 'Mesure4', 2),
(5, 'Mesure5', 1),
(6, 'Mesure6', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pole_responsables`
--

CREATE TABLE IF NOT EXISTS `pole_responsables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` char(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `pole_responsables`
--

INSERT INTO `pole_responsables` (`id`, `nom`) VALUES
(1, 'Secrétariat'),
(3, 'Technique'),
(4, 'Logistique'),
(5, 'Sanitaire et Social'),
(6, 'Sécurité publique');

-- --------------------------------------------------------

--
-- Structure de la table `sources`
--

CREATE TABLE IF NOT EXISTS `sources` (
  `id` int(11) NOT NULL,
  `nom` char(30) NOT NULL,
  `prenom` char(30) NOT NULL,
  `adresse` char(80) NOT NULL,
  `ville` char(45) NOT NULL,
  `cp` int(5) NOT NULL,
  `tel1` varchar(10) NOT NULL,
  `tel2` varchar(10) NOT NULL,
  `pole_responsable_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sources`
--

INSERT INTO `sources` (`id`, `nom`, `prenom`, `adresse`, `ville`, `cp`, `tel1`, `tel2`, `pole_responsable_id`) VALUES
(0, 'lepen', 'marc', '30 rue du bois', 'Le Subdray', 18000, '0265332120', '0648557954', 2),
(6, 'lepen', 'Marc', '30 rue de bois', 'Le Subdray', 18000, '0245885201', '0654885523', 0),
(7, 'REGNER', 'Elise', 'rue de l''apparent BOURGES', 'Paris', 37300, '06.61.37', '06.35.49.0', 0),
(10, 'LAPOISSE', 'Donatien', 'rue Henri Sellier', 'St florent', 18570, '06.35.49.0', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_mesures`
--

CREATE TABLE IF NOT EXISTS `type_mesures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `type_mesures`
--

INSERT INTO `type_mesures` (`id`, `type`) VALUES
(1, 'Mesures à prendre'),
(2, 'Mesures déjà prises');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
