var canvas 	= document.getElementById('canvas'),
	context = canvas.getContext('2d');

var foreground,
	middle,
	background;

var mouseX 		= 0,
	mouseY 		= 0,
	mouseX_back = 0,
	mouseY_back	= 0,
	direction;

//Initialise la taille du canvas
canvas.height = screen.height * 2;
canvas.width  = screen.width * 2;

//Constructeur étoile
function Star(){
	this.x 	= Math.floor((Math.random() * screen.width * 2) + 1);
	this.y 	= Math.floor((Math.random() * screen.height * 2) + 1);
}

//Constructeur calque étoilé
function Star_layer(count, size, speed){
	this.size 	 = size;
	this.count 	 = count;
	this.speed	 = speed;
	this.array	 = [];

	//Méthode d'initialisation des calques
	this.init 	 = function(count, size, speed){
		for (var i = 0; i < this.count; i++) {
	
			this.array.push(new Star);

			context.beginPath();
			context.arc(this.array[i].x, this.array[i].y, this.size, 0, Math.PI * 2);
			context.fillStyle = 'white';
			context.fill();
			context.closePath();
		};
		console.log(this.array);
	};

	//Méthode d'animation des calques
	this.animate = function(count, size, speed){
			
		for (var i = 0; i < this.array.length; i++) {

			//Droite
			if (direction == 1) {
				this.array[i].x -= this.speed;
			}
			//Gauche
			else if (direction == 2) {
				this.array[i].x += this.speed;
			}
			//Bas
			else if (direction == 3) {
				this.array[i].y -= this.speed;
			}
			//Haut
			else if (direction == 4) {
				this.array[i].y += this.speed;
			}
			
			context.beginPath();
			context.arc(this.array[i].x, this.array[i].y, this.size, 0, Math.PI * 2);
			context.fillStyle = 'white';
			context.fill();
			context.closePath();
		};

	};
}

//Initialisation des instances du calque d'étoile
foreground 	= new Star_layer(200, 7, 3),
middle		= new Star_layer(200, 4, 2),
background	= new Star_layer(300, 2, 1);

foreground.init();
middle.init();
background.init();


//Direction de la sourie
function mouse_animate(e){
		mouseX = e.clientX;
		mouseY = e.clientY;

		//Sourie à droite
		if (mouseX > mouseX_back) {
			direction = 1;
			context.clearRect(0, 0, screen.width * 2, screen.height * 2);
			foreground.animate();
			middle.animate();
			background.animate();
		}
		//Sourie à gauche
		else if (mouseX < mouseX_back) {
			direction = 2;
			context.clearRect(0, 0, screen.width * 2, screen.height * 2);
			foreground.animate();
			middle.animate();
			background.animate();
		}
		//Souris en bas
		if (mouseY > mouseY_back) {
			direction = 3;
			context.clearRect(0, 0, screen.width * 2, screen.height * 2);
			foreground.animate();
			middle.animate();
			background.animate();
		}
		//Souris en haut
		else if (mouseY < mouseY_back) {
			direction = 4;
			context.clearRect(0, 0, screen.width * 2, screen.height * 2);
			foreground.animate();
			middle.animate();
			background.animate();
		}

		mouseX_back = mouseX;
		mouseY_back = mouseY;
}

//Event sourie qui bouge
document.addEventListener('mousemove', mouse_animate, false);


var img = document.getElementById('img');

console.log(img.height);
