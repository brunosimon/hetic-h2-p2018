-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 31 Mars 2015 à 19:05
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `anecdote`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
`id` int(11) NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `contenu` longtext CHARACTER SET utf8,
  `date` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `like_count` int(11) DEFAULT '0',
  `dislike_count` int(11) DEFAULT '0',
  `vote_count` int(11) DEFAULT '0',
  `score` float DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `date`, `category_id`, `like_count`, `dislike_count`, `vote_count`, `score`) VALUES
(9, '[client] ', '— Je vois que votre site a des urls se terminant en .php, ça veut dire que vous l’avez développé aux Philippines ?', '0000-00-00 00:00:00', 2, 0, 1, 0, 0),
(11, '[client vs agence]', '— De quel droit avez-vous mis le nom de votre agence dans notre URL ?\r\n— C’est la préprod…', '0000-00-00 00:00:00', 2, 4, 1, 0, 0),
(12, '[client]', '— Je souhaiterais envoyer un emailing à tous les gens qui ont Internet.', '0000-00-00 00:00:00', 2, 3, 2, 0, 0),
(13, '[client]', '— Je veux que mon site soit ouvert de 8h à 12h et de 14h à 18h.', '0000-00-00 00:00:00', 2, 3, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

CREATE TABLE `votes` (
`id` int(11) NOT NULL,
  `ref_id` int(11) DEFAULT '0',
  `ref` varchar(50) CHARACTER SET utf8 DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `vote` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`), ADD KEY `categogy_id` (`category_id`);

--
-- Index pour la table `votes`
--
ALTER TABLE `votes`
 ADD PRIMARY KEY (`id`), ADD KEY `ref_id` (`ref_id`), ADD KEY `ref` (`ref`), ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `votes`
--
ALTER TABLE `votes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;