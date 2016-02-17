-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: 134.0.30.203:3306
-- Erstellungszeit: 17. Feb 2016 um 14:26
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
-- Tabellenstruktur für Tabelle `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Daten für Tabelle `configuration`
--

INSERT INTO `configuration` (`id`, `name`, `value`) VALUES
(1, 'title_of_feed', 'Chemie lernen - der Feed'),
(11, 'link_to_feed', 'http://www.martin-thoma.de'),
(21, 'description_of_feed', 'Neuigkeiten zu der Website martin-thoma.de/chemie finden Sie hier'),
(31, 'language_of_feed', 'de'),
(41, 'ttl_of_feed', '60');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
