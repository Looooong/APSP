<?php 
require_once 'inc/database.class.php';
require_once 'inc/config.php';
require_once "inc/languages.class.php";
session_start();
$lang= new languages;// khai báo bien lang goi da ngon ngu
?>
<div class="block-border">
	<div class="block-header">
		<h1><?=$lang->get('themPhieu')?></h1><span></span>
	</div>
	<div class="block-content">
<form id = "formajax" action="javascript:faddt();" method="POST">
<?php
$tabletest = $_SESSION['tab'];
$query = "SELECT column_name
FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE OBJECTPROPERTY(OBJECT_ID(constraint_name), 'IsPrimaryKey') = 1
AND table_name = '$tabletest'";
	$db->querySql($query);
	$primary = $db->fetchArray();
	$primary = $primary['column_name'];
$query = "SELECT column_name FROM information_schema.columns
WHERE 
    table_name='$tabletest'";
	$db->querySql($query);
	$result = $db->fetchToArray();
	echo"<div style='padding=2px;'>";
	
	$values = $indexs = array();
	foreach ($result as $index_1) {
		foreach($index_1 as $key_1 =>$value){
			if($value != $primary)
			$indexs[] = $value;
		}
	}	
	$tmp = 0;
	while($tmp < count($indexs)){
		$stt = 0;
		for($i = $tmp;$i < count($indexs);$i++){
			if($indexs[$i] != $primary)echo "<div style='width:110px; margin:5px 0 ;float:left; font-weight:bold;text-align:center'><label for='title'>".$lang->get($indexs[$i])." </label></div> 
			<input class='required text' style = 'width:110px; margin:5px 0 0;float:left' type='text' name='dttb1[".$indexs[$i]."]' />";
			$stt++; 
			$tmp++;
			if($stt == 4){ echo "<div class='clear'></div>";break;}
		}
	}
	echo'</div>';
	
	echo '<div class="block-actions">
            <ul class="actions-left">
				<li><input type="submit" name="addKeyLang" class="button" value="'.$lang->get("dongY").'"></li>
				<li><input id = "buttonclick" style = "width:60px" type="submit" value="'.$lang->get("thoat").'" class = "button" /></li>
			 </ul>
	</div>';
	
	
	?>
</form>
</div></div>
<script>
$(function() {
    $('#buttonclick').click(function(e) {
	e.preventDefault();
        tb_remove();
    });
});
</script>
<script>
function faddt(){ 
  $.ajax({
        url: "Function.php?mod=addtb1",
        type: "POST",
        data:  $('#formajax').serialize(),
		success: function(msgD){
				//alert(msgD);
				window.location.reload();
			},
});
}	   
</script>