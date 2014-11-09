var video       = document.querySelector('.video'),
	toggle	    = document.querySelector('.play'),
	volume_down = document.querySelector('.volume_down'),
	volume_up   = document.querySelector('.volume_up'),
	stop	    = document.querySelector('.stop'),
	loop	    = document.querySelector('.replay'),
    back	    = document.querySelector('.back'),
	forward	    = document.querySelector('.forward'),
	bar			= document.querySelector('.media_menu');

// listening to video events

video.addEventListener('play', function(){
	toggle.innerHTML = 'Pause';
});

video.addEventListener('pause', function(){
	toggle.innerHTML = 'Play';
});
	

//Play button

toggle.onclick = function() {
	if(video.paused)
		video.play();
	else
		video.pause();
};

// Stop button

stop.onclick = function() {
	video.currentTime = 0;
	video.pause();
};

// Volume up and down

volume_down.onclick = function() {
	if(video.volume - 0.1  >= 0) {
		video.volume -= 0.1;
	} else {
		video.volume = 0;
	  }
};

volume_up.onclick = function() {
	if(video.volume + 0.1  <= 1) {
		video.volume += 0.1;
	} else {
		video.volume = 1;
	  }
};

// Replay button

loop.onclick = function() {
	if(video.loop == false) {
		video.loop = true;
	}
};

// Back and Forward buttons

back.onclick = function() {
	if(video.currentTime - 15 >= 0) {
		video.currentTime -= 15;
	} else {
		video.currentTime = 0;
	  }
};

forward.onclick = function() {
	if(video.currentTime + 15 <= video.duration) {
		video.currentTime += 15;
	} else {
		video.currentTime = video.duration;
	  }
};
