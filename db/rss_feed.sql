-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: 134.0.30.203:3306
-- Erstellungszeit: 17. Feb 2016 um 14:02
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
-- Tabellenstruktur für Tabelle `rss_feed`
--

CREATE TABLE IF NOT EXISTS `rss_feed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT 'http://www.martin-thoma.de/chemie/',
  `description` varchar(255) NOT NULL,
  `pubDate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=732 ;

--
-- Daten für Tabelle `rss_feed`
--

INSERT INTO `rss_feed` (`id`, `title`, `link`, `description`, `pubDate`) VALUES
(1, 'Verbesserungsprogramm gestartet', 'http://www.martin-thoma.de/chemie/', 'Ab heute zeigt nun dieser RSS-Feed alle Verbesserungen an.', 1222723124),
(11, 'Salze - Artikel verbessert', 'http://www.martin-thoma.de/chemie/salze.htm', 'Der Artikel &quot;Salze&quot; war etwas zerst&uuml;ckelt - dies wurde nun behoben', 1222750897),
(21, 'Ethylen - Bild verbessert', 'http://www.martin-thoma.de/chemie/bilder/ethylen.jpg', 'Verbesserung des Ethlyen-Bildes', 1222750964),
(31, 'Bindigkeit - Bild verbessert', 'http://www.martin-thoma.de/chemie/bilder/bindigkeit.gif', 'Verbesserung des Bindigkeit-Bildes mithilfe von Gimp und Chemtool', 1222834645),
(41, 'Polymerisation - Bild verbessert', 'http://martin-thoma.de/chemie/bilder/polymerisation.jpg', 'Verbesserung des Polymerisationsbildes mithilfe von Gimp und Chemtool', 1222923292),
(51, 'Treibhauseffekt - Bild verbessert', 'http://martin-thoma.de/chemie/gruppierung_chemischer_reaktionen.htm', 'Das Bild des Treibhauseffektes wurde mithilfe von Gimp und einem Bild der Erde aus Wikipedia verbessert', 1223025653),
(61, 'S&auml;ure-Base-Paare - Bild verbessert', 'http://www.martin-thoma.de/chemie/bilder/ampholyte.jpg', 'Die Darstellung der Reaktionsgleichung zweier S&auml;ure-Base-Paare wurde mithilfe von Gimp und OpenOffice verbessert.', 1223104260),
(71, 'Metalle - ein neuer (alter) Artikel', 'http://www.martin-thoma.de/chemie/metalle.htm', 'Der Artikel &quot;Metalle&quot; wurde ausgegliedert und zu einem eigenem Artikel gemacht. Zus&auml;tzlich habe ich das Hochofen-Bild (http://martin-thoma.de/chemie/gruppierung_chemischer_reaktionen.htm) etwas verbessert.', 1223267675),
(81, '&Uuml;berarbeiteter Artikel', 'http://www.martin-thoma.de/chemie/molekulare_stoffe.htm', 'Im Artikel &uuml;ber Molekulare Stoffe wurden vier Bilder aus Wikipedia-Commons eingebunden.', 1223444746),
(91, 'Wie erstelle ich eine Redoxgleichung?', 'http://www.martin-thoma.de/chemie/redoxgleichung_erstellen.htm', 'Artikel wie man eine Redoxgleichung erstellt wurde geschrieben. Verbesserungen daran sind noch n&ouml;tig.', 1223527652),
(101, 'Links hinzugef&uuml;gt', 'http://www.martin-thoma.de/chemie/klasse11.htm', 'Heute habe ich die Qualit&auml;t der Website verbessert indem ich Links zu Themen gesetz habe, &uuml;ber die ich bisher noch keinen Artikel geschrieben habe. Des weiteren wurde ein Bild digitalisiert und einige Inlinks gesetzt.', 1223617179),
(111, 'Chemische Tools - der Vergleich', 'http://martin-thoma.de/chemie/tools.htm', 'Welche (kostenlosen) Programme gibt es online um chemische Strukturen zu zeichnen? Wie leicht sind sie zu bedienen?', 1223714260),
(121, 'Chemie lernen bei DMOZ angemeldet', 'http://www.dmoz.org/World/Deutsch/Wissenschaft/Naturwissenschaften/Chemie/Schule/', 'Das DMOZ ist eine Datenbank mit Qualitativ hochwertigen Websites. Da ich denke dass diese Website nun sehr gut ist habe ich sie dort angemeldet. Eine kleine &Auml;nderung im Code habe ich auch vorgenommen: Das Banner wird nun nur &uuml;ber die CSS-Datei e', 1223803262),
(131, 'Was ist zu tun?', 'http://www.martin-thoma.de/chemie/todo.htm', 'Um ein noch schnelleres Steigen der Qualit&auml;t zu erreichen m&uuml;ssen weitere Personen in das Projekt integriert werden. Artikel m&uuml;ssen geschrieben werden und die Bilder dazu gezeichnet werden. Auf dieser Seite steht eine Liste was gemacht werde', 1223874548),
(141, 'Style ver&auml;ndert', 'http://www.martin-thoma.de/chemie/todo.htm', 'Nun kann man Links im Focus oder bereits genutzte Links erkennen.', 1223962824),
(151, 'Die Oxidationszahl', 'http://martin-thoma.de/chemie/oxidationszahl.htm', 'Es wurde nun ein Artikel &uuml;ber die Oxidationszahl geschrieben.', 1224048599),
(161, '&Uuml;bungsaufgaben zur Oxidationszahl', 'http://martin-thoma.de/chemie/uebung_oxidationszahl.htm', 'Es wurde ein neuer Artikel mit &Uuml;bungsaufgaben zur Oxidationszahl angelegt', 1224133069),
(171, '&Uuml;bungen werden ben&ouml;tigt', 'http://www.chemieseiten.de/', 'Inzwischen sind die meisten Artikel ziemlich gut, jedoch leider noch ohne &Uuml;bungen. Daher habe ich mit Jens Grescho kontakt aufgenommen und ihn gefragt, ob ich seine Arbeitsbl&auml;tter als PDFs online stellen darf.', 1224220948),
(181, 'Website durchsuchen', 'http://martin-thoma.de/chemie/suche.php', 'Die Website hat nun eine Website-Suche, mit deren Hilfe man schnell alles zu einem Suchwort finden kann, was man wissen will.', 1224322713),
(191, 'Weiteres Material - Stoffeigenschaften', 'http://www.martin-thoma.de/chemie/klasse8.htm', 'Dank Herrn Grescho habe werde ich in n&auml;chster Zeit einige &Uuml;bungen online stellen k&ouml;nnen. So habe ich auch heute eine &Uuml;bung - Stoffeigenschaften - bereitgestellt.', 1224401839),
(201, 'Weiteres Material - Metalle', 'http://www.martin-thoma.de/chemie/klasse8.htm', 'Ein Arbeitsblatt Metalle wurde bereitgestellt.', 1224475950),
(211, 'Weiteres Materia - St&ouml;chiometrie', 'http://www.martin-thoma.de/chemie/klasse8.htm', 'Ein Arbeitsblatt St&ouml;chiometrie wurde bereitgestellt.', 1224562792),
(221, 'Weiteres Material - Atombau - und neues Banner', 'http://www.martin-thoma.de/chemie/klasse8.htm', 'Ein weiteres Arbeitsblatt von Herrn Grescho, das &uuml;ber den Atombau nach Bohr, wurde als PDF bereitgestellt. Des Weiteren versuche ich das Design mit einem neuen Banner zu verbessern.', 1224737278),
(231, 'Textaufgaben', 'http://www.martin-thoma.de/chemie/klasse8.htm', 'Heute habe ich eine PDF-Datei mit Textaufgaben zum chemischen Rechnen online gestellt.', 1224923732),
(241, 'Zucker-Arbeitsblatt', 'http://www.martin-thoma.de/chemie/klasse10.htm', 'Zu Zucker wurde soeben ein Arbeitsblatt online gestellt.', 1225048095),
(251, 'Arbeitsblatt Eiwei&szlig;e', 'http://www.martin-thoma.de/chemie/klasse10.htm', 'Ein Arbeitsblatt Eiwei&szlig;e wurde gerade online gestellt.', 1225084610),
(261, 'Arbeitsblatt Fette', 'http://www.martin-thoma.de/chemie/klasse10.htm', 'Das Arbeitsblatt Fette von Herrn Grescho wurde nun ins PDF-Format konvertiert, leicht ver&auml;ndert und online gestellt.', 1225174582),
(271, 'Arbeitsblatt Bindungen und verbesserter Code', 'http://www.martin-thoma.de/chemie/klasse10.htm', 'Bindungenstypen zu erkennen geh&ouml;rt wahrscheinlich zu den einfacheren Aufgaben, dennoch habe ich mal ein &Uuml;bungsblatt gestaltet. Eine Ver&auml;nderung im Code wurde auch durchgef&uuml;hrt: Die Definitionen werden nun mit den dl, dt und dd Tags gek', 1225348030),
(281, 'Designver&auml;nderung', 'http://www.martin-thoma.de/chemie/chemische_reaktion.htm', 'Alle Abs&auml;tze haben nun einen Abstand von 7px. Diese Ver&auml;nderung macht es n&ouml;tig das Erscheinungsbild aller Artikel nochmals zu untersuchen.', 1225431962),
(291, 'Angepasste Paragraphen', 'http://www.martin-thoma.de/chemie/chemische_reaktion.htm', 'Die Paragraphen wurden auf dieser Seite nun richtig zusammengefasst.', 1225529612),
(301, 'Angepasste Paragraphen - 2', 'http://www.martin-thoma.de/chemie/chemische_grundgesetze.htm', 'Die Paragraphen und die Definitionen  wurden auf dieser Seite nun richtig zusammengefasst.', 1225615243),
(311, 'IE fix', 'http://www.martin-thoma.de/chemie/', 'Damit die Website unter dem IE nicht ganz so schlimm aussieht wurde nun die Transparenz des Banners entfernt und ein alternative Stylesheet f&uuml;r den IE hinzugef&uuml;gt.', 1225634063),
(321, 'Angepasste Paragraphen - 3', 'http://www.martin-thoma.de/chemie/chemisches_rechnen.htm', 'Die Paragraphen und die Definitionen wurden auf dieser Seite nun richtig zusammengefasst.', 1225727940),
(331, 'Paragraphen, Rechtschreibfehler und neues Material', 'http://www.martin-thoma.de/chemie/gruppierung_chemischer_reaktionen.htm', 'Heute habe ich die Paragraphen und Definitionen von &quot;Gruppierung Chemischer Reaktionen&quot; angepasst, dort Rechtschreibfehler korrigiert und die Lerneinheit als PDF bereitgestellt.', 1225795114),
(341, 'Fehler in PDF-Dateien behoben', 'http://www.martin-thoma.de/chemie/klasse8.htm', 'Jens Grescho hat mir soeben mitgeteilt dass ich bei der konvertierung seiner Arbeitsbl&auml;tter in das PDF-Format Fehler gemacht habe (Fette, Ionen, Molekulare Stoffe und Reaktionen). Diese Fehler wurden nun behoben.', 1225796837),
(351, 'Angepasste Paragraphen - 4', 'http://www.martin-thoma.de/chemie/bau_der_atome.htm', 'Die Paragraphen und die Definitionen wurden auf dieser Seite nun richtig zusammengefasst.', 1225973885),
(361, 'Angepasste Paragraphen - 5', 'http://www.martin-thoma.de/chemie/metalle.htm', 'Die Paragraphen wurden auf dieser Seite nun richtig zusammengefasst.', 1225975654),
(371, 'Angepasste Paragraphen - 6', 'http://www.martin-thoma.de/chemie/salze.htm', 'Die Paragraphen und die Definitionen wurden auf dieser Seite nun richtig zusammengefasst.', 1226049029),
(381, 'Angepasste Paragraphen - 7', 'http://www.martin-thoma.de/chemie/protonenuebergaenge.htm', 'Die Paragraphen und die Definitionen wurden auf dieser Seite nun richtig zusammengefasst.', 1226138340),
(391, 'Erkl&auml;rung zum chemischen Rechnen verbessert', 'http://martin-thoma.de/chemie/chemisches_rechnen.htm', 'Soeben habe ich eine Frage zum chemischen Rechnen bekommen, diese nat&uuml;rlich beantwortet und die Seite so verbessert, dass sie hoffentlich als Erkl&auml;rung ausreicht!', 1226212303),
(401, 'Angepasste Paragraphen - 8', 'http://martin-thoma.de/chemie/redoxgleichung_erstellen.htm', 'Die Paragraphen und die Definitionen wurden auf dieser Seite nun richtig zusammengefasst.', 1226212526),
(411, 'Angepasste Paragraphen - 9', 'http://martin-thoma.de/chemie/protolysegleichgewichte.htm', 'Die Paragraphen und die Definitionen wurden auf dieser Seite nun richtig zusammengefasst.', 1226295763),
(421, '	Angepasste Paragraphen - 10', 'http://martin-thoma.de/chemie/elektrochemie.htm', 'Die Paragraphen und die Definitionen wurden auf dieser Seite nun richtig zusammengefasst. Ich bin mir nicht sicher ob ich dies die n&auml;chsten drei Tage auch machen kann,  da ich in dieser Zeit eventuell nicht ins Internet komme.', 1226380722),
(431, 'Angepasste Paragraphen - 11', 'http://martin-thoma.de/chemie/reaktionsgeschwindigkeit.htm', 'Die Paragraphen und die Definitionen wurden auf dieser Seite nun richtig zusammengefasst.  Die Seite ist nun Valide.', 1226471540),
(441, 'Neuer Artikel - Gefahrstoffe', 'http://www.martin-thoma.de/chemie/gefahrstoffe.htm', 'Der Artikel Gefahrstoffe wurde nun angefangen, jedoch noch nicht fertig gestellt.', 1226702955),
(451, 'Modifikationen des Kohlenstoffes', 'http://martin-thoma.de/chemie/molekulare_stoffe.htm', 'Heute habe ich ein Arbeitsblatt &uuml;ber die Modifikationen des Kohlenstoffes online gestellt.', 1226820235),
(461, 'Websitesuche', 'http://martin-thoma.de/chemie/suche.php', 'Die Websitesuche steht nun auch auf der Startseite, wird jedoch sp&auml;ter in die Navigation integriert.', 1226948977),
(471, 'Angepasste Paragraphen - 12', 'http://www.martin-thoma.de/chemie/oxidationszahl.htm', 'Die Paragraphen und die Definitionen wurden auf dieser Seite nun richtig zusammengefasst.', 1226988074),
(481, 'Verbesserte 404-Seite, Angepasste Paragraphen - 13', 'http://martin-thoma.de/chemie/molekulare_stoffe.htm', 'Gestern habe ich die Websitesuche in die 404-Seite integriert, das hei&szlig;t jeder kann, wenn er eine falsche URL eingegeben hat sofort die Website nach dem Inhalt durchsuchen. Die Definition auf Molekulare Stoffe wurde auch angepasst.', 1227081870),
(491, 'Elektrochemie - neue Aufgabe', 'http://martin-thoma.de/chemie/elektrochemie.htm', 'F&uuml;r den Bereich Elektrochemie wurde soeben eine Aufgabe erstellt. Des Weiteren wurde eine kleiner fehler in der &Uuml;berschrift behoben.', 1227161760),
(501, 'Elektrochemie - neue Aufgaben', 'http://martin-thoma.de/chemie/elektrochemie.htm', 'Gerade habe ich wieder einige Aufgaben f&uuml;r Elektrochemie in das PDF-Dokument geschrieben und online gestellt.', 1227249554),
(511, 'Polarit&auml;t', 'http://martin-thoma.de/chemie/molekulare_stoffe.htm', 'Soeben wurde der Artikel &uuml;ber Molekulare Stoffe erg&auml;nzt und eine Schritt f&uuml;r Schritt Anleitung zum pr&uuml;fen, ob ein Molek&uuml;l polar ist, hinzugef&uuml;gt.', 1227334188),
(521, 'Die Brennstoffzelle', 'http://martin-thoma.de/chemie/brennstoffzelle.htm', 'Es wurde ein Artikel &uuml;ber Brennstoffzellen geschrieben.', 1227336081),
(531, 'Elektrochemie - wieder neue Aufgaben', 'http://martin-thoma.de/chemie/elektrochemie.htm', 'Gerade habe ich wieder einige Aufgaben f&uuml;r Elektrochemie in das PDF-Dokument geschrieben und online gestellt.', 1227429025),
(541, 'chemische Reaktionen - Video hinzugef&uuml;gt', 'http://www.martin-thoma.de/chemie/chemische_reaktion.htm', 'Um den Inhalt noch verst&auml;ndlicher zu machen habe ich nun ein Video auf YouTube gesucht (und gefunden). Dieses kann nun ganz unten unter &quot;Material&quot; gefunden werden.', 1227550689),
(551, 'Teilchenstruktur - Video hinzugef&uuml;gt', 'http://www.martin-thoma.de/chemie/teilchenstrucktur_der_materie.htm', 'Nun ist ein neues Video unter &quot;Material&quot; &uuml;ber die Teilchenstruktur der Materie verf&uuml;gbar.', 1227591267),
(561, 'Aktivierungsenergie - Video hinzugef&uuml;gt', 'http://www.martin-thoma.de/chemie/chemische_reaktion.htm', 'Ein Video &uuml;ber die Aktivierungsenergie ist nun unter &quot;Material&quot; verf&uuml;gbar.', 1227677184),
(571, 'Galvanische Zelle - Video hinzugef&uuml;gt', 'http://www.martin-thoma.de/chemie/elektrochemie.htm', 'Ein Video &uuml;ber die galvanische Zelle ist nun unter &quot;Material&quot; verf&uuml;gbar.', 1227766450),
(581, 'Ionenbindung - Video hinzugef&uuml;gt', 'http://martin-thoma.de/chemie/molekulare_stoffe.htm', 'Ein Video &uuml;ber die Ionenbindung ist nun unter &quot;Material&quot; verf&uuml;gbar.', 1227852050),
(591, 'Polarit&auml;t und Elektronegativit&auml;t - Video hinzugef&uuml;gt', 'http://martin-thoma.de/chemie/elektrochemie.htm', 'Ein Video &uuml;ber Polarit&auml;t und Elektronegativit&auml;t ist nun unter &quot;Material&quot; verf&uuml;gbar.', 1227947138),
(601, 'Elektronegativit&auml;t im PSE - Video hinzugef&uuml;gt', 'http://martin-thoma.de/chemie/elektrochemie.htm', 'Ein Video &uuml;ber das Verhalten der Elektronegativit&auml;t im PSE ist nun unter &quot;Material&quot; verf&uuml;gbar.', 1228036899),
(611, 'Die Knallgasprobe - Video hinzugef&uuml;gt', 'http://martin-thoma.de/chemie/chemische_reaktion.htm', 'Ein Video &uuml;ber die Knallgasprobe ist nun unter &quot;Material&quot; verf&uuml;gbar.', 1228109554),
(621, 'Lewisschreibweise eines Nitrit-Ions', 'http://martin-thoma.de/chemie/molekulare_stoffe.htm', 'Heute wurde Video &uuml;ber die Lewisschreibweise eines Nitritions hinzugef&uuml;gt.', 1228285208),
(631, 'Protonen, Neutronen und Elektronen', 'http://martin-thoma.de/chemie/bau_der_atome.htm', 'Ein Video &uuml;ber Protonen, Neutronen und Elektronen ist nun unter &quot;Material&quot; verf&uuml;gbar.', 1228457736),
(641, 'Banner', 'http://www.martin-thoma.de/chemie/', 'Ich war gestern auf einer Webdesignfortbildung und habe das Banner leicht ver&auml;ndert.', 1228457787),
(651, 'Icons verbessert', 'http://martin-thoma.de/chemie/impressum.htm', 'Heute habe ich mich wieder das Design der Seite verbessert. Email-Adressen werden nun mit dem richtigem Icon angezeigt und YouTube-Videos haben nun das bekannte YouTube-Icon.', 1228555831),
(661, 'Isomere von Hexan - Video hinzugef&uuml;gt', 'http://martin-thoma.de/chemie/klasse11.htm', 'Heute habe ich mal wieder ein Video hinzugef&uuml;gt. In diesem Video werden die 5 Isomere von Hexan erkl&auml;rt.', 1228648763),
(671, 'Spektakul&auml;re Versuche', 'http://martin-thoma.de/chemie/amazing_reaktions.htm', 'Hier k&ouml;nnt ihr die 5 coolsten Versuche anschauen, die ich online gefunden habe.', 1228748741),
(681, 'Das Wacker-Verfahren', 'http://martin-thoma.de/chemie/komplexverbindungen.htm', 'Der Artikel Komplexverbindungen wurde heute mit einem Video &uuml;ber das Wacker-Verfahren bereichert.', 1228799557),
(691, 'Artikel Protonen&uuml;berg&auml;nge - download', 'http://www.martin-thoma.de/chemie/protonenuebergaenge.htm', 'Der Artikel &uuml;ber Protonen&uuml;berg&auml;nge steht nun zum download als PDF-Datei bereit. Somit kann man sich nun auch offline in der Chemie weiterbilden und mann kann die Seite besser ausdrucken.', 1228892164),
(701, 'Icon', 'http://www.martin-thoma.de/chemie/', 'Das Favoriten-Icon war fr&uuml;her schlecht zu erkennen. Ich habe nun ein neues Icon erstellt, allerdings bin ich noch nicht zufrieden. Wahrscheinlich werden noch kleinere Ver&auml;nderungen folgen.', 1228977404),
(711, 'Icon', 'http://www.martin-thoma.de/chemie/', 'Nun wurde das Icon ein weiteres mal verbessert.', 1229372415),
(721, 'Artikel chemische Reaktion - download', 'http://martin-thoma.de/chemie/chemische_reaktion.htm', 'Der Artikel &uuml;ber die chemische Reaktion steht nun zum download als PDF-Datei bereit.', 1229580680),
(731, 'Artikel Teilchenstruktur - download', 'http://www.martin-thoma.de/chemie/teilchenstrucktur_der_materie.htm', 'Der Artikel &uuml;ber die Teilchenstruktur steht nun zum download als PDF-Datei bereit.', 1229664993);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
