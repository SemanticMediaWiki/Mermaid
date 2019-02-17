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

			var id = 'ext-mermaid-' + ( new Date().getTime() );
			var data = that.data( 'mermaid' );

			that.find( '.mermaid-dots' ).hide();
			that.append( '<div id=' + id + '> ' + data.content + ' </div>' );

			mermaid.initialize( data.config );
			mermaid.init( undefined, $( "#" + id ) );
		} );
	} );
} );

}( jQuery, mediaWiki ) );
