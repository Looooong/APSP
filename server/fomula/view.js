callEdit = function (ID) {
	var data = {
		callAjax: "fomula/edit.php",
		ID: ID
	};
	
	ajax("server/server.php", "fomula", loaderBig, data, false, true);
};