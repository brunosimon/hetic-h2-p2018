var moto_1 = {
	color : 'black',
	speed : 0,
	accelerate : function()
	{
		this.speed += 1;
	}
};

localStorage.moto_1 = JSON.stringify(moto_1);