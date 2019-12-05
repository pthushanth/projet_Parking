-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mer 05 Juin 2019 à 16:58
-- Version du serveur: 5.6.11-log
-- Version de PHP: 5.4.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `parking`
--

-- --------------------------------------------------------

--
-- Structure de la table `parking`
--

CREATE TABLE IF NOT EXISTS `parking` (
  `idParking` int(11) NOT NULL AUTO_INCREMENT,
  `nbPlaceTotal` int(11) NOT NULL,
  `nbPlaceDispo` int(11) NOT NULL DEFAULT '0',
  `nomParking` varchar(255) NOT NULL,
  PRIMARY KEY (`idParking`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `parking`
--

INSERT INTO `parking` (`idParking`, `nbPlaceTotal`, `nbPlaceDispo`, `nomParking`) VALUES
(1, 50, 0, 'LLA');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
