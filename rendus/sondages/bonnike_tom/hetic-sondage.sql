-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 31 Mars 2015 à 00:35
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `hetic-sondage`
--

-- --------------------------------------------------------

--
-- Structure de la table `sondages`
--

CREATE TABLE IF NOT EXISTS `sondages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `question` text NOT NULL,
  `answers` text NOT NULL,
  `multiple` tinyint(1) NOT NULL,
  `private` tinyint(1) NOT NULL,
  `ip_protected` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Contenu de la table `sondages`
--

INSERT INTO `sondages` (`id`, `url`, `created`, `question`, `answers`, `multiple`, `private`, `ip_protected`) VALUES
(59, '215565519cdcf8ab25', '2015-03-30 22:27:27', 'Test sondage 1', '["R\\u00e9ponse 1","R\\u00e9ponse 2"]', 0, 0, 1),
(60, '166675519cde4a8bc9', '2015-03-30 22:27:48', 'Test sondage 2 (privÃ©)', '["R\\u00e9ponse 1","R\\u00e9ponse 2"]', 0, 1, 1),
(61, '100745519cdf9c5b5e', '2015-03-30 22:28:09', 'Test sondage 3 (choix multiple)', '["R\\u00e9ponse 1","R\\u00e9ponse 2","R\\u00e9ponse 3"]', 1, 0, 1),
(62, '145375519ce111133c', '2015-03-30 22:28:33', 'Test sondage 4', '["R\\u00e9ponse 1","R\\u00e9ponse 2","R\\u00e9ponse 3","R\\u00e9ponse 4","R\\u00e9ponse 5"]', 0, 0, 1),
(63, '219495519ce2072ff5', '2015-03-30 22:28:48', 'Test sondage 5', '["R\\u00e9ponse 1","R\\u00e9ponse 2"]', 1, 0, 1),
(64, '62775519ce37037da', '2015-03-30 22:29:11', 'Test sondage 6', '["R\\u00e9ponse 1","R\\u00e9ponse 2","R\\u00e9ponse 3"]', 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voters_ip` text NOT NULL,
  `votes` text NOT NULL,
  `sondage_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `votes`
--

INSERT INTO `votes` (`id`, `voters_ip`, `votes`, `sondage_id`) VALUES
(20, '[]', '[["R\\u00e9ponse 1",2],["R\\u00e9ponse 2",0]]', 59),
(21, '[]', '[["R\\u00e9ponse 1",0],["R\\u00e9ponse 2",1]]', 60),
(22, '[]', '[["R\\u00e9ponse 1",2],["R\\u00e9ponse 2",1],["R\\u00e9ponse 3",1]]', 61),
(23, '[]', '[["R\\u00e9ponse 1",0],["R\\u00e9ponse 2",0],["R\\u00e9ponse 3",0],["R\\u00e9ponse 4",0],["R\\u00e9ponse 5",1]]', 62),
(24, '[]', '[["R\\u00e9ponse 1",0],["R\\u00e9ponse 2",0]]', 63),
(25, '[]', '[["R\\u00e9ponse 1",0],["R\\u00e9ponse 2",0],["R\\u00e9ponse 3",1]]', 64);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
