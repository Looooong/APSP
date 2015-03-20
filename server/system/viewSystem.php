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
		switch ($level) {
			case 0:
				$class = "level0 required text";
			break;
			case 1:
				$class = "level1 required text";
			break;
			case 2:
				$class = "level2 required text";
			break;
		};
		
		echo "<tr name='".$data['menuID']."' class='gradeX' onclick='callEditSystem(this)'>
					<td class='$class' name='idSTT' width='40px;'>".$data['idSTT']."</td>
					<td class='$class' name='name'>".$data['name']."</td>
					<td class='$class' name='en'>".$data['en']."</td>
					<td class='$class' name='vi'>".$data['vi']."</td>
					<td class='$class' name='ch'>".$data['ch']."</td>
					<td class='$class' name='code' style='width:40px'>".trim($data['code'])."</td>
				</tr>";
				
		$level++;
		printMenu($data["child"]);
		$level--;
	};
	
	
};

$menu = getMenu("");
?>
<style>
.table tbody td.level0 { background:#FFE7D7}
.table tbody td.level1 {
	padding-left:10px !important; background:#FDEFE5
}
.table tbody td.level2 {
	padding-left:20px !important ; background:#FFF5EF
}
#exportData { display:none}
</style>

<div class="block-border">
	<div class="block-header">
		<h1 id="title"><?=$lang->get('heThong')?></h1><span></span>
	</div>
	<div class="block-content">
        <form name="systemEdit" action="javascript: void(0)" id="table-example" class="table block-content form">
        
        <div class="block-actions">
				<ul  class="actions-left">
                	<li><input type="button" class="button" value="<?=$lang->get("them", "heThong")?>" onclick="callAddSystem()" /></li>
                   	<li><input type="button" class="button" value="<?=$lang->get('in', 'trang')?>" onClick="prepareToExport('menus', '<?=$lang->lang?>'); printContent('exportData');" /></li>
                    <li><input type="button" class="button" value="<?=$lang->get('xuat')?>" onClick="prepareToExport('menus', '<?=$lang->lang?>'); contentToExcel('exportData');" /></li>
                    <li><a class="button "  href="index.php?options=upload" rel=""><?=$lang->get('tailen')?></a></li>
                   

				</ul>
              <ul  class="actions-right">
					<li><a class="button red" onclick="document.getElementById('response').innerHTML='';"><?=$lang->get('quayVe')?></a></li>
				</ul>
			</div>
        
                <div class="clear"></div>

         <div  style="overflow:auto; background:#F2F2F2; height:550px; width:100%;">
        <table style=" font-size:12PX;"  id="table-example" class="table">
            <thead>
                <tr>
                  <th style="width:40px"><?=$lang->get('soThuTu')?></th>
                    <th><?=$lang->get('keyWord')?></th>
                    <th><?=$lang->get('en')?></th>
                    <th><?=$lang->get('vi')?></th>
                    <th><?=$lang->get('ch')?></th>
                    <th style="width:40px"><?=$lang->get('ma')?></th>
                </tr>
            </thead>
            <tbody>
            <?php
                printMenu($menu);
            ?>
            </tbody>
        </table>
        </div>
        	<div class="block-actions">
				<ul  class="actions-left">
                	<li><input type="button" class="button" value="<?=$lang->get("them", "heThong")?>" onclick="callAddSystem()" /></li>
                    <li><input type="button" class="button" value="<?=$lang->get('in', 'trang')?>" onClick="prepareToExport('menus', '<?=$lang->lang?>'); printContent('exportData');" /></li>
                    <li><input type="button" class="button" value="<?=$lang->get('xuat')?>" onClick="prepareToExport('menus', '<?=$lang->lang?>'); contentToExcel('exportData');" /></li>
                    <li><a class="button "  href="index.php?options=upload" rel=""><?=$lang->get('tailen')?></a></li>

				</ul>
              <ul  class="actions-right">
					<li><a class="button red" onclick="document.getElementById('response').innerHTML='';"><?=$lang->get('quayVe')?></a></li>
				</ul>
			</div>
        </form>
	</div>
</div>
???PHPTOSCRIPT???
<?php include "viewSystem.js"; ?>