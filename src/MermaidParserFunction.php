<?php

namespace Mermaid;

use Config;
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
     * @var Config
     */
    private $globalConfig;

    /**
     * @var MermaidConfigExtractor
     */
    private $paramExtractor;

	/**
	 * @since  1.0
	 *
	 * @return Parser $parser
	 */
	public function __construct( Parser $parser ) {
		$this->parser = $parser;
		$this->globalConfig = MediaWikiServices::getInstance()->getMainConfig();
		$this->paramExtractor = new MermaidConfigExtractor();
	}

	/**
	 * @since 1.1
	 *
	 * @return callable
	 */
	public static function onParserFunction( Parser $parser ) {
		$function = new self( $parser );
		return $function->parse( func_get_args() );
	}

	/**
	 * @since  1.0
	 *
	 * @param Parser &$parser
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
		$parserOutput->setExtensionData( 'ext-mermaid' , true );
		$parserOutput->addModules( 'ext.mermaid' );

		if ( $this->globalConfig->has("mermaidgDefaultTheme") ) {
			$graphConfig = [
				'theme' => $this->globalConfig->get("mermaidgDefaultTheme")
			];
		} else {
			$graphConfig = [
				'theme' => 'forest'
			];
		}

		list($mermaidConfig, $mwParams) = $this->paramExtractor->extract($params);

		$content = implode( "|", $mwParams );
        $graphConfig = array_merge($graphConfig, $mermaidConfig);

		return Html::rawElement(
			'div',
			[
				'class' => $class,
				'data-mermaid' => json_encode(
					[
						'content' => htmlspecialchars($content),
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
}
