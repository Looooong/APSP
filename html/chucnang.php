<script type="text/javascript" src="../js/jquery.js"></script>

<div id=" txthint">
<table>
<tr>
<td>dddd</td>
<td>dddd</td>
<td>dddd</td>
<td>dddd</td>
<td>dddd</td>
<td>dddd</td>

</tr>

</table>

</div>
<input type="button" name="submit" value="Print page" onClick="printContent('txthint')" />
<script type="text/javascript">
	function printContent(id) {
		str = document.getElementById(id).innerHTML
		newwin = window.open();
		newwin.document.write('<HTML>\n<HEAD>\n')
		newwin.document.write('<TITLE>Print Page</TITLE>\n')
		newwin.document.write('<script>\n')
		newwin.document.write('function chkstate(){\n')
		newwin.document.write('if(document.readyState=="complete"){\n')
		newwin.document.write('window.close()\n')
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
		newwin.document.write(str)
		newwin.document.write('</BODY>\n')
		newwin.document.write('</HTML>\n')
		newwin.document.close()
	}
</script>