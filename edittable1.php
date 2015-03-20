<?php
require_once 'inc/database.class.php';
require_once 'inc/config.php';	
require_once "inc/languages.class.php";
session_start();
$lang= new languages;// khai báo bien lang goi da ngon ngu

$tabletest = $_SESSION['tab'];
$query = "SELECT column_name
				FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
				WHERE OBJECTPROPERTY(OBJECT_ID(constraint_name), 'IsPrimaryKey') = 1
				AND table_name = '$tabletest'";
				$db->querySql($query);
				$datainfo = $db->fetchArray();
				$datainfo = $datainfo['column_name'];
				$id = $_GET['id'];
				$id = addslashes($id);
				$query = "SELECT * FROM $tabletest where $datainfo = '".$_GET['id']."' ";
				$db->querySql($query);
				
				$result = $db->fetchToArray();
				?>
<div class="block-border">
		<div class="block-header">
			<h1><?= $lang->get('suaPhieu','khoangTrang',$tabletest) ?></h1><span></span>
		</div>
		<div class="block-content">
<form id = "formajax" action="javascript:feditt();" method="POST">
<?php
				echo"<div style='padding:2px'>";
	
					$keyvalues = $keys = array();
					foreach ($result as $index => $value) {
					foreach($value as $key => $keyvalue){
						$keys[] = $key;
						$keyvalues[] = $keyvalue;
					}
				}
				
					$tmp = 0;
					while($tmp < count($keys)){
						$stt = 0;
						for($i = $tmp;$i < count($keys);$i++){
							$str = (is_object($keyvalues[$i]) && get_class($keyvalues[$i]) == "DateTime") ? $keyvalues[$i]->format('Y-m-d') : $keyvalues[$i];
							if($keys[$i] == $datainfo)echo "<div style = 'display:none'><div style=' float:left; font-weight:bold;text-align:center'>
							<p style='float:left;width:100px;text-align:center;'><label for='title'>".$lang->get($keys[$i])." </label></p> 
							<input class='required text' style = 'width:110px; float:left' type='text' name='edttb1[$index][".$keys[$i]."]' value = '".$str."' /></div></div>";
							else echo "<div style=' line-height:20px; float:left;  font-weight:bold;text-align:center'>
							<p style='float:left;text-align:center;width:100px;'><label for='title'>".$lang->get($keys[$i])." </label> </p>
							<input class='required text' style = 'width:110px;' type='text' name='edttb1[$index][".$keys[$i]."]' value = '".$str."' /></div>";
							$stt++; 
							$tmp++;
							if($stt == 4){ break;}
						}
					}

	echo '
	<div style=" clear:both"></div>
	<div class="block-actions">
            <ul class="actions-left">				
				<li><input type="submit" name="addKeyLang" class="button" value="'.$lang->get('capNhat').'"></li>
				<li><input id = "buttonclick" style = "width:60px" type="submit" value="'.$lang->get('thoat').'" class = "button" /></li>
			 </ul>
	</div>
	</form>';
	echo'</div><div class="clear"></div>	</div></div>';
	

	?>


<script>
$(function() {
    $('#buttonclick').click(function(e) {
	e.preventDefault();
        tb_remove();
    });
});
</script>
<script>
function feditt(){ 
  $.ajax({
        url: "Function.php?mod=edittb1",
        type: "POST",
        data:  $('#formajax').serialize(),
		success: function(msgD){
		//alert(msgD);
				window.location.reload();
			},
});
}	   
</script>