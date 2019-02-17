<?php

if ( PHP_SAPI !== 'cli' && PHP_SAPI !== 'phpdbg' ) {
	die( 'Not an entry point' );
}

error_reporting( E_ALL | E_STRICT );
date_default_timezone_set( 'UTC' );
ini_set( 'display_errors', 1 );

if ( !class_exists( 'Mermaid' ) || ( $version = Mermaid::getVersion() ) === null ) {
	die( "\nMermaid is not available, please check your Composer or LocalSettings (wfLoadExtension).\n" );
}

print sprintf( "\n%-20s%s\n", "Mermaid: ", $version );

if ( is_readable( $path = __DIR__ . '/../vendor/autoload.php' ) ) {
	print sprintf( "%-20s%s\n", "MediaWiki:", $GLOBALS['wgVersion'] . " (Extension vendor autoloader)" );
} elseif ( is_readable( $path = __DIR__ . '/../../../vendor/autoload.php' ) ) {
	print sprintf( "%-20s%s\n", "MediaWiki:", $GLOBALS['wgVersion'] . " (MediaWiki vendor autoloader)" );
} else {
	die( 'To run tests it is required that packages are installed using Composer.' );
}

$dateTimeUtc = new \DateTime( 'now', new \DateTimeZone( 'UTC' ) );
print sprintf( "\n%-20s%s\n\n", "Execution time:", $dateTimeUtc->format( 'Y-m-d h:i' ) );

$autoloader = require $path;
$autoloader->addPsr4( 'Mermaid\\Tests\\', __DIR__ . '/phpunit/Unit' );
$autoloader->addPsr4( 'Mermaid\\Tests\\Integration\\', __DIR__ . '/phpunit/Integration' );
unset( $autoloader );
