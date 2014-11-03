var video       = document.getElementById('video'),
    volume_down = document.querySelector('.volume-down'),
    volume_up   = document.querySelector('.volume-up'),
    play_pause  = document.querySelector('.b-play'),
    barre       = document.querySelector('.barre');


play_pause.onclick = function()
{
	if(video.paused)
	{
		video.play();
		play_pause.innerHTML = '▌▌';
	}
	
	else
	{
		video.pause();
		play_pause.innerHTML = '►';
	}
}


barre.onclick = function(e)
{
	var ratio = e.offsetX / barre.offsetWidth,
	    time  = ratio * video.duration;

	video.currentTime = time;
};


volume_down.onclick = function()
{
	if (video.volume - 0.1 < 0)
		video.volume = 0;
	else
		video.volume -= 0.1;
};

volume_up.onclick = function()
{
	if (video.volume + 0.1 > 1)
		video.volume = 1;
	else
		video.volume += 0.1;
};