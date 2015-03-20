<html>
<head>
<!--	<style>
    .table thead { background:#fff !important}
	.table thead tr.ghe { background:url("../src/img/tables/table-head-bg.png") repeat-x scroll top left #dddddd }
    </style>	
-->
<style>
body {
	background: #FFFFFF;
	margin: 0;
}

div {
	width: 100%;
}

h1, h2 {
	text-align: center;
	vertical-align: middle;
	display: block;
}

h3 {
	text-align: center;
	vertical-align: middle;
	display:inline-block;
}

h4 {
	text-align: center;
	vertical-align: middle;
	display:inline;
}

table {
	border: solid #CCCCCC;
	border-collapse:collapse;
	width: 95%;
	margin: auto;
	background: #FFFFFF;
	line-height: 120%;
}

thead {
	background: #F0FFFF;
	border-top: solid #CCCCCC;
}

tbody {
	border-bottom: solid #CCCCCC;	
}

th {
	border: thin solid #AAAAAA;
}

td {
	border: thin solid #AAAAAA;
}

input[type=button] {
	background: #008BFF;
	border: none;
	outline: none;
	color: #FFFFFF;
}

input[type=button]:hover {
	background: #00ABFF;
}

button {
	background: #008BFF;
	border: solid thick #D0F0FF;
	outline: none;
	color: #FFFFFF;
	font-size:28px;
	font-weight:lighter;
}

button:hover {
	background: #00ABFF;
}

button:disabled {
	background: #666666;
}

.block-header {
	background: #FFFFFF;
	color: #000000;
}

.block-actions {
	vertical-align:middle;
	background: #D0F0FF;
	width: 100%;
	position:fixed;
	bottom: 0px;
	border-top: thin solid #000000;
}
</style>
</head>

<body>
<?php
	//require_once "loader.php";
	if (isset($_REQUEST['orderID'])) {
		$orderID = $_REQUEST['orderID'];
		
		$query = "SELECT productOrder.*, tensp, solit FROM productOrder
					INNER JOIN dmspham ON goodsID = maso
					WHERE ID = ".$orderID;
		$db->querySQL($query);
		$order = $db->fetchArray();
		
		$query = "SELECT productOrderDetail.*, name, d30 FROM productOrderDetail
					INNER JOIN materials ON materialID = ID
					WHERE incur = 0 AND orderID = ".$orderID;
		$db->querySQL($query);
		$fomulaMaterials = $db->fetchToArray();
		
		$query = "SELECT productOrderDetail.*, name, d30 FROM productOrderDetail
					INNER JOIN materials ON materialID = ID
					WHERE incur = 1 AND orderID = ".$orderID;
		$db->querySQL($query);
		$incurMaterials = $db->fetchToArray();
		
		$query = "SELECT productOrderDetailPack.*, name, volCap FROM productOrderDetailPack
					INNER JOIN packages ON packID = ID
					WHERE incur = 0 AND orderID = ".$orderID;
		$db->querySQL($query);
		$fomulaPackages = $db->fetchToArray();
		
		$query = "SELECT productOrderDetailPack.*, name, volCap FROM productOrderDetailPack
					INNER JOIN packages ON packID = ID
					WHERE incur = 1 AND orderID = ".$orderID;
		$db->querySQL($query);
		$incurPackages = $db->fetchToArray();
	} else
		$orderID = 0;
?>
<div class="block-border">
	<div class="block-content">
		<div class="block-header">
			<h1>
				LỆNH SẢN XUẤT
			</h1>
		</div>

		<table class="table">
			<thead>
				<tr>
					<th>Ngày Lập Lệnh:</th>
					<th><input disabled style="float:left" id="orderDate" type="text" value="<?=($orderID) ? $order['date']->format('d/m/Y') : date('d/m/Y')?>" /></th>
					<th>Sản Phẩm:</th>
					<th colspan="6"><input style="float:left; width: 100%" id="orderProduct" name="" type="text" <?=($orderID) ? 'value="'.$order['tensp'].'" disabled="disabled"' : ""?> /><br />
					<?php
						if (!$orderID) {
						?>
						<div>
							<div id="products" style="position:absolute; background-color:#F8F8F8; overflow-y:hidden; max-width:400px">
							</div>
						</div>
						<?php
						};
					?>
					</th>
					<th><?=($orderID) ? "" : '<input style="width:50px; float:left" class="button" type="button" value="X" onclick="deleteProduct(this)" />'?></th>
				</tr>
				<tr>
					<th>Ngày Thực Hiện:</th>
					<th><input style="float:left" <?=($orderID && $order['printed']) ? "disabled" : ""?> id="orderStart" type="text" value="<?=($orderID) ? $order['start']->format('d/m/Y') : date("d/m/Y")?>" /></th>
					<th>Ngày Hoàn Tất:</th>
					<th><input id="orderFinish" type="text" <?=($orderID && $order['status']) ? (is_null($order['finish'])) ? "" : 'value="'.$order['finish']->format('d/m/Y').'"' : 'disabled="disabled"'?> /></th>
					<th>Bao Bì:</th>
					<th>
						<select id="package" onChange="selectPackage()" <?=($orderID) ? 'disabled="disabled"' : ''?>>
						<?php
							if (!$orderID) {
							?>
							<option value="0" selected="selected">Tất Cả</option>
							<?php
								$query = "SELECT DISTINCT solit
											FROM dmspham";
								$db->querySQL($query);
								$package = $db->fetchToArray();
						
								foreach ($package as $data) {
								?>
							<option value="<?=$data['solit']?>"><?=$data['solit']." lit"?></option>
								<?php
								};
							} else {
							?>
							<option><?=$order['solit']." lit"?></option>
							<?php
							};
						?>
						</select>
					</th>
					<th>Trạng Thái:</th>
					<th>
						<select id="orderStatus" <?=($orderID && $order['printed']) ? 'disabled="disabled"' : 'onchange="changeStatus(this)"'?>>
							<option value="0" <?=($orderID && !$order['status']) ? 'selected="selected"' : ''?>>Đang Sản Xuất</option>
							<option value="1" <?=($orderID && $order['status']) ? 'selected="selected"' : ''?>>Đã Sản Xuất</option>
						</select>
					</th>
					<th>Lấy Mẫu</th>
					<th>
						<input type="text" id="orderSample" value="0" oninput="numberInput(this)" onBlur="numberOnblur(this)" /> Lit
					</th>		
				</tr>
			</thead>
		</table>

		<div class="block-header">
			<h2>YÊU CẦU NGUYÊN VẬT LIỆU / MATERIALS REQUISATION</h2>
		</div>

		<table>
			<thead>
				<tr>
					<th colspan="5">
						<h3>Nguyên Liệu Sản Xuất</h3>
					</th>
				</tr>
			</thead>
			<thead>
				<tr>
					<th colspan="5">
						<h4>Công Thức</h4>
					</th>
				</tr>
				
				<tr>
					<th></th>
					<th>Tên</th>
					<th>Tỉ Lệ (%)</th>
					<th>Dung Tích (Lit)</th>
					<th>Khối Lượng (Kg)</th>
				</tr>
			</thead>
			<tbody id="fomulaMaterials">
			<?php
				if ($orderID) {
					foreach ($fomulaMaterials as $index=>$data) {
					?>
						<tr>
							<td><?=$index + 1?></td>
							<td><?=$data['name']?></td>
							<td><?=number_format($data['kg']/$data['d30']/$order['solit']*100.0, 3)?></td>
							<td><?=number_format($data['kg']/$data['d30']*100.0, 3)?></td>
							<td><?=number_format($data['kg'], 3)?></td>
						</tr>
					<?php
					};
				};
			?>
			</tbody>

			<thead>
				<tr>
					<th colspan="5">
						<h4>Phát Sinh</h4>
                    </th>
				</tr>
				<?php
					if (!$orderID || ($orderID && !$order['printed'])) {
					?>
						<tr id="newMaterials" style="display:none">
							<td><input type="button" onClick="deleteLine(this)" value="X" /></td>
							<td>
								<input type="text" name="incurMaterialID" />
								<div>
									<div style="position:absolute; display:none">
									<?php
										$query = "SELECT ID, name, d30 FROM materials";
										$db->querySQL($query);
										$materials = $db->fetchToArray();
										
										foreach ($materials as $data) {
										?>
                                        	<div name="<?=$data['ID']."|".$data['d30']?>"><?=$data['name']?></div>
										<?php
										};
									?>
									</div>
								</div>
							</td>
							<td></td>
							<td><input type="text" name="incurMaterialLit" disabled="disabled" value="0" /></td>
							<td><input type="text" name="incurMaterialKg" value="0" oninput="numberInput(this); calculateMaterial(this)" /></td>
						</tr>
					<?php
					};
				?>
			</thead>
			<tbody id="incurMaterials">
			<?php
				if ($orderID) {
					foreach ($incurMaterials as $data) {
					?>
						<tr name="<?=$data['materialID']?>">
							<td><button <?=($order['printed']) ? 'disabled="disabled"': ''?> onClick="deleteLine(this)">X</button></td>
							<td><input type="text" disabled="disabled" name="incurMaterialID" value="<?=$data['name']?>" /></td>
							<td></td>
							<td><input type="text" disabled="disabled" name="incurMaterialLit" value="<?=number_format($data['kg']/$data['d30']*100.0, 3)?>" /></td>
							<td><input type="text" <?=($order['printed']) ? 'disabled="disabled"': ''?> name="incurMaterialKg" value="<?=number_format($data['kg'], 3)?>" oninput="numberInput(this); calculateMaterial(this)" /></td>
						</tr>
					<?php
					};
				};
			?>
			</tbody>
		</table>
		<br />
		<table>
			<thead>
				<tr>
					<th colspan="4">
						<h3 style="line-height:20px">Vật Liệu Đóng Gói</h3>
					</th>
				</tr>
			</thead>
			<thead>
				<tr>
					<th colspan="4">
						<h4 style="line-height:20px">Công Thức</h4>
					</th>
				</tr>
			
				<tr>
					<th></th>
					<th>Tên</th>
					<th>Bao Bì (Lit)</th>
					<th>Số Lượng (Cái)</th>
				</tr>
			</thead>
			<tbody id="fomulaPackages">
			<?php
				if ($orderID) {
					foreach ($fomulaPackages as $index=>$data) {
					?>
						<tr>
							<td><?=$index + 1?></td>
							<td><?=$data['name']?></td>
							<td><?=$data['volCap']." lit"?></td>
							<td><?=$data['quantity']?></td>
						</tr>
					<?php
					};
				};
			?>
			</tbody>

			<thead>
				<tr>
					<th colspan="4">
						<h4>Phát Sinh</h4>
					</th>
				</tr>
				<?php
					if (!$orderID || ($orderID && !$order['printed'])) {
					?>
					<tr id="newPackages" style="display:none">
						<td><input type="button" onClick="deleteLine(this)" value="X" /></td>
						<td>
							<input type="text" name="incurPackageID" />
							<div>
								<div style="position:absolute; display:none">
								<?php
									$query = "SELECT ID, name, volCap FROM packages";
									$db->querySQL($query);
									$packages = $db->fetchToArray();
									
									foreach ($packages as $data) {
									?>
										<div name="<?=$data['ID']."|".$data['volCap']?>"><?=$data['name']?></div>
									<?php	
									};
								?>
								</div>
							</div>
						</td>
						<td><input type="text" disabled="disabled" name="incurPackageVol" /></td>
						<td><input type="text" name="incurPackageQuantity" oninput="numberInput(this)" onblur="numberBlur(this)" /></td>
					</tr>
					<?php
					};
				?>
			</thead>
			<tbody id="incurPackages">
			<?php
				if ($orderID) {
					foreach ($incurPackages as $data) {
					?>
						<tr name="<?=$data['packID']?>">
							<td><button <?=($order['printed']) ? 'disabled="disabled"': ''?> onClick="deleteLine(this)">X</button></td>
							<td><input type="text" disabled="disabled" name="incurPackageID" value="<?=$data['name']?>" /></td>
							<td><input type="text" disabled="disabled" name="incurPackageVol" value="<?=$data['volCap']?>" /></td>
							<td><input type="text" <?=($order['printed']) ? 'disabled="disabled"': ''?> name="incurPackageQuantity" value="<?=$data['quantity']?>" /></td>
						</tr>
					<?php
					};
				};
			?>
			</tbody>
		</table>
        
		<div id="bottomPreserve"></div>
		<div id="bottomBar" class="block-actions">
			<center>
				<button <?=($orderID) ? "" : 'disabled'?> id="orderSubmit" onClick="orderSubmit()">Lưu</button>
				<button onClick="window.close()">Hủy</button>
			</center>
		</div>
	</div>
</div>
<script src="inc/ajax.class.js"></script>
<script>
orderID = <?=$orderID?>;
</script>
<script src="server/products/viewOrder.js"></script>
<script>
<?=(!$orderID  || ($orderID && !$order['printed'])) ? 'newLine("Materials"); newLine("Packages");' : ''?>
</script>
</body>
</html>