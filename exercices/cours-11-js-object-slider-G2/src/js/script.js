var Slider = function(options)
{
	this.init(options);
};

Slider.prototype =
{
	init : function(options)
	{
		this.main        = options.target;
		this.arrow_left  = this.main.find('.arrow.left');
		this.arrow_right = this.main.find('.arrow.right');
		this.container   = this.main.find('.container');
		this.slides      = this.container.find('.slide');

		this.index = 0;

		var that = this;

		this.arrow_left.on('click',function()
		{
			that.go_to(that.index - 1);
			return false;
		});

		this.arrow_right.on('click',function()
		{
			that.go_to(that.index + 1);
			return false;
		});
	},

	go_to : function(index)
	{
		if(index < 0)
			index = this.slides.length - 1;
		else if(index > this.slides.length - 1)
			index = 0;

		this.container[0].style.webkitTransform = 'translateX(' + ( - 320 * index ) + 'px)';
		this.container[0].style.mozTransform    = 'translateX(' + ( - 320 * index ) + 'px)';
		this.container[0].style.oTransform      = 'translateX(' + ( - 320 * index ) + 'px)';
		this.container[0].style.transform       = 'translateX(' + ( - 320 * index ) + 'px)';

		this.index = index;
	}
};

var slider_1 = new Slider({ target : $('.slider-1') }),
	slider_2 = new Slider({ target : $('.slider-2') });