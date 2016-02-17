<?

if($_POST['betreff'] != ''){
    $betreff	= $_POST['betreff'];
    $grund	= $_POST['grund'];
    $text	= $_POST['text'];
    $email	= $_POST['email'];
    $text	.= "\n\n Email: ".$email;
    if(strlen($text) > 7){
	if(mail('themoosemind@googlemail.com', "Ch: $grund - $betreff", $text)){echo 'Vielen Dank f&uuml;r Ihre Nachricht.';}
	else {echo 'Die Nachricht konnte leider nicht versendet werden. Bitte versuchen sie es in drei Tagen nochmals.';}
    } else {echo "Etwas mehr d&uuml;rfen Sie schon schreiben.";}
}

?>

<a href="http://www.martin-thoma.de/chemie/">chemie.martin-thoma.de</a>
