orderID = <?=$_REQUEST['ID']?>;

updateOrder = function (element) {	
	
	var data = {
		callAjax:"updateDatabase.php",
		table:"productOrder",
		column:"date",
		value: document.getElementById("importDate").value,
		matchColumn:"ID",
		matchValue: orderID
	};
	
	ajax("server/server.php", "", "", data, false, false);
	
	data = {
		callAjax:"updateDatabase.php",
		table:"productOrder",
		column:"finish",
		value: document.getElementById("importFinish").value,
		matchColumn:"ID",
		matchValue: orderID
	};
	
	ajax("server/server.php", "", "", data, false, false);
	
	data = {
		callAjax:"updateDatabase.php",
		table:"productOrder",
		column:"status",
		value: document.getElementById("importStatus").value,
		matchColumn:"ID",
		matchValue: orderID
	};
	
	ajax("server/server.php", "", "", data, false, false);
	
	data = {
		callAjax:"updateDatabase.php",
		table:"productOrder",
		column:"quantity",
		value: document.getElementById("importQuantity").value,
		matchColumn:"ID",
		matchValue: orderID
	};
	
	ajax("server/server.php", "", "", data, false, false);
	
	var dmspham = document.getElementById("updateDMspham").getElementsByTagName("TR");
	data = {
		callAjax: "products/updateDatabase.php",
		orderID: orderID
	};
	
	for (var i = 0; i < dmspham.length; i++) {
		log(dmspham[i]);
		data.goodsID = dmspham[i].id.split("del")[1];
		var child = dmspham[i].getElementsByTagName("input");
		
		for (var j = 0; j < child.length; j++) {
			data.column = child[j].attributes.name.value;
			data.value = child[j].value;
			
			ajax("server/server.php", "", "", data, false, false);
		};
	};
	
	callOrder();
	document.getElementById("createForm").innerHTML = "";
};