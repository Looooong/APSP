<script language="javascript" type="text/javascript" src="server/materials/view.js"></script>
<?php
	$query = "SELECT * FROM materialOrder ORDER BY status";
	$db->querySQL($query);
	$order = $db->fetchToArray();
	
	foreach ($order as $data) {
?>
<tr>
	<td style="font-size:" name="ID"><?=$data['ID']?></td>
	<td><p><?=$data['date']->format('d/m/Y')?></p></td>
	<td><p><?=($data['status']) ? "Đã Nhập" : "Chưa Nhập"?></p></td>
	<td><p><?=(is_object($data['finish'])) ? $data['finish']->format('d/m/Y') : ""?></p></td>
	<td><p><input style = "width:45px;" type="button" class="button" value="Xem" onclick="callPrint_nl(this)" /><input style = "width:50px;margin-right:5px" type="button" class="button" value="Xóa" onclick="deleteMaterial(this)" />
	<input style = "width:50px" type="button" class="button" value="Sửa" onclick="callUpdate(this)" /></p></td>
	
</tr>
<?php
	};
?>
