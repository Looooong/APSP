function printContent(id) {
	var str = document.getElementById(id).innerHTML;
	var newwin = window.open();
	
	newwin.document.write('<HTML>\n<HEAD>\n')
	newwin.document.write('<script>\n')
	newwin.document.write('function chkstate(){\n')
	newwin.document.write('if(document.readyState=="complete"){\n')
//	newwin.document.write('window.close()\n')
	newwin.document.write('}\n')
	newwin.document.write('else{\n')
	newwin.document.write('setTimeout("chkstate()",2000)\n')
	newwin.document.write('}\n')
	newwin.document.write('}\n')
	newwin.document.write('function print_win(){\n')
	newwin.document.write('window.print();\n')
	newwin.document.write('chkstate();\n')
	newwin.document.write('}\n')
	newwin.document.write('<\/script>\n')
	newwin.document.write('</HEAD>\n')
	newwin.document.write('<BODY onload="print_win()">\n')
	newwin.document.write('<center><h1>' + ((document.getElementById("title")) ? document.getElementById("title").innerHTML : "") + '</h1></center>\n')
	newwin.document.write(str)
	newwin.document.write('</BODY>\n')
	newwin.document.write('</HTML>\n')
	newwin.document.close()
};

function contentToExcel(id) {
	window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#' + id).html()));
};