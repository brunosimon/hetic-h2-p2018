-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 05 Mars 2015 à 19:32
-- Version du serveur :  5.5.42-1
-- Version de PHP :  5.6.5-2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `hetic_lr`
--

-- --------------------------------------------------------

--
-- Structure de la table `auth_log`
--

CREATE TABLE IF NOT EXISTS `auth_log` (
  `id_auth_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `reverse` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `login_by` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `auth_token`
--

CREATE TABLE IF NOT EXISTS `auth_token` (
  `id_auth_token` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `last_used_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `request_password`
--

CREATE TABLE IF NOT EXISTS `request_password` (
  `id_request_password` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `code` varchar(45) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sent_mail`
--

CREATE TABLE IF NOT EXISTS `sent_mail` (
  `id_sent_mail` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sent_date` datetime NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT '0',
  `open_date` datetime DEFAULT NULL,
  `clicked` tinyint(1) NOT NULL DEFAULT '0',
  `click_date` datetime DEFAULT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `pseudo` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(45) NOT NULL,
  `pwd` varchar(45) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `wrong_password` int(11) NOT NULL DEFAULT '0',
  `blocked` tinyint(1) NOT NULL DEFAULT '0',
  `superuser` tinyint(1) NOT NULL DEFAULT '0',
  `creation` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `auth_log`
--
ALTER TABLE `auth_log`
  ADD PRIMARY KEY (`id_auth_log`), ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `auth_token`
--
ALTER TABLE `auth_token`
  ADD PRIMARY KEY (`id_auth_token`), ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `request_password`
--
ALTER TABLE `request_password`
  ADD PRIMARY KEY (`id_request_password`), ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `sent_mail`
--
ALTER TABLE `sent_mail`
  ADD PRIMARY KEY (`id_sent_mail`), ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `auth_log`
--
ALTER TABLE `auth_log`
  MODIFY `id_auth_log` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `auth_token`
--
ALTER TABLE `auth_token`
  MODIFY `id_auth_token` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `request_password`
--
ALTER TABLE `request_password`
  MODIFY `id_request_password` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `sent_mail`
--
ALTER TABLE `sent_mail`
  MODIFY `id_sent_mail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `auth_log`
--
ALTER TABLE `auth_log`
ADD CONSTRAINT `auth_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `auth_token`
--
ALTER TABLE `auth_token`
ADD CONSTRAINT `auth_token_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `request_password`
--
ALTER TABLE `request_password`
ADD CONSTRAINT `request_password_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sent_mail`
--
ALTER TABLE `sent_mail`
ADD CONSTRAINT `sent_mail_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
