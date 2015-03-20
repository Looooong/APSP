Queue = function () {	
	this.first = 0;
	this.last = 0;
};

Queue.prototype.Node = function () {
	this.value = 0,
	this.next = 0,
	this.previous = 0
};

Queue.prototype.push = function (value) {
	var p = new this.Node;
	p.value = value;
	
	if (!this.first)
		this.first = p;
	else {
		p.previous = this.last;
		this.last.next = p;
	};
	
	this.last = p;
};

Queue.prototype.get = function () {
	return (this.first) ? this.first.value : null;	
};

Queue.prototype.pop = function () {
	if (this.first) {
		var result = this.first.value;
		this.first = this.first.next;
		this.first.previous = 0;
		return result;
	} else
		return null;
};

Queue.prototype.destroy = function (target) {
	if (target === this.first)
		this.first = target.next;
	else
		target.previous.next = target.next;

	if (target === this.last)
		this.last = target.previous;
	else
		target.next.previous = target.previous;

	target.next = 0;
	target.previous = 0;

	delete target;
};