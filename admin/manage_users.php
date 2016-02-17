<?
require 'checkuser.php';
require 'db.inc.php';

$do = $_POST['do'];
if($do == 'new_user'){
    $uname    = $_POST['uname'];
    $upass    = md5($_POST['upass']);
    $email    = $_POST['email'];
    if(check_email_address($email)){
        $auth    = $_POST['auth'];
        $sql    = "INSERT INTO `users` (`uname` ,`upass` ,`email` ,`auth`) ";
        $sql   .= "VALUES ('$uname', '$upass', '$email', '$auth');";
        mysql_query($sql);
    } else {
    echo "Die Emailadresse war nicht korrekt.";
    }
}
$do = $_GET['do'];
if($do == 'delete'){
    $uid    = $_GET['uid'];
    $sql    = "DELETE FROM users WHERE id = $uid LIMIT 1";
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
$sql    = "SELECT * FROM navigation WHERE type='Admin-Navigation' ORDER BY id ASC";
$result    = mysql_query($sql);
while($row = mysql_fetch_assoc($result)){
    echo '<li '.$row['attribute'].'><a href="'.$row['url'].'">'.$row['title'].'</a></li>';
}
?>
</ul>
</div>
<div id="content">
<h1>Adminbereich - User verwalten</h1>
<form action="manage_users.php" method="post">
  <input type="hidden" name="do" value="new_user" />
  <fieldset>
    <legend>Neuen User anlegen</legend>
    <label for="uname">Username:</label><input type="text" name="uname" size="35"/>
    <label for="upass">Passwort:</label><input type="password" name="upass" size="35"/>
    <label for="email">EMail:</label><input type="text" name="email" size="35"/>
    <label for="auth">Authorisations- gruppe:</label><input type="text" name="auth" size="35"/>
    <input type="submit" value="Neuen User erstellen" class="submit" />
  </fieldset>
</form>

<table border="1" style="background-color:#fff;">
<tr><th>&nbsp;</th><th>ID</th><th>Name</th><th>Email</th></tr>
<?
$sql        = "SELECT * FROM `users` ORDER BY auth ASC";
$result        = mysql_query($sql);
while($row = mysql_fetch_assoc($result)){
    $uid    = $row['id'];
    $uname    = $row['uname'];
    $email    = $row['email'];
    echo "<tr>";
    echo '<td><a href="manage_users.php?do=delete&uid='.$uid.'">';
    echo '<img width="16" height="16" src="style/cross.png" alt="L&ouml;schen" title="L&ouml;schen" />';
    echo "</a></td><td>$uid</td><td>$uname</td><td>$email</td></tr>";
}
?>
</table>

</div>
</body>
</html>

<?

function check_email_address($email) {
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
    // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
    return false;
    }
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
    if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
        return false;
    }
    }
    if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
        if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
        return false;
        }
    }
    }
    return true;
}
?>
