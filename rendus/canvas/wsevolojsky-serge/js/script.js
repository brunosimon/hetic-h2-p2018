//////////////////////////
//						//
//   CANVAS - PACMAN	//
//						//
//////////////////////////					

//All the coords which make the draw possible are stocked in an other files named coord.js


var red,blue,green,piece_decal = [],
    widthEcran = 0,
    comptLoad  = 0;
	
//object which be used to handle different animation.
var allAnim = {
	pacman : -400,
	monster : -600,
	speed : 3,
	bouche : 1
};

//parameters of piece in the first animation.
var piecePara = {
	decal : -300,
	nmbr : 7
};

//object which be used to handle different game's steps.
var allEtat = {
	game:0,
	anim:0,
	piece: -300,
	color:0
};

//function which create the canvas
function init()
{
	var container = document.getElementById('container');
	var canvas = document.createElement('canvas');
	context = canvas.getContext('2d'),
	canvas.height = 610;
	canvas.width = 810;
	container.style.marginLeft = 300 + "px";
	container.appendChild(canvas);

}

//function wich create a stroke draw.
//It receive 4 parametters:
//the Tab with all coords, the moveTo coords and the value of the animation on X 
function drawStroke(stroke,moveX,moveY,moveAnim,moveAnimY)
{
	context.beginPath();
	context.lineWidth	= 2;

	context.moveTo(moveX+moveAnim,moveY+moveAnimY);
	for(i=0;i<stroke.length;i+=2){

		context.lineTo(stroke[i]+moveAnim,stroke[i+1]+moveAnimY);
	}
	context.stroke();
}

// Function which draw each Letter of the title
function drawLetter(tab,move){
	var moveY;
	for(var i = 0;i<tab.length;i++){
		context.beginPath();
		context.lineWidth	= 1;
		for(var j = 0; j<tab[i].length;j+=2){
			moveY = Math.floor(Math.random()*5);
			if(j<2) context.moveTo(tab[i][j]+move,tab[i][j+1]+moveY);
			context.lineTo(tab[i][j]+move,tab[i][j+1]+moveY);
		}
		context.stroke();
	}
}

// function which draw each piece
// it use the same coords but it receive for each piece a different value of placement
function drawPiece(nmbr,tab)
{
	for(var i=0;i<nmbr;i++){
		drawStroke(piece,390,395,tab[i],0);
	}
}

//function which draw the monstern moveX and MoveY allow to replace the position
function drawMonster(tab,moveX,moveY)
{
	for(var i=0;i<tab.length;i++){
		var j=0;
		context.beginPath();
		context.arc(tab[i][j]+moveX,tab[i][j+1]+moveY,tab[i][j+2],0,Math.PI,tab[i][j+3]);
		context.moveTo(tab[i][j+4]+moveX,tab[i][j+5]+moveY);
		context.lineTo(tab[i][j+6]+moveX,tab[i][j+7]+moveY);
		context.stroke();	
	}
}

//initialisation start key of animation.
function animate(){
	window.requestAnimationFrame(animate);
	
	//efface tout le canvas pour permettre l'animation
	context.clearRect(0,0,800,600);
	//define randomly the color
	red = Math.floor(Math.random()*200),
	green = Math.floor(Math.random()*200),
	blue = Math.floor(Math.random()*200);
	allEtat.color += 0.5;
	
	//while the step game is under 2 the loop draw the first animation.
	if(allEtat.game < 2){	
		if(allEtat.color % 2 == 0){
		context.strokeStyle = 'rgba('+ red +',' + green+ ',' + blue + ',1)';
		}
		
		context.lineJoin = 'round'; 
		drawLetter(letter,0);
		
		//it checks the pacman's position and erase the piece like if he eat it
		if(allAnim.pacman > allEtat.piece-40){
			allEtat.piece += 100;
			piecePara.decal = allEtat.piece;
			piecePara.nmbr += -1;
		} else piecePara.decal = allEtat.piece;
		
		//fill a tab with the different value of X pieces position
		for(var i=0;i<piecePara.nmbr;i++){
			piece_decal[i] = piecePara.decal;
			piecePara.decal +=100;
		}
		
		drawPiece(piecePara.nmbr,piece_decal);
		drawMonster(monster,allAnim.monster,0);
		
		
		allAnim.pacman += allAnim.speed;
		allAnim.monster += allAnim.speed;

		//it move the mouth
		pacman.right[5] += allAnim.bouche;
		pacman.right[9] -= allAnim.bouche;
		pacman.left[13] += allAnim.bouche;
		pacman.left[17] -= allAnim.bouche;
		if(pacman.right[5]>pacman.right[7] || pacman.right[5] < 387.5){
			allAnim.bouche *=-1;
		}
		
		//Conditions to handle the direction of pacman

		//
		if(allAnim.pacman > 500 && allEtat.anim == 0){
			drawStroke(pacman.left,387.25,375,allAnim.pacman,0);
			allAnim.speed *= -2;
			allEtat.anim = 1;
		} else if(allAnim.pacman < 500 && allEtat.anim == 0){
			drawStroke(pacman.right,387.25,375,allAnim.pacman,0);
		} else{
			drawStroke(pacman.left,377.25,355,allAnim.pacman,0);
			if(allAnim.pacman < -500){
				piecePara.nmbr = 0;
				allEtat.anim = 2;
			}
		}

		if(allAnim.monster > 500) allAnim.monster = -400;
		
		//when the step aniamtion is equal to 2 it draws the button
		//and increase the step game to 1
		if(allEtat.anim == 2){
			context.beginPath();
			context.rect(300,250,200,100);
			context.stroke();
			allEtat.game = 1;
		}
		// when the step is equal to 1 it makes visible the html button
		if(allEtat.game == 1){
			document.getElementById('clear').style.display = 'block';
		}
	} else{
		drawField(field);
		drawMonster(monster,5,-143);
		drawStroke(pacman.right,387.25,375,50,50);
		context.beginPath();
		load = document.getElementById('load');
		setTimeout(function(){
			if(widthEcran<810) widthEcran += 3;
			else{
				widthEcran += 0;			
				context.save();
				context.beginPath();
				var text  = 'Le jeu est en cours de création';
				context.font = "40px Arial";
				context.textAlign = 'center';
				context.textBaseline = 'top';
				context.fillStyle = '#fff';
				context.fillText(text,200,100);	
				context.restore();	
			}
		},1000);
		context.rect(0,0,widthEcran,610);
		context.fill();
	}

	//When the button start is clicked which increase the step game.
	document.getElementById('clear').onclick = function(){
		allEtat.game = 2;
		document.getElementById('clear').style.display = 'none';
	}
	
}

// Fonction qui crèe le terrain de jeu.
function drawField(tab){
	context.beginPath();
	if(allEtat.color % 20 == 0){
		context.fillStyle = 'rgba('+ red +',' + green+ ',' + blue + ',1)';
		}
	for(var i=0;i<tab.length;i+=4){
		context.rect(tab[i],tab[i+1],tab[i+2],tab[i+3]);	
	}
	context.fill();
}

init();
animate();