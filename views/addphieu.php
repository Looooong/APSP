<style type="text/css">
.text { width:150px;}
</style>
<?php 
$rel1 = $_GET['options'];
$rel2 = $_GET['name'];
$_SESSION['rel2'] = $rel2;
$_SESSION['rel1'] = $rel1;
		$query = "SELECT column_name
FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE OBJECTPROPERTY(OBJECT_ID(constraint_name), 'IsPrimaryKey') = 1
AND table_name = '$rel1'";
	$db->querySql($query);
	$primary = $db->fetchArray();
	$primary = $primary['column_name'];
?>
<?php
$query = "SELECT dhbID,sctban,nct,sohd,ngayhd,tenkh,msthue,nphutrach,ngiamsat,autock,sluong,ttien
FROM $rel1 as t OUTER APPLY(SELECT sum(d.sluong) as sluong,sum(d.ttien) as ttien FROM $rel2 as d WHERE t.$primary = d.$primary ) AS A ";
$db->querySql($query);
$result = $db->fetchToArray();
	echo '
	<div class="block-border">
		<div class="block-header">
			<h1>'.$lang->get($rel1).'</h1><span></span>
		</div>
		<div class="block-content">
		   <div  style="overflow:auto; background:#F2F2F2; height:300px; width:100%;margin-top:5px">
		   <table id = "filterTable1" style="font-size:12PX" class="table"><thead>';
		$first = true;
		foreach ($result as $index => $value) {
		if ($first) {
		?>
			<tr>
		<?php
			foreach ($value as $key => $keyValue) {
				echo '<th>'.$lang->get($key).'</th>';
			};
		?>
			</tr>
         </thead>
         <tbody>      

		<?php
			$first = false;
		}
		?>
			<tr class="bg_active" rel = "<?=$value[$primary]?>"  id = "<?=$value[$primary]?>">
			
		<?php
			foreach ($value as $key => $keyValue) {
				$str = (is_object($keyValue) && get_class($keyValue) == "DateTime") ? $keyValue->format('Y-m-d') : $keyValue;
				echo "<td style=' border-bottom:1px dashed #ccc'>".$str."</td>";
				};
		?>
			</tr>
		<?php
	}
	
	echo "</tbody></table></div>";
	//echo '<input type="submit" value="save" />';
	?>
    <div class="block-actions">
            <ul class="actions-left">
					<li><a class="button thickbox" id="reset-validate-form" href="addtablephieu.php?height=570&width=1000"><?=$lang->get('them')?></a></li>
					<li><a class="button" id="edit-button" href="javascript:show_edit();" rel=""><?=$lang->get('chinhSua')?></a></li>
                    <li><a class="button" id="delete-button" href="javascript:delete_p();" rel=""><?=$lang->get('xoa')?></a></li>
					<li><a href = "pr_add.php" class="button" id = "pradd"  onclick = "javascript:printadd();" target = "_blank">
					IN TỜ TRÌNH BÁN</a></li>
					<li><a href = "pr1_add.php" class="button" id = "pradd1"  onclick = "javascript:printadd1();" target = "_blank">IN LỆNH GIAO HÀNG</a></li>
					<li><a href = "pr2_add.php" class="button" id = "pradd2"  onclick = "javascript:printadd2();" target = "_blank">IN TỜ TRÌNH XUẤT</a></li>
					<li><a class ="button" href = "exceladdphieu.php" target = "_blank">Xuất Excel</a></li>
					
			  </ul>
	</div>

</div></div>
<script type="text/javascript">
$('table#filterTable1').columnFilters({alternateRowClassNames:['rowa','rowb']});
		$('table#filterTable1 > tbody > tr').click(function(){
			$("#edit-button").attr('rel',$(this).attr('rel'));
			$("#delete-button").attr('rel',$(this).attr('rel'));
			$("#pradd").attr('rel',$(this).attr('rel'));
			$("#pradd1").attr('rel',$(this).attr('rel'));
			$("#pradd2").attr('rel',$(this).attr('rel'));
		});
		
		function printadd(){	
		var print_id = $("#pradd").attr("rel");
		var targetbox = $('a#pradd').attr("href","printDHB.php?id="+print_id);
		// $('#pradd').html(targetbox);
		}
		function printadd1(){	
		var print_id = $("#pradd1").attr("rel");
		var targetbox = $('a#pradd1').attr("href","printLGH.php?id="+print_id);
		// $('#pradd').html(targetbox);
		}
		function printadd2(){	
		var print_id = $("#pradd2").attr("rel");
		var targetbox = $('a#pradd2').attr("href","printXG.php?id="+print_id);
		// $('#pradd').html(targetbox);
		}
function show_edit(){	
	var id = $("#edit-button").attr('rel');
	var url = 'editphieu.php?id='+id+'&height=570&width=1000';
	tb_show('',url);
	
} 
		
      
function delete_p(){
 var answer = confirm("Bạn chắc chắn muốn xóa???"); 
	if (answer == true)
	{
		var id = $("#delete-button").attr('rel');
		var url = 'delete_ajax.php?id='+id+'&height=0&width=0';
		tb_show('',url);
	}	
}
</script>