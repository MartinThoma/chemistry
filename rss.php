<?php
header("Content-Type: application/xml; charset=utf-8");

  /* Konfigurationsdateien */
require_once('admin/db.inc.php');
// Kopf/fuss includen

$result	= mysql_query('SELECT * FROM configuration');
while($row = mysql_fetch_assoc($result)){$CONFIGURATION[$row['name']] = $row['value'];}

$sql	= "SELECT * FROM `rss_feed` ORDER BY id DESC LIMIT 20";
$result = mysql_query($sql);

/*echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";*/
echo "<?xml-stylesheet type=\"text/css\" href=\"rss.css\"  ?>\n";
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">

  <channel>
    <title><?echo $CONFIGURATION['title_of_feed'];?></title>
    <link><?echo $CONFIGURATION['link_to_feed'];?></link>
    <description><?echo $CONFIGURATION['description_of_feed'];?></description>
    <language><?echo $CONFIGURATION['language_of_feed'];?></language>
    <ttl><?echo $CONFIGURATION['ttl_of_feed'];?></ttl>
    <atom:link href="http://<?echo $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];?>" rel="self" type="application/rss+xml" />




<?

while($row = mysql_fetch_assoc($result)){
    echo '<item>';
    echo '<title>'.$row['title']."</title>";
    echo '<link>'.$row['link']."</link>";
    echo '<description><![CDATA['.$row['description'].']]></description>';
    echo '<pubDate>'.date('r', $row['pubDate']).'</pubDate>';
    echo '<guid isPermaLink="false">http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'#'.$row['id'].'</guid>';
    echo "</item>\n\n";
}

?>

  </channel>
</rss>