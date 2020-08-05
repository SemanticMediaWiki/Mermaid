<?php

namespace Mermaid;

use Parser;
use Html;
use MediaWiki\MediaWikiServices;

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
	 * @since  1.0
	 *
	 * @return Parser $parser
	 */
	public function __construct( Parser $parser ) {
		$this->parser = $parser;
	}

	/**
	 * @since 1.1
	 *
	 * @return callable
	 */
	public static function onParserFunction( Parser $parser) {
		$function = new self( $parser );
		return $function->parse( $parser );
		// return Html::rawElement(
		// 	'div',
		// 	[
		// 		'class' => "foo",
		// 		'data-mermaid' => json_encode(
		// 			[
		// 				'content' => "",
		// 				'config'  => ""
		// 			]
		// 		)
		// 	],
		// 	Html::rawElement(
		// 		'div',
		// 		[
		// 			'class' => 'mermaid-dots',
		// 		]
		// 	)
		// );
	}

	/**
	 * @since  1.0
	 *
	 * @param Parser &$parser
	 *
	 * @return string
	 */
	public function parse( &$parser ) {
		$class = 'ext-mermaid';
		$parserOutput = $this->parser->getOutput();
		$globalConfig = MediaWikiServices::getInstance()->getMainConfig();
		$params = array_slice( func_get_args(), 1 );

		// Signal the OutputPageParserOutput hook
		$parserOutput->setExtensionData( 'ext-mermaid' , true );
		$parserOutput->addModules( 'ext.mermaid' );

		if ( $globalConfig->has("MermaidDefaultTheme") ) {
			$graphConfig = [
				'theme' => $globalConfig->get("MermaidDefaultTheme")
			];
		} else {
			$graphConfig = [
				'theme' => 'forest'
			];
		} 		

		foreach ( $params as $key => $param ) {

			if ( strpos( $param, '=' ) !== false ) {
				list( $k, $value ) = array_map( 'trim', explode( '=', $param, 2 ) );

				$keys = explode( '.', $k );
				if ( count( $keys ) == 1 || $keys[0] !== 'config' ) {
					continue;
				}
				array_shift( $keys );

				if ( $this->parseParam( $keys, [ 'theme' ], $value, $graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'fontFamily' ], $value, $graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'logLevel' ], $value, $graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'securityLevel' ], $value, $graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'startOnLoad' ],
						filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE), 
						$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'arrowMarkerAbsolute' ],
						filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE), 
						$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'flowchart' , 'curve' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'flowchart', 'useMaxWidth' ],
						filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
 						$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'flowchart', 'htmlLabels' ],
						filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
 						$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'flowchart' , 'rankSpacing' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'flowchart' , 'nodeSpacing' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'sequence' , 'diagramMarginX' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'sequence' , 'diagramMarginY' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'sequence' , 'actorMargin' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'sequence' , 'width' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'sequence' , 'height' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'sequence' , 'boxMargin' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'sequence' , 'boxTestMargin' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'sequence' , 'noteMargin' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'sequence' , 'messageMargin' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'sequence' , 'messageAlign' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'sequence', 'mirrorActors' ],
						filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
 						$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'sequence' , 'bottomMarginAdj' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}
				
				elseif ( $this->parseParam( $keys, [ 'sequence' , 'useMaxWidth' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}
				
				elseif ( $this->parseParam( $keys, [ 'sequence' , 'rightAngles' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}
				
				elseif ( $this->parseParam( $keys, [ 'sequence' , 'showSequenceNumbers' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}
				
				elseif ( $this->parseParam( $keys, [ 'gantt' , 'titleTopMargin' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'gantt' , 'barHeight' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'gantt' , 'barGap' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'gantt' , 'topPadding' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'gantt' , 'leftPadding' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'gantt' , 'gridLineStartPadding' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'gantt' , 'fontSize' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'gantt' , 'fontFamily' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'gantt' , 'numberSectionStyles' ], $value,
					$graphConfig ) ) {
					unset( $params[$key] );
				}

				elseif ( $this->parseParam( $keys, [ 'gantt' , 'axisFormat' ], $value,
					$graphConfig ) ) {
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
						'config'  => $graphConfig
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

	private function parseParam( $paramKeys, $graphConfigKeys, $value, &$graphConfig ) {

		if ( $paramKeys !== $graphConfigKeys ) {
			return false;
		}

		$a = &$graphConfig;
		foreach ( $graphConfigKeys as $key ) {
			if ( !isset( $a[$key] ) ) {
				$a[$key] = [];
			}	
			$a = &$a[$key];
		}
		$a = $value;

		return true;
	}
}
