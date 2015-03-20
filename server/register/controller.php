<?php
if(!$_REQUEST['username'] || !$_REQUEST['password']){
?>
	???PHPTOSCRIPT???alert('<?=$lang->get('errorEmptyLogin')?>');
<?php
} else {
	$username = addslashes(urldecode($_REQUEST['username']));
	$password = md5(urldecode($_REQUEST['password']));

	$query = "SELECT name FROM users WHERE name = '$username' ";
	$db->querySql($query);
	
	if($db->numrows()){
	?>
		???PHPTOSCRIPT???alert('<?=$lang->get('errorUsernameDuplicate')?>'); callRegister();
	<?php
	} else {	
		$query = "INSERT INTO users (name,password) VALUES ('$username','$password')";
		$db->querySql($query);

		$query = "select * from users where name = '$username'";
		$db->querySql($query);

		$userid = $db->fetchArray();
		$userid = $userid['userID'];

		$query = "SELECT * FROM menus";
		$db->querySql($query);

		$permission = $db->fetchToArray();
		foreach($permission as $per) {	
			$idm = $per['menuID'];
			$query = "insert into permission(userID,menuID) values('$userid','$idm')";
			$db->querySql($query);
		}
		?>
        	???PHPTOSCRIPT???alert('<?=$lang->get('dangKy', 'thanhCong')?>'); callRegister();
        <?php
	}
}