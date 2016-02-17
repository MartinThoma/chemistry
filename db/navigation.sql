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
-- Tabellenstruktur für Tabelle `navigation`
--

CREATE TABLE IF NOT EXISTS `navigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `in_id` int(11) DEFAULT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'Admin-Navigation',
  `url` varchar(255) NOT NULL,
  `title` varchar(30) NOT NULL,
  `attribute` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Daten für Tabelle `navigation`
--

INSERT INTO `navigation` (`id`, `in_id`, `type`, `url`, `title`, `attribute`) VALUES
(1, NULL, 'Admin-Navigation', 'admin.php', 'Startseite', 'id="home"'),
(2, NULL, 'Admin-Navigation', 'admin_info.php', 'Infos', 'id="infos"'),
(3, NULL, 'Admin-Navigation', 'edit_navi.php', 'Navigation', ''),
(4, NULL, 'Admin-Navigation', 'manage_rss.php', 'RSS Feed', 'id="rss"'),
(5, NULL, 'Admin-Navigation', 'manage_users.php', 'User', ''),
(6, NULL, 'Admin-Navigation', 'uploadImage.php', 'Bilderupload', 'id="pic_upload"'),
(7, NULL, 'Admin-Navigation', 'picturegallery.php', 'Bildergalerie', 'id="pic"'),
(8, NULL, 'Admin-Navigation', 'user_info.php', 'User Info', 'class="user"'),
(9, NULL, 'Admin-Navigation', 'logout.php', 'Logout', 'id="logout"'),
(10, 0, 'Navigation', 'index.htm', 'Startseite', 'id="home"'),
(11, 0, 'Navigation', 'klasse8.htm', '8. Klasse', 'class="klasse"'),
(12, 0, 'Navigation', 'klasse9.htm', '9. Klasse', 'class="klasse"'),
(13, 0, 'Navigation', 'klasse10.htm', '10. Klasse', 'class="klasse"'),
(14, 0, 'Navigation', 'klasse11.htm', '11. Klasse', 'class="klasse"'),
(15, 0, 'Navigation', 'http://www.chemieonline.de/forum/forumdisplay.php?f=1', 'Forum', 'id="forum"'),
(16, 0, 'Navigation', 'links.htm', 'Links', 'id="link"'),
(17, 0, 'Navigation', 'kontakt.htm', 'Kontakt', 'id="kontakt"'),
(19, 11, 'Navigation', 'gemische_und_reinstoffe.htm', 'Gemische und Reinstoffe', ''),
(20, 11, 'Navigation', 'chemische_reaktion.htm', 'Die chemische Reaktion', ''),
(21, 11, 'Navigation', 'teilchenstrucktur_der_materie.htm', 'Teilchenstruktur der Materie', ''),
(22, 11, 'Navigation', 'chemische_grundgesetze.htm', 'Chemische Grundgesetze', ''),
(23, 11, 'Navigation', 'chemisches_rechnen.htm', 'Chemisches Rechnen', ''),
(24, 11, 'Navigation', 'gruppierung_chemischer_reaktionen.htm', 'Gruppierung von Reaktionen', ''),
(25, 11, 'Navigation', 'bau_der_atome.htm', 'Bau der Atome', ''),
(26, 11, 'Navigation', 'salze.htm', 'Salze', ''),
(27, 12, 'Navigation', 'salze.htm', 'Salze', ''),
(28, 12, 'Navigation', 'elementgruppen.htm', 'Elementgruppen des PSE', ''),
(29, 12, 'Navigation', 'molekulare_stoffe.htm', 'Molekulare Stoffe', ''),
(30, 12, 'Navigation', 'protonenuebergaenge.htm', 'Protonen&uuml;berg&auml;nge', ''),
(31, 12, 'Navigation', 'elektronenuebergaenge.htm', 'Elektronen&uuml;berg&auml;nge', ''),
(32, 13, 'Navigation', 'atombau_der_nebengruppen.htm', 'Atombau der Nebengruppen', ''),
(33, 13, 'Navigation', 'komplexverbindungen.htm', 'Komplexverbindungen', ''),
(35, 13, 'Navigation', 'protolysegleichgewichte.htm', 'Protolysegleichgewichte', ''),
(36, 13, 'Navigation', 'elektrochemie.htm', 'Elektrochemie', ''),
(41, 0, 'Navigation', 'impressum.htm', 'Impressum', 'id="impressum"'),
(51, 14, 'Navigation', 'reaktionsgeschwindigkeit_start.htm', 'Reaktionsgeschwindigkeit', ''),
(61, 11, 'Navigation', 'metalle.htm', 'Metalle', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
