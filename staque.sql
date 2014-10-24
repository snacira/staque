-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 24 Octobre 2014 à 14:35
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
  `best_answer` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `answer`
--

INSERT INTO `answer` (`id`, `content`, `user_id`, `question_id`, `dateCreated`, `dateModified`, `best_answer`) VALUES
(11, '<p>JE r&eacute;ponds</p>', 8, 15, '2014-10-24 13:37:49', '2014-10-24 13:37:49', 0),
(12, '<p>sdfdsffffffffffffffffffffff</p>', 7, 15, '2014-10-24 13:38:30', '2014-10-24 13:38:30', 0),
(13, '<p>dfqsfsdfsdfqsdf</p>', 7, 15, '2014-10-24 13:38:35', '2014-10-24 13:38:35', 0),
(14, '<p>tu viens plus aux soir&eacute;es?</p>', 10, 16, '2014-10-24 14:32:12', '2014-10-24 14:32:12', 0),
(15, '<p>Kikou, c''est encore moi</p>', 9, 16, '2014-10-24 14:34:00', '2014-10-24 14:34:00', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `questionOrAnswer`, `questionOrAnswer_id`, `user_id`) VALUES
(1, 'comm 1 quest pop-up', 0, 3, 1),
(2, 'comm 2 quest pop-up', 0, 3, 2),
(3, 'comme 3 quest pop-up', 0, 3, 5),
(4, 'comm 1 rép 3', 1, 3, 5),
(5, 'comm 2 rép 3', 1, 3, 5),
(6, '<p>g&eacute;nial</p>', 1, 3, 6),
(7, '<p>c''est encore moi YOOOOOOOOOOOO</p>', 1, 10, 7),
(8, '<p>sdsfsdgfdesgf</p>', 1, 11, 7),
(9, '<p>dsfsdf</p>', 1, 11, 7),
(10, '<p>dgdfgdfg</p>', 0, 11, 7),
(11, '<p>fgdfgf</p>', 1, 11, 7),
(12, '<p>dqsdqsdqs</p>', 0, 12, 7),
(13, '<p>dqsd</p>', 0, 11, 7),
(14, '<p>commentaire de yo2</p>', 0, 13, 8),
(15, '<p>commentaire de la r&eacute;ponse de yo2</p>', 1, 13, 8),
(16, '<p>r&eacute;ponse de yo</p>', 1, 13, 7),
(17, '<p>reponse de yo2</p>', 1, 13, 7),
(18, '<p>reponse de yo</p>', 1, 13, 7),
(19, '<p>commentaire de yo</p>', 1, 13, 7),
(20, '<p>&ccedil;a va?</p>', 0, 13, 7),
(21, '<p>je suis encore la</p>', 0, 13, 7),
(22, '<p>dddddddddddddddddd</p>', 1, 13, 7),
(23, '<p>vvvvvvvvvvvvvvvvvvv</p>', 1, 13, 7),
(24, '<p>ccccccccccccccccc</p>', 0, 13, 7),
(25, '<p>cccccccccccccccccccc</p>', 1, 13, 7),
(26, '<p>commentairessss</p>', 1, 7, 7),
(27, '<p>fdqfdqsfq</p>', 1, 4, 7),
(28, '<p>fqsfqsf</p>', 1, 4, 7),
(29, '<p>dfssdfsdf</p>', 1, 4, 7),
(30, '<p>sqsfqsf</p>', 0, 10, 7),
(31, '<p>sdfdsfs</p>', 0, 10, 7),
(32, '<p>commmmmmmmmmmmmmmmmmmmenntaiiireee</p>', 0, 15, 8),
(33, '<p>sdqfqsdfdqsfsdf</p>', 0, 15, 7),
(34, '<p>Allez vienns!!!</p>', 1, 14, 10),
(35, '<p>tkt gros!!</p>', 1, 14, 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id`, `title`, `content`, `tags`, `user_id`, `dateCreated`, `dateModified`, `vues`, `points`) VALUES
(1, 'Comment utiliser Git ?', 'GIT Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Git', 1, '2014-09-12 08:23:38', '1900-02-22 06:13:11', 35, 0),
(2, 'Comment uploader une image ?', 'IMAGE Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'php', 2, '2014-10-01 08:31:39', '2014-10-15 19:51:51', 33, 1),
(3, 'Comment faire une pop-up ?', 'POP-UP Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'php,ajax,javascript', 3, '2014-10-18 12:21:17', '0000-00-00 00:00:00', 212, 0),
(4, 'Ajouter des classes à Jquery datepicker', '<p>JQUERY Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>\n<p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>\n<p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>\n<p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p>\n<p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>', '', 999, '2014-10-22 10:51:05', '2014-10-22 10:51:05', 3, 0),
(5, 'Faire une requête Ajax', '<p>AJAX Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>\r\n<p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>\r\n<p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>\r\n<p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p>\r\n<p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>', '', 5, '2014-10-22 11:07:07', '2014-10-22 11:07:07', 3, 0),
(6, 'Google maps', '<p>Google maps&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>\r\n<p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>\r\n<p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>', 'Google, plugin', 5, '2014-10-22 12:30:49', '2014-10-22 12:30:49', 17, 0),
(7, 'question de nass', '<p>c ma question la plus mieux!</p>', 'html css', 6, '2014-10-23 13:22:39', '2014-10-23 13:22:39', 5, 0),
(8, 'dwxxx', '<p>xwcwxcwxcwx</p>', '', 6, '2014-10-23 13:39:12', '2014-10-23 13:39:12', 8, 0),
(9, 'xwcwxvxwvnhgfhjfg', '<p>dsfhtgfjgh,jfxbdwgdws</p>', 'xfxfbvg', 6, '2014-10-23 13:39:20', '2014-10-23 13:39:20', 3, 0),
(10, 'question 3 nas', '<p>question 3 nas</p>', '', 6, '2014-10-23 13:47:57', '2014-10-23 13:47:57', 23, 0),
(11, 'c''est moi yo2', '<p><span style="font-family: Arial, ''Liberation Sans'', ''DejaVu Sans'', sans-serif; font-size: 13px; line-height: 15.3599996566772px;">I wrote the wrong thing in a commit message. How do I change the message? I have not yet pushed the commit to anyone.</span></p>', '', 8, '2014-10-23 15:22:12', '2014-10-23 15:22:12', 15, 0),
(12, 'hellooo', '<p><span style="font-family: Arial, ''Liberation Sans'', ''DejaVu Sans'', sans-serif; font-size: 13px; line-height: 15.3599996566772px;">I wrote the wrong thing in a commit message. How do I change the message? I have not yet pushed the commit to anyone.</span></p>', '', 7, '2014-10-23 15:28:37', '2014-10-23 15:28:37', 10, 0),
(13, 'QUESTION DE YO', '<p>DETAIL DE QUESTION&nbsp;DE YO</p>', 'HTML', 7, '2014-10-23 15:37:40', '2014-10-23 15:37:40', 54, 0),
(14, 'dfddddd', '<p>ddddddddddddddddddddddddddddddddddddddddddd</p>', 'html', 7, '2014-10-24 13:36:54', '2014-10-24 13:36:54', 6, 0),
(15, 'sqazeazzzzzzzzz', '<p>zzzzzzzzzzzzzzzzzzzzzzz</p>', '', 7, '2014-10-24 13:37:06', '2014-10-24 13:37:06', 11, 0),
(16, 'Salut vous!', '<p>hellllooooo</p>', 'html', 9, '2014-10-24 14:31:07', '2014-10-24 14:31:07', 7, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `image`, `pseudo`, `mail`, `password`, `salt`, `token`, `birthday`, `job`, `location`, `lang`, `score`, `vote`, `websites`, `dateRegistred`, `dateModified`, `dateConnected`) VALUES
(6, 'nas', 'img/perso1.jpg', 'nas', 'f@gm.fr', 'e0d51fb67d4a73b19d73c6173cb24f520c7264d8e45668fd8f2a93bdbc77cc4b8972bf72194d0ff753e690689a5f298326267df6807220ae6559de219d981d88', 'fFc6cuRPa0rrJmiqjm6MPenKw5r1IWoqgvUYP1HnSYcORRKlY2', 'TZoGYeoMFNErIb6QNJnuzBOsERhlzDUarS7GAevTvCRzPem3W1', '1982-10-10', 'dev', 'france', 'francais', 15, 0, 'ggg.fr', '2014-10-23', '2014-10-23', '0000-00-00 00:00:00'),
(7, 'yo', 'img/perso1.jpg', 'yo', 'aa@hm.fr', '9e6219630b3bfda4f886987e154ef3dd5d0f38a2ccfc92ec584259a840260fffa5f218a3f2ec9b4e2365a02e7af93d0115b7c7503e57996f9cab3a2c03d6ae64', 'Byhpu6lzEnKOAZShBkRYNBRll0iyv9g21vmSplZEXa4kbge1PD', '81OTJAC0Ch8RuWJMS736gqWtJVE73M6rlmFkeFQS8wTEI1vrce', '2014-10-10', 'dev', 'france', 'fff', 15, 0, 'ffff', '2014-10-23', '2014-10-24', '0000-00-00 00:00:00'),
(8, 'yo2', 'img/perso1.jpg', 'yo2', 'dd@ho.com', 'e0586a720309a4a61caa261dc0bff434a24fe5fa281c9f92fa45ba3345d48d2a253089217d25f3522271f1137dde99a809938a55b7b5907146dca7f473a9c5a1', 'FDD4g2earZMB0mbe8ssSe2dJgW3Sue8Yumq8eiWPsTU7YVRmD4', 'X3KGq8I1x4AdbOCZupYSATk8AHriC3KbkxKRU9EmAt01Jr8sEZ', '0000-00-00', '', '', '', 15, 0, '', '2014-10-23', '2014-10-23', '0000-00-00 00:00:00'),
(9, 'marc', 'img/perso5.jpg', 'marc', 'marc@g.grt', '9e1f7a54e960a89e6d65a8144861490d2eeb3548927b4c3bbf56772d6a55d60b6d6220cb00a3b61dfe4eca7744d0f4ba6df91aa92fdf56ea6a490e648bb10f3d', 'sWG1w7pnx0Rwr28VEeXn0dn3LT51rlAOfJBBLdVQc9Dd1bmrGE', 'NnRQWR3fQyrfuHHraXMpeqJN6dKiraLRz2BgJlUR6gUXGDvC5z', '0000-00-00', '', '', '', 15, 0, '', '2014-10-24', '2014-10-24', '0000-00-00 00:00:00'),
(10, 'sarko', 'img/perso4.jpg', 'sarko', 'Sarko@g.fr', 'ff208f62e190005ae67983cc35ad1089409183a21def9706337cfc5e0d6eb3955a1abb90f6867d30eb6fe1d4acea07592f7d3f59a8d790343c70fa1cf78f768e', '2L1OXcUmoYlwJxkjgIlvquComWRGnAGeY4JCpJfqaj77d3Z0vn', 'vBbLNPluKVfcqz0sshfVCPkx16ChfpxLgrKmnYgcrRSqifSoIQ', '0000-00-00', '', '', '', 13, 0, '', '2014-10-24', '2014-10-24', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
