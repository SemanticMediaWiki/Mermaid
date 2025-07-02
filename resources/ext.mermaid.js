/*!
 * @file
 * @ingroup SMW
 *
 * @licence GNU GPL v2+
 * @author mwjames
 */

/*global jQuery, mediaWiki, smw */
/*jslint white: true */

( function( $, mw ) {

	'use strict';

	var config = mw.config.get( 'mermaid' );
	mw.loader.using( [ 'mediawiki.api', 'ext.mermaid' ] ).then( function () {

		$( document ).ready( function() {
			// Fallback: ensure mermaid is globally available (for newer builds)
			if ( typeof mermaid === 'undefined' && typeof window.mermaid !== 'undefined' ) {
				window.mermaid = window.mermaid;
			} else if ( typeof mermaid === 'undefined' ) {
				console.error( '[Mermaid] Global "mermaid" object not found.' );
				return;
			}

			$( '.ext-mermaid' ).each( function() {

				var that = $( this );
				var id = 'ext-mermaid-' + ( new Date().getTime() );
				var data = that.data( 'mermaid' );

				that.find( '.mermaid-dots' ).hide();
				that.append( '<div id="' + id + '"> ' + data.content + ' </div>' );

				try {
					mermaid.initialize( data.config || {} );
					mermaid.init( undefined, $( "#" + id )[0] );
				} catch (e) {
					console.error( '[Mermaid] Failed to render diagram:', e );
				}
			} );
		} );
	} );

}( jQuery, mediaWiki ) );
