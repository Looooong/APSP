<?php
	$query = "SELECT ".((isset($_REQUEST['column']) && count($_REQUEST['column'])) ? implode(", ", $_REQUEST['column']) : "*");
	
	if (isset($_REQUEST['table'])) {
		$query .=" FROM ".$_REQUEST['table'];
		
		if (isset($_REQUEST['matchColumn']) && isset($_REQUEST['matchValue'])) {
			if (count($_REQUEST['matchValue']) != count($_REQUEST['matchColumn'])) {
				echo "Number of match Columns and number of match Value not match!";
				exit;
			};
			
			$query .= " WHERE ";
			
			for ($i = 0; $i < count($_REQUEST['matchValue']); $i++) {
				if ($_REQUEST['matchValue'][$i]) {
					$request = "SELECT DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS IC WHERE TABLE_NAME = '".$_REQUEST['table']."' AND COLUMN_NAME = '".$_REQUEST['matchColumn'][$i]."'";
					$db->querySQL($request);
					$result = $db->fetchArray();

					switch (strtolower($result['DATA_TYPE'])) {
						case('char'):
						case('varchar'):
						case('text'):
						case('datetime'):
						case('datetime2'):
						case('date'):
						case('smalldatetime'):
							$query .= $_REQUEST['matchColumn'][$i]." = '".$_REQUEST['matchValue'][$i]."' ";
						break;
			
						case('nchar'):
						case('nvarchar'):
						case('ntext'):
							$query .= $_REQUEST['matchColumn'][$i]." = N'".$_REQUEST['matchValue'][$i]."' ";
						break;
			
						default:
							if (is_null($result['DATA_TYPE'])) {
								echo "Column ".$_REQUEST['matchColumn']." not exsist!";
								exit;
							} else {
								$query .= $_REQUEST['matchColumn'][$i]." = ".$_REQUEST['matchValue'][$i]." ";
							};
					};
					
					$query .= "AND ";
				};
			};
			$query = rtrim($query, "AND ");
		};
	};
	$db->querySQL($query);
	$result = $db->fetchToArray();
		
	echo $query;
	?>
<table border="1">
	<?php
	foreach ($result as $data) {
		echo "<tr>";
		foreach ($data as $index => $value) {
		?>
			<td name="<?=$index?>"><?=(is_object($value) && get_class($value) == "DateTime") ? $value->format("d-m-Y") : $value?></td>
		<?php
		};
		echo "</tr>";
	};
	?>
</table>