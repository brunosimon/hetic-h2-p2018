var canvas = document.querySelector('.locker'),
	context = canvas.getContext('2d');

// Left white: fbfbfb
// Right grey: dadada

/// ---- Locker ---- ///

// Face left
context.beginPath();
context.moveTo(100, 200);
context.lineTo(200, 200);
context.lineTo(200, 350);
context.lineTo(100, 350);

context.fillStyle = '#f1ac37';
context.fill();
context.closePath();


// Face right
context.beginPath();
context.moveTo(200, 200);
context.lineTo(300, 200);
context.lineTo(300, 350);
context.lineTo(200, 350);

context.fillStyle = '#e6960d';
context.fill();
context.closePath();

//Round
context.beginPath();
context.arc(200, 257, 20, 0, 2*Math.PI, false);
context.fillStyle = '#bf7d0c';
context.fill();

//Base
context.beginPath();
context.moveTo(190, 270);
context.lineTo(210, 270);
context.lineTo(210, 300);
context.lineTo(190, 300);

context.fillStyle = '#bf7d0c';
context.fill();
context.closePath();

context.beginPath();
context.arc(200, 300, 10, 0, 2*Math.PI, false);
context.fillStyle = '#bf7d0c';
context.fill();

// Arc Left
context.beginPath();
context.moveTo(130, 200);
context.lineTo(130, 160);
context.bezierCurveTo(130,80,200,80,200,80);
context.lineTo(200, 100);
context.bezierCurveTo(150, 110,150, 140, 150, 200);

context.closePath();
context.fillStyle = '#fbfbfb';
context.fill();

// Arc Right
context.beginPath();
context.moveTo(270, 200);
context.lineTo(270, 160);
context.bezierCurveTo(270,80,200,80,200,80);
context.lineTo(200, 100);
context.bezierCurveTo(250, 110,250, 140, 250, 200);

context.closePath();
context.fillStyle = '#dadada';
context.fill();





