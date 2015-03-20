<?php
	if (isset($_REQUEST['id'])) {
		$id = $_REQUEST['id'];
		
		$query = "SELECT ID, name, volCap, quantity
					FROM fomula_pack
					INNER JOIN packages ON packID = ID
					WHERE goodID = ".$id;
		$db->querySQL($query);
		$packages = $db->fetchToArray();
		
		foreach ($packages as $index=>$data) {
		?>
			<tr name="<?=$data['ID']?>">
				<td><?=$index + 1?></td>
				<td><?=$data['name']?></td>
				<td><?=$data['volCap']." lit"?></td>
				<td name="quantity"><?=$data['quantity']?></td>
			</tr>
		<?php
		};
	};
?>