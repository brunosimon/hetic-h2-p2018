console.log("Hello there");

//Get DOM elements
var trailer_1	= document.querySelector('.trailer1'),
	picture_1	= document.querySelector('.picture1'),
	trailer_2	= document.querySelector('.trailer2'),
	picture_2	= document.querySelector(".picture2"),
	trailer_3	= document.querySelector('.trailer3'),
	picture_3	= document.querySelector('.picture3'),
	player 		= document.getElementById("player"), //cette variable pose probleme, elle n'est pas reconnue partout.
	video_1 	= document.querySelector('#video1'),
	video_2 	= document.querySelector('#video2'),
	video_3  	= document.querySelector('#video3'),
	volume_button = document.querySelector('.volume_button'),
 	volume_bar	= document.querySelector('.volume_bar'),
	volume_cursor= document.querySelector('.volume_cursor'),
	play_pause	= document.querySelector(".play-pause"),
	bar  		= document.querySelector(".bar"),
	time_rule  	= document.querySelector('.time_rule'),
	fullscreen	= document.querySelector('.fullScreen'),
	controls	= document.querySelector('#controls'); 

// //Logs
// console.log(trailer_1);
// console.log(trailer_2);
// console.log(trailer_3);
// console.log(picture_1);
// console.log(picture_2);
// console.log(picture_3);
// console.log(video_1);
// console.log(video_2);
// console.log(video_3);
// console.log(volume_button);
// console.log(volume_cursor);
// console.log(volume_bar);
// console.log(play_pause);
// console.log(bar);
// console.log(time_rule);
// console.log(fullscreen);
// console.log(controls);

//Fonction gérant la transition lorsqu'on désire voir le trailer #1.
function trailer1(){
	if(trailer_3.className !== trailer_3.className + " transition3"){
		trailer_3.className= trailer_3.className + " transition3";
		trailer_2.className= trailer_2.className + " transition2";
		picture_1.className= picture_1.className + " pic_transition1";
		setTimeout(function trailer_appear(){
			trailer_1.querySelector('.button').style.display= "none";
			trailer_1.style.overflow = "visible"; 
			video_1.id= "player";
			play_pause.style.display = "inline-block";
			bar.style.display = "inline-block";
			controls.style.display= "block";
		}, "2500");
		
	}
	else
		console.log("Nothing to do");	
}

//Fonction gérant la transition lorsqu'on désire voir le trailer #2.
function trailer2(){
	trailer_3.className= trailer_3.className + " transition3";
	trailer_1.className= trailer_1.className + " transition1";
	picture_2.className= picture_2.className + " pic_transition2";
	setTimeout(function trailer_appear(){
		trailer_2.querySelector(".button").style.display= "none";
		trailer_2.style.overflow= "visible";
		trailer_2.style.zIndex= "0";
		video_2.id= "player";
		play_pause.style.display = "inline-block";
		bar.style.display = "inline-block";
		controls.style.zIndex= "1";
		controls.style.display= "block";
	}, "2500");

}

//Fonction gérant la transition lorsqu'on désire voir le trailer #3.
function trailer3(){
	trailer_1.className= trailer_1.className + " transition1";
	trailer_2.className= trailer_2.className + " transition2";
	picture_3.className= picture_3.className + " pic_transition3";
	setTimeout(function trailer_appear(){
		trailer_3.querySelector(".button").style.display= "none";
		trailer_3.style.overflow= "visible";
		video_3.id= "player";
		play_pause.style.display = "inline-block";
		bar.style.display = "inline-block";
		controls.style.zIndex= "1";
		controls.style.display= "block";
	}, "2500");
}

// //Function to play and pause the videos.
// play_pause.onclick= function(){
// var player = document.getElementById("player");
// if(player.paused)
// 	player.play();	
// else
// 	player.pause();
// };	
// console.log(player);
// //Listen to video events
// //La fonction ne reconnaît pas ma variable pour une raison qui m'échappe.
// player.addEventListener('play', function(){
// 	play_pause.style.background= "url('src/img/pause_icon.png')";
// 	play_pause.style.backgroundRepeat= "no-repeat";
// });

// player.addEventListener('pause', function(){
// 	play_pause.style.background= "url('src/img/play_icon2.png')";
// 	play_pause.style.backgroundRepeat= "no-repeat";
// });


//Listen to click events
/*	volume_up.onclick= function(){
	if(video_1.volume + 0.1 >= 1)
			video_1.volume = 1;
	else	
		video_1.volume += 0.1;
};

volume_down.onclick= function(){
	if(video_1.volume - 0.1 < 0)
			video_1.volume = 0;
	else	
		video_1.volume -= 0.1;
};*/

//Fonction pour le volume qui ne marche pas. Je ne sais pas trop comment la tourner.
volume_bar.onclick= function(e){
	var ratio= e.offsetX / volume_bar.offsetWidth,
		volumes= ratio * player.volume;
		console.log(e.offsetX);
		volume_bar= player.volumes;
}

//Fonction qui ne s'exécute plus.
bar.onclick= function(e){
	var ratio= e.offsetX / bar.offsetWidth,
		time= ratio * player.duration;
	console.log(e.offsetX);
	player.currentTime= time;
	time_rule.style.width= e.offsetX +"px";
}

volume_cursor.onchange = function()
{
	console.log(volume_cursor);
	volume_cursor.value;
}