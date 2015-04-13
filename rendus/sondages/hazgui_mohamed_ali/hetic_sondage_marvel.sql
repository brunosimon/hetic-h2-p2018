-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 31 Mars 2015 à 00:59
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `hetic_sondage_marvel`
--

-- --------------------------------------------------------

--
-- Structure de la table `info_superheros`
--

CREATE TABLE `info_superheros` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `creation` varchar(255) NOT NULL,
  `weapons` varchar(255) NOT NULL,
  `image_mini` varchar(255) NOT NULL,
  `image_maxi` varchar(255) NOT NULL,
  `real_name` varchar(255) NOT NULL,
  `Story` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `info_superheros`
--

INSERT INTO `info_superheros` (`id`, `name`, `creation`, `weapons`, `image_mini`, `image_maxi`, `real_name`, `Story`) VALUES
(1, 'Spider-Man', '1962 by Stan Lee and Steve Dikto', 'nothing', 'Spider_man_mini.png', 'Spider_man_maxi.jpg', 'Peter Parker', 'Bitten by a radioactive spider, high school student Peter Parker gained the speed, strength and powers of a spider. Adopting the name Spider-Man, Peter hoped to start a career using his new abilities. Taught that with great power comes great responsibility, Spidey has vowed to use his powers to help people. '),
(2, 'Hulk', '1962 by Stan Lee and Jack Kirby', 'nothing', 'Hulk_mini.png', 'Hulk_maxi.jpg', 'Bruce Banner', 'Caught in a gamma bomb explosion while trying to save the life of a teenager, Dr. Bruce Banner was transformed into the incredibly powerful creature called the Hulk. An all too often misunderstood hero, the angrier the Hulk gets, the stronger the Hulk gets.'),
(3, 'Thor', '1962 by Stan Lee, Larry Lieber and Jack Kirby', 'Mjöllnir ', 'Thor_mini.png', 'Thor_maxi.jpg', 'Thor', 'As the Norse God of thunder and lightning, Thor wields one of the greatest weapons ever made, the enchanted hammer Mjolnir. While others have described Thor as an over-muscled, oafish imbecile, he''s quite smart and compassionate. He''s self-assured, and he would never, ever stop fighting for a worthwhile cause'),
(4, 'Iron Man', '1963 by Stan Lee and Jack Kirby', 'High Tech Armor', 'Iron_man_mini.png', 'Iron_man_maxi.jpg', 'Tony Stark', 'Wounded, captured and forced to build a weapon by his enemies, billionaire industrialist Tony Stark instead created an advanced suit of armor to save his life and escape captivity. Now with a new outlook on life, Tony uses his money and intelligence to make the world a safer, better place as Iron Man. '),
(5, 'Captain America', '1940 by Jack Kirby and Joe Simon', 'Shiled in vibranium, Harley Davidson modified\r\n', 'Captain_America_mini.png', 'Captain_America_maxi.jpg', 'Steve Rogers', 'Vowing to serve his country any way he could, young Steve Rogers took the super soldier serum to become America''s one-man army. Fighting for the red, white and blue for over 60 years, Captain America is the living, breathing symbol of freedom and liberty. '),
(6, 'Wolverine', '1974 by Len Wein, John Romita and Herb Trimpe', 'Adamentium Skeleton', 'Wolverine_mini.png', 'Wolverine_maxi.jpg', 'Logan (James Howlett)', 'Born with super-human senses and the power to heal from almost any wound, Wolverine was captured by a secret Canadian organization and given an unbreakable skeleton and claws. Treated like an animal, it took years for him to control himself. Now, he''s a premiere member of both the X-Men and the Avengers.');

-- --------------------------------------------------------

--
-- Structure de la table `vote_personnages`
--

CREATE TABLE `vote_personnages` (
`id` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vote_personnages`
--

INSERT INTO `vote_personnages` (`id`, `votes`, `name`) VALUES
(1, 26, 'Spider-Man'),
(2, 65, 'Hulk'),
(3, 5, 'Thor'),
(4, 3, 'Iron Man'),
(5, 0, 'Captain America'),
(6, 4, 'Wolverine');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `info_superheros`
--
ALTER TABLE `info_superheros`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vote_personnages`
--
ALTER TABLE `vote_personnages`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `info_superheros`
--
ALTER TABLE `info_superheros`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `vote_personnages`
--
ALTER TABLE `vote_personnages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;