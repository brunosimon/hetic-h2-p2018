$(document).ready(function ()
{


	/* 
		PROPOSAL
	*/

	var issue = $('.new-issue');

	var issueTitle = issue.find('input[name=title]');

	var survey_id = $('input[name=survey_id]').val();

	var proposals = new Array();
	proposals[0] = {};
	proposals[0].elem = $('.new-issue .proposal:first-child');
	proposals[0].name = proposals[0].elem.find('input[name=proposal-1-name]');
	proposals[0].image = proposals[0].elem.find('input[name=proposal-1-image]');


	/*
		ADD PROPOSAL
	*/

	$('#btn-add-proposal').click(function (e)
	{

		e.preventDefault();

		var i = proposals.length;
		proposals[i] = {};
		proposals[i].elem = $('<div class="proposal"><div class="row"><div class="proposal-number col col-1"><span>' + proposals.length + '</span></div><div class="input col col-5"><input type="text" name="proposal-' + (i+1) + '-name"><label for="name">Intitulé</label></div><div class="input col col-6"><input type="text" name="proposal-' + (i+1) + '-image"><label for="image">Image (url)</label></div></div></div>');
		proposals[i].name = proposals[i].elem.find('input[name=proposal-' + (i+1) + '-name]');
		proposals[i].image = proposals[i].elem.find('input[name=proposal-' + (i+1) + '-image]');


		// EVENTS

		proposals[i].elem.find('.input').click(function (e)
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

		proposals[i].elem.find('input, textarea').focus(function (e)
		{

			e.preventDefault();

			$(this).parent().removeClass('failed').find('span.error').remove();
			$('.input-filled input, .input-filled textarea').each(function (i, el)
			{
				if($(el).val() == ''){ $(el).parent().removeClass('input-filled'); }
			});
			$(this).parent().addClass('input-filled');

		});

		proposals[i].elem.find('.input-filled input').blur(function (e)
		{

			e.preventDefault();

			if($(this).val() != ""){ $(this).removeClass('input-filled'); }

		});
		
		// APPEND

		$('.new-proposals').append(proposals[i].elem);

	});


	/*
		SUBMIT ISSUES
	*/

	$('#btn-add-issue').click(function (e)
	{

		e.preventDefault();

		var proposalsValues = new Array();
		for(i in proposals)
		{
			proposalsValues[i] = {};
			proposalsValues[i].name = proposals[i].name.val();
			proposalsValues[i].image = proposals[i].image.val();
		}

		
		submitIssue(issueTitle.val(), survey_id, proposalsValues);

	});


});


/*
	SUBMIT PROPOSAL
*/

function submitIssue (title, survey_id, proposals)
{

	var btn = $('#btn-add-issue');
	btn.addClass('loading');

	API.post('issue', 
	{
		title : title,
		survey_id: survey_id,
		proposals: proposals
	}, 
	function (data)
	{
		
		// console.log(data);

		btn.removeClass('loading').addClass('success');

		addIssue(data.issue, data.proposals);

		$('input').val('');
		$('.new-proposals .proposal:not(:first-child)').remove();
		$('#btn-add-issue').removeClass('loading').removeClass('success');
		proposals = new Array();
		proposals[0] = {};
		proposals[0].elem = $('.new-issue .proposal:first-child');
		proposals[0].name = proposals[0].elem.find('input[name=proposal-1-name]');
		proposals[0].image = proposals[0].elem.find('input[name=proposal-1-image]');
		console.log(proposals);
	
	},
	function (data)
	{

		console.log(data);
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
	ADD ISSUE TO LIST
*/


function addIssue (issue, proposals)
{

	var elem = $('<div class="issue"><h3>Question ' + $('.issue').length + '</h3><h2>' + issue.title + '</h2><div class="proposals row"></div></div>');
	for(proposal in proposals)
	{
		var data = proposals[proposal];
		var proposalElem = $('<div class="f-col" style="background-image:url(\'' + data.image + '\')"><h4>' + data.name + '</h4></div>');
		elem.find('.proposals').append(proposalElem);
	}

	$('.issues').append(elem);

}



/*
	MANAGE ERROS
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