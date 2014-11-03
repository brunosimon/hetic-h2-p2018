// Get DOM elements
var video			= document.querySelector('.video'),
	volume_down  	= document.querySelector('.volume-down'),
	volume_up	 	= document.querySelector('.volume-up'),
	toggle		 	= document.querySelector('.toggle'),
	bar    		 	= document.querySelector('.bar'),
	cursor		 	= document.querySelector('.cursor'),
	bar_volume	 	= document.querySelector('.bar-volume'),
	cursor_volume	= document.querySelector('.cursor-volume'),
	volume_mute	 	= document.querySelector('.volume-mute'),
	volume_user		= 0,
	video_user		= 0,
	video_time		= 0,
	hours			= 0,
	mins			= 0,
	secs			= 0,
	counter			= document.querySelector('.counter'),
	remove      	= document.querySelector('.remove'),
	full_video		= document.querySelector('.full-video'),
	full_screen		= document.querySelector('.full-screen'),
	low_quality		= document.querySelector('.low-quality'),
	medium_quality 	= document.querySelector('.medium-quality'),
	hight_quality	= document.querySelector('.hight-quality'),
	hd 				= document.querySelector('.hd');


//listen to video events 
video.addEventListener('play', function(){
	toggle.innerHTML="pause";
});

video.addEventListener('pause', function(){
	toggle.innerHTML="play";
});

// changer l'URL de la vidéo 
low_quality.addEventListener('click', function() {
    document.getElementById("source").src = "src/media/videos/Minions-240p.mp4";
    document.getElementById("source_webm").src = "src/media/videos/Minions-240p.webm";
    document.getElementById("source_ogv").src = "src/media/videos/Minions-240p.ogv";
    video.load();
    toggle.innerHTML="play";
});

medium_quality.addEventListener('click', function() {
    document.getElementById("source").src = "src/media/videos/Minions-360p.mp4";
    document.getElementById("source_webm").src = "src/media/videos/Minions-360p.webm";
    document.getElementById("source_ogv").src = "src/media/videos/Minions-360p.ogv";
    video.load();
    toggle.innerHTML="play";
});

hight_quality.addEventListener('click', function() {
    document.getElementById("source").src = "src/media/videos/Minions-720p.mp4";
    document.getElementById("source_webm").src = "src/media/videos/Minions-720p.webm";
    document.getElementById("source_ogv").src = "src/media/videos/Minions-720p.ogv";
    video.load();
    toggle.innerHTML="play";
});

// Ecoute quand le fullscreen change
video.addEventListener('video.onwebkitfullscreenchange', function(){
});
video.addEventListener('video.onfullscreenchange', function(){
});
video.addEventListener('video.onmozfullscreenchange', function(){
});


//Listen to click events : song 
volume_down.onclick = function()
{
	if(video.volume -0.1 < 0 )
		{video.volume= 0;
	}

	else{
		video.volume -= 0.1; 
	}
};

volume_up.onclick = function()
{
	if(video.volume +0.1 > 1 ){
		video.volume= 1;
	}

	else{
		video.volume += 0.1;
	}		
};

// function play/pause : 
toggle.onclick = function()
{
	if (video.paused) 
	{video.play();
	}

	else {
		video.pause();
	}
};

//fonction barre d'état :
bar.onclick = function(e){
	var ratio = e.offsetX / bar.offsetWidth,
		time  = ratio * video.duration;

video.currentTime = time;
};

// Evolution du curseur en fonction de l'avancement de la vidéo. 
window.setInterval(function() {
	var percent = (video.currentTime / video.duration) * 100; 
	cursor.style.width = percent + '%'; // concaténation pour modifié le style de la taille du "cursor". 
},50);

//fonction remove : Une condition switch est utiliser pour permettre de retrourner à la position précédente en appuyant à nouveau sur le bouton. 
remove.onclick = function(){
		switch(true) { 
	case video.currentTime > 0: 
		video_user=video.currentTime;
		video.pause();
		innerHTML="return";
		video.currentTime=0;
		break;

	case video.currentTime===0:
		video.currentTime=video_user;
		innerHTML="remove";
		video_user=0;
	}
};

// function mute : 
volume_mute.onclick = function(){	
 // On utilise ici une condition en Switch pour un soucis d'ergonomie. 
        switch(true) { // On initialise un booléen true pour pouvoir utiliser la variable video.volume dans la condition.  
    case video.volume > 0: //Condition si le volume est supérieur à 0 
        volume_user=video.volume; //On donne à la variable video.user le volume en cour. 
        video.volume=0; //le volume prend la valeur 0.
        volume_mute.innerHTML="song"; 
        break; 

    case video.volume===0: // Condition si le volume est égual à 0 
        video.volume=volume_user; // On ressort le volume enregistré précédement 
        volume_mute.innerHTML="mute"
        volume_user=0; // On réinitialise la variable. 
 
        break;
	}
};

//fonction barre d'état du son :
bar_volume.onclick = function(v){ // "e" en paramètre permet de récupérerl'emplacement du clique (ici sur l'axe X grace à offsetX)
	var ratio = v.offsetX / bar_volume.offsetWidth, // récuperer la position du clique sur la bare d'état. 
		time  = ratio * 1;

video.volume = time; // on affecte la position du curseur au volume en cour. 
};

//Evolution du curseur du son : 
window.setInterval(function(){
	var percent_volume = (video.volume/1) * 100;
	cursor_volume.style.width = percent_volume + '%';
},50);

// Afficher le temps de la vidéo. 
window.setInterval(function() {
	var video_time = video.currentTime,
		video_duration = video.duration,
    	hours = Math.floor(video_time / 3600), // Convertir en heures
    	mins  = Math.floor((video_time % 3600) / 60), // Convertir en minutes
    	secs  = Math.floor(video_time % 60), // convertir en secondes
    	hours_duration = Math.floor(video_duration / 3600), // Convertir en heures
    	mins_duration  = Math.floor((video_duration % 3600) / 60), // Convertir en minutes
    	secs_duration  = Math.floor(video_duration % 60); // convertir en secondes
	
    if (secs < 10) {
        secs = "0" + secs;
    }
	
    if (hours) {
        if (mins < 10) {
            mins = "0" + mins;
        }
		
        return counter.innerHTML=hours + ":" + mins + ":" + secs + "/" + hours_duration + ":" + mins_duration + ":" + secs_duration;// hh:mm:ss
    } else {
        return counter.innerHTML=mins + ":" + secs + "/" + mins_duration + ":" + secs_duration; // mm:ss
    }
},500);

// Fullscreen au click 
full_screen.onclick = function(){
	if(video.requestFullScreen) { // Test pour les différents navigateurs
		video.requestFullScreen();
		 document.getElementById("source").src = "src/media/videos/Minions.mp4";
		 video.load();
		 video.play();
		 video.volume=1;
	}
	else if (video.mozRequestFullScreen){
		video.mozRequestFullScreen();
		 document.getElementById("source_webm").src = "src/media/videos/Minions.webm";
		 video.load();
		 video.play();
		 video.volume=1;
	}
	else if (video.webkitRequestFullScreen){	
		video.webkitRequestFullScreen();}
		 document.getElementById("source_ogv").src = "src/media/videos/Minions.ogv";
		 video.load();
		 video.play();
		 video.volume=1;
};

// Enlever le fullscreen au doubleclick : 
video.ondblclick = function(){
	if(document.webkitIsFullScreen===false) {
		video.webkitRequestFullScreen();
		 document.getElementById("source").src = "src/media/videos/Minions.mp4";
		 video.load();	 
		 video.play();
		 video.volume=1;
	}
	else if(document.mozIsFullScreen===false) {
		video.mozRequestFullScreen();
		 document.getElementById("source_webm").src = "src/media/videos/Minions.webm";
		 video.load();
		 video.play();
		 video.volume=1;
	}	
	else if(document.IsFullScreen===false) {
		video.mozRequestFullScreen();
		 document.getElementById("source_ogv").src = "src/media/videos/Minions.ogv";
		 video.load();
		 video.play();
		 video.volume=1;
	}		
	else if (document.webkitIsFullScreen) {
		document.webkitCancelFullScreen();
	}
	else if (document.mozIsFullScreen) {
		document.mozCancelFullScreen();
	}
	else if (document.IsFullScreen) {
		document.CancelFullScreen();
	}
};

// Mettre en pause au click : 
video.onclick = function(){
	if (video.paused) 
	{video.play();
	}

	else {
		video.pause();
	}
};







