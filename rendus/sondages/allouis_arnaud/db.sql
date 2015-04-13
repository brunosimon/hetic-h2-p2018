-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Lun 30 Mars 2015 à 23:51
-- Version du serveur: 5.5.40
-- Version de PHP: 5.4.36-1+deb.sury.org~precise+2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `toppromo`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook_id` varchar(255) NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=154 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `facebook_id`, `votes`) VALUES
(1, 'arnaud.allouis', 30),
(2, 'moise.heticien', 2),
(3, 'orane.bosom', 10),
(4, 'milena.tarriere', 5),
(5, 'evan.peuvergne', 5),
(6, 'jeanne.benichou', 3),
(7, 'louis.amiot', 17),
(8, '100008348857078', 7),
(9, 'alex.tchff', 7),
(10, 'serge.detypewsevolojsky', 5),
(11, 'mgoutry', 9),
(12, 'tvaubourg', 8),
(13, 'utopiad.jp', 3),
(14, 'MSoum', 6),
(15, 'anthony.gaeremynck', 5),
(16, 'margaux.cbrl', 4),
(17, 'youssra.manad', 5),
(18, 'madheros', 4),
(19, 'boris.laporte', 4),
(20, 'clem.solair', 4),
(21, 'valentin.bigot', 7),
(22, '1694660500', 14),
(23, 'gov.mole', 5),
(24, 'kyoki.riviere', 3),
(25, 'nahel.mb', 0),
(26, 'kris.phivilay', 0),
(27, 'raoul.gaillard', 0),
(28, 'sniezakpaul', 0),
(29, 'alex.tillay', 0),
(30, 'rwetteren', 0),
(31, 'LSMorgane', 0),
(32, 'alexis.subias.9', 0),
(33, 'axel.damelet', 0),
(34, 'rodolphe.grivet', 0),
(35, 'Chrissen.R', 0),
(36, 'romain.lapi.3', 0),
(37, 'raphael.nieder', 0),
(38, 'hentati.akram', 0),
(39, 'daria.medvedeva.3', 0),
(41, 'moise.heticien', 0),
(42, 'orane.bosom', 0),
(43, 'milena.tarriere', 0),
(44, 'evan.peuvergne', 0),
(45, 'jeanne.benichou', 0),
(46, 'louis.amiot', 0),
(47, '100008348857078', 0),
(48, 'alex.tchff', 0),
(49, 'serge.detypewsevolojsky', 0),
(50, 'mgoutry', 0),
(51, 'tvaubourg', 0),
(52, 'utopiad.jp', 0),
(53, 'MSoum', 0),
(54, 'anthony.gaeremynck', 0),
(55, 'margaux.cbrl', 0),
(56, 'youssra.manad', 0),
(57, 'madheros', 0),
(58, 'boris.laporte', 0),
(59, 'clem.solair', 0),
(60, 'valentin.bigot', 0),
(61, '1694660500', 0),
(62, 'gov.mole', 0),
(63, 'kyoki.riviere', 0),
(64, 'nahel.mb', 0),
(65, 'kris.phivilay', 0),
(66, 'raoul.gaillard', 0),
(67, 'sniezakpaul', 0),
(68, 'alex.tillay', 0),
(69, 'rwetteren', 0),
(70, 'LSMorgane', 20),
(71, 'alexis.subias.9', 0),
(72, 'axel.damelet', 0),
(73, 'rodolphe.grivet', 1),
(74, 'Chrissen.R', 0),
(75, 'romain.lapi.3', 0),
(76, 'raphael.nieder', 0),
(77, 'hentati.akram', 0),
(78, 'daria.medvedeva.3', 0),
(80, 'moise.heticien', 0),
(81, 'orane.bosom', 0),
(82, 'milena.tarriere', 0),
(83, 'evan.peuvergne', 0),
(84, 'jeanne.benichou', 0),
(85, 'louis.amiot', 0),
(86, '100008348857078', 0),
(87, 'alex.tchff', 0),
(88, 'serge.detypewsevolojsky', 0),
(89, 'mgoutry', 0),
(90, 'tvaubourg', 0),
(91, 'utopiad.jp', 0),
(92, 'MSoum', 0),
(93, 'anthony.gaeremynck', 0),
(94, 'margaux.cbrl', 0),
(95, 'youssra.manad', 0),
(96, 'madheros', 0),
(97, 'boris.laporte', 0),
(98, 'clem.solair', 1),
(99, 'valentin.bigot', 0),
(100, '1694660500', 0),
(101, 'gov.mole', 0),
(102, 'kyoki.riviere', 0),
(103, 'nahel.mb', 0),
(104, 'kris.phivilay', 0),
(105, 'raoul.gaillard', 0),
(106, 'sniezakpaul', 0),
(107, 'alex.tillay', 0),
(108, 'rwetteren', 0),
(109, 'LSMorgane', 0),
(110, 'alexis.subias.9', 0),
(111, 'axel.damelet', 0),
(112, 'rodolphe.grivet', 0),
(113, 'Chrissen.R', 0),
(114, 'romain.lapi.3', 0),
(115, 'raphael.nieder', 0),
(116, 'hentati.akram', 0),
(117, 'daria.medvedeva.3', 0),
(118, 'gaspard.chavardes', 2),
(119, 'jlozingue', 0),
(120, 'lucas.lemahieu.7', 0),
(121, 'adel.meziani.79', 0),
(122, 'odon.chesnais', 0),
(123, 'jgozlandantoni', 0),
(124, 'kevin.jakubec', 0),
(125, 'dalihazgui', 0),
(126, 'lucien.landanger', 0),
(127, 'gregoire.charrassin', 0),
(128, 'ines.sjl', 0),
(129, 'tom.bonnike', 0),
(130, 'nawelle.alouani', 0),
(131, 'matthieu.tourdes', 0),
(132, 'stephen.richard.33', 0),
(133, 'martin.ziserman.1', 0),
(134, 'pereira.ced', 0),
(135, 'aguadonicolas', 0),
(136, 'thibaud.camhaji', 0),
(137, 'azeqsd.jioudsq', 0),
(138, 'luca.kolener', 0),
(139, 'louis.piechowiak', 0),
(140, 'PauulGabriel', 0),
(141, '100008372375824', 0),
(142, 'Amine.ThugLife', 0),
(143, 'tarik.oz.5', 0),
(144, 'thomas.gouret.9', 0),
(145, 'darktmort', 0),
(146, 'ZuulSeeds', 0),
(147, 'antoine.jct', 1),
(148, 'juliette.dauzidou', 0),
(149, 'ronan.polin', 0),
(150, 'simon.gay.14', 0),
(151, 'aymeric.sans', 0),
(152, 'anna.pages.585', 0),
(153, 'jeanlawyimwan', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
