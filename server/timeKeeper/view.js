changeLock = function (status) {
	if (status.value == 1)
		document.getElementById("coverer").style.display = "none";
	else
		document.getElementById("coverer").style.display = "";
		
	var data = {
		'callAjax': "updateDatabase.php",	
		'table': "CONSTANCES",
		'column': "value",
		'value': (1 - status.value),
		'matchColumn': "name",
		'matchValue': "lock_timeKeeper"
	};
	
	var curMonth = document.getElementById("curMonth").value;
	var curYear = document.getElementById("curYear").value;
	var selectedMonth = document.getElementById("months").value;
	var selectedYear = document.getElementById("years").value;
	if (curMonth != selectedMonth || curYear != selectedYear)
		data.database = "APSP_" + selectedMonth + "_" + selectedYear;
	
	ajax("server/server.php", "", "", data, false, true);
	
	status.value = 1 - status.value;
	
	document.getElementById("saveButton").disabled = (status.value == 1) ? true : false;
};

changeStatus = function (element) {
	var elementName = element.getAttribute('name').split('|');
	var status = parseInt(elementName[1]);
	status = (status == 3) ? -3 : ++status;
	element.setAttribute('name', elementName[0] + '|' + status + "|1");
	
	switch (status) {
		case(-3):
			element.innerHTML = "I";
		break;
		case(-2):
			element.innerHTML = "P";
		break;
		case(-1):
			element.innerHTML = "V";//Vắng
		break;
		case(0):
			element.innerHTML = " ";//Trống
		break;
		case(1):
			element.innerHTML = "N";//Nửa buổi
		break;
		case(2):
			element.innerHTML = "C";//Có mặt
		break;
		case(3):
			element.innerHTML = "G";
		break;
		
	};
};

saveStatus = function () {
	var timeTable = document.getElementById("timeKeeper");
	for (var i = 0; i < timeTable.childNodes.length; i++) {
		if (typeof(timeTable.childNodes[i].tagName) !== "undefined") {
			var element = timeTable.childNodes[i];
			var adID = element.getAttribute('name');

			for (var j = 0; j < element.childNodes.length; j++) { console.log(typeof(element.childNodes[j].tagName) !== "undefined" && element.childNodes[j].getAttribute('name') && element.childNodes[j].getAttribute('name').split('|')[2] == "1");
				if (typeof(element.childNodes[j].tagName) !== "undefined" && element.childNodes[j].getAttribute('name') && element.childNodes[j].getAttribute('name').split('|')[2] == "1") { console.log(1);
					var day = element.childNodes[j].getAttribute('name').split('|')[0];
					var status = element.childNodes[j].getAttribute('name').split('|')[1];
					var curMonth = document.getElementById("curMonth").value;
					var curYear = document.getElementById("curYear").value;
					var selectedMonth = document.getElementById("months").value;
					var selectedYear = document.getElementById("years").value;
					var data = {
						"callAjax": "updateDatabase.php",
						"table": "timeKeeper",
						"matchColumn": "adID",
						"matchValue": adID,
						"column": "_" + day,
						"value": status
					};
					
					if (curMonth != selectedMonth || curYear != selectedYear)
						data.database = "APSP_" + selectedMonth + "_" + selectedYear;
					
					ajax("server/server.php", "", "", data, false, true);
				};
			};
		};
	};
};

fillDay = function (day) {
	var table = document.getElementById("timeTable").getElementsByTagName("TR");
	
	for (var i = 0; i < table.length; i++) {
		var col = table[i].getElementsByTagName("TD");
		
		for (var j = 0; j < col.length; j++) {
			if (col[j].attributes.name && col[j].attributes.name.value.split("|")[0] == day) {
				col[j].attributes.name.value = col[j].attributes.name.value.split("|")[0] + "|2|1";
				col[j].innerHTML = "C";
				break;
			};
		};
	};
};

selectMonth = function () {
	var month = document.getElementById("months").value;
	var year = document.getElementById("years").value;
	var data = {
		"callAjax": "timeKeeper/controller.php",
		"database": (month == document.getElementById("curMonth").value && year == document.getElementById("curYear").value) ? "APSP" : "APSP_" + month + "_" + year
	};
	
	ajax("server/server.php", "timeTable", "", data, false, false);
	
	var data = {
		"callAjax": "timeKeeper/bhnhamay.php",
		"database": (month == document.getElementById("curMonth").value && year == document.getElementById("curYear").value) ? "APSP" : "APSP_" + month + "_" + year
	};
	
	ajax("server/server.php", "a", "", data, false, false);
	
	var data = {
		"callAjax": "timeKeeper/bhkinhdoanh.php",
		"database": (month == document.getElementById("curMonth").value && year == document.getElementById("curYear").value) ? "APSP" : "APSP_" + month + "_" + year
	};
	
	ajax("server/server.php", "b", "", data, false, false);
	
	var data = {
		"callAjax": "timeKeeper/bhvanphong.php",
		"database": (month == document.getElementById("curMonth").value && year == document.getElementById("curYear").value) ? "APSP" : "APSP_" + month + "_" + year
	};
	
	ajax("server/server.php", "c", "", data, false, false);
	
	document.getElementById("saveButton").disabled = (document.getElementById("locker").value == 1) ? true : false;
	
	if (document.getElementById("locker").value == 1)
		document.getElementById("coverer").style.display = "";
	else
		document.getElementById("coverer").style.display = "none";
};

selectYear = function () {
	var year = document.getElementById("years").value;
	var data = {
		"callAjax": "timeKeeper/selectMonth.php",
		"year": year
	};
	
	ajax("server/server.php", "months", "", data, false, true);
	
	document.getElementById("months").innerHTML = "";
};

selectMonth();