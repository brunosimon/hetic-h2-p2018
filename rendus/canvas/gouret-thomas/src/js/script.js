var canvas = document.getElementById('canvas')
	context = canvas.getContext('2d')

var canvas2 = document.getElementById('canvas2')
	context2 = canvas2.getContext('2d')

var canvas3 = document.getElementById('canvas3')
	context3 = canvas3.getContext('2d')


// // Homme avec mouvement de tête + cadre du vélo

var coords = {x:650,y:100};
var speed = {x:1 ,y : 1}

function loop()
{
    context.clearRect(0,0,canvas.width,canvas.height);

	context.beginPath();
	context.moveTo(525,250);
	context.lineTo(700,175);
	context.quadraticCurveTo(
		750, 
	    300, 
	    700, 
	    375  
	);
	context.lineTo(575,450);
	context.lineTo(600,600);
	context.lineWidth = 55;
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.stroke();

	context.beginPath();
	context.moveTo(525,250);
	context.quadraticCurveTo(
    	350, 
    	275, 
    	425, 
    	325  
	);
	context.lineTo(410,375);
	context.lineTo(310,600);
	context.lineTo(410,375);
	context.quadraticCurveTo(
    	550, 
    	400, 
    	600, 
    	600  
	);
	context.lineTo(850,600);
	context.quadraticCurveTo(
    	750, 
    	350, 
    	425, 
    	350  
	);
	context.moveTo(600,600);
	context.lineTo(700,425)
	context.lineWidth = 15;
	context.stroke();

    requestAnimationFrame(loop); 
    
    coords.x =  coords.x - speed.x;
    coords.y = coords.y + speed.x;
   
    if(coords.x < 625 || coords.x > 650)
        speed.x *=-1;
    	speed.y *=1 ;
    
    
    context.beginPath();
    context.arc(coords.x,coords.y,50,0,Math.PI*2);
    context.fill();

}
loop();


// Roue Gauche en mouvement

function wheel()
{
    requestAnimationFrame(wheel);
   
  	context2.translate(310,600);
    context2.rotate( Math.PI / 180 * -2); 
    context2.translate(-310,-600);

    context2.clearRect(0,0,canvas.width,canvas.height);

    context2.beginPath();
	context2.arc(310,600,175,0,Math.PI*-2,true);
	context2.lineWidth = '20';
	context2.stroke();

	context2.beginPath();
	context2.arc(310,600,25,0,Math.PI*-2,true);
	context2.fill();

    context2.beginPath();
	context2.moveTo(310,600);
	context2.lineTo(310,425);
	context2.lineTo(310,600);
	context2.lineTo(485,600);
	context2.lineTo(310,600);
	context2.lineTo(310,775);
	context2.lineTo(310,600);
	context2.lineTo(135,600);
	context2.lineWidth = 3;
	context2.stroke();

	context2.save(); 
	context2.translate(310,600); 
	context2.rotate(0.30); 
	context2.moveTo(0,0);
	context2.lineTo(0,-175);
	context2.lineTo(0,0);
	context2.lineTo(175,0);
	context2.lineTo(0,0);
	context2.lineTo(0,175);
	context2.lineTo(0,0);
	context2.lineTo(-175,0);
	context2.lineWidth = 3;
	context2.stroke();
	context2.restore();

	context2.save(); 
	context2.translate(310,600); 
	context2.rotate(0.60); 
	context2.moveTo(0,0);
	context2.lineTo(0,-175);
	context2.lineTo(0,0);
	context2.lineTo(175,0);
	context2.lineTo(0,0);
	context2.lineTo(0,175);
	context2.lineTo(0,0);
	context2.lineTo(-175,0);
	context2.lineWidth = 3;
	context2.stroke();
	context2.restore();

	context2.save(); 
	context2.translate(310,600); 
	context2.rotate(0.90); 
	context2.moveTo(0,0);
	context2.lineTo(0,-175);
	context2.lineTo(0,0);
	context2.lineTo(175,0);
	context2.lineTo(0,0);
	context2.lineTo(0,175);
	context2.lineTo(0,0);
	context2.lineTo(-175,0);
	context2.lineWidth = 3;
	context2.stroke();
	context2.restore();

	context2.save(); 
	context2.translate(310,600); 
	context2.rotate(1.2); 
	context2.moveTo(0,0);
	context2.lineTo(0,-175);
	context2.lineTo(0,0);
	context2.lineTo(175,0);
	context2.lineTo(0,0);
	context2.lineTo(0,175);
	context2.lineTo(0,0);
	context2.lineTo(-175,0);
	context2.lineWidth = 3;
	context2.stroke();
	context2.restore();

}
wheel();


// Roue Droite en mouvementt

function wheel2()
{
    requestAnimationFrame(wheel2);
   
  	context3.translate(850,600);
    context3.rotate( Math.PI / 180 * -2); 
    context3.translate(-850,-600);

    context3.clearRect(0,0,canvas.width,canvas.height);

    context3.beginPath();
	context3.arc(850,600,175,0,Math.PI*-2,true);
	context3.lineWidth = '20';
	context3.stroke();

	context3.beginPath();
	context3.arc(850,600,25,0,Math.PI*-2,true);
	context3.fill();

    context3.beginPath();
	context3.moveTo(850,600);
	context3.lineTo(850,425);
	context3.lineTo(850,600);
	context3.lineTo(1025,600);
	context3.lineTo(850,600);
	context3.lineTo(850,775);
	context3.lineTo(850,600);
	context3.lineTo(675,600);
	context3.lineWidth = 3;
	context3.stroke();

	context3.save(); 
	context3.translate(850,600); 
	context3.rotate(0.30); 
	context3.moveTo(0,0);
	context3.lineTo(0,-175);
	context3.lineTo(0,0);
	context3.lineTo(175,0);
	context3.lineTo(0,0);
	context3.lineTo(0,175);
	context3.lineTo(0,0);
	context3.lineTo(-175,0);
	context3.lineWidth = 3;
	context3.stroke();
	context3.restore();

	context3.save(); 
	context3.translate(850,600); 
	context3.rotate(0.60); 
	context3.moveTo(0,0);
	context3.lineTo(0,-175);
	context3.lineTo(0,0);
	context3.lineTo(175,0);
	context3.lineTo(0,0);
	context3.lineTo(0,175);
	context3.lineTo(0,0);
	context3.lineTo(-175,0);
	context3.lineWidth = 3;
	context3.stroke();
	context3.restore();

	context3.save(); 
	context3.translate(850,600); 
	context3.rotate(0.90); 
	context3.moveTo(0,0);
	context3.lineTo(0,-175);
	context3.lineTo(0,0);
	context3.lineTo(175,0);
	context3.lineTo(0,0);
	context3.lineTo(0,175);
	context3.lineTo(0,0);
	context3.lineTo(-175,0);
	context3.lineWidth = 3;
	context3.stroke();
	context3.restore();

	context3.save(); 
	context3.translate(850,600); 
	context3.rotate(1.2); 
	context3.moveTo(0,0);
	context3.lineTo(0,-175);
	context3.lineTo(0,0);
	context3.lineTo(175,0);
	context3.lineTo(0,0);
	context3.lineTo(0,175);
	context3.lineTo(0,0);
	context3.lineTo(-175,0);
	context3.lineWidth = 3;
	context3.stroke();
	context3.restore();
	
}
wheel2();


// Rotation Jambes

// var coords = {x:575,y:450}
// var speed = 1;

// function moove()
// {
//     requestAnimationFrame(moove);
    
//     //Mettre à jour la position
   
//   	context.translate(700,375);
//     context.rotate( Math.PI / 180 * 1 * speed); 
//     context.translate(-700,-375);

//     //Redessiner le canvas

//     context.clearRect(0,0,canvas.width,canvas.height);

//     context.beginPath();
// 	context.moveTo(700,375);
// 	context.lineTo(coords.x,coords.y);
// 	context.stroke();


//     if(coords.y > 500 || coords.y < 400)
//     	speed = -1;

// }
// moove();