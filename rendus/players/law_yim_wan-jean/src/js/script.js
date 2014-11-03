// GET DOM ELEMENTS

var video  	    = document.querySelector('.video'),
	toggle	    = document.querySelector('.play_pause'),
	play_pause  = document.querySelector('#play_pause'),
	toggle_vol  = document.querySelector('.volume'),
	volume_btn  = document.querySelector('#volume'),
	volume_down = document.querySelector('.volume-down'),
	volume_up   = document.querySelector('.volume-up'),
	stop	    = document.querySelector('.stop'),
	loop	    = document.querySelector('.repeat'),
	rewind	    = document.querySelector('.rewind'),
	forward	    = document.querySelector('.forward'),
	bar 	    = document.querySelector('.nav-bar');

// LISTEN TO VIDEO EVENTS

video.addEventListener('play', function(){
	play_pause.src ="src/img/pause.svg";
});

video.addEventListener('pause', function(){
	play_pause.src ="src/img/play.svg";
	if((video.currentTime == video.duration) && (video.loop="false")) {
		window.location.reload();
	}
});

	// WHEN CLICKING ON PLAY PAUSE BUTTON OR ON THE VIDEO

toggle.onclick = function() {
	if(video.paused)
		video.play();
	else
		video.pause();
};

video.onclick = function() {
	if(video.paused)
		video.play();
	else
		video.pause();
};

	// WHEN CLICKING ON STOP BUTTON

stop.onclick = function() {
	video.currentTime = 0;
	video.pause();
};

	// WHEN CLICKING ON MUTE VOLUME BUTTON

toggle_vol.onclick = function() {
	if(video.volume > 0) {
		video.volume = 0;
		volume_btn.src ="src/img/volume-off.svg";
	} else {
		video.volume = 1;
		volume_btn.src ="src/img/volume-mute.svg";
	  }
};

	// WHEN CLICKING ON VOLUME UP OR DOWN BUTTON

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
	// WHEN CLICKING ON LOOP BUTTON

loop.onclick = function() {
	if(video.loop == false) {
		video.loop = true;
		loop.src ="src/img/repeat.svg";
	} else {
		video.loop = false;
		loop.src ="src/img/no-repeat.svg";
	  }
};

	// WHEN CLICKING ON REWIND OR FORWARD BUTTON

rewind.onclick = function() {
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

	// PROGRESS BAR

function update(video) {
    var duration  = video.duration,
    	time      = video.currentTime,
    	fraction  = time / duration,
    	percent   = Math.ceil(fraction * 100),
    	progress  = document.querySelector('.controler'),
    	timer	  = document.querySelector('.progress-in-controls'),
    	timer_bis = document.querySelector('.progress-time');
	
    progress.style.width  = percent + '%';
    timer.textContent 	  = formatTime(time);
    timer_bis.textContent = formatTime(time);
}

	// PROGRESS TIME

function formatTime(time) {
    var hours = Math.floor(time / 3600);
    var mins  = Math.floor((time % 3600) / 60);
    var secs  = Math.floor(time % 60);
	
    if(secs < 10) {
        secs = "0" + secs;
    }
	
    if(hours) {
        if(mins < 10) {
            mins = "0" + mins;
        }
		
        return hours + ":" + mins + ":" + secs; // hh:mm:ss
    } else {
        return mins + ":" + secs; // mm:ss
    }
}
