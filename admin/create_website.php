<?
include('db.inc.php');

/* Muss an lokale gegebenheiten angepasst werden */
$base_folder    = "/opt/users/www/mart1095web57/html/chemie/";
//$base_folder    = "/var/www/chemie/";
$template_src    = $base_folder."admin/template.tpl";        /*Wird für alle Websiten genutzt*/

if($handle = fopen($template_src, "r")){
    $template = fread($handle, filesize($template_src));
    fclose($handle);
    $sql    = 'SELECT * FROM `navigation` WHERE `in_id` = 0';
    $result = mysql_query($sql);

    $navigation = '<ul id="nav">'."\n";
    while($row  = mysql_fetch_assoc($result)){
    if($row['url'] != '') {$navigation .= '<li '.$row['attribute'].'><a href="'.$row['url'].'">'.$row['title'].'</a>'."\n";}
    else {$navigation .= '<li><span>'.$row['title']."</span>\n";}
    $result2= mysql_query("SELECT * FROM `navigation` WHERE `in_id` = ".$row['id']);


    $navigation_temp='';
    while($row2 = mysql_fetch_assoc($result2)){
        if($row2['url'] != '') {$navigation_temp .= '<li><a href="'.$row2['url'].'">'.$row2['title'].'</a></li>'."\n";}
        else {$navigation_temp .= '<li>'.$row2['title'].'</li>'."\n";}
    }
    if($navigation_temp != ''){
    $navigation .= '<ul>'."\n";
    $navigation .= $navigation_temp;
    $navigation .= '</ul>'."\n";
}
    $navigation .= '</li>'."\n";
    }
    $navigation    .= '</ul>';

    $template    = str_replace('{#navigation#}', $navigation, $template);

    $sql = "SELECT * FROM `artikel`";
    $result = mysql_query($sql);
    while($row = mysql_fetch_assoc($result)){
    if(!file_exists(dirname($base_folder.$row['filename']))){
        mkdir_recursive($base_folder.dirname($row['filename']), 0777);
    }
    if($handle   = fopen($base_folder.$row['filename'], "w")){

    /* Fetch News */
    $sql      = "SELECT title, filename FROM artikel WHERE title !='NOTHING' ORDER BY last_edited DESC LIMIT 5;";
    $result2  = mysql_query($sql);
    $news      = '<ul>';
    while($row2      = mysql_fetch_assoc($result2)){
        $news .= '<li><a href="'.$row2['filename'].'">'.$row2['title'].'</a></li>';
    }
    $news    .= '</ul>';

    $file_src = str_replace('{#description#}',$row['description'], $template);
    $file_src = str_replace('{#news#}', $news, $file_src);
    $file_src = str_replace('{#title#}',$row['title'], $file_src);
    $file_src = str_replace('{#filename#}',$row['filename'], $file_src);
    $file_src = str_replace('{#zeitpunkt#}',date('d.m.Y', $row['last_edited']), $file_src);
    $result2 = mysql_query("SELECT uname FROM users WHERE id = ".$row['last_editor_id']);
    $row2    = mysql_fetch_assoc($result2);
    $file_src = str_replace('{#autor#}',$row2['uname'], $file_src);/*
    foreach($auto_replaces AS $key=>$value){
        $file_src = str_replace('{#'.$key.'#}', $value, $file_src);
    }*/
    $file_src = str_replace('{#content#}',$row['content'], $file_src);

    fwrite($handle, $file_src);
    fclose($handle);
    }
    }
    create_goole_sitemap($base_folder);
    header('Location:admin.php');
} else {
    echo "Konnte Template-Datei nicht &ouml;ffnen. Bitte Rechte &uuml;berpr&uuml;fen.";
    if(!is_file($template_src)){echo 'Bitte den korrekten Pfad in der create_website.php eingeben.';}
}

function mkdir_recursive($pathname, $mode) {
    is_dir(dirname($pathname)) || mkdir_recursive(dirname($pathname), $mode);
    return is_dir($pathname) || mkdir($pathname, $mode);
}
function create_goole_sitemap($base_folder){
    $google_sitemap = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.google.com/schemas/sitemap/0.84"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">
    <!-- Last update of sitemap '.date('c').' -->';
    $sql = "SELECT filename, priority, last_edited FROM `artikel`";
    $result = mysql_query($sql);
    while($row = mysql_fetch_assoc($result)){
    $google_sitemap .= '<url>';
    $google_sitemap .= '<loc>http://'.$_SERVER['HTTP_HOST'].dirname(dirname($_SERVER['SCRIPT_NAME'])).'/'.$row['filename'].'</loc>';
    $google_sitemap .= '<lastmod>'.date('c', $row['last_edited']).'</lastmod>';
    $google_sitemap .= '<changefreq>weekly</changefreq>';
    $google_sitemap .= '<priority>0.'.$row['priority'].'</priority>';
    $google_sitemap .= '</url>';
    }
    $google_sitemap .='</urlset>';
    if($handle   = fopen($base_folder.'sitemap.xml', "w")){
        fwrite($handle, $google_sitemap);
        fclose($handle);
    }
}

?>
