var canvas= document.getElementById('canvas'),
   context= canvas.getContext('2d');


var n = 1;

  var data = [
                300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300, //ligne horizontale
                295,290,285,280,285,290,295,297, // petit pic haut
                300,295	,285,270,255,240,285,300, // gros pic haut
                315,330,345,360,345,330,315,300,//gros pic bas
                299,295,290,295,300, //petit pic haut
                290,280,280,290,300, //pic haut moyen 
                299,295,290,295,300,//petit pic haut
                300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,
                300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,
                300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,
                300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,
                //Deuxieme pulsation
                 295,290,285,280,285,290,295,297, // petit pic haut
                300,295	,285,270,255,240,285,300, // gros pic haut
                315,330,345,360,345,330,315,300,//gros pic bas
                299,295,290,295,300, //petit pic haut
                290,280,280,290,300, //pic haut moyen 
                299,295,290,295,300,
                300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,
                
 ];




function loop() {	
                
                    requestAnimationFrame(loop);
                    context.lineWidth = "2";
                    context.strokeStyle = 'red';

                    // dessin de la courbe
                    n += 1;
                    if (n >= data.length) {
                        n = 1;
                    }//parcours de data

                    context.beginPath();
                    context.moveTo(85+(n - 1), data[n - 1]+50); //fonction de la courbe
                    context.lineTo(85+n, data[n]+50);
                    context.stroke();

                    context.clearRect(n+87, data[n+4]+50, 2, 100);

                ;
            




//Dessin du coeur
var coeur=document.getElementById('coeur'),
	ctxCoeur=canvas.getContext('2d');

	ctxCoeur.beginPath();
	context.fillStyle = 'red';
	ctxCoeur.arc(210,210,50,Math.PI/4,-Math.PI,true);
	ctxCoeur.arc(130,210,50,0,Math.PI-1,true);
	
	 ctxCoeur.moveTo(90,240);
	 ctxCoeur.lineTo(170,350);
	 ctxCoeur.lineTo(250,240);
	ctxCoeur.fill();

function beat(){

	
	if (data[n - 1]==240){
		console.log("battement");
	}
	}};

loop();
