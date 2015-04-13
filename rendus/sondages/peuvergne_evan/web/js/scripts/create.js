$(document).ready(function ()
{

	/*
		DOM
	*/


	// INPUTS

	var btn = $('#submit');

	var inputs = {
		name: $('input[name=name]'),
		image: $('input[name=image]'),
		password: $('input[name=password]'),
		description: $('input[name=description]')
	};

	btn.click(function (e)
	{

		e.preventDefault();

		submitSurvey(inputs.name.val(), inputs.image.val(), inputs.image.val(), inputs.password.val());

	});


});



/*
	SUBMIT SURVEY
*/

function submitSurvey (name, image, description, password)
{
	var btn = $('#submit');
	btn.addClass('loading');

	API.post('survey', 
	{
		name : name,
		image : image,
		description : description,
		password: password
	}, 
	function (data)
	{

		btn.removeClass('loading').addClass('success');

		
		/* ADD BUTTON NEXT*/

		var buttonsRow = $('#buttons');
		buttonsRow.append('<a href="edit/' + data.id + '" class="btn btn-next"><span>Continuer</span></a>');
	
	},
	function (data)
	{

		btn.removeClass('loading').addClass('failed');

		switch(data.code)
		{

			default:
				manageErrors(data.validate);
			break;

		}

	});

}



/*
	MANAGE ERRORS
*/

function manageErrors (errors)
{

	for(error in errors)
	{

		var elem = $('input[name=' + error + '], textarea[name=' + error + ']').parent();
		elem.append($('<span class="error">' + errors[error] + '</span>'));
		elem.addClass('failed');

	}

}
