<?php

namespace Mermaid;

use Parser;
use Html;

/**
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class MermaidParserFunction {

	/**
	 * @var Parser
	 */
	private $parser;

	/**
	 * @var string
	 */
	private $defaultTheme = '';

	/**
	 * @since 1.1
	 *
	 * @param string $defaultTheme
	 *
	 * @return callable
	 */
	public static function newCallback( $defaultTheme ) {

		return function( $parser ) use ( $defaultTheme ) {
			$mermaidParserFunction = new self(
				$parser
			);

			$mermaidParserFunction->setDefaultTheme(
				$defaultTheme
			);

			return $mermaidParserFunction->parse( func_get_args() );
		};
	}

	/**
	 * @since  1.0
	 *
	 * @return Parser $parser
	 */
	public function __construct( Parser $parser ) {
		$this->parser = $parser;
	}

	/**
	 * @since  1.0
	 *
	 * @param string $defaultTheme
	 */
	public function setDefaultTheme( $defaultTheme ) {
		$this->defaultTheme = $defaultTheme;
	}

	/**
	 * @since  1.0
	 *
	 * @param array $params
	 *
	 * @return string
	 */
	public function parse( array $params ) {

		$class = 'ext-mermaid';
		$parserOutput = $this->parser->getOutput();

		if( isset( $params[0] ) && $params[0] instanceof \Parser ) {
			array_shift( $params );
		}

		// Signal the OutputPageParserOutput hook
		$parserOutput->setExtensionData(
			'ext-mermaid',
			true
		);

		$parserOutput->addModuleStyles(
			'ext.mermaid.styles'
		);

		$parserOutput->addModules(
			'ext.mermaid'
		);

		$config = [
			'theme' => $this->defaultTheme
		];

		foreach ( $params as $key => $param ) {

			if ( strpos( $param, '=' ) !== false ) {
				list( $k, $v ) = explode( '=', $param, 2 );

				if ( $k === 'config.theme' ) {
					$config['theme'] = $v;
					unset( $params[$key] );
				}

				if ( $k === 'config.flowchart.curve' ) {
					$config['flowchart'] = [ 'curve' => $v ];
					unset( $params[$key] );
				}
			}
		}

		$content = implode( "|", $params );

		return Html::rawElement(
			'div',
			[
				'class' => $class,
				'data-mermaid' => json_encode(
					[
						'content' => $content,
						'config'  => $config
					]
				)
			],
			Html::rawElement(
				'div',
				[
					'class' => 'mermaid-dots',
				]
			)
		);
	}

}
