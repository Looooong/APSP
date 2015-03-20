<?php
ini_set('date.timezone','Asia/Ho_Chi_Minh');
$hostname	 	= "VIRUS-PC";
$user_db		= "sa";
$password_db	= "123";
$database		= "APSP";
$params			= array("hostname"=>$hostname,"UID"=>$user_db,"PWD"=>$password_db,"Database"=>$database);

$db = new database($params);
$db->connect();
//$db->setUnicode();
