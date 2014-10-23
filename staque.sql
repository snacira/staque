-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 23 Octobre 2014 à 10:26
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `answer`
--

INSERT INTO `answer` (`id`, `content`, `user_id`, `question_id`, `dateCreated`, `dateModified`) VALUES
(1, 'réponse 1 pop-up ', 1, 3, '2014-10-21 00:00:00', '0000-00-00 00:00:00'),
(2, 'réponse 2 pop-up', 2, 3, '2014-10-20 00:00:00', '0000-00-00 00:00:00'),
(3, 'réponse 3 pop up', 5, 3, '2014-10-22 13:04:39', '2014-10-22 13:04:39');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `questionOrAnswer` int(11) NOT NULL,
  `questionOrAnswer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `questionOrAnswer`, `questionOrAnswer_id`, `user_id`) VALUES
(1, 'comm 1 quest pop-up', 0, 3, 1),
(2, 'comm 2 quest pop-up', 0, 3, 2),
(3, 'comme 3 quest pop-up', 0, 3, 5),
(4, 'comm 1 rép 3', 1, 3, 5),
(5, 'comm 2 rép 3', 1, 3, 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id`, `title`, `content`, `tags`, `user_id`, `dateCreated`, `dateModified`, `vues`, `points`) VALUES
(1, 'Comment utiliser Git ?', 'GIT Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Git', 1, '2014-09-12 08:23:38', '1900-02-22 06:13:11', 35, 0),
(2, 'Comment uploader une image ?', 'IMAGE Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'php', 2, '2014-10-01 08:31:39', '2014-10-15 19:51:51', 33, 1),
(3, 'Comment faire une pop-up ?', 'POP-UP Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'php,ajax,javascript', 3, '2014-10-18 12:21:17', '0000-00-00 00:00:00', 205, 0),
(4, 'Ajouter des classes à Jquery datepicker', '<p>JQUERY Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>\n<p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>\n<p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>\n<p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p>\n<p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>', '', 999, '2014-10-22 10:51:05', '2014-10-22 10:51:05', 0, 0),
(5, 'Faire une requête Ajax', '<p>AJAX Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>\r\n<p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>\r\n<p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>\r\n<p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p>\r\n<p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>', '', 5, '2014-10-22 11:07:07', '2014-10-22 11:07:07', 0, 0),
(6, 'Google maps', '<p>Google maps&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>\r\n<p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>\r\n<p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>', 'Google, plugin', 5, '2014-10-22 12:30:49', '2014-10-22 12:30:49', 3, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `image`, `pseudo`, `mail`, `password`, `salt`, `token`, `birthday`, `job`, `location`, `lang`, `score`, `vote`, `websites`, `dateRegistred`, `dateModified`, `dateConnected`) VALUES
(1, 'Rabia', 'perso1.jpg', 'toto', 'toto@gmail.com', 'totototo', '', '', '1970-01-01', 'job de Rabia', 'location de Rabia', 'français, anglais', 26, 0, 'www.rabia.com', '2014-10-01', '0000-00-00', '0000-00-00 00:00:00'),
(2, 'Nacira', 'perso2.jpg', 'titi', 'titi@gmail.com', 'titititi', '', '', '1980-12-12', 'job de Nacira', 'location de Nacira', 'français, espagnol', 54, 0, 'www.nacira.com', '2014-10-03', '0000-00-00', '0000-00-00 00:00:00'),
(3, 'Marcello', 'perso3.jpg', 'tutu', 'tutu@gmail.com', 'tututu', '', '', '1990-10-08', 'job de Marcello', 'location de Marcello', 'français, allemand, danois', 88, 0, 'www.marcello.com', '2014-10-08', '0000-00-00', '0000-00-00 00:00:00'),
(4, 'Simpson', '', 'homer1', 'h.simpson@gmail.com', 'ccf415669d794db99fede34bd94c68727f766cd2af690b031fa943cf4816bc2dcb67b9c8e2b6e6ec6647ea6bf7fa647e7ca58b5169e5fb3860315a88afe3f92e', 'BbiQpBLzvQtqLggQfNRdcT3nhwEPrzdo9lc9Ki32DpOupXZbXr', 'zXNytE42Ifhwq3lL8nDQsLgdINMMSsW4mla8D3Zotfl04tXcos', '0000-00-00', '', '', '', 0, 0, '', '2014-10-22', '2014-10-22', '0000-00-00 00:00:00'),
(5, 'Potter', '', 'harry1', 'h.potter@gmail.com', '6613bcfd76e7e21d9a6ee7691233c505038adf7792930192da7b91cc4ccb3400dbd07002d4345394d91f153d2808cdff0ac6c3f8a43441fe281361342ce68862', '0vDlt2M06aE9HVOF3XVEZqfLz9bwSRD6drXPy8WkMh0b9fY7Q8', 'DwG1g5EJk0j87iosYglQw5aADdeC7e2VHccpJIfag2QhKLld80', '0000-00-00', '', '', '', 5, 0, '', '2014-10-22', '2014-10-22', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
