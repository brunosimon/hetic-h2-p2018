var video = document.getElementById('video'),
	//volume_down = document.querySelector('.volume-down'),
	//volume_up = document.querySelector('.volume-up'),
	toggle = document.querySelector('.toggle'),
	bar = document.querySelector('.bar'),
	cursor = document.querySelector('.cursor'),
	soundbar = document.querySelector(".soundbar"),
	cursorsound = document.querySelector(".cursorsound"),
	time = video.currentTime;


video.addEventListener('play', function(){
	console.log('play');
	toggle.style.backgroundImage = "url('src/img/pause.png')";
});

video.addEventListener('pause', function(){
	console.log('pause');
	
	toggle.style.backgroundImage = "url('src/img/play.png')";
	});



//Play et Pause sur le même bouton
toggle.onclick =function()
{ 
	// console.log('toggle');
	if(video.paused)
		{ 
		//console.log('audio is paused');
		video.play();
		}
	else //audio is playing
		//console.log('audio is playing');
		video.pause();
		
};

// Pouvoir avancer la vidéo en cliquant sur la barre

bar.onclick=function(e){ 

	var ratio= e.offsetX / bar.offsetWidth;
	time = ratio * video.duration;

	video.currentTime = time;
	 
	console.log(e.clientX); //nous annonce la position du curseur
	console.log(time); //Nous annonce où on en est dans la vidéo
	}

// Mise à jour de tous les éléments de la vidéo qui change en fonction de son avancement

video.ontimeupdate = function(){
	var percent = (video.currentTime / video.duration) * 100;

	document.querySelector('#progressTime').textContent = formatTime(video.currentTime); // c'est surement cette ligne qui est mal placée..
 	
 	cursor.style.width = percent + '%'; 
	}

// Pouvoir augmenter le son en cliquant sur la barre Mais je n'ai pas réussis à le faire fonctionner Firefox. 
soundbar.onclick=function(e){ 
	var ratiosound = e.offsetX / soundbar.offsetWidth;
	console.log(ratiosound);
	
	video.volume = ratiosound;
	console.log(e.offsetX);
	
	var percent = video.volume * 100;
	cursorsound.style.width = percent + '%'; 
	 
}

// TIMER 

function formatTime(time) {
    
    var mins  = Math.floor((time % 3600) / 60);
    var secs  = Math.floor(time % 60);
	
    if (secs < 10) { secs = "0" + secs;}
	if (mins < 5) {  mins = "0" + mins;}
		
        return  mins + ":" + secs; // affiche le résultat en min et sec
    } 

// Mettre en route et stopper la vidéo en cliquant n'importe où dessus 

video.onclick =function()
{ 
	// console.log('toggle');
	if(video.paused)
		{ 
		//console.log('audio is paused');
		video.play();
		}
	else //audio is playing
		//console.log('audio is playing');
		video.pause();
		
};




