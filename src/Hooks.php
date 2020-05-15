<?php

namespace Mermaid;

use Parser;
use ParserOutput;
use OutputPage;

/**
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author tylergibson
 */
class Hooks {

	/**
	 * onParserFirstCallInit hook handler.
	 * Registers the <mermaid> tag
	 *
	 * @param Parser $parser
	 * @return bool
	 */
	public static function onParserFirstCallInit( Parser $parser ) {
		$parser->setFunctionHook( 'mermaid', 'Mermaid\\MermaidParserFunction::onParserFunction' );
		return true;
    }

	/**
	 * onOutputPageParserOutput hook handler.
	 *
	 * @param OutputPage $out
     * @param ParserOutput $parserOutput
	 * @return bool
	 */
	public static function onOutputPageParserOutput( OutputPage $out, ParserOutput $parserOutput ) {
        if ( $parserOutput->getExtensionData( 'ext-mermaid' ) !== null &&
            $parserOutput->getExtensionData( 'ext-mermaid' ) === true ) {
            
            $out->addModules( 'ext.mermaid' );
        }
        return true;
    }
}
