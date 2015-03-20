sum = function (x, y) { return x + y;};

calculate = function () {
	var A = document.getElementById("A").value;
	var B = document.getElementById("B").value;
	
	document.getElementById("result").value = sum(parseInt(A), parseInt(B));
};