( function( $ ) {

	$( ".toggle-bio" ).click(function() {
  		$( ".bio" ).toggle( "blind", 450 );
  		$( ".toggle-bio" ).toggleClass( "bio-open" ).toggleClass( "bio-closed");
	});

} )( jQuery );