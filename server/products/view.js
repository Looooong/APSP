callView = function () {
	var data = {
		callAjax:"products/product.php"
	};
	
	ajax("server/server.php", "stock", "", data, false, false);
};

updateCurStock = function (element) {
	var curStock = element.parentNode.parentNode.parentNode.getElementsByTagName("input")[0].value;	
	
	var data = {
		callAjax:"updateDatabase.php",
		table:"storage_stock",
		column:"curStock",
		value:curStock,
		matchColumn:"ID",
		matchValue:element.parentNode.parentNode.parentNode.id.split("m")[1]
	};
	
	ajax("server/server.php", "", "", data, false, false);
	
	callView();
};

callOrder = function () {
	var data = {
		callAjax: "products/order.php",
		type: 0
	};
	
	ajax("server/server.php", "orders", "", data, false, false);
	
	data.callAjax = "products/order.php";
	data.type = 1;
	ajax("server/server.php", "productOrders", "", data, false, false);
};

callCreate = function () {
	/*var data = {
		callAjax:"products/create.php"
	};
	
	ajax("server/server.php", "createForm", loaderBig, data, false, true);*/
	window.showModalDialog("server.php?callAjax=products/viewOrder.php", Object(), "center: 0; dialogHeight: " + document.body.clientHeight + "; dialogWidth:" + screen.width);
};

callUpdate = function (element) {
	var parent = element.parentNode.parentNode.parentNode.getElementsByTagName("TD");
	for (var i = 0; i < parent.length; i++)
	if (parent[i].attributes.name.value === "ID") {
		var orderID = parent[i].innerHTML;
		break;
	};

	/*var data = {
		callAjax:"products/update.php",
		ID : orderID
	};
	
	ajax("server/server.php", "createForm","", data, false, false);*/
	window.showModalDialog("server.php?callAjax=products/viewOrder.php&orderID=" + orderID, Object(), "center: 0; dialogHeight: " + document.body.clientHeight + "; dialogWidth:" + screen.width);
};

callView_sx = function (element) {
	var parent = element.parentNode.parentNode.parentNode.getElementsByTagName("TD");
	for (var i = 0; i < parent.length; i++)
	if (parent[i].attributes.name.value === "ID") {
		var orderID = parent[i].innerHTML;
		break;
	};

	var data = {
		callAjax:"products/addtablephieu_sx.php",
		ID : orderID
	};
	
	ajax("server/server.php", "createForm","", data, false, false);
};
callPrint_sx = function(ID){
ajax("server/server.php", 'exportData', "", {callAjax: "baocao/lenhsanxuat.php", ID:ID }, false, false);
printContent("exportData");
}
callPrint_bc = function(ID){
ajax("server/server.php", 'exportData', "", {callAjax: "baocao/bcphatrondaunhon.php", ID:ID }, false, false);
printContent("exportData");
}
callPrint_ct = function(ID){
ajax("server/server.php", 'exportData', "", {callAjax: "baocao/congthucphatrondau.php", ID:ID }, false, false);
printContent("exportData");
}
callPrint_pt = function(ID){
ajax("server/server.php", 'exportData', "", {callAjax: "baocao/phieuphatrondaunhon.php", ID:ID }, false, false);
printContent("exportData");
}
callExport = function () {
	var data = {
		callAjax:"products/export.php"
	};
	
	ajax("server/server.php", "createForm", loaderBig, data, false, true);
};

callView();
callOrder();