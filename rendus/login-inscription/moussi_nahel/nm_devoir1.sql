-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: 10.246.17.13:3306
-- Generation Time: Mar 08, 2015 at 07:37 PM
-- Server version: 5.5.41-MariaDB-1~wheezy
-- PHP Version: 5.3.3-7+squeeze15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `magnhetic_fr`
--

-- --------------------------------------------------------

--
-- Table structure for table `nm_devoir1`
--

CREATE TABLE IF NOT EXISTS `nm_devoir1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `activer` int(2) NOT NULL,
  `n_password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `nm_devoir1`
--

INSERT INTO `nm_devoir1` (`id`, `prenom`, `email`, `password`, `token`, `activer`, `n_password`) VALUES
(38, 'Nahel', 'nahel.moussi@hetic.net', '1aa3e864b12fc2d19f99f7220eff124e3ddefec3', '2ac0944876380e8694919ba24976012aae54a75d', 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
