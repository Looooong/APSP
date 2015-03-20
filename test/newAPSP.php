<?php
	include "../inc/database.class.php";
	include "../inc/config.php";
	
	$query = "SELECT name FROM sys.databases";
	$db->querySQL($query);
	$result = $db->fetchToArray();
	
	function search($var) {
		return preg_match('/APSP/', $var['name']);
	};
	
	$databases = array_filter($result, 'search');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>không bit gì</title>
</head>

<body>
    <pre>
    	<?php
			print_r($databases);
		?>
    </pre>
</body>
</html>
       