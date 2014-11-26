// /* Compatible avec tous les navigateurs */

// (function() {
//     var lastTime = 0;
//     var vendors = ['webkit', 'moz'];
//     for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
//         window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
//         window.cancelAnimationFrame =
//           window[vendors[x]+'CancelAnimationFrame'] || window[vendors[x]+'CancelRequestAnimationFrame'];
//     }

//     if (!window.requestAnimationFrame)
//         window.requestAnimationFrame = function(callback, element) {
//             var currTime = new Date().getTime();
//             var timeToCall = Math.max(0, 16 - (currTime - lastTime));
//             var id = window.setTimeout(function() { callback(currTime + timeToCall); },
//               timeToCall);
//             lastTime = currTime + timeToCall;
//             return id;
//         };

//     if (!window.cancelAnimationFrame)
//         window.cancelAnimationFrame = function(id) {
//             clearTimeout(id);
//         };
// }());


var canvas = document.getElementById('myCanvas'), //var correspondant à l'élément dans le DOM
    context = canvas.getContext('2d'); //var qui permets de dessiner


//definir fantôme
var centerX = canvas.width / 2,
    centerY = canvas.height / 2,
    radius = 0;

context.beginPath();
context.moveTo(180,218);
context.bezierCurveTo(180,218,184,188,198,176);
context.bezierCurveTo(202,173,206,171,211,171);
context.bezierCurveTo(235,170,239,215,240,218);
context.bezierCurveTo(241,221,254,234,265,207);
context.bezierCurveTo(270,212,261,256,249,265);
context.bezierCurveTo(252,277,266,298,266,298);
context.bezierCurveTo(266,298,255,315,234,312);
context.bezierCurveTo(223,319,216,330,191,313);
context.bezierCurveTo(181,313,169,316,157,300);
context.bezierCurveTo(160,291,171,277,172,267);
context.bezierCurveTo(172,258,151,256,154,207);
context.bezierCurveTo(161,215,168,232,180,218);

//style fantôme
context.fillStyle="white";
context.globalAlpha = 0; //opacité
context.shadowColor   = 'blue';   // Couleur de l'ombre
context.shadowBlur    = 80;       // Largeur du flou

//faire apparaitre tracé et remplissage
context.stroke();
context.fill();

//ANIMER le fantôme

var coords = {
    x : 200,
    y : 400
};

var speed = {
    x : 3,
    y : 3
};


function loop()
{
    window.requestAnimationFrame(loop);  //loop en continu
    console.log('loop');  

    //mettre à jour les coordonées
    coords.x += speed.x;  //recupere donnée speed x définie au dessus
    coords.y += speed.y;

    if(coords.x > 1000 - 260 || coords.x < -150)
    {
        speed.x *= -1;
    }
    if(coords.y > 800 - 320 || coords.y < -170)
    {
        speed.y *= -1;
    }

    //nettoyer dessin, demarche necessaire pour l'anim
    context.clearRect(0,0,1000,800);

    //on redefinit avec les coordonnées 
    // context.fillStyle="black";
    // context.fillRect(0,0,1000,800);
    context.moveTo(coords.x,coords.y);
    context.beginPath();
    context.bezierCurveTo(coords.x+180,coords.y+218,coords.x+184,coords.y+188,coords.x+198,coords.y+176);
    context.bezierCurveTo(coords.x+202,coords.y+173,coords.x+206,coords.y+171,coords.x+211,coords.y+171);
    context.bezierCurveTo(coords.x+235,coords.y+170,coords.x+239,coords.y+215,coords.x+240,coords.y+218);
    context.bezierCurveTo(coords.x+241,coords.y+221,coords.x+254,coords.y+234,coords.x+265,coords.y+207);
    context.bezierCurveTo(coords.x+270,coords.y+212,coords.x+261,coords.y+256,coords.x+249,coords.y+265);
    context.bezierCurveTo(coords.x+252,coords.y+277,coords.x+266,coords.y+298,coords.x+266,coords.y+298);
    context.bezierCurveTo(coords.x+266,coords.y+298,coords.x+255,coords.y+315,coords.x+234,coords.y+312);
    context.bezierCurveTo(coords.x+223,coords.y+319,coords.x+216,coords.y+330,coords.x+191,coords.y+313);
    context.bezierCurveTo(coords.x+181,coords.y+313,coords.x+169,coords.y+316,coords.x+157,coords.y+300);
    context.bezierCurveTo(coords.x+160,coords.y+291,coords.x+171,coords.y+277,coords.x+172,coords.y+267);
    context.bezierCurveTo(coords.x+172,coords.y+258,coords.x+151,coords.y+256,coords.x+154,coords.y+207);
    context.bezierCurveTo(coords.x+161,coords.y+215,coords.x+168,coords.y+232,coords.x+180,coords.y+218);
    // context.fillStyle="white";
    context.fill();


}

loop();




//récupérer les coordonnées de la souris

// avoir les coordonnées de la souris
function getMousePos(canvas, evt, context) {
        var rect = canvas.getBoundingClientRect(); //retourne l'objet spécifiant la délimitation de l'élément (position canvas)

        //si la souris se trouve sur le fantôme >> lancer la fonction collision 
        if(evt.clientX - rect.left > centerX - 50 && evt.clientX - rect.left < centerX + 50 && evt.clientY - rect.top > centerY - 50 && evt.clientY - rect.top < centerY + 50){
                collision();
        }

        //retourner position de la souris
        return {
                x: evt.clientX - rect.left, //avec l'axe x, position de la souris sur la fenêtre - distance canvas/bordure fenêtre

                y: evt.clientY - rect.top //avec l'axe y, position de la souris sur la fenêtre - distance canvas/haut de la fenêtre
        };
}

//affiche le fantôme mais transparent
function collision() {
        context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
        context.globalAlpha = 1; 
        context.fill();
        context.stroke();      
}

//on ecoute le canvas (Event Listener "mousemove" = si souris bouge sur canvas)
canvas.addEventListener('mousemove', function(evt) {

        var mousePos = getMousePos(canvas, evt); //lancer la fonction si la souris sur le canvas
        var message = 'Mouse position: ' + mousePos.x + ',' + mousePos.y; //définir le message >> position de la souris: éléments x  et y de l'objet mousePos défini au dessus
        writeMessage(canvas, message); //lancer fonction console log du message
}, false);

//affiche les coordonnées dans la console
function writeMessage(canvas, message) {
        console.log(message);
}


