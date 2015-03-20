<?php
	$query = "SELECT * FROM storage";
	$db->querySQL($query);
	$product = $db->fetchToArray();
				
	foreach ($product as $data) {
	?>
	<tr id="m<?=$data['ID']?>">
		<td><p><?=$data['ID']?></p></td>
		<td><p><?=$data['tensp']?></p></td>
		<td><p><?=$data['stocked']?></p></td>
		<td><p><?=$data['input']?></p></td>
		<td><p><?=$data['output']?></p></td>
		<td><p><?=$data['expStock']?></p></td>
		<td><p><input name="curStock" type="text" value="<?=$data['curStock']?>" /></p></td>
		<td><p><button style="width:105px;" class="button" onClick="updateCurStock(this)"><?=($data['lastUpdate']) ? $data['lastUpdate']->format("d/m/Y") : "Chưa Cập Nhật"?></button></p></td>
	</tr>
	<?php
	};
?>