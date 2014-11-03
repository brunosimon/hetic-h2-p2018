//get DOM elements
var video       = document.getElementById('video'),           //on récupère notre video grâce à son ID
	toggle      = document.querySelector('.toggle'),          //on récupère le bouton toggle 
	volume_down = document.querySelector('.volume-down'),     
    volume_up   = document.querySelector('.volume-up'),
    full_screen = document.querySelector('.full-screen');


//logs
console.log(toggle); //affiche message dans la console
console.log(volume_down);
console.log(volume_up);
console.log(full_screen);



//button's work (play/pause)
toggle.onclick = function(){
	//video paused
	if (video.paused){
		video.play();
		console.log('video is paused'); //affiche etat de la video dans la console
	}
	//video playing
	else{
		video.pause();
		console.log('video is playing');  
	}

};

// buttons's work (sound volume)
volume_down.onclick = function(){       
	if(video.volume - 0.1 < 0)
		video.volume = 0;
	else
		video.volume -= 0.1;   
};      

volume_up.onclick = function(){
	if(video.volume + 0.1 > 1)
		video.volume = 1;
	else
		video.volume += 0.1;
};

//button's work (full screen)
full_screen.onclick = function(){
	if(video.requestFullScreen){       
      video.requestFullScreen();       //permet de demander à la video de se mettre en plein ecran
    }                                  
    else if(video.webkitRequestFullScreen){
      video.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  //permet à la fonction de marcher sous chrome
    }
    else{
      alert('Votre navigateur ne supporte pas le mode plein écran'); //message d'erreur si non navigateur compatible avec la fonction
    }
}



//watch to video events on the button
video.addEventListener('play', function(){           //l'état du bouton change en fonction de l'etat de la video
	toggle.innerHTML = "Pause";
});
video.addEventListener('pause', function(){
	toggle.innerHTML = "Play";
});









  