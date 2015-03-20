checkNewLine = function () {
	var line = document.getElementById("materials").getElementsByTagName("tr");
	for (var i = 0; i < line[line.length - 1].getElementsByTagName("input").length; i++) {
		if (line[line.length - 1].getElementsByTagName("input")[i].value)
			return false;
	};
	
	return line[line.length - 1];
};

deleteLine = function (element) {
	var parent = element.parentNode.parentNode.parentNode;
	if (parent !== checkNewLine())
		parent.parentNode.removeChild(parent);
};

checkLine = function (element) {
	var parent = element.parentNode.parentNode.parentNode;
	var child = parent.getElementsByTagName("input");
	var blank = true;
	
	for (var i = 0; i < child.length; i++) {
		if (child[i].value)
			blank = false;
	};
	
	if (blank) {
		if (document.getElementById("materials").getElementsByTagName("tr")[1] && parent !== checkNewLine())
			parent.parentNode.removeChild(parent);
	} else
		if (!checkNewLine())
			newLine();
};

newLine = function () {
	var line = document.getElementById("newLine").cloneNode(true);
	line.removeAttribute("id");
	line.removeAttribute("style");
	
	document.getElementById("materials").appendChild(line);
};

newLine();

showSelect = function (element) {
	if (element.value) {
		var selection = element.parentNode.parentNode.getElementsByTagName("div")[0].getElementsByTagName("div")[0];
		selection.style.display = "";
	};
};

hideSelect = function (element) {
	var selection = element.parentNode.parentNode.getElementsByTagName("div")[0].getElementsByTagName("div")[0];
	setTimeout( function () {selection.style.display = "none";}, 250);
};

checkSelect = function (element) {
	var selection = element.parentNode.parentNode.getElementsByTagName("div")[0].getElementsByTagName("div")[0];
	
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

selectMaterial = function (element) {
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
		document.getElementById("importFinish").disabled = false;
		var now = new Date();
		document.getElementById("importFinish").value = now.getDate() + "/" + (now.getMonth() + 1) + "/" + now.getFullYear();
	} else {
		document.getElementById("importFinish").disabled = true;
	};
};
createOrder = function () {
	var material = document.getElementById("materials").getElementsByTagName("tr");
	var data = {
		callAjax:"materials/insert.php",
		date: document.getElementById("importDate").value,
		status: document.getElementById("importStatus").value,
		finish: (document.getElementById("importFinish").disabled) ? "" : document.getElementById("importFinish").value
	};
	
	ajax("server/server.php", "", "", data, false, false);
	
	data = {
		callAjax: "insertDatabase.php",
		table: "materialOrderDetail",
		column: [],
		value: []
	};
	
	var child;
	checkNewLine().parentNode.removeChild(checkNewLine());
	
	for (var i = 0; i < material.length; i++) {
		data.column = ["orderID"];
		data.value = [orderID];
		child = material[i].getElementsByTagName("input");
		for (var j = 0; j < child.length; j++) {
			switch (child[j].attributes.name.value) {
				case ("material"):
					data.column.push("materialID");
					data.value.push(child[j].id.split("im")[1]);
				break;
				case ("source"):
					data.column.push("source");
					data.value.push(child[j].value);
				break;
				case ("kg"):
					data.column.push("kg");
					data.value.push(child[j].value);
			};
		};
		ajax("server/server.php", "", "", data, false, false);
	};
	
	callView();
	callOrder();
	document.getElementById("createForm").innerHTML = "";
};