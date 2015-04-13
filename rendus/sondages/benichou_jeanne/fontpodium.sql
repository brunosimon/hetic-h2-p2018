-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 30 Mars 2015 à 21:39
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `fontpodium`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidates`
--

CREATE TABLE `candidates` (
`id` int(11) NOT NULL,
  `names` varchar(50) NOT NULL,
  `votes` int(11) NOT NULL,
  `font` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `candidates`
--

INSERT INTO `candidates` (`id`, `names`, `votes`, `font`) VALUES
(1, 'Source Sans Pro', 7, '''Source Sans Pro'', sans-serif;'),
(2, 'Dosis', 7, '''Dosis'', sans-serif;'),
(3, 'Abel', 5, '''Abel'', sans-serif;'),
(4, 'Noto Sans', 6, '''Noto Sans'', sans-serif;'),
(5, 'Droid Sans', 7, '''Droid Sans'', sans-serif;'),
(6, 'Lato', 5, '''Lato'', sans-serif;'),
(7, 'Avro', 3, '''Arvo'', serif;'),
(8, 'Cabin', 3, '''Cabin'', sans-serif;'),
(9, 'Playfair Display', 2, '''Playfair Display'', serif;'),
(10, 'Lora', 8, '''Lora'', serif;'),
(11, 'PT Sans', 10, '''PT Sans'', sans-serif;'),
(12, 'Poiret One', 2, '''Poiret One'', cursive;'),
(13, 'PT Sans Narrow', 2, '''PT Sans Narrow'', sans-serif;'),
(14, 'Arimo', 2, '''Arimo'', sans-serif;'),
(15, 'Noto Serif', 4, '''Noto Serif'', serif;'),
(16, 'Ubuntu', 6, '''Ubuntu'', sans-serif;'),
(17, 'Bitter', 3, '''Bitter'', serif;'),
(18, 'PT Serif', 5, '''PT Serif'', serif;'),
(19, 'Lobster', 2, '''Lobster'', cursive;'),
(20, 'Droid Serif', 2, '''Droid Serif'', serif;'),
(21, 'Oswald', 9, '''Oswald'', sans-serif;'),
(22, 'Oxygen', 1, '''Oxygen'', sans-serif;'),
(23, 'Montserrat', 9, '''Montserrat'', sans-serif;'),
(24, 'Hind', 7, '''Hind'', sans-serif;'),
(25, 'Bree Serif', 0, '''Bree Serif'', serif;'),
(26, 'Vollkorn', 8, '''Vollkorn'', serif;'),
(27, 'Open Sans', 0, '''Open Sans'', sans-serif;'),
(28, 'Open Sans Condensed', 9, '''Open Sans Condensed'', sans-serif;'),
(29, 'Nunito', 3, '''Nunito'', sans-serif;'),
(30, 'Merriweather', 7, '''Merriweather'', serif;'),
(31, 'Fjalla', 2, '''Fjalla One'', sans-serif;'),
(32, 'Indie Flower', 1, '''Indie Flower'', cursive;'),
(33, 'Yanone Kaffeesatz', 4, '''Yanone Kaffeesatz'', sans-serif;'),
(34, 'Titillium Web', 6, '''Titillium Web'', sans-serif;'),
(35, 'Raleway', 10, '''Raleway'', sans-serif;'),
(36, 'Slabo', 5, '''Slabo 27px'', serif;'),
(37, 'Roboto Slab', 3, '''Roboto Slab'', serif;'),
(38, 'Roboto', 3, '''Roboto'', sans-serif;');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
