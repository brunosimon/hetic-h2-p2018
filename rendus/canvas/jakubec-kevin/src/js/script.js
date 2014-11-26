console.log("HEHEHE");

/******************************* COMPATIBLE AVEC TOUS LES NAVIGATEURS *************************/


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


/******************************* CREATION CANVAS *************************/


window.onload  = function(){
  var W        = window.innerWidth, // récupère la largeur de la fenêtre
      H        = window.innerHeight, // récupère la hauteur de la fenètre
      canvas   = document.getElementById("canvas"),
      context  = canvas.getContext("2d"),
      canvas2  = document.getElementById('canvas2'),
      context2 = canvas2.getContext('2d');
      text     = "Click on the page";
      welcome  = "Welcome to the Bubble World"

  canvas.width  = canvas2.width  = W; // donne au canvas la largeur de la fenêtre
  canvas.height = canvas2.height = H; // donne au canvas la hauteur de la fenêtre

  context.font = "60px Arial";
  context.fillStyle = "#FFFFFF";
  context.fillText(welcome, 500,300);
  context2.font = "60px Arial";
  context2.fillStyle = "#FFFFFF";
  context2.fillText(text, 500,300);


/******************************* CANVAS 1 *************************/


  var particles       = [], // tableau comportant les particules
      particle_count  = 75, // nombre de particules à créer
      mouse           = []; // tableau qui récupère les valeurs en x et y

  for(var i = 0; i < particle_count; i++){ // ajoute dans le tableau des particules avec la fonction particule
    particles.push(new particle());
  }
  canvas.addEventListener('mousemove', track_mouse, false); // écoute et enregistre la position de la souris en continu grâce à la fonction track_mouse

  function track_mouse(event){ // fonction pour suivre le pointeur de la souris
    mouse.x = event.pageX; // retourne la coordonnée en x de l'event sur la page
    mouse.y = event.pageY; // retourne la coordonnée en y de l'event sur la page
  }
  function particle(){ // crée toutes les caractéristiques de chaque particule aléatoirement
    this.speed = {x: Math.random()*5, y:  Math.random()*5}; // POUR MODIFIER DIRECTION
    //Now the flame follows the mouse coordinates
    if(mouse.x && mouse.y){ // si le ponteur est sur la fenêtre du navigateur
      this.location = {x: mouse.x, y: mouse.y}; // place au niveau du pointeur
    }
    else{
      this.location = {x: W/2, y: H/2}; // sinon je mets au milieu
    }
    this.radius = 10+Math.random()*20; // taille des particules entre 10 et 30
    this.life_max = 50+Math.random()*10; // durée de vie des particules
    this.life = this.life_max;
    this.r = Math.round(Math.random()*255); // couleur rgb aléatoire 
    this.g = Math.round(Math.random()*255);
    this.b = Math.round(Math.random()*255);
  }
  function draw(){ // fonction qui dessine le canvas
    context.globalCompositeOperation = "source-over"; // dessine le fond par dessus le canvas vide
    context.fillStyle = "#131313"; // remplit de couleur grise
    // mettre ici à la place du fillstyle le dessin à afficher
    context.fillRect(0, 0, W, H); // remplit tout l'écran
    context.beginPath();
    context.font = "50px Arial";
    context.fillStyle = "#FFFFFF";
    context.fillText(welcome, 420,70);
    context.globalCompositeOperation = "source-over"; // prend la couleur blanche du canvas vide et

    for(var i = 0; i < particles.length; i++){
      var part     = particles[i],
          gradient = context.createRadialGradient(part.location.x, part.location.y, 0, part.location.x, part.location.y, part.radius);

      gradient.addColorStop(1, "rgba("+part.r+", "+part.g+", "+part.b+",1)");
      gradient.addColorStop(0.7, "rgba("+part.r+", "+part.g+", "+part.b+", 0)");
      context.fillStyle = gradient;
      context.arc(part.location.x, part.location.y, part.radius, Math.PI*2, false);
      context.fill();
      context.beginPath();
      // on fait baisser la vie de chaque particule de 1, on baisse le rayon et on la déplace
      part.life--;
      part.radius--;
      part.location.x += -1+part.speed.x;
      part.location.y += part.speed.y;

      //regénère les particules
      if(part.life < 0 || part.radius < 0){
        particles[i] = new particle();
      }
    }
    window.requestAnimationFrame(draw);
  }
  window.requestAnimationFrame(draw);
}


/******************************* CANVAS 2 *************************/


function bubble_click(event) {  //clique
  var context2 = canvas2.getContext('2d'),
      XYrect   = canvas2.getBoundingClientRect(),    // action avec le canvas et pas le context
      Xcurseur = Math.round(event.clientX - XYrect.left),
      Ycurseur = Math.round(event.clientY - XYrect.top);

  context2.fillStyle = 'rgb('+Math.floor(Math.random()*255)+','+Math.floor(Math.random()*255)+','+Math.floor(Math.random()*255)+')' ; // = rgb ( R,V,B) (choix aléaloire)
  context2.beginPath();
  context2.arc(Xcurseur, Ycurseur, Math.random()*50,0, Math.PI*2);// =rayon aléaloire
  context2.fill();

  text          = "Click on the page";
  context2.font = "60px Arial";
  context2.fillText(text, 500,300);
}




// Faire le draw aec source-in et lighter pour obtenir un effet de nettoyage de l'écran
/*
context.globalCompositeOperation = "source-in"; // dessine le fond par dessus le canvas vide
    context.fillStyle = "#131313"; // remplit de couleur grise
    context.fillRect(0, 0, W, H); // remplit tout l'écran
    context.beginPath();
    context.globalCompositeOperation = "lighter"; // prend la couleur blanche du canvas vide et
*/