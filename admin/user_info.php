<?
require 'checkuser.php';
require 'db.inc.php';

$do = $_POST['do'];

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
<h1>Adminbereich - Informationen des eigenen Accounts</h1>
<?
if($do == 'edit_info'){
    $atm_pw	= md5($_POST['atm_pw']);
    $new_pw	= md5($_POST['new_pw']);
    $retype_pw	= md5($_POST['retype_pw']);
    if($new_pw == $retype_pw){
	$sql	= "UPDATE `users` SET `upass` = '$new_pw' WHERE `id` =".$_SESSION['id']." AND upass == '$atm_pw' LIMIT 1 ;";
	if(mysql_query($sql)){
	    echo "Passwort wurde erfolgreich ge&auml;ndert.";
	} else {
	    echo "Das eingegebene Passwort war nicht korrekt.";
	}
    } else {
	echo "Die beiden neuen Passw&ouml;rter waren nicht identisch.";
    }
}
?>
<form action="user_info.php" method="post">
  <input type="hidden" name="do" value="edit_info" />
  <fieldset>
    <legend>Bearbeite Informationen</legend>
    <label for="atm_pw">Aktuelles Passwort</label>
    <input type="text" name="atm_pw" id="upass"/>
    <label for="new_pw">Neues Passwort</label>
    <input type="password" name="new_pw" id="upass"/>
    <label for="retype_pw">Passwort best&auml;tigen</label>
    <input type="password" name="retype_pw" id="upass"/>
    <input type="submit" value="Informationen &auml;ndern" class="submit">
  </fieldset>
</form>
</div>
</body>
</html>
