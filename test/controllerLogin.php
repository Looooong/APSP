<?php
if(!$_GET['username'] || !$_GET['pword'] || !$_GET['svname'] || !$_GET['dtbase'] ){
?>
???PHPTOSCRIPT???alert('<?=$lang->get('errorEmptyLogin')?>');
<?php
}else{
	$username = addslashes($_GET['username']);
	$password = md5($_GET['pword']);
	$svnamemain = $_GET['svname'];
	$dtbasemain = $_GET['dtbase'];
	$svname = 'SERVER';
	$dtbase = 'APSP';
	if($svnamemain == $svname && $dtbasemain == $dtbase){
		$query = "SELECT * FROM users WHERE name = '$username' AND password = '$password'";
		//echo $query;
		$db->querySql($query);
	
		if($db->numrows() == 0){
		?>
???PHPTOSCRIPT???alert('<?=$lang->get('errorInvalidLogin')?>');
    	<?php
		} else {
			if(isset($_GET['remember'])) { 
				setcookie("username",$_GET['username'],time() + 24 * 24 * 60 * 60);
				setcookie("password",$_GET['pword'],time() + 24 * 24 * 60 * 60);
				setcookie("svnamemain","SERVER",time() + 24 * 24 * 60 * 60);
				setcookie("dtbasemain","APSP",time() + 24 * 24 * 60 * 60);
			}
			 
			$_SESSION['user'] = $db->fetchArray();
			?>
            ???PHPTOSCRIPT???location.assign("index.php");
            <?php
		}
	} else {
		echo '???PHPTOSCRIPT???alert("Tên server hoặc database không đúng hoặc không tồn tại!")';
	}
}
?>