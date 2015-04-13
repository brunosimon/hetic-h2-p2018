-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 30 Mars 2015 à 22:28
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `james_bond`
--

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
`id` int(11) NOT NULL,
  `names` varchar(150) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `films`
--

INSERT INTO `films` (`id`, `names`, `votes`) VALUES
(1, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=1946.html">James Bond 007 contre Dr. No</a>', 12),
(2, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=2019.html">Bons baisers de Russie</a>', 5),
(3, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=1815.html">Goldfinger</a>', 2),
(4, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=2555.html">Operation Tonnerre</a>', 3),
(5, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=2574.html">On ne vit que deux fois</a>', 3),
(6, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=70544.html">Au service secret de Sa Majeste</a>', 2),
(7, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=33411.html">Les diamants sont Eternels</a>', 1),
(8, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=1123.html">Vivre et laisser mourir</a>', 2),
(9, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=397.html">L''Homme au pistolet d''or</a>', 10),
(10, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=1183.html">L''Espion qui m''aimait</a>', 4),
(11, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=246.html">Moonraker</a>', 1),
(12, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=3749.html">Rien que pour vos yeux</a>', 1),
(13, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=24.html">Octopussy</a>', 3),
(14, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=623.html">Dangereusement votre</a>', 4),
(15, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=2679.html">Tuer n''est pas jouer</a>', 3),
(16, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=4947.html">Permis de tuer</a>', 1),
(17, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=13665.html">GoldenEye</a>', 1),
(18, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=82178.html">Demain ne meurt jamais</a>', 1),
(19, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=21628.html">Le monde ne suffit pas</a>', 5),
(20, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=29274.html">Meurs un autre jour</a>', 2),
(21, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=58525.html">Casino Royale</a>', 15),
(22, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=114851.html">Quantum of Solace</a>', 1),
(23, '<a target="_blank"href="http://www.allocine.fr/film/fichefilm_gen_cfilm=145646.html">Skyfall</a>', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `films`
--
ALTER TABLE `films`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;