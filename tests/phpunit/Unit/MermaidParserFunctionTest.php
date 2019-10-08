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
class MermaidParserFunctionTest extends \PHPUnit_Framework_TestCase {

	public function testCanConstruct() {

		$parser = $this->getMockBuilder( '\Parser' )
			->disableOriginalConstructor()
			->getMock();

		$this->assertInstanceOf(
			MermaidParserFunction::class,
			new MermaidParserFunction( $parser )
		);
	}

	public function testInitCallback() {

		$callback = MermaidParserFunction::newCallback( 'foo' );

		$this->assertInstanceOf(
			'\Closure',
			$callback
		);

		$parserOutput = $this->getMockBuilder( '\ParserOutput' )
			->disableOriginalConstructor()
			->getMock();

		$parser = $this->getMockBuilder( '\Parser' )
			->disableOriginalConstructor()
			->getMock();

		$parser->expects( $this->any() )
			->method( 'getOutput' )
			->will( $this->returnValue( $parserOutput ) );

		$this->assertNotEmpty(
			call_user_func_array( $callback, [ $parser ] )
		);
	}

	/**
	 * @dataProvider textProvider
	 */
	public function testParse( $text, $expected ) {

		$parserOutput = $this->getMockBuilder( '\ParserOutput' )
			->disableOriginalConstructor()
			->getMock();

		$parserOutput->expects( $this->once() )
			->method( 'setExtensionData' )
			->with(
				$this->equalTo( 'ext-mermaid' ),
				$this->equalTo( true ) );

		$parser = $this->getMockBuilder( '\Parser' )
			->disableOriginalConstructor()
			->getMock();

		$parser->expects( $this->any() )
			->method( 'getOutput' )
			->will( $this->returnValue( $parserOutput ) );

		$instance = new MermaidParserFunction(
			$parser
		);

		$this->assertContains(
			$expected,
			$instance->parse( $text )
		);
	}

	public function textProvider() {

		yield [
			[ 'sequenceDiagram...', 'config.theme=foo' ],
			'class="ext-mermaid" data-mermaid="{&quot;content&quot;:&quot;sequenceDiagram...&quot;,&quot;config&quot;:{&quot;theme&quot;:&quot;foo&quot;}}"><div class="mermaid-dots"></div></div>'
		];

		// [ ... ]
		yield [
			[ 'sequenceDiagram id1["This is the (text) in the box"]', 'config.theme=foo' ],
			'data-mermaid="{&quot;content&quot;:&quot;sequenceDiagram id1[\&quot;This is the (text) in the box\&quot;]'
		];

		// |
		yield [
			[ 'A[Hard edge] -->|Link text| B(Round edge)' ],
			'data-mermaid="{&quot;content&quot;:&quot;A[Hard edge] --&gt;|Link text| B(Round edge)&quot;'
		];

		yield [
			[ 'graph LR;', 'config.theme=foo', 'config.flowchart.curve=basis' ],
			'class="ext-mermaid" data-mermaid="{&quot;content&quot;:&quot;graph LR;&quot;,&quot;config&quot;:{&quot;theme&quot;:&quot;foo&quot;,&quot;flowchart&quot;:{&quot;curve&quot;:&quot;basis&quot;}}}"><div class="mermaid-dots"></div></div>'
		];

		yield [
			[ 'graph LR;', 'config.theme=foo', 'config.flowchart.useMaxWidth=false' ],
			'class="ext-mermaid" data-mermaid="{&quot;content&quot;:&quot;graph LR;&quot;,&quot;config&quot;:{&quot;theme&quot;:&quot;foo&quot;,&quot;flowchart&quot;:{&quot;useMaxWidth&quot;:false}}}"><div class="mermaid-dots"></div></div>'
		];

	}

}
