-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 09 Mars 2015 à 00:21
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `formulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `table_lol`
--

CREATE TABLE IF NOT EXISTS `table_lol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `birth` date NOT NULL,
  `region` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `table_lol`
--

INSERT INTO `table_lol` (`id`, `mail`, `pseudo`, `password`, `age`, `gender`, `birth`, `region`) VALUES
(6, 'thuglife@gmail.com', 'Thug', '154cd9d52728bcd45369d4ecc1d233d9566b19955c103543daf6c6fd1270876a', 14, 1, '2001-10-08', 7),
(7, 'hihi@gmail.com', 'ljqerbg!ler', 'b9b3400e10a7ee12891cea5e2a9cb77582ca6640e945518a265ae7f1bbf4d4ed', 15, 1, '1999-05-05', 1),
(8, 'lulu@gmail.com', 'ljqerbg!ler', 'b9b3400e10a7ee12891cea5e2a9cb77582ca6640e945518a265ae7f1bbf4d4ed', 13, 1, '1999-05-05', 5),
(9, 'lulu@gmail.com', 'Lulu', '77a8d891f303191c5e11289683c0071c19e533abbbb57f353ae89bd88429b328', 7, 1, '2002-02-02', 3),
(10, 'lulu@gmail.com', 'Coucou', 'b9b3400e10a7ee12891cea5e2a9cb77582ca6640e945518a265ae7f1bbf4d4ed', 12, 2, '2002-02-02', 1),
(11, 'meew@gmail.com', 'Meew', '6e752e91d19cfe7e0a4c8b7c058883c684ee8853c8f5dd07b3969ef0a9c1e363', 6, 1, '2011-01-31', 3),
(12, 'mamie@gmail.com', 'Miaw', '4bfe4ddbed01df0d596450ca301e7e2b1e902a310b9cc0990dac748d6b0c474c', 89, 1, '1926-03-02', 5),
(13, 'coucou@gmail.com', 'Papi', '903330bbc83e8c991ffe89e8137b449fee9c6d9348d19af80b1faf48d5d7e44b', 89, 2, '1926-01-02', 7),
(14, 'titi@gmail.com', 'Titi', '18e9a125b4724d4454dc7b33a05c1790da3c67353eceb2f7beb3b6b379a1875c', 12, 2, '1998-05-31', 4),
(20, 'magalieststupide6@yopmail.com', 'mago', '18e9a125b4724d4454dc7b33a05c1790da3c67353eceb2f7beb3b6b379a1875c', 20, 1, '0000-00-00', 4),
(21, 'magalieststupide7@yopmail.com', 'magro', '18e9a125b4724d4454dc7b33a05c1790da3c67353eceb2f7beb3b6b379a1875c', 26, 1, '0000-00-00', 5),
(22, 'tagazou@g.com', 'Taritati', '13705c2fa2a47af1bb1fb315732a3c0ffa9862fac30d445de0147e7f47008149', 33, 1, '2002-02-02', 3),
(23, 'tagazu@g.com', 'TaritatiA', '13705c2fa2a47af1bb1fb315732a3c0ffa9862fac30d445de0147e7f47008149', 33, 1, '2002-02-02', 1),
(24, 'tutu@g.com', 'Tutu', '250c9c054e869a2dea6ee88fc0b8fee31426e28a7bb27e4703dff0ad571de8e8', 45, 1, '1992-02-02', 1),
(25, 'titu@g.com', 'Titu', '250c9c054e869a2dea6ee88fc0b8fee31426e28a7bb27e4703dff0ad571de8e8', 45, 1, '1992-02-02', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
