var canvas    = document.getElementById('canvas'),
	context   = canvas.getContext('2d'),
	mouse     = {x:0,y:0},
	particles = [];

// Mouse move event
window.onmousemove = function(e)
{
	mouse.x = e.clientX;
	mouse.y = e.clientY;
};

// Update
function update()
{
	for( var i = 0; i < particles.length; i++ )
	{
		var particle = particles[i];
		particle.x += particle.speed.x;
		particle.y += particle.speed.y;

		if(particle.x + particle.r > 800 || particle.x - particle.r < 0)
			particle.speed.x *= -1;

		if(particle.y + particle.r > 800 || particle.y - particle.r < 0)
			particle.speed.y *= -1;
	}
}

// Create
function create()
{
	var particle = {
		x : mouse.x,
		y : mouse.y,
		c : 'hsl(' + Math.random() * 360 + ',100%,50%)',
		r : Math.ceil(Math.random() * 10),
		speed :
		{
			x : Math.random() * 10 - 5,
			y : Math.random() * 10 - 5
		}
	};

	particles.push(particle);
}

// Draw
function draw()
{
	context.clearRect(0,0,800,800);
	for( var i = 0; i < particles.length; i++ )
	{
		var particle = particles[i];
		context.beginPath();
		context.arc(
			particle.x,
			particle.y,
			particle.r,
			0,
			Math.PI * 2
		);
		context.fillStyle = particle.c;
		context.fill();
	}
}

// Loop
function loop()
{
	window.requestAnimationFrame(loop);

	update();
	create();
	draw();
}
loop();





