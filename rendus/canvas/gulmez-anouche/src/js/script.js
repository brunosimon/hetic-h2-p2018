var canvas  = document.getElementById('canvas'),
	context = canvas.getContext('2d'),
	flocons = [
	[50,-5],	[150,-105],		[50,-205],		[150,-305],		[50,-405],		[150,-505],
	[250,-5], 	[350,-105],		[250,-205],		[350,-305],		[250,-405],		[350,-505],
	[450,-5],	[550,-105],		[450,-205],		[550,-305],		[450,-405],		[550,-505],
	[650,-5], 	[750,-105],		[650,-205],		[750,-305],		[650,-405],		[750,-505],
	]; 

function dessiner () {

	//////////////LE FOND/////////////////
	//ciel 
	context.fillStyle = '#1E2551';
	context.beginPath();
	context.rect(0,0,800,450);								//marge gauche //marge haut //largeur //hauteur  
	context.fill();

	//sol 
	context.fillStyle = "rgb(209,242,255)";
	context.beginPath();
	context.moveTo(0,600);									//pointe bas gauche/droite 
	context.lineTo(0,325);
	context.bezierCurveTo(0,325,36,307,103,306);			//pointe haut gauche/droite 
	context.bezierCurveTo(232,304,262,326,319,325);			//courbe 
	context.bezierCurveTo(376,324,427,306,506,306);
	context.bezierCurveTo(586,307,642,328,686,330);
	context.bezierCurveTo(748,332,800,319,800,319);
	context.lineTo(800,600);								//pointe bas gauche/droite 
	context.lineTo(0,600);
	context.fill();

	//////////////LA TETE/////////////////
	context.fillStyle = 'skyblue';
	context.beginPath();
	context.arc(400,205,35,0,Math.PI*2);					//gauche haut rayon fermé ou pas 
	context.fill();

	//////////////CHAPEAU/////////////////
	context.fillStyle = 'black';
	context.beginPath();
	context.rect(366,166,66,12);
	context.fill();

	context.fillStyle = 'black';
	context.beginPath();
	context.rect(375,129,49,40);
	context.fill();

	//////////////LES BRAS///////////////
	context.fillStyle="rgb(165,42,42)";
	context.beginPath();
	context.rect(294,264,57,2);
	context.fill();

	context.fillStyle="rgb(165,42,42)";
	context.beginPath();
	context.rect(450,264,57,2);
	context.fill();

	//////////////LE CORPS////////////////
	//moyen cercle
	context.fillStyle = 'skyblue';
	context.beginPath();
	context.arc(400,280,55,0,Math.PI*2);					//gauche haut rayon fermé ou pas 
	context.fill();

	//grand cercle 
	context.fillStyle = 'skyblue';
	context.beginPath();
	context.arc(400,380,70,0,Math.PI*2); 
	context.fill();

	//////////////LES YEUX////////////////
	context.fillStyle = 'black';
	context.beginPath();
	context.arc(385,190	,3,0,Math.PI*2);					//gauche haut rayon fermé ou pas 
	context.fill();

	context.fillStyle = 'black';
	context.beginPath();
	context.arc(415,190	,3,0,Math.PI*2);
	context.fill();

	//////////////BOUTONS////////////////
	context.fillStyle = 'black';
	context.beginPath();
	context.arc(399,259,2,0,2*Math.PI);						//gauche haut rayon fermé ou pas 
	context.fill();

	context.fillStyle = 'black';
	context.beginPath();
	context.arc(399,276,2,0,2*Math.PI);
	context.fill();

	context.fillStyle = 'black';
	context.beginPath();
	context.arc(399,293,2,0,2*Math.PI);
	context.fill();

	context.fillStyle = 'black';
	context.beginPath();
	context.arc(399,310,2,0,2*Math.PI);
	context.fill();

	//////////////LE NEZ////////////////
	context.fillStyle = "rgb(248,116,0)";
	context.beginPath();
	context.moveTo(399,205);
	context.lineTo(395,205);
	context.lineTo(397,200);
	context.lineTo(399,196);
	context.lineTo(402,200);
	context.lineTo(404,205);
	context.lineTo(399,205);
	context.fill();

	//////////////LA BOUCHE///////////////
	context.fillStyle = 'black';
	context.beginPath();
	context.arc(385,216,2,0,2*Math.PI);			//gauche haut rayon fermé ou pas 
	context.fill();

	context.fillStyle = 'black';
	context.beginPath();
	context.arc(391,219,2,0,2*Math.PI);
	context.fill();

	context.fillStyle = 'black';
	context.beginPath();
	context.arc(398,220,2,0,2*Math.PI);
	context.fill();

	context.fillStyle = 'black';
	context.beginPath();
	context.arc(406,219,2,0,2*Math.PI);
	context.fill();

	context.fillStyle = 'black';
	context.beginPath();
	context.arc(413,216,2,0,2*Math.PI);
	context.fill();

	//////////////SAPIN///////////////////
	context.fillStyle = 'brown';
	context.beginPath();
	context.rect(140,280,80,50);				//marge gauche //marge haut //largeur //hauteur  
	context.fill();

	context.beginPath();
	context.moveTo(180,150);					//point du haut gauche/droite 		//point du haut bas/haut  
	context.lineTo(90,290);						//point de gauche gauche/droite  	//pointe de gauche bas/haut   
	context.lineTo(272,290);					//point de droite gauche/droite  	//pointe de droite bas/haut  
	context.fillStyle = '#1D702D';
	context.fill();

	context.beginPath();
	context.moveTo(180,140);
	context.lineTo(100,255);
	context.lineTo(262,255);
	context.fillStyle = '#1D702D';
	context.fill();

	context.beginPath();
	context.moveTo(180,130);
	context.lineTo(110,220);   
	context.lineTo(252,220);  
	context.fillStyle = '#1D702D';
	context.fill();

	context.beginPath();
	context.moveTo(180,120);  
	context.lineTo(120,185);   
	context.lineTo(242,185); 
	context.fillStyle = '#1D702D';
	context.fill();

	context.beginPath();
	context.moveTo(180,110);			
	context.lineTo(130,150);   
	context.lineTo(232,150); 
	context.fillStyle = '#1D702D';
	context.fill();

	//////////////DECORATION//////////////
	context.fillStyle = 'red';
	context.beginPath();
	context.arc(190,153,7,0,2*Math.PI);			//gauche haut rayon fermé ou pas 
	context.fill();

	context.fillStyle = 'red';
	context.beginPath();
	context.arc(165,232,7,0,2*Math.PI);
	context.fill();

	context.fillStyle = 'orange';
	context.beginPath();
	context.arc(205,209,7,0,2*Math.PI);
	context.fill();

	context.fillStyle = 'blue';
	context.beginPath();
	context.arc(133,273,7,0,2*Math.PI);
	context.fill();

	context.fillStyle = 'blue';
	context.beginPath();	
	context.arc(150,187,7,0,2*Math.PI);
	context.fill();

	context.fillStyle = 'blue';
	context.beginPath();
	context.arc(218,261,7,0,2*Math.PI);
	context.fill();

	//////////////NUAGE///////////////////
	context.fillStyle = "rgb(228,248,255)";
	context.beginPath();
	context.arc(505,84,35.5,0,2*Math.PI);		//gauche haut rayon fermé ou pas 
	context.fill();

	context.fillStyle = "rgb(228,248,255)";
	context.beginPath();
	context.arc(540,100,35.5,0,2*Math.PI);
	context.fill();

	context.fillStyle = "rgb(228,248,255)";
	context.beginPath();
	context.arc(580,85,35.5,0,2*Math.PI);
	context.fill();

	context.fillStyle = "rgb(228,248,255)";
	context.beginPath();
	context.arc(545,70,35.5,0,2*Math.PI);
	context.fill();

	//////////////CADEAUX/////////////
	//bleu
	context.fillStyle = "rgb(71,0,182)";
	context.beginPath();
	context.rect(129,405,84,83);
	context.fill();

	context.fillStyle = "rgb(47,5,127)";
	context.beginPath();
	context.rect(127,403,88,6);
	context.fill();

	context.fillStyle = "rgb(187,0,5)";
	context.beginPath();
	context.rect(129,444,84,6);
	context.fill();

	context.fillStyle = "rgb(187,0,5)";
	context.beginPath();
	context.rect(168,403,6,85);
	context.fill();

	//orange 
	context.fillStyle = "rgb(255,155,45)";
	context.beginPath();
	context.rect(93,435,67,67);
	context.fill();

	context.fillStyle = "rgb(187,0,5)";
	context.beginPath();
	context.rect(93,465,67,6);
	context.fill();

	context.fillStyle = "rgb(255,116,20)";
	context.beginPath();
 	context.rect(91,434,71,7);
	context.fill();

	context.fillStyle = "rgb(187,0,5)";
	context.beginPath();
	context.rect(123,434,6,68);
	context.fill();

	//rose 
	context.fillStyle = "rgb(215,0,157)";
	context.beginPath();
	context.rect(145,477,46,45);
	context.fill();

	context.fillStyle = "rgb(187,0,5)";
	context.beginPath();
	context.rect(145,496,46,6);
	context.fill();

	context.fillStyle = "rgb(153,7,125)";
	context.beginPath();
	context.rect(143,475,50,6);
	context.fill();

	context.fillStyle = "rgb(187,0,5)";
	context.beginPath();
	context.rect(165,475,6,47);
	context.fill();

	//////////////PAPA NOEL//////////
	//les bras 
	context.fillStyle = "rgb(187,0,5)";
	context.beginPath();
	context.rect(688,344,57,20);
	context.fill();

	context.fillStyle = "rgb(0,0,0)";
	context.beginPath();
	context.rect(736,344,14,20);
	context.fill();

	context.fillStyle = "rgb(187,0,5)";
	context.beginPath();
	context.rect(525,344,57,20);
	context.fill();

	context.fillStyle = "rgb(0,0,0)";
	context.beginPath();
	context.rect(520,344,14,20);
	context.fill();

	//les mains 
	context.fillStyle = 'white';
	context.beginPath();
	context.arc(753,353,11,0,2*Math.PI);
	context.fill();

	context.fillStyle = 'white';
	context.beginPath();
	context.arc(516,353,11,0,2*Math.PI);
	context.fill();

	//corps 
	context.fillStyle = "rgb(187,0,5)";
	context.beginPath();
	context.arc(632,450,86.5,0,2*Math.PI);
	context.fill();

	context.fillStyle = "rgb(187,0,5)";
	context.beginPath();
	context.arc(632,363,65.5,0,2*Math.PI);
	context.fill();

	//ceinture et boutons
	context.fillStyle ='black';
	context.beginPath();
	context.rect(567,386,131,8);
	context.fill();

	context.fillStyle = 'black';
	context.beginPath();
	context.arc(632,355,2,0,2*Math.PI);
	context.fill();

	context.fillStyle = 'black';
	context.beginPath();
	context.arc(632,372,2,0,2*Math.PI);
	context.fill();

	context.fillStyle = 'black';
	context.beginPath();
	context.arc(632,404,2,0,2*Math.PI);
	context.fill();

	context.fillStyle = 'black';
	context.beginPath();
	context.arc(632,421,2,0,2*Math.PI);
	context.fill();

	context.fillStyle = 'black';
	context.beginPath();
	context.arc(632,439,2,0,2*Math.PI);
	context.fill();

	context.fillStyle = 'black';
	context.beginPath();
	context.arc(632,456,2,0,2*Math.PI);
	context.fill();

	//tete
	context.fillStyle = "rgb(255,204,225)";
	context.beginPath();
	context.arc(632,277,43.5,0,2*Math.PI);
	context.fill();

	//bouche 
	context.strokeStyle = 'red';
	context.beginPath();
	context.arc(632,297,5,0,Math.PI*2);
	context.closePath();
	context.stroke();

	//les yeux 
	context.fillStyle = 'black';
	context.beginPath();
	context.arc(648,265,2,0,2*Math.PI);
	context.fill();

	context.fillStyle = 'black';
	context.beginPath();
	context.arc(615,265,2,0,2*Math.PI);
	context.fill();

	//le nez 
	context.fillStyle = 'black';
	context.beginPath();
	context.arc(632,279,2,0,2*Math.PI);
	context.fill();

	//chapeau 
	context.fillStyle = 'black';
	context.beginPath();
	context.rect(595,237,76,8);
	context.fill();

	context.fillStyle="rgb(187,0,5)";
	context.beginPath();
	context.moveTo(632,237);
	context.lineTo(670,237);
	context.lineTo(651,204);
	context.lineTo(632,172);
	context.lineTo(613,204);
	context.lineTo(594,237);
	context.lineTo(632,237);
	context.fill();

	context.fillStyle = 'white'; 
	context.beginPath();
	context.arc(632,171,7,0,2*Math.PI);
	context.fill();

	//////////////NEIGE//////////////
	context.fillStyle = 'white';

	for (var numeroFlocon = 0; numeroFlocon < flocons.length; numeroFlocon = numeroFlocon + 1)
	{
		context.fillRect(flocons[numeroFlocon][0],flocons[numeroFlocon][1],8,8);

		flocons[numeroFlocon][1] = flocons[numeroFlocon][1] + 1;

		if (flocons[numeroFlocon][1] == 600){
			flocons[numeroFlocon][1] = - 5;
		}
	}
	requestAnimationFrame(dessiner);
}
requestAnimationFrame(dessiner);
