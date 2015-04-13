-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Lun 30 Mars 2015 à 23:17
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sql-sondage`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidates`
--

CREATE TABLE `candidates` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `votes` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `votes`, `image`) VALUES
(1, 'The Grand Budapest Hotel', 50, 'budapest'),
(2, 'Ennemy', 20, 'enemy'),
(3, 'Dallas buyers club', 3, 'dallas'),
(4, 'Interstellar', 17, 'interstellar'),
(5, 'Inception', 157, 'inception'),
(6, 'La traversee de Paris', 6, 'paris');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `candidates`
--
ALTER TABLE `candidates`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `candidates`
--
ALTER TABLE `candidates`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
