<style type="text/css">
	.text { width:150px;}
	.bg_active:hover { background:#F00 !important}
	#filterTable1 input { width:100%}
</style>

<?php
	$table = $_REQUEST['options'];
	$_SESSION['tab'] = $table;
	if($table == "dchuyen"){
?>
<form action = "" method = "POST">
		<label><?php echo $lang->get('ngay')?></label>
<input type = "text" name = "nbd" value = "<?php if(isset($_POST['nbd'])) echo $_POST['nbd'];?>" />
<label><?php echo $lang->get('denNgay')?></label>
<input type = "text" name = "nkt" value = "<?php if(isset($_POST['nkt'])) echo $_POST['nkt'];?>" />
<input style = "width:100px; padding:5px 10px;" type="submit" name = "xemdc" value="<?php echo $lang->get('dongY')?>" />
</form>
<?php } ?>


<?php

	$query = "SELECT column_name
FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE OBJECTPROPERTY(OBJECT_ID(constraint_name), 'IsPrimaryKey') = 1
AND table_name = '$table'";
	$db->querySql($query);
	$primary = $db->fetchArray();
	$primary = $primary['column_name'];
if(isset($_POST['xemdc'])){
if(!$_POST['nbd'] || !$_POST['nkt']){
	//echo $_POST['nbd']; echo $_POST['nkt']; exit;
echo 'Vui lòng nhập đủ 2 ô!!!';
echo '<script type = "text/javascript">window.location.reload();</script>';
//echo '<input style = "width:100px" type="button" value="Back" onclick="goBack()">để quay lại';
}
$dk1 = "";
$nbd1 = strtotime($_POST['nbd']);
$nbd = date("Y-m-d",$nbd1);
$nkt1 = strtotime($_POST['nkt']);
$nkt = date("Y-m-d",$nkt1);
$query = "SELECT * FROM $table WHERE ndchuyen BETWEEN '$nbd' AND '$nkt'";
$db->querySql($query);

}else
$query = "SELECT * FROM $table";
$db->querySql($query);
	$result = $db->fetchToArray();
	
	echo '
	<div class="block-border">
		<div style=" z-index:0" class="block-header">
			<h1>'.$lang->get($table).'</h1><span></span>
		</div>
		<div class="block-content">
		            <div  style="overflow:auto; background:#F2F2F2; height:280px; width:100%;margin-top:5px">

		<table id = "filterTable1" style="font-size:12PX" class="table"><thead>';
	$first = true;
	foreach ($result as $indexone => $valueone) {
		if ($first) {
		?>
			<tr>
		<?php
			foreach ($valueone as $keyone => $keyValue) {
				echo '<th>'.$lang->get($keyone).'</th>';
			};
		?>
			</tr></thead><tbody>     

		<?php
			$first = false;
		}
		?>
			<tr rel = "<?php echo $valueone[$primary];?>" id = "<?php echo $valueone[$primary];?>" class="bg_active" >
            
			
		<?php
			foreach ($valueone as $keyone => $keyValue) {
				$str = (is_object($keyValue) && get_class($keyValue) == "DateTime") ? $keyValue->format('Y-m-d') : $keyValue;
				echo "<td style=' min-width:100px; border-bottom:1px dashed #ccc'>".$str."</td>";
			};
		?>
			</tr>
		<?php
	}
	
	echo "</tbody></table></div>";
	
	?>
	
    <div class="block-actions">
            <ul class="actions-left">
					<li><a class="button thickbox" id="reset-validate-form" href="../../views/table1.php?height=550&amp;width=1000"><?=$lang->get('them')?></a></li>
					<li><a class="button" id="edit-button" href="javascript:show_edittb1();" rel=""><?=$lang->get('chinhSua')?></a></li>
                    <li><a class="button" id="delete-button" href="javascript:delete_d();" rel=""><?=$lang->get('xoa')?></a></li>
					<li><a class="button" id="print-button" href="../../views/printdatatab1.php" target = "_blank"><?=$lang->get('in','trang')?></a></li>
					<li><a class ="button" href = "../../views/exceldatatab1.php" target = "_blank"><?=$lang->get('xuat')?></a></li>
					<li><a class="button" id="nap-button" href="../../views/uploadsql.php" target = "_blank"><?=$lang->get('nap')?></a></li>
			  </ul>
	</div>

</div></div>
<script type="text/javascript">
$('table#filterTable1').columnFilters({alternateRowClassNames:['rowa','rowb']});
		$('table#filterTable1 > tbody > tr').click(function(){	
			$("#edit-button").attr('rel',$(this).attr('rel'));
			$("#delete-button").attr('rel',$(this).attr('rel'));
		    $("#print-button").attr('rel',$(this).attr('rel'));
		});
function show_edittb1(){
 
	var id = $("#edit-button").attr('rel');
	var url = 'edittable1.php?id='+id+'&height=550&width=1000';
	tb_show('',url);
	
}
function delete_d(){
 var answer = confirm("Bạn chắc chắn muốn xóa???"); 
	if (answer == true)
	{
		var id = $("#delete-button").attr('rel');
		var url = 'delete_tb1.php?id='+id+'&height=0&width=0';
		tb_show('',url);
		}
	}
function getid(){
var id = $("#print-button").attr('rel',$(this).attr('rel'));
}	
/*function goBack()
  {
  window.history.back()
  }*/
</script>