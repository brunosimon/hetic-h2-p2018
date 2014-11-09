var video 	   = document.getElementById('video'),
	playPause = document.querySelector('.playPause');
	soundMute = document.querySelector('.soundMute');
	container = document.querySelector('.container')



 //button play/pause

	playPause.className ='play'

	video.addEventListener('play', function() {
		playPause.className = 'pause';
	});

	video.addEventListener('pause', function() {
		playPause.className = 'play';
	})


	playPause.onclick = function(){
		if (video.paused) {
			video.play()
		}
		else {
			video.pause()
	}
	l
	return false;
	};

 //button sound/mute 

	soundMute.className ='sound'

	video.addEventListener('sound', function() {
		soundMute.className = 'sound';
	});

	video.addEventListener('mute', function() {
		soundMute.className = 'mute';
	})


	soundMute.onclick = function(){
		if (soundMute.className == 'sound') {
			soundMute.className ='mute'
			video.volume=0
		}
		else {
			soundMute.className ='sound'
			video.volume=1
	}
	};

	

 //time declaration
	function setTime(tValue) {
	    try {
	        if (tValue == 0) {
	            video.currentTime = tValue;
	        }
	        else {
	            video.currentTime += tValue;
	        }
	        
	     } catch (err) {
	     ;
	   }
	}

 //backward 10sec
    document.querySelector(".backward").addEventListener("click", function () {
        setTime(-1);
        video.pause()
    }, false);

 //forward 10sec
    document.querySelector(".forward").addEventListener("click", function () {
        setTime(1);
        video.pause()
    }, false);

 //slow-motion
	document.querySelector(".slowMo").addEventListener("click", function () {
	    video.playbackRate -= .10;
    }, false);

 //speed-motion
	document.querySelector(".speedMo").addEventListener("click", function () {
	    video.playbackRate += .10;
    }, false);


 //basic class
	 video.className= "normal" 
	 container.className= "container",
	 document.querySelector(".normalscreen").style.display = 'none' ;

 //fullscreen
 	document.querySelector(".fullscreen").addEventListener("click", function () {
	    video.className= "full",
	    container.className= "containerfull",
	    document.querySelector(".fullscreen").style.display = 'none' ;
	    document.querySelector(".normalscreen").style.display = 'inline-block' ;
	    document.querySelector(".title").style.display = 'none' ;
    }, false);

 //normalscreen
 	document.querySelector(".normalscreen").addEventListener("click", function () {
	    video.className= "normal",
	    container.className= "container",
	    document.querySelector(".normalscreen").style.display = 'none' ;
	    document.querySelector(".fullscreen").style.display = 'inline-block' ;
	    document.querySelector(".title").style.display = 'inline-block' ;
    }, false);

 //click on the bar to change time
	bar.onclick = function(e)
	{
    var ratio   = e.offsetX / bar.offsetWidth,
        current = video.duration * ratio;
    video.currentTime = current;
	};

 // cursor who show the time
	window.setInterval(function()
	{
	    var percent = (video.currentTime / video.duration) * 100;
		cursor.style.width = percent + '%';
	},50);

 // play when we press space key

 	window.addEventListener("keypress", checkKeyPressed, false);
 
	function checkKeyPressed(e) {
		console.log('ok');
	    if (e.charCode == "32") {
	        if (video.paused) {
				video.play()
			}
			else {
				video.pause()
			}
	 	}
	}

 // play when video is clicked

 	video.onclick = function(){
	if (video.paused) {
		video.play()
	}
	else {
		video.pause()
	}
	};

//  click on the bar to change sound
	soundBar.onclick = function(e)
	{
    var current   = e.offsetX / soundBar.offsetWidth;
    video.volume = current;
	};

 // cursor who show the sound
	window.setInterval(function()
	{
	    var percent = (video.volume / 1) * 100;
		soundCursor.style.width = percent + '%';
	},50);