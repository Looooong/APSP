<option value='<?=date('n')?>'><?=$lang->get('thang'.date('n'))?></option>
<?php
	$selection = unserialize($_COOKIE['selection']);
	foreach ($selection[$_REQUEST['year']] as $value) {
		?>
	<option value='<?=$value?>'><?=$lang->get("thang".$value)?></option>
		<?php
	};
?>