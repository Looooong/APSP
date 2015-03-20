<?php 
require_once 'inc/database.class.php';
require_once 'inc/config.php';
require_once "inc/languages.class.php";
session_start();
$lang= new languages;// khai báo bien lang goi da ngon ngu
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="js/jquery.js"></script>
<style type="text/css">
.text { width:150px;}
a:link {
text-decoration: none;
}
a:visited {
text-decoration: none;
}
a:hover {
text-decoration: underline;
}
a:active {
text-decoration: none;
}
.bg_active:hover { background:#FBDCA2 !important}
.pointer { background:#03F ; color:#FFF; text-align:center; font-size:16px;cursor:pointer}

</style>
<?php 

$rel2 = $_SESSION['rel2'];
$rel1 = $_SESSION['rel1'];
		$query = "SELECT column_name
FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE OBJECTPROPERTY(OBJECT_ID(constraint_name), 'IsPrimaryKey') = 1
AND table_name = '$rel1'";
	$db->querySql($query);
	$primary = $db->fetchArray();
	$primary = $primary['column_name'];
?>
<?php
$query = "SELECT t.*, a.ct,a.qt
FROM $rel1 AS t
OUTER APPLY (
  SELECT SUM(d.ttien) AS ct,SUM(d.sluong) AS qt
  FROM $rel2 AS d
  WHERE d.$primary = t.$primary
) as A";
$db->querySql($query);
	$result = $db->fetchToArray();
	
	echo '
	<div id = "example22">
		<table id = "testTable" border = 1 style="font-size:12PX;width:100%" cellspacing = 0 cellpadding = 0><tbody>  ';
	$first = true;
	foreach ($result as $index => $value) {
		if ($first) {
		?>
			<tr>
			
		<?php
			foreach ($value as $key => $keyValue) {
				echo "<td class='pointer'><p onclick='deleteC(this.parentNode)'>".$lang->get($key)."</p></td>";
			};
		?>
			</tr> 

		<?php
			$first = false;
		}
		?>
			<tr class="bg_active" rel = "<?=$value[$primary]?>"  id = "<?=$value[$primary]?>">
			
		<?php
			foreach ($value as $key => $keyValue) {
				$str = (is_object($keyValue) && get_class($keyValue) == "DateTime") ? $keyValue->format('Y-m-d') : $keyValue;
				echo "<td>".$str."</td>";
			};
		?>
			</tr>
		<?php
	}
	
	echo "</tbody></table></div>";

	?>
	<input type="button" onclick="tableToExcel('testTable')" value="Export to Excel">
	<script type="text/javascript">
function deleteC(c){
var root = c.parentNode.parentNode;//tbody or table - correction if tbody is not present
var allRows = root.getElementsByTagName('tr');// rows collection in the table
var aCells = c.parentNode.getElementsByTagName('td')//cells collection in this row
for(var j=0;j<aCells.length;j++){
if(c==aCells[j]){var q=j;break}//gets the index of this cell in this row
}
for(var i=0;i<allRows.length;i++){
allRows[i].removeChild(allRows[i].getElementsByTagName('td')[q]);//removes the correspondent cells with the same index in their rows
}
}
</script>
<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)	
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML,}
	//var p = document.getElementById('tdecore')
	//p.style.textDecoration = 'none';
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>
