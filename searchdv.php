<head>
<title>Add row</title>
<script src="inc/cookie.class.js"></script>
</head>
<script src="js/jquery-new.js"></script>
<meta charset = "utf-8">
<script language="javascript" type="text/javascript">
function returnValue(element) {
	var obj = window.dialogArguments;
	var parent = element.parentNode;
	for (var i = 0; i < parent.getElementsByTagName("TD").length; i++) {
		if (parent.getElementsByTagName("TD")[i].attributes.name && parent.getElementsByTagName("TD")[i] !== element) {
			obj[parent.getElementsByTagName("TD")[i].attributes.name.value] = parent.getElementsByTagName("TD")[i].innerHTML;
		};
	};
	
	for (i = 0; i < parent.getElementsByTagName("INPUT").length; i++) {
		if (parent.getElementsByTagName("INPUT")[i].checked) {
			obj[parent.getElementsByTagName("INPUT")[i].parentNode.attributes.name.value] = parent.getElementsByTagName("INPUT")[i].parentNode.innerText;
			break;
		};
	};
	
	window.close();
};

function setDefault(element) {
	var parent = element.parentNode.parentNode.parentNode;
	
	for (var i = 0; i < parent.getElementsByTagName("INPUT").length; i++) {
		if (parent.getElementsByTagName("INPUT")[i].id == element.id)
			parent.getElementsByTagName("INPUT")[i].checked =true;
	};
	
	createCookie("dmspham", element.id, 365); 
	return false;
};
</script>
<?php
require_once 'inc/database.class.php';
require_once 'inc/config.php';
require_once "inc/languages.class.php";

session_start();
$lang= new languages;
$query = "SELECT * FROM dmspham";
$db->querySql($query);
if($db->numrows()>0){
	$arrQua = $db->fetchToArray();
	echo '<table id = "filterTable5" align="center" border = "1" cellspacing="0">';
	echo '<thead><tr>
	<th>'.$lang->get('maso').'</th> 
	<th>'.$lang->get('ten').'</th>  
	<th>'.$lang->get('dvtinh').'</th>  
	<th>'.$lang->get('dgia').'</th>
	<th>'.$lang->get('dgia').'</th>
	<th>'.$lang->get('dgia').'</th>
	<th>'.$lang->get('dgia').'</th>
	<th>'.$lang->get('dgia').'</th>
	</tr><tr>
	<th><input style = "width:60px" /></th> 
	<th><input style = "width:120px"/></th> 
	<th><input style = "width:60px"/></th>  
	<th><input style = "width:60px" /></th>  
	<th><input style = "width:60px"/></th>  
	<th><input style = "width:60px" /></th>  
	<th><input style = "width:60px"/></th>  
	<th><input style = "width:60px"/></th>  
	</tr><thead><tbody>';
	foreach ($arrQua as $Qua){
		echo '<tr id="'.$Qua['sphamID'].'">';
		echo '<td name="maso">'.$Qua['maso'].'</td>';
		echo '<td name="tensp">'.$Qua['tensp'].'</td>';
		echo '<td name="dvtinh">'.$Qua['dvtinh'].'</td>';
		echo '<td name="dgia"><input onclick="setDefault(this)" type="radio" id="0" name="dgia'.$Qua['sphamID'].'" '.((isset($_COOKIE['dmspham']) && $_COOKIE['dmspham'] == 0) ? 'checked="true"' : '').'>'.$Qua['dgia'].'</input></td>';
		echo '<td name="dgia"><input onclick="setDefault(this)" type="radio" id="1" name="dgia'.$Qua['sphamID'].'" '.((isset($_COOKIE['dmspham']) && $_COOKIE['dmspham'] == 1) ? 'checked="true"' : '').'>'.$Qua['dgia_1'].'</input></td>';
		echo '<td name="dgia"><input onclick="setDefault(this)" type="radio" id="2" name="dgia'.$Qua['sphamID'].'" '.((isset($_COOKIE['dmspham']) && $_COOKIE['dmspham'] == 2) ? 'checked="true"' : '').'>'.$Qua['dgia_2'].'</input></td>';
		echo '<td name="dgia"><input onclick="setDefault(this)" type="radio" id="3" name="dgia'.$Qua['sphamID'].'" '.((isset($_COOKIE['dmspham']) && $_COOKIE['dmspham'] == 3) ? 'checked="true"' : '').'>'.$Qua['dgia_3'].'</input></td>';
		echo '<td name="dgia"><input onclick="setDefault(this)" type="radio" id="4" name="dgia'.$Qua['sphamID'].'" '.((isset($_COOKIE['dmspham']) && $_COOKIE['dmspham'] == 4) ? 'checked="true"' : '').'>'.$Qua['dgia_4'].'</input></td>';
		echo '<td onclick="returnValue(this)">Chọn</td>';
		echo '</tr>';
	}
	echo '</tbody></table>';
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
