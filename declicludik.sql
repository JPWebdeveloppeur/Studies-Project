-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 14 Août 2016 à 21:31
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `declicludik`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

DROP TABLE IF EXISTS `actualites`;
CREATE TABLE IF NOT EXISTS `actualites` (
  `idactus` int(11) NOT NULL AUTO_INCREMENT,
  `TitreActus` varchar(250) DEFAULT NULL,
  `TexteActus` text,
  `date` date DEFAULT NULL,
  `DateModif` datetime DEFAULT NULL,
  PRIMARY KEY (`idactus`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf16;

--
-- Contenu de la table `actualites`
--

INSERT INTO `actualites` (`idactus`, `TitreActus`, `TexteActus`, `date`, `DateModif`) VALUES
(1, 'Jeux de société', 'Asmodée : En nouveauté cette semaine, nous avons reçu « Haleakala« , « Tides of Time » et « Djumble« . Le réassort des extensions pour le jeu de figurines X-Wing « Chasseur TIE/FO » et « Chasseur X-wing T-70 » ainsi que d’autres vaisseaux . Gigamic : Retour de Bonhanza, 6 qui prend, Clochemerle, gagne ton papa, gare à la toile et en nouveauté le jeu Colori duo. Piatnik : Retour en magasin des jeux Match n turn, L’ile aux dragons, Music IQ, Bubbles, Monstermania, Duel des magiciens, My beautiful pony, Pigolino, Absolutely English, Quadro color, Quickomino, Dino park, Démasque moi et Digit. Jeux FK : Retour en magasin de Bonjour Robert, Bonjour Simone, Poules renards vipères, Caractère. En nouveauté, nous avons eu Aquatika, El Ocho, cache cache souris et le jeu des contraires. Ferti : Retour en magasin des jeux Copyright, Déclic, Déclic family, Yokaï no mori, Pitchcar. Bonne semaine de jeux !', '0000-00-00', '0000-00-00 00:00:00'),
(2, 'Jeux de plateau', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '0000-00-00', '0000-00-00 00:00:00'),
(3, 'Salon et Festival', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '0000-00-00', '0000-00-00 00:00:00'),
(4, 'Anim Déclic', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '0000-00-00', '0000-00-00 00:00:00'),
(5, 'Jeux Online', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.:;:</p>', '0000-00-00', '2016-08-14 23:22:58'),
(7, 'teste actu final', '<p>listeactuslisteactuslisteactuslisteactuslisteactuslisteactuslisteactuslisteactus</p>', '2016-08-14', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `catvideo`
--

DROP TABLE IF EXISTS `catvideo`;
CREATE TABLE IF NOT EXISTS `catvideo` (
  `idcatvideo` int(11) NOT NULL AUTO_INCREMENT,
  `nomcatvideo` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idcatvideo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf16;

--
-- Contenu de la table `catvideo`
--

INSERT INTO `catvideo` (`idcatvideo`, `nomcatvideo`) VALUES
(1, 'Jeux de société'),
(2, 'Jeux de plateau'),
(3, 'Jeux Educatifs');

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

DROP TABLE IF EXISTS `contenu`;
CREATE TABLE IF NOT EXISTS `contenu` (
  `idcontenu` int(11) NOT NULL AUTO_INCREMENT,
  `TitreContenu` varchar(250) DEFAULT NULL,
  `ssTitreContenu` varchar(250) DEFAULT NULL,
  `TexteContenu` text,
  `LiensContenu` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `DateModif` datetime DEFAULT NULL,
  PRIMARY KEY (`idcontenu`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf16;

--
-- Contenu de la table `contenu`
--

INSERT INTO `contenu` (`idcontenu`, `TitreContenu`, `ssTitreContenu`, `TexteContenu`, `LiensContenu`, `date`, `DateModif`) VALUES
(1, 'Jeux', 'à la Une', '<p>description du jeu a la une</p>', 'http://www.youtube.com/embed/wGW7lSDkyUk', '2016-01-07', NULL),
(2, 'Boutique en ligne ', NULL, '<p>Nous mettons a votre dispositions un espace de vente en ligne, vous retrouverez l''ensemble de notre catalogue:<strong> Des jeux de sociétés, des jeux pour enfants, des jeux traditionnels, des jeux de cartes, des jeux de figurines, un espace cadeau.</strong></p>', 'http://www.declicludik.fr/boutique/', '2016-01-07', NULL),
(3, 'Nos Evenements', NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, '2016-01-07', NULL),
(4, 'Meilleurs locations', 'Juillet 2016', '\r\n', NULL, '2016-01-07', NULL),
(5, 'Nos partenaires', '', '\r\n', NULL, '2016-01-07', NULL),
(6, 'Nous Connaitre', '', '<p><strong>Declic Ludik est un Magasin de jeux de soci&eacute;t&eacute;s &agrave; Bourgoin-Jallieu</strong>, qui commercialise une gamme compl&egrave;te de jeux de soci&eacute;t&eacute;.Vous trouverez plusieurs choix de jeu comme:</p>\r\n<p><strong>Des jeux de soci&eacute;t&eacute;s classiques:</strong> Monopoly, Bon25ne Paye,et moderne (Colons de Catane, Loups Garous de Thiercellieux, Jungle Speed, Time&rsquo;s Up, Chromino).</p>\r\n<p><strong>Des jeux pour enfants:</strong> Haba, l2e verger, Kapla, jeux d&rsquo;&eacute;ve25il et &eacute;ducatifs &agrave; partir de 2 ans.</p>\r\n<p><strong>Des jeux traditionnels :</strong> &Eacute;checs, dames, backgammon, petits chevaux, jeux du monde, domino, go.</p>\r\n<p><strong>Des jeux de cartes classiques :</strong> Poker, tarot, belotte, bridge, avec leurs accessoires : Tapis de jeu, jeton, distributeur de cartes.</p>\r\n<p><strong>Jeux de cartes &agrave; collectionner:</strong> Magic, Yu Gi Ho, Pokemon, Wakfu.</p>\r\n<p><strong>Des jeux de figurines :</strong>Games Workshop : Warhammer, Warhammer 40k, Le seigneur des Anneaux ainsi que des peintures et accessoires.</p>\r\n<p><strong>Un espace cadeau :</strong> T-Shirts, casse-t&ecirc;tes, puzzles, mugs, statuettes.</p>\r\n<p><strong>Un espace d&eacute;tente :</strong> O&ugrave; vous pourrez &eacute;changer et lire.</p>\r\n<p><strong>Nous disposons &eacute;galement de plusieurs espace mit a disposition de nos clients:</strong></p>\r\n<p><strong>Un espace d&rsquo;animation :</strong> Des tables sont mises &agrave; dispositions sur l&rsquo;ensemble de la boutique o&ugrave; vous pourrez jouer.</p>\r\n<p><strong>Un espace ind&eacute;pendant</strong> permet &eacute;galement d&rsquo;accueillir le jeu organis&eacute;, et <strong>les anniversaires pour les enfants.</strong></p>\r\n<p><strong>Avec Declic LudiK, vous &ecirc;tes s&ucirc;r de trouver le jeu dont vous avez besoin.</strong></p>', '', '2016-01-07', NULL),
(8, 'Evenements', '', '<p>Lorlocalisationem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '', '2016-01-07', NULL),
(9, 'Ludotèque', '', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '', '2016-08-08', '2016-08-08 21:38:14');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `idimage` int(11) NOT NULL AUTO_INCREMENT,
  `nomImg` varchar(250) DEFAULT NULL,
  `liensImg` varchar(250) DEFAULT NULL,
  `Contenu_idcontenu` int(11) NOT NULL,
  PRIMARY KEY (`idimage`),
  KEY `fk_image_Contenu1_idx` (`Contenu_idcontenu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `idMembre` int(11) NOT NULL AUTO_INCREMENT,
  `NomMembre` varchar(100) DEFAULT NULL,
  `PrenomMembre` varchar(100) DEFAULT NULL,
  `MailMembre` varchar(100) DEFAULT NULL,
  `RoleMembre` varchar(50) DEFAULT NULL,
  `PassMembre` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idMembre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf16;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`idMembre`, `NomMembre`, `PrenomMembre`, `MailMembre`, `RoleMembre`, `PassMembre`) VALUES
(1, 'Peraldo', 'Jonathan', 'jpwebdeveloppeur@gmail.com', '999', '$2y$10$zRajhNo5iHtB4Zr2FYQ51Oh2djBDAq5Xwx1UiJiuUIvI9wpv8qiwy'),
(2, 'Terrier', 'Laura', 'lauraperaldo@gmail.com', '777', '$2y$10$zRajhNo5iHtB4Zr2FYQ51Oh2djBDAq5Xwx1UiJiuUIvI9wpv8qiwy');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `onglet` varchar(100) NOT NULL,
  `liensmenu` varchar(100) NOT NULL,
  PRIMARY KEY (`idmenu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `idsider` int(11) NOT NULL AUTO_INCREMENT,
  `titreslider` varchar(100) CHARACTER SET utf8 NOT NULL,
  `resumslider` text CHARACTER SET utf8 NOT NULL,
  `liensslider` varchar(250) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`idsider`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `idvideo` int(11) NOT NULL AUTO_INCREMENT,
  `TitreVideo` varchar(250) DEFAULT NULL,
  `LiensViideo` varchar(250) DEFAULT NULL,
  `DescriptionVideo` varchar(250) DEFAULT NULL,
  `Auteur_idauteur` int(11) NOT NULL,
  `catvideo_idcatvideo` int(11) NOT NULL,
  PRIMARY KEY (`idvideo`),
  KEY `fk_Video_catvideo1_idx` (`catvideo_idcatvideo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf16;

--
-- Contenu de la table `video`
--

INSERT INTO `video` (`idvideo`, `TitreVideo`, `LiensViideo`, `DescriptionVideo`, `Auteur_idauteur`, `catvideo_idcatvideo`) VALUES
(1, ' Burger Quiz de Lansay', 'https://youtu.be/7y_hcGoIg2M', '<p>Burger Quiz, un jeu incontournable de Lansay où les quiz sont bien marrant.Découvrez tout le contenu du jeu Burger Quiz</p>', 1, 1),
(2, 'Hoyuk - Atalia', 'https://youtu.be/-uszQM_OedQ', '<p>A l''intérieur de la boîte de Hoyuk, distribué par Atalia et édité par Mage Company.Hoyuk a gagné le trophée de Flip.Découvrez le matériel avec cette vidéo à l''intérieur de la boîte de Hoyuk.</p>', 1, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_image_Contenu1` FOREIGN KEY (`Contenu_idcontenu`) REFERENCES `contenu` (`idcontenu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `fk_Video_catvideo1` FOREIGN KEY (`catvideo_idcatvideo`) REFERENCES `catvideo` (`idcatvideo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
