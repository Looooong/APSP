searchLanguage = function(element) {
	var searchField = document.getElementsByName("searchLang");
	var col = element.getAttribute("id");
	var value = element.value;
		
	for (var i = 0; i < searchField.length; i++)
		if (element !== searchField[i]) searchField[i].value = "";
		
	ajax("server/server.php", "responseLang", "", {"callAjax": "languageSearch.php", "column": col, "value": value}, false, true);
};
	
updateLang = function(element) {
	var id = element.getAttribute("id");
	id = id.split("_");
	var key = document.getElementById("keyLang_" + id[1]).value;
	ajax("server/server.php", "", "", {"callAjax": "updateDatabase.php", "table": "languages", "matchColumn": "keyLang", "matchValue": key, "column": element.getAttribute("name"), "value": element.value}, false, false);
};

addKeyLang = function() {
	var data = {"callAjax": "insertDatabase.php",
				"table": "languages",
				"column": [],
				"value": []
				};
	data.column.push("keyLang");
	data.value.push(document.getElementById("addKey").value);
	data.column.push("en");
	data.value.push(document.getElementById("addEn").value);
	data.column.push("vi");
	data.value.push(document.getElementById("addVi").value);
	data.column.push("ch");
	data.value.push(document.getElementById("addCh").value);
		
	ajax("server/server.php", "notice", "", data, false, false);
		
	callLanguages();
};

deleteKeyLang = function() {
		
	if (confirm("<?=$lang->get('assureConfirm')?>")) {		
		var deleteBox = document.getElementsByName("delete");
		var keyLang = document.getElementsByName("keyLang");
		var str = "<?=$lang->get('xoa', 'thanhCong')?>:\n";

		for (var i = 0; i < deleteBox.length; i++) {
			if (deleteBox[i].checked) {
				key = keyLang[i].value;
				
				ajax("server/server.php", "", "", {"callAjax": "deleteDatabase.php", "table": "languages", "column": "keyLang", "value": key, "lang": "<?=$lang->lang?>"}, false, false);
					
				str += key + "\n";
			};
		};
			
		alert(str);
		callLanguages();
	};
};