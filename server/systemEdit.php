<?php
if (isset($_REQUEST['method'])) {
	include "system/".$_REQUEST['method'].".php";
} else if (isset($_REQUEST['sysEdit'])) {
	if (isset($_REQUEST['column']) && isset($_REQUEST['row']) && isset($_REQUEST['value'])) {
		$str = ($_REQUEST['column'] == "code") ? "'".urldecode($_REQUEST['value'])."'" : "N'".urldecode($_REQUEST['value'])."'";
		$query = "UPDATE menus SET ".$_REQUEST['column']." = ".$str." WHERE menuID = ".$_REQUEST['row'];
		echo $query;
		$db->querySQL($query);
	};
} else {
	include "system/viewSystem.php";
};