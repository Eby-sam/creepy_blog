-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 18 mai 2022 à 08:05
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `creepy_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `cb_article`
--

DROP TABLE IF EXISTS `cb_article`;
CREATE TABLE IF NOT EXISTS `cb_article` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `user_fk` int(10) UNSIGNED NOT NULL,
  `tag_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_user` (`user_fk`),
  KEY `article_tag` (`tag_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `cb_article`
--

INSERT INTO `cb_article` (`id`, `title`, `content`, `user_fk`, `tag_fk`) VALUES
(17, 'Le nom (The name)', '&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;Je savais qu&amp;#39;il y avait quelque chose qui clochait avec ma grand-m&amp;egrave;re bien-aim&amp;eacute;e. Tout a commenc&amp;eacute; quand elle a commenc&amp;eacute; &amp;agrave; divaguer sur une &amp;laquo;cr&amp;eacute;ature&amp;raquo;.\r\n\r\n&amp;nbsp;\r\n\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;quot;Il me suit...&amp;quot; Chuchotait-elle.\r\n\r\n&amp;nbsp;\r\n\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;Sa peau grise deviendrait infiniment plus grise.\r\n\r\n&amp;nbsp;\r\n\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;quot;Il me parle...&amp;quot; murmurait-elle.\r\n\r\n&amp;nbsp;\r\n\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;Ses pupilles &amp;eacute;taient dilat&amp;eacute;es.\r\n\r\n&amp;nbsp;\r\n\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;Donc, comme toute famille aimante aurait fait, nous avons suppos&amp;eacute; qu&amp;#39;elle &amp;eacute;tait juste &amp;laquo;perdue&amp;raquo; et nous avons d&amp;eacute;cid&amp;eacute; de la mettre dans une maison de retraite. Toujours maintenant et encore une fois, en rendant visite &amp;agrave; ma grand-m&amp;egrave;re bien-aim&amp;eacute;e, je la trouva assise dans sa chaise en train de parler dans la chambre vide. Elle se tourna vers moi et tenta instantan&amp;eacute;ment de me dire quelque chose. Elle me disait ce qu&amp;#39;elle voyait tous les soirs.\r\n\r\n&amp;nbsp;\r\n\r\n&amp;nbsp; &amp;nbsp; &amp;quot;Des trous blancs pour les yeux...&amp;quot;\r\n\r\n&amp;nbsp;\r\n\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;Ses cheveux us&amp;eacute;s semblaient luter pour rester sur son cr&amp;acirc;ne.\r\n\r\n&amp;nbsp;\r\n\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;quot;Il regarde par ma fen&amp;ecirc;tre en attendant sa chance...&amp;quot;\r\n\r\n&amp;nbsp;\r\n\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;Ses yeux papillonnaient partout dans la pi&amp;egrave;ce, effray&amp;eacute;s.\r\n\r\n&amp;nbsp;\r\n\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;quot;Il attend, il attend que je...&amp;quot; Elle se tut un instant et reprit &amp;quot;... Dise son nom...&amp;quot;\r\n\r\n&amp;nbsp;\r\n\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;J&amp;#39;ai consid&amp;eacute;r&amp;eacute; cela comme un autre &amp;eacute;pisode de sa d&amp;eacute;mence et je suis parti. Puis, un autre jour, je suis all&amp;eacute; voir ma grand-m&amp;egrave;re bien-aim&amp;eacute;e. Comme d&amp;#39;habitude, elle &amp;eacute;tait assise dans son fauteuil. Mais cette fois, elle se tourna vers moi et me dit son nom.\r\n\r\n&amp;nbsp;\r\n\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;Ma grand-m&amp;egrave;re bien-aim&amp;eacute;e a myst&amp;eacute;rieusement disparue cette nuit-l&amp;agrave;.\r\n\r\n\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;Depuis ce jour, je lutte pour me souvenir du nom de la cr&amp;eacute;ature qui, soit-disant, la traquait pendant les derni&amp;egrave;res ann&amp;eacute;es de sa vie.\r\n\r\n&amp;nbsp;\r\n\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;Candle Jack, c&amp;#39;est &amp;ccedil;a ?\r\n\r\n&amp;nbsp;\r\n\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;Je ne peux pas me souven-\r\n\r\n\r\n\r\nEn savoir plus :&amp;nbsp;https://creepypastas-fr.webnode.fr/', 8, 1),
(21, 'Dans la grange', '&amp;nbsp;Chaque nuit c&amp;#39;est la m&amp;ecirc;me chose. J&amp;#39;entends des murmures, au d&amp;eacute;but ils n&amp;#39;&amp;eacute;taient presque pas audibles et encore moins compr&amp;eacute;hensible, mais plus les nuit passaient et plus les murmures &amp;eacute;taient clairs.\r\n\r\nCe sont ceux d&amp;#39;une seule personne, un homme. il me crie dessus et me bl&amp;acirc;me mais je ne sais pas pourquoi.\r\n\r\nIl me disait que j&amp;#39;&amp;eacute;tais un sale gosse, que je devrais mourir. J&amp;#39;ai pri&amp;eacute; tous les soirs pour qu&amp;#39;il arr&amp;ecirc;te. le lendemain, j&amp;#39;ai cherch&amp;eacute; d&amp;#39;o&amp;ugrave; venait cette voix, o&amp;ugrave; &amp;eacute;tait cette personne, mais je n&amp;#39;ai rien trouv&amp;eacute;. Toutes les nuits, sa voix horrible transper&amp;ccedil;ait ma t&amp;ecirc;te et me vrillait les tympans.\r\n\r\nJe r&amp;eacute;fl&amp;eacute;chissais longuement pour trouver une solution, deviner o&amp;ugrave; il se cachait.\r\n\r\nC&amp;#39;est alors je suis me suis rappel&amp;eacute; qu&amp;#39;avant la construction de cette maison, il y avait une grange, alors j&amp;#39;ai encore chercher, dans l&amp;#39;historique du terrain, cette fois-ci. &amp;Acirc;pre avoir pass&amp;eacute; une nuit &amp;agrave; fouiller dans les paperasses, je tomba enfin sur un document qui me fit froid dans le dos. &amp;nbsp;&amp;nbsp;&amp;nbsp;\r\n\r\n&amp;nbsp;\r\n\r\n&amp;nbsp;Avant que tout f&amp;ucirc;t d&amp;eacute;truit et quand la maison du terrain se trouvait un peu plus loin, une famille habitait ici. Elle avait l&amp;#39;air tout &amp;agrave; fait normale, les gens disaient que c&amp;#39;&amp;eacute;tait un famille tr&amp;egrave;s gentille, mais la nuit, toujours &amp;agrave; la m&amp;ecirc;me heure, soit minuit treize, l&amp;#39;homme de la maisonn&amp;eacute;e entrait dans un &amp;eacute;lan de fr&amp;eacute;n&amp;eacute;sie.\r\n\r\nIl attrapait alors sa fille unique par les cheveux et la tra&amp;icirc;nait jusque dans cette grange. Il la frappait alors si violemment que c&amp;#39;en &amp;eacute;tait presque &amp;agrave; mort. Mais lors d&amp;#39;une nuit orageuse, au moment de taper sa fille,\r\n\r\nil mourut d&amp;#39;une crise cardiaque. Et depuis, chaque nuit, il &amp;eacute;tait l&amp;agrave;. Impossible de mettre un terme &amp;agrave; cette voix. Alors, quelques jours plus tard, je d&amp;eacute;m&amp;eacute;nagea. &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;\r\n\r\n&amp;nbsp;\r\n\r\nLes jours s&amp;#39;encha&amp;icirc;naient tranquillement. Je pris contact avec les nouveaux locataires du terrain, un couple de personnes &amp;acirc;g&amp;eacute;es et leur fils. Ils &amp;eacute;taient sur le point d&amp;#39;envoyer leur enfant en h&amp;ocirc;pital psychiatrique parce qu&amp;#39;il pr&amp;eacute;tendait entendre des voix&amp;hellip;\r\n\r\n&amp;nbsp;\r\n\r\nEn savoir plus :&amp;nbsp;https://creepypastas-fr.webnode.fr/home/newscbm_684685/3/', 8, 1),
(22, 'test tag', '<p>1 test tag&nbsp;</p>\r\n', 8, 1),
(29, 'titre SCP', 'Article S.C.P ', 8, 2),
(30, 'rhdyd', '<p>drhyrdrhryd</p>\r\n', 8, 2),
(32, 'Test HORRO 2', '<p>Test HORRO 2 zone text</p>\r\n', 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cb_comment`
--

DROP TABLE IF EXISTS `cb_comment`;
CREATE TABLE IF NOT EXISTS `cb_comment` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_bin NOT NULL,
  `article_fk` int(10) UNSIGNED NOT NULL,
  `user_fk` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_user` (`user_fk`),
  KEY `comment_article` (`article_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `cb_comment`
--

INSERT INTO `cb_comment` (`id`, `content`, `article_fk`, `user_fk`) VALUES
(21, '<p>voici mon premier commentaire :D</p>\r\n\r\n<p>&nbsp;</p>\r\n', 17, 8),
(22, '<p>ifAdmin xd</p>\r\n', 22, 12);

-- --------------------------------------------------------

--
-- Structure de la table `cb_role`
--

DROP TABLE IF EXISTS `cb_role`;
CREATE TABLE IF NOT EXISTS `cb_role` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(150) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `cb_role`
--

INSERT INTO `cb_role` (`id`, `role_name`) VALUES
(1, 'ADMIN'),
(2, 'AUTHOR'),
(3, 'USER');

-- --------------------------------------------------------

--
-- Structure de la table `cb_tag`
--

DROP TABLE IF EXISTS `cb_tag`;
CREATE TABLE IF NOT EXISTS `cb_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(150) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `cb_tag`
--

INSERT INTO `cb_tag` (`id`, `tag_name`) VALUES
(1, 'HORROR'),
(2, 'SCP');

-- --------------------------------------------------------

--
-- Structure de la table `cb_user`
--

DROP TABLE IF EXISTS `cb_user`;
CREATE TABLE IF NOT EXISTS `cb_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(150) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(150) COLLATE utf8_bin NOT NULL,
  `pseudo` varchar(150) COLLATE utf8_bin NOT NULL,
  `email` varchar(150) COLLATE utf8_bin NOT NULL,
  `password` varchar(150) COLLATE utf8_bin NOT NULL,
  `role_fk` int(10) UNSIGNED NOT NULL,
  `token` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user` (`role_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `cb_user`
--

INSERT INTO `cb_user` (`id`, `firstname`, `lastname`, `pseudo`, `email`, `password`, `role_fk`, `token`) VALUES
(8, 'Samuel', 'Coquelet', 'Raptorn', 'sam.coquelet@gmail.com', '$2y$10$kJR35Bmy8CbBiPdYj87F7OfWHJ0Pz/RRMYrB5Mmqu7Hdblb5vxG1y', 1, 0),
(12, 'Samuel', 'Coquelet', 'test', 'coquelet.samuel@laposte.net', '$2y$10$mUaKQetNuGhphG5x7RsbXey0wb09CV4lRvlz7tjhxg2Zcqhyscara', 3, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cb_article`
--
ALTER TABLE `cb_article`
  ADD CONSTRAINT `article_tag` FOREIGN KEY (`tag_fk`) REFERENCES `cb_tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_user` FOREIGN KEY (`user_fk`) REFERENCES `cb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cb_comment`
--
ALTER TABLE `cb_comment`
  ADD CONSTRAINT `comment_article` FOREIGN KEY (`article_fk`) REFERENCES `cb_article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`user_fk`) REFERENCES `cb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cb_user`
--
ALTER TABLE `cb_user`
  ADD CONSTRAINT `role_user` FOREIGN KEY (`role_fk`) REFERENCES `cb_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
