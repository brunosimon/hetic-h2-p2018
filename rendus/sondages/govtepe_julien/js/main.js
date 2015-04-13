// utilisation de l'api youtube 
var tag = document.createElement('script');

        tag.src = "//www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;

    function onYouTubeIframeAPIReady() {
        player = new YT.Player('video-background', {
            events: {
                'onReady': onPlayerReady
            }
        });
    }

    function onPlayerReady(event) {
        player.mute();
        player.playVideo();
    }


