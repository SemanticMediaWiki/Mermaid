<?php

/**
 * @codeCoverageIgnore
 *
 * @license GNU GPL v2+
 * @since 2.4.0
 *
 * @author howlowck
 */

use MediaWiki\MediaWikiServices;
use Mermaid\MermaidConfigExtractor;

return [
	/**
	 * Mermaid.MermaidConfigExtractor
	 *
	 * @return callable
	 */
	'Mermaid.MermaidConfigExtractor' => function (MediaWikiServices $services) {
		return new MermaidConfigExtractor();
	},

	/**
	 * Mermaid.Config
	 */
	'Mermaid.Config' => function (MediaWikiServices $services) {
		$globalConfig = $services->getMainConfig();
		return new \Mermaid\Config($globalConfig);
	}
];
