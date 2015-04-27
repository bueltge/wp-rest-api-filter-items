<?php # -*- coding: utf-8 -*-

namespace RestApiFilterItems;

use Requisite;

/**
 * register the $dir directory to an Requisite autoloader
 *
 * @param string                  $dir (plugin base dir)
 * @param Requisite\SPLAutoLoader $requisite
 *
 * @return Requisite\SPLAutoLoader
 */
function register_autoloading( $dir, Requisite\SPLAutoLoader $requisite ) {

	$requisite->addRule(
		new Requisite\Rule\NamespaceDirectoryMapper( $dir . '/inc', __NAMESPACE__ )
	);

	return $requisite;
}