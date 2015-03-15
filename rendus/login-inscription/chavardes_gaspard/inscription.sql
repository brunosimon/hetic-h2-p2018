-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Dim 08 Mars 2015 à 23:21
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `taff-password`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
`id` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `mdp2` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf32;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`id`, `pseudo`, `mail`, `mdp`, `mdp2`) VALUES
(123, 'a', 'gaspard@gmail.com', 'ca978112ca1bbdcafac231b39a23dc', 'ca978112ca1bbdcafac231b39a23dc'),
(124, 'a', 'gaspard@gmail.com', 'ca978112ca1bbdcafac231b39a23dc', 'ca978112ca1bbdcafac231b39a23dc'),
(125, 'a', 'gaspard@gmail.com', 'ca978112ca1bbdcafac231b39a23dc', 'ca978112ca1bbdcafac231b39a23dc'),
(126, 'a', 'gaspard@gmail.com', 'ca978112ca1bbdcafac231b39a23dc', 'ca978112ca1bbdcafac231b39a23dc'),
(127, 'a', 'gaspard@gmail.com', 'ca978112ca1bbdcafac231b39a23dc', 'ca978112ca1bbdcafac231b39a23dc'),
(128, 'a', 'gaspard@gmail.com', 'ca978112ca1bbdcafac231b39a23dc', 'ca978112ca1bbdcafac231b39a23dc'),
(129, 'a', 'gaspard@gmail.com', 'ca978112ca1bbdcafac231b39a23dc', 'ca978112ca1bbdcafac231b39a23dc'),
(130, 'a', 'gaspard@gmail.com', 'ca978112ca1bbdcafac231b39a23dc', 'ca978112ca1bbdcafac231b39a23dc'),
(131, 'a', 'gaspard@gmail.com', 'ca978112ca1bbdcafac231b39a23dc', 'ca978112ca1bbdcafac231b39a23dc'),
(132, 'a', 'gaspard@gmail.com', 'ca978112ca1bbdcafac231b39a23dc', 'ca978112ca1bbdcafac231b39a23dc'),
(133, 'a', 'gaspard@gmail.com', 'ca978112ca1bbdcafac231b39a23dc', 'ca978112ca1bbdcafac231b39a23dc'),
(134, 'a', 'gaspard@gmail.com', 'ca978112ca1bbdcafac231b39a23dc', 'ca978112ca1bbdcafac231b39a23dc'),
(135, 'a', 'gaspard@gmail.com', 'ca978112ca1bbdcafac231b39a23dc', 'ca978112ca1bbdcafac231b39a23dc');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=136;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
