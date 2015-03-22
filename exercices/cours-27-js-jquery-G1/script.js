var search = $( '.search' ),
	result = $( '.result' ),
	ajax   = null;

// Listen to keyup event
search.on( 'keyup', function()
{
	// Get and trim value
	var value = search.val();
	value     = $.trim( value );

	// Abort ajax
	if( ajax )
		ajax.abort();

	// Ajax call
	ajax = $.ajax( {
		url      : 'https://graph.facebook.com?id=' + value,
		dataType : 'json',

		// Ajax worked
		success  : function( res )
		{
			var infos = res.name;

			// Add to DOM
			result.html( infos );

			ajax = null;
		},

		// Ajax didn't work
		error : function()
		{
			// console.log( 'error' );
			ajax = null;
		}
	} );
} );