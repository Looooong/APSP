<?php //sleep(3);
	require_once "../inc/database.class.php";
	require_once "../inc/config.php";
	require_once "../inc/languages.class.php";
	
	session_start();
	
	$lang = new languages;
	$lang->lang = (isset($_REQUEST['lang'])) ? $_REQUEST['lang'] : 'en';
	
	$callAjax = $_REQUEST['callAjax'];
	include $callAjax;
?>