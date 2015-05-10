-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 03 Mai 2015 à 20:56
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `Sondage`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidates`
--

CREATE TABLE `candidates` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `votes` int(11) NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `year`, `votes`, `image`) VALUES
(1, 'The Adventures of Andre and Wally B.', 1984, 28, 'pixarshort_01.jpg'),
(2, 'Luxo Jr.', 1986, 7, 'pixarshort_02.jpg'),
(3, 'Red''s Dream', 1987, 5, 'pixarshort_03.jpg'),
(4, 'Tin Toy', 1988, 9, 'pixarshort_04.jpg'),
(5, 'Knick Knack', 1989, 1, 'pixarshort_05.jpg'),
(6, 'Geri''s Game', 1997, 13, 'pixarshort_06.jpg'),
(7, 'For the Birds', 2000, 75, 'pixarshort_07.jpg'),
(8, 'Boundin''', 2003, 49, 'pixarshort_08.jpg'),
(9, 'One Man Band', 2005, 1, 'pixarshort_09.jpg'),
(10, 'Lifted', 2006, 1, 'pixarshort_10.jpg'),
(11, 'Presto', 2008, 14, 'pixarshort_11.jpg'),
(12, 'Partly Cloudy', 2009, 5, 'pixarshort_12.jpg'),
(13, 'Day & Night', 2010, 61, 'pixarshort_13.jpg'),
(14, 'La Luna', 2011, 5, 'pixarshort_14.jpg'),
(15, 'The Blue Umbrella', 2013, 37, 'pixarshort_15.jpg'),
(16, 'Lava', 2014, 0, 'pixarshort_16.jpg'),
(17, 'Mike''s New Car', 2002, 1, 'pixarshort_17.jpg'),
(18, 'Jack-Jack Attack', 2005, 67, 'pixarshort_18.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `candidates`
--
ALTER TABLE `candidates`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `candidates`
--
ALTER TABLE `candidates`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;