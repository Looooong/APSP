callView = function () {
	var data = {
		callAjax: "fomula/view.php"
	};
	
	ajax("server/server.php", "fomula", loaderBig, data, false, true);
};

callView();