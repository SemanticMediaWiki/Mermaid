<?php

namespace Mermaid\Tests\Integration;

/**
 * @group mermaid
 * @group medium
 *
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class I18nJsonFileIntegrityTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider i18nFileProvider
	 */
	public function testI18NJsonDecodeEncode( $file ) {

		$contents = file_get_contents( $file );

		$this->assertInternalType(
			'array',
			json_decode( $contents, true ),
			'Failed with ' . $this->getDescriptiveJsonError( json_last_error() ) . ' in ' . $file
		);
	}

	public function i18nFileProvider() {

		$provider = array();

		$files = $this->findFilesForExtension(
			$GLOBALS['wgMessagesDirs']['Mermaid'],
			'json'
		);

		foreach ( $files as $file ) {
			$provider[] = array( $file );
		}

		return $provider;
	}

	private function findFilesForExtension( $path, $extension ) {

		$files = array();

		$directoryIterator = new \RecursiveDirectoryIterator(
			str_replace( array( '\\', '/' ), DIRECTORY_SEPARATOR, $path )
		);

		foreach ( new \RecursiveIteratorIterator( $directoryIterator ) as $fileInfo ) {
			if ( strtolower( substr( $fileInfo->getFilename(), -( strlen( $extension ) + 1 ) ) ) === ( '.' . $extension ) ) {
				$files[$fileInfo->getFilename()] = $fileInfo->getPathname();
			}
		}

		return $files;
	}

	private function getDescriptiveJsonError( $errorCode ) {

		$errorMessages = array(
			JSON_ERROR_NONE => '',
			JSON_ERROR_STATE_MISMATCH => 'Underflow or the modes mismatch, malformed JSON',
			JSON_ERROR_CTRL_CHAR => 'Unexpected control character found, possibly incorrectly encoded',
			JSON_ERROR_SYNTAX => 'Syntax error, malformed JSON',
			JSON_ERROR_UTF8   => 'Malformed UTF-8 characters, possibly incorrectly encoded',
			JSON_ERROR_DEPTH  => 'The maximum stack depth has been exceeded'
		);

		return $errorMessages[$errorCode];
	}

}
