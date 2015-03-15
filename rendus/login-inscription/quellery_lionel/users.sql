
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 08 Mars 2015 à 22:06
-- Version du serveur: 10.0.17-MariaDB
-- Version de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `u967243024_pdo`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` longtext NOT NULL,
  `password` longtext NOT NULL,
  `email` varchar(220) CHARACTER SET utf8 DEFAULT NULL,
  `token` varchar(10) NOT NULL,
  `usedtoken` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `token`, `usedtoken`) VALUES
(1, 'admin', 'admin', '0', '0', 0),
(2, 'lionel', '6933ddc644dc6b7d54263d073644369423155d12', 'lionel.quellery@hetic.net', 'X81U3Z8P5Z', 0),
(3, 'antoine', 'ebf09e8ddcd40ffbe53363605507adf894948f02', 'antoine@gmail.com', '0', 0),
(26, 'annie', '6933ddc644dc6b7d54263d073644369423155d12', 'lionel.quellery@gmail.com', '787C35TMXR', 0),
(27, 'toni', '4195353ee622077891d0ff62c437145cad15412b', 'qsqdjqjdqsjd@qdqsqsdqsdqd.com', 'Q9SRM3TTRZ', 0),
(28, 'sssqsqsqsqssq', '596a61063f7986d3e1b947586a51c5128cee6c9b', 'qsqsqsqssq@qsdqsdqsdqs.cl', '', 0),
(29, 'qsdqqsdqsd', 'bb5b917cf51994156465cd9fdb3e7c24dd76fe9d', 'gov@gov.com', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
