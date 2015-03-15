-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 09 Mars 2015 à 00:19
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `hetic_p2018_g1_login`
--

-- --------------------------------------------------------

--
-- Structure de la table `site_diablo`
--

CREATE TABLE IF NOT EXISTS `site_diablo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `valid` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `site_diablo`
--

INSERT INTO `site_diablo` (`id`, `pseudo`, `mail`, `password`, `age`, `birth`, `gender`, `class`, `valid`) VALUES
(4, 'blop', 'blop@ner.et', '3a56233c45ccae7463092262e716c22251f09436eb059b87c1f5fc571ea7b5d3', 21, '1993-01-13', 'male', 'wizard', 0),
(5, 'qsd', 'qsd@qsd.qsd', 'b12d31b74163748604ed11d1ac4acb4f8c132375b16bcec1cefcd013a8b43952', 21, '1955-01-13', 'male', 'doctor', 0),
(7, 'shimilibilou', 'shimilibilou@gmail.com', 'f0ccfc2168cb18001b885698ce9e36c5abc25ab03603d568b7ec9e97e7bdaab1', 24, '1990-11-21', 'female', 'hunter', 0),
(8, '456qsd', 'lulu@lulu.lulu', '8d8158216724d90df86cb0e0eb9fb4718b6e68d10506fb4c59db66e271c9141b', 22, '1993-01-13', 'male', 'monk', 0),
(9, 'Magali', 'luc@luc.luc', '635e1b02a4bb60c1c8ed4f7ef08802b181fb852873c17fb9f45b2d4ceea0354d', 33, '1955-02-13', 'other', 'barbarian', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
