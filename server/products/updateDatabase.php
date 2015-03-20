<?php
	$query = "UPDATE productOrderDetail
				SET ".$_REQUEST['column']." = '".$_REQUEST['value']."'
				WHERE orderID = ".$_REQUEST['orderID']." AND materialID = ".$_REQUEST['goodsID'];
	$db->querySQL($query);
	echo $query;
?>