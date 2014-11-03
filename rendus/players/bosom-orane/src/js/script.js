//Get DOM elements
var video 		= document.getElementById("video"),
	volume_down = document.querySelector('.volume-down'),
	volume_up	= document.querySelector('.volume-up'),
	toggle_mute	= document.querySelector('.toggle-mute'),
	toggle 		= document.querySelector('.toggle'),
	bar 		= document.querySelector('.bar'),
	screen_size,
	mute 		= {state:false, volume:1};


//Logs
console.log(volume_down);
console.log(volume_up);
console.log(toggle)


//Listen to video events
video.addEventListener('play',function(){
	toggle.innerHTML = '<img src="src/img/pause.png" alt="">';
});

video.addEventListener('pause',function(){
	toggle.innerHTML = '<img src="src/img/play.png" alt="">';
});


//Listen to clicks events
volume_down.onclick = function()
{
	if(video.volume - 0.1 < 0)
		video.volume = 0
	else 
		video.volume -= 0.1;
	mute.volume = video.volume;
	mute.state = false;
	toggle_mute.innerHTML = '<img src="src/img/mute.png">';
};

volume_up.onclick = function()
{
	if(video.volume + 0.1 > 1)
		video.volume = 1
	else
		video.volume += 0.1;
	mute.volume = video.volume;
	mute.state = false;
	toggle_mute.innerHTML = '<img src="src/img/mute.png">';
};

toggle_mute.onclick = function()
{
	// Remove Mute
	if (mute.state) {
		video.volume = mute.volume;
		mute.state = false;
		toggle_mute.innerHTML = '<img src="src/img/mute.png">';
	} else { // Mute the video
		video.volume = 0;
		mute.state = true;
		toggle_mute.innerHTML = '<img src="src/img/sound.png">';
	}
};

toggle.onclick = function()
{
	//Video paused
	if(video.paused)
	{
		video.play();
		
	}

	//Video playing
	else
	{
		video.pause();
		
	}
}

bar.onclick = function(e)
{
	var ratio = e.offsetX / bar.offsetWidth,
		time  = ratio * video.duration;

	video.currentTime = time;
};

//Onclick on video

toggle.onclick= function ()
{
	togglePlay();
};

video.onclick = function () {
	togglePlay();
};

function togglePlay() {
	if (video.paused)
		video.play();
	else
		video.pause();
};


//Fullscreen


function toggleFullScreen() {
  if ((video.fullScreenElement && video.fullScreenElement !== null) ||    
   (!video.mozFullScreen && !video.webkitIsFullScreen)) {
    if (video.requestFullScreen) {  
      video.requestFullScreen();  
    } else if (video.mozRequestFullScreen) {  
      video.mozRequestFullScreen();  
    } else if (video.webkitRequestFullScreen) {  
      video.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (video.cancelFullScreen) {  
      video.cancelFullScreen();  
    } else if (video.mozCancelFullScreen) {  
      video.mozCancelFullScreen();  
    } else if (video.webkitCancelFullScreen) {  
      video.webkitCancelFullScreen();  
    }  
  }  
};


//Moving cursor

	var cursor    = document.querySelector('.cursor');

window.setInterval(function()
{
    var percent = (video.currentTime / video.duration) * 100;
    cursor.style.width = percent + '%';
},50);



