-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 31 Mars 2015 à 01:29
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `hetic_p2018_hots`
--

-- --------------------------------------------------------

--
-- Structure de la table `heroes`
--

CREATE TABLE IF NOT EXISTS `heroes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `scope` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `game` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `url` varchar(200) NOT NULL,
  `vote` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `heroes`
--

INSERT INTO `heroes` (`id`, `name`, `scope`, `category`, `game`, `sex`, `url`, `vote`) VALUES
(1, 'Abathur', 'distance', 'specialist', 'Starcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/abathur/gameplay/abathur-hots-heroes-specialiste-starcraft-sc2-bg-moba-blizzard-114285', 38),
(2, 'Anubarak', 'close', 'warrior', 'Warcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/anubarak/gameplay/anub-arak-hots-heroes-guerrier-warcraft-wow-bg-moba-blizzard-115463', 35),
(3, 'Arthas', 'close', 'warrior', 'Warcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/arthas/gameplay/arthas-hots-heroes-guerrier-warcraft-wow-bg-moba-blizzard-101986', 90),
(4, 'Asmodan', 'distance', 'specialist', 'Diablo', 'male', 'http://www.millenium.org/heroes-of-the-storm/azmodan/gameplay/azmodan-hots-asmodan-heroes-specialiste-diablo-bg-moba-blizzard-115468', 19),
(5, 'Balafre', 'close', 'warrior', 'Warcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/balafre/gameplay/balafre-hots-heroes-guerrier-warcraft-wow-bg-moba-blizzard-112889', 67),
(6, 'Bourbie', 'close', 'specialist', 'Warcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/bourbie/gameplay/bourbie-hots-heroes-specialiste-warcraft-wow-bg-moba-blizzard-109384', 11),
(7, 'Chen', 'close', 'warrior', 'Warcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/chen/gameplay/chen-hots-heroes-guerrier-warcraft-wow-bg-moba-blizzard-114407', 4),
(8, 'Diablo', 'close', 'warrior', 'Diablo', 'male', 'http://www.millenium.org/heroes-of-the-storm/diablo/gameplay/diablo-hots-heroes-guerrier-diablo-bg-moba-blizzard-109215', 74),
(9, 'E.T.C.', 'close', 'warrior', 'Warcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/etc/gameplay/e-t-c-hots-heroes-guerrier-warcraft-wow-bg-moba-blizzard-111619', 16),
(10, 'Falstad', 'distance', 'assassin', 'Warcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/falstad/gameplay/falstad-hots-heroes-assassin-warcraft-wow-bg-moba-blizzard-hots-heroes-113813', 24),
(11, 'Gazleu', 'close', 'specialist', 'Warcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/gazleu/gameplay/gazleu-hots-heroes-specialiste-warcraft-wow-bg-moba-blizzard-heroes-113782', 11),
(12, 'Illidan', 'close', 'assassin', 'Warcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/illidan/gameplay/illidan-assassin-warcraft-wow-bg-moba-blizzard-104276', 15),
(13, 'Jaina', 'distance', 'assassin', 'Warcraft', 'female', 'http://www.millenium.org/heroes-of-the-storm/jaina/gameplay/jaina-hots-heroes-assassin-warcraft-wow-bg-moba-blizzard-117388', 94),
(14, 'Kerrigan', 'close', 'assassin', 'Starcraft', 'female', 'http://www.millenium.org/heroes-of-the-storm/kerrigan/gameplay/kerrigan-hots-heroes-assassin-starcraft-sc2-bg-moba-blizzard-109946', 46),
(15, 'Li Li', 'distance', 'support', 'Warcraft', 'female', 'http://www.millenium.org/heroes-of-the-storm/lili/gameplay/li-li-hots-heroes-support-warcraft-wow-bg-moba-blizzard-hots-heroes-111957', 1),
(16, 'Luisaile', 'distance', 'support', 'Warcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/luisaile/gameplay/luisaile-hots-heroes-support-warcraft-wow-bg-moba-blizzard-113349', 1),
(17, 'Malfurion', 'distance', 'support', 'Warcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/malfurion/gameplay/malfurion-hots-heroes-support-warcraft-wow-bg-moba-blizzard-102036', 1),
(18, 'Muradin', 'contact', 'warrior', 'Warcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/muradin/gameplay/muradin-hots-guerrier-warcraft-wow-bg-moba-blizzard-109398', 13),
(19, 'Nasibo', 'distance', 'specialist', 'Diablo', 'male', 'http://www.millenium.org/heroes-of-the-storm/nasibo/gameplay/nasibo-hots-heroes-specialiste-diablo-bg-moba-blizzard-104079', 6),
(20, 'Nova', 'distance', 'assassin', 'Starcraft', 'female', 'http://www.millenium.org/heroes-of-the-storm/nova/gameplay/nova-hots-assassin-starcraft-sc2-bg-moba-blizzard-109592', 92),
(21, 'Raynor', 'distance', 'assassin', 'Starcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/raynor/gameplay/raynor-hots-heroes-assassin-starcraft-sc2-bg-moba-blizzard-106671', 78),
(22, 'Rehgar', 'close', 'support', 'Warcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/rehgar/gameplay/rehgar-hots-heroes-support-warcraft-wow-bg-moba-blizzard-112638', 0),
(23, 'Sgt Marteau', 'distance', 'specialist', 'Starcraft', 'female', 'http://www.millenium.org/heroes-of-the-storm/sgtmarteau/gameplay/sgt-marteau-hots-heroes-specialiste-starcraft-sc2-bg-moba-blizzard-110884', 17),
(24, 'Sylvanas', 'distance', 'specialist', 'Warcraft', 'female', 'http://www.millenium.org/heroes-of-the-storm/sylvanas/gameplay/sylvanas-hots-heroes-specialiste-warcraft-wow-bg-moba-blizzard-117952', 22),
(25, 'Sonya', 'close', 'warrior', 'Diablo', 'female', 'http://www.millenium.org/heroes-of-the-storm/sonya/gameplay/sonya-hots-heroes-guerrier-diablo-bg-moba-blizzard-106255', 22),
(26, 'Tassadar', 'distance', 'support', 'Starcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/tassadar/gameplay/tassadar-hots-heroes-support-starcraft-sc2-bg-moba-blizzard-110449', 23),
(27, 'Thrall', 'contact', 'assassin', 'Warcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/thrall/gameplay/thrall-hots-heroes-assassin-warcraft-wow-bg-moba-blizzard-117397', 55),
(28, 'Tychus', 'distance', 'assassin', 'Starcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/tychus/gameplay/tychus-hots-assassin-starcraft-sc2-bg-moba-blizzard-heroes-112405', 8),
(29, 'Tyrael', 'close', 'warrior', 'Diablo', 'male', 'http://www.millenium.org/heroes-of-the-storm/tyrael/gameplay/tyrael-hots-heroes-guerrier-diablo-bg-moba-blizzard-105266', 50),
(30, 'Tyrande', 'distance', 'support', 'Warcraft', 'female', 'http://www.millenium.org/heroes-of-the-storm/tyrande/gameplay/tyrande-hots-heroes-support-warcraft-wow-bg-moba-blizzard-112972', 71),
(31, 'Uther', 'close', 'support', 'Warcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/uther/gameplay/uther-hots-heroes-support-warcraft-wow-bg-moba-blizzard-103322', 44),
(32, 'Valla', 'distance', 'assassin', 'Diablo', 'female', 'http://www.millenium.org/heroes-of-the-storm/valla/gameplay/valla-hots-heroes-assassin-diablo-bg-moba-blizzard-103598', 80),
(33, 'Zagara', 'distance', 'specialist', 'Starcraft', 'female', 'http://www.millenium.org/heroes-of-the-storm/zagara/gameplay/zagara-hots-heroes-specialiste-starcraft-sc2-bg-moba-blizzard-heroes-111100', 9),
(34, 'Zeratul', 'close', 'assassin', 'Starcraft', 'male', 'http://www.millenium.org/heroes-of-the-storm/zeratul/gameplay/zeratul-hots-heroes-assassin-starcraft-sc2-bg-moba-blizzard-109319', 45);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `mail` varchar(70) NOT NULL,
  `password` varchar(200) NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `vote` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mail`, `password`, `birth`, `gender`, `vote`) VALUES
(1, 'Lucas', 'lucas.lemahieu@gmail.com', '559e46b7906dce1c0dbe95ba0c7597cd5e0f2298261c804b94130161681c4050', '1993-01-13', 'male', 7),
(5, 'Ploupi', 'plop@plop.plop', '408183a21e1f0ca03f45d5fbe2ed6d3256a074a44ffa889044598a260cc6ddde', '1990-04-15', 'female', 16),
(6, 'Magali', 'magdu93@gmail.com', '615c5ecd11a9f9a1e89e9ad171899384320cfb86d466fbfbd5a9cd7a4264b3ed', '1993-12-27', 'female', 23),
(7, 'Cyril', 'metal@metal.metal', 'aec8eebf6df29ff29d28ecc2d2ea51c31927ed303a4c583b84c38e93a4e62560', '1996-03-12', 'male', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
