<?php 
	require_once 'inc/database.class.php';
	require_once 'inc/config.php';	
	require_once "inc/languages.class.php";
	session_start();
	$lang= new languages;
?>



<div class="block-border">
	<div class="block-header">
		<h1>XEM</h1><span></span>
	</div>
<?php
$query = "SELECT * FROM productOrder where ID = '".$_REQUEST['ID']."'";
$db->querySql($query);
$arr_Order = $db->fetchArray();
$query = "SELECT productOrder.status, productOrder.date, productOrder.goodsID,productOrder.finish,productOrderDetail.*,dmspham.tensp, dmspham.maso FROM productOrder,productOrderDetail,dmspham 
WHERE productOrder.ID = productOrderDetail.orderID
AND dmspham.maso = productOrder.goodsID
AND productOrder.ID = '".$_REQUEST['ID']."'";
$db->querySql($query);
$arr_material = $db->fetchToArray();

?>
	