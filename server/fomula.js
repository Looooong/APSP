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
};

numberInput = function (element) {
	element.value = element.value.replace(/[^0-9\.]/g,"");
};

calculate = function () {
	var quantity = document.getElementById("quantity").value;
};

selectPack = function () {
	var pack = document.getElementById("pack").value;
	
	var data = {
		callAjax: "productionOrder/pack.php",
		pack: pack
	};
	
	ajax("server/server.php", "prod", "", data, false, false);
};

newOrder = function () {
	var data = {
		callAjax: "insertDatabase.php",
		table: "production",
		column: [
			"date",
			"product",
			"quantity"
		],
		value: [
			document.getElementById("produceDate").value,
			document.getElementById("prod").attributes.name.value,
			document.getElementById("quantity").value
		]
	};
};

selectPack();
document.getElementById("prod").style.maxHeight = product.clientHeight*15 + "px";
product.style.width = document.getElementById("prod").clientWidth + "px";

//--------------------------- Materials -----------------------
