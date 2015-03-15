SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `cookies` (
  `id` varchar(32) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `pending_users` (
  `user` varchar(120) NOT NULL,
  `token` char(32) CHARACTER SET ascii NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `pending_users` (`user`, `token`) VALUES
('koukou@gmail.com', '5cef93d221a713f91c4c4662ef2e6483'),
('koikp@gmail.com', '50e19bfcf4faa7c735c0dbd4f3aac826');

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

INSERT INTO `users` (`id`, `mail`, `password`, `active`) VALUES
(7, 'rana@gmail.com', '6b90f4796aac8afeafdb24b01f5a52e15a56898e49e73a9c44ccc03a13c6c9d1', 0),
(8, 'ranaa@gmail.com', '6b90f4796aac8afeafdb24b01f5a52e15a56898e49e73a9c44ccc03a13c6c9d1', 1),
(9, 'koukou@gmail.com', '6b90f4796aac8afeafdb24b01f5a52e15a56898e49e73a9c44ccc03a13c6c9d1', 0),
(10, 'koikp@gmail.com', '6b90f4796aac8afeafdb24b01f5a52e15a56898e49e73a9c44ccc03a13c6c9d1', 0);
