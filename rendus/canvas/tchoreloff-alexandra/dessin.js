/******************************* 
			Koala 
********************************/

function drawKoala(){
	// Back
	context.save();
	context.beginPath();
	context.shadowColor = 'grey'; 
	context.shadowBlur = 5;      
	context.shadowOffsetX = 0;       
	context.shadowOffsetY = 0;       
	context.arc(650,478,104,0.5 * Math.PI,1.5 * Math.PI);
	context.fillStyle = 'grey';
	context.fill();
	context.restore();

	// Belly
	context.save();
	context.beginPath();
	context.shadowColor = '#FEFEE2'; 
	context.shadowBlur = 5;      
	context.shadowOffsetX = 10;       
	context.shadowOffsetY = -5;       
	context.moveTo(650,582)
	context.quadraticCurveTo(740,500,650,375);
	context.fillStyle = '#FEFEE2';
	context.fill();
	context.restore();

	// Arm
	context.save();
	context.beginPath();
	context.shadowColor = 'grey'; 
	context.shadowBlur = 5;      
	context.shadowOffsetX = 0;       
	context.shadowOffsetY = 0;       
	context.rect(635,420,70,25);
	context.fillStyle = 'grey';
	context.fill();
	context.restore();

	// Hand
	context.save();
	context.beginPath();
	context.shadowColor = 'grey'; 
	context.shadowBlur = 5;      
	context.shadowOffsetX = 0;       
	context.shadowOffsetY = 0;       
	context.arc(706,432,12,0,Math.PI * 2);
	context.fillStyle = 'grey';
	context.fill();
	context.restore();

	// Fingers
	context.beginPath();
	context.arc(715,424,2,0,Math.PI * 2);
	context.fillStyle = 'black';
	context.fill();

	context.beginPath();
	context.arc(718,429 ,2,0,Math.PI * 2);
	context.fillStyle = 'black';
	context.fill();

	context.beginPath();
	context.arc(718,436,2,0,Math.PI * 2);
	context.fillStyle = 'black';
	context.fill();

	context.beginPath();
	context.arc(715,441,2,0,Math.PI * 2);
	context.fillStyle = 'black';
	context.fill();

	// Thigh
	context.save();
	context.beginPath();
	context.shadowColor = 'grey'; 
	context.shadowBlur = 5;      
	context.shadowOffsetX = 0;       
	context.arc(648,528,54,1.5 * Math.PI,0.5 * Math.PI);
	context.fillStyle = 'grey';
	context.fill();
	context.restore();

	// Foot
	context.beginPath();
	context.moveTo(703,490);
	context.lineTo(727,511);
	context.lineTo(702,533);
	context.closePath();
	context.lineWidth = 5;
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.strokeStyle = 'grey';
	context.stroke();
	context.fillStyle = 'grey';
	context.fill();

	// Toe
	context.beginPath();
	context.arc(707,485,5,0,Math.PI * 2);
	context.fillStyle = 'black';
	context.fill();

	context.beginPath();
	context.arc(716,492,4,0,Math.PI * 2);
	context.fillStyle = 'black';
	context.fill();

	context.beginPath();
	context.arc(723,499,3,0,Math.PI * 2);
	context.fillStyle = 'black';
	context.fill();

	context.beginPath();
	context.arc(729,505,2,0,Math.PI * 2);
	context.fillStyle = 'black';
	context.fill();

	// Left ear
	context.save();
	context.beginPath();
	context.shadowColor = 'grey'; 
	context.shadowBlur = 10;      
	context.shadowOffsetX = 0;       
	context.shadowOffsetY = 0;       
	context.arc(590, 315, 20, 0, Math.PI * 2);
	context.fillStyle = '#FEFEE2';
	context.fill();
	context.lineWidth = 10;
	context.strokeStyle = 'grey';
	context.stroke();
	context.restore();

	// Right Ear
	context.save();
	context.beginPath();
	context.shadowColor = 'grey'; 
	context.shadowBlur = 10;      
	context.shadowOffsetX = 0;       
	context.shadowOffsetY = 0;       
	context.arc(690, 315, 20, 0, Math.PI * 2);
	context.fillStyle = '#FEFEE2';
	context.fill();
	context.lineWidth = 10;
	context.strokeStyle = 'grey';
	context.stroke();
	context.restore();

	// Head 
	context.save();
	context.beginPath();
	context.shadowColor = 'grey'; 
	context.shadowBlur = 10;      
	context.shadowOffsetX = 0;       
	context.shadowOffsetY = 0;       
	context.arc(640, 345, 52, 0, Math.PI * 2);
	context.fillStyle = 'grey';
	context.fill();
	context.lineWidth = 10;
	context.strokeStyle = 'grey';
	context.stroke();
	context.restore();

	// Eyes
	context.beginPath();
	context.arc(620, 335, 5, 0, Math.PI * 2);
	context.fillStyle = 'black';
	context.fill();

	context.beginPath();
	context.arc(660, 335, 5, 0, Math.PI * 2);
	context.fillStyle = 'black';
	context.fill();

	// Wards
	context.beginPath();
	context.arc(622, 335, 1, 0, Math.PI * 2);
	context.fillStyle = 'white';
	context.fill();

	context.beginPath();
	context.arc(662, 335, 1, 0, Math.PI * 2);
	context.fillStyle = 'white';
	context.fill();

	// Nose
	context.beginPath();
	context.arc(640, 335, 5, 0,Math.PI, true);
	context.strokeStyle = 'black';
	context.stroke();

	context.rect(632,335,16,16);
	context.fillStyle = 'black';
	context.fill();

	// Nostrils
	context.beginPath();
	context.arc(634,351,3,0,Math.PI,true);
	context.fillStyle = 'grey';
	context.fill();

	context.beginPath();
	context.arc(646,351,3,0,Math.PI,true);
	context.fillStyle = 'grey';
	context.fill();

	context.beginPath();
	context.lineWidth = 0.5;
	context.lineTo(640,350);
	context.lineTo(640,365);
	context.stroke();

	// Mouth
	context.beginPath();
	context.lineWidth = 2;
	context.moveTo(655,360)
	context.quadraticCurveTo(640,370,625,360);
	context.lineCap = 'round';
	context.stroke();
}


/****************************
			Décor 
 ****************************/

function drawDecor(){
	// Sun
	context.save();
	context.beginPath();
	context.shadowColor = 'orange';
	context.shadowBlur = 100;       
	context.shadowOffsetX = 0;     
	context.shadowOffsetY = 0;       
	context.arc(1120,70,50,0,Math.PI * 2);
	context.fillStyle = 'yellow';
	context.fill();
	context.restore();

	/* Cloud 1
	context.beginPath();
	context.rect(290,65,80,50);
	context.fillStyle = 'white';
	context.fill();

	context.beginPath();
	context.arc(290,90,25,0,Math.PI * 2);
	context.fillStyle = 'white';
	context.fill();

	context.beginPath();
	context.arc(300,65,20,0,Math.PI * 2);
	context.fillStyle = 'white';
	context.fill();

	context.beginPath();
	context.arc(345,65,30,0,Math.PI * 2);
	context.fillStyle = 'white';
	context.fill();

	context.beginPath();
	context.arc(372,85,30,0,Math.PI * 2);
	context.fillStyle = 'white';
	context.fill(); */

	// Cloud 2
	context.beginPath();
	context.rect(840,80,80,50);
	context.fillStyle = 'white';
	context.fill();

	context.beginPath();
	context.arc(840,105,25,0,Math.PI * 2);
	context.fillStyle = 'white';
	context.fill();

	context.beginPath();
	context.arc(850,80,20,0,Math.PI * 2);
	context.fillStyle = 'white';
	context.fill();

	context.beginPath();
	context.arc(895,80,30,0,Math.PI * 2);
	context.fillStyle = 'white';
	context.fill();

	context.beginPath();
	context.arc(922,100,30,0,Math.PI * 2);
	context.fillStyle = 'white';
	context.fill();

	// Hills
	context.beginPath();
	context.arc(80,1040,500,0,Math.PI * 2);
	context.fillStyle = 'green';
	context.fill();

	context.beginPath();
	context.arc(1100,1040,500,0,Math.PI * 2);
	context.fillStyle = 'green';
	context.fill();

	context.beginPath();
	context.arc(600,1240,700,0,Math.PI * 2);
	context.fillStyle = 'lightgreen';
	context.fill();

	// Tree
	context.beginPath();
	context.rect(650,0,120,600);
	context.fillStyle = '#8B6C42';
	context.fill();

	// Branch
	context.beginPath();
	context.moveTo(110,140);
	context.lineTo(140,140);
	context.lineTo(660,590); 
	context.lineTo(690,720); 
	context.fillStyle = '#8B6C42';
	context.fill();

	// Leaf
	context.beginPath();
	context.rect(110,120,195,195);
	context.fillStyle = 'green';
	context.fill();

	context.beginPath();
	context.arc(115,100,48,0,Math.PI * 2);
	context.fillStyle = 'green';
	context.fill();

	context.beginPath();
	context.arc(210,110,60,0,Math.PI * 2);
	context.fillStyle = 'green';
	context.fill();

	context.beginPath();
	context.arc(290,112,40,0,Math.PI * 2);
	context.fillStyle = 'green';
	context.fill();

	context.beginPath();
	context.arc(315,170,55,0,Math.PI * 2);
	context.fillStyle = 'green';
	context.fill();

	context.beginPath();
	context.arc(340,260,60,0,Math.PI * 2);
	context.fillStyle = 'green';
	context.fill();

	context.beginPath();
	context.arc(280,340,45,0,Math.PI * 2);
	context.fillStyle = 'green';
	context.fill();

	context.beginPath();
	context.arc(200,280,75,0,Math.PI * 2);
	context.fillStyle = 'green';
	context.fill();

	context.beginPath();
	context.arc(115,300,40,0,Math.PI * 2);
	context.fillStyle = 'green';
	context.fill();

	context.beginPath();
	context.arc(120,230,50,0,Math.PI * 2);
	context.fillStyle = 'green';
	context.fill();

	context.beginPath();
	context.arc(100,160,30,0,Math.PI * 2);
	context.fillStyle = 'green';
	context.fill();
}


/************************** 
			Sky
 **************************/
function drawSky(){

	context.beginPath();
	context.rect(0,0,canvas.width,canvas.height);
	context.fillStyle = 'skyblue';
	context.fill();
}


/************************ 
	Clouds Animation
 ***********************/

function drawMoveCloud(){
	coords.x += 4;
    if(coords.x > canvas.width + 50)
        coords.x = -50;
    
    context.beginPath();
    context.rect(coords.x-1,coords.y-25,80,50);
    context.arc(coords.x,coords.y,25,0,Math.PI * 2);
    context.arc(coords.x+10,coords.y-25,25,0,Math.PI * 2);
    context.arc(coords.x+55,coords.y-25,30,0,Math.PI * 2);
    context.arc(coords.x+88,coords.y-5,30,0,Math.PI * 2);
    context.fillStyle = 'white';
    context.fill();
}