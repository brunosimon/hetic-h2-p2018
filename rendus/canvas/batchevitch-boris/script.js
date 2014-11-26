// Variable du Jeu

//Largeur et Hauteur du canvas
var width = 700,
height = 600,

//Les Codes des Touchés pour le EventListener
upArrow = 38,
downArrow = 40,
leftArrow = 37,
rightArrow = 39,

//Variable qui indique si seuls les IA jouent ou si le joueur a rejoint
playerActivated = false,

//Parce que c'est loin d'écrire Math.PI à xhaque fois
pi = Math.PI,


canvas = document.getElementById("canvas"),
context = canvas.getContext("2d"),

//Pour notre EventListener
keystate,

//Définit les 2 joueurs, par défaut 2 IA puis un IA pourra devenir humain. 
ai,
ai2,

//Les scores des 2 camps
score1 = 0,
lastScore1 = 0,
score2 = -1,
lastScore2 = 0,

// On affichera "Joueur 1/2 a marqué un point"
message = "",

// Indique à l'utilisateur qu'il peut joueur
player = "IA -> Appuyez sur A",

// la balle du jeu
ball;

//Notre premier IA...
ai = {
	x: null,
	y: null,

	//Variable de la planche du pong
	width: 20,
	height: 100,

	update: function(){
		
		// Trajectory va permettre a IA de suivre la balle
		// On tient compte de la hauteur de la planche et de celle de la balle
		var trajectory = ball.y - (this.height - ball.side)*0.5;
		// on ajoute un facteur qui va permettre à l'IA de perdre (pour pas qu'il touche la balle tjrs au centre)
		this.y += (trajectory - this.y)*0.12; 
	},
	draw: function(){
		// et on met a jour notre element de canvas 
		context.fillRect(this.x, this.y, this.width, this.height);	
	}
};

//Meme chosr pour le 2eme IA
ai2 = {
	x: null,
	y: null,
	width: 20,
	height: 100,


	//si on a cliqué sur la souris alors afficher que le prof joue
	update: function(){
		if(playerActivated == true){
			player = "Le Prof";
		}
		else if(playerActivated == false){
			player = "IA  -> Clique Gauche";
		}
		//on gère le déplacement sur les 4 axes avec les touches directionnelles
		if(playerActivated == true){
			if(keystate[upArrow]) this.y -= 7;
			if(keystate[downArrow]) this.y += 7;
			if(keystate[leftArrow]) this.x -= 7;
			if(keystate[rightArrow]) this.x += 7;
		}
		//Si c'est pas un humain qui joue alors pareil que l'autre IA
		if(playerActivated == false){
			var trajectory = ball.y - (this.height - ball.side)*0.5;
			// Ici j'ai fait en sorte que cet IA ne touche qu'avec son bord du haut afin de faire que des coups forts
			this.y += (trajectory - this.y)-50+this.height;
		}
	},
	draw: function(){
		context.fillRect(this.x, this.y, this.width, this.height);	
	}
};

//La balle...
ball = {
	x: null,
	y: null,
	vel: null,
	speed: 12,
	side: 20, //C'est un carré


	update: function() {
		this.x += this.vel.x;
		this.y += this.vel.y;

		// Si la balle touche le haut ou le bas du canvas alors..
		if(0 > this.y || this.y+this.side > height) {
			// ici on ajoute un offset, pr que la balle dessinée touche bien les bordures du canvas
			// et pas juste là où le point Y se trouve.
			var offset = this.vel.y < 0 ? 0 - this.y : height - (this.y+this.side);
			this.y += 2*offset;
			// inverser la trajectoire si la balle rebondit
			this.vel.y *= -1;
		}

		// Ici j'ai copié un Algo appelé AABBCollision ou Intersection
		// https://www.youtube.com/watch?v=ghqD3e37R7E 
		var collision = function(ax,ay,aw,ah,bx,by,bw,bh){
			return ax < bx + bw && ay < by+bh && bx <ax+aw && by < ay+ah;
		};

		//on définit les planches du pong et leurs appartenances (gauche ai2 ou droite ai)
		var paddle = this.vel.x < 0 ? ai2 : ai;

		//Utilisation de notre Algo Axis-Aligned Bounding Box entre la planche et la balle
		if(collision(paddle.x, paddle.y, paddle.width, paddle.height, this.x, this.y, this.side, this.side)){

			// Si la balle est au même niveau X que la planche, on ne vaut pas qu'elle la traverse
			// donc on fait en sorte que le X si du côté gauche soit au niveau de la planche+la largeur de la planche
			// si c'est la planche de droite alors la balle est à X de la planche - largeur de la balle; car le X de la balle
			// n'est pas en son milieu
			this.x = paddle == ai2 ? ai2.x+ai2.width : ai.x - this.side;

			// On veut ajouter plus de vitesse à notre balle si les côtés de la planche la touche
			var n = (this.y+this.side - paddle.y)/(paddle.height+this.side); // on a une valeut entre 0 et 1

			// Encore une fois je vais faire appelle que des gens ont trouvé pour le pong
			// "Pong Paddle Reflection", en gros on calcule l'angle de la ballepr definir
			// ou elle va partir et selon l'endroit ou elle frappe sur la planche a quelle vitesse (x/y)

			var phi = 0.25*pi*(2*n-1); //pi/4 - 45 degree with -1 to +1 depending on top/bot hitting
			var smash = Math.abs(phi) > 0.2*pi ? 1.5 : 1; //augmentation de vitesse
			this.vel.x = smash*(paddle == ai2 ? 1 : -1)*this.speed*Math.cos(phi); // 0 to 1
			this.vel.y = smash*this.speed*Math.sin(phi);
		}
		// pour savoir de quel côté a balle de va arriver lorsqu'un point est marqué
		if(0 > this.x + this.side || this.x > width){
			this.serve(paddle == ai2 ? 1 : -1);
		}
	},
	
	//Le "serice"
	serve: function(side) {
		var r = Math.random();
		this.x = side == 1 ? ai2.x : ai.x - this.side;
		//la balle partira d'une coordonnée aléatoire du côté opposé de la personne qui a marqué le point
		this.y = (height - this.side)*r; 

		//Si qqun marque un pont alors afficher le texte du but et augmenter score
		if(side == -1) score1++; {
			if(score1 != lastScore1){
				message = "Magnifique Goal du Joueur 1!"
				lastScore1 ++;
			}
		}
		if(side == 1) score2++;
		if(score2 != lastScore2){
			message = "Magnifique Goal du Joueur 2!"
			lastScore2 ++;
		}

		// angle de la balle aléatoire et vitesse aussi
		var pi = 0.1*pi*(1 - 2*r);
		this.vel = {
			x: side*this.speed*Math.cos(Math.random()*Math.random()),
			y: this.speed*Math.sin(Math.random()*Math.random())
		}
	},

	draw: function(){
		context.fillRect(this.x, this.y, this.side, this.side);	
	}
};

//Quaund un camp marque un point afficher le message pré-défini lorsqu'un camp marque un but
function goals() {
	context.fillText (message, 50, 300);
	
}

// Efface le message toutes les 3 (même s'il n'y a pas de message)
setInterval(function(){message ="";}, 3000);

function main() {
	canvas.width = width;
	canvas.height = height;

	keystate= {};
	//pour gérer les eventlistener du clavier
	document.addEventListener("keydown", function(evt) {
		keystate[evt.keyCode] = true;
	});
	
	document.addEventListener("keyup", function(evt) {
		delete keystate[evt.keyCode];
	});
	
	//pour gérer le clique de la souris qui change l'IA en humain
	document.getElementById("canvas").onclick = function(){playerActivated = !playerActivated };

	init();

	//met à jour l'animation
	var loop = function() {
		update();
		draw();

		window.requestAnimationFrame(loop, canvas);
	};
	window.requestAnimationFrame(loop, canvas);
}

//place les 2 planches et la balle sur le canvas selon les coordonnées indiquées
function init() {
	ai2.x = ai2.width;
	ai2.y = (height - ai2.height)/2;

	ai.x = width - (ai2.width + ai.width);
	ai.y = (height - ai.height)/2;

	ball.serve(1);

}

// mise a jour des info des 2 planches + bales
function update() {
	ball.update();
	ai2.update();
	ai.update();


}

function draw() {

	//Fond vert pour faire thème Football
	context.fillStyle = "#0b520e";

	context.fillRect(0,0,width,height);


	//Affiche si le jouer 1 est un IA ou humain
	context.fillStyle = "#FF0000";
	context.save();
	context.font = "20px serif";
	context.fillText ("Joueur 1: " + player, 25, 50);

	//les lignes et planches et balle
	context.fillStyle = "#fff";


	// le cercle du centre

	var centerX = canvas.width / 2;
	var centerY = canvas.height / 2;
	var radius = 100;

	context.beginPath();
	context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
	context.lineWidth = 5;
	context.strokeStyle = '#fff';
	context.stroke();
	
	//Affiche balle et les 2 planches
	ball.draw();
	ai2.draw();
	ai.draw();

	// on trace la ligne qui délimite les 2 côtés
	context.beginPath();
	context.moveTo(width/2,0);
	context.lineTo(width/2,width);
	context.stroke();

	//Affiche les scores
	context.font = "50px serif"
	context.fillStyle = "#FF0000";
	context.fillText (score1, width/2 - 50, 50);
	context.fillText (score2, width/2 + 25, 50);
	 //Si y a un point marqué alors al fonction affichera qq chose sinon elle affichera ""
	 goals(); 

	 context.restore();
	}

	main();