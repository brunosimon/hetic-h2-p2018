'use strict';

// -------------------------------------------------------------- UTILS
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

// -------------------------------------------------------------- OOP
var Particle = function(xx,yy,size,xSpeed,ySpeed) {
        this.size = size;

        this.x = xx;
        this.y = yy;
        
        this.color = 'rgba('+Math.floor(Math.random()*256)+','+Math.floor(Math.random()*256)+','+Math.floor(Math.random()*256)+',1)'; // couleur au hasard (ne sera affichée que quand params.image == false)
    
        this.xSpeed = xSpeed;
        this.ySpeed = ySpeed;
}

// -------------------------------------------------------------- CONSTANTS
var CANVAS_WIDTH = 800;
var CANVAS_HEIGHT = 600;
var RADIUS = 250; // rayon du cercle autour de la souris au :hover du canvas

// -------------------------------------------------------------- IMAGES

var canvas  = document.getElementById('canvas'),
    context = canvas.getContext('2d');

var img = new Image();
var imageData;
img.onload = function(){
    context.drawImage(img, 0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);
    imageData = context.getImageData(0, 0, CANVAS_WIDTH, CANVAS_HEIGHT).data; // on stocke les couleurs des pixels dans un tableau
}
img.src = 'image.png'; // l'image doit avoir pour dimensions CANVAS_WIDTH x CANVAS_HEIGHT

var img2 = new Image();
var image2Data;
img2.onload = function(){
    context.drawImage(img2, 0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);
    image2Data = context.getImageData(0, 0, CANVAS_WIDTH, CANVAS_HEIGHT).data;
}
img2.src = 'image2.png';

// -------------------------------------------------------------- DAT GUI
var params = {
    xSpeed: 2,
    ySpeed: 2,
    particlesAmount: 4600,
    randomizeSpeed: true, // si true alors chaque particule aura une vitesse x aléatoire entre 0 et xSpeed, de même pour y
    size: 35,
    image: true,
    epilepsy: false,
    decrease: true // au premier lancement, les particules vont décroître en taille
};

var gui = new dat.GUI();

// ces paramètres nécessitent une regénération des particules ; on leur dit de regénérer les particules après le prochain dessin
gui.add(params, "size", 1, 150).onFinishChange(function(){ params.decrease = false; functionToExecuteBeforeNextFrame = generateParticles; });
gui.add(params, "xSpeed", 0, 50).onFinishChange(function(){ params.decrease = false; functionToExecuteBeforeNextFrame = generateParticles; });
gui.add(params, "ySpeed", 0, 50).onFinishChange(function(){ params.decrease = false; functionToExecuteBeforeNextFrame = generateParticles; });
gui.add(params, "randomizeSpeed").onFinishChange(function(){ params.decrease = false; functionToExecuteBeforeNextFrame = generateParticles; });
gui.add(params, "particlesAmount", 1, 15000).onFinishChange(function(){ params.decrease = false; functionToExecuteBeforeNextFrame = generateParticles; });

// ces paramètres ne nécessitent pas une regénération des particules
gui.add(params, "image");
gui.add(params, "epilepsy");

// -------------------------------------------------------------- GENERATE PARTICLES

var particles; // tableau des objets particules
function generateParticles()
{
    particles = [];
    for (var i = 0; i<params.particlesAmount; i++)
    {
            particles.push(new Particle(Math.floor(Math.random()*(CANVAS_WIDTH+Math.abs(params.xSpeed)+params.size))-Math.abs(params.xSpeed)-params.size, Math.floor(Math.random()*(CANVAS_HEIGHT+Math.abs(params.ySpeed)+params.size))-Math.abs(params.ySpeed)-params.size,params.decrease ? params.size + 100 : params.size,params.randomizeSpeed ? Math.random()*params.xSpeed : params.xSpeed,params.randomizeSpeed ? Math.random()*params.ySpeed : params.ySpeed)); // on génère en dépassant sur les côtés pour éviter des vides de la valeur de speedX ou speedY le temps que les particules respawn
    }
}
generateParticles();

// -------------------------------------------------------------- DRAW

var functionToExecuteBeforeNextFrame = false; // si à false on n'éxecute rien juste après le dessin ; si c'est une fonction on l'éxecute une fois et on remet la variable à false
function main()
{

    context.clearRect(0, 0, CANVAS_WIDTH, CANVAS_HEIGHT); // on efface tout

    if (params.epilepsy) // on met une couleur au hasard pour le fond à chaque dessin si en mode epilepsy
        context.fillStyle = 'rgba('+Math.floor(Math.random()*256)+','+Math.floor(Math.random()*256)+','+Math.floor(Math.random()*256)+',1)';
    else
        context.fillStyle = 'black';
    context.fillRect(0,0, CANVAS_WIDTH, CANVAS_HEIGHT); // remplit le fond


    for (var i = 0; i<particles.length; i++)
    {
        if (params.epilepsy) // alors couleur aléatoire à chaque dessin
            context.fillStyle = 'rgba('+Math.floor(Math.random()*256)+','+Math.floor(Math.random()*256)+','+Math.floor(Math.random()*256)+',1)';
        else if (typeof imageData == 'undefined' || !params.image) // si l'image n'est pas chargée, on affiche la couleur de la particule à la place
            context.fillStyle = particles[i].color;
        else // sinon on affiche la couleur de l'image à l'emplacement de la particule
        {
            if (relX!==false && relY!==false && Math.sqrt((relX-particles[i].x)*(relX-particles[i].x) + (relY-particles[i].y)*(relY-particles[i].y)) < RADIUS) // si la souris est dans le canvas et que la particule est dans un rayon RADIUS de la souris...
            {
                    context.fillStyle = 'rgb('+(image2Data[(CANVAS_WIDTH*Math.max(0,Math.round(particles[i].y)) + Math.max(0,Math.round(particles[i].x))) * 4 + 0])+ ',' + (image2Data[(CANVAS_WIDTH*Math.max(0,Math.round(particles[i].y)) + Math.max(0,Math.round(particles[i].x))) * 4 + 1])+ ',' +(image2Data[(CANVAS_WIDTH*Math.max(0,Math.round(particles[i].y)) + Math.max(0,Math.round(particles[i].x))) * 4 + 2])+')'; // alors on affiche la couleur de la seconde image
            }
            else
            {
                context.fillStyle = 'rgb('+(imageData[(CANVAS_WIDTH*Math.max(0,Math.round(particles[i].y)) + Math.max(0,Math.round(particles[i].x))) * 4 + 0])+ ',' +(imageData[(CANVAS_WIDTH*Math.max(0,Math.round(particles[i].y)) + Math.max(0,Math.round(particles[i].x))) * 4 + 1])+ ',' +(imageData[(CANVAS_WIDTH*Math.max(0,Math.round(particles[i].y)) + Math.max(0,Math.round(particles[i].x))) * 4 + 2])+')'; // on affiche la couleur de la première image
            }
        }

        context.fillRect(particles[i].x,particles[i].y,particles[i].size,particles[i].size); // on dessine la particule

        particles[i].x+=particles[i].xSpeed;
        particles[i].y+=particles[i].ySpeed;

        // gestion des bords
        // éviter l'effet arrivée par lignes ou colonnes lorsque plusieurs particules dépassent de l'écran en même temps (souvent le cas pour speedX ou speedY élevé) et respawn au même endroit, et faire en sorte que ça marche pour les gros carrés comme pour les grosses vitesses
        if (particles[i].x>CANVAS_WIDTH && particles[i].xSpeed>0)
            particles[i].x=-particles[i].size-Math.random()*(particles[i].size+particles[i].xSpeed);
        if (particles[i].y>CANVAS_HEIGHT && particles[i].ySpeed>0)
            particles[i].y=-particles[i].size-Math.random()*(particles[i].size+particles[i].ySpeed);

        if (particles[i].x<-particles[i].size && particles[i].xSpeed<0)
            particles[i].x=CANVAS_WIDTH+Math.random()*(particles[i].size-particles[i].xSpeed);
        if (particles[i].y<-particles[i].size && particles[i].ySpeed<0)
            particles[i].y=CANVAS_HEIGHT+Math.random()*(particles[i].size-particles[i].ySpeed);

        if (params.decrease)
            particles[i].size = Math.max(params.size,particles[i].size-0.25);
    }

    if (functionToExecuteBeforeNextFrame !== false)
    {
        functionToExecuteBeforeNextFrame();
        functionToExecuteBeforeNextFrame = false;
    }

    requestAnimationFrame(main);
}

// -------------------------------------------------------------- MOUSE EVENTS

var relX = false, relY = false; // position de la souris relative au canvas ; si false la souris est hors du canvas
canvas.onmousemove = function(e){
        relX = e.pageX - this.offsetLeft;
        relY = e.pageY - this.offsetTop;
};
canvas.onmouseout = function(e){
        relX = false;
        relY = false;
};

window.requestAnimationFrame(main);