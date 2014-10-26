// 3 façons de récupérer la balise audio
var audio = document.getElementsByTagName('audio')[0]; // Renvoie un tableau
var audio = document.getElementById('audio'); // Suppose que l'ID a bien été rajouté en HTML
var audio = document.querySelector('.audio'); // Suppose que la classe à bien été rajoutée en HTML

// Methods
// audio.load();
// audio.play();
// audio.pause();

// Events
audio.addEventListener('play',function(e)
{
    console.log('playing');
});
audio.addEventListener('pause',function(e)
{
    console.log('paused');
});

// Interactions
var volume_up   = document.querySelector('.volume-up'),
	volume_down = document.querySelector('.volume-down');

volume_up.onclick = function()
{
	audio.volume += 0.1;
};
volume_down.onclick = function()
{
	audio.volume -= 0.1;
};