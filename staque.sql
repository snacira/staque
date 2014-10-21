-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 21 Octobre 2014 à 16:44
-- Version du serveur :  5.6.16
-- Version de PHP :  5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `staque`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateModified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `answer`
--

INSERT INTO `answer` (`id`, `content`, `user_id`, `question_id`, `dateCreated`, `dateModified`) VALUES
(1, 'réponse 1 Comment faire une pop-up ?', 1, 3, '2014-10-21 00:00:00', '0000-00-00 00:00:00'),
(2, 'réponse 2 Comment faire une pop-up ?', 2, 3, '2014-10-20 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `questionOrAnswer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `questionOrAnswer_id`, `user_id`) VALUES
(1, 'commentaire 1 comment faire une pop-up', 3, 1),
(2, 'commentaire 2 comment faire une pop-up', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `content_com`
--

CREATE TABLE IF NOT EXISTS `content_com` (
  `comment_id` int(11) NOT NULL,
  `questionOrAnswer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `tags` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateModified` datetime NOT NULL,
  `vues` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id`, `title`, `content`, `tags`, `user_id`, `dateCreated`, `dateModified`, `vues`, `points`) VALUES
(1, 'Comment utiliser Git ?', 'GIT Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Git', 1, '2014-09-12 08:23:38', '1900-02-22 06:13:11', 28, 0),
(2, 'Comment uploader une image ?', 'IMAGE Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'php', 2, '2014-10-01 08:31:39', '2014-10-15 19:51:51', 21, 1),
(3, 'Comment faire une pop-up ?', 'POP-UP Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'php,ajax,javascript', 3, '2014-10-18 12:21:17', '0000-00-00 00:00:00', 129, 0);

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `score` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`id`, `tag`, `description`) VALUES
(1, 'git', 'lorem ipsum'),
(2, 'php', 'ffghhjjj'),
(3, 'ajax', '');

-- --------------------------------------------------------

--
-- Structure de la table `tag_question`
--

CREATE TABLE IF NOT EXISTS `tag_question` (
  `tag_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tag_question`
--

INSERT INTO `tag_question` (`tag_id`, `question_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(2, 3),
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` varchar(150) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varbinary(256) NOT NULL,
  `token` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `job` varchar(150) NOT NULL,
  `location` varchar(100) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `score` int(10) NOT NULL,
  `vote` int(10) NOT NULL,
  `websites` varchar(150) NOT NULL,
  `dateRegistred` date NOT NULL,
  `dateModified` date NOT NULL,
  `dateConnected` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `image`, `pseudo`, `mail`, `password`, `salt`, `token`, `birthday`, `job`, `location`, `lang`, `score`, `vote`, `websites`, `dateRegistred`, `dateModified`, `dateConnected`) VALUES
(1, 'Rabia', '1.jpg', 'toto', 'toto@gmail.com', 'totototo', '', '', '1970-01-01', 'job de Rabia', 'location de Rabia', 'français, anglais', 26, 0, 'www.rabia.com', '2014-10-01', '0000-00-00', '0000-00-00 00:00:00'),
(2, 'Nacira', '2.jpg', 'titi', 'titi@gmail.com', 'titititi', '', '', '1980-12-12', 'job de Nacira', 'location de Nacira', 'français, espagnol', 54, 0, 'www.nacira.com', '2014-10-03', '0000-00-00', '0000-00-00 00:00:00'),
(3, 'Marcello', '3.jpg', 'tutu', 'tutu@gmail.com', 'tututu', '', '', '1990-10-08', 'job de Marcello', 'location de Marcello', 'français, allemand, danois', 88, 0, 'www.marcello.com', '2014-10-08', '0000-00-00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
