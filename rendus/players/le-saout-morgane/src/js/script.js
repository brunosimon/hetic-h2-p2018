// on récupere les variables
var video= document.getElementById('video'),
	volume_down= document.querySelector('.volume-down'),
	volume_up= document.querySelector('.volume-up'),
	toggle =document.querySelector ('.toggle');
	bar =document.querySelector ('.bar');

//logs pour tester les variables
console.log(toggle);
console.log(volume_up);

//Ecouter les événements de click sur les boutons
volume_down.onclick = function()
{
	if(video.volume - 0.1 < 0)
		video.volume=0;
	else
	video.volume -=0.1;
};

volume_up.onclick = function()
{	
	if(video.volume + 0.1 > 1)
		video.volume=1;
	else
	video.volume +=0.1;
};

// Lorsque l'on clique sur la vidéo cela la joue/pause
toggle.onclick= function (){
	tooglePlay();
};

toggle.onclick = function () {
	togglePlay();
};

function togglePlay() {
	if (video.paused)
		video.play();
	else
		video.pause();
};

video.onclick= function (){
	tooglePlay();
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

//ecouter l'evenement play
video.addEventListener('play', function(){
		toggle.innerHTML = "<img src='src/img/icon_5489.png'>";
});

video.addEventListener('pause', function(){
		toggle.innerHTML =  "<img src='src/img/icon_5206.png'>";
});

bar.onclick= function (e)
{
	var ratio= e.offsetX/ bar.offsetWidth;
		time= ratio * video.duration;
	video.currentTime = time;
	console.log(ratio);
	bar.querySelector('.current').style.marginLeft= e.offsetX+"px";
};



//  Fullscreen
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
}

// Stop button
function resume(video) {
    var player = document.querySelector('#' + video);
	
    player.currentTime = 0;
    player.pause();

}

// Calcule et affiche le tempsde la vidéo
function update(video) {
    var duration = video.duration;    // Durée totale
    var time     = video.currentTime; // Temps écoulé
    var fraction = time / duration;
    var percent  = Math.ceil(fraction * 100);

    var progress = document.querySelector('#progressBar');
     
    progress.style.width = percent + '%';
    progress.textContent = Math.ceil(time) ;
}

video.addEventListener("timeupdate", function () {
var duration = video.duration;
var time = video.currentTime;

var fraction = time / duration;
var percent = Math.ceil(fraction * 100);

bar.querySelector('.current').style.marginLeft= percent + "%";
});

resume.onclick
