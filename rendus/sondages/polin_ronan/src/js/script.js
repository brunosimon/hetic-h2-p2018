$(function(){


// Class coordonnées
var coord = {
	    latitude: null,
		longitude: null,
		radius: null
};

/*****************************************************************************
						FORMULAIRE
*****************************************************************************/


// Récuperer les informations du formulaire
$(".listMovie").submit(function(){

	//Vérification
	if($("input.genre:checked").length==0){
		alert('Tu dois cocher plus de genre !')
	}

	else{

			$('.listMovie').fadeOut();
			 $( ".wait" ).animate({
   				width: "1000px",
  				}, 30000, function() {
  				});


		//géolocalisation
		coord.radius = $('.radius').val();
		
		var newMovie = $('input[name=newMovie]:checked', '.listMovie').val();
		
		var genre = new Array();
		$('input:checked[name=whatGenre]').each(function() {
  			genre.push($(this).val());
		});
		
		retrieveCoord(newMovie, genre);
		return false;
	}
});

// On limite le checked des checkbox à 3
$("input.genre").change(function(){
	var limit = 2
	var nb = $("input.genre:checked").length;
	if(nb>limit){
		$(this).attr('checked',false);
	}
});

/*****************************************************************************
						REQUETE AJAX
*****************************************************************************/

// Prend les coordonnées de l'utilisateur
function retrieveCoord(newMovie, genre){
	
	if(navigator.geolocation){
	 navigator.geolocation.getCurrentPosition(
	 	function(position){
	 		coord.latitude = position.coords.latitude;
	 		coord.longitude = position.coords.longitude;
			// Envoi les coordonnées et les questions
			sendCoord(coord.latitude, coord.longitude, coord.radius, newMovie, genre);
    		
	 	},
	 	function(error){
	 		console.log(error.message);
        }
    );
    }

    else{
    	alert('Geolocation is not supported');
    }

    
}

//Envoi les coordonnées via AJAX au PHP
function sendCoord(latitude, longitude, radius, newMovie, genre){
	ajax = $.ajax({
		url	: 'src/php/form.php',
		type : 'POST',
		data : {lat: latitude, long: longitude, rad: radius, firstQuestion:newMovie, secondQuestion:genre},
		dataType : 'json',
		success : function(res)
		{
			console.log(res);
			printMovie(res);
		},
		error : function()
		{
				console.log('error');
		}
	});
}



// Mettre la liste de film disponible
function printMovie(listMovie){
	if(listMovie.length == 0){
		$( '.finalMovie' ).append('<div class="titleSite">Désolé rien ne te correspond, reviens la semaine prochaine !</div>');
	}
	$( '.finalMovie' ).append('<div class="titleSite">Choisis ton film maintenant !</div>');
	for(var i = 0; i < listMovie.length; i++){
		var new_element = $( '<label>'+listMovie[i].title+'<input type="radio" class="movie" name="movieSelected" value="' + listMovie[i].title + '"></label> ');
		$( '.finalMovie' ).append(new_element);	
	}
	$('.finalMovie').append('<input class ="final" type="submit">');


	$(".finalMovie").submit(function(){
		//Vérification
		if($("input.movie:checked").length==0){
			alert('Tu dois choisir ton film')
			return false;
		}
	});
}

/***********************************************************************
						UX : EVENT 
***********************************************************************/


});
