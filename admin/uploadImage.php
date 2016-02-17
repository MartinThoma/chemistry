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
</div>
<div id="content">
<h1>Bild hochladen</h1>
<p>Das Bild darf maximal 500 kB gro&szlig; sein</p>
<form enctype="multipart/form-data" action="uploadImage.php" method="post">
<label for="userfile">Lade dieses Bild hoch: </label>	<input name="userfile" type="file" />
<label for="gallery">Galerie:</label>		<select name="gallery" style="width: 200px">
<?
    $sql = "SELECT DISTINCT gallery FROM images";
    $result = mysql_query($sql);
    while($row = mysql_fetch_assoc($result)){
	echo "<option>".$row['gallery']."</option>";
    }

?>
</select> <u>oder</u> <input type="text" name="new_gallery" value="" /><br/>
<label for="alt">Alternativtext:</label>	<input type="text" name="alt" />
<input type="submit" value="Bild hochladen" class="submit"/>
</form>

<?

if($_FILES['userfile']['size'] > 0){
    if($_FILES['userfile']['error'] == 0){
	if(scale_image($_FILES['userfile']['tmp_name'],$CONFIGURATION['uploaddir'].$_FILES['userfile']['name'], 600, 800)){
	    if(scale_image($CONFIGURATION['uploaddir'].$_FILES['userfile']['name'],$CONFIGURATION['uploaddir'].'thumb/'.$_FILES['userfile']['name'], 150, 500)){
		if($_POST['new_gallery'] != ''){$gallery = $_POST['new_gallery'];}
		else {$gallery = $_POST['gallery'];}
		$alt = $_POST['alt'];

		$filename	= 'img/'.$_FILES['userfile']['name'];
		list($w, $h)	= getimagesize($filename);
		$sql = "INSERT INTO images (is_thumb_from, filename, alt, width, height) VALUES (0, '$filename', '$alt', $w, $h)";
		mysql_query($sql);

		$sql		= "SELECT id FROM images WHERE filename='$filename'";
		$result		= mysql_query($sql);
		$row		= mysql_fetch_assoc($result);
		$id		= $row['id'];

		$filename	= 'img/thumb/'.$_FILES['userfile']['name'];
		list($w, $h)	= getimagesize($filename);
		$sql = "INSERT INTO images (is_thumb_from, filename, alt, width, height) VALUES ($id, '$filename', '$alt', $w, $h)";
		mysql_query($sql);
		echo "Bild wurde erfolgreich hochgeladen.<br/> URL: ".$_FILES['userfile']['name']."<br/>";
	    }
	}
    } else {
	print_error($_FILES['userfile']['error']);
    }
} else {
    print_error($_FILES['userfile']['error']);
}
?>
</div>


</body>
</html>




<?
function print_error($errorcode){
    switch($errorcode){
	case 1:
	    echo "Die hochgeladene Datei überschreitet die in der Anweisung upload_max_filesize in php.ini festgelegte Größe.";break;
	case 2:
	    echo "Die hochgeladene Datei überschreitet die in dem HTML Formular mittels der Anweisung MAX_FILE_SIZE angegebene maximale Dateigröße.";break;
	case 3:
	    echo "Die Datei wurde nur teilweise hochgeladen.";break;
	case 4:
	    echo "Es wurde keine Datei hochgeladen.";break;
    }
}
function scale_image($origin, $target, $heightMax, $widthMax){
    if(is_file($origin)){
	$a_size = getimagesize($origin);
	$widthFactor  = $a_size[0]/$widthMax;
	$heightFactor = $a_size[1]/$heightMax;

	if($a_size[2] == 2){
	    if($widthFactor > $heightFactor){
		if($widthFactor > 1){
		    $img = imagecreatefromjpeg($origin);
		    $x	= $widthMax;
		    $y	= $a_size[1]/$widthFactor;
		    $neu = imagecreatetruecolor($x,$y);
		    imagecopyresized($neu, $img, 0, 0, 0, 0, $x, $y, $a_size[0], $a_size[1]);
		    imagejpeg($neu, $target, 95);
		    imagedestroy($img);
		} else {
		    $img = imagecreatefromjpeg($origin);
		    $x	= $a_size[0];
		    $y	= $a_size[1];
		    $neu = imagecreatetruecolor($x,$y);
		    imagecopyresized($neu, $img, 0, 0, 0, 0, $x, $y, $a_size[0], $a_size[1]);
		    imagejpeg($neu, $target, 95);
		    imagedestroy($img);
		}
	    } else {
		if($heightFactor > 1){
		    $img = imagecreatefromjpeg($origin);
		    $x	= $a_size[0]/$heightFactor;
		    $y	= $heightMax;
		    $neu = imagecreatetruecolor($x,$y);
		    imagecopyresized($neu, $img, 0, 0, 0, 0, $x, $y, $a_size[0], $a_size[1]);
		    imagejpeg($neu, $target, 95);
		    imagedestroy($img);
		} else {
		    $img = imagecreatefromjpeg($origin);
		    $x	= $a_size[0];
		    $y	= $a_size[1];
		    $neu = imagecreatetruecolor($x,$y);
		    imagecopyresized($neu, $img, 0, 0, 0, 0, $x, $y, $a_size[0], $a_size[1]);
		    imagejpeg($neu, $target, 95);
		    imagedestroy($img);
		}
	    }
	    return TRUE;
	} else{ echo "Bitte nur .jpg-Bilder hochladen";    return FALSE;}
    } else {
	echo "Datei ($origin) existiert nicht.";
	return FALSE;
    }
}


?>
