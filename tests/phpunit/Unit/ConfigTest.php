<?php

namespace Mermaid\Tests;

use Mermaid\Config;

class ConfigTest extends \PHPUnit\Framework\TestCase
{

	public function testGetDefaultThemeWithNoValueInGlobal()
	{
		$globalConfig = $this->getMockConfig([]);
		$instance = new Config($globalConfig);
		$this->assertEquals('forest', $instance->getDefaultTheme());
	}

	public function testGetDefaultThemeWithValueInGlobal()
	{
		$globalConfig = $this->getMockConfig(['mermaidgDefaultTheme' => 'foo']);
		$instance = new Config($globalConfig);
		$this->assertEquals('foo', $instance->getDefaultTheme());
	}

	/**
	 * @param array $data
	 * @return \Config
	 */
	protected function getMockConfig(array $data)
	{
		$configMock = $this->createMock('\Config');

		$configMock->method('has')->will($this->returnCallback(function ($arg) use ($data) {
			return in_array($arg, array_keys($data));
		}));

		$configMock->method('get')->will($this->returnCallback(function ($arg) use ($data) {
			return $data[$arg];
		}));

		return $configMock;
	}
}
