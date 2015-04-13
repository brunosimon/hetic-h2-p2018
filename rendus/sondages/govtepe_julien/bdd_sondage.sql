-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Dim 29 Mars 2015 à 20:39
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `govmole`
--

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
`id` int(11) NOT NULL,
  `question` text NOT NULL,
  `reponse_developpeur` text NOT NULL,
  `reponse_designer` text NOT NULL,
  `reponse_marketeur` text NOT NULL,
  `reponse_branleur` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `question`, `reponse_developpeur`, `reponse_designer`, `reponse_marketeur`, `reponse_branleur`) VALUES
(1, 'Dans la vie de tous les jours, ton style vestimentaire c’est plutôt :', 'Style quoi ? ', 'Branché, ta garde-robe évolue en fonction des tendances du moment', 'Strict, jamais sans ton costard', 'T’es plutôt un hipster'),
(2, 'Un objet vous plaît car :', 'Il est fonctionnel', 'Il est sexy', 'Il a un bon packaging', 'Il est ludique'),
(3, 'Je bosse sous :', 'Linux', 'Mac', 'Windows', 'Je bosse pas moi'),
(4, 'Ma boisson préféré c’est :', 'Redbull', 'L’Arizona', 'Café', 'Mojito'),
(5, 'Mon karma :', 'Autodidacte', 'Perfectionniste', 'Leadership', 'Mollusque'),
(6, 'Mon outil préféré :', 'Sublime Text', 'Photoshop', 'SWOT', 'Facebook'),
(7, 'Le weekend tu préfère :', 'Fermer les volets et coder du php tout le weekend ?', 'Aller voir les expositions en vogue sur Paris ?', 'Aller étudier les plus grandes boutiques du boulevard Haussmann ?', 'Aller en soirée et te mettre une grosse mine ?');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
`id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `resultat` varchar(255) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `resultat`, `date_creation`) VALUES
(1, 'alexandret', 'alex.tillay@gmail.com', 'developpeur', '2015-02-10 23:00:00'),
(2, 'govmole', 'julien.govtepe@hetic.net', 'designer', '2015-01-11 23:00:00'),
(3, 'bruno.simon', 'alexandre.tillay@hetic.net', 'pluridisciplinaire', '2015-03-28 15:37:28'),
(4, 'bruno.simondd', 'alex.tillay@gmail.cdddd', 'pluridisciplinaire', '0000-00-00 00:00:00'),
(5, 'quellerylionel', 'lionel.quellery@hetic.net', 'pluridisciplinaire', '0000-00-00 00:00:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
