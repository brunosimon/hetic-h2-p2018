-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 08 Mars 2015 à 23:14
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `devoir-php-Nawelle-Alouani`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `age`, `mail`, `password`) VALUES
(1, 'Robert', 'DeNiro', 'YouTalkin''ToMe', 71, 'deniro@gmail.com', 'fc9ff2a3dcbc4944d4fc5b7550c1d6fcb0c721e37ecfabd712a89ee0ce600975'),
(2, 'Gary', 'Oldman', 'DeluxePsychopath', 56, 'gary@gmail.com', 'd953a3cab119be95abfc3e393e20bca5a1b2c7ca5b4a43e648548f1b11854d9f'),
(3, 'Scarlett', 'Johansson', 'BlackWidow', 30, 'Scarlett@gmail.com', 'cf36fbb890e1c497d4c1c6360ab8271e7b718d7698dca8391e34b01e75e087e1'),
(4, 'Harrison', 'Ford', 'HanSolo', 72, 'harrison@gmail.com', 'c55d535cc9fe03578ce51d3a7e60730ca2b698daa73d9a746bfa1f63a7f9490e'),
(5, 'Robin', 'Wright', 'UnderwoodC', 49, 'robin@gmail.com', 'cd807a3fa4eb832a9e4c52bb738401a9dab6f799678315a61ec5eca93c404dfe'),
(6, 'Charlize', 'Theron', 'Dior', 39, 'charlize@gmail.com', '529cf4fb25443688b8d506030d5a481704cacab97b22e71205e337738de02dc1'),
(7, 'Meryl', 'Streep', 'EvilPrada', 65, 'meryl@gmail.com', '529cf4fb25443688b8d506030d5a481704cacab97b22e71205e337738de02dc1'),
(8, 'Matthew', 'McConaughey', 'AlrighAlrightAlright', 45, 'matthew@gmail.com', 'fe57ddf8f067c1a88f0a2e4295df73be5e5851a2c5f5600a397c2949620317d9');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
