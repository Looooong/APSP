<?php 
require_once 'inc/database.class.php';
require_once 'inc/config.php';
require_once "inc/languages.class.php";
session_start();
$lang= new languages;// khai báo bien lang goi da ngon ngu
?>
<style type="text/css">
.text { width:150px;}
.bg_active:hover { background:#FBDCA2 !important}
.pointer { cursor:pointer}

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
	
$query = "SELECT * FROM $table";
$db->querySql($query);
	$result = $db->fetchToArray();
	
	echo '
	<div class="block-border">
		<table border = 1 cellspacing = 0 cellpadding = 0 id = "filterTable1" style="font-size:12PX;width:100%" class="table"><thead>';
	$first = true;
	foreach ($result as $indexone => $valueone) {
		if ($first) {
		?>
			<tr>
		<?php
			foreach ($valueone as $keyone => $keyValue) {
				echo "<th class='pointer'>".$lang->get($keyone)."</th>";
			};
		?>
			</tr></thead><tbody>     

		<?php
			$first = false;
		}
		?>
			<tr rel = "<?php echo $valueone[$primary];?>" id = "<?php echo $valueone[$primary];?>" class="bg_active" >
            
			
		<?php
			foreach ($valueone as $keyone => $keyValue) {
				$str = (is_object($keyValue) && get_class($keyValue) == "DateTime") ? $keyValue->format('Y-m-d') : $keyValue;
				echo "<td>".$str."</td>";
			};
		?>
			</tr>
		<?php
	}
	
	echo "</tbody></table></div>";
	//echo '<input type="submit" value="save" />';
	?>
<script>
//window.print();
</script>