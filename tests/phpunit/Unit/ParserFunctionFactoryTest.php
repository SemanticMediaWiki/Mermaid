<?php

namespace Mermaid\Tests;

use Mermaid\ParserFunctionFactory;

/**
 * @covers \Mermaid\ParserFunctionFactory
 * @group mermaid
 *
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class ParserFunctionFactoryTest extends \PHPUnit_Framework_TestCase {

	public function testCanConstruct() {

		$this->assertInstanceOf(
			ParserFunctionFactory::class,
			new ParserFunctionFactory()
		);
	}

	public function testCanConstructMermaidParserFunctionDefinition() {

		$instance = new ParserFunctionFactory();

		list( $name, $definition, $flag ) = $instance->newMermaidParserFunctionDefinition();

		$this->assertEquals(
			'mermaid',
			$name
		);

		$this->assertInstanceOf(
			'\Closure',
			$definition
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
			call_user_func_array( $definition, array( $parser ) )
		);
	}

}
