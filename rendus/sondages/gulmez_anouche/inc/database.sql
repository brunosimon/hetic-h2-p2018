-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Dim 29 Mars 2015 à 14:40
-- Version du serveur :  5.5.38
-- Version de PHP :  5.5.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Structure de la table `results`
--

CREATE TABLE `results` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `triangle` int(11) NOT NULL,
  `diamond` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  `square` int(11) NOT NULL,
  `perso` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `range` varchar(5) NOT NULL,
  `date_signin` datetime NOT NULL,
  `last_signup` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `range`, `date_signin`, `last_signup`) VALUES
(1, 'admin', 'admin@gmail.com', '4bbb3e7df02f0c9f95cabba22e18d2036b2c0521d36a268cb7de5ca5f4270b99', 'admin', '2015-03-29 14:39:34', '2015-03-29 14:39:41');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `results`
--
ALTER TABLE `results`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `results`
--
ALTER TABLE `results`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;