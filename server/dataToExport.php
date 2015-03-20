<?php
	$query = (!isset($_REQUEST['column'])) ? "SELECT * FROM ".$_REQUEST['table'] : "SELECT ".implode(", ", $_REQUEST['column'])." FROM ".$_REQUEST['table'];
	$db->querySql($query);
	$result = $db->fetchToArray();
	?>
<table>
	<thead>
		<tr>
		<?php
			foreach ($result as $data) {
				foreach ($data as $column => $value) {
				?>
                	<th><?=$lang->get($column)?></th>
                <?php	
				};
				break;
			};
		?>
		</tr>
	</thead>

	<tbody>
	<?php
		foreach ($result as $data) {
			echo "<tr>";
			foreach ($data as $value) {
			?>
            	<td><?=$value?></td>
            <?php
			};
			echo "</tr>";
		};
	?>
	</tbody>
</table>