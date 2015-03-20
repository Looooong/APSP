loaderLine = '<img src="src/img/loader/loaderLine.gif" />';
loaderSmall = '<img src="src/img/loader/loaderSmall.gif" />';
loaderBig = '<img src="src/img/loader/loaderBig.gif" />';
loaderBar = '<img src="src/img/loader/loaderBar.gif" />';
loaderLoginBlue = '<img src="src/img/loader/loaderLoginBlue.gif" />';
iconTick = '<img src="src/ico/tick.ico" />';

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
		var explore = function (element, str, deep) {
			var query = "";

			for (var i in element) {
				if (typeof(element[i]) === "object") {
					query += explore(element[i], str + i + ((deep) ? "]" : "") + "[", deep + 1);
				} else {
					query += str + i + ((deep) ? "]" : "");
				
					query += "=" + encodeURIComponent(element[i]) + "&";
				};
			};
			
			return query;
		};
		
		var query = explore(data, "", 0).slice(0, -1);
		
		request.open("POST", encodeURI(url), async);
		
		var responseAjax = function(element, url, loader, data) {
			if(request.readyState == 4) {
				if(request.status == 200) {
			
					output = request.responseText.split('???PHPTOSCRIPT???');
					if (element) document.getElementById(element).innerHTML = output[0];
					if (output[1]) eval(output[1]);
			
					if (typeof(url) !== 'undefined') {
						document.cookie = "requestedURL=" + escape(url);
						document.cookie = "requestedElement=" + escape(element);
						document.cookie = "requestedLoader=" + escape(loader);
						document.cookie = "requestedData=" + escape(data);
					};
				};
			};
		};//xu ly trang thai ajax
		
		request.onreadystatechange = (remember) ? function() {responseAjax(element, url, loader, query);}
												: function() {responseAjax(element)};
		
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		
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