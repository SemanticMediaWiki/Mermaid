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

	mw.loader.using( [ 'mediawiki.api', 'ext.mermaid', 'ext.mermaid.theme.' + config.theme ] ).then( function () {

	$( document ).ready( function() {

		$( '.ext-mermaid' ).each( function() {

			var that = $( this );
			var id = $( this ).attr( 'id' ) + '-diagram';

			var config = $( this ).data( 'config' );
			var diagram = $( this ).data( 'diagram' );

			that.find( '.mermaid-dots' ).hide();
			that.append( '<div id=' + id + '> ' + diagram + ' </div>' );

			mermaid.initialize( config );
			mermaid.init( undefined, $( "#" + id ) );
		} );
	} );
} );

}( jQuery, mediaWiki ) );
