<?
include('db.inc.php');
session_start();
$upass = md5($_POST['upass']);
$uname = addslashes($_POST['uname']);
$sql  = "SELECT id, uname, upass FROM users WHERE ";
$sql .= "uname = '$uname' AND upass = '$upass'";
$result = mysql_query ($sql);

if (mysql_num_rows ($result) > 0) {
  $data = mysql_fetch_array ($result);
  $_SESSION["user_id"] = $data["id"];
  $_SESSION["uname"] = $data["uname"];
  header ("Location: admin.php");
} else {
  if(substr_count($uname,' ') == 1){
    header ("Location: formular.php?fehler=1");
  } else {
    header ("Location: formular.php?fehler=2");
  }
  header ("Location: formular.php?fehler=1");
}
?>
