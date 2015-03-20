$("#tab-panel").createTabs();

updateAuthorize = function() {
	var permission = document.getElementsByName("permission");

	for (var i = 0; i < permission.length; i++) {
		ajax("server/server.php", "loaderRegister", loaderLoginBlue, {"callAjax": "updateDatabase.php", "table": "permission", "matchColumn": "perID", "matchValue": permission[i].getAttribute("id").split("_")[1], "column": "status", "value": ((permission[i].checked) ? "0" : "1")}, false, true);
	};
};