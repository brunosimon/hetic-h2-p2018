// vars
var intervalRewind;

// UI
var player = document.getElementById("player"),
    btnPlayPause = document.getElementById('play_pause'),
    btnStop = document.getElementById('stop'),
    btnForward = document.getElementById('forward'),
    btnRewind = document.getElementById('rewind'),
    btnFullscreen = document.getElementById('fullscreen'),
    wrapper = document.getElementById('wrapper'),
    bar = document.getElementById('bar'),
    barInner = document.getElementById('bar_inner'),
    volumeBar = document.getElementById('volume'),
    volumeMask = document.getElementById('volume_bar'),
    currentTime = document.getElementById('current_time'),
    duration = document.getElementById('duration');

// buttons
btnPlayPause.addEventListener('click', function()
{
  timeline();

  if (player.paused)
  {
      playVideo();
  }
  else
  {
      pauseVideo();
  }
});
btnStop.addEventListener('click', stopVideo);
btnForward.addEventListener('click', forwardVideo);
btnRewind.addEventListener('click', rewindVideo);
btnFullscreen.addEventListener('click', fullScreen);

// functions
function playVideo()
{
    player.playbackRate = 1.0;
    clearInterval(intervalRewind);
    isPlaying = 1;
    player.play();
    btnPlayPause.className = "play";
};

function pauseVideo()
{
    player.playbackRate = 1.0;
    clearInterval(intervalRewind);
    isPlaying = 0;
    player.pause();
    btnPlayPause.className = "pause";
};

function stopVideo()
{
    pauseVideo();
    player.currentTime = 0;
};

function forwardVideo()
{
    clearInterval(intervalRewind);
    player.playbackRate += 1.0;
}

function rewindVideo()
{
    clearInterval(intervalRewind);
    intervalRewind = setInterval(function()
    {
       player.playbackRate = 1.0;
       if(player.currentTime == 0)
       {
           pauseVideo();
       }
       else
       {
           player.currentTime -= 0.1;
       }
    }, 50);
}

function timeline()
{
    currentTime.innerHTML = Math.round(player.currentTime);
    duration.innerHTML = Math.round(player.duration);

    var width = (player.currentTime/player.duration)*bar.offsetWidth;

    barInner.style.width = width + 'px';

    var width = player.volume*volumeBar.offsetWidth;

    volumeMask.style.width = width + 'px';
}

function fullScreen()
{
    if (wrapper.className == "")
    {
      wrapper.className = "fullscreen";
    }
    else
    {
      wrapper.className = ""; 
    }
}

bar.onclick=function(e)
{
  var ratio=e.clientX/bar.offsetWidth,
    time=ratio*player.duration;

    player.currentTime=time;
};

volumeBar.onclick=function(e)
{
  var ratio=(e.clientX-volumeBar.offsetLeft)/volumeBar.offsetWidth;

  player.volume = ratio;

  var width = ratio*volumeBar.offsetWidth;

  volumeMask.style.width = width + 'px';
};

setInterval(timeline, 50);