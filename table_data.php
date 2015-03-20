
<?php
$query = "SELECT * FROM (SELECT ROW_NUMBER() OVER (ORDER BY menuID) RowNum,* FROM menus) AS a WHERE RowNum > $start AND RowNum < $cur_page * $per_page";
$db->querySql($query);
//echo $query;exit;
$finaldata = "";
$finaldata .= '<thead>';
$finaldata .= '<tr>';
$finaldata .= '<th>'.$lang->get('keyWord').'</th>';
$finaldata .= '<th>'.$lang->get('en').'</th>';
$finaldata .= '<th>'.$lang->get('vi').'</th>';
$finaldata .= '<th>'.$lang->get('ch').'</th>';
$finaldata .= '<th>'.$lang->get('level').'</th>';
$finaldata .= '</tr>';
$finaldata .= '</thead>';
		

while ($row = $db->fetchArray()) {
	    $finaldata .= "<tr  rel =" . $row['menuID'] . ">";

    $finaldata .= "<th>" . $row['name'] . "</th>";
	 $finaldata .= "<th>" . $row['en'] . "</th>";
	  $finaldata .= "<th>" . $row['vi'] . "</th>";
	  	  $finaldata .= "<th>" . $row['ch'] . "</th>";

	   $finaldata .= "<th><b>" . $row['level'] ."</th>";
	    $finaldata .= "</tr>";
}
$finaldata = "	<table style='font-size:12px;' id='filterTable1' class='table'>".$finaldata. "</table>"; 

$query = "SELECT COUNT(*) AS count FROM menus";
$db->querySql($query);
$row = $db->fetchArray();
$count = $row['count'];
$no_of_paginations = ceil($count / $per_page);
?>