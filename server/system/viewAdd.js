addSystem = function() {
	if (document.getElementById("addName").value.length != 0) {
		var data = {"callAjax": "insertDatabase.php",
					"table": "menus",
					"column": [],
					"value": []
					};
					
		data.column.push("idSTT");
		data.value.push(document.getElementById("addSTT").value);
		data.column.push("name");
		data.value.push(document.getElementById("addName").value);
		data.column.push("en");
		data.value.push(document.getElementById("addEn").value);
		data.column.push("vi");
		data.value.push(document.getElementById("addVi").value);
		data.column.push("ch");
		data.value.push(document.getElementById("addCh").value);
		data.column.push("code");
		data.value.push(document.getElementById("newCode").value);
		
		ajax("server/server.php", "", "", data, false, true);
		
		ajax("server/server.php", "response", loaderBig, {"callAjax": "systemEdit.php", "lang": "<?=$lang->lang?>"}, true, true);
	} else alert("<?=$lang->get('errorBlankKeyLang')?>");
};

addCode = [];
chooseNode = function(level) {
	if (level > 0 && document.getElementById("parent" + (level - 1)).value == addCode[level - 1]) {
		if (level < 2) document.getElementById("level" + level).innerHTML = "";
		document.getElementById("newCode").value = addCode[level - 1];
	} else {
		var code = (level > 0) ? document.getElementById("parent" + (level - 1)).value : "";
		var data = {
			"callAjax": "getMenu.php",
			"lang": "<?=$lang->lang?>",
			"level": level,
			"code": code
		};

		ajax("server/server.php", "menuData", "", data, false, false);

		var str = document.getElementById("menuData").innerHTML;
		str = str.split("|");
		var inner = "";
		var char;
		newParent = code + ((code.length < 2) ? "A" : "1");
		
		for (var i = 0; i < str.length; i++) {
			char = str[i].split("=");
			newParent = (char[1] && (char[1][level] == newParent[level])) ? code + String.fromCharCode(newParent.charCodeAt(level) + 1) : newParent;
			inner += "<option value='" + char[1] + "'>" + "<?=$lang->get('heThongCon', 'cua')?>: " + char[0] + "</option>";
		};
		var heThong = "<?= $lang->get('heThong');?>";
		var heThongCon = "<?= $lang->get('heThongCon');?>";
		var front = "<select id='parent" + level + "' onchange='chooseNode(" + (level + 1) + ")'><option value='" + newParent + "' selected" + ">" + ((level == 0) ? heThong : heThongCon) + "</option>";
		inner = front + inner + "</select>";
		if (level < 2) document.getElementById("level" + level).innerHTML = inner;
		document.getElementById("newCode").value = newParent;
		addCode[level] = newParent;
	};
};

chooseNode(0);