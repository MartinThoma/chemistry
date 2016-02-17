-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: 134.0.30.203:3306
-- Erstellungszeit: 17. Feb 2016 um 14:07
-- Server Version: 10.1.9-MariaDB
-- PHP-Version: 5.3.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `20080912003-1`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `summenformeln_cats`
--

CREATE TABLE IF NOT EXISTS `summenformeln_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `summenformeln_cats`
--

INSERT INTO `summenformeln_cats` (`id`, `cat`) VALUES
(1, 'Grundwissen'),
(2, 'Ionen'),
(3, 'Säuren und Basen');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
