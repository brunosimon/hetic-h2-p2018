var Slider = function(options)
{
	this.options = options;

	this.init();
};

Slider.prototype =
{
	init : function()
	{
		this.$           = {};
		this.$.main      = this.options.target;
		this.$.left      = this.$.main.find('a.left');
		this.$.right     = this.$.main.find('a.right');
		this.$.container = this.$.main.find('.container');
		this.$.slides    = this.$.container.find('.slide');

		this.index = 0;

		var that = this;

		this.$.right.on('click',function()
		{
			that.go_to(that.index + 1);

			return false;
		});

		this.$.left.on('click',function()
		{
			that.go_to(that.index - 1);

			return false;
		});
	},

	go_to : function(index)
	{
		if(index > this.$.slides.length - 1)
			index = this.$.slides.length - 1;
		else if(index < 0)
			index = 0;

		this.$.container[0].style.webkitTransform = 'translateX(' + ( - index * 320 ) + 'px)';
		this.$.container[0].style.mozTransform    = 'translateX(' + ( - index * 320 ) + 'px)';
		this.$.container[0].style.oTransform      = 'translateX(' + ( - index * 320 ) + 'px)';
		this.$.container[0].style.transform       = 'translateX(' + ( - index * 320 ) + 'px)';

		this.index = index;
	}
};

var slider_1 = new Slider({target:$('.slider.uno')}),
	slider_2 = new Slider({target:$('.slider.secondo')});