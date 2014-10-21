/* pour la popup */
$('.popup').stop().click(function () {
	$('.popup').fadeOut(400);
});

/* pour changer de danseur */
$('.arrow_right').stop().click(function () {
	$('.dance1').fadeOut(200);
	$('.dance2').fadeIn(200);
	// $('.info1').fadeOut(200);
	// $('.info2').fadeIn(200);
	$( '.info1' ).slideDown( 200 ).fadeOut( 200 );
	$( '.info2' ).slideUp( 200 ).delay( 200 ).fadeIn( 200 );
});

$('.arrow_left').stop().click(function () {
	$('.dance2').fadeOut(200);
	$('.dance1').fadeIn(200);
	// $('.info2').fadeOut(200);
	// $('.info1').fadeIn(200);
	$( '.info2' ).slideDown( 200 ).fadeOut( 200 );
	$( '.info1' ).slideUp( 200 ).delay( 200 ).fadeIn( 200 );
});