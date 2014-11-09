var       audio = document.getElementById('audio'),
	volume_down = document.querySelector('.volume-down');
	volume_up = document.querySelector('.volume-up');
	play_pause = document.getElementById('play_pause');
	timeline_controller = document.getElementById('timeline_controller');
	video = document.querySelector('video');
	html = document.querySelector('html');
	serie = document.getElementById('serie');
	breakingbad = document.getElementById('breakingbad');
	truedetective = document.getElementById('truedetective');
	sherlock = document.getElementById('sherlock');
	luther = document.getElementById('luther');
	blackmirror = document.getElementById('blackmirror');
	gameofthrones = document.getElementById('gameofthrones');
	dexter = document.getElementById('dexter');
	homeland = document.getElementById('homeland');
	skins = document.getElementById('skins');
	suits = document.getElementById('suits');
	twd = document.getElementById('twd');
	thekilling = document.getElementById('thekilling');
	houseofcards = document.getElementById('houseofcards');
	hannibal = document.getElementById('hannibal');
	vikings = document.getElementById('vikings');
	broadchurch = document.getElementById('broadchurch');
	dashboard_title = document.getElementById('dashboard_title');
	dashboard_subtitle = document.getElementById('dashboard_subtitle');
	sound = document.getElementById('sound');
	sound_img = document.getElementById('sound_img');
	plus = document.getElementById('plus');
	minus = document.getElementById('minus');
	fullscreen = document.getElementById('fullscreen');
	fullscreen_img = document.getElementById('fullscreen_img');
	favorite = document.getElementById('favorite');
	favorite_img = document.getElementById('favorite_img');
	more = document.getElementById('more');
	more_img = document.getElementById('more_img');
	play_pause_img = document.getElementById('play_pause_img');
	current_time = document.getElementById('current_time');
	player = document.getElementById('player');
	dashboard = document.getElementById('dashboard');
	selection = document.getElementById('selection');
	saison_selected = document.getElementById('saison_selected');
	watch = document.getElementById('watch');
	prev_season = document.getElementById('next_season');
	next_season = document.getElementById('prev_season');
	prev_episode = document.getElementById('next_episode');
	next_episode = document.getElementById('prev_episode');
	saison = document.querySelector('.saison');
	source = document.querySelector('source');
	sound_down_img = document.getElementById('sound_down_img');
	sound_up_img = document.getElementById('sound_up_img');
	add = document.getElementById('add');
	add_serie = document.getElementById('add_serie');
	container = document.getElementById('container');
	value_changed = document.getElementById('value_changed');
	paramertre = document.getElementById('parametre');
	value = document.getElementById('value');

/*function to reset the css of other series and one is selectioned*/
function reset_css() {
	breakingbad.style.color = '#212930';
	truedetective.style.color = '#212930';
	sherlock.style.color = '#212930';
	luther.style.color = '#212930';
	blackmirror.style.color = '#212930';
	gameofthrones.style.color = '#212930';
	dexter.style.color = '#212930';
	homeland.style.color = '#212930';
	skins.style.color = '#212930';
	suits.style.color = '#212930';
	twd.style.color = '#212930';
	thekilling.style.color = '#212930';
	houseofcards.style.color = '#212930';
	hannibal.style.color = '#212930';
	vikings.style.color = '#212930';
	broadchurch.style.color = '#212930';
}

/*SERIES VARIABLES*/

breakingbad.onclick = function() {
	serie.innerHTML = "breaking bad";
	dashboard_title.innerHTML = "breaking bad";
	html.style.backgroundImage = 'url("src/css/breakingbad.jpg")';
	reset_css();
	breakingbad.style.color = '#fff';
	serie_selection = "breakingbad";
	reset_selection();
	source.src = 'src/videos/' + serie_selection + '.mp4';
	video.load();
	remove_search();
	remove_container();
	add_selection();
};
truedetective.onclick = function() {
	serie.innerHTML = "true detective";
	dashboard_title.innerHTML = "true detective";
	html.style.backgroundImage = 'url("src/css/truedetective.jpg")';
	reset_css();
	truedetective.style.color = '#fff';
	serie_selection = "truedetective";
	reset_selection();
	source.src = 'src/videos/' + serie_selection + '.mp4';
	video.load();
	remove_search();
	remove_container();
	add_selection();
};
sherlock.onclick = function() {
	serie.innerHTML = "sherlock";
	dashboard_title.innerHTML = "sherlock";
	html.style.backgroundImage = 'url("src/css/sherlock.jpg")';
	reset_css();
	sherlock.style.color = '#fff';
	serie_selection = "sherlock";
	reset_selection();
	source.src = 'src/videos/' + serie_selection + '.mp4';
	video.load();
	remove_search();
	remove_container();
	add_selection();
};
luther.onclick = function() {
	serie.innerHTML = "luther";
	dashboard_title.innerHTML = "luther";
	html.style.backgroundImage = 'url("src/css/luther.jpg")';
	reset_css();
	luther.style.color = '#fff';
	serie_selection = "luther";
	reset_selection();
	source.src = 'src/videos/' + serie_selection + '.mp4';
	video.load();
	remove_search();
	remove_container();
	add_selection();
};
blackmirror.onclick = function() {
	serie.innerHTML = "black mirror";
	dashboard_title.innerHTML = "black mirror";
	html.style.backgroundImage = 'url("src/css/blackmirror.jpg")';
	reset_css();
	blackmirror.style.color = '#fff';
	serie_selection = "blackmirror";
	reset_selection();
	source.src = 'src/videos/' + serie_selection + '.mp4';
	video.load();
	remove_search();
	remove_container();
	add_selection();
};
gameofthrones.onclick = function() {
	serie.innerHTML = "game of thrones";
	dashboard_title.innerHTML = "game of thrones";
	html.style.backgroundImage = 'url("src/css/gameofthrones.jpg")';
	reset_css();
	gameofthrones.style.color = '#fff';
	serie_selection = "gameofthrones";
	reset_selection();
	source.src = 'src/videos/' + serie_selection + '.mp4';
	video.load();
	remove_search();
	remove_container();
	add_selection();
};
dexter.onclick = function() {
	serie.innerHTML = "dexter";
	dashboard_title.innerHTML = "dexter";
	html.style.backgroundImage = 'url("src/css/dexter.jpg")';
	reset_css();
	dexter.style.color = '#fff';
	serie_selection = "dexter";
	reset_selection();
	source.src = 'src/videos/' + serie_selection + '.mp4';
	video.load();
	remove_search();
	remove_container();
	add_selection();
};
homeland.onclick = function() {
	serie.innerHTML = "homeland";
	dashboard_title.innerHTML = "homeland";
	html.style.backgroundImage = 'url("src/css/homeland.jpg")';
	reset_css();
	homeland.style.color = '#fff';
	serie_selection = "homeland";
	reset_selection();
	source.src = 'src/videos/' + serie_selection + '.mp4';
	video.load();
	remove_search();
	remove_container();
	add_selection();
};
skins.onclick = function() {
	serie.innerHTML = "skins";
	dashboard_title.innerHTML = "skins";
	html.style.backgroundImage = 'url("src/css/skins.jpg")';
	reset_css();
	skins.style.color = '#fff';
	serie_selection = "skins";
	reset_selection();
	source.src = 'src/videos/' + serie_selection + '.mp4';
	video.load();
	remove_search();
	remove_container();
	add_selection();
};
suits.onclick = function() {
	serie.innerHTML = "suits";
	dashboard_title.innerHTML = "suits";
	html.style.backgroundImage = 'url("src/css/suits.jpg")';
	reset_css();
	suits.style.color = '#fff';
	serie_selection = "suits";
	reset_selection();
	source.src = 'src/videos/' + serie_selection + '.mp4';
	video.load();
	remove_search();
	remove_container();
	add_selection();
};
twd.onclick = function() {
	serie.innerHTML = "twd";
	dashboard_title.innerHTML = "twd";
	html.style.backgroundImage = 'url("src/css/twd.jpg")';
	reset_css();
	twd.style.color = '#fff';
	serie_selection = "twd";
	reset_selection();
	source.src = 'src/videos/' + serie_selection + '.mp4';
	video.load();
	remove_search();
	remove_container();
	add_selection();
};
thekilling.onclick = function() {
	serie.innerHTML = "the killing";
	dashboard_title.innerHTML = "the killing";
	html.style.backgroundImage = 'url("src/css/thekilling.jpg")';
	reset_css();
	thekilling.style.color = '#fff';
	serie_selection = "thekilling";
	reset_selection();
	source.src = 'src/videos/' + serie_selection + '.mp4';
	video.load();
	remove_search();
	remove_container();
	add_selection();
};
houseofcards.onclick = function() {
	serie.innerHTML = "house of cards";
	dashboard_title.innerHTML = "house of cards";
	html.style.backgroundImage = 'url("src/css/houseofcards.png")';
	reset_css();
	houseofcards.style.color = '#fff';
	serie_selection = "houseofcards";
	reset_selection();
	source.src = 'src/videos/' + serie_selection + '.mp4';
	video.load();
	remove_search();
	remove_container();
	add_selection();
};
hannibal.onclick = function() {
	serie.innerHTML = "hannibal";
	dashboard_title.innerHTML = "hannibal";
	html.style.backgroundImage = 'url("src/css/hannibal.jpg")';
	reset_css();
	hannibal.style.color = '#fff';
	serie_selection = "hannibal";
	reset_selection();
	source.src = 'src/videos/' + serie_selection + '.mp4';
	video.load();
	remove_search();
	remove_container();
	add_selection();
};
vikings.onclick = function() {
	serie.innerHTML = "vikings";
	dashboard_title.innerHTML = "vikings";
	html.style.backgroundImage = 'url("src/css/vikings.jpg")';
	reset_css();
	vikings.style.color = '#fff';
	serie_selection = "vikings";
	reset_selection();
	source.src = 'src/videos/' + serie_selection + '.mp4';
	video.load();
	remove_search();
	remove_container();
	add_selection();
};
broadchurch.onclick = function() {
	serie.innerHTML = "broadchurch";
	dashboard_title.innerHTML = "broadchurch";
	html.style.backgroundImage = 'url("src/css/broadchurch.jpg")';
	reset_css();
	broadchurch.style.color = '#fff';
	serie_selection = "broadchurch";
	reset_selection();
	source.src = 'src/videos/' + serie_selection + '.mp4';
	video.load();
	remove_search();
	remove_container();
	add_selection();
};

/*MY SERIES HOVER*/

breakingbad.onmouseover = function() {
	breakingbad.classList.add('hover-animate');
};
truedetective.onmouseover = function() {
	truedetective.classList.add('hover-animate');
};
sherlock.onmouseover = function() {
	sherlock.classList.add('hover-animate');
};
luther.onmouseover = function() {
	luther.classList.add('hover-animate');
};
blackmirror.onmouseover = function() {
	blackmirror.classList.add('hover-animate');
};
gameofthrones.onmouseover = function() {
	gameofthrones.classList.add('hover-animate');
};
dexter.onmouseover = function() {
	dexter.classList.add('hover-animate');
};
homeland.onmouseover = function() {
	homeland.classList.add('hover-animate');
};
skins.onmouseover = function() {
	skins.classList.add('hover-animate');
};
suits.onmouseover = function() {
	suits.classList.add('hover-animate');
};
twd.onmouseover = function() {
	twd.classList.add('hover-animate');
};
thekilling.onmouseover = function() {
	thekilling.classList.add('hover-animate');
};
houseofcards.onmouseover = function() {
	houseofcards.classList.add('hover-animate');
};
hannibal.onmouseover = function() {
	hannibal.classList.add('hover-animate');
};
vikings.onmouseover = function() {
	vikings.classList.add('hover-animate');
};
broadchurch.onmouseover = function() {
	broadchurch.classList.add('hover-animate');
};
breakingbad.onmouseout = function() {
	breakingbad.classList.remove('hover-animate');
};
truedetective.onmouseout = function() {
	truedetective.classList.remove('hover-animate');
};
sherlock.onmouseout = function() {
	sherlock.classList.remove('hover-animate');
};
luther.onmouseout = function() {
	luther.classList.remove('hover-animate');
};
blackmirror.onmouseout = function() {
	blackmirror.classList.remove('hover-animate');
};
gameofthrones.onmouseout = function() {
	gameofthrones.classList.remove('hover-animate');
};
dexter.onmouseout = function() {
	dexter.classList.remove('hover-animate');
};
homeland.onmouseout = function() {
	homeland.classList.remove('hover-animate');
};
skins.onmouseout = function() {
	skins.classList.remove('hover-animate');
};
suits.onmouseout = function() {
	suits.classList.remove('hover-animate');
};
twd.onmouseout = function() {
	twd.classList.remove('hover-animate');
};
thekilling.onmouseout = function() {
	thekilling.classList.remove('hover-animate');
};
houseofcards.onmouseout = function() {
	houseofcards.classList.remove('hover-animate');
};
hannibal.onmouseout = function() {
	hannibal.classList.remove('hover-animate');
};
vikings.onmouseout = function() {
	vikings.classList.remove('hover-animate');
};
broadchurch.onmouseout = function() {
	broadchurch.classList.remove('hover-animate');
};
more.onmouseover = function() {
	more_img.src = 'src/css/plus_hover.png';
};
more.onmouseout = function() {
	more_img.src = 'src/css/plus.png';
};
fullscreen.onmouseover = function() {
	fullscreen_img.src = 'src/css/fullscreen_hover.png';
};
fullscreen.onmouseout = function() {
	fullscreen_img.src = 'src/css/fullscreen.png';
};
favorite.onmouseover = function() {
	favorite_img.src = 'src/css/favorite_hover.png';
};
favorite.onmouseout = function() {
	favorite_img.src = 'src/css/favorite.png';
};

/*INITIAL VARIABLES ABOUT SOUND*/

var son = 'src/css/son.png';
var son_hover = 'src/css/son_hover.png';
var width = '19px';
var width_hover = '56px';
var counter_sound = 0;
var currentVolume = 1;

/*ANIMATION AND EFFECT ABOUT SOUND*/

sound_img.onclick = function() {
	if (counter_sound == 0) {
		son = 'src/css/son_muted.png';
		son_hover = 'src/css/son_muted.png';
		width = '19px';
		width_hover = '19px';
		counter_sound = 1;
		currentVolume = video.volume;
		video.volume = 0;
	} else {
		son = 'src/css/son.png';
		son_hover = 'src/css/son_hover.png';
		width = '19px';
		width_hover = '56px';
		counter_sound = 0;
		video.volume = currentVolume;
	}
};
sound_up.onclick = function() {
	if (video.volume == 1) {
		video.volume = video.volume;
	} else {
		video.volume += 0.1;
	}
	parametre.innerHTML = "volume";
	value.innerHTML = Math.floor(video.volume * 100) + "%";
	popup();
}
sound_down.onclick = function() {
	if (video.volume == 0) {
		video.volume = video.volume;
		counter_sound = 0;
	} else {
		video.volume -= 0.1;
	}
	parametre.innerHTML = "volume";
	value.innerHTML = Math.floor(video.volume * 100) + "%";
	popup();
}
favorite.onclick = function() {
	parametre.innerHTML = "video added to";
	value.innerHTML = "<img src='src/css/favorite_hover.png'>";
	popup();
}
more.onclick = function() {
	parametre.innerHTML = "more";
	value.innerHTML = "(soon)";
	popup();
}
sound.onmouseover = function() {
	sound.style.width = width_hover;
	sound_img.src = son_hover;
};
sound.onmouseout = function() {
	sound.style.width = width;
	sound_img.src = son;
};
sound_up.onmouseover = function() {
	sound_up_img.src = 'src/css/sound_up_hover.png';
};
sound_up.onmouseout = function() {
	sound_up_img.src = 'src/css/sound_up.png';
};
sound_down.onmouseover = function() {
	sound_down_img.src = 'src/css/sound_down_hover.png';
};
sound_down.onmouseout = function() {
	sound_down_img.src = 'src/css/sound_down.png';
};

/*ANIMATION AND EFFECT ABOUT PLAY & PAUSE*/

function play() {
	play_pause_img.src = 'src/css/pause.png';
	play_pause.onmouseover = function() {
		play_pause_img.src = 'src/css/pause_hover.png';
	};
	play_pause.onmouseout = function() {
		play_pause_img.src = 'src/css/pause.png';
	};
}

function pause() {
	play_pause_img.src = 'src/css/play.png';
	play_pause.onmouseover = function() {
		play_pause_img.src = 'src/css/play_hover.png';
	};
	play_pause.onmouseout = function() {
		play_pause_img.src = 'src/css/play.png';
	};
}
var counter = 0;
play_pause.onclick = function() {
	if (counter == 0) {
		video_played();
		value.innerHTML = "unpaused";
	} else {
		video_paused();
		value.innerHTML = "paused";
	}
	parametre.innerHTML = "video";
	popup();
};
function video_played() {
	video.play();
	play();
	counter = 1;
}

function video_paused() {
	video.pause();
	pause();
	counter = 0;
}

/*ANIMATION AND EFFECT ABOUT TIME*/

var minutes = 0;

function timeline() {
	var width = (video.currentTime / video.duration) * 160 + 'px';
	document.getElementById("timeline_initial").style.width = width;
}
// setInterval(function() {
// 	if (Math.floor(video.currentTime) <= 59) {
// 		var minutes = 0;
// 	}
// 	if (Math.floor(video.currentTime) > 59) {
// 		var minutes = +1;
// 	}
// 	var secondes = Math.floor(video.currentTime - minutes * 60);
// 	if (secondes < 10) {
// 		current_time.innerHTML = minutes + "\'0" + secondes + "\'\'";
// 	} else {
// 		current_time.innerHTML = minutes + "\'" + secondes + "\'\'";
// 	}
// 	if (video.currentTime == video.duration) {
// 		video.load();
// 		video_paused();
// 	}
// }, 1000);

// /*This function will reinitialize those position variables and the timeline */

// setInterval(function() {
// 	timeline();
// 	dashboard.style.marginLeft = player.offsetWidth / 2 - (video.offsetWidth / 2) +
// 		"px";
// 	dashboard.style.marginTop = (video.offsetHeight / 2) - (dashboard.offsetHeight /
// 		2) + "px";
// 	selection.style.marginLeft = player.offsetWidth / 2 - (selection.offsetWidth /
// 		2) + "px";
// 	selection.style.marginTop = player.offsetHeight / 2 - (selection.offsetHeight /
// 		2) - 40 + "px";
// 	search.style.marginTop = player.offsetHeight / 2 - (search.offsetHeight / 2) +
// 		"px";
// 	container.style.marginTop = (player.offsetHeight / 2) - (container.offsetHeight /
// 		2) - 58 + "px";
// 	value_changed.style.marginTop = (video.offsetHeight / 2) - (dashboard.offsetHeight /
// 		2) - 40 + "px";
// }, 50);
var video = document.getElementById('video'),
	bar = document.getElementById('bar');
// Écouter les clicks
timeline_controller.onclick = function(e) {
	// Calculer le temps de la vidéo par rapport à la position du click sur la bar
	var ratio = e.offsetX / timeline_controller.offsetWidth,
		current = video.duration * ratio;
	// Met à jour la lecture de la vidéo
	video.currentTime = current;
};

/*"SERIES'DATAS"*/

var serie_selection = "truedetective"
var saison_selection = 1;
var final_season = 1;
var episode_selection = 1;
var final_episode = 2;

function final_datas() {
	if (serie_selection == "breakingbad") {
		final_season = 5;
		if (saison_selection == 1) {
			final_episode = 7;
		};
		if (saison_selection == 2) {
			final_episode = 13;
		};
		if (saison_selection == 3) {
			final_episode = 13;
		};
		if (saison_selection == 4) {
			final_episode = 13;
		};
		if (saison_selection == 5) {
			final_episode = 16;
		};
	}
	if (serie_selection == "truedetective") {
		final_season = 1;
		if (saison_selection == 1) {
			final_episode = 8;
		};
	}
	if (serie_selection == "sherlock") {
		final_season = 3;
		if (saison_selection == 1) {
			final_episode = 3;
		};
		if (saison_selection == 2) {
			final_episode = 3;
		};
		if (saison_selection == 3) {
			final_episode = 4;
		};
	}
	if (serie_selection == "luther") {
		final_season = 3;
		if (saison_selection == 1) {
			final_episode = 6;
		};
		if (saison_selection == 2) {
			final_episode = 4;
		};
	}
	if (serie_selection == "blackmirror") {
		final_season = 2;
		if (saison_selection == 1) {
			final_episode = 3;
		};
		if (saison_selection == 2) {
			final_episode = 3;
		};
	}
	if (serie_selection == "gameofthrones") {
		final_season = 4;
		if (saison_selection == 1) {
			final_episode = 10;
		};
		if (saison_selection == 2) {
			final_episode = 13;
		};
		if (saison_selection == 3) {
			final_episode = 13;
		};
		if (saison_selection == 4) {
			final_episode = 13;
		};
		if (saison_selection == 5) {
			final_episode = 16;
		};
	}
	if (serie_selection == "dexter") {
		final_season = 5;
		if (saison_selection == 1) {
			final_episode = 10;
		};
		if (saison_selection == 2) {
			final_episode = 10;
		};
		if (saison_selection == 3) {
			final_episode = 10;
		};
		if (saison_selection == 4) {
			final_episode = 10;
		};
	}
	if (serie_selection == "homeland") {
		final_season = 4;
		if (saison_selection == 1) {
			final_episode = 12;
		};
		if (saison_selection == 2) {
			final_episode = 12;
		};
		if (saison_selection == 3) {
			final_episode = 12;
		};
		if (saison_selection == 4) {
			final_episode = 5;
		};
	}
	if (serie_selection == "skins") {
		final_season = 7;
		if (saison_selection == 1) {
			final_episode = 11;
		};
		if (saison_selection == 2) {
			final_episode = 10;
		};
		if (saison_selection == 3) {
			final_episode = 10;
		};
		if (saison_selection == 4) {
			final_episode = 8;
		};
		if (saison_selection == 5) {
			final_episode = 8;
		};
		if (saison_selection == 6) {
			final_episode = 10;
		};
		if (saison_selection == 7) {
			final_episode = 6;
		};
	}
	if (serie_selection == "suits") {
		final_season = 4;
		if (saison_selection == 1) {
			final_episode = 12;
		};
		if (saison_selection == 2) {
			final_episode = 16;
		};
		if (saison_selection == 3) {
			final_episode = 16;
		};
		if (saison_selection == 4) {
			final_episode = 10;
		};
	}
	if (serie_selection == "twd") {
		final_season = 5;
		if (saison_selection == 1) {
			final_episode = 6;
		};
		if (saison_selection == 2) {
			final_episode = 13;
		};
		if (saison_selection == 3) {
			final_episode = 16;
		};
		if (saison_selection == 4) {
			final_episode = 16;
		};
		if (saison_selection == 5) {
			final_episode = 3;
		};
	}
	if (serie_selection == "thekilling") {
		final_season = 4;
		if (saison_selection == 1) {
			final_episode = 13;
		};
		if (saison_selection == 2) {
			final_episode = 13;
		};
		if (saison_selection == 3) {
			final_episode = 12;
		};
		if (saison_selection == 4) {
			final_episode = 6;
		};
	}
	if (serie_selection == "houseofcards") {
		final_season = 2;
		if (saison_selection == 1) {
			final_episode = 13;
		};
		if (saison_selection == 2) {
			final_episode = 13;
		};
	}
	if (serie_selection == "hannibal") {
		final_season = 2;
		if (saison_selection == 1) {
			final_episode = 13;
		};
		if (saison_selection == 2) {
			final_episode = 13;
		};
	}
	if (serie_selection == "vikings") {
		final_season = 2;
		if (saison_selection == 1) {
			final_episode = 9;
		};
		if (saison_selection == 2) {
			final_episode = 10;
		};
		if (serie_selection == "broadchurch") {
			final_season = 1;
			if (saison_selection == 1) {
				final_episode = 8;
			};
		}
	}
}

/*EPISODES & SEASONS SELECTION*/

function reset_selection() {
	saison_selection = 1;
	episode_selection = 1;
	saison_selected.innerHTML = saison_selection;
	episode_selected.innerHTML = episode_selection;
}
prev_season.onclick = function() {
	if (saison_selection == 1) {
		saison_selection = saison_selection;
	} else {
		saison_selection = saison_selection - 1;
	}
	saison_selected.innerHTML = saison_selection;
	final_datas();
	if (episode_selection > final_episode) {
		episode_selection = final_episode;
	}
	episode_selected.innerHTML = episode_selection;
	final_datas();
}
next_season.onclick = function() {
	if (saison_selection == final_season) {
		saison_selection = final_season;
	} else {
		saison_selection = saison_selection + 1;
	}
	saison_selected.innerHTML = saison_selection;
	final_datas();
	if (episode_selection > final_episode) {
		episode_selection = final_episode;
	}
	episode_selected.innerHTML = episode_selection;
	final_datas();
}
prev_episode.onclick = function() {
	if (episode_selection == 1) {
		episode_selection = episode_selection;
	} else {
		episode_selection = episode_selection - 1;
	}
	episode_selected.innerHTML = episode_selection;
	final_datas();
}
next_episode.onclick = function() {
	if (episode_selection == final_episode) {
		episode_selection = episode_selection;
	} else {
		episode_selection = episode_selection + 1;
	}
	episode_selected.innerHTML = episode_selection;
	final_datas();
}

/*FUNCTIONS TO SHOW OR HIDE SOME SECTIONS*/

function remove_container() {
	container.classList.add('opacity');
	setTimeout(function() {
		container.classList.add('hide');
	}, 500);
}

function remove_search() {
	search.classList.add('opacity');
	setTimeout(function() {
		search.classList.add('hide');
	}, 500);
}

function remove_selection() {
	selection.classList.add('opacity');
	setTimeout(function() {
		selection.classList.add('hide');
	}, 500);
}

function remove_dashboard() {
	dashboard.classList.add('opacity');
	dashboard.classList.add('hide');
}

function remove_value_changed() {
	value_changed.classList.add('opacity');
	value_changed.classList.add('hide');
}

function add_container() {
	setTimeout(function() {
		container.classList.remove('hide');
	}, 500);
	setTimeout(function() {
		container.classList.remove('opacity');
	}, 1000);
}

function add_search() {
	setTimeout(function() {
		search.classList.remove('hide');
	}, 500);
	setTimeout(function() {
		search.classList.remove('opacity');
	}, 1000);
}

function add_selection() {
	setTimeout(function() {
		selection.classList.remove('hide');
	}, 500);
	setTimeout(function() {
		selection.classList.remove('opacity');
	}, 1000);
}

function add_dashboard() {
	dashboard.classList.remove('hide');
	dashboard.classList.remove('opacity');
}

function add_value_changed() {
	value_changed.classList.remove('hide');
	value_changed.classList.remove('opacity');
}

/*VARIABLES AFFECTATIONS AFTER THE 'WATCH CLICK'*/

watch.onclick = function() {
	remove_selection();
	if (saison_selection < 9) {
		if (episode_selection < 9) {
			saison.innerHTML = "S0" + saison_selection + "E0" + episode_selection;
			dashboard_subtitle.innerHTML = "S0" + saison_selection + "E0" +
				episode_selection;
		} else {
			saison.innerHTML = "S0" + saison_selection + "E" + episode_selection;
			dashboard_subtitle.innerHTML = "S0" + saison_selection + "E" +
				episode_selection;
		}
	} else {
		if (episode_selection < 9) {
			saison.innerHTML = "S" + saison_selection + "E0" + episode_selection;
			dashboard_subtitle.innerHTML = "S" + saison_selection + "E0" +
				episode_selection;
		} else {
			saison.innerHTML = "S" + saison_selection + "E" + episode_selection;
			dashboard_subtitle.innerHTML = "S" + saison_selection + "E" +
				episode_selection;
		}
	}
	add_container();
	setTimeout(function() {
		video_played();
	}, 1000);
};

/*VARIABLES AFFECTATIONS AFTER THE 'ADD CLICK'*/

add.onclick = function() {
	remove_selection();
	serie.innerHTML = "MY SERIES";
	saison.innerHTML = "ADD";
	add_search();
	remove_container();
	video.pause();
};

/*VARIABLES AFFECTATIONS AFTER THE 'ADD_SERIE CLICK'*/

add_serie.onclick = function() {
	search.classList.add('opacity');
	setTimeout(function() {
		search.classList.add('hide');
	}, 500);
	serie.innerHTML = "SERIE ADDED";
	saison.innerHTML = "> SELECT";
	remove_search();
	add_selection();
};

/*FULLSCREEN METHOD'*/

function enterFullscreen(element) {
	if (element.requestFullScreen) {
		element.requestFullScreen();
	} else if (element.webkitRequestFullScreen) {
		element.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
	} else if (element.mozRequestFullScreen) {
		element.mozRequestFullScreen();
	} else {
		alert(
			'Votre navigateur ne supporte pas le mode plein écran, il est temps de passer à un plus récent ;)'
		);
	}
}

function exitFullscreen() {
	if (document.cancelFullScreen) {
		document.cancelFullScreen();
	} else if (document.webkitCancelFullScreen) {
		document.webkitCancelFullScreen();
	} else if (document.mozCancelFullScreen) {
		document.mozCancelFullScreen();
	}
}

/*ANIMATION TO SHOW & HIDE THE DASHBOARD*/

container.onmouseover = function() {
	add_dashboard();
	add_value_changed();
}
container.onmouseout = function() {
	remove_dashboard();
	remove_value_changed();
}

/*FUNCTION TO SHOW & HIDE THE DASHBOARD*/

function popup() {
		value_changed.classList.add('popup');
		setTimeout(function() {
			value_changed.classList.remove('popup');
		}, 3000);
	}