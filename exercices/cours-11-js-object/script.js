/**
 * Objet classique
 */
// // Première moto
// var moto_1 = {
// 	color : 'black',
// 	speed : 0,
// 	accelerate : function()
// 	{
// 		this.speed += 1;
// 	}
// };

// // Deuxième moto
// var moto_2 = {
// 	color : 'red',
// 	speed : 0,
// 	accelerate : function()
// 	{
// 		this.speed += 1;
// 	}
// };


/**
 * Objet avec contructeur
 */
// // Class Moto
// var Moto = function(color)
// {
// 	// Propriétés
// 	this.color = color;
// 	this.speed = 0;

// 	// Méthodes publiques
// 	this.accelerate = function()
// 	{
// 		this.speed += 1;
// 	};
// };

// // Initialisation
// var moto_1 = new Moto('black');
// var moto_2 = new Moto('red');



/**
 * Objet avec contructeur et prototypage pour héritage
 */
// Class Moto
var Moto = function(color)
{
	// Propriétés
	this.color = color;
};

Moto.prototype = {
	color      : 'black',
	speed      : 0,
	accelerate : function()
	{
		this.speed += 1;
	}
};

// Class Bandit (héritée de Moto)
var Bandit = function(){};
Bandit.prototype = Object.create(Moto.prototype);
Bandit.prototype.brand = 'Suzuki';

// Initialisation
var moto_1 = new Moto('red');
var moto_2 = new Bandit('red');

