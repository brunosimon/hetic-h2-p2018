-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 30 Mars 2015 à 23:47
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `disney_questions`
--

-- --------------------------------------------------------

--
-- Structure de la table `disney`
--

CREATE TABLE `disney` (
`id` int(11) NOT NULL,
  `questions` int(11) NOT NULL,
  `reponses` varchar(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `disney`
--

INSERT INTO `disney` (`id`, `questions`, `reponses`, `votes`, `img`) VALUES
(1, 1, 'Mickey', 18, 'img/Mickey.jpg'),
(2, 1, 'Minnie', 12, 'img/Minnie.jpg'),
(3, 2, 'Daisy', 13, 'img/Daisy.jpg'),
(4, 2, 'Donald', 9, 'img/Donald.jpg'),
(5, 3, 'Bourriquet', 8, 'img/Bourriquet.jpg'),
(6, 3, 'Pluto', 14, 'img/Pluto.jpg'),
(7, 4, 'Winnie', 16, 'img/Winnie.jpg'),
(8, 4, 'Tigrou', 17, 'img/Tigrou.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `disney`
--
ALTER TABLE `disney`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `disney`
--
ALTER TABLE `disney`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;