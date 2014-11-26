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

var canvas  = document.getElementById('canvas'),
    context = canvas.getContext('2d');

context.lineWidth = 3;

var coords1 = 82,
    speed1  = 3,

    coords2 = 260,
    speed2  = 3,

    coords3 = {
        x : 682,
        y : 260
    },
    speed3 = {
        x : 2,
        y : 2
    };

function loop(){
    window.requestAnimationFrame(loop);
    context.clearRect(0,0,900,600);

    coords1 += speed1;

    coords2 += speed2;

    coords3.x += speed3.x;
    coords3.y += speed3.x;

    //FONDS
    context.beginPath();
    context.fillStyle = '#c31717';
    context.fillRect(0,0,300,600);

    context.beginPath();
    context.fillStyle = '#1f9f00';
    context.fillRect(300,0,300,600);

    context.beginPath();
    context.fillStyle = '#df6800';
    context.fillRect(600,0,300,600);

    if (coords1 > 300 - 165 || coords1 < 15) {
        speed1 *= -1;
    }

    //ROUGE
    context.beginPath();
    context.fillStyle = '#c00000';
    context.arc(coords1+75,265,90,0,Math.PI,true);
    context.fill();
    context.stroke();

    //POIS
    context.fillStyle = '#FFF';

    context.beginPath();
    context.arc(coords1+75,255,30,0,Math.PI*2,true);
    context.fill();
    context.stroke();

    context.beginPath();
    context.arc(coords1+58,195,10,Math.PI*2,false);
    context.fill();
    context.stroke();

    context.beginPath();
    context.arc(coords1+123,220,12,Math.PI*2,false);
    context.fill();
    context.stroke();

    context.beginPath();
    context.arc(coords1+18,230,15,Math.PI*2,false);
    context.fill();
    context.stroke();

    context.beginPath();
    context.arc(coords1+148,250,7,Math.PI*2,false);
    context.fill();
    context.stroke();

    context.beginPath();
    context.fillRect(coords1,260,150,75);
    context.strokeRect(coords1,260,150,75);

    //YEUX
    context.fillStyle = '#000';

    context.beginPath();
    context.arc(coords1+58,280,7,Math.PI*2,false);
    context.fill();

    context.beginPath();
    context.arc(coords1+88,280,7,Math.PI*2,false);
    context.fill();

    if (coords2 > 600-80 || coords2 < 80) {
        speed2 *= -1;
    }

    //VERT
    context.beginPath();
    context.fillStyle = '#1f9f00';
    context.arc(457,coords2+5,90,0,Math.PI,true);
    context.fill();
    context.stroke();

    //POIS
    context.fillStyle = '#FFF';
    context.beginPath();
    context.arc(457,coords2-5,30,0,Math.PI*2,true);
    context.fill();
    context.stroke();

    context.beginPath();
    context.arc(440,coords2-70,10,Math.PI*2,false);
    context.fill();
    context.stroke();

    context.beginPath();
    context.arc(505,coords2-40,12,Math.PI*2,false);
    context.fill();
    context.stroke();

    context.beginPath();
    context.arc(400,coords2-30,15,Math.PI*2,false);
    context.fill();
    context.stroke();

    context.beginPath();
    context.arc(530,coords2-10,7,Math.PI*2,false);
    context.fill();
    context.stroke();

    //RECTANGLE
    context.beginPath();
    context.strokeStyle = '#000';
    context.fillRect(382,coords2,150,75);
    context.strokeRect(382,coords2,150,75);
    context.stroke();

    //YEUX
    context.fillStyle = '#000';

    context.beginPath();
    context.arc(440,coords2+20,7,Math.PI*2,false);
    context.fill();

    context.beginPath();
    context.arc(470,coords2+20,7,Math.PI*2,false);
    context.fill();

    if (coords3.x > 900-165 || coords3.x < 615) {
        speed3.x *= -1;
    }

    if (coords3.y > 600 - 80 || coords3.y < 80) {
        speed3.y *= -1;
    }

    //ORANGE
    context.beginPath();
    context.fillStyle = '#df6800';
    context.arc(coords3.x+75,coords3.y+5,90,0,Math.PI,true);
    context.fill();
    context.stroke();

    //POIS
    context.fillStyle = "#FFF";

    context.beginPath();
    context.arc(coords3.x+75,coords3.y-5,30,0,Math.PI*2,true);
    context.fill();
    context.stroke();

    context.beginPath();
    context.arc(coords3.x+58,coords3.y-65,10,Math.PI*2,false);
    context.fill();
    context.stroke();

    context.beginPath();
    context.arc(coords3.x+123,coords3.y-40,12,Math.PI*2,false);
    context.fill();
    context.stroke();

    context.beginPath();
    context.arc(coords3.x+18,coords3.y-30,15,Math.PI*2,false);
    context.fill();
    context.stroke();

    context.beginPath();
    context.arc(coords3.x+148,coords3.y-10,7,Math.PI*2,false);
    context.fill();
    context.stroke();

    //RECTANGLE
    context.beginPath();
    context.strokeStyle = '#000';
    context.fillRect(coords3.x,coords3.y,150,75);
    context.strokeRect(coords3.x,coords3.y,150,75);
    context.stroke();


    //YEUX
    context.fillStyle = '#000';

    context.beginPath();
    context.arc(coords3.x+58,coords3.y+20,7,Math.PI*2,false);
    context.fill();

    context.beginPath();
    context.arc(coords3.x+88,coords3.y+20,7,Math.PI*2,false);
    context.fill();
}

loop();