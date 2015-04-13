$(document).ready(function ()
{
	

	/*
		INPUTS
	*/

	$('.input').click(function (e)
	{

		e.preventDefault();
		
		$(this).parent().removeClass('failed').find('span.error').remove();
		if(!$(this).hasClass('input-filled'))
		{ 
			$('.input-filled input, .input-filled textarea').each(function (i, el)
			{
				if($(el).val() == ''){ $(el).parent().removeClass('input-filled'); }
			});
			$(this).addClass('input-filled'); 
			$(this).find('input, textarea').focus();
		}

	});

	$('input, textarea').focus(function (e)
	{

		e.preventDefault();

		$(this).parent().removeClass('failed').find('span.error').remove();
		$('.input-filled input, .input-filled textarea').each(function (i, el)
		{
			if($(el).val() == ''){ $(el).parent().removeClass('input-filled'); }
		});
		$(this).parent().addClass('input-filled');

	});

	$('.input-filled input').blur(function (e)
	{

		e.preventDefault();

		if($(this).val() != ""){ $(this).removeClass('input-filled'); }

	});


});