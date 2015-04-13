-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 31 Mars 2015 à 01:55
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `h2_p2018_philippe_jeremy_devoir_sondage`
--

-- --------------------------------------------------------

--
-- Structure de la table `sondages`
--

CREATE TABLE IF NOT EXISTS `sondages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `question` varchar(250) NOT NULL,
  `value1` varchar(10) NOT NULL,
  `vote1` int(11) NOT NULL,
  `value2` varchar(10) NOT NULL,
  `vote2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `sondages`
--

INSERT INTO `sondages` (`id`, `login`, `question`, `value1`, `vote1`, `value2`, `vote2`) VALUES
(1, '', 'Savez-vous planter les choux ?', 'yes', 4, 'no', 3),
(2, 'Utopiad', 'Est-ce que votre blanquette est bonne ?', 'yes', 1, 'no', 0),
(10, 'Utopiad', 'Pour ou contre le corps humain ?', 'yes', 19, 'no', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `mail`, `password`) VALUES
(0, 'Utopiad', 'utopiad.jp@gmail.com', '7bf79ad43c56819f5cc05a334a97e075d30ad36f8f44350efcf3f7be5544a6e1'),
(4, 'Utopiad', 'utopiad.jp@gmail.com', '7bf79ad43c56819f5cc05a334a97e075d30ad36f8f44350efcf3f7be5544a6e1'),
(5, 'Charrette', 'utopiad.jp@gmail.com', '23434794bfd57d738dc1122f3b8ae4b1b1efe7a1809ed432f5c189e0ef041f8b'),
(6, 'Charrette', 'utopiad.jp@gmail.com', '23434794bfd57d738dc1122f3b8ae4b1b1efe7a1809ed432f5c189e0ef041f8b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
