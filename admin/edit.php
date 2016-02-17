<?
require 'checkuser.php';
require 'db.inc.php';

    $do = $_POST['do'];
    if($do == 'edit'){
    $is_new         = $_POST['new'];
    if($is_new != 'new'){
        $id          = $_POST['id'];
        $title       = content_replace($_POST['title']);
        $description = content_replace($_POST['description']);
        $content     = mysql_escape_string(content_replace($_POST['writingArea']));
        $time        = time();
        $sql         = "UPDATE `artikel` SET `description` = '$description', ";
        $sql        .= "`last_edited` = '$time',`last_editor_id` = '".$_SESSION["user_id"]."', ";
        $sql        .= "`content` = '$content', title='$title' WHERE id=$id;";
        mysql_query($sql);
    } else {
        $title       = content_replace($_POST['title']);
        $description = $_POST['description'];
        $filename    = return_valid_filename($_POST['filename']);
        $content     = content_replace($_POST['writingArea']);
        $time        = time();
        $editor_id   = $_SESSION['user_id'];
        $who         = 0;
        $priority    = 5;
        $sql         = "INSERT INTO artikel (filename, title, content, description, priority, ";
        $sql        .="last_edited, last_editor_id) VALUES ('$filename', '$title', ";
        $sql        .="'$content', '$description', '$priority', '$time', '$editor_id');";
        mysql_query($sql);
    }
    }

    $id = $_GET['id'];
    if(is_numeric($id)){
    $sql = "SELECT content, description, title, filename FROM `artikel` WHERE id='$id'";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    $title        = $row['title'];
    $description    = $row['description'];
    $filename    = $row['filename'];
    $content    = $row['content'];
    $hidden        = '';
    } else {
    $title        = '';
    $description     = '';
    $filename    = '';
    $hidden        = '<input type="hidden" name="new" value="new"/>';
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" >

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Bearbeite Website - Adminbereich</title>
  <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="style/cms.css" />

 <!--   <script type="text/javascript" src="cms.js"></script>-->
</head>
<body>
<!-- <body onload="initEd()"> -->
<div id="bigbox">
<ul id="nav">
<?
$sql    = "SELECT * FROM navigation WHERE type='Admin-Navigation' ORDER BY id ASC";
$result    = mysql_query($sql);
while($row = mysql_fetch_assoc($result)){
    echo '<li '.$row['attribute'].'><a href="'.$row['url'].'">'.$row['title'].'</a></li>';
}
?>
</ul>

<div id="content">
<h1>Bearbeite Seite</h1>

<form name="tmarkup" method="post" action="edit.php?id=<? echo $id;?>">
<input type="hidden" name="do" value="edit">
<input type="hidden" name="id" value="<? echo $id;?>">
<? echo $hidden;?>
<label for="title">Titel:</label><input name="title" size="50" value="<? echo $title;?>" />
<label for="filename">Dateiname:</label><input name="filename" size="50" value="<? echo $filename;?>"/>
<label for="description">Google Beschreibung:</label><input name="description" size="50" value="<? echo $description;?>" />

<div id="menuEDIT" style="widht:500px;background-color:#dedede">
<select name="fontfamily" onchange="setFontFamily(this.form.fontfamily[this.form.fontfamily.selectedIndex].text);">
    <option selected="selected">Arial</option>
    <option>Comic Sans MS</option>
    <option>Courier New</option>
    <option>Georgia</option>
    <option>Impact</option>
    <option>Lucida Console</option>
    <option>Tahoma</option>
    <option>Times New Roman</option>
    <option>Verdana</option>
</select>

<select name="fontsize" onchange="setFontSize(this.form.fontsize[this.form.fontsize.selectedIndex].value);">
    <option value="1">8 Pt</option>
    <option value="2">10 Pt</option>
    <option selected="selected" value="3">12 Pt</option>
    <option value="4">14 Pt</option>
    <option value="5">18 Pt</option>
    <option value="6">24 Pt</option>
    <option value="7">36 Pt</option>
</select>
<a onClick="setBold()"    title="Fett">F</a>
<a onClick="setItalic()"  title="Kursiv"><i>K</i></a>
<a onClick="setUnderline()" title="Unterstrichen"><u>U</u></a>
<select name="selHeading" onChange="doHead(this.options[this.selectedIndex].value)">
<option value="">-</option>
<option value="p">Textabsatz</option>
<option value="h1">&Uuml;berschrift 1</option>
<option value="h2">&Uuml;berschrift 2</option>
<option value="h3">&Uuml;berschrift 3</option>
<option value="h4">&Uuml;berschrift 4</option>
</select><br style="clear:both;"/>
<a onClick="setLeft()"    title="Linksb&uuml;ndig"><img src="style/text_align_left.png"></a>
<a onClick="setMiddle()"  title="Zentriert"><img src="style/text_align_justify.png"></a>
<a onClick="setRight()"   title="Rechtsb&uuml;ndig"><img src="style/text_align_right.png"></a>
<a onClick="setImage()"   title="Bild einf&uuml;gen"><img src="style/photo_add.png"></a>
<a onClick="setQuote()"   title="Zitat einf&uuml;gen"><img src="style/quote.gif"></a>
<a onclick="setLink()"    title="Hyperlink einf&uuml;gen"><img src="style/link_add.png"></a>
<a onclick="setYoutube()" title="YouTube-Video einf&uuml;gen"><img src="style/youTube.gif"></a>
<a href="javascript: showHtml()" title="HTML"><img src="style/html.png"></a>
</div>



<textarea name="writingArea" id="writingArea" style="font-size: 12pt; font-family: Arial, Helvetica, sans-serif"><?echo $content;?></textarea>

<input type="submit" name="submit" value="Artikel speichern" />
</form>
</div>


</div>

</body>
</html>

<?
function return_valid_filename($file){
    $file    = strtolower($file);
    $file    = trim($file);
    $file    = str_replace(' ', '_', $file);
    $file    = str_replace('ü', 'ue', $file);
    $file    = str_replace('ö', 'oe', $file);
    $file    = str_replace('ä', 'ae', $file);
    if(substr($file, -4) != '.htm'){$file .= '.htm';}
    elseif(substr($file, -5) == '.html'){$file = substr($file, 0, (strlen($file)-1));}
    elseif(substr($file, -4) == '.doc'){$file = substr($file, 0, (strlen($file)-4)).'.htm';}
    return $file;
}
function content_replace($body){
    $body    = str_replace('<meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8">', '', $body);

    /* Entferne Leerzeichen und neue Zeilen */
    $body = str_ireplace("&nbsp;", " ", $body);
    $body = preg_replace("%([\s\n]+)%i", " ", $body);
    $body = str_ireplace("> <", "><", $body);
    $body = trim($body);
    //$body = preg_replace("/<(tr|th|li|hr|br)[^>]* [^>]*>/i", "<$1$2>", $body); /*NICHT bei a und img!!!*/

    /* Entferne Kommentare */
    $body = preg_replace("/(<!--)([\s\S]*?)(-->)/i", "", $body);

    /* Entferne Word-Formatierungen */
    $body = str_ireplace('<o:p></o:p>', '', $body);
    $body = str_ireplace('<span style="" times="" new="" roman="" standard="" ;="">', '', $body);
    $body = str_ireplace('class="MsoNormal">', '', $body);
   // $body = str_ireplace('<div>', '', $body);
   // $body = str_ireplace('</div>', '', $body);

    $body = str_ireplace('style=""', '', $body);
    $body = str_ireplace('title=""', '', $body);
    $body = str_ireplace('style="font-family: Arial;"', '', $body);
    $body = str_ireplace('<span></span>', '', $body);
    $body = str_ireplace('<p></p>', '', $body);
    $body = str_ireplace('<h3></h3>', '', $body);
    $body = str_ireplace('<span lang="EN-US">', '', $body);
    $body = str_ireplace('<span>', '', $body);
    $body = str_ireplace('<p><u><span style="font-size: 16pt; font-family: Arial;">', '<h2>', $body);
    $body = str_ireplace('<p><i><span style="font-size: 10pt; font-family: Arial;">', '<p class="quote">', $body);
    $body = str_ireplace('<span class="MsoFootnoteReference">', '<span class="footnote">', $body);

    /* Konventionen*/
    $body = str_replace(' ,', ',', $body); $body = str_replace(',', ', ', $body);
   // $body = str_replace(' .', '.', $body); $body = str_replace('.', '. ', $body); Dateinamen
   // $body = str_replace(' ?', '?', $body); $body = str_replace('?', '? ', $body); URLS / PHP
   // $body = str_replace(' :', ':', $body); $body = str_replace(':', ': ', $body); URLS
    $body = str_replace('( ', '(', $body); $body = str_replace('( ', ' (', $body);
    $body = str_replace(' )', ')', $body); $body = str_replace(' )', ') ', $body);
    $body = preg_replace("%([\s\n]+)%i", " ", $body);

    /* Umlaute */
    $body = str_replace("ü","&uuml;", $body);
    $body = str_replace("ä","&auml;", $body);
    $body = str_replace("ö","&ouml;", $body);
    $body = str_replace("Ü","&Uuml;", $body);
    $body = str_replace("Ä","&Auml;", $body);
    $body = str_replace("Ö","&Ouml;", $body);
    $body = str_replace("ß","&szlig;", $body);

    /* Sonstiges */
    $body = str_ireplace("<TD><BIG><B>","<th>", $body);
    $body = str_ireplace("</B></BIG></TD>","</th>", $body);
    $body = str_ireplace("<TD><B><BIG>","<th>", $body);
    $body = str_ireplace("</BIG></B></TD>","</th>", $body);
    $body = str_ireplace("<br>","<br/>", $body);
    $body = str_ireplace("<hr>","<hr/>", $body);
    $body = str_ireplace("<ul type=none>","<ul>", $body);
    $body = str_ireplace('<FONT COLOR="#FF0000">','<span class="important">', $body);
    $body = str_ireplace('</FONT>', '</span>', $body);
    $body = str_ireplace("<P> <P>","<p>", $body);
    $body = preg_replace("/(<\/font>)+/","</font>", $body);

    /* Überschriften */
    $body = str_ireplace("<CENTER><H1>","<h1>", $body);
    $body = str_ireplace("</H1></CENTER>","</h1>", $body);
    $body = str_ireplace("<H1><u>","<h1>", $body);
    $body = str_ireplace("</u></H1>","</h1>", $body);
    $body = preg_replace("%(<hr/>)(\s)*(<h1>|<h2>|<h3>|<h4>|<h5>|<h6>){1}%i", "$3", $body);        /* Kein <hr> vor <h1> */
    $body = preg_replace("%(</h1>|</h2>|</h3>|</h4>|</h5>|</h6>){1}(\s)*(<hr/>){1}%i", "$1", $body);    /* oder danach */

    /*dl compact durch ul entfernen*/
   // $body = str_ireplace("<DL COMPACT>","<ul>", $body);
   // $body = str_ireplace("<DT>","<li>", $body);
   // $body = str_ireplace("<DD>","<li>", $body);
   // $body = str_ireplace("</DL>","</ul>", $body);


    $body = preg_replace("/(>)( )*(<)/i", "><", $body);
   // $body = preg_replace("/(<br\/>(\s)*)+(<li>){1}/i", "</li>\n<li>", $body);//Fehlerquelle!?
    $body = preg_replace("/(\")(\s)*(SRC=)/i", "\" src=", $body);

    /*Listen (li war sehr selten geschlossen)*/
#    $body = preg_replace("%(<li>)([\s\S]*?)(<li>|</li>)%i", "$1$2</li>$3", $body);
#    $body = preg_replace("%([\s\n])*(</li>|</ul>|</ol>)%i", "$2", $body);        /* Entferne leerzeichen vor </li>, </ul>, </ol>*/
#    $body = preg_replace("%([a-zA-Z0-9]*)(</ul>)%i", "$1</li>$2", $body);        /* li vor ul schließen*/
#    $body = str_ireplace("</li></li>","</li>", $body);
 #   $body = str_ireplace("<li></li>","", $body);
 #   $body = str_ireplace("<li><li>","<li>", $body);
 #   $body = str_ireplace("<ul></li>","<ul>", $body);

    /*p-tag*/
    $body = preg_replace("%([\s\n]*</p>)%i", "</p>", $body);
    $body = preg_replace("%([\s\n]*<p>[\s\n]*)%i", "<p>", $body);
    $body = preg_replace("%(<p>)+%i", "\n\n<p>", $body);
    $body = preg_replace("%(<p>)$%i", "", $body);

    /*Neu-Bilder entfernen*/
    $body = str_ireplace('<IMG SRC="http://www.math.uni-augsburg.de/pictures/neuf.gif">',"", $body);
    $body = str_ireplace('<IMG SRC="/pictures/neu.gif">',"", $body);
    $body = str_ireplace('<IMG SRC="http://www.math.uni-augsburg.de/pictures/neu.gif">',"", $body);

    $body = preg_replace("%([\s\n]*<br/>[\s\n]*)%i", "<br/>\n", $body);


    /*Struckturiere Quelltext*/
    $body = str_ireplace("<li>","\n<li>", $body);
    $body = str_ireplace("<li>","    <li>", $body);
    $body = str_ireplace("<ul>","\n\n<ul>", $body);
    $body = str_ireplace("</ul>","\n</ul>\n\n", $body);
    $body = str_ireplace("<table>","\n\n<table>\n", $body);
    $body = str_ireplace("</table>","\n</table>\n\n", $body);
    $body = str_ireplace("<tr>","\n<tr>", $body);
    $body = str_ireplace("</tr>","\n</tr>", $body);
    $body = str_ireplace("<td>","\n    <td>", $body);
    $body = preg_replace("%(</h1>|</h2>|</h3>|</h4>|</h5>|</h6>|</p>){1}(\s)*%i", "$1\n", $body);
    $body = str_ireplace("<form>","\n\n<form>\n", $body);
    $body = str_ireplace("</form>","\n</form>\n\n", $body);
    $body = str_ireplace('<INPUT TYPE="hidden"',"\n<input type=\"hidden\"", $body);

    /*klein - nötig für XHTML 1.0 Transitional Validation*/
    $body = str_ireplace('<ul>','<ul>', $body);$body = str_ireplace('</ul>','</ul>', $body);
    $body = str_ireplace('<ol>','<ol>', $body);$body = str_ireplace('</ol>','</ol>', $body);
    $body = str_ireplace('<h1>','<h1>', $body);$body = str_ireplace('</h1>','</h1>', $body);
    $body = str_ireplace('<h2>','<h2>', $body);$body = str_ireplace('</h2>','</h2>', $body);
    $body = str_ireplace('<h3>','<h3>', $body);$body = str_ireplace('</h3>','</h3>', $body);
    $body = str_ireplace('<h4>','<h4>', $body);$body = str_ireplace('</h4>','</h4>', $body);
    $body = str_ireplace('<h5>','<h5>', $body);$body = str_ireplace('</h5>','</h5>', $body);
    $body = str_ireplace('<h6>','<h6>', $body);$body = str_ireplace('</h6>','</h6>', $body);
    $body = str_ireplace('<big>','<big>', $body);$body = str_ireplace('</big>','</big>', $body);
    $body = str_ireplace('<p>','<p>', $body);  $body = str_ireplace('</p>','</p>', $body);
    $body = str_ireplace('<i>','<i>', $body);  $body = str_ireplace('</i>','</i>', $body);
    $body = str_ireplace('<u>','<u>', $body);  $body = str_ireplace('</u>','</u>', $body);
    $body = str_ireplace('<b>','<b>', $body);  $body = str_ireplace('</b>','</b>', $body);
    $body = str_ireplace('<li>','<li>', $body);
    $body = str_ireplace('<a href','<a href', $body);$body = str_ireplace('</a>','</a>', $body);
    $body = str_ireplace("http://www.Math.Uni-Augsburg.DE","http://www.math.uni-augsburg.de", $body);

    $body = trim($body);
    return $body;
}
?>
