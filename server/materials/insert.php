<?php
	$query = "SET DateFormat DMY; INSERT INTO materialOrder(date, status, finish)
				OUTPUT inserted.ID
				VALUES('".$_REQUEST['date']."', ".$_REQUEST['status'].", ".((!empty($_REQUEST['finish'])) ? "'".$_REQUEST['finish']."'" : "NULL").");";
	$db->querySQL($query);
	$ID = $db->fetchArray();
	print_r($ID);
?>
???PHPTOSCRIPT???
orderID = <?=$ID['ID']?>