console.log("Hello there");

//On récupère le canvas
var c= document.getElementById("canvas"),
	ctx= c.getContext('2d'),
	image= new Image(),
	round=Math.PI*2,
	c_d= 5, //diamètre de cercle.
	count= 0;
	
console.log(c);
console.log(ctx);
console.log(image);

var now= new Date().getTime();
c.addEventListener('mousemove', function(e){
	if(new Date().getTime() - now < 500)
		return;				
});

function getMousePos(c, e){
	//Position du curseur dans le canvas.
	var r= c.getBoundingClientRect();
	return {
		x: e.clientX - r.left,
		y: e.clientY - r.top
	};
}

//Tracer un neurone et une connection (synapse).
c.addEventListener('mousemove', function(e){
	var mousePos= getMousePos(c, e),
		circle= new drawCircle(c, e);
		line= new drawLine(c, e);

	if(110<= mousePos.x && mousePos.x <= 360){
		var x_condition= true;
	}
	else{
		x_condition= false;
	}

	if(140<= mousePos.y && mousePos.y <= 270){
		var y_condition= true;
	}
	else{
		y_condition= false;
	}
	if(x_condition==true && y_condition== true){
		if(typeof line_x!== "undefined" && typeof i!== "undefined" && typeof j!== "undefined"){
			circle.c_x= line_x[i];	
			circle.c_y= line_y[j];
			line.l_x= line_x[i];
			line.l_y= line_y[j];
		}
		else{
			circle.c_x= mousePos.x;
			circle.c_y= mousePos.y;
			line.l_x= mousePos.x;
			line.l_y= mousePos.y;
		}
		around_calcul();
		circle.draw(e);
		line.draw(e);
		count++;
		console.log("count : " + count);
	}else{
		return false;
	}
	if(count >= 100){
		ctx.clearRect(100, 720, 450, 750);
		console.log("On vide.");
	}
}, true);

//Trace un cercle sur position actuelle tant que conditions remplies
function drawCircle(c, e){
	var me= this,
		mousePos= getMousePos(c, e),
		color= parseInt(Math.floor(Math.random()*265)+ 160);
	this.c_x= mousePos.x;
	this.c_y= mousePos.y;
	console.log("c_x = "+me.c_x);
	console.log("c_y = "+me.c_y);
	console.log("c_d = "+c_d);
	this.draw= function(){
		ctx.beginPath();
		ctx.fillStyle= "hsl(" + color + ",100%," + "50%)";
		ctx.arc(me.c_x, me.c_y, c_d,0,round, true);
		ctx.fill();
		ctx.closePath();
	};	
}


//Trace une ligne partant du cercle précédemment tracé sur position actuelle tant que conditions remplies
function drawLine(c, e){
	var me= this;
	this.l_x= me.c_x, //ligne coordonnée x
	this.l_y= me.c_y; //ligne coordonée y
	this.draw= function(){
		around_calcul(this.l_x, this.l_y);
		aleotorus_calculus();
		ctx.beginPath();
		ctx.strokeStyle="#FFFFFF";
		ctx.lineWidth= 2;
		ctx.moveTo(me.l_x, me.l_y);
		ctx.lineTo(line_x[i],line_y[j]);
		ctx.stroke();
		ctx.closePath();
	};
}

//Charge l'image
image.onload = start;

//Source de l'image
image.src="src/absent_minded2.png";

//Desssine l'image
function start(){
	ctx.drawImage(image,0,0,image.width,image.height);
}

//Calcule nombre aléatoire, le retourne.
function aleotorus_calculus(){
	i=parseInt(Math.floor(Math.random()*line_x.length));
	j= parseInt(Math.floor(Math.random()*line_y.length));
	console.log(i);
	return i;
}

//Récupère nombre aléatoire précédemment calculé et choisit la valeur correspondante dans un tableau
/*function selection(i){
	aleotorus_calculus();
	var alea= i,
		error= false;
		console.log(i);
	console.log("alea :" + alea);
	while(error== false){
		for(i= 0; i < line_d.length; i++){
			if(line_d[i]== alea){
				error= true;
			}
			else{
				error= false;
			}
		}
	}
}*/


//Calcule coordonnées autour de position actuelle et les stocke dans des tableaux.
function around_calcul(l_x, l_y){
line_x= [];
line_y= [];
l_x_up1= parseInt(l_x + 10);
if(110<= l_x_up1 && l_x_up1 <= 360){
	line_x.push(l_x_up1);
}
l_x_up2=parseInt(l_x + 15);
if(110<= l_x_up2 && l_x_up2 <= 360){
	line_x.push(l_x_up2);
}
l_x_up3=parseInt(l_x + 20);
if(110<= l_x_up3 && l_x_up3 <= 360){
	line_x.push(l_x_up3);
}
l_y_up1=parseInt(l_y + 10);
if(140 <= l_y_up1 && l_y_up1 <= 270){
	line_y.push(l_y_up1);
}
l_y_up2=parseInt(l_y + 15);
if(140 <= l_y_up2 && l_y_up2 <= 270){
	line_y.push(l_y_up2);
}
l_y_up3=parseInt(l_y + 20);
if(140 <= l_y_up3 && l_y_up3 <= 270){
	line_y.push(l_y_up3);
}	
l_x_down1=parseInt(l_x - 10);
if(110<= l_x_down1 && l_x_down1 <= 360){
	line_x.push(l_x_down1);
}
l_x_down2=parseInt(l_x - 15);
if(110<= l_x_down2 && l_x_down2 <= 360){
	line_x.push(l_x_down2);
}
l_x_down3=parseInt(l_x - 20);
if(110<= l_x_down3 && l_x_down3 <= 360){
	line_x.push(l_x_down3);
}
l_y_down1=parseInt(l_y - 10);
if(140 <= l_y_down1 && l_y_down1 <= 270){
	line_y.push(l_y_down1);
}
l_y_down2=parseInt(l_y - 15);
if(140 <= l_y_down2 && l_y_down2 <= 270){
	line_y.push(l_y_down2);
}
l_y_down3=parseInt(l_y - 10);
if(140 <= l_y_down3 && l_y_down3 <= 270){
	line_y.push(l_y_down3);
}
l_d= 5,
l_d_up1=parseInt(l_d + 1),
l_d_up2=parseInt(l_d + 2),
l_d_up3=parseInt(l_d + 3),
l_d_down1=parseInt(l_d - 1),
l_d_down2=parseInt(l_d - 2),
l_d_down3=parseInt(l_d - 3),
line_d= [l_d, l_d_up1, l_d_up2, l_d_up3, l_d_down1, l_d_down2, l_d_down3];
	

console.log("l_x= " +l_x);
console.log("l_y= " +l_y);
console.log("l_x_up1= " +l_x_up1);
console.log("l_x_up2= " +l_x_up2);
console.log("l_x_up3= " +l_x_up3);
console.log("l_y_up1= " +l_y_up1);
console.log("l_y_up2= " +l_y_up2);
console.log("l_y_up3= " +l_y_up3);
console.log("l_x_down1= " +l_x_down1);
console.log("l_x_down2= " +l_x_down2);
console.log("l_x_down3= " +l_x_down3);
console.log("l_y_down1= " +l_y_down1);
console.log("l_y_down2= " +l_y_down2);
console.log("l_y_down3= " +l_y_down3);
console.log("l_d= " + l_d);
console.log("l_d_up1= " + l_d_up1);
console.log("l_d_up2= " + l_d_up2);
console.log("l_d_up3= " + l_d_up3);
console.log("l_d_down1= " + l_d_down1);
console.log("l_d_down2= " + l_d_down2);
console.log("l_d_down3= " + l_d_down3);
console.log(line_x);
console.log(line_y);
console.log(line_d);
}




/* SOURCES :
http://stackoverflow.com/questions/19966912/drawing-over-an-image-in-html5-canvas-while-preserving-the-image
https://developer.mozilla.org/fr/docs/DOM/element.getBoundingClientRect
http://www.finalclap.com/faq/349-javascript-jquery-this
http://youmightnotneedjquery.com/
http://www.html5canvastutorials.com/advanced/html5-canvas-mouse-coordinates/
	
*/