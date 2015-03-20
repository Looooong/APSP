<?php
	error_reporting(E_ALL & ~ E_NOTICE); 
	ob_start();
	
/*------- thiết lập Class ---------*/ 	
	require_once "inc/database.class.php";
	require_once "inc/config.php";
	require_once "inc/languages.class.php";
	require_once "inc/detectOSBrowser.php";
	
/*----------------------------------------------------*/ 	
	session_start();
	//header('Cache-control: private'); // IE 6 FIX
	
/*---------------- thiết lập còn lại ------------------*/ 
	$lang = new languages;
	
/*------------------------------------------------------*/ 
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?=$lang->get('chaoMung')?></title>
    <link rel="shortcut icon" href="src/ico/Accos.ico" />
    <?php require_once "loader.php"; ?>
</head>
<body>
<?php
	if(!isset($_SESSION['user'])){
		require_once 'views/login.php';
		exit;
	};
		setcookie("username",$_COOKIE['username'],time() + 24 * 24 * 60 * 60);
		setcookie("password",$_COOKIE['password'],time() + 24 * 24 * 60 * 60);
		setcookie("svnamemain",$_COOKIE['svnamemain'],time() + 24 * 24 * 60 * 60);
		setcookie("dtbasemain",$_COOKIE['dtbasemain'],time() + 24 * 24 * 60 * 60);
		setcookie("rememberLogin",$_COOKIE['rememberLogin'],time() + 24 * 24 * 60 * 60);
	include "home.php" ;
?>
</body>