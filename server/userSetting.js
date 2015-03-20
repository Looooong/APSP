selectUser = function() {
	var optionUser = document.getElementById("userBox");
	var selectedUsername = optionUser.options[optionUser.selectedIndex].text;

	ajax("server/server.php", "responseModify", loaderBig, {"callAjax": "userModify.php", "lang": "<?=$lang->lang?>", "method": "modify", "username": selectedUsername}, false, false);

	var userID = document.getElementById("userBox").value;

	ajax("server/server.php", "responseAuthorize", loaderBig, {"callAjax": "userAuthorize.php", "lang": "<?=$lang->lang?>", "iduser": userID}, false, true);
};

addUser = function() {
	document.getElementById("responseAuthorize").innerHTML = "";

	ajax("server/server.php", "responseModify", loaderBig, {"callAjax": "userModify.php", "lang": "<?=$lang->lang?>", "method": "add"}, false, true);
};