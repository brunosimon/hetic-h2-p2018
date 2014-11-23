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

// context.beginPath();

// context.moveTo(50,50);
// context.lineTo(200,200);
// context.lineTo(50,200);

// context.lineWidth   = 20;
// context.lineCap     = 'round';
// context.lineJoin    = 'round';
// context.strokeStyle = 'orange';

// context.fillStyle     = 'red';
// context.shadowColor   = 'rgba(0,0,0,0.6)';
// context.shadowBlur    = 20;
// context.shadowOffsetX = 10;
// context.shadowOffsetY = 10;

// context.stroke();
// context.fill();


// context.fillStyle = 'orange';
// context.strokeStyle = 'orange';

// context.beginPath();
// context.rect(50,50,200,100);
// context.fill();

// context.beginPath();
// context.rect(300,50,200,100);
// context.stroke();

// context.beginPath();
// context.arc(150,300,100,0,Math.PI,true);
// context.fill();

// context.beginPath();
// context.arc(400,300,100,0,Math.PI,true);
// context.stroke();


// context.fillStyle = 'orange';
// context.fillRect(50,50,300,200);
// context.clearRect(50,50,100,100);

// context.fillStyle = 'skyblue';
// context.fillRect(160,60,20,80);


// var text = 'Coucou la P2018';

// context.font         = '40px Arial';
// context.textAlign    = 'center';
// context.textBaseline = 'top';

// console.log(context.measureText(text));

// context.fillText(text,400,300);

// var image = new Image();

// image.onload = function()
// {
// 	context.drawImage(image,0,0,image.width/6,image.height/6);
// };

// image.src = 'src/img/image-1.jpg';



// // var gradient = context.createLinearGradient(0,0,500,500);
// var gradient = context.createRadialGradient(
// 	200, // X du premier cercle
// 	200, // Y du premier cercle
// 	100, // Rayon du premier cercle
// 	399, // X du second cercle
// 	200, // Y du second cercle
// 	300  // Rayon du second cercle
// );

// gradient.addColorStop(0,'red');
// gradient.addColorStop(0.5,'yellow');
// gradient.addColorStop(1,'orange');

// context.fillStyle = gradient;

// context.fillRect(0,0,500,500);


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


// context.globalAlpha = 0.3;
// context.globalCompositeOperation = 'lighter';

// context.fillStyle = '#ff0000';
// context.fillRect(50,50,200,200);

// context.fillStyle = '#00ff00';
// context.fillRect(60,60,200,200);

// context.fillStyle = '#0000ff';
// context.fillRect(70,70,200,200);


var coords = {
	x : 400,
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

	context.clearRect(0,0,800,600);

	coords.x += speed.x;
	coords.y += speed.y;

	if(coords.x > 800 - 50 || coords.x < 0 + 50)
		speed.x *= -1;

	if(coords.y > 600 - 50 || coords.y < 0 + 50)
		speed.y *= -1;
	
	context.beginPath();
	context.arc(coords.x,coords.y,50,0,Math.PI*2);
	context.fill();
}

loop();













