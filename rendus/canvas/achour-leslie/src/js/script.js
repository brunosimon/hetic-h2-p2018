var canvas  	   = document.getElementById('canvas'),
    context 	   = canvas.getContext('2d'),
    brownColor     = document.querySelector('.brown_color'),
    blueColor      = document.querySelector('.blue_color'),
    greenColor     = document.querySelector('.green_color'),
    eyeStrokeColor = "#7e8c9b",
    eyeFillColor   = "#8c98a6",
    mouthBool      = false;


// Dessine tout le canvas sauf les élements modifiables (yeux et bouche)
var totalDraw = function() {

	context.beginPath();
	context.moveTo(250,0);
	context.arc(370, 270, 250, 0,Math.PI);
	context.rect(120,0,499,290);
	context.fillStyle = '#ead0c3'; 
	context.fill();



	//Socle des yeux
	context.beginPath();
	context.moveTo(190,120);
	context.quadraticCurveTo(250,50, 340, 120);
	context.lineTo(200,120);
	context.lineTo(200,120);
	context.lineWidth = 20;
	context.strokeStyle = '#ffffff';
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = '#ffffff'; 
	context.closePath();
	context.stroke();
	context.fill();

	context.beginPath();
	context.moveTo(190,120);
	context.quadraticCurveTo(250,180, 340, 120);
	context.lineTo(200,120);
	context.lineTo(200,120);
	context.lineWidth = 20;
	context.strokeStyle = '#ffffff';
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = '#ffffff'; 
	context.closePath();
	context.stroke();
	context.fill();


	context.beginPath();
	context.moveTo(560,120);
	context.quadraticCurveTo(475,50, 410, 120);
	context.lineTo(530,120);
	context.lineWidth = 20;
	context.strokeStyle = '#ffffff';
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = '#ffffff'; 
	context.closePath()
	context.stroke();
	context.fill();

	context.beginPath();
	context.moveTo(560,120);
	context.quadraticCurveTo(475,180, 410, 120);
	context.lineTo(560,120);
	context.lineWidth = 20;
	context.strokeStyle = '#ffffff';
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = '#ffffff'; 
	context.closePath();
	context.stroke();
	context.fill();



	//nez
	context.beginPath();
	context.moveTo(370,200); // X et Y du point de départ
	context.quadraticCurveTo(500, 300, 350, 300);
	context.lineWidth = 5;
	context.lineCap = 'butt';
	context.lineJoin = 'mitter';
	context.strokeStyle = "#dfc0b0";
	context.stroke();


	//Moustache
	context.beginPath();
	context.moveTo(380,340);
	context.quadraticCurveTo(400,280, 560, 350);
	context.lineWidth = 4;
	context.strokeStyle = '#8a7a6a';
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = '#8a7a6a';
	context.closePath();
	context.stroke();
	context.fill();

	context.beginPath();
	context.moveTo(380,340);
	context.quadraticCurveTo(360,280, 200, 350);
	context.lineWidth = 4;
	context.strokeStyle = '#8a7a6a';
	context.lineCap = 'round';
	context.lineJoin = 'round'; 
	context.fillStyle = '#8a7a6a';
	context.closePath();
	context.stroke();
	context.fill();


	//Sourcils
	context.beginPath();
	context.moveTo(380,60);
	context.quadraticCurveTo(420,30, 580, 80);
	context.lineWidth = 4;
	context.strokeStyle = '#8a7a6a';
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = '#8a7a6a';
	context.closePath();
	context.stroke();
	context.fill();

	context.beginPath();
	context.moveTo(380,60);
	context.quadraticCurveTo(340,30, 180, 80);
	context.lineWidth = 4;
	context.strokeStyle = '#8a7a6a';
	context.lineCap = 'round';
	context.lineJoin = 'round'; 
	context.fillStyle = '#8a7a6a';
	context.closePath();
	context.stroke();
	context.fill();



	//Cheveux
	context.beginPath();
	context.moveTo(200,0);
	context.quadraticCurveTo(230,150, 380, 0);
	context.lineWidth = 8;
	context.strokeStyle = '#7d6b5a';
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = '#8a7a6a'; 
	context.closePath();
	context.stroke();
	context.fill();

	context.beginPath();
	context.moveTo(400,0);
	context.quadraticCurveTo(300,150, 370, 0);
	context.lineWidth = 8;
	context.strokeStyle = '#7d6b5a';
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = '#8a7a6a'; 
	context.closePath();
	context.stroke();
	context.fill();

	context.beginPath();
	context.moveTo(500,0);
	context.quadraticCurveTo(360,150, 400, 0);
	context.lineWidth = 8;
	context.strokeStyle = '#7d6b5a';
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = '#8a7a6a'; 
	context.closePath();
	context.stroke();
	context.fill();
}

// Dessine une bouche normale
var mouthDraw = function() {
//Bouche
	context.beginPath();
	context.moveTo(280,370);
	context.quadraticCurveTo(360,420, 480, 370);
	context.lineWidth = 4;
	context.strokeStyle = '#d58e83';
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = '#d58e83'; 
	context.closePath();
	context.stroke();
	context.fill();

	context.beginPath();
	context.moveTo(280,370);
	context.quadraticCurveTo(310,340, 380, 370);
	context.lineWidth = 4;
	context.strokeStyle = '#d58e83';
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = '#d58e83'; 
	context.closePath();
	context.stroke();
	context.fill();

	context.beginPath();
	context.moveTo(480,370);
	context.quadraticCurveTo(430,340, 380, 370);
	context.lineWidth = 4;
	context.strokeStyle = '#d58e83';
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = '#d58e83'; 
	context.closePath();
	context.stroke();
	context.fill();
}

// lance le dessin complet (base + bouche + yeux) du canvas
totalDraw();
mouthDraw();
eyeColor();


// Couleurs des yeux
//Bouton yeux bleus :
blueColor.onclick = function()
{
	eyeStrokeColor = "#7e8c9b";
    eyeFillColor   = "#8c98a6";
	eyeColor();
};

//Bouton yeux marrons : 
brownColor.onclick = function()
{
	eyeStrokeColor = "#58392b";
    eyeFillColor   = "#634334";
	eyeColor();
};


//Bouton yeux verts : 
greenColor.onclick = function()
{
	eyeFillColor = "#82866b";
	eyeStrokeColor = "#777b5e";
	eyeColor();
};


// Lance la fonction pour dessiner les yeux, la couleur changeant en fonction
// des variables eyeFillColor et eyeStrokeColor qui stockent les codes hexadécimaux
function eyeColor() 
{
	context.beginPath();
	context.moveTo(260,120);
	context.arc(260, 118, 39, 0,2*Math.PI);
	context.lineWidth = 7;
	context.strokeStyle = eyeStrokeColor;
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = eyeFillColor; 
	context.closePath();
	context.stroke();
	context.fill();



	context.beginPath();
	context.moveTo(480,120);
	context.arc(480, 118, 39, 0,2*Math.PI);
	context.lineWidth = 7;
	context.strokeStyle = eyeStrokeColor;
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = eyeFillColor; 
	context.closePath();
	context.stroke();
	context.fill();


	// Pupilles
	context.beginPath();
	context.moveTo(260,120);
	context.arc(260, 118, 29, 0,2*Math.PI);
	context.fillStyle = '#000000'; 
	context.closePath();
	context.fill();


	context.beginPath();
	context.moveTo(480,120);
	context.arc(480, 118, 29, 0,2*Math.PI);
	context.fillStyle = '#000000'; 
	context.closePath();
	context.fill();

	//Ronds blancs
	context.beginPath();
	context.arc(285, 110, 10, 0,2*Math.PI);
	context.fillStyle = '#ffffff'; 
	context.closePath();
	context.fill();


	context.beginPath();
	context.arc(505, 110, 10, 0,2*Math.PI);
	context.fillStyle = '#ffffff'; 
	context.closePath();
	context.fill();
}

// Dessine une bouche tordue
var mouthBentDraw = function () 
{
	context.beginPath();
	context.moveTo(280,400);
	context.quadraticCurveTo(420,490, 480, 390);
	context.lineWidth = 4;
	context.strokeStyle = '#d58e83';
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = '#d58e83'; 
	context.closePath();
	context.stroke();
	context.fill();

	context.beginPath();
	context.moveTo(280,400);
	context.quadraticCurveTo(290,340, 400, 370);
	context.lineWidth = 4;
	context.strokeStyle = '#d58e83';
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = '#d58e83'; 
	context.closePath();
	context.stroke();
	context.fill();

	context.beginPath();
	context.moveTo(390,370);
	context.quadraticCurveTo(450,330, 480, 390);
	context.lineWidth = 4;
	context.strokeStyle = '#d58e83';
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.fillStyle = '#d58e83'; 
	context.closePath();
	context.stroke();
	context.fill();
}

// Ecoute si la souris passe sur la bouche, et dessine une bouche tordue ou non en fonction
canvas.addEventListener("mousemove", function (e)
{ 
    var x = e.offsetX; 
    var y = e.offsetY;
    if((x > 270 && x < 480) && (y > 340 && y < 400)) 
    {
    	context.clearRect(0,0,800,600);
    	totalDraw();
		mouthBentDraw();
		eyeColor();
		mouthBool = true;
    }
    if((x < 270 || x > 480) && (y < 340 || y > 400) && mouthBool == true)
    {
    	mouthBool = false;
    	context.clearRect(0,0,800,600);
    	totalDraw();
		mouthDraw();
		eyeColor();
    }
})
