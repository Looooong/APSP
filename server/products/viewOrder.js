//--------------------------------- PRODUCT -------------------------------
if (!orderID) {
product = document.getElementById("orderProduct");
timeOutID = null;

product.onfocus = function (e) {
	if (product.value) {
		document.getElementById("products").style.display = "";
	};
};

product.onblur = function (e) {
	timeOutID = setTimeout(function () {document.getElementById("products").style.display = "none"}, 500);
};

product.oninput = function (e) {
	if (!product.value) {
		document.getElementById("products").style.display = "none";
	} else {
		product.attributes.name.value = "";
		var prod = document.getElementById("products").getElementsByTagName("div");
		var name = product.value.replace(/[\-\[\]\/\\\{\}\(\)\*\+\?\^\$\|]/g, "\\$&").replace(/\s+/g, ")(?=.*");
		name = new RegExp("(?=.*" + name + ")", "i");

		for (var i = 0; i < prod.length; i++) {
			if (prod[i].innerHTML.search(name) !== -1)
				prod[i].style.display = "";
			else
				prod[i].style.display = "none";
		};
		
		if (timeOutID)
			clearTimeout(timeOutID);
		document.getElementById("products").style.display = "";
	};
};

selectProduct = function (element) {
	product.attributes.name.value = element.attributes.name.value;
	product.value = element.innerHTML;
	product.disabled = true;
	document.getElementById("package").disabled = true;
	document.getElementById("orderSubmit").disabled = false;
	
	var data = {
		callAjax: "products/materials.php",
		id: element.attributes.name.value
	};
	ajax("server/server.php", "fomulaMaterials", "", data, false, false);
	
	var data2 = {
		callAjax: "products/packages.php",
		id: element.attributes.name.value
	};
	ajax("server/server.php", "fomulaPackages", "", data2, false, false);
};

deleteProduct = function (element) {
	product.value = "";
	product.attributes.name.value = "";
	product.disabled = false;
	document.getElementById("package").disabled = false;
	document.getElementById("orderSubmit").disabled = true;
	
	document.getElementById("fomulaMaterials").innerHTML = '';
	document.getElementById("incurMaterials").innerHTML = '';
	document.getElementById("fomulaPackages").innerHTML = '';
	document.getElementById("incurPackages").innerHTML = '';
};

selectPackage = function () {
	var pack = document.getElementById("package").value;
	
	var data = {
		callAjax: "products/pack.php",
		pack: pack
	};
	
	ajax("server/server.php", "products", "", data, false, false);
};
selectPackage();
document.getElementById("products").style.maxHeight = product.clientHeight*15 + "px";
product.style.width = document.getElementById("products").clientWidth + "px";
document.getElementById("products").style.display = "none";
};

numberInput = function (element) {
	element.value = element.value.replace(/[^0-9\.]/g,"");
};
numberOnblur = function (element, def) {
	if (!element.value) {
		def = (def) ? def : 1;
		element.value = def;
	};
};

fill = function (value) {
	return (value < 10) ? "0" + value : value;
};

changeStatus = function (element) {
	var status = parseInt(element.value);
	var orderFinish = document.getElementById("orderFinish");
	
	if (status) {
		orderFinish.disabled = false;
		var now = new Date();
		orderFinish.value = (orderFinish.value) ? orderFinish.value : fill(now.getDate()) + "/" + fill(now.getMonth() + 1) + "/" + now.getFullYear();
	} else {
		orderFinish.disabled = true;
	};
};

newLine = function (name) {
	var clone = document.getElementById("new" + name).cloneNode(true);
	clone.id = null;
	clone.style.display = "";
	
	document.getElementById("incur" + name).appendChild(clone);
};

orderSubmit = function () {
	var child;
	
	if (!orderID) {
		var data = {
			callAjax: 'products/orderUpdate.php',
			method: 'create',
			productID: document.getElementById("orderProduct").attributes.name.value,
			fomulaMaterials: [],
			fomulaPackages: []
		};
	
		var fomulaMaterials = document.getElementById("fomulaMaterials").getElementsByTagName("tr");
		for (var i = 0; i < fomulaMaterials.length; i++) {
			child = fomulaMaterials[i].getElementsByTagName("td");
			
			for (var j = 0; j < child.length; j++) {
				if (child[j].attributes.name && child[j].attributes.name.value === "kg") {
					data.fomulaMaterials.push({ID: fomulaMaterials[i].attributes.name.value,
												kg: child[j].innerHTML.replace(/,/g, "")});
					break;
				};
			};
		};
		
		var fomulaPackages = document.getElementById("fomulaPackages").getElementsByTagName("tr");
		for (var i = 0; i < fomulaPackages.length; i++) {
			child = fomulaPackages[i].getElementsByTagName("td");
			
			for (var j = 0; j < child.length; j++) {
				if (child[j].attributes.name && child[j].attributes.name.value === "quantity") {
					data.fomulaPackages.push({ID: fomulaPackages[i].attributes.name.value,
												quantity: child[j].innerHTML.replace(/,/g, "")});
					break;
				};
			};
		};
	} else
		var data = {
			callAjax: 'products/orderUpdate.php',
			method: 'update',
			orderID: orderID
		};
	
	data.date = document.getElementById('orderDate').value;
	data.start = document.getElementById('orderStart').value;
	data.finish = document.getElementById('orderFinish').value;
	data.status = document.getElementById('orderStatus').value;
	data.sample = document.getElementById('orderSample').value;
	
	data.incurMaterials = [];
	data.incurPackages = [];
	
	var incurMaterials = document.getElementById("incurMaterials").getElementsByTagName("tr");
	for (var i = 0; i < incurMaterials.length - 1; i++) {
		child = incurMaterials[i].getElementsByTagName("input");
		
		for (var j = 0; j < child.length; j++) {
			if (child[j].attributes.name && child[j].attributes.name.value === "incurMaterialKg") {
				data.incurMaterials.push({materialID: incurMaterials[i].attributes.name.value,
											kg: child[j].value.replace(/,/g, "")});
			};
		};
	};
	
	var incurPackages = document.getElementById("incurPackages").getElementsByTagName("tr");
	for (var i = 0; i < incurPackages.length - 1; i++) {
		child = incurPackages[i].getElementsByTagName("input");
		
		for (var j = 0; j < child.length; j++) {
			if (child[j].attributes.name && child[j].attributes.name.value === "incurPackageQuantity") {
				data.incurPackages.push({packID: incurPackages[i].attributes.name.value,
											quantity: child[j].value.replace(/,/g, "")});
			};
		};
	};
	
	ajax("server/server.php", "", "", data, false, true);
};

document.getElementById("bottomPreserve").style.height = document.getElementById("bottomBar").clientHeight;