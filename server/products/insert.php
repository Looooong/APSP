<?php
	$query = "SET DateFormat DMY; INSERT INTO productOrder(date, status, finish, goodsID, quantity)
				OUTPUT inserted.ID
				VALUES('".$_REQUEST['date']."', ".$_REQUEST['status'].", ".((!empty($_REQUEST['finish'])) ? "'".$_REQUEST['finish']."'" : "NULL").", ".$_REQUEST['ID'].", ".$_REQUEST['quantity'].");";
	$db->querySQL($query);
	$ID = $db->fetchArray();
	echo $query;
?>
???PHPTOSCRIPT???
orderID = <?=$ID['ID']?>