
//Declaring Variables
var DOM = {};

$(document).ready(function(){

	//Getting DOM elements in an object
	DOM.history = $('.history');
	DOM.list=$('.entry');

	//Parsing value of the highest score (dirty)
	var max = parseInt($('.highest span').text())-700;

	//Setting the max height of a bar based on the viewport size
	maxWindow = $(window).height()*0.2;

	for (var i = 0; i < DOM.list.length; i++) { //Looping through elements to give them the proper size
		
		current = $('.id'+i);

		score = (parseInt(current.html()))-700; //Making the bars smaller (scores should'nt go that low)

		scoreHeight = maxWindow * score / max; //Calculating the height of a bar based on the maximum score and the viewport size (maximum score is the highest)

		current.animate({height: scoreHeight}, 1500,'swing'); //Giving elements their proper size

	};

});