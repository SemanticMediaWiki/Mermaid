<?php

namespace Mermaid\Tests;

use Mermaid\MermaidParserFunction;

/**
 * @covers \Mermaid\MermaidParserFunction
 * @group mermaid
 *
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class MermaidParserFunctionTest extends \PHPUnit\Framework\TestCase
{
	public function testCanConstruct()
	{

		$parser = $this->getMockBuilder('\Parser')
			->disableOriginalConstructor()
			->getMock();

		$config = $this->getMockConfig();

		$mermaidConfig = $this->getMockBuilder('\Mermaid\MermaidConfigExtractor')
			->disableOriginalConstructor()
			->getMock();


		$this->assertInstanceOf(
			MermaidParserFunction::class,
			new MermaidParserFunction($parser, $config, $mermaidConfig)
		);
	}

	/**
	 * @dataProvider textProvider
	 */
	public function testParse($text, $expected)
	{

		$parserOutput = $this->getMockBuilder('\ParserOutput')
			->disableOriginalConstructor()
			->getMock();

		$parserOutput->expects($this->once())
			->method('setExtensionData')
			->with(
				$this->equalTo('ext-mermaid'),
				$this->equalTo(true));

		$parser = $this->createMock('\Parser');

		$parser->expects($this->any())
			->method('getOutput')
			->will($this->returnValue($parserOutput));

		$mockConfig = $this->getMockConfig();
		$mockExtractor = $this->getMockConfigExtractor();

		$instance = new MermaidParserFunction(
			$parser,
			$mockConfig,
			$mockExtractor
		);

		$this->assertStringContainsStringIgnoringCase(
			$expected,
			$instance->parse($text)
		);
	}

	public function textProvider()
	{

		yield [
			['sequenceDiagram...', 'config.theme=foo'],
			'<div class="ext-mermaid" data-mermaid="{&quot;content&quot;:&quot;sequenceDiagram...&quot;,&quot;config&quot;:{&quot;theme&quot;:&quot;foo&quot;}}"><div class="mermaid-dots"></div></div>'
		];

		// [ ... ]
		yield [
			['sequenceDiagram id1["This is the (text) in the box"]', 'config.theme=foo'],
			'<div class="ext-mermaid" data-mermaid="{&quot;content&quot;:&quot;sequenceDiagram id1[&amp;quot;This is the (text) in the box&amp;quot;]&quot;,&quot;config&quot;:{&quot;theme&quot;:&quot;foo&quot;}}"><div class="mermaid-dots"></div></div>'
		];

		// |
		yield [
			['A[Hard edge] -->|Link text| B(Round edge)'],
			'<div class="ext-mermaid" data-mermaid="{&quot;content&quot;:&quot;A[Hard edge] --&amp;gt;|Link text| B(Round edge)&quot;,&quot;config&quot;:{&quot;theme&quot;:&quot;forest&quot;}}"><div class="mermaid-dots"></div></div>'
		];

		yield [
			['graph LR;', 'config.theme=foo', 'config.flowchart.curve=basis'],
			'<div class="ext-mermaid" data-mermaid="{&quot;content&quot;:&quot;graph LR;&quot;,&quot;config&quot;:{&quot;theme&quot;:&quot;foo&quot;,&quot;flowchart&quot;:{&quot;curve&quot;:&quot;basis&quot;}}}"><div class="mermaid-dots"></div></div>'
		];

		yield [
			['graph LR;', 'config.theme=foo', 'config.flowchart.useMaxWidth=false'],
			'<div class="ext-mermaid" data-mermaid="{&quot;content&quot;:&quot;graph LR;&quot;,&quot;config&quot;:{&quot;theme&quot;:&quot;foo&quot;,&quot;flowchart&quot;:{&quot;useMaxWidth&quot;:false}}}"><div class="mermaid-dots"></div></div>'
		];

	}

	protected function getMockConfig()
	{
		$configMock = $this->createMock('\Mermaid\Config');

		$configMock->method('getDefaultTheme')->willReturn('forest');

		return $configMock;
	}

	protected function getMockConfigExtractor()
	{
		$valueMap = TestingConsts::EXTRACTOR_VALUE_MAP;

		$extractorMock = $this->createMock('\Mermaid\MermaidConfigExtractor');

		$extractorMock->method('extract')->will($this->returnValueMap($valueMap));

		return $extractorMock;
	}
}
