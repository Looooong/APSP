<select id="userBox" size="10" onchange="selectUser()">
<?php
	echo '<option value="">'.$lang->get('chon', 'nguoiDung').'</option>';
                    
	$query = "SELECT * FROM users WHERE name NOT IN ('ADMIN')";
	$db->querySql($query);
                    
	if($db->numRows()>0){
		$dailyban = $db->fetchToArray();
		
		foreach($dailyban as $index => $dly){
			echo "<option value='".$dly['userID']."' ".$selected.">".$dly['name']."</option>";
		};
	};
?>
</select>