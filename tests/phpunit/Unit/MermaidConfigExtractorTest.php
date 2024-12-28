<?php

namespace Mermaid\Tests;

use Mermaid\MermaidConfigExtractor;

/**
 * @covers \Mermaid\MermaidConfigExtractor
 * @group mermaid
 *
 * @license GNU GPL v2+
 * @since 2.4.0
 *
 * @author howlowck
 */
class MermaidConfigExtractorTest extends \PHPUnit\Framework\TestCase
{
	/**
	 * @dataProvider caseProvider
	 * @param array $input
	 * @param array $expected
	 */
	public function testExtract(array $input, array $expected)
	{
		$instance = new MermaidConfigExtractor();
		$this->assertSame($expected, $instance->extract($input), 'Extractor able to extract the configs');
	}

	public function caseProvider()
	{
		return TestingConsts::EXTRACTOR_VALUE_MAP;
	}
}
