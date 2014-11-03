/*déclaration des variables*/
var video = document.getElementById('video'),
	mute = document.querySelector('.mute')
	volume_down = document.querySelector('.volume-down'),
	volume_up = document.querySelector('.volume-up'),
	playpause = document.getElementById('.toggle'),
	bar = document.querySelector('.bar'),
	timecontrol = document.querySelector('.timecontrol'),
	cursor = document.getElementById('.progressBar'),
	stop = document.querySelector('.stop'),
	replay = document.querySelector('.replay'),
	forward = document.querySelector('.avancer'),
	backward = document.querySelector('.reculer');
/*fonctions au clic sur les bouttons*/
mute.onclick = function()
{
	console.log ('test muet');
	if(video.muted)
	{
		video.muted = false;
		mute.innerHTML = 'Muet';
	}
	else
	{
		video.muted = true;
		mute.innerHTML = 'Son';
	}
}
volume_down.onclick = function()
{
	console.log('volume down test');
	if(video.volume - 0.1 < 0)
		video.volume = 0;
	else
	video.volume -= 0.1;
};
volume_up.onclick = function()
{
	console.log('volume up test');
	if(video.volume + 0.1 > 1)
		video.volume = 1;
	else
	video.volume += 0.1;
};
replay.onclick = function()
{
	console.log('replay test');
	video.currentTime = 0;
	video.play();
};
stop.onclick = function()
{
	console.log('stop test');
	video.pause();
	video.currentTime = 0;
};
forward.onclick = function()
{
	console.log('test forward');
	video.currentTime+=2;
}
backward.onclick = function()
{
	console.log('test backward');
	video.currentTime-=2;
};
/*les toggle play/pause et muet*/
toggle.onclick = function()
{
	if(video.paused)
	{
		video.play();
	}
	else{
		video.pause();
	}
};
video.onclick = function()
{
		if(video.paused)
	{
		video.play();
	}
	else{
		video.pause();
	}
}
/*Eventlistener pour modifier le texte sur le toggle playpause*/
video.addEventListener('play',function(){
	toggle.innerHTML = 'pause';
});
video.addEventListener('pause',function(){
	toggle.innerHTML = 'play';
});
/*essai non-concluant avec Eventlistener pour le toggle muet*/
video.addEventListener('muted',function(){
	mute.innerHTML = 'Son';
});
/*Navigation dans la vidéo au clic sur la barre de progression (ne fonctionne pas à 100%)*/
bar.onclick = function(e)
{
	var ratio = e.clientX / bar.offsetWidth,
		time = ratio * video.duration;

	video.currentTime = time;
};
/*essai non concluant d'une barre de progression*/
function update(){
	if(!video.ended){
		var size=parseInt(video.currentTime*barSize/video.duration);
		cursor.style.width=size+'px';
	}
	else{
		cursor.style.width='0';
		toggle.innerHTML='Play';		
	}
}