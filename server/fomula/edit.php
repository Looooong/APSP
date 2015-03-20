<style type="text/css">
	.table { font-size:12px;}
</style>
<?php
	$id = $_REQUEST['ID'];
	$query = "SELECT tensp, solit FROM dmspham WHERE maso = $id";
	$db->querySQL($query);
	$product = $db->fetchArray();
?>
<input type="hidden" id="currentId" value="<?=$id?>" />
<table class="table">
	<thead>
	<tr>
		<th>
			<label for="textfield2">Sản Phẩm</label>: <?=$product['tensp']?>
		</th>
		<th>
			<label for="select">Bao Bì</label>: <?=$product['solit']?> lit
		</th>
	</tr>
    </thead>
</table>

<table class="table">
	<thead>
		<tr>
			<th></th>
			<th><div class="block-header"><h1>Nguyên Liệu Sản Xuất</h1></div></th>
			<th><div class="block-header"><h1>Tỷ Lệ</h1></div></th>
		</tr>
		<tr id="materialsNew" style="display:none">
			<td>
				<button class="button" onclick="deleteLine(this)" disabled="disabled">X</button>
			</td>
			<td>
				<input name="materialName" type="text" oninput="inputMaterial(this)" onfocus="focusMaterial(this)" onblur="blurMaterial(this)" />
				<div>
					<div style="position:absolute; display:none; z-index:99;background:#FFFFFF">
					<?php
						$query = "SELECT ID, name FROM materials";
						$db->querySQL($query);
						$material = $db->fetchToArray();
						
						foreach ($material as $data) {
						?>
						<div name="<?=$data['ID']?>" onclick="selectMaterial(this)"><?=$data['name']?></div>
						<?php
						};
					?>
					</div>
				</div>
			</td>
			<td><input name="materialRatio" type="text" oninput="numberInput(this)" onblur="numberBlur(this)" value="0" /></td>
		</tr>
	</thead>

	<tbody id="materials">
	<?php
		$query = "SELECT fomula.*, name FROM fomula
					INNER JOIN materials
						ON materialID = ID
					WHERE goodID = $id";
		$db->querySQL($query);
		$material = $db->fetchToArray();
		
		foreach ($material as $data) {
		?>
		<tr name="<?=$data['materialID']?>">
			<td>
				<button class="button" name="<?=$data['materialID']?>" onclick="deleteLine(this)">X</button>
			</td>
			<td><?=$data['name']?></td>
			<td><input type="text" value="<?=$data['ratio']?>" oninput="numberInput(this)" onblur="numberBlur(this)" /></td>
		</tr>
		<?php
		};
	?>
	</tbody>

	<tbody>
		<td></td>
		<td><strong>Tổng Cộng</strong></td>
		<td id="totalRatio"></td>
	</tbody>

	<thead>
		<tr>
			<th></th>
			<th><div class="block-header">
		<h1>Vật Liệu Đóng Gói</h1>
	</div></th>
			<th><div class="block-header">
		<h1>Số Lượng</h1>
	</div></th>
		</tr>
        <tr id="packsNew" style="display:none">
			<td>
				<button class="button" onclick="deleteLine(this)" disabled="disabled">X</button>
			</td>
			<td>
				<input name="packName" type="text" oninput="inputMaterial(this)" onfocus="focusMaterial(this)" onblur="blurMaterial(this)" />
				<div>
					<div style="position:absolute; display:none; z-index:99;background:#FFFFFF">
					<?php
						$query = "SELECT ID, name FROM packages";
						$db->querySQL($query);
						$packages = $db->fetchToArray();
						
						foreach ($packages as $data) {
						?>
						<div name="<?=$data['ID']?>" onclick="selectMaterial(this)"><?=$data['name']?></div>
						<?php
						};
					?>
					</div>
				</div>
			</td>
			<td><input name="materialRatio" type="text" oninput="numberInput(this)" onblur="numberBlur(this)" value="0" /></td>
		</tr>
	</thead>
	
	<tbody id="packs">
	<?php
		$query = "SELECT fomula_pack.*, name FROM fomula_pack
					INNER JOIN packages
						ON packID = ID
					WHERE goodID = $id";
		$db->querySQL($query);
		$package = $db->fetchToArray();
		
		foreach ($package as $data) {
		?>
		<tr name="<?=$data['packID']?>">
			<td>
				<button class="button" name="<?=$data['packID']?>" onclick="deleteLine(this)">X</button>
			</td>
			<td><?=$data['name']?></td>
			<td><input type="text" value="<?=$data['quantity']?>"  oninput="numberInput(this)" onblur="numberBlur(this)" /></td>
		</tr>
		<?php
		};
	?>
	</tbody>
    
	<tbody>
		<td></td>
		<td><strong>Tổng Cộng</strong></td>
		<td id="totalQuantity"></td>
	</tbody>
</table>
<div class="block-actions">
	<ul class="actions-left">
		<li><input type="button" class="button" value="Lưu" onclick="callUpdate()" /></li>
		<li><input type="button" class="button" value="Trở Về" onclick="callView()" /></li>
	</ul>
</div>

???PHPTOSCRIPT???
<?php
	include "edit.js";
?>