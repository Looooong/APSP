<?php 
	require_once 'inc/database.class.php';
	require_once 'inc/config.php';	
	require_once "inc/languages.class.php";
	session_start();
	$lang= new languages;// khai báo bien lang goi da ngon ngu
	//--------------------------------------------------------
	
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
			if (child[j].name && child[j].name != "<?=$datainfo?>" && (((child[j].type !== "checkbox" && child[j].value) || child[j].checked))) {
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
	window.showModalDialog(url, obj,"dialogWidth:1300px; dialogHeight:700px");

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
	window.showModalDialog(url, obj,"dialogWidth:1300px; dialogHeight:700px");
	
	for (var i in obj) {
		document.getElementById(i).value = obj[i];
	};
};
</script>

<script type="text/javascript">

function addTicket() {
	var table1 = document.getElementsByName("<?=$reltab?>");
	var data = {"callAjax": "insertDatabase.php",
				"table": "<?=$reltab?>",
				"column": [],
				"value": []
				};
	
	for (var i = 0; i < table1.length; i++) {
		data.column.push(table1[i].id);
		data.value.push(table1[i].value);
	};
	
	ajax("server/server.php", "", "", data, false, false);
	
	ajax("server/server.php", "newID", "", {"callAjax": "selectDatabase.php", "column": ["ident_current('<?=$reltab?>')"]}, false, false);

	var newID = document.getElementById("newID").getElementsByTagName("td")[0].innerHTML;
	var table2 = document.getElementById("table2").getElementsByTagName("tr");
	
	for (i = 0; i < table2.length; i++) {
		var col = table2[i].getElementsByTagName("input");
		var data = {"callAjax": "insertDatabase.php",
			"table": "<?=$reltab2?>",
			"column": ["<?=$datainfo?>"],
			"value": [newID]
		};
		
		for (var j = 0; j < col.length; j++) {
			if (col[j].name) {
				data.column.push(col[j].name);
				data.value.push((col[j].type === "checkbox") ? ((col[j].checked) ? 1 : 0) : col[j].value);
			};
		};
		
		ajax("server/server.php", "", "", data, false, false);
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
	
	result.value = (var1 * var2).toFixed(2);
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
		<h1><?=$lang->get('them',$reltab)?></h1><span></span>
	</div>

	<div class="block-content">
		<div style='padding:5px'>
			
			<input style='float:right;width:70px' type='button' value='Tìm đơn vị' onclick='popitupdv("searchdonvi.php")'>
			<?php
				$indices = array();

				$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS
							WHERE TABLE_NAME='$reltab'";
				$db->querySql($query);	
				$result = $db->fetchToArray();

				foreach ($result as $index){
					foreach($index as $value){
						if($value != $datainfo)
							$indices[] = $value;
					}
				}	

				$tmp = 0;
				while($tmp < count($indices)){
					$stt = 0;

					for($i = $tmp; $i < count($indices); $i++){
						if($indices[$i] != $datainfo)
						?>
							<div style='width:110px; float:left; font-weight:bold; text-align:center'>
								<label for='<?=$indices[$i]?>'><?=$lang->get($indices[$i])?></label>
							</div> 
			
							<input class='required text' style='width:110px; float:left' type='text' name="<?=$reltab?>" id='<?=$indices[$i]?>' <?=($indices[$i] === 'nct' || $indices[$i] === 'ngayhd') ? "value='".date('d/m/Y')."'" : ""?>/> 
                            <input class='required text' type='hidden' name="oldTable1" id='<?=$indices[$i]?>' />       <!-------------------------------------------------------------------Insert theo định dạng ngày tháng năm -------------->
							
						<?php
						$tmp++;

						if (++$stt == 4){
							echo "<div class='clear'></div>";
							break;
						};

					};
		
				};
			?>
		</div>

		<div class='clear'></div>

		<div style='overflow:auto; height:320px'>
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
							<input type="<?=($data['COLUMN_NAME'] === "hkmai") ? "checkbox" : "text"?>" class='require text' name='<?=$data['COLUMN_NAME']?>'
                            	<?=($data['COLUMN_NAME'] == "ttien") ? "disabled='true'" : ""?>
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
				</tbody>
			</table>
            
            <div id="newID" style="display:none">
            </div>
		</div>

		<div class="block-actions">
			<ul class="actions-left">
				<li><input type="button" class="button" value="<?=$lang->get('dongY')?>" onclick="addTicket(); window.location.reload()" /></li>
				<li><input type="button" onclick="addTableRow()" class="button" value="<?=$lang->get('themDong')?>" /></li>
				<li><input id="buttonclick" style="width:60px" type="button" value="<?=$lang->get('thoat')?>" class="button" /></li>
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
					$("input#a6").val(ui.item.mkhang);
					$("input#a7").val(ui.item.ten);
					$("input#a8").val(ui.item.dchi);
					$("input#a9").val(ui.item.dthoai);
					$("input#a10").val(ui.item.msthue);
    			},
    			minLength:2
    		};

		$("input#a6").autocomplete(ac_config);
		
		for (var i = 0; i < 3; i++)
			addTableRow();
	});
</script>