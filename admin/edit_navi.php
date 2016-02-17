<?
require 'checkuser.php';
require 'db.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" >

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
</div>
<div id="content">
<h1>Adminbereich - Bearbeite Navigation</h1>
<?
$action	= $_GET['action'];
if($action != ''){
    $id = $_GET['id'];
    if($action == 'delete'){
	$sql= "DELETE FROM navigation WHERE id=$id LIMIT 1";
    } elseif($action == 'new') {
   	$sql= "INSERT INTO `navigation` (`in_id` ,`type` ,`url` ,`title`, `attribute`) VALUES (NULL , 'Navigation', '', '', '');";
    } elseif($action == 'edit') {
	$in_ID	= $_POST['in_ID'];
	if($in_ID != ''){
	    $url= $_POST['url'];
	    $title= $_POST['title'];
	    $att = $_POST['attribute'];
	    $sql = "UPDATE `navigation` SET `in_id` = '$in_ID', `url` = '$url', `title` = '$title', attribute = '$att' WHERE `id` =$id LIMIT 1 ";
	    mysql_query($sql);
	}
	$sql= "SELECT * FROM navigation WHERE id=$id";
	$result = mysql_query($sql);
	$row	= mysql_fetch_assoc($result);
	echo '<form method="post" action="edit_navi.php?action=edit&id='.$id.'">';
	echo '<label for="in_ID">in_ID</label><input type="text" name="in_ID" value="'.$row['in_id'].'"/>';
	echo '<label for="url">URL</label><input type="text" name="url" value="'.$row['url'].'"/>';
	echo '<label for="title">Titel</label><input type="text" name="title" value="'.$row['title'].'"/>';
	echo '<label for="attribute">Attribute</label><input type="text" name="attribute" value="'.$row['attribute'].'"/>';
	echo '<label for="send">Abschicken</label><input type="submit" name="send"/>';
	echo '</form><br style="clear:both;"/>';

    }
    mysql_query($sql);
}
?>
<table border="1">
<tr><td>&nbsp;</td><td>&nbsp;</td><td>ID</td><td>in_ID</td><td>Titel</td><td>URL</td><td>Attribute</td></tr>
<?
    $sql = 'SELECT * FROM `navigation` WHERE type = "Navigation" ORDER BY in_id, id ASC';
    $result = mysql_query($sql);
    while($row = mysql_fetch_assoc($result)){
	echo '<tr><td><a href="edit_navi.php?id='.$row['id'].'&action=delete"><img src="style/cross.png" alt="L&ouml;schen"/></a></td>';
	echo '<td><a href="edit_navi.php?id='.$row['id'].'&action=edit"><img src="style/edit.png" alt="Bearbeiten"/></a></td>';
	echo '<td>'.$row['id'].'</td>';
	echo '<td>'.$row['in_id'].'</td>';
	echo '<td>'.$row['title'].'</td>';
	echo '<td>'.$row['url'].'</td>';
	echo '<td>'.$row['attribute'].'</td>';
	echo '</tr>';
    }

?>
<tr><td colspan="7"><a href="edit_navi.php?action=new"><img src="style/add.png" alt="new" />Neuer Punkt</a></td></tr>
</table>
</p>


<!-- <p class="important">Bereinige die Website.<br/>
Achtung: Alle Daten auf dem FTP-Server werden gel&ouml;scht! Daten in der MySQL-Datenbank verbleiben.<br/>
<a href="ftp_reinigen.php">Ich bin mir dar&uuml;ber im klaren, was passieren kann!</a></p> -->


</body>
</html>
