<?php
if(!$_REQUEST['username'] || !$_REQUEST['password'] || !$_REQUEST['svname'] || !$_REQUEST['dtbase'] ){
?>
???PHPTOSCRIPT???alert('<?=$lang->get('errorEmptyLogin')?>');
<?php
}else{
	$username = addslashes(urldecode($_REQUEST['username']));
	$password = md5(urldecode($_REQUEST['password']));
	$svnamemain = urldecode($_REQUEST['svname']);
	$dtbasemain = urldecode($_REQUEST['dtbase']);
	$svname = 'VIRUS-PC';
	$dtbase = 'APSP';
	$svnameip = 'SERVER';
	if(($svnamemain == $svname || $svnameip == $svnamemain) && $dtbasemain == $dtbase){
		$query = "SELECT * FROM users WHERE name = '$username' AND password = '$password'";
		
		$db->querySql($query);
	
		if($db->numrows() == 0){
		?>
???PHPTOSCRIPT???alert('<?=$lang->get('errorInvalidLogin')?>');
    	<?php
		} else {
		?>
			???PHPTOSCRIPT???
		<?php
			if($_REQUEST['remember'] == 'true') { 
			?>
            	document.cookie = "username=<?=$username?>";
                document.cookie = "password=<?=urldecode($_REQUEST['password'])?>";
                document.cookie = "rememberLogin=1";
			<?php
			} else {
			?>
            	document.cookie = "username=";
                document.cookie = "password=";
            	document.cookie = "rememberLogin=0";
            <?php
			};
			 
			$_SESSION['user'] = $db->fetchArray();
			?>
				document.cookie = "svnamemain=<?=$svnamemain?>";
				document.cookie = "dtbasemain=<?=$dtbasemain?>";
           		location.assign("index.php");
            <?php
		}
	} else if ($svnamemain != $svname || $svnameip != $svnamemain) {
	?>
		???PHPTOSCRIPT???alert("<?=$lang->get('errorServerNotExists')?>: <?=$svnamemain?>");
	<?php
	} else if ($dtbasemain != $dtbase) {
	?>
		???PHPTOSCRIPT???alert("<?=$lang->get('errorDatabaseNotExists')?>: <?=$dtbasemain?>");
	<?php
	}
}
?>