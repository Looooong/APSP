<?php
include "inc/database.class.php";
include("inc/config.php");
session_start();
$tabletb1 = $_SESSION['tab'];
$query = "SELECT column_name
FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE OBJECTPROPERTY(OBJECT_ID(constraint_name), 'IsPrimaryKey') = 1
AND table_name = '$tabletb1'";
	$db->querySql($query);
	$primary = $db->fetchArray();
	$primary = $primary['column_name'];
	echo $_GET['id'];
	if(isset($_GET['id'])){
	$id = $_GET['id'];
	$id = addslashes($id);
$query = "delete from $tabletb1 where $primary = '$id'";
$db->querySql($query);
echo '<script type = "text/javascript">window.location.href="index.php?options='.$tabletb1.'"</script>';
}else
	'CHƯA CHỌN DÒNG MUỐN XÓA';
?>