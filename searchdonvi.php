<script src="js/jquery-new.js"></script>
<meta charset = "utf-8">
<?php
require_once 'inc/database.class.php';
require_once 'inc/config.php';
require_once "inc/languages.class.php";

session_start();
$lang= new languages;
$query = "SELECT * FROM donvi";
$db->querySql($query);
if($db->numrows()>0){
	$arrQua = $db->fetchToArray();
	echo '<table id = "filterTable5" align="center" border = "1" cellspacing="0">';
	echo '<thead><tr><th>'.$lang->get('mkhang').'</th> 
	<th>'.$lang->get('ten').'</th> 
	<th>'.$lang->get('dchi').'</th>  
	<th>'.$lang->get('dthoai').'</th>  
	<th>'.$lang->get('msthue').'</th>
	<th>'.$lang->get('nphutrach').'</th>
	<th>'.$lang->get('ngiamsat').'</th>	
	</tr><tr>
	<th><input /></th> 
	<th><input /></th> 
	<th><input /></th>  
	<th><input /></th>  
	<th><input /></th>
	<th><input /></th>
	<th><input /></th>	
	</tr><thead>';
	foreach ($arrQua as $Qua){
		echo '<tbody><tr>';
		echo '<td>'.$Qua['mkhang'].'</td>';
		echo '<td>'.$Qua['ten'].'</td>';
		echo '<td>'.$Qua['dchi'].'</td>';
		echo '<td>'.$Qua['dthoai'].'</td>';
		echo '<td>'.$Qua['msthue'].'</td>';
		echo '<td>'.$Qua['nphutrach'].'</td>';
		echo '<td>'.$Qua['ngiamsat'].'</td>';		
		echo '<td><button onclick="javascript:window.opener.document.getElementById(\'mkhang\').value=\''.$Qua['mkhang'].'\';
		javascript:window.opener.document.getElementById(\'tenkh\').value=\''.$Qua['ten'].'\';
javascript:window.opener.document.getElementById(\'dchi\').value=\''.$Qua['dchi'].'\';
javascript:window.opener.document.getElementById(\'dthoai\').value=\''.$Qua['dthoai'].'\';
javascript:window.opener.document.getElementById(\'msthue\').value=\''.$Qua['msthue'].'\';
javascript:window.opener.document.getElementById(\'nphutrach\').value=\''.$Qua['nphutrach'].'\';
javascript:window.opener.document.getElementById(\'ngiamsat\').value=\''.$Qua['ngiamsat'].'\';
window.close();"> Chọn </button></td>';
		echo '</tr></tbody>';
	}
	echo '</table>';
}else{
	echo 'Không tìm thấy trong kho quà tặng có tên tương tự';
}
?><script type = "text/javascript">
	
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

$('input').each(function () {
    var index = $(this).parent().prevAll().length + 1;

    this.column = index;
    columns[index] = [];
    $('td:nth-child(' + index + ')').each(function () {
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

		</script>
