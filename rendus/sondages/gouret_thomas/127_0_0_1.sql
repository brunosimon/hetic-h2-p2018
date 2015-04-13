-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Avril 2015 à 15:38
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `exo php avancée`
--

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `won` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `games`
--

INSERT INTO `games` (`id`, `id_user`, `score`, `won`) VALUES
(1, 3, 1384, 1),
(2, 5, 910, 0),
(3, 1, 6878, 1),
(4, 2, 570, 0),
(5, 4, 5941, 1),
(6, 3, 2785, 1),
(7, 2, 8742, 0),
(8, 1, 6722, 0),
(9, 4, 6689, 1),
(10, 2, 5587, 1),
(11, 1, 5221, 1),
(12, 2, 5060, 1),
(13, 2, 2174, 0),
(14, 3, 8390, 1),
(15, 4, 1568, 0),
(16, 4, 6688, 1),
(17, 3, 2401, 1),
(18, 5, 1741, 1),
(19, 3, 707, 0),
(20, 1, 1402, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`) VALUES
(1, 'toto'),
(2, 'tata'),
(3, 'tutu'),
(4, 'titi'),
(5, 'tete');
--
-- Base de données :  `exo sondage`
--

-- --------------------------------------------------------

--
-- Structure de la table `canditates`
--

CREATE TABLE IF NOT EXISTS `canditates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `vote` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `canditates`
--

INSERT INTO `canditates` (`id`, `name`, `vote`) VALUES
(1, 'James', 0),
(2, 'John', 0),
(3, 'Luke', 0);
--
-- Base de données :  `quizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `quizz_table`
--

CREATE TABLE IF NOT EXISTS `quizz_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `quizz_table`
--

INSERT INTO `quizz_table` (`id`, `question`, `votes`, `name`, `img`) VALUES
(1, 1, 21, 'Super-Girl', 'http://foodmartketing.blog-idrac.com/wp-content/uploads/sites/126/2013/12/superhero-cans-potw-61.jpg'),
(2, 1, 26, 'Superman', 'http://foodmartketing.blog-idrac.com/wp-content/uploads/sites/126/2013/12/superhero-cans-potw-31.jpg'),
(3, 2, 14, 'Spider-Man', 'http://foodmartketing.blog-idrac.com/wp-content/uploads/sites/126/2013/12/superhero-cans-potw-141.jpg'),
(4, 2, 24, 'Iron Man', 'http://foodmartketing.blog-idrac.com/wp-content/uploads/sites/126/2013/12/superhero-cans-potw-121.jpg'),
(5, 3, 10, 'Captain America', 'http://foodmartketing.blog-idrac.com/wp-content/uploads/sites/126/2013/12/superhero-cans-potw-81.jpg'),
(6, 3, 25, 'Batman', 'http://foodmartketing.blog-idrac.com/wp-content/uploads/sites/126/2013/12/superhero-cans-potw-71.jpg');
--
-- Base de données :  `test`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
