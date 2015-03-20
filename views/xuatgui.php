<?php
if(isset($_POST['sbxuat'])){
if(!$_POST['makh'] || !$_POST['masp'] || !$_POST['soluong']){
echo '<script type = "text/javascript">alert("Chưa nhập đủ thông tin!")</script>';
}else
	{
		$makh = $_POST['makh'];
		$madh = $_POST['madh'];
		$masp = $_POST['masp'];
		$soluong = $_POST['soluong'];
		$query = "SELECT sum(slgui) as soluonggui,sum(slx) as soluongxuat,sum(slton) as soluongton FROM lxg WHERE maso = '$masp' AND mkhang = '$makh'";
		$db->querySql($query);
		$sl = $db->fetchArray();
		$slg = $sl['soluonggui'];
		$slx = $sl['soluongxuat'];
		$slton = $sl['soluongton'];
		if($slton == 0 AND $slx == 0){
			if($slg < $soluog){ 
			echo '- kho,số lượng không đủ để xuất';
			}
				else{
					$now = date("Y-m-d",time());
					$slgd = $slg - $soluong;
					$slxd = $slx + $soluong;
					$query = "UPDATE top (1) lxg SET slx = '$slxd',slton = '$slgd' WHERE maso = '$masp' AND mkhang = '$makh'";
					$db->querySql($query);
					
					$query = "INSERT INTO lsxg(mhangdhbID,mkhang,maso,slxg,ngayxuat)
							  VALUES('$madh','$makh','$masp','$soluong','$now')";
							  $db->querySql($query);
					}
		}			
				elseif($slton > 0){
						if($slton < $soluong){
						echo '<b><h4>- kho,số lượng không đủ để xuất</h4></b>';
						}
							else{
							$now = date("Y-m-d",time());
							$slgd = $slton - $soluong;
							$slxd = $slx + $soluong;
							$query = "UPDATE top (1) lxg SET slx = '$slxd',slton = '$slgd' WHERE maso = '$masp' AND mkhang = '$makh'";
							$db->querySql($query);
							
							$query = "INSERT INTO lsxg(mhangdhbID,mkhang,maso,slxg,ngayxuat)
									  VALUES('$madh','$makh','$masp','$soluong','$now')";
									  $db->querySql($query);
							}
					}
	}			
}
?>
<form action = "#" method = "post" >
<table>
<tr><td><b>HÀNG XUẤT GỬI</b></td></tr>
<tr>
	<td>Mã Đơn Hàng:</td>
	<td><input type="text" name = "madh" id = "madh" readonly="readonly" /></td>
</tr>
<tr>
	<td>Mã Khách Hàng:</td>
	<td><input type="text" name = "makh" id = "makh" readonly="readonly" /></td>
</tr>
<tr>
	<td>Mã Sản Phẩm:</td>
	<td><input type="text" name = "masp" id = "masp" readonly="readonly" /></td>
</tr>
<tr>
	<td>Tên Sản Phẩm:</td>
	<td><input type="text" name = "tenhg" id = "tenhg" readonly="readonly" /></td>
</tr>
<tr>
	<td>Số Lượng:</td>
	<td><input type = "number" maxlength = "10" name = "soluong" id = "soluong" /></td>
</tr>
<tr>
	<td>Ngày Xuất</td>
	<td><input type="text" name = "ngaychuyen" id="" value = "<?php echo date ("d-m-Y",time());  ?>" readonly="readonly" style = "width:90px;"></td>
</tr>
<tr> <td colspan = "2"><input type = "submit" value = "XUẤT" name = "sbxuat" onclick= "return validate();"/></td></tr>
</table>
</form>
<script src="js/jquery-new.js"></script>
<?php
$query = "SELECT dmspham.maso,tensp,sum(slgui) as soluonggui,sum(slx) as soluongxuat,sum(slton) as soluongton,mkhang,mhangdhbID FROM lxg,dmspham WHERE dmspham.maso = lxg.maso GROUP BY dmspham.maso,mkhang,tensp,mhangdhbID";
$db->querySql($query);
$lxg = $db->fetchToArray();

?>
<form action = "" method = "POST">
<table id = "lxgtab" class="table">
			<?php
			$fisrt = true;
				foreach($lxg as $index =>$value){
				if($fisrt){	
			?>
								
					<thead id = "lxg"><tr>
					<?php 
					
						foreach($value as $key =>$invalue){ 
						echo '<th>'.$key.'</th>';
						}
					?>
					<tr>
					<th><input /></th>
					<th><input /></th>
					<th><input /></th>
					<th><input /></th>
					<th><input /></th>
					<th><input /></th>
				
					</tr>
					</tr>
					</thead>
					
			<?php 
			$fisrt = false; 
			
			} 
			?>
	
					<tbody><tr>
					<?php  
						foreach($value as $key =>$invalue){
						$str = (is_object($invalue) && get_class($invalue) == "DateTime") ? $invalue->format('Y-m-d') : $invalue;
						echo '<td>'.$str.'</td>';
						if($key == 'mkhang'){ $mkhang = $str; }
						if($key == 'maso'){ $maso = $str ;}
						if($key == 'tensp'){ $tenhg = $str ;}
						if($key == 'mhangdhbID'){ $mhangdhbID = $str; }
						}
						echo '<td><input type = "button" onclick="
						document.getElementById(\'madh\').value=\''.$mhangdhbID.'\';
						document.getElementById(\'makh\').value=\''.$mkhang.'\';
						document.getElementById(\'masp\').value=\''.$maso.'\';
						document.getElementById(\'tenhg\').value=\''.$tenhg.'\';" value = "CHỌN"></td>';						
					?>
					</tr></tbody>
					
		<?php	} ?>
	  
</table>
</form>
<script type = "text/javascript">
	
var timeout = 0,
    columns = {};

function doFilter(that) {
    var column = columns[that.column],
        filter = that.value.toUpperCase(),
        i = column.length - 1;
    while (i > -1) {
        var display = 'none';
        if (column[i].text.indexOf(filter) > -1) {
            display = '';
        }

        column[i].el.parentNode.style.display = display;
        i--;
    }
}

$('#lxgtab input').each(function () {
    var index = $(this).parent().prevAll().length + 1;

    this.column = index;
    columns[index] = [];
    $('#lxgtab td:nth-child(' + index + ')').each(function () {
        columns[index].push({
            text: this.innerHTML.toUpperCase(),
            el: this
        });
    });

}).on('keyup', function (){
    var that = this;
    clearTimeout(timeout);
    timeout = setTimeout(function () {
        doFilter(that);
    }, 500);
});

	function validate(){
		if($("#soluong").val() == "") {
			alert("Chưa nhập số lượng");
			return false;
		}
</script>