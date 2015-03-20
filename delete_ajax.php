<?php
include "inc/database.class.php";
include("inc/config.php");
session_start();
$tabletest1 = $_SESSION['rel1'];
$tabletest2 = $_SESSION['rel2'];
$query = "SELECT column_name
FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE OBJECTPROPERTY(OBJECT_ID(constraint_name), 'IsPrimaryKey') = 1
AND table_name = '$tabletest1'";
	$db->querySql($query);
	$primary = $db->fetchArray();
	$primary = $primary['column_name'];
	if(isset($_GET['id'])){
	$id = $_GET['id'];
	$id = mysql_real_escape_String($id);
	
$query = "delete from $tabletest1 where $primary = '$id'";
$db->querySql($query);
echo '<script type = "text/javascript">window.location.href="index.php?options='.$tabletest1.'&name='.$tabletest2.'"</script>';
}else
	'CHƯA CHỌN DÒNG MUỐN XÓA';
?>