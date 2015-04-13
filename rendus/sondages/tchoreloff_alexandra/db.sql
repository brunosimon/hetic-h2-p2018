-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 31 Mars 2015 à 02:37
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `php-sondage`
--

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `excellent` int(11) NOT NULL,
  `pas_mal` int(11) NOT NULL,
  `nul` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id`, `name`, `excellent`, `pas_mal`, `nul`, `picture`) VALUES
(1, 'Les 101 dalmatiens', 5, 5, 4, 'http://fr.web.img4.acsta.net/medias/nmedia/18/65/83/79/20193459.jpg'),
(2, 'Blanche Neige', 4, 3, 6, 'http://www.lesrencontresdusud.fr/wp-content/uploads/2012/01/BLANCHE-NEIGE-ET-LES-SEPT-NAINS-AFFICHE_bd-723x1024.jpg'),
(3, 'Cendrillon', 3, 1, 1, 'http://www.cdn-cinenode.com/movie_poster/32/full/cendrillon-31971.jpg'),
(4, 'Pinocchio', 1, 3, 1, 'http://www.septieme-sens.net/medias/images/pinocchio-40-12.jpg'),
(5, 'Bambi', 1, 1, 0, 'http://t1.gstatic.com/images?q=tbn:ANd9GcRdv_Vyc6LuspJvnuMiZD8FVNHII4X-9YNNUF-nXoByFaK2x6Zq23xU4VEPiA'),
(6, 'Dumbo, l''éléphant volant', 1, 0, 1, 'http://www.avcesar.com/source/software/tmdb/147/couv_dumbo.jpg'),
(7, 'La Belle au bois dormant', 1, 1, 1, 'http://www.jdbn.fr/wp-content/uploads/2015/02/la-belle-au-bois-dormant-349850.jpg'),
(8, 'Alice au pays des merveilles', 1, 1, 0, 'http://marvelll.fr/wp-content/uploads/alice-au-pays-des-merveilles-1951-affiche.jpg'),
(9, 'Peter Pan', 1, 1, 1, 'http://fr.web.img2.acsta.net/pictures/14/03/27/15/34/467713.jpg'),
(10, 'La Belle et le Clochard ', 0, 1, 2, 'http://images.fan-de-cinema.com/affiches/large/a3/54565.jpg'),
(11, 'Merlin l''Enchanteur', 1, 1, 3, 'http://www.movies-collection.com/images/affiches/merlin-lenchanteur-1.jpg'),
(12, 'Le Livre de la jungle', 1, 2, 1, 'http://ecx.images-amazon.com/images/I/A1-fyqS8BIL._SL1500_.jpg'),
(13, 'Les Aristochats ', 1, 1, 11, 'http://www.notrecinema.com/images/cache/les-aristochats-poster_4218_49227.jpg'),
(14, 'Les Aventures de Winnie l''ourson', 2, 0, 1, 'http://www.filmsanimation.com/images_affiches_originale/les-aventures-de-winnie-lourson/affiche-les-aventures-de-winnie-lourson-1.jpg'),
(15, 'Les Aventures de Bernard et Bianca', 2, 0, 8, 'http://bilette70.b.i.pic.centerblog.net/aventures_bianca.jpg'),
(16, 'Rox et Rouky', 0, 1, 4, 'http://sokrostream.com/wp-content/uploads/2013/10/Rox-et-Rouky-1%C3%A8re-%C3%89dition-DVD-r2.jpg'),
(17, 'La Petite Sirène', 1, 0, 1, 'http://www.cdn-cinenode.com/movie_poster/2/full/la-petite-sirene-2080.jpg'),
(18, 'La Belle et la Bête', 0, 1, 0, 'http://www.lesrencontresdusud.fr/wp-content/uploads/2013/02/La-belle-et-la-b%C3%AAte.jpg'),
(19, 'Aladdin ', 1, 0, 0, 'http://www.notrecinema.com/images/cache/aladdin-poster_64321_16922.jpg'),
(20, 'Le Roi lion ', 2, 0, 0, 'http://3.bp.blogspot.com/-ecbklBTsEoI/T41UUYZgo1I/AAAAAAAAAS0/pD-X1hVD_7M/s1600/pM4w7A48OcdHlKweMef8HV2EfFD.jpg'),
(21, 'Pocahontas, une légende indienne', 0, 1, 0, 'https://s-media-cache-ak0.pinimg.com/originals/f2/99/dc/f299dcf7142385724f41acd8e01cbe09.jpg'),
(22, 'Le Bossu de Notre-Dame ', 1, 1, 0, 'http://media.senscritique.com/media/000000039217/source_big/Le_Bossu_de_Notre_Dame.jpg'),
(23, 'Hercule ', 1, 0, 0, 'http://www.filmsanimation.com/images_affiches_originale/hercule/affiche-hercule-1.jpg'),
(24, 'Mulan', 1, 0, 0, 'http://cf2.imgobject.com/t/p/original/dMQBDEUbP9noFQGXkINJ6koCXlW.jpg'),
(25, 'Tarzan', 0, 1, 0, 'http://www.notrecinema.com/images/cache/tarzan-poster_405375_47229.jpg'),
(26, 'Kuzco, l''empereur mégalo ', 0, 1, 0, 'http://t2.gstatic.com/images?q=tbn:ANd9GcRz13liEJ_WvFWfnpx_2fX64uB_qkw6gtNUeTjbFAPNrwzlG7rXNccYJ_0y'),
(27, 'Atlantide, l''empire perdu', 0, 0, 1, 'http://image.noelshack.com/fichiers/2013/17/1367066629-affiche-atlantide-lempire-perdu-1.jpg'),
(28, 'Lilo et Stitch', 1, 0, 0, 'http://disney.magie.free.fr/films/LiloEtStitch/gallery/affiches/poster_LiloEtStitch_usa_08.jpg'),
(29, 'Frère des ours', 0, 1, 0, 'http://ekladata.com/QAB_MQQ6j_-RR29sPmsXVR5Diw4.jpg'),
(30, 'La ferme se rebelle', 1, 0, 0, 'http://media-passion.fr/Gallery/main/Poster-482416.jpg'),
(31, 'Chicken Little ', 0, 0, 1, 'http://media.senscritique.com/media/000005675897/source_big/Chicken_Little_La_BD_du_film.jpg'),
(32, 'Volt, star malgré lui ', 0, 1, 0, 'http://www.critikat.com/IMG/artoff2829.jpg?1387447908'),
(33, 'La Princesse et la Grenouille', 0, 1, 0, 'http://media.zoom-cinema.fr/photos/11314/affiche-la-princesse-et-la-grenouille.jpg'),
(34, 'Raiponce ', 1, 0, 0, 'http://img.filmsactu.net/datas/films/r/a/raiponce/xl/4cdabcd0f06b0.jpg'),
(35, 'La Reine des neiges', 1, 0, 0, 'http://fr.web.img5.acsta.net/pictures/210/521/21052146_20131023144339759.jpg'),
(36, 'Les Nouveaux Héros ', 1, 0, 0, 'http://www.filmosphere.com/wp-content/uploads/2015/02/les-nouveaux-heros-affiche.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;