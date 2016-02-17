<?require 'admin/db.inc.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15"/>
    <title>Websitesuche</title>
    <meta name="description" content="Website durchsuchen"/>
    <link type="image/x-icon" href="style/favicon.ico" rel="shortcut icon" />
    <style type="text/css" title="currentStyle" media="screen">
        @import "style/default.css";
    </style>
    <link rel="stylesheet" type="text/css" href="style/print.css" media="print" />

<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/effects.js" type="text/javascript"></script>
<script src="js/scriptaculous.js" type="text/javascript"></script>

<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="style/ie_screen.css">
<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
<![endif]-->

</head>
<body>


<div id="bigbox">
<!--[if gte IE 5]><img style="width:0px; height: 0px;" src="clear.gif" /><![endif]-->
<div id="content">


<h1>Websitesuche</h1>

<form method="post" id="Formular1">
  <fieldset>
    <legend>Websitesuche</legend>
    <input type="input" id="suche" name="search" value=""/>
    <label for="suche">Suche nach</label>
    <input type="submit" value="Website durchsuchen"/>
  </fieldset>
</form>
<br/>
<p class="results">
<?
$search = mysql_real_escape_string($_POST['search']);
if($search != ''){
    $sql = "SELECT filename, title  FROM `artikel` WHERE `content` LIKE CONVERT(_utf8 '%$search%' USING latin1) COLLATE latin1_swedish_ci ORDER BY `title` ASC ";
    $result = mysql_query($sql);
    while($row = mysql_fetch_assoc($result)){
    echo '<a href="'.$row['filename'].'">'.$row['title'].'</a><br/>';
    }
    $ip = mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
    $sql = "INSERT INTO `suche` (`id` ,`suche` ,`zeit` ,`ip`) ";
    $sql.= "VALUES (NULL , '$search', '".time()."', '".$ip."');";
    mysql_query($sql);
}
?>
</p>
</div>

<p id="footer">
<a href="impressum.htm">Impressum</a> | <a href="projekt.htm">&Uuml;ber dieses Projekt</a>

</p>

<ul id="nav">
<li id="home"><a href="index.htm">Startseite</a>
</li>
<li class="klasse"><a href="klasse8.htm">8. Klasse</a>
<ul>
<li><a href="gemische_und_reinstoffe.htm">Gemische und Reinstoffe</a></li>
<li><a href="chemische_reaktion.htm">Die chemische Reaktion</a></li>
<li><a href="teilchenstrucktur_der_materie.htm">Teilchenstruktur der Materie</a></li>
<li><a href="chemische_grundgesetze.htm">Chemische Grundgesetze</a></li>

<li><a href="chemisches_rechnen.htm">Chemisches Rechnen</a></li>
<li><a href="gruppierung_chemischer_reaktionen.htm">Gruppierung von Reaktionen</a></li>
<li><a href="bau_der_atome.htm">Bau der Atome</a></li>
<li><a href="salze.htm">Salze</a></li>
<li><a href="metalle.htm">Metalle</a></li>
</ul>
</li>
<li class="klasse"><a href="klasse9.htm">9. Klasse</a>
<ul>
<li><a href="salze.htm">Salze</a></li>

<li><a href="elementgruppen.htm">Elementgruppen des PSE</a></li>
<li><a href="molekulare_stoffe.htm">Molekulare Stoffe</a></li>
<li><a href="protonenuebergaenge.htm">Protonen&uuml;berg&auml;nge</a></li>
<li><a href="elektronenuebergaenge.htm">Elektronen&uuml;berg&auml;nge</a></li>
</ul>
</li>
<li class="klasse"><a href="klasse10.htm">10. Klasse</a>
<ul>

<li><a href="atombau_der_nebengruppen.htm">Atombau der Nebengruppen</a></li>
<li><a href="komplexverbindungen.htm">Komplexverbindungen</a></li>
<li><a href="protolysegleichgewichte.htm">Protolysegleichgewichte</a></li>
<li><a href="elektrochemie.htm">Elektrochemie</a></li>
</ul>
</li>
<li class="klasse"><a href="klasse11.htm">11. Klasse</a>
<ul>
<li><a href="reaktionsgeschwindigkeit_start.htm">Reaktionsgeschwindigkeit</a></li>
</ul>
</li>

<li id="forum"><a href="http://www.chemieonline.de/forum/forumdisplay.php?f=1">Forum</a>
</li>
<li id="link"><a href="links.htm">Links</a>
</li>
<li id="kontakt"><a href="kontakt.htm">Kontakt</a>
</li>
<li id="impressum"><a href="impressum.htm">Impressum</a>
</li>
</ul>
</div>
</body>
</html>