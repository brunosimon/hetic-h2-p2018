//All variables
var bod=document.querySelector('.bod'),
    video=document.getElementById('video'),
    container=document.getElementById('btn_container'),
    btn_play=document.querySelector('.btn_play'),
    icon_play=document.getElementById('icon_play'),
    lvl = document.querySelectorAll('.sound'),
    sound_mute=document.querySelector('.sound_mute'),
    sound_control=document.querySelector('.sound_control'),
    sound_bar=document.querySelector('.sound_bar'),
    icon_sound=document.querySelector('.sound_control i'),
    parameter_button=document.querySelector('.parameter_button'),
    parameter_bar=document.querySelector('.parameter_bar'),
    slider=document.querySelector('.slider'),
    current=document.querySelector(".current"),
    duration=document.querySelector(".duration"),
    fullscreen=document.querySelector('.fullscreen'),
    player_container=document.querySelector('.player_container');

/*------- Play button*/
// Playing button gestion
function play_pause(){
   if(video.paused) video.play();
   else video.pause();
}
btn_play.onclick=play_pause;
video.onclick=play_pause;

    //Event Listeners
video.addEventListener('play', function(){
    icon_play.className='favo';
});

video.addEventListener('pause', function(){
    icon_play.className='fav';
});

video.addEventListener('ended', function(){
    icon_play.className='fa fa-lg fa-repeat';
});

/*------- Sound*/
//Volume bar Gestion
function clack(monid) {
    //change icon
    icon_sound.className='fa fa-lg fa-volume-up';

    //Sound color bar
    function sound_color(monid){
        for (i = 0; i < monid.id; i++) {
            lvl[i].style.background = 'silver';
        }
        for (i = monid.id; i < lvl.length; i++) {
            lvl[i].style.background = 'yellow';
        }
    }
    /*Sound change with a switch case using sound_color function
    for a dynamical color/sound change*/
    switch (parseInt(monid.id)) {
        case 1:
            video.volume = 0.1;
            sound_color(monid);
            break;
        case 2:
            video.volume = 0.2;
            sound_color(monid);
            break;
        case 3:
            video.volume = 0.5;
            sound_color(monid);
            break;
        case 4:
            video.volume = 0.7;
            sound_color(monid);
            break;
        case 5:
            video.volume = 1;
            sound_color(monid);
            break;
        default:
            video.volume = 0.5;
    }
}
//mute function
sound_mute.onclick=function(){
    for (i=0; i<lvl.length; i++){
        lvl[i].style.background='yellow';
    }
    video.volume=0;
    //changing icon
    icon_sound.className='fa fa-lg fa-volume-off';
}
//Double click action on sound_control : mute & change icon
function sound_muting(){
    for (i=0; i<lvl.length; i++){
        lvl[i].style.background='silver';
    }
    video.volume=0;
    //changing icon
    icon_sound.className='fa fa-lg fa-volume-off';
}
//Event Gestion
sound_control.onmouseover=function control_appear(){
    sound_bar.style.display='block';
}
sound_control.onmouseout=function control_appear(){
    sound_bar.style.display='none';
}

/*------- Parameter*/
//Parameter bar Gestion
parameter_button.onmouseover=function parameter(){
    parameter_bar.style.display='block';
}
parameter_button.onmouseout=function parameter(){
    parameter_bar.style.display='none';
}

//Button gestion
function playback_step(elem){
    video.currentTime += elem;
};

function plaback_speed(elem){
    video.playbackRate=1;
    video.playbackRate= elem;
}

/*------- Full Screen*/

/*Ceci n'est pas mon code, source : http://stackoverflow.com/questions/1125084/how-to-make-in-javascript-full-screen-windows-stretching-all-over-the-screen*/

function requestFullScreen(element) {
    // Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullscreen;
    if (requestMethod) { // Native full screen.
        requestMethod.call(element);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) wscript.SendKeys("{F11}");
    }
}
/*------- Play Bar & Time gestion: ceci n'est pas mon code, source:
Antoine Frebault*/
var time = video.currentTime;

 slider.addEventListener('change',function(){
    video.currentTime = video.duration * (slider.value / 100);
});
video.addEventListener('timeupdate',function(){
    var new_time      = video.currentTime * (100 / video.duration),
        mins          = Math.floor(video.currentTime / 60),
        secs          = Math.floor(video.currentTime - mins * 60),
        duration_mins = Math.floor(video.duration / 60),
        duration_secs = Math.floor(video.duration - duration_mins * 60);

    slider.value = new_time;
    if(secs < 10){ secs = "0"+secs; }
    if(duration_secs < 10){ duration_secs = "0"+duration_secs; }
    if(mins < 10){ mins = "0"+ mins; }
    if(duration_mins < 10){ duration_mins = "0"+duration_mins; }
    current.innerHTML = mins+":"+ secs+" / ";
    duration.innerHTML = duration_mins+":"+duration_secs;
});

/*-------*/



/*------- Key controls*/
video.addEventListener("keydown", function(e) {
  if (e.keyCode == 122) requestFullScreen(this);
  else if(e.keyCode == 32) play_pause();
  else if(e.keyCode == 13) video.play();
  else if (e.keyCode == 37) playback_step(-5);
  else if (e.keyCode == 39) playback_step(+5);
  else if (e.keyCode == 16) video.playbackRate=1;
}, false);

video.addEventListener("keypress", function(e) {
    if (e.keyCode == 38) plaback_speed(+1.5);
    else if (e.keyCode == 40) plaback_speed(.5);
}, false);
