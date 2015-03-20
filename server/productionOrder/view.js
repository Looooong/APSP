customer = document.getElementById("customer");

customer.onfocus = function (e) {
	if (customer.value)
		fade("cust", 1, 0.5*(1 - document.getElementById("desc").style.opacity));
};

customer.onfocusout = function (e) {
	fade("cust", 0, 0.5*document.getElementById("desc").style.opacity);
};

customer.oninput = function (e) {
	if (!customer.value)
		fade("cust", 0, 0.5*document.getElementById("desc").style.opacity);
	else {
		var cust = document.getElementById("cust").getElementsByTagName("div");
		var name = new RegExp(customer.value);

		for (var i = 0; i < cust.length; i++) {
			if (cust[i].innerText.search(name) !== -1)
				cust[i].style.display = "";
			else
				cust[i].style.display = "none";
		};
		
		if (cust.style.opacity === 0)
			fade("cust", 1, 0.5*(1 - document.getElementById("desc").style.opacity));
	};
};