// Get DOM elements
var audio       = document.getElementById('audio'),
    volume_down = document.querySelector('.volume-down'),
    volume_up   = document.querySelector('.volume-up'),
    toggle      = document.querySelector('.toggle'),
    bar         = document.querySelector('.bar');

// Logs
console.log(bar);

// Listen to audio events
audio.addEventListener('play',function(){
	toggle.innerHTML = 'pause';
	toggle.style.backgroundColor = 'blue';
});

audio.addEventListener('pause',function(){
	toggle.innerHTML = 'play';
	toggle.style.backgroundColor = 'red';
});

// Listen to clicks events
volume_down.onclick = function()
{
	if(audio.volume - 0.1 < 0)
		audio.volume = 0;
	else
		audio.volume -= 0.1;
};

volume_up.onclick = function()
{
	if(audio.volume + 0.1 > 1)
		audio.volume = 1;
	else
		audio.volume += 0.1;
};

toggle.onclick = function()
{
	if(audio.paused)
		audio.play();
	else
		audio.pause();
};

bar.onclick = function(e)
{
	var ratio = e.clientX / bar.offsetWidth,
		time  = ratio * audio.duration;

	audio.currentTime = time;
};










