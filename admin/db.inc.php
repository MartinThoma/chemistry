<?
$pc = 'martin-thoma';
if($pc == 'pc07'){
    define('MYSQL_HOST',     'localhost');
    define('MYSQL_USER',     'root');
    define('MYSQL_PASS',     'TODO');
    define('MYSQL_DATABASE', 'TODO');
} elseif ($pc == 'martin-thoma'){
    define('MYSQL_HOST',     'TODO');
    define('MYSQL_USER',     'TODO');
    define('MYSQL_PASS',     'TODO');
    define('MYSQL_DATABASE', 'TODO');
}

    mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS) OR die("Keine Verbindung zur Datenbank. Fehlermeldung:".mysql_error());
    mysql_select_db(MYSQL_DATABASE) OR die("Konnte Datenbank nicht benutzen, Fehlermeldung: ".mysql_error());
?>
