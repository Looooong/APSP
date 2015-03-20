<?php
$query = "SELECT * FROM dhban,mhangdhb WHERE dhban.dhbID = mhangdhb.dhbID";
$db->querySql($query);
$arr_bc = $db->fetchToArray();
print_r($arr_bc);exit;
?>