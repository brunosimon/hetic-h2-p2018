var video		= document.getElementById('lecteur'),
	plus		= document.getElementById('plus'),
	moins		= document.getElementById('moins'),
    time_left	= document.querySelector('.hide'),
    border_video= document.querySelector('.border_block'),
    cacher_bar	= document.getElementById('cache'),
    play		= document.getElementById('play'),
    cinema		= document.getElementById('cinema'),
    footer		= document.getElementById('footer'),
    reset		= document.getElementById('reset'),
    footerbis	= document.getElementById('footerbis'),
    header		= document.getElementById('header'),
    sound		= document.getElementById('sound'),
    nbclics		= 0,
    nbclics2	= 0,
    nbclics3	= 0;

//Mes logs
console.log(video);
console.log(plus);
console.log(moins);
console.log(time_left);
console.log(cacher_bar);
console.log(border_video);
console.log(play);
console.log(cinema);
console.log(reset);
console.log(footerbis);
console.log(header);
console.log(sound);
//Fonction permettant de recupérer le temps en temps réel
var time = function()
{
var data = video.duration - video.currentTime;
return data;
}


//fonction.onclick
sound.onclick = function()
{
	nbclics3++;
	if(nbclics3 % 2 == 1)
	{
		video.volume = 0;
		sound.innerHTML = "Sound : Off";
	}
	if(nbclics3 % 2 == 0)
	{
		video.volume = 1;
		sound.innerHTML = "Sound : On";
	}
};
reset.onclick = function()
{
	video.currentTime = video.currentTime - video.duration;

};
cinema.onclick = function()
{
	nbclics2++;
	var cine = document.getElementById("cine");
	if(nbclics2 % 2 == 1)
	{
		sound.classList.add("sound2");
		reset.classList.add("reset2");
		footerbis.classList.add("footer2")
		border_video.classList.add("border_block2");
		cinema.classList.add("cinema2");
		video.classList.add("lecteur2");
		cacher_bar.classList.add("cache2");
		plus.classList.add("plus2");
		moins.classList.add("moins2");
		play.classList.add("play2");
		footer.classList.add("footer2")
		cinema.innerHTML = "Mode normal";
		cine.classList.add("container");

	}
	if(nbclics2 % 2 == 0)
	{
		sound.classList.remove("sound2");
		reset.classList.remove("reset2");
		footerbis.classList.remove("footer2");
		border_video.classList.remove("border_block2");
		cinema.classList.remove("cinema2");
		video.classList.remove("lecteur2");
		cacher_bar.classList.remove("cache2");
		plus.classList.remove("plus2");
		moins.classList.remove("moins2");
		play.classList.remove("play2");
		footer.classList.remove("footer2");
		cine.classList.remove("container");
		cinema.innerHTML = "Mode cinéma";
	}
};

cacher_bar.onclick = function()
{
	nbclics ++;
	if(nbclics % 2 == 1)
		{
			cacher_bar.innerHTML = "Afficher le contour ?";
			border_video.classList.remove('border_block');
		}
	if(nbclics % 2 ==0)
		{
			border_video.classList.add('border_block');
			cacher_bar.innerHTML = "Cacher le contour ?";
		}
};	

plus.onclick = function()
{
	var t = time();
	console.log(t);
	if(t <= 2)
		video.currentTime += 0;
	else
		video.currentTime += 30;
};

moins.onclick = function()
{
	var time = video.duration;

	if(video.currentTime <= 0)
		video.currentTime -=0;
	else
		video.currentTime -=30;
};

play.onclick = function()
{
	if(video.paused)
		video.play();
	else
		video.pause();
}
//Events
video.addEventListener('play',function(e)
	{
    	console.log("playing");
    	play.innerHTML = "Pause";
	});

video.addEventListener('pause',function(e)
	{
    	console.log("paused");
    	play.innerHTML = "Play";
	});

// Fonction donnant le temps réel
function alert()
{ 

	var t = time();
	//console.log(t);
	var pourc = (video.currentTime) / (video.duration);
	console.log("pourc"+pourc);
	if(pourc == 0)
			{
				time_left.innerHTML = "Ta video est au début";
				time_left.classList.remove('hide');
			}
	if(pourc > 0)
	    	{
				time_left.innerHTML = "STARTING";
				time_left.classList.remove('hide');
			}
	if(pourc >= 0.1 )
	    	{
				time_left.innerHTML = " 10%";
				time_left.classList.remove('hide');
			}
	if(pourc >= 0.2)
	    	{
				time_left.innerHTML = " 20%";
				time_left.classList.remove('hide');
			}
	if(pourc >= 0.3)
	    	{
				time_left.innerHTML = " 30%";
				time_left.classList.remove('hide');
			}
	if(pourc >= 0.4)
	    	{
				time_left.innerHTML = "  40%";
				time_left.classList.remove('hide');
			}
	if(pourc >= 0.5)
	    	{
				time_left.innerHTML = " 50%";
				time_left.classList.remove('hide');
			}
	if(pourc >= 0.6)
	    	{
				time_left.innerHTML = " 60%";
				time_left.classList.remove('hide');
			}
	if(pourc >= 0.7)
	    	{
				time_left.innerHTML = " 70%";
				time_left.classList.remove('hide');
			}
	if(pourc >= 0.8)
	    	{
				time_left.innerHTML = " 80%";
				time_left.classList.remove('hide');
			}
	if(pourc >= 0.9)
	    	{
				time_left.innerHTML = " 90%";
				time_left.classList.remove('hide');
			}
	if(pourc >= 1)
	    	{
				time_left.innerHTML = "Video terminé.";
				time_left.classList.remove('hide');
			}
setTimeout("alert()",100);
}
alert();
