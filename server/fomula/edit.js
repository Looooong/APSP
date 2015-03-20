inputMaterial = function (element) {
	var parent = element.parentNode;
	var searchField = parent.getElementsByTagName("DIV")[0].getElementsByTagName("DIV")[0];
	
	if (element.value) {
		var searchElement = searchField.getElementsByTagName("DIV");
		
		var searchName = new RegExp(element.value, "gi");
		
		for (var i = 0; i < searchElement.length; i++) {
			searchElement[i].display = (searchElement[i].innerHTML.search(searchName) != -1) ? "" : "none";
		};

		searchField.style.display = "";
	} else {
		searchField.style.display = "none";
	};
};

focusMaterial = function (element) {
	if (element.value) {
		var parent = element.parentNode;
		var searchField = parent.getElementsByTagName("DIV")[0].getElementsByTagName("DIV")[0];
		
		searchField.style.display = "";
	};
};

blurMaterial = function (element) {
	var parent = element.parentNode;
	var searchField = parent.getElementsByTagName("DIV")[0].getElementsByTagName("DIV")[0];
		
	setTimeout(function () {searchField.style.display = "none"}, 500);
};

selectMaterial = function (element) {
	var parent = element.parentNode.parentNode.parentNode;
	
	parent.innerHTML = element.innerHTML;
	parent.parentNode.setAttribute("name", element.attributes.name.value);
	parent.parentNode.getElementsByTagName("button")[0].disabled = false;
	newLine(parent.parentNode.parentNode.id);
};

newLine = function (name) {
	var clone = document.getElementById(name + "New").cloneNode(true);
	clone.removeAttribute("id");
	clone.style.display = "";
	
	document.getElementById(name).appendChild(clone);
};
newLine("materials");
newLine("packs");

deleteLine = function (element) {
	var parent = element.parentNode.parentNode;
	parent.parentNode.removeChild(parent);
};

callUpdate = function () {
	var data = {
		callAjax: "fomula/update.php",
		id: document.getElementById("currentId").value,
		material: {},
		package: {}
	};

	var materials = document.getElementById("materials").getElementsByTagName("input");
	
	for (var i = 0; i < materials.length - 2; i++)
		data.material[materials[i].parentNode.parentNode.attributes.name.value] = materials[i].value;
		
	var packages = document.getElementById("packs").getElementsByTagName("input");
	
	for (i = 0; i < packages.length - 2; i++)
		data.package[packages[i].parentNode.parentNode.attributes.name.value] = packages[i].value;
		
	ajax("server/server.php", "", "", data, false, true);
};

numberInput = function (element) {
	element.value = element.value.replace(/[^0-9\.]/g,"");
};

numberBlur = function (element) {
	if (!element.value)
		element.value = 0;
};