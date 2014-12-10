

var canvas = document.getElementById("pong");


canvas.width = Width;
canvas.height = Height;
canvas.setAttribute('tabindex', 1);

var context = canvas.getContext("2d");
var FPS = 1000 / 60;
var BG = {
    Color: '#333',
    Paint: function(){
        ctx.fillStyle = this.Color;
        ctx.fillRect(0, 0, Width, Height);
    }
};
var Ball = {
    Radius: 5,
    Color: '#999',
    X: 0,
    Y: 0,
    VelX: 0,
    VelY: 0
};
var position = 'left';

window.requestAnimFrame = (function(){
    return window.requestAnimationFrame
    || window.webkitRequestAnimationFrame
    || window.mozRequestAnimationFrame
    || window.oRequestAnimationFrame
    || window.msRequestAnimationFrame
    || function( callback ){ return window.setTimeout(callback, FPS); }; }
)();



Paint= function (){
    context.beginPath();
    context.fillStyle = this.Color;
    context.arc(this.X, this.Y, this.Radius, 0, Math.PI * 2, false);
    context.fill();
    this.Update();
}


Update= function(){
    this.X += this.VelX;
    this.Y += this.VelY;
}


Reset= function(){
    this.X = Width/2;
    this.Y = Height/2;
    this.VelX = (!!Math.round(Math.random() * 1) ? 1.5 : -1.5);
    this.VelY = (!!Math.round(Math.random() * 1) ? 1.5 : -1.5);
}



// Paddle

function Paddle(position){
	this.Color = '#999';
this.Width = 5;
this.Height = 100;
this.X = 0;
this.Y = Height/2 - this.Height/2;
this.Score = 0;

if(position == 'left'){
    this.X = 0;
}
else {
	this.X = Width - this.Width;
}


this.Paint = function(){
    contextfillStyle = this.Color;
    context.fillRect(this.X, this.Y, this.Width, this.Height);
    context.fillStyle = this.Color;
    context.font = "normal 10pt Calibri";
    if(position == 'left'){
       context.textAlign = "left";
        context.fillText("score: " + Player.Score, 10, 10);
    }
    else{
        context.textAlign = "right";
        context.fillText("score: " + Computer.Score, Width - 10, 10);
    }
};

// Collisions

this.IsCollision = function () {
    return false;
};

var Computer = new Paddle();
var Player = new Paddle('left');




function Paint(){
    context.beginPath();
    BG.Paint();
    Computer.Paint();
    Player.Paint();
    Ball.Paint();
}


function MouseMove(e){
    Player.Y = e.pageY - Player.Height/2;
    canvas.addEventListener("mousemove", MouseMove, true); 
}


function Loop(){
    init = requestAnimFrame(Loop);
    Paint();
	}
    if(Player.IsCollision() || Computer.IsCollision()){
	console.log(Player);
    Ball.VelX = Ball.VelX * -1;
    Ball.VelX += (Ball.VelX > 0 ? 0.5 : -0.5 );
	}
    if(Math.abs(Ball.VelX) > Ball.Radius * 1.5){
        Ball.VelX = (Ball.VelX > 0 ? Ball.Radius * 1.5 : Ball.Radius * -1.5);
    }


if(Ball.Y - Ball.Radius < 0 || Ball.Y + Ball.Radius > Height){
    Ball.VelY = Ball.VelY * -1;
}


if(Ball.X - Ball.Radius <= 0){
    Computer.Score++;
    Ball.reset();
}
else if(Ball.X + Ball.Radius > Width){
    Player.Score++;
    Ball.reset();
}


if(Computer.Score === 10){
    GameOver(false);
}
else if(Player.Score === 10){
    GameOver(true);
}




function GameOver(win){
    cancelRequestAnimFrame(init);
    BG.Paint();
    context.fillStyle = "#999";
    context.font = "bold 40px Calibri";
    context.textAlign = "center";
    context.fillText((win ? "VOUS AVEZ GAGNE" : "GAME OVER"), Width/2, Height/2);
    context.font = "normal 16px Calibri";
}


function NewGame(){
    Ball.Reset();
    Player.Score = 0;
    Computer.Score = 0;
    Computer.Vel = 1.25;
    Loop();
}



