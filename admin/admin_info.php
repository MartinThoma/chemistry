<?
require 'checkuser.php';
require 'db.inc.php';

$result	= mysql_query('SELECT * FROM configuration');
while($row = mysql_fetch_assoc($result)){$CONFIGURATION[$row['name']] = $row['value'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Adminbereich - Informationen f&uuml;r den Admin</title>
    <link rel="stylesheet" type="text/css" href="style/cms.css"  media="screen" />
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<body>
<ul id="nav">
<?
$sql	= "SELECT * FROM navigation WHERE type='Admin-Navigation' ORDER BY id ASC";
$result	= mysql_query($sql);
while($row = mysql_fetch_assoc($result)){
    echo '<li '.$row['attribute'].'><a href="'.$row['url'].'">'.$row['title'].'</a></li>';
}
?>
</ul>
<div id="content">
<h1>Adminbereich - Informationen f&uuml;r den Admin</h1>

<h3>Konventionen</h3>
<p>Um den Quelltext einheitlich zu gestalten, habe ich bestimmte Konventionen verwendet:</p>
<ul>
  <li>Dateiendung: .htm (Ausnahme: index.html)</li>
  <li>Einr&uuml;cken von Quelltext</li>
</ul>

<h3>Bereits geschriebene Skripte</h3>
<h4>create_website.php</h4>
<p>Dieses Skript erstellt die Seiten, deren Informationen in der Datenbank gespeichert sind. Der Vorteil gegen&uuml;ber einer vollkommen dynamischen Erstellung (also nur eine php-Datei, die die Daten anzeigt) ist, dass es den Server weniger belastet und daher schneller geht. Selbst wenn man die Dateien Cachen w&uuml;rde, w&auml;re es langsamer.<br/>
Dieses Skript erstellt auch automatisch eine Google-Sitemap, die man jedoch noch manuell bei google hochladen muss.<br/>
Auch die W&ouml;rter, die auf jeder Seite verlinkt sein sollen, verlinkt dieses Skript.</p>

<h3>SEO - Google</h3>
<p>Ich nutze im Moment Google Webmastertools und Google Analytics. Wer einen Zugang will, muss sich ein Googlekonto erstellen und mir eine Mail schicken.</p>
<p>Das CMS bietet die M&ouml;glichkeit, den Meta-Tag description zu speichern. Die Artikelschreiber m&uuml;ssen kontrolliert werden, ob sie es auch nutzen</p>
<p>Sobald die Sitemap mehr als 100 Seiten beinhaltet soll man sie aufteilen.</p>
<p>Mit dem Xenu Linksleuth kann die Website auf Fehlerhafte Links gepr&uuml;ft werden.</p>
<p>Weniger als 100 Links pro Seite</p>
<p>Sobald die Website fertig ist bei Open Directory Project, Yahoo! sowie anderen branchenspezifischen Diensten einreichen.</p>
<a href="http://www.google.com/addurl/?continue=/addurl" target="_blank">google.de - URL einreichen</a>
<a href="http://search.yahoo.com/info/submit.html" target="_blank">yahoo.com - URL einreichen</a>
<a href="http://www.google.com/support/webmasters/bin/answer.py?answer=35769&ctx=related#design" target="_blank">google.de - Designauskunft</a>

</div>
</div>

</body>
</html>
