if (typeof Queue !== "undefined") {	
	Animation = {
		queue: new Queue()
	};
	
	Animation.queue.find = function (target) {
		var element;
		if (element = Animation.queue.first) {
			do {
				if (element.value.element === target)
					return element;
			} while (element = element.next);
		}
		
		return false;
	};

	Animation.queue.update = function () {
		var element;
		if (element = Animation.queue.first) {
			do {
				if (!element.value.update())
					Animation.queue.destroy(element);
			} while (element = element.next);
		} else
			Animation.queue.stop();
	};

	Animation.queue.status = 0;

	Animation.queue.start = function () {
		if (Animation.queue.status === 0) {
			Animation.queue.status = 1;
			Animation.queue.ID = setInterval(Animation.queue.update, 25);
		};
	};

	Animation.queue.stop = function () {
		if (Animation.queue.status === 1) {
			Animation.queue.status = 0;
			clearInterval(Animation.queue.ID);
		};
	};
//--------------- FADE -------------
	Animation.fade = function (element, type, duration) {
		this.method = "FADE";
		this.element = element;
		this.type = type;
		this.duration = duration;
		this.opacity = parseFloat(element.style.opacity);
		this.start = Date.now();
	};

	Animation.fade.prototype.update = function () {
		var progress = (Date.now() - this.start)/this.duration/1000;
		if (progress > 1) {
			this.element.style.opacity = this.type;
			return false;
		} else {
			this.element.style.opacity = this.opacity + (this.type - this.opacity)*progress;
			return true;
		};
	};

	if (typeof(fade) === "undefined") {
		fade = function (element, type, duration) {
			element = (typeof(element) === "string") ? document.getElementById(element) : element;
			
			if (element instanceof HTMLElement && element !== null) {
				var stock;
				if (stock = Animation.queue.find(element)) {
					stock.value.type = type;
					stock.value.duration = duration;
					stock.value.opacity = parseFloat(element.style.opacity);
					stock.value.start = Date.now();
				} else {
					Animation.queue.push(new Animation.fade(element, type, duration));
					Animation.queue.start();
				};
			} else
				console.log("'element' is not HTML Element");
		};
	} else
		console.log("'fade' is already defined");
//----------------- RESIZE --------------
	Animation.resize = function (element, height, width, duration) {
		this.method = "RESIZE";
		this.element = element;
		this.height = height;
		this.width = width;
		this.duration = duration;
		this.start = Date.now();
		this.origin = {};
		this.origin.height = parseInt(element.style.height.split("px")[0]);
		this.origin.width = parseInt(element.style.width.split("px")[0]);
	};
	
	Animation.resize.prototype.update = function () {
		var progress = (Date.now() - this.start)/this.duration/1000;
		if (progress > 1) {
			this.element.style.height = this.height + "px";
			this.element.style.width = this.width + "px";
			return false;
		} else {
			this.element.style.height = (this.origin.height + (this.height - this.origin.height)*progress) + "px";
			this.element.style.width = (this.origin.width + (this.width - this.origin.width)*progress) + "px";
			return true;
		};
	};
} else
	console.log("Queue.class.js is required to use Animation");