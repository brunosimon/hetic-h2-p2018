var video = document.getElementById('video');
volume_down = document.querySelector('.volume-down');
volume_up = document.querySelector('.volume-up');
toggle = document.querySelector('.toggle');
restart = document.querySelector('.restart');
bar = document.querySelector('.bar');
playedBar = document.querySelector('.playedBar');
fullscreen = document.querySelector('.fullscreen');
totalDuration = document.getElementById('totalDuration');
player = document.getElementById('player');
percentDuration = document.getElementById('percentDuration');
timeDuration = document.getElementById('timeDuration');
cursorPlay = document.querySelector('.cursorPlay');
cursorTime = document.querySelector('.cursorTime');
timeDuration = document.getElementById('timeDuration');
volume = document.querySelector('.volume');
stats = document.querySelector('.stats');
infos = document.querySelector('.infos');
var clic = 0;
var percent;
time = 0;
/*Dès que cet événement se produit, j'appelle cette fonction.
C'est le meilleur moyen de changer l'icône*/

video.addEventListener('play', function(){
	console.log('PLAY');
});

video.addEventListener('pause', function(){
	toggle.innerHTML = "<img id='play_btn' src='src/videos/ic_play_arrow_white_18dp.png'/>";

});
//---------- FONCTION POUR MUTER LE SON --------------
volume.addEventListener('click', function (e)
{
    e = e || window.event;
    video.muted = !video.muted;
    e.preventDefault();
    if(video.muted)
    {
    	volume.innerHTML = "<img id='volume' src='src/videos/ic_volume_off_white_18dp.png'/>";
    }
    else
    {
    	volume.innerHTML = "<img id='volume' src='src/videos/ic_volume_down_white_18dp.png'/>";
    }
}, false);
//-----------------------------------------------------

 volume_down.onclick = function()
 {
 	console.log('click');
 	if(video.volume - 0.1 < 0)
 		{
 			video.volume = 0;
 		}
 		else video.volume-=0.1;
 }

  volume_up.onclick = function()
 {
 	console.log('click');
 	if(video.volume + 0.1 >1)
 	{
 		video.volume = 1;
 	}
 	else video.volume+=0.1;
 }

 toggle.onclick = function()
 {
 	if(video.paused)
 	{	
 		//Si la vidéo est en pause, je fais apparaitre le bouton play
 		toggle.innerHTML = "<img id='play_btn' src='src/videos/ic_pause_white_18dp.png'/>";
 		console.log('video is played');
 		video.play();
 	}
 	else if(video.play)
 	{	
 		//Si la vidéo est en lecture, je fais apparaitre le bouton pause
 		toggle.innerHTML = "<img id='play_btn' src='src/videos/ic_play_arrow_white_18dp.png'/>";
 		console.log('video is paused');
 		video.pause();	
 	}
 }

// Infos du player qui apparaissent si on clique sur l'icône "infos"
infos.onclick = function()
{
	if(clic==0)
	{
		stats.style.display = "block";
		clic=1;
	}
	else if(clic==1)
	{
		stats.style.display = "none";
		clic=0;
	}
}

 restart.onclick = function()
 {
 	//Remet la lecture de la vidéo à 0:00
 	video.currentTime = 0;
 }

bar.onclick = function()
{
	var x = xMousePos - bar.offsetLeft;
		ratio = cursorHoverTime / bar.offsetWidth;
		time  = ratio * video.duration;
 
	video.currentTime = time;
};

//------------ Affiche le pourcentage de vidéo joué, ainsi que le curseur----
window.setInterval(function()
{

    // Calcul le pourcentage de vidéo déjà passé
    percent = (video.currentTime / video.duration) * 100;
    // Met à jour la bar de lecture
    playedBar.style.width = percent + '%';
    cursorPlay.style.marginLeft = percent-1 + '%';
   percentDuration.innerHTML = "Pourcentage joué : " + Math.floor((video.currentTime / video.duration) * 100)+ "%";
   timeDuration.innerHTML = Math.floor(video.currentTime)+"s /";
   totalDuration.innerHTML = " "+Math.floor(video.duration)+"s";
},50);


// --------------- FONCTION FULLSCREEN ---------------

fullscreen.onclick = function()
{
	toggleFullScreen();
}

function toggleFullScreen() {
	document.getElementById( 'myHeader' ).style.display = 'none';
	document.getElementById( 'separator' ).style.display = 'none';
	player.style.width="100%";
	video.style.width="100%"; 
  if (!document.fullscreenElement &&    // alternative standard method
      !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
    if (document.documentElement.requestFullscreen) {
      document.documentElement.requestFullscreen();
    } else if (document.documentElement.msRequestFullscreen) {
      document.documentElement.msRequestFullscreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) {
      document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
  	document.getElementById( 'myHeader' ).style.display = 'block';
  	document.getElementById( 'separator' ).style.display = 'block';
  	player.style.width="1020px";
	video.style.width="1020px"; 
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
      document.getElementById( 'separator' ).style.display = 'block';
    }
  }
}

// Fonction pour permettre l'information au survol d
var xMousePos = 0;
var actualTime = 0;
var cursorHoverTime = 0;
document.onmousemove = function(e)
{
  xMousePos = e.clientX + window.pageXOffset;
  yMousePos = e.clientY + window.pageYOffset;
}

bar.onmousemove = function()
{
  var x = xMousePos - bar.offsetLeft;
  bar.style.cursor='pointer';
  document.getElementById("message").innerHTML = "Pos x = " + x + "/" + bar.offsetWidth;
  cursorHoverTime = x;
  cursorTime.innerHTML = Math.floor(x*100/bar.offsetWidth)+"%";
  cursorTime.style.left = (x- 5)+'px';
}
// ---------------------------------------------------------