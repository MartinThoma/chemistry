<?
require 'checkuser.php';
require 'db.inc.php';

$do = $_POST['do'];
if($do == 'new_rss'){
    $title	= htmlentities($_POST['title']);
    $description= htmlentities($_POST['description']);
    $link	= $_POST['link'];
    $sql	= "INSERT INTO `rss_feed` (`title` ,`link` ,`description` ,`pubDate`) ";
    $sql       .="VALUES ('$title', '$link', '$description', '".time()."');";
    mysql_query($sql);
}
$do = $_GET['do'];
if($do == 'delete'){
    $id		= $_GET['id'];
    $sql	= "DELETE FROM rss_feed WHERE id = $id LIMIT 1";
    mysql_query($sql);
}
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
</div>
<div id="content">
<h1>Adminbereich - RSS-Feed verwalten</h1>
<p><a href="rss.php" target="_blank">Direkt zum Feed</a></p>
<form action="manage_rss.php" method="post">
  <input type="hidden" name="do" value="new_rss" />
  <fieldset>
    <legend>Manage RSS Feed</legend>

    <label for="title">Titel</label>
    <input type="text" name="title" class="required"/>

    <label for="link">Link</label>
    <input type="text" name="link" class="required" value="<?echo $_SERVER['SERVER_NAME'];?>" size="64"/>

    <label for="description">Beschreibung / Text</label>
    <input type="text" name="description" class="required" size="64"/>
  <input type="submit" value="Neuen Feed-Eintrag erstellen" class="submit" />
  </fieldset>
</form>

<table border="1" style="background-color:#fff;">
<tr><th>&nbsp;</th><th>ID</th><th>Titel</th><th>Link</th><th>Description</th></tr>
<?
$sql		= "SELECT * FROM `rss_feed` ORDER BY id DESC LIMIT 20";
$result		= mysql_query($sql);
while($row = mysql_fetch_assoc($result)){
    $id		= $row['id'];
    $title	= $row['title'];
    $link	= $row['link'];
    $description= $row['description'];
    echo '<tr><td><a href="manage_rss.php?do=delete&id='.$id.'">';
    echo '<img width="16" height="16" src="style/cross.png" alt="L&ouml;schen" title="L&ouml;schen" />';
    echo "</a></td><td>$id</td><td>$title</td><td>$link</td><td>$description</td></tr>";
}
?>
</table>
</div>
</body>
</html>
