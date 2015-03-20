<?php
	if (!empty($_REQUEST['searchName'])) $condition = " WHERE name LIKE '%".$_REQUEST['searchName']."%'"; else $condition = "";
	$query = "SELECT userID, name FROM users".$condition;
	$db->querySQL($query);
	
	$result = $db->fetchToArray();
	foreach ($result as $user) {
?>
		<tr>
        	<td onClick="//editUser()"><?=$user['name']?></td>
        </tr>
<?php
	};
?>