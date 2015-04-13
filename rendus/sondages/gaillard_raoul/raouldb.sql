-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 31 Mars 2015 à 02:11
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `raoulphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidates`
--

CREATE TABLE `candidates` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` text NOT NULL,
  `commentaire` longtext NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `url`, `commentaire`, `votes`) VALUES
(23, 'Pilule paillette', 'http://media.topito.com/wp-content/uploads/2015/01/glitter.jpg', 'Ral le bol de faire caca du caca ?\r\nVous pouvez maintenant faire caca des paillettes', 10),
(24, 'Le string latÃ©ral', 'http://media.topito.com/wp-content/uploads/2013/03/string-lat%C3%A9ral-600x356.jpg', 'Le string latÃ©ral de sÃ©curitÃ©', 4),
(25, 'Le slip sans odeur', 'http://media.firebox.com/pic/p6437_column_grid_8.jpg', 'PÃªte un coup Ã§a sentiras pas ', 0),
(26, 'Le faux mulet', 'http://media.topito.com/wp-content/uploads/2013/04/bandeau-mulet-600x356.jpg', 'Le bon vieux mulet ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
`id` int(4) NOT NULL,
  `ip` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `date` date NOT NULL,
  `id_candidates` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `candidates`
--
ALTER TABLE `candidates`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `candidates`
--
ALTER TABLE `candidates`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;