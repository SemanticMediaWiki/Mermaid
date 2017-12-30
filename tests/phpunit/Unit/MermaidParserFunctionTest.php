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

	public function testParse() {

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
			'class="ext-mermaid" data-diagram="sequenceDiagram..." data-config="{&quot;theme&quot;:&quot;foo&quot;}"><div class="mermaid-dots"></div>',
			$instance->parse( [ 'sequenceDiagram...', 'theme=foo' ] )
		);
	}

}
