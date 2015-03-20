<?php
	$query = "SELECT sphamID, tensp FROM dmspham".((isset($_REQUEST['pack']) && $_REQUEST['pack']) ? " WHERE solit = ".$_REQUEST['pack'] : "");
	$db->querySQL($query);
	$prod = $db->fetchToArray();
						
	foreach($prod as $data) {
?>
		<div name="<?=$data['sphamID']?>" onclick="selectProduct(this)"><?=$data['tensp']?></div>
<?php
	};
?>