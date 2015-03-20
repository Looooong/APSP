<script language="javascript" type="text/javascript" >
	function getMenuForm(ID) {
		var data = {"callAjax": "menuForm.php", "id": ID};
		ajax("server/server.php", "response", loaderBig, data);	
	};
</script>
<?php 
	echo '<ul class="menu collapsible shadow-bottom" >';
		getSubCategory("");
	 	echo'<li><a style="font-weight:bold" href="index.php?options=logout"><img src="src/img/icons/packs/fugue/16x16/application-dock-180.png">'.$lang->get('dangXuat').'</a></li>';
		echo '</ul>';
	
    function getSubcategory($ch){
		global $db, $lang;
		$userID = $_SESSION['user']['userID'];
		static $level = 0;
		if ($_SESSION['user']['name'] == "ADMIN")
			$query = "SELECT * FROM menus, permission WHERE permission.menuID = menus.menuID AND substring(code, 1, ".$level.") = '".$ch."' AND len(code) = ".($level + 1)." AND userID = $userID";
		else
        	$query = "SELECT * FROM menus, permission WHERE permission.menuID = menus.menuID AND substring(code, 1, ".$level.") = '".$ch."' AND len(code) = ".($level + 1)." AND userID = $userID AND status = 0 ";
		$db->querySql($query);
		$arr = $db->fetchToArray();
		
		if ($level == 2) echo '<ul class="sub">';
		
        foreach ($arr as $row){
			
			switch ($level) {
				case 0:
					$preTagLi = '<li><a style="font-weight:bold" onclick="getMenuForm('.$row['menuID'].')" class="current"><img src="src/img/icons/packs/fugue/16x16/animal-monkey.png">';
					$postTagLi = '</a></li>';
				break;
			
				case 1:
					$preTagLi = '<li><a class="bg_menu" href="#""><img src="src/img/icons/packs/fugue/16x16/application-monitor.png">';
					$postTagLi = '</a>';
				break;
				
				case 2:
					$preTagLi ='<li><a href="index.php?options='.$row['nametab'].'&name='.$row['reltab'].'">';
					$postTagLi = '</a></li></li>';
				break;
				
				default:
					$preTagLi = '';
					$postTagLi = '';
			};
            echo $preTagLi.$row[$lang->lang].$postTagLi;
			
			$level++;
            getSubcategory(substr($row['code'], 0, $level));
			$level--;
        }	
		if ($level == 2) echo '</ul>';
	}

	?>