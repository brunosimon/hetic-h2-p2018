-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 10 Mars 2015 à 23:51
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `login_registrer`
--

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `username` varchar(200) CHARACTER SET utf8 NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('akramhentati', '6669f822c4dd2fbfc909e762f9f4cd9c468f7f53ec37283b2f076c077a293ab7'),
('karma', '8f5ad1a9f21ff0d8525d093a3df873330271dbe988295db28ca209c462b3c335'),
('krama', '46620b5222d659beee028462a74ad89c81584978c731f1d27944350df3693ac1');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`username`);
