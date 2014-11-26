/*
========================================================================
            DISCLAIMER
copyleft 
Morgan Caron, HETIC H2

Sound Analysis, game mechanics and audio visualizations code is home made,
known algorithms are quoted when used 

Connection to Soundcloud API and Soundcloud UI are from : 
https://github.com/michaelbromley/soundcloud-visualizer/blob/master/js/app.js

A Million thanks !
========================================================================


*/


var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');

var canvasW = canvas.width = window.innerWidth,
    canvasH = canvas.height = window.innerHeight;

window.requestAnimFrame = (function(){
    return  window.requestAnimationFrame || 
    window.webkitRequestAnimationFrame   || 
    window.mozRequestAnimationFrame      || 
    window.oRequestAnimationFrame        || 
    window.msRequestAnimationFrame       || 
    function(callback, element){
        window.setTimeout(function(){
            callback(+new Date);
        }, 1000 / 60);
    };
})();

var gameStopped = true;
//store receptors in an array for easy manipulation
var receptors = [];
var blocks = [];
var cruiser;
var scoreboard;

/*
========================================================================
			SOUND COLLECT AND ANALYSIS
========================================================================
*/
//  0.  ===========  Initialize =============

/**
 * The *AudioSource object creates an analyzer node, sets up a repeating function with setInterval
 * which samples the input and turns it into an FFT array. The object has two properties:
 * streamData - this is the Uint8Array containing the FFT data
 * volume - cumulative value of all the bins of the streaData.
 *
 */
//@params player (DOM audio tag)

//set up le buffer
//arrêter et remettre à zéro la track
//lancer la track et l'analyse

var SoundcloudAudioSource = function(player) {
	var self = this;
	var analyser;
	var audioContext = new (window.AudioContext || window.webkitAudioContext);
    //contains the history buffer for average energy 
    this.historyBuffer = [];
    //contains the audioprocessor for history buffering
    this.HistoryBufferProc = null;
    //states if the game is ready to display a block;
    this.bufferReady = true;

    //create an analyser, fournier transformation is 256 bytes wide
	analyser = audioContext.createAnalyser();
	analyser.fftSize = 256;

    //create source for the audio element
    //route the source to the analyser
	var source = audioContext.createMediaElementSource(player);
	source.connect(analyser);

    // delay = time a block takes to go from right side to Cruiser's tip.
    // Makes the beat sensation stronger since collisions are synced with beat detection

    // time = distance / speed
    // time = (canvasW - (cruiser.x + cruiser.width)) / ((canvasW/1000) * 10/(1/60))
    this.cruiserWidth = (canvasW/4 + canvasW/32) / 3;
    this.cruiserX = canvasW/3 - this.cruiserWidth;
    this.delay = (canvasW - (this.cruiserX + this.cruiserWidth)) / ( ((canvasW/1000) * 10)*60);

    //delay will get called when needed
    var blockDelay = audioContext.createDelay(this.delay);

    //route analyser to player
	analyser.connect(audioContext.destination);

    /*
     *logs 1 second of audio to this.historyBuffer
     *calls clearBufferMaker 
    */
    this.createBufferHistory = function(){
        //play the song 
        player.play;

        //function to fill the history buffer
        //set to record 1 second of samples
        this.historyBufferProc = audioContext.createScriptProcessor(1024,1,1);
        this.historyBufferProc.connect(audioContext.destination);
        this.historyBufferProc.onaudioprocess = function(){
            analyser.getByteFrequencyData(self.streamData);
            if (source.playbackState == source.PLAYING_STATE) {
                //get the average volume on streamData.length
                var total = 0;
                for (var i = 0; i < 80; i++) { // get the volume from the first 80 bins, else it gets too loud with treble
                    total += self.streamData[i];
                }
                self.instantVolume = total / 80;

                self.historyBuffer.unshift(self.instantVolume);

                //buffer is big enough
                //clear everything !
                if ( self.historyBuffer.length > 43){
                    self.clearBufferMaker();
                }
            }
        }
    }

    /*
     * clear audioprocess
     * bring the track to 00:00 again
    */
    this.clearBufferMaker = function(){
        this.historyBufferProc.onaudioprocess = null;
        this.historyBufferProc.disconnect();

        player.paused = true;
        player.currentTime = 0;

        this.setSampleAnalysis();

        player.paused = false;
    }

    /*
     * Beat Detection
     * application of "simple sound algorithm #3" from 
    http://archive.gamedev.net/archive/reference/programming/features/beatdetection/index.html
    */
    this.setSampleAnalysis = function(){
        //collect 5/100 second of data
        this.instantSample = audioContext.createScriptProcessor(1024, 1, 1);
        this.instantSample.connect(blockDelay);
        blockDelay.connect(audioContext.destination);
        this.instantSample.onaudioprocess = function(){
            analyser.getByteFrequencyData(self.streamData);
            if (source.playbackState == source.PLAYING_STATE) {
                
                //get the average volume on 5/100 seconds aka instant volume
                var total = 0;
                for (var i = 0; i < 80; i++) { // get the volume from the first 80 bins, else it gets too loud with treble
                    total += self.streamData[i];
                }
                self.instantVolume = total / 80;

                //compute average volume on 1 second
                total = 0;
                for ( i = 0; i < self.historyBuffer.length; i ++){
                    total += self.historyBuffer[i];
                }
                self.averageVolume = total / self.historyBuffer.length;


                //compute variance
                var V;
                total = 0;
                for (i = 0; i < self.historyBuffer.length; i++){
                        total += ((self.historyBuffer[i]-self.averageVolume)* (self.historyBuffer[i]-self.averageVolume));
                }
                V = total / self.historyBuffer.length;

                //linear regression of variance
                var C = (-0.0025714*V)+1.5142857;

                //update history buffer
                self.historyBuffer.unshift(self.instantVolume);
                self.historyBuffer.pop();                

                //if instant volume > averageVolue * variance -> beat detected ! 
                if ( self.bufferReady){
                    if ( self.instantVolume >= (C*self.averageVolume) ){
                        newBlock();
                        self.bufferReady = false;
                        setTimeout(function(){self.bufferReady = true;}, 500);
                    }
                }
            }
            
        }
    }

    this.stopAnalysis = function(){
        //stop audio process
        self.instantSample.onaudioprocess = null;
    }

	this.instantSample; // store the instant sample to analyse

	this.instantVolume = 0; 
    this.averageVolume = 0;
	this.streamData = new Uint8Array(128);

	this.playStream = function(streamUrl, loader){
		//get the input stream from the audio element
		player.addEventListener('ended', function(){
            endGame();
			loader.directStream('coasting');
            self.stopAnalysis();
		});
		player.setAttribute('src', streamUrl);
        self.createBufferHistory();
	};

}

function drawVolume(average){
    ctx.clearRect(0,150,canvasW,canvasH);
    ctx.fillStyle = "black";
    ctx.fillRect(90, canvasH-average, 25, canvasH)
}

function drawVolumeA(average){
	ctx.clearRect(170,250,canvasW,canvasH);
    ctx.fillstyle= "grey";
	ctx.fillRect(200, canvasH-average, 25, canvasH)
}

/**
 * Makes a request to the Soundcloud API and returns the JSON data.
 */
var SoundcloudLoader = function(player, uiUpdater){
	var self = this;
	var client_id = "cc1593be64d9ded35b38152ee5908fa3";
	this.sound = {};
	this.streamUrl = "";
	this.errorMessage = "";
    this.player = player;
    this.uiUpdater = uiUpdater;

     /**
     * Loads the JSON stream data object from the URL of the track (as given in the location bar of the browser when browsing Soundcloud),
     * and on success it calls the callback passed to it (for example, used to then send the stream_url to the audiosource object).
     * @param track_url
     * @param callback
     */
    this.loadStream = function(track_url, successCallback, errorCallback) {
        SC.initialize({
            client_id: client_id
        });
        SC.get('/resolve', { url: track_url }, function(sound) {
            if (sound.errors) {
                self.errorMessage = "";
                for (var i = 0; i < sound.errors.length; i++) {
                    self.errorMessage += sound.errors[i].error_message + '<br>';
                }
                self.errorMessage += 'Make sure the URL has the correct format: https://soundcloud.com/user/title-of-the-track';
                errorCallback();
            } else {
                if(sound.kind=="playlist"){
                    self.sound = sound;
                    self.streamPlaylistIndex = 0;
                    self.streamUrl = function(){
                        return sound.tracks[self.streamPlaylistIndex].stream_url + '?client_id=' + client_id;
                    }
                    successCallback();
                }else{
                    self.sound = sound;
                    self.streamUrl = function(){ return sound.stream_url + '?client_id=' + client_id; };
                    successCallback();
                }
            }
        });
    };

    //play/pause audio, call track info updater
    this.directStream = function(direction){
        if(direction=='toggle'){
            if (this.player.paused) {
                this.player.play();
            } else {
                this.player.pause();
            }
        }
        else if(this.sound.kind=="playlist"){
            if(direction=='coasting') {
                this.streamPlaylistIndex++;
            }else if(direction=='forward') {
                if(this.streamPlaylistIndex>=this.sound.track_count-1) this.streamPlaylistIndex = 0;
                else this.streamPlaylistIndex++;
            }else{
                if(this.streamPlaylistIndex<=0) this.streamPlaylistIndex = this.sound.track_count-1;
                else this.streamPlaylistIndex--;
            }
            if(this.streamPlaylistIndex>=0 && this.streamPlaylistIndex<=this.sound.track_count-1) {
               this.player.setAttribute('src',this.streamUrl());
               this.uiUpdater.update(this);
               this.player.play();
            }
        }
    }
}

var Visualizer = function(){
	this.soundEnergy = function(){
        for (var i = 0; i < 1024; i++ ){
            for (var k = 0; k < 1024; k++){

            }
        }
	}
}

/**
 * Class to update the UI when a new sound is loaded
 * @constructor
 */
var UiUpdater = function() {
    var controlPanel = document.getElementById('controlPanel');
    var trackInfoPanel = document.getElementById('trackInfoPanel');
    var infoImage = document.getElementById('infoImage');
    var infoArtist = document.getElementById('infoArtist');
    var infoTrack = document.getElementById('infoTrack');
    var messageBox = document.getElementById('messageBox');

    this.clearInfoPanel = function() {
        // first clear the current contents
        infoArtist.innerHTML = "";
        infoTrack.innerHTML = "";
        trackInfoPanel.className = 'hidden';
    };
    this.update = function(loader) {
        // update the track and artist into in the controlPanel
        var artistLink = document.createElement('a');
        artistLink.setAttribute('href', loader.sound.user.permalink_url);
        artistLink.innerHTML = loader.sound.user.username;
        var trackLink = document.createElement('a');
        trackLink.setAttribute('href', loader.sound.permalink_url);

        if(loader.sound.kind=="playlist"){
            trackLink.innerHTML = "<p>" + loader.sound.tracks[loader.streamPlaylistIndex].title + "</p>" + "<p>"+loader.sound.title+"</p>";
        }else{
            trackLink.innerHTML = loader.sound.title;
        }

        var image = loader.sound.artwork_url ? loader.sound.artwork_url : loader.sound.user.avatar_url; // if no track artwork exists, use the user's avatar.
        infoImage.setAttribute('src', image);

        infoArtist.innerHTML = '';
        infoArtist.appendChild(artistLink);

        infoTrack.innerHTML = '';
        infoTrack.appendChild(trackLink);

        // display the track info panel
        trackInfoPanel.className = '';

        // add a hash to the URL so it can be shared or saved
        var trackToken = loader.sound.permalink_url.substr(22);
        window.location = '#' + trackToken;
    };
    this.toggleControlPanel = function() {
        if (controlPanel.className.indexOf('hidden') === 0) {
            controlPanel.className = '';
        } else {
            controlPanel.className = 'hidden';
        }
    };
    this.displayMessage = function(title, message) {
        messageBox.innerHTML = ''; // reset the contents

        var titleElement = document.createElement('h3');
        titleElement.innerHTML = title;

        var messageElement = document.createElement('p');
        messageElement.innerHTML = message;

        var closeButton = document.createElement('a');
        closeButton.setAttribute('href', '#');
        closeButton.innerHTML = 'close';
        closeButton.addEventListener('click', function(e) {
            e.preventDefault();
            messageBox.className = 'hidden';
        });

        messageBox.className = '';
        // stick them into the container div
        messageBox.appendChild(titleElement);
        messageBox.appendChild(messageElement);
        messageBox.appendChild(closeButton);
    };
};

/*
========================================================================
            THE GAME
                                (you lose :p )
                                http://www.losethegame.net/home
                              
========================================================================
*/

//basic responsive game scene
function drawTrack() {
    ctx.beginPath();
    ctx.moveTo(0,(0.2*canvasH));
    ctx.lineTo(canvasW,(0.2*canvasH));
    ctx.moveTo(0,(0.4*canvasH));
    ctx.lineTo(canvasW,(0.4*canvasH));
    ctx.moveTo(0,(0.6*canvasH));
    ctx.lineTo(canvasW,(0.6*canvasH));
    ctx.moveTo(0,(0.8*canvasH));
    ctx.lineTo(canvasW,(0.8*canvasH));
    ctx.closePath();

    ctx.strokeStyle = "white";
    ctx.lineWidth = 1.5;
    ctx.lineCap = "round";

    ctx.stroke();
}

/*
 * RECEPTORS
*/


var Receptor = function(){
    this.width = (canvasW/4 + canvasW/32) / 5;
    this.height = (canvasH/5) - (canvasH/25);
    this.color = null;

    this.draw = function(i, j){
        ctx.fillStyle = "#000";
        this.marginRight = (canvasW/64)+(j*(this.width+canvasW/64));
        this.marginTop = (canvasH/5 + canvasH/50) + i*(canvasH/5); 
        ctx.beginPath();
        //left to top
        ctx.moveTo(this.marginRight,this.marginTop+(this.height/5));
        ctx.lineTo(this.marginRight+(0.2*this.width), this.marginTop );
        ctx.lineTo(this.marginRight+this.width, this.marginTop );
        ctx.lineTo(this.marginRight+this.width, this.marginTop+(0.8*this.height));
        //go to bottom
        ctx.lineTo(this.marginRight+(0.8*this.width),this.marginTop+this.height);
        ctx.lineTo(this.marginRight, this.marginTop+this.height);
        ctx.lineTo(this.marginRight, this.marginTop+(this.height/5));

        ctx.strokeStyle = "#D6D6D6";
        ctx.lineWidth = 1.5;
        ctx.lineCap = "round";  

        if (this.color != null){
            ctx.fillStyle = this.color;
            ctx.lineWidth = 0;
            ctx.fill();
            ctx.closePath();
        }
        else{ctx.stroke();}                 
    }
}

//redraw all receptors
function updateReceptors(){
    for ( var i = 0; i < 3; i++){
        for (var j = 0; j < 5; j++){
            receptors[i][j].draw(i,j);
        }
    }
}

//set all receptors to basic
function initReceptors(){
    for ( var i = 0; i < 3; i++){
        receptors[i] = [];
        for (var j = 0; j < 5; j++){
            var color = null;
            if (receptors[i][j]){color = receptor[i][j].color;}

            receptors[i][j] = new Receptor();
            if (color != null){receptors[i][j].color = color;}
        }
    }
}

function drawReceptors(){
    if (receptors.length == 3){
        updateReceptors();
    }
    else {initReceptors();}
}

/*
 * BLOCKS
 * blocks are meant to be catched by Player's Cruiser
 * They appear thanks to the Beat Detection Algorithm
 * Once you catch one, it gets on the receptor's queue
 * If you get 3 blocks of the same color in a row, you get 3 points
 * if you fill a receptors queue, it clears but you do not win any point
 * Grey Blocks are fake and will not score
*/

var Block = function(){
    this.colors = [ ["#14A7DB","#0F7DA4"],  //blue
                    ["#F7BF3E","#F5AF0E"],  //yellow
                    ["#F5180E","#B7120B"],  //red
                    ["#6BAD43","#4CB702"],  //green
                    ["#D6D6D5","#ADADAB"]   //grey
                    ];
    this.color = 0;
    this.track = 0;
    this.offset = 0;

    this.speed = (canvasW / 1000) * 10;
}

//set random color for each new block
Block.prototype.setColor = function(){
    this.color = this.colors[Math.floor(Math.random()*5)];
}

Block.prototype.draw = function(){

    var blockW = (canvasW/4 + canvasW/32) / 3,
        blockH = (canvasH/5) - (canvasH/25);

    var marginRight = (canvasW - this.offset) - (canvasW/64)+((blockW+canvasW/64)),
        marginTop = (canvasH/5 + canvasH/50) + ((canvasH/5) * this.track); 

        ctx.beginPath();
        //left to top
        ctx.moveTo(marginRight,marginTop+(blockH/5));
        ctx.lineTo(marginRight+(0.2*blockW), marginTop );
        ctx.lineTo(marginRight+blockW, marginTop );
        ctx.lineTo(marginRight+blockW, marginTop+(0.8*blockH));
        //go to bottom
        ctx.lineTo(marginRight+(0.8*blockW),marginTop+blockH);
        ctx.lineTo(marginRight, marginTop+blockH);
        ctx.lineTo(marginRight, marginTop+(blockH/5));

        ctx.fillStyle = this.color[0];

        ctx.fill();
        ctx.closePath();
}

//create a new Block and push to blocks array
function newBlock(){
    blocks.push(new Block);
    blocks[blocks.length-1].setColor();
    blocks[blocks.length-1].track = Math.floor(Math.random()*3);

}

/*
 * The Cruiser is the player's spaceship
 * He controls it with Up and Down arrows and must catch Blocks
*/
var Cruiser = function(){
    this.track = 1;
}

Cruiser.prototype.draw = function(){
    //step 1 : draw the space cruiser
    this.width = (canvasW/4 + canvasW/32) / 3;
    this.height = (canvasH/6) - (canvasH/36);

    //default position on middle track
    this.x = canvasW/3 - this.width;
    this.y = canvasH/5 + canvasH/72 + (this.track * canvasH/5 + canvasH/72) ;

    ctx.fillStyle = "#005FE8";

    ctx.beginPath();
    ctx.moveTo(this.x, this.y);
    ctx.lineTo(this.x+this.width ,this.y+this.height/2);
    ctx.lineTo(this.x+(this.width/3), this.y+this.height/2);
    ctx.lineTo(this.x, this.y);
    ctx.fill();
    ctx.closePath();

    ctx.fillStyle = "#0C009C";

    ctx.beginPath();
    ctx.moveTo(this.x+(this.width/3), this.y+this.height/2);
    ctx.lineTo(this.x+this.width ,this.y+this.height/2);
    ctx.lineTo(this.x, this.y + this.height);
    ctx.lineTo(this.x+(this.width/3), this.y+this.height/2);
    ctx.fill();
    ctx.closePath();

}
//change cruiser's track
Cruiser.prototype.move = function(direction){
    if ( direction == "up"){
        //secure 
        if ( this.track > 0){
            this.track--;
        }
    }
    else {
        //secure
        if ( this.track < 2){
            this.track++;
        }
    }
}



// classic loop, with a constant 60 fps framerate to enable speed-related events 
//example : the delay beetween beat detection and blocks arriving to player's cruiser
function loop(){
    var fps = 60;
    setTimeout(function() {
            requestAnimFrame(loop);
            if(!gameStopped){
                update();
                draw();
                scoreboard.handle();
            }
        }, 1000 / fps);
}

//updates the position and states of objects
function update(){
    for (var i = 0; i < blocks.length; i++){
        blocks[i].offset = blocks[i].offset + blocks[i].speed;

        //remove block from array if it goes too far
        if (blocks[i].offset > (canvasW + (canvasW/4))){
            blocks.splice(i, 1);
        }

        //if collision with cruiser
        else{
            if (blocks[i].offset > (canvasW - cruiser.x) && blocks[i].offset < (canvasW - (cruiser.x-cruiser.width/2) ) && blocks[i].track == cruiser.track){

                //fill color in receptor
                var collisionTrack = blocks[i].track;
                var blockColor = blocks[i].color[0];
                var painted = false;
                for ( var j = 0; j < receptors[collisionTrack].length; j++){
                    if ( receptors[collisionTrack][j].color == null && !painted){
                        receptors[collisionTrack][j].color = blockColor;
                        painted = true;
                    }
                }

                //remove block from array
                blocks.splice(i, 1);
            }
        }    
    }
}

//draw updates objects
function draw(){

    //blends the background and the foreground for blocks' tracers
    ctx.fillStyle = "rgba(0, 0, 0, 0.2)";
    ctx.fillRect(0, 0, canvasW, canvasH);
    
    //redraw the game scene
    drawTrack();
    //redraw receptors
    drawReceptors();
    
    //redraw blocks
    for (var i = 0; i < blocks.length; i++){
        blocks[i].draw();
    }

    //redraw the cruiser
    cruiser.draw();
}

function endGame(){
    gameStopped = true;
    ctx.clearRect(0,0,canvasW, canvasH);
    ctx.fillStyle = "#000";
    ctx.fillRect(0,0,canvasW, canvasH);
    this.fontSize = (canvasW/4 + canvasW/16) / 5;
    this.floatX = canvasW /4;
    this.floatY = canvasH/3;

    ctx.fillStyle = "#fff";
    ctx.font = this.fontSize +'px impact';

    ctx.fillText("Fin de la partie !", this.floatX, this.floatY);
    ctx.fillText("Veuillez renseigner", this.floatX, this.floatY+(this.floatY/3));
    ctx.fillText("une nouvelle URL.", this.floatX, this.floatY+(this.floatY/1.5));
}


/*
========================================================================
           SCORING ZONE
                                score board
                                win / lose
                                todo : localStorage ?
                                
========================================================================
*/

//checker les couleurs

// function checkScore(){

//     var colorCounter = 0;
//     var points = 0;

//     for (var i = 0; i < 3; i++){
//         colorCounter = 0;
//         for ( var j = 0; j < 4; j++){
//             if (receptors[i][j].color == receptors[i][j+1].color){
//                 colorCounter++;
//             }
//         }
//         if ( colorCounter > 1){ 
//             points += colorCounter * 1;
//         }
//     }
// }

var Score = function(){
    this.points = 0;
}

Score.prototype.handle = function(){
    this.count();
    this.display();
}

//count
Score.prototype.count = function(){
    //colorCounter = [following colors, color code, index of first color]
    this.colorCounter = [0, "", 0];
    this.nullCounter = 5;
    for (var i = 0; i < 3; i++){
        this.colorCounter = [0, "", 0];
        this.nullCounter = 5;
        // count following colors
        for ( var j = 0; j < 5; j++){
            //if color then count, full line possible
            if (receptors[i][j].color != null){
                this.nullCounter--;
            }
            //count following colors
            if (j<4){
                if (receptors[i][j].color == receptors[i][j+1].color && receptors[i][j+1].color != null){
                    this.colorCounter[0]++;
                    this.colorCounter[1] = receptors[i][j].color;
                }
            }
            //if 3 following colors, update !
            else if (this.colorCounter[0] > 1 && this.colorCounter[1] != "#D6D6D5"){
                this.points += this.colorCounter[0]+1;
                this.removeReceptors(i);
                this.colorCounter = [0, "", 0];
            }
        }

        // update points, update receptors array
        if ( this.colorCounter[0] > 1 && this.colorCounter[1] != "#D6D6D5"){ 
            this.points += this.colorCounter[0]+1;
            this.removeReceptors(i);
        }
        if (this.nullCounter == 0){
            scoreboard.fullLine(i);
        }
    }
}

//display score on top of the scene
Score.prototype.display = function(){

    this.fontSize = (canvasW/4 + canvasW/32) / 5;
    this.floatX = canvasW - (canvasW/3);
    this.floatY = canvasH/6;

    ctx.fillStyle = "#fff";
    ctx.font = this.fontSize +'px impact';
    ctx.fillText(this.points.toString()+" points", this.floatX, this.floatY);
}

//remove scored elements
//add new Receptors
Score.prototype.removeReceptors = function(line){
    receptors[line].splice(this.colorCounter[2], this.colorCounter[0]+1);
    for (var x = receptors[line].length; x < 5; x++){
        receptors[line][x] = new Receptor();
    }
}

Score.prototype.fullLine = function(line){
    for (var x = 0; x < 5; x++){
        receptors[line][x] = new Receptor();
    }
}




/*
========================================================================
            windows events
                                onload
                                keydown
                                onresize
                                
========================================================================
*/

window.onload = function init() {

    popIn();

    var player =  document.getElementById('player');
    var uiUpdater = new UiUpdater();
    var loader = new SoundcloudLoader(player,uiUpdater);
    var audioSource = new SoundcloudAudioSource(player);
    var form = document.getElementById('form');
    var loadAndUpdate = function(trackUrl) {
        loader.loadStream(trackUrl,
            function() {
                popOut();
                gameStopped = false;
                cruiser = new Cruiser;
                loop();
                scoreboard = new Score();
                scoreboard.display();
                uiUpdater.clearInfoPanel();
                audioSource.playStream(loader.streamUrl(), loader);
                uiUpdater.update(loader);
            },
            function() {
                uiUpdater.displayMessage("Error", loader.errorMessage);
            });
    };

    // on load, check to see if there is a track token in the URL, and if so, load that automatically
    if (window.location.hash) {
        var trackUrl = 'https://soundcloud.com/' + window.location.hash.substr(1);
        loadAndUpdate(trackUrl);
    }

    // handle the form submit event to load the new URL
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        var trackUrl = document.getElementById('input').value;
        loadAndUpdate(trackUrl);
    });
};

function popIn(){
    var popEl = document.getElementById("popin");
    popEl.setAttribute("class", "show");
}
function popOut(){
    var popEl = document.getElementById("popin");
    popEl.setAttribute("class", "hide");
}

window.onkeydown = function(e){
    //up arrow
    if ( e.keyCode == 38) {
        cruiser.move("up");
    }
    if ( e.keyCode == 40){
        cruiser.move("down");
    }
}

window.onresize = function(){
    canvasW = canvas.width = window.innerWidth;
    canvasH = canvas.height = window.innerHeight;
    drawTrack();
    initReceptors();
}