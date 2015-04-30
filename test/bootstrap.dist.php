<?php # -*- coding: utf-8 -*-

namespace RestApiFilterItems\Test\Unit;
use RestApiFilterItems;

# allow to override the bootstraping localy
if ( file_exists( __DIR__ . '/bootstrap.php' ) )
	return require_once __DIR__ . '/bootstrap.php';

$base_dir = dirname( __DIR__ );

/**
 * @param $file
 */
$file_loader = function ( $file ) use ( $base_dir ) {
	require_once $base_dir . '/inc/' . $file;
};
$file_loader( 'init-requisite.php' );
$file_loader( 'register-autoloading.php' );

RestApiFilterItems\register_autoloading(
	$base_dir,
	RestApiFilterItems\init_requisite( $base_dir . '/lib' )
);