<?php
	if (isset($_REQUEST['id'])) {
		$query = "SELECT ID, name, ratio, kg, d30 FROM fomula, materials WHERE goodID = ".$_REQUEST['id']." AND materialID = ID";
		$db->querySQL($query);
		$result = $db->fetchToArray();
		
		echo "<tbody>";
		
		foreach ($result as $data) {
		?>
			<tr id="m<?=$data['ID']?>">
				<td><?=$data['name']?></td>
				<td><?=$data['ratio']?></td>
				<td name="lit"><?=(float)$data['kg']/ (float)$data['d30']?></td>
				<td name="kg"><?=$data['kg']?></td>
			</tr>
        <?
		};
		
		echo "</tbody>";
	} else
		echo "ID not set";
?>