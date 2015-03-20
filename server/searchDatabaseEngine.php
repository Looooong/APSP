<?php
	$table = $_REQUEST['table'];
	$column = $_REQUEST['column'];
	$value = urldecode($_REQUEST['value']);
	
	$query = "SELECT * FROM $table WHERE $column LIKE '%$value%'";
	$db->querySql($query);
	$result = $db->fetchToArray();
	
	foreach ($result as $index => $element) {
?>
		<tr>
        <?php
			foreach($element as $key => $value) {
			?>
            	<td><input name="<?=$key?>" <?=in_array($key, $_REQUEST['readOnly']) ? 'readonly="readonly"' : ''?> id="<?=$key?>_<?=$index?>" class="required" type="text" value="<?=$value?>" autocomplete="off" <?= (!empty($_REQUEST['action'])) ? urldecode($_REQUEST['action']) : ""?> /></td>
            <?php
			};
		?>		<td><?= (isset($_REQUEST['delete'])) ? "<input name='delete' id='delete_$index' type='checkbox' value='1' class='required' />" : ""?></td>
        </tr>
<?php
	};
?>