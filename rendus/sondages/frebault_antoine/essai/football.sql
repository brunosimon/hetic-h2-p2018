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
-- Base de données :  `football`
--

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
`id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `pseudo` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`id`, `nom`, `prenom`, `pseudo`, `password`) VALUES
(1, 'Abecassis', 'Alexandre', '1', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(2, 'Abecassis', 'Clement', '2', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(3, 'Aboudarham', 'Kevin', '3', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(4, 'Baehr', 'Anthony', '4', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(5, 'Blamoutier', 'Axel', '5', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(6, 'Bouhier', 'Maxence', '6', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(7, 'Bruderer', 'Clement', '7', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(8, 'Castex', 'Louis', '8', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(9, 'Cluzel', 'Pierre', '9', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(10, 'Drouot', 'Thevy', '10', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(11, 'Etchenmendy', 'Benjamin', '11', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(12, 'Frebault', 'Antoine', '12', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(13, 'Frebault', 'Bertrand', '13', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(14, 'Lessinger-Seiz', 'Severiano', '14', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(15, 'Lezzam', 'Elvez', '15', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(16, 'Phung', 'Le-Hoan', '16', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(17, 'Pilicer', 'Alexandre', '17', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(18, 'Rouissi', 'Berkan', '18', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(19, 'Ryba', 'Maciej', '19', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af'),
(20, 'Semal', 'Camille', '20', 'fa6e44224502383ce2eb711f8bd8f3a6daa03a3671eb787183a8c55077f942af');

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE `matchs` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `joue` int(11) NOT NULL,
  `pour` int(11) NOT NULL,
  `contre` int(11) NOT NULL,
  `resultat` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `matchs`
--

INSERT INTO `matchs` (`id`, `date`, `joue`, `pour`, `contre`, `resultat`) VALUES
(1, '2015-03-15', 1, 1, 3, 1),
(2, '2015-03-22', 1, 6, 1, 4),
(3, '2015-03-29', 1, 2, 2, 2),
(4, '2015-04-05', 0, 0, 0, 0),
(5, '2015-04-12', 0, 0, 0, 0),
(6, '2015-04-19', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
`id` int(11) NOT NULL,
  `votant_id` int(11) NOT NULL,
  `votant_nom` varchar(250) NOT NULL,
  `votant_prenom` varchar(250) NOT NULL,
  `note_id` int(11) NOT NULL,
  `note_nom` varchar(250) NOT NULL,
  `note_prenom` varchar(250) NOT NULL,
  `note` int(11) NOT NULL,
  `rencontre` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `notes`
--

INSERT INTO `notes` (`id`, `votant_id`, `votant_nom`, `votant_prenom`, `note_id`, `note_nom`, `note_prenom`, `note`, `rencontre`) VALUES
(1, 1, 'Abecassis', 'Alexandre', 2, 'Abecassis', 'Clement', 5, 1),
(2, 1, 'Abecassis', 'Alexandre', 3, 'Aboudarham', 'Kevin', 6, 1),
(3, 1, 'Abecassis', 'Alexandre', 4, 'Baehr', 'Anthony', 6, 1),
(4, 1, 'Abecassis', 'Alexandre', 5, 'Blamoutier', 'Axel', 7, 1),
(5, 1, 'Abecassis', 'Alexandre', 6, 'Bouhier', 'Maxence', 6, 1),
(6, 1, 'Abecassis', 'Alexandre', 7, 'Bruderer', 'Clement', 3, 1),
(7, 1, 'Abecassis', 'Alexandre', 8, 'Castex', 'Louis', 6, 1),
(8, 1, 'Abecassis', 'Alexandre', 9, 'Cluzel', 'Pierre', 4, 1),
(9, 1, 'Abecassis', 'Alexandre', 10, 'Drouot', 'Thevy', 4, 1),
(10, 1, 'Abecassis', 'Alexandre', 11, 'Etchenmendy', 'Benjamin', 3, 1),
(11, 1, 'Abecassis', 'Alexandre', 12, 'Frebault', 'Antoine', 7, 1),
(12, 1, 'Abecassis', 'Alexandre', 13, 'Frebault', 'Bertrand', 6, 1),
(13, 1, 'Abecassis', 'Alexandre', 14, 'Lessinger-Seiz', 'Severiano', 3, 1),
(14, 1, 'Abecassis', 'Alexandre', 15, 'Lezzam', 'Elvez', 7, 1),
(15, 1, 'Abecassis', 'Alexandre', 16, 'Phung', 'Le-Hoan', 7, 1),
(16, 1, 'Abecassis', 'Alexandre', 17, 'Pilicer', 'Alexandre', 3, 1),
(17, 1, 'Abecassis', 'Alexandre', 18, 'Rouissi', 'Berkan', 6, 1),
(18, 1, 'Abecassis', 'Alexandre', 19, 'Ryba', 'Maciej', 7, 1),
(19, 1, 'Abecassis', 'Alexandre', 20, 'Semal', 'Camille', 5, 1),
(20, 20, 'Semal', 'Camille', 1, 'Abecassis', 'Alexandre', 5, 1),
(21, 20, 'Semal', 'Camille', 2, 'Abecassis', 'Clement', 7, 1),
(22, 20, 'Semal', 'Camille', 3, 'Aboudarham', 'Kevin', 6, 1),
(23, 20, 'Semal', 'Camille', 4, 'Baehr', 'Anthony', 3, 1),
(24, 20, 'Semal', 'Camille', 5, 'Blamoutier', 'Axel', 7, 1),
(25, 20, 'Semal', 'Camille', 6, 'Bouhier', 'Maxence', 7, 1),
(26, 20, 'Semal', 'Camille', 7, 'Bruderer', 'Clement', 3, 1),
(27, 20, 'Semal', 'Camille', 8, 'Castex', 'Louis', 6, 1),
(28, 20, 'Semal', 'Camille', 9, 'Cluzel', 'Pierre', 7, 1),
(29, 20, 'Semal', 'Camille', 10, 'Drouot', 'Thevy', 3, 1),
(30, 20, 'Semal', 'Camille', 11, 'Etchenmendy', 'Benjamin', 4, 1),
(31, 20, 'Semal', 'Camille', 12, 'Frebault', 'Antoine', 6, 1),
(32, 20, 'Semal', 'Camille', 13, 'Frebault', 'Bertrand', 6, 1),
(33, 20, 'Semal', 'Camille', 14, 'Lessinger-Seiz', 'Severiano', 3, 1),
(34, 20, 'Semal', 'Camille', 15, 'Lezzam', 'Elvez', 6, 1),
(35, 20, 'Semal', 'Camille', 16, 'Phung', 'Le-Hoan', 7, 1),
(36, 20, 'Semal', 'Camille', 17, 'Pilicer', 'Alexandre', 6, 1),
(37, 20, 'Semal', 'Camille', 18, 'Rouissi', 'Berkan', 6, 1),
(38, 20, 'Semal', 'Camille', 19, 'Ryba', 'Maciej', 5, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matchs`
--
ALTER TABLE `matchs`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `matchs`
--
ALTER TABLE `matchs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
