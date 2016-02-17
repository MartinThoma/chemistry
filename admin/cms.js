var mode;
var showed = false;
var openTags = new Array();
var i=0;


function initEd() {
	var textArea = document.getElementById('writingArea');
	var textAreaWidth = parseInt(textArea.offsetWidth);
	var textAreaHeight = parseInt(textArea.offsetHeight);

	//hide textarea
	textArea.style.display = 'none';

	//create the iframe
	var iframe = document.createElement('iframe');
	iframe.setAttribute('id', 'writingFrame');
	textArea.parentNode.insertBefore(iframe, textArea);

	//style iframe
	iframe.style.width 		= (textAreaWidth - 2) + 'px';
	iframe.style.height 		= textAreaHeight + 'px';
	iframe.style.border 		= '#A5ACB2 1px solid';


	var editor = document.getElementById('writingFrame').contentWindow.document;

	//create iframe page content
	var iframeContent;
	iframeContent  = '<html>\n';
	iframeContent += '<head>\n';
	//iframeContent += '<link rel=stylesheet type=text/css href="../default.css">\n';
	iframeContent += '<style>html,body{border:0px;background-color: #FFFFFF; font-family: Arial; }\ntd{border:1px dotted #CCCCCC;}\n</style>\n';
	iframeContent += '</head>\n';
	iframeContent += '<body leftmargin="1" topmargin="1" marginwidth="1" marginheight="1" class="writingFrame">';
	iframeContent += textArea.value;
	iframeContent += '</body>\n';
	iframeContent += '</html>';

	editor.open();
	editor.write(iframeContent);
	editor.close();
	function initIframe() {
		editor.designMode = 'on';
	}
	setTimeout(initIframe, 300);
	
	//get textrea value from RTE and run any original onSubmit events
	textArea.form.onsubmit = function(){
		if(!showed) { 
		 textArea.value = editor.body.innerHTML;
		 }
	}
	
	//resetting the form
	textArea.form.onreset = function(){
		if (window.confirm('WARNING: All form data will be lost!!')){
	 		editor.body.innerHTML = '';
	 		return true;
	 	}
	return false;
	}

	//unload event so we don't loose the data
	window.onunload = function(){	
		if(!showed) textArea.value = editor.body.innerHTML;
	}
	
}

function showHtml() {
	if(showed) {
		initEd();
		showed = false;
	} else {
		var writingArea = document.getElementById('writingArea');
		var writingFrame = document.getElementById('writingFrame');
		
		writingArea.value = writingFrame.contentWindow.document.body.innerHTML;
		writingArea.parentNode.removeChild(writingFrame);
		writingArea.style.display = "inline";
	
		showed = true;
	}
}

function FormatText(command, option){
	var editor = document.getElementById('writingFrame');
	editor.contentWindow.document.execCommand(command, false, option);
	editor.contentWindow.focus();
}


function setFontSize(size) {
	var editor = document.getElementById('writingFrame');
	editor.contentWindow.document.execCommand('fontsize', false, size);
	editor.contentWindow.focus();
}
function setFontFamily(family) {
	var editor = document.getElementById('writingFrame');
	editor.contentWindow.document.execCommand('fontname', false, family);
	editor.contentWindow.focus();
	
}
function setBold() {
	var editor = document.getElementById('writingFrame');
	editor.contentWindow.document.execCommand('bold', false, '');
	editor.contentWindow.focus();
}
function setItalic() {
	var editor = document.getElementById('writingFrame');
	editor.contentWindow.document.execCommand('italic', false, '');
	editor.contentWindow.focus();
}
function setUnderline() {
	var editor = document.getElementById('writingFrame');
	editor.contentWindow.document.execCommand('underline', false, '');
	editor.contentWindow.focus();
}
function setLeft() {
	var editor = document.getElementById('writingFrame');
	editor.contentWindow.document.execCommand('justifyleft', false, '');
	editor.contentWindow.focus();
}
function setMiddle() {
	var editor = document.getElementById('writingFrame');
	editor.contentWindow.document.execCommand('justifycenter', false, '');
	editor.contentWindow.focus();
}
function setRight() {
	var editor = document.getElementById('writingFrame');
	editor.contentWindow.document.execCommand('justifyright', false, '');
	editor.contentWindow.focus();
}
function setImage() {
	var editor = document.getElementById('writingFrame');
	var img = prompt("Bitte geben sie die URL des Bildes ein:", "http://");
	if(img != "http://" || img != "") {
		editor.contentWindow.document.execCommand('InsertImage', false, img);
		editor.contentWindow.focus();
	} 
}
function setQuote() {
	var editor = document.getElementById('writingFrame');
	editor.contentWindow.document.execCommand('FormatBlock', false, 'blockquote'); 
	
	editor.contentWindow.document.body.innerHTML += "<br>";
	editor.contentWindow.focus();
	
}
function setLink() {
	var editor = document.getElementById('writingFrame');
	var hLink = prompt("Bitte geben sie die URL ein, die sie verlinken wollen", "http://");
	if(hLink != "" || hLink != "http://") {
		editor.contentWindow.document.execCommand('CreateLink', false, hLink); 
		editor.contentWindow.focus();
	}
}
function  setYoutube (){
	var writingFrame = document.getElementById('writingFrame');
	var writingArea = document.getElementById('writingArea');
			
	if(url = prompt("Bitte die Video-URL eingeben:")) {
		var array = url.split("=");
		writingArea.value = writingFrame.contentWindow.document.body.innerHTML;
		
		writingArea.value += "<object height='350' width='425'>" +
			"<param name='movie' value='http://www.youtube.com/v/"+array[1]+"'>"+
			"<embed src='http://www.youtube.com/v/"+array[1]+"' type='application/x-shockwave-flash' height='338' width='425'></object><br /><br />";
			
		writingArea.style.display = "inline";
		writingArea.parentNode.removeChild(writingFrame);
		initEd();
		writingFrame.contentWindow.focus();
		
	}

} 

function doHead(hType) {
    var editor = document.getElementById('writingFrame');
    if(hType != ''){
	editor.contentWindow.document.execCommand('formatblock', false, hType);
    }
}
//  document.execCommand("BackColor",0,"color")
//  document.execCommand("ForeColor",0,"color")
//  document.execCommand("InsertImage",1)
//  document.execCommand("InsertOrderedList")
// document.execCommand("InsertUnorderedList"
//  document.execCommand("RemoveFormat")