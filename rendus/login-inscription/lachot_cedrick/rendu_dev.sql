-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Dim 08 Mars 2015 à 20:54
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `rendu_dev`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

CREATE TABLE `accounts` (
`id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Age` int(120) NOT NULL,
  `token` int(11) NOT NULL,
  `activer` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `accounts`
--

INSERT INTO `accounts` (`id`, `mail`, `pseudo`, `password`, `Age`, `token`, `activer`) VALUES
(1, 'cedrick@gmail.com', 'cedrickL', '7f8a71bb5042cff8e1fdecb61212745054f43b79daeefc2bbe494e01f402990d', 0, 0, 0),
(15, 'test@gmail.com', 'test', '721a02b4ba50797dfc6034fb1e9c7cf57dec1b540bf576b26a47130803dbdd05', 15, 0, 0),
(16, 'ce@lolo.com', 'salut12', '3182646457f3ec50cd497a0f98f30eec094dd7571b39bb76126de9ba3b760259', 17, 0, 0),
(17, 'salut@gmail.com', 'test1', 'c8077e7c10c9543e831d4ed5ff97c245e63bf3f1309ffbe356acb747506b4fa9', 18, 0, 0),
(22, 'azerty12@gmail.com', 'azerty12', '671aa7bdcaede7d050c207db0259027b2572380eea64ae9d075641a0806bb6f2', 24, 4, 0),
(23, 'azerty1@gmail.com', 'azerty1', 'd90631e3c1c93704efff532a94dd82366bcbe183477a632d238b1b228f645a60', 24, 87, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `accounts`
--
ALTER TABLE `accounts`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `accounts`
--
ALTER TABLE `accounts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
