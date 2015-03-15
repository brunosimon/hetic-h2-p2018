-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 08 Mars 2015 à 22:38
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `work`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mail`, `password`) VALUES
(2, 'Youyou', 'youyou@gmail.com', 'f261d4998bf50ce6bfa1478f83d61bfc0a385056a8765500dd9829e47df2fe77'),
(10, 'blabla', 'tres@truc.com', 'bdcd4ca25e05b1cc5caed4b821abba7972ae4b0552a99b80e34e4cdb3ea734a2'),
(12, 'dqfssqf', 'tris@truc.com', 'd9b21da418d70b17460e05973a29544cd8fa4457aba90f01f03398d58ccdabe7'),
(13, 'MMM', 'mmm@mmm.fr', 'e187cd114583823c24610f5784ac83853308f302ad2eb7f9704d767af8e6ec0c'),
(20, 'blop', 'blop@toutou.fr', 'aaf68a56eadad4b071207d8db408e0faa103db4c7beb469f42fa8b40eeaf143a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
