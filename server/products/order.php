<?php
if ($_REQUEST['type']) {
	$query = "SELECT productOrder.*, tensp FROM productOrder, dmspham WHERE goodsID = maso ORDER BY status";
	$db->querySQL($query);
	$order = $db->fetchToArray();
	
	foreach ($order as $data) {
?>
<tr>
	<td name = "ID"><?=$data['ID']?></td>
	<td><p><?=$data['date']->format('d/m/Y')?></p></td>
	<td><p><?=$data['tensp']?></p></td>
	<td><p><?=$data['quantity']?></p></td>
	<td><p><?=($data['status']) ? "Đã Sản Xuất" : "Chưa Sản Xuất"?></p></td>
	<td><p><?=(is_object($data['finish'])) ? $data['finish']->format('d/m/Y') : ""?></p></td>
	<td width="15%"><p><input style = "width:45px;" type="button" class="button" value="Xem" onclick="callView_sx(this)" /><input style = " width:45px; " type="button" class="button" value="Xóa" onclick="deleteProduct(this)" /><input style = "width:45px" type="button" class="button" value="Sửa" onclick="callUpdate(this)" /></p></td>
</tr>
<?php
	};
} else {
	$query = "SELECT * FROM productExport ORDER BY status";
	$db->querySQL($query);
	$order = $db->fetchToArray();
	
	foreach ($order as $data) {
?>
<tr>
	<td><p><?=$data['ID']?></p></td>
	<td><p><?=$data['date']->format('d/m/Y')?></p></td>
	<td><p><?=($data['status']) ? "Đã Xuất Kho" : "Chưa Xuất Kho"?></p></td>
	<td><p><?=(is_object($data['finish'])) ? $data['finish']->format('d/m/Y') : ""?></p></td>
</tr>
<?php
	};
};
?>