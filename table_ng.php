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
<div style='width:110px; margin:5px 0 ;float:left; font-weight:bold;text-align:center'>
	<label for='title'>Name </label></div> 
	<input id="hoTen" class='required text' style = 'width:110px; margin:5px 0 0;float:left' type='text' oninput="searchName(this)" />
	<?php
		$tabletest = $_SESSION['tab'];
		$query = "SELECT column_name
		FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
		WHERE OBJECTPROPERTY(OBJECT_ID(constraint_name), 'IsPrimaryKey') = 1
		AND table_name = '$tabletest'";
		$db->querySql($query);
		$primary = $db->fetchArray();
		$primary = $primary['column_name'];
		$query = "	SELECT column_name FROM information_schema.columns
					WHERE table_name='$tabletest'";
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
			$stt = 1;
			for($i = $tmp;$i < count($indexs);$i++){
				if($indexs[$i] != $primary)echo "<div style='width:110px; margin:5px 0 ;float:left; font-weight:bold;text-align:center'><label for='title'>".$lang->get($indexs[$i])." </label></div> 
				<input class='required text' style = 'width:110px; margin:5px 0 0;float:left' type='text' name='dttb1[".$indexs[$i]."]' ".(($indexs[$i] === 'adID') ? "id='adID'": "")." ".(($indexs[$i] === 'ngay') ? "value='".date("Y-m-d")."'" : "")." />";
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
<?php
		$query ="select hosonv.adID, hoTen, tenNhomVi,tenCVVi,tenBPVi 
			from hosonv,nhom,congty,bophan 
			where hosonv.nhomID= nhom.nhomID 
			and hosonv.cvID=congty.cvID
			and hosonv.bophanID= bophan.bophanID";
$db->querySql($query);
$result = $db->fetchToArray();?>
<div class="block-border">
	<div class="block-header">
		<h1><?=$lang->get('themPhieu')?></h1><span></span>     
	</div>
	<div class="block-content">
    	<table  class="table">
        	<thead>
            	<tr>
                	<th><?= $lang->get('hoTen')?></th>
                    <th><?= $lang->get('nhom')?></th>
                    <th><?= $lang->get('chucVu')?></th>
                    <th><?= $lang->get('boPhan')?></th>
                </tr>        
                        

			</thead>
            
            <tbody id="nameTable">
   
            <?php foreach ($result as $value){
				?>
            	
                 <tr id="<?=$value['adID']?>" onclick="selectName(this)">
                    <td name="name"><p><?= $value['hoTen']?></p></td>
				    <td><p><?= $value['tenNhomVi']?></p></td>
                    <td><p><?= $value['tenCVVi']?></p></td>
                 	<td><p><?= $value['tenBPVi']?></p></td>
                 </tr>  
             <?php }?> 
   
            </tbody>
        </table>
    </div>
</div>
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
	};
	
	function searchName(element) {
		var name = element.value;
		var table = document.getElementById("nameTable").getElementsByTagName("TR");
		for (var i = 0; i < table.length; i++) {
			if(table[i].getElementsByTagName("P")[0].innerText.search(new RegExp(name, 'i')) != -1) {
				table[i].style.display = "";
			} else {
				table[i].style.display = "none";
			};
		};
	};
	function selectName(element){
		var adID = element.id;
		var name = element.getElementsByTagName("p")[0].innerText;
		document.getElementById("adID").value = adID;
		document.getElementById("hoTen").value = name;
	};
</script>