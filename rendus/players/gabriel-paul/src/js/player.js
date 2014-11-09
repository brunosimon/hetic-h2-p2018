var video 		= document.querySelectorAll('.video'),
	play_button = document.querySelector('.play_pause'),
	bar         = document.querySelector('.bar'),
	cursor      = document.querySelector('.cursor'),
	currentTime = document.querySelector('.curent_time'),
	duration	= document.querySelector('.duration'),
	volume_mute = document.querySelector('.mute'),
	volume_user = 0,
	vidsource	= document.getElementById('source'),
	barvolume	= document.querySelector('.barvolume'),
	volcursor	= document.querySelector('.volcursor'),
	time_elapsed= document.querySelector('.time_elapsed'),
	i 			= 0,
	vote_left	= document.querySelector('.leftvote'),
	vote_right	= document.querySelector('.rightvote');


//Logs
//console.log(video[0]);
//console.log(bar);
//console.log(cursor);
//console.log(vidsource);
//console.log(barvolume);
//console.log(volcursor);


//On remet le volume à son niveau par défaut (0), il sera mis à la valeur de volume_user au hover (pour ne pas confondre le son des deux vidéos)
for (n=0; n<video.length; n++){  //On utilise ici une boucle pour accéder à tous les évènements de l'array qui sélectionne les vidéos
video[n].volume = 0;
}

//Mais le volume affiché à l'user est de 0.5 par défaut
volume_user = 0.5;
 

//Listen to video events
video[0].addEventListener('play', function(){play_button.innerHTML=('Pause');});
video[0].addEventListener('pause', function(){play_button.innerHTML=('Play');});
video[0].addEventListener('seeking', function(){});
video[1].addEventListener('play', function(){play_button.innerHTML=('Pause');});
video[1].addEventListener('pause', function(){play_button.innerHTML=('Play');});
video[1].addEventListener('seeking', function(){console.log('is seeking');});

duration.innerHTML = "00:"+Math.ceil(video[0].duration);



video[0].onmouseover = function(){
	video[0].volume= volume_user;
	//console.log('je suis ton père');
}
video[0].onmouseout = function(){
	video[0].volume = 0;
	//console.log('Je ne suis plus ton père');
}
video[1].onmouseover = function(){	
	video[1].volume = volume_user;
	//console.log('Je suis ton père')
}
video[1].onmouseout = function(){
	video[1].volume = 0;
	//console.log('Je ne suis plus ton père');
}

//Fin du volume au hover


//Gestion de la barre de volume et du mute
volume_mute.onclick = function(){

	switch(true) {
    case volume_user > 0:
    	previous_volume = volume_user;
        volume_user = 0;
        volcursor.style.width = 0;
        console.log(previous_volume);
        volume_mute.innerHTML='Unmute';
        volume_mute.blur();	//cette ligne permet d'enlever le focus du bouton, pour rendre à la touche espace sa fonction unique : le play/pause
        break;
    case volume_user===0:
		volume_user = previous_volume;
		pos = volume_user * 100
		volcursor.style.width = pos + '%';
		volume_mute.innerHTML='Mute';
		previous_volume=0;
		volume_mute.blur();
        break;
}
};

barvolume.onclick = function(c){

	var ratio = c.offsetX / barvolume.offsetWidth;
		
		volume_user = ratio * 1;

	var	pos = volume_user * 100;

		volcursor.style.width = pos + '%';
		console.log(volume_user);

}

//Fin des commandes de volume

play_button.onclick = function(){


	if (video[0].paused){
		
		for (n=0; n<video.length; n++){
			video[n].play();
		}
		play_button.blur();
		
		//play_button.className ='play_pause paused';
	}

	else {
		for (n=0; n<video.length; n++){
			video[n].pause();
		}
		play_button.blur();
		
		//play_button.className ='play_pause running';

	}

};

bar.onclick = function(e)
{
		var ratio = e.offsetX / bar.offsetWidth,
			time  = video[0].duration * ratio,
			pos   = ratio * 100;

for (n=0; n<video.length; n++){
			video[n].currentTime=time;
		}
	cursor.style.width=pos + "%";
};

window.setInterval(function()
{
    // Calcul le pourcentage de vidéo déjà passé
    var currentpercent = (video[0].currentTime / video[0].duration) * 100;

    // Met à jour la bar de lecture
    cursor.style.width = currentpercent + '%';
},50);

window.setInterval(function()
{
	var time=video[0].currentTime;

	time_elapsed.innerHTML="00:"+Math.ceil(time);


},50);

vote_left.onclick = function(){
	vote_left.innerHTML = 'Vous avez voté pour la vidéo de gauche';
	vote_right.innerHTML = "Voter pour la vidéo de droite";
};
vote_right.onclick = function(){
	vote_right.innerHTML = 'Vous avez voté pour la vidéo de droite';
	vote_left.innerHTML = "Voter pour la vidéo de gauche";
};


function keycode(i){

	//console.log(i);

	switch (i.keyIdentifier) {
		case 'Left':
				vote_left.innerHTML = 'Vous avez voté pour la vidéo de gauche';
				vote_right.innerHTML = "Voter pour la vidéo de droite";
			break;
		case 'Right':
				vote_right.innerHTML = 'Vous avez voté pour la vidéo de droite';
				vote_left.innerHTML = "Voter pour la vidéo de gauche";
			break;
		case 'U+0020':
			console.log('Espace was pressed');

			if (video[0].paused){
		
				for (n=0; n<video.length; n++){
					video[n].play();
					}
				play_button.blur();
					
				//play_button.className ='play_pause paused'; utilisé plus tard pour modifier l'image, quand celle-ci sera prête
				}

			else {
				for (n=0; n<video.length; n++){
						video[n].pause();
					}
				play_button.blur();
					
				//play_button.className ='play_pause running'; utilisé plus tard pour modifier l'image

				};

			break;
		default :
			console.log('An irrelevant key was pressed');
			break;

};
};
