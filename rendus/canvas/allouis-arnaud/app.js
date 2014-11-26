/*
	Bonjour, 

	Ayant de très mauvaise base en math j'en paye le prix dans ce genre d'exercice. 
	Je ne suis pas arrivé à faire tout ce que je voulais comme faire les collision entre chaque bulle.
	Je ne suis pas arriver à afficher une image malgrès tout mes test.

	Bonne lecture de code.

 */

var baloApp = {

	canvas: document.getElementById("canvas"),
	ctx: this.canvas.getContext("2d"),

	W: this.canvas.width,
	H: this.canvas.height,
	mouse:{
		x:0,
		y:0
	},
	bubbles: [],
	fishs: [
		{
			type:"red",
			coords: {
				x:300,
				y: 200
			}
		},
		{
			type:"red",
			coords: {
				x:100,
				y: 100
			}
		},
	],
	particles :[],
	number_particles :30,
	lastCalledTime:null,
	fps:null,

	init: function () {

		var that = this;

		that.canvasSize();

		window.onresize = function(event) {

			that.canvasSize();
		};

		that.canvas.onmousemove = function(e) {

			that.mousePos(e);
		};
		that.loop();

	},

	/*
		Change the canvas size
	 */
	canvasSize: function () {

		this.canvas.width = window.innerWidth;
		this.canvas.height = window.innerHeight;
	},

	/*
		Loop with the requestAnimationFrame()
	 */
	loop: function () {

		var that = baloApp;

		that.clean();

		// that.mousePos();

		that.static();

		that.drawFish();

		that.ctx.fillStyle = "#fff";
		that.bubble();

		that.calculateFps();

		requestAnimationFrame(that.loop);
	},

	/*
		Clean the window
	 */
	clean: function () {

    	this.ctx.clearRect(0,0, canvas.width,canvas.height);
	},

	calculateFps: function () {
		if(!this.lastCalledTime) {
			this.lastCalledTime = Date.now();
			this.fps = 0;
			return;
		}
		delta = (new Date().getTime() - this.lastCalledTime)/1000;
		this.lastCalledTime = Date.now();
		this.fps = 1/delta;
	},

	/*
		Put the static content
	 */
	static: function () {
		var that = this;

		this.ctx.font="22px Verdana";
		this.ctx.fillText('"Aquarium ... (sans poissons)"',window.innerWidth - 570,120);
		// Fill with gradient
		this.ctx.fillStyle="#ffffff";

		this.yolo();
		this.decor();

		this.ctx.beginPath();
		this.ctx.strokeStyle = "#2f59ff";
		this.ctx.fillStyle = "#2a2a2a";
		var star_x = 200; 
		var star_y = window.innerHeight - 200;
		this.ctx.arc(star_x,star_y,30,0,Math.PI*2);
		this.ctx.stroke();
		this.ctx.fill();

	},

	decor: function () {

		var that = this;

		this.ctx.fillStyle = '#964b28';
		this.ctx.strokeStyle = '#5e2e19';

		this.ctx.beginPath();
		this.ctx.rect(window.innerWidth - 370, window.innerHeight - 90, 100 ,90);
		this.ctx.fill();
		this.ctx.stroke();
		this.ctx.closePath();

		this.ctx.beginPath();
		this.ctx.rect(window.innerWidth - 370, window.innerHeight - 150, 70 ,60);
		this.ctx.fill();
		this.ctx.stroke();
		this.ctx.closePath();

		this.ctx.beginPath();
		this.ctx.rect(window.innerWidth - 370, window.innerHeight - 180, 70 ,30);
		this.ctx.fill();
		this.ctx.stroke();
		this.ctx.closePath();

		this.ctx.beginPath();
		this.ctx.rect(window.innerWidth - 300, window.innerHeight - 270, 30 ,180);
		this.ctx.fill();
		this.ctx.stroke();
		this.ctx.closePath();

		this.ctx.beginPath();
		this.ctx.rect(window.innerWidth - 350, window.innerHeight - 270, 50 ,90);
		this.ctx.fill();
		this.ctx.stroke();
		this.ctx.closePath();

		this.ctx.beginPath();
		this.ctx.rect(window.innerWidth - 570, window.innerHeight - 90, 100 ,90);
		this.ctx.fill();
		this.ctx.stroke();
		this.ctx.closePath();

		this.ctx.beginPath();
		this.ctx.rect(window.innerWidth - 590, window.innerHeight - 90, 20 ,90);
		this.ctx.fill();
		this.ctx.stroke();
		this.ctx.closePath();

		this.ctx.beginPath();
		this.ctx.rect(window.innerWidth - 590, window.innerHeight - 180, 120 ,90);
		this.ctx.fill();
		this.ctx.stroke();
		this.ctx.closePath();

		this.ctx.beginPath();
		this.ctx.rect(window.innerWidth - 590, window.innerHeight - 270, 240 ,90);
		this.ctx.fill();
		this.ctx.stroke();
		this.ctx.closePath();

		this.ctx.save();

		// Toit
		// this.ctx.rotate(1);
		this.ctx.beginPath();
		this.ctx.moveTo(window.innerWidth - 590, window.innerHeight - 270);
		this.ctx.lineTo(window.innerWidth - 270,window.innerHeight - 270);
		this.ctx.lineTo(window.innerWidth - 420,window.innerHeight - 450);
		this.ctx.fill();
		this.ctx.stroke();
		this.ctx.closePath();
		this.ctx.restore();

	},
 
 	/*
 		Write the text to the footer
 	 */
	yolo: function () {

		this.ctx.font="11px Verdana";
		this.ctx.fillText("#yolo #bigfun - baloran.fr",window.innerWidth - 170,window.innerHeight - 15);
		// Fill with gradient
		this.ctx.fillStyle="#ffffff";
			
		this.ctx.font="11px Verdana";
		this.ctx.fillText("X: "+this.mouse.x + " Y: "+this.mouse.y + ' fps: '+ Math.floor(this.fps),window.innerWidth - 150,20);
		// Fill with gradient
		this.ctx.fillStyle="#ffffff";
	},

	/*
		Draw the bubbles
	 */
	drawBubble: function (x, y, mouse) {
		
		if (mouse) {
			var star_x = 600; 
			var star_y = window.innerHeight - 200;
		} else {
			var star_x = 200; 
			var star_y = window.innerHeight - 200;
		}

		var size = Math.floor((Math.random() * 8) + 2);

		this.bubbles.push({

			x:star_x,
			y:star_y,
			size:size
		});

		this.ctx.beginPath();
		this.ctx.arc(star_x,star_y,size,0,Math.PI*2);
		this.ctx.fill();
	},

	/*
		Update the position of the bubble, with some kind of colision
	 */
	udpateBubble: function (x,y,size,index) {

		var collision = false;

		if (collision) {


		} else {

			if (y-1 > (0 + size)) {
				y--;
			};

			var dep = Math.floor((Math.random() * 3) + (-1));
			
			if (x-1 > (0 + size)) {
				x = x - dep;
			};
		}

		this.ctx.beginPath();
		this.ctx.arc(x,y,size,0,Math.PI*2);
		this.bubbles[index] = {
			x:x,
			y:y,
			size:size
		};
		this.ctx.fill();

	// 	for(var i=0; i<this.particles.length; i++){
	// 	p = this.particles[i];
	// 	this.ctx.beginPath();
	// 	this.ctx.fillStyle = p.color;

	// 	this.ctx.arc(p.x,p.y,p.radius,Math.PI * 2,false);
	// 	this.ctx.fill();

	// 	p.x += p.vx;
	// 	p.y += p.vy;
	// 	p.radius = p.radius - 3 ;

	// 	if(p.radius < 0){
	// 		this.particles[i] = new Particle();
	// 	}
	// }

	},

	/*
		Draw the fish
	 */
	drawFish : function () {

		var that = this;

		var img = new Image();  

		img.onload = function() {

			that.ctx.drawImage(img, 0, 0);
		}

		img.src = 'img/fish.png';
	},

	mousePos: function (e) {

		var surface = this.canvas.getBoundingClientRect();
		this.mouse.x = e.clientX - surface.left;
		this.mouse.y = e.clientY - surface.top;
	},

	particle: function () {

		var that = this;
		var itself = baloApp.particle();

		itself.x = mouse.x;
		itself.y = mouse.y;
		itself.r = Math.round(Math.random() * 255);
		itself.g = Math.round(Math.random() * 255);
		itself.b = Math.round(Math.random() * 255);
		itself.opacity = this.opacity || 0.5;
		itself.color = "rgba("+this.r+","+this.g+","+this.b+","+this.opacity+")";

		itself.vx = (5 + Math.random() * 30);
		itself.vy = (-10 + Math.random() * -30);
		itself.radius = Math.random() * 70;
		
	},

	/*
		Call the draw bubble and create bubble
	 */
	bubble: function () {

		var that = this;

		var bubbles = that.bubbles;

		if (bubbles.length > 0) {

			for (var i = 0; i < bubbles.length; i++) {

				that.udpateBubble(bubbles[i].x, bubbles[i].y, bubbles[i].size, i);

			};

			if (bubbles[bubbles.length - 1].y < (window.innerHeight - 300)) {

				that.drawBubble();
			};

		} else {

			that.drawBubble();
		}
	}

}

baloApp.init();

