
var video       = document.getElementById('video'),
    volume_down = document.querySelector('.volume-down'),
    volume_up   = document.querySelector('.volume-up'),
    toggle      = document.querySelector('.toggle'),
	bar         = document.querySelector('.bar'),
	full        = document.querySelector('full');

console.log(volume_down);
console.log(volume_up);
console.log(toggle);


video.addEventListener('play',function(){
	toggle.innerHTML = 'pause';
});

video.addEventListener('pause',function(){
	toggle.innerHTML = 'play';
});

/* les fonctions click des boutons */

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

toggle.onclick = function()
{
	if (video.paused)
		video.play();
	else 
		video.pause();
};

bar.onclick = function(e)
{
	var ratio = e.clientX / bar.offsetWidth,
		time  = ratio * video.duration;

	video.currentTime = time;
};

function Fullscreen(element) {
        if(element.requestFullScreen) {
                element.requestFullScreen();
      
        } else if(element.webkitRequestFullScreen) {
                element.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
      
        } else if(element.mozRequestFullScreen){
                element.mozRequestFullScreen();
        }
 }



















