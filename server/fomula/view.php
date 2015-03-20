<style type="text/css">
	.table { font-size:12px;}
	.table tbody tr { border:1px dotted #ccc}
</style>
    	<div style=" height:500px; overflow-y:auto">

<table class="table">
	<thead>
		<tr>
			<th>Mã Số</th>
			<th>Tên</th>
			<th>Bao Bì</th>
		</tr>
	</thead>

	<tbody>
	<?php
		$query = "SELECT maso, tensp, solit FROM dmspham";
		$db->querySQL($query);
		$product = $db->fetchToArray();
		
		foreach ($product as $data) {
		?>
		<tr onclick="callEdit(<?=$data['maso']?>)" title="<?php
			$query = "SELECT name, ratio FROM fomula INNER JOIN materials ON materialID = ID WHERE goodID = ".$data['maso'];
			$db->querySQL($query);
			$fomula = $db->fetchToArray();
			
			if (count($fomula)) echo "NGUYÊN LIỆU\n";
			foreach ($fomula as $data2) {
				echo $data2['ratio']."% ".$data2['name']."\n";
			};
			
			$query = "SELECT name, quantity FROM fomula_pack INNER JOIN packages ON packID = ID WHERE goodID = ".$data['maso'];
			$db->querySQL($query);
			$fomula = $db->fetchToArray();
			
			if (count($fomula)) echo "BAO BÌ\n";
			foreach ($fomula as $data2) {
				echo $data2['quantity']."% ".$data2['name']."\n";
			};
		?>">
			<td><?=$data['maso']?></td>
			<td><?=$data['tensp']?></td>
			<td><?=$data['solit']?></td>
		</tr>
		<?php
		};
	?>
	</tbody>

</table>
        </div>

???PHPTOSCRIPT???
<?php
	include "view.js";
?>