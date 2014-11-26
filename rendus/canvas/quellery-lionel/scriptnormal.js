// code de paul irish 
window.requestAnimFrame = (function () {
    return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || function (callback) {
        window.setTimeout(callback, 1000 / 60);
    };
})();


// checklist ne pas oublier de calculer l'écart entre les aiguilles
// envoie du fichier avant minuit 

var canvas;
// varaible du canvas 
var context;
// variable du canvas 
var radiusClockmain = 280;
// variable qui defini le diamétre du cerle en fonction de l'espacement des chiffre 
var brunoSimonSlogan = 'ready for winter ?';
var simonWacht = 'Simon Watch';


// fonctions de base pour definir un canvas
canvas = document.getElementById('canvas');
context = canvas.getContext('2d');

// recupere les parametres de la fenetre qui ouvrira le canvas 

canvas.height = window.innerHeight;
canvas.width = window.innerWidth;










// fonction de nettoyage du canvas 
function cleardrawingClock() {
    context.clearRect(0, 0, context.canvas.width, context.canvas.height);
}



// la fonction principale de mon algorytme pour generé 
function drawingClock() {
    // cette fonction a pour but de nettoyer le canvas
    cleardrawingClock();


    // L'objet Date permet de travailler avec toutes les variables qui concernent les dates et la gestion du temps. Il s'agit d'un objet inclus de façon native dans Javascript(je crois)  

    // sauvegarde la date actuelement que le navigateur renvoie 
    var date = new Date();
    // Retourne le nombre d'heures sous forme d'entier, sans formatage ,.
    var heure = date.getHours();
    // Retourne le nombre minutes sous forme d'entier, sans formatage ,.
    var minutes = date.getMinutes();
    // Retourne le nombre secondes sous forme d'entier, sans formatage ,.
    var secondes = date.getSeconds();
    // cacule de l'heure suite au stockage de mes variable 
    // le point interrogation est opérateur qui renvoie une réponse si un condition n'est pas remplie
    heure = heure > 12 ? heure - 12 : heure;





    var heureNow = heure + minutes / 60;
    var minute = minutes + secondes / 60;
    // ---------------------------------background -----------------------------

    // definition du background 
    context.fillStyle = "black";

    context.fillRect(0, 0, canvas.width, canvas.height);



    // ------------------------------------------params canvas --------------------------

    // sauvegarde du context 
    context.save();
    // placement sur le canvas 
    context.translate(canvas.width / 2, canvas.height / 2);
    context.beginPath();

    // dessin des nombres sur le canvas 
    // definition de la font 
    context.font = '40px helvetica neue ';
    // definition de la couleur de la font 
    context.fillStyle = 'white';
    // centrer les nombres et aligne horizontalemment le text 
    context.textAlign = 'center';
    // textBaseline permet aligner verticalement le text en fonction de la font appliquer

    context.textBaseline = 'middle';
    // ----------------------------------------params design Simon ------------------------------------




    context.beginPath();

    context.fillStyle = "transparent";
    context.fillStyle = "white";

    context.fillText(simonWacht, canvas.width / 170, canvas.height / 390);
    context.fillText(brunoSimonSlogan, canvas.width / 170, canvas.height / 3);

    context.closePath();




    // -----------------------------------------boucle for ------------------------------------------
    function randomColor() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);


        return "rgb(" + r + "," + g + "," + b + ")";
    }



    // definition de la boucle for on commence a 1 et pas 0 pour car il n'y a pas de 0 sur une horloge 
    for (var n = 1; n <= 12; n++) {
        // definition des variables locale 
        // update(s) permet de gerer l'écart des nombres autour des aiguille , la fonctions math.pi renvoie le nombre  pi  
        var updates = (n - 3) * (Math.PI * 2) / 12;
        // voici un exmple fait a la caculatrice = 1 - 3 * 3,14*2 = - 2.......


        // definition des positions cosinus de x et sinus de y  
        var x = radiusClockmain * 0.7 * Math.cos(updates);
        var y = radiusClockmain * 0.7 * Math.sin(updates);

        context.fillStyle = randomColor();
        console.log(randomColor);
        // renvoie la position x et y et le nombre sur le canvas par rapport a l'angle definit 
        context.fillText(n, x, y);
    }

    // definition des heures avec rapelle de l'heure actuelle 
    // retour de la fonction drawingClock
    context.beginPath();


    context.moveTo(300, 0, 0, 0);
    context.lineTo(700, 0);
    context.lineWidth = 60;




    context.moveTo(-300, 0);
    context.lineTo(-700, 0);
    context.lineWidth = 60;

    context.strokeStyle = '#ff0000';
    context.stroke();







    context.save();
    var update = (heureNow - 3) * 2 * Math.PI / 12;
    // fonction importante update renvoie la nouvelle postion en fonction de l'heure acTuelle 
    context.rotate(update);
    context.beginPath();
    context.moveTo(-15, -5);
    context.lineTo(-15, 5);

    context.lineTo(radiusClockmain * 0.5, 1);
    context.lineTo(radiusClockmain * 0.5, -1);
    context.fill();
    context.restore();



    context.save();
    var update = (secondes - 15) * 2 * Math.PI / 60;
    context.rotate(update);
    context.beginPath();
    context.moveTo(-15, -3);
    context.lineTo(-15, 3);
    // affinage
    context.lineTo(radiusClockmain * 0.6, 1);
    // largeur
    context.lineTo(radiusClockmain * 0.6, -1);
    // context.fillText = ("bruno simon ");
    context.fill();
    context.restore();



    // definition des minutes
    context.save();
    var update = (minute - 15) * 2 * Math.PI / 60;
    context.rotate(update);
    context.beginPath();
    context.moveTo(-15, -4);
    context.lineTo(-15, 4);
    context.lineTo(radiusClockmain * 0.8, 1);
    context.lineTo(radiusClockmain * 0.8, -1);
    context.fill();
    context.restore();

    context.restore();





}





setInterval(function () {

    window.requestAnimationFrame(drawingClock);

}, 1000 / 60);

requestAnimationFrame(drawingClock);













console.log('updates');
console.log(radiusClockmain);
console.log('secondes');
console.log('date');


// ------------------------Quellery Lionel ----------------------------------


