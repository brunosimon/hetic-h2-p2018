$(document).ready(function ()
{


	$('.btn-submit-vote').click(function (e)
	{

		e.preventDefault();

		var proposal_id = $(this).attr('data-proposal');

		API.post('vote', 
		{
			proposal_id: proposal_id
		}, 
		function (data)
		{

			// CHANGE LAYOUT

			$('main').removeClass('voting').addClass('voted');


			// UPDATE GRAPHICS

			var height = $('.proposal').height();
			for(i in data.proposals)
			{

				var proposal = data.proposals[i];
				var percentage = (proposal.votes/data.votes)*100;
				var offset = height - (proposal.votes/data.votes)*height;
				
				$('.proposal:nth-child(' + (parseInt(i)+1) + ') .filter .vote').css('height', percentage + '%');

			}

		
		},
		function (data)
		{

			console.log(data);

		});

	});


});