/* ----------------------------------------------------------------------------- */
/* --- 1. MAIN TIMELINE
/* ----------------------------------------------------------------------------- */
//Creating variables
var DOM = {},
	radioId = [],
	winner  = "";

$(document).ready(function(){

	//Getting DOM elements in an object
	DOM.choice = $('.choice');
	DOM.result = $('.result');
	DOM.stats = $('.stats');
	DOM.refresh = $('.refresh');
	DOM.votes = $('.votes span');

	//Launching function on ready in order to directly present the user with a pair
	ajaxPair();

	//Monitoring clicks on buttons
	DOM.stats.on('click', function(){resultShow(DOM.stats.text())});
	DOM.refresh.on('click', function(){
		location.reload();
	});

});



/* ----------------------------------------------------------------------------- */
/* --- 2. AJAX FETCHING FUNCTION
/* ----------------------------------------------------------------------------- */

//Function used to present the user with a pair of contenders
function ajaxPair(){

	//Ajax request on PHP script

	$.ajax({ //Getting a simple pair of contenders from database
	  type: "POST",
	  url: 'ajax/ajax.php',
	  data: 'r=pair'
	})
	  .done(function(contenders) {
	    DOM.choice.html(contenders);
	    radioMonitor();
	})
	  .fail(function(error){
	  	alert( "Request failed: " + error + ". Please try again shortly");
	  })

	$.ajax({ //Also getting the amount of votes dynamically
	  type: "POST",
	  url: 'ajax/ajax.php',
	  data: 'r=amount'
	})
		.done(function(amount){
			DOM.votes.html(amount);
	})
}


//Function used to fetch the result of all time scores
function scoreFetch(){

	//Ajax request on PHP script 

	$.ajax({
	  type: "POST",
	  url: 'ajax/ajax.php',
	  data: 'r=scoring'
	})

	  .done(function(data) { //Success callback
	  	
	  	scores = JSON.parse(data);

	  	var max = scores[0].score;  //Maximum score (easy since MySQL sent the highest first)

	  	a=1;  //Used to decrease the alpha (lower scores = lower alpha color)

	  	aDescender = 0.8 / scores.length;

	  	for (var i = 0; i < scores.length; i++) {
	  		
	  		//Dirty appending
			DOM.result.append('<a href="/'+scores[i].id+'"> <div class="score id'+i+' shadow-1"> #'+(i+1)+' '+scores[i].title+'<span>'+scores[i].score+'</span></div></a>');

			DOM.id = $('.id'+i);
			
			//Setting the maximum width of a bar to 85% of viewport
			maxWindow = $(window).width()*0.85;

			//Calculating width based on viewport and max score (max score is max width)
			scoreWidth = maxWindow * scores[i].score / max;
			
			//Animating width and setting color
			DOM.id.animate({width: scoreWidth}, 1000, 'swing');
			DOM.id.css({color : "#FFF", backgroundColor: "rgba(244, 67, 54, "+a+")"});

			//Decreasing alpha for next contender
			a -= aDescender;

	  	};

	})

	  .fail(function( jqXHR, textStatus ) {
 	 alert( "Request failed: " + textStatus + ". Please try again shortly");
	});

}

//Function used to post votes to a PHP script
function voteSubmit(winner, loser){

	//Ajax request on PHP script
	
	$.ajax({
	  type: "POST",
	  url: 'ajax/ajax.php',
	  data: 'r=vote&winner=' + winner + '&loser=' + loser,  //Passing winner and loser as POST requests for external script
	  success: ajaxPair(),
	});
}


/* ----------------------------------------------------------------------------- */
/* --- 3. UTILITIES
/* ----------------------------------------------------------------------------- */


//Function used to monitor changes in RadioButton checking
function radioMonitor(){

	DOM.radio = $("input[type=radio]");
	DOM.pictures = $('img');

	DOM.radio.change(
    function(){
        if ($(this).is(':checked')) {
        	
            winner = $(this).context.defaultValue;
            loser  = loserChecker(winner);

            voteSubmit(winner,loser);
        }
    });
}

//Function used to get ID of the loser of the round
function loserChecker(winner){

	if(DOM.radio[0].defaultValue == winner){
			loser = DOM.radio[1].defaultValue;
	}
	else{
			loser = DOM.radio[0].defaultValue;
	}
	return loser;
}




//Function used to switch to result view
function resultShow(text){


	if(text == "Show Stats"){

		DOM.stats.text('Vote Again');
		DOM.choice.html("");
		DOM.refresh.css({display: 'none'});
		scoreFetch();

	}
	else if(text == "Vote Again"){
		
		DOM.stats.text('Show Stats');
		DOM.result.html("");
		DOM.refresh.css({display: 'inline-block'});
		ajaxPair();
	}
				
}



