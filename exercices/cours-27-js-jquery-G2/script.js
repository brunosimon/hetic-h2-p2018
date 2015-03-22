var search = $( '.search' ),
	result = $( '.result' ),
	ajax   = null;

// Listen to search keyup event
search.on( 'keyup', function()
{
	// Retrieve and trim value
	var value = search.val();
	value     = $.trim( value );

	// Abort current ajax request
	if( ajax )
		ajax.abort();

	// Ajax
	ajax = $.ajax( {
		url      : 'https://graph.facebook.com/?id=' + value,
		dataType : 'json',
		success  : function( res )
		{
			var infos = res.name + '<img src="http://graph.facebook.com/' + value + '/picture?type=large">';
			result.html( infos );

			ajax = null;
		},
		error : function()
		{
			console.log( 'error' );
			ajax = null;
		}
	} );
} );