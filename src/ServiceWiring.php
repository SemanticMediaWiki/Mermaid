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
     * MermaidConfigExtractor
     *
     * @return callable
     */
    'Mermaid.MermaidConfigExtractor' => function ( MediaWikiServices $services ) {
        return new MermaidConfigExtractor();
    }
];
