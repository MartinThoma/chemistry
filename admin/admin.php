<?
require 'checkuser.php';
require 'db.inc.php';

$result	= mysql_query('SELECT * FROM configuration');
while($row = mysql_fetch_assoc($result)){$CONFIGURATION[$row['name']] = $row['value'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
    <title>Adminbereich</title>
    <link rel="Shortcut Icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="style/cms.css" media="screen"/>
</head>
<body>
<ul id="nav">
<?
$action	= $_GET['action'];
if($action == 'delete'){
    $id = $_GET['id'];
    $sql= "DELETE FROM artikel WHERE id=$id LIMIT 1";
    mysql_query($sql);
}

$sql	= "SELECT * FROM navigation WHERE type='Admin-Navigation' ORDER BY id ASC";
$result	= mysql_query($sql);
while($row = mysql_fetch_assoc($result)){
    echo '<li '.$row['attribute'].'><a href="'.$row['url'].'">'.$row['title'].'</a></li>';
}
?>
</ul>
</div>
<div id="content">
<h1>Adminbereich</h1>
<p>Bitte umbedingt ausloggen, sobald Sie fertig sind!</p>
<p class="important">Erstelle die Website noch den Daten in der Datenbank.<br/>
Achtung: Alle Daten werden &uuml;berschrieben!<br/>
<a href="create_website.php">Ich bin mir dar&uuml;ber im klaren, was passieren kann!</a></p>
<p>Bearbeite:
<table>
<?
    $sql = 'SELECT id, title FROM `artikel` WHERE title != "NOTHING" ORDER BY title ASC';
    $result = mysql_query($sql);
    while($row = mysql_fetch_assoc($result)){
	echo '<tr><td><a href="admin.php?id='.$row['id'].'&action=delete"><img src="style/cross.png" alt="L&ouml;schen"/></a>';
	echo '<a href="edit.php?id='.$row['id'].'">'.$row['title'].'</a></td></tr>';
    }

?>
<tr><td><a href="edit.php?id=new"><img src="style/add.png" alt="Neuer Artikel"/>Neuer Artikel</a></td></tr>
</table>
</p>


<!-- <p class="important">Bereinige die Website.<br/>
Achtung: Alle Daten auf dem FTP-Server werden gel&ouml;scht! Daten in der MySQL-Datenbank verbleiben.<br/>
<a href="ftp_reinigen.php">Ich bin mir dar&uuml;ber im klaren, was passieren kann!</a></p> -->

<h2>Tipps zum Artikelschreiben</h2>
<p>Immer mit der gr&ouml;&szlig;ten &Uuml;berschrift anfangen. Wenn der Inhalt es wert ist, eine eigene Seite zu haben, dann ist er auch eine gro&szlig;e &Uuml;berschrift wert.</p>
</body>
</html>
