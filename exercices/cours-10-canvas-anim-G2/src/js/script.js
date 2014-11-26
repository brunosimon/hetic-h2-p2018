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

// Create
function create()
{
	var particle = {
		x : mouse.x,
		y : mouse.y,
		r : Math.ceil(Math.random() * 10),
		c : 'hsl(' + Math.random() * 360 + ',100%,50%)',
		speed :
		{
			x : Math.random() * 20 - 10,
			y : Math.random() * 20 - 10
		}
	};

	particles.push(particle);
}

// Update
function update()
{
	for(var i = 0; i < particles.length; i++)
	{
		var particle = particles[i];
		particle.x += particle.speed.x;
		particle.y += particle.speed.y;

		if(particle.x < 0 + particle.r || particle.x > canvas.width - particle.r)
			particle.speed.x *= -1;

		if(particle.y < 0 + particle.r || particle.y > canvas.height - particle.r)
			particle.speed.y *= -1;
	}
}

// Draw
function draw()
{
	context.clearRect(0,0,canvas.width,canvas.height);

	for(var i = 0; i < particles.length; i++)
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

	create();
	update();
	draw();
}
loop();
