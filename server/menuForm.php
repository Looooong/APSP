<?php	
	$id = $_REQUEST['id'];
	
	@include(file_exists("menuForm/".$id.".php") ? "menuForm/".$id.".php" : "menuForm/notExists.php");
?>