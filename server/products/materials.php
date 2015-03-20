<?php
	if (isset($_REQUEST['id'])) {
		$query = "SELECT ID, name, ratio, d30, solit FROM dmspham, fomula, materials WHERE goodID = ".$_REQUEST['id']." AND materialID = ID AND goodID = maso";
		$db->querySQL($query);
		$result = $db->fetchToArray();

		foreach ($result as $index=>$data) {
		?>
			<tr name="<?=$data['ID']?>">
				<td><?=$index + 1?></td>
				<td><?=$data['name']?></td>
				<td><?=number_format($data['ratio'], 3)."%"?></td>
				<td><?=number_format($data['solit']*$data['ratio']/100.0, 3)?></td>
				<td name="kg"><?=number_format($data['solit']*(float)$data['ratio']*(float)$data['d30']/100, 3)?></td>
			</tr>
        <?
		};
	} else
		echo "ID not set";
?>