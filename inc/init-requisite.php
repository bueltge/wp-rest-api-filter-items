<?php # -*- coding: utf-8 -*-

namespace RestApiFilterItems;

use Requisite;

/**
 * Init the autoload
 *
 * @param string $dir (The path of the lib/ directory)
 *
 * @return FALSE | Requisite\SPLAutoLoader
 */
function init_requisite( $dir ) {

	if ( ! class_exists( '\Requisite\SPLAutoLoader' ) ) {

		$requisite = $dir . '/Requisite/Requisite.php';
		if ( ! is_readable( $requisite ) ) {
			return FALSE;
		}

		require_once $requisite;
	}

	Requisite\Requisite::init();

	return new Requisite\SPLAutoLoader;
}