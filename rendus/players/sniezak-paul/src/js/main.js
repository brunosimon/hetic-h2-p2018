// Initialisation des variables globales
// Vidéo/Playlist
var video = document.querySelector(".video");
    add = document.querySelector(".add");

// Boutons/Sliders
var statusButton = document.querySelector(".status"),
    progressBar = document.querySelector(".progress-bar"),
    muteButton = document.querySelector(".mute"),
    volumeBar = document.querySelector(".volume-bar"),
    fullscreenButton= document.querySelector(".fullscreen");


// Fonctions d'écoute des évenements du contrôleur
// Status Play/Pause
statusButton.addEventListener("click", function() {
    if (video.paused == true) {
        // Si la vidéo est en pause, alors elle se lance et le bouton change en "Pause".
        video.play();
        statusButton.innerHTML = "Pause";
    } else {
        // Sinon (la vidéo est en play), alors elle se met en pause et le bouton change en play.
        video.pause();
        statusButton.innerHTML = "Play";
    }
});

// Mute
muteButton.addEventListener("click", function() {
    if (video.muted == false) {
        // Si la vidéo n'est pas muette, alors on la mute et on change le bouton.
        video.muted = true;
        muteButton.innerHTML = "Unmute";
    } else {
        // Si la vidéo est muette, alors on la unmute et on change le bouton.
        video.muted = false;
        muteButton.innerHTML = "Mute";
    }
});

// Fullscreen
fullscreenButton.addEventListener("click", function() {
    if (video.requestFullscreen) {
        // Si on demande le fullscreen, on utilise l'API fullscreen.
        video.requestFullscreen();
    } else if (video.mozRequestFullScreen) {
        // Compatibilité Firefox.
        video.mozRequestFullScreen();
    } else if (video.webkitRequestFullscreen) {
        // Compatiblité Chrome
        video.webkitRequestFullscreen();
    }
});

// Volume
volumeBar.addEventListener("change", function() {
    // Change le volume en temps réel selon la position du input range.
    video.volume = volumeBar.value;
});

// Bar de progression
progressBar.addEventListener("change", function() {
    // Calcul la position du curseur de la progressBar par rapport au temps de la vidéo.
    var time = video.duration * (progressBar.value / 100);
    // Met à jour la vidéo par rapport à cette position.
    video.currentTime = time;
});
video.addEventListener("timeupdate", function() {
    // Calcul la position du curseur sur la barre quand il y a changement de temps (timeupdate).
    var progress = (100 / video.duration) * video.currentTime;
    // Met à jour la valeur de la barre de progression en fonction.
    progressBar.value = progress;
});
// Met la vidéo en pause quand on drag le curseur (afin d'éviter le glitching).
progressBar.addEventListener("mousedown", function() {
    video.pause();
});
// Remet la vidéo en play une fois qu'on lache le curseur.
progressBar.addEventListener("mouseup", function() {
    video.play();
});


// Fonction de mise en place de l'ajout de vidéo dans la playlist
add.addEventListener("change", function() {

    // Initialisation de la variable files quand on ajoute un nouveau fichier.
    var files = add.files,
        len = files.length;

    // Permet de spécifier dynamiquement la source de la vidéo ajoutée.
    var source = "src/media/videos/" + files[0].name;

    // Permet d'ajouter un "li" au menu de droite (playlist) avec le chemin et une fonction personnalisés selon la vidéo.
    document.querySelector('.menu').innerHTML += '<li><video class="preview" src=' + source + ' onclick="video.src = ' + "'" + source + "'" + '" ></video></li>';
    
}, false);


// Permet de changer le status de la vidéo en cliquant dessus.
video.addEventListener("click", function() {
    if (video.paused) {
        video.play();
        statusButton.innerHTML = "Pause";
      } else {
        video.pause();
        statusButton.innerHTML = "Play";
      }
});

// Permet de changer le status de la vidéo en appuyant sur la barre espace.
window.addEventListener("keypress", function (evt) {
    if (evt.which === 32) {
        if (video.paused == true) {
            video.play();
            statusButton.innerHTML = "Pause";
            evt.preventDefault();
        } else {
            video.pause();
            statusButton.innerHTML = "Play";
            evt.preventDefault();
        }
    }
});

// Permet de mettre la vidéo en fullscreen en appuyant sur 'f'.
window.addEventListener("keypress", function (evt) {
    if (evt.which === 102) {
        if (video.requestFullscreen) {
            video.requestFullscreen();
        } else if (video.mozRequestFullScreen) {
            video.mozRequestFullScreen();
        } else if (video.webkitRequestFullscreen) {
            video.webkitRequestFullscreen();
        }
    }
});

// Permet de mute/unmute en appuyant sur m.
window.addEventListener("keypress", function (evt) {
    if (evt.which === 109) {
        if (video.muted == false) {
            video.muted = true;
            muteButton.innerHTML = "Unmute";
        } else {
            video.muted = false;
            muteButton.innerHTML = "Mute";
        }
    }
});