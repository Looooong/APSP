updateSystem = function() {
	var data = {
		"callAjax": "systemEdit.php",
		"sysEdit": 1,
		"column": "name",
		"row": document.getElementById("menuID").value,
		"value": document.getElementById("name").value
	};
		
	ajax("server/server.php", "", "", data, false, false);
		
	var data = {
		"callAjax": "systemEdit.php",
		"sysEdit": 1,
		"column": "en",
		"row": document.getElementById("menuID").value,
		"value": document.getElementById("en").value
	};
		
	ajax("server/server.php", "", "", data, false, false);

	var data = {
		"callAjax": "systemEdit.php",
		"sysEdit": 1,
		"column": "vi",
		"row": document.getElementById("menuID").value,
		"value": document.getElementById("vi").value
	};
		
	ajax("server/server.php", "", "", data, false, false);

	var data = {
		"callAjax": "systemEdit.php",
		"sysEdit": 1,
		"column": "ch",
		"row": document.getElementById("menuID").value,
		"value": document.getElementById("ch").value
	};
		
	ajax("server/server.php", "", "", data, false, false);

	callSystemEdit();
};

deleteSystem = function() {
	if (confirm("<?=$lang->get('assureConfirm')?>")) {
		var menuData = document.createElement("div");
		menuData.setAttribute("style", "display:none");
		menuData.setAttribute("id", "menuData");

		document.getElementById("menuID").appendChild(menuData);

		var data = {
			"callAjax": "getMenu.php",
			"lang": "<?=$lang->lang?>",
			"level": document.getElementById("code").value.length,
			"code": document.getElementById("code").value
		};

		ajax("server/server.php", "menuData", "", data, false, false);

		var str = document.getElementById("menuData").innerHTML;

		if (str.length != 0) alert("Error!");
		else {
			var data = {
					"callAjax": "deleteDatabase.php",
					"table": "menus",
					"column": "menuID",
					"value": document.getElementById("menuID").value
				};

			ajax("server/server.php", "", "", data, false, false);

			callSystemEdit();
		};
	};
}