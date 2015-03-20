Animation = {};

Animation.prototype.fade = function (element, type, duration) {
	this.start = Date.now();
};

Animation.fade.prototype.exec = function () {
	console.log(element, type, duration);
};