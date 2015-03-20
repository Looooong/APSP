<?php 
	function getMenu($ch) {
	global $db;
	static $level = 0;
	
	$query = "SELECT menuID, idSTT, name, en, vi, ch, level, code FROM menus WHERE substring(code, 1, ".$level.") = '".$ch."' AND len(code) = ".($level + 1);
	$db->querySql($query);
	
	$result = $db->fetchToArray();
	
	foreach ($result as $index => $data) {
		$level++;
		$result[$index]["child"] = getMenu(trim($result[$index]['code']));
		$level--;
	};
	
	return $result;
};

function printMenu($element) {
	static $level = 0;
	
	foreach($element as $data) {
		
		echo "<tr name='".$data['menuID']."' class='gradeX'>
					<td width='40px;'>
						".$data['idSTT']."
					</td>
					<td>
						".$data['name']."
					</td>
					<td>
						".$data['en']."
					</td>
					<td>
						".$data['vi']."
					</td>
					<td>
						".$data['ch']."
					</td>
					<td>
						".$data['level']."
					</td>
					<td>
						".$data['code']."
					</td>	
				</tr>";
				
		$level++;
		printMenu($data["child"]);
		$level--;
	};
	
	
};

$menu = getMenu("");
?>
         <table  id="table-example" class="table">
            <thead>
                <tr>
                  <th style="width:40px"><?=$lang->get('soThuTu')?></th>
                    <th><?=$lang->get('keyWord')?></th>
                    <th><?=$lang->get('en')?></th>
                    <th><?=$lang->get('vi')?></th>
                    <th><?=$lang->get('ch')?></th>
                    <th><?=$lang->get('level')?></th>
                    <th><?=$lang->get('ma')?></th>
                </tr>
            </thead>
            <tbody>
            <?php
                printMenu($menu);
            ?>
            </tbody>
        </table>