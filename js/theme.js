$(document).foundation();

( function( $ ) {

	$( ".toggle-bio" ).click(function() {
  		$( ".bio" ).toggle( "blind", 350 );
  		$( ".toggle-bio" ).toggleClass( "bio-open" ).toggleClass( "bio-closed");
	});

	$("input[type=submit]").before( $('<span class="button round clearfix">') );
	$("input[type=submit]").before( $('</span>') );

} )( jQuery );