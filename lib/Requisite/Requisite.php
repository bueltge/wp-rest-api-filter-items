<?php # -*- coding: utf-8 -*-

namespace Requisite;


class Requisite {

	/**
	 * @type bool
	 */
	private static $is_loaded = FALSE;

	public static function init( $base_dir = '' ) {

		if ( self::$is_loaded )
			return;

		if ( empty( $base_dir ) )
			$base_dir = __DIR__;
		$base_dir = rtrim( $base_dir, '/\\' );
		$classes = self::get_classes();

		foreach ( $classes as $class => $file ) {
			if ( ! class_exists( $class ) )
				require_once $base_dir . $file;
		}

		self::$is_loaded = TRUE;
	}

	private static function get_classes() {

		return array(
			__NAMESPACE__ . '\Loader\FileLoaderInterface'
				=> '/Loader/FileLoaderInterface.php',

			__NAMESPACE__ . '\Loader\DefaultConditionalFileLoader'
				=> '/Loader/DefaultConditionalFileLoader.php',

			__NAMESPACE__ . '\Loader\DirectoryCacheFileLoader'
				=> '/Loader/DirectoryCacheFileLoader.php',

			__NAMESPACE__ . '\Rule\AutoLoadRuleInterface'
				=> '/Rule/AutoLoadRuleInterface.php',

			__NAMESPACE__ . '\Rule\NamespaceDirectoryMapper'
				=> '/Rule/NamespaceDirectoryMapper.php',

			__NAMESPACE__ . '\AutoLoaderInterface'
				=> '/AutoLoaderInterface.php',

			__NAMESPACE__ . '\SPLAutoLoader'
				=> '/SPLAutoLoader.php'
		);
	}
} 