<style>

body
{
    font-size: 12pt;
    font-family: Calibri;
    padding : 10px;
}

table
{
    border: 1px solid black;
    
}
td
{
    border: 1px solid black;
    padding: 5px;
    background-color:grey;
    color: white;
    
}
td
{
    border: 1px solid black;
    padding: 5px;
}

input
{
    font-size: 12pt;
    font-family: Calibri;
}

</style>
<input type="button" onclick="tableToExcel('testTable', 'W3C Example Table')" value="Export to Excel">

<table id="testTable" summary="Code page support in different versions of MS Windows." rules="groups" frame="hsides" border="2">
	<caption>CODE-PAGE SUPPORT IN MICROSOFT WINDOWS</caption>
    <colgroup align="center"></colgroup><colgroup align="left"></colgroup>
    <colgroup span="2" align="center"></colgroup>
    <colgroup span="3" align="center"></colgroup>
    <tdead valign="top">
    <tr>
    	<td>Code-Page<br>ID</td>
        <td>Name</td>
        <td>ACP</td>
        <td>OEMCP</td>
        <td>Windows<br>NT 3.1</td>
        <td>Windows<br>NT 3.51</td>
        <td>Windows<br>95</td>
   </tr>
   </tdead>
   <tbody>
   <tr>
  	 <td>1200</td>
     <td style="background-color: #00f; color: #fff">Unicode (BMP of ISO/IEC-10646)</td>
     <td></td><td></td>
     <td>X</td><td>X</td>
     <td>*</td></tr><tr><td>1250</td><td style="font-weight: bold">Windows 3.1 Eastern European</td><td>X</td><td></td><td>X</td><td>X</td><td>X</td></tr><tr><td>1251</td><td>Windows 3.1 Cyrillic</td><td>X</td><td></td><td>X</td><td>X</td><td>X</td></tr><tr><td>1252</td><td>Windows 3.1 US (ANSI)</td><td>X</td><td></td><td>X</td><td>X</td><td>X</td></tr><tr><td>1253</td><td>Windows 3.1 Greek</td><td>X</td><td></td><td>X</td><td>X</td><td>X</td></tr><tr><td>1254</td><td>Windows 3.1 Turkish</td><td>X</td><td></td><td>X</td><td>X</td><td>X</td></tr><tr><td>1255</td><td>Hebrew</td><td>X</td><td></td><td></td><td></td><td>X</td></tr><tr><td>1256</td><td>Arabic</td><td>X</td><td></td><td></td><td></td><td>X</td></tr><tr><td>1257</td><td>Baltic</td><td>X</td><td></td><td></td><td></td><td>X</td></tr><tr><td>1361</td><td>Korean (Johab)</td><td>X</td><td></td><td></td><td>**</td><td>X</td></tr></tbody><tbody><tr><td>437</td><td>MS-DOS United States</td><td></td><td>X</td><td>X</td><td>X</td><td>X</td></tr><tr><td>708</td><td>Arabic (ASMO 708)</td><td></td><td>X</td><td></td><td></td><td>X</td></tr><tr><td>709</td><td>Arabic (ASMO 449+, BCON V4)</td><td></td><td>X</td><td></td><td></td><td>X</td></tr><tr><td>710</td><td>Arabic (Transparent Arabic)</td><td></td><td>X</td><td></td><td></td><td>X</td></tr><tr><td>720</td><td>Arabic (Transparent ASMO)</td><td></td><td>X</td><td></td><td></td><td>X</td></tr></tbody></table>
     <script>
     
     var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
     </script>
