<?php 
//echo "<pre>";
//print_r($_COOKIE['outputColumn']);
//echo "</pre>";
require_once 'inc/database.class.php';
require_once 'inc/config.php';
require_once "inc/languages.class.php";
session_start();
$lang= new languages;// khai báo bien lang goi da ngon ngu
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="js/jquery.js" charset = "UTF-8"></script>
<style type="text/css">
.text { width:150px;}
.bg_active:hover { background:#FBDCA2 !important}
.pointer { background:#03F ; color:#FFF; font-size:16px;cursor:pointer; text-align:center}

a {
 text-decoration:none;
 color:#000 ;
}
</style>
<?php
$table = $_SESSION['tab'];
	$query = "SELECT column_name
FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE OBJECTPROPERTY(OBJECT_ID(constraint_name), 'IsPrimaryKey') = 1
AND table_name = '$table'";
	$db->querySql($query);
	$primary = $db->fetchArray();
	$primary = $primary['column_name'];
	
	$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table'";
	$db->querySQL($query);
	$selection = $db->fetchToArray();
	echo ' <div style="width:980px;margin:10px auto;">';
	foreach ($selection as $index => $value) { //Tu xu o day
	?>
	<p style=" margin:0px; width:160px;float:left;color:black;font-weight: bold;font-size: 13px;"><?=$lang->get($value['COLUMN_NAME'])?> <input type="checkbox" onclick="selectColumn(this)" value="<?=$value['COLUMN_NAME']?>" <?=(isset ($_COOKIE['outputColumn'][$value['COLUMN_NAME']]) ? "checked" : "")?> />
        <?=($index%12 == 0) ? "" : ""?>
	</p>
	<?php
	};
	echo '</div>';
	$query = "SELECT * FROM $table";
	$db->querySql($query);
	$result = $db->fetchToArray();
	
	echo '
	<div id="example22">
		<table id = "testTable" border = 1 style="font-size:12PX;width:100%" cellspacing = 0 cellpadding = 0><tbody>  ';
	$first = true;
	foreach ($result as $indexone => $valueone) {
		if ($first) {
		?>
			<tr>
		<?php
			foreach ($valueone as $keyone => $keyValue) {
				echo "<td ".((isset($_COOKIE['outputColumn'][$keyone])) ? "" : "style='display:none'")." name='$keyone' class='pointer'><p>".$lang->get($keyone)."</p></td>";
			};
		?>
			</tr>

		<?php
			$first = false;
		}
		?>
			<tr rel = "<?php echo $valueone[$primary];?>" id = "<?php echo $valueone[$primary];?>" class="bg_active" >
            
			
		<?php
			foreach ($valueone as $keyone => $keyValue) {
				$str = (is_object($keyValue) && get_class($keyValue) == "DateTime") ? $keyValue->format('Y-m-d') : $keyValue;
				echo "<td ".((isset($_COOKIE['outputColumn'][$keyone])) ? "" : "style='display:none'")." name='$keyone'>".$str."</td>";
			};
		?>
			</tr>
		<?php
	}
	
	echo "</tbody></table></div>";
	
	?>
	<input type="button" onclick="removeCol(); tableToExcel('testTable', 'W3C Example Table')" value="Export to Excel">
    
	<script src="inc/cookie.class.js"></script>
	<script type="text/javascript">
	function selectColumn (element) {
		var colName = element.value;
		var column = document.getElementsByName(colName);
		
		for (var i = 0; i < column.length; i++) {
			column[i].style.display = (element.checked) ? "" : "none";
		};
		
		createCookie("outputColumn[" + colName + "]", 1, (element.checked) ? 365 : -1);
	};

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

function removeCol() {
	var col = new Array().slice.call(document.getElementsByTagName("TD"));
	
	for (var i = 0; i < col.length; i++) {
		if (col[i].style.display === 'none') {
			col[i].parentNode.removeChild(col[i]);
		};
	};
	
	return false;
};
</script>
<script type="text/javascript">
var tableToExcel = (function() {
	
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>