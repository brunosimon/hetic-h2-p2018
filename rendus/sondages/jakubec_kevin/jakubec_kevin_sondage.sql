-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 30 Mars 2015 à 23:11
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `jakubec_kevin_sondage`
--

-- --------------------------------------------------------

--
-- Structure de la table `enonces_questions`
--

CREATE TABLE IF NOT EXISTS `enonces_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enonce` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `enonces_questions`
--

INSERT INTO `enonces_questions` (`id`, `enonce`) VALUES
(1, 'Fera-t-il beau demain ?'),
(2, 'Avoue... tu préfères les chats à la meteo ? ');

-- --------------------------------------------------------

--
-- Structure de la table `question1`
--

CREATE TABLE IF NOT EXISTS `question1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propositions` varchar(30) NOT NULL,
  `votes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `question1`
--

INSERT INTO `question1` (`id`, `propositions`, `votes`) VALUES
(1, 'Oui tres !', 14),
(2, 'C''est quoi le soleil ? ', 5),
(3, 'Bof', 5),
(4, 'LOL', 3),
(5, 'Il va pleuvoir ....', 6),
(6, 'Non', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
