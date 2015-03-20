<?php
	if (isset($_REQUEST['table']) && isset($_REQUEST['column']) && isset($_REQUEST['value'])) {
		$request = "SELECT DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS IC WHERE TABLE_NAME = '".$_REQUEST['table']."' AND COLUMN_NAME = '".$_REQUEST['column']."'";
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
				$value = "'".$_REQUEST['value']."'";
			break;
			
			case('nchar'):
			case('nvarchar'):
			case('ntext'):
				$value = "N'".$_REQUEST['value']."'";
			break;
			
			default:
				if (is_null($result['DATA_TYPE'])) {
					echo "Column ".$_REQUEST['column']." not exsist!";
					exit;
				} else {
					$value = $_REQUEST['value'];
				};
		};
			
		$query = "DELETE ".$_REQUEST['table']." WHERE ".$_REQUEST['column']." = $value";
		$db->querySql($query);
		
		echo $query;
	} else {
		if (!isset($_REQUEST['table'])) echo "No table<br/>";
		if (!isset($_REQUEST['column'])) echo "No column<br/>";
		if (!isset($_REQUEST['value'])) echo "No value<br/>";
	};
?>