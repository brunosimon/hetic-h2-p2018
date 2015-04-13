-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  antoinemygplayer.mysql.db
-- Généré le :  Lun 30 Mars 2015 à 23:04
-- Version du serveur :  5.5.41-0+wheezy1-log
-- Version de PHP :  5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `antoinemygplayer`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `votes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Contenu de la table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `url`, `votes`) VALUES
(1, 'Cristiano Ronaldo', 'http://cristianoronaldofan.net/files/2012/02/cristiano-ronaldo-v-levante3.jpg', 7),
(2, 'Lionel Messi', 'http://live.orange.com/wp-content/uploads/2013/01/messi.jpg', 2),
(3, 'Zlatan Ibrahimović', 'http://40.media.tumblr.com/12976b2ac61c017a7e41c31e7cbf0c63/tumblr_nbuwgcXOKA1rd6tzso1_500.jpg', 10),
(4, 'Manuel Neuer', 'https://s-media-cache-ak0.pinimg.com/736x/8c/2a/fc/8c2afcb9605119300b4285c615d23d00.jpg', 11),
(5, 'Thiago Motta', 'http://www.blaugranas.com/media/galeria/25/9/4/4/1/n_f_c_barcelona_thiago_motta-9141449.jpeg', 1),
(6, 'Marco Verratti', 'https://41.media.tumblr.com/8185f6d2e278023dd580383d8d048e8f/tumblr_nlpsb3QefW1tmpga8o1_500.jpg', 3),
(7, 'Zinedine Zidane', 'https://pbs.twimg.com/profile_images/3426456034/4c3cd4061d0b3df18784eaa16fb1d80e.jpeg', 9),
(8, 'Thierry Henry', 'http://static.dnaindia.com/sites/default/files/2014/08/18/260378-thierry-henry.jpg', 4),
(9, 'Gerard Piqué', 'http://www.topnews.in/files/Gerard-Pique-Photo-1.jpg', 0),
(10, 'Fernando Torres', 'http://4.bp.blogspot.com/-ThyClKrww64/TyV1KQUzooI/AAAAAAAADjw/TtTEPDoCCPY/s1600/FERNANDO+TORRES.png', 1),
(11, 'Wayne Rooney', 'https://pbs.twimg.com/media/Br7_AE_IEAAF_qJ.jpg', 1),
(12, 'Andrès Iniesta', 'https://41.media.tumblr.com/add9e689048bd81dfc2963a787d65744/tumblr_nffqkhO96K1r3ut4bo1_500.jpg', 1),
(13, 'Neymar Jr.', 'http://static.dnaindia.com/sites/default/files/2015/02/04/307258-neymar.jpg', 4),
(14, 'Iker Casillas', 'http://data2.whicdn.com/images/51637529/large.jpg', 3),
(15, 'Diego Maradona', 'https://pbs.twimg.com/profile_images/2173029819/image.jpg', 4),
(16, 'Pelé', 'http://www.starmedia.com/imagenes/2011/05/pele_brasil_93ea3626c0f3614c1ca148d841.jpg', 1),
(17, 'Ronaldo', 'http://ici.radio-canada.ca/special/bresil-au-mondial/events/2002/header-mobile.jpg', 5),
(18, 'Franz Beckenbauer', 'http://file1.npage.de/004723/64/bilder/beckenbauer.jpg', 6),
(19, 'Michel Platini', 'http://www.asse-stats.com/img/personne/michel-platini.jpg', 5),
(20, 'Johan Cruyff', 'https://pbs.twimg.com/profile_images/378800000191087144/61daa45a8d84b5cf436c018019c7dc8d.jpeg', 3),
(21, 'Salvatore Sirigu', 'http://40.media.tumblr.com/b61aff556200d822e7f16ddafb3fedfd/tumblr_nlpnmcP4791t6sag7o1_500.jpg', 2),
(22, 'Gianluigi Buffon', 'http://static.dnaindia.com/sites/default/files/2014/06/14/243642-gianluigi-buffon.jpg', 2),
(23, 'Steve Mandanda', 'https://i1.sndcdn.com/artworks-000021059997-s472no-t500x500.jpg?e76cf77', 0),
(24, 'Petr Cech', 'http://supergigant.blox.pl/resource/PetrCechNew.jpg', 3),
(25, 'Thiago Silva', 'http://static.dnaindia.com/sites/default/files/2014/08/12/258625-thiago-silva.jpg', 5),
(26, 'David Luiz', 'http://somosinvictos.com/wp-content/uploads/2014/12/David2.jpg', 1),
(27, 'Dani Alves', 'http://media.tumblr.com/tumblr_lhahhcF0HR1qe63m2.gif', 1),
(28, 'Carles Puyol', 'http://static.dnaindia.com/sites/default/files/1936249.jpg', 1),
(29, 'Christophe Jallet', 'http://s1.dmcdn.net/EBV_w/500x500-f9R.jpg', 0),
(30, 'Raphaël Varane', 'https://headbandsandheartbreak.files.wordpress.com/2011/11/varane.jpg', 2),
(31, 'Patrice Evra', 'http://static3.bornrichimages.com/cdn2/500/500/91/c/wp-content/uploads/2014/02/evra1_thumb.jpg', 0),
(32, 'Sergio Ramos', 'http://36.media.tumblr.com/65878806a7c1ad1a51f9fc8d29dce3c6/tumblr_ndwvk8oKrh1qfgmmzo1_500.jpg', 4),
(33, 'Jordi Alba', 'https://pbs.twimg.com/profile_images/2351569105/image.jpg', 1),
(34, 'Jerome Boateng', 'http://karawangtoday.com/wp/wp-content/uploads/2014/07/jerome-boateng-500x500.jpg', 0),
(35, 'Philippe Lahm', 'http://static.dnaindia.com/sites/default/files/2014/07/02/247521-phillip-lahm.jpg', 2),
(36, 'Vincent Kompany', 'https://i1.sndcdn.com/artworks-000108033101-yqviuv-t500x500.jpg', 0),
(37, 'Marcelo', 'http://40.media.tumblr.com/db2b7e55cfd263ab68b4fb2e62b5be15/tumblr_nkzym7It851rd9vbyo1_500.jpg', 0),
(38, 'Pepe', 'http://static.dnaindia.com/sites/default/files/2014/09/19/268743-454438764.jpg', 1),
(39, 'Lucas Moura', 'https://d1e8p8zndrobnw.cloudfront.net/assets/images/cached/DIWCN3p-360.jpg', 1),
(40, 'Xabi Alonso', 'https://pbs.twimg.com/profile_images/2292245575/image.jpg', 0),
(41, 'Xavi', 'http://www.newrepublic.com/sites/default/files/migrated/xavi.JPG', 0),
(42, 'Sergio Busquets', 'http://www.futbolreal.com/wp-content/uploads/2011/05/sergio-busquets.jpg', 0),
(43, 'Cesc Fabregas', 'http://www.chelsea-news.co/wp-content/uploads/2015/03/Cesc-Fabregas-11-500x500.jpg', 0),
(44, 'Steven Gerrard', 'http://static.dnaindia.com/sites/default/files/2015/01/04/298465-steven-gerrard.jpg', 0),
(45, 'Eden Hazard', 'http://sp2.fotolog.com/photo/2/3/82/aa8vertulli/13891424219423_f.jpg', 1),
(46, 'Franck Lampard', 'http://sp2.fotolog.com/photo/2/3/82/aa8vertulli/13585633480737_f.jpg', 1),
(47, 'Luka Modrić', 'http://40.media.tumblr.com/9802ae6996344316ef042d0304c46071/tumblr_nf5jgngdFK1rch221o1_500.png', 0),
(48, 'Andrea Pirlo', 'https://s-media-cache-ak0.pinimg.com/736x/21/5d/c9/215dc96b6228359df6ae38576d5a05f9.jpg', 3),
(49, 'Mesut Özil', 'http://cdn.starflash.de/bilder/junger-fussballer-mesut-oezil-500x500-1454.jpg', 0),
(50, 'Franck Ribéry', 'http://payload.cargocollective.com/1/1/53212/643294/412-059Ribery500sq.jpg', 2),
(51, 'David Silva', 'http://static.dnaindia.com/sites/default/files/2014/08/12/258699-david-silva.jpg', 0),
(52, 'Bastian Schweinsteiger', 'http://cdn.starflash.de/bilder/bastian-schweinsteiger-500x500-13585.jpg', 0),
(53, 'Yaya Touré ', 'https://i1.sndcdn.com/artworks-000076407014-vovolr-t500x500.jpg', 2),
(54, 'Michael Essien', 'https://pbs.twimg.com/profile_images/2576967383/image.jpg', 0),
(55, 'Wesley Sneijder', 'http://www.haberler.com/haber-resimleri/253/sneijder-sezon-sonu-yolcu-4631253_6679_o.jpg', 0),
(56, 'Toni Kroos', 'http://sp6.fotolog.com/photo/54/52/60/love_football_8/1325724155250_f.jpg', 1),
(57, 'Paul Pogba', 'http://createapk.com/project/2014/06/achmadyusron/paul-pogba-hd-wallpaper/icon.png', 9),
(58, 'James Rodriguez', 'https://pbs.twimg.com/profile_images/489780920010809344/GwI1euu2.jpeg', 0),
(59, 'Arturo Vidal', 'http://img2.wikia.nocookie.net/__cb20140603183545/fifa/es/images/thumb/f/f1/Arturo_Vidal.png/500px-A', 0),
(60, 'Sergio Aguero', 'http://static.dnaindia.com/sites/default/files/2014/07/09/249135-238413-sergio.jpg', 1),
(61, 'Mario Balotelli', 'http://static.dnaindia.com/sites/default/files/2014/08/22/261569-mario-balotelli-getty.jpg', 1),
(62, 'Karim Benzema', 'http://static.dnaindia.com/sites/default/files/2014/08/26/262512-karim-benzema.jpg', 4),
(63, 'Edinson Cavani', 'http://data2.whicdn.com/images/151194214/large.jpg', 0),
(64, 'Didier Drogba', 'http://static.dnaindia.com/sites/default/files/1870133.jpg', 1),
(65, 'Samuel Eto''o', 'http://camer-sport.be/UserFiles/Image/eto''o-buteur-contre-la-zamb.jpg', 3),
(66, 'Radamel Falcao', 'http://static.dnaindia.com/sites/default/files/2015/02/27/314466-falcao.jpg', 1),
(67, 'Mario Gomez', 'http://25.media.tumblr.com/tumblr_m6awu7RYVK1qdtao2o1_500.jpg', 0),
(68, 'Robin Van Persie', 'http://createapk.com/project/2014/06/achmadyusron/robin-van-persie-hd-wallpaper/icon.png', 7),
(69, 'Luis Suarez', 'http://static.dnaindia.com/sites/default/files/2014/07/11/249920-1938472.jpg', 0),
(70, 'Robert Lewandowski', 'https://pbs.twimg.com/profile_images/378800000169383812/44388901d4914f6c43acd3231e2c4b57.jpeg', 0),
(71, 'Gonzalo Higuaín', 'http://spd.fotolog.com/photo/45/3/25/gagoehiguain/1326825836664_f.jpg', 0),
(72, 'Edin Džeko', 'http://static1.bornrichimages.com/cdn2/500/500/91/c/wp-content/uploads/2014/02/edin2_thumb.jpg', 0),
(73, 'Carlo Tévez', 'http://www.goaltodaylive.com/wp-content/uploads/Carlos-Tevez-Juventus1.jpg', 0),
(74, 'Gareth Bale', 'http://cdn.blogs.revistagq.com/esmoquinroom/wp-content/uploads/2013/08/bale_gtres.jpg', 0),
(75, 'Ronaldinho', 'http://s5.as.com/recorte/20091223dasdasftb_7/XLCO/Ies/imagen_Ronaldinho_celebrando_gol_camiseta.jpg', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
