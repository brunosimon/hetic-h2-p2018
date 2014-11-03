// Get DOM elements
var video       = document.getElementById('video'),
	playpause   = document.querySelector('.playpause'),
	bar         = document.querySelector('.bar'),
	mute        = document.querySelector('.mute'),
	volume_up   = document.querySelector('.volume-up'),
	volume_down = document.querySelector('.volume-down'),
	fullscreen  = document.querySelector('.fullscreen');

// Logs
console.log(playpause);
console.log(bar);
console.log(mute);
console.log(volume_up);
console.log(volume_down);
console.log(fullscreen);

// Listen to video events
// video events play/pause
video.addEventListener('play',function(){
	playpause.innerHTML = '||';
	playpause.style.backgroundColor = '#c92f2f';

});

video.addEventListener('pause',function(){
	playpause.innerHTML = 'Play';
	playpause.style.backgroundColor = '#c92f2f';
});

// video events mute/unmute
video.addEventListener('mute',function(){
	mute.innerHTML = 'unmute';
});

video.addEventListener('unmute',function(){
	mute.innerHTML = 'mute';
});

// Listen to clicks events
bar.onclick = function(e)
{
	var ratio = e.clientX / bar.offsetWidth,
		time  = ratio * video.duration;

	video.currentTime = time;
};

playpause.onclick = function()
{
	if(video.paused)
		video.play();
	else
		video.pause();
};

mute.onclick = function()
{
	if(video.muted)
		video.muted = false;
	else
		video.muted = true;
};


volume_down.onclick = function()
{
	if(video.volume - 0.1 < 0)
		video.volume = 0;
	else
		video.volume -= 0.1;
};

volume_up.onclick = function()
{
	if(video.volume + 0.1 > 1)
		video.volume = 1;
	else
		video.volume += 0.1;
};

//full screen
fullscreen.onclick = function()
{
	if (video.requestFullscreen) {
    	video.requestFullscreen();
	} else if (video.webkitRequestFullscreen) {
    	video.webkitRequestFullscreen();
	} else if (video.mozRequestFullScreen) 
    	video.mozRequestFullScreen();
};












