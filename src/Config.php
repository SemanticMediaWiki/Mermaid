<?php


namespace Mermaid;

use \Config as MWConfig;

class Config
{
	/**
	 * @var MWConfig
	 */
	private $globalConfig;

	public function __construct(MWConfig $globalConfig) {
		$this->globalConfig = $globalConfig;
	}

	public function getDefaultTheme() {
		$key = "mermaidgDefaultTheme";
		if ($this->globalConfig->has($key)) {
			return $this->globalConfig->get($key);
		}
		return 'forest';
	}

}
