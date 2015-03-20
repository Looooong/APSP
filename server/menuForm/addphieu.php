<style type="text/css">
.text { width:150px;}
</style>
<?php 
$rel1 = $_REQUEST['options'];
$rel2 = $_REQUEST['name'];
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
$query = "SELECT t.*, a.ct,a.qt
FROM $rel1 AS t
OUTER APPLY (
  SELECT SUM(d.ttien) AS ct,SUM(d.sluong) AS qt
  FROM $rel2 AS d
  WHERE d.$primary = t.$primary
) as A";
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
			</tr></thead><tbody>      

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
					<li><a class="button thickbox" id="reset-validate-form" href="../../views/addtablephieu.php?height=550&amp;width=1000"><?=$lang->get('them')?></a></li>
					<li><a class="button" id="edit-button" href="javascript:show_edit();" rel=""><?=$lang->get('chinhSua')?></a></li>
                    <li><a class="button" id="delete-button" href="javascript:delete_p();" rel=""><?=$lang->get('xoa')?></a></li>
					<li><a href = "../../views/pr_add.php" class="button" id = "pradd"  onclick = "javascript:printadd();" target = "_blank"><?=$lang->get('in','trang')?></a></li>
					<li><a class ="button" href = "../../views/exceladdphieu.php" target = "_blank"><?=$lang->get('xuat')?></a></li>
					
			  </ul>
	</div>

</div></div>
<script type="text/javascript">
$('table#filterTable1').columnFilters({alternateRowClassNames:['rowa','rowb']});
		$('table#filterTable1 > tbody > tr').click(function(){
			$("#edit-button").attr('rel',$(this).attr('rel'));
			$("#delete-button").attr('rel',$(this).attr('rel'));
			$("#pradd").attr('rel',$(this).attr('rel'));
		});
		
		function printadd(){	
		var print_id = $("#pradd").attr("rel");
		var targetbox = $('a#pradd').attr("href","printaddphieu.php?id="+print_id);
		// $('#pradd').html(targetbox);
		}
function show_edit(){	
	var id = $("#edit-button").attr('rel');
	var url = 'editphieu.php?id='+id+'&height=550&width=1000';
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