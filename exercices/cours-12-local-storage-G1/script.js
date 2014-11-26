var moto = {
	color : 'black',
	speed : 3,
	accelerate : function()
	{
		this.speed += 1;
	}
};

localStorage.moto = JSON.stringify(moto);