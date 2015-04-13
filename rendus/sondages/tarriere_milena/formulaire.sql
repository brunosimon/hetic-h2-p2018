-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 30 Mars 2015 à 22:42
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `formulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imdb_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `shows`
--

INSERT INTO `shows` (`id`, `imdb_id`) VALUES
(1, 'tt0944947'),
(2, 'tt0903747'),
(3, 'tt0898266'),
(4, 'tt1520211'),
(5, 'tt0773262'),
(6, 'tt0460649'),
(7, 'tt1475582'),
(8, 'tt2193021'),
(9, 'tt1796960'),
(10, 'tt1119644'),
(11, 'tt0411008'),
(12, 'tt0412142'),
(13, 'tt1632701'),
(14, 'tt1442437'),
(15, 'tt0460681'),
(16, 'tt0436992'),
(17, 'tt0844441'),
(18, 'tt1856010'),
(19, 'tt1439629'),
(20, 'tt0096697'),
(21, 'tt1844624'),
(22, 'tt1839578'),
(23, 'tt1843230'),
(24, 'tt1826940'),
(25, 'tt0182576'),
(26, 'tt2364582'),
(27, 'tt2356777'),
(28, 'tt2372162'),
(29, 'tt0149460'),
(30, 'tt0121955'),
(31, 'tt0934814'),
(32, 'tt1405406'),
(33, 'tt1124373'),
(34, 'tt0455275'),
(35, 'tt1219024'),
(36, 'tt1553656'),
(37, 'tt0904208'),
(38, 'tt1196946'),
(39, 'tt2243973'),
(40, 'tt2191671');

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `show_id` int(11) NOT NULL,
  `vote` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `votes`
--

INSERT INTO `votes` (`id`, `show_id`, `vote`) VALUES
(1, 1, 8),
(2, 2, 15),
(3, 3, 4),
(4, 4, 5),
(5, 5, 4),
(6, 6, 2),
(7, 7, 6),
(8, 8, 2),
(9, 9, 28),
(10, 10, 2),
(11, 11, 2),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 2),
(16, 16, 1),
(17, 17, 0),
(18, 18, 0),
(19, 19, 0),
(20, 20, 0),
(21, 21, 1),
(22, 22, 0),
(23, 23, 0),
(24, 24, 0),
(25, 25, 0),
(26, 26, 0),
(27, 27, 0),
(28, 28, 0),
(29, 29, 0),
(30, 30, 0),
(31, 31, 1),
(32, 32, 1),
(33, 33, 1),
(34, 34, 1),
(35, 35, 1),
(36, 36, 3),
(37, 37, 1),
(38, 38, 1),
(39, 39, 3),
(40, 40, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
