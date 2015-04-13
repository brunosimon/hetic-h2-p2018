-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 05 Avril 2015 à 18:22
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bdd_quiz`
--

-- --------------------------------------------------------

--
-- Structure de la table `essai`
--

CREATE TABLE IF NOT EXISTS `essai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_question` int(11) NOT NULL,
  `name_question` varchar(255) NOT NULL,
  `num_answer` int(11) NOT NULL,
  `name_answer` varchar(255) NOT NULL,
  `correct` tinyint(1) NOT NULL,
  `vote` int(11) NOT NULL,
  `link_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_question` int(11) NOT NULL,
  `name_question` varchar(255) NOT NULL,
  `num_answer` int(11) NOT NULL,
  `name_answer` varchar(255) NOT NULL,
  `correct` tinyint(1) NOT NULL,
  `vote` int(11) NOT NULL,
  `link_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`id`, `num_question`, `name_question`, `num_answer`, `name_answer`, `correct`, `vote`, `link_img`) VALUES
(1, 1, 'Quel est le nombre de première année pour la P2019 lors de la rentrée ?', 1, '108', 1, 11, ''),
(2, 1, 'Quel est le nombre de première année pour la P2019 lors de la rentrée ?', 2, '110', 0, 6, ''),
(3, 1, 'Quel est le nombre de première année pour la P2019 lors de la rentrée ?', 3, '112', 0, 3, ''),
(4, 1, 'Quel est le nombre de première année pour la P2019 lors de la rentrée ?', 4, '114', 0, 2, ''),
(5, 2, 'Quelle est la phrase fétiche du Directeur d''HETIC ?', 1, 'Il n''y a rien de jouer, s''il reste à faire', 0, 3, ''),
(6, 2, 'Quelle est la phrase fétiche du Directeur d''HETIC ?', 2, 'Il n''y a rien de jouer, s''il reste encore à faire', 0, 2, ''),
(7, 2, 'Quelle est la phrase fétiche du Directeur d''HETIC ?', 3, 'Il n''y a rien de fait, s''il reste à faire', 0, 4, ''),
(8, 2, 'Quelle est la phrase fétiche du Directeur d''HETIC ?', 4, 'Il n''y a rien de fait, s''il reste encore à faire', 1, 12, ''),
(9, 3, 'Quel était le nombre d''élèves en 5ème année d''HETIC pour la P2014 lors de leur rentrée ?', 1, '89', 0, 5, ''),
(10, 3, 'Quel était le nombre d''élèves en 5ème année d''HETIC pour la P2014 lors de leur rentrée ?', 2, '92', 0, 3, ''),
(11, 3, 'Quel était le nombre d''élèves en 5ème année d''HETIC pour la P2014 lors de leur rentrée ?', 3, '98', 0, 3, ''),
(12, 3, 'Quel était le nombre d''élèves en 5ème année d''HETIC pour la P2014 lors de leur rentrée ?', 4, '100', 1, 9, ''),
(13, 4, 'Monsieur Beaux sait jouer du piano...', 1, 'OUI', 1, 15, ''),
(14, 4, 'Monsieur Beaux sait jouer du piano...', 2, 'NON', 0, 6, ''),
(15, 5, 'Quel a été l''universite dans laquelle M. Villa Monteiro a passé ses études ?', 1, 'Université de Paris VII Diderot', 0, 2, ''),
(16, 5, 'Quel a été l''université dans laquelle M. Villa Monteiro a passé ses études ?', 2, 'Université de Versailles Saint-Quentin-En-Yvelines', 1, 18, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
