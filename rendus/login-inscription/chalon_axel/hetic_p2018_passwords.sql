--
-- Base de données :  `hetic_p2018_passwords`
--

-- --------------------------------------------------------

--
-- Structure de la table `tokens_reset`
--

CREATE TABLE IF NOT EXISTS `tokens_reset` (
  `token` varchar(255) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tokens_verify`
--

CREATE TABLE IF NOT EXISTS `tokens_verify` (
  `token` varchar(255) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(17) NOT NULL,
  `mail` tinytext NOT NULL,
  `password` varchar(64) NOT NULL,
  `last_visit` datetime DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `referrer_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `referrer_id` (`referrer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
