<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<img width="100" height="100" title="1" />
<div id="nav" style="position:fixed; top:0px; left:0px; width:100px; height:100px; background:#00BCFF"></div>
<table border="1">
<?php
	for ($i = 0; $i < 10; $i++) {
		echo "<tr>";
		for ($j = 0; $j < 10; $j++) {
			echo "<td title='$i, $j'>ABC</td>";
		};
		echo "</tr>";
	};
?>
</table>
<script>
window.onmousemove = function (e) {
	e = e || window.event;
	posX = e.clientX;
	posY = e.clientY;
	document.getElementById("nav").style.top = posY + "px";
	document.getElementById("nav").style.left = posX + "px";
};
</script>
</body>
</html>