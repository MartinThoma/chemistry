-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: 134.0.30.203:3306
-- Erstellungszeit: 17. Feb 2016 um 14:06
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
-- Tabellenstruktur für Tabelle `summenformeln`
--

CREATE TABLE IF NOT EXISTS `summenformeln` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `summenformel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Daten für Tabelle `summenformeln`
--

INSERT INTO `summenformeln` (`id`, `cat_id`, `name`, `summenformel`) VALUES
(1, 1, 'Wasser', 'H<sub>2</sub>O'),
(2, 1, 'Sauerstoff', 'O<sub>2</sub>'),
(3, 2, 'Carbonation', 'CO<sub>3</sub><sup>2-</sup>'),
(4, 2, 'Fluoridion', 'F<sup>-</sup>'),
(11, 3, 'Salzsäure', 'HCl'),
(21, 3, 'Schwefelsäure', 'H<sub>2</sub>SO<sub>4</sub>'),
(31, 3, 'Salpetersäure', 'HNO<sub>3</sub>'),
(41, 3, 'Salpetrige Säure', 'HNO<sub>2</sub>'),
(51, 3, 'Phosphorsäure', 'H<sub>3</sub>PO<sub>4</sub>'),
(61, 3, 'Blausäure', 'HCN'),
(71, 3, 'Kohlenstoffsäure', 'H<sub>2</sub>CO<sub>3</sub>'),
(81, 2, 'Wasserstoffperoxid', 'H<sub>2</sub>O<sub>2</sub>'),
(91, 1, 'Ozon', 'O<sub>3</sub>'),
(101, 4, 'Braunstein', 'MnO<sub>2</sub>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
