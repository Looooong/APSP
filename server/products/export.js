checkNewLine = function () {
	var line = document.getElementById("products").getElementsByTagName("tr");
	for (var i = 0; i < line[line.length - 1].getElementsByTagName("input").length; i++) {
		if (line[line.length - 1].getElementsByTagName("input")[i].value)
			return false;
	};
	
	return line[line.length - 1];
};

deleteLine = function (element) {
	var parent = element.parentNode.parentNode;
	if (parent !== checkNewLine())
		parent.parentNode.removeChild(parent);
};

checkLine = function (element) {
	var parent = element.parentNode.parentNode;
	var child = parent.getElementsByTagName("input");
	var blank = true;
	
	for (var i = 0; i < child.length; i++) {
		if (child[i].value)
			blank = false;
	};
	
	if (blank) {
		if (document.getElementById("products").getElementsByTagName("tr")[1] && parent !== checkNewLine())
			parent.parentNode.removeChild(parent);
	} else
		if (!checkNewLine())
			newLine();
};

newLine = function () {
	var line = document.getElementById("newLine").cloneNode(true);
	line.removeAttribute("id");
	line.removeAttribute("style");
	
	document.getElementById("products").appendChild(line);
};

newLine();

showSelect = function (element) {
	if (element.value) {
		var selection = element.parentNode.getElementsByTagName("div")[0].getElementsByTagName("div")[0];
		selection.style.display = "";
	};
};

hideSelect = function (element) {
	var selection = element.parentNode.getElementsByTagName("div")[0].getElementsByTagName("div")[0];
	setTimeout( function () {selection.style.display = "none";}, 250);
};

checkSelect = function (element) {
	var selection = element.parentNode.getElementsByTagName("div")[0].getElementsByTagName("div")[0];
	
	if (element.value) {
		var option = selection.getElementsByTagName("div");
		var name = new RegExp(element.value, "i");
		
		for (var i = 0; i < option.length; i++) {
			if (option[i].innerHTML.search(name) !== -1)
				option[i].style.display = "";
			else
				option[i].style.display = "none";
		};
		
		selection.style.display = "";
	} else {
		selection.style.display = "none";
	};
};

selectProduct = function (element) {
	var parent = element.parentNode.parentNode.parentNode.getElementsByTagName("input")[0];
	parent.value = element.innerHTML;
	parent.id = "im" + element.attributes.name.value;
	parent.disabled = true;
};

numberInput = function (element) {
	element.value = element.value.replace(/[^0-9\.]/g,"");
};

changeStatus = function (element) {
	var status = parseInt(element.value);
	if (status) {
		document.getElementById("exportFinish").disabled = false;
		var now = new Date();
		document.getElementById("exportFinish").value = ((now.getDate() > 9) ? now.getDate() : "0" + now.getDate()) + "/" + ((now.getMonth() + 1 > 9) ? (now.getMonth() + 1) : "0" + (now.getMonth() + 1)) + "/" + now.getFullYear();
	} else {
		document.getElementById("exportFinish").disabled = true;
	};
};
createOrder = function () {
	var product = document.getElementById("products").getElementsByTagName("tr");
	var data = {
		callAjax:"products/insert.php",
		date: document.getElementById("exportDate").value,
		status: document.getElementById("exportStatus").value,
		finish: (document.getElementById("exportFinish").disabled) ? "" : document.getElementById("exportFinish").value
	};
	
	ajax("server/server.php", "", "", data, false, false);
	
	data = {
		callAjax: "insertDatabase.php",
		table: "productExportDetail",
		column: [],
		value: []
	};
	
	var child;
	checkNewLine().parentNode.removeChild(checkNewLine());
	
	for (var i = 0; i < product.length; i++) {
		data.column = ["orderID"];
		data.value = [orderID];
		child = product[i].getElementsByTagName("input");
		for (var j = 0; j < child.length; j++) {
			switch (child[j].attributes.name.value) {
				case ("product"):
					data.column.push("goodID");
					data.value.push(child[j].id.split("im")[1]);
				break;
				case ("quantity"):
					data.column.push("sluong");
					data.value.push(child[j].value);
			};
		};
		ajax("server/server.php", "", "", data, false, false);
	};
	
	callView();
	callOrder();
	document.getElementById("createForm").innerHTML = "";
};