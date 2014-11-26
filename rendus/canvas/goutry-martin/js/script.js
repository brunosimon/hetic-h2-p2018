// Polyfill permettant d'avoir des animations fluides

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



// Texte iPhone 6

var text = 'iPhone 6';

context.font = '40px Arial';
context.textAlign = 'center';
context.textBaseline = 'top';

context.fillText (text, 250, 30);


// Fonction permettant de générer des rectangles aux bords arrondis

var roundedRect=function(context,x,y,width,height,radius,fill,stroke)
{
    context.beginPath();

    // Dessine la ligne du haut et le coin en haut à droite
    context.moveTo(x+radius,y);
    context.arcTo(x+width,y,x+width,y+radius,radius);

    // Dessine la ligne de droite et le coin en bas à droite
    context.arcTo(x+width,y+height,x+width-radius,y+height,radius); 

    // Dessine la ligne du bas et le coin en bas à gauche
    context.arcTo(x,y+height,x,y+height-radius,radius);

    // Dessine la ligne de gauche et le coin en haut à gauche
    context.arcTo(x,y,x+radius,y,radius);

    if(fill){
	context.fill();
    }
    if(stroke){
	context.stroke();
    }
}

// On génère la forme de l'iPhone 6 grâce à la fonction créée précedemment

context.fillStyle='black';
roundedRect(context,100,100,300,600,50,true,false);

// Écran de veille iPhone

var image = new Image();

image.onload = function (){
	context.drawImage(image,120,150,260,475);
};

image.src = "img/bg.jpg";

// Bouton Home iPhone

context.beginPath();
context.arc(255, 662, 20, 0, 2*Math.PI);
context.strokeStyle='grey';
context.stroke();


// Bonhomme pro Apple

context.beginPath();
context.moveTo(520,530); 
context.lineTo(520,610); // Tronc
context.moveTo(520,610);
context.lineTo(560,670); // Jambe gauche
context.moveTo(520,610);
context.lineTo(480,670); // Jambe droite
context.moveTo(470,560);
context.lineTo(570,560); // Bras
context.strokeStyle='black';
context.stroke();

// Sa tête

context.beginPath();
context.arc(520, 506, 25, 0, 2*Math.PI);
context.strokeStyle='black';
context.stroke();

// Bulle paroles pro Apple

context.beginPath();
context.moveTo(550,490);
context.lineTo(580,446);
context.stroke();
roundedRect(context,570,350,200,100,20,false,true);

// Paroles pro Apple

var text1 = 'Man, this phone';

context.font = '25px Arial';
context.textAlign = 'center';
context.textBaseline = 'top';

context.fillText (text1, 670, 370);

var text2 = 'is great !!'

context.font = '25px Arial';
context.textAlign = 'center';
context.textBaseline = 'top';

context.fillText (text2, 670, 410);


// Bonhomme anti Apple

context.beginPath();
context.arc(1000, 506, 135, 0, 2*Math.PI);
context.fillStyle='red';
context.fill();

var angle = 0; // on déclare une variable angle afin d'avoir un rayon de cercle aléatoire

function drawCircle()
{
    requestAnimationFrame(drawCircle);
    
    // Redessiner le canvas

    angle += 0.05; // on met à jour l'angle donc le rayon du cercle
  	var radius = 25 + 130 * Math.abs(Math.cos(angle)); // Cette ligne nous permet de déterminer un rayon aléatoirement compris entre 25 et 155. La formule Math.cos nous permet d’obtenir un nombre entre -1 et 1, et comme un nombre négatif ne marche pas pour le rayon du cercle, on va prendre la valeur absolue grâce à la formule Math.abs
    context.clearRect(800,0,500,750); // On nettoie seulement la partie du canvas que l'on veut animer
    context.beginPath();
    context.arc(1000, 506, radius, 0, 2*Math.PI);
    context.fillStyle = 'red';
    context.fill();

 
}
drawCircle();

// Flèche en courbe de bézier - j'ai quelques problèmes pour bien diriger la courbe

// context.beginPath();
// context.moveTo(800,300); 
// context.bezierCurveTo(
//     700, // X du premier point de tension
//     600, // Y du premier point de tension
//     600, // X du second point de tension
//     300, // Y du second point de tension
//     500, // X du point d'arrivée
//     500  // Y du point d'arrivée
// );
// context.stroke();

