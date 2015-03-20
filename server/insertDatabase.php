<?php
	if (isset($_REQUEST['table']) && isset($_REQUEST['column']) && isset($_REQUEST['value']) && sizeof($_REQUEST['column']) == sizeof($_REQUEST['value'])) {
		$pre = "INSERT INTO ".$_REQUEST['table']."(";
		$suf = "VALUES(";
		
		for ($i = 0; $i < sizeof($_REQUEST['column']); $i++) {
			if ($_REQUEST['value'][$i]) {
				$request = "SELECT DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS IC WHERE TABLE_NAME = '".$_REQUEST['table']."' AND COLUMN_NAME = '".$_REQUEST['column'][$i]."'";
				$db->querySQL($request);
				$result = $db->fetchArray();
				
				$pre .= " ".$_REQUEST['column'][$i].",";
				
				switch (strtolower($result['DATA_TYPE'])) {
					case('char'):
					case('varchar'):
					case('text'):
					case('datetime'):
					case('datetime2'):
					case('date'):
					case('smalldatetime'):
						$suf .= " '".$_REQUEST['value'][$i]."',";
					break;
					
					case('nchar'):
					case('nvarchar'):
					case('ntext'):
						$suf .= " N'".$_REQUEST['value'][$i]."',";
					break;
					
					default:
						if (is_null($result['DATA_TYPE'])) {
							echo "Column ".$_REQUEST['column'][$i]." not exsist!";
							exit;
						} else {
							$suf .= " ".$_REQUEST['value'][$i].",";
						};
				};
			};
		};
		
		$query = "SET DateFormat DMY; ".rtrim($pre, ",").") ".rtrim($suf, ",").")";
		$db->querySql($query);
		
		echo $query;
	} else {
		if (!isset($_REQUEST['table'])) echo "No table<br/>";
		if (!isset($_REQUEST['column'])) echo "No column<br/>";
		if (!isset($_REQUEST['value'])) echo "No value<br/>";
		if (sizeof($_REQUEST['column']) != sizeof($_REQUEST['value'])) echo "Number of columns and number of values not match<br/>";
	};
?>