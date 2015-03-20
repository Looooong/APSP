//--------------------------------- PRODUCT -------------------------------
product = document.getElementById("product");
fadeTimeOut = null;

product.onfocus = function (e) {
	if (product.value) {
		document.getElementById("prod").style.zIndex = 20;
		fade("prod", 1, 0.5*(1 - document.getElementById("prod").style.opacity));
		if (fadeTimeOut) {
			clearTimeout(fadeTimeOut);
			fadeTimeOut = null;
		};
	};
};

product.onblur = function (e) {
	fade("prod", 0, 0.5*document.getElementById("prod").style.opacity);
	fadeTimeOut = setTimeout(function () {document.getElementById("prod").style.zIndex = -20}, 500);
};

product.oninput = function (e) {
	document.getElementById("requirements").innerHTML = "";
	if (!product.value) {
		fade("prod", 0, 0.5*document.getElementById("prod").style.opacity);
		fadeTimeOut = setTimeout(function () {document.getElementById("prod").style.zIndex = -20}, 500);
	} else {
		document.getElementById("prod").name = "";
		var prod = document.getElementById("prod").getElementsByTagName("div");
		var name = new RegExp(product.value, "i");

		for (var i = 0; i < prod.length; i++) {
			if (prod[i].innerHTML.search(name) !== -1)
				prod[i].style.display = "";
			else
				prod[i].style.display = "none";
		};
		
		if (document.getElementById("prod").style.opacity < 1) {
			document.getElementById("prod").style.zIndex = 20;
			fade("prod", 1, 0.5*(1 - document.getElementById("prod").style.opacity));
			if (fadeTimeOut) {
				clearTimeout(fadeTimeOut);
				fadeTimeOut = null;
			};
		};
	};
};

selectProduct = function (element) {
	document.getElementById("prod").attributes.name.value = element.attributes.name.value;
	document.getElementById("product").value = element.innerHTML;
	
	var data = {
		callAjax: "products/materials.php",
		id: element.attributes.name.value
	};
	ajax("server/server.php", "base", "", data, false, false);
	calculate();
	
	document.getElementById("product").disabled = true;
	document.getElementById("pack").disabled = true;
	document.getElementById("submitOrder").style.visibility = "visible";
	document.getElementById("submitOrder").disabled = false;
};

deleteProduct = function (element) {
	document.getElementById("product").value = "";
	document.getElementById("product").disabled = false;
	document.getElementById("pack").disabled = false;
	document.getElementById("prod").attributes.name.value = "";
	document.getElementById("submitOrder").style.visibility = "hidden";
	document.getElementById("submitOrder").disabled = true;
};

numberInput = function (element) {
	element.value = element.value.replace(/[^0-9\.]/g,"");
};

calculate = function () {
	var quantity = document.getElementById("quantity").value;
	var temp = document.getElementById("base").cloneNode(true);
	var line = temp.getElementsByTagName("tr");
	
	for (var i = 0; i < line.length; i++) {
		for (var j = 0; j < line[i].getElementsByTagName("td").length; j++) {
			if (line[i].getElementsByTagName("td")[j].attributes.name) {
				line[i].getElementsByTagName("td")[j].innerHTML = (parseFloat(line[i].getElementsByTagName("td")[j].innerHTML)*quantity).toFixed(2);
			};
		};
	};
	
	document.getElementById("requirements").innerHTML = temp.innerHTML;
};

selectPack = function () {
	var pack = document.getElementById("pack").value;
	
	var data = {
		callAjax: "products/pack.php",
		pack: pack
	};
	
	ajax("server/server.php", "prod", "", data, false, false);
};

newOrder = function () {
	var data = {
		callAjax: "products/insert.php",
		ID: document.getElementById("prod").attributes.name.value,
		quantity: document.getElementById("quantity").value,
		date: document.getElementById("produceDate").value,
		status: document.getElementById("status").value,
		finish: document.getElementById("productFinish").value
	};
	
	ajax("server/server.php", "", "", data, false, false);
	
	data = {
		callAjax: "insertDatabase.php",
		table: "productOrderDetail",
	};
	
	var child, requirement = document.getElementById("requirements").getElementsByTagName("tr");
	
	for (var i =0; i < requirement.length; i++) {
		data.column = ['orderID'];
		data.value = [orderID];
		data.column.push("materialID");
		data.value.push(requirement[i].id.split("m")[1]);
		child = requirement[i].getElementsByTagName("TD");
		for (var j = 0; j < child.length; j++) {
			if (child[j].attributes.name && child[j].attributes.name.value == "kg") {
				data.column.push("kg");
				data.value.push(child[j].innerHTML);
			};
		};
		
		ajax("server/server.php", "", "", data, false, false);
	};
	
	document.getElementById("createForm").innerHTML = "";
	callView();
	callOrder();
};

changeStatus = function (element) {
	var status = parseInt(element.value);
	if (status) {
		document.getElementById("productFinish").disabled = false;
		var now = new Date();
		document.getElementById("productFinish").value = now.getDate() + "/" + (now.getMonth() + 1) + "/" + now.getFullYear();
	} else {
		document.getElementById("productFinish").disabled = true;
	};
};

selectPack();
document.getElementById("prod").style.maxHeight = product.clientHeight*15 + "px";
product.style.width = document.getElementById("prod").clientWidth + "px";