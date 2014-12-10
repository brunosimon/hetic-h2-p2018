var canvas= document.getElementById('canvas'),
	context= canvas.getContext('2d');

/* Compatible avec tous les navigateurs */
(function() {
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


function Boule (x, y, couleur){

	// Propriétés
	this.x = x;
	this.y = y;
	this.couleur = couleur;
	this.delay = parseInt(Math.random()*500);
	this.currentY = 0;

	//Initialisation
	context.fillStyle= this.couleur;
	context.beginPath();
	context.arc(this.x,this.y,15,0,Math.PI*2);
	context.fill();

	// Animation
	this.animation = function()
	{
		context.fillStyle= this.couleur;
		context.beginPath();
		context.arc(this.x,this.currentY,15,0,Math.PI*2);
		context.fill();
		if(this.currentY < this.y){
			this.currentY += 4;
		}
	}

}

var coords = [
	{
		"lettre": "g",
		"couleur": "blue",
		"boules": [

			[680, 260],
			[650, 255],
			[620, 258],
			[590, 265],
			[563, 275],
			[538, 290],
			[520, 313],
			[515, 343],
			[515, 373],
			[525, 400],
			[540, 425],
			[563, 445],
			[592, 455],
			[623, 460],
			[653, 458],
			[683, 450],
			[710, 435],
			[710, 405],
			[710, 375],
			[680, 375],
			[650,375]


		]
	},
	{
		"lettre":"o",
		"couleur": "red",
		"boules":[
			[780,370],
			[778, 400],
			[785, 430],
			[810, 450],
			[840, 455],
			[870, 450],
			[895, 435],
			[910, 405],
			[905, 375],
			[885, 350],
			[855, 335],
			[825, 335],
			[795, 345],
		]
	},	
	{
		"lettre":"o2",
		"couleur": "yellow",
		"boules":[
			[960,370],
			[958, 400],
			[965, 430],
			[990, 450],
			[1020, 455],
			[1050, 450],
			[1075, 435],
			[1090, 405],
			[1085, 375],
			[1065, 350],
			[1035,335],
			[1005,335],
			[975, 345],
		]
	},

		{
		"lettre":"g2",
		"couleur": "blue",
		"boules":[
			[1150,350],
			[1140,380],
			[1155,410],
			[1185,420],
			[1220,415],
			[1245,390],
			[1240,357],
			[1215,335],
			[1180,335],
			[1210,450],
			[1235,470],
			[1255,495],
			[1248,528],
			[1218,545],
			[1185,550],
			[1153,545],
			[1125,525],
			[1128,495],
			[1153,475],
			[1180,460],
		]
	},

			{
		"lettre":"l",
		"couleur": "green",
		"boules":[
			[1310,270],
			[1310,300],
			[1310,330],
			[1310,360],
			[1310,390],
			[1310,420],
			[1310,450],
		]
	},

			{
		"lettre":"e",
		"couleur": "red",
		"boules":[
			[1360,410],
			[1390,395],
			[1423,385],
			[1453,375],
			[1480,365],
			[1470,330],
			[1440,320],
			[1410,320],
			[1383,330],
			[1360,350],
			[1350,380],
			[1375,440],
			[1400,460],
			[1435,460],
			[1470,450],
			[1500,430],
		]
	},
];

var boules = [];


for(var i=0; i<coords.length; i++) {
	var lettre = coords[i];
	for(var j=0; j<lettre.boules.length; j++){
		var boule = lettre.boules[j];
		boules[boules.length] = new Boule(boule[0], boule[1], lettre.couleur);
	}
}

// Boules aleatoires
for(var i=0; i<400; i++){
	boules[boules.length] = new Boule(parseInt(Math.random()*canvas.width-10), canvas.height+30,"white");
}

var time = 0;
function animation (){
	context.clearRect(0, 0, canvas.width, canvas.height);
	for(var i=0; i<boules.length; i++){
		if(boules[i].delay < time){
			boules[i].animation();
		}
	}
	time++;
	window.requestAnimationFrame(animation);
}


window.requestAnimationFrame(animation);


