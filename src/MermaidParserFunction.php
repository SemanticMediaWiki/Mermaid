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

		// #12 Improve entropy by adding a random number
		$id = uniqid( 'ext-mermaid-' . rand( 1, 10000 ) );


		if( isset( $params[0] ) && $params[0] instanceof \Parser ) {
			array_shift( $params );
		}

		// Signal the OutputPageParserOutput hook
		$this->parser->getOutput()->setExtensionData(
			'ext-mermaid',
			true
		);

		$this->parser->getOutput()->addModuleStyles(
			'ext.mermaid.styles'
		);

		$this->parser->getOutput()->addModules(
			'ext.mermaid'
		);

		$config = [
			'theme' => $this->defaultTheme
		];

		foreach ( $params as $param ) {
			if ( strpos( $param, '=' ) !== false ) {
				list( $k, $v ) = explode( '=', $param, 2 );

				if ( $k === 'theme' ) {
					$config['theme'] = $v;
				}
			}
		}

		$content = isset( $params[0] ) ? $params[0] : '';

		return Html::rawElement(
			'div',
			[
				'id' => $id,
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
