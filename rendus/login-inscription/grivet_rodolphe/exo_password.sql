-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 08 Mars 2015 à 21:25
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `exo_password`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `password2` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `age`, `mail`, `password`, `password2`) VALUES
(3, 'Rodolphe', 20, 'kemetos@hotmail.fr', '40251c63a5cb5a3f2437c27024a36cdb7e8aee6298476f0e7033287c323ac4a4', '0'),
(4, 'paul', 18, 'paul@hotmail.fr', 'c4ddc36d064a605caab1840fb697b9ae18aa1d97602415da3b54cda6a12c1b13', '0'),
(30, 'Maxime', 21, 'maxime.lemoing@hotmail.fr', 'c50c5bb971f05d3de845ca78db32ad7ad816340381c852c29bbda73ca54bbad7', 'c50c5bb971f05d3de845ca78db32ad7ad816340381c852c29bbda73ca54bbad7');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
