/* Compatible avec tous les navigateurs */
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

// - - - - - - - - - - -  Début - - - - - - - - - - - - - - //

var canvas = document.getElementById('canvas'),
    context = canvas.getContext('2d'),
    width   = 400,
    speed   = 5;


    function loop1() // Permet l'animation de la première forme
    {
        window.requestAnimationFrame(loop1);

        context.clearRect(0,0,400,600);

        width += speed;

        if(width > 1280  || width < 0)
            speed *= -1;

        // Forme Sunflower 

        context.beginPath();
        context.moveTo(640,300); 
        context.lineTo(750,120);
        context.lineTo(845,275);
        context.lineTo(815,275);
        context.lineTo(750,170);
        context.lineTo(655,320);
        context.closePath();

        // Style Sunflower

        context.strokeStyle = '#f1c40f'
        context.fillStyle   = '#f1c40f'
        context.fill();
        context.stroke();

        context.clearRect(0,0,width,600);
    }




function loop2() // Permet l'animation de la deuxième forme
{
    window.requestAnimationFrame(loop2);

    context.clearRect(0,0,400,600);

    width += speed;

    if(width > 1280  || width < 0)
        speed *= -1;

        // Forme Orange

        context.beginPath();
        context.moveTo(750,120);
        context.lineTo(845,275);
        context.lineTo(720,275);
        context.lineTo(705,295);
        context.lineTo(890,295);
        context.lineTo(775,120);
        context.closePath();

        // Style Orange

        context.strokeStyle = '#f39c12'
        context.fillStyle   = '#f39c12'
        context.fill();
        context.stroke();

        context.clearRect(0,0,width,600);
}



function loop3() // Permet l'animation de la troisième forme
{
    window.requestAnimationFrame(loop3);

    context.clearRect(0,0,400,600);

    width += speed;

    if(width > 1280  || width < 0)
        speed *= -1;

        // Forme Carrot

        context.beginPath();
        context.moveTo(750,170);
        context.lineTo(655,320);
        context.lineTo(875,320);
        context.lineTo(890,295);
        context.lineTo(705,295);
        context.lineTo(720,275);
        context.lineTo(770,200);
        context.closePath();

         // Style Carrot

        context.strokeStyle = '#e67e22'
        context.fillStyle   = '#e67e22'
        context.fill();
        context.stroke();


        context.clearRect(0,0,width,600);
}















