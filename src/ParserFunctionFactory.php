<?php

namespace Mermaid;

/**
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class ParserFunctionFactory {

	/**
	 * @since  1.0
	 *
	 * @return array
	 */
	public function newMermaidParserFunctionDefinition() {

		$nearbyParserFunctionDefinition = function( $parser ) {

			$mermaidParserFunction = new MermaidParserFunction(
				$parser
			);

			$mermaidParserFunction->setDefaultTheme(
				$GLOBALS['mermaidgDefaultTheme']
			);

			return $mermaidParserFunction->parse( func_get_args() );
		};

		return array( 'mermaid', $nearbyParserFunctionDefinition, 0 );
	}

}
