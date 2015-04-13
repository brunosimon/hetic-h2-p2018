-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Lun 30 Mars 2015 à 22:13
-- Version du serveur :  5.5.41-log
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sondage_foot`
--

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

CREATE TABLE IF NOT EXISTS `joueurs` (
`id` int(11) NOT NULL,
  `joueur` varchar(50) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `joueurs`
--

INSERT INTO `joueurs` (`id`, `joueur`, `votes`) VALUES
(1, 'Zlatan Ibrahimovic', 8),
(2, 'Arjen Robben', 5),
(3, 'Marco Reus', 6),
(4, 'Cristiano Ronaldo', 18),
(5, 'Neymar Jr', 6),
(6, 'Gareth Bale', 2),
(7, 'Eden Hazard', 4),
(8, 'Lionel Messi', 15);

-- --------------------------------------------------------

--
-- Structure de la table `liga`
--

CREATE TABLE IF NOT EXISTS `liga` (
`id` int(11) NOT NULL,
  `club` varchar(50) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `liga`
--

INSERT INTO `liga` (`id`, `club`, `votes`) VALUES
(1, 'ATLETICO MADRID', 3),
(2, 'FC BARCELONE', 15),
(3, 'FC VALENCE', 4),
(4, 'REAL MADRID', 10),
(5, 'FC SEVILLE', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ligue1`
--

CREATE TABLE IF NOT EXISTS `ligue1` (
`id` int(11) NOT NULL,
  `club` varchar(50) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `ligue1`
--

INSERT INTO `ligue1` (`id`, `club`, `votes`) VALUES
(1, 'OL', 14),
(2, 'OM', 9),
(3, 'ASSE', 5),
(4, 'AS MONACO', 13),
(5, 'PSG', 19);

-- --------------------------------------------------------

--
-- Structure de la table `liguedeschampions`
--

CREATE TABLE IF NOT EXISTS `liguedeschampions` (
`id` int(11) NOT NULL,
  `club` varchar(50) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `liguedeschampions`
--

INSERT INTO `liguedeschampions` (`id`, `club`, `votes`) VALUES
(1, 'PSG', 13),
(2, 'FC BARCELONE', 12),
(3, 'REAL MADRID', 11),
(4, 'FC BAYERN MUNICH', 15),
(5, 'JUVENTUS TURIN', 7),
(6, 'AS MONACO', 3),
(7, 'ATLETICO MADRID', 5),
(8, 'FC PORTO', 2);

-- --------------------------------------------------------

--
-- Structure de la table `premierleague`
--

CREATE TABLE IF NOT EXISTS `premierleague` (
`id` int(11) NOT NULL,
  `club` varchar(50) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `premierleague`
--

INSERT INTO `premierleague` (`id`, `club`, `votes`) VALUES
(1, 'ARSENAL', 3),
(2, 'CHELSEA', 15),
(3, 'MANCHESTER UNITED', 2),
(4, 'MANCHESTER CITY', 9),
(5, 'LIVERPOOL FC', 1);

-- --------------------------------------------------------

--
-- Structure de la table `seriea`
--

CREATE TABLE IF NOT EXISTS `seriea` (
`id` int(11) NOT NULL,
  `club` varchar(50) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `seriea`
--

INSERT INTO `seriea` (`id`, `club`, `votes`) VALUES
(1, 'AS ROMA', 3),
(2, 'NAPLES', 2),
(3, 'SAMPDORIA GENES', 2),
(4, 'LAZIO ROME', 2),
(5, 'JUVENTUS TURIN', 16);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `joueurs`
--
ALTER TABLE `joueurs`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `liga`
--
ALTER TABLE `liga`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ligue1`
--
ALTER TABLE `ligue1`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `liguedeschampions`
--
ALTER TABLE `liguedeschampions`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `premierleague`
--
ALTER TABLE `premierleague`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `seriea`
--
ALTER TABLE `seriea`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `joueurs`
--
ALTER TABLE `joueurs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `liga`
--
ALTER TABLE `liga`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `ligue1`
--
ALTER TABLE `ligue1`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `liguedeschampions`
--
ALTER TABLE `liguedeschampions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `premierleague`
--
ALTER TABLE `premierleague`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `seriea`
--
ALTER TABLE `seriea`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
