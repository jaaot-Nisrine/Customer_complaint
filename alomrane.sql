-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 10 Juillet 2016 à 10:17
-- Version du serveur: 5.1.53
-- Version de PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `alomrane2`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE IF NOT EXISTS `agence` (
  `NOMAGENCE` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `PROVINCE` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NIVEAUTRAITEMENT` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`NOMAGENCE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `agence`
--


-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `ID_client` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_PRENOM` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CIN` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TEL` int(11) DEFAULT NULL,
  `SOURCE` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IDPRODUIT` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`ID_client`, `NOM_PRENOM`, `CIN`, `TEL`, `SOURCE`, `EMAIL`, `IDPRODUIT`) VALUES
(1, 'toto', 'd111111', 1235655, 'src', 'toto', 'villa');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL DEFAULT '',
  `pass` varchar(50) NOT NULL DEFAULT '',
  `nom` varchar(50) NOT NULL DEFAULT '',
  `prenom` varchar(50) NOT NULL DEFAULT '',
  `privilege` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id_user`, `login`, `pass`, `nom`, `prenom`, `privilege`) VALUES
(3, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'TOTO', 'TIITI', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `nature_reclamation`
--

CREATE TABLE IF NOT EXISTS `nature_reclamation` (
  `N` int(11) NOT NULL AUTO_INCREMENT,
  `NATURE_DE_RECLAMATION` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`N`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `nature_reclamation`
--


-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `IDPRODUIT` int(25) NOT NULL AUTO_INCREMENT,
  `ADRESSEPRODUIT` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TYPEPRODUIT` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`IDPRODUIT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`IDPRODUIT`, `ADRESSEPRODUIT`, `TYPEPRODUIT`) VALUES
(1, 'WAFAE 2 ', 'villa'),
(2, 'WAFAE 3 ', 'residence'),
(3, 'WAFAE 3 ', 'boutique'),
(4, 'WAFAE 3 ', 'appart'),
(5, 'WAFAE 4 ', 'villa semi fini');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE IF NOT EXISTS `reclamation` (
  `REFRECLAMATION` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `DATERECLAMATION` date DEFAULT NULL,
  `OBJET` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PROJET` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DATEENVOI` date DEFAULT NULL,
  `ID_client` int(11) DEFAULT NULL,
  `N` int(11) DEFAULT NULL,
  PRIMARY KEY (`REFRECLAMATION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `reclamation`
--


-- --------------------------------------------------------

--
-- Structure de la table `traitement`
--

CREATE TABLE IF NOT EXISTS `traitement` (
  `NUMTRAITEMENT` int(11) NOT NULL AUTO_INCREMENT,
  `SUITEDONNEE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DATEREPONSE` date DEFAULT NULL,
  `OBSERVATION` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `REFRECLAMATION` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMAGENCE` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`NUMTRAITEMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `traitement`
--

