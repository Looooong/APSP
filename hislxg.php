
<form action = "" method = "POST">
<table width="200px">
<tr>
<td><label>Ngày Xuất Hàng Từ</label><input type = "text" name = "ngayxuat" value = "" />  <label> Đến</label><input type = "text" name = "ngayxuatkt" value = "" />  </td>
</tr>
<td><input type = "submit" name = "xemnx" value = "CLICK" /></td>
</table>
</form>
<br />
<?php

  $query ="select lsxg.*,lxg.tenhg from lsxg,lxg WHERE lsxg.maso = lxg.maso";
  $db->querySql($query);
  if($db->numrows()>0){
  echo '<table id = "filterTable5" align="center" border = "1" cellspacing="0">';
	$arrQua = $db->fetchToArray();
	
	
	
	
	echo '<thead><tr>
	<th>'.$lang->get('xlht').'</th> 
	<th>'.$lang->get('mkhang').'</th> 
	<th>'.$lang->get('maso').'</th>  
	<th>'.$lang->get('tenhg').'</th>  
	<th>'.$lang->get('slxg').'</th> 
	<th>'.$lang->get('ghichuxg').'</th> 
	<th>'.$lang->get('motaktxg').'</th> 
	<th>'.$lang->get('ngayxuatg').'</th> 
	</tr>

	 
	<thead>';
	foreach ($arrQua as $Qua){
		echo '<tbody><tr>';
		echo '<td><input type = "checkbox" name = "check_b" value = "" /></td>';
		echo '<td>'.$Qua['mkhang'].'</td>';
		echo '<td>'.$Qua['maso'].'</td>';
		echo '<td>'.$Qua['tenhg'].'</td>';
		echo '<td>'.$Qua['slxg'].'</td>';
		echo '<td>'.$Qua['ghichuxg'].'</td>';
		echo '<td>'.$Qua['motaktxg'].'</td>';
		echo '<td>'.date_format($Qua['ngayxuat'],"d-m-Y").'</td>';	
		echo '</tr></tbody>';
	}
	echo '</table>';
}else{
	echo 'Không tìm thấy trong kho xuất gửi có tên tương tự';
}
  ?>