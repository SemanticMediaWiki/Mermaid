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
     * @param Parser $parser
     * @param Config $globalConfig
     * @param MermaidConfigExtractor $mermaidConfigExtractor
     * @since  1.0
     *
     */
	public function __construct( Parser $parser, Config $globalConfig, MermaidConfigExtractor $mermaidConfigExtractor ) {
		$this->parser = $parser;
		$this->globalConfig = $globalConfig;
		$this->paramExtractor = $mermaidConfigExtractor;
	}

    /**
     * @param Parser $parser
     * @return callable
     * @since 1.1
     *
     */
	public static function onParserFunction( Parser $parser ) {
	    $globalConfig = MediaWikiServices::getInstance()->getMainConfig();
	    $paramExtractor = MediaWikiServices::getInstance()->getService('Mermaid.MermaidConfigExtractor');

		$function = new self( $parser, $globalConfig, $paramExtractor );
		return $function->parse( func_get_args() );
	}

    /**
     * @param array $params
     * @return string
     * @since  1.0
     *
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
