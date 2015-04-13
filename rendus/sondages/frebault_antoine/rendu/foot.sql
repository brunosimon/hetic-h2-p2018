-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 31 Mars 2015 à 02:46
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `foot`
--

-- --------------------------------------------------------

--
-- Structure de la table `compteur`
--

CREATE TABLE `compteur` (
`id` int(11) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `gardien` int(11) NOT NULL,
  `defenseur` int(11) NOT NULL,
  `milieu` int(11) NOT NULL,
  `attaque` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `compteur`
--

INSERT INTO `compteur` (`id`, `mail`, `gardien`, `defenseur`, `milieu`, `attaque`) VALUES
(1, 'antoinefrebault@gmail.com', 1, 6, 16, 26),
(2, 'frebault@gmail.com', 1, 6, 16, 26),
(3, 'frebault.a@gmail.com', 2, 7, 17, 27),
(4, 'test@gmail.com', 5, 6, 16, 29);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
`id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `poste` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`id`, `nom`, `prenom`, `poste`) VALUES
(1, 'Neuer', 'Manuel', 'Gardien'),
(2, 'Courtois', 'Thibault', 'Gardien'),
(3, 'Buffon', 'Gianludgi', 'Gardien'),
(4, 'Hart', 'Joe', 'Gardien'),
(5, 'Lloris', 'Hugo', 'Gardien'),
(6, 'Silva', 'Thiago', 'Defenseur'),
(7, 'Ramos', 'Sergio', 'Defenseur'),
(8, 'Hummels', 'Matt', 'Defenseur'),
(9, 'Kompany', 'Vincent', 'Defenseur'),
(10, 'Varanne', 'Raphael', 'Defenseur'),
(11, 'Pique', 'Gerrard', 'Defenseur'),
(12, 'Luiz', 'David', 'Defenseur'),
(13, 'Boateng', 'Jerome', 'Defenseur'),
(14, 'Dante', 'Leo', 'Defenseur'),
(15, 'Vidic', 'Neman', 'Defenseur'),
(16, 'Verratti', 'Marco', 'Milieu'),
(17, 'Pogba', 'Paul', 'Milieu'),
(18, 'Fabregas', 'Cech', 'Milieu'),
(19, 'Inesta', 'Andres', 'Milieu'),
(20, 'Macherano', 'Javier', 'Milieu'),
(21, 'Pastore', 'Javier', 'Milieu'),
(22, 'Ozil', 'Mezut', 'Milieu'),
(23, 'Gotze', 'Mario', 'Milieu'),
(24, 'Motta', 'Thiago', 'Milieu'),
(25, 'Xavi', 'Hernandez', 'Milieu'),
(26, 'Messi', 'Lionel', 'Attaquant'),
(27, 'Ronaldo', 'Cristiano', 'Attaquant'),
(28, 'Hazard', 'Eden', 'Attaquant'),
(29, 'Ibrahimovic', 'Zlatan', 'Attaquant'),
(30, 'Mandzukic', 'Mario', 'Attaquant'),
(31, 'Robben', 'Arien', 'Attaquant'),
(32, 'Ribery', 'Franck', 'Attaquant'),
(33, 'Cavani', 'Edinson', 'Attaquant'),
(34, 'Suarez', 'Luis', 'Attaquant'),
(35, 'Aguero', 'Kun', 'Attaquant');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `compteur`
--
ALTER TABLE `compteur`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `compteur`
--
ALTER TABLE `compteur`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
