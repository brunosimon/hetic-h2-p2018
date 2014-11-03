//On récupère les variables
var video       = document.getElementById('video'),
	volume_down = document.querySelector('.volume-down'),
	volume_up   = document.querySelector('.volume-up'),
	play_pause  = document.querySelector('.play-pause'),
	bar         = document.querySelector('.bar'),
	screen_size = document.querySelector('.screen-size'),
	container   = document.querySelector('.container'),
	current     = document.querySelector('.current'),
	back        = document.querySelector('.back'),
	forward     = document.querySelector('.forward');

// Logs pour tester les variables
console.log(volume_down);
console.log(volume_up);
console.log(play_pause);
console.log(bar);
console.log(screen_size);
console.log(container);
console.log(current);
console.log(back);
console.log(forward);


//Gestion du volume
volume_down.onclick = function() {
	if(video.volume - 0.1 < 0)
		video.volume = 0;
	else
		video.volume -= 0.1;
};

volume_up.onclick = function() {
	if(video.volume + 0.1 > 1)
		video.volume = 1;
	else
		video.volume += 0.1;
};

// Gestion du play/pause
play_pause.onclick = function() {
	if(video.paused == false)
	{
		video.pause();
	}
	else
	{
		video.play();
	}
};

video.addEventListener('play', function(){
	play_pause.innerHTML = "<img src='src/img/pause.png' alt='mignon pause'>";

});

video.addEventListener('pause', function(){
	play_pause.innerHTML = "<img src='src/img/play.png' alt='mignon play'>";
});

// Gestion de la timeline
bar.onclick = function (e) {
	var ratio = e.offsetX / bar.offsetWidth,
		time  = ratio * video.duration;
	video.currentTime = time;
	// Pour le coloriage de la timeline
	bar.querySelector('.current').style.width= e.offsetX+"px";
};
 
// Coloriage de la timeline
video.addEventListener('timeupdate', function () {
var duration = video.duration;
var time = video.currentTime;
var fraction = time / duration;
var percent = Math.ceil(fraction * 100);

bar.querySelector('.current').style.width= percent + "%";
});

// Gestion du mode plein écran
	// Pour que le mode plein écran se quitte même avec echap
document.addEventListener('fullscreenchange', function () {
    if (!document.fullscreen){
    	container.classList.remove('full-screen');
}
}, false);
document.addEventListener('mozfullscreenchange', function () {
    if (!document.mozFullScreen){
    	container.classList.remove('full-screen');
}
}, false);
document.addEventListener('webkitfullscreenchange', function () {
    if (!document.webkitIsFullScreen){
    	container.classList.remove('full-screen');
}
}, false);

	// Pour passer en mode pein écran tout en conservant mon player et non celui du navigateur
screen_size.onclick = function() {
  if (!document.fullscreenElement &&
      !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {
    if (container.requestFullScreen) {  
      container.requestFullScreen();
      container.classList.add('full-screen');
    } else if (container.mozRequestFullScreen) {  
      container.mozRequestFullScreen();
      container.classList.add('full-screen');  
    } else if (container.webkitRequestFullScreen) {  
      container.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
      container.classList.add('full-screen');
    }  
  } else { 
    if (document.exitFullscreen) {
      document.exitFullscreen();
      container.classList.remove('full-screen');
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
      container.classList.remove('full-screen');
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
      container.classList.remove('full-screen');
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
      container.classList.remove('full-screen');
    }  
  }  
};

// Gestion de l'avance rapide 
back.onclick = function() {
	if(video.currentTime - 1 < 0)
		video.currentTime = 0;
	else
		video.currentTime -= 1;
};

forward.onclick = function() {
	if(video.currentTime + 1 > 50)
		video.currentTime = 50;
	else
		video.currentTime += 1;
};
