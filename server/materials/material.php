<?php
	$query = "SELECT * FROM inventory";
	$db->querySQL($query);
	$material = $db->fetchToArray();
				
	foreach ($material as $data) {
	?>
	<tr id="m<?=$data['ID']?>">
		<td><p><?=$data['ID']?></p></td>
		<td><p><?=$data['name']?></p></td>
		<td><p><?=$data['stocked']?></p></td>
		<td><p><?=$data['input']?></p></td>
		<td><p><?=$data['output']?></p></td>
		<td><p><?=$data['expStock']?></p></td>
		<td><input name="curStock" type="text" value="<?=$data['curStock']?>" /></td>
		<td><p style=" text-align:center"><button style="width:105px;" class="button" onClick="updateCurStock(this)"><?=($data['lastUpdate']) ? $data['lastUpdate']->format("d/m/Y") : "Chưa Cập Nhật"?></button></p></td>
	</tr>
	<?php
	};
?>