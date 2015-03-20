<?php 
require_once 'inc/database.class.php';
require_once 'inc/config.php';
require_once "inc/languages.class.php";
session_start();
if(isset($_GET['id'])){
$lang= new languages;// khai báo bien lang goi da ngon ngu
$rel2 = $_SESSION['rel2'];
$rel1 = $_SESSION['rel1'];
		$query = "SELECT column_name
FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE OBJECTPROPERTY(OBJECT_ID(constraint_name), 'IsPrimaryKey') = 1
AND table_name = '$rel1'";
	$db->querySql($query);
	$primary = $db->fetchArray();
	$primary = $primary['column_name'];

$query = "
  SELECT *
  FROM $rel1 as d,$rel2 as t
  WHERE d.$primary = t.$primary AND d.$primary = '".$_GET['id']."'";
$db->querySql($query);
//echo $query;exit;
	$result = $db->fetchToArray();
	require_once "invocieLGH.php";
	
}else
echo "CHƯA CHỌN DÒNG MUỐN PRINT";
?>

<script>
window.print();
//window.close();
</script>
