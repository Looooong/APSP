registerUser = function() {
	var data = {
		"callAjax": "userModify.php",
		"method": "register",
		"username": document.getElementById("username").value,
		"password": document.getElementById("password").value,
		"lang": "<?=$lang->lang?>"
	};

	ajax("server/server.php", "loaderRegister", loaderLine, data, false);
};

modifyUser = function() {
	var data = {
	"callAjax": "userModify.php",
	"method": "change",
	"username": document.getElementById("username").value,
	"newpassword": document.getElementById("newPassword").value,
	"oldpassword": document.getElementById("oldPassword").value,
	"lang": "<?=$lang->lang?>"
	};
	
	ajax("server/server.php", "loaderModify", loaderLine, data, false);
	document.getElementById("newPassword").value = "";
	document.getElementById("oldPassword").value = "";
};
	
deleteUser = function() {
	if (confirm("<?=$lang->get('assureConfirm')?>")) {
		var optionUser = document.getElementById("userBox");
		var selectedUsername = optionUser.options[optionUser.selectedIndex].text;
		
		ajax("server/server.php", "", "", {"callAjax": "deleteDatabase.php", "table": "users", "column": "name", "value": selectedUsername, "lang": "<?=$lang->lang?>"}, false, false);
		callUserSetting();
	};
};