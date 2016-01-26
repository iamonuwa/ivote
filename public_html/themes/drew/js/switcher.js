;(function( $ ) {
	"use strict";

	if ( window.location.search.indexOf( 'demo-without-preloader' ) > 0 ) {
		console.log('oi');
		$( 'body' ).removeClass( 'enable-preloader' );
	}

	$( document ).on( 'ready', function() {

		var $demo = $( '<section>' );

		$demo.attr( 'id', 'demo-custom' );
		$( 'body' ).append( $demo );

		$demo.load( 'index.php #demo-custom > *', function() {

			var $switcher = $demo.find( '#demo-switcher' );
			
			$switcher.show();

			$( 'body' ).on( 'click', '#demo-switcher-toggle', function( e ) {
				e.preventDefault();
				$switcher.toggleClass( 'active' );
			});

			// URL
			var segments = window.location.pathname.split( '/' );
			$( '#demo-switcher-layout' ).val( segments[ segments.length - 1 ] );
			$( '#demo-switcher-layout' ).on( 'change', function() {
				var url = $( this ).val();
				window.location.href = url;
			});

			// Color
			$( 'input[name="demo_color"]' ).on( 'click', function() {
				var url = $( this ).val();
				$( '#color-css' ).attr( 'href', url );
			});

			// Preloader
			if ( window.location.search.indexOf( 'demo-without-preloader' ) < 0 ) {
				$( '#demo-preloader' ).attr( 'checked', 'checked' );
				$( '#demo-preloader' ).val( window.location.href + '?demo-without-preloader' );
			} else {
				$( '#demo-preloader' ).val( window.location.origin + window.location.pathname );
			}
			$( '#demo-preloader' ).on( 'change', function() {
				var url = $( this ).val();
				window.location.href = url;
			});
			
		});

	});

})( jQuery );