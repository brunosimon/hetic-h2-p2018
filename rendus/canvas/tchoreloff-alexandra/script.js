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

var canvas  = document.getElementById('canvas'),
        context = canvas.getContext('2d');


/************************************************* 

         Draw decor + koala + animation

**************************************************/




var coords = {x:0,y:200};
context.save();

function loop()
{
    requestAnimationFrame(loop);

    context.clearRect(0,0,canvas.width,canvas.height);

    drawSky();
    drawMoveCloud();
    drawDecor();
    drawKoala();


}loop();