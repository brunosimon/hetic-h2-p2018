	


	/*
		DEBUG
	*/

	var debug = 0;
	var debug = 1;
	
	/*
		API CALL
	*/


	var API = {

		post: function (route, params, success, error)
		{
			ajax('POST', route, params, success, error);
		}

	};


	function ajax (type, route, params, success, error)
	{

		$.ajax(
		{
			type: type,
			url: $('meta[property=root]').attr('content') + 'api/request.php',
			// dataType: 'jsonp',
			data: 
			{
				route: route,
				params: params
			},
			success: function (data)
			{
				if(debug)
				{
					console.log('success');
					console.log(data);
				}
				if(success) { success(data); }
			},
			error: function (data)
			{
				if(debug)
				{
					console.log('error');
					console.log(data);
				}
				if(error) { error(JSON.parse(data.responseText)); }
			} 
		});

	}