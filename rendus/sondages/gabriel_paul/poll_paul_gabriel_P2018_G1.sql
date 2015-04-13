-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 28 Mars 2015 à 20:57
-- Version du serveur :  5.5.41-0+wheezy1
-- Version de PHP :  5.4.36-0+deb7u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `poll_paul_gabriel`
--

-- --------------------------------------------------------

--
-- Structure de la table `contenders`
--

CREATE TABLE IF NOT EXISTS `contenders` (
  `id` int(11) NOT NULL,
  `title` varchar(90) CHARACTER SET utf8 NOT NULL,
  `picture` text CHARACTER SET utf8 NOT NULL,
  `score` bigint(20) NOT NULL DEFAULT '1000'
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contenders`
--

INSERT INTO `contenders` (`id`, `title`, `picture`, `score`) VALUES
(1, 'N&#233;o', 'http://badass.pgab.me/src/photos/_1.jpg', 1000),
(2, 'Aragorn', 'http://badass.pgab.me/src/photos/_2.jpg', 1000),
(3, 'John McLane', 'http://badass.pgab.me/src/photos/_3.jpg', 1000),
(5, 'Rambo', 'http://badass.pgab.me/src/photos/_5.jpg', 1000),
(11, 'Heisenberg', 'http://badass.pgab.me/src/photos/_11.jpg', 1000),
(12, 'Han Solo', 'http://badass.pgab.me/src/photos/_12.jpg', 1000),
(13, 'Jules Winnfield', 'http://badass.pgab.me/src/photos/_13.jpg', 1000),
(14, 'Nicolas Cage', 'http://badass.pgab.me/src/photos/_14.jpg', 1000),
(15, 'Batman', 'http://badass.pgab.me/src/photos/_15.jpg', 1000),
(16, 'The Dude', 'http://badass.pgab.me/src/photos/_16.jpg', 1000),
(17, 'Wolverine', 'http://badass.pgab.me/src/photos/_17.jpg', 1000),
(19, 'The Terminator', 'http://badass.pgab.me/src/photos/_19.jpg', 1000),
(20, 'Tony Montana', 'http://badass.pgab.me/src/photos/_20.jpg', 1000),
(21, 'Tyler Durden', 'http://badass.pgab.me/src/photos/_21.jpg', 1000),
(22, 'The Bride', 'http://badass.pgab.me/src/photos/_22.jpg', 1000),
(23, 'Maximus Decimus Meridius', 'http://badass.pgab.me/src/photos/_23.jpg', 1000),
(24, 'L&#233;on', 'http://badass.pgab.me/src/photos/_24.jpg', 1000),
(25, 'Driver', 'http://badass.pgab.me/src/photos/_25.jpg', 1000),
(26, 'Dexter Morgan', 'http://badass.pgab.me/src/photos/_26.jpg', 1000),
(27, 'Jon Snow', 'http://badass.pgab.me/src/photos/_27.jpg', 1000),
(28, 'Sherlock Holmes', 'http://badass.pgab.me/src/photos/_28.jpg', 1000),
(29, 'Loki', 'http://badass.pgab.me/src/photos/_29.jpg', 1000),
(30, 'Captain Jack sparrow', 'http://badass.pgab.me/src/photos/_30.jpg', 1000),
(31, 'Darth Vader', 'http://badass.pgab.me/src/photos/_31.jpg', 1000),
(32, 'Django', 'http://badass.pgab.me/src/photos/_32.jpg', 1000),
(33, 'Tony Stark', 'http://badass.pgab.me/src/photos/_33.jpg', 1000),
(34, 'The Joker', 'http://badass.pgab.me/src/photos/_34.jpg', 1000),
(35, 'James Bond (You know Which One)', 'http://badass.pgab.me/src/photos/_35.jpg', 1000),
(36, 'HAL-9000', 'http://badass.pgab.me/src/photos/_36.jpg', 1000),
(37, 'Dr. Emmett Brown', 'http://badass.pgab.me/src/photos/_37.jpg', 1000),
(38, 'Gandalf', 'http://badass.pgab.me/src/photos/_38.jpg', 1000),
(39, 'Jason Bourne', 'http://badass.pgab.me/src/photos/_39.jpg', 1000),
(40, 'Tyrion Lannister', 'http://badass.pgab.me/src/photos/_43.jpg', 1000),
(41, 'Rocky Balboa', 'http://badass.pgab.me/src/photos/_41.jpg', 1000),
(42, 'The Ghostbusters', 'http://badass.pgab.me/src/photos/_42.jpg', 1000),
(43, 'The Godfather', 'http://badass.pgab.me/src/photos/_43.jpg', 1000),
(44, 'Franck Underwood', 'http://badass.pgab.me/src/photos/_44.jpg', 1000);

-- --------------------------------------------------------

--
-- Structure de la table `vote_history`
--

CREATE TABLE IF NOT EXISTS `vote_history` (
  `id` bigint(20) NOT NULL,
  `ip` varchar(45) NOT NULL COMMENT '//45 for IPv6 support',
  `contender_id` bigint(20) NOT NULL,
  `former_score` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `contenders`
--
ALTER TABLE `contenders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vote_history`
--
ALTER TABLE `vote_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `contenders`
--
ALTER TABLE `contenders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `vote_history`
--
ALTER TABLE `vote_history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
