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

var canvas  = document.getElementById('canvas'),
	context = canvas.getContext('2d');

// // On commence à dessiner
// context.beginPath();

// // On créé un tracé
// context.moveTo(50,50);
// context.lineTo(200,200);
// context.lineTo(50,200);
// // context.closePath();

// // Style
// context.lineWidth     = 20;
// context.lineCap       = 'round';
// context.lineJoin      = 'round';
// context.strokeStyle   = 'hsla(200,100%,50%,1)';
// context.fillStyle     = 'red';
// context.shadowColor   = 'rgba(0,0,0,0.6)';
// context.shadowBlur    = 50;
// context.shadowOffsetX = 10;
// context.shadowOffsetY = 10;

// // // On fait apparaitre ce tracé
// // context.stroke();

// // On fait apparaitre le remplissage tracé
// context.fill();


// context.strokeStyle = 'orange';
// context.fillStyle   = 'orange';

// context.beginPath();
// context.rect(50,50,200,100);
// context.fill();

// context.beginPath();
// context.arc(400,50,100,0,Math.PI);
// context.fill();


// context.beginPath();
// context.rect(50,200,200,100);
// context.stroke();

// context.beginPath();
// context.arc(400,200,100,0,Math.PI);
// context.closePath();
// context.stroke();


// context.fillStyle = 'orange';

// context.fillRect(50,50,300,160);
// context.clearRect(50,50,100,80);

// context.fillStyle = '#00EEFF';
// context.fillRect(160,60,20,70);

// context.beginPath();
// context.fillStyle = 'black';
// context.arc(280,210,50,0,Math.PI,false);
// context.arc(120,210,50,0,Math.PI,false);
// context.fill();



// var text = 'Coucou la P2018';

// context.font         = '40px Arial';
// context.textAlign    = 'center';
// context.textBaseline = 'top';

// console.log(context.measureText(text).width);

// context.strokeText(text,400,200);


// var image = new Image();

// image.onload = function()
// {
// 	context.drawImage(image,0,0,image.width / 6,image.height / 6);
// };

// image.src = 'src/img/image-1.jpg';


// // var gradient = context.createLinearGradient(0,0,600,0);
// var gradient = context.createRadialGradient(
// 	300, // X du premier cercle
// 	300, // Y du premier cercle
// 	100, // Rayon du premier cercle
// 	480, // X du second cercle
// 	300, // Y du second cercle
// 	300  // Rayon du second cercle
// );

// gradient.addColorStop(0,'red');
// gradient.addColorStop(0.5,'yellow');
// gradient.addColorStop(1,'orange');

// context.fillStyle = gradient;

// context.fillRect(0,0,600,600);


// context.beginPath();
// context.moveTo(50,50);
// context.lineTo(300,50);
// context.save();              // Sauvegarde les propriétés du context
// context.lineWidth = 20;      // Changement d'une des propriétés
// context.stroke();            // Dessin du trait

// context.beginPath();
// context.moveTo(50,100);
// context.lineTo(300,100);
// context.save();              // Nouvelle sauvegarde des propriétés du context
// context.strokeStyle = 'red'; // Changement d'une autre propriété
// context.stroke();            // Dessin du trait

// context.beginPath();
// context.moveTo(50,150);
// context.lineTo(300,150);
// context.restore();           // Restauration des propriétés à la derniène sauvegarde
// context.restore();           // Restauration des propriétés à la sauvegarde encore avant
// context.stroke();            // Dessin du trait



// context.beginPath();
// context.moveTo(50,50); // X et Y du point de départ
// context.bezierCurveTo(
// 	300, // X du premier point de tension
// 	100, // Y du premier point de tension
// 	100, // X du second point de tension
// 	300, // Y du second point de tension
// 	300, // X du point d'arrivée
// 	300  // Y du point d'arrivée
// );
// context.stroke();


// context.globalCompositeOperation = 'lighter';

// context.fillStyle = '#ff0000';
// context.fillRect(50,50,200,200);

// context.fillStyle = '#00ff00';
// context.fillRect(70,70,200,200);

// context.fillStyle = '#0000ff';
// context.fillRect(90,90,200,200);



var coords = {
	x : 100,
	y : 300
};

var speed = {
	x : 30,
	y : 20
};

context.fillStyle = 'orange';

function loop()
{
	window.requestAnimationFrame(loop);

	// Met à jour les coordonnées
	coords.x += speed.x;
	coords.y += speed.y;

	if(coords.x > 800 - 50 || coords.x < 50)
		speed.x *= -1;

	if(coords.y > 600 - 50 || coords.y < 50)
		speed.y *= -1;

	// Nettoyer le dessin
	context.clearRect(0,0,800,600);

	// Draw circle
	context.beginPath();
	context.arc(
		coords.x,
		coords.y,
		50,
		0,
		Math.PI * 2
	);
	context.fill();
}

loop();









