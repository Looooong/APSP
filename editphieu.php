<?php
	require_once 'inc/database.class.php';
	require_once 'inc/config.php';	
	require_once "inc/languages.class.php";
	session_start();
	$lang= new languages;// khai báo bien lang goi da ngon ngu
	//--------------------------------------------------------
	
	$id = $_GET['id'];
	$id = addslashes($id);
			
	$reltab = $_SESSION['rel1'];
	$reltab2 = $_SESSION['rel2'];
	
	$query = "SELECT column_name
				FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
				WHERE OBJECTPROPERTY(OBJECT_ID(constraint_name), 'IsPrimaryKey') = 1
				AND table_name = '$reltab2'";
	$db->querySql($query);
	$datainfo2 = $db->fetchArray();
	$datainfo2 = $datainfo2['column_name'];

	$query = "SELECT column_name
				FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
				WHERE OBJECTPROPERTY(OBJECT_ID(constraint_name), 'IsPrimaryKey') = 1
				AND table_name = '$reltab'";
	$db->querySql($query);
	$datainfo = $db->fetchArray();
	$datainfo = $datainfo['column_name'];
?>

<script language="javascript" type="text/javascript">

function getAvailableRow(table) {
	var tbody = document.getElementById(table).getElementsByTagName("TR"), blank, child;
	
	for (var i = 0; i < tbody.length; i++) {
		blank = true;
		child = tbody[i].getElementsByTagName("INPUT");
			
		for (var j = 0; j < child.length; j++) {
			if (child[j].name != "<?=$datainfo?>" && child[j].value) {
				blank = false;
				break;
			};
		};

		if (blank) {
			return tbody[i];
		};
	};
	
	return false;
};

function addTableRow() {
	var node = document.getElementById("newRow").cloneNode(true);
	node.removeAttribute("id");
	node.removeAttribute("style");
	document.getElementById("table2").appendChild(node);
		
	return node;
};

function SomeDeleteRowFunction(o) {
	var p=o.parentNode.parentNode;
	p.parentNode.removeChild(p);
};
	
function popitup(url) {
	var obj = new Object();
	window.showModalDialog(url, obj,"dialogWidth:1000px; dialogHeight:600px");

	if (Object.keys(obj).length) {
		var curRow = getAvailableRow("table2");
		
		if (!curRow) {
			curRow = addTableRow($("#rel2"));
		};
		
		for (var i in obj) {
			for (var j = 0; j < curRow.getElementsByTagName("INPUT").length; j++) {
				if (curRow.getElementsByTagName("INPUT")[j].name && curRow.getElementsByTagName("INPUT")[j].name == i) {
					curRow.getElementsByTagName("INPUT")[j].value = obj[i];
					break;
				};
			};
		};
	};
};

function popitupdv(url) {
	var obj = new Object();
	window.showModalDialog(url, obj,"dialogWidth:1000px; dialogHeight:600px");
	
	for (var i in obj) {
		document.getElementById(i).value = obj[i];
	};
};
</script>

<script>
function updateTable(){
	var table1 = document.getElementsByName("<?=$reltab?>");
	
	for (var i = 0; i < table1.length; i++) {
		var data = {"callAjax": "updateDatabase.php",
				"table": "<?=$reltab?>",
				"column": table1[i].id,
				"value": table1[i].value,
				"matchColumn": "<?=$datainfo?>",
				"matchValue": "<?=$id?>"
				};
				
		ajax("server/server.php", "", "", data, false, false);
	};
	

	
	var newTable = document.getElementById("table2");
	var oldTable = document.getElementById("oldTable");
	
	var newRow = newTable.getElementsByTagName("tr");
	var oldRow = oldTable.getElementsByTagName("tr");
	
	var newCol, oldCol, colName, query, rowID;
	
	for (var i = 0; i < newRow.length; i++) {
		if (newRow[i].id) {
			for (var j = 0; j < oldRow.length; j++) {
				if (newRow[i].getAttribute("id") == oldRow[j].getAttribute("id")) {
					newCol = newRow[i].getElementsByTagName("input");
					oldCol = oldRow[j].getElementsByTagName("input");
					
					for (var k = 0; k < newCol.length; k++) {
						if (newCol[k].name && (newCol[k].value != oldCol[k].value || (newCol[k].type === "checkbox" && newCol[k].checked != oldCol[k].checked))) {
							
							//UPDATE
							colName = newCol[k].name;
							rowID = newRow[i].id.split("row")[0];

							ajax("server/server.php", "", "", {"callAjax": "updateDatabase.php",
																"table": "<?=$reltab2?>",
																"matchColumn": "<?=$datainfo2?>",
																"matchValue": rowID,
																"column": colName,
																"value": (newCol[k].type === "checkbox") ? ((newCol[k].checked) ? 1 : 0) : newCol[k].value}, false, true);
						};
					};
					
					break;
				};
			};
		} else {
			//INSERT
			var data = {
				"callAjax": "insertDatabase.php",
				"table": "<?=$reltab2?>",
				"column": [],
				"value": []
			};
			
			var col = newRow[i].getElementsByTagName("input");
			for (var j = 0; j < col.length; j++) {
				if (col[j].name) {
					data.column.push(col[j].name);
					data.value.push((col[j].type === "checkbox") ? ((col[j].checked) ? 1 : 0) : col[j].value);
				};
			};
			
			ajax("server/server.php", "", "", data, false, true);
		};
	};
	
	var match = false;
	
	for (i = 0; i < oldRow.length; i++) {
		match = false;
		
		for (j = 0; j < newRow.length; j++) {
			if (newRow[j].id && newRow[j].id == oldRow[i].id) {
				match = true;
				break;
			};
		};
		
		if (!match) {
			//DELETE
			rowID = oldRow[i].id.split("row")[0];
			ajax("server/server.php", "", "", {"callAjax": "deleteDatabase.php", "table": "<?=$reltab2?>", "column": "<?=$datainfo2?>", "value": rowID}, false, true);
		};
	};
};

function tinhTTien(element) {
	var parent = element.currentTarget.parentNode.parentNode.getElementsByTagName("TD");
	
	for (var i = 0; i < parent.length; i++) {
		switch (parent[i].getElementsByTagName("INPUT")[0].name) {
			case ("ttien"):
				var result = parent[i].getElementsByTagName("INPUT")[0];
			break;
			
			case ("dgia"):
				var var1 = parent[i].getElementsByTagName("INPUT")[0].value;
			break;
			
			case ("sluong"):
				var var2 = parent[i].getElementsByTagName("INPUT")[0].value;
			break;
		};
	};
	
	result.value = var1 * var2;
};

function onCKhau(element) {
	var parent = element.currentTarget.parentNode.parentNode.getElementsByTagName("TD");
	
	for (var i = 0; i < parent.length; i++) {
		switch (parent[i].getElementsByTagName("INPUT")[0].name) {
			case ("ttdck"):
				var result = parent[i].getElementsByTagName("INPUT")[0];
			break;
			
			case ("ttien"):
				var var1 = parent[i].getElementsByTagName("INPUT")[0].value;
			break;
			
			case ("ckhau"):
				var var2 = parent[i].getElementsByTagName("INPUT")[0];
			break;
			
			case ("ckhaut"):
				var block = parent[i].getElementsByTagName("INPUT")[0];
		};
	};
	block.disabled = (var2.value) ? true : false;
	
	if (!var2.disabled) {
		result.value = ((var1 * var2.value)/100).toFixed(2);
	};
};
function onCKhauT(element) {
	var parent = element.currentTarget.parentNode.parentNode.getElementsByTagName("TD");
	
	for (var i = 0; i < parent.length; i++) {
		switch (parent[i].getElementsByTagName("INPUT")[0].name) {
			case ("ttdck"):
				var result = parent[i].getElementsByTagName("INPUT")[0];
			break;
			
			case ("ttien"):
				var var1 = parent[i].getElementsByTagName("INPUT")[0].value;
			break;
			
			case ("ckhaut"):
				var var2 = parent[i].getElementsByTagName("INPUT")[0];
			break;
			
			case ("ckhau"):
				var block = parent[i].getElementsByTagName("INPUT")[0];
		};
	};
	block.disabled = (var2.value) ? true : false;
	
	if (!var2.disabled) {
		result.value = ((var1 * var2.value)/1.1).toFixed(2);
	};
};
</script>

<div class="block-border">
	<div class="block-header">
		<h1><?= $lang->get('suaPhieu') ?></h1><span></span>
	</div>

	<div class="block-content">
	<?php
		$query = "SELECT * FROM $reltab WHERE $datainfo = '$id' ";
		$db->querySql($query);
		$result = $db->fetchToArray();
	?>
		<div style='padding:2px'>
		<input style='float:right;width:70px' type='button' value='Tìm đơn vị' onclick='popitupdv("searchdonvi.php")' />
	<?php
		$keyvalues = $keys = array();
		foreach ($result as $index => $value) {
			foreach($value as $key => $keyvalue){
				$keys[] = $key;
				$keyvalues[] = $keyvalue;
			};
		};
			
		$tmp = 0;
		while($tmp < count($keys)){
			$stt = 0;

			for($i = $tmp;$i < count($keys);$i++){
				$str = (is_object($keyvalues[$i]) && get_class($keyvalues[$i]) == "DateTime") ? $keyvalues[$i]->format('d/m/Y') : $keyvalues[$i];
				if($keys[$i] == $datainfo) { 
				?>
					<div style='display:none'>
                       	<div>
							<p>
								<label for='title'>
									<?=$keys[$i]?>
								</label>
							</p> 
								<input type='text' value='<?=$str?>' name="<?=$reltab?>" id='<?=$keys[$i]?>' />
						</div>
					</div>
				<?php
				} else {
				?>
					<div style='line-height:20px; float:left; font-weight:bold; text-align:center'>
						<p style='float:left; text-align:center; width:100px;'>
							<label for='title'><?=$keys[$i]?></label>
						</p>
							<input class='required text' style='width:110px' type='text' name="<?=$reltab?>" id='<?=$keys[$i]?>' value='<?=$str?>'/>
					</div>
				<?php
				};
				
				$stt++; 
				$tmp++;
				if ($stt == 4) break;
			};
		};
		?>
			</div>

			<div class="clear"></div>

			<div style="overflow:auto; height:320px">
				<input style='float:left; width:85px' type='button' value='Tìm sản phẩm' onclick='popitup("searchdv.php")' />

				<table id="rel2" style="font-size:12PX" class="table">
			<?php
				$query = "SELECT COLUMN_NAME, DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$reltab2'";
				$db->querySQL($query);
				$thead = $db->fetchToArray();
				
				?>
				<thead>
					<tr>
						<th></th>
						<?php
							foreach ($thead as $data) {
								if ($data['DATA_TYPE'] === 'bit') {
									$typeBit[$data['COLUMN_NAME']] = 1;
								};
								if ($data['COLUMN_NAME'] != $datainfo && $data['COLUMN_NAME'] != $datainfo2) {
								?>
                                  		<th><?=$data['COLUMN_NAME']?></th>
                                  	<?php
								};
							};
						?>
					</tr>
					<tr id="newRow" style="display:none">
                       	<td>
							<input class='button' type='button' value='<?=$lang->get('xoaDong')?>' onclick='SomeDeleteRowFunction(this)'>
						</td>
						<?php
							foreach ($thead as $data) {
								if ($data['COLUMN_NAME'] != $datainfo2) {
								?>
						<td style='<?=($data['COLUMN_NAME'] == $datainfo) ? "display:none" : "padding:0px"?>'>
							<input type="<?=($data['DATA_TYPE'] === "bit") ? "checkbox" : "text"?>" class='require text' name='<?=$data['COLUMN_NAME']?>'
                            	<?=($data['COLUMN_NAME'] == "ttien") ? "disabled='true'" : ""?>
								<?=($data['COLUMN_NAME'] == $datainfo) ? "value='$id'" : ""?>
                                <?=($data['COLUMN_NAME'] == "dgia" || $data['COLUMN_NAME'] == "sluong") ? 'oninput="tinhTTien(event)"' :
									(($data['COLUMN_NAME'] == "ckhau") ? 'oninput="onCKhau(event)"' :
									(($data['COLUMN_NAME'] == "ckhaut") ? 'oninput="onCKhauT(event)"' : ""))?> />
						</td>
								<?php
								};
							};
						?>
					</tr>
				</thead>
				<tbody id="table2">
				<?php
					$query = "SELECT * FROM $reltab2 where $datainfo = '$id' ";
					$db->querySql($query);
					$result = $db->fetchToArray();
						foreach ($result as $index => $value) {
					?>
					<tr id="<?=$value[$datainfo2]?>row">
						<td>
							<input class='button' type='button' value='<?=$lang->get('xoaDong')?>' onclick='SomeDeleteRowFunction(this)'>
						</td>
					<?php
						foreach ($value as $key => $keyValue){
							$str = (is_object($keyValue) && get_class($keyValue) == "DateTime") ? $keyValue->format('Y-m-d') : $keyValue;
		
							if($key != $datainfo2) {
							?>
						<td style='<?=($key != $datainfo) ? "padding:0px" : "display:none"?>'>
							<input type="<?=(isset($typeBit[$key])) ? "checkbox" : "text"?>" class='require text' name='<?=$key?>'
							<?=(isset($typeBit[$key])) ? (($keyValue == 1) ? "checked" : "") : 'value="'.$keyValue.'"'?>
                            	<?=($key == "ttien") ? "disabled='true'" : ""?>
								<?=($key == $datainfo) ? "value='$id'" : ""?>
                                <?=($key == "dgia" || $key == "sluong") ? 'oninput="tinhTTien(event)"' :
									(($key == "ckhau") ? 'oninput="onCKhau(event)"' :
									(($key == "ckhaut") ? 'oninput="onCKhauT(event)"' : ""))?> />
						</td>
							<?php
							};
						};
					?>
					</tr>
					<?php
					};
					?>
				</tbody>
			</table>
		</div>
			<div style='display:none'>
			<table>
				<tbody id='oldTable'>
         				<?php
				foreach ($result as $index => $value) {
				?>
					<tr id="<?=$value[$datainfo2]?>row">
						<td><input type="hidden" /></td>
				<?php
					foreach ($value as $key => $keyValue){
						$str = (is_object($keyValue) && get_class($keyValue) == "DateTime") ? $keyValue->format('Y-m-d') : $keyValue;
						
						if($key != $datainfo2) {
						?>
						<td <?=($key == $datainfo) ? "style='display:none'" : ""?>>
							<input type="text" value='<?=$str?>' />
						</td>
						<?php
						};
					};
				?>
					</tr>
				<?php
				};
				?>
				</tbody>
			</table>
		</div>
			<div class="block-actions">
			<ul class="actions-left">
				<li><input type="button" class="button" value="Ghi" onclick="updateTable(); tb_remove()"></li>
				<li><input type="button" id="addnrow" name="add-row" class="button" value="<?=$lang->get('themDong')?>" /></li>
				<li><input id = "buttonclick" style = "width:60px" type="submit" value="Hủy" class = "button" /></li>
			</ul>
		</div>
	</div>
</div>

<script language="javascript" type="text/javascript">
	$(function() {
		$('#buttonclick').click(function(e) {
									e.preventDefault();
									tb_remove();
								});
	});

	$(document).ready(function(){
		var ac_config = {
						source: "rpc.php",
						select: function(event, ui){
									console.log(ui.item.mkhang);
									$("input#a7").val(ui.item.mkhang);
									$("input#a8").val(ui.item.ten);
									$("input#a9").val(ui.item.dchi);
									$("input#a10").val(ui.item.dthoai);
									$("input#a11").val(ui.item.msthue);
								},
						minLength:2
						};
		$("input#a7").autocomplete(ac_config);
	});

	$(document).ready(function($) {
		$("#addnrow").click(function(e) {
								e.preventDefault();
								addTableRow($("#rel2"));
								return false;
							});
	}); 
</script>