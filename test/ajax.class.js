const loaderLine = '<img src="src/img/loader/loaderLine.gif" />';
const loaderSmall = '<img src="src/img/loader/loaderSmall.gif" />';
const loaderBig = '<img src="src/img/loader/loaderBig.gif" />';
const loaderBar = '<img src="src/img/loader/loaderBar.gif" />';
const loaderLoginBlue = '<img src="src/img/loader/loaderLoginBlue.gif" />';
const iconTick = '<img src="src/ico/tick.ico" />';

function responseAjax(element, url, loader, data) {
	if(request.readyState == 4) {
		if(request.status == 200) {
			
			output = request.responseText.split('???PHPTOSCRIPT???');
			if (element) document.getElementById(element).innerHTML = output[0];
			if (output[1] != "") eval(output[1]);
			
			if (typeof(url) !== 'undefined') {
				document.cookie = "requestedURL=" + escape(url);
				document.cookie = "requestedElement=" + escape(element);
				document.cookie = "requestedLoader=" + escape(loader);
				document.cookie = "requestedData=" + escape(data);
			};
		};
	};
};

function ajax(url, element, loader, data, remember, async) {
	remember = (typeof(remember) === 'undefined') ? false : remember;
	async = (typeof(async) === 'undefined') ? true : async;
	
	if (loader) document.getElementById(element).innerHTML = loader;
	
	try { request = new XMLHttpRequest(); /* e.g. Firefox */}
	catch(err) {
		try { request = new ActiveXObject("Msxml2.XMLHTTP"); /* some versions IE */}
		catch(err) {
			try { request = new ActiveXObject("Microsoft.XMLHTTP"); /* some versions IE */}
			catch(err) { request = false;}
		}
	}
	
	if (request) {
		url += "?time=" + Date.now();
		
		data = data || [];
		for (var i = 0; i < data.length; i++) {
			url += "&" + data[i];
		};
		
		request.open("GET", encodeURI(url), async);
		
		url = url.split('?');
		request.onreadystatechange = (remember) ? function() {responseAjax(element, url[0], loader, data.join('&'));}
												: function() {responseAjax(element)};
		
		request.send(null);
	} else {
		document.getElementById(element).innerHTML = "<h3>Browser Error</h3>";
	};
};

function ajaxPost(url, element, loader, data, remember, async) {
	remember = (typeof(remember) === 'undefined') ? false : remember;
	async = (typeof(async) === 'undefined') ? true : async;
	
	if (loader) document.getElementById(element).innerHTML = loader;
	
	try { request = new XMLHttpRequest(); /* e.g. Firefox */}
	catch(err) {
		try { request = new ActiveXObject("Msxml2.XMLHTTP"); /* some versions IE */}
		catch(err) {
			try { request = new ActiveXObject("Microsoft.XMLHTTP"); /* some versions IE */}
			catch(err) { request = false;}
		}
	}
	
	if (request) {
		
		data = data || {};
		var query = "";
		var first = true;
		for (var i in data) {
			if (first) first = false;
			else query += "&";
			query += i + "=" + encodeURIComponent(data[i]);
		};
		
		request.open("POST", encodeURI(url), async);
		
		
		
		request.onreadystatechange = (remember) ? function() {responseAjax(element, url, loader, query);}
												: function() {responseAjax(element)};
		
		request.send(query);
	} else {
		document.getElementById(element).innerHTML = "<h3>Browser Error</h3>";
	};
};

function reloadRequest(lang) {
	var requestedURL = getCookie("requestedURL");
	
	
	if (requestedURL) {
		var data = unescape(getCookie("requestedData")).split('&');
	
		for (var i = 0; i < data.length; i++) {
			if (data[i].indexOf("lang=") != -1) {
				data[i] = "lang=" + lang;
				break;
			};
		};
		
		ajax(unescape(requestedURL), unescape(getCookie("requestedElement")), unescape(getCookie("requestedLoader")), data, true);
	};
};

function prepareToExport(table, lang) {
	var data = {"callAjax": "dataToExport.php",
				"table": table,
				"lang": lang,
				"column": []};
	for (var i = 2; i < arguments.length; i++) {
		data.column.push(arguments[i]);	
	};
	
	ajax("server/server.php", "exportData", "", data, false, false);			
};