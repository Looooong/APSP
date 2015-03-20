<?php
include "inc/database.class.php";
require_once "inc/config.php";
session_start();
if(isset($_SESSION['tab'])){
if(isset($_POST['Import']) )
{

$table = $_SESSION['tab'];
$fname = $_FILES['sel_file']['name'];
$chk_ext = explode(".",$fname);
if(strtolower($chk_ext[1]) == "csv")
{
$filename = $_FILES['sel_file']['tmp_name'];
$handle = fopen($filename, "r");

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
{
			$str_3 = array_map('mysql_real_escape_string', $data);
			$_str = "";
				foreach($str_3 as $col){
					if(is_numeric($col)) $_str .= $col.",";
					else $_str .= "N'".$col."',";
				}
			$str = substr($_str,0,strlen($_str)-1);
            $query = "INSERT into $table values($str)";
            $db->querySql($query);
			echo $query;
}
fclose($handle);
echo "Successfully Imported";
}
else
{
echo "Invalid File";
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Import CSV/Excel file</title>
</head>
<body>
<form action='<?php echo $_SERVER["PHP_SELF"];?>' method="post" accept-charset="UTF-8" enctype="multipart/form-data">
<table border="1" width="40%" align="center">
<tr>
<td colspan="2" align="center"><strong>Nạp File CSV/Excel file</strong></td>
</tr>

<tr>
<td align="center">CSV/Excel File:</td><td><input type="file" name="sel_file" id="sel_file"></td></tr>
<tr >
<td colspan="2" align="center"><input type="submit" name="Import" value="Nạp vào"></td>
</tr>
</table>
</form>
</body>
</html>

