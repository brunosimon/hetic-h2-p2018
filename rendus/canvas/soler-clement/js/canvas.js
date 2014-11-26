//______________________/GEOMETRY CANVAS HELPER - Clément Soler/

/*Bonsoir,
je voulais rendre quelque chose sur le canvas car le cours était sympa du coup
j'ai fait l'exercice aujourd'hui et étant donné l'heure je n'ai pas le temps de faire
la fonction copy to clipboard.
Bonne soirée :) */
                                                                                  
var canvas        = document.getElementById('canvas'),
	  draw        = canvas.getContext('2d');

//_________________________________________________ SKY

var gradient      = draw.createLinearGradient(1200,100,400,1200);

gradient.addColorStop(0,  '#1F0E3D');  
gradient.addColorStop(0.5,'#3D0A3E');   
gradient.addColorStop(1,  '#1F0E3D'); 
draw.fillStyle    = gradient;  
draw.fillRect(0, 0, 1200, 800);

//________________________________________________ CLOUD

draw.beginPath();//rect move(+48,+2)______ TOP
draw.rect(990, 60, 50, 12);
draw.fillStyle = 'rgb(255,255,255)';
draw.fill();
draw.closePath();
      
draw.beginPath();//round right move(-48,0) --> proportions à respecter pour déplacer mes nuages
draw.arc(1038, 62, 10, 0, 2 * Math.PI, false);
draw.fillStyle = 'rgb(255,255,255)';
draw.fill();
draw.closePath();

draw.beginPath();//round left move(+16,-10)
draw.arc(990, 62, 10, 0, 2 * Math.PI, false);
draw.fillStyle = 'rgb(255,255,255)';
draw.fill();
draw.closePath();

draw.beginPath();//round left2 move(+16,+7)
draw.arc(1006, 52, 12, 0, 2 * Math.PI, false);
draw.fillStyle = 'rgb(255,255,255)';
draw.fill();
draw.closePath();

draw.beginPath();//round right 2
draw.arc(1022, 59, 7, 0, 2 * Math.PI, false);
draw.fillStyle = 'rgb(255,255,255)';
draw.fill();
draw.closePath();

draw.beginPath();//rect move(+48,+2)______ LEFT
draw.rect(920, 153,50, 12);
draw.fillStyle = 'rgb(255,255,255)';
draw.fill();
draw.closePath();
      
draw.beginPath();//round right move(-48,0)
draw.arc(968,155, 10, 0, 2 * Math.PI, false);
draw.fillStyle = 'rgb(255,255,255)';
draw.fill();
draw.closePath();

draw.beginPath();//round left move(+16,-10)
draw.arc(920,155, 10, 0, 2 * Math.PI, false);
draw.fillStyle = 'rgb(255,255,255)';
draw.fill();
draw.closePath();

draw.beginPath();//round left2 move(+16,+7)
draw.arc(936,145, 12, 0, 2 * Math.PI, false);
draw.fillStyle = 'rgb(255,255,255)';
draw.fill();
draw.closePath();

draw.beginPath();//round right 2
draw.arc(952,152, 7, 0, 2 * Math.PI, false);
draw.fillStyle = 'rgb(255,255,255)';
draw.fill();
draw.closePath();

draw.beginPath();//rect move(+48,+2)______ RIGHT
draw.rect(1090, 170,50, 12);
draw.fillStyle = 'rgb(255,255,255)';
draw.fill();
draw.closePath();
      
draw.beginPath();//round right move(-48,0)
draw.arc(1138, 172, 10, 0, 2 * Math.PI, false);
draw.fillStyle = 'rgb(255,255,255)';
draw.fill();
draw.closePath();

draw.beginPath();//round left move(+16,-10)
draw.arc(1090, 172, 10, 0, 2 * Math.PI, false);
draw.fillStyle = 'rgb(255,255,255)';
draw.fill();
draw.closePath();

draw.beginPath();//round left2 move(+16,+7)
draw.arc(1106, 162, 12, 0, 2 * Math.PI, false);
draw.fillStyle = 'rgb(255,255,255)';
draw.fill();
draw.closePath();

draw.beginPath();//round right 2
draw.arc(1122, 169, 7, 0, 2 * Math.PI, false);
draw.fillStyle = 'rgb(255,255,255)';
draw.fill();
draw.closePath();

//__________________________________________________ DRAW

draw.beginPath(); //________________________ Left Planet
draw.arc(180,720, 250, 0, Math.PI, true);
draw.lineWidth = 5;
draw.fillStyle = '#EE3F21';
draw.fill();
draw.closePath();

draw.save();//____________________ SHADOW SPACESHIP ALIEN
draw.scale(2, 1);
draw.beginPath();
draw.arc(60, 545, 45, 0, 2 * Math.PI, false);
draw.restore();
draw.fillStyle = '#D23624';
draw.fill();

draw.save();//___________________________ SPACESHIP ALIEN
draw.translate(70, 530);
draw.rotate(Math.PI / -4);
draw.fillStyle = '#7f8c8d';
draw.fillRect(50 / -2, 10 / -2, 50, 10);
draw.restore();

draw.save();
draw.translate(170, 530);
draw.rotate(Math.PI / 4);
draw.fillStyle = '#7f8c8d';
draw.fillRect(50 / -2, 10 / -2, 50, 10);
draw.restore();

draw.save();
draw.scale(2, 1);
draw.beginPath();
draw.arc(60, 500, 40, 0, 2 * Math.PI, false);
draw.restore();
draw.fillStyle = '#ecf0f1';
draw.fill();

draw.save();
draw.scale(2, 1);
draw.beginPath();
draw.arc(60, 490, 40, 0, 2 * Math.PI, false);
draw.restore();
draw.fillStyle = '#bdc3c7';
draw.fill();

draw.beginPath();
draw.arc(120, 480, 50, 0, Math.PI, true);
draw.closePath();
draw.lineWidth = 5;
draw.fillStyle = '#ecf0f1';
draw.fill();

draw.save();
draw.scale(2, 1);
draw.beginPath();
draw.arc(60, 480, 25, 0, 2 * Math.PI, false);
draw.restore();
draw.fillStyle = '#ecf0f1';
draw.fill();//_______________________ END SPACESHIP ALIEN

draw.save();//______________________________ SHADOW ALIEN
draw.scale(2, 1);
draw.beginPath();
draw.arc(137, 550, 15, 0, 2 * Math.PI, false);
draw.restore();
draw.fillStyle = '#D23624';
draw.fill();

draw.beginPath();//__________________________ START ALIEN
draw.rect(255, 480, 40, 50);
draw.fillStyle = '#09A89E';
draw.fill();
draw.closePath();

draw.beginPath();//___________________________ HEAD ALIEN
draw.arc(275, 480, 20, 0, Math.PI, true);
draw.fillStyle = '#09A89E';
draw.fill();
draw.closePath();

draw.beginPath();//____________________________ EYE ALIEN
draw.arc(280, 480, 10, 0, 2 * Math.PI, false);
draw.fillStyle = 'white';
draw.fill();
draw.closePath();

draw.beginPath();//________________________ EYEBALL ALIEN
draw.arc(280, 480, 5, 0, 2 * Math.PI, false);
draw.fillStyle = 'black';
draw.fill();
draw.closePath();

draw.beginPath();//________________________ LEFT LEG ALIEN
draw.moveTo(265, 510);
draw.lineTo(265, 540);
draw.lineWidth = 10;
draw.strokeStyle = '#09A89E';
draw.lineCap = 'round';
draw.stroke();
draw.closePath();

draw.beginPath();//_______________________ RIGHT LEG ALIEN
draw.moveTo(285, 510);
draw.lineTo(285, 540);
draw.lineWidth = 10;
draw.strokeStyle = '#09A89E';
draw.lineCap = 'round';
draw.stroke();
draw.closePath();

draw.beginPath();//_____________________________ ARM ALIEN
draw.arc(275, 470, 40, 0, Math.PI, false);
draw.lineWidth = 10;
draw.lineCap = 'round';
draw.strokeStyle = '#09A89E';
draw.stroke();

draw.beginPath();//__________________________ Right Planet
draw.arc(1050, 300, 40, 0, 2 * Math.PI, false);
draw.fillStyle = '#09A89E';
draw.fill();
draw.closePath();

draw.beginPath();//___________________________ START HOUSE
draw.rect(1030, 230, 40, 40);
draw.fillStyle = 'white';
draw.fill();

draw.beginPath();//_____________________________ TOP HOUSE
draw.arc(1050, 225, 20, 0, Math.PI, true);
draw.closePath();
draw.lineWidth = 5;
draw.fillStyle = 'white';
draw.fill();

draw.beginPath();//____________________________ DOOR HOUSE
draw.rect(1042, 245, 15, 25);
draw.fillStyle = '#322753';
draw.fill();

draw.save();//______________________ START TELESCOPE HOUSE
draw.translate(1035,205);
draw.rotate(Math.PI / 4);
draw.fillStyle = 'white';
draw.fillRect(13 / -2, 10 / -2, 13, 10);
draw.restore();

draw.save();
draw.translate(1026,196);
draw.rotate(Math.PI / 4);
draw.fillStyle = 'white';
draw.fillRect(15 / -2, 15 / -2, 15, 15);
draw.restore();

draw.save(); 
draw.translate(1016,186);
draw.rotate(Math.PI / 4);
draw.fillStyle = 'white';
draw.fillRect(15 / -2, 20 / -2, 15, 20);
draw.restore();//_____________________ END TELESCOPE HOUSE

draw.beginPath();
draw.arc(1050, 215, 5, 0, 2 * Math.PI, false);
draw.fillStyle = '#322753';
draw.fill();
draw.closePath();//_____________________________ END HOUSE

draw.save();//________________________________ SHADOW FLAG
draw.scale(2, 1);
draw.beginPath();
draw.arc(110, 502, 7, 0, 2 * Math.PI, false);
draw.restore();
draw.fillStyle = '#D23624';
draw.fill();

draw.beginPath();//__________________________________ FLAG
draw.rect(216, 300, 5, 200);
draw.fillStyle = '#2c3e50';
draw.fill();
draw.closePath();

draw.save();
draw.beginPath();
draw.rect(221, 300, 100, 50);
draw.fillStyle = 'rgba(255,255,255,0.3)';
draw.globalAlpha = 0.5;
draw.fill();
draw.closePath();
draw.restore();

var text = 'HELP';
draw.font = '22px Arial';
draw.textAlign = 'center';
draw.textBaseline = 'top';
draw.fillStyle = '#3498db';
draw.fillText(text,272,312);//___________________ END FLAG


//___________________ FAKE COPY TO CLIPBOARD :)

function copied(){
	document.getElementById('popin').style.display="block";
	window.setTimeout(del,1000);
}
function del(){
	document.getElementById('popin').style.display="none";
}



