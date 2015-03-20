<?php
	if (isset($_REQUEST['code']) && isset($_REQUEST['level'])) {
		$code = $_REQUEST['code'];
		$level = $_REQUEST['level'];
		
		$query = "SELECT ".$_REQUEST['lang'].", code FROM menus WHERE substring(code, 1, ".$level.") = '".$code."' AND len(code) = ".($level + 1);
		$db->querySql($query);
		
		$result= $db->fetchToArray();
		$str = "";
		$first = true;
		foreach ($result as $data) {
			if (!$first) $str.= "|";
			$str.= $data[$_REQUEST['lang']]."=".trim($data['code']);
			$first = false;
		};
		echo $str;
	};
?>