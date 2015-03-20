<?php
	$query = "UPDATE materialOrderDetail
				SET ".$_REQUEST['column']." = '".$_REQUEST['value']."'
				WHERE orderID = ".$_REQUEST['orderID']." AND materialID = ".$_REQUEST['materialID'];
	$db->querySQL($query);
	echo $query;
?>