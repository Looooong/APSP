callAddSystem = function() {
		ajax("server/server.php", "response", loaderBig, {"callAjax": "systemEdit.php", "lang": "<?=$lang->lang?>", "method": "viewAdd"}, false, true);
};

callEditSystem = function(element) {
	var data = {
		"callAjax": "systemEdit.php",
		"lang": "<?=$lang->lang?>",
		"menuID": element.getAttribute("name"),
		"method": "viewEdit"
	};
		
	for (var i = 0; i < element.childNodes.length; i++) {
		if (typeof(element.childNodes[i].tagName) !== 'undefined') {
			data[element.childNodes[i].getAttribute("name")] = element.childNodes[i].innerHTML;
		};
	};
		
	ajax("server/server.php", "response", loaderLine, data, false, true);
};