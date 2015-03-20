orderID = <?=$_REQUEST['ID']?>;

updateOrder = function (element) {	
	
	var data = {
		callAjax:"updateDatabase.php",
		table:"materialOrder",
		column:"date",
		value: document.getElementById("importDate").value,
		matchColumn:"ID",
		matchValue: orderID
	};
	
	ajax("server/server.php", "", "", data, false, false);
	
	data = {
		callAjax:"updateDatabase.php",
		table:"materialOrder",
		column:"finish",
		value: document.getElementById("importFinish").value,
		matchColumn:"ID",
		matchValue: orderID
	};
	
	ajax("server/server.php", "", "", data, false, false);
	
	data = {
		callAjax:"updateDatabase.php",
		table:"materialOrder",
		column:"status",
		value: document.getElementById("importStatus").value,
		matchColumn:"ID",
		matchValue: orderID
	};
	
	ajax("server/server.php", "", "", data, false, false);
	
	var material = document.getElementById("updateMaterial").getElementsByTagName("TR");
	data = {
		callAjax: "materials/updateDatabase.php",
		orderID: orderID
	};
	
	for (var i = 0; i < material.length; i++) {
		log(material[i]);
		data.materialID = material[i].id.split("del")[1];
		var child = material[i].getElementsByTagName("input");
		
		for (var j = 0; j < child.length; j++) {
			data.column = child[j].attributes.name.value;
			data.value = child[j].value;
			
			ajax("server/server.php", "", "", data, false, false);
		};
	};
	
	callOrder();
	document.getElementById("createForm").innerHTML = "";
};