// Set variables
var $search = $( 'input.search' ),
	$result = $( '.result' ),
	ajax    = null;

// Search keyup event
$search.on( 'keyup', function()
{
	// Retrieve value
	var value = $search.val();
	value = $.trim( value );

	// Abort ajax if necessary
	if( ajax )
		ajax.abort();

	// Ajax request
	ajax = $.ajax( {
		url      : 'https://graph.facebook.com/',
		data     : 'id=' + value,
		dataType : 'json',

		// Success function
		success  : function( res )
		{
			var result = res.name + ' (' + res.id + ')<br><img src="http://graph.facebook.com/' + value + '/picture?type=large" />';

			$result.html( result );
			$result.removeClass( 'error' );
		},

		// Error function
		error : function()
		{
			$result.html( 'error' );
			$result.addClass( 'error' );
		}
	} );
} );