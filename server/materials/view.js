callView = function () {
	var data = {
		callAjax:"materials/material.php"
	};
	
	ajax("server/server.php", "stock", "", data, false, false);
};

updateCurStock = function (element) {
	var curStock = element.parentNode.parentNode.parentNode.getElementsByTagName("input")[0].value;	
	
	var data = {
		callAjax:"updateDatabase.php",
		table:"inventory_stock",
		column:"curStock",
		value:curStock,
		matchColumn:"ID",
		matchValue:element.parentNode.parentNode.parentNode.id.split("m")[1]
	};
	
	ajax("server/server.php", "", "", data, false, false);
	
	callView();
};

callPrint_nl = function(ID){
ajax("server/server.php", 'exportData', "", {callAjax: "baocao/phankiemdemnhanhang.php", ID:ID }, false, false);
printContent("exportData");
}

callOrder = function () {
	var data = {
		callAjax: "materials/order.php"
	};
	
	ajax("server/server.php", "orders", "", data, false, false);
};

callCreate = function () {
	var data = {
		callAjax:"materials/create.php"
	};
	
	ajax("server/server.php", "createForm", loaderBig, data, false, true);
};

callUpdate = function (element) {
	var parent = element.parentNode.parentNode.parentNode.getElementsByTagName("TD");
	for (var i = 0; i < parent.length; i++)
	if (parent[i].attributes.name.value === "ID") {
		var orderID = parent[i].innerHTML;
		break;
	};

	var data = {
		callAjax:"materials/update.php",
		ID : orderID
	};
	
	ajax("server/server.php", "createForm","", data, false, false);
};

callView();
callOrder();