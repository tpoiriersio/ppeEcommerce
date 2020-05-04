-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 03 mai 2020 à 11:42
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `basesqlshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

DROP TABLE IF EXISTS `appartenir`;
CREATE TABLE IF NOT EXISTS `appartenir` (
  `idArticle` int(11) NOT NULL,
  `idPanier` int(11) NOT NULL,
  PRIMARY KEY (`idArticle`,`idPanier`),
  KEY `Appartenir_PANIER0_FK` (`idPanier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `nomArticle` varchar(250) NOT NULL,
  `prixArticle` double NOT NULL,
  `stockarticle` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  `imagesAlbum` varchar(500) NOT NULL,
  PRIMARY KEY (`idArticle`),
  KEY `ARTICLES_GENRES_FK` (`idGenre`),
  KEY `ARTICLES_ARTISTES0_FK` (`idArtiste`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idArticle`, `nomArticle`, `prixArticle`, `stockarticle`, `idGenre`, `idArtiste`, `imagesAlbum`) VALUES
(1, 'La zone en personne', 17.99, 8, 1, 1, 'lazoneenpersonne.jpg'),
(2, 'Dozo', 18.99, 18, 1, 3, 'dozo.jpg'),
(3, 'Belem', 25.99, 4, 3, 2, 'belem.jpg'),
(4, 'Le Choix du fou', 19.99, 6, 3, 8, 'lechoixdufou.jpg'),
(5, 'Initials B.B', 15.99, 52, 3, 9, 'sergy.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `artistes`
--

DROP TABLE IF EXISTS `artistes`;
CREATE TABLE IF NOT EXISTS `artistes` (
  `idArtiste` int(11) NOT NULL AUTO_INCREMENT,
  `nomArtiste` varchar(100) NOT NULL,
  PRIMARY KEY (`idArtiste`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `artistes`
--

INSERT INTO `artistes` (`idArtiste`, `nomArtiste`) VALUES
(1, 'Jul'),
(2, 'Laurent Voulzy'),
(3, 'Kaaris'),
(4, 'Booba'),
(5, 'MHD'),
(6, 'Orelsan'),
(7, 'Kery James'),
(8, 'Michel Sardou'),
(9, 'Serge Gainsbourg'),
(10, 'Johnny Haliday');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `idClients` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(150) NOT NULL,
  `Prenom` varchar(150) NOT NULL,
  `AdresseMail` varchar(250) NOT NULL,
  `CodePostal` varchar(6) NOT NULL,
  `Ville` varchar(150) NOT NULL,
  `nomDeRue` varchar(150) NOT NULL,
  `Pays` varchar(150) NOT NULL,
  `numDeTelephone` varchar(12) NOT NULL,
  `login` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  PRIMARY KEY (`idClients`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`idClients`, `Nom`, `Prenom`, `AdresseMail`, `CodePostal`, `Ville`, `nomDeRue`, `Pays`, `numDeTelephone`, `login`, `password`) VALUES
(1, 'admin', 'admin', 'admin@local.fr', '00000', 'admin', 'admim', 'admin', '0123456789', 'admin', '0550002D'),
(2, 'POIRIER', 'Theo', 'poiriertheoo@gmail.com', '55000', 'Bar-le-Duc', '22', 'france', '0786849087', 'Theo POIRIER', '$2y$10$yQcb9VqBhsKcMQ4zp7enBuKxbRtuu2as0F2iWELbFFi6GkZLvK.1e');

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `idGenre` int(11) NOT NULL AUTO_INCREMENT,
  `typeGenre` varchar(100) NOT NULL,
  PRIMARY KEY (`idGenre`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`idGenre`, `typeGenre`) VALUES
(1, 'RAP FR'),
(2, 'JAZZ'),
(3, 'VARIÉTÉS FRANÇAISES '),
(4, 'ELECTRO'),
(5, 'HIP-HOP'),
(6, 'ROCK'),
(7, 'METAL'),
(8, 'DRILL'),
(9, 'RAP US'),
(10, 'REGGAE');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `idPanier` int(11) NOT NULL AUTO_INCREMENT,
  `quantitePanier` int(11) NOT NULL,
  `idClients` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPanier`),
  KEY `PANIER_CLIENTS_FK` (`idClients`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `Appartenir_ARTICLES_FK` FOREIGN KEY (`idArticle`) REFERENCES `articles` (`idArticle`),
  ADD CONSTRAINT `Appartenir_PANIER0_FK` FOREIGN KEY (`idPanier`) REFERENCES `panier` (`idPanier`);

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `ARTICLES_ARTISTES0_FK` FOREIGN KEY (`idArtiste`) REFERENCES `artistes` (`idArtiste`),
  ADD CONSTRAINT `ARTICLES_GENRES_FK` FOREIGN KEY (`idGenre`) REFERENCES `genres` (`idGenre`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `PANIER_CLIENTS_FK` FOREIGN KEY (`idClients`) REFERENCES `clients` (`idClients`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
