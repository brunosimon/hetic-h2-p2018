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
// 	color : 'yellow',
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
// 	};
// };

// var moto_1 = new Moto(),
// 	moto_2 = new Moto('blue'),
// 	moto_3 = new Moto('yellow');



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
	}
};

var Bandit = function(color){
	this.color = color || 'black';
};
Bandit.prototype = Object.create(Moto.prototype);
Bandit.prototype.brand  = 'Suzuki';
Bandit.prototype.klaxon = function()
{
	audio.play();
};

var moto_1 = new Bandit('green'),
	moto_2 = new Moto('blue'),
	moto_3 = new Moto('yellow');















