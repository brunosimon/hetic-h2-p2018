// var moto_1 = {
// 	color : 'black',
// 	speed : 0,
// 	accelerate : function()
// 	{
// 		this.speed += 1;
// 	}
// };

// var moto_2 = {
// 	color : 'red',
// 	speed : 0,
// 	accelerate : function()
// 	{
// 		this.speed += 1;
// 	}
// };

// var moto_3 = {
// 	color : 'blue',
// 	speed : 0,
// 	accelerate : function()
// 	{
// 		this.speed += 1;
// 	}
// };



// var Moto = function(color)
// {
// 	this.color = color || 'black';
// 	this.speed = 0;

// 	this.accelerate = function()
// 	{
// 		this.speed += 1;

// 		return this;
// 	};
// };

// var moto_1 = new Moto(),
// 	moto_2 = new Moto('red'),
// 	moto_3 = new Moto('blue');



var Moto = function(color)
{
	this.color = color || 'black';
};

Moto.prototype = {
	color : 'black',
	speed : 0,
	accelerate : function()
	{
		this.speed += 1;
		return this;
	}
};


var Bandit = function(color)
{
	this.color = color || 'black';
};
Bandit.prototype = Object.create(Moto.prototype);
Bandit.prototype.brand = 'Suzuki';


var moto_1 = new Moto(),
	moto_2 = new Moto('red'),
	moto_3 = new Bandit('blue');

















