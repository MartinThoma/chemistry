<?
require 'checkuser.php';
require 'db.inc.php';
$uploaddir = '/opt/users/www/mart1095web57/html/chemie/images/';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
  <title>Adminbereich - Bildergalerie</title>
  <link rel="shortcut icon" href="favicon.ico" />
  <link rel="stylesheet" type="text/css" href="style/cms.css" />

  <link rel="stylesheet" href="lightbox.css" type="text/css" media="screen" />
  <script src="prototype.js" type="text/javascript"></script>
  <script src="scriptaculous.js?load=effects,builder" type="text/javascript"></script>
  <script src="lightbox.js" type="text/javascript"></script>
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
<h1>Bildergalerie</h1>
<?

$gallery = addslashes($_GET['gallery']);
if($gallery ==''){
    $sql = "SELECT DISTINCT gallery FROM images";
    $result = mysql_query($sql);
    while($row = mysql_fetch_assoc($result)){
	echo "<p class=\"gallery\"><a href=\"picturegallery.php?gallery=".$row['gallery']."\">".$row['gallery']."</a></p>";
    }
} else {
    $sql = "SELECT * FROM images WHERE gallery='$gallery' AND is_thumb_from > 0";
    $result = mysql_query($sql);
    while($row = mysql_fetch_assoc($result)){
	$row2 = mysql_fetch_assoc(mysql_query("SELECT filename FROM images WHERE id=".$row['is_thumb_from']));
	$filename = $row2['filename'];
	echo '<a href="'.$filename.'"  rel="lightbox"  title="'.$row['filename'].'"><img src="'.$row['filename'].'" alt="'.$row['alt'].'" width="'.$row['width'].'" height="'.$row['height'].'"/></a>';
    }
}



?>
<hr/>
<a href="http://www.huddletogether.com/projects/lightbox2/#download" target="_blank">Lightbox v. 2.04</a>
</div>


</body>
</html>
