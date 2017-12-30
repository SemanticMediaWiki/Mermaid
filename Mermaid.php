<?php

use Mermaid\HookRegistry;

/**
 * @see https://github.com/SemanticMediaWiki/Mermaid/
 *
 * @defgroup mermaid Mermaid
 */
if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is part of the Mermaid extension, it is not a valid entry point.' );
}

/**
 * @codeCoverageIgnore
 */
class Mermaid {

	/**
	 * @since 1.0
	 */
	public static function initExtension( $credits = [] ) {

		// Load DefaultSettings
		require_once __DIR__ . '/DefaultSettings.php';

		define( 'MERMAID_VERSION', $credits['version'] );

		// Register message files
		$GLOBALS['wgMessagesDirs']['Mermaid'] = __DIR__ . '/i18n';
		$GLOBALS['wgExtensionMessagesFiles']['MermaidMagic'] = __DIR__ . '/i18n/Mermaid.magic.php';

		$GLOBALS['wgResourceModules']['ext.mermaid.styles'] = [
			'localBasePath' => __DIR__ ,
			'remoteExtPath' => 'Mermaid',
			'position' => 'top',
			'styles'   => [
				'res/ext.mermaid.css'
			],
			'messages' => [],
			'targets' => [
				'mobile',
				'desktop'
			]
		];

		$GLOBALS['wgResourceModules']['ext.mermaid'] = [
			'localBasePath' => __DIR__ ,
			'remoteExtPath' => 'Mermaid',
			'position' => 'top',
			'scripts'  => [
				'res/ext.mermaid.js'
			],
			'dependencies'  => [
				'mediawiki.api',
				'mediawiki.api.parse',
				'ext.mermaid.styles',
				'ext.mermaid.theme.default',
				'ext.mermaid.core'
			],
			'targets' => [
				'mobile',
				'desktop'
			]
		];

		$GLOBALS['wgResourceModules']['ext.mermaid.theme.default'] = [
			'localBasePath' => __DIR__ ,
			'remoteExtPath' => 'Mermaid',
			'position' => 'bottom',
			'styles'   => [
				'res/mermaid/7.0.5/mermaid.min.css'
			],
			'messages' => [],
			'targets' => [
				'mobile',
				'desktop'
			]
		];

		$GLOBALS['wgResourceModules']['ext.mermaid.theme.forest'] = [
			'localBasePath' => __DIR__ ,
			'remoteExtPath' => 'Mermaid',
			'position' => 'bottom',
			'styles'   => [
				'res/mermaid/7.0.5/mermaid.forest.min.css'
			],
			'messages' => [],
			'targets' => [
				'mobile',
				'desktop'
			]
		];

		$GLOBALS['wgResourceModules']['ext.mermaid.theme.dark'] = [
			'localBasePath' => __DIR__ ,
			'remoteExtPath' => 'Mermaid',
			'position' => 'bottom',
			'styles'   => [
				'res/mermaid/7.0.5/mermaid.dark.min.css'
			],
			'messages' => [],
			'targets' => [
				'mobile',
				'desktop'
			]
		];

		$GLOBALS['wgResourceModules']['ext.mermaid.theme.neutral'] = [
			'localBasePath' => __DIR__ ,
			'remoteExtPath' => 'Mermaid',
			'position' => 'bottom',
			'styles'   => [
				'res/mermaid/7.0.5/mermaid.neutral.min.css'
			],
			'messages' => [],
			'targets' => [
				'mobile',
				'desktop'
			]
		];

		$GLOBALS['wgResourceModules']['ext.mermaid.d3'] = [
			'localBasePath' => __DIR__ ,
			'remoteExtPath' => 'Mermaid',
			'position' => 'bottom',
			'scripts'  => [
				'res/d3/d3.min.js',
				'res/d3/dagre-d3.min.js'
			],
			'messages' => [],
			'targets' => [
				'mobile',
				'desktop'
			]
		];

		$GLOBALS['wgResourceModules']['ext.mermaid.core'] = [
			'localBasePath' => __DIR__ ,
			'remoteExtPath' => 'Mermaid',
			'position' => 'bottom',
			'scripts'  => [
				'res/mermaid/7.0.5/mermaid.min.js'
			],
			'dependencies'  => [
				'ext.mermaid.d3'
			],
			'messages' => [],
			'targets' => [
				'mobile',
				'desktop'
			]
		];

		$GLOBALS['wgResourceModules']['ext.mermaid.api'] = [
			'localBasePath' => __DIR__ ,
			'remoteExtPath' => 'Mermaid',
			'position' => 'bottom',
			'scripts'  => [
				'res/mermaid/7.0.5/mermaidAPI.min.js'
			],
			'dependencies'  => [
				'ext.mermaid.d3'
			],
			'messages' => [],
			'targets' => [
				'mobile',
				'desktop'
			]
		];
	}

	/**
	 * @since 1.0
	 */
	public static function onExtensionFunction() {
		$hookRegistry = new HookRegistry();
		$hookRegistry->register();
	}

	/**
	 * @since 1.0
	 *
	 * @return string|null
	 */
	public static function getVersion() {
		return MERMAID_VERSION;
	}

}
