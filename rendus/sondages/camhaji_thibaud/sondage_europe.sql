-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 31 Mars 2015 à 00:33
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sondage_europe`
--

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(50) NOT NULL,
  `label` varchar(50) DEFAULT NULL,
  `habiter_oui` int(11) NOT NULL,
  `habiter_non` int(11) NOT NULL,
  `travailler_oui` int(11) NOT NULL,
  `travailler_non` int(11) NOT NULL,
  `vacances_oui` int(11) NOT NULL,
  `vacances_non` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id`, `slug`, `label`, `habiter_oui`, `habiter_non`, `travailler_oui`, `travailler_non`, `vacances_oui`, `vacances_non`) VALUES
(1, 'Albanie', 'Albanie', 0, 0, 0, 0, 0, 0),
(2, 'Andorre', 'Andorre', 0, 0, 0, 0, 0, 0),
(3, 'Autriche', 'Autriche', 0, 0, 0, 0, 0, 0),
(4, 'Biélorussie', 'Biélorussie', 1, 0, 0, 0, 0, 0),
(5, 'Belgique', 'Belgique', 0, 0, 0, 0, 0, 0),
(6, 'Bosnie-Herzégovine', 'Bosnie Herzégovine', 0, 0, 0, 0, 0, 0),
(7, 'Bulgarie', 'Bulgarie', 0, 0, 0, 0, 0, 0),
(8, 'Croatie', 'Croatie', 0, 0, 0, 0, 0, 0),
(9, 'Chypre', 'Chypre', 0, 0, 0, 0, 0, 0),
(10, 'Republique-Tchèque', 'Republique Tchèque', 12, 3, 0, 0, 0, 3),
(11, 'Danemark', 'Danemark', 0, 0, 0, 0, 0, 0),
(12, 'Estonie', 'Estonie', 0, 0, 0, 0, 0, 0),
(13, 'France', 'France', 1, 0, 1, 0, 1, 0),
(14, 'Finlande', 'Finlande', 1, 0, 0, 1, 0, 1),
(15, 'Géorgie', 'Géorgie', 0, 0, 0, 0, 0, 0),
(16, 'Allemagne', 'Allemagne', 5, 0, 0, 0, 0, 0),
(17, 'Grèce', 'Grèce', 0, 0, 0, 0, 0, 0),
(18, 'Hongrie', 'Hongrie', 0, 0, 0, 0, 0, 0),
(19, 'Islande', 'Islande', 0, 0, 0, 0, 0, 0),
(20, 'Irlande', 'Irlande', 0, 0, 0, 0, 0, 0),
(21, 'Saint-Marin', 'Saint Marin', 0, 0, 0, 0, 0, 0),
(22, 'Italie', 'Italie', 0, 0, 0, 0, 0, 0),
(23, 'Kosovo', 'Kosovo', 0, 0, 0, 0, 0, 0),
(24, 'Lettonie', 'Lettonie', 0, 0, 0, 0, 0, 0),
(25, 'Liechtenstein', 'Liechtenstein', 0, 0, 0, 0, 0, 0),
(26, 'Lituanie', 'Lituanie', 0, 0, 0, 0, 0, 0),
(27, 'Luxembourg', 'Luxembourg', 0, 0, 0, 0, 0, 0),
(28, 'Macédoine', 'Macédoine', 0, 0, 0, 0, 0, 0),
(29, 'Malte', 'Malte', 0, 0, 0, 0, 0, 0),
(30, 'Moldavie', 'Moldavie', 0, 0, 0, 0, 0, 0),
(31, 'Monaco', 'Monaco', 0, 0, 0, 0, 0, 0),
(32, 'Montenegro', 'Montenegro', 0, 0, 0, 0, 0, 0),
(33, 'Pays-Bas', 'Pays Bas', 0, 0, 0, 0, 0, 0),
(34, 'Norvège', 'Norvège', 0, 0, 0, 0, 0, 0),
(35, 'Pologne', 'Pologne', 0, 0, 0, 0, 0, 0),
(36, 'Portugal', 'Portugal', 0, 0, 0, 0, 0, 0),
(37, 'Roumanie', 'Roumanie', 0, 0, 0, 0, 0, 0),
(38, 'Fédération-de-Russie', 'Fédération de Russie', 12, 7, 11, 3, 5, 5),
(39, 'Serbie', 'Serbie', 0, 0, 0, 0, 0, 0),
(40, 'Slovaquie', 'Slovaquie', 0, 0, 0, 0, 0, 0),
(41, 'Slovénie', 'Slovénie', 0, 0, 0, 0, 0, 0),
(42, 'Espagne', 'Espagne', 0, 0, 0, 0, 0, 0),
(43, 'Suède', 'Suède', 3, 0, 0, 0, 0, 0),
(44, 'Suisse', 'Suisse', 0, 0, 0, 0, 0, 0),
(45, 'Turquie', 'Turquie', 0, 0, 0, 0, 0, 0),
(46, 'Ukraine', 'Ukraine', 0, 0, 0, 0, 0, 0),
(47, 'Royaume-Uni', 'Royaume Uni', 0, 0, 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
