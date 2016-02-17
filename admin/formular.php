<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name="description" content="" />
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style/screen.css"  media="screen" />
  <link rel="stylesheet" type="text/css" href="print.css" media="print" />
  <link rel="shortcut icon" href="favicon.ico" />
</head>
<body>

<?php
if (isset ($_GET["fehler"])) {
  echo "Die Zugangsdaten waren ung&uuml;ltig.";
}

?>

<form action="login.php" method="post" style="width:250px;margin:auto;margin-top:30px;">
  <fieldset>
	<legend>Login</legend>
      <label for=uname>Username: <input type="text" name="uname" id="uname"/></label>
      <label for=upass>Passwort: <input type="password" name="upass" id="upass"/></label>
      <input type="submit" value="Login" style="width:100%;margin-top:7px;margin-bottom:7px;"/>
  </fieldset>
</form> 
</body>
</html>