<?php
	if (isset($_REQUEST["table"]) && isset($_REQUEST["matchColumn"]) && isset($_REQUEST["matchValue"]) && isset($_REQUEST["column"]) && isset($_REQUEST["matchValue"])) {
		$request = "SELECT DATA_TYPE FROM ".((isset($_REQUEST['database'])) ? $_REQUEST['database']."." : "")."INFORMATION_SCHEMA.COLUMNS IC WHERE TABLE_NAME = '".$_REQUEST['table']."' AND COLUMN_NAME = '".$_REQUEST['column']."'";
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
		
		$request = "SELECT DATA_TYPE FROM ".((isset($_REQUEST['database'])) ? $_REQUEST['database']."." : "")."INFORMATION_SCHEMA.COLUMNS IC WHERE TABLE_NAME = '".$_REQUEST['table']."' AND COLUMN_NAME = '".$_REQUEST['column']."'";
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
				$matchValue = "'".$_REQUEST['matchValue']."'";
			break;
			
			case('nchar'):
			case('nvarchar'):
			case('ntext'):
				$matchValue = "N'".$_REQUEST['matchValue']."'";
			break;
			
			default:
				if (is_null($result['DATA_TYPE'])) {
					echo "Column ".$_REQUEST['column']." not exsist!";
					exit;
				} else {
					$matchValue = $_REQUEST['matchValue'];
				};
		};
		
		$query = "SET DateFormat DMY; UPDATE ".((isset($_REQUEST['database'])) ? $_REQUEST['database'].".dbo." : "").$_REQUEST['table']." SET ".$_REQUEST['column']." = $value WHERE ".$_REQUEST['matchColumn']." = $matchValue";
		$db->querySql($query);
		
		echo $query;
	} else {
		if (!isset($_REQUEST['table'])) echo "No table<br/>";
		if (!isset($_REQUEST['column'])) echo "No column<br/>";
		if (!isset($_REQUEST['value'])) echo "No value<br/>";
		if (!isset($_REQUEST['matchColumn'])) echo "No match column<br/>";
		if (!isset($_REQUEST['matchValue'])) echo "No match value<br/>";
	};
?>