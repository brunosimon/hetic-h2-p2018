// Set the canvas, the context and some variables
var canvas    = document.getElementById('canvas'),
	context   = canvas.getContext('2d'),
	mouse     = { x : 0, y : 0 },
	particles = [];

// List to mouse move event
window.onmousemove = function(e)
{
	// Save mouse position
	mouse.x = e.clientX;
	mouse.y = e.clientY;
};

// Update
function update()
{
	// Loop through every particles
	for(var i = 0; i < particles.length; i++)
	{
		var particle = particles[i];

		// Update position
		particle.x += particle.speed.x;
		particle.y += particle.speed.y;

		// Test if out of canvas
		if(particle.x < 0 || particle.y < 0 || particle.x > canvas.width || particle.y > canvas.height)
		{
			// Delete from array using splice
			particles.splice(i,1);
			i--;
		}
	}
}

// Create
function create()
{
	// Create one particle
	var particle = {
		x : mouse.x,
		y : mouse.y,
		r : Math.random() * 5,
		c : 'hsl(' + Math.random() * 360 + ',100%,50%)',
		speed : {
			x : Math.random() * 4 - 2,
			y : Math.random() * 4 - 2
		}
	};

	// Add to particles array
	particles.push(particle);
}

// Draw
function draw()
{
	// Clear the canvas
	context.clearRect(0,0,canvas.width,canvas.height);

	// context.fillStyle = 'rgba(0,0,0,0.1)';
	// context.fillRect(0,0,canvas.width,canvas.height);

	// Loop through every particles
	for(var i = 0; i < particles.length; i++)
	{
		var particle = particles[i];

		// Draw disk
		context.beginPath();
		context.arc(particle.x,particle.y,particle.r,0,Math.PI*2);
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

