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
//FIN POLYFILL 

var canvas  = document.getElementById('canvas'),
	context = canvas.getContext('2d'),
	text    = '$ Benichou Burger $',
	step    = -1000, //position de départ
	steps   = 0,
	delay   = 2; //vitesse
	  
function generate_canvas() {

    // PAIN //////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////

			// CHAPEAU ///////////////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	context.save();
	/////////////////////// Ombre Pain Chapeau ///////////////////////
	context.beginPath(); //Commencer le dessin
	context.fillStyle = 'rgba(0, 0, 0, 0.2)'; //Reglage de la couleur
	context.arc(215, 215, 100, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ ,PI*2 pour cercle complet point d'arrivé, true/false pour le sens

	context.fill(); // Edition forme
	///////////////////////FIN///////////////////////


	/////////////////////// Pain Chapeau ///////////////////////
	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#edc870'; //Reglage de la couleur
	context.arc(200, 200, 100, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ ,PI*2 pour cercle complet point d'arrivé, true/false pour le sens
	context.lineWidth	= 8; //Largeur de ligne
	context.strokeStyle	= '#bc8f41';

	context.fill(); // Edition forme
	context.stroke(); // Edition contour
	///////////////////////FIN///////////////////////

	/////////////////////// Graines de sesam ///////////////////////
	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#ffffff'; 
	context.lineCap = 'round';
	context.moveTo(200, 270);
	context.lineTo(210, 275);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#ffffff'; 
	context.lineCap = 'round';
	context.moveTo(130, 180);
	context.lineTo(140, 185);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#ffffff'; 
	context.lineCap = 'round';
	context.moveTo(190, 180);
	context.lineTo(180, 185);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#ffffff'; 
	context.lineCap = 'round';
	context.moveTo(260, 200);
	context.lineTo(270, 205);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#ffffff'; 
	context.lineCap = 'round';
	context.moveTo(160, 230);
	context.lineTo(150, 235);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#ffffff'; 
	context.lineCap = 'round';
	context.moveTo(200, 230);
	context.lineTo(200, 240);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#ffffff'; 
	context.lineCap = 'round';
	context.moveTo(240, 140);
	context.lineTo(240, 150);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#ffffff'; 
	context.lineCap = 'round';
	context.moveTo(250, 240);
	context.lineTo(240, 240);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#ffffff'; 
	context.lineCap = 'round';
	context.moveTo(180, 140);
	context.lineTo(170, 140);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#ffffff'; 
	context.lineCap = 'round';
	context.moveTo(220, 200);
	context.lineTo(230, 205);
	context.stroke();

	/* Après recul sur mon travail, j'aurais du opter pour une fonction generant le dessin de ma graine, et par la suite y placer mes coordoonés et un rotate.*/
	///////////////////////FIN///////////////////////

			// FIN CHAPEAU ///////////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////


			// BASE //////////////////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	context.save();
	/////////////////////// Ombre Pain Base ///////////////////////
	context.beginPath(); //Commencer le dessin
	context.fillStyle = 'rgba(0, 0, 0, 0.2)'; //Reglage de la couleur
	context.arc(515, 215, 100, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ ,PI*2 pour cercle complet point d'arrivé, true/false pour le sens

	context.fill(); // Edition forme
	///////////////////////FIN///////////////////////


	/////////////////////// Pain Base ///////////////////////
	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#edc870'; //Reglage de la couleur
	context.arc(500, 200, 100, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ ,PI*2 pour cercle complet point d'arrivé, true/false pour le sens
	context.lineWidth	= 8; //Largeur de ligne
	context.strokeStyle	= '#bc8f41';

	context.fill(); // Edition forme
	context.stroke(); // edition contour
	///////////////////////FIN///////////////////////

			// FIN BASE //////////////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////


	// FROMAGE ///////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	context.save();
	/////////////////////// Ombre Fromage ///////////////////////
	context.beginPath();
	context.fillStyle = 'rgba(0, 0, 0, 0.2)';
	context.rect(125, 415, 180, 180);

	context.fill(); // Edition forme
	/////////////////////// Fin ///////////////////////

	/////////////////////// Fromage ///////////////////////
	context.beginPath();
	context.fillStyle = '#fece26';
	context.strokeStyle = '#d78e1b'
	context.rect(110, 400, 180, 180);
	context.lineJoin    = 'bevel';
	context.fill(); // Edition forme
	context.stroke();
	/////////////////////// Fin ///////////////////////

	/////////////////////// Trous Fromage ///////////////////////
	context.globalCompositeOperation = 'destination-out'; //pathfinder exclusion

		//Premier trou (Droite Gros)
	context.beginPath();
	context.fillStyle = 'blue';
	context.arc(110,450,18,0,Math.PI*2);
	context.fill(); // Edition forme

		//Second trou (Droite Petit)
	context.beginPath();
	context.fillStyle = 'blue';
	context.arc(150,480,10,0,Math.PI*2);
	context.fill(); // Edition forme
		
		//Troisieme trou (Gauche Gros)
	context.beginPath();
	context.fillStyle = 'blue';
	context.arc(230,440,20,0,Math.PI*2);
	context.fill(); // Edition forme

		//Quatrième trou (Gauche Petit)
	context.beginPath();
	context.fillStyle = 'blue';
	context.arc(250,480,15,0,Math.PI*2);
	context.fill(); // Edition forme

		//Cinquieme trou (Bas Gros)
	context.beginPath();
	context.fillStyle = 'blue';
	context.arc(240,584,20,0,Math.PI,true);
	context.fill(); // Edition forme

		//Cinquieme trou (Bas Petit)
	context.beginPath();
	context.fillStyle = 'blue';
	context.arc(190,584,13,0,Math.PI,true);
	context.fill(); // Edition forme
	/////////////////////// Fin ///////////////////////


	// TOMATES ///////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	context.restore();

			// TOMATE 1 //////////////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	context.save();
	/////////////////////// Ombre Tomate ///////////////////////
	context.beginPath(); //Commencer le dessin
	context.fillStyle = 'rgba(0, 0, 0, 0.2)'; //Reglage de la couleur
	context.arc(485, 485, 70, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ

	context.fill(); // Edition forme
	/////////////////////// Fin ///////////////////////


	/////////////////////// Tomate ///////////////////////
	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#e45340'; //Reglage de la couleur
	context.arc(470, 470, 70, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ
	context.lineWidth	= 8; //Largeur de ligne
	context.strokeStyle	= '#933929';

	context.fill(); // Edition forme
	context.stroke(); // edition contour
	/////////////////////// Fin ///////////////////////

	/////////////////////// Pulpe ///////////////////////
	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#933929'; //Reglage de la couleur
	context.arc(455, 455, 25, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ

	context.fill(); // Edition forme

	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#933929'; //Reglage de la couleur
	context.arc(455, 485, 25, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ

	context.fill(); // Edition forme

	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#933929'; //Reglage de la couleur
	context.arc(485, 455, 25, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ

	context.fill(); // Edition forme

	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#933929'; //Reglage de la couleur
	context.arc(485, 485, 25, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ

	context.fill(); // Edition forme
	/////////////////////// Fin ///////////////////////

	/////////////////////// Graines ///////////////////////
	context.beginPath();
	context.lineWidth  = 8;
	context.strokeStyle = '#efb88d'; 
	context.lineCap = 'round';
	context.moveTo(455, 455);
	context.lineTo(460, 460);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 8;
	context.strokeStyle = '#efb88d'; 
	context.lineCap = 'round';
	context.moveTo(460, 480);
	context.lineTo(455, 485);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 8;
	context.strokeStyle = '#efb88d'; 
	context.lineCap = 'round';
	context.moveTo(485, 455);
	context.lineTo(480, 460);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 8;
	context.strokeStyle = '#efb88d'; 
	context.lineCap = 'round';
	context.moveTo(480, 480);
	context.lineTo(485, 485);
	context.stroke();
	/////////////////////// Fin ///////////////////////

			// FIN TOMATE 1 //////////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////


			// TOMATE 2 //////////////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	context.save();
	/////////////////////// Ombre Tomate ///////////////////////
	context.beginPath(); //Commencer le dessin
	context.fillStyle = 'rgba(0, 0, 0, 0.2)'; //Reglage de la couleur
	context.arc(535, 535, 70, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ

	context.fill(); // Edition forme
	/////////////////////// Fin ///////////////////////


	/////////////////////// Tomate ///////////////////////
	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#e45340'; //Reglage de la couleur
	context.arc(520, 520, 70, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ
	context.lineWidth	= 8; //Largeur de ligne
	context.strokeStyle	= '#933929';

	context.fill(); // Edition forme
	context.stroke(); // edition contour
	/////////////////////// Fin ///////////////////////

	/////////////////////// Pulpe ///////////////////////
	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#933929'; //Reglage de la couleur
	context.arc(505, 505, 25, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ

	context.fill(); // Edition forme

	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#933929'; //Reglage de la couleur
	context.arc(505, 535, 25, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ

	context.fill(); // Edition forme

	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#933929'; //Reglage de la couleur
	context.arc(535, 505, 25, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ

	context.fill(); // Edition forme

	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#933929'; //Reglage de la couleur
	context.arc(535, 535, 25, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ

	context.fill(); // Edition forme
	/////////////////////// Fin ///////////////////////

	/////////////////////// Graines ///////////////////////
	context.beginPath();
	context.lineWidth  = 8;
	context.strokeStyle = '#efb88d'; 
	context.lineCap = 'round';
	context.moveTo(505, 505);
	context.lineTo(510, 510);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 8;
	context.strokeStyle = '#efb88d'; 
	context.lineCap = 'round';
	context.moveTo(510, 530);
	context.lineTo(505, 535);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 8;
	context.strokeStyle = '#efb88d'; 
	context.lineCap = 'round';
	context.moveTo(535, 505);
	context.lineTo(530, 510);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 8;
	context.strokeStyle = '#efb88d'; 
	context.lineCap = 'round';
	context.moveTo(530, 530);
	context.lineTo(535, 535);
	context.stroke();
	/////////////////////// Fin ///////////////////////

			// FIN TOMATE 2 //////////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////


	// Oeuf ////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	context.save();
	/////////////////////// Ombre Oeuf ///////////////////////
	context.beginPath(); //Commencer le dessin
	context.fillStyle = 'rgba(0, 0, 0, 0.2)'; //Reglage de la couleur
	context.arc(815, 215, 100, 0, Math.PI * 2); //Cercle coordonnés centre, rayon arc, point de départ ,PI*2 pour cercle complet point d'arrivé, true/false pour le sens

	context.fill(); // Edition forme
	/////////////////////// Fin ///////////////////////

	/////////////////////// Blanc Oeuf ///////////////////////
	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#ffffff'; //Reglage de la couleur
	context.arc(800,200, 100, 0, Math.PI*2); //Cercle coordonnés centre, rayon arc, point de départ
	context.lineWidth	= 8; //Largeur de ligne
	context.strokeStyle	= '#e7e3c9';


	context.fill(); // Edition forme
	context.stroke();
	/////////////////////// Fin ///////////////////////

	/////////////////////// jaune Oeuf ///////////////////////
	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#fece26'; //Reglage de la couleur
	context.arc(815,185, 40, 0, Math.PI*2); //Cercle coordonnés centre, rayon arc, point de départ
	context.lineWidth	= 8; //Largeur de ligne
	context.strokeStyle	= '#d78e1b';


	context.fill(); // Edition forme
	context.stroke();

	context.beginPath();
	context.strokeStyle='white';
	context.lineWidth=10;
	context.moveTo(790, 190);
	context.quadraticCurveTo(790,160, 820,160);
	context.stroke();
	/////////////////////// Fin ///////////////////////


	// Salade ////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
	///////////////////////// Hexagone ///////////////////////
	//context.beginPath();
	//context.moveTo(760, 380);
	//context.lineTo(870, 380);
	//context.lineTo(940, 500);
	//context.lineTo(870, 610);
	//context.lineTo(760, 610);
	//context.lineTo(690, 500);
	//context.closePath();
	//context.lineWidth	= 30; //Largeur de ligne
	//context.strokeStyle = '#8bc26c';
	//context.fillStyle = '#8bc26c';
	//context.lineJoin = 'round';
	//
	//context.stroke();
	//context.fill();
	///////////////////////// Fin ///////////////////////
	//
	///////////////////////// Feuilles ///////////////////////
	//context.beginPath();
	//context.moveTo(770, 420);
	//context.lineTo(860, 420);
	//context.lineTo(900, 500);
	//context.lineTo(860, 570);
	//context.lineTo(770, 570);
	//context.lineTo(730, 500);
	//context.closePath();
	//context.lineWidth	= 30; //Largeur de ligne
	//context.strokeStyle = '#6f9855';
	//context.fillStyle = '#6f9855';
	//context.lineJoin = 'round';
	//
	//context.stroke();
	//context.fill();
	//
	//context.beginPath();
	//context.moveTo(790, 460);
	//context.lineTo(840, 460);
	//context.lineTo(860, 500);
	//context.lineTo(840, 530);
	//context.lineTo(790, 530);
	//context.lineTo(770, 500);
	//context.closePath();
	//context.lineWidth	= 30; //Largeur de ligne
	//context.strokeStyle = '#8bc26c';
	//context.fillStyle = '#8bc26c';
	//context.lineJoin = 'round';
	//
	//context.stroke();
	//context.fill();
	//
	//context.beginPath();
	//context.strokeStyle='white';
	//context.lineWidth=10;
	//context.moveTo(795,465); // X et Y du point de départ
	//context.bezierCurveTo(
	//    840, // X du premier point de tension
	//    460, // Y du premier point de tension
	//    790, // X du second point de tension
	//    530, // Y du second point de tension
	//    835, // X du point d'arrivée
	//    525  // Y du point d'arrivée
	//);
	//context.stroke();

	/////////////////////// Fin ///////////////////////


	// Steack ////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
    context.save();
	/////////////////////// Ombre Steak /////////////////////// 
	context.beginPath(); //Commencer le dessin
	context.fillStyle = 'rgba(0, 0, 0, 0.2)'; //Reglage de la couleur
	context.arc(1115, 225, 90, 0, Math.PI*2);

	context.fill(); // Edition forme
	/////////////////////// Fin /////////////////////// 

	/////////////////////// Steack /////////////////////// 
	//Demi cercle Haut
	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#9b6038'; //Reglage de la couleur
	context.arc(1100.1, 190, 80.3, 0, Math.PI,true); //Cercle coordonnés centre, rayon arc, point de départ ,PI*2 pour cercle complet point d'arrivé, true/false pour le sens
	context.lineWidth	= 8; //Largeur de ligne
	context.lineCap = 'butt';
	context.strokeStyle	= '#5d3922';

	context.fill(); // Edition forme
	context.stroke(); // Edition contour

		//Demi cercle Bas
	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#9b6038'; //Reglage de la couleur
	context.arc(1100, 220, 80, 0, Math.PI,false); //Cercle coordonnés centre, rayon arc, point de départ ,PI*2 pour cercle complet point d'arrivé, true/false pour le sens
	context.lineWidth	= 8; //Largeur de ligne
	context.lineCap = 'butt';
	context.strokeStyle	= '#5d3922';

	context.fill(); // Edition forme
	context.stroke(); // Edition contour

		//Rectangle remplissage
	context.beginPath(); //Commencer le dessin
	context.fillStyle = '#9b6038'; //Reglage de la couleur
	context.rect(1020, 180, 160, 40);
	context.fill(); // Edition forme

		//Trais de liaisons
	context.beginPath();
	context.lineWidth  = 8;
	context.strokeStyle = '#5d3922'; 
	context.lineCap = 'round';
	context.moveTo(1020, 180);
	context.lineTo(1020, 220);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 8;
	context.strokeStyle = '#5d3922'; 
	context.lineCap = 'round';
	context.moveTo(1180, 180);
	context.lineTo(1180, 220);
	context.stroke();
	/////////////////////// Fin ///////////////////////

	/////////////////////// Lignes ///////////////////////
	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#5d3922'; 
	context.lineCap = 'round';
	context.moveTo(1040, 180);
	context.lineTo(1110, 135);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#5d3922'; 
	context.lineCap = 'round';
	context.moveTo(1040, 215);
	context.lineTo(1140, 150);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#5d3922'; 
	context.lineCap = 'round';
	context.moveTo(1040, 250);
	context.lineTo(1160, 170);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#5d3922'; 
	context.lineCap = 'round';
	context.moveTo(1060, 270);
	context.lineTo(1160, 205);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#5d3922'; 
	context.lineCap = 'round';
	context.moveTo(1090, 285);
	context.lineTo(1160, 240);
	context.stroke();
	/////////////////////// Fin ///////////////////////


	// Sauce /////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
    context.save();
			// Ketchup ///////////////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/////////////////////// Lignes ///////////////////////
	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#e45340'; 
	context.lineCap = 'round';
	context.moveTo(700, 480);
	context.lineTo(700, 560);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#e45340'; 
	context.lineCap = 'round';
	context.moveTo(750, 420);
	context.lineTo(750, 560);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#e45340'; 
	context.lineCap = 'round';
	context.moveTo(800, 420);
	context.lineTo(800, 560);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#e45340'; 
	context.lineCap = 'round';
	context.moveTo(850, 420);
	context.lineTo(850, 560);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#e45340'; 
	context.lineCap = 'round';
	context.moveTo(900, 420);
	context.lineTo(900, 500);
	context.stroke();
	/////////////////////// Fin ///////////////////////

	/////////////////////// Jointures ///////////////////////
	context.beginPath(); //Commencer le dessin
	context.arc(775, 420, 25, 0, Math.PI,true); //Cercle coordonnés centre, rayon arc, point de départ ,PI*2 pour cercle complet point d'arrivé, true/false pour le sens
	context.lineWidth	= 10; //Largeur de ligne
	context.lineCap = 'butt';
	context.strokeStyle	= '#e45340';

	context.stroke(); // Edition contour

	context.beginPath(); //Commencer le dessin
	context.arc(875, 420, 25, 0, Math.PI,true); //Cercle coordonnés centre, rayon arc, point de départ ,PI*2 pour cercle complet point d'arrivé, true/false pour le sens
	context.lineWidth	= 10; //Largeur de ligne
	context.lineCap = 'butt';
	context.strokeStyle	= '#e45340';

	context.stroke(); // Edition contour

	context.beginPath(); //Commencer le dessin
	context.arc(725, 560, 25, 0, Math.PI,false); //Cercle coordonnés centre, rayon arc, point de départ ,PI*2 pour cercle complet point d'arrivé, true/false pour le sens
	context.lineWidth	= 10; //Largeur de ligne
	context.lineCap = 'butt';
	context.strokeStyle	= '#e45340';

	context.stroke(); // Edition contour

	context.beginPath(); //Commencer le dessin
	context.arc(825, 560, 25, 0, Math.PI,false); //Cercle coordonnés centre, rayon arc, point de départ ,PI*2 pour cercle complet point d'arrivé, true/false pour le sens
	context.lineWidth	= 10; //Largeur de ligne
	context.lineCap = 'butt';
	context.strokeStyle	= '#e45340';

	context.stroke(); // Edition contour

	/////////////////////// Fin ///////////////////////

			// Fin Ketchup ///////////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////


			// Moutarde ///////////////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
    context.save();
	/////////////////////// Lignes ///////////////////////
	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#fabd35'; 
	context.lineCap = 'round';
	context.moveTo(1000, 480);
	context.lineTo(1000, 560);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#fabd35'; 
	context.lineCap = 'round';
	context.moveTo(1050, 420);
	context.lineTo(1050, 560);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#fabd35'; 
	context.lineCap = 'round';
	context.moveTo(1100, 420);
	context.lineTo(1100, 560);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#fabd35'; 
	context.lineCap = 'round';
	context.moveTo(1150, 420);
	context.lineTo(1150, 560);
	context.stroke();

	context.beginPath();
	context.lineWidth  = 10;
	context.strokeStyle = '#fabd35'; 
	context.lineCap = 'round';
	context.moveTo(1200, 420);
	context.lineTo(1200, 500);
	context.stroke();
	/////////////////////// Fin ///////////////////////

	/////////////////////// Jointures ///////////////////////
	context.beginPath(); //Commencer le dessin
	context.arc(1175, 420, 25, 0, Math.PI,true); //Cercle coordonnés centre, rayon arc, point de départ ,PI*2 pour cercle complet point d'arrivé, true/false pour le sens
	context.lineWidth	= 10; //Largeur de ligne
	context.lineCap = 'butt';
	context.strokeStyle	= '#fabd35';

	context.stroke(); // Edition contour

	context.beginPath(); //Commencer le dessin
	context.arc(1075, 420, 25, 0, Math.PI,true); //Cercle coordonnés centre, rayon arc, point de départ ,PI*2 pour cercle complet point d'arrivé, true/false pour le sens
	context.lineWidth	= 10; //Largeur de ligne
	context.lineCap = 'butt';
	context.strokeStyle	= '#fabd35';

	context.stroke(); // Edition contour

	context.beginPath(); //Commencer le dessin
	context.arc(1125, 560, 25, 0, Math.PI,false); //Cercle coordonnés centre, rayon arc, point de départ ,PI*2 pour cercle complet point d'arrivé, true/false pour le sens
	context.lineWidth	= 10; //Largeur de ligne
	context.lineCap = 'butt';
	context.strokeStyle	= '#fabd35';

	context.stroke(); // Edition contour

	context.beginPath(); //Commencer le dessin
	context.arc(1025, 560, 25, 0, Math.PI,false); //Cercle coordonnés centre, rayon arc, point de départ ,PI*2 pour cercle complet point d'arrivé, true/false pour le sens
	context.lineWidth	= 10; //Largeur de ligne
	context.lineCap = 'butt';
	context.strokeStyle	= '#fabd35';

	context.stroke(); // Edition contour
	/////////////////////// Fin ///////////////////////

			// Fin Moutarde ///////////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
//		 context.font         = '100px Cabin'; // Font
//		 context.textAlign    = 'center';     // Alignement horizontal (left | center | right)
//		 context.textBaseline = 'top';        // Alignement vertical (top | bottom | middle | alphabetic | hanging)
//
//		 console.log(context.measureText(text).width); // Affiche la largeur du texte dans la console (sans le dessiner)
//		 context.fillText(text,650,700);      // Faire apparaitre le texte
		
		context.font = "150px Grand Hotel";
		context.textAlign = "center";
		context.textBaseline = "top";
        context.fillStyle = "#e45340";
		steps = canvas.width + 50;
}

function RunTextLeftToRight() {
	step++; // ajoute +1 à step
	context.save(); // sauvegarde l'état du canvas
	context.clearRect(0, 0, canvas.width, canvas.height); //   supprime tout le contenu du canvas
	generate_canvas(); // regénère les items du canvas
	context.translate(step, 630); //   boucle le texte
	context.fillText(text, 460, 0); //affiche le texte
	context.restore(); //  restaure l'état du canvas
	if (step == steps)
		step = -1000; //  recommence à -1000 l'animation
	if (step < steps)
		var t = setTimeout('RunTextLeftToRight()', delay); // relance le script pour animer
}

generate_canvas(); // génére le canvas
RunTextLeftToRight(); // lance la boucle qui permet d'animer le texte
