-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 30 Mars 2015 à 23:41
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `exercice_sondage`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `cour` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` int(5) NOT NULL,
  `Resumer` longtext NOT NULL,
  `nombre_vote` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`cour`, `date`, `id`, `note`, `Resumer`, `nombre_vote`) VALUES
('Anglais', '1994-07-20', 6, 0, 'toto', 12),
('e-marketing', '2015-03-24', 12, 5, 'Td sur chez plus quoi', 15),
('Sormain', '2015-03-24', 13, 8, 'Cours sur la drague', 14),
('', '0000-00-00', 14, 0, '', 0),
('Anglais', '1994-05-20', 15, 0, 'voila le deuxieme cours d''anglais', 0),
('toto', '2014-01-20', 16, 0, 'pogjqergllgdmjospog', 0),
('fzqefsegf<sgsge<s', '2015-01-20', 17, 0, 'regeqrgqergqezg', 0),
('Dev', '2015-06-28', 18, 17, 'on a vu de la merde', 37),
('marketing', '2015-03-29', 19, 2, 'j''ai vue des choses', 8);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
