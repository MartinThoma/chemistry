<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15"/>
    <title>Chemie lernen</title>
    <meta name="description" content="Lernen Sie Summenformeln - schnell und einfach"/>
    <link type="image/x-icon" href="style/favicon.ico" rel="shortcut icon" />
    <style type="text/css" title="currentStyle" media="screen">
        @import "style/default.css";
div#output {
    margin : 50px;
    padding : 5px;
    font : bold 140% arial, sans;
    color: #003;
}
div#status {
    margin : 10px 50px 50px 50px;
    padding : 5px;
    font : bold 140% arial, sans;
    color: #003;
}
input#answer {
    margin-left: 50px;
}

.correct {
    background    : #cfc;
    border    : 3px solid lime;
}
.wrong {
    background    : #fcc;
    border    : 3px solid #f00;
}
label {
    display    : block;
    margin-top    : 10px;
}


input[type='checkbox']{
    float    : left;
    margin: 10px 10px 0 10px;
}
form {
    padding    : 15px;
}
    </style>
    <link rel="stylesheet" type="text/css" href="style/print.css" media="print" />

<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/effects.js" type="text/javascript"></script>
<script src="js/scriptaculous.js" type="text/javascript"></script>

<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="style/ie_screen.css">
<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
<![endif]-->
    <script>
function hol_summenformel() {
  var teste = $('Formular1').serialize();
  if(teste.length == 0){alert('Sie müssen zumindest einen Bereich auswählen!');}
  else {
  var myAjax = new Ajax.Request(
    "js/test.php",
            {
                method: 'post',
                parameters: {output:escape($('output').innerHTML), answer:escape($('answer').value), cat:$('Formular1').serialize()},
                onComplete: zeige_summenformel,
        onFailure: function(){ alert('Failure wurde ausgeloest...') }
            }


  );
  }
}
function errorhandler(originalRequest){
  alert(originalRequest.responseText);
}
function zeige_summenformel( originalRequest ) {
var b = originalRequest.responseText;
var temp = new Array();
temp = b.split(';');
   $('status').setAttribute('class', temp[1]);
   $('status').innerHTML = temp[2];
   $('output').innerHTML = temp[0];
   $('answer').value = '';
   $('answer').focus();
}


    </script>
</head>
<body>


<div id="bigbox">
<!--[if gte IE 5]><img style="width:0px; height: 0px;" src="clear.gif" /><![endif]-->
<div id="content">

<h1>&Uuml;bungen</h1>

<form method="post" id="Formular1" onSubmit="hol_summenformel();return false;" name="Formular1">
  <fieldset>
    <legend>Welche Summenformeln wollen Sie lernen?</legend>
    <input type="checkbox" id="grundwissen" name="cat" value="1"/>
    <label for="grundwissen">Grundwissen (H<sub>2</sub>O, O<sub>2</sub>, ...)</label>
    <input type="checkbox" id="ionen" name="cat" value="2"/>
    <label for="ionen">Ionen (CO<sub>3</sub><sup>2-</sup>, ...)</label>
    <input type="checkbox" id="saeuren" name="cat" value="3"/>
    <label for="saeuren">S&auml;uren und Basen (H<sub>2</sub>SO<sub>4</sub>, HCl, NH<sub>4</sub>, ...)</label>
  </fieldset>
<p>Bitte geben Sie den Namen der Verbindung / des Ions an. Gro&szlig; / Kleinschreibung spielt keine Rolle.</p>
 <div id="status" class="">&nbsp;</div>
 <div id="output">Klicke auf 'Nächstes' um zu starten</div>
 <input type="text" id="answer" />
 <input type="button" value="N&auml;chstes" onClick="hol_summenformel()">

</form>
</div>

<p id="footer">
<a href="impressum.htm">Impressum</a> | <a href="projekt.htm">&Uuml;ber dieses Projekt</a>
</p>

<ul id="nav">
<li id="home"><a href="index.htm">Startseite</a>
</li>
<li class="klasse"><a href="klasse8.htm">8. Klasse</a>
<ul>

<li><a href="g9-9_warum_chemie_in_der_schule.htm">Warum Chemie in der Schule?</a></li>
<li><a href="gemische_und_reinstoffe.htm">Gemische und Reinstoffe</a></li>
<li><a href="chemische_reaktion.htm">Die chemische Reaktion</a></li>
<li><a href="teilchenstrucktur_der_materie.htm">Teilchenstruktur der Materie</a></li>
<li><a href="chemische_grundgesetze.htm">Chemische Grundgesetze</a></li>
<li><a href="chemisches_rechnen.htm">Chemisches Rechnen</a></li>
<li><a href="gruppierung_chemischer_reaktionen.htm">Gruppierung von Reaktionen</a></li>
<li><a href="bau_der_atome.htm">Bau der Atome</a></li>
<li><a href="salze.htm">Salze</a></li>

</ul>
</li>
<li class="klasse"><a href="klasse9.htm">9. Klasse</a>
<ul>
<li><a href="salze.htm">Salze</a></li>
<li><a href="elementgruppen.htm">Elementgruppen des PSE</a></li>
<li><a href="molekulare_stoffe.htm">Molekulare Stoffe</a></li>
<li><a href="protonenuebergaenge.htm">Protonen&uuml;berg&auml;nge</a></li>
<li><a href="elektronenuebergaenge.htm">Elektronen&uuml;berg&auml;nge</a></li>

</ul>
</li>
<li class="klasse"><a href="klasse10.htm">10. Klasse</a>
<ul>
<li><a href="atombau_der_nebengruppen.htm">Atombau der Nebengruppen</a></li>
<li><a href="komplexverbindungen.htm">Komplexverbindungen</a></li>
<li><a href="reaktionsgeschwindigkeit.htm">Reaktionsgeschwindigkeit</a></li>
<li><a href="protolysegleichgewichte.htm">Protolysegleichgewichte</a></li>
<li><a href="elektrochemie.htm">Elektrochemie</a></li>
</ul>
</li>

<li class="klasse"><a href="klasse11.htm">11. Klasse</a>
<ul>
<li><a href="reaktionsgeschwindigkeit_start.htm">Reaktionsgeschwindigkeit</a></li>
</ul>
</li>
<li id="forum"><a href="http://www.chemieonline.de/forum/forumdisplay.php?f=1">Forum</a>
</li>
<li id="link"><a href="links.htm">Links</a>
</li>
<li id="kontakt"><a href="kontakt.htm">Kontakt</a>
</li>
<li id="impressum"><a href="impressum.htm">Impressum</a>

</li>
</ul>
</div>
</body>
</html>