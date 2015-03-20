deleteMaterial = function (element) {
var parent = element.parentNode.parentNode.getElementsByTagName("TD");

for (var i = 0; i < parent.length; i++)
	if (parent[i].attributes.name.value === "ID") {
		var orderID = parent[i].innerHTML;
		break;
	};

var data = {
					"callAjax": "deleteDatabase.php",
					"table": "materialOrder",
					"column": "ID",
					"value": orderID 
				};

			ajax("server/server.php", "", "", data, false, false);
			
};