-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 31 Mars 2015 à 14:35
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `devoirphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `vote1` tinyint(1) NOT NULL,
  `votem` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `mail`, `password`, `vote1`, `votem`) VALUES
(1, '', 'lkjhqsf@ksdf.kjh', 'lkjqhsdf', 0, 0),
(2, 'ekjfh', 'lzefjn@flzjn.fz', 'sdlfjn', 0, 0),
(3, 'Paul', 'paul@paul.fr', 'fdjsklfdjskl', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

CREATE TABLE `votes` (
`id` int(11) NOT NULL,
  `vote` tinyint(1) NOT NULL COMMENT '0 moto 1 scooter',
  `ip` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `votes`
--

INSERT INTO `votes` (`id`, `vote`, `ip`) VALUES
(1, 1, '::1'),
(2, 1, '::1'),
(3, 1, '::1'),
(4, 1, '::1'),
(5, 1, '::1'),
(6, 1, '::1'),
(7, 1, '::1'),
(8, 1, '::1'),
(9, 1, '::1'),
(10, 1, '::1'),
(11, 1, '::1'),
(12, 0, '::1'),
(13, 0, '::1'),
(14, 0, '::1'),
(15, 0, '::1'),
(16, 0, '::1'),
(17, 0, '::1'),
(18, 0, '::1'),
(19, 0, '::1'),
(20, 1, '::1'),
(21, 1, '::1'),
(22, 1, '::1'),
(23, 1, '::1'),
(24, 1, '::1'),
(25, 1, '::1'),
(26, 1, '::1');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `votes`
--
ALTER TABLE `votes`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `votes`
--
ALTER TABLE `votes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;