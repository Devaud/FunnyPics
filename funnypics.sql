-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 23 Mars 2015 à 17:40
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `funnypics`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`idCategorie`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`idCategorie`, `categorie`) VALUES
(1, 'Tout'),
(2, 'Animaux'),
(3, '< GEEK />');

-- --------------------------------------------------------

--
-- Structure de la table `etre`
--

CREATE TABLE IF NOT EXISTS `etre` (
  `idPicture` int(10) NOT NULL,
  `idCategorie` int(10) NOT NULL,
  KEY `idPicture` (`idPicture`,`idCategorie`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Contenu de la table `etre`
--

INSERT INTO `etre` (`idPicture`, `idCategorie`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `idPictures` int(11) NOT NULL AUTO_INCREMENT,
  `picturesPath` varchar(150) COLLATE utf8_swedish_ci NOT NULL,
  `comments` varchar(150) COLLATE utf8_swedish_ci DEFAULT 'Pas de commentaire',
  `dateAjout` date DEFAULT NULL,
  PRIMARY KEY (`idPictures`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `pictures`
--

INSERT INTO `pictures` (`idPictures`, `picturesPath`, `comments`, `dateAjout`) VALUES
(1, './media/havefun.jpg', 'Have fun with feet :)', '2015-03-21'),
(2, './media/fun-with-bananas-1.jpg', 'Banana art', '2015-03-21'),
(3, './media/sniper_cat.jpg', 'Sniper cat', '2015-03-21'),
(4, './media/cats_hello.jpg', 'Hello :)', '2015-03-21'),
(5, './media/rage_pc.gif', 'Quand internet ne fonctionne plus', '2015-03-21'),
(6, './media/Gdc2010.jpg', 'L''effet démo', '2015-03-22'),
(7, './media/Shocked-Cat.jpg', 'HEIIIIN :0', '2015-03-22');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `etre`
--
ALTER TABLE `etre`
  ADD CONSTRAINT `etre_ibfk_1` FOREIGN KEY (`idPicture`) REFERENCES `pictures` (`idPictures`),
  ADD CONSTRAINT `etre_ibfk_2` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`idCategorie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
