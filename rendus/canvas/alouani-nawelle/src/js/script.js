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

//canvas
var canvas  = document.getElementById('canvas'),
        context = canvas.getContext('2d');


//drops
var drops = [ 
	[50,-5], 
	[150,-105],	
	[50,-205],	
	[150,-305],	
	[50,-405],	
	[150,-505], 
	[250,-5], 
	[350,-105],	
	[250,-205],	
	[350,-305],	
	[250,-405],	
	[350,-505], 
	[450,-5],	
	[550,-105],	
	[450,-205], 
	[550,-305],	
	[450,-405],	
	[550,-505], 
	[650,-5], 
	[750,-105],	
	[650,-205],	
	[750,-305],	
	[650,-405],	
	[750,-505],
	[850,-5],	
	[950,-105],
	[850,-205],
	[950,-305],
	[850,-405],
	[950,-505],
	[1050,-5],	
	[1150,-105],
	[1050,-205],
	[1150,-305],
	[1050,-405],
	[1150,-505],
	[1250,-5],	
	[1350,-105],
	[1250,-205],
	[1350,-305],

];

function loop()
{
    window.requestAnimationFrame(loop);


	context.save();
	context.clearRect(0,0,canvas.width,canvas.height);


	
	//circle head
	context.save();
	context.beginPath();
	context.fillStyle="#8d8375";
	context.arc(600,190,100,0,Math.PI,true);
	context.fill();
	context.restore();

	//hears
	context.save();
	context.beginPath();
	context.fillStyle="#8d8375";
	context.moveTo(550,103);
	context.lineTo(550,85); 
	context.lineTo(540,83);
	context.lineTo(550,30);
	context.lineTo(570,81);
	context.lineTo(560,85);
	context.lineTo(560,98);
	context.closePath();
	context.fill();

	context.beginPath();
	context.moveTo(640,98);
	context.lineTo(640,85); 
	context.lineTo(630,81);
	context.lineTo(645,30);
	context.lineTo(660,83);
	context.lineTo(650,86);
	context.lineTo(650,103);
	context.closePath();
	context.fill();
	context.restore();

	//eyes
	context.beginPath();
	context.fillStyle="white";
	context.arc(560,150,15,0,2 * Math.PI,true);
	context.fill();
	context.beginPath();
	context.fillStyle="white";
	context.arc(640,150,15,0,2 * Math.PI,true);
	context.fill();

	//pupils
	context.save();
	context.beginPath();
	context.fillStyle="black";
	context.arc(560,150,5,0,2 * Math.PI,true);
	context.fill();
	context.beginPath();
	context.arc(640,150,5,0,2 * Math.PI,true);
	context.fill();
	context.restore();

	//nose
	context.save();
	context.beginPath();
	context.moveTo(580,170);
	context.lineTo(620,170); 
	context.lineTo(600,180);
	context.fillStyle="#3e3a24";
	context.strokeStyle="#3e3a24";
	context.lineJoin = 'round';
	context.lineWidth="2"
	context.closePath();
	context.stroke();
	context.fill();
	context.restore();

	//left arm
	context.save();
	context.beginPath();
	context.moveTo(500,190);
	context.quadraticCurveTo(
	    320, 
	    360, 
	    432, 
	    440);
	context.lineTo(768,440);
	context.fillStyle="#8d8375";
	context.fill();

	//right arm
	context.beginPath();
	context.moveTo(700,190);
	context.quadraticCurveTo(
	    880, 
	    360,
	    768, 
	    440);
	context.lineTo(432,440);
	context.lineTo(500,190);
	context.closePath();
	context.fill();
	context.restore();

	//left mustache
	context.save(); 
	context.beginPath();
	context.fillStyle="black";
	context.strokeStyle="black";
	context.lineCap= 'round';
	context.moveTo(450,150);
	context.lineTo(550,180); 
	context.fill();
	context.stroke();

	context.beginPath();
	context.moveTo(450,190);
	context.lineTo(550,190); 
	context.fill();
	context.stroke();

	context.beginPath();
	context.moveTo(450,230);
	context.lineTo(550,200); 
	context.fill();
	context.stroke();

	//right mustache 
	context.beginPath();
	context.moveTo(650,180);
	context.lineTo(740,150); 
	context.fill();
	context.stroke();

	context.beginPath();
	context.moveTo(650,190);
	context.lineTo(740,190); 
	context.fill();
	context.stroke();

	context.beginPath();
	context.moveTo(650,200);
	context.lineTo(740,230); 
	context.fill();
	context.stroke();
	context.restore();

	//tail
	context.save();
	context.beginPath();
	context.moveTo(670,593);
	context.bezierCurveTo(
	    720, 
	    700,
	    480,
	    700,
	    530, 
	    591);
	context.lineTo(600,590);
	context.fillStyle="#8d8375";
	context.closePath();
	context.fill();
	context.restore();

	//tree
	context.save();
	context.beginPath();
	context.moveTo(0,540);
	context.lineTo(710,540);
	context.lineTo(800,540);
	context.lineTo(1000,550);
	context.lineTo(750,570);
	context.lineTo(840,600);
	context.lineTo(600,590);
	context.lineTo(0,600);
	context.fillStyle="#966111";
	context.strokeStyle="#966111" 
	context.fill();
	context.stroke();
	context.restore();

	// circle body
	context.save();
	context.beginPath();
	context.arc(600,410,170,0,2 * Math.PI,false);
	context.fillStyle="#e7dda0";
	context.fill();
	context.restore();

	//stains
	//first line
	context.save();
	context.beginPath();
	context.moveTo(500,310);
	context.lineTo(520,290);
	context.lineTo(540,310);
	context.lineTo(520,300);
	context.closePath();
	context.fillStyle="#8d8375";
	context.strokeStyle="#8d8375";
	context.lineJoin = 'round';
	context.stroke();
	context.fill();

	context.beginPath();
	context.moveTo(580,290);
	context.lineTo(600,270);
	context.lineTo(620,290);
	context.lineTo(600,280);
	context.closePath();
	context.stroke();
	context.fill();

	context.beginPath();
	context.moveTo(660,310);
	context.lineTo(680,290);
	context.lineTo(700,310);
	context.lineTo(680,300);
	context.closePath();
	context.stroke();
	context.fill();

	//second line
	context.beginPath();
	context.moveTo(470,350);
	context.lineTo(490,330);
	context.lineTo(510,350);
	context.lineTo(490,340);
	context.closePath();
	context.stroke();
	context.fill();

	context.beginPath();
	context.moveTo(550,330);
	context.lineTo(570,310);
	context.lineTo(590,330);
	context.lineTo(570,320);
	context.closePath();
	context.stroke();
	context.fill();

	context.beginPath();
	context.moveTo(610,330);
	context.lineTo(630,310);
	context.lineTo(650,330);
	context.lineTo(630,320);
	context.closePath();
	context.stroke();
	context.fill();

	context.beginPath();
	context.moveTo(690,350);
	context.lineTo(710,330);
	context.lineTo(730,350);
	context.lineTo(710,340);
	context.closePath();
	context.stroke();
	context.fill();
	context.restore();

	//leaf tree
	context.save(); 
	context.beginPath();
	context.arc(0,50,100,0,2 * Math.PI,false);
	context.fillStyle="#3ba53d";
	context.fill();

	context.beginPath();
	context.arc(70,180,170,0,2 * Math.PI,false);
	context.fill();

	context.beginPath();
	context.arc(150,290,170,0,2 * Math.PI,false);
	context.fill();

	context.beginPath();
	context.arc(170,480,100,0,2 * Math.PI,false);
	context.fill();

	context.beginPath();
	context.arc(100,500,80,0,2 * Math.PI,false);
	context.fill();

	context.beginPath();
	context.arc(30,480,100,0,2 * Math.PI,false);
	context.fill();
	context.restore();


	context.save(); 
	context.beginPath();
	context.arc(0,70,90,0,2 * Math.PI,false);
	context.fillStyle="#175e18";
	context.fill();

	context.beginPath();
	context.arc(70,200,100,0,2 * Math.PI,false);
	context.fill();

	context.beginPath();
	context.arc(150,300,90,0,2 * Math.PI,false);
	context.fill();

	context.beginPath();
	context.arc(150,420,90,0,2 * Math.PI,false);
	context.fill();

	context.beginPath();
	context.arc(50,420,90,0,2 * Math.PI,false);
	context.fill();

	context.beginPath();
	context.arc(30,320,90,0,2 * Math.PI,false);
	context.fill();

	context.beginPath();
	context.arc(50,460,90,0,2 * Math.PI,false);
	context.fill();

	context.beginPath();
	context.arc(20,520,70,0,2 * Math.PI,false);
	context.fill();
	context.restore();

	//title
	context.save();
	var image = new Image();
	image.onload = function()
	{
	    context.drawImage(image,800,100,image.width / 1,image.height / 1);
	};
	image.src = 'src/img/textTotoro.png';
	context.restore();

	
	context.fillStyle = '#9ba4c5';

	for (var numeroDrop = 0; 
		numeroDrop < drops.length; 
		numeroDrop = numeroDrop + 1) 
		{ 
			context.fillRect(
				drops[numeroDrop][0], 
				drops[numeroDrop][1],8,8); 

			drops[numeroDrop][1] = drops[numeroDrop][1] + 1; 
		if (
				drops[numeroDrop][1] == 600){ 
				drops[numeroDrop][1] = - 5;
				} 
		}
	context.restore();

} 
loop();

