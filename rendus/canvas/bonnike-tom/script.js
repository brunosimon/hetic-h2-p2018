/******************************************************************************************************************************
Aide:
http://thecodeplayer.com/walkthrough/html5-game-tutorial-make-a-snake-game-using-html5-canvas-jquery => Aide pour les déplacements
http://jdstraughan.com/2013/03/05/html5-snake-with-source-code-walkthrough/ => Principalement le système de "FPS" pour limiter
le RequestAnimationFrame, et pouvoir augmenter la vitesse pour rendre le jeu de plus en plus dur.
******************************************************************************************************************************/

(function() { // PolyFill RequestAnimationFrame
    var lastTime = 0;
    var vendors = ['webkit', 'moz'];
    for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
        window.cancelAnimationFrame =
          window[vendors[x]+'CancelAnimationFrame'] || window[vendors[x]+'CancelRequestAnimationFrame'];
    }

    if (!window.requestAnimationFrame)
        window.requestAnimationFrame = function(callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            var id = window.setTimeout(function() { callback(currTime + timeToCall); },
              timeToCall);
            lastTime = currTime + timeToCall;
            return id;
        };

    if (!window.cancelAnimationFrame)
        window.cancelAnimationFrame = function(id) {
            clearTimeout(id);
        };
}());

var canvas  = document.getElementById('canvas'),
    context = canvas.getContext('2d'),
    changedDirection = false, // Variable utilisée pour empêcher le joueur de se mordre tout seul si il appuye trop vite sur deux touches (la direction aurait pu changer 2 fois en une frame du loop)
    gameIsRunning = false, // Variable utilisée pour stopper le RequestAnimationFrame si le joueur a perdu (j'ai essayé de faire avec CancelAnimationFrame mais cela ne fonctionnait pas)
    Snake = {
    	bodyPosArray: [],
    	direction: 'right',
    	setDirection: function(direction){
    		switch (direction){
    			case 'left': if (Snake.direction != 'right' && !changedDirection){Snake.direction = direction; changedDirection = true;} // Sécurité pour ne pas pouvoir aller dans le direction opposée à celle où l'on va actuellement et se "mordre" tout seul
    			break;
    			case 'up': if (Snake.direction != 'down' && !changedDirection){Snake.direction = direction; changedDirection = true;}
    			break;
    			case 'right': if (Snake.direction != 'left' && !changedDirection){Snake.direction = direction; changedDirection = true;}
    			break;
    			case 'down': if (Snake.direction != 'up' && !changedDirection){Snake.direction = direction; changedDirection = true;}
    			break;
    			default: return;
    		}
    	},
    	move: function(){
    		var nextPosition = Snake.bodyPosArray[0].slice();
	    	switch (Snake.direction){
				case 'left':
				if (nextPosition[0]-1 < 0){
					nextPosition[0] = 79;
				}
				else {nextPosition[0] -= 1};
				break;
				case 'up':
				if (nextPosition[1]-1 < 0){
					nextPosition[1] = 59;
				}
				else {nextPosition[1] -= 1};
				break;
				case 'right':
				if (nextPosition[0]+1 >= 80){
					nextPosition[0] = 0;
				}
				else {nextPosition[0] += 1};
				break;
				case 'down':
				if (nextPosition[1]+1 >= 60){
					nextPosition[1] = 0;
				}
				else {nextPosition[1] += 1};
				break;
				default: return;
			}

			Snake.bodyPosArray.unshift(nextPosition)
			Snake.bodyPosArray.pop();
    	}
    },
    Game = {
    	score: 0,
    	apple: null,
    	fps: 10,
    	init: function(){
    		Game.generateSnake();
    		Game.generateApple();
    		Game.score = 0;
    		Game.fps = 10;
    		gameIsRunning = true;
    		Game.loop();
    	},
    	loop: function(){
			context.clearRect(0,0,800,600);

			changedDirection = false;
			Snake.move();
			Game.watchPosition();
			Game.drawSnakeAndApple();
			Game.drawScore();

			if (gameIsRunning){
				setTimeout(function() { // Même si requestAnimationFrame est fait pour avoir le plus de FPS, j'ai du ralentir pour ne pas que ce soit trop dur trop vite
	    			window.requestAnimationFrame(Game.loop);
	  			}, 1000 / Game.fps);
			}
		},
    	over: function(){
    		gameIsRunning = false;
    		var scoreText = "You lost! You ate "+Game.score+" apples!";
			context.fillText(scoreText, canvas.width/2, canvas.height/2);
			context.fillText('RESTART', canvas.width/2, canvas.height/2+65);
    	},
    	drawSnakeAndApple: function(){
			for (var i = 0; i < Snake.bodyPosArray.length; i++) {
				var posX = 10 * Snake.bodyPosArray[i][0];
				var posY = 10 * Snake.bodyPosArray[i][1];
				context.save();
				context.fillStyle = '#00DD00';
		    	context.fillRect(posX, posY, 10, 10);
		    	context.restore();
			}
			context.save();
			context.fillStyle = '#F00';
			context.fillRect(apple.x, apple.y, 10, 10);
			context.restore();
    	},
    	drawScore: function(){
			var scoreText = "Score: " + Game.score;
			context.save();
			context.font = '9pt Arial';
			context.textAlign = 'left';
			context.fillText(scoreText, 5, canvas.height-5);
			context.restore();
    	},
    	generateSnake: function(){
    		Snake.direction = 'right';
    		Snake.bodyPosArray = [];
    		context.fillRect(0,0,45,10);
    		for (var i = 10; i >= 0; i--){
    			Snake.bodyPosArray.push([i, 0]);
    		}
    	},
    	generateApple: function(){
    		apple = {
				x: Math.floor(Math.random()*80)*10,
				y: Math.floor(Math.random()*60)*10
			};

			for (var i = 0; i < Snake.bodyPosArray.length; i++) {
		    	if (Snake.bodyPosArray[i][0] == apple.x && Snake.bodyPosArray[i][1] == apple.y){ // Si la pomme apparaît à un endroit où est déjà le snake
		    		Game.generateApple; // On regénère une pomme
		    	}
		    }
    	},
    	watchPosition: function() {
		    if (Snake.bodyPosArray[0][0] == apple.x/10 && Snake.bodyPosArray[0][1] == apple.y/10) { // Si la tête du snake est positionnée au même endroit que la pomme
		    	Game.score++; // Augmenter le score
		   		if (Game.score % 3 == 0 && Game.fps < 60) { // Tous les 3 points, si on est en dessous de 60FPS
		    		Game.fps++; // on augmente les FPS de 1.
		    	}
		    	Game.generateApple(); // Générer une nouvelle pomme
		    	var lastBodyPos = Snake.bodyPosArray[Snake.bodyPosArray.length-1];
		    	Snake.bodyPosArray.push([lastBodyPos[0],lastBodyPos[1]],[lastBodyPos[0],lastBodyPos[1]],[lastBodyPos[0],lastBodyPos[1]],[lastBodyPos[0],lastBodyPos[1]],[lastBodyPos[0],lastBodyPos[1]]);
		    	// On rajoute 5 items avec les positions du dernier item du tableau du snake, le snake grandira donc et les items se mettront aux bonnes valeurs au prochain mouvement
		    }

		    for (var i = 1; i < Snake.bodyPosArray.length; i++) {
		    	if (Snake.bodyPosArray[0][0] == Snake.bodyPosArray[i][0] && Snake.bodyPosArray[0][1] == Snake.bodyPosArray[i][1]){ // Si la tête du snake entre en collision avec une partie du corps
		    		Game.over(); // Le joueur a perdu
		    	}
		    }
  		}
    };

	context.fillStyle = '#FFF';
    context.font = '40pt Arial';
	context.textAlign = 'center';
	context.save();
	context.font = '50pt Arial';
	context.fillText('SNAKE', canvas.width/2, 100);
	context.restore();
	context.fillText('START', canvas.width/2, canvas.height/2+20);

// Détection touches fléchées / ZQSD
document.onkeydown = function(e) {
    e = e || window.event;

    switch(e.which || e.keyCode) {
    	case 37: // left
    	case 81: // Q
	    	Snake.setDirection('left');
	    break;

        case 38: // up
        case 90: // Z
	        Snake.setDirection('up');
	    break;

        case 39: // right
        case 68: // D
	        Snake.setDirection('right');
	    break;

        case 40: // down
        case 83: // S
        	Snake.setDirection('down');
        break;

        case 13: // ENTER
        case 32: // SPACE
        	if(gameIsRunning == false){Game.init()};
        break;

        default: return;
    }

    e.preventDefault();
};

// Détection clic boutons START & RESTART
canvas.addEventListener("mousedown", getMousePosition, false);
function getMousePosition(event){
	var clickX = event.x;
	var clickY = event.y;

	clickX -= canvas.offsetLeft;
	clickY -= canvas.offsetTop;

	if (clickX > 270 && clickX < 530 && clickY > 265 && clickY < 370 && gameIsRunning == false){
  		Game.init();
  	}
}