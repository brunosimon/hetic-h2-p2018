// Variables

var video	 = document.getElementById('video'),
volume_down  = document.querySelector('.volume-down'),
volume_up    = document.querySelector('.volume-up'),
mute         = document.querySelector('.mute'),
play         = document.querySelector('.play'),
sound        = video.volume,
restart      = document.querySelector('.restart')
skip         = document.querySelector('.skip'),
rewind       = document.querySelector('.rewind'),
speed        = document.querySelector('.speed'),
normal       = document.querySelector('.normal'),
slow         = document.querySelector('.slow'),
full         = document.querySelector('.full-screen'),
full_value   = false,
sound_bar    = document.querySelector('.sound-bar'),
all          = document.querySelector('.all'),
time         = video.currentTime,
slider       = document.querySelector(".slider-time"),
current      = document.querySelector(".current"),
duration     = document.querySelector(".duration"),
control      = document.querySelector('.control');

// Functions

duration.innerHTML = "00:00";

play.onclick = function ()
{
	if(video.paused)
		video.play();
	else
		video.pause();
};

volume_up.onclick = function()
{
	if(video.volume + 0.1 > 1)
		video.volume = 1;
	else
	{
		video.volume += 0.1;
		sound = video.volume;
		sound_bar.value = sound *10;
	}
	
};

volume_down.onclick = function()
{
	if(video.volume - 0.1 < 0)
		video.volume = 0;
	else
	{
		video.volume -= 0.1;
		sound = video.volume;
		sound_bar.value = sound *10;
	}
		
};

mute.onclick = function()
{
	if(video.volume == 0)
	{
		video.volume = sound;
		sound_bar.value = sound *10;
	}	
	else
	{
		if(sound!=sound)
			sound = video.volume;
		video.volume = 0;
		sound_bar.value = 0;


	}
	
};

restart.onclick = function()
{
	video.currentTime = 0;
};

skip.onclick = function()
{
	video.currentTime += 2;
};

rewind.onclick = function()
{
	video.currentTime -= 2;
};

speed.onclick = function()
{
	video.playbackRate += .25;
};

normal.onclick = function()
{
	video.playbackRate = 1;
};

slow.onclick = function()
{
	if(video.playbackRate - .25 > 0 )
		video.playbackRate -= .25;
};

full.onclick = function()
{
	if (video.requestFullScreen)
		all.requestFullScreen();
	else if (video.mozRequestFullScreen) 
		all.mozRequestFullScreen();
	else if (video.webkitRequestFullScreen) 
		all.webkitRequestFullScreen();

	full_value = true;

};

// Event Listeners

video.addEventListener('play', function(){
	play.innerHTML = 'll';
});

video.addEventListener('pause', function(){
	play.innerHTML = '>'
});

slider.addEventListener('change',function(){
	video.currentTime = video.duration * (slider.value / 100);
});

video.addEventListener('timeupdate',function(){
	var new_time 	  = video.currentTime * (100 / video.duration),
		mins 	 	  = Math.floor(video.currentTime / 60),
	    secs     	  = Math.floor(video.currentTime - mins * 60),
		duration_mins = Math.floor(video.duration / 60),
		duration_secs = Math.floor(video.duration - duration_mins * 60);

	slider.value = new_time;
	if(secs < 10)
		secs = "0"+secs; 
	if(duration_secs < 10)
		duration_secs = "0"+duration_secs;
	if(mins < 10)
		mins = "0"+ mins;
	if(duration_mins < 10)
		duration_mins = "0"+duration_mins;
	current.innerHTML = mins+":"+ secs;
	duration.innerHTML = duration_mins+":"+duration_secs;
});

sound_bar.addEventListener('change',function(){
	video.volume = sound_bar.value / 10;

});
