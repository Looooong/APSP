<?php
	$iduser = $_REQUEST['iduser'];

	$listbo = array();
	
	$query = "SELECT * FROM menus where level = 0 ";
	$db->querySql($query);
?>

<div class="block-border" id="tab-panel-2">
	<div class="block-header">
		<h1><?=$lang->get('capQuyen')?></h1>
			<ul  class="tabs">
			<?php
				while($rowbo = $db->fetchArray()) {
					$listbo[] =$rowbo;	
				};

				foreach ($listbo as $row_bo) {
					echo '<li><a style=" color:#333; font-weight:bold" href="#'.$row_bo['menuID'].'">'.$row_bo[$lang->lang].'</a></li>';
				};
			?>
			</ul>
	</div>

	<div class=" load block-content tab-container">
		<?php listCheckBox(''); ?>
	</div>

	<div class="block-actions-tab block-actions">
		<ul class="actions-right">
			<li><input type="submit" name="permiss" class="button" value="<?=$lang->get('luu')?>"></li>
		</ul>
	</div>
</div>

<?php
function listCheckBox ($ch) {
	global $iduser, $lang;
	static $level = 0;
	$query = "SELECT * FROM menus,permission WHERE permission.menuID = menus.menuID AND substring(code, 1, ".$level.") = '".$ch."' AND len(code) = ".($level + 1)." AND userID = '$iduser' ";
	global $db;
	$db->querySql($query);
	$rowkt = $db->fetchToArray();

	foreach ($rowkt as $key => $row_kt) {
		$checked = ($row_kt['status'] == 0) ? ' checked = "checked"  /> ' : ' /> ';
		switch ($level) {
			case 0:
				$preTag= '<div id="'.($key + 1).'" class="tab-content"><fieldset style=" width:96%" class="fl"><legend><input type="checkbox" name="checkboxkt['.$row_kt['perID'].']"'.$checked;
				$postTag = '</legend>';
			break;
			
			case 1:
				$preTag = '<div class="_100"><p><label><input type="checkbox"  name="checkboxkt['.$row_kt['perID'].']"'.$checked;
				$postTag = '</label></p></div>';
			break;
			
			case 2:
				$preTag =' <p style="margin-left:40px">	<label><input type="checkbox"  name="checkboxkt['.$row_kt['perID'].']"'.$checked;
				$postTag = '</label></p>';

			break;
			default:
				$preTag = '';
				$postTag = '';
		};
	
		echo $preTag.$row_kt[$lang->lang].$postTag;
		$level++;
		listCheckBox(substr($row_kt['code'], 0, $level));
		$level--;
	
		if ($level == 0) echo '</fieldset></div>';
	}
}
?>