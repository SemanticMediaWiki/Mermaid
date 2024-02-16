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
class MermaidParserFunction
{

	/**
	 * @var Parser
	 */
	private $parser;

	/**
	 * @var Config
	 */
	private $config;

	/**
	 * @var MermaidConfigExtractor
	 */
	private $paramExtractor;

	/**
	 * @param Parser $parser
	 * @param Config $config
	 * @param MermaidConfigExtractor $mermaidConfigExtractor
	 * @since  1.0
	 */
	public function __construct(Parser $parser, Config $config, MermaidConfigExtractor $mermaidConfigExtractor)
	{
		$this->parser = $parser;
		$this->config = $config;
		$this->paramExtractor = $mermaidConfigExtractor;
	}

	/**
	 * @param Parser $parser
	 * @return callable
	 * @since 1.1
	 *
	 */
	public static function onParserFunction(Parser $parser)
	{
		$config = MediaWikiServices::getInstance()->getService('Mermaid.Config');
		$paramExtractor = MediaWikiServices::getInstance()->getService('Mermaid.MermaidConfigExtractor');

		$function = new self($parser, $config, $paramExtractor);
		return $function->parse(func_get_args());
	}

	/**
	 * @param array $params
	 * @return string
	 * @since  1.0
	 *
	 */
	public function parse(array $params)
	{
		$class = 'ext-mermaid';
		$parserOutput = $this->parser->getOutput();
		if (isset($params[0]) && $params[0] instanceof \Parser) {
			array_shift($params);
		}

		// Signal the OutputPageParserOutput hook
		$parserOutput->setExtensionData('ext-mermaid', true);
		$parserOutput->addModules(['ext.mermaid']);

		$graphConfig = [
			'theme' => $this->config->getDefaultTheme()
		];

		list($mermaidConfig, $mwParams) = $this->paramExtractor->extract($params);

		$content = implode("|", $mwParams);
		$graphConfig = array_merge($graphConfig, $mermaidConfig);

		return Html::rawElement(
			'div',
			[
				'class' => $class,
				'data-mermaid' => json_encode(
					[
						'content' => $content,
						'config' => $graphConfig
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
