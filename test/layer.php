<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.div1 {
	position:relative;
	z-index:2;
	top:0px;
	left:0px;
	height:100px;
	width:100px;
	background-color:blue	
}

.div2 {
	position:relative;
	z-index:1;
	top: -50px;
	left: 50px;
	height: 100px;
	width: 100px;
	background-color:green
}

.div3 {
	position:absolute;
	top: -200px;
	left: 200px
}
</style>
</head>

<body>
<div class="div3">
<div class="div1">
</div>
<div class="div2">
</div>
</div>
</body>
</html>