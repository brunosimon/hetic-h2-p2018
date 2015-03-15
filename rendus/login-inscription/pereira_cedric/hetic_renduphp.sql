-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Dim 08 Mars 2015 à 20:19
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `hetic_renduphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
`id_users` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `confirmationcode` varchar(255) NOT NULL,
  `is_valid` tinyint(1) NOT NULL DEFAULT '0',
  `wrong_pwd` tinyint(1) NOT NULL DEFAULT '0',
  `birthdate` date DEFAULT NULL,
  `postalcode` int(5) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `gender` set('homme','femme') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_users`, `firstname`, `lastname`, `email`, `pwd`, `confirmationcode`, `is_valid`, `wrong_pwd`, `birthdate`, `postalcode`, `country`, `gender`) VALUES
(19, 'CÃ©dric', 'Pereira', 'cedric.pereira@hetic.net', 'e956d77cb76ab71d0ecdbdd1967d20249da02f8e46c56309ca88100f3e8b834aecbbd288b5877b7fff2ea4a23ea47cc8d53ec254985bce1ff275146de027fb39', 'ce66d1c5f012b825420569a002a0c07483591fe5', 1, 0, '1995-12-29', 93100, 'Montreuil', 'homme'),
(20, 'Samuel', 'Pereira', 'plugins@hotmail.fr', '532722ec8536efd30f141fac246232e480b34b4a29c7c5a3958a87e131f4e67790dd080ebfe2ea25d46a16df974a1e1da5bbb062224d781f4408d9476b3fcaa6', '87ff16758a81d72ba87f0c0562bb2c8eea2d2299', 1, 0, '1995-12-29', 0, '', 'homme');

-- --------------------------------------------------------

--
-- Structure de la table `users_lostpwd`
--

CREATE TABLE `users_lostpwd` (
`id_users_lostpwd` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users_tokens`
--

CREATE TABLE `users_tokens` (
`id_users_tokens` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id_users`);

--
-- Index pour la table `users_lostpwd`
--
ALTER TABLE `users_lostpwd`
 ADD PRIMARY KEY (`id_users_lostpwd`);

--
-- Index pour la table `users_tokens`
--
ALTER TABLE `users_tokens`
 ADD PRIMARY KEY (`id_users_tokens`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `users_lostpwd`
--
ALTER TABLE `users_lostpwd`
MODIFY `id_users_lostpwd` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `users_tokens`
--
ALTER TABLE `users_tokens`
MODIFY `id_users_tokens` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
