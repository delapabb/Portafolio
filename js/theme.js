$(document).foundation();

( function( $ ) {

	$( ".toggle-bio" ).click(function() {
  		$( ".bio" ).toggle( "blind", 350 );
  		$( ".toggle-bio" ).toggleClass( "bio-open" ).toggleClass( "bio-closed");
	});

} )( jQuery );